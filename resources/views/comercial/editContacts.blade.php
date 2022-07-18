<div class="modal-header">

    <h5 class="modal-title" id="myModalLabel1">Editar Contato - {{$data->name}}</h5>
    {{-- <button type="button" class="close rounded-pill" data-bs-dismiss="modal"
    aria-label="Close">
    <i data-feather="x"></i>
</button> --}}
    <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form class="form" name="form-edit-contato" id="formEditContact" method="POST">
    @csrf
    <div class="modal-body">
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <div id="errorform"
                            class="alert alert-light-danger color-danger alert-dismissible fade show d-none"
                            role="alert"><i class="bi bi-exclamation-circle"></i>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                        <div class="row" id="linhaEsconder">
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="first-name-column">Nome</label>
                                    <input type="text" id="name" class="form-control border-2"
                                        placeholder="" name="name" value="{{$data->name}}" selected required>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="cellphone">Telefone:</label>
                                    <input type="text" id="cellphone" class="form-control border-2"
                                        name="cellphone" placeholder="" value="{{$data->cellphone}}" required>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="city">Cidade</label>
                                    <input type="text" id="city-column" class="form-control border-2"
                                        placeholder="" name="city" value="{{$data->city}}" required>
                                </div>
                            </div>

                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" id="email" class="form-control border-2"
                                        name="email" placeholder="" value="{{$data->email}}" >
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="origin">Origem do contato:</label>
                                    <div class="input-group">
                                        <label class="input-group-text"
                                                for="basicSelect">Campanhas</label>
                                        <select name="origin" class="form-select" id="basicSelect"
                                            required>
                                            <option value="{{$data->origin}}" selected>{{$data->origin}}</option>
                                            @forelse ($campanhas as $campanha )
                                                <option value="{{$campanha->text}}">{{$campanha->text}}</option>
                                            @empty
                                                <option value="Usuario comun">Usuário Comum</option>
                                            @endforelse
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="seller">Vendedor:</label>
                                    <input type="text" name="seller" id="seller" value="{{$data->seller}}" class="form-control border-2">
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="responsible_id">Escritório:</label>
                                    <div class="input-group mb-3">
                                        <label class="input-group-text"
                                            for="responsible_id">Unidade:</label>
                                        <select required name="responsibleOffice" class="form-select"
                                            id="responsible_id">
                                                <option value="{{$data->responsibleOffice}}" selected>{{$data->responsibleOffice}}</option>
                                                <option value="Rio Preto">São José do Rio Preto (Matris)</option>
                                                <option value="Ouroeste">Ouroeste</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" name="contact_id" value="{{$data->id}}">
    <div class="modal-footer">
        <button type="button" class="btn" data-bs-dismiss="modal">
            <i class="bx bx-x d-block d-sm-none"></i>
            <span class="d-none d-sm-block">Fechar</span>
        </button>
        <button type="submit" class="btn btn-primary ml-1" id="btn-save">
            <i class="bx bx-check d-block d-sm-none"></i>
            <span class="d-none d-sm-block">Edições Concluidas</span>
        </button>
</form>
