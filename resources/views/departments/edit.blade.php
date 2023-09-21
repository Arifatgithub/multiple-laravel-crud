<x-app-layout>


    <!doctype html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
        <meta name="generator" content="Hugo 0.84.0">
        <title>Department list</title>

        <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/checkout/">



        <!-- Bootstrap core CSS -->
        <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

        <style>
            .bd-placeholder-img {
                font-size: 1.125rem;
                text-anchor: middle;
                -webkit-user-select: none;
                -moz-user-select: none;
                user-select: none;
            }

            @media (min-width: 768px) {
                .bd-placeholder-img-lg {
                    font-size: 3.5rem;
                }
            }
        </style>


        <!-- Custom styles for this template -->
        <link href="form-validation.css" rel="stylesheet">
    </head>

    <body class="bg-light">

        <div class="container">
            <main>
                <div class="row g-5">
                    <div class="col-md-7 col-lg-8">
                        <h4 class="mb-3">Department Information</h4>
                        <form class="needs-validation" method="post" action="{{ route('departments.update',$departments->id)}}">
                    @csrf
                    @method("PUT")
                  <div class = "row g-5">
                            <div class="col-sm-8">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" id="name"
                                    placeholder="your name" value="{{$departments->name}}" required>
                            </div>

                            <div class="col-sm-8">
                                <label for="code" class="form-label">Subject Code</label>
                                <input type="text" name="code" class="form-control" id="code"
                                    placeholder="your subject code" value="{{$departments->code}}" required>
                            </div>

                            <div class="col-md-5">
                                <label for="country" class="form-label">Status</label>
                                <select class="form-select" name="status" id="status" value="{{$departments->status}}"  required>
                                    <option value="3" selected>Select Status</option>
                                    <option value="1">Pending</option>
                                    <option value="2">Active</option>
                                </select>
                            </div>
                            <div class="cold-sm-8">
                                <button class="btn btn-danger" type="submit">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </main>

        </div>


        <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

        <script src="/assets/js/form-validation.js"></script>
    </body>

    </html>




</x-app-layout>
