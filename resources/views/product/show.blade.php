@extends('layouts.app')

@section('content')
    <div class="container py-5" style="max-width: 600px">
        @if(session('info'))
            <div class="alert alert-success">
                {{ session('info') }}
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-warning">
                {{session('error')}}
            </div>
        @endif
        
        <div class="card shadow-lg border-0">
            {{-- <div class="card-header bg-primary text-white d-flex align-items-center justify-content-between">
                
            </div> --}}
            <div class="card-body">
                <h2 class="card-title mb-3">{{ $product->name }}</h2>
                <div class="w-100 d-flex justify-content-center mb-3">
                    <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top object-fit-cover"
                        alt="Product Image" style="max-height: 260px; max-width: 100%; width: auto; height: auto; border-radius: 1rem; object-fit: contain; background: #f8f9fa; padding: 0.5rem;">
                </div>
                <div class="mb-3">
                    <span class="fw-bold">Price:</span>
                    <span class="text-success fw-bold fs-5">{{ $product->price }}-MMK</span>
                </div>
                <div class="mb-3">
                    <span class="fw-bold">Detail: : </span><span><b>{{               $product->description}}</b></span><br>
                    <span class="fw-bold">Stock:</span>
                    <span class="fw-bold">{{ $product->stock }}</span>
                </div>
                {{-- Add more product details here if needed --}}
            </div>
            <div class="card-footer bg-white d-flex justify-content-end">
                <a href="{{ url("/products/buy/$product->id") }}" class="btn btn-outline-info me-2 float-start">Order Now</a>
                @can('product-edit')
                    <a href="{{ url("/products/edit/$product->id") }}" class="btn btn-outline-primary me-2">Edit</a>
                @endcan
                <a href="{{ url('/products') }}" class="btn btn-secondary">Back to List</a>
            </div>
        </div>
    </div>
@endsection