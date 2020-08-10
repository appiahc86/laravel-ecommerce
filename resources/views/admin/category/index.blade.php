@extends('layouts.admin')

@section('content')



    <div class="card">
        <div class="card-header"><strong>All Categories</strong>
            <span class="d-flex justify-content-end">
                <a href="{{ route('category.create') }}" class="btn btn-success btn-sm"><b>Add Category</b></a>
            </span>
        </div>

        <div class="card-body">
            <div class="table-responsive">

                @if(count($categories) > 0)
                    @php

                        $a = 1;

                    @endphp

                <table class="table table-hover table-sm">
                    <thead>
                    <tr>
                        <th>NO.</th>
                        <th>Category Name</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
            <tbody>



@foreach($categories as $category)

    <tr>
        <td>{{ $a }}</td>
        <td>{{ $category->name }}</td>
        <td>
            <a href="{{ route('category.edit',$category->id) }}" class="btn btn-primary btn-sm">Edit</a>
        </td>
        <td>
            {!! Form::open(['method'=>'DELETE', 'action'=>['CategoryController@destroy', $category->id]]) !!}
            {!! Form::submit('Delete', ['class'=>'btn btn-danger btn-sm', 'onclick'=>'return confirm(\'Are you sure you want to delete?\')']) !!}
            {!! Form::close() !!}
        </td>
    </tr>


    @php $a += 1; @endphp


@endforeach


                @else

                <h3 class="text-center text-primary">No category found</h3>

            @endif
            </tbody>


                </table>
            </div>
        </div>

    </div>

@endsection
