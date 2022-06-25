<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Gerenciamento de etiquetas</h3>
                <p class="text-subtitle text-muted">Aqui você pode editar, deletar ou adicionar etiquetas novas</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">Administração / todas etiquetas</li>
                    </ol>
                </nav>
            </div>
        </div>
    </x-slot>


    <section class="section">
        <div class="card">
            <div class="card-body">

                <a href="{{route('admin.tags.new')}}" class="btn btn-success m-2">Adicionar Etiqueta</a>
                <!-- table bordered -->
                <div class="table-responsive">
                    <table class="table table-bordered mb-0 table-hover">
                        <thead>
                            <tr>
                                <th>Categoria</th>
                                <th>Text</th>
                                <th>Cor</th>

                                <th>Dia Criação</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($allTags as $tag)
                                <tr style="background-color: {{$tag->color}}; color:{{$tag->text_color}}">
                                    <td class="text-bold-500">{{$tag->category}}</td>
                                    <td class="text-bold-500">{{$tag->text}}</td>
                                    <td>{{$tag->color}}</td>
                                    <td>{{$tag->created_at}}</td>
                                    <td>
                                        <div class="in-line">
                                            <form class="in-line" method="POST" action="{{route('admin.tags.destroy', ['id'=> $tag->id])}}">
                                                @csrf @method('delete')
                                                <a href="{{route('admin.tags.edit', ['id' => $tag->id])}}"  style="color: {{$tag->text_color}}">
                                                    <i class="the-icon"><span class="fa-fw fa-1x pl-2 select-all fas"></span></i>
                                                </a>
                                                <button type="submit" class="btn btn-transparent" style="color: {{$tag->text_color}}">
                                                    <i class="the-icon"><span class="fa-fw fa-1x pl-2 select-all fas"></span></i>
                                                </button>
                                            </form>
                                        </div>

                                    </td>
                                </tr>
                                @empty

                                <tr>
                                    <td colspan="5" align="center">
                                        Não há nenhuma etiqueta cadastrada! Clique no botão verde a cima e cadastre sua primeira etiqueta
                                    </td>
                                </tr>

                                @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
