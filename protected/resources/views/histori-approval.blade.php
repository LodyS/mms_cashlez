<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">

                <table class="table table review">
                    <tr>
                        <th colspan="4" style="text-align:center"><b>HISTORI APPROVAL</b></th>
                    </tr>

                    <tr>
                        <th>Status Rekomendasi</th>
                        <th>Keterangan</th>
                        <th>Fitur Pembayaran</th>
                        <th>User & Waktu</th>
                    </tr>

                    @foreach($data['data']->histori_approval as $histori)
                        <tr>
                            <td style="vertical-align:top">{{ $histori->level_status }}</td>
                            <td style="width:50%"><textarea class="form-control" rows="5" readonly="readonly" style="background-color:white;">{{ $histori->review }}</textarea></td>
                            <td style="width:20%; vertical-align:top">@foreach($histori->payment as $payment) {{  $payment->fitur_pembayaran }}@endforeach</td>
                            <td style="vertical-align:top">{{ \App\Models\User::username($histori->user_id)->name ?? '' }} <br/>{{ date('d-m-Y H:i:s', strtotime($histori->waktu)) }}</td>
                        </tr>
                    @endforeach
                </table>

            </div>
        </div>
    </div>
</div>
