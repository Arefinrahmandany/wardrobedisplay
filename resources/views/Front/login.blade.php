@extends('Front.layout.app')
@section('main-content')

        <!-- Breadcrumb Start -->
        <div class="breadcrumb-wrap">
            <div class="container">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">User</a></li>
                    <li class="breadcrumb-item active">Login</li>
                </ul>
        <!-- Breadcrumb End -->


        <div class="row">
        <!-- Login Start -->
                <div class="section-header">
                    <h3>Login</h3>
                </div>
                    <div class="col-md-8 card m-2">
                        <div class="login-form card-body">
                            <div class="d-flex justify-content-between">
                                <h5>Login</h5>
                                <h5><a href="{{ route('register.create') }}" class="btn btn-primary">Registretion</a></h5>
                            </div>

                            <form action="{{ route('admin.login') }}" method="POST" >
                                @csrf
                                @include('validation.validate')
                                <div class="row">

                                    <div class="col-md-5">
                                        <label class="form-label" for="auth">E-mail / Username</label>
                                        <input class="form-control" type="text" name="auth" placeholder="User ID" id="auth">
                                    </div>

                                    <div class="col-md-5">
                                        <label class="form-label" for="password">Password</label>
                                        <input class="form-control" type="password" name="password" placeholder="Password" id="password">
                                    </div>

                                    <div class="col-md-12">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="newaccount">
                                            <label class="custom-control-label" for="newaccount">Keep me signed in</label>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-outline-success">Login</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="row d-flex">
                            <div class="col-md-3 mb-3 m-1 p-1">
                                <a href="{{ route('fb.req') }}" class="btn btn-facebook btn-block btn-primary">Facebook <i class="fa fa-facebook"></i> </a>
                            </div>
                            <div class="col-md-3 m-1 p-1">
                                <a href="" class="btn btn-google btn-block btn-danger">Google <i class="fa fa-google-plus" aria-hidden="true"></i></i></a>
                            </div>
                            <div class="col-md-3 m-1 p-1">
                                <a href="" class="btn btn-block bg-gradient btn-lg btn-primary">Instagam <i class="fa fa-instagram"></i></a>
                            </div>
                        </div>

                    </div>
        <!-- Login End -->
        </div>

    </div>
</div>
@endsection
