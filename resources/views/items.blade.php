@extends('layouts.main')


@section('maincontent')
    <h1 class="text-center mt-5">Items</h1>
    <div class="container p-5">
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Description</th>
                    <th>Category</th>
                    <th>Type</th>
                    <th>Weight</th>
                    <th>Cost</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($items as $item)
                    <tr>
                        <th>{{ $item->name }}</td>
                        <td>{{ $item->slug }}</td>
                        <td>{{ $item->description }}</td>
                        <td>{{ $item->category }}</td>
                        <td>{{ $item->type }}</td>
                        <td>{{ $item->weight }}</td>
                        <td>{{ $item->cost }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="100%">Item Not Found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        {{ $items->links() }}
    </div>
@endsection
