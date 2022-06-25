<x-app-layout>

    <x-slot name="header">
    </x-slot>
    @section('stylePersonalizado')
        <link rel="stylesheet" href="{{ asset('css/pages/board.css') }}">
        <link rel="stylesheet" href="{{ asset('vendors/toastify/toastify.css') }}">

        <link rel="stylesheet" href="{{asset('vendors/simple-datatables/style.css')}}">

        <meta name="csrf-token" content="{{ csrf_token() }}" />
        @endsection
        @section('scriptsPersonalizado')
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

            <script src="{{ asset('vendors/toastify/toastify.js') }}"></script>
    @endsection


    <div class="page-heading">
        <h3>Relatório Comercial - {{$mes}}</h3>
        <div class="py-2">
            <button class="btn btn-primary dropdown-toggle me-1" type="button"
                id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">
                {{$mes}} / {{$ano}}
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="{{route('comercial.report', ['mes'=> '06', 'ano'=> '2022'])}}">Junho / 2022</a>
                <a class="dropdown-item" href="{{route('comercial.report', ['mes'=> '05', 'ano'=> '2022'])}}">Maio / 2022</a>
                <a class="dropdown-item" href="{{route('comercial.report', ['mes'=> '04', 'ano'=> '2022'])}}">Abril / 2022</a>
                <a class="dropdown-item" href="{{route('comercial.report', ['mes'=> '03', 'ano'=> '2022'])}}">Março / 2022</a>
                <a class="dropdown-item" href="{{route('comercial.report', ['mes'=> '02', 'ano'=> '2022'])}}">Fevereiro / 2022</a>
            </div>
        </div>
    </div>
    <div class="page-content">
        <section class="row">
            <div class="col-12 col-lg-9">
                <div class="row">
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-3 py-4-5">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="stats-icon purple">
                                            <i class="iconly-boldShow"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <h6 class="text-muted font-semibold">R$ Total</h6>
                                        <h6 class="font-extrabold mb-0">{{number_format($totalSalesMouth, 2, ',', '.');}}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-3 py-4-5">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="stats-icon blue">
                                            <i class="iconly-boldProfile"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <h6 class="text-muted font-semibold">R$ Instal.</h6>
                                        <h6 class="font-extrabold mb-0">{{number_format($totalValorInstMouth, 2, ',', '.');}}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-3 py-4-5">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="stats-icon green">
                                            <i class="iconly-boldAdd-User"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <h6 class="text-muted font-semibold">% Fecham.</h6>
                                        <h6 class="font-extrabold mb-0">{{number_format($porcSales, 2, ',', '.');}}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-3 py-4-5">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="stats-icon red">
                                            <i class="iconly-boldBookmark"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <h6 class="text-muted font-semibold">T. Médio</h6>
                                        <h6 class="font-extrabold mb-0">{{number_format($ticketMedio, 2, ',', '.');}}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-3 py-4-5">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="stats-icon purple">
                                            <i class="iconly-boldShow"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <h6 class="text-muted font-semibold">Total de Contatos</h6>
                                        <h6 class="font-extrabold mb-0">{{$totalContacts}}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-3 py-4-5">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="stats-icon blue">
                                            <i class="iconly-boldProfile"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <h6 class="text-muted font-semibold">Orç. Apresentado</h6>
                                        <h6 class="font-extrabold mb-0">{{$totalOrcSents}}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-3 py-4-5">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="stats-icon green">
                                            <i class="iconly-boldAdd-User"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <h6 class="text-muted font-semibold">Projetos em Negociação</h6>
                                        <h6 class="font-extrabold mb-0">{{$totalNegociation}}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-3 py-4-5">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="stats-icon red">
                                            <i class="iconly-boldBookmark"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <h6 class="text-muted font-semibold">Projetos Fechados</h6>
                                        <h6 class="font-extrabold mb-0">{{$qtdProjectSales}}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Contatos Diarios Iniciados em {{$mes}}</h4>
                            </div>
                            <div class="card-body">
                                <div id="chart-profile-visit"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-xl-4">
                        <div class="card">
                            <div class="card-header">
                                <h4>Desempenho por pessoa</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="d-flex align-items-center">
                                            <svg class="bi text-primary" width="32" height="32" fill="blue"
                                                style="width:10px">
                                                <use
                                                    xlink:href="assets/vendors/bootstrap-icons/bootstrap-icons.svg#circle-fill" />
                                            </svg>
                                            <h5 class="mb-0 ms-3">Pamela</h5>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <h5 class="mb-0">45</h5>
                                    </div>
                                    <div class="col-12">
                                        <div id="chart-europe"></div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <div class="d-flex align-items-center">
                                            <svg class="bi text-success" width="32" height="32" fill="blue"
                                                style="width:10px">
                                                <use
                                                    xlink:href="assets/vendors/bootstrap-icons/bootstrap-icons.svg#circle-fill" />
                                            </svg>
                                            <h5 class="mb-0 ms-3">Douglas</h5>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <h5 class="mb-0">65</h5>
                                    </div>
                                    <div class="col-12">
                                        <div id="chart-america"></div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-6">
                                        <div class="d-flex align-items-center">
                                            <svg class="bi text-danger" width="32" height="32" fill="blue"
                                                style="width:10px">
                                                <use
                                                    xlink:href="assets/vendors/bootstrap-icons/bootstrap-icons.svg#circle-fill" />
                                            </svg>
                                            <h5 class="mb-0 ms-3">Suelen</h5>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <h5 class="mb-0">64</h5>
                                    </div>
                                    <div class="col-12">
                                        <div id="chart-indonesia"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-xl-8">
                        <div class="card">
                            <div class="card-header">
                                <h4>Útimos Clientes | <a href="{{route('comercial.client.index')}}">Ver Todos</a></h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-lg">
                                        <thead>
                                            <tr>
                                                <th>Nome</th>
                                                <th>Cidade</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($lastClients as $client)
                                            <tr>
                                                <td class="col-3">
                                                    <div class="d-flex align-items-center">
                                                        <p class="font-bold ms-3 mb-0">{{$client->name}}</p>
                                                    </div>
                                                </td>
                                                <td class="col-auto">
                                                    <p class=" mb-0">{{$client->cidade}}</p>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-3">
                <div class="card">
                    <div class="card-body py-4 px-5">
                        <div class="d-flex align-items-center">
                            <div class="avatar bg-danger me-3">
                                <span class="avatar-content">PC</span>
                            </div>
                            <div class="ms-3 name">
                                <h5 class="font-bold">1º Vendas</h5>
                                <h6 class="text-muted mb-0">Pamela Costa</h6>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="card">
                    <div class="card-header">
                        <h4>Recent Messages</h4>
                    </div>
                    <div class="card-content pb-4">
                        <div class="recent-message d-flex px-4 py-3">
                            <div class="avatar avatar-lg">
                                <img src="assets/images/faces/4.jpg">
                            </div>
                            <div class="name ms-4">
                                <h5 class="mb-1">Hank Schrader</h5>
                                <h6 class="text-muted mb-0">@johnducky</h6>
                            </div>
                        </div>
                        <div class="recent-message d-flex px-4 py-3">
                            <div class="avatar avatar-lg">
                                <img src="assets/images/faces/5.jpg">
                            </div>
                            <div class="name ms-4">
                                <h5 class="mb-1">Dean Winchester</h5>
                                <h6 class="text-muted mb-0">@imdean</h6>
                            </div>
                        </div>
                        <div class="recent-message d-flex px-4 py-3">
                            <div class="avatar avatar-lg">
                                <img src="assets/images/faces/1.jpg">
                            </div>
                            <div class="name ms-4">
                                <h5 class="mb-1">John Dodol</h5>
                                <h6 class="text-muted mb-0">@dodoljohn</h6>
                            </div>
                        </div>
                        <div class="px-4">
                            <button class='btn btn-block btn-xl btn-light-primary font-bold mt-3'>Start
                                Conversation</button>
                        </div>
                    </div>
                </div> --}}
                <div class="card">
                    <div class="card-header">
                        <h4>% de Pessoas</h4>
                    </div>
                    <div class="card-body">
                        <div id="chart-visitors-profile"></div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4>% de Pessoas</h4>
                    </div>
                    <div class="card-body">
                        <div id="chart-visitors-profile"></div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script src="{{asset('vendors/simple-datatables/simple-datatables.js')}}"></script>
<script src="{{asset('vendors/apexcharts/apexcharts.js')}}"></script>
<script src="{{asset('js/pages/dashboard.js')}}"></script>

<script>
    var optionsProfileVisit = {
	annotations: {
		position: 'back'
	},
	dataLabels: {
		enabled:false
	},
	chart: {
		type: 'bar',
		height: 300
	},
	fill: {
		opacity:0.8
	},
	plotOptions: {
	},
	series: [{
		name: 'Total Contatos',
		data: [
            @foreach ($chartContactDiaries as $totalContact)
                {{$totalContact}},
            @endforeach
        ]
	}],
	colors: '#435ebe',
	xaxis: {
		// categories: ["Jan","Feb","Mar","Apr","May","Jun","Jul", "Aug","Sep","Oct","Nov","Dec"],
		categories: [
            @for ($i = 1; $i < 32; $i++)
                "{{$i}}",
            @endfor
        ],
	},
}

var chartProfileVisit = new ApexCharts(document.querySelector("#chart-profile-visit"), optionsProfileVisit);
chartProfileVisit.render();
</script>




</x-app-layout>
