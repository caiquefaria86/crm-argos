<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Editar permissões</h3>
                <h4 class="text-muted">Usuário: {{$data->name}}</h4>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">Administração / permissões / {{$data->name}}</li>
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
                                <form class="form" method="POST" action="{{route('admin.usuarios.updatePermission')}}">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-md-12 col-12">
                                            <div class="form-check form-switch">

                                                <input name="admin" class="form-check-input" type="checkbox" role="switch" id="Administrador"
                                                @if ($data->admin) value="true" checked @endif >
                                                <label class="form-check-label" for="Administrador">Administrador</label>
                                                <p class="text-muted">[ Acesso a todas as telas e sem restrição ]</p>
                                            </div>
                                            <div class="form-check form-switch">
                                                <input name="commercial" class="form-check-input" type="checkbox" role="switch" id="Comercial"
                                                @if ($data->commercial) value="true" checked @endif >
                                                <label class="form-check-label" for="Comercial">Comercial</label>
                                                <p class="text-muted">[ Acesso a telas de Leads, Contatos e Fechamentos, Orçamentos, contratos ]</p>
                                            </div>
                                            <div class="form-check form-switch">
                                                <input name="suport" class="form-check-input" type="checkbox" role="switch" id="Suporte"
                                                @if ($data->suport) value="true" checked @endif >
                                                <label class="form-check-label" for="Suporte">Suporte / Obras</label>
                                                <p class="text-muted">[ Acesso a telas de Acompanhamento de obras, Pós-Venda ]</p>
                                            </div>
                                            <div class="form-check form-switch">
                                                <input name="engineering" class="form-check-input" type="checkbox" role="switch" id="Engenharia"
                                                @if ($data->engineering) value="true" checked @endif >
                                                <label class="form-check-label" for="Engenharia">Engenharia</label>
                                                <p class="text-muted">[ Acesso a telas de engenharia, projetos,  ]</p>
                                            </div>
                                            <input type="hidden" name="id" value="{{$data->id}}">
                                        </div>
                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="reset" class="btn btn-light-secondary me-1 mb-1">Zerar Permissões</button>
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
