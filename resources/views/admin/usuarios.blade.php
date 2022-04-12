<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Usuários</h3>
                <p class="text-subtitle text-muted">Aqui você pode editar, deletar ou atribuir funções</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">Administração / todos usuários</li>
                    </ol>
                </nav>
            </div>
        </div>
    </x-slot>


    <section class="section">
        <div class="card">
            <div class="card-body">
                <!-- table bordered -->
                <div class="table-responsive">
                    <table class="table table-bordered mb-0 table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nome</th>
                                <th>Setor</th>
                                <th>Email</th>
                                <th>Direcionado para</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>
                                        <a href="{{route('admin.usuarios.editPermission', ['id'=> $user['id']])}}">
                                            <i class="the-icon"><span class="fa-fw select-all fas"></span></i>
                                        </a>
                                    </td>
                                    <td class="text-bold-500">{{$user['name']}}</td>
                                    <td>{{$user['sector']}}</td>
                                    <td class="text-bold-500">{{$user['email']}}</td>
                                    <td>{{$user['redirect_to_page']}}</td>
                                    <td>
                                        <div class="in-line">
                                            <a href="{{route('admin.usuarios.edit', ['id'=> $user['id']])}}">
                                                <i class="the-icon"><span class="fa-fw fa-1x pl-2 select-all fas"></span></i>
                                            </a>
                                            <i class="the-icon"><span class="fa-fw fa-1x pl-2 select-all fas"></span></i>
                                        </div>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
