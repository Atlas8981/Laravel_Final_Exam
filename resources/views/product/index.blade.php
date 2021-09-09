@extends('admin.main')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Product list</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active">Static Navigation</li>
        </ol>
        <div class="card mb-4">
            <div class="card-body">
                @if(Session::has('product_delete'))
                <div>
                    <p>{!! session('product_delete') !!}</p>
                </div>
                @endif
                <a class="btn btn-primary" href="{!! url('product/create') !!}">Create Product</a>
                <!-- @if(Session::has('category_update'))
                <div>
                    <p>{!! session('category_update') !!}</p>
                </div>
                @endif -->
                @if (count($products) > 0)
                <table class="table table-striped task-table">
                    <thead>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Image</th>
                    </thead>

                    <tbody>
                        @foreach ($products as $product)
                        <tr>
                            <td>
                                <div>{!! $product->name !!}</div>
                            </td>
                            <td>
                                <div>{!! $product->description !!}</div>
                            </td>
                            <td>
                                <div>{!! $product->price !!}</div>
                            </td>
                            <td>
                                <div>{!! Html::image("/img/products/".$product->photo, $product->name, array('width'=>'120')) !!}</div>
                            </td>

                            <td><a href="{!! url('product/' . $product->id . '/edit') !!}">Edit</a></td>

                            <td>
                                {!! Form::open(array('url'=>'product/'. $product->id, 'method'=>'DELETE')) !!}
                                {!! csrf_field() !!}
                                {!! method_field('DELETE') !!}
                                <button class="btn btn-danger delete">Delete</button>
                                {!! Form::close() !!}

                            </td>

                        </tr>

                        @endforeach

                    </tbody>
                </table>
                <script>
                    $(".delete").click(function() {
                        var form = $(this).closest('form');
                        $('<div></div>').appendTo('body')
                            .html('<div><h6> Are you sure ?</h6></div>')
                            .dialog({
                                modal: true,
                                title: 'Delete message',
                                zIndex: 10000,
                                autoOpen: true,
                                width: 'auto',
                                resizable: false,
                                buttons: {
                                    Yes: function() {
                                        $(this).dialog('close');
                                        form.submit();
                                    },
                                    No: function() {

                                        $(this).dialog("close");
                                        return false;
                                    }
                                },
                                close: function(event, ui) {
                                    $(this).remove();
                                }
                            });
                        return false;
                    });
                </script>
                @endif
            </div>
        </div>
        <div style="height: 100vh"></div>
    </div>
</main>
@endsection