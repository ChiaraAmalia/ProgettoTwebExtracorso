<div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>Vedi le statistiche</h3>
            </div>

            <ul class="list-unstyled components">
              <h5>Seleziona la società organizzatrice</h5>
              @isset($organizzatori)
                @foreach ($organizzatori as $organizzatore)
                <li>
                    <a href="{{route('statistiche',[$organizzatore])}}">$organizzatore->nome_societa_organizzatrice</a>
                </li>
                @endforeach
                @endisset()
            </ul>
        </nav>

