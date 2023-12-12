@extends('tema-admin.app')
@section('content')

<div class="card" >
    <div class="card-body">
        <h4 style="text-align:center">PROSES SETTING {{ strtoupper($data->nama_merchant) ?? '' }}</h4>
       	<div style="height:30px"></div>

        @include('flash-message')
				       
		<form action="{{ route('store-proses-setting') }}" method="POST" name="form" >@csrf
            <input type="hidden" name="token_applicant" value="{{ $token_applicant ?? '' }}">
            <input type="hidden" name="jenis" value="{{ $aksi ?? '' }}">

            @include('informasi-dasar')

            <div style="height:30px"></div><hr/>
            <h4 align="center">SETTING {{ strtoupper($aksi) }}</h4><hr/>
            <div style="height:30px"></div><hr/>
      
            <div class="form-group n-no-margin">
                <label>Status</label>
                <div class="input-wrap">
                    <div class="select-style">
                        <select name="status" class="form-control" id="status">
                            <option value="">Pilih Status</option>
                            <option value="Lengkap">Lengkap</option>
                        </select>
                    </div>
                </div>
            </div>
             
            <div style="height:30px"></div>
            
            <div class="form-group n-no-margin">
                <label>Catatan</label>
                    <div class="input-wrap has-icon"> 
                    <textarea name="catatan" class="form-control" id="catatan"></textarea>
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


