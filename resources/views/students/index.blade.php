<x-app-layout>


    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="btn-toolbar mb-2 mb-md-0">
            <a type="button" class="btn btn-sm btn-success" href="/students/create">
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
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Addres</th>
                    <th scope="col">Department</th>
                    <th class="px-4" scope="col">Action</th>
                </tr>
            </thead>
            @forelse ($students as $key => $value )
              <tr>
                <td>{{++$key}}</td>
                <td>{{$value->first_name}}</td>
                <td>{{$value->last_name}}</td>
                <td>{{$value->email}}</td>
                <td>{{$value->address}}</td>
                <td>
                    {{ $value->department? $value->department->title :  'No department'}}
                </td>
                <td><a href="{{route('students.edit',$value->id)}}" class="btn btn-info btn-sm">Edit</a>
                <form action="{{route('students.destroy', $value->id)}}" method="POST" style="display:inline">
                @csrf
                @method('delete')
                <button type="button" class="btn btn-danger btn-sm" onclick="return confirm('Delete student information?')">Delete</button>
                </form>
                </td>
              </tr>

            @empty
            <tr>No data found.</tr>

            @endforelse

        </table>
        {{$students->links()}}

    </div>



</x-app-layout>
