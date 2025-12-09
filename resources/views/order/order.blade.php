
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

</head>
<body>
    <div class="container ">
       
    <div class="">
        <div class="text-center text-primary mb-5">
            <h2>Orders List</h2>
        </div>
        <a href="{{url('/home')}}">Go Back Dashboard</a>
         @if(session('delete'))
            <div class="alert alert-success">
                {{session('delete')}}
            </div>
        @endif
        <div class="card-body mt-2">
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>Order ID</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Delivery</th>
                        <th>Country</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Address</th>
                        <th>Township</th>
                        <th>City</th>
                        <th>Item</th>
                        <th>Date</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($order as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->phone }}</td>
                            <td>{{ $order->email}}</td>
                            <td>
                                @if($order->delivery == 1)
                                    Ninja Van
                                @else
                                    Royal Express
                                @endif
                            </td>
                            <td>
                                @if($order->country == 1)
                                    Myanmar
                                @endif
                            </td>
                            <td>{{ $order->firstName}}</td>
                            <td>{{ $order->lastName}}</td>
                            <td>{{ $order->address}}</td>
                            <td>{{ $order->township}}</td>
                            <td>{{ $order->city}}</td>
                            <td>{{ $order->product->name}}</td>
                            <td>{{ $order->created_at->format('Y-m-d') }}</td>
                            <td>
                                <a href="{{ url("/orders/$order->id")}}" class="btn btn-delete btn-sm"><i class="fa-solid fa-trash text-danger p-2"></i></a>
                            </td>
                            {{-- <td>
                                <a href="{{ route('orders.show', $order->id) }}" class="btn btn-info btn-sm">View</a>
                            </td> --}}
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">No orders found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>
