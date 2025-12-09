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
            <input type="text" class="form-control mb-2" name="name" placeholder="Product Name">
            <input type="file" class="form-control mb-2" name="image" placeholder="IMAGE" accept="image/*">
            <input type="text" class="form-control mb-2" name="discription" placeholder="About Product">
            <input type="number" class="form-control mb-2" name="price" placeholder="Price">
            <input type="number" class="form-control mb-2" name="stock" placeholder="Stock">
            <select name="category_id" id="" class="form-select mb-2">
                <option value="1">Computer</option>
                <option value="2">Phone</option>
                <option value="3">TV</option>
                <option value="4">Keyboard</option>
                <option value="5">Mouse</option>
                <option value="6">Airpot</option>
                <option value="6">other accessories</option>


            </select>
            <button class="btn btn-primary" value="submit">ADD</button>
        </form>
    </div>
@endsection