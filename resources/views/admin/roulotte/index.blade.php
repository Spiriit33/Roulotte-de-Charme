@extends('layouts.app')
@section('title')
    La Roulotte de Charme | Gestion De La Roulotte
@stop
@section('breadcrumbs')
    {{\DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs::render('manage_roulotte')}}
    @stop
@section('left-content')
    @include('inc.admin')
    @stop
@section('right-content')
    <h4 class="mb-4">Gerer la roulotte</h4>
    <p>Ici, vous pouvez gérer les images de la roulotte présents sur la page roulotte.</p>
    <ul class="nav nav-tabs" id="myTab" role="tablist">
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
    <div class="tab-content" id="myTabContent">
     @php
     $errors = session()->get('errors');
     $active = empty($errors) ? 'active show' : null;
     $active1 = isset($errors) ? 'active show' : null;
     @endphp
    <div class="tab-pane fade {{$active}}" id="home" role="tabpanel" aria-labelledby="home-tab">
        <div class="table-responsive">
            <table class="table table-striped">
                <tr>
                    <th>Image</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
                @foreach($images as $site)
                    <tr>
                        <td><img src="/storage/{{$site->hash}}" style="max-width: 175px;"></td>
                        <td>{{$site->description}}</td>
                        <td><a href="{{route('edit_roulotte',['id'=>$site->id])}}"><i class="fas fa-edit"></i></a> <a href="{{route('delete_roulotte',['id'=>$site->id])}}"><i class="fas fa-trash"></i> </a> </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
        <div class="tab-pane fade {{$active1}}" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <form method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="col-form-label">Image <span class="red">*</span> </label><br>
                    <input type="file" name="image" class="form-control-file form-control col-md-6 @if($active1) @error('image') is-invalid @enderror @endif">
                    @if($active1)
                        @error('image')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    @endif
                </div>
                <div class="form-group">
                    <label class="col-form-label">Description</label>
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
