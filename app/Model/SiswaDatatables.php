<?php

/*
 * PENDATAAN MAARIF NU
 * Dikembangkan oleh Rohmad Eko Wahyudi
 * rohmad.ew@gmail.com
 */

namespace App\Model;

/**
 * Description of SiswaDatatables
 *
 * @author Rohmad Eko Wahyudi
 */
class SiswaDatatables extends Siswa {

    use \Tightenco\Parental\HasParentModel;

    protected $hidden = ['ta_semester_id', 'nssp', 'nis_lokal', 'nisn', 'nik', 'tempat_lahir', 'tanggal_lahir', 'jk_id', 'agama_id', 'no_telp', 'no_hp', 'hobi_id', 'cita_id', 'jumlah_sdr', 'tanggal_masuk', 'asal_santri_id', 'tingkat_id', 'jurusan_id', 'rombel', 'no_absen', 'tuna_rungu', 'tuna_netra', 'tuna_daksa', 'tuna_grahita', 'tuna_laras', 'lamban_belajar', 'sulit_belajar', 'gangguan_komunikasi', 'bakat_luar_biasa', 'jenjang_sebelumnya_id', 'sebelumnya_npsn', 'sebelumnya_nama', 'sebelumnya_kab', 'sebelumnya_prov', 'sebelumnya_tahun_lulus', 'status_ijasah_id', 'tempat_tinggal_id', 'alamat', 'provinsi', 'no_kk', 'status_kk_id', 'no_kks_kps', 'no_pkh', 'no_kip', 'pip_status_id', 'pip_alasan_id', 'periode_pip', 'prestasi_bidang_id', 'prestasi_tingkat_id', 'prestasi_peringkat_id', 'prestasi_tahun', 'beasiswa_status', 'beasiswa_sumber_id', 'beasiswa_jenis_id', 'beasiswa_jangka_waktu', 'beasiswa_nominal', 'ayah_nama', 'ayah_status_hidup_id', 'ayah_nik', 'ayah_pendidikan_id', 'ayah_pekerjaan_id', 'ibu_nama', 'ibu_status_hidup_id', 'ibu_nik', 'ibu_pendidikan_id', 'ibu_pekerjaan_id', 'wali_nama', 'wali_hubungan_id', 'wali_nik', 'wali_pendidikan_id', 'wali_pekerjaan_id', 'penghasilan_id', 'user_id', 'deleted_at', 'created_at', 'updated_at', 'id', 'password', 'client_address', 'provider', 'provider_id', 'remember_token', 'suspended', 'wilayah_id', 'wilayah_type', 'deleted_at', 'created_at', 'updated_at'];

}
