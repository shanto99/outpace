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
		.text-uppercase{ text-transform: uppercase; }
		.margin-bottom-0{ margin-bottom: 0; }
		.border-none{ border: 0; }
		.box-amount{ display: inline-block; padding: .5em 1em; font-weight: bold; background-color: #eee; border-radius: 3px; border: 1px dashed #ccc; }
	</style>
</head>
<body>
	
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
							At sight of this <span class="text-uppercase text-bold">First</span> Bill of Exchange <span class="text-uppercase text-bold"></span> pays to the order of {{ $negotiating_bank->bank_name }}., {{ $negotiating_bank->branch }} or order the sum of <b>{{ convert_number_to_words($delivery_doc->total_amount) }} dollar and No Cent</b> Only value received and charges the same to the account of <b>{{ $buyer->buyer_name }},</b> drawn under <b>{{ $issuing_bank->bank_name }} {{ $issuing_bank->branch }} {{ $issuing_bank->address }}</b>, L/C No. {{ $pdfdata->lc_id }} Dated: { Date }, as per as Invoice No. {{ $delivery_doc->be_id }}, Date {{ $pdfdata->document_creation_date }}
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
	<div id="PDF-Wrapper">

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
						At sight of this <span class="text-uppercase text-bold">Second</span> Bill of Exchange <span class="text-uppercase text-bold"></span> pays to the order of {{ $negotiating_bank->bank_name }}., {{ $negotiating_bank->branch }} or order the sum of <b>{{ convert_number_to_words($delivery_doc->total_amount) }} dollar and No Cent</b> Only value received and charges the same to the account of <b>{{ $buyer->buyer_name }},</b> drawn under <b>{{ $issuing_bank->bank_name }} {{ $issuing_bank->branch }} {{ $issuing_bank->address }}</b>, L/C No. {{ $pdfdata->lc_id }} Dated: { Date }, as per as Invoice No. {{ $delivery_doc->be_id }}, Date {{ $pdfdata->document_creation_date }}
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