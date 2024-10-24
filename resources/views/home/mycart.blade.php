<!DOCTYPE html>
<html>

<head>
    @include('home.css')
    
    <style>
        .div_deg{
            display: flex;
            justify-content: center;
            align-items: center;
            margin:50px;
            
        }

        table{
            border: 2px solid black;
            width: 600px;
            text-align: center;
        }

       th{
        background: black;
        color: white;
        padding: 5px;
        font-weight: bold;
        font-size: 20px;
        
       }

       td{
        border: 1px solid skyblue;
       }
       .cart_value{
        text-align: center;
        margin-bottom: 70px;
        padding: 18px;
       }
       .order_deg{
        padding-right: 100px;
        margin-top: 20px;
       }
       label{
        display: inline-block;
        width: 150px;
       }
    </style>
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
        @include('home.header')
    <!-- end header section -->

  </div>

   <div class="div_deg">

    <div class="order_deg">
        <form action="{{url('confirm_order')}}" method="Post">
            @csrf
            
            <div>
                <label for="">Receiver Name</label>
                <input type="text" name="name" value="{{Auth::user()->name}}">
            </div>
            <div>
                <label for="">Receiver Address</label>
                <textarea name="address" id="" cols="30" rows="10">{{Auth::user()->address}}</textarea>
            </div>
            <div>
                <label for="">Receiver Phone</label>
                <input type="text" name="phone" value="{{Auth::user()->phone}}">
            </div>
            <div>
                
                <input class="btn btn-primary" type="submit" value="Place Order">
            </div>
        </form>
    </div>
        <table>
            <tr>
                <th>Product Tttle</th>
                <th>Price</th>
                <th>Image</th>
                <th>Remove</th>
            </tr>

        <?php
            $value =0;
        ?>

         @foreach ($cart as $cart)
            <tr>
                <td>{{$cart->product->title}}</td>
                <td>{{$cart->product->price}}</td>
                <td>
                    <img width="150" src="/products/{{$cart->product->image}}" alt="">
                </td>
                <td>
                    <a class="btn btn-danger" href="{{url('delete_cart',$cart->id)}}">Remove</a>
                </td>
            </tr>

            <?php 
                $value = $value + $cart->product->price;
            ?>
         @endforeach
            
        </table>
   </div>
   
   <div class="cart_value">
        <h1>Total value of Cart is : ${{$value}}</h1>
   </div>

  <!-- info section -->
    @include('home.footer')
   

</body>

</html>