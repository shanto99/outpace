@extends('master');
@section('maincontent')
    <div class="layout-content">
        <div class="layout-content-body">
            <div class="title-bar">
                <h1 class="title-bar-title">
                    <span class="d-ib">Create LC</span>
                </h1>

            </div>
            <div class="row">
                <div>
                    <div class="demo-form-wrapper">
                        <form class="form" method="post" action="{{ route('lc_confirm') }}">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="lc_no">LC NO</label>
                                    <input id="lc_no" class="form-control" readonly type="text" name="lc_id" value="{{ $lc_detail->lc_id }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="lc_ammendment_no">Ammendment No</label>
                                    <input id="lc_ammendment_no" class="form-control" readonly type="text" name="ammendment_no" value="{{ $lc_detail->lc_ammend_no }}" required>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="partial_shipment">Associated PI</label>
                                    <div>
                                        <ul>
                                            @foreach($pi as $p)
                                                <li><a href="{{ route('notification_detail',['type'=>'PI','doc_id'=>$p->pi_id,'part'=>0]) }}">{{ $p->pi_id }}</a></li>
                                                @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="internal_office_no">Internal Office Ref No</label>
                                    <input id = "internal_office_no" class="form-control" name="office_ref" type="text" value="{{ $lc_detail->office_ref_no }}" required>
                                </div>
                                <div class="md-form-group">
                                    <label for="issuing_date">Issuing Date</label>
                                    <input id="issuing_date" class="md-form-control" type="text" name="issue_date" value="{{ $lc_detail->issue_date }}" required>
                                    <label class="md-control-label"></label>
                                </div>
                                <div class="form-group">
                                    <label for="amount">Amount(USD)</label>
                                    <input id = "amount" class="form-control" type="text" name="amount" value="{{ $lc_detail->amount }}">
                                </div>
                                <div class="md-form-group">
                                    <label for="expiry_date">Expiry Date</label>
                                    <input id="expiry_date" class="md-form-control" type="text" name="expiry_date" value="{{ $lc_detail->expiry_date }}" required>
                                    <label class="md-control-label"></label>
                                </div>
                                <div class="form-group">
                                    <label for="payment_method">Payment Method</label>
                                    <input id = "payment_method" class="form-control" type="text" name="payment_method" value="{{ $lc_detail->payment_method }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="sight_days">Sight Days</label>
                                    <input id = "sight_days" class="form-control" type="text" name="sight_days" value="{{ $lc_detail->sight_days }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="last_date_shipment">Last Date Shipment</label>
                                    <input id = "last_date_shipment" class="form-control" type="text" name="last_date_shipment" value="{{ $lc_detail->shipment_date }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="export_lc_no">Export LC No</label>
                                    <input id = "export_lc_no" class="form-control" type="text" name="export_lc_no" value="{{ $lc_detail->export_lc_no }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="export_lc_date">Export LC Date</label>
                                    <input id = "export_lc_date" class="form-control" type="text" name="export_lc_date" value="{{ $lc_detail->export_lc_date }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="ref">Ref</label>
                                    <input id = "ref" class="form-control" type="text" name="ref" value="{{ $lc_detail->ref }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="sales_contact_no">Sales Contact NO:</label>
                                    <input id="sales_contact_no" class="form-control" type="text" name="sales_contact_no" value="{{ $lc_detail->sales_contract_no }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="area_code">Area Code</label>
                                    <input id="area_code" class="form-control" type="text" name="area_code" value="{{ $lc_detail->area_code }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="order_no_date">Order no with Date</label>
                                    <input id = "order_no_date" class="form-control" type="text" name="order_no_with_date" value="{{ $lc_detail->order_no_with_date }}">
                                </div>

                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="overdue_interest">Overdue Interest</label>
                                    <input id="overdue_interest" class="form-control" type="text" name="overdue_interest" value="{{ $lc_detail->overdue_interest }}">
                                </div>
                                <div class="form-group">
                                    <label for="vat_registration_no">Vat Registration No</label>
                                    <input id = "vat_registration_no" class="form-control" type="text" name="vat_registration_no" value="{{ $lc_detail->vat_registration_no }}">
                                </div>
                                <div class="form-group">
                                    <label for="discrepancy_charge">Discrepancy Charge</label>
                                    <input id = "discrepancy_charge" class="form-control" type="text" name="discrepancy_charge" value="{{ $lc_detail->dollar_deducted }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="other_charge">Other Charge</label>
                                    <input id = "other_charge" class="form-control" type="text" name="other_charge" value="{{ $lc_detail->others_charge }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="export_garments_quantity">Export Garments Quantity</label>
                                    <input id = "export_garments_quantity" class="form-control" type="text" name="export_garments_quantity" value="{{ $lc_detail->export_garments_qty }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="nagotiation">Nagotiation</label>
                                    <input id = "nagotiation" class="form-control" type="text" name="negotiation" value="{{ $lc_detail->negotiation_within }}" required>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="select_a_buyer">Buyer</label>
                                    <div>
                                        <select id="select_a_buyer" class="form-control" name="buyer">
                                            <option disabled selected value> -- select a Buyer -- </option>
                                            @foreach($buyers as $buyer)
                                                <option value = "{{ $buyer->buyer_id }}"<?= $buyer->buyer_id == $lc_detail->buyer_id ? 'selected="selected"' : '';?>>{{ $buyer->buyer_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="issuing_bank">Issuing Bank</label>
                                    <div>
                                        <select id="issuing_bank" class="form-control" name="issuing_bank">
                                            <option disabled selected value> -- select a Bank -- </option>
                                            @foreach($banks as $bank)
                                                <option value = "{{ $bank->bank_id }}"<?= $bank->bank_id == $lc_detail->issuing_bank_id ? 'selected="selected"' : '';?>>{{ $bank->bank_name }}, {{ $bank->branch }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="nagotiating_bank">Nagotiating Bank</label>
                                    <div>
                                        <select id="nagotiating_bank" class="form-control" name="negotiating_bank">
                                            <option disabled selected value> -- select a Bank -- </option>
                                            @foreach($banks as $bank)
                                                <option value = "{{ $bank->bank_id }}"<?= $bank->bank_id == $lc_detail->negotiating_bank_id ? 'selected="selected"' : '';?>>{{ $bank->bank_name }}, {{ $bank->branch }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="benificiary_bank">Benificiary Bank</label>
                                    <div>
                                        <select id="benificiary_bank" class="form-control" name="benificiary_bank">
                                            <option disabled selected value> -- select a Bank -- </option>
                                            @foreach($banks as $bank)
                                                <option value = "{{ $bank->bank_id }}"<?= $bank->bank_id == $lc_detail->beneficiary_bank_id ? 'selected="selected"' : '';?>>{{ $bank->bank_name }}, {{ $bank->branch }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="advising_bank">Advising Bank</label>
                                    <div>
                                        <select id="advising_bank" class="form-control" name="advising_bank">
                                            <option disabled selected value> -- select a Bank -- </option>
                                            @foreach($banks as $bank)
                                                <option value = "{{ $bank->bank_id }}"<?= $bank->bank_id == $lc_detail->document_submit_bank_id ? 'selected="selected"' : '';?>>{{ $bank->bank_name }}, {{ $bank->branch }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="partial_shipment">Partial Shipment Allowed?</label>
                                    <div>
                                        <select id="partial_shipment" class="form-control" name="partial_shipment">
                                            <option value="yes">YES</option>
                                            <option value="no">NO</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="ammendment_clause">Ammendment Clause</label>
                                    <textarea id = "ammendment_clause" name="ammendment_clause">{{ $lc_detail->lc_ammend_clause }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="special_conditions">Special Conditions</label>
                                    <textarea id = "special_conditions" name="special_condition">{{ $lc_detail->special_conditions }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="notify_party">Notify Party(if any)</label>
                                    <textarea id = "notify_party" name="notify_party">{{ $lc_detail->notify_party }}</textarea>
                                </div>
                            </div>

                            <button class="btn btn-primary btn-block col-sm-6" id="btnConfirm" type="submit">Save & Confirm</button>
                            <a class="btn btn-primary btn-block col-sm-6">OK</a>
                            <input type="hidden" name="_token" value="{{ Session::token() }}">
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

    </div>
@endsection