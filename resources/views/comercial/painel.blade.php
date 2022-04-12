<x-app-layout>

    <x-slot name="header">
    </x-slot>
    @section('stylePersonalizado')
        <link rel="stylesheet" href="{{ asset('css/pages/board.css') }}">
        <link rel="stylesheet" href="{{ asset('vendors/toastify/toastify.css') }}">

        <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
        <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet">

        <meta name="csrf-token" content="{{ csrf_token() }}" />
    @endsection
    @section('scriptsPersonalizado')
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

        <script src="{{ asset('vendors/toastify/toastify.js') }}"></script>
    @endsection
    <section class="section">

        <section class="lists-container">

            <div class="list">

                <h3 class="list-title">Contato / Lead
                    <a href="" class="btn btn-sm btn-primary mx-3" data-bs-toggle="modal" data-bs-target="#create-contact"> Novo </a>
                    <button class="btn btn-sm btn-warning" id="btnReloadContact">RL</button>
                </h3>

                {{-- Contatos --}}
                <div class="list-items" id="list-contact">

                    <div id='1' class='card-trello' data_id=''>
                        <div id="" class="badge w-100 mb-2">
                            <span class="badge bg-warning">Solicitar orçamento</span>
                            <span class="badge bg-primary">Caique</span>
                            <span class="badge bg-success">Lead</span>
                        </div>
                        Nome Teste 00
                    </div>

                    <div class="text-center my-5" id="loading-contacts-modal">
                        <img src="{{ asset('vendors/svg-loaders/audio.svg') }}" class="me-4"
                            style="width: 3rem" alt="audio">
                    </div>
                    {{-- @foreach ($contacts as $contact)
                        <div class="card-trello" id="contact_id" data-id="{{$contact->id}}">
                            {{$contact->name}}
                        </div>
                    @endforeach --}}
                </div>

                <button class="add-card-btn btn" data-bs-toggle="modal" data-bs-target="#create-contact">Add a
                    card</button>

            </div>

            {{-- Solicitado Orçamento --}}
            <div class="list">

                <h3 class="list-title">Orçamento Solicitado</h3>

                <div class="list-items" id="list-budget">
                    <div class="text-center my-5" id="loading-budgets-modal">
                        <img src="{{ asset('vendors/svg-loaders/audio.svg') }}" class="me-4"
                            style="width: 3rem" alt="audio">
                    </div>
                </div>
            </div>

            {{-- Apresentado --}}
            <div class="list">

                <h3 class="list-title">Apresentado</h3>

                <div class="list-items" id="list-presented">
                    <div class="text-center my-5" id="loading-presented-modal">
                        <img src="{{ asset('vendors/svg-loaders/audio.svg') }}" class="me-4"
                            style="width: 3rem" alt="audio">
                    </div>
                </div>
            </div>

            {{-- Recontactar --}}
            <div class="list">

                <h3 class="list-title">Recontactar</h3>

                <div class="list-items" id="list-recontact">
                    <div class="text-center my-5" id="loading-recontact-modal">
                        <img src="{{ asset('vendors/svg-loaders/audio.svg') }}" class="me-4"
                            style="width: 3rem" alt="audio">
                    </div>
                </div>
            </div>

        </section>
    </section>
    <!--Modal view contact -->
    <div class="modal fade text-left rounded" id="view-contact" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
        aria-hidden="true">
        <div class="modal-dialog rounded modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body rounded bg-light" id="content-view-contact">

                </div>
            </div>
        </div>
    </div>

{{-- Teste de retorno --}}
{{-- <form action="" method="post"></form> --}}
{{-- fim Teste de retorno --}}

    <!--Modal move-orcamento -->
    <div class="modal fade text-left" id="move-orcamento" tabindex="-1" role="dialog" aria-labelledby="move-orcamento"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content">

                <form method="post" id="form-solicitar-orcamento" name="form-solicitar-orcamento"
                    enctype="multipart/form-data">
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
                                        name="options-outlined" id="conta-energia-btn" autocomplete="off" checked>
                                    <label class="btn btn-outline-success" for="conta-energia-btn">Conta de
                                        Energia</label>

                                    <input type="radio" class="btn-check" value="media-kwh" name="options-outlined"
                                        id="media-kwh-btn" autocomplete="off">
                                    <label class="btn btn-outline-success" for="media-kwh-btn">Média kW/h</label>

                                    <input type="radio" class="btn-check" value="media-valor"
                                        name="options-outlined" id="media-valor-btn" autocomplete="off">
                                    <label class="btn btn-outline-success" for="media-valor-btn">Média R$</label>

                                </div>
                                <div class="form-group d-none" id="conta-energia">

                                    <div class="row">
                                        <!-- File uploader with multiple files upload -->
                                        <p class="mt-2">Faça upload da conta do cliente.</p>
                                        <input type="file" name="file-input-conta" id="file-input-conta"
                                            class="multiple-files-filepond" multiple>
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
                    <input value="" type="hidden" name="contactId">

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
                </form>
            </div>
        </div>
    </div>


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
                                            <div class="col-md-12 col-12">
                                                <div class="form-group">
                                                    <label for="first-name-column">Nome</label>
                                                    <input type="text" id="name" class="form-control border-2"
                                                        placeholder="" name="name" selected required>
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
                                                    <label for="cellphone">Telefone:</label>
                                                    <input type="text" id="cellphone" class="form-control border-2"
                                                        name="cellphone" placeholder="" required>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-12">
                                                <div class="form-group">
                                                    <label for="email">Email</label>
                                                    <input type="email" id="email" class="form-control border-2"
                                                        name="email" placeholder="" >
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="origin">Origem do contato:</label>
                                                    <select name="origin" class="form-select" id="basicSelect"
                                                        required>
                                                        <option value="facebook Ads">Facebook / Instagram</option>
                                                        <option value="google">Google</option>
                                                        <option value="Indicação Pessoal" selected>Indicação Pessoal
                                                        </option>
                                                        <option value="Visita Escritório">Visita Escritório</option>
                                                        <option value="Parceria Terceiros">Parceria / terceiros</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="responsible_id">Responsável:</label>
                                                    <div class="input-group mb-3">
                                                        <label class="input-group-text"
                                                            for="responsible_id">Usuários</label>
                                                        <select required name="responsible_id" class="form-select"
                                                            id="responsible_id">]
                                                            <option selected>Escolha:</option>
                                                            @foreach ($allUsers as $user)
                                                                <option value="{{ $user->id }}">{{ $user->name }}
                                                                </option>
                                                            @endforeach
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

    <script>

        function reloadContacts() {
            $(".card-trello").remove();
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
                    // console.log(count(res.contacts));
                    $('#loading-contacts-modal').addClass('d-none');
                    for(var i = 0; i < res.contacts.length; i++){
                        // console.log(res.contacts[i].name);
                        // $("#list-items").append("<div id='contact_id' class='card-trello' data_id='" + res.contacts.i.id + "'>" + res.contacts.i.name + "</div>");
                        $('#list-contact').append("<div id='"+res.contacts[i].id+"' class='card-trello' data_id='"+res.contacts[i].id+"'>"+ res.contacts[i].name +"</div>");
                    }
                }
            });
        }

        function reloadBudgetSent(){
            $(".card-trello").remove();
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
                        $('#list-presented').append("<div id='"+res.budgetSent[i].id+"' class='card-trello' data_id='"+res.budgetSent[i].id+"'>"+ res.budgetSent[i].name +"</div>");
                    }
                }
            });
        }

        function reloadRecontact(){
            $(".card-trello").remove();
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
                        $('#list-recontact').append("<div id='"+res.recontact[i].id+"' class='card-trello' data_id='"+res.recontact[i].id+"'>"+ res.recontact[i].name +"</div>");
                    }
                }
            });
        }


        function reloadBudgets() {
            $(".card-trello").remove();
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
                    // console.log(count(res.contacts));
                    $('#loading-budgets-modal').addClass('d-none');
                    for(var i = 0; i < res.budgets.length; i++){
                        // console.log(res.contacts[i].name);
                        // $("#list-items").append("<div id='contact_id' class='card-trello' data_id='" + res.contacts.i.id + "'>" + res.contacts.i.name + "</div>");
                        $('#list-budget').append("<div id='"+res.budgets[i].id+"' class='card-trello' data_id='"+res.budgets[i].id+"'>"+ res.budgets[i].name +"</div>");
                    }
                }
            });
        }


        $(document).ready(function(){

            reloadContacts();
            reloadBudgets();
            reloadBudgetSent();
            reloadRecontact();

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
                        $(".list-items").append($("<div id='"+res.contact.id+"' class='card-trello' data_id='" + res.contact.id + "'>" + res.contact.name + "</div>"));
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

            //função para abrir a modal de contatos geral.
            $(document).on('click', '.card-trello', function(){

                //linha para personalizar o loading
                $('#content-view-contact').html('<span class="align-middle w-100 d-flex justify-content-center" id="spinner-contacts"><img src="{{asset("vendors/svg-loaders/oval.svg")}}" class="me-4 align-middle text-center my-5" style="width: 5rem" alt="audio"></span>');

                dataId = $(this).attr('id');
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
                        // console.log(res.budgetsContact);
                        $('#spinner-contacts').addClass('d-none');
                        // console.log(res);
                        $('#content-view-contact').html(res.html);
                    },
                });
            });

            // funcção para soliciar um orçamento
            $('#btn-solicitar-orcamento').click(function(e) {
                e.preventDefault();

                $("#btn-solicitar-orcamento").html('Solicitando...');
                $("#btn-solicitar-orcamento").attr("disabled", true);
                $('#spinner-orcamento').removeClass('d-none');

                var roof_type = $('#tipoTelhado').val();
                var option = $('input[name="options-outlined"]:checked').val();

                if (option == "media-kwh") {

                    var mediaKwh = $('#mediakwh').val();
                    var conta = null;
                    var mediaValor = null;

                }
                if (option == "media-valor") {

                    var mediaKwh = null;
                    var conta = null;
                    var mediaValor = $('#mediavalor').val();

                }
                if (option == "conta-energia") {

                    var mediaKwh = null;
                    var conta = $('#file-input-conta').val();;
                    var mediaValor = null;
                }

                // console.log(option);
                console.log(mediaKwh);
                console.log(conta);
                console.log(mediaValor);
                console.log("data-id - "+ dataId);


                $.ajax({
                    type: "POST",
                    url: "{{ route('comercial.contato.budget.new') }}",
                    data: {
                        contact_id: dataId,
                        roof_type: roof_type,
                        budget_type: option,
                        conta_energia: conta,
                        media_kwh: mediaKwh,
                        media_valor: mediaValor
                    },
                    dataType: "json",
                    success: function(res) {
                        console.log(res.success);
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

            $('#btnReloadContact').click(function(){
                reloadContacts();
            });

        });

    </script>

</x-app-layout>
