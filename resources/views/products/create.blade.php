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
                        <form class="needs-validation" method="post" action="{{ route('products.store') }}">
                            @csrf
                            <div class="row g-3">
                                <div class="col-sm-6">
                                    <label for="firstName" class="form-label">Title</label>
                                    <input type="text" name="title" class="form-control" id="title"
                                        placeholder="First name">
                                    @if ($errors->has('title'))
                                        <p style="color: rgb(2, 86, 241)">Fill up this</p>
                                    @endif
                                </div>

                                <div class="col-sm-6">
                                    <label for="description" class="form-label">Description</label>
                                    <input type="text" name="description" class="form-control" id="description"
                                        placeholder="Description" nullable>
                                    @if ($errors->has('description'))
                                        <p style="color: rgb(2, 86, 241)">Fill up this</p>
                                    @endif
                                </div>

                                <div class="col-sm-6">
                                    <label for="price" class="form-label">Price</label>
                                    <input type="text" name="price" class="form-control" id="price"
                                        placeholder="Price">
                                    @if ($errors->has('title'))
                                        <p style="color: rgb(2, 86, 241)">Fill up this</p>
                                    @endif
                                </div>

                                <div class="col-sm-6">
                                    <label for="sku" class="form-label">SKU</label>
                                    <input type="int" name="sku" class="form-control" id="sku"
                                        placeholder="Stock keeping unit">
                                    @if ($errors->has('title'))
                                        <p style="color: rgb(2, 86, 241)">Fill up this</p>
                                    @endif
                                </div>
                            </div><br>
                            <button class="btn btn-info btn-md" type="submit">Submit</button>
                        </form>
                    </div>
                    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
                </div>
</x-app-layout>
