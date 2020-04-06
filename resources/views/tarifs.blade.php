
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
                    validRange: {

                        start: '2020-02-01',
                        end: '2021-06-01'
                    },
                    header:{
                        left:'prev,next',
                        center:'title',
                        right:'today',
                    },
                    events: '/reservations',
                    selectable:true,
                    selectHelper:true,
                    height : 500,
                    dateFormat: 'dd/mm/yy',
                    onSelect:function(date){
                        $('#date_fin').val(date);
                    }

                });
            });


        </script>
    </head>




    </html>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
    <div class="row justify-content-center ml-0 mr-0">
        <div class="col-md-8">
            <h4 class="text-center mb-4">Demande de reservation</h4>
            <p>En cas de petit creux, possibilité de vous preparer un panier pique</p>
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
                        <label class="col-form-label col-form-label">Date de début</label>
                        <input type="date" class="form-control form-control-sm @error('date_debut') is is-invalid @endif" id="date_debut" name="date_debut" value="{{old('date_debut')}}" required>
                        @error('date_debut')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="col-form-label col-form-label">Date de fin</label>
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
                                <option value="{{$i}}">{{$i}} personnes</option>
                            @endfor
                        </select>
                    </div>
                    <div class="form-group mb-5">
                        <button type="submit" class="btn btn-primary">Envoyer ma demande</button>
                    </div>
                </div>
            </div>
            </form>
            <h4 class="text-center mb-4">Tarifs 2020-2021</h4>
            <h5 class="mb-3 text-center">Nuit duo en amoureux</h5>
            <p>Nous vous proposons de préparer la roulotte pour une nuit unique.</p>
            <div class="table-responsive mb-3">
                <table class="table table-borderless table-hover">
                    <tr>
                        <td>Formules pétales de roses et bougies</td>
                        <td></td>
                        <td></td>
                        <td>15 €</td>
                    </tr>
                    <tr>
                        <td>Formule panier repas spécial amoureux</td>
                        <td></td>
                        <td></td>
                        <td>65 €</td>
                    </tr>
                </table>
            </div>
            <div class="row justify-content-center">
                <h5 class="mb-3">Tarifs locations</h5>
                <div class="table-responsive mb-3">
                    <table class="table-borderless table table-hover">
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
                            <td>490,00 €</td>
                        </tr>
                        <tr>
                            <td>01/08/2020 - 31/08/2020</td>
                            <td>90,00 €</td>
                            <td>170, 00 €</td>
                            <td>520,00 €</td>
                        </tr>
                        <tr>
                            <td>01/09/2020 - 30/09/2020</td>
                            <td>75,00 €</td>
                            <td>135, 00 €</td>
                            <td>400,00 €</td>
                        </tr>
                        <tr>
                            <td>01/10/2020 - 27/12/2020</td>
                            <td>70,00 €</td>
                            <td>130, 00 €</td>
                            <td>300,00 €</td>
                        </tr>
                        <tr>
                            <td>27/12/2020 - 31/01/2020</td>
                            <td>90,00 €</td>
                            <td>170,00 €</td>
                            <td>/</td>
                        </tr>

                    </table>
                </div>
                <h5>Tarifs consommations</h5>
                <div class="table-responsive">
                    <table class="table-borderless table table-hover">
                        <tr>
                            <td>Bières (sans alcool)</td>
                            <td></td>
                            <td></td>
                            <td>2,00 €</td>
                        </tr>
                        <tr>
                            <td>Jus de fruits 25CL</td>
                            <td></td>
                            <td></td>
                            <td>2,00 €</td>
                        </tr>
                        <tr>
                            <td>Sirop à l'eau</td>
                            <td></td>
                            <td></td>
                            <td>1,50 €</td>
                        </tr>
                        <tr>
                            <td>Bouteille d'eau 1,5L</td>
                            <td></td>
                            <td></td>
                            <td>1,50 €</td>
                        </tr>
                        <tr>
                            <td>Café</td>
                            <td></td>
                            <td></td>
                            <td>1,50 €</td>
                        </tr>
                        <tr>
                            <td>Chocolat chaud</td>
                            <td></td>
                            <td></td>
                            <td>1,50 €</td>
                        </tr>


                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
    </script>
@stop
