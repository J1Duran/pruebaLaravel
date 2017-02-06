@extends('default')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Product Line</h2>
            </div>
            < <div class="pull-right">
                <a class="btn btn-success" href="{{ route('productLines.create') }}"> Create New PL</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered">
        <tr>
            <th>Title</th>
            <th>Description</th>
              <th width="280px">Action</th>
        </tr>
    @foreach ($var_pl as $key => $product)
    <tr>
        <td>{{ $product->productLine}}</td>
        <td>{{ $product->textDescription}}</td>
        <td>
           <a class="btn btn-info" href="{{ route('productLines.show',$product->productLine) }}">Show</a>
           <a class="btn btn-primary" href="{{ route('productLines.edit',$product->productLine) }}">Edit</a>
           {!! Form::open(['method' => 'DELETE','route' => ['productLines.destroy', $product->productLine],'style'=>'display:inline']) !!}
           {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
           {!! Form::close() !!}
       </td>
        <!-- <td>{{ $product->TextDescription }}</td> -->
    </tr>
    @endforeach
    </table>

@endsection
