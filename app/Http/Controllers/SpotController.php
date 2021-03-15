<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Spot;
use App\Http\Requests\SpotFormRequest;
use App\Models\SpotType;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

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

    // Envía todos los spots a la tabla de administración
    public function spots()
    {
        $spots = Spot::all();

        return view('admin.spots.index', compact('spots'));
    }

    public function createSpot(SpotFormRequest $request)
    {

        // Crea un nuevo Spot
        $spot = new Spot();

        // Si la imagen posee metadatos de geolocalización, se recogen y se almacenan
        if (
            isset(exif_read_data($request->file('foto'))['GPSLatitudeRef'])
            && isset(exif_read_data($request->file('foto'))['GPSLongitudeRef'])
            && isset(exif_read_data($request->file('foto'))['GPSLongitude'])
            && isset(exif_read_data($request->file('foto'))['GPSLatitude'])
        ) {
            $request->file('foto')->store('public');

            // Recoge los metadatos de la foto
            $exif = exif_read_data($request->file('foto'));

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

        // Coge el id del usuario que está logeado en la aplicación
        $spot->user_id = auth()->user()->id;

        $spot->spot_type_id = $request->input('spot_type_id');
        $spot->description = $request->input('descripción');

        $spot->save();

        $request->session()->flash('correcto', 'Se ha creado el registro');
        return redirect('/');
    }

    public function showSpot($id)
    {

        $spot = Spot::find($id);

        return view('admin.spots.show', compact('spot'));
    }

    public function getEditSpot($id)
    {
        $spot = Spot::find($id);

        return view('admin.spots.edit', compact('spot'));
    }

    public function updateSpot(Request $request, $id)
    {
        $spot = Spot::find($id);

        if ($request->file('photo') != null) {
            $request->file('photo')->store('public');
            $spot->photo = asset('storage/' . $request->file('photo')->hashName());
        }

        $spot->description = $request->input('description');

        $spot->save();

        return redirect('spots');
    }

    public function deleteSpot($id)
    {
        // Encuentra el spot a eliminar
        $spot = Spot::find($id);

        // Divide la url de la imagen en 3 partes
        $path = explode('storage/', Storage::path($spot->photo));

        // Elimina la imagen
        Storage::delete('public/'. $path[2]);

        // Elimina el registro
        $spot->delete();

        return redirect('spots');
    }
}
