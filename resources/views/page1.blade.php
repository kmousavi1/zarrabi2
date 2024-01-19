<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>page1</title>
</head>
<body>





<p>last id chart 1 = {{ $data['last_id_chart1'] }}</p>
<p>last id chart 2= {{ $data['last_id_chart2'] }}</p>
<p>last id chart 3 = {{ $data['last_id_chart3'] }}</p>
<br>
<br>
<br>
@if($data['status'])
    @if($data['data_log_count']>0)
        <p>data recorded succesfully . number of record = {{ $data['data_log_count'] }}</p>
    @else
        <p>there is no new data to record</p>
    @endif
@else
<p>data do not recorded successfully</p>
@endif








</body>
</html>
