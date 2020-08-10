@extends('layouts.admin')

@section('content')


    @if(isset($category))


        <div class="card">
            <div class="card-header"><strong>Edit Category</strong></div>

            <div class="card-body">

                @include('partials.errors')

                {!! Form::model($category,['method'=>'PATCH', 'action'=>['CategoryController@update',$category->id]]) !!}

                <div class="form-group">
                    {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Category Name']) !!}
                </div>

                <div class="form-group">
                    {!! Form::submit('Update', ['class'=>'btn btn-primary btn-sm']) !!}
                </div>

                {!! Form::close() !!}


            </div>
        </div>

        @else




    <div class="card">
        <div class="card-header"><strong>Create Category</strong></div>

        <div class="card-body">

            @include('partials.errors')

            {!! Form::open(['method'=>'POST', 'action'=>'CategoryController@store']) !!}


            <div class="form-group">
                {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Category Name']) !!}
            </div>


            <div class="form-group">
                {!! Form::submit('Add Category',['class'=>'btn btn-primary btn-sm']) !!}
            </div>

            {!! Form::close() !!}


        </div>
    </div>



    @endif


@endsection
