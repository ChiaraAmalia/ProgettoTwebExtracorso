@extends('layout.zonaUtente3')

@section('title', 'Organizzatore')

<!-- inizio della sezione home -->
@section('content')


<div class="container-contact">
    <div class="wrapper fadeInDown">
        <div id="formContent">

            <h2 class="active">Area Staff</h2><br>
            <h2 class="active">Benvenuto {{ Auth::user()->nome }} {{ Auth::user()->cognome }}<h2>

         <div class="wrapper fadeInDown">
                <a href="{{ route('gestioneEventi', [Auth::user()->id]) }}" title="Gestione Prodotti">
                    <input type="submit" class="profile-edit-btn" name="btnAddMore" value="Gestione prodotti"/>
                </a>
        </div>
    </div>
</div>
@endsection
