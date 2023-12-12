@extends('tema-admin.app')
@section('content')

<div class="card" >
    <div class="card-body">
        <h4>Form Dokumen Applicant</h4>
       	<div style="height:30px"></div>

        @include('error-message')
				       
		<form action="{{ (empty($dokumenApplicant)) ? route('dokumen-applicant.store') : route('dokumen-applicant.update',  [$dokumenApplicant->id ?? '']) }}" method="POST" name="form">@csrf

			@if(!empty($dokumenApplicant))
            	@method('PUT')
        	@endif

			<input type="hidden" name="id" value="{{ $dokumenApplicant->id ?? '' }}"> 

			<div class="form-group row">
		        <label class="col-md-3">Label Photo</label>
			    <div class="col-md-7">
					<input type="text" class="form-control" name="label_photo" value="{{ $dokumenApplicant->label_photo ?? '' }}" id="label_photo">
				</div>
			</div><!-- Col -->

			<div class="form-group row">
		        <label class="col-md-3">Jenis Nasabah</label>
			    <div class="col-md-7">
                    <select class="form-control select" name="id_credit_type" id="id_credit_type" required>
                        <option value="">Silahkan Pilih</option>
                        <option value="Perorangan" {{ (!empty($dokumenApplicant->id_credit_type) == 'Perorangan') ? 'selected': '' }}>Perorangan</option>
                        <option value="Badan Usaha" {{ (!empty($dokumenApplicant->id_credit_type) == 'Badan Usaha') ?'selected':''}}>Badan Usaha</option>
                    </select>
                </div>
	        </div>

          	<div class="form-group row">
		        <label class="col-md-3">Mandatory Field</label>
			    <div class="col-md-7">
                    <select class="form-control select" name="mandatory_field" id="mandatory_field" required>
                        <option value="">Silahkan Pilih</option>
                        <option value="mandatory" {{ (!empty($dokumenApplicant->mandatory_field) == 'mandatory') ? 'selected': '' }}>Mandatory</option>
                        <option value="optional" {{ (!empty($dokumenApplicant->mandatory_field) == 'optional') ?'selected':''}}>Optional</option>
                    </select>
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
        label_photo : "required",
		id_credit_type : "required",
		mandatory_field : "required"
    },

    submitHandler: function(form) {
        form.submit();
    }
});
</script>
@endpush