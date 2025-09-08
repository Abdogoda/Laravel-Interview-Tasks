@if (session()->has('success'))
    <script>
        toastr.success("{{ session('success') }}");
    </script>
@endif

@if (session()->has('error'))
    <script>
        toastr.error("{{ session('error') }}");
    </script>
@endif

@if(session()->has('info'))
    <script>
        toastr.info("{{ session('info') }}");
    </script>
@endif

@if(session()->has('warning'))
    <script>
        toastr.warning("{{ session('warning') }}");
    </script>
@endif

@if($errors->any())
    @foreach ($errors->all() as $error)
        <script>
            toastr.error("{{ $error }}");
        </script>
    @endforeach
@endif