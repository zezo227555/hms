<form action="{{ route($route, $id) }}" method="POST" class="d-inline-block delete-form">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-sm btn-danger-transparent" title="{{ $title }}">
        <i class="ri-delete-bin-line"></i> {{ $label }}
    </button>
</form>
