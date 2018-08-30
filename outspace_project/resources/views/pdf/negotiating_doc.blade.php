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
	
	<div id="PDF-Wrapper">
		
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
						<b>Mr.</b><br>
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
</body>
</html>