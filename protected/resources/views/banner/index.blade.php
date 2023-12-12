@extends('tema-admin.app')
@section('content')

<div class="card">
    <div class="card-body">

        <div class="w-sm-100 mr-auto">
            <h4 class="mb-0">Banner
                <span style="float:right;">
                	<a href="{{ route('banner.create')}}" class="btn btn-primary btn-sm" align="right">Tambah</a>
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
                        <th>Images</th>
                        <th>Title</th>
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
        searching : false,
        ajax: "{{ route('banner.index') }}",
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex' , orderable: false, searchable: false},
            { data: 'banner', name: 'banner'},
            { data:'title', name:'title'},
            { data: 'action', name: 'action', orderable: false},
        ],
        order: [[0, 'asc']]
    });
});
</script>
@endpush