<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PDF PAGE TITLE</title>
    <style>
        body{ font-size: 14px; font-family: sans-serif; }
        table{ border-spacing: 0; border-collapse: collapse; background-color: transparent; }
        td, th{ padding: 0; }
        thead { display: table-header-group; }
        th{ text-align: left; }
        tr, img { page-break-inside: avoid; }
        img { max-width: 100% !important; }
        .table { border-collapse: collapse !important; width: 100%; max-width: 100%; margin-bottom: 10px; }
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
        .table > tfoot > tr > td{ background-color: #CCC; }
        .table .table-border-none td{ border: none; }
        .table-boxed tr > th, table.table-boxed tr > td { border: 1px solid #d8e6ec !important; }
        .text-left{ text-align: left; }
        .text-center{ text-align: center; }
        .text-right{ text-align: right; }
        .text-justify{ text-align: justify; }
        .text-bold{ font-weight: bold; }
        .text-underline{ text-decoration: underline; }
        .text-uppercase{ text-transform: uppercase; }
        .margin-bottom-0{ margin-bottom: 0; }
        .border-none{ border: 0; }
        .border-top-dashed{ border-top: 1px dashed #aaa !important; }
        .box-amount{ display: inline-block; padding: .5em 1em; font-weight: bold; background-color: #eee; border-radius: 3px; border: 1px dashed #ccc; }
    </style>
</head>
<body>

<div id="PDF-Wrapper">

    <!-- PDF -> Header -->
    <div class="PDF-header">
        <img src="src/img/piheader.png" alt="PDF Header Image">
    </div>
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

</body>
</html>
