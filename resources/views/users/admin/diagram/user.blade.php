<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <title>Document</title>
</head>
<body>
<div style="padding: 40px; padding-left: 600px">
    <form action="<?=url('/')?>/admin/manajemen/diagram_user_pilih" method="post">
    {{ csrf_field() }}
        <table>
            <tr>
                <select name="bulan" id="bulan">
                    <option value="">{{$data[0]}}</option>
                    <option value="01">Januari</option>
                    <option value="02">februari</option>
                    <option value="03">Maret</option>
                    <option value="04">April</option>
                    <option value="05">Mei</option>
                    <option value="06">Juni</option>
                    <option value="07">Juli</option>
                    <option value="08">Agustus</option>
                    <option value="09">September</option>
                    <option value="10">Oktober</option>
                    <option value="11">November</option>
                    <option value="12">Desember</option>
                </select>
            </tr>
            <tr>     </tr>
            <tr>
                <input type="number" value="{{$data[1]}}" name="tahun" id="tahun">
            </tr>
            <tr>
                <button type="submit">Pilih</button>
            </tr>
        </table>
    </form>
</div>
<div id="container">
</div> 

<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
    Highcharts.chart('container', {
    chart: {
        type: 'line'
    },
    title: {
        text: 'Jumlah Pengguna'
    },
    subtitle: {
        text: 'KitaPuraMall'
    },
    xAxis: {
        categories: {!!json_encode($array_date)!!}
    },
    yAxis: {
        title: {
            text: 'Jumlah Penguna'
        }
    },
    plotOptions: {
        line: {
            dataLabels: {
                enabled: false
            },
            enableMouseTracking: true
        }
    },
    series: [{
        name: 'Pengguna',
        data: {!!json_encode($array_count_user)!!}
    },{
        name: 'Toko',
        data: {!!json_encode($array_count_toko)!!}
    }]
});
</script>
</body>
</html>