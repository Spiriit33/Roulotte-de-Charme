@extends('layouts.app')
@section('title')
    La Roulotte de Charme | Administration
    @stop
@section('breadcrumbs')
    {{\DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs::render('administration')}}
    @stop
@section('left-content')
    @include('inc.admin')
    @stop
@section('right-content')
    <h4 class="mb-4">Admin Panel</h4>
    <div class="row ml-0 mr-0">
        <div class="col-md-6 pl-0">
            <div class="stats w-100" style="height: 150px; background-color: orangered;">
                    <div class="text" style="position: absolute; top: 15px; left: 5px;">
                        <span style="font-size: 20px; font-weight: bold; color: white;"><i class="fas fa-chart-bar" style="color: white;margin-right: 6px;
"></i>Reservations :</span>
                    </div>
                    <div style="position: absolute; bottom: 20px; right: 25px;">
                        <span style="font-size: 20px; font-weight: bold; color: white;">{{$bookings}}</span>
                    </div>
                    </div>
            </div>
        <div class="col-md-6 pl-0">
            <div class="stats w-100" style="height: 150px; background-color: #009fff;">
                <div class="text" style="position: absolute; top: 15px; left: 5px;">
                        <span style="font-size: 20px; font-weight: bold; color: white;"><i class="fas fa-chart-bar" style="color: white;margin-right: 6px;
"></i>Activités :</span>
                </div>
                <div style="position: absolute; bottom: 20px; right: 25px;">
                    <span style="font-size: 20px; font-weight: bold; color: white;">{{$activities}}</span>
                </div>
            </div>
        </div>
        <div class="col-md-6 pl-0">
            <div class="stats w-100" style="height: 150px; background-color: #01c86b;">
                <div class="text" style="position: absolute; top: 15px; left: 5px;">
                        <span style="font-size: 20px; font-weight: bold; color: white;"><i class="fas fa-chart-bar" style="color: white;margin-right: 6px;
"></i>Sites touristiques :</span>
                </div>
                <div style="position: absolute; bottom: 20px; right: 25px;">
                    <span style="font-size: 20px; font-weight: bold; color: white;">{{$sites}}</span>
                </div>
            </div>
        </div>
        <div class="col-md-6 pl-0">
            <div class="stats w-100" style="height: 150px; background-color: #af00ff;">
                <div class="text" style="position: absolute; top: 15px; left: 5px;">
                        <span style="font-size: 20px; font-weight: bold; color: white;"><i class="fas fa-chart-bar" style="color: white;margin-right: 6px;
"></i>Contact :</span>
                </div>
                <div style="position: absolute; bottom: 20px; right: 25px;">
                    <span style="font-size: 20px; font-weight: bold; color: white;">{{$bookings}}</span>
                </div>
            </div>
        </div>
    </div>
    @stop
