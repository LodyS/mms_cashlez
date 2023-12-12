@extends('tema-admin.app')
@section('content')

<meta name="csrf-token" content="{{ csrf_token() }}">

<div class="card">
    <div class="card-body">

        <div class="w-sm-100 mr-auto">
            <h4 class="mb-0" style="float:left">{{ strtoupper($status) }} MERCHANT - {{ strtoupper(\App\Models\DataMerchant::nama_merchant($token_applicant)) }}</h4>
            <a href="{{ url('form-pengajuan-merchant', [$token_applicant]) }}" class="btn btn-primary btn-xs" style="float:right">Print Pengajuan Merchant</a>
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

        @if(Auth::user()->jabatan->approval_status == 'Yes' && $status == 'Process')
            <button style="margin-bottom: 10px" class="btn btn-primary btn-xs update_all" data-url="{{ url('process-selected') }}" data-id="Approved">Approve</button>
            <button style="margin-bottom: 10px" class="btn btn-danger btn-xs update_all" data-url="{{ url('process-selected') }}" data-id="Close">Close</button>
        
            <div style="height:10px"></div>
        @endif

        @include('flash-message')
        <div class="table-responsive">
            <table class="table" style="width:100%" id="table">
                <thead>
                    <tr>
                        @if(Auth::user()->jabatan->approval_status == 'Yes' && $status == 'Process')
                        <th><input type="checkbox" id="master"></th>
                        @endif
                        <th>No</th>
                        <th>Tanggal Pengajuan</th>
                        <th>Fitur Pembayaran</th>
                        <th>Pengajuan Sebagai</th>
                        <th>Status Pemohon</th>
                        <th>Status Internal</th>
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
            route : "{{ url($route, $status) }}",
            data : function(d){
                d.from_date = $('input[name="daterange"]').data('daterangepicker').startDate.format('YYYY-MM-DD');
                d.to_date = $('input[name="daterange"]').data('daterangepicker').endDate.format('YYYY-MM-DD');
            }
        },
        columns: [
            @if(Auth::user()->jabatan->approval_status == 'Yes' && $status == 'Process')
                { data: 'centang', name: 'centang' , orderable: false, searchable: false},
            @endif
            { data: 'DT_RowIndex', name: 'DT_RowIndex' , orderable: false, searchable: false},
            { data: 'tanggal_pengajuan', name: 'tanggal_pengajuan'},
            //{ data: 'nama_merchant', name: 'nama_merchant' },
            { data: 'fitur_pembayaran', name: 'fitur_pembayaran' },
            { data: 'pengajuan_sebagai', name: 'pengajuan_sebagai' },
            { data: 'status', name:'status'},
            { data: 'action', name:'action'},
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

    $('#master').on('click', function(e) {
        if($(this).is(':checked',true)){
            $(".sub_chk").prop('checked', true);
        } else {
            $(".sub_chk").prop('checked',false);
        }
    }); //untuk centang semua data yang akan di update

    $('.update_all').on('click', function(e) {

        var allVals = []; // menampung nilai isi array yang dipilih

        $(".sub_chk:checked").each(function() {
            allVals.push($(this).attr('data-id'));
        });

        if(allVals.length <=0){
            alert("Silahkan pilih data yang akan di update.");
        } else {
            var check = confirm("Anda yakin akan update data ini?");

            if(check == true)
            {
                var join_selected_values = allVals.join(",");
                $.ajax({
                    url: $(this).data('url'),
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        id : join_selected_values,
                        status : $(this).data('id'),
                    },
                    success: function (data) {
                        location.reload();
                    },
                });
            }
        }
    });
});
</script>
@endpush