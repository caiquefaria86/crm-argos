<script src="{{ mix('js/app.js') }}"></script>

<script src="{{ asset('/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('/vendors/tinymce/tinymce.min.js') }}"></script>
<script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
<script src="{{asset('js/extensions/sweetalert2.js')}}"></script>
<script src="{{asset('vendors/sweetalert2/sweetalert2.all.min.js')}}"></script>

@if (Session::has('success'))
    <script>
        swal("Sucesso", "{!! Session::get('success') !!}", "success"{
            button:"OK",
        });
    </script>
@endif

<script src="{{ asset('/js/bootstrap.bundle.min.js') }}"></script>

@livewireScripts
<script src="{{ asset('/js/main.js') }}"></script>

{{ $script ?? ''}}
