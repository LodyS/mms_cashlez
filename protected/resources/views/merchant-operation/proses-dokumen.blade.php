<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">

                <form action="{{ route('list-merchant-mo.store') }}" method="POST" name="form" >@csrf
                    <input type="hidden" name="token_applicant" value="{{ $token_applicant ?? '' }}">

                    @foreach($data['data']->dokumen_merchant as $key=> $d)
                            
                        <input type="hidden" name="id[]" value="{{ $d->id ?? '' }}">

                        @if($d->status !== 'Verified')
                                
                            @if($key == 0)
                                <h5 align="center"><b>REVIEW DOKUMEN</b></h5>
                                <div style="height:30px"></div>
                            @endif

                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="{{ url($d->photo_path) }}" class="img-fluid rounded-start" alt="...">
                                </div>
                                                
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ ++$key }} . {{ $d->dokumen->label_photo ?? ''}}</h5>
                                        <div class="form-group n-no-margin">
                                            <label>Rekomendasi</label>
                                            <div class="input-wrap">                                        
                                                <div class="select-style">   
                                                    <select name="rekomendasi_status[]"  class="form-control validasi" required>
                                                        <option value="">Pilih Status</option>
                                                        <option value="Verified">Verified</option>
                                                        <option value="Reject">Reject</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                                                    
                                        <div class="form-group n-no-margin">
                                            <label>Catatan</label>
                                            <div class="input-wrap has-icon"> 
                                                <textarea name="catatan[]" class="form-control" rows="6"></textarea>
                                            </div><!-- .form-group -->
                                        </div><!-- .input-wrap -->
                                    </div>
                                </div>
                            </div>
                        @else    
                            <input type="hidden" name="catatan[]" value="{{ $d->catatan }}">
                            <input type="hidden" name="rekomendasi_status[]" value="{{ $d->status }}">
                        @endif
                    @endforeach        
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    
                    <div style="height:10px"></div>
                    <h5 align="center"><b>SUMMARY PROCESS</b></h5>
                
                    <input type="hidden" name="approve_status" value="N">
                    
                    <div class="form-group n-no-margin">
                        <label>Rekomendasi</label>
                        <div class="input-wrap">
                            <div class="select-style">
                                <select name="status" id="status" onchange="show_div('gone')" required>
                                <option value="">Pilih Status</option>
                                    <option value="Direkomendasikan">Direkomendasikan</option>
                                    <option value="Tidak Direkomendasikan">Tidak Direkomendasikan</option>
                                    <option value="Return Sales Officer">Return Sales Officer</option>
                                    <option value="Return To Merchant">Return To Merchant</option>
                                </select>
                            </div>
                        </div>
                    </div>
                                    
                    <div class="form-group n-no-margin" id="gone" style="display:none">
                        <label>Alasan</label>
                        <div class="input-wrap">
                            <div class="select-style">
                                <select name="alasan" id="alasan">
                                    <option value="">Pilih Status</option>
                                    @foreach($data['alasan'] as $alasan)
                                        <option value="{{ $alasan->nama }}">{{ $alasan->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                                    
                    <div class="form-group n-no-margin">
                        <label>Catatan</label>
                        <div> 
                            <textarea name="review" class="form-control" rows="10"></textarea>
                        </div>
                    </div>
                                    
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
function show_div() {
    var status = document.getElementById("status");
    var alasan = document.getElementById("gone");
    alasan.style.display = status.value == "Direkomendasikan" ? "none" : "block";
}
</script>