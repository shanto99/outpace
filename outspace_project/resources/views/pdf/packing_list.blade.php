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

</body>
</html>
