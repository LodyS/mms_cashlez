<?php

namespace App\Models;
use DataTables;
use DB;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Workflow extends Model
{
    use HasFactory;

    protected $table = 'workflow';
    protected $fillable = [
        'token_applicant', 
        'status_approval', 
        'merchant_op_proses', 
        'risk_analis_proses', 
        'user_id', 
        'token',  
        'manager_op_proses',
        'return_mo_ops',
        'return_risk_analis'
    ];

    public static function master_data_status(Request $request, $status=false, $token_applicant=false)
    {
        $data = Workflow::with(['posisi_proses'=>function($query){
            $query->orderBy('id', 'desc');
        }])
        ->when($status, function($query, $status){
            $query->where('status_approval', $status);
        })
        ->when($token_applicant, function($query, $token_applicant){
            $query->where('token_applicant', $token_applicant);
        })
        ->orderBy('id', 'desc');

        if($request->filled('from_date') && $request->filled('to_date')):
            $data = $data->whereBetween('created_at', [$request->from_date." 00:00:00", $request->to_date." 23:59:59"]);
        endif;

        $query = Datatables::of($data)
        ->addIndexColumn()
        ->addColumn('tanggal_pengajuan', function($row){
            return date('d-m-Y', strtotime($row->created_at));
        })
        ->addColumn('nama_merchant', function($row){
            return $row->merchant->nama_merchant;
        })
        ->addColumn('pengajuan_sebagai', function($row){
            return $row->merchant->pengajuan_sebagai;
        })
        ->addColumn('status', function($row){
            
            $approved_status = array('Approved');
            $sumber_data = ($row->user_input->privilege_user_id == 1) ? 'Merchant' : 'Sales Officer';

            $posisi = $row->posisi_proses->jabatan_proses->privilege_title ?? $sumber_data;
            $posisi = ucwords(strtolower($posisi));
            $posisi = ($row->risk_analis_proses == 'Y' and in_array($row->status_approval, $approved_status)) ? 'Bank Approve' : $posisi;
           
            $user_proses = $row->posisi_proses->user_proses->name ?? $row->user_input->name;
           
            $status_approval = [
                'Process'=>tombol_biasa('Process', 'primary'),
                'New Request'=>tombol_biasa('New Request', 'primary'),
                'Approved'=>tombol_biasa('Approve', 'success'),
                'Rejected'=>tombol_biasa('Reject', 'danger'),
                'Updated'=>tombol_biasa('Update', 'primary'),
                'Close'=>tombol_biasa('Close', 'danger'),
                ''=>''
            ][$row->status_approval];

            $status_approval .= tombol_biasa($posisi.'<br/>'.'Last User : '.$user_proses, 'light');

            return $status_approval;
        });

        return $query;
    }

    public function posisi_proses()
    {
        return $this->hasOne(HistoriApproval::class, 'token', 'token');
    }

    public function user_input()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function merchant()
    {
        return $this->hasOne(DataMerchant::class, 'token_applicant', 'token_applicant');
    }

    public static function jumlah_data_berdasarkan_status($status, $token_applicant=false)
    {
        return Workflow::where('status_approval', $status)
        ->when($token_applicant, function($query, $token_applicant){
            $query->where('token_applicant', $token_applicant);
        })->count();
    }

    public function histori_approval()
    {
        return $this->hasMany(HistoriApproval::class, 'token_applicant', 'token_applicant');
    }

    public function dokumen_merchant()
    {
        return $this->hasMany(DokumenApplicantDetail::class, 'id_download', 'id');
    }

    public static function input_array(Request $request, $data)
    {
        $fitur_transaksi_array = explode(',', $request->fitur_transaksi);
        $fitur_transaksi_array = array_map("ltrim", $fitur_transaksi_array);

        for($i=0; $i<count($fitur_transaksi_array); $i++):

            DB::table('workflow')->insert([
                'token_applicant'=>$data->token_applicant,
                'status_approval'=>'New Request',
                'fitur_pembayaran'=>$fitur_transaksi_array[$i],
                'user_id'=>$data->user_id,
                'token'=>Str::uuid(),
                'created_at'=>date('Y-m-d H:i:s')
            ]); 

        endfor;
    }
}
