@if ( $errors -> any() )
<p class="alert alert-danger">{{ $errors -> first() }}<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></p></p>
@endif


@if ( Session::has('success-table') )
<p class="alert alert-success">{{ Session::get('success-table') }}<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></p></p>
@endif

@if ( Session::has('warning-table') )
<p class="alert alert-warning">{{ Session::get('warning-table') }}<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></p></p>
@endif

@if ( Session::has('danger-table') )
<p class="alert alert-danger">{{ Session::get('danger-table') }}<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></p></p>
@endif
