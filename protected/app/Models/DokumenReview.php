<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DokumenReview extends Model
{
    use HasFactory;

    protected $table = 'dokumen_review';

    public function user_proses()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
