<div class="modal fade" id="deleting-modal-{{ $type->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Elimina {{ $type->name }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                L'operazione non è reversibile. Continuare?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                <form action="{{ route('admin.types.destroy', $type) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">Elimina tipo</button>
                </form>
            </div>
        </div>
    </div>
</div>
