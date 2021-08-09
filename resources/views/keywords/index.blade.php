@extends('layouts.app')


@section('content')


@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif

 <div class="table-responsive" style="line-height: 0.5">
            <table class="table table-hover table-striped table-bordered table-sm" id="sample_1">
                  <caption class="caption-top"><h5>Document Management - {{ucfirst($group_name)}}<span class="pull-right"> <a  href="{{ route('keywords.create') }}"> Create New</a></span></h5></caption>

                  <thead>
                    <tr>
                        {{-- <th>No</th> --}}
                         <th>Icon</th>
                        <th>Name</th>
                        <th>Object Id</th>
                        <th>Pages</th>
                        <th>Extension</th>

                        <th>User</th>

                        <th width="280px">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                       @foreach ($data as $key => $keyword)
                           <tr>
                                {{-- <td>{{ ++$i }}</td> --}}
                                <td><img src="{{ asset('storage/fileicon/'.$keyword->extension.'.png') }}" width="16" height="16"></td>
                                <td>{{ $keyword->name }}</td>
                                <td>{{ $keyword->id }}</td>
                                <td>{{ $keyword->pages }}</td>
                                <td>{{ $keyword->extension }}</td>
                                <td>{{ $keyword->username }}</td>

                                {{-- src="{{ asset('storage/images/'.$article->image) }}" alt="" title="" --}}



                                <td>
                                <a  href="{{ route('keywords.show',$keyword->id) }}">Show</a> |
                                <a href="{{ route('keywords.edit',$keyword->id) }}">Edit</a> |
                                    {!! Form::open(['method' => 'DELETE','route' => ['keywords.destroy', $keyword->id],'style'=>'display:inline']) !!}
                                        {!! Form::submit('Delete', ['class' => 'btn btn-link btn-sm']) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                  </tbody>
            </table>





 </div>

@endsection
