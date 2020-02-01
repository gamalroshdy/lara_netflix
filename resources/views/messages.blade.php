@if (session('success'))
    <script>
        new Noty({
            type: 'success',
            layout: 'topRight',
            text: "{{ session('success') }}",
            timeout: 5000,
            killer: true
        }).show();
    </script>
@endif
@if ($errors->any())
    @foreach($errors->all() as $error)
        <script>
            new Noty({
                type: 'error',
                layout: 'topRight',
                text: "{{ $error }}",
                timeout: 5000,
                killer: true
            }).show();
        </script>
    @endforeach
@endif
@if(session()->has('error'))
    <script>
        new Noty({
            type: 'error',
            layout: 'topRight',
            text: "{{ session('error') }}",
            timeout: 5000,
            killer: true
        }).show();
    </script>
@endif
