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
				<tr class="table-border-none">
					<td class="text-bold" width="65%">
						<u>Consignee</u><br>
						{{ $buyer->buyer_name }}<br>
						{{ print(nl2br($buyer->office_address)) }}
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

</body>
</html>
