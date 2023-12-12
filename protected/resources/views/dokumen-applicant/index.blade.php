@extends('tema-admin.app')
@section('content')

<div class="card">
    <div class="card-body">

        <div class="w-sm-100 mr-auto">
            <h4 class="mb-0">Dokumen Applicant
                <span style="float:right;">
                	<a href="{{ route('dokumen-applicant.create')}}" class="btn btn-primary btn-sm" align="right">Tambah</a>
                </span>
            </h4>
        </div>

        <div style="height:30px"></div>

        @include('flash-message')
        <div class="table-responsive">
            <table class="table" style="width:100%" id="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Jenis</th>
                        <th>Nama </th>
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
        ajax: "{{ route('dokumen-applicant.index') }}",
        //scrollX: true,
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex' , orderable: false, searchable: false},
            { data: 'id_credit_type', name: 'id_credit_type' },
            { data: 'label_photo', name: 'label_photo'},
            { data: 'action', name: 'action', orderable: false},
        ],
        order: [[0, 'asc']]
    });
});
</script>
@endpush