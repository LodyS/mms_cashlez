@extends('tema-admin.app')
@section('content')

<div class="card" >
    <div class="card-body">
        <h4 style="text-align:center">PENGAJUAN EDC {{ strtoupper($data['data']->nama_merchant) ?? '' }}</h4>
       	<div style="height:30px"></div>

        @include('proses-approval')
        @include('informasi-dasar')
        @include('pengajuan-edc/detail')
	</div>
</div> 
@endsection
