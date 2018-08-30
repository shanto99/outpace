<html>
    <head>
        <title>Net Realization Table</title>
    </head>
    <bod>
        <table border="1">
            <thead>
                <th>Doc. Number</th>
                <th>Total Value</th>
                <th>Short Payment</th>
                <th>crc</th>
                <th>Loan Interest</th>
                <th>Loss</th>
                <th>Net Profit</th>
            </thead>
            @foreach($datas as $data)
                <tr>
                    <td>{{ $data->doc_id }}</td>
                    <td> {{ $data->total_value }}</td>
                    <td> {{ $data->short_payment }} </td>
                    <td>{{ $data->crc }}</td>
                    <td>{{ $data->loan_interest }}</td>
                    <td> {{ $data->loss }} </td>
                    <td> {{ $data->net_profit }}</td>
                </tr>
            @endforeach
        </table>
    </bod>
</html>