<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Reporte de Usuario</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .metric { margin-bottom: 10px; }
        .chart { margin: 20px 0; }
    </style>
</head>
<body>
    <h2>Reporte de Usuario: {{ $user->name }}</h2>
    <p>Email: {{ $user->email }}</p>
    <hr>
    <h3>Métricas acumuladas</h3>
    <div class="metric">CO₂ ahorrado: <strong>{{ $total_co2 }} kg</strong></div>
    <div class="metric">Agua conservada: <strong>{{ $total_water }} litros</strong></div>
    <div class="metric">Residuos evitados: <strong>{{ $total_waste }} kg</strong></div>

    <hr>
    <h3>Evolución de tu impacto</h3>
    <div class="chart">
        <img src="https://quickchart.io/chart?c={
            type:'line',
            data:{
                labels:{{ json_encode($dates) }},
                datasets:[
                    {label:'CO₂',data:{{ json_encode($co2) }},borderColor:'green',fill:false},
                    {label:'Agua',data:{{ json_encode($water) }},borderColor:'blue',fill:false},
                    {label:'Residuos',data:{{ json_encode($waste) }},borderColor:'orange',fill:false}
                ]
            },
            options:{
                title:{display:true,text:'Consumo y ahorro a lo largo del tiempo'}
            }
        }" alt="Gráfica de impacto ecológico" style="width:100%;max-width:700px;">
    </div>
</body>
</html>