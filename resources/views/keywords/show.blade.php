@extends('layouts.app')


@section('content')

<div class="row">
    <div class="col-md-12 margin-tb">
        <div class="pull-left">
            <h2>{{ucfirst($objekt->name)}}</h2>
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




          <div class="row">
              <div class="col-md-8 pull-left">
                  <iframe src ="{{ asset('storage').'/'.$objekt->path }}" width="800px" height="1024px"></iframe>
              </div>

                {{-- width='724' height='1024'
                width='566' height='800'
                width='389' height='550'
                width='210' height='297' --}}
                <div class="col-md-3 pull-right">

                <table class="table table-hover table-striped table-bordered table-sm">
                    <tr>
                        <td></td><td></td>
                    </tr>
                    <tr>
                        <td></td><td></td>
                    </tr>
                 <tr>
                        <td></td><td></td>
                    </tr>
                </table>
                </div>




              </div>




@endsection
