<script src="{{ mix('js/app.js') }}"></script>

<script src="{{ asset('/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('/vendors/tinymce/tinymce.min.js') }}"></script>
<script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js"></script>
<script src="{{asset('vendors/sweetalert2/sweetalert2.all.min.js')}}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

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
