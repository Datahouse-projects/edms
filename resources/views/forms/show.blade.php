<!DOCTYPE html>
<html>
<head>
  <title>Form</title>

  <meta name="csrf-token" content="{{ csrf_token() }}">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">


</head>
<body>

    <div>
        @if (session('status'))
       <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
    </div>

<div class="container mt-4">

  <h2 class="text-center">Form</h2>

  @section('content')
<div class="col-md-8">
    <div class="card">
        <div class="card-header">{{ __('messages.forms') }} <span class="pull-right"> <a class="btn btn-secondary btn-sm"  href="/forms/create?form_id={{ request('form_id')}}">{{ __('messages.add') }}</a></span></div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

 @if ($form)
      <div class="table-responsive">

              <table class="table table-hover table-striped table-bordered table-sm">
                    <caption></caption>

                  <thead>
                    <tr>

                      <th scope="col">{{ __('messages.name') }}</th>

                      <th scope="col">{{ __('messages.edit') }}</th>
                      <th scope="col">{{ __('messages.delete') }}</th>

                    </tr>
                  </thead>
                  <tbody>


                    <tr>



                      <td>{{ $form->name }}</td>




<td><a href="/forms/{{$form->id}}/edit" class="btn btn-primary">Edit</a></td>


<td>


    <form method="POST" action="/forms/{{$form->id}}">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}

        <div class="form-group">
            <input type="submit" class="btn btn-danger delete-form" value="Delete">
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




        </tbody>
      </table>
  </div>

        @else

        {{ __('messages.no kin defined')}}

          <a class="pull-right" href="/kins/create?employee_id={{ request('employee_id') }}">{{ __('messages.add')}}</a>


        @endif


        </div>
    </div>
</div>


</div>

</div>
</body>
</html>
