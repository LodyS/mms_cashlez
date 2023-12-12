<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">

                <table class="table table">
                    <tr>
                        <th colspan="3" style="text-align:center"><b>HISTORI APPROVAL</b></th>
                    </tr>

                    <tr>
                        <th>Keterangan</th>
                        <th>User</th>
                        <th>Waktu</th>
                    </tr>

                    @foreach($data['persetujuan'] as $histori)
                        <tr>
                            <td style="width:40%">{{  $histori->review  }}</td>
                            <td>{{ \App\Models\User::username($histori->user_id)->name ?? '' }}</td>
                            <td>{{ date('d-m-Y H:i:s', strtotime($histori->waktu)) }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div> 
    </div> 
</div>

