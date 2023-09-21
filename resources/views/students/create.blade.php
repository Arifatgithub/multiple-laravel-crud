<x-app-layout>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Information list</title>

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

<div class="container" >
  <main>
    <div class="row g-5">
      <div class="col-md-7 col-lg-8">
        <h4 class="mb-3">Students Information</h4>
        <form class="needs-validation" method="POST" action="{{route('students.store')}}" novalidate>
            @csrf
          <div class="row g-3">
            <div class="col-sm-6">
                <label for="lastName" class="form-label">Last name</label>
                <input type="text" name="first_name" class="form-control" id="first_Name" placeholder="your first name" value="" required>
                <div class="invalid-feedback">
                  @if ($errors->has('first_name'))
                  <p style="color: rgb(255, 10, 10);" class="mb-0">
                    First name is required.
                  </p>
                  @endif
               </div>
            </div>

            <div class="col-sm-6">
              <label for="lastName" class="form-label">Last name</label>
              <input type="text" name="last_name" class="form-control" id="last_Name" placeholder="your last name" value="" required>
              <div class="invalid-feedback">
                @if ($errors->has('last_name'))
                <p style="color: rgb(255, 10, 10);" class="mb-0">
                  Last name is required.
                </p>
              @endif
              </div>
            </div>

            <div class="col-12">
              <label for="email" class="form-label">Email <span class="text-muted"></span></label>
              <input type="email" name="email" class="form-control" id="email" placeholder="you@example.com" required>
              <div class="invalid-feedback">
                @if ($errors->has('email'))
                <p style="color: rgb(255, 10, 10);" class="mb-0">
                  Invalid email.
                </p>
              @endif
              </div>
            </div>

            <div class="col-12">
              <label for="address" class="form-label">Address</label>
              <input type="text" name="address" class="form-control" id="address" placeholder="your address" required>
              <div class="invalid-feedback">
                @if ($errors->has('address'))
                <p style="color: rgb(255, 10, 10);" class="mb-0">
                  Insert your address.
                </p>
              @endif
              </div>
            </div>

            <h4 class="my-3">Gender</h4>
            <div class="my-3">
                <div class="form-check">
                    <input id="credit" name="gender" value="male" type="radio" class="form-check-input" checked required>
                    <label class="form-check-label" for="credit">Male</label>
                </div>
                <div class="form-check">
                    <input id="debit" name="gender" value="female" type="radio" class="form-check-input" required>
                    <label class="form-check-label" for="debit">Female</label>
                </div>
            </div>
          <hr class="my-4">

          <button class="btn btn-danger btn-md" type="submit">Save</button>
        </form>
      </div>
    </div>
  </main>

</div>


    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

      <script src="/assets/js/form-validation.js"></script>
  </body>
</x-app-layout>
</html>
