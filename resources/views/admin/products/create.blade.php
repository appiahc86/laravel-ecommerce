@extends('layouts.admin')

@section('content')


    @if(isset($product))


        <div class="card">
            <div class="card-header"><strong>Edit Product</strong></div>

            <div class="card-body">

                @include('partials.errors')

                {!! Form::model($product,['method'=>'PATCH', 'action'=>['ProductController@update', $product->id], 'files'=>true]) !!}


                <div class="form-group">
                    {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Product Name']) !!}
                </div>

                <div class="form-group">
                    {!! Form::number('price', null, ['class'=>'form-control', 'placeholder'=>'Product Price', 'step'=>0.01]) !!}
                </div>

                <div class="form-group">
                    {!! Form::select('category', array(''=>'Select Category') + $category, null, ['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::file('image_one',  null, ['class'=>'form-control']) !!}
                    <span><img src="{{ asset('storage/' . $product->img1) }}" width="60" height="60" alt=""></span>
                </div>

                <div class="form-group">
                    {!! Form::file('image_two',  null, ['class'=>'form-control']) !!}
                    <span><img src="{{ asset('storage/' . $product->img2) }}" width="60" height="60" alt=""></span>
                </div>

                <div class="form-group">
                    {!! Form::file('image_three',  null, ['class'=>'form-control']) !!}
                    <span><img src="{{ asset('storage/' . $product->img3) }}" width="60" height="60" alt=""></span>
                </div>

                <div class="form-group">
                    {!! Form::file('image_four',  null, ['class'=>'form-control']) !!}
                    <span><img src="{{ asset('storage/' . $product->img4) }}" width="60" height="60" alt=""></span>
                </div>

                <div class="form-group">
                    {!! Form::textarea('description',  null, ['class'=>'form-control', 'placeholder'=>'Product Description', 'rows'=>4]) !!}
                </div>

                <div class="form-group">
                    {!! Form::submit('Update Product',['class'=>'btn btn-primary btn-sm']) !!}
                </div>

                {!! Form::close() !!}


            </div>
        </div>

    @else




        <div class="card">
            <div class="card-header"><strong>Add Product</strong></div>

            <div class="card-body">

                @include('partials.errors')

                {!! Form::open(['method'=>'POST', 'action'=>'ProductController@store', 'files'=>true]) !!}


                <div class="form-group">
                    {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Product Name']) !!}
                </div>

                <div class="form-group">
                    {!! Form::number('price', null, ['class'=>'form-control', 'placeholder'=>'Product Price', 'step'=>0.01]) !!}
                </div>

                <div class="form-group">
                    {!! Form::select('category', array(''=>'Select Category') + $category, null, ['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    <span>{{ Form::label('image_one', 'Image One') }}</span>
                    {!! Form::file('image_one',  null, ['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    <span>{{ Form::label('image_two', 'Image Two') }}</span>
                    {!! Form::file('image_two',  null, ['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    <span>{{ Form::label('image_three', 'Image Three') }}</span>
                    {!! Form::file('image_three',  null, ['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    <span>{{ Form::label('image_four', 'Image Four') }}</span>
                    {!! Form::file('image_four',  null, ['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::textarea('description',  null, ['class'=>'form-control', 'placeholder'=>'Product Description', 'rows'=>4]) !!}
                </div>

                <div class="form-group">
                    {!! Form::submit('Add Product',['class'=>'btn btn-primary btn-sm']) !!}
                </div>

                {!! Form::close() !!}


            </div>
        </div>



    @endif


@endsection


@section('script')

<script>

$('#image_one').bind('change', function() {

   if($(this)[0].files[0].size > 1024000){

  //alert("Image size cannot be more than 1MB");
alert('hey');
  $(this).val("");

   }

  //this.files[0].size gets the size of your file.
  //alert(this.files[0].size);

  //$(this).val("");  

});

</script>
    
@endsection