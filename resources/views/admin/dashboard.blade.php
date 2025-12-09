{{-- @extends('layouts.app') --}}

{{-- @section('content') --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
    .dashboard-card {
        border-radius: 1.25rem;
        box-shadow: 0 4px 24px rgba(13,110,253,0.08), 0 1.5rem 3rem rgba(0,0,0,0.07);
        transition: box-shadow 0.3s, transform 0.3s;
    }
    .dashboard-card:hover {
        box-shadow: 0 8px 32px 0 rgba(13,110,253,0.18), 0 2rem 4rem rgba(0,0,0,0.10);
        transform: translateY(-4px) scale(1.02);
    }
    .dashboard-icon {
        font-size: 2.5rem;
        color: #0d6efd;
    }
</style>
</head>
<body>
    <div class="container py-5">
    <h1 class="display-5 fw-bold mb-5 text-center text-primary">Admin Dashboard</h1>
    <div class="row g-4 mb-4">
        <div class="col-md-3">
            <div class="card dashboard-card text-center p-4">
                <div class="dashboard-icon mb-2">
                    <i class="bi bi-box-seam"></i>
                </div>
                <h5 class="fw-bold">Products</h5>
                <p class="text-muted mb-2">Manage all products</p>
                
                <a href="{{ url('/products') }}" class="btn btn-outline-primary btn-sm rounded-pill">View Products</a>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card dashboard-card text-center p-4">
                <div class="dashboard-icon mb-2">
                    <i class="bi bi-box-seam"></i>
                </div>
                <h5 class="fw-bold">Products</h5>
                <p class="text-muted mb-2">Add product</p>
                <a href="{{ url('products/create') }}" class="btn btn-outline-primary btn-sm rounded-pill">Add Product</a>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card dashboard-card text-center p-4">
                <div class="dashboard-icon mb-2">
                    <i class="bi bi-people"></i>
                   
                       @if($newUser != 0)
                         <span class="badge bg-danger rounded-pill" style="font-size:0.4em;">{{$newUser}}</span>
                       @endif
                   
                </div>
                <h5 class="fw-bold">Users</h5>
                <p class="text-muted mb-2">View and manage Users</p>
                <a href="{{ url('/users') }}" class="btn btn-outline-primary btn-sm rounded-pill">View Users</a>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card dashboard-card text-center p-4">
                <div class="dashboard-icon mb-2">
                    <i class="bi bi-receipt"></i>
                     @if($newOrder != 0)
                         <span class="badge bg-danger rounded-pill" style="font-size:0.4em;">{{$newOrder}}</span>
                       @endif
                </div>
                <h5 class="fw-bold">Orders</h5>
                <p class="text-muted mb-2">Track and manage orders</p>
                <a href="{{ url('/orders') }}" class="btn btn-outline-primary btn-sm rounded-pill">View Orders</a>
            </div>
        </div>
    </div>
    <div class="row g-4">
        <div class="col-md-6">
            <div class="card dashboard-card p-4">
                <h5 class="fw-bold mb-3">Quick Stats</h5>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Total Products
                        <span class="badge bg-primary rounded-pill">{{ count($product) ?? '0' }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Total Orders
                        <span class="badge bg-primary rounded-pill">{{ count($order) ?? '0' }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Total users
                        <span class="badge bg-primary rounded-pill">{{ count($user) ?? '0' }}</span>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card dashboard-card p-4">
                <h5 class="fw-bold mb-3">Recent Orders</h5>
                <ul class="list-group list-group-flush">
                    @foreach($recentOrder as $order)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span>{{ $order->email }}</span>
                            <span>{{ $order->product->name ?? 'Null' }}</span>
                            <span>{{ $order->created_at}}</span>
                        </li>
                    @endforeach
                    {{-- @if(empty($recentOrder) || count($recentOrder) === 0)
                        <li class="list-group-item text-muted">No recent orders.</li>
                    @endif --}}

                </ul>
            </div>
        </div>
    </div>
</div>
</body>
</html>


<!-- Bootstrap Icons CDN -->

{{-- @endsection --}}
