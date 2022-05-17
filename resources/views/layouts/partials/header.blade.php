<header class='mb-3'>
    <nav class="navbar navbar-expand navbar-light ">
        <div class="container-fluid">
            <a href="#" class="burger-btn d-block">
                <i class="bi bi-justify fs-3"></i>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <div class="dropleft me-1 mb-1" id="dropdown-notificacoes" >
                        <button type="button" class="btn dropdown-tira-setinha dropleft dropdown-toggle notification mx-5" id="load-last-notifications"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class='bi bi-bell bi-sub fs-4 text-gray-600'></i>
                        </button>
                        <div class="dropdown-menu shadow" id="content-view-notifications">
                            <span class="align-middle w-100 d-flex justify-content-center" id="spinner-notifications"><img src="{{asset("vendors/svg-loaders/oval.svg")}}" class="me-4 align-middle text-center my-5" style="width: 3rem" alt="audio"></span>
                        </div>
                    </div>
                    {{-- <li class="nav-item dropdown me-1">
                        <a class="nav-link active dropdown-toggle" href="#" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class='bi bi-envelope bi-sub fs-4 text-gray-600'></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                            <li>
                                <h6 class="dropdown-header">Mail</h6>
                            </li>
                            <li><a class="dropdown-item" href="#">No new mail</a></li>
                        </ul>
                    </li> --}}
                    {{-- <li class="nav-item dropdown me-3">
                        <a class="nav-link active dropdown-toggle" id="load-notifications" href="#" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class='bi bi-bell bi-sub fs-4 text-gray-600'></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" id="content-view-notifications" aria-labelledby="dropdownMenuButton">
                            <li>
                                <h6 class="dropdown-header">Notifications</h6>
                            </li>
                            <li><a class="dropdown-item">No notification available</a></li>
                            <li><a class="dropdown-item">Você foi marcado <br> Luis carlos da silva</a></li>
                            <li><a class="dropdown-item">No notification available</a></li>
                        </ul>
                    </li> --}}

                </ul>
                <div class="dropdown">
                    <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="user-menu d-flex">
                            <div class="user-name text-end me-3">
                                <h6 class="mb-0 text-gray-600">{{ Auth::user()->name }}</h6>
                                <p class="mb-0 text-sm text-success">Online</p>
                            </div>
                            <div class="user-img d-flex align-items-center">
                                <div class="avatar avatar-md">
                                    <img src="{{ asset('/images/faces/1.jpg') }}">
                                </div>
                            </div>
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                        <li>
                            <h6 class="dropdown-header">Olá, {{ strtok(Auth::user()->name, " ") }}!</h6>
                        </li>
                        <li><a class="dropdown-item" href="{{ route('profile.show') }}"><i class="icon-mid bi bi-person me-2"></i> Meu
                                Perfil</a></li>
                        @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                        <li>
                            <a class="dropdown-item" href="#"><i class="icon-mid bi bi-gear me-2"></i>
                            {{ __('API Tokens') }}
                            </a>
                        </li>
                        @endif
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="icon-mid bi bi-box-arrow-left me-2"></i>
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>

<script>
    $(document).ready(function() {
        var SegParaAtualizar = 40;

        refreshBadge();

        function refreshBadge(){

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "post",
                url: "{{ route('notification.reloadBadge') }}",
                dataType: "json",
                success: function(res) {
                    $("#badge_notif").remove();
                    console.log(res);
                    if(res.notifications > 0){
                        $("#load-last-notifications").append('<span class="badge_notif" id="badge_notif">'+res.notifications+'</span>');
                    }
                },
            });
        }
        function updateNotificationBadge() {
            var count = 0;

            setInterval(function() {
                console.log(count);
                console.log('atualizou');

                refreshBadge();

                count += 1;

            }, 1000*SegParaAtualizar);

        }


        updateNotificationBadge();

    });

</script>
