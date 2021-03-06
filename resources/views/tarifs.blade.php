
@extends('layouts.app')
@section('title')
    Tarifs & Reservations | La Roulotte De Charme
    @stop
@section('breadcrumbs')
    {{\DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs::render('tarifs-reservations')}}
    @stop
@section('content')
    <html>
    <head>
        <script src="/js/locales-all.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment-with-locales.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.1/fullcalendar.min.js"></script>
        <script>

            $(document).ready(function() {

                $('#calendar').fullCalendar({
                    locale : 'fr',
                    allDay : false,
                    nextDayThreshold:'00:00',
                    displayEventTime : false,
                    title : 'Indisponible',
                    header:{
                        left:'prev,next',
                        center:'title',
                        right : '',
                    },
                    events: '/reservations',
                    selectable:true,
                    selectHelper:true,
                    height : 500,
                    dateFormat: 'dd/mm/yy',
                    onSelect:function(date){
                        $('#date_fin').val(date);
                    },
                    eventRender: function(event, element) {
                        element.find('.fc-title').css({'color:' : 'white'});
                    }

                });
            });


        </script>
    </head>




    </html>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
    <div class="row justify-content-center ml-0 mr-0">
        <div class="col-md-8">
            <h4 class="text-center mb-4">Demande de réservation</h4>
            <form method="post">
                @include('inc.flash-message')
                @csrf
            @if(Session()->get('error'))
                <div class="alert alert-danger">
                    <p><b>Erreur!</b> {{session()->get('error')}}</p>
                </div>
                @endif
            <div class="form-row">
                <div class="col-md-6">
                    <div id="calendar">

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-form-label col-form-label">Date de début <span class="red">*</span> </label>
                        <input type="date" class="form-control form-control-sm @error('date_debut') is is-invalid @endif" id="date_debut" name="date_debut" value="{{old('date_debut')}}" required>
                        @error('date_debut')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="col-form-label col-form-label">Date de fin <span class="red">*</span> </label>
                        <input type="date" class="form-control form-control-sm @error('date_fin') is is-invalid @endif" value="{{old('date_fin')}}" name="date_fin" id="date_fin" required>
                        @error('date_fin')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="form-group">
                    <label class="col-form-label">Votre Nom <span class="red">*</span> </label>
                    <input type="text" class="form-control form-control-sm @error('nom') is-invalid @enderror" name="nom" required>
                        @error('nom')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="form-group">
                    <label class="col-form-label">Votre email <span class="red">*</span> </label>
                        <input type="email" class="form-control form-control-sm @error('email') is-invalid @enderror" name="email" id="email" required>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Votre commentaire <span class="red">*</span> </label>
                        <textarea class="form-control form-control-sm @error('commentaire') is-invalid @enderror" rows="6" name="commentaire" required></textarea>
                        @error('commentaire')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Nombre de personnes</label><br>

                        <select class="custom-select custom-select-sm" name="nombre_personnes">
                            @for ($i = 1; $i <=2 ; $i++)
                                <option value="{{$i}}">{{$i}} @if($i ==1)personne @else personnes @endif</option>
                            @endfor
                        </select>
                    </div>
                    <div class="form-group">
                        {!! NoCaptcha::renderJs() !!}
                        {!! NoCaptcha::display() !!}
                        @if ($errors->has('g-recaptcha-response'))
                            <span class="help-block">
        <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
    </span>
                        @endif
                    </div>
                    <div class="form-group mb-5">
                        <button type="submit" class="btn btn-primary">Envoyer ma demande</button>
                    </div>
                </div>
            </div>
            </form>
            <h4 class="text-center mb-4">Tarifs {{date('Y')}}</h4>
            <h5 class="mb-3 text-center"><b>Tarifs locations</b></h5>
            <div class="table-responsive-sm mb-3">
                <table class="table table-bordered table-hover">
                    <tr>
                        <th></th>
                        <th style="background: yellow;">Nuitée</th>
                        <th style="background: hotpink;">Week-end (2 nuits)</th>
                        <th style="background: lightgreen;">Semaine (7 nuits),<br>(Samedi au Samedi)</th>
                    </tr>
                    <tr>
                        <td>01/01/2020 -31/03/2020</td>
                        <td>70,00 €</td>
                        <td>130,00 €</td>
                        <td>350,00 €</td>
                    </tr>
                    <tr>
                        <td>01/04/2020 - 31/05/2020</td>
                        <td>75,00 €</td>
                        <td>135,00 €</td>
                        <td>425,00 €</td>
                    </tr>
                    <tr>
                        <td>01/06/2020 - 31/06/2020</td>
                        <td>80,00 €</td>
                        <td>150,00 €</td>
                        <td>550,00 €</td>
                    </tr>
                    <tr>
                        <td>01/07/2020 - 31/07/2020</td>
                        <td>85,00 €</td>
                        <td>160, 00 €</td>
                        <td>590,00 €</td>
                    </tr>
                    <tr>
                        <td>01/08/2020 - 31/08/2020</td>
                        <td>90,00 €</td>
                        <td>170, 00 €</td>
                        <td>630,00 €</td>
                    </tr>
                    <tr>
                        <td>01/09/2020 - 30/09/2020</td>
                        <td>75,00 €</td>
                        <td>135, 00 €</td>
                        <td>425,00 €</td>
                    </tr>
                    <tr>
                        <td>01/10/2020 - 26/12/2020</td>
                        <td>70,00 €</td>
                        <td>130, 00 €</td>
                        <td>350,00 €</td>
                    </tr>
                    <tr>
                        <td>27/12/2020 - 31/12/2020</td>
                        <td>90,00 €</td>
                        <td>170,00 €</td>
                        <td>/</td>
                    </tr>

                </table>
            </div>
            <p class=""><b><span class="red">*</span> Petit déjeuner inclus.</b></p>
            <p class="pb-3 mb-4" style="border-bottom: 1px dashed #969595;"> Heure d'arrivée : 17 heures.<br>Heure de départ : 11 heures.</p>
            <h5 class="mb-3 text-center"><b>Nuit duo en amoureux</b></h5>
            <p>Nous vous proposons de préparer la roulotte pour une nuit unique.</p>
            <div class="table-responsive mb-3">
                <table class="table table-borderless table-hover">
                    <tr>
                        <td class="pl-0">Formule pétales de roses et bougies</td>
                        <td></td>
                        <td></td>
                        <td class="">15,00 €</td>
                    </tr>
                    <tr>
                        <td class="pl-0">Formule panier repas spécial amoureux</td>
                        <td></td>
                        <td></td>
                        <td>65,00 €</td>
                    </tr>
                </table>
            </div>
            <div class="mb-4"style="border-bottom: 1px dashed #969595;"></div>
            <h5 class="text-center"><b>Tarifs consommations</b></h5>
                <div class="table-responsive">
                    <table class="table-borderless table table-hover">
                        <tr>
                            <td>Bières (sans alcool)</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>2,00 €</td>
                        </tr>
                        <tr>
                            <td>Jus de fruits 25CL</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>2,00 €</td>
                        </tr>
                        <tr>
                            <td>Sirop à l'eau</td>
                            <td></td>
                                           <td></td>
                            <td></td>
                            <td>1,50 €</td>
                        </tr>
                        <tr>
                            <td>Bouteille d'eau 1,5L</td>
                            <td></td>
                                         <td></td>
                            <td></td>
                            <td>1,50 €</td>
                        </tr>
                        <tr>
                            <td>Café</td>
                                  <td></td>
                            <td></td>
                            <td></td>
                            <td>1,50 €</td>
                        </tr>
                        <tr>
                            <td>Chocolat chaud</td>
                            <td></td>
                            <td></td>
                                              <td></td>
                            <td>2,00€</td>
                        </tr>
                        <tr>
                            <td>Thé/infusion</td>
                            <td></td>
                            <td></td>
                                             <td></td>
                            <td>2,00 €</td>
                        </tr>
                        <tr>
                            <td>Lait 1/2 L</td>
                            <td></td>
                            <td></td>
                                          <td></td>
                            <td>1,00 €</td>
                        </tr>
                        <tr>
                            <td>Baguette</td>
                            <td></td>
                            <td></td>         <td></td>

                            <td>1,50 €</td>
                        </tr>
                        <tr>
                            <td>Glace</td>
                            <td></td>
                            <td></td>
                                           <td></td>
                            <td>2,50 €</td>
                        </tr>
                        <tr>
                            <td>Panier Pique Nique<br>(suivant saison)</td>
                            <td></td>
                            <td></td>
                                   <td></td>
                            <td>45,00 €</td>
                        </tr>


                    </table>
                </div>
            </div>
        </div>
    <script>
    </script>
@stop

