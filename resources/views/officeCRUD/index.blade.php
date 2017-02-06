
@extends('default')
 
@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Offices</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('officeCRUD.create') }}"> Create New Office</a>
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
            <th>officeCode</th>
            <th>city</th>
            <th>phone</th>
            <th>Addressline1</th>
            <th>Addressline2</th>
            <th>state</th>
            <th>country</th>
            <th>postalcode</th>
            <th>territory</th>

            <th width="280px">Action</th>
        </tr>
    @foreach ($var_o as $key => $office)
    <tr>
        <td>{{ $office->officeCode }}</td>
        <td>{{ $office->city }}</td>
        <td>{{ $office->phone }}</td>
        <td>{{ $office->addressLine1 }}</td>
        <td>{{ $office->addressLine2 }}</td>
        <td>{{ $office->state }}</td>
        <td>{{ $office->country }}</td>
        <td>{{ $office->postalCode }}</td>
        <td>{{ $office->territory }}</td> 
        <td>
            <a class="btn btn-info" href="{{ route('officeCRUD.show', $office->officeCode) }}">Show</a>
            <a class="btn btn-primary" href="{{ route('officeCRUD.edit',$office->officeCode) }}">Edit</a>
            {!! Form::open(['method' => 'DELETE','route' => ['officeCRUD.destroy', $office->officeCode],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}   
        </td>
    </tr>
    @endforeach
    </table>


@endsection