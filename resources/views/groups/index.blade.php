@extends('layouts.app')


@section('content')



@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif


 <div class="table-responsive" style="line-height: 0.5">
            <table class="table table-hover table-striped table-bordered table-sm" id="sample_1">
                  <caption class="caption-top"><h5>Groups Management<span class="pull-right"> <a class="btn btn-success" href="{{ route('groups.create') }}"> Create New Group</a></h5></caption>
  <thead>
  <tr>
     <th>No</th>
     <th>Name</th>
     <th>Description</th>
     <th width="280px">Action</th>
  </tr>
  </thead>
  <tbody>
    @foreach ($groups as $key => $group)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $group->name }}</td>
        <td>{{ $group->description }}</td>
        <td>
            <a class="btn btn-info" href="{{ route('groups.show',$group->id) }}">Show</a>
            {{-- @can('group-edit') --}}
                <a class="btn btn-primary" href="{{ route('groups.edit',$group->id) }}">Edit</a>
            {{-- @endcan --}}
            {{-- @can('group-delete') --}}
                {!! Form::open(['method' => 'DELETE','route' => ['groups.destroy', $group->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
            {{-- @endcan --}}
        </td>
    </tr>
    @endforeach

  </tbody>
</table>






@endsection
