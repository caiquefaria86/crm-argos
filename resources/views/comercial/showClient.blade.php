<x-app-layout>
    <x-slot name="header">

    </x-slot>

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
                    {{-- <li class="nav-item" role="presentation">
                        <a class="nav-link" id="contact-tab" data-bs-toggle="tab" href="#contact" role="tab"
                            aria-controls="contact" aria-selected="false">Linha do Tempo</a>
                    </li> --}}
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
                        Integer interdum diam eleifend metus lacinia, quis gravida eros mollis. Fusce non sapien
                        sit amet magna dapibus
                        ultrices. Morbi tincidunt magna ex, eget faucibus sapien bibendum non. Duis a mauris ex.
                        Ut finibus risus sed massa
                        mattis porta. Aliquam sagittis massa et purus efficitur ultricies. Integer pretium dolor
                        at sapien laoreet ultricies.
                        Fusce congue et lorem id convallis. Nulla volutpat tellus nec molestie finibus. In nec
                        odio tincidunt eros finibus
                        ullamcorper. Ut sodales, dui nec posuere finibus, nisl sem aliquam metus, eu accumsan
                        lacus felis at odio. Sed lacus
                        quam, convallis quis condimentum ut, accumsan congue massa. Pellentesque et quam vel
                        massa pretium ullamcorper vitae eu
                        tortor.
                    </div>
                    <div class="tab-pane fade" id="orcamento" role="tabpanel" aria-labelledby="orcamento-tab">
                        @foreach ($contact_client->budgetsSents as $bSents)
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
                            @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
