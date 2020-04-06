@extends('layouts.app')
@section('title')
    Gestion des Activités | La Roulotte De Charme
@stop
@section('breadcrumbs')
    {{\DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs::render('manage_activites')}}
    @stop
@section('left-content')
    @include('inc.admin')
    @stop
@section('right-content')
    <h4 class="mb-4">Gerer les activités</h4>
    <ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
        @php
            $errors = session()->get('errors');
            $active = empty($errors) ? 'active ' : null;
            $active1 = isset($errors) ? 'active' : null;
        @endphp
        <li class="nav-item">
            <a class="nav-link {{$active}}" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Gestion</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{$active1}}" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Création</a>
        </li>
    </ul>
    <div class="tab-content mb-3" id="myTabContent">
        @php
            $errors = session()->get('errors');
            $active = empty($errors) ? 'show active ' : null;
            $active1 = isset($errors) ? 'show active' : null;
        @endphp
        <div class="tab-pane fade {{$active}}" id="home" role="tabpanel" aria-labelledby="home-tab">
        <div class="table-responsive-sm">
            <table class="table table-responsive-sm table-striped">
                <tr>
                    <th>ID</th>
                    <th>Titre</th>
                    <th>Action</th>
                </tr>
                @foreach($activites as $activite)
                <tr>
                    <td>#{{$activite->id}}</td>
                    <td>{{$activite->title}}</td>
                    <td><a href="{{route('edit_activite',['id'=>$activite->id])}}"><i class="fas fa-edit"></i></a> <a href=""><i class="fas fa-trash"></i></a></td>
                </tr>
                    @endforeach
            </table>
        </div>
            </div>
        <div class="tab-pane fade {{$active1}}" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <form method="post">
                @csrf
            <div class="form-group">
                <label class="col-form-label">Titre de l'activité <span class="red">*</span> </label>
                <input type="text" class="col-md-6 form-control form-control-sm @if($active1)@error('titre') is-invalid @enderror @endif" name="titre">
                @if($active1)
                @error('titre')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
                    @endif
            </div>
            <div class="form-group">
                <label class="col-form-label">Description<span class="red">*</span> </label>
                <textarea class="col-md-8 form-control form-control-sm @if($active1)@error('description') is-invalid @enderror @endif" rows="6" name="description"></textarea>
                @if($active1)
                    @error('titre')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                @endif
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Créer activité</button>
            </div>
            </form>
        </div>
    </div>
    @stop

