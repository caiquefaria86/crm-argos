<x-app-layout>

    <x-slot name="header">
    </x-slot>
    @section('stylePersonalizado')
        <link rel="stylesheet" href="{{ asset('css/pages/board.css') }}">
        <link rel="stylesheet" href="{{ asset('vendors/toastify/toastify.css') }}">

        <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
        <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet">

        <link rel="stylesheet" href="{{asset('vendors/simple-datatables/style.css')}}">

        <meta name="csrf-token" content="{{ csrf_token() }}" />
        @endsection
        @section('scriptsPersonalizado')
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

            <script src="{{ asset('vendors/toastify/toastify.js') }}"></script>
    @endsection

    <section class="section">
        <div class="card">
            <div class="card-body">
                <table class="table table-striped table-hover" id="table1">
                    <thead>
                        <tr>
                            <th>Status</th>
                            <th>Name:</th>
                            <th>Cidade:</th>
                            <th>Telefone:</th>
                            <th>Origem</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($contacts->reverse() as $contact)

                            @if ($contact->status)
                                <tr>
                                    <td>
                                        <span class="badge bg-success">Ativo</span>
                                    </td>
                                    <td>{{$contact->name}}</td>
                                    <td>{{$contact->city}}</td>
                                    <td>{{$contact->cellphone}}</td>
                                    <td>{{$contact->origin}}</td>
                                </tr>
                            @else
                                <tr class="table-danger">
                                    <td>
                                        <span class="badge bg-danger">Arquivado</span>
                                    </td>

                                    <td>{{$contact->name}}</td>
                                    <td>{{$contact->city}}</td>
                                    <td>{{$contact->cellphone}}</td>
                                    <td>{{$contact->origin}}</td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </section>
</div>

        </div>
    </div>
<script src="{{asset('vendors/simple-datatables/simple-datatables.js')}}"></script>
<script>
    // Simple Datatable
    let table1 = document.querySelector('#table1');
    let dataTable = new simpleDatatables.DataTable(table1);
</script>



</x-app-layout>
