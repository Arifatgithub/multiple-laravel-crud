<x-app-layout>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="btn-toolbar mb-2 mb-md-0">
            <a type="button" class="btn btn-sm btn-success" href="/departments/create">
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
                    <th scope="col">Name</th>
                    <th scope="col">Code</th>
                    <th scope="col">Status</th>
                    <th class="px-4" scope="col">Action</th>
                </tr>
            </thead>
            @forelse ($departments as $key => $value)
                <tr>
                    <td>{{ 5 * (request()->has('page') ? request('page') - 1 : 0) + ++$key }}</td>
                    <td>{{ $value->name }}</td>
                    <td>{{ $value->code }}</td>
                    <td>

                        @if ($value->status == 1)
                            <span class="badge bg-success">Active</span>
                        @elseif ($value->status == 2)
                            <span class="badge bg-danger">Pending{{$value->status}}</span>
                        @endif
                    </td>
                    <td><a href="{{ route('departments.edit', $value->id) }}" class="btn btn-sm btn-info">Edit</a>
                        <form action="{{ route('departments.destroy', $value->id) }}" method="POST"
                            style="display:inline">
                            @csrf
                            @method('delete')
                            <button type="submit"
                                class="btn-sm btn btn-danger"onclick="return confirm('Delete this department?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr colspan="7">No data found.</tr>
            @endforelse
        </table>
        {{ $departments->links() }}



</x-app-layout>
