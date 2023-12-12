<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h5 align="center"><b>SUMMARY PROCESS</b></h5>

                <form action="{{ route('list-merchant-risk-analyst.store') }}" method="POST" name="form" >@csrf
                    <input type="hidden" name="token_applicant" value="{{ $data['fitur']->token_applicant ?? '' }}">
                    <input type="hidden" name="token" value="{{ $data['fitur']->token ?? '' }}">
                    <input type="hidden" name="approve_status" value="N">
                                
                    <div class="form-group n-no-margin">
                        <label>Rekomendasi</label>
                        <div class="input-wrap">
                            <div class="select-style">
                                <select name="status" id="status" onchange="show_div('gone')" required>
                                    <option value="">Pilih Status</option>
                                    <option value="Direkomendasikan">Direkomendasikan</option>
                                    <option value="Tidak Direkomendasikan">Tidak direkomendasikan</option>
                                    <option value="Return to Merchant Ops">Return to Merchant Ops</option>
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