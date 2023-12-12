<div style="height:30px"></div>
<h4 align="center">HISTORI SETTING</h4>
<div style="height:30px"></div>

<table class="table table-bordered">
    <tr>
        <th>Keterangan</th>
        <th>User</th>
        <th>Waktu</th>
        <th>Jenis</th>
    </tr>

    @foreach($data->setting as $histori)
        <tr>
            <td>{{ $histori->catatan }}</td>
            <td>{{ \App\Models\User::username($histori->user_id)->name ?? '' }}</td>
            <td>{{ date('d-m-Y h:i', strtotime($histori->tanggal)) }}</td>
            <td>{{ $histori->catatan }}
        </tr>
    @endforeach
</table>