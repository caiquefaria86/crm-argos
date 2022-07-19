<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                {{-- <a href="{{route('admin.tags.groups')}}" class="btn btn-sm btn-secondary">Voltar</a> --}}
                <h3> Todas as Camapanhas <a href="{{route('admin.campaign.new')}}" class="btn btn-sm btn-secondary">Nova</a></h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">Administração / Campanhas</li>
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
                                <th>Status</th>
                                <th>Nome Campanha</th>
                                <th>total de Pessoas</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($campaigns as $c)
                                <tr>
                                    <td>
                                        @if ($c->status)
                                            Ativo
                                        @else
                                            Desativar
                                        @endif
                                    </td>
                                    <td>{{$c->text}}</td>
                                    <td>{{$c->count}}</td>
                                    <td>
                                        <div class="in-line">
                                            <form class="in-line" method="POST" action="{{route('admin.campaign.destroy', ['id'=> $c->id ])}}">
                                                @csrf
                                                @method('delete')

                                                <a href="{{route('admin.campaign.edit',['campaign_id'=> $c->id])}}">
                                                    <i class="the-icon"><span class="fa-fw fa-1x pl-2 select-all fas"></span></i>
                                                </a>
                                                <button type="submit" class="btn btn-transparent">
                                                    <i class="the-icon"><span class="fa-fw fa-1x pl-2 select-all fas"></span></i>
                                                </button>
                                            </form>
                                        </div>

                                    </td>
                                </tr>
                            @empty
                            <td colspan="4">
                                Não há nenhuma campanha cadastrada
                            </td>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
