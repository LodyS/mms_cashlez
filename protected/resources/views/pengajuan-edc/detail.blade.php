<div class="card" >
    <div class="card-body">

        <table class="table table">
            <tr>
                <th colspan="2" style="text-align:center">DETAIL PENGAJUAN</th>
            </tr>

            <tr>
                <td style="width:30%">Alamat</td>
                <td>{{ $merchant->alamat ?? '' }}</td>
            </tr>

            <tr>
                <td style="width:30%">Alamat Pengiriman</td>
                <td>{{ $merchant->alamat_pengiriman ?? '' }}</td>
            </tr>

            <tr>
                <td>Kebutuhan EDC</td>
                <td>{{ $merchant->kebutuhan_edc ?? '' }}</td>
            </tr>

            <tr>
                <td>Nama PIC</td>
                <td>{{ $merchant->nama_pic ?? '' }}</td>
            </tr>

            <tr>
                <td>Nomor Telepon PIC</td>
                <td>{{ $merchant->no_tlp_pic ?? '' }}</td>
            </tr>

            <?php $user_update = $merchant_update ?? '' ; ?>
            <?php $jabatan_userr = \App\Models\User::with(['jabatan'])->where('id', $user_update)->first() ?? ''; ?>
            <tr>
                <td>User Proses</td>
                <td>{{ \App\Models\User::username($merchant)->name ?? ''  }} - {{ ucwords(strtolower($jabatan_userr->jabatan->privilege_title ?? '')) }}</td>
            </tr>

            <tr>
                <td>Waktu</td>
                <td>{{ ($merchant == null) ? '' : date('d-m-Y H:i:s', strtotime($merchant->updated_at)) }}</td>
            </tr>

            <tr>
                <td>Catatan</td>
                <td>{{ $merchant->catatan ?? '' }}</td>
            </tr>

            <tr>
                <td>Status</td>
                <td>{{ $merchant->status ?? '' }}</td>
            </tr>
        </table>
    </div> 
</div>