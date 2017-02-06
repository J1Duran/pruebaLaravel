@extends('default')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Create New Office</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('officeCRUD.index') }}"> Back</a>
            </div>
        </div>
    </div>

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {!! Form::open(array('route' => 'officeCRUD.store','method'=>'POST')) !!}
    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>City:</strong>
                {!! Form::text('city', null, array('placeholder' => 'city','class' => 'form-control')) !!}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Phone:</strong>
                {!! Form::textarea('phone', null, array('placeholder' => 'Phone','class' => 'form-control','style'=>'height:100px')) !!}
            </div>
        </div>

         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>AddressLine1:</strong>
                {!! Form::textarea('addressLine1', null, array('placeholder' => 'AddressLine1','class' => 'form-control','style'=>'height:100px')) !!}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>AddressLine2:</strong>
                {!! Form::textarea('addressLine2', null, array('placeholder' => 'AddressLine2','class' => 'form-control','style'=>'height:100px')) !!}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>State:</strong>
                {!! Form::textarea('state', null, array('placeholder' => 'State','class' => 'form-control','style'=>'height:100px')) !!}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>country:</strong>
                {!! Form::textarea('country', null, array('placeholder' => 'Country','class' => 'form-control','style'=>'height:100px')) !!}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>PostalCode:</strong>
                {!! Form::textarea('postalCode', null, array('placeholder' => 'PostalCode','class' => 'form-control','style'=>'height:100px')) !!}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Territory:</strong>
                {!! Form::textarea('territory', null, array('placeholder' => 'Territory','class' => 'form-control','style'=>'height:100px')) !!}
            </div>
        </div>



        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>

    </div>
    {!! Form::close() !!}

@endsection