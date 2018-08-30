<?php

namespace App\Http\Controllers;

use App\Advance_DO_Good;
use App\Bank;
use App\Buyer;
use App\DeliveryOrder;
use App\Events\NewDO;
use App\Events\NewNotification;
use App\Goods;
use App\LC;
use App\Notification;
use App\PI;
use App\Pi_Good;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Input;

class NotificationController extends Controller
{
    public function notification_delete($notification_id = null){
        Notification::where('notification_id',$notification_id)->delete();
        return redirect()->route('notification');
    }
    //Show a notification detail depending on type
    public function notification_detail($type = null, $doc_id = null, $part = null){
        if($type == 'LC'){
            $lc_detail = LC::where('lc_id',$doc_id)->first();
            $banks = Bank::all();
            $buyers = Buyer::all();
            $pi = DB::table('lc_pi_relation')->where('lc_id',$doc_id)->where('ammend_no',$part)->select('pi_id')->get();
            return view('lc_confirm',compact('lc_detail','pi','banks','buyers'));
        }
        if($type == 'PI'){
            $pi_detail = PI::where('pi_id',$doc_id)->first();
            $buyers = Buyer::all();
            $banks = Bank::all();
            return view('pi_confirm',compact('pi_detail','buyers','banks'));
        }
        if($type == 'DO'){
            $doc_id = str_replace('-','/',$doc_id);
            $do_detail = DeliveryOrder::where('order_no',$doc_id)->first();
            return view('do_detail',compact('do_detail'));
        }
        if($type == 'Advance DO'){
            $doc_id = str_replace('-','/',$doc_id);
            $do_detail = Advance_DO_Good::where('order_no',$doc_id)->first();
            return view('advance_do_detail',compact('do_detail'));
        }
        if($type == 'Ready DO'){
            $pi_array = array();
            $doc_id = str_replace('-','/',$doc_id);
            $trace_lc_pi = DB::table('do_detail')->where('order_no',$doc_id)->select('pi_id')->first();
            $traced_lc = DB::table('lc_pi_relation')->where('pi_id',$trace_lc_pi->pi_id)->select('lc_id')->first();
            $lc_detail = LC::where('lc_id',$traced_lc->lc_id)->first();
            $doc_asso_pi_array = array();
            $doc_asso_pis = DB::table('do_detail')->where('order_no',$doc_id)->select('pi_id')->distinct()->get();
            if(empty($doc_asso_pis)){
                $results = DB::table('do_goods')->where('order_no',$doc_id)->get();
                return view('pdf.do_pdf',compact('results'));
            }
            else{
                foreach ($doc_asso_pis as $doc_asso_pi){
                    array_push($doc_asso_pi_array,$doc_asso_pi->pi_id);
                }
                $do_goods = DB::table('do_detail')->where('order_no',$doc_id)->select('description','pi_id','quantity','requested')->get();
                $advance_do_goods = DB::table('do_goods')->whereIn('pi_id',$doc_asso_pi_array)->select('description','quantity','pi_id','requested')->get();
                $results = array_merge($do_goods,$advance_do_goods);
                $pis = DB::table('lc_pi_relation')->where('lc_id',$lc_detail->lc_id)->get();
                foreach ($pis as $pi){
                    array_push($pi_array,$pi->pi_id);
                }
                $do_pis = PI::whereIn('pi_id',$pi_array)->get();
                return view('pdf.do_pdf',compact('results','lc_detail','do_pis'));
            }
            
        }
    }
    //populating all goods for a pi in create document page
    public function populate_goods(){
        $final_result = array();
        $pis = DB::table('lc_pi_relation')->select('pi_id')->where('lc_id',Input::get('lc_no'))->where('ammend_no',Input::get('ammendment_no'))->get();
        foreach ($pis as $pi){
            $count = Advance_DO_Good::where('pi_id',$pi->pi_id)->count();
            if($count<=0){
                $result = DB::table('goods')->select('pi_id','description','quantity','unit_price','requested')->where('pi_id',$pi->pi_id)->get();
            }
            else{
                $result = DB::table('do_goods')->select('pi_id','description','quantity','unit_price','requested')->where('pi_id',$pi->pi_id)->get();
            }
        $final_result = array_merge($final_result,$result);
        }
        return $final_result;

    }
    public function populate_do_goods(){
        $final_array = array();
        $result_array = array();
       $do_id = Input::get('order_no');
        $result = DB::table('do_detail')->select('description','quantity','unit_price','requested')->where('order_no',$do_id)->get();
        foreach ($result as $r){
            $this_good_qty = DB::table('do_detail')->where('order_no',$do_id)->where('description',$r->description)->first();
            $this_good_del = DB::table('delivered_do_product')
                ->select(DB::raw('description'), DB::raw('sum(quantity) as quantity'),DB::raw('unit_price'),DB::raw('requested'))
                ->groupBy(DB::raw('description') )->where('do_id',$do_id)->where('description',$r->description)
                ->first();
            $remaining = $this_good_qty->quantity-$this_good_del->quantity;
            $this_good_detail = DB::select("select description,'$remaining' AS quantity,unit_price,requested from do_detail where order_no = ? and description = ?",[$do_id,$r->description]);
            $result_array = array_merge($result_array,$this_good_detail);
        }
        $delivered = DB::table('delivered_do_product')
            ->select(DB::raw('description'), DB::raw('sum(quantity) as quantity'),DB::raw('unit_price'),DB::raw('requested'))
            ->groupBy(DB::raw('description') )->where('do_id',$do_id)
            ->get();
        $final_array = array_merge($result_array,$delivered);
        return $final_array;
    }
    public function populate_advance_goods(){
        $result = DB::table('do_goods')->select('description','quantity','unit_price','requested')->where('order_no',Input::get('do_id'))->get();
        return $result;
    }
    //Saving the revised DO
    public function save_do_detail(){
        $do_no = Input::get('do_id');
        $products = Input::get('products');
        $doc_count = DB::table('do_detail')->where('order_no', 'LIKE', Input::get('do_id').'%')->distinct()->count();
        $do_no = $do_no."rev(".$doc_count.")";
        foreach($products as $product){
            DB::table('do_detail')->insert(['order_no'=>$do_no,'description'=>$product['description'],'pi_id'=>$product['pi_id'],'quantity'=>$product['quantity'],
            'unit_price'=>$product['unit_price'],'requested'=>$product['requested']]);
        }
        Event::fire(new NewNotification('Ready DO',$do_no,0));
    }
    public function populate_pi_goods(){

            $data = Pi_Good::where('pi_id',Input::get('pi_id'))->get();
        return $data;
    }
    public function revise_do(){
       $all_do = DB::table('do_detail')->distinct()->get(['order_no']);
        return view('revise_do',compact('all_do'));
    }
    //Viewing advance DO page
    public function advance_do(){
        $associatedPiArray = array();
        $associatedPi = DB::table('lc_pi_relation')->distinct()->get(['pi_id']);
        foreach ($associatedPi as $ap){
            array_push($associatedPiArray,$ap->pi_id);
        }
        $pi = DB::table('proforma_invoice')->select('pi_id')->whereNotIn('pi_id',$associatedPiArray)->get();
        return view('advance_do',compact('pi'));
    }
    //COnfirming an LC
    public function lc_confirm(Request $request){
        $lc_id = $request['lc_id'];
        $ammendment_no = $request['ammendment_no'];
        $office_ref = $request{'office_ref'};
        $issue_date = $request['issue_date'];
        $amount = $request['amount'];
        $expiry_date = $request['expiry_date'];
        $payment_method = $request['payment_method'];
        $sight_days = $request['sight_days'];
        $last_date_shipment = $request['last_date_shipment'];
        $export_lc_no = $request['export_lc_no'];
        $export_lc_date = $request['export_lc_date'];
        $ref = $request['ref'];
        $sales_contact_no = $request['sales_contact_no'];
        $area_code = $request['area_code'];
        $order_no_with_date = $request['order_no_with_date'];
        $overdue_interest = $request['overdue_interest'];
        $vat_registration_no = $request['vat_registration_no'];
        $discrepancy_charge = $request['discrepancy_charge'];
        $other_charge = $request['other_charge'];
        $export_garments_quantity = $request['export_garments_quantity'];
        $negotiation = $request['negotiation'];
        $buyer = $request['buyer'];
        $issuing_bank = $request['issuing_bank'];
        $negotiating_bank = $request['negotiating_bank'];
        $benificiary_bank = $request['benificiary_bank'];
        $advising_bank = $request['advising_bank'];
        $partial_shipment = $request['partial_shipment'];
        $ammendment_clause = $request['ammendment_clause'];
        $special_condition = $request['special_condition'];
        $notify_party = $request['notify_party'];
       LC::where('lc_id',$lc_id)->where('lc_ammend_no',$ammendment_no)->update(['office_ref_no'=>$office_ref,'issue_date'=>$issue_date,
       'amount'=>$amount,'expiry_date'=>$expiry_date,'payment_method'=>$payment_method,'sight_days'=>$sight_days,'shipment_date'=>$last_date_shipment,
       'export_lc_no'=>$export_lc_no,'export_lc_date'=>$export_lc_date,'ref'=>$ref,'sales_contract_no'=>$sales_contact_no,'area_code'=>$area_code,
       'order_no_with_date'=>$order_no_with_date,'overdue_interest'=>$overdue_interest,'vat_registration_no'=>$vat_registration_no,'dollar_deducted'=>$discrepancy_charge,
       'others_charge'=>$other_charge,'export_garments_qty'=>$export_garments_quantity,'negotiation_within'=>$negotiation,'buyer_id'=>$buyer,'issuing_bank_id'=>$issuing_bank,
       'negotiating_bank_id'=>$negotiating_bank,'beneficiary_bank_id'=>$benificiary_bank,'partial_shipment'=>$partial_shipment,
       'lc_ammend_clause'=>$ammendment_clause,'special_conditions'=>$special_condition,'notify_party'=>$notify_party,'finally_approved'=>Auth::user()->id]);
        Event::fire(new NewDO($lc_id,$ammendment_no));
        return redirect()->back();
    }
    //Confirming a PI
    public function confirm_pi(){
        $rowdata = Input::get('rowdata');
        $pi_id = Input::get('pi_id');
        $status = Input::get('status');
        if($status == '1'){
            if (Auth::check())
            {
                $u_id =  Auth::user()->id;
            }
            $pi_date = Input::get('pi_date');
            $offer_validity = Input::get('offer_validity');
            $buyer = Input::get('buyer');
            $bank = Input::get('bank');
            $overdue_interest = Input::get('overdue_interest');
            $payment_period = Input::get('payment_period');
            Pi_Good::where('pi_id',$pi_id)->delete();
            PI::where('pi_id',$pi_id)->update(['pi_date'=>$pi_date,'buyer_id'=>$buyer,'bank_id'=>$bank,'offer_validity'=>$offer_validity,
            'payment_period'=>$payment_period,'overdue_interest'=>$overdue_interest,'approved_by'=>Auth::user()->id]);


        }
        DB::insert('insert into goods (pi_id,item_no,description,quantity,unit_price) values(?,?,?,?,?)',[$pi_id,$rowdata[0],$rowdata[1],$rowdata[2],$rowdata[3]]);
    }
    //Making an advance DO
    public function do_goods()
    {
        $rowdata = Input::get('rowdata');
        $pi_id = Input::get('pi_id');
        $do_id = Input::get('order_no');
        $pi_goods = DB::table('goods')->select('quantity','unit_price')->where('pi_id',$pi_id)->get();
        $main_total = 0;
        $req_total = 0;
        foreach ($pi_goods as $pg){
            $main_total+= $pg->quantity*$pg->unit_price;
        }
        foreach ($rowdata as $r){
            $req_total+= $r['quantity']*$r['unit_price'];
        }
        if($main_total == $req_total){
            foreach ($rowdata as $row) {

                DB::table('do_goods')->insert(['order_no'=>$do_id,'pi_id'=>$pi_id,'description'=>$row['description'],'quantity'=>$row['quantity'],
                    'unit_price'=>$row['unit_price'],'requested'=>$row['requested']]);
            }
            DB::table('notifications')->insert(['type'=>'Advance DO','doc_id'=>$do_id,'part'=>0,'description'=>'New Advance Inserted','insertion_time'=>date('Y-m-d')]);
            return "Advance DO created Successfully";
        }
       else{
           return "The Amount is not same";
       }
    }
    public function populate_goods_pi(){
        $data = Advance_DO_Good::where('pi_id',Input::get('pi_no'))->count();
        if($data<=0){
            $data = DB::table('goods')->select('*')->where('pi_id', Input::get('pi_no'))->get();
        }
        else{
            $data = "This PI has Advance Delivery";
        }
        return $data;
    }
    public function get_do_detail(){
        $do_id = Input::get('do_id');
        $data = DeliveryOrder::where('order_no',$do_id)->first();
        return $data;
    }
    public function count_pi(){
        $pi_id = Input::get('pi_id');
        $pi_count = PI::where('pi_id', 'LIKE', '%OSML/EX/PI/'.Input::get('pi_id'))->count();
        //$pi_count = PI::where('pi_id', Input::get('pi_id'))->count();
        return $pi_count;
    }
}
