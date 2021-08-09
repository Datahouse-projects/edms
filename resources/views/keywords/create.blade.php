@extends('layouts.app')


@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Create New Document</h2>
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


      <form method="POST"  action="{{ url('keywords') }}" >

        @csrf

          <div class="row">
              <div class="col-md-9">
                  <iframe src ="{{ asset('storage').'/'.$filename }}" width="800px" height="1024px"></iframe>
              </div>

                {{-- width='724' height='1024'
                width='566' height='800'
                width='389' height='550'
                width='210' height='297' --}}

              <div class="col-md-3">
                 <div class="form-group">
                      {{-- <label for ="filename" >File name</label> --}}
                      <input type="text" name="filename" placeholder="filename" id="filename" value="{{$filename}}" readonly>
                        @error('filename')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                  </div>

                  <div class="form-group">
                      {{-- <label for ="name" >Name</label> --}}
                      <input type="text" name="name" placeholder="name" id="name">
                        @error('name')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                  </div>

                  <div class="form-group">
                      {{-- <label for ="object" >Object</label> --}}
                      <input type="number" name="object" placeholder="object" id="object">
                        @error('object')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                  </div>

                  <button type="submit" class="btn btn-primary" id="submit">Submit</button>

              </div>


          </div>
      </form>
@endsection
