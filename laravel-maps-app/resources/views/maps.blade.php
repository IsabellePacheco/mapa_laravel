@extends('layouts.app')

@section('title', 'Pesquisar Endereço no Maps')

@section('content')
<div class="container mt-4">
    <h1>Pesquisar Endereço no Google Maps</h1>

    <div class="mb-3">
        <input type="text" id="endereco" class="form-control" placeholder="Digite um endereço">
    </div>
    <button class="btn btn-primary" onclick="pesquisarEndereco()">Pesquisar</button>

    <div id="map" style="width: 100%; height: 500px; margin-top: 20px;"></div>
</div>

<script src="https://maps.googleapis.com/maps/api/js?key=SEU_API_KEY&callback=initMap" async defer></script>
<script>
    let map;
    let geocoder;

    function initMap() {
        geocoder = new google.maps.Geocoder();
        map = new google.maps.Map(document.getElementById("map"), {
            center: { lat: -15.7942, lng: -47.8822 }, // Brasília como centro inicial
            zoom: 5,
        });
    }

    function pesquisarEndereco() {
        const endereco = document.getElementById("endereco").value;
        geocoder.geocode({ 'address': endereco }, function(results, status) {
            if (status === 'OK') {
                map.setCenter(results[0].geometry.location);
                map.setZoom(15);
                new google.maps.Marker({
                    map: map,
                    position: results[0].geometry.location
                });
            } else {
                alert('Endereço não encontrado: ' + status);
            }
        });
    }
</script>
@endsection
