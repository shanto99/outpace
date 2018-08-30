<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PDF TITLE</title>
    <style>
        body{ font-size: 14px; font-family: sans-serif; }
        table{ border-spacing: 0; border-collapse: collapse; background-color: transparent; }
        td, th{ padding: 0; }
        thead { display: table-header-group; }
        th{ text-align: left; }
        tr, img { page-break-inside: avoid; }
        img { max-width: 100% !important; }
        .table { border-collapse: collapse !important; width: 100%; max-width: 100%; margin-bottom: 20px; }
        .table > thead > tr > th,
        .table > tbody > tr > th,
        .table > tfoot > tr > th,
        .table > thead > tr > td,
        .table > tbody > tr > td,
        .table > tfoot > tr > td { padding: 6px; line-height: 1.42857143; vertical-align: top; border-top: 1px solid #ddd; }
        .table > thead > tr > th { vertical-align: bottom; border-bottom: 2px solid #ddd; }
        .table td, .table th{ background-color: #fff !important; }
        .table > caption + thead > tr:first-child > th,
        .table > colgroup + thead > tr:first-child > th,
        .table > thead:first-child > tr:first-child > th,
        .table > caption + thead > tr:first-child > td,
        .table > colgroup + thead > tr:first-child > td,
        .table > thead:first-child > tr:first-child > td{ border-top: 0; }
        .table > tbody + tbody { border-top: 2px solid #ddd; }
        .table .table-border-none td{ border: none; }
        .text-left{ text-align: left; }
        .text-center{ text-align: center; }
        .text-right{ text-align: right; }
        .text-justify{ text-align: justify; }
        .text-bold{ font-weight: bold; }
        .text-underline{ text-decoration: underline; }
        .margin-bottom-0{ margin-bottom: 0; }
        .border-none{ border: 0; }

    </style>
</head>
<body>

<div id="PDF-Wrapper" style="page-break-after: always">

    {{-- PDF -> Header --}}
    <div class="PDF-header">
        <img src="src/img/piheader.png" alt="PDF Header Image">
    </div>
    {{-- End PDF -> Header --}}

    <table class="table PDF-table" id="PDF-negotiable_documents">
        <tbody>

        {{-- PDF -> Body --}}
        <tr class="table-border-none">
            <td colspan="2">
                {{ $negotiating_bank->admin_name }}<br>
                {{ $negotiating_bank->bank_name }}<br>
                {{ $negotiating_bank->branch }}<br>
                {{ $negotiating_bank->address }}
            </td>
        </tr>

        <tr class="table-border-none">
            <td>Subject</td>
            <td class="text-bold text-justify">
                Submission of negotiable documents for ${{ $delivery_doc->total_amount }} against Local L/C No. {{ $delivery_doc->lc_id }} Dated: {{ $lc_detail->issue_date }} of {{ $issuing_bank->bank_name }}, {{ $issuing_bank->branch }}, {{ $issuing_bank->address }}
            </td>
        </tr>

        <tr class="table-border-none">
            <td colspan="2">
                Dear Sir,<br>
                <p>
                    Enclosed please final here with the shipping documents of mentioned Local L/C at your bank for negotiation / collection of payment at 120 days sight.
                </p>
                <table class="table margin-bottom-0">
                    <tbody>
                    <tr>
                        <td>Bill of Exchange</td>
                        <td>2</td>
                    </tr>
                    <tr>
                        <td>Truck Receipt</td>
                        <td>3</td>
                    </tr>
                    <tr>
                        <td>Commercial Invoice</td>
                        <td>8</td>
                    </tr>
                    <tr>
                        <td>Detailed Packing List</td>
                        <td>8</td>
                    </tr>
                    <tr>
                        <td>Delivery Challan</td>
                        <td>8</td>
                    </tr>
                    <tr>
                        <td>Certificate of Orgin</td>
                        <td>8</td>
                    </tr>
                    <tr>
                        <td>Beneficiary Certificate</td>
                        <td>8</td>
                    </tr>
                    <tr>
                        <td>BTMA</td>
                        <td>8</td>
                    </tr>
                    <tr>
                        <td>Mushok</td>
                        <td>8</td>
                    </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        <tr class="table-border-none">
            <td colspan="2">
                <p>
                    We will highly appreciate if you kindly negotiate / collection the above bill within 120 days.
                </p>
            </td>
        </tr>
        <tr class="table-border-none">
            <td colspan="2">
                Thank You<br>
                Truly yours<br><br><br>
                Authorized Signature
            </td>
        </tr>
        {{-- End PDF -> Body --}}

        </tbody>
    </table>
</div>
<div id="PDF-Wrapper"  style="page-break-after: always">

    <h3 class="text-center text-uppercase text-underline">Bill Of Exchange</h3>
    <br><br>
    <table class="table PDF-table" id="PDF-biil_of_exchange">
        <tbody>

        {{-- PDF -> Body --}}
        <tr class="text-bold table-border-none">
            <td class="text-left">Ref: {{ $delivery_doc->be_id }}</td>
            <td class="text-right">Date: {{ $pdfdata->document_creation_date }}</td>
        </tr>
        <tr class="table-border-none">
            <td>
                <div class="box-amount">For: USD {{ $delivery_doc->total_amount }}</div>
            </td>
            <td></td>
        </tr>
        <tr class="table-border-none">
            <td colspan="2">
                <p>
                    At sight of this <span class="text-uppercase text-bold">First(of the same tenor the second being unpaid)</span> Bill of Exchange <span class="text-uppercase text-bold"></span> pays to the order of {{ $negotiating_bank->bank_name }}., {{ $negotiating_bank->branch }} or order the sum of <b>{{ convert_number_to_words($delivery_doc->total_amount) }} dollar and No Cent</b> Only value received and charges the same to the account of <b>{{ $buyer->buyer_name }},</b> drawn under <b>{{ $issuing_bank->bank_name }} {{ $issuing_bank->branch }} {{ $issuing_bank->address }}</b>, L/C No. {{ $pdfdata->lc_id }} Dated: {{ $lc_detail->issue_date }}, as per as Invoice No. {{ $delivery_doc->ci_id }}, Date {{ $pdfdata->document_creation_date }}
                </p>
            </td>
        </tr>

        <tr class="table-border-none">
            <td>
                To<br>
                <b>{{ $issuing_bank->bank_name }}</b><br>
                {{ $issuing_bank->branch }}<br>
                {{ $issuing_bank->address }}
            </td>
            <td class="text-right text-bold">
                For R.A. Spinning Mills Ltd.
            </td>
        </tr>

        {{-- End PDF -> Body --}}

        </tbody>
    </table>
</div>
<div id="PDF-Wrapper" style="page-break-after: always">

    <h3 class="text-center text-uppercase text-underline">Bill Of Exchange</h3>
    <br><br>
    <table class="table PDF-table" id="PDF-biil_of_exchange">
        <tbody>

        {{-- PDF -> Body --}}
        <tr class="text-bold table-border-none">
            <td class="text-left">Ref: {{ $delivery_doc->be_id }}</td>
            <td class="text-right">Date: {{ $pdfdata->document_creation_date }}</td>
        </tr>
        <tr class="table-border-none">
            <td>
                <div class="box-amount">For: USD {{ $delivery_doc->total_amount }}</div>
            </td>
            <td></td>
        </tr>
        <tr class="table-border-none">
            <td colspan="2">
                <p>
                    At sight of this <span class="text-uppercase text-bold">Second(of the same tenor the first being unpaid)</span> Bill of Exchange <span class="text-uppercase text-bold"></span> pays to the order of {{ $negotiating_bank->bank_name }}., {{ $negotiating_bank->branch }} or order the sum of <b>{{ convert_number_to_words($delivery_doc->total_amount) }} dollar and No Cent</b> Only value received and charges the same to the account of <b>{{ $buyer->buyer_name }},</b> drawn under <b>{{ $issuing_bank->bank_name }} {{ $issuing_bank->branch }} {{ $issuing_bank->address }}</b>, L/C No. {{ $pdfdata->lc_id }} Dated: {{ $lc_detail->issue_date }}, as per as Invoice No. {{ $delivery_doc->ci_id }}, Date {{ $pdfdata->document_creation_date }}
                </p>
            </td>
        </tr>

        <tr class="table-border-none">
            <td>
                To<br>
                <b>{{ $issuing_bank->bank_name }}</b><br>
                {{ $issuing_bank->branch }}<br>
                {{ $issuing_bank->address }}
            </td>
            <td class="text-right text-bold">
                For R.A. Spinning Mills Ltd.
            </td>
        </tr>

        {{-- End PDF -> Body --}}

        </tbody>
    </table>
</div>
<div id="PDF-Wrapper" style="page-break-after: always">

    {{-- PDF -> Header --}}
    <div class="PDF-header">
        <img src="src/img/piheader.png" alt="PDF Header Image">
    </div>
    {{-- End PDF -> Header --}}

    <table class="table PDF-table" id="PDF-biil_of_exchange">
        <tbody>

        {{-- PDF -> Body --}}

        <tr class="table-border-none text-center">
            <td colspan="2">
                <h3 class="text-uppercase text-underline">Truck Receipt</h3>
                <h5 class="text-bold">(Own Agency)</h5>
            </td>
        </tr>

        <tr class="text-bold table-border-none">
            <td class="text-left">Truck Receipt No: {{ $pdfdata->tc_id }}</td>
            <td class="text-right">Date: {{ $pdfdata->document_creation_date }}</td>
        </tr>

        <tr class="table-border-none">
            <td colspan="2">
                <table class="table table-boxed">
                    <thead>
                    <tr>
                        <th>Beneficiary:</th>
                        <th>Beneficiary Bank:</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                            <b>R.A. Spinning Mills Ltd.</b><br>
                            House #44, Road #06, Block - C <br>
                            Banani, Dhaka - 1213
                        </td>
                        <td>
                            <b>{{ $negotiating_bank->bank_name }}</b><br>
                            {{ $negotiating_bank->branch }}<br>
                            {{ $negotiating_bank->address }}<br>
                            SWIFT: {{ $negotiating_bank->swift }}
                        </td>
                    </tr>
                    </tbody>
                </table>

            </td>
        </tr>
        <tr class="table-border-none">
            <td colspan="2">
                <table class="table table-boxed">
                    <thead>
                    <tr>
                        <th>Consignee's name and address Notify Party</th>
                        <th>To the order of</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                            <b>{{ print(nl2br($lc_detail->notify_party))}}</b><br><br>
                        </td>
                        <td>
                            <b>{{ $issuing_bank->bank_name }}</b><br>
                            {{ $issuing_bank->branch }}<br>
                            {{ $issuing_bank->address }}
                        </td>
                    </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        <tr class="table-border-none">
            <td colspan="2">

                <table class="table table-boxed">
                    <tbody>
                    <tr>
                        <td>BTB L/C No.</td>
                        <td>{{ $pdfdata->lc_id }}</td>
                        <td>Dated:</td>
                        <td>{{ $lc_detail->issue_date }}</td>
                        <td>IRC No.</td>
                        <td>{{ $pdfdata->irc_no }}</td>
                    </tr>
                    <tr>
                        <td>Export L/C Sales Con No:</td>
                        <td>{{ $lc_detail->export_lc_no }}</td>
                        <td>Dated:</td>
                        <td>{{ $lc_detail->export_lc_date }}</td>
                        <td>H.S Code</td>
                        <td>{{ $pdfdata->hs_code_no }}</td>
                    </tr>
                    <tr>
                        <td colspan="4">Ref: {{ $lc_detail->ref }}</td>
                        <td>Area Code</td>
                        <td>{{ $lc_detail->area_code }}</td>
                    </tr>
                    <tr>
                        <td colspan="4">Sales Contact No: {{ $lc_detail->sales_contract_no }}</td>
                        <td>VAT Reg. No.</td>
                        <td>{{ $lc_detail->vat_registration_no }}</td>
                    </tr>
                    <tr>
                        <td>Truck No:</td>
                        <td colspan="5">{{ $pdfdata->truck_no }}</td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <b><u>Loading Point</u></b><br>
                            <b>R.A. Spinning Mills LTD.</b><br>
                            Factory site of R.A. Spinning Mills Ltd.<br>
                            Kewa, Mawna, Sreepur, Gazipur.
                        </td>
                        <td colspan="3">
                            <b><u>Delivery Point</u></b><br>
                            {{ $buyer->name }}<br>
                            {{ $buyer->office_address }}<br>
                            Factory: {{ $buyer->factory_address }}
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">Shipped Per: Truck</td>
                        <td colspan="3">Freight: Pre-Paid</td>
                    </tr>
                    </tbody>
                </table>

            </td>
        </tr>

        <tr class="table-border-none">
            <td colspan="2">
                <table class="table table-boxed">
                    <thead>
                    <tr class="text-bold">
                        <td>Product Description</td>
                        <td>New Weight in Kg</td>
                        <td>Gross Weight in Kg</td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $total_net_weight = 0;
                    $total_gross_weight = 0 ?>
                    @foreach($good_description as $g)
                        <tr>
                            <td>List Goods : {{ $g->description }}</td>
                            <td>{{ $g->net_weight }}</td>
                            <td>{{ $g->gross_weight }}</td>
                        </tr>
                        <?php
                        $total_net_weight = $total_net_weight+$g->net_weight;
                        $total_gross_weight = $total_gross_weight+$g->gross_weight;
                        ?>
                    @endforeach

                    <tr>
                        <td>
                            Marchandise to be of bangladesh origin. Yarn for 100% Export oriented readymade Garments Industry: Quantity, Quality, Rate as per beneficiary's
                            <br>
                            Profoma Invoice No. <br>
                            @foreach($myPi as $pl)  {{ $pl->pi_id }} dt:{{ $pl->pi_date }} @endforeach  This is back to back L/C basis against Export LC No {{ $lc_detail->export_lc_no }} Dated: {{ $lc_detail->export_lc_date }} <br><br>
                            For Quality 100
                        </td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr class="text-bold text-right">
                        <td>Total</td>
                        <td>{{ $total_net_weight }}</td>
                        <td>{{ $total_gross_weight }}</td>
                    </tr>
                    </tbody>
                </table>
            </td>
        </tr>

        <tr class="table-border-none text-bold">
            <td>Signature of Consignee with seal</td>
            <td class="text-right">For R.A.Spinning Mill LTD.</td>
        </tr>

        <tr class="table-border-none">
            <td colspan="2" class="text-right">
                <br><br><br>
                Authorized Signature
            </td>
        </tr>

        {{-- End PDF -> Body --}}

        </tbody>
    </table>
</div>
<div id="PDF-Wrapper" style="page-break-after: always">

    <!-- PDF -> Header -->
    <div class="PDF-header">
        <img src="src/img/piheader.png" alt="PDF Header Image">
    </div>
    <h2 style="text-align: center">COMMERCIAL INVOICE</h2>
    <!-- End PDF -> Header -->

    <!-- PDF -> Table Consignee -->
    <table class="table PDF-table table-boxed" id="PDF-biil_of_exchange">
        <tbody>
        <tr class="table-border-none">
            <td class="text-bold" width="65%">
                <u>Consignee</u><br>
                {{ $buyer->buyer_name }}<br>
                {{ nl2br($buyer->office_address) }}
            </td>
            <td></td>
        </tr>
        </tbody>
    </table>
    <!-- End PDF -> Table Consignee -->


    <!-- PDF -> Table -> Invoice Info -->
    <table class="table PDF-table table-boxed">
        <tbody>
        <tr>
            <td>Invoice No.</td>
            <td>: {{ $delivery_doc->ci_id }}</td>
            <td>Date</td>
            <td>{{ $delivery_doc->document_creation_date }}</td>
        </tr>
        <tr>
            <td>Profoma Invoice No.</td>
            <td>@foreach($myPi as $mp)  {{ $mp->pi_id }} @endforeach</td>
            <td>Date</td><td>@foreach($myPi as $mp)  {{ $mp->pi_date }} @endforeach</td>
        </tr>
        <tr>
            <td>IRC No.</td>
            <td>: {{ $delivery_doc->irc_no }}</td>
            <td>Shipping Marks</td>
            <td>{{ $delivery_doc->shipping_marks }}</td>
        </tr>
        <tr>
            <td>HS Code.</td>
            <td>: {{ $delivery_doc->hs_code_no }}</td>
            <td>Payment Terms</td>
            <td>{{ $delivery_doc->payment_tarms }}</td>
        </tr>
        <tr>
            <td>Inport Authorization.</td>
            <td>: {{ $delivery_doc->import_authorization_no }}</td>
            <td>Area Code No.</td>
            <td>{{ $lc_detail->area_code }}</td>
        </tr>
        <tr>
            <td>Vat Registration No.</td>
            <td>: {{ $lc_detail->vat_registration_no }}</td>
            <td colspan="2"></td>
        </tr>
        </tbody>
    </table>
    <!-- End PDF -> Table -> Invoice Info -->

    <!-- PDF -> Table -> LC -->
    <table class="table PDF-table table-boxed">
        <tbody>
        <tr>
            <th>LC No.</th>
            <th>Date</th>
            <th>Export LC / Sales Con. No.</th>
            <th>Date</th>
        </tr>
        </tbody>
        <tbody>
        <tr>
            <td>{{ $lc_detail->lc_id }}</td>
            <td>{{ $lc_detail->issue_date }}</td>
            <td>{{ $lc_detail->export_lc_no }}</td>
            <td>{{ $lc_detail->export_lc_date }}</td>
        </tr>
        <tr>
            <td colspan="4">REF No: {{ $lc_detail->ref }}</td>
        </tr>
        <tr>
            <td colspan="4">Sales Contact No: {{ $lc_detail->sales_contract_no }}</td>
        </tr>
        <tr>
            <td colspan="2">
                <b><u>Shipment</u></b><br>
                Factory: R.A. Spinning Mills Ltd,<br>
                Kewa Mawna,Sreepur, Gazipur.
            </td>
            <td class="tetx-bold">
                <u>Consignee/Notify</u><br>
                {{ $issuing_bank->bank_name }}<br>
                {{ $issuing_bank->address }}
            </td>
            <td class="text-bold">
                <u>Place of Delivary</u><br>
                {{ $buyer->buyer_name }}<br>
                Factory: {{ $buyer->factory_address }}<br>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                Delivery Challan No: {{ $delivery_doc->dc_id }}
            </td>
            <td>Date: {{ $delivery_doc->document_creation_date }}</td>
            <td></td>
        </tr>
        <tr>
            <td>Truck No.</td>
            <td colspan="3">{{ $delivery_doc->truck_no }}</td>
        </tr>
        <tr>
            <td>Packing: <br>{{ $delivery_doc->packing }}</td>
            <td>Packing List No:<br>{{ $delivery_doc->packing_list_id }}</td>
            <td>Country of Origin:<br>Bangladesh</td>
            <td>Carrier:<br> By Truck </td>
        </tr>
        </tbody>
    </table>
    <!-- End PDF -> Table -> LC -->

    <!-- PDF -> Table -> Product Description -->
    <table class="table PDF-table table-boxed">
        <thead>
        <tr>
            <th>Product Description</th>
            <th>Quantity in Kg</th>
            <th>Unit Rate US $</th>
            <th>Total Value In US $</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $total_weight = 0;
        $total_price = 0;
        ?>
        @foreach($good_description as $g)
            <tr>
                <td>{{ $g->description }}</td>
                <td>{{ $g->net_weight }}</td>
                <td>{{ $g->unit_price }}</td>
                <td>{{ $g->net_weight * $g->unit_price }}</td>
                <?php $total_weight+= $g->net_weight;
                $total_price+=$g->net_weight*$g->unit_price;
                ?>
            </tr>
        @endforeach
        <tr>
            <td>Marchendase to be of Bangladesh origin Yarn for 100% Export Orianted readymade Garments Industry, Quantity, Quality, Rate as per beneficiary Profoma Invocie No. @foreach($myPi as $mp) {{ $mp->pi_id }} Date: {{ $mp->pi_date }}, @endforeach This is back to back LC Basis against Export LC No: {{ $lc_detail->export_lc_no }} Dated: {{ $lc_detail->export_lc_date }}</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr class="text-bold">
            <td class="text-right">Total:</td>
            <td>{{ $total_weight }}</td>
            <td></td>
            <td>{{ $total_price }}</td>
        </tr>
        </tbody>
    </table>
    <!-- End PDF -> Table -> Product Description -->

    Gross weight: {{ $total_weight*1.024 }}<br>
    Certify that the goods shipped are strictly in accourdance with our profoma Invoice No:<br>
    @foreach($myPi as $mp){{ $mp->pi_id }} Dt: {{ $mp->pi_date }}  @endforeach<br>
    Certify that the Yarn is of Bangladesh Origin
    <br><br><br><br>

    <b>For R.A Spinning Mills Ltd.</b><br>
    <br><br><br><br><br><br>
    Authorized Signature

</div>
<div id="PDF-Wrapper" style="page-break-after: always">

    <!-- PDF -> Header -->
    <div class="PDF-header">
        <img src="src/img/piheader.png" alt="PDF Header Image">
    </div>
    <h2 style="text-align: center">DELIVERY CHALLAN</h2>
    <!-- End PDF -> Header -->

    <!-- PDF -> Table Consignee -->
    <table class="table PDF-table table-boxed" id="PDF-biil_of_exchange">
        <tbody>
        <tr>
            <td><b>Delivery Chalan No:</b></td>
            <td>{{ $delivery_doc->dc_id }}</td>
            <td><b>Date</b><br>{{ $delivery_doc->document_creation_date }}</td>
            <td><b>L/C No:</b><br>{{ $lc_detail->lc_id }}</td>
            <td><b>Date</b><br>{{ $lc_detail->issue_date }}</td>
        </tr>
        <tr>
            <td><b>Packing List No:</b></td>
            <td>{{ $delivery_doc->packing_list_id }}</td>
            <td><b>Date: {{ $delivery_doc->document_creation_date }}</b></td>
            <td> Export L/C Sales Con. No.<br>{{ $lc_detail->sales_contract_no }} </td>
            <td> <b>Date</b> {{ $lc_detail->export_lc_date }} </td>
        </tr>
        <tr>
            <td colspan="5"><b>Ref: </b>{{ $lc_detail->ref }}</td>
        </tr>
        <tr>
            <td colspan="5"><b>Sales Contract No: </b>{{ $lc_detail->sales_contract_no }}</td>
        </tr>
        <tr>
            <td> Insurance No:<br> {{ $delivery_doc->insurance_no }}</td>
            <td>Vat regd. No:<br>{{ $lc_detail->vat_registration_no }}</td>
            <td>Area Code: <br>{{ $lc_detail->area_code }}</td>
            <td colspan="2">Import Authorization No.<br>{{ $delivery_doc->import_authorization_no }}</td>
        </tr>
        <tr>
            <td>Truck no.:</td>
            <td colspan="2">{{ $delivery_doc->truck_no }}</td>
            <td>Irc No.:<br>{{ $delivery_doc->irc_no }}</td>
            <td> H.S. code No.<br>{{ $delivery_doc->hs_code_no }}</td>
        </tr>
        <tr>
            <td colspan="3">Shipped Per: Truck</td>
            <td colspan="2"><b>Freight: Pre-paid</b></td>
        </tr>
        </tbody>
    </table>
    <table class="table PDF-table table-boxed">
        <tr>
            <td>Consignee<br>{!! nl2br($lc_detail->notify_party) !!}</td>
            <td>To the Order Of:<br>{{ $issuing_bank->bank_name }}<br>{{ $issuing_bank->address }}</td>
            <td>Shipper/Exporter: <br><b>R.A. Spinning Mills Ltd.<br></b>House #44,Road #06, Block-C<br>Banani,Dhaka-1213</td>
        </tr>
    </table>
    <table class="table PDF-table table-boxed">
        <tr><td><b>Loading Point</b><br>Factory site of R.A.Spinning Mills Ltd.<br>Kewa Mawna, Sreepur, Gazipur</td>
            <td><b>Delivery Point</b><br>{{ $buyer->name }}<br>Office: {!! nl2br($buyer->office_address) !!}<br> Factory: {!! nl2br($buyer->factory_address) !!}</td></tr>
    </table>
    <table class="table PDF-table table-boxed">
        <tr>
            <td><b>Product Description</b></td>
            <td><b>Net Weight<br>in KG</b></td>
            <td><b>Gross weight <br> in KG</b></td>
        </tr>
        <?php
        $total_net_weight = 0;
        $total_gross_weight = 0;
        ?>
        @foreach($good_description as $g)
            <tr>
                <td>{{ $g->description }}</td>
                <td>{{ $g->net_weight }}</td>
                <td>{{ $g->gross_weight }}</td>
            </tr>
            <?php
            $total_net_weight+=$g->net_weight;
            $total_gross_weight+=$g->gross_weight;
            ?>
        @endforeach
        <tr>
            <td><b>Total</b></td>
            <td>{{ $total_net_weight }}</td>
            <td>{{ $total_gross_weight }}</td>
        </tr>
    </table>
    <!-- End PDF -> Table Consignee -->


    <!-- PDF -> Table -> Invoice Info -->

    <!-- End PDF -> Table -> Product Description -->

    Gross weight: {{ $total_gross_weight }} Kg<br>
    Certify that the goods shipped are strictly in accourdance with our profoma Invoice No:<br>
    @foreach($myPi as $mp) {{ $mp->pi_id }} @endforeach<br>
    {#Origin Details}
    <br><br><br><br>

    <b>For R.A Spinning Mills Ltd.</b><br>
    <br><br><br><br><br><br>
    Authorized Signature

</div>
<div id="PDF-Wrapper" style="page-break-after: always">

    <!-- PDF -> Header -->
    <div class="PDF-header">
        <img src="src/img/piheader.png" alt="PDF Header Image">
    </div>
    <!-- End PDF -> Header -->

    <h3 class="text-center text-uppercase text-underline">Detailed Packing List</h3>

    <!-- PDF -> Table -> Packing Info -->
    <table class="table PDF-table table-boxed">
        <tbody>
        <tr>
            <td>Packing List No.</td>
            <td>: {{ $delivery_doc->packing_list_id }}</td>
            <td>Date<br>{{ $delivery_doc->document_creation_date }}</td>
            <td>LC No.<br>{{ $lc_detail->lc_id }}</td>
            <td>Date:<br>{{ $lc_detail->issue_date }}</td>
        </tr>
        <tr>
            <td>Order No:</td>
            <td colspan="2">: {{ $delivery_doc->order_no }}</td>
            <td>Insurance No.:</td>
            <td>{{ $delivery_doc->insurance_no }}</td>
        </tr>
        <tr>
            <td>Profoma Invoice No.</td>
            <td>: @foreach($myPi as $mp) {{ $mp->pi_id }}, @endforeach</td>
            <td>Date: @foreach($myPi as $mp) {{ $mp->pi_date }}, @endforeach</td>
            <td>Inport Authorization Form No.:<br>{{ $delivery_doc->import_authorization_no }}</td>
            <td>Shipping Marks:<br>{{ $delivery_doc->shipping_marks }}</td>
        </tr>
        <tr>
            <td>Export LC No.</td>
            <td>: {{ $lc_detail->export_lc_no }}</td>
            <td>Date:<br>{{ $lc_detail->export_lc_date }}</td>
            <td>IRC No:<br>{{ $delivery_doc->irc_no }}</td>
            <td>H.S Code No.<br>{{ $delivery_doc->hs_code_no }}</td>
        </tr>
        <tr>
            <td colspan="5">Sales Contact no. {{ $lc_detail->sales_contract_no }}</td>
        </tr>
        <tr>
            <td>LC Issuing Bank</td>
            <td colspan="4">{{ $issuing_bank->bank_name }}, {{ $issuing_bank->branch }}, {{ $issuing_bank->address }}</td>
        </tr>
        </tbody>
    </table>
    <!-- End PDF -> Table -> Packing Info -->

    <!-- PDF -> Table -> LC -->
    <table class="table PDF-table table-boxed">
        <tbody>
        <tr>
            <td class="text-bold">
                <u>Consignee:</u>
                {!! $lc_detail->notify_party !!}
            </td>
            <td class="text-bold">
                <u>Shipping / Exporter</u><br>
                R.A. Spinning Mills Ltd.<br>
                Kewa,Mawna, Sreepur, Gazipur.
            </td>
        </tr>
        </tbody>
    </table>
    <!-- End PDF -> Table -> LC -->

    <!-- PDF -> Table -> Product Description -->
    <table class="table PDF-table table-boxed">
        <thead>
        <tr>
            <th class="text-center">Product Description</th>
            <th class="text-center">Gross weight in Kg</th>
            <th class="text-center">Net Weight in Kg</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $total_net_weight = 0;
        $total_gross_weight = 0;
        ?>
        @foreach($good_description as $g)
            <tr>
                <td>{{ $g->description }}</td>
                <td class="text-right">{{ $g->net_weight }}</td>
                <td class="text-right">{{ $g->gross_weight }}</td>
            </tr>
            <?php
            $total_net_weight+=$g->net_weight;
            $total_gross_weight+=$g->gross_weight;
            ?>
        @endforeach
        <tr>
            <td width="75%">Marchendase to be of Bangladesh origin Yarn for 100% Export Orianted readymade Garments Industry, Quantity, Quality, Rate as per beneficiary Profoma Invocie No. RASML /{#NUM} Date: { #Date } This is back to back LC Basis against Export LC No: 9787 Dated: {#Date}</td>
            <td></td>
            <td></td>
        </tr>
        <tr class="text-bold">
            <td class="text-right">Total:</td>
            <td class="text-right">{{ $total_net_weight }}</td>
            <td class="text-right">{{ $total_gross_weight }}</td>
        </tr>
        </tbody>
    </table>
    <!-- End PDF -> Table -> Product Description -->

    Packing: {{ $delivery_doc->packing_bags_count }} Bag<br>
    Certify that the yarn is of Bangladesh origin<br>
    <br><br><br><br>

    <b>For R.A Spinning Mills Ltd.</b><br>
    <br><br><br><br><br><br>
    Authorized Signature

</div>
<div id="PDF-Wrapper" style="page-break-after: always">

    {{-- PDF -> Header --}}
    <div class="PDF-header">
        <img src="src/img/piheader.png" alt="PDF Header Image">
    </div>
    {{-- End PDF -> Header --}}

    <table class="table PDF-table" id="PDF-biil_of_exchange">
        <tbody>

        {{-- PDF -> Body --}}

        <tr class="text-bold table-border-none">
            <td class="text-left">Ref: {{ $lc_detail->ref }}</td>
            <td class="text-right">Date: {{ $pdfdata->document_creation_date }}</td>
        </tr>

        <tr class="table-border-none">
            <td colspan="2">
                <h3 class="text-center text-uppercase text-underline">Beneficiary Certificate</h3>
            </td>
        </tr>

        <tr class="table-border-none">
            <td colspan="2">
                <p>
                    This is to certify that we have supplied the following cotton Yarn to <b>{{ $buyer->buyer_name }}.</b>, {{ $buyer->office_address }} and <b>Factory:</b> {{ $buyer->factory_address }}. The quality and other terms and conditions of the supplied goods were strictly maintained exactly as per  @foreach($myPi as $pi) profoma invoice No: {{ $pi->pi_id }}, Date: {{ $pi->pi_date }} @endforeach. Condition thereof has been complied with the Letter of credit No: {{ $lc_detail->lc_id }} Dated: {{ $lc_detail->issue_date }} <b> of {{ $issuing_bank->bank_name }},</b> {{ $issuing_bank->branch }} opened against Export L/C No: {{ $lc_detail->export_lc_no }} Dated: {{ $lc_detail->export_lc_date }} Sales Contact No. {{ $lc_detail->sales_contract_no }}
                </p>
            </td>
        </tr>

        <tr class="table-border-none">
            <td colspan="2">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Particular of Goods</th>
                        <th class="text-right">Quantity</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $total_weight = 0; ?>
                    @foreach($good_description as $g)
                        <tr>
                            <td>{{ $g->description }}</td>
                            <td class="text-right">{{ $g->net_weight }}</td>
                            <?php $total_weight+=$g->net_weight; ?>
                        </tr>
                    @endforeach
                    <tr>
                        <td class="text-right text-bold border-top-dashed">Total:</td>
                        <td class="text-right text-bold border-top-dashed">{{ $total_weight }}</td>
                    </tr>
                    </tbody>
                </table>
            </td>
        </tr>

        <tr class="table-border-none">
            <td colspan="2">
                <p>
                    We also certify that above mentioned Yarn is of Bangladesh Orgin, as it is spun in our own Spinning Mill, Name: <b>R.A. Sppinning Mills</b> Kewa, Mawna Sreepur, Gazipur and raw materials used have been imported from abroad. In this connection we confirm that we have not avalied and duty bond / duty draw back facilities and have not applied for any incentive & will not apply for the same in future against importing raw materials of supplied Yarn.
                </p>
            </td>
        </tr>

        <tr class="table-border-none">
            <td class="text-bold text-underline">
                <br><br><br><br>
                Authorized Signature
            </td>
            <td></td>
        </tr>
        {{-- End PDF -> Body --}}

        </tbody>
    </table>
</div>
<div id="PDF-Wrapper">

    {{-- PDF -> Header --}}
    <div class="PDF-header">
        <img src="src/img/piheader.png" alt="PDF Header Image">
    </div>
    {{-- End PDF -> Header --}}

    <table class="table PDF-table" id="PDF-biil_of_exchange">
        <tbody>

        {{-- PDF -> Body --}}

        <tr class="text-bold table-border-none">
            <td class="text-left">Ref: {{ $lc_detail->lc_id }}</td>
            <td class="text-right">Date: {{ $pdfdata->document_creation_date }}</td>
        </tr>

        <tr class="table-border-none">
            <td colspan="2">
                <h3 class="text-center text-uppercase text-underline">Certificate of Orgin</h3>
            </td>
        </tr>

        <tr class="table-border-none">
            <td colspan="2">
                <p>
                    This is to certify that we have supplied @foreach($good_description as $g) {{ $g->description }} {{ $g->net_weight }} @endforeach kgs to <b>{{ $buyer->buyer_name }},</b> {{ $buyer->office_address }} and <b>Factory:</b> {{ $buyer->factory_address }} against the Letter of Credit No: {{ $lc_detail->lc_id }} Dated: {{ $lc_detail->issue_date }} of <b>{{ $issuing_bank->bank_name }}</b> {{ $issuing_bank->branch }}, {{ $issuing_bank->address }}, opned against Export L/C No: {{ $lc_detail->export_lc_no }} Dated: {{ $lc_detail->export_lc_date }}  Sales Contact No: {{ $lc_detail->sales_contract_no }}
                </p>
            </td>
        </tr>

        <tr class="table-border-none">
            <td colspan="2">
                <p>
                    We also hereby certify that the above supplied Yarn is of Bangladesh Orgin, which is Spun in our own mill from imported cotton.
                </p>
            </td>
        </tr>

        <tr class="table-border-none">
            <td class="text-bold text-underline">
                <br><br><br><br>
                Authorized Signature
            </td>
            <td></td>
        </tr>
        {{-- End PDF -> Body --}}

        </tbody>
    </table>
</div>

<?php
function convert_number_to_words($number) {

    $hyphen      = '-';
    $conjunction = ' and ';
    $separator   = ', ';
    $negative    = 'negative ';
    $decimal     = ' point ';
    $dictionary  = array(
            0                   => 'zero',
            1                   => 'one',
            2                   => 'two',
            3                   => 'three',
            4                   => 'four',
            5                   => 'five',
            6                   => 'six',
            7                   => 'seven',
            8                   => 'eight',
            9                   => 'nine',
            10                  => 'ten',
            11                  => 'eleven',
            12                  => 'twelve',
            13                  => 'thirteen',
            14                  => 'fourteen',
            15                  => 'fifteen',
            16                  => 'sixteen',
            17                  => 'seventeen',
            18                  => 'eighteen',
            19                  => 'nineteen',
            20                  => 'twenty',
            30                  => 'thirty',
            40                  => 'fourty',
            50                  => 'fifty',
            60                  => 'sixty',
            70                  => 'seventy',
            80                  => 'eighty',
            90                  => 'ninety',
            100                 => 'hundred',
            1000                => 'thousand',
            1000000             => 'million',
            1000000000          => 'billion',
            1000000000000       => 'trillion',
            1000000000000000    => 'quadrillion',
            1000000000000000000 => 'quintillion'
    );

    if (!is_numeric($number)) {
        return false;
    }

    if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
        // overflow
        trigger_error(
                'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,
                E_USER_WARNING
        );
        return false;
    }

    if ($number < 0) {
        return $negative . convert_number_to_words(abs($number));
    }

    $string = $fraction = null;

    if (strpos($number, '.') !== false) {
        list($number, $fraction) = explode('.', $number);
    }

    switch (true) {
        case $number < 21:
            $string = $dictionary[$number];
            break;
        case $number < 100:
            $tens   = ((int) ($number / 10)) * 10;
            $units  = $number % 10;
            $string = $dictionary[$tens];
            if ($units) {
                $string .= $hyphen . $dictionary[$units];
            }
            break;
        case $number < 1000:
            $hundreds  = $number / 100;
            $remainder = $number % 100;
            $string = $dictionary[$hundreds] . ' ' . $dictionary[100];
            if ($remainder) {
                $string .= $conjunction . convert_number_to_words($remainder);
            }
            break;
        default:
            $baseUnit = pow(1000, floor(log($number, 1000)));
            $numBaseUnits = (int) ($number / $baseUnit);
            $remainder = $number % $baseUnit;
            $string = convert_number_to_words($numBaseUnits) . ' ' . $dictionary[$baseUnit];
            if ($remainder) {
                $string .= $remainder < 100 ? $conjunction : $separator;
                $string .= convert_number_to_words($remainder);
            }
            break;
    }

    if (null !== $fraction && is_numeric($fraction)) {
        $string .= $decimal;
        $words = array();
        foreach (str_split((string) $fraction) as $number) {
            $words[] = $dictionary[$number];
        }
        $string .= implode(' ', $words);
    }

    return $string;
}
?>
</body>
</html>