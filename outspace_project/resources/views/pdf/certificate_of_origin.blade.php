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
		.table > tfoot > tr > td{ background-color: #CCC; }
		.table .table-border-none td{ border: none; }
		
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

</body>
</html>