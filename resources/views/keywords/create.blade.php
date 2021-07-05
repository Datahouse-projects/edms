<html>
<head>
  <title>Laravel 8 File Upload Example - Tutsmake.com</title>

  <meta name="csrf-token" content="{{ csrf_token() }}">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">


</head>
<body>

<div class="container mt-4">



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
</div>

</div>
</body>
</html>
