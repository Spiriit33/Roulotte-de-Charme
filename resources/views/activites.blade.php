@extends('layouts.app')
@section('title')
    Activités | La Roulotte De Charme
    @stop
@section('breadcrumbs')
    {{\DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs::render('activités')}}
    @stop
@section('content')
    <div class="row justify-content-center mt-3 ml-0 mr-0">
        <div class="col-md-8">
            <h4 class="text-center mb-3">Les Activités</h4>
            <p>Différentes activités sont proposées pour agrémenter votre séjour.</p>
            @foreach($activites as $activite)
                <li><h5>{{$activite->title}}</h5></li>
                <p>{!! $activite->description !!}</p>
            @endforeach
            <h4 class="text-center mb-3">Sites Touristiques</h4>
            <div id="carouselExampleControls" class="carousel slide mb-4" data-ride="carousel">
                <ol class="carousel-indicators">
                    @php
                        $count = 0;
                        $active = $count==0 ? 'active' :  null;
                    @endphp
                </ol>
                @php
                    $count = 0;
                @endphp
                @foreach($sliders as $slider)
                    @if($count==0)
                        <div class="carousel-inner" style="max-height: 350px;">
                            <div class="carousel-item active">
                                <a href="/storage/{{$slider->hash}}"><img class="d-block w-100 " src="/storage/{{$slider->hash}}"
                                                                          alt="First slide" style="transform: translateY(-20%);"></a>
                                @if($slider->description)
                                    <div class="wrap-text" style="width: 100%;
position: absolute;
display: block;
bottom: 20%;
background:
rgba(69,123,157,0.8);">
                                        <p class="text-center" style="color:white;">{{$slider->description}}</p>
                                    </div>
                                @endif
                            </div>

                            @else
                                <div class="carousel-item">
                                    <a href="/storage/{{$slider->hash}}"><img class="d-block w-100 " src="/storage/{{$slider->hash}}"
                                                                              alt="First slide" style="transform: translateY(-20%);"></a>
                                    @if($slider->description)
                                    <div class="wrap-text" style="width: 100%;
position: absolute;
display: block;
bottom: 20%;
background:
rgba(69,123,157,0.8);">
                                        <p class="text-center" style="color:white;">{{$slider->description}}</p>
                                    </div>
                                    @endif
                                    @endif
                            @php
                                $count++;
                            @endphp
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
            </div>
        </div>
    </div>
        @stop
