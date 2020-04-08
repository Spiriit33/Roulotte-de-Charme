@extends('layouts.app')
@section('title')
    Administration | La Roulotte De Charme
    @stop
@section('breadcrumbs')
    {{\DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs::render('administration')}}
    @stop
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3>Administration</h3>
                </div>
                <div class="card-body">
                    <form method="post">
                        @csrf
                    <div class="form-group row justify-content-center">
                        <input type="text" class="form-control form-control-sm col-md-8 @error('username') is-invalid @enderror" placeholder="Nom d'utilisateur" name="username">
                        @error('username')
                        <span class="invalid-feedback text-center" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="form-group row justify-content-center">
                        <input type="password" class="form-control form-control-sm col-md-8 @error('password') is-invalid @enderror" placeholder="Mot de passe" name="password">
                        @error('password')
                        <span class="invalid-feedback text-center" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="form-group row justify-content-center">
                        <button type="submit" class="btn btn-primary">Se connecter</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @stop
