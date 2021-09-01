<a href="{{ route('schedules.edit', $id) }}" class="btn btn-sm btn-primary">Editar</a>
<button type="button" onclick="return (confirm('Tem certeza que deseja excluir?') ? document.getElementById('form-{{ $id }}').submit() : false);" class="btn btn-sm btn-danger">Excluir</button>
<form action="{{ route('schedules.destroy', $id) }}" method="POST" id="form-{{ $id }}">
    @csrf
    <input name="_method" type="hidden" value="DELETE">
</form>