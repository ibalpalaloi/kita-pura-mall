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
@php
$bulan =['Januari', 'februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
$value =['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];
@endphp
<div style="padding: 40px; padding-left: 600px">
    <form action="<?=url('/')?>/admin/manajemen/diagram_user_pilih" method="post">
    {{ csrf_field() }}
        <table>
            <tr>
                <select name="bulan" id="bulan">
                    <option value="00">30 Hari Terakhir</option>
                    @for($i=0; $i<12; $i++)
                        <option @if($data[0] == $value[$i]) selected @endif value="{{$value[$i]}}">{{$bulan[$i]}}</option>
                    @endfor
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
<div id="container"></div> 
<br><br><br>
<div id="diagram_kategori_toko"></div>
<br><br><br>
<div id="diagram_kategori_produk"></div>

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

<script>
    Highcharts.chart('diagram_kategori_toko', {
    chart: {
        type: 'bar'
    },
    title: {
        text: 'Kategori Toko'
    },
    subtitle: {
        text: ''
    },
    xAxis: {
        categories: {!!json_encode($kategori_toko)!!},
        title: {
            text: null
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Population (millions)',
            align: 'high'
        },
        labels: {
            overflow: 'justify'
        }
    },
    tooltip: {
        valueSuffix: ' toko'
    },
    plotOptions: {
        bar: {
            dataLabels: {
                enabled: true
            }
        }
    },
    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'top',
        x: -40,
        y: 80,
        floating: true,
        borderWidth: 1,
        backgroundColor:
            Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF',
        shadow: true
    },
    credits: {
        enabled: false
    },
    series: [{
        name: 'Toko',
        data: {!!json_encode($jumlah_toko)!!},
    }]
});
</script>

<script>
    Highcharts.chart('diagram_kategori_produk', {
    chart: {
        type: 'bar'
    },
    title: {
        text: 'Kategori Produk'
    },
    subtitle: {
        text: ''
    },
    xAxis: {
        categories: {!!json_encode($kategori_produk)!!},
        title: {
            text: null
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Population (millions)',
            align: 'high'
        },
        labels: {
            overflow: 'justify'
        }
    },
    tooltip: {
        valueSuffix: ' Produk'
    },
    plotOptions: {
        bar: {
            dataLabels: {
                enabled: true
            }
        }
    },
    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'top',
        x: -40,
        y: 80,
        floating: true,
        borderWidth: 1,
        backgroundColor:
            Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF',
        shadow: true
    },
    credits: {
        enabled: false
    },
    series: [{
        name: 'Produk',
        data: {!!json_encode($jumlah_kategori_produk)!!},
    }]
});
</script>
</body>
</html>