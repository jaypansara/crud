@extends('layouts.app')
@section('title','Create | Products')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-8">
                <div class="card mt-3 p-3">

                    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                            @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>

                            @endif
                        </div>
                        <div class="form-group">
                            <label for="desc">Description</label>
                            <textarea name="description"  rows="5" class="form-control">{{ old('description') }}</textarea>
                            @if ($errors->has('description'))
                            <span class="text-danger">{{ $errors->first('description') }}</span>

                            @endif
                        </div>
                        <div class="form-group">
                            <label>Image</label>
                           <input type="file" name="image" class="form-control">
                           @if ($errors->has('image'))
                           <span class="text-danger">{{ $errors->first('image') }}</span>

                           @endif
                        </div>
                        <button type="submit" class="btn btn-dark mt-3">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @endsection
