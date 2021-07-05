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

      <form method="POST"  action="{{ url('forms/'.$form->id) }}" >

        @csrf

        {{ method_field('PUT') }}

          <div class="row">

              <div class="col-md-12">
                  <div class="form-group">
                      <label for ="name" >Form Name</label>
                      <input type="text" name="name" placeholder="Short name" id="name" value = "{{$form->name}}">
                        @error('name')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                  </div>


              </div>

              <div class="col-md-12">
                  <button type="submit" class="btn btn-primary" id="submit">Submit</button>
              </div>
          </div>
      </form>
</div>

</div>
</body>
</html>
