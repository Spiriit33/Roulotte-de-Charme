@extends('layouts.app')
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
                        <input type="text" class="form-control form-control-sm col-md-8" placeholder="Nom d'utilisateur" name="username">
                    </div>
                    <div class="form-group row justify-content-center">
                        <input type="password" class="form-control form-control-sm col-md-8" placeholder="Mot de passe" name="password">
                    </div>
                    <div class="form-group row justify-content-center">
                        <button type="submit" class="btn btn-sm btn-primary">Se connecter</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @stop
