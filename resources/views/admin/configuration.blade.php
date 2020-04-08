@extends('layouts.app')
@section('title')
    Configuration | La Roulotte De Charme
@stop
@section('breadcrumbs')
    {{\DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs::render('administration')}}
    @stop
@section('left-content')
    @include('inc.admin')
    @stop
@section('right-content')
    <script>
        $(document).ready(function() {
            $('#changePassword').click(function () {
                $('#calendarForm').modal('show');
            });
        });
    </script>
    <h4 class="mb-3">Configuration</h4>
    <button type="submit" class="btn btn-sm btn-primary mb-3" id="changePassword">Changer le mot de passe</button>
        <div id="calendarForm" class="modal fade" aria-hidden="true">
            <form method="post" name="">
                @csrf
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 id="modalTitle" class="modal-title">Changer le mot de passe administrateur</h5>
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span> <span class="sr-only">close</span></button>

                        </div>
                        <div id="modalBody" class="modal-body">
                            <div class="form-group">
                            <label class="col-form-label">Mot de passe actuelle</label>
                            <input type="text" class="form-control form-control-sm @error('password') is-invalid @enderror" name="password" required>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                            <label class="col-form-label">Nouveau mot de passe</label>
                            <input type="text" class="form-control form-control-sm @error('new_password') is-invalid @enderror" name="new_password" id="new_password" required>
                                @error('new_password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <label class="col-form-label">Confirmer</label>
                            <input type="text" class="form-control form-control-sm @error('new_password') is-invalid @enderror" name="new_password_confirmation" required>
                            @error('new_password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" name="Change" value="change">Changer</button>
                            <button type="button"  class="btn btn-default" data-dismiss="modal">Fermer</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    @include('inc.flash-message')
    <form method="post" enctype="multipart/form-data">
        @csrf
        @if(isset($configuration))
            <div class="form-group">
                <label class="col-form-label">Titre du site</label>
                <input type="text" class="col-md-6 form-control form-control-sm" name="titre" value="{{$configuration->title}}">
            </div>
            <div class="form-group">
                <label class="col-form-label">Email </label>
                <input type="email" class="col-md-6 form-control form-control-sm" name="email" value="{{$configuration->email}}">
            </div>
            <div class="form-group">
                <label class="col-form-label">Telephone</label>
                <input type="text" class="col-md-6 form-control form-control-sm" name="telephone" value="{{$configuration->telephone}}">
            </div>
            <div class="form-group">
                <label class="col-form-label">Logo du site</label>
                <input type="file" class="col pl-0" name="logo">
                <div class="img-thumbnail mt-3" style="max-width: 100px;">
                    <img src="/storage/{{$configuration->logo}}" class="w-100">
                </div>
            </div>
            <div class="form-group">
                <label class="col-form-label">Message d'acceuil</label>
                <textarea class="col-md-8 form-control form-control-sm" name="message_acceuil" rows="6">{{$configuration->msg_home}}</textarea>
            </div>
            <div class="form-group">
                <label class="col-form-label">Images slider</label>
                <input type="file" class="col pl-0 mb-3"  name="images[]" multiple>
                <div class="row ml-0 mr-0">
                    @foreach($images  as $image)
                        <div class="col-md-2 col-sm-4 col-s">
                            <div class="img-thumbnail w-100">
                                <img src="/storage/{{$image->hash}}" class="w-100">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary"  name="save" value="">Enregistrer</button>
            </div>
    </form>
    @else
        <div class="form-group">
            <label class="col-form-label">Titre du site</label>
            <input type="text" class="col-md-6 form-control form-control-sm" name="titre" value="">
        </div>
        <div class="form-group">
            <label class="col-form-label">Email </label>
            <input type="email" class="col-md-6 form-control form-control-sm" name="email" value="">
        </div>
        <div class="form-group">
            <label class="col-form-label">Telephone</label>
            <input type="text" class="col-md-6 form-control form-control-sm" name="telephone" value="">
        </div>
        <div class="form-group">
            <label class="col-form-label">Logo du site</label>
            <input type="file" class="col pl-0" name="logo">
            <div class="img-thumbnail mt-3" style="max-width: 100px;">
            </div>
        </div>
        <div class="form-group">
            <label class="col-form-label">Message d'acceuil</label>
            <textarea class="col-md-8 form-control form-control-sm" name="message_acceuil" rows="6"></textarea>
        </div>
        <div class="form-group">
            <label class="col-form-label">Images slider</label>
            <input type="file" class="col pl-0"  name="images[]" multiple>
        </div>
        <div class="form-row mr-0 ml-0 mb-0">
            <div class="form-group mb-2">
                <div class="form-check-inline">
                    <input type="checkbox" class="form-check-input" name="afficher_actu">
                    <label class="col-form-label form-check-label">Afficher les actualités en page d'acceil</label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary" name="save">Enregistrer</button>
        </div>
        </form>
    @endif
    @if(\Illuminate\Support\Facades\Session::has('errors'))
        <script>
            $(document).ready(function () {
                $('#calendarForm').modal('show');
            })
        </script>
    @endif
    @stop
