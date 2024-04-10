@extends('layouts.main')

@section('assets')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
@section('maincontent')
    <h1 class="text-center mt-5">Tipo</h1>
    <div class="text-center">
        <a href="{{ route('admin.types.create') }}" class="btn btn-primary">Nuovo Tipo</a>
    </div>
    <div class="container p-5">
        <table class="table">
            <thead>
                <tr class="text-center">
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($types as $type)
                    <tr class="text-center">
                        <th>{{ $type->id }}</td>
                        <td>{{ $type->name }}</td>
                        <td>{{ $type->get_description() }}</td>
                        <td>

                            <a href="{{ route('admin.types.show', $type) }}" class="btn btn-primary"><i
                                    class="fa-solid fa-eye"></i></a>
                            <a href="{{ route('admin.types.edit', $type) }}" class="btn btn-warning"><i
                                    class="fa-solid fa-user-pen"></i></a>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#deleting-modal-{{ $type->id }}"><i
                                    class="fa-solid fa-trash"></i></button>
                        </td>

                    </tr>
                @empty
                    <tr>
                        <td colspan="100%">Nessun Tipo Trovato</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        {{ $types->links() }}
    </div>
@endsection

@section('modals')
    @foreach ($types as $type)
        @include('layouts.partials.type_modal_destroy')
    @endforeach
@endsection
