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
									<td>{XXX}</td>
									<td>Dated:</td>
									<td>{XXX}</td>
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
        @foreach($myPi as $pl)  {{ $pl->pi_id }} dt:{{ $pl->pi_date }} @endforeach  This is back to back L/C basis against Export LC No {{ $lc_detail->export_lc_no }} Dated: { Date } <br><br>
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

</body>
</html>
