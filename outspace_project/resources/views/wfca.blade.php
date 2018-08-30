<html>
<head>
    <title>

    </title>
</head>
<body>

<table border="1">
    <thead>
    <th>LC</th>
    <th>PI</th>
    <th>Count</th>
    </thead>

    <tbody>
    @for($i=0;$i<sizeof($mainarray);$i++)
        <?php $good = 0;?>
        <?php $span = 0; $pispan = 0;?>

        <?php $rowspan = sizeof($mainarray[$i][0]) ?>

        @foreach($mainarray[$i][2] as $goods)

            <tr>
                <?php if(sizeof($mainarray[$i][2])>1 && $span==0){ ?>
                <td rowspan="{!! sizeof($mainarray[$i][2]) !!}}"> {{ $mainarray[$i][0] }} </td>
                <?php $span = 1; ?>
                <?php } elseif($span != 1){ ?>
                <td>{{ $mainarray[$i][0] }}</td>
                <?php } ?>
                    @if($good == 0)
                        @for($n=0;$n<sizeof($mainarray[$i][3]);$n++)
                            <td rowspan="{!! sizeof($pi_goods[$mainarray[$i][3][$n]]) !!}}">{{ $mainarray[$i][3][$n] }}</td>
                         @endfor
                    @endif
            <td>{{ $goods->description }}</td>
            </tr>



        @endforeach

    @endfor
    </tbody>
</table>
<?php


?>

<table border="1">
    <thead>
    <th>LC</th>
    <th>PI</th>
    <th>Cotton</th>
    </thead>
@for($i=0;$i<sizeof($mainarray);$i++)
    <?php $lc_tracer = 0; ?>
    @for($j = 0; $j<sizeof($mainarray[$i][3]); $j++)
        <?php $k = 0; $pi_tracer = 0; ?>
        @foreach($pi_goods[$mainarray[$i][3][$k]] as $goods)
            <tr>
                @if($lc_tracer == 0)
                  <td rowspan="{!! sizeof($mainarray[$i][2]) !!}">{{ $mainarray[$i][0] }}</td>
                    <?php $lc_tracer = 1; ?>
                @endif
                @if($pi_tracer == 0)
                  <td rowspan="{!! sizeof($pi_goods[$mainarray[$i][3][$j]]) !!}}">{{ $mainarray[$i][3][$j] }}</td>
                    <?php $pi_tracer = 1; ?>
                @endif
                  <td>{{ $goods->description }}</td>
            </tr>
        @endforeach
    @endfor
@endfor
</table>

<table border="1">
    <thead>
        <th>LC</th>
        <th>PI</th>
        <th>Count</th>
    </thead>

    <tbody>
        @for($i=0;$i<sizeof($mainarray);$i++)
            <?php $lc_tracer = 0; ?>


                        @foreach($mainarray[$i][2] as $goods)
                            <tr>
                            @if($lc_tracer==0)
                                <td rowspan="{!! sizeof($mainarray[$i][2]) !!}}">{{ $mainarray[$i][0] }}</td>
                                <?php $lc_tracer = 1; ?>
                            @endif
                                <td>{{ $goods->description }}</td>
                            </tr>
                        @endforeach
        @endfor
    </tbody>
</table>

</body>
</html>