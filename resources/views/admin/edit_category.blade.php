<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    <style>
        .upload_deg{
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 60px;
        }
        input[type='text']{
            border-radius: 7px;
            width: 400px;
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
            <h1 class="text-white">Update Category</h1>
           <div class="upload_deg">
            <form action="{{url('update_category',$data->id)}}" method="POST">
                @csrf
                <input type="text" name="category" value="{{$data->category_name}}" class="mr-3 p-2">
                <input type="submit" value="Upload Category" class="btn btn-primary">
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