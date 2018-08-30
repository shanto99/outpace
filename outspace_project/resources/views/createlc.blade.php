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
                        <form class="form">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="lc_no">LC NO</label>
                                    <input id="lc_no" class="form-control" type="text" required>
                                </div>
                                <div class="form-group">
                                    <label for="lc_ammendment_no">Ammendment No</label>
                                    <input id="lc_ammendment_no" class="form-control" type="text" required>
                                </div>
                                    <div id="panel">
                                        <input type="button" class="button btn btn-success" value="Attach PIs" id="btn1">
                                        <br>
                                        <!-- Dialog Box-->
                                        <div class="dialog" id="myform" style="z-index: 1000; height: 320px; width: 320px">
                                            <form id = "lcForm">

                                                    @foreach($pi as $row)

                                                    <input type="checkbox" name = "selector[]" id="name" value="{{$row["pi_id"]}}">{{ $row["pi_id"] }}<br>

                                                @endforeach

                                                <div align="center">
                                                    <input type="button" value="Attach PIs" id="btnPIattach" class="btn btn-success">
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                <div class="form-group">
                                    <label for="internal_office_no">Internal Office Ref No</label>
                                    <input id = "internal_office_no" class="form-control" type="text" required>
                                </div>
                                <div class="md-form-group">
                                    <label for="issuing_date">Issuing Date</label>
                                    <input id="issuing_date" class="md-form-control" type="text" data-provide="datepicker"
                                           data-date-today-highlight="true" required>
                                    <label class="md-control-label"></label>
                                </div>
                                <div class="form-group">
                                    <label for="amount">Amount(USD)</label>
                                    <input id = "amount" class="form-control" type="text">
                                </div>
                                <div class="md-form-group">
                                    <label for="expiry_date">Expiry Date</label>
                                    <input id="expiry_date" class="md-form-control" type="text" data-provide="datepicker"
                                           data-date-today-highlight="true" required>
                                    <label class="md-control-label"></label>
                                </div>
                                <div class="form-group">
                                    <label for="payment_method">Payment Method</label>
                                    <input id = "payment_method" class="form-control" type="text" required>
                                </div>
                                <div class="form-group">
                                    <label for="sight_days">Sight Days</label>
                                    <input id = "sight_days" class="form-control" type="text" required>
                                </div>
                                <div class="form-group">
                                    <label for="last_date_shipment">Last Date Shipment</label>
                                    <input id = "last_date_shipment" class="form-control" type="text" data-provide="datepicker" data-date-today-highlight="true" required>
                                </div>
                                <div class="form-group">
                                    <label for="export_lc_no">Export LC No</label>
                                    <input id = "export_lc_no" class="form-control" type="text" required>
                                </div>
                                <div class="form-group">
                                    <label for="export_lc_date">Export LC Date</label>
                                    <input id = "export_lc_date" class="form-control" type="text" data-provide="datepicker" data-date-today-highlight="true" required>
                                </div>
                                <div class="form-group">
                                    <label for="ref">Ref</label>
                                    <input id = "ref" class="form-control" type="text" required>
                                </div>
                                <div class="form-group">
                                    <label for="sales_contact_no">Sales Contact NO:</label>
                                    <input id="sales_contact_no" class="form-control" type="text" required>
                                </div>
                                <div class="form-group">
                                    <label for="area_code">Area Code</label>
                                    <input id="area_code" class="form-control" type="text" required>
                                </div>
                                <div class="form-group">
                                    <label for="order_no_date">Order no with Date</label>
                                    <input id = "order_no_date" class="form-control" type="text">
                                </div>

                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="overdue_interest">Overdue Interest</label>
                                    <input id="overdue_interest" class="form-control" type="text">
                                </div>
                                <div class="form-group">
                                    <label for="vat_registration_no">Vat Registration No</label>
                                    <input id = "vat_registration_no" class="form-control" type="text">
                                </div>
                                <div class="form-group">
                                    <label for="discrepancy_charge">Discrepancy Charge</label>
                                    <input id = "discrepancy_charge" class="form-control" type="text" required>
                                </div>
                                <div class="form-group">
                                    <label for="other_charge">Other Charge</label>
                                    <input id = "other_charge" class="form-control" type="text" required>
                                </div>
                                <div class="form-group">
                                    <label for="export_garments_quantity">Export Garments Quantity</label>
                                    <input id = "export_garments_quantity" class="form-control" type="text" required>
                                </div>
                                <div class="form-group">
                                    <label for="nagotiation">Nagotiation</label>
                                    <input id = "nagotiation" class="form-control" type="text" required>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="select_a_buyer">Select a Buyer</label>
                                    <div>
                                        <select id="select_a_buyer" class="form-control">
                                            <option disabled selected value> -- select a Buyers -- </option>
                                            @foreach($buyers as $buyer)
                                                <option value = "{{ $buyer->buyer_id }}">{{ $buyer->buyer_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="issuing_bank">Issuing Bank</label>
                                    <div>
                                        <select id="issuing_bank" class="form-control">
                                            <option disabled selected value> -- select a Bank -- </option>
                                            @foreach($banks as $bank)
                                                <option value = "{{ $bank->bank_id }}">{{ $bank->bank_name }}, {{ $bank->branch }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="nagotiating_bank">Nagotiating Bank</label>
                                    <div>
                                        <select id="nagotiating_bank" class="form-control">
                                            <option disabled selected value> -- select a Bank -- </option>
                                            @foreach($banks as $bank)
                                                <option value = "{{ $bank->bank_id }}">{{ $bank->bank_name }}, {{ $bank->branch }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="benificiary_bank">Benificiary Bank</label>
                                    <div>
                                        <select id="benificiary_bank" class="form-control">
                                            <option disabled selected value> -- select a Bank -- </option>
                                            @foreach($banks as $bank)
                                                <option value = "{{ $bank->bank_id }}">{{ $bank->bank_name }}, {{ $bank->branch }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="partial_shipment">Partial Shipment Allowed?</label>
                                    <div>
                                        <select id="partial_shipment" class="form-control">
                                            <option value="yes">YES</option>
                                            <option value="no">NO</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="ammendment_clause">Ammendment Clause</label>
                                    <textarea id = "ammendment_clause"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="special_conditions">Special Conditions</label>
                                    <textarea id = "special_conditions"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="notify_party">Notify Party(if any)</label>
                                    <textarea id = "notify_party"></textarea>
                                </div>
                            </div>
                            <button class="btn btn-primary btn-block col-sm-6" id="btnConfirm" type="submit">Confirm</button>
                            <button class="btn btn-primary btn-block col-sm-6" id = "btnReset" type="submit">Reset</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>
@endsection
@section('script')
    <script>
    $(function() {
        var val = [];
        var ammendment_count;
        $(".button").click(function() {
            $("#myform #valueFromMyButton").text($(this).val().trim());
            $("#myform input[type=text]").val('');
            $("#myform").show(500);
        });
        $("#btnPIattach").click(function() {
            $(':checkbox:checked').each(function(i){
                val[i] = $(this).val();
            });

            $("#myform").hide(400);
        });
        $("#lc_ammendment_no").focus(function(){
            var lc_no = document.getElementById('lc_no').value;
            $.ajax({
                type: "GET",
                cache: false,
                url: "{{ route('pick_ammendment') }}",
                data: {lc: lc_no},
                success: function (data) {
                   if(data == 0){
                       document.getElementById("lc_ammendment_no").value = data;
                   }
                    else {
                       data++;
                       document.getElementById("lc_ammendment_no").value = data;
                   }

                }
            });
        });
        function dateFormatchange(date){
            var date = new Date(date);
            return formattedDate = (date.getFullYear() + '-' + date.getMonth() + '-' + date.getDate());
        }
        $("#btnConfirm").click(function () {
            var lc_no = document.getElementById('lc_no').value;
            var ammendment_no = document.getElementById('lc_ammendment_no').value;
            var selected_pi = val;
            var internal_office_no = document.getElementById('internal_office_no').value;
            var issuing_date = dateFormatchange(document.getElementById('issuing_date').value);
            var amount = document.getElementById('amount').value;
            var expiry_date = dateFormatchange(document.getElementById('expiry_date').value);
            var payment_method = document.getElementById('payment_method').value;
            var sight_days = document.getElementById('sight_days').value;
            var last_date_shipment = dateFormatchange(document.getElementById('last_date_shipment').value);
            var export_lc_no = document.getElementById('export_lc_no').value;
            var export_lc_date = dateFormatchange(document.getElementById('export_lc_date').value);
            var ref = document.getElementById('ref').value;
            var sales_contact_no = document.getElementById('sales_contact_no').value;
            var area_code = document.getElementById('area_code').value;
            var order_no_date = document.getElementById('order_no_date').value;
            var overdue_interest = document.getElementById('overdue_interest').value;
            var vat_registration_no = document.getElementById('vat_registration_no').value;
            var discrepancy_charge = document.getElementById('discrepancy_charge').value;
            var other_charge =document.getElementById('other_charge').value;
            var export_garments_quantity = document.getElementById('export_garments_quantity').value;
            var nagotiation = document.getElementById('nagotiation').value;
            var buyer = $( "#select_a_buyer option:selected" ).val();
            var issuing_bank = $("#issuing_bank option:selected").val();
            var nagotiating_bank = $("#nagotiating_bank option:selected").val();
            var benificiary_bank = $("#benificiary_bank").val();
            var advising_bank = $("#advising_bank").val();
            var partial_shipment = $("#partial_shipment").val();
            var ammendment_clause = document.getElementById('ammendment_clause').value;
            var special_conditions = document.getElementById('special_conditions').value;
            var notify_party = document.getElementById('notify_party').value;
            $.ajax({
                type: "GET",
                cache: false,
                url: "{{ route('doinsertlc') }}",
                data: {lc_no:lc_no, pis: selected_pi, ammendment_no: ammendment_no, internal_office_no:internal_office_no, issuing_date: issuing_date,amount:amount,
                expiry_date: expiry_date, payment_method: payment_method, sight_days:sight_days, last_date_shipment: last_date_shipment,export_lc_no:export_lc_no,
                export_lc_date: export_lc_date, ref: ref,sales_contact_no: sales_contact_no,area_code:area_code,order_no_date: order_no_date,
                overdue_interest: overdue_interest, vat_registration_no: vat_registration_no, discrepancy_charge:discrepancy_charge,other_charge:other_charge,
                export_garments_quantity: export_garments_quantity, nagotiation: nagotiation, buyer: buyer, issuing_bank:issuing_bank, nagotiating_bank:nagotiating_bank,
                benificiary_bank:benificiary_bank, partial_shipment: partial_shipment, ammendment_clause: ammendment_clause,
                special_conditions: special_conditions,notify_party:notify_party},
                success: function (data) {
                    window.location = "Create_LC";
                }
            });
        });
        $("#btnReset").click(function () {
            document.getElementById("lc_no").value = '';
            document.getElementById('lc_ammendment_no').value = '';
            document.getElementById('internal_office_no').value = '';
            val = [];
        })

    });
</script>
    @endsection


<!-- Mirrored from demo.naksoid.com/elephant/materialistic-blue/form-layouts.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 07 Nov 2016 21:25:40 GMT -->
