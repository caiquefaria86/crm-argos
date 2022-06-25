<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Bem Vindo Ao CRM Argos</h3>
                {{-- <p class="text-subtitle text-muted"></p> --}}
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">Bem Vindo</li>
                    </ol>
                </nav>
            </div>
        </div>
    </x-slot>


    <section class="section">
        <div class="card">
            <div class="card-header">
                {{-- <h4 class="card-title">Seja bem vindo ao CRM da Argos</h4> --}}
            </div>
            <div class="card-body">
                <p>
                Caso você ainda não tenhas as permissões contate administrador para lhe conceder permissão.
                Caso já tenha acesso ao menus, aproveite o CRM pensado e desenvolvido para você ter mais produtividade.
                </p>
            </div>
        </div>
    </section>
</x-app-layout>
