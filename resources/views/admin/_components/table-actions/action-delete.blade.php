<a 
    class="mx-1 text-danger" 
    title="{{ $_title ?? __('Delete') }}" 
    href="#" 
    onclick="deleteConfirm('{{ $_id }}', '{{ $_text }}')">
    <i class="fas fa-trash"></i>
</a>
<form method="POST" id="{{ $_id }}" action="{{ $_url }}">
    @csrf
    @method('DELETE')
</form>