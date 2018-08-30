<?php

namespace App\Http\Controllers;

use App\Bank;
use App\Buyer;
use App\Delivery_doc;
use App\Events\NewNotification;
use App\Goods;
use App\LC;
use App\Notification;
use App\PI;
use App\Providers\EventServiceProvider;
use App\User;
use Doctrine\Common\Inflector\Inflector;
use Hamcrest\Core\IsNull;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Event;
use Barryvdh\DomPDF\Facade as PDF;
use Exception;

class HomeController extends Controller
{
    

    public function login_page(){
        return view('login');
    }
    public function login_action(Request $request){
        if(Auth::attempt(['email'=>$request['email'], 'password'=>$request['password']])){
                return redirect()->route('profile');
        }
        else{
            return redirect()->back();
        }
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('loginpage');
    }
    public function createpi(){
        $banks = Bank::all();
        $buyers = Buyer::all();
        return view('createpi',compact('banks','buyers'));
    }
    public function change_profile(Request $request){

        if(Hash::check($request['old_password'],Auth::user()->password)){
            if($request['new_password'] == $request['confirm_password']){
                DB::table('users')
                    ->where('email', Auth::user()->email)
                    ->update(['email' => $request['email'],'password' => Hash::make($request['new_password'])]);
                Session::flash('flash_message','successfully Updated.');
                return redirect()->route('profile');
            }
            else{
                return "New Password and Confirm Password didn't match";
            }
        }
        else{
            return "Wrong Password";
        }
    }
    public function profile(){
        return view('profile');
    }
    public function create_document(){
        return view('create_document');
    }
    public function edit_bank_info(){
        $data = Bank::select('bank_name', \DB::raw("count(bank_id)"))->groupBy('bank_name')->get();
        return view('edit_bank_info',compact('data'));
    }
    public function edit_buyer_info(){
        $data = Buyer::all();
        return view('edit_buyer_info',compact('data'));
    }
    public function createlc(){
        $banks = DB::select('select bank_id,bank_name,branch from banks');
        $buyers = DB::select('select buyer_id, buyer_name from buyers');
        $pi = PI::all();
        return view('createlc',compact('pi','banks','buyers'));
    }
    public function notification(){
        $notifications = Notification::all();
        return view('notification',compact('notifications'));
    }
    public function search(){
        return view('search');
    }
    public function select_bank()
    {
        $input = Input::get('option');
        $items = Bank::where('bank_name', '=', $input)->lists('branch');
        return $items;
    }
    public function select_branch(Request $request){
        $input = Input::get('sem');
        $data = DB::select("select bank_name as bank_name, address as address, branch as bank_branch, admin_name as admin_name, designation as designation, swift as swift from banks where branch = '$input'");
        return $data;
    }
    public function edit_bank(Request $request){
        $select_bank = $request['bank'];
        $select_branch = $request['branch'];
        $bank_name = $request['bank_name'];
        $branch_name  = $request['branch_name'];
        $address = $request['address'];
        $admin = $request['admin_name'];
        $designation = $request['admin_designation'];
        $swift = $request['swift'];
        if($select_bank == "add_bank" || $select_branch == "new_branch"){
            if($bank_name == "add_bank"){
                return "Give a Bank Name";
            }
            DB::insert('insert into banks (bank_name,branch,admin_name,designation,address,swift) values(?,?,?,?,?,?)',[$bank_name,$branch_name,$admin,$designation,$address,$swift]);
            return redirect()->back();
        }
        else{
            $do_update = DB::update("update banks set admin_name = '$admin',designation = '$designation',address = '$address',swift = '$swift' where bank_name = '$bank_name' and branch = '$branch_name'");
            if(!$do_update){
                return "NO SUCH Bank Found";
            }
            return redirect()->back();
        }
    }
    public function get_buyer(){
        $input = Input::get('sem');
        $data = DB::select("select buyer_id as b_id, buyer_name as buyer_name, office_address as office_address, factory_address as factory_address from buyers where buyer_id = '$input'");
        return $data;
    }
    public function change_buyer(Request $request){
        $buyer_name = $request['buyer_name'];
        $office = $request['office_address'];
        $factory = $request['factory_address'];
        $buyer_id = $request['buyer_id'];
        if(!empty($buyer_id)){
            DB::update("update buyers set buyer_name = '$buyer_name',office_address = '$office',factory_address = '$factory' where buyer_id = '$buyer_id'");

        }
        else{
            DB::insert('insert into buyers (buyer_name,office_address,factory_address) values(?,?,?)',[$buyer_name,$office,$factory]);

        }
        return redirect()->back();
    }
    //Saving PI here
    public function doinsertgoods(){
        $sl = 1;
        $rowdata = Input::get('rowdata');
        $pi_id = Input::get('pi_id');
            if (Auth::check())
            {
               $u_id =  Auth::user()->id;
            }
            $offer_validity = Input::get('offer_validity');
            $buyer = Input::get('buyer');
            $bank = Input::get('bank');
            $overdue_interest = Input::get('overdue_interest');
            $payment_period = Input::get('payment_period');

            DB::table('proforma_invoice')->insert(['pi_id'=>$pi_id,'pi_creator_user_id'=>$u_id,'pi_date'=>date("Y-m-d"),'buyer_id'=>$buyer,'bank_id'=>$bank,'special_instruction'=>Input::get('special_instruction'),
            'offer_validity'=>$offer_validity,'payment_period'=>$payment_period,'overdue_interest'=>$overdue_interest,'special_instruction'=>Input::get('special_instruction')]);
            

       foreach ($rowdata as $row){

            DB::insert('insert into goods (pi_id,item_no,description,quantity,unit_price) values(?,?,?,?,?)',[$pi_id,$sl,$row['description'],$row['quantity'],$row['unit_price']]);
           $sl = $sl+1;
        }
 
    }
    //Getting the ammendment for an LC
    public function pick_ammendment(){
        $pi = Input::get('lc');
        $count = LC::where(['lc_id' => $pi])->count();
        return $count;
    }
    //LC detail saved here
    public function doinsertlc(){

        $lc_no = Input::get('lc_no');
        $pi = Input::get('pis');
        $ammendment_no = Input::get('ammendment_no');
        $internal_office_no = Input::get('internal_office_no');
        $issuing_date = Input::get('issuing_date');
        $amount = Input::get('amount');
        $expiry_date = Input::get('expiry_date');
        $payment_method = Input::get('payment_method');
        $sight_days = Input::get('sight_days');
        $last_date_shipment = Input::get('last_date_shipment');
        $export_lc_no = Input::get('export_lc_no');
        $export_lc_date = Input::get('export_lc_date');
        $ref = Input::get('ref');
        $sales_contact_no = Input::get('sales_contact_no');
        $area_code = Input::get('area_code');
        $order_no_date = Input::get('order_no_date');
        $overdue_interest = Input::get('overdue_interest');
        $vat_registration_no = Input::get('vat_registration_no');
        $discrepancy_charge = Input::get('discrepancy_charge');
        $other_charge = Input::get('other_charge');
        $export_garments_quantity = Input::get('export_garments_quantity');
        $nagotiation = Input::get('nagotiation');
        $buyer = Input::get('buyer');
        $issuing_bank = Input::get('issuing_bank');
        $nagotiating_bank = Input::get('nagotiating_bank');
        $benificiary_bank = Input::get('benificiary_bank');
        $partial_shipment = Input::get('partial_shipment');
        $ammendment_clause = Input::get('ammendment_clause');

        $special_conditions = Input::get('special_conditions');
        $notify_party = Input::get('notify_party');

        if (Auth::check())
        {
            $u_id =  Auth::user()->id;
        }
        
        DB::insert('insert into letter_of_credit (lc_id, lc_creator_user_id, lc_ammend_no, office_ref_no,lc_ammend_clause,buyer_id,issuing_bank_id,negotiating_bank_id,beneficiary_bank_id,sight_days,issue_date,amount,expiry_date,shipment_date,export_lc_no,
                    export_lc_date,partial_shipment,negotiation_within,vat_registration_no,dollar_deducted,others_charge,special_conditions,payment_method,export_garments_qty,overdue_interest,ref,sales_contract_no,area_code,order_no_with_date,notify_party) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)',
            [$lc_no,$u_id,$ammendment_no,$internal_office_no,$ammendment_clause,$buyer,$issuing_bank,$nagotiating_bank,$benificiary_bank,$sight_days,$issuing_date,$amount,$expiry_date,$last_date_shipment,$export_lc_no,
            $export_lc_date,$partial_shipment,$nagotiation,$vat_registration_no,$discrepancy_charge,$other_charge,$special_conditions,$payment_method,$export_garments_quantity,$overdue_interest,$ref,$sales_contact_no,$area_code,$order_no_date,$notify_party]);
        foreach ($pi as $pirow){
            DB::insert('insert into lc_pi_relation (pi_id, lc_id, ammend_no) VALUES (?,?,?)',[$pirow, $lc_no,$ammendment_no]);
        }
        Event::fire(new NewNotification('LC',$lc_no,$ammendment_no));
        return redirect()->route('createlc');
    }
    //Getting the goods of an LC
    public function populate_goods(){
        $pi_array = array();
        $lc_no = Input::get('lc_no');
        $ammendment_no = Input::get('ammendment_no');
       $data =  DB::table('goods')
            ->select('*')
            ->whereIn('pi_id', function($query)
            {
                $query->select('pi_id')
                    ->from('lc_pi_relation')->where('lc_id',Input::get('lc_no'))->where('ammend_no',Input::get('ammendment_no'));
            })
            ->get();
        return $data;
        
    }
    //Sending the value for generating PI pdf
    public function pi_data_global(){
        
        $pi_array_data = array('pi_id' => Input::get('pi_id'),'revision' => Input::get('revision'), 'offer_date'=>Input::get('offer_date'),'buyer'=>Input::get('buyer'),'bank'=>Input::get('bank'),
            'overdue_interest'=> Input::get('overdue_interest'), 'payment_period' => Input::get('payment_period'),'goods'=>Input::get('goods'));
        
        return json_encode($pi_array_data);

    }
    //Generating the pdf of PI
    public function generate_pi_pdf(Request $request){
        $pdf_data = $request->input('pdf_values');
        $pdf_data = json_decode($pdf_data);
        $buyer_id = $pdf_data->buyer;
        $buyer_info = DB::table('buyers')->where('buyer_id', $buyer_id)->first();
        $bank_id = $pdf_data->bank;
        $bank_info = DB::table('banks')->where('bank_id',$bank_id)->first();
        $pdf = PDF::loadView('doc',compact('pdf_data','buyer_info','bank_info'));
        return $pdf->stream('invoice.pdf');
    }
    //Document created here
    public function create_doc(){
        $total_quantity = 0;
        $lc_no = Input::get('lc_no');
        $lc_ammendment_no = Input::get('lc_ammendment_no');
        $document_number = Input::get('document_number');
        $packing = Input::get('packing');
        $document_date = Input::get('document_date');
        $hs = Input::get('hs');
        $imp_auth_no = Input::get('imp_auth_no');
        $insurance_no = Input::get('insurance_no');
        $irc_no = Input::get('irc_no');
        $truck_no = Input::get('truck_no');
        $shipping_marks = Input::get('shipping_marks');
        $payment_terms = Input::get('payment_terms');
        $doc_serial = Delivery_doc::where('doc_id', 'LIKE', '%OSLM/EX/DOC/'.substr(date('Y'),-2).'%')->count()+1;
        $doc_id = "OSLM/EX/DOC/".substr(date('Y'),-2)."/".$doc_serial;
        $doc_part_no = Input::get('doc_part_no');
        $amount = 0.0;
        $goods = Input::get('rowdata');
        foreach ($goods as $row){
            $pi = $row['pi'];
            $product = $row['description'];
            $quantity = $row['quantity'];
            $net_weight = $row['net_weight'];
            $total_quantity+=$net_weight;
            $gross_weight = $row['gross_weight'];
            $unit_price = $row['unit_price'];
            $amount = $amount+($net_weight*$unit_price);
            DB::table('doc_goods')->insert(
                ['doc_id' => $doc_id,'doc_part_no' => $doc_part_no,'pi'=>$pi,'description' => $product,'quantity' => $quantity, 'unit_price' => $unit_price, 'gross_weight' => $gross_weight,
                    'net_weight' => $net_weight]
            );
        }
        $packing_bags_count = ceil($total_quantity/500);
        DB::table('delivery_document')->insert(
            ['doc_id' => $doc_id,'doc_part_no'=>$doc_part_no,'document_creation_date'=>$document_date,'lc_id'=>$lc_no,'lc_ammend_no'=>$lc_ammendment_no,'be_id'=>"OSLM/BE/DOC/".substr(date('Y'),-2)."/".$doc_serial,'tc_id'=>"OSLM/TC/DOC/".substr(date('Y'),-2)."/".$doc_serial,'irc_no'=>$irc_no,'hs_code_no'=>$hs,'truck_no'=>$truck_no,
            'ci_id'=>"OSLM/EX/CI/".substr(date('Y'),-2)."/".$doc_serial,'shipping_marks'=>$shipping_marks,'payment_tarms'=>$payment_terms,'dc_id'=>"OSLM/EX/DC/".substr(date('Y'),-2)."/".$doc_serial,'insurance_no'=>$insurance_no,'import_authorization_no'=>$imp_auth_no,'packing_bags_count'=>$packing_bags_count,'packing'=>$packing,
            'packing_list_id'=>"OSLM/EX/PL/".substr(date('Y'),-2)."/".$doc_serial,'order_no'=>"OSLM/DO/".substr(date('Y'),-2)."/".$doc_serial,'doc_creator_user_id'=>Auth::user()->id,'total_amount'=>$amount]
        );
        /*$objLc = LC::where('lc_id','final er final')->first()->issuing_bank;
        return $objLc;*/
        $data = Delivery_doc::where('doc_id',$doc_id)->first();
        return json_encode($data);


    }
    //Getting the goods list for autocomplete
    public function get_goods(){
        $goods = DB::table('available_goods')->select('name','unit_price')->get();
        return $goods;
    }
    public function products(){
        $products = Goods::all();
        return view('products',compact('products'));
    }
    public function insert_product(Request $request){
        $name = $request['product_name'];
        $unit_price = $request['unit_price'];
        DB::table('available_goods')->insert(['name'=>$name, 'unit_price'=>$unit_price]);
        return redirect()->route('products');
    }
    public function delete_product($id = null){
       Goods::find($id)->delete();
        return redirect()->route('products');
    }
    public function get_price(){
        $name = Input::get('name');
        $price = Goods::where('name',$name)->select('unit_price');
        return $price;
    }
    //Generating wfca table
    public function wfca(){
        $mainarray = Array();
        $row = 0;
        $pi = Array();
        $pi_goods = Array();
        $i = 0; $j = 0;
        $document  = DB::table('delivery_document')->where('table_status','wfca')->select('doc_id','lc_id','del_com_date')->get();
        foreach ($document as $doc){
            $j = 0;
            $total = 0;
            $pi = [];
            $mainarray[$i][$j] = $doc->doc_id;

            $j++;
            $mainarray[$i][$j] = $doc->lc_id;
            $j++;
            $goods = DB::table('doc_goods')->where('doc_id',$mainarray[$i][0])->select('pi','description','quantity','unit_price','gross_weight','net_weight')->get();

            $row+=sizeof($goods);
            $mainarray[$i][$j] = $goods;
            foreach($mainarray[$i][2] as $ma){
                $total+=$ma->quantity*$ma->unit_price;
                if(!in_array($ma->pi,$pi)){
                    array_push($pi,$ma->pi);
                    $pi_goods[$ma->pi] = DB::table('doc_goods')->where('doc_id',$mainarray[$i][0])->where('pi',$ma->pi)->select('description','quantity','unit_price','gross_weight','net_weight')->get();
                }

            }
            $j++;
            $mainarray[$i][$j] = $pi;
            /*for($k=0;$k<sizeof($mainarray[$i][$j]);$k++){
                $pi_goods[$k] =  DB::table('doc_goods')->where('doc_id',$mainarray[$i][0])->where('pi',$mainarray[$i][$j][$k])->select('description','quantity','unit_price','gross_weight','net_weight')->get();
            }*/
            $j++;
            $mainarray[$i][$j] = $total;
            $j++;
            $buyer = LC::where('lc_id',$mainarray[$i][1])->first()->buyer;
            $mainarray[$i][$j] = $buyer->buyer_name;
            $j++;
            $lc = LC::where('lc_id',$mainarray[$i][1])->first();
            $mainarray[$i][$j] = $lc->issue_date;
            $j++;
            $mainarray[$i][$j] = $lc->shipment_date;
            $j++;
            $mainarray[$i][$j] = $lc->expiry_date;
            $j++;
            $mainarray[$i][$j] = $lc->sight_days;
            $j++;
            $ci_id = DB::table('delivery_document')->where('doc_id',$mainarray[$i][0])->first();
            $mainarray[$i][$j] = $ci_id->ci_id;
            $j++;
            $mainarray[$i][$j] = $ci_id->del_com_date;
            $i++;



        }
        return view('loop',compact('mainarray'));
        //dd($mainarray);



    }
    //generating the wfba table
    public function wfba(){
        $mainarray = Array();
        $row = 0;
        $pi = Array();
        $pi_goods = Array();
        $i = 0; $j = 0;
        $document  = DB::table('delivery_document')->where('table_status','wfba')->select('doc_id','lc_id')->get();
        foreach ($document as $doc){
            $j = 0;
            $total = 0;
            $pi = [];
            $mainarray[$i][$j] = $doc->doc_id;

            $j++;
            $mainarray[$i][$j] = $doc->lc_id;
            $j++;
            $goods = DB::table('doc_goods')->where('doc_id',$mainarray[$i][0])->select('pi','description','quantity','unit_price','gross_weight','net_weight')->get();

            $row+=sizeof($goods);
            $mainarray[$i][$j] = $goods;
            foreach($mainarray[$i][2] as $ma){
                $total+=$ma->quantity*$ma->unit_price;
                if(!in_array($ma->pi,$pi)){
                    array_push($pi,$ma->pi);
                    $pi_goods[$ma->pi] = DB::table('doc_goods')->where('doc_id',$mainarray[$i][0])->where('pi',$ma->pi)->select('description','quantity','unit_price','gross_weight','net_weight')->get();
                }

            }
            $j++;
            $mainarray[$i][$j] = $pi;
            /*for($k=0;$k<sizeof($mainarray[$i][$j]);$k++){
                $pi_goods[$k] =  DB::table('doc_goods')->where('doc_id',$mainarray[$i][0])->where('pi',$mainarray[$i][$j][$k])->select('description','quantity','unit_price','gross_weight','net_weight')->get();
            }*/
            $j++;
            $mainarray[$i][$j] = $total;
            $j++;
            $buyer = LC::where('lc_id',$mainarray[$i][1])->first()->buyer;
            $mainarray[$i][$j] = $buyer->buyer_name;
            $j++;
            $lc = LC::where('lc_id',$mainarray[$i][1])->first();
            $mainarray[$i][$j] = $lc->issue_date;
            $j++;
            $mainarray[$i][$j] = $lc->shipment_date;
            $j++;
            $mainarray[$i][$j] = $lc->expiry_date;
            $j++;
            $mainarray[$i][$j] = $lc->sight_days;
            $j++;
            $ci_id = DB::table('delivery_document')->where('doc_id',$mainarray[$i][0])->first();
            $mainarray[$i][$j] = $ci_id->ci_id;
            $j++;
            $mainarray[$i][$j] = $ci_id->maturity;
            $j++;
            $mainarray[$i][$j] = $ci_id->bank_submission;
            $j++;
            $mainarray[$i][$j] = $ci_id->bank_ref_no;
            $i++;


        }
        //return view('wfca',compact('mainarray','pi_goods'));
        // return sizeof($pi_goods[$mainarray[0][3][0]]);
        //dd($mainarray);
        return view('wfba',compact('mainarray'));


    }
    public function add_del_com(){
        $docs = DB::table('delivery_document')->where('table_status','wfca')->where('del_com_date','0-0-0')->get();
        return view('add_del_com',compact('docs'));
    }
    public function route_add_del_com(Request $request){
        $doc_id = $request['doc_id'];
        DB::table('delivery_document')
            ->where('doc_id', $doc_id)
            ->update(['del_com_date'=>$request['com_date'] ]);
        return redirect()->back();
    }
    //Generating the order in hand table
    public function order_in_hand(){
        $mainarray = Array();
        $i = 0;
        $lc = LC::all();
        foreach ($lc as $l){
            $order_in_hand_product = Array();
            $j = 0;
            $pi_array = Array();
            $total_lc_quantity  = 0;
            $total_lc_goods_delivered = 0;
            $completed_doc_array = Array();
            $not_delivered_doc_array = Array();
            $pis = DB::table('lc_pi_relation')->where('lc_id',$l->lc_id)->select('pi_id')->get();
            foreach ($pis as $pi){
                array_push($pi_array,$pi->pi_id);
            }
           $all_pis = DB::table('goods')->whereIn('pi_id',$pi_array)->get();
            foreach ($all_pis as $all_pi){
                $total_lc_quantity+=$all_pi->quantity;
            }
            $delivered_docs = DB::table('delivery_document')->where('lc_id',$l->lc_id)->where('del_com_date','!=','0-0-0')->get();
            foreach ($delivered_docs as $delivered_doc){
                array_push($completed_doc_array,$delivered_doc->doc_id);
            }
            $delivered_lc_goods = DB::table('doc_goods')->whereIn('doc_id',$completed_doc_array)->whereIn('pi',$pi_array)->get();
            foreach ($delivered_lc_goods as $delivered_lc_good){
                $total_lc_goods_delivered+=$delivered_lc_good->quantity;
            }
            if($total_lc_quantity>$total_lc_goods_delivered){
                $mainarray[$i][$j] = $l->buyer->buyer_name;
                $j++;
                $mainarray[$i][$j] = $l->lc_id;
                $j++;
                $mainarray[$i][$j] = $l->issue_date;
                $j++;
                $mainarray[$i][$j] = $l->shipment_date;
                $j++;
                $mainarray[$i][$j] = $l->expiry_date;
                $j++;
                if($l->sight_days != 0){
                    $mainarray[$i][$j] = $l->sight_days;
                }
                else{
                    $mainarray[$i][$j] = 'at sight';
                }

                $j++;
                $k = 0;
                foreach ($pis as $pi){

                    $current_pi_goods_quantity = 0;
                    $current_pi_del_goods_quantity = 0;
                    $current_pi_goods = DB::table('goods')->where('pi_id',$pi->pi_id)->get();
                    foreach ($current_pi_goods as $curren_pi_good){
                        $current_pi_goods_quantity+=$curren_pi_good->quantity;
                    }
                    $not_delivered_docs = DB::table('delivery_document')->where('del_com_date','0-0-0')->get();
                    foreach ($not_delivered_docs as $not_delivered_doc){
                        array_push($not_delivered_doc_array,$not_delivered_doc->doc_id);
                    }
                    $doc_pi_delivered_goods = DB::table('doc_goods')->where('pi',$pi->pi_id)->whereNotIn('doc_id',$not_delivered_doc_array)->get();
                    foreach ($doc_pi_delivered_goods as $doc_pi_delivered_good){
                        $current_pi_del_goods_quantity+=$doc_pi_delivered_good->net_weight;
                    }
                    if($current_pi_goods_quantity>$current_pi_del_goods_quantity){
                        $mainarray[$i][$j][$k] = $pi->pi_id;
                        $k++;
                    }

                }
                $j++;
                for($m = 0; $m<sizeof($mainarray[$i][6]); $m++){
                    $daily_input_qty = 0;
                    $pi_all_goods = DB::table('goods')->where('pi_id',$mainarray[$i][6][$m])->get();
                    foreach ($pi_all_goods as $pi_all_good){
                        $already_delivered = 0;
                        $this_product_quantity = DB::table('goods')->where('pi_id',$mainarray[$i][6][$m])->where('description',$pi_all_good->description)->first();
                        $this_product_del_quantity = DB::table('doc_goods')->where('pi',$mainarray[$i][6][$m])->where('description',$pi_all_good->description)
                            ->get();
                        foreach ($this_product_del_quantity as $del_q){
                            $already_delivered+=$del_q->net_weight;
                        }
                        $from_daily_inputs = DB::table('delivered_do_product')->where('pi_id',$mainarray[$i][6][$m])->where('description',$pi_all_good->description)->get();
                        foreach ($from_daily_inputs as $from_daily_input){
                            $daily_input_qty+=$from_daily_input->quantity;
                        }
                        if($this_product_quantity->quantity>$already_delivered || $this_product_quantity->quantity<$already_delivered){
                            $today_del_qty  = 0;

                            $today_deliverys = DB::table('delivered_do_product')->where('delivered_data',date('Y-m-d'))->where('pi_id',$mainarray[$i][6][$m])->where('description',$pi_all_good->description)->get();
                            foreach ($today_deliverys as $today_delivery){
                                $today_del_qty+=$today_delivery->quantity;
                            }
                            $balance_quantity = $this_product_quantity->quantity-$already_delivered-$today_del_qty;
                            $this_good_detail = DB::select("select pi_id,description,unit_price,'$balance_quantity' AS balance,'$today_del_qty' AS today_del, '$this_product_quantity->quantity' as qty from goods where pi_id = ? and description = ?",[$mainarray[$i][6][$m],$pi_all_good->description]);
                            $order_in_hand_product = array_merge($order_in_hand_product,$this_good_detail);
                        }
                    }
                }
                $mainarray[$i][$j] = $order_in_hand_product;

                $i++;
            }
        }
       return view('order_in_hand',compact('mainarray','today_deliverys'));
    }
    public function add_bank_submission_ref(){
        $docs = DB::table('delivery_document')->where('table_status','wfca')->get();
        return view('add_bank_submission_ref',compact('docs'));
    }
    //Getting a doc into wfba from wfca
    public function route_wfba(Request $request){
        $ci_id = $request['doc_id'];
        $submission_date = $request['submission_date'];
        $bank_ref_no = $request['bank_ref_no'];
        DB::table('delivery_document')
            ->where('doc_id', $ci_id)
            ->update(['table_status' => 'wfba','bank_submission'=>$submission_date, 'bank_ref_no'=>$bank_ref_no ]);
        return redirect()->back();
    }
    public function add_maturity(){
        $docs = DB::table('delivery_document')->where('table_status','wfba')->get();
        return view('add_maturity',compact('docs'));
    }
    //Getting a doc into drp table
    public function route_drp(Request $request){
        $doc_id = $request['doc_id'];
        $maturity = $request['maturity_date'];
        DB::table('delivery_document')->where('doc_id',$doc_id)
            ->update(['table_status'=>'drp', 'maturity'=>$maturity]);
        return redirect()->back();
    }
    //Generating the drp table
    public function drp(){
        $mainarray = Array();
        $row = 0;
        $pi = Array();
        $pi_goods = Array();
        $i = 0; $j = 0;
        $document  = DB::table('delivery_document')->where('table_status','drp')->select('doc_id','lc_id')->get();
        foreach ($document as $doc){
            $j = 0;
            $total = 0;
            $pi = [];
            $mainarray[$i][$j] = $doc->doc_id;

            $j++;
            $mainarray[$i][$j] = $doc->lc_id;
            $j++;
            $goods = DB::table('doc_goods')->where('doc_id',$mainarray[$i][0])->select('pi','description','quantity','unit_price','gross_weight','net_weight')->get();

            $row+=sizeof($goods);
            $mainarray[$i][$j] = $goods;
            foreach($mainarray[$i][2] as $ma){
                $total+=$ma->quantity*$ma->unit_price;
                if(!in_array($ma->pi,$pi)){
                    array_push($pi,$ma->pi);
                    $pi_goods[$ma->pi] = DB::table('doc_goods')->where('doc_id',$mainarray[$i][0])->where('pi',$ma->pi)->select('description','quantity','unit_price','gross_weight','net_weight')->get();
                }

            }
            $j++;
            $mainarray[$i][$j] = $pi;
            $j++;
            $mainarray[$i][$j] = $total;
            $j++;
            $buyer = LC::where('lc_id',$mainarray[$i][1])->first()->buyer;
            $mainarray[$i][$j] = $buyer->buyer_name;
            $j++;
            $lc = LC::where('lc_id',$mainarray[$i][1])->first();
            $mainarray[$i][$j] = $lc->issue_date;
            $j++;
            $mainarray[$i][$j] = $lc->shipment_date;
            $j++;
            $mainarray[$i][$j] = $lc->expiry_date;
            $j++;
            $mainarray[$i][$j] = $lc->sight_days;
            $j++;
            $ci_id = DB::table('delivery_document')->where('doc_id',$mainarray[$i][0])->first();
            $mainarray[$i][$j] = $ci_id->ci_id;
            $j++;
            $mainarray[$i][$j] = $ci_id->maturity;
            $j++;
            $mainarray[$i][$j] = $ci_id->bank_submission;
            $j++;
            $mainarray[$i][$j] = $ci_id->bank_ref_no;
            $i++;


        }
        //return view('wfca',compact('mainarray','pi_goods'));
        // return sizeof($pi_goods[$mainarray[0][3][0]]);
        //dd($mainarray);
        return view('drp',compact('mainarray'));
    }
    public function add_purchase_date(){
        $docs = DB::table('delivery_document')->where('table_status','drp')->get();
        return view('add_purchase_date',compact('docs'));
    }
    public function route_purchase(Request $request){
        $doc_id = $request['doc_id'];
        $purchase_date = $request['purchase_date'];
        $purchase_amount = $request['purchase_amount'];
        DB::table('delivery_document')->where('doc_id',$doc_id)
            ->update(['table_status'=>'purchase', 'purchase_date'=>$purchase_date,'purchase_amount'=>$purchase_amount]);
        return redirect()->back();
    }
    //Generating the purchase table
    public function purchase_table(){
        $mainarray = Array();
        $row = 0;
        $pi = Array();
        $pi_goods = Array();
        $i = 0; $j = 0;
        $document  = DB::table('delivery_document')->where('table_status','purchase')->select('doc_id','lc_id')->get();
        foreach ($document as $doc){
            $j = 0;
            $total = 0;
            $pi = [];
            $mainarray[$i][$j] = $doc->doc_id;

            $j++;
            $mainarray[$i][$j] = $doc->lc_id;
            $j++;
            $goods = DB::table('doc_goods')->where('doc_id',$mainarray[$i][0])->select('pi','description','quantity','unit_price','gross_weight','net_weight')->get();

            $row+=sizeof($goods);
            $mainarray[$i][$j] = $goods;
            foreach($mainarray[$i][2] as $ma){
                $total+=$ma->quantity*$ma->unit_price;
                if(!in_array($ma->pi,$pi)){
                    array_push($pi,$ma->pi);
                    $pi_goods[$ma->pi] = DB::table('doc_goods')->where('doc_id',$mainarray[$i][0])->where('pi',$ma->pi)->select('description','quantity','unit_price','gross_weight','net_weight')->get();
                }

            }
            $j++;
            $mainarray[$i][$j] = $pi;
            /*for($k=0;$k<sizeof($mainarray[$i][$j]);$k++){
                $pi_goods[$k] =  DB::table('doc_goods')->where('doc_id',$mainarray[$i][0])->where('pi',$mainarray[$i][$j][$k])->select('description','quantity','unit_price','gross_weight','net_weight')->get();
            }*/
            $j++;
            $mainarray[$i][$j] = $total;
            $j++;
            $buyer = LC::where('lc_id',$mainarray[$i][1])->first()->buyer;
            $mainarray[$i][$j] = $buyer->buyer_name;
            $j++;
            $lc = LC::where('lc_id',$mainarray[$i][1])->first();
            $mainarray[$i][$j] = $lc->issue_date;
            $j++;
            $mainarray[$i][$j] = $lc->shipment_date;
            $j++;
            $mainarray[$i][$j] = $lc->expiry_date;
            $j++;
            $mainarray[$i][$j] = $lc->sight_days;
            $j++;
            $ci_id = DB::table('delivery_document')->where('doc_id',$mainarray[$i][0])->first();
            $mainarray[$i][$j] = $ci_id->ci_id;
            $j++;
            $mainarray[$i][$j] = $ci_id->maturity;
            $j++;
            $mainarray[$i][$j] = $ci_id->bank_submission;
            $j++;
            $mainarray[$i][$j] = $ci_id->bank_ref_no;
            $j++;
            $mainarray[$i][$j] = $ci_id->purchase_date;
            $i++;


        }
        //return view('wfca',compact('mainarray','pi_goods'));
        // return sizeof($pi_goods[$mainarray[0][3][0]]);
        //dd($mainarray);
        return view('purchase_table',compact('mainarray'));
    }
    public function payment_receive(){
        $docs = DB::table('delivery_document')->where('table_status','purchase')->get();
        return view('payment_receive',compact('docs'));
    }
    public function route_realization(Request $request){
        $doc_id = $request['doc_id'];
        $payment_received_date = $request['payment_date'];
        DB::table('delivery_document')->where('doc_id',$doc_id)
            ->update(['table_status'=>'realization', 'payment_receive'=>$payment_received_date]);
        return redirect()->back();
    }
    //Viewing the realization table
    public function realization_table(){
        $mainarray = Array();
        $row = 0;
        $pi = Array();
        $pi_goods = Array();
        $i = 0; $j = 0;
        $document  = DB::table('delivery_document')->where('table_status','realization')->select('doc_id','lc_id')->get();
        foreach ($document as $doc){
            $j = 0;
            $total = 0;
            $pi = [];
            $mainarray[$i][$j] = $doc->doc_id;

            $j++;
            $mainarray[$i][$j] = $doc->lc_id;
            $j++;
            $goods = DB::table('doc_goods')->where('doc_id',$mainarray[$i][0])->select('pi','description','quantity','unit_price','gross_weight','net_weight')->get();

            $row+=sizeof($goods);
            $mainarray[$i][$j] = $goods;
            foreach($mainarray[$i][2] as $ma){
                $total+=$ma->quantity*$ma->unit_price;
                if(!in_array($ma->pi,$pi)){
                    array_push($pi,$ma->pi);
                    $pi_goods[$ma->pi] = DB::table('doc_goods')->where('doc_id',$mainarray[$i][0])->where('pi',$ma->pi)->select('description','quantity','unit_price','gross_weight','net_weight')->get();
                }

            }
            $j++;
            $mainarray[$i][$j] = $pi;
            /*for($k=0;$k<sizeof($mainarray[$i][$j]);$k++){
                $pi_goods[$k] =  DB::table('doc_goods')->where('doc_id',$mainarray[$i][0])->where('pi',$mainarray[$i][$j][$k])->select('description','quantity','unit_price','gross_weight','net_weight')->get();
            }*/
            $j++;
            $mainarray[$i][$j] = $total;
            $j++;
            $buyer = LC::where('lc_id',$mainarray[$i][1])->first()->buyer;
            $mainarray[$i][$j] = $buyer->buyer_name;
            $j++;
            $lc = LC::where('lc_id',$mainarray[$i][1])->first();
            $mainarray[$i][$j] = $lc->issue_date;
            $j++;
            $mainarray[$i][$j] = $lc->shipment_date;
            $j++;
            $mainarray[$i][$j] = $lc->expiry_date;
            $j++;
            $mainarray[$i][$j] = $lc->sight_days;
            $j++;
            $ci_id = DB::table('delivery_document')->where('doc_id',$mainarray[$i][0])->first();
            $mainarray[$i][$j] = $ci_id->ci_id;
            $j++;
            $mainarray[$i][$j] = $ci_id->maturity;
            $j++;
            $mainarray[$i][$j] = $ci_id->bank_submission;
            $j++;
            $mainarray[$i][$j] = $ci_id->bank_ref_no;
            $j++;
            $mainarray[$i][$j] = $ci_id->purchase_date;
            $j++;
            $mainarray[$i][$j] = $ci_id->payment_receive;
            $i++;


        }
        return view('realization_table',compact('mainarray'));
    }
    //Viewing the day input pages with the do
    public function daily_input(){
        $ad_do = DB::table('do_goods')->where('approve_by','!=',null)->select('order_no')->distinct()->get();
        $regular_dos = DB::table('delivery_order')->select('order_no')->get();
        $all_dos = array_merge($ad_do,$regular_dos);
        return view('daily_input',compact('all_dos'));
    }
    public function get_pi_associated_do(){
        $do_no = Input::get('delivery_order_no');
       $pis = DB::table('do_detail')->select('pi_id')->where('order_no',$do_no)->distinct()->get();
        if(empty($pis)){
            $pis = DB::table('do_goods')->select('pi_id')->where('order_no',$do_no)->distinct()->get();
        }
        return $pis;
    }
    public function get_do_goods(){
        $do_id = Input::get('do_id');
        $pi_id = Input::get('pi_id');
        $do_counts = DB::table('do_detail')->select('description')->where('order_no',$do_id)->where('pi_id',$pi_id)->distinct()->get();
        if(empty($do_counts)){
            $do_counts = DB::table('do_goods')->select('description')->where('order_no',$do_id)->where('pi_id',$pi_id)->distinct()->get();
        }
        return $do_counts;
    }
    public function get_unit_price(){
        $do_no = Input::get('do_id');
        $pi_id = Input::get('pi_id');
        $count = Input::get('count');
        $unit_price = DB::table('do_detail')->where('order_no',$do_no)->where('pi_id',$pi_id)->where('description',$count)->first();
        if(empty($unit_price)){
            $unit_price = DB::table('do_goods')->where('order_no',$do_no)->where('description',$count)->first();
        }
        return $unit_price->unit_price;
    }
    //Daily input saved here
    public function delivered_do_product(Request $request){
        $total_value = 0;
        $doc_asso_pi_array = array();
        $delivered_value = 0;
        $do_no = $request['do_no'];
        $pi_id = $request['do_pi'];
        $count = $request['count_name'];
        $quantity = $request['quantity'];
        $unit_price = $request['unit_price'];
        $do_total_products = DB::table('do_detail')->where('order_no',$do_no)->get();
        if(empty($do_total_products)){
            $do_total_products = DB::table('do_goods')->where('order_no',$do_no)->where('approve_by','!=',null)->where('requested','1')->get();
        }
        foreach ($do_total_products as $do_total_product){
            $total_value+=$do_total_product->quantity*$do_total_product->unit_price;
        }
        $doc_asso_pi = DB::table('doc_goods')->where('doc_id',$do_no)->select('pi')->distinct()->get();
        foreach ($doc_asso_pi as $doc_pi){
            array_push($doc_asso_pi_array,$doc_pi->pi);
        }
        $delivered_products = DB::table('delivered_do_product')->where('do_id',$do_no)->orWhereIn('pi_id',$doc_asso_pi_array)->get();
        foreach ($delivered_products as $delivered_product){
            $delivered_value+=$delivered_product->quantity*$delivered_product->unit_price;

        }
        $delivered_value = $delivered_value+$quantity*$unit_price;
        if($total_value>$delivered_value){
            DB::table('delivered_do_product')->insert(['do_id'=>$do_no,'pi_id'=>$pi_id,'description'=>$count,'quantity'=>$quantity,'unit_price'=>$unit_price,'delivered_data'=>date('Y-m-d')]);
            return redirect()->route('daily_input');
        }
        else{
            return "DO value insufficient";
        }

    }
    public function return_goods(){
        $delivered_do = DB::table('delivered_do_product')->select('do_id')->distinct()->get();
        return view('return_goods',compact('delivered_do'));
    }
    //The list of pi which products were delivered
    public function get_delivered_pi(){
        $do_id = Input::get('do_number');
        $pis = DB::table('delivered_do_product')->select('pi_id')->where('do_id',$do_id)->distinct()->get();
        return $pis;
    }
    //Getting the delivered product for a certain pi and do
    public function get_delivered_product(){
        $do_id = Input::get('do_number_value');
        $pi_id = Input::get('do_pi_no_value');
        $goods = DB::table('delivered_do_product')->where('do_id',$do_id)->where('pi_id',$pi_id)->select('count')->distinct()->get();
        return $goods;
    }
    //Getting the unit price at which the pi was created
    public function get_delivered_unit_price(){
        $do_id = Input::get('do_no');
        $pi_no = Input::get('pi_no');
        $count_name = Input::get('count_name');
        $unit_price = DB::table('delivered_do_product')->where('do_id',$do_id)->where('pi_id',$pi_no)->where('count',$count_name)->first();
        return $unit_price->unit_price;
    }
    //Goods that has been returned back saved here
    public function return_goods_input(Request $request){
        $do_number = $request['do_number'];
        $pi_id = $request['do_pi_no'];
        $count = $request['count_description'];
        $unit_price = $request['unit_price'];
        $quantity = $request['quantity'];
        $return_cause = $request['return_cause'];
        DB::table('return_do_product')->insert(['do_id'=>$do_number,'pi_id'=>$pi_id,'count'=>$count,'unit_price'=>$unit_price,'quantity'=>$quantity,'cause'=>$return_cause]);
        return redirect()->back();
    }
    //This is method for show only the parties who returned product
    public function replacement_input(){
        $pi_array = array();
        $lc_array = array();
        $party_array = array();
        $return_goods_pi = DB::table('return_do_product')->select('pi_id')->distinct()->get();
        foreach ($return_goods_pi as $return_good_pi){
            array_push($pi_array,$return_good_pi->pi_id);
        }
        $lcs = DB::table('lc_pi_relation')->whereIn('pi_id',$pi_array)->select('lc_id')->distinct()->get();
        foreach ($lcs as $lc){
            array_push($lc_array,$lc->lc_id);
        }
        $all_partys = LC::whereIn('lc_id',$lc_array)->get();
        foreach ($all_partys as $all_party){
            array_push($party_array,$all_party->buyer_id);
        }
        $return_partys = Buyer::whereIn('buyer_id',$party_array)->get();
        //dd($return_partys);
        return view('replacement',compact('return_partys'));

       /* $return_dos = DB::table('return_do_product')->select('do_id')->distinct()->get();
        $lc_array = array();
       $dos = array();
        $party_array = array();
        foreach ($return_dos as $return_do){
            array_push($dos,$return_do->do_id);
        }
        $do_lcs = DB::table('delivery_order')->whereIn('order_no',$dos)->select('lc_id')->get();
        foreach ($do_lcs as $do_lc){
            array_push($lc_array,$do_lc->lc_id);
        }
        $all_partys = LC::whereIn('lc_id',$lc_array)->get();
        foreach ($all_partys as $all_party){
            array_push($party_array,$all_party->buyer_id);
        }
        $return_partys = Buyer::whereIn('buyer_id',$party_array)->get();
        return view('replacement',compact('return_partys'));*/
    }
    public function replace_buyer_lc(){
        $returned_pis_array = array();
        $all_returned_lc_array = array();
        $do_lcs_array = array();
        $buyer = Input::get('replace_buyer');
        $returned_pis = DB::table('return_do_product')->select('pi_id')->distinct()->get();
        foreach ($returned_pis as $returned_pi){
            array_push($returned_pis_array,$returned_pi->pi_id);
        }
        //return $returned_pis_array;

                $all_returned_lcs = DB::table('lc_pi_relation')->whereIn('pi_id',$returned_pis_array)->distinct()->get();
                foreach ($all_returned_lcs as $all_returned_lc){
                    array_push($all_returned_lc_array,$all_returned_lc->lc_id);
                }
                $desired_lcs = LC::where('buyer_id',$buyer)->whereIn('lc_id',$all_returned_lc_array)->select('lc_id')->distinct()->get();
                return $desired_lcs;
        //$lcs = DB::table('delivery_order')->whereIn('order_no',$returned_pis_array)->select('lc_id')->distinct()->get();
       /* foreach ($do_lcs as $do_lc){
            array_push($do_lcs_array,$do_lc->lc_id);
        }
        $desired_lcs = LC::whereIn('lc_id',$do_lcs_array)->where('buyer_id',$buyer)->select('lc_id')->get();
        return $desired_lcs;*/


    }
    public function get_my_pi(){
        $lc_id = Input::get('selected_lc');
        $needed_pis = DB::table('lc_pi_relation')->where('lc_id',$lc_id)->select('pi_id')->get();
        return $needed_pis;
    }
    public function save_replacement(Request $request){
        $buyer = $request['replace_buyer'];
        $replacement_lc = $request['replacement_lc'];
        $replacement_pi = $request['replacement_pi'];
        $count = $request['count'];
        $quantity = $request['quantity'];
        $unit_price = $request['unit_price'];
        try{
            DB::table('replacement_table')->insert(['buyer'=>$buyer, 'lc_id'=>$replacement_lc,'pi_id'=>$replacement_pi,'count'=>$count,'unit_price'=>$unit_price,'quantity'=>$quantity]);
        }catch (\Exception $e){
            return $e->getMessage();
        }
        return redirect()->back();
    }
    public function input_costs(){
        $net_realization_doc_array = array();
        $net_realization_calculated_docs = DB::table('net_realization')->get();
        foreach ($net_realization_calculated_docs as $net_realization_calculated_doc){
            array_push($net_realization_doc_array,$net_realization_calculated_doc->doc_id);
        }
        $datas = DB::table('delivery_document')->where('purchase_amount','!=',null)->whereNotIn('doc_id',$net_realization_doc_array)->get();
        return view('input_costs',compact('datas'));
    }
    public function get_short_payment(){
        $selected_doc = Input::get('selected_doc');
        $total_doc_value = 0;
        $doc_goods = DB::table('doc_goods')->where('doc_id',$selected_doc)->get();
        foreach ($doc_goods as $doc_good){
            $doc_value = $doc_good->quantity*$doc_good->unit_price;
            $total_doc_value = $total_doc_value+$doc_value;
        }
        $realization_amount = DB::table('delivery_document')->where('doc_id',$selected_doc)->first();
        $short_payment = $total_doc_value-$realization_amount->purchase_amount;
        return $short_payment;
    }
    public function save_net_realization(Request $request){
        $doc_id = $request['select_doc'];
        $short_payment = $request['short_payment'];
        $crc_cost = $request['crc_field'];
        $loan_cost = $request['loan_interest'];
        $loss = $request['loss_field'];
        $total_doc_value = 0;
        $doc_goods = DB::table('doc_goods')->where('doc_id',$doc_id)->get();
        foreach ($doc_goods as $doc_good){
            $doc_value = $doc_good->quantity*$doc_good->unit_price;
            $total_doc_value = $total_doc_value+$doc_value;
        }
        $net_profit = $total_doc_value-$short_payment-$crc_cost-$loan_cost-$loss;
        try{
            DB::table('net_realization')->insert(['doc_id'=>$doc_id,'short_payment'=>$short_payment,'crc'=>$crc_cost,'loan_interest'=>$loan_cost,
            'loss'=>$loss,'net_profit'=>$net_profit,'total_value'=>$total_doc_value]);
        }catch (\Exception $e){
               return $e->getMessage();
        }
        return redirect()->back();

    }
    public function net_realization_table(){
        $datas = DB::table('net_realization')->select('*')->get();
        return view('net_realization',compact('datas'));
    }
    public function confirm_advance_do(){
        $rows = Input::get('rowdata');
        $do_id = Input::get('do_id');
        $pi_id = DB::table('do_goods')->where('order_no',$do_id)->first();
        if (Auth::check())
        {
            $u_id =  Auth::user()->id;
        }
        $pi_goods = DB::table('goods')->select('quantity','unit_price')->where('pi_id',$pi_id->pi_id)->get();
        $main_total = 0;
        $req_total = 0;
        foreach ($pi_goods as $pg){
            $main_total+= $pg->quantity*$pg->unit_price;
        }
        foreach ($rows as $r){
            $req_total+= $r['quantity']*$r['unit_price'];
        }
        if($main_total == $req_total){
            DB::table('do_goods')->where('order_no',$do_id)->delete();
            foreach ($rows as $row) {

                DB::table('do_goods')->insert(['order_no'=>$do_id,'pi_id'=>$pi_id->pi_id,'description'=>$row['description'],'quantity'=>$row['quantity'],'unit_price'=>$row['unit_price'],'approve_by'=>$u_id,'requested'=>$row['status']]);
            }
            /*DB::table('notifications')->insert(['type'=>'Advance DO','doc_id'=>$do_id,'part'=>0,'description'=>'New Advance Inserted','insertion_time'=>date('Y-m-d')]);
            return "Advance DO created Successfully";*/
            Event::fire(new NewNotification('Ready DO',$do_id,0));
            return "Advance DO confirmed Successfully";
        }
        else{
            return "The Amount is not same";
        }

    }
    public function get_pi_sl(){
        $year =  substr(Date("Y"),-2);
        $count = DB::table('proforma_invoice')->where('pi_id','like','%OSML/Ex/PI/'.$year.'%')->count()+1;
        return "OSML/Ex/PI/".$year."/".$count;
    }
    public function get_doc_number(){
        $count_array = array();
        $count = DB::table('delivery_document')->count();
        $count = $count+1;
        array_push($count_array,$count);
        $lc_no = Input::get('lc_no');
        $ammend_no = Input::get('ammend_no');
        $count_part = DB::table('delivery_document')->where('lc_id',$lc_no)->where('lc_ammend_no',$ammend_no)->count();
        $count_part = $count_part+1;
        array_push($count_array,$count_part);
        return $count_array;

    }

}
