<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Reporte de Máquina</title>
    <style>
        @page {
            margin: 100px 50px 80px 50px;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 12px;
            color: #333;
            background: #fff;
        }

        header {
            position: fixed;
            top: -80px;
            left: 0;
            right: 0;
            height: 80px;
            background-color: #f7c948;
            padding: 10px 25px;
            border-bottom: 2px solid black;
            border-top: 2px solid black;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.15);
            display: flex;
            align-items: center;
        }

        .logo {
            position: relative;
            top: 15px

        }

        header .logo img {
            
            height: 60px;
        }

        header .empresa {
            position: relative;
            left: 220px;
            bottom: 30px
        }

        header h1 {
            font-size: 28px;
            font-weight: 700;
            color: #333;
            margin: 0;
            user-select: none;
            text-shadow: 1px 1px 2px rgba(255, 255, 255, 0.6);
            letter-spacing: 1px;
        }

        footer {
            position: fixed;
            bottom: -60px;
            left: 0;
            right: 0;
            height: 50px;
            font-size: 10px;
            text-align: center;
            border-top: 1px solid #ddd;
            padding-top: 5px;
            color: #666;
            font-style: italic;
        }

        .section-title {
            font-size: 16px;
            margin-top: 20px;
            margin-bottom: 10px;
            border-bottom: 1px solid #ccc;
            padding-bottom: 5px;
            color: #f7c948;
            font-weight: 600;
        }

        .machine-info {
            margin-bottom: 20px;
            background-color: #fff9e6;
            border: 1px solid #f7c948;
            padding: 12px 15px;
            border-radius: 8px;
            box-shadow: 0 0 8px rgba(247, 201, 72, 0.3);
        }

        .machine-info p {
            margin: 6px 0;
            font-size: 14px;
        }

        .machine-info strong {
            color: #b38600;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        table,
        th,
        td {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            border: 1px solid black;
        }

        th {
            background-color: #f8d166;
            padding: 8px;
            font-size: 13px;
            color: black;
            font-weight: 600;
        }

        td {
            padding: 6px;
            font-size: 12px;
            color: #333;
        }
    </style>
</head>

<body>
    <header>
        <div class="logo">
            <img src="{{ public_path('favicon.png') }}" alt="Logo Empresa">
        </div>
        <div class="empresa">
            <h1>ConstruVial S.A.</h1>
        </div>
    </header>

    <footer>
        Página
        <script type="text/php">
            if (isset($pdf)) {
                $pdf->page_script(function ($pageNumber, $pageCount, $pdf) {
                    $text = "Página $pageNumber de $pageCount";
                    $pdf->text(520, 20, $text, null, 10, array(0,0,0));
                });
            }
        </script>
        <br>
        Reporte generado el {{ date('d/m/Y') }}
    </footer>

    <br><br>
    <main>
        <div class="section-title">Información de la Máquina</div>
        <div class="machine-info">
            <p><strong>Número de Serie:</strong> {{ $maquina->serial_number }}</p>
            <p><strong>Modelo:</strong> {{ $maquina->model }}</p>
            <p><strong>Tipo:</strong> {{ $maquina->type->name }}</p>
            <p><strong>Kilometraje:</strong> {{ $maquina->actual_km }}</p>
            <p><strong>Estado:</strong> {{ $maquina->status->name }}</p>
        </div>

        <div class="section-title">Asignaciones</div>
        <table>
            <thead>
                <tr>
                    <th>Fecha de Inicio</th>
                    <th>Fecha de Finalización</th>
                    <th>Motivo de Finalización</th>
                    <th>Sitio</th>
                </tr>
            </thead>
            <tbody>
                @if($maquina->assignment->isEmpty())
                <tr>
                    <td colspan="4" style="color: red; text-align: center; font-weight: bold;">
                        No tiene asignaciones registradas.
                    </td>
                </tr>
                @else
                @foreach ($maquina->assignment as $asignacion)
                <tr>
                    <td>{{ $asignacion->start_date }}</td>
                    @if ($asignacion->end_date == null)
                    <td style="color:red">sin finalizar</td>
                    <td style="color:red">sin finalizar</td>
                    @else
                    <td>{{ $asignacion->end_date }}</td>
                    <td>{{ $asignacion->end_motive }}</td>
                    @endif
                    <td>{{ $asignacion->worksite->name }}</td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    </main>
</body>

</html>
