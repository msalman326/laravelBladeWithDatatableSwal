<!doctype html>
<html lang="en">

<head>


    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{ asset('frontend/css/Bootstrap.css') }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}


</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        {{-- <a class="navbar-brand" href="#">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
        </a> --}}
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item ">
                    <a class="nav-link" href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{ url('/students') }}">All Students <span
                            class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/addstudent') }}">Add Studnet</a>
                </li>
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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


            <a href="{{ url('/addstudent') }}">
                <button class="btn btn-dark btn-sm m-2" type="submit">Add</button>
            </a>

        </div>
    </nav>
    <div class="container mt-5">
        <table class="table" id="myTable">



            <thead>
                <tr>
                    <th>Std:Id</th>
                    <th>Name</th>
                    <th>Father Name</th>
                    <th>Course</th>
                    <th>Email</th>
                    <th>Image</th>
                    <th>Action</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($students as $item)
                    <tr>

                        <td>{{ $item->id }}</td>
                        <td>{{ $item->studentName }}</td>
                        <td>{{ $item->fatherName }}</td>
                        <td>{{ $item->courseTitle }}</td>
                        <td>{{ $item->email }}</td>
                        <td>
                            @if ($item->image)
                                <img src="{{ asset('images/' . $item->image) }}"
                                    style="height: 60px;width:50px; border-radius: 30%">
                            @else
                                <span>No image found!</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('student.delete', ['id' => $item->id]) }}"><button
                                    class="btn btn-danger">Delete</button></a>
                            <a href="{{ route('student.edit', ['id' => $item->id]) }}"><button
                                    class="btn btn-primary">Edit</button></a>
                        </td>
                    </tr>
                @endforeach


            </tbody>
        </table>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.7.0.min.js"
    integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script>
<script>
    let table = new DataTable('#myTable');
</script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @if (session('status'))
        <script>
        swal("{{session('status') }}");
    </script>
    
        
    @endif

</html>
