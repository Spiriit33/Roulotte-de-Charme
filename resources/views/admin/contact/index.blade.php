@extends('layouts.app')
@section('title')
    Gestion Des Contacts | La Roulotte De Charme
    @stop
@section('breadcrumbs')
    {{\DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs::render('manage_contacts')}}
    @stop
@section('left-content')
    @include('inc.admin')
    @stop
@section('right-content')
    <h4 class="mb-3">Gérer les contacts</h4>
    <p>Ici, vous pouvez voir les différents messages envoyès par les visiteurs.</p>
     <div class="table-responsive">
         <table class="table table-striped">
             <tr>
                 <th>#ID</th>
                 <th>Nom</th>
                 <th>Email</th>
                 <th>Objet</th>
                 <th>Statut</th>
                 <th>Action</th>
             </tr>
                 @foreach($contacts as $contact)
                 <tr>
                     <td>#{{$contact->id}}</td>
                     <td>{{$contact->name}}</td>
                     <td>{{$contact->email}}</td>
                     <td>{{$contact->objet}}</td>
                     <td><button type="submit" class="btn btn-dark btn-sm">{{$contact->status->status}}</button> </td>
                     <td><a href="{{route('show_contacts',['id'=>$contact->id])}}"><i class="fas fa-eye"></i> </a> <a href="{{route('delete_contact',['id'=>$contact->id])}}"> <i class="fas fa-trash"></i> </a> </td>
             </tr>
                 @endforeach
         </table>
     </div>
    @stop
