@extends('Admin.layout.app')
@section('main-content')


<main>
    <div class="container">
        <div class="mt-4">
            <h4>Role Management</h4>
        </div>
        <div class="row">
            <div class="col-md-4 card m-1">

                @if($form_type == 'create')
                <div class="card-body">
                    <div class="m-1 p-1"><h4 class="card-title">New Role</h4></div>
                    <form method="POST" action="{{ route('role.store') }}">
                        @csrf
                        @include('validation.validate')
                        <div class="form-group">
                            <label class="form-label" for="role_title">Role Title</label>
                            <input type="text" name="role_title" class="form-control" id="role_title">
                        </div>
                        <div class="form-group">
                            <ul style="list-style: none; padding-left:0px; ">
                                @forelse ($permissions as $item )
                                <li>
                                    <label><input name="permission_title[]" value="{{ $item -> permission_title }}" type="checkbox" > {{ $item -> permission_title }}</label>
                                </li>
                                @empty
                                @endforelse
                            </ul>
                        </div>
                        <div class="mt-1 pt-1 d-flex justify-content-end">
                            <button type="submit" name="submit" class="btn btn-sm btn-outline-primary m-3">Submit</button>
                        </div>
                    </form>
                </div>
                @endif

                @if($form_type == 'edit')
                <div class="card-body">
                    <div class="d-flex justify-content-between m-1 p-1">
                        <div><h4 class="card-title">Edit Permission</h4></div>
                        <div><a href="{{ route('role.index') }}" class="btn btn-sm btn-light">Back</a></div>
                    </div>
                    <form method="POST" action="{{ route('role.update', $edit-> id) }}">
                        @csrf
                        @method('PUT')
                        @include('validation.validate')

                        <div class="form-group">
                            <labe class="form-label" for="role_title">Role Title</labe>
                            <input type="text" value="{{ $edit -> role_title  }}" name="role_title" class="form-control" id="role_title">
                        </div>
                        <div class="form-group">
                            <ul style="list-style: none;">
                                @forelse (json_decode($permissions) as $item)
                                <li>
                                    <label class="form-label" for="">
                                        <input @if (in_array($item ->permission_title, json_decode($edit->permission_title))) checked @endif name="permission_title[]" value="{{ $item -> permission_title}}" type="checkbox">
                                        {{ $item -> permission_title}}
                                    </label>
                                </li>
                                @empty
                                @endforelse
                            </ul>
                        </div>
                        <div class="d-flex justify-content-end mt-2 pt-2">
                            <button type="submit" class="btn btn-sm btn-outline-success">Update</button>
                        </div>
                    </form>
                </div>
                @endif
            </div>

            <div class="card col-md-7 m-1">
                <div class="card-body table-responsive">
                    <table class="table table-striped table-hover mb-0 data-table-all">
                        @include('validation.validate-table')
                        <thead>
                            <tr>
                                <th>Sl.</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Permissions</th>
                                <th>CreatedAt</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($roles as $role)
                            <tr>
                                <td>{{ $loop -> index +1 }}</td>
                                <td>{{ $role -> role_title }}</td>
                                <td>{{ $role -> slug }}</td>
                                <td>
                                    <ul style="padding:0px;">
                                        @forelse (json_decode($role -> permission_title) as $item )
                                            <li>{{$item}}</li>
                                        @empty
                                        @endforelse
                                    </ul>
                                </td>
                                <td>{{ $role -> created_at -> diffForHumans()}}</td>
                                <td>
                                    <a class="btn btn-sm btn-outline-warning" href="{{route('role.edit',$role -> id)}}"><i class="fa fa-edit"></i></a>
                                    <form method="post" action="{{ route('role.destroy',$role -> id) }}" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure, You want to delete?')" type="submit"><i class="fa fa-trash"></i></button>
                                    </form>
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
