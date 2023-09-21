<x-app-layout>
    <div class="conatiner">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"> Edit student information </div>

                    <div class="card-body">
                        <form method="POST" action="{{route('students.update',$student->id)}}">
                            @csrf
                            @method('put')

                            <div class="form-group">
                                <label for="first-name">First Name</label>
                                <input type="text" class="form-control" id="first_name" name="first_name" value="{{$student->first_name}}">
                            </div>

                            <div class="form-group">
                                <label for="first-name">Last Name</label>
                                <input type="text" class="form-control" id="last_name" name="last_name" value="{{$student->last_name}}">
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{$student->email}}">
                            </div>

                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" id="address" name="address" value="{{$student->address}}">
                            </div>

                             <div class="form-group">
                                <label for="department">Department</label>
                                <input type="text" class="form-control" id="depart_id" name="department_id" value="{{$student->department_id}}">
                             </div><br>

                             <button type="submit" class="btn btn-success">Save</button>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>
</x-app-layout>
