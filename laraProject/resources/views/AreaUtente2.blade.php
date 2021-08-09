@extends('layout.zonaUtente2')

@section('title', 'User')
<!-- inizio della sezione home -->
@section('content')
<div class="container-contact">
    <div class="wrapper fadeInDown">
        <div id="formContent">

            <h2 class="active">Area Tecnico</h2><br>
            <h2 class="active">Benvenuto {{ Auth::user()->nome }} {{ Auth::user()->cognome }}<h2>

         <div class="wrapper fadeInDown">
                <a href="{{ route('gestioneProdotti', [Auth::user()->id]) }}" title="Visualizza i tuoi prodotti di competenza">
                    <input type="submit" class="profile-edit-btn" name="btnAddMore" value="Prodotti di competenza"/>
                </a>
        </div>
    </div>
</div>
@endsection
