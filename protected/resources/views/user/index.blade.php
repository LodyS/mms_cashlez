@extends('tema-admin.app')
@section('content')

<div class="card">
    <div class="card-body">

        <div class="w-sm-100 mr-auto">
            <h4 class="mb-0">User
                <span style="float:right;">
                	<a href="{{ route('users.create')}}" class="btn btn-primary btn-sm" align="right">Tambah</a>
                </span>
            </h4>
        </div>

        <div style="height:30px"></div>

        @include('flash-message')
        @include('error-message')
        
        <div class="table-responsive">
            <table class="table" style="width:100%" id="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Jabatan</th>
                        <th>Aksi</td>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script type="text/javascript">
$(document).ready( function () {

    $('#table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('users.index') }}",
        //scrollX: true,
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex' , orderable: false, searchable: false},
            { data: 'name', name: 'name'},
            { data: 'username', name : 'username' },
            { data: 'jabatan', name: 'jabatan'},
            { data: 'action', name: 'action', orderable: false},
        ],
        order: [[0, 'asc']]
    });
});
</script>
@endpush