<div class="row">
    @include('admin._components.forms.text', [
        '_title' => __('Title'),
        '_name' => 'title',
        '_value' => $post->title ?? '',
        '_desc' => __('A title for the post'),
        '_col' => 12,
    ])
</div>

<div class="row">
    @include('admin._components.forms.file', [
        '_title' => __('Image'),
        '_name' => 'image',
        '_value' => $post->image ?? '',
        '_col' => 6,
    ])
</div>
