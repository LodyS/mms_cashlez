@extends('tema-admin.app')
@section('content')

<div class="card" >
    <div class="card-body">
        <h4>Form Bank</h4>
       	<div style="height:30px"></div>

		@include('error-message')
				       
		<form action="{{ (empty($bank)) ? route('bank.store') : route('bank.update',  [$bank->id ?? '']) }}" method="POST" name="form">@csrf

			@if(!empty($bank))
            	@method('PUT')
        	@endif

			<input type="hidden" name="id" value="{{ $bank->id ?? '' }}"> 

            <div class="row">
				<div class="col-sm-12">
					<div class="form-group">
						<label class="control-label">Nama Bank</label>
						<input type="text" class="form-control" name="nama_bank" value="{{ $bank->nama_bank ?? '' }}" id="nama_bank">
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
        nama_bank : "required",
    },

    submitHandler: function(form) {
        form.submit();
    }
});
</script>
@endpush