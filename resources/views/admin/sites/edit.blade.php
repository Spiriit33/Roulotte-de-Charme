@extends('layouts.app')
@section('breadcrumbs')
    {{\DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs::render('update_sites_touristiques')}}
    @stop
@section('left-content')
    @include('inc.admin')
    @stop
@section('right-content')
    <h5 class="mb-3">Modification</h5>
    @include('inc.errors')
    <form method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label class="col-form-label">Image:</label><br>
            <input type="file" name="image">
            <div class="img-thumbnail mt-2" style="max-width: 160px;">
                <img src="/storage/{{$site->hash}}" class="w-100">
            </div>
        </div>
        <div class="form-group">
            <label class="col-form-label">Description:</label>
            <input type="text" name="description" class="form-control form-control-sm col-md-6" value="{{$site->description}}">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Modifier</button>
        </div>
    </form>
    @stop
