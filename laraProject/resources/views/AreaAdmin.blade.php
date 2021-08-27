@extends('layout.zonaAdmin')

@section('title', 'Admin')

<!-- inizio della sezione home -->
@section('content')

<div class="container-contact">
    <div class="wrapper fadeInDown">
        <div id="formContent">

            <h2 class="active">Area Amministratore</h2>
            <h2 class="active">Benvenuto {{ Auth::user()->nome }} {{ Auth::user()->cognome }}<h2>

         <div class="wrapper fadeInDown">
                <a href="{{ route('gestioneFAQ') }}" title="gestioneFAQ">
                    <input type="submit" class="profile-edit-btn" name="btnAddMore" value="Gestione FAQs"/>
                </a>
                <a href="{{ route('gestioneUtenti') }}" title="gestioneUtenti">
                    <input type="submit" class="profile-edit-btn" name="btnAddMore" value="Gestione utenti"/>
                </a>
                <a href="{{ route('catalogo') }}" title="gestioneProdotti">
                    <input type="submit" class="profile-edit-btn" name="btnAddMore" value="Gestione Prodotti"/>
                </a>
        </div>
    </div>
</div>
@endsection
