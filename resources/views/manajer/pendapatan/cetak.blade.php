<!DOCTYPE html>
<html lang="en">
<style>
    .center {
        margin-left: auto;
        margin-right: auto;
    }

</style>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Pendapatan</title>
</head>
<center>
    <h3>Laporan Pendapatan</h3>
</center>
<table cellspacing="0" cellpadding="10" border="1" class="center">
    <tr>
        <th>Tanggal</th>
        <th>Pendapatan</th>
    </tr>
    @foreach ($pendapatan as $no => $data)
        <tr>
            <td>{{ Carbon\Carbon::parse($data->day)->locale('id')->isoFormat('dddd, D MMMM, Y') }}</td>
            <td>Rp. {{ number_format($data->pendapatan) }}</td>
        </tr>
    @endforeach
</table>

<body>

</body>

</html>
