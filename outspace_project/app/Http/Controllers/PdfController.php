<?php

namespace App\Http\Controllers;

use App\Doc_good;
use App\LC;
use App\PI;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class PdfController extends Controller
{
    public function generate_doc_pdf(Request $request){
       $pdfdata = $request->get('pdf_values');
        $pdfdata = json_decode($pdfdata);
        $delivery_doc = DB::table('delivery_document')->where('doc_id',$pdfdata->doc_id)->first();
        $issuing_bank = LC::where('lc_id',$pdfdata->lc_id)->first()->issuing_bank;
        $negotiating_bank = LC::where('lc_id',$pdfdata->lc_id)->first()->negotiating_bank;
        $beneficiary_bank = LC::where('lc_id',$pdfdata->lc_id)->first()->beneficiary_bank;
        $buyer = LC::where('lc_id',$pdfdata->lc_id)->first()->buyer;
        $lc_detail = LC::where('lc_id',$pdfdata->lc_id)->first();
        $page = Input::get('page');
        if($page==1){
            $pdf = PDF::loadView('pdf.negotiating_doc',compact('negotiating_bank','delivery_doc','issuing_bank','lc_detail'));
            return $pdf->stream('negotiatingDoc.pdf');
        }
        if($page ==2){

            $pdf = PDF::loadView('pdf.bill_of_exchange',compact('delivery_doc','negotiating_bank','buyer','issuing_bank','pdfdata'));
            $pdf->setPaper('A4');
            return $pdf->stream('bill_of_exchange.pdf');
        }
        if($page ==3 || $page == 5 || $page == 6 || $page == 4 || $page == 7 || $page == 8 || $page == 9){
            $des_array = array();
            $pi_final = array();
            $pi_asso_lc_array = array();
            $good_description = Doc_good::where('doc_id',$pdfdata->doc_id)->get();
            $pi_asso_lc = DB::table('lc_pi_relation')->where('lc_id',$pdfdata->lc_id)->get();
            foreach ($pi_asso_lc as $pi_asso){
                array_push($pi_asso_lc_array,$pi_asso->pi_id);
            }
            foreach ($good_description as $gd){
                array_push($des_array,$gd->description);
            }
            $pi_list = DB::table('goods')->select('pi_id')->whereIn('description',$des_array)->whereIn('pi_id',$pi_asso_lc_array)->get();
            foreach ($pi_list as $p){
                array_push($pi_final,$p->pi_id);
            }
            $myPi = PI::whereIn('pi_id',$pi_final)->get();

            if($page == 3){
                $pdf = PDF::loadView('pdf.truck_receipt',compact('pdfdata','negotiating_bank','lc_detail','issuing_bank','buyer','myPi','good_description'));
                $pdf->setPaper('A4');
                return $pdf->stream('truck_receipt.pdf');
            }
            if($page ==5){
                $pdf = PDF::loadView('pdf.beneficiary_certificate',compact('lc_detail','pdfdata','buyer','myPi','issuing_bank','good_description'));
                $pdf->setPaper('A4');
                return $pdf->stream('beneficiary_certificate.pdf');
            }
            if($page == 6){
                $pdf = PDF::loadView('pdf.certificate_of_origin',compact('lc_detail','good_description','pdfdata','buyer','issuing_bank'));
                $pdf->setPaper('A4');
                return $pdf->stream('certificate_of_origin.pdf');
            }
            if($page == 4){
                $pdf = PDF::loadView('pdf.commercial_invoice',compact('buyer','lc_detail','delivery_doc','myPi','good_description','issuing_bank'));
                $pdf->setPaper('A4');
                return $pdf->stream('commercial_invoice.pdf');
            }
            if($page == 7){
                $pdf = PDF::loadView('pdf.delivery_chalan',compact('lc_detail','delivery_doc','issuing_bank','buyer','good_description','myPi'));
                $pdf->setPaper('A4');
                 return $pdf->stream('delivery_chalan.pdf');
            }
            if($page == 8){
                $pdf = PDF::loadView('pdf.packing_list',compact('delivery_doc','lc_detail','myPi','issuing_bank','good_description'));
                $pdf->setPaper('A4');
                return $pdf->stream('packing_detail.pdf');
            }
            if($page == 9){
                $pdf = PDF::loadView('pdf.all',compact('issuing_bank','delivery_doc','beneficiary_bank','negotiating_bank','buyer','pdfdata','lc_detail','myPi','good_description'));
                $pdf->setPaper('A4');
                return $pdf->stream('all_doc.pdf');
            }

        }
    }
}
