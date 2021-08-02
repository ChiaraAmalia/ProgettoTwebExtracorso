

@can('show-discount')
    <div class="style-1"> {{ number_format($evento->getPrezzo($evento->biglietto_scontato), 2, ',', '.') }} € </div>
    
    @if ($evento->biglietto_scontato == 1)
        <p class="style-1"> Valore <del>{{ number_format($evento->getPrezzo(false), 2, ',', '.') }} €</del><br>
        Sconto {{ $evento->sconto }}%</p>
    @endif   
    @else
    <p class="style-1" style="color: red">{{ number_format($evento->getPrezzo(false), 2, ',', '.') }} €</p>
@endcan


