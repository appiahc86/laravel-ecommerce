
@extends('layouts.admin')

@section('content')



    <div class="card">
        <div class="card-header"><strong>All Products</strong>
            <span class="d-flex justify-content-end">
                <a href="{{ route('product.create') }}" class="btn btn-success btn-sm"><b>Add Product</b></a>
            </span>
        </div>

        <div class="card-body">
            <div class="table-responsive">

                @if(count($products) > 0)
                    @php

                        $a = 1;

                    @endphp

                    <table class="table table-hover table-sm">
                        <thead>
                        <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Category</th>
                            <th>Description</th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>

                        <tbody>



                        @foreach($products as $product)

                            <tr>
                                <td><img src=" {{ asset('storage/' . $product->img1) }}" width="64" height="64" alt=""></td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->category }}</td>
                                <td>{{ str_limit($product->description, 30) }}</td>
                                <td>
                                    <a href="{{ route('product.edit',$product->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                </td>
                                <td>
                                    {!! Form::open(['method'=>'DELETE', 'action'=>['ProductController@destroy', $product->id]]) !!}
                                    {!! Form::submit('Delete', ['class'=>'btn btn-danger btn-sm', 'onclick'=>'return confirm(\'Are you sure you want to delete?\')']) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>


                            @php $a += 1; @endphp


                        @endforeach


                        @else

                            <h3 class="text-center text-primary">No Product found</h3>

                        @endif
                        </tbody>


                    </table>
            </div>
        </div>

        <div class="card-footer">
            <div class="d-flex justify-content-end">{{ $products->render() }}</div>

        </div>

    </div>

@endsection
