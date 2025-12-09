@extends('layouts.app')

@section('content')
    <div class="container" style="max-width: 800px">
        @if(session('info'))
            <div class="alert alert-warning">
                {{session('info')}}
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-warning">
                {{session('error')}}
            </div>
        @endif
        <form  method="post" class="mb-2" enctype="multipart/form-data">
            @csrf
            <input type="text" class="form-control mb-2" name="name" placeholder="Product Name" value="{{$data->name}}">
            <img src="{{ asset('storage/' . $data->image)}}" alt="IMAGE" class="card-img-top object-fit-cover"
                            alt="Product Image" style="height: 150px; width:150px;border-radius: 1rem 1rem 0 0;">
            <input type="file" class="form-control mb-2" name="image" placeholder="IMAGE" value="{{$data->image}}" accept="image/*">
            <input type="text" class="form-control mb-2" name="description" placeholder="About Product" value="{{ $data->description }}">
            <input type="number" class="form-control mb-2" name="price" placeholder="Price" value="{{ $data->price }}">
            <input type="number" class="form-control mb-2" name="stock" placeholder="Stock" value="{{ $data->stock }}">
            <select name="category_id" id="" class="form-select mb-2">
    <option value="1" {{ $data->category_id == 1 ? 'selected' : '' }}>Computer</option>
    <option value="2" {{ $data->category_id == 2 ? 'selected' : '' }}>Phone</option>
    <option value="3" {{ $data->category_id == 3 ? 'selected' : '' }}>TV</option>
    <option value="4" {{ $data->category_id == 4 ? 'selected' : '' }}>Keyboard</option>
    <option value="5" {{ $data->category_id == 5 ? 'selected' : '' }}>Mouse</option>
    <option value="6" {{ $data->category_id == 6 ? 'selected' : '' }}>Airpot</option>
    <option value="7" {{ $data->category_id == 7 ? 'selected' : '' }}>Other Accessories</option>
</select>
            <button class="btn btn-primary" value="submit">ADD</button>
        </form>
    </div>
@endsection