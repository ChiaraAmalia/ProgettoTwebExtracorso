@extends('layout.zonaPubblica')

@section('title', 'Catalogo')

@section('content')

<section class="search-sec">
    <div class="container">
        <form action="#" method="post" novalidate="novalidate">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">

                        {{ Form::open(array('route' => 'catalogoFiltrato', 'id' => 'filtro', 'files' => true, 'class'=>'lineaDritta')) }}

                        {{-- Ricerca testuale --}}
                        <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                            {{ Form::text('ricerca', '', ['placeholder' => 'Cerca nella descrizione...']) }}
                        </div>
                        {{-- Ricerca per data --}}
                        <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                            {{-- {{ Form::label('data', 'Scegli una data')}} --}}
                            {{ Form::datetime('data', \Carbon\Carbon::create()->format('m-Y'), ['class' => 'form-control search-slt', 'placeholder'=>'Scegli una data']) }}
                        </div>
                        {{-- Ricerca per luoghi --}}
                        <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                            {{ Form::select('luogo', $luoghi, '', ['class' => 'form-control search-slt', 'placeholder'=>'Scegli una regione']) }}
                        </div>
                        {{-- Ricerca per società --}}
                        <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                            {{ Form::select('societa', $societa, '', ['class' => 'form-control search-slt', 'placeholder'=>'Scegli una società']) }}
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                            {{ Form::submit('Avvia la ricerca') }}
                        </div>
                        {{Form::close()}}
                    </div>
                </div>
            </div>
        </form>    
    </div>
</section>

<div class="container">
    @isset($eventi)
    @foreach ($eventi as $evento)

    <div class="d-flex justify-content-center row">
        <div class="col-md-10">
            <div class="row p-2 bg-white border rounded">
                <div class="col-md-3 mt-1">
                    <div class="image">
                        @include('Helper/Locandina', ['imgFile' => $evento->locandina])
                    </div>
                </div>
                <div class="col-md-6 mt-1">
                    <a href="{{route('dettagliEvento',[$evento->codice_evento])}}">
                        <p class="nomeprod">{{ $evento->titolo }}</p>
                    </a>
                    <div class="d-flex flex-row">
                        <div class="mt-1 mb-1 spec-1">
                            <span>{{ $evento->data_ora }}</span>
                            <span class="dot"></span><span>{{ $evento->luogo }}</span>
                            <span class="dot"></span><span>{{ $evento->societa_organizzatrice }}<br></span>
                            <span class="dot"></span><span>{{ $evento->stato_evento }}</span>
                        </div>
                    </div>
                    <p class="text-justify text-truncate para mb-0">{{ $evento->informazioni }}<br><br></p>
                </div>
                <div class="align-items-center align-content-center col-md-3 border-left mt-1">
                    <div class="d-flex flex-row align-items-center">
                        <h4 class="mr-1">@include('Helper/Prezzo')</h4><span class="strike-text"></span>
                    </div>
                    <div class="d-flex flex-column mt-4"><a href="{{route('dettagliEvento',[$evento->codice_evento])}}"><button class="btn btn-primary btn-sm" type="button">Dettagli</button></a>
                        @can('isOrganizer')
                        @if($evento->societa_organizzatrice==Auth::user()->nome_societa_organizzatrice)
                        <a href="{{route('statisticheOrga',[$evento->codice_evento])}}"><button class="btn btn-outline-primary btn-sm mt-2" type="button">Statistiche</button></a>
                        <a href="{{route('ModificaEvento',[$evento->codice_evento])}}"><button class="btn btn-outline-primary btn-sm mt-2" type="button">Modifica</button></a>
                        <a href="{{route('EliminaEvento',[$evento->codice_evento])}}"><button class="btn btn-outline-primary btn-sm mt-2" type="button">Elimina</button></a>
                        @else
                        <p class='finito'>Non hai i permessi per gestire questo evento!</p>
                        @endif
                        @endcan
                        @can('isUser')
                        @if($evento->stato_evento=="aperto")
                        <a href="{{route('acquisto',[$evento->codice_evento])}}"><button class="btn btn-outline-primary btn-sm mt-2" type="button">Compra</button></a>
                        @elseif($evento->stato_evento=="chiuso")
                        <p class='finito'> L'evento è terminato!</p>
                        @endif
                        @endcan
                    </div>
                </div>
            </div>

        </div>
    </div>
    @endforeach
    
    @if($filtrato != 1)
    <!--Paginazione-->
    @include('pagination.paginator', ['paginator' => $eventi])
    @endif

    @endisset()
    @endsection
</div>




