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

    if (input) {
        const filepond_config = {
            server: {
                url: '{{ config('app.url') }}',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                process: {
                    url: '/admin/file' + '?name=' + input.attributes.name.value,
                    method: 'POST',
                    onload: (response) => {
                        // console.log(`response`, response);
                        return JSON.parse(response)[input.attributes.name.value];
                    }
                },

                revert: null // NOTE: disabling revert, nice to have if you figure it out how to pass the filename on the request
            }
        }

        inputValue = document.querySelector('input[name="'+ input.attributes.name.value +'-value"]');
        console.log(`inputValue`, inputValue);

        if (inputValue.attributes.value.value) {


            filepond_config['load'] = {
                url: '/admin/file/image/' + inputValue.attributes.value.value,
                method: 'GET',
                withCredentials: false,
                headers: {
                    'Content-Disposition':'inline'
                },
                onload: function(response) {
                    return response.key;
                },
                onerror: function(response) {
                    return response.data;
                }
            }


            sourceURL = '{{ route('admin.file.image', ['filename' => '%filename%']) }}'.replace('%filename%', inputValue.attributes.value.value);
            console.log(`sourceURL`, sourceURL);
            filepond_config['files'] = [
                {
                    source: sourceURL,
                    // set type to limbo to tell FilePond this is a temp file
                    options: {
                       type: 'local'
                    }
                }
            ];

        }


        console.log(`filepond_config`, filepond_config);

        filepondCreate(input, filepond_config);

    }

</script>