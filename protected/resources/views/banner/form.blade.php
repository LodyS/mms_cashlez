@extends('tema-admin.app')
@section('content')

<div class="card" >
    <div class="card-body">
        <h4>Form Banner</h4>
       	<div style="height:30px"></div>

		@include('error-message')
				       
		<form action="{{ (empty($banner)) ? route('banner.store') : route('banner.update',  [$banner->id]) }}" method="POST" name="form" enctype="multipart/form-data">@csrf

			@if(!empty($banner))
            	@method('PUT')
        	@endif

			<input type="hidden" name="id" value="{{ $banner->id ?? '' }}"> 

			<div class="row">
				<div class="col-sm-12">
					<div class="form-group">
						<label class="control-label">Title</label>
						<input type="text" class="form-control" name="title" value="{{ $banner->title ?? '' }}" id="title">
					</div>
				</div><!-- Col -->
			</div><!-- Row -->

			<div class="row">
				<div class="col-sm-12">
					<div class="form-group">
						<label class="control-label">Banner</label>
						<div style="30px"></div>
						
						@if(!empty($banner))
							<img src="{{ url('protected/storage/banner/'.$banner->banner_images) }}" width="200"/>
						@endif

						<div style="height:10px"></div>

						@if(empty($banner))
							<input type="file" class="form-control" name="banner_images" onchange="readURL(this);" id="foto" required>
						@else
							<input type="file" class="form-control" name="banner_images" onchange="readURL(this);" id="foto">
						@endif
						<img id="modal-preview" src="https://via.placeholder.com/150" alt="Preview" class="form-group hidden" width="100" height="100">
					</div>
				</div><!-- Col -->
			</div>

			<div class="row">
				<div class="col-sm-12">
					<div class="form-group">
						<label class="control-label">Deskripsi</label>
						<input type="text" class="form-control" name="description" value="{{ $banner->description ?? '' }}" id="description">
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
        foto : "required",
		title : "required"
    },

    submitHandler: function(form) {
        form.submit();
    }
});
</script>
@endpush