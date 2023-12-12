@extends('tema-admin.app')
@section('content')

<style>
#hilang {
    display: none;
}
    
#gone {
    display: none;
}

.tab-pane.fade {
    transition: all 0.3s;
    transform: translateY(1rem);
}
 
.tab-pane.fade.show {
    transform: translateY(0rem);
}
</style>

<div class="card" >
    <div class="card-body">
        <h4 style="text-align:center">PROSES PENGAJUAN MERCHANT {{ strtoupper($data['data']->nama_merchant) ?? '' }}</h4>
       	<div style="height:30px"></div>

        @include('flash-message')
        @include('proses-approval')

        <ul class="nav nav-tabs" id="myTab" role="tablist">
          

            <li class="nav-item">
                <a class="nav-link" id="mersen-tab" data-toggle="tab" href="#mersen" role="tab" aria-controls="profile" aria-selected="false">Merchant</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" id="photo-dokumen-tab" data-toggle="tab" href="#photo-dokumen" role="tab" aria-controls="profile" aria-selected="false">Foto Dokumen</a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" id="lokasi-merchant-tab" data-toggle="tab" href="#lokasi-merchant" role="tab" aria-controls="contact" aria-selected="false">Foto Lokasi Merchant</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" id="follow-up-tab" data-toggle="tab" href="#follow-up" role="tab" aria-controls="follow-up" aria-selected="false"> Pihak Follow UP</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" id="data-service-tab" data-toggle="tab" href="#data-service" role="tab" aria-controls="data-service" aria-selected="false">Data Devices</a>
            </li>
        </ul>
          
        <div class="tab-content" id="myTabContent">
            
            <div class="tab-pane fade show active" id="mersen" role="tabpanel" aria-labelledby="mersen-tab">  
                @include('informasi-dasar')
                @include('histori-approval')
            </div>

            <div class="tab-pane fade" id="photo-dokumen" role="tabpanel" aria-labelledby="photo-dokumen-tab">  
                @include('merchant-operation/review-dokumen')
            </div>
            
            <div class="tab-pane fade" id="lokasi-merchant" role="tabpanel" aria-labelledby="lokasi-merchant-tab">
                @include('merchant-operation/foto-lokasi-merchant')
            </div>
            
            <div class="tab-pane fade" id="follow-up" role="tabpanel" aria-labelledby="follow-up-tab">Follow Up</div>
            <div class="tab-pane fade" id="data-service" role="tabpanel" aria-labelledby="data-service-tab">Data Service</div>
        </div>
	</div>
</div> 
@endsection


