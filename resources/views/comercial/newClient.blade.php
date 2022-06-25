<x-app-layout>
    <x-slot name="header">
        <div class="row">
        </div>
    </x-slot>

    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Novo Cliente</h3>
                        <p>Preencha os campos, todos marcados com " * " São obrigatórios</p>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" method="POST" action="{{route('comercial.client.store')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="inlineRadioOptions" class="mx-1">Tipo de cadastro: </label>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="type" id="inlineRadio1" value="cpf" checked>
                                                <label class="form-check-label" for="inlineRadio1">Pessoa Fisica</label>
                                              </div>
                                              <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="type" id="inlineRadio2" value="cnpj">
                                                <label class="form-check-label" for="inlineRadio2">Pessoa Jurídica</label>
                                              </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Nome Completo / Razão Social</label>
                                            <input type="text" id="first-name-column" class="form-control"
                                                placeholder="Nome Completo / Razão Social" name="name" value="{{$contact->name}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="last-name-column">CPF / CNPJ</label>
                                            <input type="number" id="last-name-column" class="form-control" name="cpf">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="city-column">RG</label>
                                            <input type="text" id="city-column" class="form-control" name="rg">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="country-floating">E-mail</label>
                                            <input type="email" id="country-floating" class="form-control"
                                                name="email"  value="{{$contact->email}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="estado">Telefone Celular</label>
                                            <input type="text" id="company-column" class="form-control"
                                            name="cellphone"  value="{{$contact->cellphone}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="company-column">CEP</label>
                                            <input type="text" id="company-column" class="form-control"
                                                name="cep" >
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="email-id-column">Rua</label>
                                            <input type="text" id="email-id-column" class="form-control"
                                                name="rua" >
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="company-column">Numero</label>
                                            <input type="text" id="company-column" class="form-control"
                                                name="numero">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="email-id-column">Bairro</label>
                                            <input type="text" id="email-id-column" class="form-control"
                                                name="bairro" >
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="company-column">Cidade</label>
                                            <input type="text" id="company-column" class="form-control"
                                                name="cidade" value="{{$contact->city}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="estado">Estado</label>

                                                <select name="estado" class="form-select" id="estado">
                                                    <option value="SP">SP</option>
                                                    <option value="MS">MS</option>
                                                    <option value="MG">MG</option>
                                                    <option value="RJ">RJ</option>
                                                </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="company-column">Origem do contato</label>
                                            <input type="text" id="company-column" class="form-control"
                                                name="origin" value="{{$contact->origin}}" disabled>
                                        </div>
                                    </div>
                                    <h4 class="mt-5">Arquivos Obrigatórios</h4>
                                    <hr>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="company-column">CHN / Similar</label>
                                            <input type="file" id="cnh-cliente" class="form-control" name="cnh-cliente[]" multiple>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="company-column">Comprovante Residencia</label>
                                            <input type="file" id="cnh-cliente" class="form-control" name="compResidencia[]" multiple>
                                        </div>
                                    </div>

                                    <input type="hidden" name="contact_id" value="{{$contact->id}}">

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
