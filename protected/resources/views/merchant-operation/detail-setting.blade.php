@extends('tema-admin.app')
@section('content')

<div class="card" >
    <div class="card-body">
        <h4 style="text-align:center">DETAIL SETTING {{ strtoupper($data->nama_merchant) ?? '' }}</h4>
       	<div style="height:30px"></div>

        @include('flash-message')
        @include('informasi-dasar')
        @include('merchant-operation/setting-histori')
	</div>
</div> 
@endsection


