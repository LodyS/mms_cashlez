@foreach($data['foto_lokasi_merchant'] as $key=> $d)
    <div class="card mb-3" style="width:100%;">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="{{ url($d->photo_path) }}" class="img-fluid rounded-start" alt="...">
            </div>
                        
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">{{ ++$key }} . {{ $d->label_photo ?? '' }}</h5>
                    <table class="table table-hover">
                        <tr>
                            <td>Catatan</td>
                            <td>{{ $d->catatan ?? '' }}</td>
                        </tr>

                        <tr>
                            <td>Status</td>
                            <td>{{ $d->status ?? '' }}</td>
                        </tr>

                        <tr>
                            <td>Waktu</td>
                            <td>{{ date('d-m-Y', strtotime($d->created_at ?? '')) }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endforeach