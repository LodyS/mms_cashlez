@extends('tema-admin.app')
@section('content')

<div class="card">
    <div class="card-body">

        <div class="w-sm-100 mr-auto">
            <h4 class="mb-0">Tipe Produk
                <span style="float:right;">
                	<a href="{{ route('product-type.create')}}" class="btn btn-primary btn-sm" align="right">Tambah</a>
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
                        <th>Kode</th>
                        <th>Tipe Produk</th>
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
        ajax: "{{ route('product-type.index') }}",
        //scrollX: true,
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex' , orderable: false, searchable: false},
            { data: 'code', name:'code'},
            { data: 'product_title', name: 'product_title'},
            { data: 'action', name: 'action', orderable: false},
        ],
        order: [[0, 'asc']]
    });
});
</script>
@endpush