<x-app-layout>
    <x-slot name="header">
        <div class="row">
        </div>
    </x-slot>
    @section('scriptsPersonalizado')
        <script src="{{asset('vendors/jquery/jquery.min.js')}}"></script>
        <script src="{{asset('js/bootstrap.min.js')}}"></script>
    @endsection

    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Cadastro de novo projeto para o cliente : {{ $client->name }}</h3>
                        <p>Preencha os campos, todos marcados com " * " São obrigatórios</p>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" method="POST" action="{{ route('comercial.project.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Data de Fechamento</label>
                                            <input type="date" id="first-name-column" class="form-control"
                                                name="data_fechamento">
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
                                                name="qtd_inversores" value="1">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="tamanhoInversor">Tamanho Sistema W</label>
                                            <input type="text" id="company-column" class="form-control"
                                                name="tamanhoSistema">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="company-column">Valor Material</label>
                                            <input type="number" id="company-column" class="form-control"
                                                name="valor_material">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="email-id-column">Valor Instalação</label>
                                            <input type="number" id="email-id-column" class="form-control"
                                                name="valor_instalacao">
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
                                            <label for="inlineRadioOptions" class="mx-1">Entrada (R$):
                                            </label>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="entrada"
                                                    id="inlineRadio1" value="false" checked>
                                                <label class="form-check-label" for="inlineRadio1">Sem Entrada</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="entrada"
                                                    id="inlineRadio2" value="true">
                                                <label class="form-check-label" for="inlineRadio2">Com Entrada</label>
                                            </div>
                                            {{-- <label for="valorEntrada">Valor de Entrada</label>
                                            <input type="number" id="valorEntrada" class="form-control" name="valor_Entrada"> --}}
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="qtd_parcelas">Qtd. Parcelas</label>
                                            <input type="number" id="qtd_parcelas" class="form-control"
                                                name="qtd_parcelas">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="card">
                                                <div class="form-group">
                                                    <label for="contentFormPayment"> Descrição detalhada da forma de pagamento: (opcional)</label>
                                                    <textarea class="form-control"  name="contentFormPayment" id="contentFormPayment" rows="2"></textarea>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <h5 class="">Arquivos</h5>
                                        <hr>

                                        <label for="">Upload da Proposta Final:</label>
                                        <input type="file" class="form-control" id="novaProposta" name="propostafinal[]" multiple>

                                        <label class="mt-3" for="novacnh">Conta da Unidade Geradora:</label>
                                        <input type="file" class="form-control" id="novacnh" name="contaUnidGeradora[]" multiple>

                                        <p class="mt-5">Titular da conta geradora é o mesmo do cliente?</p>

                                        @php
                                            $i = 1;
                                        @endphp

                                        @forelse ($uploadFiles as $upload)
                                            @if ($upload->type == 'cnh-cliente')
                                                <a href="{{ env('APP_URL') }}/storage/{{ $upload->path }}"
                                                    class="btn btn-danger btn-sm px-3"
                                                    download="Proposta-{{ $client->name }}.pdf">CNH Aquivo
                                                    ({{ $i }})</a></li>
                                                @php $i++; @endphp
                                            @endif
                                        @empty
                                            <p>Não há upload deste contato</p>
                                        @endforelse

                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="mesmacnh" id="mesmaCnhSim" value="sim" checked>
                                            <label class="form-check-label" for="mesmaCnhSim">
                                                Sim
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="mesmacnh" id="mesmaCnhNao" value="nao">
                                            <label class="form-check-label" for="mesmaCnhNao">
                                                Não
                                            </label>
                                        </div>
                                        <div class="form-group border rounded p-2 mt-3 d-none" id="input-cnh-new">
                                            <div class="form-group">
                                                <label for="first-name-column">Nome Completo</label>
                                                <input type="text" id="first-name-column" class="form-control" name="nome-resp-project">
                                            </div>

                                            <div class="form-group">
                                                <label for="first-name-column">CPF</label>
                                                <input type="text" id="first-name-column" class="form-control" name="cpf-resp-project">
                                            </div>

                                            <label for="novacnh">Inserir Nova CNH</label>
                                            <input type="file" class="form-control" id="novacnh[]" multiple>
                                        </div>
                                        <p class="mt-5">Haverá Beneficiárias</p>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="beneficiarias" id="beneficiariasSim" value="sim">
                                            <label class="form-check-label" for="mesmaCnhSim">
                                                Sim
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="beneficiarias" id="beneficiariasNao" value="nao" checked>
                                            <label class="form-check-label" for="mesmaCnhNao">
                                                Não
                                            </label>
                                        </div>
                                        <div class="form-group border rounded p-2 mt-3 d-none" id="qtd-beneficiarias">
                                            <div class="form-group">
                                                <label for="first-name-column">Quantidade</label>
                                                <input type="numero" id="n-qtd-value" class="form-control" name="n-qtd-value">
                                            </div>
                                            <button class="btn btn-sm btn-primary" id="gerar-campos-beneficiarias">Gerar Campos</button>
                                        </div>
                                        <div class="p-2" id="beneficiarias"></div>

                                    </div>


                                    <input type="hidden" name="client_id" value="{{ $client->id }}">

                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">Limpar</button>
                                        <button type="submit" class="btn btn-primary me-1 mb-1" id="salvar-form">Salvar Novo Projeto</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        $(function(){

            $("#salvar-form").click(function() {
                $(this).attr('disabled');
                $(this).html('<div class="spinner-border text-light spinner-border-sm" role="status"><span class="sr-only">Loading...</span></div> Salvando...');
            });

            $("#mesmaCnhNao").click(function(){
                // console.log('clicou no checkbox');
                $("#input-cnh-new").removeClass('d-none');
            });
            $("#mesmaCnhSim").click(function(){
                // console.log('clicou no checkbox');
                $("#input-cnh-new").addClass('d-none');
            });

            $("#beneficiariasSim").click(function(){
                // console.log('clicou no checkbox');
                $("#qtd-beneficiarias").removeClass('d-none');
            });
            $("#beneficiariasNao").click(function(){
                // console.log('clicou no checkbox');
                $("#qtd-beneficiarias").addClass('d-none');
            });

            $("#gerar-campos-beneficiarias").click(function(event){
                event.preventDefault();
                $('.beneficiarias-content').remove();
                var qtd_benef = $("#n-qtd-value").val();
                // console.log(qtd_benef);
                for(var i = 1; i <= qtd_benef; i++){
                    $('#beneficiarias').append($('<div class="form-group border rounded p-2 mt-3" class="beneficiarias-content" id="beneficiarias-content"><div class="form-group"><label for="first-name-column">Nome Beneficiaria '+i+'</label><input type="text" id="first-name-column" class="form-control" name="beneficiaria-nome-'+i+'"></div><label for="novacnh">Inserir Conta Beneficiária '+i+'</label><input type="file"  class="form-control" id="" name="beficiaria-file-'+i+'"></div>'));
                }
            });


            // beneficiariasSim
            // gerar-campos-beneficiarias

            // <div class="form-group border rounded p-2 mt-3" id="beneficiarias-content">
            //     <div class="form-group">
            //         <label for="first-name-column">Nome Beneficiaria</label>
            //         <input type="text" id="first-name-column" class="form-control" name="nome-resp-project">
            //     </div>
            //     <label for="novacnh">Inserir Conta Beneficiária XX</label>
            //     <input type="file" class="form-control" id="" name="XX">
            // </div>


            // id
            // id_project
            // id_client
            // name
            // path


        });
    </script>
</x-app-layout>
