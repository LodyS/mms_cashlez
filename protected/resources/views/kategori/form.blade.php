@extends('tema-admin.app')
@section('content')

<div class="card" >
    <div class="card-body">
        <h4>Form Kategori</h4>
       	<div style="height:30px"></div>

		@include('error-message')
				       
		<form action="{{ (empty($kategori)) ? route('kategori.store') : route('kategori.update',  [$kategori->id ?? '']) }}" method="POST" name="form">@csrf

			@if(!empty($kategori))
            	@method('PUT')
        	@endif

			<input type="hidden" name="id" value="{{ $kategori->id ?? '' }}"> 

            <div class="row">
				<div class="col-sm-12">
					<div class="form-group">
						<label class="control-label">Kategori</label>
						<input type="text" class="form-control" name="kategori" value="{{ $kategori->kategori ?? '' }}" id="kategori">
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
        kategori : "required",
    },

    submitHandler: function(form) {
        form.submit();
    }
});
</script>
@endpush