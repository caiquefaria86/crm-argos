<div class="content">
    <div class="d-flex bd-highlight">
        <div class="p-2 mx-2 flex-grow-1 bd-highlight">
            <input type="text" class="form-control bg-transparent" name="name" id="nameContact" data-id="{{$data->id}}" value="{{$data->name}}">
            <p><small id="contactIdTop" data-id="{{$data->id}}" class="text-muted mx-2">Lista: {{$data->list}} | id contato: {{$data->id}}</small></p>
        </div>
        <div class="p-2 align-items-start row bd-highlight" id="div-grupo-prepend">
            {{-- <div class="d-flex border bd-highlight col">
                <button class="mt-1 btn btn-sm" id="">
                    sa
                </button>
            </div> --}}
            <div class="d-flex align-items-start bd-highlight col">
                <button class="mt-1 btn btn-sm" id="btn-fechar-modal-contato">
                    <i class="the-icon"><span class="fa-fw select-all fas"></span></i>
                </button>
            </div>
        </div>
    </div>

    {{-- <div class="row d-flex justify-content-center">
        <div class="col-10 form-group">
            <input type="text" class="form-control bg-transparent" name="name" id="nameContact" value="{{$data->name}}">
            <p class="text-muted text-sm">Lista atual: {{$data->list}}</p>
        </div>
        <div class="col-1 form-group">
            <button class="mt-1 btn btn-sm" id="btn-fechar-modal-orcamento">
                <i class="the-icon"><span class="fa-fw select-all fas"></span></i>
            </button>
        </div>
    </div> --}}
    <div class="row d-flex justify-content-center">

        <div class="row mt-2 mx-2 rounded ">
            <div class="col p-2 mx-4 bg-white mb-2 rounded" id="content-tags">

                <div class="btn-group dropleft me-1 mb-1">
                    <button type="button" class="btn btn-primary px-2 py-1 btn-sm dropdown-toggle dropdown-tira-setinha" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="fa-fw select-all fas"></span>
                    </button>
                    <div class="dropdown-menu border shadow" aria-labelledby="dropdownMenuButton902">
                        <h6 class="dropdown-header">Todas as Etiquetas</h6>
                        @foreach ($tags as $bdTag)
                            @if ($bdTag->category == "comercial")
                                <button class="dropdown-item btn-add-tag" style="background-color: {{$bdTag->color}}; color:white;" data-id="{{$data->id}}" value="{{$bdTag->id}}">{{$bdTag->text}}</button>
                            @endif
                        @endforeach
                    </div>
                </div>

                @foreach ($data->tags as $tag)
                    <span class="badge mt-1 label-tag" id="label-tag-{{$tag->id}}" style="background-color: {{$tag->color}}; color:{{$tag->text_color}};">{{$tag->text}} <button class="btn py-0 px-1 text-white btn-delete-tag" id="bnt-delete-tag" data-id="{{$tag->id}}">x</button></span>
                @endforeach

            </div>
        </div>
        <div class="row mx-2 rounded ">
            <div class="col p-2 mx-4 mb-2 rounded" id="content-tags">

                <div class="d-flex flex-row-reverse" id="content-target">
                    @foreach ($data->users as $user)
                        <div class="avatar bg-warning">
                            <span class="avatar-content" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ getUserName($user->id) }}">{{getFirstLetterNamesIdUser($user->id)}}</span>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>

            <div class="col-8 mt-1 mx-2 rounded bg-white">
                <div class="row my-2">
                    <div class="col-12">
                        <h4 class="title-contact">
                            <span class="fa-fw select-all fas"></span>
                            Informações do Contato:
                        </h4>
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
                                <p>Entrada: {{dateFriendly($data->created_at)}}</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-3 mt-1 rounded  bg-white">
               <div class="row my-2">
                    <div class="col-12">
                        <h4 class="title-contact"><span class="fa-fw select-all fas"></span> Opções</h4>
                        <div class="card-content m-0 p-0">
                            <div class="card-body m-0 p-0">
                                <div class="list-group">
                                        <button class="list-group-item list-group-item-action dropdown-toggle" type="button" id="incluirPessoa"
                                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Inlcuir Pessoa
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="incluirPessoa">
                                            <h6 class="dropdown-header">Colaboradores</h6>
                                            @foreach ($allUsers as $user)
                                                @if ($user->id != $authUser->id)
                                                    <button class="dropdown-item btn-include-people" data-id="{{$user->id}}">{{$user->name}}</button>
                                                @endif
                                            @endforeach
                                        </div>
                                    <button type="button" class="list-group-item list-group-item-action">Arquivar Contato</button>
                                </div>
                            </div>
                            @if ($data->list == "budgetSent")


                                    <input type="hidden" value="{{$data->id}}" name="id_contact" id="id_contact">
                                    <p>Recontactar dia:<input type="date" value="{{$data->date_recontact}}" id="value-date"  class="form-control"><button id="date-recontactar" class="btn btn-sm">Salvar</button></p>
                                @endif
                        </div>
                    </div>
               </div>
            </div>
    </div>
    @if($data->list != "contacts")
        <div class="row opções mt-2  d-flex justify-content-center">
            <div class="col-11 rounded bg-white">
                <div class="d-flex bd-highlight">
                    <div class="p-2 w-100 bd-highlight">
                        <h4 class="title-contact mt-2"><span class="fa-fw select-all fas"></span> Orçamento</h4>
                    </div>
                    <div class="p-2 flex-shrink-1 bd-highlight">
                        <button class="btn btn-sm btn-light" data-toggle="collapse"  aria-expanded="true" aria-controls="content-orcamento" data-target="#content-orcamento">
                            @if ($data->list != "requestBudget") Abrir  @else Fechar @endif
                        </button>
                    </div>
                  </div>

                <div class="row collapse @if ($data->list != "requestBudget") nada  @else show @endif" id="content-orcamento">
                    <div class="col-6">
                        <p>Ultimas Solicitação <button class="btn btn-sm border mx-2" id="btn-fazer-orcamento">Nova <span class="fa-fw select-all fa-2x fas"></span></button></p>

                        @forelse ($data->budgets as $budget)
                            @if ($budget->status == true)
                                <button type="button" class="btn border btn-block mb-2" data-toggle="collapse" data-target="#demo{{$budget->id}}">{{$budget->budget_type}}: {{$budget->created_at->format('d/m/y')}}</button>
                                <div id="demo{{$budget->id}}" class="collapse">
                                    <div class="row">
                                        <div class="col-12 border m-2 rounded bg-light">
                                            <div class="border my-2 rounded bg-white">
                                                <ul>
                                                    <li>Tipo de Proposta: {{$budget->budget_type}} </li>
                                                    <li>Valor: {{$budget->media_kwh}} {{$budget->media_valor}}</li>
                                                    <li>Descrição: {{$budget->description}}</li>
                                                    @if ($budget->budget_type == 'conta-energia')
                                                        <div class="row my-2 mr-2">
                                                            Arquivos:
                                                            <div class="col">
                                                                @foreach ($budget->budgetFiles as $bFiles)
                                                                        <a href="{{env('APP_URL')}}/storage/{{$bFiles->path}}" class="btn btn-danger btn-sm m-0" download="Conta-{{$data->name}}-{{$bFiles->created_at}}"><span class="fa-fw select-all fas"></span></a></li>
                                                                @endforeach
                                                            </div>
                                                        </li>
                                                    @endif
                                                    <li>Tempo: {{dateFriendly($budget->created_at)}}</li>
                                                </ul>
                                                <button class="btn btn-secondary btn-sm m-2" data-toggle="collapse"  aria-expanded="true" aria-controls="foi-apresentado" data-target="#foi-apresentado">
                                                    Já foi Apresentado
                                                </button>
                                            </div>

                                            <div class="border bg-white my-2 p-2 rounded collapse" id="foi-apresentado">
                                                <ul>
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
                                <p class="mx-2">Apresentada dia: {{dateFriendly($bSents->date_apresentation)}}</p>
                                <p class="mx-2">Via: {{$bSents->type_apresentation}}</p>
                                @foreach ($bSents->budgetSentFiles as $bSentFile)
                                    <li class="list-group-item text-center"><a href="{{env('APP_URL')}}/storage/{{$bSentFile->path}}" class="btn btn-danger btn-sm px-3" download="Proposta-{{$data->name}}-{{$bSents->created_at}}.pdf">Download Proposta .PDF</a></li>
                                    {{-- <img class="img-thumbnail" src="{{env('APP_URL')}}/storage/{{$bSentFile->path}}"> --}}
                                @endforeach
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

    {{-- Inicio da negociação --}}

    @if(($data->list == "negotiation")||($data->list == "salecompleted"))
    <div class="row opções mt-2  d-flex justify-content-center">
        <div class="col-11 rounded bg-white">
            <div class="d-flex bd-highlight">
                <div class="p-2 w-100 bd-highlight">
                    <h4 class="title-contact mt-2">Negociação</h4>
                </div>
                <div class="p-2 flex-shrink-1 bd-highlight">
                    <button class="btn btn-sm btn-light" data-toggle="collapse"  aria-expanded="true" aria-controls="content-negociacao" data-target="#content-negociacao">
                        @if ($data->list != "requestBudget") Abrir  @else Fechar @endif
                    </button>
                </div>
            </div>

            <div class="row collapse @if ($data->list != "negotiation") nada  @else show @endif" id="content-negociacao">

            <!-- Task App Widget Starts -->
            <section class="tasks">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card widget-todo">
                            <div class="card-header border-bottom d-flex justify-content-between align-items-center">
                                <h4 class="card-title d-flex">
                                    <i class="bx bx-check font-medium-5 pl-25 pr-75"></i>CheckList
                                </h4>
                            </div>
                            <div class="card-body px-0 py-1">
                                <table class="table table-borderless">
                                    <tbody>

                                        @for($i = 0; $i < count($checklistItems); $i++)
                                            <tr>
                                                <th>
                                                    <div class="checkbox checkbox-shadow">
                                                    <input type="checkbox" class="form-check-input mx-1 checkbox-checklist" id="checkbox-checklist-{{$i}}" data-id="{{$checklistItems[$i]->id}}"
                                                        @for($x = 0; $x < count($checklistContacts); $x++)
                                                            @if ($checklistContacts[$x]->checklistItem_id === $checklistItems[$i]->id)
                                                                @if ($checklistContacts[$x]->status == true) checked @endif
                                                            @endif
                                                        @endfor
                                                    >
                                                </th>
                                                <td><span class="widget-todo-title ml-50 mt-2

                                                    @for($x = 0; $x < count($checklistContacts); $x++)
                                                        @if ($checklistContacts[$x]->checklistItem_id === $checklistItems[$i]->id)
                                                            @if ($checklistContacts[$x]->status == true) text-riscadinho @endif
                                                        @endif
                                                    @endfor"
                                                    id="text-checklist-{{$checklistItems[$i]->id}}"
                                                    >{{$checklistItems[$i]->text}}</span></td>
                                                <td id="date-checklist-{{$checklistItems[$i]->id}}">
                                                    @for($x = 0; $x < count($checklistContacts); $x++)
                                                        @if ($checklistContacts[$x]->checklistItem_id === $checklistItems[$i]->id)
                                                            @if ($checklistContacts[$x]->status == true) <small class="text-muted">{{ date('d/m/Y', strtotime($checklistContacts[$x]->date))}}</small> @endif
                                                        @endif
                                                    @endfor
                                                </td>
                                                <td id="user_checklist-{{$checklistItems[$i]->id}}">
                                                    @for($x = 0; $x < count($checklistContacts); $x++)
                                                        @if ($checklistContacts[$x]->checklistItem_id === $checklistItems[$i]->id)
                                                            @if ($checklistContacts[$x]->status == true)
                                                                <div class="avatar bg-warning me-3">
                                                                    <span class="avatar-content">{{getFirstLetterNamesIdUser($checklistContacts[$x]->user_id)}}</span>
                                                                </div>
                                                            @endif
                                                        @endif
                                                    @endfor
                                                </td>
                                            </tr>
                                            <!-- Modal -->
                                            <div class="modal fade" id="checklistInfo{{$checklistItems[$i]->id}}" tabindex="-1" aria-labelledby="checklistInfoLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-sm shadow mt-5">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Atribuir</h5>
                                                    <button type="button" id="closeItem{{$checklistItems[$i]->id}}" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-row">
                                                            <div class="col">
                                                              {{-- <input type="text" class="form-control" placeholder="First name"> --}}
                                                              <label for="date-event-{{$checklistItems[$i]->id}}">Dia conclusão da etapa</label>
                                                              <input type="date" class="form-control" name="date-event" id="date-event-{{$checklistItems[$i]->id}}">
                                                            </div>
                                                            <div class="col">
                                                                <label for="date-event-{{$checklistItems[$i]->id}}">Responsável</label>
                                                                <select class="form-control" id="user-event-{{$checklistItems[$i]->id}}">
                                                                    @foreach ($allUsers as $user)
                                                                        <option value="{{$user->id}}">{{$user->name}}</option>
                                                                    @endforeach
                                                                  </select>
                                                                <input type="hidden" name="checklist_id_event-{{$checklistItems[$i]->id}}" id="checklist_id_event-{{$checklistItems[$i]->id}}" value="{{$checklistItems[$i]->id}}">
                                                                <input type="hidden" name="contact_id_event-{{$checklistItems[$i]->id}}" id="contact_id_event-{{$checklistItems[$i]->id}}" value="{{$data->id}}">
                                                            </div>
                                                          </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                    <button type="button" id="btn_envia_event_checklist" class="btn btn-primary btn_envia_event_checklist">Marcar como concluido</button>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                        @endfor
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="card widget-todo">
                            <div class="card-header border-bottom d-flex justify-content-between align-items-center">
                                <h4 class="card-title d-flex">
                                    <i class="bx bx-check font-medium-5 pl-25 pr-75"></i>Arquivos
                                </h4>

                            </div>
                            <div class="card-body px-0 py-1">
                                <table class="table table-borderless">
                                    <tr>
                                        <td class="col-3">CNH (Titular da conta)**</td>
                                        <td class="col-3">

                                            @foreach ($uploadFiles as $file)
                                            @if ($file->type == "cnh")
                                                <a href="{{env("APP_URL")}}/storage/{{$file->path}}" class="btn btn-primary btn-sm px-3" download="cnh-{{$file->created_at}}">{{$file->type}} <span class="fa-fw select-all fas"></span></a>
                                            @endif
                                            @endforeach
                                        </td>
                                        <td class="col-3">
                                            <form id="formulariodacnh" name="formulariodacnh" method="post" enctype="multipart/form-data">
                                                <div class="input-group" >
                                                    <div id="contentcnh" class=""></div>
                                                    <input type="hidden" name="type" id="" value="cnh">
                                                    <input type="hidden" name="contact_id" id="" value="{{$data->id}}">
                                                    <input type="file" class="form-control form-control-sm" id="cnh" name="cnh[]" multiple aria-label="Upload">
                                                </div>
                                            </form>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-3">Conta da Unid. Geradora**</td>
                                        <td class="col-3">
                                            @foreach ($uploadFiles as $file)
                                            @if ($file->type == "contageradora")
                                                <a href="{{env("APP_URL")}}/storage/{{$file->path}}" class="btn btn-primary btn-sm px-3" download="cnh-{{$file->created_at}}">{{$file->type}} <span class="fa-fw select-all fas"></span></a>
                                            @endif
                                            @endforeach
                                        </td>
                                        <td class="col-3">
                                            <form id="formulariodacontageradora" name="formulariodacontageradora" method="post" enctype="multipart/form-data">
                                                <div class="input-group" >
                                                    <div id="contentcontageradora" class=""></div>
                                                    <input type="hidden" name="type" id="" value="contageradora">
                                                    <input type="hidden" name="contact_id" id="" value="{{$data->id}}">
                                                    <input type="file" class="form-control form-control-sm" id="contageradora" name="contageradora[]" multiple aria-label="Upload">
                                                </div>
                                            </form>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-3">Holer. ou Similar</td>
                                        <td class="col-3">
                                            @foreach ($uploadFiles as $file)
                                            @if ($file->type == "holerite")
                                                <a href="{{env("APP_URL")}}/storage/{{$file->path}}" class="btn btn-primary btn-sm px-3" download="cnh-{{$file->created_at}}">{{$file->type}} <span class="fa-fw select-all fas"></span></a>
                                            @endif
                                            @endforeach

                                        </td>
                                        <td class="col-3">
                                            <form id="formulariodaholerite" name="formulariodaholerite" method="post" enctype="multipart/form-data">
                                                <div class="input-group" >
                                                    <div id="contentholerite" class=""></div>
                                                    <input type="hidden" name="type" id="" value="holerite">
                                                    <input type="hidden" name="contact_id" id="" value="{{$data->id}}">
                                                    <input type="file" class="form-control form-control-sm" id="holerite" name="holerite[]" multiple aria-label="Upload">
                                                </div>
                                            </form>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-3">Fotos do Padrão</td>
                                        <td class="col-3">
                                            @foreach ($uploadFiles as $file)
                                            @if ($file->type == "padrao")
                                                <a href="{{env("APP_URL")}}/storage/{{$file->path}}" class="btn btn-primary btn-sm px-3" download="cnh-{{$file->created_at}}">{{$file->type}} <span class="fa-fw select-all fas"></span></a>
                                            @endif
                                            @endforeach

                                        </td>
                                        <td class="col-3">
                                            <form id="formulariodapadrao" name="formulariodapadrao" method="post" enctype="multipart/form-data">
                                                <div class="input-group" >
                                                    <div id="contentpadrao" class=""></div>
                                                    <input type="hidden" name="type" id="" value="padrao">
                                                    <input type="hidden" name="contact_id" id="" value="{{$data->id}}">
                                                    <input type="file" class="form-control form-control-sm" id="padrao" name="padrao[]" multiple aria-label="Upload">
                                                </div>
                                            </form>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            </div>
        </div>
    </div>
    @endif

    <div class="row opções mt-2  d-flex justify-content-center">
        <div class="col-11 rounded bg-transparent">
            <h4 class="title-contact my-3"><span class="fa-fw select-all fas"></span> Comentários</h4>
            <hr>
            <div class="d-flex bd-highlight my-3">
                <div class="p-2 text-right bd-highlight">
                    <div class="avatar bg-warning me-3">
                        <span class="avatar-content">{{getFirtWordName($authUser->name)}}</span>
                        <span class="avatar-status bg-success"></span>
                    </div>
                </div>
                <div class="p-2 flex-grow-1 bd-highlight">
                    <label for="helpInputTop">{{$authUser->name}}</label>
                    <input type="hidden" id="contactId" name="contactId" value="{{$data->id}}">
                    <input type="hidden" id="userId" name="userId" value="{{$data->user->id}}">
                    {{-- <input type="text" class="form-control" id="helpInputTop" placeholder="Escrever um comentário..." aria-label="Recipient's username" aria-describedby="button-addon2"> --}}
                    <textarea class="form-control" name="comment" placeholder="Escrever um comentário..." id="input_comment" rows="1"></textarea>
                </div>
                <div class="p-2 bd-highlight d-flex align-items-center">
                    <div class="input-group-append d-flex align-items-center">
                        <button class="btn btn-outline-primary py-2 rounded-circle mt-4" type="button" id="btn-send-comment"><span class="fa-fw select-all fas"></span></button>
                    </div>
                </div>
            </div>
            <hr>

            <div id="content-comments">

                @foreach ($data->comments->reverse() as $comment)
                    <div class="d-flex bd-highlight my-3" id="comment_id_{{$comment->id}}">
                        <div class="p-2 text-right bd-highlight ">
                            <div class="avatar bg-warning me-3">
                                <span class="avatar-content">AG</span>
                                <span class="avatar-status bg-success"></span>
                            </div>
                        </div>
                        <div class="p-2 flex-grow-1 bd-highlight">
                            <label for="helpInputTop">{{getUserName($comment->userId)}}</label>
                            <small class="text-muted">{{dateFriendly($comment->created_at)}}</i>  <span class="fa-fw select-all fas icon-comment-card"></span></small>
                            {{-- <input type="text" class="form-control" id="helpInputTop" placeholder="Escrever um comentário..." aria-label="Recipient's username" aria-describedby="button-addon2"> --}}
                            <div class="form-control-static py-2 px-2 border bg-white" id="helpInputTop">
                                {!! $comment->message !!}
                            </div>
                        </div>
                        <div class="p-2 bd-highlight d-flex align-items-center">
                            <button class="btn btn-transparent mt-1" id='btn_delete_comment' data-id='{{$comment->id}}'><span class="fa-fw select-all fas fa-2x"></span></button>
                        </div>
                    </div>
                @endforeach




            </div>
        </div>
    </div>
    <div class="row opções d-flex justify-content-center">
        @switch($data->list)
            @case("contacts")
                <div class="col-11 d-flex justify-content-end mt-3">
                    <button class="btn btn-success px-2 btn-sm" id="btn-fazer-orcamento">Orçamento <span class="fa-fw select-all fas"></span></button>
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
                @case('negotiation')
                <div class="col-11 d-flex justify-content-end mt-3">
                    <button class="btn btn-primary px-2 btn-sm mx-2" id="btn-move-recontact">Mover para Recontactar</button>
                    <button class="btn btn-primary px-2 btn-sm mx-2" id="btn-mover-apresentado">Mover para Apresentado</button>
                    <a href="{{route('comercial.client.new', ['contact_id'=>$data->id, 'checkContact' => true])}}" class="btn btn-success px-2 btn-sm" id="btn-mover-fechado_retirar">Mover para Fechado</a>
                </div>
            @break

            @default

        @endswitch
    </div>
</div>

<script>
    var contSalvar = false;
    $(function(){
        $('#btn-fazer-orcamento').click(function(){
            // console.log('clicou no btn');
            $('#view-contact').modal('hide');
            var contactId = $("#contactIdTop").attr('data-id');
            // console.log(contactId);
            $('#move-orcamento').modal('show');
            $('#contactIdValue').val(contactId);
        });

        $('#btn-fechar-modal-orcamento').click(function(e) {

            e.preventDefault();

            $('#move-orcamento').modal('hide');
            $('#content').remove();
            $('#loading-contact-modal').removeClass('d-none');

        });

        $(document).on('focus', '#nameContact', function(){
            if(contSalvar == false){
                $("#div-grupo-prepend").prepend($('<div class="d-flex bd-highlight col btn-save-name" id="btn-save-name"><button class="mt-1 btn btn-sm btn-primary" id="btn-edit-name-contact">Salvar</button></div>'));
                contSalvar = true;
            }
        });

        $(document).on("click", "#btn-edit-name-contact", function(event){

            // console.log('clicou me salvar');
            $(this).attr("disabled", true);

            var valordigitado = $("#nameContact").val();
            var valorDb = '{{$data->name}}';
            var idContact = '{{$data->id}}';

            if(valordigitado != valorDb){

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "post",
                    url: "{{ route('comercial.contato.updateName') }}",
                    data: {
                        valordigitado:valordigitado,
                        idContact:idContact
                    },
                    dataType: "json",
                    success: function(res) {
                        if(res.success){
                            $(".btn-save-name").remove();
                            $("#btn-save-name").remove();
                            contSalvar = false;
                            Toastify({
                                text: res.message,
                                duration: 3000,
                                close: true,
                                backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
                            }).showToast();

                            console.log(res);

                            idContact = null;
                            valordigitado = null;
                            valorDb = null;
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
            }
        });

        $('#date-recontactar').click(function(){
            // console.log('clicou em salvar data');
            var date_recontact = $('#value-date').val();
            var id_contact = $('#id_contact').val();

            $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "post",
                    url: "{{ route('comercial.contato.updateDateRecontact') }}",
                    data: {
                        date_recontact:date_recontact,
                        id_contact:id_contact
                    },
                    dataType: "json",
                    success: function(res) {
                        if(res.success){
                            console.log(res);
                            Toastify({
                                text: res.message,
                                duration: 3000,
                                close: true,
                                backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
                            }).showToast();
                            console.log(res);
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

        $(".checkbox-checklist").click(function(){
            var checklistId = $(this).attr('data-id');
            // console.log(checklistId);

            //exibe a modal
            $('#checklistInfo'+checklistId).modal('show');
            $(".btn_envia_event_checklist").attr('id', 'btn_envia_request_checklist'+checklistId);

            // $('btn_envia_request_checklist'+checklistId).click(function(){
            $(document).on('click','#btn_envia_request_checklist'+checklistId,function(){

                $(this).attr("disabled", true);
                $(this).html('<div class="spinner-border" role="status"><span class="sr-only">Loading...</span></div> Solicitando...');

                var date_event = $("#date-event-"+checklistId).val();
                var user_event = $("#user-event-"+checklistId).val();
                var checklist_id_event = $("#checklist_id_event-"+checklistId).val();
                var contact_id_event = $("#contact_id_event-"+checklistId).val();

                console.log(checklist_id_event);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "post",
                    url: "{{ route('comercial.contato.checklistStore') }}",
                    data: {
                        date_event:date_event,
                        user_event:user_event,
                        contact_id_event:contact_id_event,
                        checklist_id_event:checklist_id_event
                    },
                    dataType: "json",
                    success: function(res) {
                        $("#text-checklist-"+checklistId).addClass('text-riscadinho');
                        $("#date-checklist-"+checklistId).html('<small class="text-muted">'+date_event+'</small>');
                        $('#checklistInfo'+checklistId).modal('hide');
                        $('#view-contact').modal('show');
                        if(res.success){
                            console.log(res);
                            Toastify({
                                text: res.message,
                                duration: 3000,
                                close: true,
                                backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
                            }).showToast();
                            console.log(res);
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

        });

        // $(document).on('focusout', '#nameContact', function(){
        //     // console.log(contSalvar);
        //     if(contSalvar == true){
        //         $(".btn-save-name").remove();
        //         $("#btn-save-name").remove();
        //         contSalvar = false;
        //     }
        // });
    });

    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })

</script>

