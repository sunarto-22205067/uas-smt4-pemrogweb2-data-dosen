<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
// use Illuminate\Database\Eloquent\SoftDeletes;

class Dosen extends Model
{
    use HasFactory;
    protected $table = 'dosens';
    protected $fillable = [
        'nid',
        'status_id',
        'nama_dosen',
        'alamat_dosen',
        'nomor_telepon',
        'email_dosen',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
    ];

    /**
     * Get the user that owns the Dosen
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class);
    }
}
