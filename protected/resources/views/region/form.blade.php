@extends('tema-admin.app')
@section('content')

<div class="card" >
    <div class="card-body">
        <h4>Form Region</h4>
       	<div style="height:30px"></div>

		@include('error-message')
				       
		<form action="{{ (empty($region)) ? route('region.store') : route('region.update',  [$region->id ?? '']) }}" method="POST" name="form">@csrf

			@if(!empty($region))
            	@method('PUT')
        	@endif

			<input type="hidden" name="id" value="{{ $region->id ?? '' }}"> 

            <div class="row">
				<div class="col-sm-12">
					<div class="form-group">
						<label class="control-label">Kode</label>
						<input type="text" class="form-control" name="region_code" value="{{ $region->region_code ?? '' }}" id="region_code">
					</div>
				</div><!-- Col -->
			</div><!-- Row -->

			<div class="row">
				<div class="col-sm-12">
					<div class="form-group">
						<label class="control-label">Region</label>
						<input type="text" class="form-control" name="region_title" value="{{ $region->region_title ?? '' }}" id="region_title">
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
        region_title : "required",
    },

    submitHandler: function(form) {
        form.submit();
    }
});
</script>
@endpush