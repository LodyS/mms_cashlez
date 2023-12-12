@extends('tema-admin.app')
@section('content')

<div class="card" >
    <div class="card-body">
        <h4>Form Tipe Produk</h4>
       	<div style="height:30px"></div>

		@include('error-message')
				       
		<form action="{{ (empty($productType)) ? route('product-type.store') : route('product-type.update',  [$productType->id ?? '']) }}" method="POST" name="form">@csrf

			@if(!empty($productType))
            	@method('PUT')
        	@endif

			<input type="hidden" name="id" value="{{ $productType->id ?? '' }}"> 
			
			<div class="row">
				<div class="col-sm-12">
					<div class="form-group">
						<label class="control-label">Kode</label>
						<input type="text" class="form-control" name="code" value="{{ $productType->code ?? '' }}" id="code">
					</div>
				</div><!-- Col -->
			</div><!-- Row -->

            <div class="row">
				<div class="col-sm-12">
					<div class="form-group">
						<label class="control-label">Produk</label>
						<input type="text" class="form-control" name="product_title" value="{{ $productType->product_title ?? '' }}" id="produk">
					</div>
				</div><!-- Col -->
			</div><!-- Row -->

            <button type="submit" class="btn btn-primary">Save</button>
        </form>
	</div>
</div> 
@endsection


@push('scripts')
<script type="text/javascript">

$("form[name='form']").validate({
    rules: {
        produk : "required",
		code : "required",
    },

    submitHandler: function(form) {
        form.submit();
    }
});
</script>
@endpush