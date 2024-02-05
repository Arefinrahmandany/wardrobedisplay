@if ( $errors -> any() )
<p class="alert alert-danger">{{ $errors -> first() }}<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></p></p>
@endif


@if ( Session::has('success') )
<p class="alert alert-success">{{ Session::get('success') }}<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></p></p>
@endif

@if ( Session::has('warning') )
<p class="alert alert-warning">{{ Session::get('warning') }}<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></p></p>
@endif

@if ( Session::has('danger') )
<p class="alert alert-danger">{{ Session::get('danger') }}<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></p></p>
@endif
