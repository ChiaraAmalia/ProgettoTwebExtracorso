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

@can('isStaff')
    <li><a href="{{ route('staff') }}" title="Home Staff">Area privata Staff</a></li>
@endcan

@can('isTecn')
    <li><a href="{{ route('tecnico') }}" title="Home Tecnico">Area privata Tecnico</a></li>
@endcan

@auth
    <li><a href="" title="Esci dal sito" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>
@endauth
</ul>

