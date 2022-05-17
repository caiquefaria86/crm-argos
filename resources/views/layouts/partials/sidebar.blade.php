<x-maz-sidebar :href="route('dashboard')" :logo="asset('images/logo/logo.png')">

    <!-- Add Sidebar Menu Items Here -->

    <li class="sidebar-item ">
        <a href="{{route('dashboard')}}" class='sidebar-link'>
            <i class="bi bi-grid-fill"></i>
            <span>Dashboard</span>
        </a>
    </li>

    @if (Auth::user()->commercial || Auth::user()->admin)

        <li class="sidebar-title">Comercial</li>

        <li class="sidebar-item  ">
            <a href="#" class='sidebar-link'>
                <span class="fa-fw select-all fas"></span>
                <span>Relatório</span>
            </a>
        </li>

        <li class="sidebar-item  ">
            <a href="{{route('comercial.contato.index')}}" class='sidebar-link'>
                <span class="fa-fw select-all fas"></span>
                <span>Dados</span>
            </a>
        </li>

        <li class="sidebar-item  ">
            <a href="{{route('comercial.painel')}}" class='sidebar-link'>
                <span class="fa-fw select-all fas"></span>
                <span>Painel</span>
            </a>
        </li>

        <li class="sidebar-item  ">
            <a href="#" class='sidebar-link'>
                <span class="fa-fw select-all fas"></span>
                <span>Clientes</span>
            </a>
        </li>

        @if (Auth::user()->admin)
            <li class="sidebar-item  has-sub">
            <a href="#" class='sidebar-link'>
                <i class="bi bi-hexagon-fill"></i>
                <span>Administração</span>
            </a>
            <ul class="submenu">
                <li class="submenu-item ">
                    <a href="#">Usuários / Permissões</a>
                </li>
                <li class="submenu-item ">
                    <a href="#">Etiquetas (Tags)</a>
                </li>
                <li class="submenu-item ">
                    <a href="#">CheckLists</a>
                </li>
            </ul>



        @endif
    </li>

    @endif



</x-maz-sidebar>
