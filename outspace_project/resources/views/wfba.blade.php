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
    <th>Commercial Invoice No</th>
    <th>Bank Sub. Dt</th>
    <th>Bank ref. NO.</th>
    <th>Maturity Date</th>
    <th width="118px;">PI</th>
    <th width="139px">Count</th>
    <th width="130px">Qnty(Kg)</th>
    <th width="100px">Rate($/Kg)</th>
    <th width="100px">Value($)</th>
    <th width="100px">Total Value($)</th>
    </thead>

    <tbody>
    @for ($llcc = 0; $llcc < sizeof($mainarray); $llcc++)
        <?php $grand_total = 0; ?>
        <tr>
            <td>
                {{ $mainarray[$llcc][5] }}
            </td>
            <td>
                {{ $mainarray[$llcc][1] }}
            </td>
            <td>
                {{ $mainarray[$llcc][6] }}
            </td>
            <td>
                {{ $mainarray[$llcc][7] }}
            </td>
            <td>
                {{ $mainarray[$llcc][8] }}
            </td>
            <td>
                {{ $mainarray[$llcc][9] }}
            </td>
            <td>
                {{ $mainarray[$llcc][10] }}
            </td>
            <td>
                {{ $mainarray[$llcc][11] }}
            </td>
            <td>
                {{ $mainarray[$llcc][12] }}
            </td>
            <td>
                {{ $mainarray[$llcc][13] }}
            </td>
            <td colspan="5">
                <table border="1">
                    @for ($ppii = 0; $ppii < sizeof($mainarray[$llcc][3]); $ppii++)
                        <?php $total = 0; ?>
                        <tr>
                            <td width="100px;">
                                <div style="width: 110px">
                                    {{ $mainarray[$llcc][3][$ppii] }}
                                </div>
                            </td>
                            <td>
                                @for($cc = 0; $cc < sizeof($mainarray[$llcc][2]); $cc++)
                                    @if ($mainarray[$llcc][3][$ppii] == $mainarray[$llcc][2][$cc]->pi)
                                        <div style="border-bottom:1px solid black; width:140px;">
                                            {{$mainarray[$llcc][2][$cc]->description}}
                                            <?php $total+=$mainarray[$llcc][2][$cc]->quantity*$mainarray[$llcc][2][$cc]->unit_price ?>
                                        </div>
                                    @endif
                                @endfor
                                <?php $grand_total+=$total; ?>
                            </td>
                            <td>
                                @for($cc = 0; $cc < sizeof($mainarray[$llcc][2]); $cc++)
                                    @if ($mainarray[$llcc][3][$ppii] == $mainarray[$llcc][2][$cc]->pi)
                                        <div style="border-bottom:1px solid black; width:130px;">
                                            {{$mainarray[$llcc][2][$cc]->quantity}}
                                        </div>
                                    @endif
                                @endfor
                            </td>
                            <td>
                                @for($cc = 0; $cc < sizeof($mainarray[$llcc][2]); $cc++)
                                    @if ($mainarray[$llcc][3][$ppii] == $mainarray[$llcc][2][$cc]->pi)
                                        <div style="border-bottom:1px solid black; width:100px;">
                                            ${{$mainarray[$llcc][2][$cc]->unit_price}}
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