<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')

    <style>
        .div_deg{
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 80px;
        }
        label{
            display: inline-block;
            width: 250px;
            font-size: 18px !important;
            color: white !important;
            padding: 10px;
        }
        input[type='text']{
            width: 305px;
            height: 40px;
        }
    </style>
  </head>
  <body>

    @include('admin.header')
    
    @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            <h1 class="text-white">Add Product</h1>
            <div class="div_deg">
                <form action="{{url('upload_product')}}" method="Post" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <label>Product Title</label>
                        <input type="text" name="title" required>
                    </div>
    
                    <div>
                        <label>Description</label>
                        <textarea name="description"  cols="32" rows="5" required></textarea>
                    </div>
    
                    <div>
                        <label>Price</label>
                        <input type="text" name="price">
                    </div>
    
                    <div>
                        <label>Quantity</label>
                        <input type="number" name="qty">
                    </div>
    
                    <div>
                        <label>Product Category</label>
                        <select name="category" class="p-1" required>
                            <option >Select a Option</option>
                            
                            @foreach ($category as $category)
                                <option value="{{$category->category_name }}">
                                    {{$category->category_name }}
                                </option>
                            @endforeach

                        </select>
                    </div>
    
                    <div>
                        <label>Product Image</label>
                        <input type="file" name="image">
                    </div>

                    <div>
                       
                        <input class="btn btn-success mt-4" type="submit" value="Add Product">
                    </div>
                </form>
                
            </div>
            
          </div>
      </div>
    </div>
    <!-- JavaScript files-->
    <script src="{{asset('admincss/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/popper.js/umd/popper.min.js')}}"> </script>
    <script src="{{asset('admincss/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
    <script src="{{asset('admincss/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('admincss/js/charts-home.js')}}"></script>
    <script src="{{asset('admincss/js/front.js')}}"></script>
  </body>
</html>