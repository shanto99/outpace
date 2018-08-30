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
        <img src="{{ url('src/img/piheader.png') }}" alt="PDF Header Image">
    </div>
    <!-- End PDF -> Header -->
    <?php
        $rowspan = sizeof($results);
        $ispan = 0;
    ?>
    <table class="table PDF-table" border="1">
        <thead>
            <th>L/C No.& Date</th>
            <th>Count</th>
            <th>Quantity</th>
            <th>Status</th>

        </thead>
        @foreach($results as $result)
            @if($ispan == 0)
                <tr>
                    <td rowspan="{{ $rowspan }}">{{ $lc_detail->lc_id }}<br>Dated: {{ $lc_detail->issue_date }}<br>
                        {{ $lc_detail->issuing_bank->bank_name }}
                        @foreach($do_pis as $do_pi)
                            <p>PI No: {{ $do_pi->pi_id }}</p><br>
                            <p>PI Ex: {{ $do_pi->offer_validity }}</p>
                        @endforeach
                    </td>
                    <td>{{ $result->description }}</td>
                    <td>{{ $result->quantity }}</td>
                    <td>@if($result->requested == 1 || $result->requested == 'Delivered')
                            <p>Delivered</p>
                        @else
                            <p>To be Delivered</p>
                        @endif
                    </td>
                    <?php $ispan = 1; ?>
                </tr>
            @else
                <td>{{ $result->description }}</td>
                <td>{{ $result->quantity }}</td>
                <td>@if($result->requested == 1 || $result->requested == 'Delivered')
                        <p>Delivered</p>
                    @else
                        <p>To be Delivered</p>
                    @endif
                </td>
            @endif
        @endforeach
    </table>

</div>

</body>
</html>
