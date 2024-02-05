@extends('Admin.layout.app')
@section('main-content')


<main>
    <div class="container">
        <div class="mt-4">
            <h3>User Manage</h3>
        </div>
        <div class="row">
            <div class="col-md-4 card">
                @if( $form_type == 'create')
                <div class="card-body">
                    <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @include('validation.validate')

                        <div class="form-group m-2 p-1">
                            <label class="form-lable" for="name">Full Name</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Full Name">
                        </div>
                        <div class="form-group m-2 p-1">
                            <label class="form-lable" for="email">Email</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="E-mail">
                        </div>
                        <div class="form-group m-2 p-1">
                            <label class="form-lable" for="cell">Phone Number</label>
                            <input type="tel" name="cell" class="form-control" id="cell" placeholder="Phone Number">
                        </div>
                        <div class="form-group m-2 p-1">
                            <label class="form-lable" for="username">User Name</label>
                            <input type="text" name="username" class="form-control" id="username" placeholder="User Name">
                        </div>
                        <div class="form-group m-2 p-1">
                            <label class="form-lable" for="location">Address</label>
                            <input type="text" name="location" class="form-control" id="location" placeholder="Address">
                        </div>
                        <div class="form-group m-2 p-1">
                            <label class="form-lable" for="dob">Date of Birth</label>
                            <input type="date" name="dob" class="form-control" id="dob" placeholder="Date of Birth">
                        </div>
                        <div class="form-group m-2 p-1">
                            <label class="form-lable" for="bio">Bio</label>
                            <input type="text" name="bio" class="form-control" id="bio" placeholder="Bio">
                        </div>
                        <div class="form-group m-2 p-1">
                            <label class="form-lable" for="photo">photo</label>
                            <input type="file" name="photo" class="form-control" id="photo" placeholder="Photo" multiple>
                        </div>
                        <div class="form-group m-2 p-1">
                            <button type="submit" class="btn btn-outline-primary">Submit</button>
                        </div>

                    </form>
                </div>
                @endif

                @if( $form_type == 'edit')
                <div class="card-body">
                    <form action="{{ route('user.update',$admin_data->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        @include('validation.validate')

                        <div class="form-group m-2 p-1">
                            <label class="form-lable" for="name">Full Name</label>
                            <input type="text" name="name" class="form-control" id="name" value="{{ $admin_data->name }}">
                        </div>
                        <div class="form-group m-2 p-1">
                            <label class="form-lable" for="email">E-Mail</label>
                            <input type="email" name="email" class="form-control" id="email" value="{{ $admin_data->email }}">
                        </div>
                        <div class="form-group m-2 p-1">
                            <label class="form-lable" for="cell">Phone Number</label>
                            <input type="tel" name="cell" class="form-control" id="cell" value="{{ $admin_data->cell }}">
                        </div>
                        <div class="form-group m-2 p-1">
                            <label class="form-lable" for="username">User Name</label>
                            <input type="text" name="username" class="form-control" id="username" value="{{ $admin_data->username }}">
                        </div>
                        <div class="form-group m-2 p-1">
                            <label class="form-lable" for="location">Address</label>
                            <input type="text" name="location" class="form-control" id="location" value="{{ $admin_data->location }}">
                        </div>
                        <div class="form-group m-2 p-1">
                            <label class="form-lable" for="dob">Date Of Birth</label>
                            <input type="date" name="dob" class="form-control" id="dob" value="{{ $admin_data->dob }}">
                        </div>
                        <div class="form-group m-2 p-1">
                            <label class="form-lable" for="bio">Bio</label>
                            <input type="text" name="bio" class="form-control" id="bio" value="{{ $admin_data->bio }}">
                        </div>
                        <div class="form-group m-2 p-1">
                            <label class="form-lable" for="photo">Photo</label>
                            <input type="file" name="photo" class="form-control" id="photo" value="{{ $admin_data->photo }}" multiple>
                        </div>
                        <div class="form-group m-2 p-1">
                            <button type="submit" class="btn btn-outline-primary">Submit</button>
                        </div>

                    </form>
                </div>
                @endif
            </div>
            <div class="col-md-6 card">
                <div class="card-body">
                    <table id="example" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Full Name</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse( $all_admin as $data )
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->role_id }}</td>
                                <td>
                                    @if ($data -> status)
                                    <span class="badge bg-success">Active User</span>
                                    <a class="text-danger" href="{{ route('admin.status.update', $data -> id ) }}"><i class="fa fa-times"></i></a>
                                    @else
                                    <span class="badge bg-danger">inactive User</span>
                                    <a class="text-success" href="{{ route('admin.status.update', $data -> id ) }}"><i class="fa fa-check"></i></a>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('user.edit',$data->id) }}" class="btn btn-sm btn-outline-info"><i class="fa fa-edit"></i></a>
                                    <a href="{{ route('admin.trash.update',$data->id) }}" class="btn btn-sm btn-outline-danger"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
