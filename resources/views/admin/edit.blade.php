<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Editando Usuário</h3>
                <p class="text-subtitle text-muted">{{$data->name}}</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">Administração / editar / {{$data->name}}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </x-slot>


    <section class="section">
        <div class="card">
            <div class="card-body">
                <div class="col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form" method="POST" action="{{route('admin.usuarios.update')}}">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="first-name-column">Nome</label>
                                                <input type="text" id="first-name-column" class="form-control"
                                                    placeholder="Nome" name="name" value="{{$data->name}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="last-name-column">E-mail</label>
                                                <input type="text" id="last-name-column" class="form-control"
                                                    placeholder="email" name="email" value="{{$data->email}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="city-column">Setor</label>
                                                    <input type="text" id="last-name-column" class="form-control"
                                                        placeholder="Setor" name="sector" value="{{$data->sector}}">

                                                </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="country-floating">Direciona para:</label>
                                                <input type="text" id="country-floating" class="form-control"
                                                    name="redirect_to_page" placeholder="Direciona para" value="{{$data->redirect_to_page}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="email-id-column">Data de Cadastro:</label>
                                                <input type="datetime" class="form-control"
                                                    name="created_at" placeholder="Data de Cadastro" value="{{$data->created_at}}" readonly>
                                            </div>
                                            <input type="hidden" name="id" value="{{$data->id}}">
                                        </div>
                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="reset" class="btn btn-light-secondary me-1 mb-1">Limpar</button>
                                            <button type="submit" class="btn btn-primary me-1 mb-1">
                                                <i class="the-icon"><span class="fa-fw select-all fas"></span></i> Salvar Alteraçôes
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
