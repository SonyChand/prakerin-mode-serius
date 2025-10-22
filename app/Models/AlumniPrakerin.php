<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AlumniPrakerin extends Model
{
    use HasFactory, LogsActivity; // <-- Tambahkan LogsActivity

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama_lengkap',
        'asal_sekolah',
        'jurusan',
        'tahun_mulai',
        'tahun_selesai',
        'foto',
        'hasil_karya',
        'user_id',
    ];

    // Konfigurasi Activity Log untuk model ini
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['nama_lengkap', 'asal_sekolah', 'jurusan', 'tahun_mulai', 'tahun_selesai']) // Hanya log field ini
            ->logOnlyDirty() // Hanya log jika ada perubahan
            ->setDescriptionForEvent(fn(string $eventName) => "Data alumni '{$this->nama_lengkap}' telah di-{$eventName}")
            ->dontSubmitEmptyLogs(); // Jangan simpan log jika tidak ada perubahan
    }

    /**
     * Relasi ke User (siapa yang menginput)
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}