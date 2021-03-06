@extends('layouts.master')



@section('content')
@if(Session::has('correcto'))
<div class="bg-green-100 border border-green-400 text-green-700 px-6 py-4 rounded relative mb-4">
    <span class="inline-block align-middle mr-8">
        <strong class="font-bold">{{ Session::get('correcto') }}</strong>
    </span>
    <button
        class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-4 mr-6 outline-none focus:outline-none"
        onclick="closeAlert(event)">
        <span>×</span>
    </button>
</div>
<script>
    function closeAlert(event){
      let element = event.target;
      while(element.nodeName !== "BUTTON"){
        element = element.parentNode;
      }
      element.parentNode.parentNode.removeChild(element.parentNode);
    }
</script>
@endif

<div id="mapid" class="mx-10"></div>
<script>
    var map = L.map('mapid').setView([28.4965, -13.8622], 13);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {

        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>'  

    }).addTo(map);

    // Ajax para mostrar spots en el mapa
    $.ajax ( {

        dataType: "json",

        url: "api/spots",

        success: function(result){

            console.log(result);

            result.spots.forEach(function(spot){

                let spotType;
                
                if(spot.spot_type_id == 1) {
                    spotType = ' Punto Accesible';
                } else {
                    spotType = 'Punto No Accesible';
                };

                let card = '<div class="max-w-xs overflow-hidden rounded-lg shadow-lg">' +
                                '<img class="object-cover w-full h-48" src="' + spot.photo + '"/>' +
                                '<div class="px-6 py-4">' +
                                    '<h4 class="mb-3 text-xl font-semibold tracking-tight text-gray-800">' + spotType + '</h4>' +
                                    '<p class="leading-normal text-gray-700">' + spot.description + '</p>' +
                                '</div>' +
                            '</div>';

                L.marker([spot.latitude, spot.longitude], {title: spot.id}).addTo(map).bindPopup(
                    card
                    );

            });
        }

    }); 
</script>
@endsection