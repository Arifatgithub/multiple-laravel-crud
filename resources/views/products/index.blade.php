<x-app-layout>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="btn-toolbar mb-2 mb-md-0">
            <a type="button" class="btn btn-sm btn-success" href="/products/create">
                <span data-feather="plus"></span>
                Add New
            </a>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Price</th>
                    <th scope="col">Image</th>
                    <th scope="col">SKU</th>
                    <th class="px-4" scope="col">Action</th>
                </tr>
            </thead>
            @forelse ($products as $key => $value)
                <tr>
                    <td>{{ 10 * (request()->has('page') ? (request('page') - 1) : 0) + (++$key)}}</td>
                    <td>{{ $value->title }}</td>
                    <td>{{ $value->description }}</td>
                    <td>{{ $value->price }}</td>
                    <td>{{ $value->image }}</td>
                    <td>{{ $value->sku }}</td>
                    <td><a href="{{ route('products.edit', $value->id) }}" class="btn btn-sm btn-info">Edit</a>
                        <form action="{{ route('products.destroy', $value->id) }}" method="POST"
                            style="display:inline">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn-sm btn btn-danger"onclick="return confirm('Delete this product?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr colspan="7">No data found.</tr>
            @endforelse
        </table>
        {{ $products->links() }}
</x-app-layout>
