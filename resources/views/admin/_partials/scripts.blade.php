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

    // TODO: elaborate if there are more than one file input in the page
    const input = document.querySelector('input[type="file"]');

    const filepond_config = {
        server: {
            url: '{{ route('admin.file.store') }}' + '?name=' + input.attributes.name.value,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            process: {
                onload: (response) => {
                    // console.log(`response`, response);
                    return JSON.parse(response)[input.attributes.name.value];
                }
            },
            load: {
                url: '/getfile'
            },
            revert: null // NOTE: disabling revert, nice to have if you figure it out how to pass the filename on the request
        }
    }

    filepond_config['source'] = 'test.jpg';

    console.log(`filepond_config`, filepond_config);

    filepondCreate(input, filepond_config);
</script>