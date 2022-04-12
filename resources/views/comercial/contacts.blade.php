<div class="content bg-light">
    <div class="row d-flex justify-content-center">
        <div class="col-10 form-group">
            <input type="text" class="form-control bg-transparent" name="name" id="nameContact" value="{{$data->name}}">
            <p class="text-muted text-sm">Lista atual: {{$data->list}}</p>
        </div>
        <div class="col-1 form-group">
            <button class="mt-1 btn btn-sm" id="btn-fechar-modal-orcamento">
                <i class="the-icon"><span class="fa-fw select-all fas"></span></i>
            </button>
        </div>

    </div>
    <div class="row d-flex justify-content-center">

            <div class="col-8 mt-2 mx-2 rounded  bg-white">
                <div class="row my-2">
                    <div class="col-12">
                        <h4 class="title-contact">Informações do Contato:</h4>
                        {{-- <hr> --}}
                        <div class="row info-contatos mt-2">
                            <div class="col-6">
                                <p>Cidade: {{$data->city}}</p>
                                <p>Email: {{$data->email}}</p>
                                <p>Origem: {{$data->origin}}</p>
                            </div>
                            <div class="col-6">
                                <p>Contato: {{$data->cellphone}}</p>
                                <p>Escritório: {{$data->responsibleOffice}}</p>
                                <p>Entrada: {{$data->created_at}}</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-3 mt-2 rounded  bg-white">
               <div class="row my-2">
                    <div class="col-12">
                        <h4 class="title-contact">Opções</h4>
                    </div>
               </div>
            </div>
    </div>
    @if($data->list != "contacts")
        <div class="row opções mt-2  d-flex justify-content-center">
            <div class="col-11 rounded bg-white">
                <h4 class="title-contact">Orçamento</h4>

                <div class="row">
                    <div class="col-6">
                        <p>Ultimas Solicitação <button class="btn btn-sm btn-primary" id="btn-fazer-orcamento">Nova</button></p>
                        @forelse ($data->budgets as $budget)
                            @if ($budget->status == true)
                                <button type="button" class="btn border btn-block mb-2" data-toggle="collapse" data-target="#demo{{$budget->id}}">{{$budget->budget_type}}: {{$budget->created_at->format('d/m/y  H:i')}}</button>
                                <div id="demo{{$budget->id}}" class="collapse">
                                    <div class="row ">
                                        <div class="col-12 border m-2">
                                            <ul>
                                                <li>Tipo de Proposta: {{$budget->budget_type}} </li>
                                                <li>Valor: {{$budget->media_kwh}} {{$budget->media_valor}}</li>
                                                <li>Arquivo(s): </li>
                                                <li>Tempo: {{$budget->created_at->format('d/m/Y  H:i')}}</li>
                                                <hr>
                                                    <form method="post" class="sent_proposta" action="{{route('comercial.contato.budget.sent')}}" name="form-sent-proposta" enctype="multipart/form-data">
                                                        @csrf
                                                        <li>Data de Apresentação: <input type="date" name="date_budget_sent" value="@php echo date('Y-m-d') @endphp" class="form-control my-2" id="date_apresentation"></li>
                                                        <li>
                                                            Forma apresentada:
                                                            <select class="form-select my-2" name="apresentation_type" id="apresentation_type">
                                                                <option value="whatsapp" selected>WhatsApp</option>
                                                                <option value="presencialmente">Presencialmente</option>
                                                            </select>
                                                        </li>
                                                        <li>
                                                            Arquivo de Proposta:
                                                            <input type="file" class="form-control form-control-sm my-3" name="apresentation_file[]" id="apresentation_file" multiple>
                                                        </li>
                                                        <input type="hidden" name="contactId" value="{{$budget->contact_id}}">
                                                    <button class="btn btn-sm border" id="btn_sent_proposta" type="submit">
                                                        Enviar Proposta
                                                    </button>
                                                </form>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @empty
                            <p>Não há solicitações de orçamento para este contato</p>
                        @endforelse
                    </div>
                    <div class="col-md-6">
                        <p>Ultimos Orçamentos</p>
                            @foreach ($data->budgetsSents as $bSents)
                            <div class="card border">
                                <p class="mx-2">Apresentada dia: {{date('d/m/Y', strtotime($bSents->date_apresentation))}}</p>
                                <p class="mx-2">Tipo: {{$bSents->type_apresentation}}</p>
                                <li class="list-group-item text-center"><a href="path_to_file" class="btn btn-primary btn-sm px-3" download="proposed_file_name">Download Proposta</a></li>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item text-sm">Enviada: {{date('d/m/Y H:i:s', strtotime($bSents->created_at))}} </li>
                                </ul>
                            </div>
                            @endforeach

                    </div>
                </div>

            </div>
        </div>
    @endif
    <div class="row opções mt-2  d-flex justify-content-center">
        <div class="col-11 rounded shadow-sm bg-white">
            <h4 class="title-contact">Comentários</h4>
            {{-- <div class="row p-2">
                <div class="avatar bg-warning col-1">
                    <span class="avatar-content">
                        CF
                    </span>
                </div>
                <div class="input-commment bg-white border mt-2 col-11">
                    <p>Insira um comentário</p>
                </div>
            </div> --}}
        </div>
    </div>
    <div class="row opções d-flex justify-content-center">
        @switch($data->list)
            @case("contacts")
                <div class="col-11 d-flex justify-content-end mt-3">
                    <button class="btn btn-success px-2 btn-sm" id="btn-fazer-orcamento">Orçamento</button>
                </div>
                @break
                @case("requestBudget")
                    <div class="col-11 d-flex justify-content-end mt-3">
                        <button class="btn btn-success px-2 btn-sm" id="btn-mover-apresentado">Mover para Apresentado</button>
                    </div>
                @break
                @case('budgetSent')
                    <div class="col-11 d-flex justify-content-end mt-3">
                        <button class="btn btn-primary px-2 btn-sm mx-2" id="btn-move-recontact">Mover para Recontactar</button>
                        <button class="btn btn-success px-2 btn-sm" id="btn-mover-negociacao">Mover para Negociação</button>
                    </div>
                @break
                @case('recontact')
                    <div class="col-11 d-flex justify-content-end mt-3">
                        <button class="btn btn-primary px-2 btn-sm mx-2" id="btn-mover-apresentado">Mover para Apresentado</button>
                        <button class="btn btn-success px-2 btn-sm" id="btn-mover-negociacao">Mover para Negociação</button>
                    </div>
                @break

            @default

        @endswitch
    </div>
</div>

<script>
    $(function(){
        $('#btn-fazer-orcamento').click(function(){
            // console.log('clicou no btn');
            $('#view-contact').modal('hide');
            $('#move-orcamento').modal('show');
        });

        $('#btn-fechar-modal-orcamento').click(function(e) {

            e.preventDefault();

            $('#move-orcamento').modal('hide');
            $('#content').remove();
            $('#loading-contact-modal').removeClass('d-none');

            });
    });
</script>

