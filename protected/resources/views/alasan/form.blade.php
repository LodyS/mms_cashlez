@extends('tema-admin.app')
@section('content')

<div class="card" >
    <div class="card-body">
        <h4>Form Alasan</h4>
       	<div style="height:30px"></div>

		@include('error-message')
				       
		<form action="{{ (empty($alasan)) ? route('alasan.store') : route('alasan.update',  [$alasan->id ?? '']) }}" method="POST" name="form">@csrf

			@if(!empty($alasan))
            	@method('PUT')
        	@endif

			<input type="hidden" name="id" value="{{ $alasan->id ?? '' }}"> 

            <div class="row">
				<div class="col-sm-12">
					<div class="form-group">
						<label class="control-label">Nama</label>
						<input type="text" class="form-control" name="nama" value="{{ $alasan->nama ?? '' }}" id="nama">
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
        nama : "required",
    },

    submitHandler: function(form) {
        form.submit();
    }
});
</script>
@endpush