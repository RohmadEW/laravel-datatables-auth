<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use App\Observer\SiswaObserver;
use Illuminate\Support\Facades\Session;
use App\Model\MasterData\TahunAjaranSemester;
use Illuminate\Support\Facades\DB;
use App\Model\MasterData;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class Siswa extends Model {

    use SoftDeletes;
    use \App\Scope\LimitAccessUserTrait;

    protected $table = 'siswa';
    protected $fillable = ['ta_semester_id', 'nssp', 'npsn', 'nis_lokal', 'nisn', 'nik', 'nama', 'tempat_lahir', 'tanggal_lahir', 'jk_id', 'agama_id', 'no_telp', 'no_hp', 'hobi_id', 'cita_id', 'jumlah_sdr', 'tanggal_masuk', 'asal_santri_id', 'tingkat_id', 'jurusan_id', 'rombel', 'no_absen', 'tuna_rungu', 'tuna_netra', 'tuna_daksa', 'tuna_grahita', 'tuna_laras', 'lamban_belajar', 'sulit_belajar', 'gangguan_komunikasi', 'bakat_luar_biasa', 'jenjang_sebelumnya_id', 'sebelumnya_npsn', 'sebelumnya_nama', 'sebelumnya_kab', 'sebelumnya_prov', 'sebelumnya_tahun_lulus', 'status_ijasah_id', 'tempat_tinggal_id', 'alamat', 'kecamatan', 'kabupaten', 'provinsi', 'no_kk', 'status_kk_id', 'no_kks_kps', 'no_pkh', 'no_kip', 'pip_status_id', 'pip_alasan_id', 'periode_pip', 'prestasi_bidang_id', 'prestasi_tingkat_id', 'prestasi_peringkat_id', 'prestasi_tahun', 'beasiswa_status', 'beasiswa_sumber_id', 'beasiswa_jenis_id', 'beasiswa_jangka_waktu', 'beasiswa_nominal', 'ayah_nama', 'ayah_status_hidup_id', 'ayah_nik', 'ayah_pendidikan_id', 'ayah_pekerjaan_id', 'ibu_nama', 'ibu_status_hidup_id', 'ibu_nik', 'ibu_pendidikan_id', 'ibu_pekerjaan_id', 'wali_nama', 'wali_hubungan_id', 'wali_nik', 'wali_pendidikan_id', 'wali_pekerjaan_id', 'penghasilan_id', 'user_id'];
    protected $hidden = ['deleted_at', 'created_at', 'updated_at'];
    protected $dates = ['deleted_at'];

    public function __construct(array $attributes = array()) {
        $this->setRawAttributes(array_merge($this->attributes, array(
            'user_id' => Auth::user()->id,
                )), true);

        parent::__construct($attributes);
    }

    protected static function boot() {
        parent::boot();

        static::observe(new SiswaObserver);
    }

    public function setTanggalLahirAttribute($date) {
        try {
            $this->attributes['tanggal_lahir'] = Carbon::createFromFormat('d/m/Y', $date)->toDateString();
        } catch (\Exception $e) {
            
        }
    }

    public function getTanggalLahirAttribute($date) {
        try {
            return Carbon::createFromFormat('Y-m-d', $date)->format('d/m/Y');
        } catch (\Exception $e) {
            return null;
        }
    }

    public function setTanggalMasukAttribute($date) {
        try {
            $this->attributes['tanggal_masuk'] = Carbon::createFromFormat('d/m/Y', $date)->toDateString();
        } catch (\Exception $e) {
            
        }
    }

    public function getTanggalMasukAttribute($date) {
        try {
            return Carbon::createFromFormat('Y-m-d', $date)->format('d/m/Y');
        } catch (\Exception $e) {
            return null;
        }
    }

    public function scopeLimitedAccessTA($query) {
        return $query->where('siswa.ta_semester_id', Session::get('ta_semester_id'));
    }

    public function akun() {
        return $this->belongsTo(Siswa::class, 'user_id');
    }

    public function penghasilan() {
        return $this->belongsTo(MasterData\Penghasilan::class, 'penghasilan_id');
    }

    public function wali_pekerjaan() {
        return $this->belongsTo(MasterData\Pekerjaan::class, 'wali_pekerjaan_id');
    }

    public function wali_pendidikan() {
        return $this->belongsTo(MasterData\Pendidikan::class, 'wali_pendidikan_id');
    }

    public function wali_hubungan() {
        return $this->belongsTo(MasterData\WaliHubungan::class, 'wali_hubungan_id');
    }

    public function ibu_pekerjaan() {
        return $this->belongsTo(MasterData\Pekerjaan::class, 'ibu_pekerjaan_id');
    }

    public function ibu_pendidikan() {
        return $this->belongsTo(MasterData\Pendidikan::class, 'ibu_pendidikan_id');
    }

    public function ibu_status_hidup() {
        return $this->belongsTo(MasterData\StatusHidup::class, 'ibu_status_hidup_id');
    }

    public function ayah_pekerjaan() {
        return $this->belongsTo(MasterData\Pekerjaan::class, 'ayah_pekerjaan_id');
    }

    public function ayah_pendidikan() {
        return $this->belongsTo(MasterData\Pendidikan::class, 'ayah_pendidikan_id');
    }

    public function ayah_status_hidup() {
        return $this->belongsTo(MasterData\StatusHidup::class, 'ayah_status_hidup_id');
    }

    public function beasiswa_sumber() {
        return $this->belongsTo(MasterData\BeasiswaSumber::class, 'beasiswa_sumber_id');
    }

    public function prestasi_peringkat() {
        return $this->belongsTo(MasterData\PrestasiPeringkat::class, 'prestasi_peringkat_id');
    }

    public function prestasi_tingkat() {
        return $this->belongsTo(MasterData\PrestasiTingkat::class, 'prestasi_tingkat_id');
    }

    public function prestasi_bidang() {
        return $this->belongsTo(MasterData\PrestasiBidang::class, 'prestasi_bidang_id');
    }

    public function pip_alasan() {
        return $this->belongsTo(MasterData\PipAlasan::class, 'pip_alasan_id');
    }

    public function pip_status() {
        return $this->belongsTo(MasterData\PipStatus::class, 'pip_status_id');
    }

    public function status_kk() {
        return $this->belongsTo(MasterData\StatusKK::class, 'status_kk_id');
    }

    public function tempat_tinggal() {
        return $this->belongsTo(MasterData\TempatTinggal::class, 'tempat_tinggal_id');
    }

    public function status_ijasah() {
        return $this->belongsTo(MasterData\StatusIjasah::class, 'status_ijasah_id');
    }

    public function jenjang_sebelumnya() {
        return $this->belongsTo(MasterData\JenjangSebelumnya::class, 'jenjang_sebelumnya_id');
    }

    public function jurusan() {
        return $this->belongsTo(MasterData\Jurusan::class, 'jurusan_id');
    }

    public function tingkat() {
        return $this->belongsTo(MasterData\Tingkat::class, 'tingkat_id');
    }

    public function asal_santri() {
        return $this->belongsTo(MasterData\AsalSantri::class, 'asal_santri_id');
    }

    public function cita() {
        return $this->belongsTo(MasterData\Cita::class, 'cita_id');
    }

    public function hobi() {
        return $this->belongsTo(MasterData\Hobi::class, 'hobi_id');
    }

    public function agama() {
        return $this->belongsTo(MasterData\Agama::class, 'agama_id');
    }

    public function ta_semester() {
        return $this->belongsTo(MasterData\TahunAjaran::class, 'ta_semester_id');
    }

    public function jk() {
        return $this->belongsTo(MasterData\Jk::class, 'jk_id');
    }

}
