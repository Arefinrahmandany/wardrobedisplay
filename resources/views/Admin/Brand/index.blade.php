@extends('Admin.layout.app')
@section('main-content')


<main>
    <div class="container">
        <div class="mt-4">
            <h3>Brand Manage</h3>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">

                        @if ($form_type == "edit")

                        <h5>Edit Brand Data</h5>

                        <form method="POST" Action="{{ route('brand.update') }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div>
                                <label class="form-lable">Brand Name</label>
                                <input type="text" class="form-control" name="brand_name" placeholder="Brand Name">
                            </div>

                            <div>
                                <label class="form-lable">Brand Logo</label>
                                <input type="file" class="form-control" name="gallery[]" placeholder="Brand Logo">
                            </div>

                            <div>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>

                        </form>

                        @else

                        <h5>Add New Brand</h5>

                        <form method="POST" Action="{{ route('brand.store') }}" enctype="multipart/form-data">
                            @csrf
                            @include('validation.validate')

                            <div class="m-1 p-1">
                                <label class="form-lable">Brand Name</label>
                                <input type="text" class="form-control" name="brand_name" placeholder="Brand Name">
                            </div>

                            <div class="m-1 p-1">
                                <label class="form-lable">Brand Logo</label>
                                <input type="file" class="form-control" name="gallery[]" placeholder="Brand Logo" multiple>
                            </div>
                            <div class="m-1 p-1">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>

                        </form>

                        @endif


                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body table-responsive">
                        @include('validation.validate-table')
                        <table id="example" class="table table-border">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Brand Name</th>
                                    <th>Brand image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse( $brand_data as $data )
                                <tr>
                                    <td>{{ $loop -> index + 1 }}</td>
                                    <td>{{ $data-> brand_name }}</td>
                                    <td>
                                        <img src="{{ url('Photos/Brand_logo/'.json_decode($data -> image)[0] ) }}" style="height: 50px; width:auto;" class="img-fluid" alt="{{ $data -> brand_name }}">
                                    </td>
                                    <td>
                                        <a href="{{ route('brand.trash',$data->id) }}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
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
