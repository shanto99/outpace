<html>
<title>Test</title>
<head></head>
<body>
<table border="1">
    <thead>
    <th>Buyer</th>
    <th>LC</th>
    <th>L/C Date</th>
    <th>Last shipment date</th>
    <th>Expiry date</th>
    <th>L/C sight</th>
    <th width="118px;">PI</th>
    <th width="139px">Count</th>
    <th width="130px">Qnty(Kg)</th>
    <th width="100px">Bal. Qty</th>
    <th width="100px">Today Del.</th>
    <th width="100px">Rate($/Kg)</th>
    <th width="100px">Amount($)</th>
    <th width="100px">Total Amount($)</th>
    </thead>

    <tbody>
    @for ($llcc = 0; $llcc < sizeof($mainarray); $llcc++)
        <?php $grand_total = 0; ?>
        <tr>
            <td>
                {{ $mainarray[$llcc][0] }}
            </td>
            <td>
                {{ $mainarray[$llcc][1] }}
            </td>
            <td>
                {{ $mainarray[$llcc][2] }}
            </td>
            <td>
                {{ $mainarray[$llcc][3] }}
            </td>
            <td>
                {{ $mainarray[$llcc][4] }}
            </td>
            <td>
                {{ $mainarray[$llcc][5] }}
            </td>
            <td colspan="7">
                <table border="1">
                    @for ($ppii = 0; $ppii < sizeof($mainarray[$llcc][6]); $ppii++)
                        <?php $total = 0; ?>
                        <tr>
                            <td width="100px;">
                                <div style="width: 110px">
                                    {{ $mainarray[$llcc][6][$ppii] }}
                                </div>
                            </td>
                            <td>
                                @for($cc = 0; $cc < sizeof($mainarray[$llcc][7]); $cc++)
                                    @if ($mainarray[$llcc][6][$ppii] == $mainarray[$llcc][7][$cc]->pi_id)
                                        <div style="border-bottom:1px solid black; width:140px;">
                                            {{$mainarray[$llcc][7][$cc]->description}}
                                            <?php $total+=$mainarray[$llcc][7][$cc]->balance*$mainarray[$llcc][7][$cc]->unit_price ?>
                                        </div>
                                    @endif
                                @endfor
                                <?php $grand_total+=$total; ?>
                            </td>
                            <td>
                                @for($cc = 0; $cc < sizeof($mainarray[$llcc][7]); $cc++)
                                    @if ($mainarray[$llcc][6][$ppii] == $mainarray[$llcc][7][$cc]->pi_id)
                                        <div style="border-bottom:1px solid black; width:130px;">
                                            {{$mainarray[$llcc][7][$cc]->qty}}
                                        </div>
                                    @endif
                                @endfor
                            </td>
                            <td width="50px">
                                @for($cc = 0; $cc < sizeof($mainarray[$llcc][7]); $cc++)
                                    @if ($mainarray[$llcc][6][$ppii] == $mainarray[$llcc][7][$cc]->pi_id)
                                        <div style="border-bottom:1px solid black; width:130px;">
                                            {{$mainarray[$llcc][7][$cc]->balance}}
                                        </div>
                                    @endif
                                @endfor
                            </td>
                            <td width="50px">
                                @for($cc = 0; $cc < sizeof($mainarray[$llcc][7]); $cc++)
                                    @if ($mainarray[$llcc][6][$ppii] == $mainarray[$llcc][7][$cc]->pi_id)
                                        <div style="border-bottom:1px solid black; width:130px;">
                                            {{$mainarray[$llcc][7][$cc]->today_del}}
                                        </div>
                                    @endif
                                @endfor
                            </td>
                            <td>
                                @for($cc = 0; $cc < sizeof($mainarray[$llcc][7]); $cc++)
                                    @if ($mainarray[$llcc][6][$ppii] == $mainarray[$llcc][7][$cc]->pi_id)
                                        <div style="border-bottom:1px solid black; width:100px;">
                                            ${{$mainarray[$llcc][7][$cc]->unit_price}}
                                        </div>
                                    @endif
                                @endfor
                            </td>
                            <td width="150px">
                                ${{ $total }}
                            </td>
                        </tr>
                    @endfor

                </table>
            </td>
            <td>
                ${{ $grand_total }}
            </td>
        </tr>
    @endfor
    </tbody>
</table>
</body>
</html>