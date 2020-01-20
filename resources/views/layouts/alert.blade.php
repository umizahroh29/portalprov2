@if(session()->has('success'))
    <script>
        toastr.success('{{ session()->get('success') }}', 'Berhasil!')
    </script>
@endif
@if(session()->has('error'))
    <script>
        toastr.error('{{ session()->get('error') }}', 'Oops!')
    </script>
@endif
@if(session()->has('openModal'))
    <script>
        $(() => {
            $('.modal').modal('show');
        })
    </script>
@endif
