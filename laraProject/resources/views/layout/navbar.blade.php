<ul class="menu-area-main">

    <li> <a href="{{ route('homePubblica') }}" title="Home">Home</a> </li>
    <li> <a href="{{ route('catalogo') }}" title="Catalogo"> Catalogo</a> </li>
    <li> <a href="{{ route('info') }}" title="Info">Info</a> </li>
    <li> <a href="{{ route('faq') }}" title="FAQ">FAQ</a> </li>
@guest    
    <li> <a href="{{ route('login') }}" class="highlight" title="Accedi all'area riservata del sito">Accedi</a></li>  
@endguest
    
@can('isAdmin')
    <li><a href="{{ route('amministratore') }}" title="Home Admin">Area privata Amministratore</a></li>
@endcan

@can('isOrganizer')
    <li><a href="{{ route('organizzatore') }}" title="Home Organizzatore">Area privata Organizzatore</a></li>
@endcan

@can('isUser')
    <li><a href="{{ route('cliente') }}" title="Home User">Area privata Cliente</a></li>
@endcan

@auth
    <li><a href="" title="Esci dal sito" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>
@endauth
</ul>

