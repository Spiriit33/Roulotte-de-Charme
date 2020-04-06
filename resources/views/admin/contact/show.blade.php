@extends('layouts.app')
@section('breadcrumbs')
    @foreach($contacts as $contact)
    @endforeach
    {{\DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs::render('show_contacts',$contact)}}
    @stop
@section('left-content')
    @include('inc.admin')
    @stop
@section('right-content')
    <h5 class="mb-3">Conversation : {{$contact->objet}}</h5>
    @include('inc.errors')
    @foreach($contacts as $contact)
    <div class="col pl-0 mb-2" style="background:
#fff;
border: 1px solid
lightgray;
min-height: 100px;">
        <div class="texte" style="margin:10px;">
            @php
            $name=$contact->username == null ? $contact->name : $contact->username;
            $date=date('d/m/y',strtotime($contact->created_at));
            $hour=date('h:i:s',strtotime($contact->created_at));
            @endphp
            <h6>Ecrit par {{$name}} le {{$date}} à {{$hour}}</h6>
            <p>{{$contact->message}}</p>
        </div>
    </div>
    @endforeach
    <div class="col pl-0 " style="">
        <form method="post">
            @csrf
        <div class="form-group">
            <label class="col-form-label">Répondre</label>
            <textarea class="form-control form-control-sm" name="message" rows="6"></textarea>
        </div>
        <div class="form-group row justify-content-center">
            <button type="submit" class="btn btn-sm btn-primary" name="">Envoyer par mail</button>
        </div>
        </form>
    </div>
    @stop
