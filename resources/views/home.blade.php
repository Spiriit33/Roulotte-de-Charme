@extends('layouts.app')
@section('title')
    Acceuil | La Roulotte De Charme
    @stop
@section('carousel')

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            @php
                $count = 0;
            $active = $count==0 ? 'active' :  null;
            @endphp
            @foreach($sliders as $slider)
                <li data-target="#carouselExampleIndicators" class="{{$active}}" data-slide-to="{{$count}}"></li>
                @php
                $count++;
                @endphp
                @endforeach
        </ol>
        <div class="carousel-inner" style="max-height: 500px;">
            @php
                $count=0;
            @endphp
            @foreach($sliders as $slider)
                @if($count==0)
                    <div class="carousel-item active">
                        <img class="d-block w-100" style="transform: translateY(-23%)" src="/storage/{{$slider->hash}}" alt="First slide">
                    </div>
                @else
                    <div class="carousel-item">
                        <img class="d-block w-100" style="transform: translateY(-23%)" src="/storage/{{$slider->hash}}" alt="Second slide">

                    </div>
                @endif
                @php
                    $count++;
                @endphp
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <div class="overlay-home" style="background: #003049; padding: 15px;">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
            </div>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <div class="overlay-home" style="background: #003049; padding: 15px;">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
            </div>
        </a>
    </div>
    <div class="overlay" style="height: 100%;
width: 100%; background: #457b9d; padding: 20px; margin-top: 0px;">
        <div class="row mb-0">
            <div class="col-md-9">
                <h5 style="color:white;">{{$configuration->msg_home}}</h5>
            </div>
            <div class="col-md-3 float-right col-sm-5">
                <a href="{{route('tarifs_reservations')}}"><button type="submit" class="btn btn-primary float-right">Réservez vos vacances</button></a>
            </div>
        </div>
    </div>
    @endsection
@section('content')
          <h3 style="color: #003049;" class="mb-3">Vous recherchez une location de vacances, venez partager des moments chaleureux et profiter de la grande tranquillité du coin.</h3>
    <p>Située à Saint-Vivien-de-Blaye, dans la région Aquitaine, la Roulotte de Charme propose un hébergement avec un parking privé gratuit. Les h&ocirctes peuvent savourer un petit-déjeuner continental. Notre Roulotte de charme possède une terrasse et un jardin et n'est située qu'à 30 km de Bordeaux et 35 km de Saint-Emilion. L'aéroport le plus proche, Bordeaux-Merignac, se trouve à 34 km.</p>
@endsection
