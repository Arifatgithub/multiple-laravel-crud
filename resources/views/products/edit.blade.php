<x-app-layout>

    <div class="py-3">
        <title>Products form</title>
    </div>
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
    <div class="container">
      <main>
        <div class>
          <h2>Information Form</h2>
            @php
                // dd($errors->all());
            @endphp
        <div class="row g-5">
          <div class="col-md-8 col-lg-4 order-md-last">
          </div>
          <div class="col-md-7 col-lg-8">
            <form class="needs-validation" method="post" action="{{ route('products.update',$products->id)}}">
                @csrf
                @method('put')
              <div class="row g-3">
                <div class="col-sm-6">
                  <label for="title" class="form-label">Title</label>
                  <input type="text" name="title" class="form-control" id="title" value="{{$products->title}}" placeholder="First name">
                </div>

                <div class="col-sm-6">
                    <label for="description" class="form-label">Description</label>
                    <input type="text" name="description" class="form-control" id="description" value="{{$products->description}}" placeholder="Description" nullable>
                  </div>

                  <div class="col-sm-6">
                    <label for="price" class="form-label">Price</label>
                    <input type="text" name="price" class="form-control" id="price" value="{{$products->price}}" placeholder="Price">
                  </div>

                  <div class="col-sm-6">
                    <label for="sku" class="form-label">SKU</label>
                    <input type="text" name="sku" class="form-control" id="sku" value="{{$products->sku}}" placeholder="Stock keeping unit">
                  </div>
                </div><br>
                <button class="btn btn-info btn-md" type="submit">Submit</button>
              </form>
            </div>
        <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
    </div>
</x-app-layout>
