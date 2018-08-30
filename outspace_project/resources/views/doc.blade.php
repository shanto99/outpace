<html>
<head>
    <style>
        .piheaderimage{
            height: 200px;
            width: 700px;
        }
        .goodsTable{
            border: 1px;
            width: 100%;
        }

    </style>
    <title>

    </title>
</head>
<body>
    <img class="piheaderimage" src="src/img/piheader.png">
    <center><h3>PROFORMA INVOICE</h3></center>
    <P>Proforma Invoice no: {{ $pdf_data->pi_id }}</P>
    <h4>To</h4>
    <h3>{{ $buyer_info->buyer_name }}<br>
        R/O: {{ nl2br($buyer_info->office_address) }}<br>
        Fac: {{ nl2br($buyer_info->factory_address) }}
    </h3>
    <?php
        $total_quantity = 0;
        $total_price = 0;
        $total = 0;
    ?>
<table class="goodsTable" border="1">
    <tr>
        <td>SL</td>
    <td>Description of Goods</td>
    <td>Quantity in (KG)3%+/-</td>
    <td>Unit Price</td>
    <td>Total Price in USD</td>
    </tr>
    <tbody>
    @foreach($pdf_data->goods as $row)
        <tr>
            <td>{{ $row->sl }}</td>
            <td>{{ $row->description }}</td>
            <td> {{ $row->quantity }}</td>
            <td>{{ $row->unit_price }}</td>
            <?php
                $total = $row->quantity*$row->unit_price
            ?>
            <td>{{ $total }}</td>
        </tr>
    <?php
        $total_price = $total_price+$total;
        $total_quantity = $total_quantity+$row->quantity;

    ?>
    @endforeach
    <tr>
        <td></td>
        <td>Total</td>
        <td>{{ $total_quantity }}</td>
        <td></td>
        <td>{{ $total_price }}</td>
    </tr>
    </tbody>
</table>
    <center>
        Total Amount(In words) {{ convert_number_to_words($total_price) }}<br>
        Total Quantity(In words) {{ convert_number_to_words($total_quantity) }}
    </center>
    <h2>Terms and Conditions:</h2>
    # Offer Validity   :{{ $pdf_data->offer_date }}<br>
    # Shipment         :Shipment/Delivery will be make against an Irrevocable Letter of Creditwithin 30 days<br>
    # Letter Of Credit :L/C shall be opened by the Buyer in the favour of Outpace Spinning Mills Ltd. Kewa, Mawna,<br>
                        Sreepur, Gazipur. within the validity of the Proforma Invoice.<br>
    # Banker           :{{ $bank_info->bank_name }}, {{ $bank_info->branch }}{{ $bank_info->swift }}<br>
    # Packing          : Factory Standard <br>
    # Insurance        : On Buyer Account<br>
    # Partial shipment : Allowed<br>
    # Delivery         : After receive of Irrevocable Letter of Credit<br>
    # Negotiation      : Within 21(Twenty one) days from the date of Delivery Challan/Truck Receipt duly accepted by the
                         Purchaser's representative<br>
    # Payment:         : Reimbursement of full Invoice value to be paid by the L/C opening Bank to the negotiating Bank as per instruction of the negotiating Bank <?php if($pdf_data->payment_period==0){ echo "at sight"; } else{ echo "within ". $pdf_data->payment_period. " days from the date of delivery of goods"; }  ?>

    <br># Country of Origin: Bangladesh<br>
    <br># Goods shall be delivered by Seller through Buyer's/Purchaser's authorized reperesentative form the <b>from the factory of Seller at Kewa, Mawna Chowrasta, Sreepur, Gazipur</b>and
    reveiving signature of the goods on Delivery Challan by the Buyer's/Purchaser's representative will be treated as acceptance of the goods and documents.
    <br># Inspection regarding quality and quantity may be inspected by the Buyer's/Purchaser's representative before delivery of the goods, at Buyer's/Purchaser's cost.
    Claims, if any regarding quality & quantity, must be submitted within 7(seven) days after delivery, otherwise no claim will be entertained.
    <br># Documents must be accepted by the L/C opening Bank and payment will be make in USD(United States Dollars) on or before the date of maturity to Seller's Bank accordingly.
    <br># If payment not made within maturity <b>{{ $pdf_data->overdue_interest }}% P.A</b> interest will be charded for overdue period and Buyer/Purchase will be liable to pay.All
    documents to be sealed signed and accepted at the time of delivery. L/C megotiation terms strictly to be as per L/C negotiation documents(1.Bill of exchange, 2. Signed Commercial Invoice,
    3. Delivery Challan, 4. Packing list, 5. Certificate of Origin issued by the Benificiary) terms. Any terms outside these mentioned in the L/C have to be changed or canceled if asked by the benificiary.
    In that case all charges for changing/amending are on buyer account.
    <br># Bill of Exchange is to be drawn on the Bank, not L/C applicant.
    <br># To facilitate issue of GSP certificate bu EPB & to get Certificate of Production from BTMA, the Buyer/Purchaser will mention the number & date of Master L/C and total quantity of finished goods to be exported
    under the said Master L/C in the Bank back to back L/C.
    <br># Maturity date will be counted from the date of <b>Delivery of Challan</b>.
    <br>For <b>{{ $buyer_info->buyer_name }}</b>


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

