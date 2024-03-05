@include('layouts.header')

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>


            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">


                <li class="nav-item">



                <li>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-primary">Logout</button>
                    </form>
                </li>
                </li>
            </ul>
        </nav>
        @include('layouts.sidebar')
        <div class="content-wrapper">
            <!-- Main content -->
            <section class="content">

                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1>User</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item">User
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div><!-- /.container-fluid -->
                </section>

                <div class="container-fluid">
                    <div class="row  justify-content-center d-flex">
                        <!-- left column -->
                        <div class="col-md-8">
                            <!-- general form elements -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">User Register</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form action="{{ url('User_Register') }}" method="POST">
                                    @csrf
                                    <div class="card-body">

                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control" id="name"
                                                placeholder="Enter Name" required autofocus name="name">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email address</label>
                                            <input type="email" class="form-control" id="email"
                                                placeholder="Enter email" name="email" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="type">Type</label>
                                            <select class="form-control" name="type" id="type">
                                                <option>Select user Type</option>
                                                <option value="type1">type 1</option>
                                                <option value="type2">type 2</option>
                                                <option value="type3">type 3</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="level">level</label>
                                            <select class="form-control" name="level" id="level">
                                                <option>Select user Type</option>
                                                <option value="level1">level 1</option>
                                                <option value="level2">level 2</option>
                                                <option value="level3">level 3</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control" id="password"
                                                placeholder="Password" name="password" required
                                                autocomplete="new-password">
                                        </div>

                                        {{-- <div class="form-group">
                                            <label for="password_confirmation">Password</label>
                                            <input type="password" class="form-control" id="password_confirmation"
                                                placeholder="Password" name="password_confirmation" required>
                                        </div> --}}


                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>


                            </div>
                        </div>
                        <div class="col-md-12 mt-3">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">User Table</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Type</th>
                                                <th>Level</th>
                                                <th>Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $no = '1';
                                            @endphp
                                            @foreach ($showUser_datas as $showUser)
                                                <tr>
                                                    <td>{{ $no }}</td>
                                                    <td>{{ $showUser->name }}</td>
                                                    <td>{{ $showUser->email }}</td>
                                                    <td>{{ $showUser->type }}</td>
                                                    <td>{{ $showUser->level }}</td>
                                                    <td>{{ $showUser->created_at }}</td>
                                                    <td>
                                                        <a href="{{ url('userShow', $showUser->id) }}"
                                                            class="btn btn-success">
                                                            <i class="fa-solid fa-pen-to-square"></i>

                                                        </a>

                                                        <a href="{{ url('delete_user', $showUser->id) }}"
                                                            class="btn btn-danger"
                                                            onclick="return confirm('Are you sure you want to delete this user ?')">
                                                            <i class="fa-solid fa-trash"></i></a>

                                                    </td>
                                                </tr>
                                                @php
                                                    $no++;
                                                @endphp
                                            @endforeach

                                        </tbody>

                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>
                    </div>
                </div>

            </section>

        </div>



    </div>


    @include('layouts.footer')
