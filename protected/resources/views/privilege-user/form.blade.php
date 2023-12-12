@extends('tema-admin.app')
@section('content')

<div class="card" >
    <div class="card-body">
        <h4>Form Privilege User</h4>
       	<div style="height:30px"></div>

		@include('error-message')
				       
		<form action="{{ (empty($privilegeUser)) ? route('privilege-user.store') : route('privilege-user.update',  [$privilegeUser->id ?? '']) }}" method="POST" name="form">@csrf

			@if(!empty($privilegeUser))
            	@method('PUT')
        	@endif

			<input type="hidden" name="id" value="{{ $privilegeUser->id ?? '' }}"> 

            <div class="row">
				<div class="col-sm-12">
					<div class="form-group">
						<label class="control-label">Title</label>
						<input type="text" class="form-control" name="privilege_title" value="{{ $privilegeUser->privilege_title ?? '' }}" id="privilege_title">
					</div>
				</div><!-- Col -->
			</div><!-- Row -->

			<div class="row">
				<div class="col-sm-12">
					<div class="form-group">
						<label class="control-label">Level</label>
						<input type="text" class="form-control" name="leveling_number" value="{{ $privilegeUser->leveling_number ?? '' }}" id="leveling_number">
					</div>
				</div><!-- Col -->
			</div><!-- Row -->

			<div class="row">
				<div class="col-sm-12">
					<div class="form-group">
						<label class="control-label">Approval Status</label>
                    	<select class="form-control select" name="approval_status" id="approval_status" required>
							<option value="">Silahkan Pilih</option>
							<option value="Yes" {{ (!empty($privilegeUser->approval_status) == 'Yes') ? 'selected': '' }}>Yes</option>
							<option value="No" {{ (!empty($privilegeUser->approval_status) == 'No') ?'selected':''}}>No</option>
                    	</select>
					</div>
                </div>
	        </div>

            <button type="submit" class="btn btn-primary">Save</button>
        </form>
	</div>
</div> 
@endsection


@push('scripts')
<script type="text/javascript">

$("form[name='form']").validate({
    rules: {
        privilege_title : "required",
		leveling_number : "required"
    },

    submitHandler: function(form) {
        form.submit();
    }
});
</script>
@endpush