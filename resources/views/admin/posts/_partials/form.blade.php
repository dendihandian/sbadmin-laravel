@php
    $_readonly = $_readonly ?? false;
@endphp

<div class="row">
    @include('admin._components.forms.text', [
        '_title' => __('Title'),
        '_name' => 'title',
        '_value' => $post->title ?? '',
        '_desc' => __('A title for the post'),
        '_col' => 12,
        '_readonly' => $_readonly,
    ])
</div>

<div class="row">
    @include('admin._components.forms.image', [
        '_title' => __('Image'),
        '_name' => 'image',
        '_value' => $post->image ?? '',
        '_file_link' => ($post->image ?? false) ? route('admin.file.image', ['filename' => $post->image]) : null,
        '_col' => 6,
        '_readonly' => $_readonly,
    ])
</div>
