@extends('layout.zonaUtente2')

@section('title', 'User')
<!-- inizio della sezione home -->
@section('content')
<div class="container emp-profile">
                <div class="row">
                    <div class="col-md-6">
                        <div class="profile-head">
                                    <h1>
                                        {{ Auth::user()->nome }} {{ Auth::user()->cognome }}
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

                    <div class="row">
                        <div class="col-md-2">
                            <a href="{{route('modificalivello2')}}" title="Modifica profilo"><input type="submit" class="profile-edit-btn" name="btnAddMore" value="Modifica profilo"/></a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <a href="{{route('storico',[Auth::user()->id])}}" title="I tuoi acquisti"><input type="submit" class="profile-edit-btn" name="btnAddMore" value="I miei acquisti"/></a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <a href="{{route('vedipartecipero',[Auth::user()->id])}}" title="Parteciperò"><input type="submit" class="profile-edit-btn" name="btnAddMore" value="I miei parteciperò"/></a>
                        </div>
                    </div>
                    </div>
                    
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Username</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{ Auth::user()->username }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Nome</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{ Auth::user()->nome }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Cognome</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{ Auth::user()->cognome }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>E-mail</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{ Auth::user()->email }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Via</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{ Auth::user()->via }}</p>
                                            </div>
                                            </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Città</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{ Auth::user()->citta }}</p>
                                            </div>
                                            </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>CAP</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{ Auth::user()->cap }}</p>
                                            </div>
                                            </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Sesso</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{ Auth::user()->sesso }}</p>
                                            </div>
                                            </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Cellulare</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{ Auth::user()->cellulare }}</p>
                                            </div>
                                        </div>
                            </div>
                        </div>
                    </div>
                </div>          
        </div>
@endsection
