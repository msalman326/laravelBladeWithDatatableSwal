<!doctype html>
<html lang="en">
  <head>
    
    
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{asset('frontend/css/Bootstrap.css')}}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}

    
</head>
  <body>
    
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item ">
              <a class="nav-link" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="{{url('/addstudent')}}">Add Student</a>
            </li>
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }}
                </a>

                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
            </ul>
            
            
            
              
        </div>
    </nav>



    <form action="{{$url}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="container">
            <h1 class="text-center text-primary">{{$title}} </h1>
        
        <div class="row">
            <div class="form-group col-md-6 ">
                <label for="">Student Name:</label>
                <input class="form-control" type="text" name="studentName" id="" value="{{$student->studentName}}" value="{{old('studentName')}}">
                <span class="text-danger">
                    @error('studentName')
                        {{ $message }}
                    @enderror
                </span>
            </div>
            <div class="form-group col-md-6 ">
                <label for="">Father Name:</label>
                <input class="form-control" type="text" name="fatherName" id="" value="{{$student->fatherName}}" value="{{old('fatherName')}}">
                <span class="text-danger">
                    @error('fatherName')
                        {{ $message }}
                    @enderror
                </span>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-6 ">
                <label for="">Course Title:</label>
                <input class="form-control" type="text" name="courseTitle" id="" value="{{$student->courseTitle}}" value="{{old('courseTitle')}}">
                <span class="text-danger">
                    @error('courseTitle')
                        {{ $message }}
                    @enderror
                </span>
            </div>
            <div class="form-group col-md-6">
                <label for="">Email:</label>
                <input class="form-control" type="text" name="email" id="" value="{{$student->email}}" value="{{old('email')}}">
                <span class="text-danger">
                    @error('email')
                        {{ $message }}
                    @enderror
                </span>
            </div>
        </div>
        
        
        <div class="row">
        
        <div class=" form-group col-md-12 ">
            <label for="">Image</label>
            <input type="file" class="form-control border form-control" name="image">
        </div>
        </div>


            <button class=" mt-5 form-control btn btn-primary">
                Submit
            </button>

    </div>

    </form>
    
        
    </body>
    <script src="{{asset('frontend/js/bootstrap.bundle.min.js')}}"></script>

</html>