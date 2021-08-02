<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/animate.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/jquery-ui.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/jquery.mCustomScrollbar.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/meanmenu.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/nice-select.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/normalize.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/owl.carousel.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/responsive.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/searchbar.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/slick.css') }}">


@extends('layout.zonaAdmin')

@section('title', 'User')
<!-- inizio della sezione home -->
@section('content')
<div class="container emp-profile">
                <div class="row">
                    <div class="col-md-6">
                        <div class="profile-head">
                                    <h1>
                                       {{$statistica['nomeEvento']}}
                                    </h1>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <p class="nav-link active" id="home-tab" data-toggle="tab" title="login" role="tab" aria-controls="home" aria-selected="true">Le mie Info:</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                   
                </div>
                <div class="row">
                    
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Incasso</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{ $statistica['incasso'] }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Biglietti Venduti</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{ $statistica['numBigl'] }}</p>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Percentuale Venduti su Totale</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{ $statistica['pv'] }}%</p>
                                            </div> 
                            </div>
                        </div>
                    </div>
                </div>          
        </div>
@endsection