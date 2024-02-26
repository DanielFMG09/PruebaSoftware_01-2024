<head>
        <link rel="stylesheet" href="{{ asset('assets/estilo_home.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/estilo.css') }}">
    </head>


<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<div class="container">
<div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
    <a class="dropdown-item" href="{{ route('logout') }}"
        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
        {{ __('Logout') }}
    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
</div>

<div class="box_contenedor">
    
    <div class="box_contenedor_duo">
        <table>
            <thead>
                <tr>
                    <th>FECHA REGISTRO</th>
                    <th>TEMPERATURA</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datos as $item)
                <tr>
                    <th>{{$item->fecha_registro}}</th>
                    <th>{{$item->temperatura}}</th>
                </tr>
                @endforeach
            </tbody>

            <form action="{{route('create')}}" method="post">
            @csrf
                <input type="submit" value="Registrar" />
            </form>

            @if(session("correcto"))
            <div class="mensaje_correcto"><p>{{session("correcto")}}</p></div>
            @endif
            @if(session("incorrecto"))
            <div class="mensaje_error"><p>{{session("incorrecto")}}</p></div>
            @endif

        </table>

    </div>

    <div class="box_contenedor_duo">

        <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
            ['Dia', 'Temperatura'],
            @foreach ($datos as $item)
            ['{{ $item->fecha_registro}}', {{$item  ->temperatura}}],
            @endforeach
        
        ]);
        // ['2024-02-23', 27.2],
            // ['2024-02-24', 27.1],
            // ['2024-02-25', 29.5],
            // ['2024-02-26', 29.5],
            // ['2024-02-27', 28],
        var options = {
            title: 'Control del clima',
            curveType: 'function',
            legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));
        chart.draw(data, options);
        }
        </script>

        <div id="curve_chart" class="curve_chart    "></div>

    </div>
</div>







</div>

