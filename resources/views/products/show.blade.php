@extends('layouts.app')
@section('title','Show Products')
@section('content')

<h3 class="text-center mt-3">Show Details</h3>
<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-sm-8">
            <div class="card p-4">
               <table class="table table-primary">
                <tbody>
                    <tr>
                        <th>name</th>
                        <td>{{ $product->name }}</td>
                    </tr>
                    <tr>
                        <th>Description</th>
                        <td>{{ $product->description }}</td>
                    </tr>
                    <tr>
                        <th>Image</th>
                        <td><img src="/products/{{ $product->image }}" width="100" height="100" class="rounded-circle" alt=""></td>
                    </tr>
                </tbody>
               </table>
            </div>
        </div>
    </div>
</div>

@endsection
