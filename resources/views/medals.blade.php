<!doctype html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <title>奖牌榜</title>
    @vite('resources/css/app.css')
</head>
<body>
<table class="medals-table">
    <tr>
        <th>地区</th>
        <th>金牌</th>
        <th>银牌</th>
        <th>铜牌</th>
        <th>总数</th>
    </tr>
    @foreach($medals as $medal)
        <tr>
            <td>{{ $medal['country'] }}</td>
            <td>{{ $medal['gold'] }}</td>
            <td>{{ $medal['silver'] }}</td>
            <td>{{ $medal['bronze'] }}</td>
            <td>{{ $medal['total'] }}</td>
        </tr>
    @endforeach
</table>
</body>
</html>
