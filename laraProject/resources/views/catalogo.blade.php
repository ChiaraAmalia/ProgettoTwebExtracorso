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
                        <div  style="width: 62%">
                            {{ Form::text('ricerca', '', ['placeholder' => 'Cerca nella descrizione...']) }}
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
    @isset($prodotti)
    @foreach ($prodotti as $prodotto)

    <div class="d-flex justify-content-center row">
        <div class="col-md-10">
            <div class="row p-2 bg-white border rounded">
                <div class="col-md-3 mt-1">
                    <div class="image">
                        @include('Helper/Locandina', ['imgFile' => $prodotto->immagine])
                    </div>
                </div>
                <div class="col-md-6 mt-1">
                    <a href="{{route('dettagliProdotto',[$prodotto->codice_prodotto])}}">
                        <p class="nomeprod" style='color: #ff8c00'>{{ $prodotto->nome_prodotto }}</p>
                    </a>
                    <div class="d-flex flex-row">
                        <div class="mt-1 mb-1 spec-1">
                            <span>{{ $prodotto->tipologia }}</span>
                            <span class="dot" style='background-color: #ff8c00'></span><span>{{ $prodotto->rumore }}</span>
                            <span class="dot" style='background-color: #ff8c00'></span><span>{{ $prodotto->classe_energetica }}</span>
                            <span class="dot" style='background-color: #ff8c00'></span><span>{{ $prodotto->consumo_en_annuo }}</span>
                        </div>
                    </div>
                    <p class="text-justify text-truncate para mb-0">{{ $prodotto->descrizione }}<br><br></p>
                </div>
                <div class="align-items-center align-content-center col-md-3 border-left mt-1">
                    <div class="d-flex flex-column mt-4"><a href="{{route('dettagliProdotto',[$prodotto->codice_prodotto])}}"><button class="btn btn-primary btn-sm" type="button" style='background-color: #ff8c00;text-shadow: 2px 2px 4px black'>Dettagli</button></a>

                    </div>
                </div>
            </div>

        </div>
    </div>
    @endforeach
    
    @if($filtrato != 1)
    @include('pagination.paginator', ['paginator' => $prodotti])
    @endif

    @endisset()
    @endsection
</div>




