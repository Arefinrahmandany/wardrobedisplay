@extends('Admin.layout.app')

@section('main-content')

<main>
    <div class="container">
        <div class="mt-4">
            <h3>Category Add</h3>
        </div>
        <div class="row">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">

                        <form action="{{ route('category.store') }}" method="POST">
                            @csrf
                            @include('validation.validate')
                            <div class="form-group">
                                <label for="category_name">Category Name:</label>
                                <input type="text" name="category_name" id="category_name" class="form-control">
                            </div>
                            <div class="mt-2">
                                <button type="submit" class="btn btn-primary">Add Category</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="card">
                    @include('validation.validate-table')
                    <div class="card-body table-responsive">
                        <table id="example" class="table table-border">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Category Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse( $category_data as $data)
                                <tr>
                                    <td>{{ $loop -> index + 1 }}</td>
                                    <td>{{ $data -> category_name }}</td>
                                    <td>
                                        <a href="{{ route('category.trash',$data->id) }}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
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




    </div>
</main>
@endsection
