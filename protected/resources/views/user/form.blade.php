@extends('tema-admin.app')
@section('content')

<div class="card" >
    <div class="card-body">
        <h4>Form User</h4>
       	<div style="height:30px"></div>

        @include('error-message')
				       
		<form action="{{ (empty($user)) ? route('users.store') : route('users.update',  [$user->id ?? '']) }}" method="POST" name="form">@csrf

			@if(!empty($user))
            	@method('PUT')
        	@endif

			<input type="hidden" name="id" value="{{ $user->id ?? '' }}"> 

            <div class="row">
				<div class="col-sm-12">
					<div class="form-group">
						<label class="control-label">Nama</label>
						<input type="text" class="form-control" name="name" value="{{ $user->name ?? '' }}" id="name">
					</div>
				</div><!-- Col -->
			</div><!-- Row -->

			<div class="row">
				<div class="col-sm-12">
					<div class="form-group">
						<label class="control-label">Username</label>
						<input type="text" class="form-control" name="username" value="{{ $user->username ?? '' }}" id="username">
					</div>
				</div><!-- Col -->
			</div><!-- Row -->

			<div class="row">
				<div class="col-sm-12">
					<div class="form-group">
						<label class="control-label">E-mail</label>
						<input type="email" class="form-control" name="email" value="{{ $user->email ?? '' }}" id="email">
					</div>
				</div><!-- Col -->
			</div><!-- Row -->

			<div class="row">
				<div class="col-sm-12">
					<div class="form-group">
						<label class="control-label">Jabatan</label>
						<select name="privilege_user_id" class="form-control select2" id="privilege_user_id">
							<option value="">Pilih</option>
							@foreach($jabatan as $j)
								<option value="{{ $j->id }}" {{ (!empty($user->privilege_user_id) == $j->id) ? 'selected' : '' }}>{{ $j->privilege_title }}</option>
							@endforeach
						</select>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-sm-12">
					<div class="form-group">
						<label class="control-label">Password</label>
						@if (empty($user))
							<input type="password" class="form-control" name="password" required>
						@else
							<input type="password" class="form-control" name="password">
						@endif
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
        name : "required",
		username : "required",
		email : "required",
		privilege_user_id : "required",
		//password : "required"
    },

    submitHandler: function(form) {
        form.submit();
    }
});
</script>
@endpush