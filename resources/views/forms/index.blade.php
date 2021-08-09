@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Create New Role</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('roles.index') }}"> Back</a>
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
<div class="col-md-8">
    <div class="card">
        <div class="card-header">Forms <span class="pull-right"> <a class="btn btn-secondary btn-sm"  href="/forms/create?form_id={{ request('form_id')}}">Add New</a></span></div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

 @if(count ($forms) > 0)
      <div class="table-responsive">

              <table class="table table-hover table-striped table-bordered table-sm">
                    <caption></caption>

                  <thead>
                    <tr>

                      <th scope="col">Name</th>
                      <th scope="col">Show</th>
                      <th scope="col">New Field</th>
                      <th scope="col">Edit</th>
                      <th scope="col">Delete</th>

                    </tr>
                  </thead>
                  <tbody>
        @foreach($forms as $form)

                    <tr>



                      <td>{{ $form->name }}</td>


                   <td><a class="btn btn-info" href="{{ route('forms.show',$form->id) }}">Show</a></td>

                   {{-- <td><a class="btn btn-info" href="{{ route('fields.create',$form->id) }}">New Field</a></td> --}}
                    <td><a class="btn btn-info" href="/fields/create?form_id={{ $form->id }}"> New Field</a></td>

                   <td><a href="/forms/{{$form->id}}/edit" class="btn btn-primary">Edit</a></td>


<td>


    <form method="POST" action="/forms/{{$form->id}}">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}

        <div class="form-group">
            <input type="submit" class="btn btn-danger delete-form" value="Delete form">
        </div>
    </form>
</td>

<script>
    $('.delete-form').click(function(e){
        e.preventDefault() // Don't post the form, unless confirmed
        if (confirm('Are you sure?')) {
            // Post the form
            $(e.target).closest('form').submit() // Post the surrounding form
        }
    });
</script>



                    </tr>


          @endforeach

        </tbody>
      </table>
  </div>

        @else

        {{ __('messages.no kin defined')}}

          <a class="pull-right" href="/forms/create?employee_id={{ request('employee_id') }}">Add</a>


        @endif


        </div>
    </div>
</div>


@endsection
