@extends('Admin.layout.app')

@section('main-content')

<main>
    <div class="container">
        <div class="mt-4">
            <h3>Product Manage</h3>
        </div>
        <div class="row">
            <div class="com-md-12">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse( $product_data as $product_data )
                        <tr>
                            <td>{{ $loop -> index + 1 }}</td>
                            <td><img src="{{ url('Photos/Products/'.json_decode($product_data -> product_photo)[0] ) }}" style="height: 80px; width:auto;" class="img-fluid" alt="{{ $product_data -> product_name }}">{{ $product_data -> product_name }}</td>
                            <td>


                                @if($product_data->discount_price==null)
                                {{ $product_data->price }}
                                @else
                                <div><del>&#2547;{{ $product_data->price }}</del></div>
                                <div>&#2547;{{ $product_data->discount_price }}</div>

                                @endif
                            </td>
                            <td class="text-center">{{ $product_data->quantity }}</td>
                            <td>
                                <a href="" class="btn btn-info"><i class="fa fa-edit"></i></a>
                            </td>
                        </tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

@endsection
