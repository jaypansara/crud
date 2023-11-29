@extends('layouts.app')
@section('title','Edit Products')
@section('content')
    <div class="container">
        <h1 class="txt" style="text-align: center">Edit Product</h1>
        <div class="row justify-content-center">
            <div class="col-sm-8">
                <div class="card mt-3 p-3">

                    <form action="{{ route('product.update',$product->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name',$product->name) }}">

                        </div>
                        <div class="form-group">
                            <label for="desc">Description</label>
                            <textarea name="description"  rows="5" class="form-control">{{ old('description',$product->description) }}</textarea>
                            @if ($errors->has('description'))
                            <span class="text-danger">{{ $errors->first('description') }}</span>

                            @endif
                        </div>
                        <div class="form-group">
                            <label>Image</label>
                           <input type="file" name="image" class="form-control">

                        </div>
                        <button type="submit" class="btn btn-dark mt-3">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection

