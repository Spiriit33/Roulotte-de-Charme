@extends('layouts.app')
@section('title')
    Gestion des Sites Touristiques | La Roulotte de Charme
    @stop
@section('breadcrumbs')
    {{\DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs::render('manage_site_touristique')}}
    @stop
@section('left-content')
    @include('inc.admin')
    @stop
@section('right-content')
    <h4 class="mb-4">Gerer les Sites touristisques</h4>
    <p>Ici, vous pouvez gerer les sites touristiques présents sur la page activité.</p>
    <ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
        @php
            $errors = session()->get('errors');
            $active = empty($errors) ? 'active show' : null;
            $active1 = isset($errors) ? 'active show' : null;
        @endphp
        <li class="nav-item">
            <a class="nav-link {{$active}}" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Gestion</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{$active1}}" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Création</a>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        @php
            $errors = session()->get('errors');
            $active = empty($errors) ? 'show active ' : null;
            $active1 = isset($errors) ? 'show active' : null;
        @endphp
        <div class="tab-pane fade {{$active}}" id="home" role="tabpanel" aria-labelledby="home-tab">
            <div class="table-responsive">
                <table class="table table-striped">
                    <tr>
                        <th>Image</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                        @foreach($sites as $site)
                        <tr>
                            <td><img src="/storage/{{$site->hash}}" style="max-width: 175px;"></td>
                            <td>{{$site->description}}</td>
                            <td><a href="{{route('edit_sites',['id'=>$site->id])}}"><i class="fas fa-edit"></i></a> <a href="{{route('delete_sites',['id'=>$site->id])}}"><i class="fas fa-trash"></i> </a> </td>
                        </tr>
                            @endforeach
                </table>
            </div>
        </div>
        <div class="tab-pane fade {{$active1}}" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <form method="post" enctype="multipart/form-data">
                @csrf
            <div class="form-group">
                <label class="col-form-label">Image:</label><br>
                <input type="file" name="image" class="form-control form-control-file col-md-6 @if($active1) @error('image') is-invalid @enderror @endif">
                @if($active1)
                    @error('image')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                @endif
            </div>
            <div class="form-group">
                <label class="col-form-label">Description:</label>
                <input type="text" name="description" class="form-control form-control-sm col-md-6 @if($active1) @error('description') is-invalid @enderror @endif">
                @if($active1)
                    @error('description')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                @endif
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Ajouter</button>
            </div>
            </form>
        </div>
        </div>
    @stop
