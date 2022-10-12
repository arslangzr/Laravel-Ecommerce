<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <base href="/public">
    @include('admin.css')
    <style>
        .div_center {
            text-align: center;
            padding-top: 40px;
        }

        .class_size {
            font-size: 40px;
            padding-bottom: 40px;
        }

        .text_color {
            color: black;
            padding-bottom: 20px;
        }

        label {
            display: inline-block;
            width: 200px;
        }

        .div_design {
            padding-bottom: 15px;
        }
    </style>
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_navbar.html -->
            @include('admin.header')
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    @if (session()->has('message'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            {{ session()->get('message') }}
                        </div>
                    @endif



                    <div class="div_center">
                        <h1 class="class_size">Update Product</h1>

                        <form action="{{ url('/update_product_confirm',$product->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="div_design">
                                <label>Product Title :</label>
                                <input class="text_color" type="text" name="title" placeholder="Write a title"
                                    required value="{{$product->title}}">
                            </div>

                            <div class="div_design">
                                <label>Product Description :</label>
                                <input class="text_color" type="text" name="description"
                                    placeholder="Write a description" required value="{{$product->description}}">
                            </div>

                            <div class="div_design">
                                <label>Product Price :</label>
                                <input class="text_color" type="number" name="price" placeholder="Write a price"
                                    required value="{{$product->price}}">
                            </div>

                            <div class="div_design">
                                <label>Discount Price :</label>
                                <input class="text_color" type="number" name="dis_price"
                                    placeholder="Write a discount applied" value="{{$product->discount_price}}">
                            </div>

                            <div class="div_design">
                                <label>Product Quantity :</label>
                                <input class="text_color" type="number" min="0" name="quantity"
                                    placeholder="Write a quantity" required value="{{$product->quantity}}">
                            </div>

                            <div class="div_design">
                                <label>Product Category :</label>
                                <select class="text_color" name="category" required>
                                    <option value="{{$product->category}}" selected="{{$product->category}}">{{$product->category}}</option>

                                    @foreach ($category as $category)
                                    @if ($category->category_name != $product->category)
                                    <option value="{{ $category->category_name }}">{{ $category->category_name }}
                                    </option>
                                    @endif
                                    @endforeach

                                </select>
                            </div>

                            <div class="div_design">
                                <label>Current Product Image :</label>
                                <img style="margin: auto;" height="100" width="100" src="/product/{{$product->image}}" alt="{{$product->image}}">
                            </div>

                            <div class="div_design">
                                <label>Product Image Here :</label>
                                <input type="file" name="image">
                            </div>

                            <div class="div_design">
                                <input class="btn btn-primary" type="submit" value="Update Product">
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
</body>

</html>
