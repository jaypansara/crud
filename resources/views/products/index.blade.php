@extends('layouts.app')
@section('content')
    <div class="container">
          <div class="text" style="text-align: right">
            <a href="{{ route('product.create') }}" class="btn btn-primary mt-3">Add Products</a>
          </div>
          <div class="table-responsive mt-3">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Sr No.</th>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Image</th>
                        <th >Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)

                    <tr class="">
                        <td>{{ $loop->index }}</td>
                        <td ><a href="{{ route('product.show',$product->id) }}" class="text-dark" style="text-decoration: none">{{ $product->name }}</a></td>
                        <td>{{ $product->description }}</td>
                        <td><img src="products/{{ $product->image }}" width="100" height="100" class="rounded-circle" alt=""></td>

                        <td >
                            <a href="{{ route('product.show',$product->id) }}" class="btn btn-dark d-inline">Show</a>
                            <a href="{{ route('product.edit',$product->id) }}" class="btn btn-dark d-inline">Edit</a>
                            <form action="{{  route('product.destroy',$product->id) }}" class="d-inline" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Delete</button>

                            </form>

                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
          </div>

    </div>

    @endsection


