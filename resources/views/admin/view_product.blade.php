<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    
    <style>
        .div_deg{
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 60px;
            color: white;
            font-size: bold;
        }

        .table_deg{
            border: 1px solid skyblue;
        }
        th{
            background: skyblue;
            padding: 15px
        }
        td{
            border: 1px solid skyblue;
            padding: 5px;
            text-align: center;
        }

        input[type='search']{
            width: 500px;
            height: 50px;
            margin-left: 150px;
            margin-top: 10px;
            border-radius: 5px;
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
            <h1 class="text-white m-3">All Products</h1>
            <form action="{{url('product_search')}}" method="get">
                @csrf
                
                <input type="search" name="search">
                <input class="btn btn-success" type="submit" class="btn btn-secondary" value="Search">
            </form>

           <div class="div_deg">
                <table class="table_deg">
                    <tr>
                        <th>Product Table</th>
                        <th>Description</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Image</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    @foreach ($product as $products)
                    <tr>
                        <td>{{$products->title}}</td>
                        <td>{!!Str::limit($products->description,30)!!}</td>
                        <td>{{$products->category}}</td>
                        <td>{{$products->price}}</td>
                        <td>{{$products->quantity}}</td>
                        <td>
                            <img height="120" width="120" src="products/{{$products->image}}" alt="">
                        </td>
                        <td>
                            <a class="btn btn-success" href="{{url('update_product',$products->id)}}">Edit</a>
                        </td>
                        <td>
                            <a class="btn btn-danger" onclick="confirmation(event)" href="{{url('delete_product',$products->id)}} ">Delete</a>
                        </td>

                    </tr>
                    @endforeach
                    
                    
                </table>
           </div>

           <div class="div_deg">
                {{$product->links()}}
           </div>
            
          </div>
      </div>
    </div>

    
    <!-- JavaScript files-->
    @include('admin.js')

  </body>
</html>