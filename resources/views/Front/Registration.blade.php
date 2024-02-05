@extends('Front.layout.app')
@section('main-content')

        <!-- Breadcrumb Start -->
        <div class="breadcrumb-wrap">
            <div class="container">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">User</a></li>
                    <li class="breadcrumb-item active">Registration</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb End -->


<div class="col-md-5 card m-2">

    @if ($form_type == 'create')
    <div class="register-form card-body">
        <h5>User Registration</h5>
        <form action="{{ route('register.store') }}" method="POST">
            @csrf
            @include('validation.validate')
            <div class="row">

                <div class="col-md-6">
                    <label class="form-label" for="fName">Full Name</label>
                    <input class="form-control" name="fName" type="text" placeholder="Full Name" id="fName">
                </div>

                <div class="col-md-6">
                    <label class="form-label" for="username">User ID</label>
                    <input class="form-control" name="username" type="text" placeholder="User ID" id="username">
                </div>

                <div class="col-md-6">
                    <label class="form-label" for="password">Password"</label>
                    <input class="form-control" name="password" type="password" placeholder="Password" id="password">
                </div>

                <div class="col-md-6">
                    <label class="form-label" for="email">E-mail</label>
                    <input class="form-control" name="email" type="email" placeholder="E-mail" id="email">
                </div>

                <div class="col-md-6">
                    <label class="form-label" for="cell">Mobile No</label>
                    <input class="form-control" name="cell" type="tel" placeholder="Mobile No" id="cell">
                </div>

                <div class="col-md-6">
                    <label class="form-label" for="address">Address</label>
                    <input class="form-control" name="address" type="text" placeholder="Address" id="address">
                </div>

                <div class="mt-2">
                    <button type="submit" class="btn btn-outline-primary">Registration</button>
                </div>
            </div>
        </form>
    </div>
    @endif

    @if ($form_type == 'show')

    <div class="register-form card-body">
            @include('validation.validate')
        <a href="{{ route('register.edit',$user_data->id) }}" class="btn btn-outline-info"><i class="fa fa-edit" me-3></i> Edit</a>

            <div class="row">

                <div class="col-md-6">
                    <label class="form-label" for="fName">Full Name</label>
                    <input class="form-control" name="fName" value="{{ $user_data->fName }}" id="fName" readonly>
                </div>

                <div class="col-md-6">
                    <label class="form-label" for="username">User ID</label>
                    <input class="form-control" name="username" value="{{ $user_data->username }}" id="username" readonly>
                </div>

                <div class="col-md-6">
                    <label class="form-label" for="email">E-mail</label>
                    <input class="form-control" name="email" value="{{ $user_data->email }}" id="email" readonly>
                </div>

                <div class="col-md-6">
                    <label class="form-label" for="cell">Mobile No</label>
                    <input class="form-control" name="cell" value="{{ $user_data->cell }}" id="cell" readonly>
                </div>

                <div class="col-md-6">
                    <label class="form-label" for="address">Address</label>
                    <input class="form-control" name="address" value="{{ $user_data->address }}" id="address" readonly>
                </div>

            </div>
    </div>

    @endif

    @if ($form_type == 'edit')
    <div class="register-form card-body">
        <h5>User Registration</h5>
        <form action="{{ route('register.update',$user_data->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">

                <div class="col-md-6">
                    <label class="form-label" for="fName">Full Name</label>
                    <input class="form-control" name="fName" value="{{ $user_data->fName }}" type="text" id="fName">
                </div>

                <div class="col-md-6">
                    <label class="form-label" for="username">User ID</label>
                    <input class="form-control" name="username" value="{{ $user_data->username }}" type="text" id="username">
                </div>

                <div class="col-md-6">
                    <label class="form-label" for="email">E-mail</label>
                    <input class="form-control" name="email" value="{{ $user_data->email }}" type="email" id="email">
                </div>

                <div class="col-md-6">
                    <label class="form-label" for="cell">Mobile No</label>
                    <input class="form-control" name="cell" value="{{ $user_data->cell }}" type="tel" id="cell">
                </div>

                <div class="col-md-6">
                    <label class="form-label" for="address">Address</label>
                    <input class="form-control" name="address" value="{{ $user_data->address }}" type="text" id="address">
                </div>

            </div>
            <div class="row">

                <div class="mt-2">
                    <button type="submit" class="btn btn-outline-primary">Registration</button>
                </div>

            </div>
        </form>
    </div>
    @endif

</div>



@endsection
