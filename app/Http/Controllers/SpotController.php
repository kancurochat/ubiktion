<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Spot;
use App\Http\Requests\SpotFormRequest;
use App\Models\SpotType;
use Intervention\Image\Facades\Image;

class SpotController extends Controller
{

    // Convierte coordenadas en formato grados, minutos, segundos
    // a formato decimal
    static function gps($coordinate, $hemisphere)
    {
        // Si la coordenada es una cadena, aplica un trim y separa los valores
        // a partir de cada coma
        if (is_string($coordinate)) {
            $coordinate = array_map("trim", explode(",", $coordinate));
        }
        // Recorre el array de coordenadas
        for ($i = 0; $i < 3; $i++) {
            // Coge una parte del array y la separa a partir de la barra
            $part = explode('/', $coordinate[$i]);

            if (count($part) == 1) {
                // Si el array de la parte posee un solo elemento
                // le pasa su valor a la parte del array de coordenadas en cuestión
                $coordinate[$i] = $part[0];
            } else if (count($part) == 2) {
                // Si el array posee dos elementos,
                // los convierte a decimales y divide 
                // el primer elemento entre el segundo
                $coordinate[$i] = floatval($part[0]) / floatval($part[1]);
            } else {
                // Si no tiene ninguna parte, 
                // la parte de la coordenada vale 0
                $coordinate[$i] = 0;
            }
        }
        // Crea 3 variables a la vez, una almacenará los grados,
        // otra los minutos, y la última los segundos,
        // los cuales conformarán una una variable $coordinate,
        // que las almacenará en un array
        list($degrees, $minutes, $seconds) = $coordinate;

        // Calculamos el signo de cada componente de la coordenada
        // haciendo que, si se trata del hemisferio Oeste o Sur, 
        // será negativo, en caso contrario, será positivo
        $sign = ($hemisphere == 'W' || $hemisphere == 'S') ? -1 : 1;

        // Generamos las coordenadas en formato decimal
        $coordinate = $sign * ($degrees + $minutes / 60 + $seconds / 3600);

        // Devolvemos las coordenadas
        return $coordinate;
    }

    // Se manda el formulario de los puntos
    public function getView()
    {
        // Almaceno los tipos de puntos 
        // en una variable
        $types = SpotType::all();

        // Llamo a la vista pasándole la variable de los tipos
        return view('add', compact('types'));
    }

    public function createSpot(SpotFormRequest $request)
    {

        // Crea un nuevo Spot
        $spot = new Spot();

        // Si la imagen posee metadatos de geolocalización, se recogen y se almacenan
        if (Image::make($request->file('foto'))->exif('GPSVersion') != null) {
            $request->file('foto')->store('public');

            // Recoge los metadatos de la foto
            $exif = Image::make($request->file('foto'))->exif();

            // Almacena los datos de latitud y longitud
            $spot->latitude = SpotController::gps($exif["GPSLatitude"], $exif['GPSLatitudeRef']);
            $spot->longitude = SpotController::gps($exif["GPSLongitude"], $exif['GPSLongitudeRef']);
        } else {
            // Si no, se manda un flash con el mensaje de error
            // y se redirecciona al formulario
            $request->session()->flash('error', 'Sube una imagen con datos de geolocalización');
            return redirect('add');
        }

        $spot->photo = asset('storage/' . $request->file('foto')->hashName());

        $spot->description = $request->input('descripción');

        $spot->save();

        $request->session()->flash('correcto', 'Se ha creado el registro');
        return redirect('/');
    }
}
