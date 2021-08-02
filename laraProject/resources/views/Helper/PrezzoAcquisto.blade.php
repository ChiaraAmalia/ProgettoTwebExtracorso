<div class="style-1"> {{ number_format($evento->getPrezzo($evento->biglietto_scontato), 2, ',', '.') }} € </div>

@if ($evento->biglietto_scontato == 1)
<div class="style-1">  <del>{{ number_format($evento->getPrezzo(false), 2, ',', '.') }} €</del><br></div>

@endif


