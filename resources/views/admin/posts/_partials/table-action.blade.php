@include('admin._components.table-actions.action-show', [
    '_url' => route('admin.posts.show', ['postId' => $post->id ?? 0 ])
])

@include('admin._components.table-actions.action-edit', [
    '_url' => route('admin.posts.edit', ['postId' => $post->id ?? 0 ])
])

@include('admin._components.table-actions.action-delete', [
    '_id' => "delete-post-" . $post->id ?? '0',
    '_text' => "Do you want to delete " . $post->title . "?",
    '_url' => route('admin.posts.delete', ['postId' => $post->id ?? 0])
])