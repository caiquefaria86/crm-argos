<x-app-layout>
    <x-slot name="header">

    </x-slot>
    @section('stylePersonalizado')
    <link rel="stylesheet" href="{{ asset('css/pages/board.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/toastify/toastify.css') }}">
@endsection

    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Cliente: {{$client->name}}</h4>
            </div>
            <div class="card-body">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home" role="tab"
                            aria-controls="home" aria-selected="true">Dados do Cliente</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab"
                            aria-controls="profile" aria-selected="false">Projetos</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="orcamento-tab" data-bs-toggle="tab" href="#orcamento" role="tab"
                            aria-controls="orcamento" aria-selected="false">Orçamentos</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="files-tab" data-bs-toggle="tab" href="#files" role="tab"
                            aria-controls="files" aria-selected="false">Arquivos</a>
                    </li>
                </ul>
                <div class="tab-content border-top p-3" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="row mt-3">
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-3 ">Nome:</div>
                                    <div class="col-9 ">{{$client->name}}</div>
                                </div>
                                <div class="row">
                                    <div class="col-3">CPF:</div>
                                    <div class="col-9">{{$client->cpf}}</div>
                                </div>
                                <div class="row">
                                    <div class="col-3">RG:</div>
                                    <div class="col-9">{{$client->rg}}</div>
                                </div>
                                <div class="row">
                                    <div class="col-3">Telefone:</div>
                                    <div class="col-9">{{$client->cellphone}}</div>
                                </div>
                                <div class="row">
                                    <div class="col-3">Email:</div>
                                    <div class="col-9">{{$client->email}}</div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-3">Rua:</div>
                                    <div class="col-9">{{$client->rua}}</div>
                                </div>
                                <div class="row">
                                    <div class="col-3">Numero:</div>
                                    <div class="col-9">{{$client->numero}}</div>
                                </div>
                                <div class="row">
                                    <div class="col-3">Bairro:</div>
                                    <div class="col-9">{{$client->bairro}}</div>
                                </div>
                                <div class="row">
                                    <div class="col-3">CEP:</div>
                                    <div class="col-9">{{$client->cep}}</div>
                                </div>
                                <div class="row">
                                    <div class="col-3">Cidade:</div>
                                    <div class="col-9">{{$client->cidade}}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="mt-3">
                            <h5>Projetos Cadastrados</h5>

                            @foreach ($client->projects as $project)
                                <div class="py-4 px-3 my-4 row border rounded shadow">
                                    <div class="col-4">
                                        <div class="row" id="projetos-content">
                                            <div class="col text-end item-project">Status</div>
                                            <div class="col value-project">{{$project->status}}</div>
                                        </div>
                                        <div class="row" id="projetos-content">
                                            <div class="col text-end item-project">Data De Fechamento:</div>
                                            <div class="col value-project">{{$project->data_fechamento}}</div>
                                        </div>
                                        <div class="row" id="projetos-content">
                                            <div class="col text-end item-project">Tipo de Projeto</div>
                                            <div class="col value-project">{{$project->type}}</div>
                                        </div>
                                        <div class="row" id="projetos-content">
                                            <div class="col text-end item-project">Tipo de Inversor</div>
                                            <div class="col value-project">{{$project->tipoInversor}}</div>
                                        </div>
                                        <div class="row" id="projetos-content">
                                            <div class="col text-end item-project">Quantidade Inversor</div>
                                            <div class="col value-project">{{$project->qtd_inversores}}</div>
                                        </div>
                                        <div class="row" id="projetos-content">
                                            <div class="col text-end item-project">Tamanho Sistema</div>
                                            <div class="col value-project">{{$project->tamanhoInversor}}</div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="row" id="projetos-content">
                                            <div class="col text-end item-project">Valor Material</div>
                                            <div class="col value-project">{{$project->valor_material}}</div>
                                        </div>
                                        <div class="row" id="projetos-content">
                                            <div class="col text-end item-project">Valor Instalação</div>
                                            <div class="col value-project">{{$project->valor_instalacao}}</div>
                                        </div>
                                        <div class="row" id="projetos-content">
                                            <div class="col text-end item-project">Valor Total</div>
                                            <div class="col value-project">{{$project->valor_total}}</div>
                                        </div>
                                        <div class="row" id="projetos-content">
                                            <div class="col text-end item-project">Tipo de Pagamento</div>
                                            <div class="col value-project">{{$project->tipo_pagamento}}</div>
                                        </div>
                                        <div class="row" id="projetos-content">
                                            <div class="col text-end item-project">Com ou Sem Entranda</div>
                                            <div class="col value-project">{{$project->entrada}}</div>
                                        </div>
                                        <div class="row" id="projetos-content">
                                            <div class="col text-end item-project">Qtd Parcelas</div>
                                            <div class="col value-project">{{$project->qtd_parcelas}}</div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="row" id="projetos-content">
                                            <div class="col text-end item-project"><a href="#" class="btn btn-primary btn-sm mt-1">Ver Detalhes</a></div>
                                        </div>
                                        <div class="row" id="projetos-content">
                                            <div class="col text-end item-project"><a href="#" class="btn btn-warning btn-sm mt-1">Arquivar Projeto</a></div>
                                        </div>
                                    </div>

                                </div>
                            @endforeach

                        </div>
                    </div>
                    <div class="tab-pane fade" id="orcamento" role="tabpanel" aria-labelledby="orcamento-tab">
                        <div class="row">
                        @foreach ($contact_client->budgetsSents as $bSents)
                                <div class="col-6">
                                    <div class="card border">
                                        <p class="mx-2">Apresentada dia: {{dateFriendly($bSents->date_apresentation)}}</p>
                                        <p class="mx-2">Via: {{$bSents->type_apresentation}}</p>
                                        @foreach ($bSents->budgetSentFiles as $bSentFile)
                                            <li class="list-group-item text-center"><a href="{{env('APP_URL')}}/storage/{{$bSentFile->path}}" class="btn btn-danger btn-sm px-3" download="Proposta-{{$bSents->created_at}}.pdf">Download Proposta .PDF</a></li>
                                            {{-- <img class="img-thumbnail" src="{{env('APP_URL')}}/storage/{{$bSentFile->path}}"> --}}
                                        @endforeach
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item text-sm">Enviada: {{date('d/m/Y H:i:s', strtotime($bSents->created_at))}} </li>
                                        </ul>
                                    </div>
                                </div>
                        @endforeach
                        </div>
                    </div>
                    <div class="tab-pane fade" id="files" role="tabpanel" aria-labelledby="files-tab">
                        <div class="mt-3">
                            <h5>Arquivos deste cliente</h5>
                            <hr>
                            <p>Proposta Final</p>
                            @foreach ($uploadFiles as $file)
                            @if ($file->type == 'propostafinal')
                            <a href="{{env('APP_URL')}}/storage/{{$file->path}}" class="btn btn-danger btn-sm m-0" download="Conta-{{$client->name}}-{{$file->created_at}}">Proposta Final <span class="fa-fw select-all fas"></span></a></li>
                            @endif
                            @endforeach
                            <br/><br/>
                            <p>Conta Unid Geradora</p>
                            @foreach ($uploadFiles as $file)
                                @if ($file->type == 'contaUnidGeradora')
                                    <a href="{{env('APP_URL')}}/storage/{{$file->path}}" class="btn btn-danger btn-sm m-0" download="Conta-{{$client->name}}-{{$file->created_at}}">Conta Unid Geradora <span class="fa-fw select-all fas"></span></a></li>
                                @endif
                            @endforeach
                            <br/><br/>
                            <p>CNH Cliente</p>
                            @foreach ($uploadFiles as $file)
                                @if ($file->type == 'cnh-cliente')
                                    <a href="{{env('APP_URL')}}/storage/{{$file->path}}" class="btn btn-danger btn-sm m-0" download="Conta-{{$client->name}}-{{$file->created_at}}">CNH Cliente <span class="fa-fw select-all fas"></span></a></li>
                                @endif
                            @endforeach
                            <br/><br/>
                            <p>Comprovante Residencia</p>
                            @foreach ($uploadFiles as $file)
                                @if ($file->type == 'comprovante-residencia')
                                    <a href="{{env('APP_URL')}}/storage/{{$file->path}}" class="btn btn-danger btn-sm m-0" download="Conta-{{$client->name}}-{{$file->created_at}}">Comprovante Residencia <span class="fa-fw select-all fas"></span></a></li>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
