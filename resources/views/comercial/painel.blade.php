<x-app-layout>

    <x-slot name="header">
    </x-slot>
    @section('stylePersonalizado')
        <link rel="stylesheet" href="{{ asset('css/pages/board.css') }}">
        <link rel="stylesheet" href="{{ asset('vendors/toastify/toastify.css') }}">

        <meta name="csrf-token" content="{{ csrf_token() }}" />
    @endsection
    @section('scriptsPersonalizado')
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

        <script src="{{ asset('vendors/toastify/toastify.js') }}"></script>
    @endsection
    {{-- <form action="{{route('comercial.painel')}}" method="GET" name="formFilterCards">
    @csrf
    <div class="d-flex flex-row align-items-end mb-5 border rounded">
        <div class="p-2">
            <label for="selectCards">Exibir Cards:</label>
            <div class="input-group">
                <select class="form-select" id="selectCards" name="selectCards">
                    <option value="{{$authUser->id}}" selected>Meus/Marcados</option>
                    <option value="*">Todos</option>
                    {{-- @foreach ($allUsers as $user)
                        @if(($user->commercial == true)&&($user->id != $authUser->id))
                            <option value="{{$user->id}}">{{$user->name}}</option>
                        @endif
                    @endforeach
                </select>
                <label class="input-group-text" for="selectCards">Cards</label>
            </div>
        </div>
        <div class="p-2 ">
            <label for="selectCards">Período:</label>
            <div class="input-group">
                <select class="form-select" id="selectTime" name="selectTime">
                    <option value="*" selected>Todos</option>
                    <option value="esteMes">Este Mês</option>
                    <option value="mesAnterior">Mês Anterior</option>
                    <option value="esteAno">Este Ano</option>
                    <option value="anoAnterior">Ano Anterior</option>
                    {{-- <option value="3">Periodo Personalizado</option>
                </select>
            </div>
        </div>
        <div class="p-2 ">
            <button type="submit" id="filterCards" class="btn border btn-filtrar"><span class="fa-fw select-all fas"></span></button>
        </div>
        <div class="p-2">
            <button class="btn btn-sm border " id="btnReloadAll"><span class="fa-fw select-all fas mx-1 my-1"></span></button>
        </div>
    </form> --}}
        <div class="p-2 flex-grow-1 d-flex justify-content-end">
            <div class="input-group search">
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-search"></i></span>
                <input type="text" class="form-control" placeholder="Buscar Card..." id="search" aria-label="Buscar" aria-describedby="button-addon2">
                <div class="shadow search-content d-none rounded" id="search-content">
                    <div class="d-flex">
                        <div class="p-2 flex-grow-1" id="search-content_txt">
                            <p>Digite no mínimo 3 letras pra inciar a busca...</p>
                        </div>
                        <div class="p-2">
                            <button type="button" class="close btn" id="btn_close_search" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="section">

        <section class="lists-container">

            {{-- Contacts --}}
            <div class="list">

                <h3 class="list-title">Contato / Lead
                    <a href="" class="btn btn-sm mx-3" data-bs-toggle="modal" data-bs-target="#create-contact"> <span class="fa-fw select-all fa-2x fas"></span> </a>
                    <button class="btn btn-sm" id="btnReloadContact"><span class="fa-fw select-all fas"></span></button>
                </h3>

                {{-- Contatos --}}
                <div class="list-items" id="list-contact">

                    <div class="text-center my-5" id="loading-contacts-modal">
                        <img src="{{ asset('vendors/svg-loaders/audio.svg') }}" class="me-4"
                            style="width: 3rem" alt="audio">
                    </div>
                </div>

            </div>

            {{-- Solicitado Orçamento --}}
            <div class="list">

                <h3 class="list-title">Orçamento Solicitado <button class="btn btn-sm" id="btnReloadrequestBudget"><span class="fa-fw select-all fas"></span></button></h3>

                <div class="list-items" id="list-budget">
                    <div class="text-center my-5" id="loading-budgets-modal">
                        <img src="{{ asset('vendors/svg-loaders/audio.svg') }}" class="me-4"
                            style="width: 3rem" alt="audio">
                    </div>
                </div>
            </div>

            {{-- Apresentado --}}
            <div class="list">

                <h3 class="list-title">Apresentado <button class="btn btn-sm" id="btnReloadBudgetSent"><span class="fa-fw select-all fas"></span></button></h3>

                <div class="list-items" id="list-presented">
                    <div class="text-center my-5" id="loading-presented-modal">
                        <img src="{{ asset('vendors/svg-loaders/audio.svg') }}" class="me-4"
                            style="width: 3rem" alt="audio">
                    </div>
                </div>
            </div>

            {{-- Recontactar --}}
            <div class="list">

                <h3 class="list-title">Recontactar <button class="btn btn-sm" id="btnReloadRecontact"><span class="fa-fw select-all fas"></span></button></h3>

                <div class="list-items" id="list-recontact">
                    <div class="text-center my-5" id="loading-recontact-modal">
                        <img src="{{ asset('vendors/svg-loaders/audio.svg') }}" class="me-4"
                            style="width: 3rem" alt="audio">
                    </div>
                </div>
            </div>

            {{-- Negociação --}}
            <div class="list">

                <h3 class="list-title">Negociação <button class="btn btn-sm" id="btnReloadNegotiation"><span class="fa-fw select-all fas"></span></button></h3>

                <div class="list-items" id="list-negotiation">
                    <div class="text-center my-5" id="loading-negotiations-modal">
                        <img src="{{ asset('vendors/svg-loaders/audio.svg') }}" class="me-4"
                            style="width: 3rem" alt="audio">
                    </div>
                </div>
            </div>

            {{-- OBRA FECHADA --}}
            <div class="list">

                <h3 class="list-title">Obra Fechada <button class="btn btn-sm" id="btnReloadclosedwork"><span class="fa-fw select-all fas"></span></button></h3>

                <div class="list-items" id="list-closedwork">
                    <div class="text-center my-5" id="loading-closedwork-modal">
                        <img src="{{ asset('vendors/svg-loaders/audio.svg') }}" class="me-4"
                            style="width: 3rem" alt="audio">
                    </div>
                </div>
            </div>

            {{-- fechado --}}
            <div class="list">

                <h3 class="list-title">Venda Concluida <button class="btn btn-sm" id="btnReloadSaleCompleted"><span class="fa-fw select-all fas"></span></button></h3>

                <div class="list-items" id="list-SaleCompleted">
                    <div class="text-center my-5" id="loading-SaleCompleted-modal">
                        <img src="{{ asset('vendors/svg-loaders/audio.svg') }}" class="me-4"
                            style="width: 3rem" alt="audio">
                    </div>
                </div>
            </div>

        </section>
    </section>
    <!--Modal view Edit contact -->
    <div class="modal fade text-left rounded" id="view-contact-edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2"
        aria-hidden="true">
        <div class="modal-dialog rounded modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body rounded" style="background-color: #ffff" id="content-view-edit-contact">

                </div>
            </div>
        </div>
    </div>
    <!--Modal view contact -->
    <div class="modal fade text-left rounded" id="view-contact" tabindex="-2" role="dialog" aria-labelledby="myModalLabel1"
        aria-hidden="true">
        <div class="modal-dialog rounded modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body rounded" style="background-color: #eeeeee" id="content-view-contact">

                </div>
            </div>
        </div>
    </div>

{{-- fim Teste de retorno --}}

    <!--Modal move-orcamento -->
    <form method="post" id="form-solicitar-orcamento" name="form-solicitar-orcamento" enctype="multipart/form-data">
        @csrf
        <div class="modal fade text-left" id="move-orcamento" tabindex="-1" role="dialog" aria-labelledby="move-orcamento"
            aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">

                    <div class="modal-body bg-light" id="content-move-orcamento">
                        <div class="row">
                            <h4>Dados para Orçamento</h4>
                            <hr>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="first-name-column">Tipo do Telhado: </label>
                                    <select class="form-select" name="tipoTelhado" id="tipoTelhado">
                                        <option value="Não Informado" selected>Não Informado</option>
                                        <option value="Metalico">Metálico</option>
                                        <option value="Colonial">Colonial</option>
                                        <option value="eternit">Eternit</option>
                                        <option value="telhão">Telhão</option>
                                        <option value="solo">Solo</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12 mt-5 col-12">
                                <label for="first-name-column">Forma de Orçamento: </label>
                                <div class="form-group">

                                    <input type="radio" class="btn-check" value="conta-energia"
                                        name="options_outlined" id="conta-energia-btn" autocomplete="off" checked>
                                    <label class="btn btn-outline-success" for="conta-energia-btn">Conta de
                                        Energia</label>

                                    <input type="radio" class="btn-check" value="media-kwh" name="options_outlined"
                                        id="media-kwh-btn" autocomplete="off">
                                    <label class="btn btn-outline-success" for="media-kwh-btn">Média kW/h</label>

                                    <input type="radio" class="btn-check" value="media-valor"
                                        name="options_outlined" id="media-valor-btn" autocomplete="off">
                                    <label class="btn btn-outline-success" for="media-valor-btn">Média R$</label>

                                </div>

                                <label for="first-name-column">Descrição (Opcional)</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="description" id="description" >
                                </div>

                                <div class="form-group d-none" id="conta-energia">

                                    <div class="row">
                                        <div class="col-6">
                                            <!-- File uploader with multiple files upload -->
                                            <p class="mt-2">Faça upload da conta do cliente.</p>
                                            <input type="file" name="uploadArquivos[]"  id="uploadArquivos" multiple>
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group d-none" id="media-kwh">
                                    <div class="row">
                                        <div class="col-4">
                                            <label for="first-name-column">Média em kWh</label>
                                            <input type="text" id="mediakwh" class="form-control border-2"
                                                placeholder="" name="mediakwh" selected required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group d-none" id="media-valor">
                                    <div class="row">
                                        <div class="col-4">
                                            <label for="first-name-column">Média em R$</label>
                                            <input type="text" id="mediavalor" class="form-control border-2"
                                                placeholder="" name="mediavalor" selected required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input value="" type="hidden" id="contactIdValue" name="contactId">

                    <div class="modal-footer bg-light">
                        <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Cancelar</span>
                        </button>

                        <button type="submit" class="btn btn-primary ml-1" id="btn-solicitar-orcamento">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Solicitar Orçamento</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>


    <!--Basic Modal -->
    <div class="modal fade text-left" id="create-contact" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">

                    <h5 class="modal-title" id="myModalLabel1">Novo Contato | Prospecto</h5>
                    {{-- <button type="button" class="close rounded-pill" data-bs-dismiss="modal"
                    aria-label="Close">
                    <i data-feather="x"></i>
                </button> --}}
                    <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="form" name="form-cad-contato" id="formcreate" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div id="errorform"
                                            class="alert alert-light-danger color-danger alert-dismissible fade show d-none"
                                            role="alert"><i class="bi bi-exclamation-circle"></i>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="row" id="linhaEsconder">
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="first-name-column">Nome</label>
                                                    <input type="text" id="name" class="form-control border-2"
                                                        placeholder="" name="name" selected required>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="cellphone">Telefone:</label>
                                                    <input type="text" id="cellphone" class="form-control border-2"
                                                        name="cellphone" placeholder="" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="city">Cidade</label>
                                                    <input type="text" id="city-column" class="form-control border-2"
                                                        placeholder="" name="city" required>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="email">Email</label>
                                                    <input type="email" id="email" class="form-control border-2"
                                                        name="email" placeholder="" >
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="origin">Origem do contato:</label>
                                                    <div class="input-group">
                                                        <label class="input-group-text"
                                                                for="basicSelect">Campanhas</label>
                                                        <select name="origin" class="form-select" id="basicSelect"
                                                            required>
                                                            @forelse ($campanhas as $campanha )
                                                                <option value="{{$campanha->text}}">{{$campanha->text}}</option>
                                                            @empty
                                                                <option value="Usuario comun">Usuário Comum</option>
                                                            @endforelse
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="responsible_id">Responsável:</label>
                                                    <div class="input-group mb-3">
                                                        <label class="input-group-text"
                                                            for="responsible_id">Usuários</label>
                                                        <select required name="responsible_id" class="form-select"
                                                            id="responsible_id">
                                                            <option selected value="{{ $authUser->name }}">{{ $authUser->name }}</option>
                                                            @foreach ($allUsers as $user)
                                                                <option value="{{ $user->id }}">{{ $user->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="seller">Vendedor:</label>
                                                    <input type="text" name="seller" id="seller" class="form-control border-2" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="responsible_id">Escritório:</label>
                                                    <div class="input-group mb-3">
                                                        <label class="input-group-text"
                                                            for="responsible_id">Unidade:</label>
                                                        <select required name="responsibleOffice" class="form-select" id="responsible_id">
                                                            <option >Escolha:</option>
                                                            <option selected value="Rio Preto">São José do Rio Preto (Matris)</option>
                                                            <option value="Ouroeste">Ouroeste</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn" data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Fechar</span>
                        </button>
                        <button type="submit" class="btn btn-primary ml-1" id="btn-save">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Salvar Contato</span>
                        </button>
                </form>
            </div>
        </div>
    </div>
    </div>

    <script type="text/javascript">

function reloadContacts() {
    $(".card-trello-contact").remove();
    $('#loading-contacts-modal').removeClass('d-none');

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type: "post",
        url: "{{route('comercial.painel.reloadcontacts')}}",
        dataType: "json",
        success: function(res) {
            console.log(res.contacts);
            $('#loading-contacts-modal').addClass('d-none');
            for(var i = 0; i < res.contacts.length; i++){
                $('#list-contact').append("<div id='"+res.contacts[i].id+"' class='card-trello-contact' data_id='"+res.contacts[i].id+"'><span id='card-name-"+res.contacts[i].id+"'>"+ res.contacts[i].name +"</span></div>");
                $("#"+res.contacts[i].id).prepend("<div id='list-tag-"+res.contacts[i].id+"' class='w-100 mb-2'></div>");
                $('#'+res.contacts[i].id).append('<div class="d-flex flex-row mt-2" id="content-info-card-'+res.contacts[i].id+'"></div>');

                if (res.contacts[i].comments.length > 0) {
                    $('#content-info-card-'+res.contacts[i].id).append('<div id="comment-'+res.contacts[i].id+'" class="text-muted mx-1"><span class="fa-fw select-all icon-comment-card fas"></span><span data-id="'+res.contacts[i].comments.length+'" id="comment-number-'+res.contacts[i].id+'">'+res.contacts[i].comments.length+'</span></div>');
                }
                for(var r = 0; r < res.contacts[i].tags.length ; r++){

                    $("#list-tag-"+res.contacts[i].id).append("<span class='badge mx-1 mt-1' id='card-tag-"+res.contacts[i].tags[r].id+"' style='background-color:"+res.contacts[i].tags[r].color+"'>"+res.contacts[i].tags[r].text+"</span>");

                }
            }
        }
    });
}

function reloadBudgetSent(){
    $(".card-trello-budgetsent").remove();
    $('#loading-presented-modal').removeClass('d-none');

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type: "post",
        url: "{{route('comercial.painel.reloadcontacts')}}",
        dataType: "json",
        success: function(res) {
            // console.log(count(res.contacts));
            $('#loading-presented-modal').addClass('d-none');
            for(var i = 0; i < res.budgetSent.length; i++){
                // console.log(res.contacts[i].name);
                // $("#list-items").append("<div id='contact_id' class='card-trello' data_id='" + res.contacts.i.id + "'>" + res.contacts.i.name + "</div>");
                $('#list-presented').append("<div id='"+res.budgetSent[i].id+"' class='card-trello-budgetsent' data_id='"+res.budgetSent[i].id+"'><span id='card-name-"+res.budgetSent[i].id+"'>"+ res.budgetSent[i].name +"</span></div>");
                $("#"+res.budgetSent[i].id).prepend("<div id='list-tag-"+res.budgetSent[i].id+"' class='w-100 mb-2'></div>");
                $('#'+res.budgetSent[i].id).append('<div class="d-flex flex-row mt-2" id="content-info-card-'+res.budgetSent[i].id+'"></div>');

                if (res.budgetSent[i].comments.length > 0) {
                    $('#content-info-card-'+res.budgetSent[i].id).append('<div id="comment-'+res.budgetSent[i].id+'" class="text-muted mx-1"><span class="fa-fw select-all icon-comment-card fas"></span><span data-id="'+res.budgetSent[i].comments.length+'" id="comment-number-'+res.budgetSent[i].id+'">'+res.budgetSent[i].comments.length+'</span></div>');
                }
                // $('#content-info-card-'+res.contacts[i].id).append('<div class="text-muted mx-1">@ 4</div>');


                // console.log(res.contacts[i]);
                for(var r = 0; r < res.budgetSent[i].tags.length ; r++){

                    $("#list-tag-"+res.budgetSent[i].id).append("<span class='badge mx-1 mt-1' id='card-tag-"+res.budgetSent[i].tags[r].id+"' style='background-color:"+res.budgetSent[i].tags[r].color+"'>"+res.budgetSent[i].tags[r].text+"</span>");

                }
            }
        }
    });
}

function reloadRecontact(){
    $(".card-trello-recontact").remove();
    $('#loading-recontact-modal').removeClass('d-none');

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type: "post",
        url: "{{route('comercial.painel.reloadcontacts')}}",
        dataType: "json",
        success: function(res) {
            // console.log(count(res.contacts));
            $('#loading-recontact-modal').addClass('d-none');
            for(var i = 0; i < res.recontact.length; i++){
                // console.log(res.contacts[i].name);
                // $("#list-items").append("<div id='contact_id' class='card-trello' data_id='" + res.contacts.i.id + "'>" + res.contacts.i.name + "</div>");
                $('#list-recontact').append("<div id='"+res.recontact[i].id+"' class='card-trello-recontact' data_id='"+res.recontact[i].id+"'><span id='card-name-"+res.recontact[i].id+"'>"+ res.recontact[i].name +"</span></div>");
                $("#"+res.recontact[i].id).prepend("<div id='list-tag-"+res.recontact[i].id+"' class='w-100 mb-2'></div>");
                $('#'+res.recontact[i].id).append('<div class="d-flex flex-row mt-2" id="content-info-card-'+res.recontact[i].id+'"></div>');

                if (res.recontact[i].comments.length > 0) {
                    $('#content-info-card-'+res.recontact[i].id).append('<div id="comment-'+res.recontact[i].id+'" class="text-muted mx-1"><span class="fa-fw select-all icon-comment-card fas"></span><span data-id="'+res.recontact[i].comments.length+'" id="comment-number-'+res.recontact[i].id+'">'+res.recontact[i].comments.length+'</span></div>');
                }
                // $('#content-info-card-'+res.contacts[i].id).append('<div class="text-muted mx-1">@ 4</div>');

                // console.log(res.contacts[i]);
                for(var r = 0; r < res.recontact[i].tags.length ; r++){

                    $("#list-tag-"+res.recontact[i].id).append("<span class='badge mx-1 mt-1' id='card-tag-"+res.recontact[i].tags[r].id+"' style='background-color:"+res.recontact[i].tags[r].color+"'>"+res.recontact[i].tags[r].text+"</span>");

                }

            }
        }
    });
}

function reloadBudgets() {
    $(".card-trello-budget").remove();
    $('#loading-budgets-modal').removeClass('d-none');

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type: "post",
        url: "{{route('comercial.painel.reloadcontacts')}}",
        dataType: "json",
        success: function(res) {
            // console.log(count(res.contacts));
            $('#loading-budgets-modal').addClass('d-none');
            for(var i = 0; i < res.budgets.length; i++){
                // console.log(res.contacts[i].name);
                // $("#list-items").append("<div id='contact_id' class='card-trello' data_id='" + res.contacts.i.id + "'>" + res.contacts.i.name + "</div>");
                $('#list-budget').append("<div id='"+res.budgets[i].id+"' class='card-trello-budget' data_id='"+res.budgets[i].id+"'><span id='card-name-"+res.budgets[i].id+"'>"+ res.budgets[i].name +"</span></div>");
                $("#"+res.budgets[i].id).prepend("<div id='list-tag-"+res.budgets[i].id+"' class='w-100 mb-2'></div>");
                $('#'+res.budgets[i].id).append('<div class="d-flex flex-row mt-2" id="content-info-card-'+res.budgets[i].id+'"></div>');

                if (res.budgets[i].comments.length > 0) {
                    $('#content-info-card-'+res.budgets[i].id).append('<div id="comment-'+res.budgets[i].id+'" class="text-muted mx-1"><span class="fa-fw select-all icon-comment-card fas"></span><span data-id="'+res.budgets[i].comments.length+'" id="comment-number-'+res.budgets[i].id+'">'+res.budgets[i].comments.length+'</span></div>');
                }
                // $('#content-info-card-'+res.contacts[i].id).append('<div class="text-muted mx-1">@ 4</div>');

                // console.log(res.contacts[i]);
                for(var r = 0; r < res.budgets[i].tags.length ; r++){

                    $("#list-tag-"+res.budgets[i].id).append("<span class='badge mx-1 mt-1' id='card-tag-"+res.budgets[i].tags[r].id+"' style='background-color:"+res.budgets[i].tags[r].color+"'>"+res.budgets[i].tags[r].text+"</span>");

                }
            }
        }
    });
}

function reloadNegotiation() {
    $(".card-trello-negotiation").remove();
    $('#loading-negotiations-modal').removeClass('d-none');

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type: "post",
        url: "{{route('comercial.painel.reloadcontacts')}}",
        dataType: "json",
        success: function(res) {
            // console.log(count(res.contacts));
            $('#loading-negotiations-modal').addClass('d-none');
            for(var i = 0; i < res.negotiations.length; i++){
                // console.log(res.contacts[i].name);
                // $("#list-items").append("<div id='contact_id' class='card-trello' data_id='" + res.contacts.i.id + "'>" + res.contacts.i.name + "</div>");
                $('#list-negotiation').append("<div id='"+res.negotiations[i].id+"' class='card-trello-negotiation' data_id='"+res.negotiations[i].id+"'><span id='card-name-"+res.negotiations[i].id+"'>"+ res.negotiations[i].name +"</span></div>");
                $("#"+res.negotiations[i].id).prepend("<div id='list-tag-"+res.negotiations[i].id+"' class='w-100 mb-2'></div>");
                $('#'+res.negotiations[i].id).append('<div class="d-flex flex-row mt-2" id="content-info-card-'+res.negotiations[i].id+'"></div>');

                if (res.negotiations[i].comments.length > 0) {
                    $('#content-info-card-'+res.negotiations[i].id).append('<div id="comment-'+res.negotiations[i].id+'" class="text-muted mx-1"><span class="fa-fw select-all icon-comment-card fas"></span><span data-id="'+res.negotiations[i].comments.length+'" id="comment-number-'+res.negotiations[i].id+'">'+res.negotiations[i].comments.length+'</span></div>');
                }
                // $('#content-info-card-'+res.contacts[i].id).append('<div class="text-muted mx-1">@ 4</div>');

                // console.log(res.contacts[i]);
                for(var r = 0; r < res.negotiations[i].tags.length ; r++){

                    $("#list-tag-"+res.negotiations[i].id).append("<span class='badge mx-1 mt-1' id='card-tag-"+res.negotiations[i].tags[r].id+"' style='background-color:"+res.negotiations[i].tags[r].color+"'>"+res.negotiations[i].tags[r].text+"</span>");

                }
            }
        }
    });
}

function reloadclosedwork() {
    $(".card-trello-closedwork").remove();
    $('#loading-closedwork-modal').removeClass('d-none');

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type: "post",
        url: "{{route('comercial.painel.reloadcontacts')}}",
        dataType: "json",
        success: function(res) {
            // console.log(count(res.contacts));
            $('#loading-closedwork-modal').addClass('d-none');
            for(var i = 0; i < res.closedwork.length; i++){
                // console.log(res.contacts[i].name);
                // $("#list-items").append("<div id='contact_id' class='card-trello' data_id='" + res.contacts.i.id + "'>" + res.contacts.i.name + "</div>");
                $('#list-closedwork').append("<div id='"+res.closedwork[i].id+"' class='card-trello-closedwork' data_id='"+res.closedwork[i].id+"'><span id='card-name-"+res.closedwork[i].id+"'>"+ res.closedwork[i].name +"</span></div>");
                $("#"+res.closedwork[i].id).prepend("<div id='list-tag-"+res.closedwork[i].id+"' class='w-100 mb-2'></div>");
                $('#'+res.closedwork[i].id).append('<div class="d-flex flex-row mt-2" id="content-info-card-'+res.closedwork[i].id+'"></div>');

                if (res.closedwork[i].comments.length > 0) {
                    $('#content-info-card-'+res.closedwork[i].id).append('<div id="comment-'+res.closedwork[i].id+'" class="text-muted mx-1"><span class="fa-fw select-all icon-comment-card fas"></span><span data-id="'+res.closedwork[i].comments.length+'" id="comment-number-'+res.closedwork[i].id+'">'+res.closedwork[i].comments.length+'</span></div>');
                }
                // $('#content-info-card-'+res.contacts[i].id).append('<div class="text-muted mx-1">@ 4</div>');

                // console.log(res.contacts[i]);
                for(var r = 0; r < res.closedwork[i].tags.length ; r++){

                    $("#list-tag-"+res.closedwork[i].id).append("<span class='badge mx-1 mt-1' id='card-tag-"+res.closedwork[i].tags[r].id+"' style='background-color:"+res.closedwork[i].tags[r].color+"'>"+res.closedwork[i].tags[r].text+"</span>");

                }
            }
        }
    });
}

function reloadSaleCompleted() {
    $(".card-trello-salecompleted").remove();
    $('#loading-SaleCompleted-modal').removeClass('d-none');

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type: "post",
        url: "{{route('comercial.painel.reloadcontacts')}}",
        dataType: "json",
        success: function(res) {
            // console.log(count(res.contacts));
            $('#loading-SaleCompleted-modal').addClass('d-none');
            for(var i = 0; i < res.salecompleted.length; i++){
                // console.log(res.contacts[i].name);
                // $("#list-items").append("<div id='contact_id' class='card-trello' data_id='" + res.contacts.i.id + "'>" + res.contacts.i.name + "</div>");
                $('#list-SaleCompleted').append("<div id='"+res.salecompleted[i].id+"' class='card-trello-salecompleted' data_id='"+res.salecompleted[i].id+"'><span id='card-name-"+res.salecompleted[i].id+"'>"+ res.salecompleted[i].name +"</span></div>");
                $("#"+res.salecompleted[i].id).prepend("<div id='list-tag-"+res.salecompleted[i].id+"' class='w-100 mb-2'></div>");
                $('#'+res.salecompleted[i].id).append('<div class="d-flex flex-row mt-2" id="content-info-card-'+res.salecompleted[i].id+'"></div>');

                if (res.salecompleted[i].comments.length > 0) {
                    $('#content-info-card-'+res.salecompleted[i].id).append('<div id="comment-'+res.salecompleted[i].id+'" class="text-muted mx-1"><span class="fa-fw select-all icon-comment-card fas"></span><span data-id="'+res.salecompleted[i].comments.length+'" id="comment-number-'+res.salecompleted[i].id+'">'+res.salecompleted[i].comments.length+'</span></div>');
                }
                // $('#content-info-card-'+res.contacts[i].id).append('<div class="text-muted mx-1">@ 4</div>');

                // console.log(res.contacts[i]);
                for(var r = 0; r < res.salecompleted[i].tags.length ; r++){

                    $("#list-tag-"+res.salecompleted[i].id).append("<span class='badge mx-1 mt-1' id='card-tag-"+res.salecompleted[i].tags[r].id+"' style='background-color:"+res.salecompleted[i].tags[r].color+"'>"+res.salecompleted[i].tags[r].text+"</span>");

                }
            }
        }
    });
}

function reloadNotifications() {

    $('#content-view-notifications').html('<span class="align-middle w-100 d-flex justify-content-center" id="spinner-notifications"><img src="{{asset("vendors/svg-loaders/oval.svg")}}" class="me-4 align-middle text-center my-5" style="width: 3rem" alt="audio"></span>');

    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        var dataIdNot = $("#dropdown-notificacoes").attr('data-id');

        $.ajax({
            type: "post",
            url: "{{ route('notification.reload') }}",
            data: {
                dataIdNot: dataIdNot
            },
            dataType: "json",
            success: function(res) {
                $('#spinner-notifications').addClass('d-none');
                console.log(res);
                $('#content-view-notifications').html(res.html);
            },
        });
}

function openCard(dataId){

    $('#content-view-contact').html('<span class="align-middle w-100 d-flex justify-content-center" id="spinner-contacts"><img src="{{asset("vendors/svg-loaders/oval.svg")}}" class="me-4 align-middle text-center my-5" style="width: 5rem" alt="audio"></span>');

    $('#view-contact').modal('show');
    console.log(dataId);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type: "post",
        url: "{{ route('comercial.contato.datamodal') }}",
        data: {
            items: dataId
        },
        dataType: "json",
        success: function(res) {
            console.log(res.checklistItems);
            $('#spinner-contacts').addClass('d-none');
            console.log(res);
            $('#content-view-contact').html(res.html);
        },
    });
}

function openEditContact(dataId) {
    // $('#content-view-edit-contact').html('<span class="align-middle w-100 d-flex justify-content-center" id="spinner-contacts"><img src="{{asset("vendors/svg-loaders/oval.svg")}}" class="me-4 align-middle text-center my-5" style="width: 5rem" alt="audio"></span>');

    $('#view-contact').modal('hide');
    $('#view-contact-edit').modal('show');
    // console.log(dataId);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type: "post",
        url: "{{ route('comercial.contato.edit') }}",
        data: {
            items: dataId
        },
        dataType: "json",
        success: function(res) {
            $('#spinner-contacts').addClass('d-none');
            console.log(res);
            $('#content-view-edit-contact').html(res.html);
        },
    });
}

$(document).ready(function(){

    //carregas todas as listas
    reloadContacts();
    reloadBudgets();
    reloadBudgetSent();
    reloadRecontact();
    reloadNegotiation();
    reloadclosedwork();
    reloadSaleCompleted();
    reloadNotifications();


    //função para abrir a modal de contatos geral.
    $(document).on('click', '.card-trello-contact, .card-trello-budget, .card-trello-budgetsent, .card-trello-recontact, .card-trello-negotiation, .card-trello-closedwork, .card-trello-salecompleted, .card-trello-contacts', function(){
        //linha para personalizar o loading
        dataId = $(this).attr('id');

        //caso venha a abrir pela busca
        closeSearch();

        openCard(dataId);
    });


    $(document).on('click', '#editar_contato', function() {
        dataId = $(this).attr('data-id');

        openEditContact(dataId);
    });

    //envia orçamento
    function sendBudget(){
        $("#btn-solicitar-orcamento").html('Solicitando...');
        $("#btn-solicitar-orcamento").attr("disabled", true);
        $('#spinner-orcamento').removeClass('d-none');

        // data = $("#form-solicitar-orcamento").serialize();
        var formdata = new FormData($("form[name='form-solicitar-orcamento']")[0]);

        // console.log(formdata);

        $.ajax({
            type: "POST",
            url: "{{ route('comercial.contato.budget.new') }}",
            data: formdata,
            processData: false,
            contentType: false,
            success: function(res) {
                console.log(res.request);
                $('#move-orcamento').modal('hide');
                if (res.success) {

                    Toastify({
                        text: "Orçamento solicitado com sucesso",
                        duration: 3000,
                        close: true,
                        backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
                    }).showToast();

                    $("#form-solicitar-orcamento").trigger("reset");
                    $("#btn-solicitar-orcamento").html('Salvar Contato');
                    $("#btn-solicitar-orcamento").attr("disabled", false);
                }

                reloadBudgets();
                reloadContacts();
            }
        });
    }

    $('#btn-solicitar-orcamento').click(function(e) {
        e.preventDefault();

        sendBudget();

    });

    // função para salvar um novo contato em banco
    $('form[name="form-cad-contato"]').submit(function(event) {
        event.preventDefault();
        $("#btn-save").html('Salvando...');
        $("#btn-save").attr("disabled", true);

        $.ajax({
            type: "POST",
            url: "{{ route('comercial.contato.store') }}",
            data: $(this).serialize(),
            dataType: "json",
            success: function(res) {
                console.log(res);
                //  $('#errorform').removeClass('d-none');
                $("#list-contact").append($("<div id='"+res.contact.id+"' class='card-trello-contact' data_id='" + res.contact.id + "'>" + res.contact.name + "</div>"));
                $("#"+res.contact.id).prepend("<div id='list-tag-"+res.contact.id+"' class='w-100 mb-2'></div>");
                $('#create-contact').modal('hide');
                $("#formcreate").trigger("reset");
                $("#btn-save").html('Salvar Contato');
                $("#btn-save").attr("disabled", false);

                Toastify({
                    text: "Contato Salvo com sucesso",
                    duration: 3000,
                    close: true,
                    backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
                }).showToast();
            }
        });
    });

    // função para salvar um novo contato em banco
    // $('form[name="form-edit-contato"]').submit(function(event) {
    $(document).on('submit','form[name="form-edit-contato"]',function(event) {
        event.preventDefault();
        $("#btn-save").html('Salvando Edições...');
        $("#btn-save").attr("disabled", true);

        $.ajax({
            type: "POST",
            url: "{{ route('comercial.contato.update') }}",
            data: $(this).serialize(),
            dataType: "json",
            success: function(res) {
                console.log(res);
                $("#formEditContact").trigger("reset");
                $("#btn-save").html('Salvar Contato');
                $("#btn-save").attr("disabled", false);
                var name_card_id = '#card-name-'+res.contact_id;
                $(name_card_id).html(res.name);
                openCard(res.contact_id);

                // console.log(name_card_id);

                $('#view-contact-edit').modal('hide');
                Toastify({
                    text: res.message,
                    duration: 3000,
                    close: true,
                    backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
                }).showToast();
            }
        });
    });

    // funcção para mover o card de lista neste caso para recontact
    $(document).on('click', '#btn-move-recontact', function(){

        var destination = 'recontact';

        $("#btn-move-recontact").html('Movendo para recontactar...');
        $("#btn-move-recontact").attr("disabled", true);
        $('#spinner-orcamento').removeClass('d-none');

        console.log("data-id - "+ dataId);


        $.ajax({
            type: "POST",
            url: "{{ route('comercial.contato.moveCard') }}",
            data: {
                contact_id: dataId,
                destination: destination
            },
            dataType: "json",
            success: function(res) {
                console.log(res.success);
                $('#view-contact').modal('hide');
                if (res.success) {
                    Toastify({
                        text: "Movido com sucesso",
                        duration: 3000,
                        close: true,
                        backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
                    }).showToast();
                }

                // reloadBudgets();
                // reloadContacts();
                reloadBudgetSent();
                reloadRecontact();
            }
        });

    });

    // btn-mover-apresentado
    $(document).on('click', '#btn-mover-apresentado', function(){

        $("#btn-move-recontact").html('Movendo para Apresentado...');
        $("#btn-move-recontact").attr("disabled", true);
        $('#spinner-orcamento').removeClass('d-none');

        console.log("data-id - "+ dataId);


        $.ajax({
            type: "POST",
            url: "{{ route('comercial.contato.moveCard') }}",
            data: {
                contact_id: dataId,
                destination: 'budgetSent'
            },
            dataType: "json",
            success: function(res) {
                console.log(res.success);
                $('#view-contact').modal('hide');
                if (res.success) {
                    Toastify({
                        text: "Movido com sucesso",
                        duration: 3000,
                        close: true,
                        backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
                    }).showToast();
                }

                reloadBudgets();
                reloadContacts();
                reloadBudgetSent();
                reloadRecontact();
            }
        });

    });

    // btn-mover-negociação
    $(document).on('click', '#btn-mover-negociacao', function(){

        $("#btn-mover-negociacao").html('Movendo para Apresentado...');
        $("#btn-mover-negociacao").attr("disabled", true);
        $('#spinner-orcamento').removeClass('d-none');

        console.log("data-id - "+ dataId);

        $.ajax({
            type: "POST",
            url: "{{ route('comercial.contato.moveCard') }}",
            data: {
                contact_id: dataId,
                destination: 'negotiation'
            },
            dataType: "json",
            success: function(res) {
                console.log(res.success);
                $('#view-contact').modal('hide');
                if (res.success) {
                    Toastify({
                        text: "Movido com sucesso",
                        duration: 3000,
                        close: true,
                        backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
                    }).showToast();
                }

                reloadNegotiation();
                reloadBudgetSent();
                reloadRecontact();
            }
        });

    });

    // btn-mover-closedwork
    $(document).on('click', '#btn-mover-closedwork', function(){

        $("#btn-mover-negociacao").html('Movendo para Obra Fechada...');
        $("#btn-mover-negociacao").attr("disabled", true);
        $('#spinner-orcamento').removeClass('d-none');

        // console.log("data-id - "+ dataId);

        $.ajax({
            type: "POST",
            url: "{{ route('comercial.contato.moveCard') }}",
            data: {
                contact_id: dataId,
                destination: 'closedwork'
            },
            dataType: "json",
            success: function(res) {
                console.log(res.success);
                $('#view-contact').modal('hide');
                if (res.success) {
                    Toastify({
                        text: "Movido com sucesso",
                        duration: 3000,
                        close: true,
                        backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
                    }).showToast();
                }

                reloadNegotiation();
                reloadBudgetSent();
                reloadRecontact();
                reloadclosedwork();
            }
        });

    });

    // btn-mover-fechado
    $(document).on('click', '#btn-mover-fechado', function(){
        $("#btn-mover-fechado").html('Movendo para fechado');
        $("#btn-mover-fechado").attr("disabled", true);
        $('#spinner-orcamento').removeClass('d-none');

        console.log("data-id - "+ dataId);

        $.ajax({
            type: "POST",
            url: "{{ route('comercial.contato.moveCard') }}",
            data: {
                contact_id: dataId,
                destination: 'salecompleted'
            },
            dataType: "json",
            success: function(res) {
                console.log(res.success);
                $('#view-contact').modal('hide');
                if (res.success) {
                    Toastify({
                        text: "Movido com sucesso",
                        duration: 3000,
                        close: true,
                        backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
                    }).showToast();
                }

                reloadNegotiation();
                reloadBudgetSent();
                reloadRecontact();
                reloadSaleCompleted();
            }
        });

    });

    $('#conta-energia-btn').click(function() {
        console.log('conta-energia');
        $('#conta-energia').removeClass('d-none');
        $('#media-kwh').addClass('d-none');
        $('#media-valor').addClass('d-none');

    });

    $('#media-kwh-btn').click(function() {
        console.log('media kwh');

        $('#media-kwh').removeClass('d-none');
        $('#conta-energia').addClass('d-none');
        $('#media-valor').addClass('d-none');

    });

    $('#media-valor-btn').click(function() {
        console.log('media valor');
        $('#media-kwh').addClass('d-none');
        $('#conta-energia').addClass('d-none');
        $('#media-valor').removeClass('d-none');
    });

    $('#btnReloadAll').click(function(){

        reloadContacts();
        reloadBudgets();
        reloadBudgetSent();
        reloadRecontact();
        reloadNegotiation();
        reloadSaleCompleted();

    });

    $('#btnReloadContact').click(function(){
        reloadContacts();
    });

    $('#btnReloadclosedwork').click(function(){
        reloadclosedwork();
    });

    $('#btnReloadrequestBudget').click(function(){
        reloadBudgets();
    });

    $('#btnReloadBudgetSent').click(function(){
        reloadBudgetSent();
    });

    $('#btnReloadRecontact').click(function(){
        reloadRecontact();
    });

    $('#btnReloadNegotiation').click(function(){
        reloadNegotiation();
    });

    $('#btnReloadSaleCompleted').click(function(){
        reloadSaleCompleted();
    });

    //função para adicionar um comentario
    $(document).on('click', '#btn-send-comment', function(){
        // btn-send-comment

        var comment = $('#input_comment').val();
        var contactId = $('#contactId').val();
        var userId = $('#userId').val();

        // console.log(comment);
        // console.log(contactId);
        // console.log(userId);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "post",
            url: "{{ route('comercial.contato.comment.store') }}",
            data: {
                comment:comment,
                contactId:contactId,
                userId:userId
            },
            dataType: "json",
            success: function(res) {
                console.log(res.comment);
                if(res.success){
                    $("#content-comments").prepend($("<div class='d-flex my-3' id='comment_id_"+res.comment.id+"'>"));

                    $("#comment_id_"+res.comment.id).append($("<div class='p-2 text-right' id='div-avatar'>"));
                    $('#div-avatar').append($("<div class='avatar bg-warning me-3' id='div-avatar-content'>"));
                    $('#div-avatar-content').append($("<span class='avatar-content'>CA</span><span class='avatar-status bg-success'></span>"));

                    $("#comment_id_"+res.comment.id).append($("<div class='p-2 flex-grow-1' id='div-input'></div>"));
                    $("#div-input").append($("<label for='helpInputTop'>{{$authUser->name}}</label>  <small class='text-muted'>Agora mesmo  <span class='fa-fw select-all fas'></span></i></small>"));
                    $("#div-input").append($("<div class='form-control-static py-2 px-2 border bg-white' id='helpInputTop'>"+res.comment.message+"</div>"));

                    $("#comment_id_"+res.comment.id).append($('<div class="p-2 d-flex align-items-center"><button class="btn btn-transparent mt-1" id="btn_delete_comment" data-id="'+res.comment.id+'"><span class="fa-fw select-all fas fa-2x"></span></button></div>'));

                    // $('#input_comment').html('');
                    $("textarea[name=comment]").val('');

                    if ($("#comment-"+res.comment.contactId).length ) {
                        var qtd_comment_exist = $("#comment-number-"+res.comment.contactId).attr('data-id');
                        // console.log(qtd_comment_exist);
                        var qtd_comment_new = parseInt(qtd_comment_exist)+parseInt(1);
                        $("#comment-number-"+res.comment.contactId).html(qtd_comment_new);
                    }else{
                        $('#content-info-card-'+res.comment.contactId).append('<div id="comment-'+res.comment.contactId+'" class="text-muted mx-1"><span class="fa-fw select-all icon-comment-card fas"></span><span data-id="1" id="comment-number-'+res.comment.contactId+'">1</span></div>');
                    }

                }else{
                    Toastify({
                        text: "Erro ao salvar o comentario",
                        duration: 3000,
                        close: true,
                        backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
                    }).showToast();
                }
            },
        });


    });

    // função para deletar comentario
    $(document).on('click', '#btn_delete_comment', function(){

        var commentId = $(this).attr("data-id");

        $(this).html('<span class="spinner-border" role="status" aria-hidden="true"></span>');

        // console.log($contactId);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "post",
            url: "{{ route('comercial.contato.comment.destroy') }}",
            data: {
                commentId:commentId,
            },
            dataType: "json",
            success: function(res) {
                if(res.success){
                    console.log(res);
                    // $('#comment_id_'+commentId).remove();
                    $('#comment_id_'+commentId).slideUp("slow", function() { $('#comment_id_'+commentId).remove();});
                    // console.log(res.commentId);
                    console.log("deletado com sucesso");

                }else{
                    Toastify({
                        text: "Erro ao deletar o comentario",
                        duration: 3000,
                        close: true,
                        backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
                    }).showToast();

                }
            }
        });


    });

    // função para adicionar tag
    $(document).on('click', '.btn-add-tag', function() {

        var valor = $(this).attr('value');
        var contact_id = $(this).attr('data-id');
        console.log(valor);
        console.log(contact_id);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "post",
            url: "{{ route('comercial.contato.tag.store') }}",
            data: {
                contact_id:contact_id,
                valor:valor
            },
            dataType: "json",
            success: function(res) {
                console.log(res.tag);
                if(res.success){
                    $('#content-tags').append($("<span class='badge mt-1 label-tag' style='background-color:"+res.tag.color+"'> "+res.tag.text+" <button class='btn py-0 px-1 text-white btn-delete-tag' id='btn-delete-tag' data-id="+res.tag.id+">x</button></span>"));
                    $('#list-tag-'+res.tag.contact_id).append($('<span class="badge mx-1 mt-1" style="background-color:'+res.tag.color+'">'+res.tag.text+'</span>'));
                }else{
                    Toastify({
                        text: res.message,
                        duration: 3000,
                        close: true,
                        backgroundColor: "linear-gradient(to right, #de1d2d, #8c0712)",
                    }).showToast();

                }
            }
        });

    });

    // função para delete tag
    $(document).on('click', '#bnt-delete-tag', function(){
            var tagId = $(this).attr('data-id');
            // console.log(tagId);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "post",
                url: "{{ route('comercial.contato.tag.destroy') }}",
                data: {
                    tagId:tagId
                },
                dataType: "json",
                success: function(res) {
                    // console.log(res.success);
                    if(res.success){
                        $('#label-tag-'+res.tagId).remove();
                        $('#card-tag-'+res.tagId).remove();
                    }else{
                        Toastify({
                            text: res.message,
                            duration: 3000,
                            close: true,
                            backgroundColor: "linear-gradient(to right, #de1d2d, #8c0712)",
                        }).showToast();
                    }
                }
            });

        });

        $(document).on('click', '.btn-include-people', function() {
        var userId = $(this).attr('data-id');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "post",
                url: "{{ route('comercial.contato.targetpeople.store') }}",
                data: {
                    userId:userId,
                    dataId:dataId
                },
                dataType: "json",
                success: function(res) {
                    if(res.success){
                        $('#content-target').append($('<div class="avatar bg-warning"><span class="avatar-content">'+res.letters+'</span></div>'));
                        Toastify({
                            text: res.message,
                            duration: 3000,
                            close: true,
                            backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
                        }).showToast();

                    }else{
                        Toastify({
                            text: res.message,
                            duration: 3000,
                            close: true,
                            backgroundColor: "linear-gradient(to right, #de1d2d, #8c0712)",
                        }).showToast();
                    }
                }
            });



        });

        $("#label-tag").hover(function(){
            $('#btn-delete-tag').removeClass('d-none');
        });

        $(document).on('click', '#btn-fechar-modal-contato', function(){
            // view-contact
            $('#view-contact').modal('hide');
        });

        $(document).on('click', '.btn-notifications', function(event) {

            event.preventDefault();
            dataId = $(this).attr('data-id');
            notifId = $(this).attr('id');
            var valorAtualBadge = $('#badge_notif').html();

            //atualiza o visor de badge
            if(valorAtualBadge > 1){
                $('#badge_notif').html(valorAtualBadge - 1);
            }else{
                $('#badge_notif').remove();
            }

            //chama a função que renderiza o card na tela
            openCard(dataId);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "post",
                url: "{{ route('notification.read') }}",
                data: {
                    notifId: notifId
                },
                dataType: "json",
                success: function(res) {
                    if(res.success){
                        console.log("atualizado o read com sucesso");
                    }else{
                        console.log("erro ao atualizar");
                    }
                },
            });
        });

        $('#dropdown-notificacoes').on('show.bs.dropdown', function () {
            // console.log("not foi mostrado");
            reloadNotifications();


        });


        let keyupTimer;

        $("#search").keyup(function () {

            clearTimeout(keyupTimer);
            $("#search-content").removeClass('d-none');
            // $("#search-content").html("Buscando... "+  $(this).val());
            $("#search-content_txt").html('Buscando...');
            var contactSearch = $(this).val();
            $(".card-trello-contacts").remove();

            keyupTimer = setTimeout(function () {

                $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            if((contactSearch != "" )&&(contactSearch.length >= 3)){
                $("#search-content_txt").html('<div class="my-2" id="search_buscando"><span class="spinner-border mx-2" role="status" aria-hidden="true"></span> Buscando: '+contactSearch+'</div>');
                $.ajax({
                    type: "post",
                    url: "{{ route('comercial.search') }}",
                    data: {
                        contactSearch: contactSearch
                    },
                    dataType: "json",
                    success: function(res) {
                        if(res.success){
                            $("#search_buscando").addClass('d-none');
                            console.log(res.contacts);
                            if(res.contacts.length > 0){
                                $("#search-content_txt").html('<p>Total de '+res.contacts.length+' resultado(s).</p>');
                                for(var i = 0; i < res.contacts.length; i++){
                                    // console.log(res.contacts[i].name);
                                    // $("#list-items").append("<div id='contact_id' class='card-trello' data_id='" + res.contacts.i.id + "'>" + res.contacts.i.name + "</div>");
                                    $('#search-content').append("<div id='"+res.contacts[i].id+"' class='card-trello-contacts' data_id='"+res.contacts[i].id+"'>"+ res.contacts[i].name +"</div>");
                                    $("#"+res.contacts[i].id).prepend("<div id='list-tag-"+res.contacts[i].id+"' class='w-100 mb-2'></div>");
                                    $('#'+res.contacts[i].id).append('<div class="d-flex flex-row mt-2" id="content-info-card-'+res.contacts[i].id+'"></div>');
                                    $('#content-info-card-'+res.contacts[i].id).append('<div class="text-muted mx-1"><span class="fa-fw select-all icon-comment-card fas"></span>'+res.contacts[i].comments.length+'</div>');
                                    $('#content-info-card-'+res.contacts[i].id).append('<div class="text-muted mx-1">@ 4</div>');


                                    // console.log(res.contacts[i]);
                                    for(var r = 0; r < res.contacts[i].tags.length ; r++){

                                        $("#list-tag-"+res.contacts[i].id).append("<span class='badge mx-1 mt-1' id='card-tag-"+res.contacts[i].tags[r].id+"' style='background-color:"+res.contacts[i].tags[r].color+"'>"+res.contacts[i].tags[r].text+"</span>");

                                    }
                                }
                            }else{
                                $(".card-trello-contacts").remove();
                                $("#search-content_txt").html('<p> Não foi encontrado nenhum resultado com este termo "'+contactSearch+'" </p>');
                            }
                        }else{
                            console.log("erro ao buscar");
                        }
                    },
                });
            }else{
                $(".card-trello-contacts").remove();
                $("#search-content_txt").html("<p>Digite no mínimo 3 letras para fazer a busca</p>");
            }

            }, 300);

        });

        function closeSearch(){
            $("#search-content").addClass('d-none');
            $("#search").val("");
            $(".card-trello-contacts").remove();
        }

        $("#btn_close_search").click(function(){
            closeSearch();
        });

        document.querySelector('body').addEventListener('keydown', function(event) {
            // console.info( event.keyCode );
            var tecla = event.keyCode;
            if(tecla == 27) {
                closeSearch();
            }
        });


        function uploadFilesContact(type){

            $('#content'+type).html('<div class="spinner-border text-primary" role="status"><span class="visually-hidden">Loading...</span></div> Carregando...');
            var formName = "formularioda"+type;
            var formdata = new FormData($("form[name='"+formName+"']")[0]);
            $("#"+type).addClass('d-none');

            $.ajax({
                    type: "POST",
                    url: "{{ route('comercial.contato.uploadFilesContact') }}",
                    data: formdata,
                    processData: false,
                    contentType: false,
                    success: function(res) {
                        console.log(res);
                        $('#content'+type).html('<a href="{{env("APP_URL")}}/storage/'+res.uploadFiles.path+'" class="btn btn-primary btn-sm px-3" download="'+type+'.pdf">'+type+'</a>');

                        if (res.success) {
                            Toastify({
                                text: res.message,
                                duration: 3000,
                                close: true,
                                backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
                            }).showToast();
                        }else{
                            console.log(res.message);
                        }

                    }
                });

        }

        $(document).on('change','#cnh', function(){
            uploadFilesContact('cnh');
        });

        $(document).on('change', "#holerite", function(){
            uploadFilesContact('holerite');
        });

        $(document).on('change', "#padrao", function(){
            uploadFilesContact('padrao');
        });

        $(document).on('change', '#contageradora', function(){
            uploadFilesContact('contageradora');
        });

        $(document).on('change', '#others', function(){
            uploadFilesContact('others');
        });


    });


    </script>

</x-app-layout>
