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
                                    <h3 class="card-title">User Edit</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form action="{{ url('User_Register') }}" method="POST">
                                    @csrf
                                    <div class="card-body">

                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control" id="name"
                                                placeholder="Enter Name" required value="{{ $userShow->name }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email address</label>
                                            <input type="email" class="form-control" id="email"
                                                placeholder="Enter email" name="email" required
                                                value="{{ $userShow->email }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="type">Type</label>
                                            <select class="form-control" name="type" id="type">
                                                <option>{{ $userShow->type }}</option>
                                                <option value="type1">type 1</option>
                                                <option value="type2">type 2</option>
                                                <option value="type3">type 3</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="level">level</label>
                                            <select class="form-control" name="level" id="level">
                                                <option>{{ $userShow->level }}</option>
                                                <option value="level1">level 1</option>
                                                <option value="level2">level 2</option>
                                                <option value="level3">level 3</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="new_password">Password</label>
                                            <input type="new_password" class="form-control" id="new_password"
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
                    </div>
                </div>


            </section>

        </div>



    </div>


    @include('layouts.footer')
