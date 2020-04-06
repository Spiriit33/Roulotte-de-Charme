@extends('layouts.app')
@section('breadcrumbs')
    {{\DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs::render('update_activites')}}
    @stop
@section('left-content')
    @include('inc.admin')
    @stop
@section('right-content')
    <h5 class="mb-2">Modifier activité</h5>
    <form method="post">
        @include('inc.flash-message')
        @csrf
    <div class="form-group">
        <label class="col-form-label">Titre <span class="red">*</span> </label>
        <input type="text" class="form-control form-control-sm col-md-6" name="titre" value="{{$activite->title}}">
    </div>
    <div class="form-group">
        <label class="col-form-label">Description<span class="red">*</span> </label>
       <textarea class="col-md-8 form-control form-control-sm" name="description" rows="6">{{$activite->description}}</textarea>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </div>
    </form>
    @stop
