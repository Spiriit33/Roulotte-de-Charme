@extends('layouts.app')
@section('breadcrumbs')
    {{\DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs::render('show_bookings',$reservation)}}
    @stop
@section('left-content')
    @include('inc.admin')
    @stop
@section('right-content')
    <h5>Reservation numèro #{{$reservation->id}}</h5>
    <div class="form-group">
        <label class="col-form-label">Date de début</label>
        <input type="date" class="form-control form-control-sm col-md-6" value="{{$reservation->date_debut}}" readonly>
    </div>
    <div class="form-group">
        <label class="col-form-label">Date de fin</label>
        <input type="date" class="form-control form-control-sm col-md-6" value="{{$reservation->date_fin}}" readonly>
    </div>
    @php
        $nom = $reservation->nom==null ? '/' : $reservation->nom;
        $email = $reservation->email==null ? '/' : $reservation->email;
        $commentaire = $reservation->commentaire ==null ? '/' : $reservation->commentaire;
    @endphp
    <div class="form-group">
        <label class="col-form-label">Nom</label>
        <input type="text" class="form-control form-control-sm col-md-6" value="{{$nom}}" readonly>
    </div>
    <div class="form-group">
        <label class="col-form-label">Email</label>
        <input type="text" class="form-control form-control-sm col-md-6" value="{{$email}}" readonly>
    </div>
    <div class="form-group">
        <label class="col-form-label col-form-label-sm">Commentaire</label>
        <textarea class="col-md-8 form-control form-control-sm" rows="7">{{$commentaire}}</textarea>
    </div>
    <a href="{{route('delete_reservation',['id'=>$reservation->id])}}"><button type="submit" class="btn btn-sm btn-primary">Supprimer reservation</button></a>
    @stop
