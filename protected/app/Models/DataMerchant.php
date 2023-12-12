<?php

namespace App\Models;
use DB;
use Auth;
use DataTables;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class DataMerchant extends Model
{
    use HasFactory;

    protected $table ='data_merchants';

    protected $fillable = [
        'nama_merchant',
        'pengajuan_sebagai',
        'tahun_berdiri',
        'jenis_usaha',
        'mcc',
        'fitur_transaksi',
        'bisnis_email',
        'bisnis_no_hp',
        'alamat_bisnis',
        'tempat_bisnis',
        'store_url',
        'status_tempat_usaha',
        'nama_pemilik_merchant',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat_sesuai_ktp',
        'alamat_domisili',
        'kewarganegaraan',
        'email',
        'nomor_identitas',
        'nomor_hp',
        'npwp',
        'nama_pengurus_merchant',
        'kewarganegaraan_pengurus',
        'nomor_identitas_pengurus',
        'npwp_pengurus',
        'email_pengurus',
        'nomor_hp_pengurus',
        'nama_bank',
        'nomor_rekening_bank_penampung',
        'nama_pemilik_rekening_merchant_badan_usaha',
        'email_settlement',
        'token_applicant',
        'user_id',
        'lat',
        'longitude',
        'status_approval',
        'jenis_produk',
        'catatan',
        'omset_rata_rata',
        'return_sales',
        'merchant_op_proses',
        'risk_analis_proses',
        'alasan',
        'status_setting_mid',
        'status_setting_tid',
        'status_setting_mdr',
        'status_inject_edc',
        'status_pin_key',
        'status_tes_transaksi',
        'status_qc',
        'alamat_pejabat_berwenang',
        'npwp_merchant_badan_usaha',
        'status_ekspedisi',
        'jenis_kelamin_pemilik',
        'jenis_kelamin_pengurus',
        'sumber_data',
        'dokumen_lengkap',
        'status_tanda_tangan'
    ];

    protected static function boot()
    {
       parent::boot();
    
        static::creating(function ($model) {
            $model->status_approval = 'New Request';
            $model->token_applicant = Str::uuid();
            $model->user_id = $request->user_id ?? auth('sanctum')->user()->id;
            $model->sumber_data = 'Mobile';
        });
    } 

    public static function master_data_status(Request $request, $status=false, $token_applicant=false)
    {
        $data = DataMerchant::with(['posisi_proses'=>function($query){
            $query->where('token', '')->orderBy('id', 'desc');
        }])
        ->when($status, function($query, $status){
            $query->where('status_approval', $status);
        })
        ->when($token_applicant, function($query, $token_applicant){
            $query->where('token_applicant', $token_applicant);
        })
        ->where('dokumen_lengkap', 'Y')
        ->orderBy('id', 'desc');
  
        if($request->filled('from_date') && $request->filled('to_date')):
            $data->whereBetween('created_at', [$request->from_date." 00:00:00", $request->to_date." 23:59:59"]);
        endif;

        $query = Datatables::of($data)
        ->addIndexColumn()
        ->addColumn('tanggal_pengajuan', function($row){
            return date('d-m-Y', strtotime($row->created_at));
        })
        ->addColumn('status', function($row){
        
            $approved_status = array('Approved', 'Close');
            $sumber_data = ($row->user_input->privilege_user_id == 1) ? 'Merchant' : 'Sales Officer';

            $posisi = $row->posisi_proses->jabatan_proses->privilege_title ?? $sumber_data;
            $posisi = ucwords(strtolower($posisi));
           
            $user_proses = $row->posisi_proses->user_proses->name ?? $row->user_input->name;
            
            $status_approval = [
                'Process'=>tombol_biasa('Process', 'primary'),
                'New Request'=>tombol_biasa('New Request', 'primary'), 
                'Updated'=>tombol_biasa('Update', 'primary'),
                'Close'=>tombol_biasa('Close', 'danger'),
                'Rejected'=>tombol_biasa('Reject', 'danger'),
                'Approved'=>tombol_biasa('Approved', 'success')
            ][$row->status_approval];

            $status_approval .= tombol_generall_dua_param('status-merchant', 'Process', $row->token_applicant, 'Status Fitur Pembayaran', 'warning');
            
            if($row->merchant_op_proses == 'Y' and Auth::user()->privilege_user_id == 27):
                $status_approval .= tomboll_general('pengajuan-edc', $row->token_applicant, 'Pengajuan EDC', 'primary');
            endif;

            $status_approval .= tomboll_general('cabang', $row->token_applicant, 'Cabang', 'info');
            $status_approval .= tombol_biasa($posisi.'<br/>'.'Last User : '.$user_proses, 'light');

            return $status_approval;
        });

        return $query;
    }

    public function dokumen_merchant()
    {
        return $this->hasMany(DokumenApplicantDetail::class, 'id_download', 'id');
    }

    public function histori_approval()
    {
        return $this->hasMany(HistoriApproval::class, 'token_applicant', 'token_applicant');
    }

    public function posisi_proses()
    {
        return $this->hasOne(HistoriApproval::class, 'token_applicant', 'token_applicant');
    }

    public function merchant_branch()
    {
        return $this->hasMany(MerchantBranch::class, 'token_applicant', 'token_applicant');
    }

    public function signature()
    {
        return $this->hasOne(TandaTangan::class, 'token_applicant', 'token_applicant');
    }

    public static function jumlah_data_berdasarkan_status($status)
    {
        return DataMerchant::where('status_approval', $status)->where('dokumen_lengkap', 'Y')->count();
    }

    public static function nama_merchant($status)
    {
        return DataMerchant::where('token_applicant', $status)->value('nama_merchant');
    }

    public function setOmsetRataRataAttribute($value)
    {
        $this->attributes['omset_rata_rata'] = preg_replace('/[^0-9]/', '', $value);
    }

    public function user_input()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function payment()
    {
        return $this->hasMany(Workflow::class, 'token_applicant', 'token_applicant');
    }
}