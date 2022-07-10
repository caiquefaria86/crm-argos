<x-maz-sidebar :href="route('dashboard')" :logo="asset('images/logo/logo.png')">

    <!-- Add Sidebar Menu Items Here -->

    <li class="sidebar-item ">
        <a href="{{route('bemvindo')}}" class='sidebar-link'>
            <i class="bi bi-grid-fill"></i>
            <span>Bem Vindo</span>
        </a>
    </li>

    @if (Auth::user()->commercial || Auth::user()->admin)

        <li class="sidebar-title">Comercial</li>

        {{-- <li class="sidebar-item  ">
            <a href="{{route('comercial.contato.index')}}" class='sidebar-link'>
                <span class="fa-fw select-all fas"></span>
                <span>Dados</span>
            </a>
        </li> --}}

        <li class="sidebar-item  ">
            <a href="{{route('comercial.painel')}}" class='sidebar-link'>
                <span class="fa-fw select-all fas"></span>
                <span>Painel</span>
            </a>
        </li>

        <li class="sidebar-item  ">
            <a href="{{route('comercial.client.index')}}" class='sidebar-link'>
                <span class="fa-fw select-all fas"></span>
                <span>Clientes</span>
            </a>
        </li>

        @if (Auth::user()->admin)

            <li class="sidebar-item  ">
                <a href="{{route('comercial.report')}}" class='sidebar-link'>
                    <span class="fa-fw select-all fas"></span>
                    <span>Relatório</span>
                </a>
            </li>
            <li class="sidebar-item  has-sub">
                <a href="#" class='sidebar-link'>
                    <span class="fa-fw select-all fas"></span>
                    <span>Administração</span>
                </a>
                <ul class="submenu">
                    <li class="submenu-item ">
                        <a href="{{route('admin.usuarios')}}">Usuários / Permissões</a>
                    </li>
                    <li class="submenu-item ">
                        <a href="{{route('admin.tags.groups')}}">Etiquetas (Tags)</a>
                    </li>
                    <li class="submenu-item ">
                        <a href="{{route('admin.campaign.index')}}">Campanhas</a>
                    </li>
                    {{-- <li class="submenu-item ">
                        <a href="#">CheckLists</a>
                    </li> --}}
                </ul>
            </li>

        @endif

    @endif



</x-maz-sidebar>
