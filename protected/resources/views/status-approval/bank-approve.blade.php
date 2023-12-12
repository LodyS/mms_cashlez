<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">

                <form action="{{ url('bank-approved') }}" method="POST" name="form" >@csrf
                    <input type="hidden" name="token_applicant" value="{{ $data['fitur']->token_applicant ?? '' }}">
                    <input type="hidden" name="token" value="{{ $data['fitur']->token ?? '' }}">
                
                    <h5 align="center"><b>SUMMARY PROCESS</b></h5>
                            
                    <input type="hidden" name="approve_status" value="Y">
                
                    <div class="form-group n-no-margin">
                        <label>Keputusan</label>
                        <div class="input-wrap">
                            <div class="select-style">
                                <select name="status" class="form-control" required onchange="show_div('gone')" id="status">
                                <option value="">Pilih Status</option>
                                    <option value="Approved">Approve</option>
                                    <option value="Close">Reject</option>
                                    <option value="Return to Risk Analyst">Return to Risk Analyst</option>
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
                        <div class="input-wrap has-icon"> 
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
    alasan.style.display = status.value == "Approved" ? "none" : "block";
}
</script>