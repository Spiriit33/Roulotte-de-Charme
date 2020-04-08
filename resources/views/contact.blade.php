@extends('layouts.app')
@section('title')
    Contact | La Roulotte De Charme
    @stop
@section('breadcrumbs')
    {{ Breadcrumbs::render('contact') }}
    @stop
@section('content')
    <div class="row justify-content-center mt-3">
        <div class="col-md-8">
            <h5 class="text-center">Nous contacter!</h5>
            <p class="text-center">Laissez-nous un message avec ce formulaire et nous ne manquerons pas de revenir vers vous avec toutes les informations relatives à votre demande.</p>
            @include('inc.flash-message')
            <form method="post">
                @csrf
            <div class="form-group">
                <label class="col-form-label">Votre nom <span class="red">*</span> </label>
                <input type="text" name="nom" class="form-control form-control-sm @error('nom') is-invalid @enderror" required>
                @error('nom')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label class="col-form-label">Votre email <span class="red">*</span> </label>
                <input type="email" class="form-control form-control-sm @error('email') is-invalid @enderror" name="email" required>
                @error('email')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label class="col-form-label">Objet du message <span class="red">*</span> </label>
                <input type="text" class="form-control form-control-sm @error('objet') is-invalid @enderror" name="objet" required>
                @error('objet')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label class="col-form-label">Votre message <span class="red">*</span> </label>
                <textarea class="form-control form-control-sm @error('message') is-invalid @enderror" rows="8" name="message" required></textarea>
                @error('message')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
                @php
                @endphp
                <div class="form-group col-md-6 col-sm-6">
                    {!! NoCaptcha::renderJs() !!}
                {!! NoCaptcha::display() !!}
                @if ($errors->has('g-recaptcha-response'))
                    <span class="help-block">
        <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
    </span>
                @endif
                </div>
            <div class="form-group row justify-content-center">
                <button type="submit" class="btn btn-primary">Envoyer</button>
            </div>
            </form>
        </div>
    </div>
    @stop
