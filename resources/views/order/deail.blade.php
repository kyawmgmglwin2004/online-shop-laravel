<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            background-color: #ebf5f5;
            border-radius: 8px;
            margin-left: 50px; 
            padding:20px 60px 20px 60px;
        }
    </style>

</head>
<body>
    <header class="d-flex justify-content-center align-items-center vh-10">
        <div>
            <div class="display-6 fw-bold text-center mb-4" >
                <a href="{{url("/")}}" style="color: #0b0d0e;" class="navbar-brand"> {{ config('app.name', 'Laravel') }}</a>
            </div>
            
           
        </div>
    </header>
    @if(session('info'))
        <div class="alert alert-warning">
            {{session('info')}}
        </div>
        @endif
    <div class="input-group">
        <div class="container" id="detail" style="max-width:550px;">
        <h3 class="text-center">Custmor Detail</h3>
        <form method="POST" action="{{url("/products/buy/$product->id")}}">
            @csrf
                 <input type="hidden" name="product_id" value="{{$product->id}}">
                <label for="email" class="mb-1"><b>Contact</b></label>
               <input type="email" class="form-control mb-2" placeholder="Email" name="email" value="{{$user->email}}">
               <input type="phone" placeholder="Phone" name="phone" class="form-control mb-2">
                <label for=""><b>Delivery method</b></label>
                <select name="delivery" id="" class="form-select mb-4">
                    <option value="1">Ninja Van</option>
                    <option value="2">Royal Express</option>
                </select>
                <label for="address" class="mb-2"><b>Shipping address</b></label>
                <select name="country" id="" class="form-select mb-2">
                    <option value="1">Myanmar</option>
                </select>
                <div class="input-group mb-2">
                    <input type="text" placeholder="First Name" name="firstName" class="form-control me-2 ">
                    <input type="text" placeholder="Last Name" name="lastName" class="form-control ">
                </div>
                <input type="text" placeholder="Address" name="address" class="form-control mb-2 p-2">
                <div class="input-group mb-2">
                    <input type="text" name="township" placeholder="Township" class="form-control me-2">
                    <input type="text" name="city" placeholder="City" class="form-control">
                </div>
                 <button class="btn btn-primary mt-3" type="submit">Order Now</button>
           </form>
    </div>
    <div class="container" style="max-width:550px">
         <img src="{{ asset('storage/'.$product->image )}}" alt="Product Image" style="height: 120px;
            boder-radius: 1rem 1em 0 0;" class="mb-2">
        <p><b>Modes: :{{$product->name}}</b></p>
        <p class="mb-5"><b>Price: :{{$product->price}}$</b></p>
        <div class="list-group">
            <p><b>Subtotal ======================== {{$product->price}}-MMk</b></p>
            <p><b>Shipping ======================== FREE</b></p>
            <p><b>Total =========================== {{$product->price}}-MMK</b></p>
        </div>
        
           
</body>
</html>