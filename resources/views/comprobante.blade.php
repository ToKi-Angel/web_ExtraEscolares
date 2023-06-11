<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Comprobante de ingreso</title>
    <style>
        /* Estilos personalizados para el comprobante */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        table,
        td,
        th {
            border: 1px solid #000000;
            border-collapse: collapse;
            font-family: sans-serif;
        }
        h1 {
            color: #333;
            font-size: 24px;
            margin-bottom: 20px;
        }
        .info {
            margin-bottom: 30px;
        }
        .info span {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <table>
        <tbody>
            <tr>
                <td rowspan="3"
                    style="text-align: left; font-weight: bold; font-size: 12px; width: 120px; height:70px;">1</td>
                <td rowspan="2" style="text-align: left; font-weight: bold; font-size: 12px; width: 430px;">Constancia
                    de cumplimiento de actividad deportiva</td>
                <td style="text-align: left; font-weight: bold; font-size: 12px; width: 165px;">Código:TecNM-VI-PO-003-05
                </td>
            </tr>
            <tr>
                <td style="text-align: left; font-weight: bold; font-size: 12px;">Revisión: 0</td>
            </tr>
            <tr>
                <td style="text-align: left; font-weight: bold; font-size: 12px;">Referencia a la norma ISO 9001:32015
                    8.1</td>
                <td style="text-align: left; font-weight: bold; font-size: 12px;">Página 1 de 1</td>
            </tr>
        </tbody>


    </table>
    <br><br><br><br><br><br>
    <p style="text-align: justify; font-size: 22px;">Resumen de actividades del (la) Alumno(a) {{ $item['nombre'] }}</p>

    <p style="text-align: justify; font-size: 16px;">Nombre: {{ $item['nombre'] }} {{ $item->paterno }}  {{ $item->materno }}</p>
    <p style="text-align: justify; font-size: 16px;">Matricula: {{ $item['id'] }}</p>
    <p style="text-align: justify; font-size: 16px;">Horas deportivas: {{ $item->horaDeportiva }}</p>
    <p style="text-align: justify; font-size: 16px;">Horas cívicas: {{ $item->horaCivica }}</p>
    <p style="text-align: justify; font-size: 16px;">Horas culturales: {{ $item->horaCultural }}</p>

    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <p style="text-align: justify; font-size: 12px;">
        <b>Nota:</b> Este documento no sirve como comprobante o evidencia de ningun crédito.
        <br>
        Su funcion principal es informativa y de control sobre los creditos del alumno.
        <br>
        Atentamente Depto. de Actividades Extraescolares
    </p>


</body>

</html>
