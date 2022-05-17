<x-app-layout>
    <x-slot name="header">
        <div class="row">
        </div>
    </x-slot>
@section('scriptsPersonalizado')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
@endsection

    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Cadastro de novo projeto para o cliente : {{$client->name}}</h3>
                        <p>Preencha os campos, todos marcados com " * " São obrigatórios</p>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" method="POST" action="{{route('comercial.project.store')}}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Data de Fechamento</label>
                                            <input type="date" id="first-name-column" class="form-control" name="data_fechamento">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="last-name-column">Tipo de Projeto</label>
                                                <select name="type" class="form-select" id="type">
                                                    <option value="Energia Fotovoltaica">Energia Fotovoltaica</option>
                                                    <option value="Outro">Outro</option>
                                                </select>

                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="city-column">Tipo de Inversor</label>
                                            <select name="tipoInversor" class="form-select" id="type">
                                                <option value="central">Central</option>
                                                <option value="microinversor">MicroInversor</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="country-floating">Qtd de Inversores</label>
                                            <input type="number" id="country-floating" class="form-control"
                                                name="qtd_inversores"  value="1">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="tamanhoInversor">Tamanho Inversor W</label>
                                            <input type="text" id="company-column" class="form-control"
                                            name="tamanhoInversor">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="company-column">Valor Material</label>
                                            <input type="number" id="company-column" class="form-control"
                                                name="valor_material" >
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="email-id-column">Valor Instalação</label>
                                            <input type="number" id="email-id-column" class="form-control"
                                                name="valor_instalacao" >
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="company-column">Valor Total</label>
                                            <input type="number" id="company-column" class="form-control"
                                                name="valor_total">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="email-id-column">Forma de Pagamento</label>
                                            <select name="tipo_pagamento" class="form-select" id="estado">
                                                <option value="a vista">À Vista</option>
                                                <option value="financiado">Financiado</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="inlineRadioOptions" class="mx-1">Entrada (R$): </label>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="entrada" id="inlineRadio1" value="false" checked>
                                                <label class="form-check-label" for="inlineRadio1">Sem Entrada</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="entrada" id="inlineRadio2" value="true">
                                                <label class="form-check-label" for="inlineRadio2">Com Entrada</label>
                                            </div>
                                            {{-- <label for="valorEntrada">Valor de Entrada</label>
                                            <input type="number" id="valorEntrada" class="form-control" name="valor_Entrada"> --}}
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="qtd_parcelas">Qtd. Parcelas</label>
                                            <input type="number" id="qtd_parcelas" class="form-control" name="qtd_parcelas">
                                        </div>
                                    </div>

                                    <input type="hidden" name="client_id" value="{{$client->id}}">

                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">Limpar</button>
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Salvar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
