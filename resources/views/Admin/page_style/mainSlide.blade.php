@extends('Admin.layout.app')

@section('main-content')

<main>
    <div class="container">
        <div class="mt-4">
            <h3>Product Front Page Slide</h3>
        </div>
        <div class="row">
            <div class="com-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-4">
                                <form action="{{ route('mainSlide.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @include('validation.validate')

                                    <div class="m-2 p-1">
                                        <label class="form-lable" for="slide_title">Slide Title</label>
                                        <input type="" class="form-control" name="slide_title" id="slide_title" placeholder="">
                                    </div>
                                    <div class="m-2 p-1">
                                        <label class="form-lable" for="display_link">Display Link</label>
                                        <input type="" class="form-control" name="display_link" id="display_link" placeholder="">
                                    </div>
                                    <div class="m-2 p-1">
                                        <input type="file" class="form-control" name="slide_image[]" id="" placeholder="" multiple>
                                    </div>
                                    <div class="m-2 p-1">
                                        <button type="submit" class="btn btn-outline-primary">Add Slide</button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-8 card">
                            <div class="card-body table-responsive">
                                @include('validation.validate-table')
                                <table id="example" class="table table-border">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th class="text-center">Title</th>
                                            <th class="text-center">Image Link</th>
                                            <th class="text-center">Photo</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ( $mainSlide as $data )
                                        <tr>
                                            <td>{{ $loop -> index+1 }}</td>
                                            <td>{{ $data-> slide_title }}</td>
                                            <td>{{ $data-> display_link }}</td>
                                            <td><img src="{{ url('Photos/Slides/MainSlide/'.json_decode($data -> slide_image)[0] ) }}" style="height: 80px; width:auto;" class="img-fluid" alt="{{ $data-> slide_title }}"></td>
                                            <td>
                                                <a href="" class="btn btn-sm btn-outline-danger"><i class="fa fa-trash"></i></a>
                                                <a href="" class="btn btn-sm btn-outline-info"><i class="fa fa-edit"></i></a>
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
        </div>
    </div>
</main>
@endsection
