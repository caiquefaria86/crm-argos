<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3><a href="{{route('admin.tags.groups')}}" class="btn btn-sm btn-secondary">Voltar</a> Nova Camapanha</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">Administração / todas Campanhas / Nova Campanha</li>
                    </ol>
                </nav>
            </div>
        </div>
    </x-slot>


    <section class="section">
        <div class="card">
            <div class="card-body">
                <form action="{{route('admin.campaign.store')}}" method="POST">
                    @csrf
                    <div class="form-row">
                      <div class="col-md-12 mb-3">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Status</label>
                            <select class="form-control" id="" name="status">
                              <option value="1" selected>Ativada</option>
                              <option value="0">Desativada</option>
                            </select>
                          </div>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="col-md-12 mb-3">
                        <label for="">Nome da Campanha</label>
                        <input type="text" name="text" class="form-control" id="" required>
                      </div>
                    </div>
                    <button class="btn btn-primary" type="submit">Salvar Campanha</button>
                  </form>

            </div>
        </div>
    </section>
</x-app-layout>
