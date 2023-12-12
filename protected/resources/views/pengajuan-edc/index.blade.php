@extends('tema-admin.app')
@section('content')

<div class="card">
    <div class="card-body">

        <div class="w-sm-100 mr-auto">
            <h4 class="mb-0">PENGAJUAN EDC {{ strtoupper(\App\Models\DataMerchant::nama_merchant($token_applicant)) ?? '' }}</h4>
        </div>

        <div style="height:30px"></div>

        <div style="margin: 10px 0px;">
            <div class="row">
				<div class="col-sm-6">
					<div class="form-group">
                        <label class="control-label">Filter by date</label>
                        <input type="text" name="daterange" value="" style="width:485px" class="form-control"/>
            		</div>
				</div><!-- Col -->
			</div><!-- Row -->

            <button class="btn btn-success filter">Filter</button>
        </div>

        <div style="height:30px"></div>

        @include('flash-message')
        <div class="table-responsive">
            <table class="table" style="width:100%" id="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal Pengajuan</th>
                        <th style="width:50%">Alamat</th>
                        <th>Kebutuhan EDC</th>
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

    $('input[name="daterange"]').daterangepicker({
        startDate: moment().subtract(1, 'M'),
        endDate: moment()
    });

    var table = $('#table').DataTable({
        processing: true,
        serverSide: true,
        dom: 'Bfrtip',
        buttons: ['csv', 'excel', 'pdf', 'print'],
        ajax: {
            route : "{{ route('pengajuan-edc', $token_applicant) }}",
            data : function(d){
                d.from_date = $('input[name="daterange"]').data('daterangepicker').startDate.format('YYYY-MM-DD');
                d.to_date = $('input[name="daterange"]').data('daterangepicker').endDate.format('YYYY-MM-DD');
            }
        },
        //scrollX: true,
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex' , orderable: false, searchable: false},
            { data: 'tanggal_pengajuan', name: 'tanggal_pengajuan'},
            { data: 'alamat', name: 'alamat' },
            { data: 'kebutuhan_edc', name: 'kebutuhan_edc' },
            { data: 'action', name: 'action', orderable: false},
        ],
        order: [[0, 'asc']]
    });

    $('.buttons-excel, .buttons-csv').each(function() {
        $(this).removeClass('btn-default').addClass('btn-success')
    })

    $('.buttons-pdf').each(function() {
        $(this).removeClass('btn-default').addClass('btn-danger')
    })

    $('.buttons-print').each(function() {
        $(this).removeClass('btn-default').addClass('btn-primary')
    })

    $(".filter").click(function(){
        table.draw();
    });
});
</script>
@endpush