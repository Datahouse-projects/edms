@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Create New Field</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('fields.index') }}"> Back</a>
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


{!! Form::open(array('route' => 'fields.store','method'=>'POST')) !!}
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
        </div>
    </div>

    {{ Form::hidden('form_id', $form_id) }}

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Label:</strong>
            {!! Form::text('label', null, array('placeholder' => 'Label','class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group" >
            <label for="input_type">Input Type:</label>
            <select class="form-control" id="input_type" name="input_type">
                {{-- @foreach ($groups as $group) --}}
                    {{-- <option value ="{{$group->id}}">{{ $group->name }}</option> --}}
                {{-- @endforeach --}}
                <option value ="Text">Text</option>
                <option value ="Number">Number</option>
                <option value ="Date">Date</option>
            </select>
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Variable Name:</strong>
            {!! Form::text('variable_name', null, array('placeholder' => 'Variable Name','class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group" >
            <label for="variable_type">Variable Type:</label>
            <select class="form-control" id="variable_type" name="variable_type">
                {{-- @foreach ($groups as $group) --}}
                    {{-- <option value ="{{$group->id}}">{{ $group->name }}</option> --}}
                {{-- @endforeach --}}
                <option value ="string">String</option>
                <option value ="id">Id</option>
                <option value ="integer">Integer</option>
                <option value ="bigInteger">bigInteger</option>
                <option value ="timestamps">timestamps</option>
            </select>
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Variable Length:</strong>
            {!! Form::text('variable_length', null, array('placeholder' => 'Variable Length','class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Default:</strong>
            {!! Form::text('default', null, array('placeholder' => 'Default','class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
{!! Form::close() !!}



@endsection
