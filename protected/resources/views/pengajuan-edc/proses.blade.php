@extends('tema-admin.app')
@section('content')

<div class="card" >
    <div class="card-body">
        <h4 style="text-align:center">PENGAJUAN EDC {{ strtoupper($data['data']->nama_merchant) ?? '' }}</h4>
       	<div style="height:30px"></div>

        @include('flash-message')

        @include('proses-approval')
        @include('informasi-dasar')
        @include('pengajuan-edc/detail')

        <div style="height:30px"></div>
				       
		<form action="{{ route('pengajuan-edc.store') }}" method="POST" name="form" >@csrf
            <input type="hidden" name="token_applicant" value="{{ $token_applicant ?? '' }}">
            <input type="hidden" name="id" value="{{ $id ?? '' }}">
            <input type="hidden" name="user_update" value="{{ Auth::id() ?? '' }}">
      
            <div class="form-group n-no-margin">
                <label>Status</label>
                <div class="input-wrap">
                    <div class="select-style">
                        <select name="status" class="form-control" id="status" required>
                            <option value="">Pilih Status</option>
                            <option value="Approved">Approved</option>
                            <option value="Rejected">Rejected</option>
                        </select>
                    </div>
                </div>
            </div>
             
            <div style="height:30px"></div>
            
            <div class="form-group n-no-margin">
                <label>Catatan</label>
                    <div class="input-wrap has-icon"> 
                    <textarea name="catatan" class="form-control" id="catatan" required></textarea>
                    <span class="fa-wrapper">
                        <span class="far fa-file icon"></span>
                    </span>
                </div>
            </div>
                      
            <button type="submit" class="btn btn-primary">Save</button>

        </form>
	</div>
</div> 
@endsection

<script>
$("form[name='form']").validate({
    rules: {
        status : "required",
        catatan : "required"
    },
   
    submitHandler: function(form) {
        form.submit();
    }
});


</script>


