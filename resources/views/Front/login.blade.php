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
                    <div class="col-md-5 card m-2">
                        <div class="login-form card-body">
                            <h5>Login</h5>
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
                        <div>
                            <a href="{{ route('register.create') }}" class="btn btn-primary">Registretion</a>
                        </div>
                    </div>
        <!-- Login End -->
        </div>

    </div>
</div>
@endsection
