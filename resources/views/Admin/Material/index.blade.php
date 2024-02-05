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

                        <form action="{{ route('material.store') }}" method="POST">
                            @csrf
                            @include('validation.validate')
                            <div class="form-group">
                                <label for="material_name">Strap Material:</label>
                                <input type="text" name="material_name" id="material_name" class="form-control">
                            </div>
                            <div class="mt-2">
                                <button type="submit" class="btn btn-primary">Add Material</button>
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
                                    <th>Strap Material</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse( $material_data as $data)
                                <tr>
                                    <td>{{ $loop -> index + 1 }}</td>
                                    <td>{{ $data -> material_name }}</td>
                                    <td>
                                        <a href="{{ route('material.trash',$data->id) }}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
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
