@extends('Admin.layout.app')

@section('main-content')

<main>
    <div class="container">
        <div class="mt-4">
            <h3>Product Add</h3>
            <p>Basic information</p>
        </div>
        <div class="row">
            <div class="com-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Product Entry Form</h5>
                        @include('validation.validate')
                    </div>
                    <div class="card-body">
                        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <!-- Product Images Upload -->
                            <div class="form-group">
                                <label for="product_images">Product Images</label>
                                <input type="file" class="form-control" name="product_images[]" accept="image/*" multiple>
                            </div>

                            <div class="card p-3 mt-4">
                                <h5>Product Information</h5>
                                <p>Having accurate product information raises discoverability.</p>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="product_name">Product Name</label>
                                            <input type="text" class="form-control" name="product_name" id="product_name">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="product_category">Category</label>
                                            <select type="text" class="form-select" name="product_category">
                                                <option value="">--Select Category--</option>
                                                @foreach( $category_data as $data )
                                                <option value="{{ $data -> category_name }}">{{ $data->category_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">

                                            <label for="product_brand">Brand</label>
                                            <select type="text" class="form-select" name="product_brand">
                                                <option value="">--Select Brand--</option>
                                                @foreach( $brand as $brand_data )
                                                <option value="{{ $brand_data -> brand_name }}">{{ $brand_data->brand_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="material_name">Strap Material</label>
                                            <select type="text" class="form-select" name="material_name">
                                                <option value="">--Select Material--</option>
                                                @foreach( $material_data as $material_data )
                                                <option value="{{ $material_data -> material_name }}">{{ $material_data->material_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="product_waterproof">Waterproof</label>
                                            <select class="form-select" name="product_waterproof" id="product_waterproof">
                                                <option></option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="product_model">Model</label>
                                            <input type="text" class="form-control" name="product_model">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="frame_colour">frame_colour</label>
                                            <input type="text" class="form-control" name="frame_colour">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="dial_size">Dial Size</label>
                                            <input type="text" class="form-control" name="dial_size">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="watch_type">Watch Type</label>
                                            <select class="form-select" name="watch_type" id="watch_type">
                                                <option></option>
                                                <option value="Digital">Digital</option>
                                                <option value="Choronograph">Choronograph</option>
                                                <option value="Analouge">Analouge</option>
                                                <option value="Smart">Smart</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="movement">Movement</label>
                                            <select class="form-select" name="movement" id="movement">
                                                <option></option>
                                                <option value="Mechanical">Mechanical</option>
                                                <option value="Automatic">Automatic</option>
                                                <option value="Quartz">Quartz</option>
                                                <option value="Manual winding">Manual winding</option>
                                                <option value="Solar">Solar</option>
                                                <option value="Hybrid">Hybrid</option>
                                                <option value="Smart">Smart</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="resistance">Watch's Water Resistance</label>
                                            <select class="form-select" name="resistance" id="resistance">
                                                <option></option>
                                                <option value="3Bar">3 BAR</option>
                                                <option value="5Bar">5 BAR</option>
                                                <option value="10Bar">10 BAR</option>
                                                <option value="20Bar">20 BAR</option>
                                                <option value="50Bar">50 BAR</option>
                                                <option value="100Bar">100 BAR</option>
                                                <option value="200Bar">200 BAR</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="product_feature">Watch Feature</label>
                                            <input type="text" class="form-control" name="product_feature">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="warranty_type">Warranty Type</label>
                                            <select class="form-select" name="warranty_type" id="warranty_type">
                                                <option></option>
                                                <option value="No Warranty">No Warranty</option>
                                                <option value="Brand Warranty">Brand Warranty</option>
                                                <option value="Seller Warranty">Seller Warranty</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="warranty">Warranty</label>
                                            <select class="form-select" name="warranty" id="warranty">
                                                <option></option>
                                                <option value="1 month">1 month</option>
                                                <option value="2 months">2 months</option>
                                                <option value="3 months">3 months</option>
                                                <option value="4 months">4 months</option>
                                                <option value="5 months">5 months</option>
                                                <option value="6 months">6 months</option>
                                                <option value="7 months">7 months</option>
                                                <option value="8 months">8 months</option>
                                                <option value="9 months">9 months</option>
                                                <option value="10 months">10 months</option>
                                                <option value="11 months">11 months</option>
                                                <option value="1 year">1 year</option>
                                                <option value="2 years">2 years</option>
                                                <option value="3 years">3 years</option>
                                                <option value="4 years">4 years</option>
                                                <option value="5 years">5 years</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="warranty_policy">Warranty Policy</label>
                                            <input type="text" class="form-control" name="warranty_policy">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="highlight">Highlight</label>
                                            <textarea type="text" class="form-control" name="highlight"></textarea>
                                            <script>
                                                CKEDITOR.replace( 'highlight' );
                                        </script>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="price">Price</label>
                                            <input type="text" class="form-control" name="price">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="discount_price">Discount</label>
                                            <input type="text" class="form-control" name="discount_price">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="colour">Colour</label>
                                            <input type="text" class="form-control" name="colour">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="sellerSKU">Seller SKU</label>
                                            <input type="text" class="form-control" name="sellerSKU">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="quantity">Quantity</label>
                                            <input type="text" class="form-control" name="quantity">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea class="form-control" name="description" id="description" rows="4" cols="8"></textarea>
                                            <script>
                                                CKEDITOR.replace( 'description' );
                                        </script>
                                        </div>
                                    </div>
                                </div>

                            </div>
{{--
                            <div class="card p-3 mt-4">
                                <h5>Variants, Price, Stock</h5>
                                <div class="row">
                                    <!-- Variants -->
                                    <div class="form-group">
                                        <div id="variants-container">
                                            <div class="variant row">
                                                <div class="col-md-2">
                                                    <input type="text" name="variants[0][variant_price]" placeholder="Price" class="form-control">
                                                </div>
                                                <div class="col-md-2">
                                                    <input type="text" name="variants[0][variant_specialPrice]" placeholder="Special Price" class="form-control">
                                                </div>
                                                <div class="col-md-2">
                                                    <input type="text" name="variants[0][variant_quantity]" placeholder="Quantity" class="form-control">
                                                </div>
                                                <div class="col-md-2">
                                                    <input type="text" name="variants[0][variant_sellerSKU]" placeholder="SellerSKU" class="form-control">
                                                </div>
                                                <div class="col-md-2">
                                                    <input type="text" name="variants[0][variant_colour]" placeholder="Color" class="form-control">
                                                </div>
                                                <div class="col-md-2">
                                                    <input type="file" name="variants[0][variant_image]" placeholder="Photo" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <button type="button" id="add-variant" class="btn btn-secondary mt-2">Add Variant</button>
                                    </div>
                                </div>
                            </div>
--}}
                            <!-- Add other form fields for Category, Brand, etc. -->

                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-primary mt-2">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection

