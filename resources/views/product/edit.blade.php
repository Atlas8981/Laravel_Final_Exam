@extends('admin.main')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Edit post</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active">Static Navigation</li>
        </ol>
        <div class="card mb-4">
            <div class="card-body">

                @if(Session::has('product_update'))
                <p>{!! session('product_update') !!}</p>
                @endif

                {!! Form::model($product ,
                array('route' => array('product.update', $product->id),
                'method'=>'PUT','files'=>'true')
                ) !!}

                {!! Form::label('name', 'Name:') !!}
                {!! Form::text('name',null, array('class'=>'form-control')) !!}
                <span class="text-danger">{{ $errors->first('name') }}</span>
                <br>
                {!! Form::label('description', 'Description:') !!}
                {!! Form::text('description',null, array('class'=>'form-control')) !!}
                <span class="text-danger">{{ $errors->first('description') }}</span>
                <br>
                {!! Form::label('photo', 'Photo:') !!}
                {!! Form::file('photo',null, array('class'=>'form-control')) !!}
                <span class="text-danger">{{ $errors->first('photo') }}</span>
                <br>
                {!! Form::label('price', 'Price:') !!}
                {!! Form::text('price',null, array('class'=>'form-control')) !!}
                <span class="text-danger">{{ $errors->first('price') }}</span>
                <br>

                {!! Form::submit('Update Product', array('class'=>'secondary-cart-btn')) !!}
                <a class="btn btn-primary" href="{!! url('/product') !!}">List</a>
                {!! Form::close() !!}

            </div>
        </div>
        <div style="height: 100vh"></div>
        <div class="card mb-4">
            <div class="card-body">When scrolling, the navigation stays at the top of the page. This is the end of the static navigation demo.</div>
        </div>
    </div>
</main>
@endsection