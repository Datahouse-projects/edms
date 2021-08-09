@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-8 margin-tb">
        <div class="pull-left">
            <h2>Document Management - {{$group_name}}</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('keywords.create') }}"> Create New</a>
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
   <th>No</th>
   <th>Name</th>
   <th>Object Id</th>
   <th>pages</th>
   <th width="280px">Action</th>
 </tr>
 @foreach ($data as $key => $keyword)
  <tr>
    <td>{{ ++$i }}</td>
    <td>{{ $keyword->name }}</td>
    <td>{{ $keyword->object_id }}</td>
    <td>{{ $keyword->pages }}</td>

    <td>
       <a class="btn btn-info" href="{{ route('keywords.show',$keyword->id) }}">Show</a>
       <a class="btn btn-primary" href="{{ route('keywords.edit',$keyword->id) }}">Edit</a>
        {!! Form::open(['method' => 'DELETE','route' => ['keywords.destroy', $keyword->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
    </td>
  </tr>
 @endforeach
</table>


{!! $data->render() !!}



@endsection
