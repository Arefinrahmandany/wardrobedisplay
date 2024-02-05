@extends('Admin.layout.app')
@section('main-content')


<main>
    <!-- form start -->
<div class="container pt-4">
    <div class="row">
        <div class="col-md-4 card m-1">

            @if($form_type == 'create')
            <div class="card-body">
                <div class="m-1 p-1">
                    <h4 class="card-title">Permission Information</h4>
                </div>
                <form method="post" action="{{ route('permission.store') }}">
                    @csrf
                    @include('validation.validate')
                    <div class="form-Group">
                        <div class="form-group">
                            <label class="form-label" for="permission_title">Permission Title</label>
                            <input type="text" name="permission_title" class="form-control" id="permission_title">
                        </div>
                    </div>
                    <div class="mt-2 pt-2 d-flex justify-content-end">
                        <button type="submit" class="btn btn-sm btn-outline-primary">Submit</button>
                    </div>
                </form>
            </div>
            @endif

            @if($form_type == 'edit')
            <div class="card-body">
                <div class="m-1 p-1 d-flex justify-content-between">
                    <div><h4 class="card-title">Edit Permission</h4></div>
                    <div><a href="{{ route('permission.index') }}" class="btn btn-sm btn-light">Back</a></div>
                </div>

                <form method="POST" action="{{ route('permission.update', $edit-> id) }}">
                    @csrf
                    @method('PUT')
                    @include('validation.validate')
                    <div class="form-Group">
                        <label class="form-label" for="permission_title">Permission Title</label>
                        <input type="text" value="{{ $edit -> permission_title  }}" name="permission_title" class="form-control" id="permission_title">
                    </div>
                    <div class="mt-2 pt-2 d-flex justify-content-end">
                        <button type="submit" class="btn btn-sm btn-outline-success">Submit</button>
                    </div>
                </form>
            </div>
            @endif
        </div>

        <div class="card col-md-7 m-1">
            <div class="card-body table-responsive">
                <table id="example" class="table table-striped text-center table-hover mb-0 data-table-all">
                @include('validation.validate-table')
                    <thead>
                        <tr>
                            <th>Sl.</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>CreatedAt</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($all_permission as $per)
                        <tr>
                            <td>{{ $loop -> index +1 }}</td>
                            <td>{{ $per -> permission_title }}</td>
                            <td>{{ $per -> slug }}</td>
                            <td>{{ $per -> created_at -> diffForHumans()}}</td>
                            <td>
                                <a class="btn btn-sm btn-outline-warning"  href="{{route('permission.edit',$per -> id)}}"><i class="fa fa-edit"></i></a>
                                <form method="post" action="{{ route('permission.destroy',$per -> id) }}" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger" type="submit"><i class="fa fa-trash"></i></button>
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
<!-- form End -->
</main>
@endsection
