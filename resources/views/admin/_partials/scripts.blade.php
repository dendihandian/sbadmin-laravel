<script>
    $('#sidebarToggle').on('click', function(){
        $.ajax({
            method: 'POST',
            url: '{{ route('admin.utilities.sidebar-toggler') }}',
            data: {
                _token: '{{ csrf_token() }}'
            }
        });
    });
</script>