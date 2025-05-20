<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Reporte de Usuario</title>
    <style>
        body { font-family: 'Segoe UI', Arial, sans-serif; background: #f6f8fa; color: #222; margin: 0; padding: 0; }
        .container { background: #fff; max-width: 800px; margin: 30px auto; border-radius: 12px; box-shadow: 0 2px 12px #0001; padding: 40px 32px; }
        h2, h3 { color: #2e7d32; margin-top: 0; }
        .user-info { margin-bottom: 24px; }
        .metrics-table { width: 100%; border-collapse: collapse; margin-bottom: 32px; }
        .metrics-table th, .metrics-table td { padding: 10px 16px; border-bottom: 1px solid #e0e0e0; text-align: left; }
        .metrics-table th { background: #e8f5e9; color: #388e3c; }
        .metrics-table td strong { color: #1565c0; }
        .chart { margin: 32px 0; text-align: center; }
        .section-title { margin-top: 32px; margin-bottom: 12px; font-size: 1.2em; border-left: 5px solid #43a047; padding-left: 10px; background: #e8f5e9; }
        .footer { margin-top: 40px; font-size: 0.95em; color: #888; text-align: center; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Reporte ecológico de {{ $user->name }}</h2>
        <div class="user-info">
            <p><strong>Email:</strong> {{ $user->email }}</p>
        </div>
        <div class="section-title">Métricas acumuladas</div>
        <table class="metrics-table">
            <tr>
                <th>CO₂ ahorrado</th>
                <th>Agua conservada</th>
                <th>Residuos evitados</th>
            </tr>
            <tr>
                <td><strong>{{ $total_co2 }} kg</strong></td>
                <td><strong>{{ $total_water }} litros</strong></td>
                <td><strong>{{ $total_waste }} kg</strong></td>
            </tr>
        </table>
        <div class="section-title">Evolución de tu impacto</div>
        <div class="chart">
            <img src="https://quickchart.io/chart?c={
                type:'line',
                data:{
                    labels:{{ json_encode($dates) }},
                    datasets:[
                        {label:'CO₂',data:{{ json_encode($co2) }},borderColor:'green',backgroundColor:'rgba(46,125,50,0.1)',fill:true,lineTension:0.3,pointRadius:3},
                        {label:'Agua',data:{{ json_encode($water) }},borderColor:'blue',backgroundColor:'rgba(33,150,243,0.1)',fill:true,lineTension:0.3,pointRadius:3},
                        {label:'Residuos',data:{{ json_encode($waste) }},borderColor:'orange',backgroundColor:'rgba(255,167,38,0.1)',fill:true,lineTension:0.3,pointRadius:3}
                    ]
                },
                options:{
                    title:{display:true,text:'Consumo y ahorro a lo largo del tiempo',fontSize:18},
                    legend:{labels:{fontSize:14}},
                    scales:{
                        yAxes:[{scaleLabel:{display:true,labelString:'Cantidad'}}],
                        xAxes:[{scaleLabel:{display:true,labelString:'Fecha'}}]
                    }
                }
            }" alt="Gráfica de impacto ecológico" style="width:100%;max-width:700px;border-radius:8px;box-shadow:0 1px 6px #0002;">
        </div>
        <div class="footer">
            <p>Reporte generado el {{ date('d/m/Y') }} &mdash; EcoChallenge</p>
        </div>
    </div>
</body>
</html>