<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3><a href="{{route('admin.tags.groups')}}" class="btn btn-sm btn-secondary">Voltar</a> Editar Tag: {{$tag->text}}</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">Administração / todas etiquetas / Editar / {{$tag->text}}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </x-slot>


    <section class="section">
        <div class="card">
            <div class="card-body">
                <form action="{{route('admin.tags.update')}}" method="POST">
                    @csrf @method('PUT')
                    <div class="form-row">
                      <div class="col-md-12 mb-3">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Categoria</label>
                            <select class="form-control" id="" name="category">
                              <option value="{{$tag->category}}" selected>{{$tag->category}}</option>
                              <option value="comercial">Comercial</option>
                              <option value="engenharia">Engenharia</option>
                              <option value="adm">Administração</option>
                            </select>
                          </div>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="col-md-12 mb-3">
                        <label for="validationDefault03">Texto (Max 12 caracteres)</label>
                        <input type="text" name="text" value="{{$tag->text}}" class="form-control" id="" required>
                      </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                          <label for="validationDefault03">Cor de Fundo</label>
                          <input type="color" name="color" value="{{$tag->color}}" class="form-control" id="" required>
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="col-md-4 mb-3">
                          <label for="validationDefault03">Cor do texto</label>
                          <input type="color" name="text_color" value="{{$tag->text_color}}" class="form-control" id="" required>
                        </div>
                      </div>
                      <input type="hidden" value="{{$tag->id}}" name="tag_id">
                    <button class="btn btn-primary" type="submit">Salvar Etiqueta</button>
                  </form>

            </div>
        </div>
    </section>
</x-app-layout>
