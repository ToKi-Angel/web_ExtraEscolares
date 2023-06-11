<?php

namespace App\Http\Controllers;

use App\Models\Ingreso;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;

/*
use Illuminate\Support\Facades\Storage;

class ArchivoController extends Controller
{
    public function mostrarArchivos($matricula)
    {
        $titulo = 'Mostrar archivos';
        $rutaCivicas = 'Alumnos/' . $matricula . '/HorasCivicas/MOOC';
        $rutaDeportivas = 'Alumnos/' . $matricula . '/HorasDeportivas/MOOC';
        $rutaCulturales = 'Alumnos/' . $matricula . '/HorasCulturales/MOOC';

        $archivosCivicas = Storage::files($rutaCivicas);
        $archivosDeportivas = Storage::files($rutaDeportivas);
        $archivosCulturales = Storage::files($rutaCulturales);

        return view('crud/archivos', compact('titulo'))->with([
            'archivosCivicas' => $archivosCivicas,
            'archivosDeportivas' => $archivosDeportivas,
            'archivosCulturales' => $archivosCulturales,
        ]);
    }
}*/




class ArchivoController extends Controller
{
    public function eliminarArchivo(Request $request)
    {
        $rutaArchivo = $request->input('ruta');

        if (File::exists($rutaArchivo)) {
            File::delete($rutaArchivo);
            return Response::json(['message' => 'Archivo eliminado correctamente']);
        } else {
            return Response::json(['message' => 'El archivo no existe'], 404);
        }
    }
    public function mostrarArchivos($matricula)
    {
        $titulo = 'Mostrar archivos';
        $rutaCivicasMOOC = 'Alumnos/' . $matricula . '/HorasCivicas/MOOC';
        $rutaCivicasEvidencias = 'Alumnos/' . $matricula . '/HorasCivicas/Evidencias';
        $rutaDeportivasMOOC = 'Alumnos/' . $matricula . '/HorasDeportivas/MOOC';
        $rutaDeportivasEvidencias = 'Alumnos/' . $matricula . '/HorasDeportivas/Evidencias';
        $rutaCulturalesMOOC = 'Alumnos/' . $matricula . '/HorasCulturales/MOOC';
        $rutaCulturalesEvidencias = 'Alumnos/' . $matricula . '/HorasCulturales/Evidencias';

        $archivoMoocCivico = $rutaCivicasMOOC . '/mooc.pdf';
        $archivoEvidenciasCivicas = $rutaCivicasEvidencias . '/evidencias.pdf';
        $archivoMoocDeportivas = $rutaDeportivasMOOC . '/mooc.pdf';
        $archivoEvidenciasDeportivas = $rutaDeportivasEvidencias . '/evidencias.pdf';
        $archivoMoocCulturales = $rutaCulturalesMOOC . '/mooc.pdf';
        $archivoEvidenciasCulturales = $rutaCulturalesEvidencias . '/evidencias.pdf';

        $existeMoocCivico = file_exists(public_path($archivoMoocCivico));
        $existeEvidenciasCivicas = file_exists(public_path($archivoEvidenciasCivicas));
        $existeMoocDeportivas = file_exists(public_path($archivoMoocDeportivas));
        $existeEvidenciasDeportivas = file_exists(public_path($archivoEvidenciasDeportivas));
        $existeMoocCulturales = file_exists(public_path($archivoMoocCulturales));
        $existeEvidenciasCulturales = file_exists(public_path($archivoEvidenciasCulturales));

        return view(
            'crud.archivos',
            compact(
                'titulo',
                'archivoMoocCivico',
                'archivoEvidenciasCivicas',
                'archivoMoocDeportivas',
                'archivoEvidenciasDeportivas',
                'archivoMoocCulturales',
                'archivoEvidenciasCulturales',
                'existeMoocCivico',
                'existeEvidenciasCivicas',
                'existeMoocDeportivas',
                'existeEvidenciasDeportivas',
                'existeMoocCulturales',
                'existeEvidenciasCulturales',
                'matricula',
                'rutaCivicasMOOC',
                'rutaCivicasEvidencias',
                'rutaDeportivasMOOC',
                'rutaDeportivasEvidencias',
                'rutaCulturalesMOOC',
                'rutaCulturalesEvidencias'
            )
        );
    }

    public function generarComprobante($id, Dompdf $pdf)
    {
        $item = Ingreso::find($id); // Reemplaza 'Ingreso' con el nombre de tu modelo

        // Personaliza las opciones de configuración
        $options = new Options();
        $options->set('isRemoteEnabled', true); // Habilitar la carga de recursos remotos
        $options->set('isHtml5ParserEnabled', true); // Habilitar el análisis HTML5
        $options->set('defaultFont', 'Arial'); // Establecer la fuente predeterminada

        // Aplica las opciones de configuración al objeto Dompdf
        $pdf->setOptions($options);

        // Carga la vista comprobante.blade.php con los datos necesarios
        $pdf->loadHtml(View::make('comprobante', ['item' => $item])->render());

        // Renderiza el PDF
        $pdf->render();

        // Genera el PDF y lo descarga en el navegador
        return $pdf->stream('comprobante.pdf');
    }

    public function formularioEvento($id)
    {
        $titulo = 'Evento';
        $alumno = Ingreso::find($id);
        return view('formulario-evento', compact('alumno', 'titulo'));
    }

    public function generarPdfEvento(Request $request, Dompdf $pdf)
    {
        // Obtener los datos del formulario
        $alumnoId = $request->input('alumno_id');
        $evento = $request->input('evento');
        $horas = $request->input('horas');
        $tipoCredito = $request->input('tipo_credito');

        // Actualizar los datos en la tabla "Ingreso"
        $ingreso = Ingreso::find($alumnoId);
        $nombreAlumno = $ingreso->nombre . ' ' . $ingreso->paterno . ' ' . $ingreso->materno;
        $fechaActual = now()->format('Y-m-d');
        $carrera = $ingreso->tipo;

        if ($tipoCredito === 'Cívico') {
            $ingreso->horaCivica += $horas;
        } elseif ($tipoCredito === 'Deportivo') {
            $ingreso->horaDeportiva += $horas;
        } elseif ($tipoCredito === 'Cultural') {
            $ingreso->horaCultural += $horas;
        }

        $ingreso->save();

        // Generar el PDF con los datos del alumno y del formulario

        // Personalizar las opciones de configuración
        $options = new Options();
        $options->set('isRemoteEnabled', true); // Habilitar la carga de recursos remotos
        $options->set('isHtml5ParserEnabled', true); // Habilitar el análisis HTML5

        // Aplicar las opciones de configuración al objeto Dompdf
        $pdf->setOptions($options);

        // Cargar la vista comprobante-evento.blade.php con los datos necesarios
        $pdf->loadHtml(View::make('comprobante-evento', ['alumnoId' => $alumnoId, 'evento' => $evento, 'horas' => $horas, 'tipoCredito' => $tipoCredito, 'nombre' => $nombreAlumno, 'fecha' => $fechaActual, 'carrera' => $carrera])->render());

        $pdf->render();
        //return view('comprobante-evento', ['alumnoId' => $alumnoId, 'evento' => $evento, 'horas' => $horas, 'tipoCredito' => $tipoCredito]);

        // Generar el PDF
        $pdf->stream('comprobante.pdf');

        // Redirigir al usuario a la vista index.blade.php con un mensaje flash
        return redirect('/');


    }

    public function PdfConstanciaDeportiva($id, Dompdf $pdf)
    {
        // Obtener los datos del alumno desde la base de datos
        $alumno = Ingreso::find($id);

        // Verificar si se encontró el alumno
        if (!$alumno) {
            // Redirigir o mostrar un mensaje de error según corresponda
        }

        // Verificar si cumple con los requisitos para la constancia deportiva (horaDeportiva >= 20)

            // Generar el PDF con los datos del alumno y la constancia deportiva

            // Personalizar las opciones de configuración
            $options = new Options();
            $options->set('isRemoteEnabled', true); // Habilitar la carga de recursos remotos
            $options->set('isHtml5ParserEnabled', true); // Habilitar el análisis HTML5

            // Aplicar las opciones de configuración al objeto Dompdf
            $pdf->setOptions($options);

            // Cargar la vista constancia-deportiva.blade.php con los datos necesarios
            $pdf->loadHtml(View::make('constancia-deportiva', ['alumno' => $alumno])->render());

            $pdf->render();

            // Generar el PDF y descargarlo en el navegador
            return $pdf->stream('constancia-deportiva.pdf');

    }

    public function PdfConstanciaCultural($id, Dompdf $pdf)
    {
        $alumno = Ingreso::find($id);

        // Verificar si se encontró el alumno
        if (!$alumno) {
            // Redirigir o mostrar un mensaje de error según corresponda
        }

        // Verificar si cumple con los requisitos para la constancia deportiva (horaDeportiva >= 20)

            // Generar el PDF con los datos del alumno y la constancia cultural

            // Personalizar las opciones de configuración
            $options = new Options();
            $options->set('isRemoteEnabled', true); // Habilitar la carga de recursos remotos
            $options->set('isHtml5ParserEnabled', true); // Habilitar el análisis HTML5
            $options->set('defaultFont', 'Arial'); // Establecer la fuente predeterminada

            // Aplicar las opciones de configuración al objeto Dompdf
            $pdf->setOptions($options);

            // Cargar la vista constancia-cultural.blade.php con los datos necesarios
            $pdf->loadHtml(View::make('constancia-cultural', ['alumno' => $alumno])->render());

            // Renderizar el PDF
            $pdf->render();

            // Generar el PDF y descargarlo en el navegador
            return $pdf->stream('constancia-cultural.pdf');




    }

    public function PdfConstanciaCivica($id, Dompdf $pdf)
    {
        $alumno = Ingreso::find($id);

        // Verificar si se encontró el alumno
        if (!$alumno) {
            // Redirigir o mostrar un mensaje de error según corresponda
        }

        // Verificar si cumple con los requisitos para la constancia deportiva (horaDeportiva >= 20)

            // Generar el PDF con los datos del alumno y la constancia deportiva
            // Personalizar las opciones de configuración
            $options = new Options();
            $options->set('isRemoteEnabled', true); // Habilitar la carga de recursos remotos
            $options->set('isHtml5ParserEnabled', true); // Habilitar el análisis HTML5
            $options->set('defaultFont', 'Arial'); // Establecer la fuente predeterminada

            // Aplicar las opciones de configuración al objeto Dompdf
            $pdf->setOptions($options);

            // Cargar la vista constancia-civica.blade.php con los datos necesarios
            $pdf->loadHtml(View::make('constancia-civica', ['alumno' => $alumno])->render());

            // Renderizar el PDF
            $pdf->render();

            // Generar el PDF y descargarlo en el navegador
            return $pdf->stream('constancia-civica.pdf');


    }


}


//    dd($item->toArray());
