@extends('layouts.app')

@section('content')
    <style>
        .product-card {
            transition: box-shadow 0.3s, transform 0.3s;
        }
        .product-card:hover {
            box-shadow: 0 8px 32px 0 rgba(0,0,0,0.25), 0 1.5rem 3rem rgba(0,0,0,0.15)!important;
            transform: translateY(-6px) scale(1.03);
            z-index: 2;
        }
    </style>
        
    
    <div class="container-fluid px-0 mb-1.5">
        <video id="shopVideo" class="" style="display:inline;outline:none;background:#000;max-width:49.5%;border-radius:5px;margin-left:5px" autoplay muted loop playsinline>
            <source src="{{ asset('vedios/apple.mp4') }}" type="video/webm">
            Your browser does not support the video tag.
        </video>
        <video id="shopVideo" class="" style="display:inline;outline:none;background:#000;max-width:49.5%;border-radius:5px" autoplay muted loop playsinline>
            <source src="{{ asset('vedios/test.mp4') }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
       

    </div>
    
     <div class="container py-5">

        <div class="row g-4">
            @if(session('info'))
                <div class="alert alert-info">
                    {{session('info')}}
                </div>
            @endif
            @if(session('error'))
           <div class="alert alert-warning">
             {{session('error')}}
           </div>
            @endif
          
            @foreach ($products as $product)
                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <div class="card h-100 border-0 shadow-lg position-relative product-card">
                        @can('general')
                            <div class="position-absolute top-0 end-0 m-2">
                                <span class="badge bg-info text-dark">{{ $product->category->name }}</span>
                            </div>
                        @endcan
                        <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top object-fit-cover"
                            alt="Product Image" style="height: 220px; border-radius: 1rem 1rem 0 0;">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title text-truncate">{{ $product->name }}</h5>
                            <div class="mb-2">
                                <span class="fw-bold text-success fs-5">{{ $product->price }}-MMK</span>
                            </div>
                            @can('general')
                                <div class="mb-3">
                                     
                                    <span class="fw-bold">Stock:</span> <span>{{ $product->stock }}</span>
                                   
                                </div>
                            @endcan
                            <div class="mt-auto d-flex justify-content-between align-items-center">
                                <a href="{{ url('/products/show/' . $product->id) }}" class="btn btn-outline-primary btn-sm">View
                                    Detail</a>
                               @can('product-delete')
                                    <a href="{{ url("/products/delete/$product->id") }}" class="btn btn-outline-danger btn-sm">Delete</a>
                               @endcan
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
           
        </div>
        {{-- <div class="mb-4 d-flex justify-content-center">
            {{ $products->links() }}
        </div> --}}
    </div>
     
@endsection