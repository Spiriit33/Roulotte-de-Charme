@extends('layouts.app')
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

            </div>
        </div>
        <div class="col-md-6 pl-0">
            <div class="stats w-100" style="height: 150px; background-color: orangered;">

            </div>
        </div>
    </div>
    @stop
