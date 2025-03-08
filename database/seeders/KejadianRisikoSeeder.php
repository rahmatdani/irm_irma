<?php

namespace Database\Seeders;

use App\Models\KejadianRisiko;
use App\Models\KelompokRisiko;
use App\Models\KategoriRisiko;
use Illuminate\Database\Seeder;

class KejadianRisikoSeeder extends Seeder
{
    public function run(): void
    {
        $kategoriKepatuhan = KategoriRisiko::where('nama', 'Kepatuhan')->first();

        $kejadianData = [
            'Korupsi' => [
                'Memperkaya Diri Sendiri atau Orang Lain'
            ],
            'Pemenuhan Laporan' => [
                'Pelaporan Terlambat'
            ],
            'Kebijakan dan Konsultasi' => [
                'Evaluasi untuk pelaksanaan monitoring konsultasi tidak optimal',
                'Implementasi Kepatuhan terhadap Regulasi belum optimal',
                'Kesimpulan dan rekomendasi yang ditetapkan tidak tepat',
                'Ketidaktepatan Saran atau Rekomendasi',
                'Rekomendasi yang disampaikan tidak tepat',
                'Ruang Lingkup Kepatuhan tidak sesuai dengan sasaran SMAP',
                'Terdapat Barrier/Gangguan dalam pelaksanaan Konsultasi',
                'Usulan Program Pengelolaan Kepatuhan, Konsultasi dan Sistem Manajemen Anti Penyuapan (SMAP) tidak sejalan dengan sasaran organisasi'
            ],
            'Kolusi' => [
                'Kesepakatan Jahat dalam Proses Bisnis'
            ],
            'Laporan' => [
                'Data Laporan Tidak Akurat',
                'Laporan Statistik Perusahaan Tidak Akurat',
                'Penyusunan Annual Report Terlambat',
                'Penyampaian Laporan Terlambat',
                'Penyusunan Laporan Korporat Terlambat'
            ],
            'Risiko Kecurangan (Fraud Risk)' => [
                'Barang yang dimusnahkan tidak sesuai dengan daftar ATTP yang akan dimusnahkan',
                'Klasifikasi material tipe bursa tidak akurat',
                'Tindakan kecurangan'
            ],
            'Penyuapan' => [
                'Menawarkan bujukan/sejenisnya yang tidak patut/tidak wajar oleh perusahaan dan perantara atas nama perusahaan dalam konteks kegiatan lobbying',
                'Mendapatkan favorable treatment tertentu bagi perusahaan menggunakan koneksi spesial/khusus tertentu dengan pihak ketiga, terutama pejabat pemerintah sebagai tidak fair dan tidak semestinya'
            ],
            'Gratifikasi' => [
                'Penerimaan Hadiah dari Pihak lain'
            ],
            'Risiko Etika' => [
                'Terjadi Pelanggaran Kode Etik Perusahaan'
            ]
        ];

        foreach ($kejadianData as $kelompokNama => $kejadianList) {
            $kelompok = KelompokRisiko::where('nama', $kelompokNama)->first();

            if ($kelompok) {
                foreach ($kejadianList as $kejadian) {
                    KejadianRisiko::create([
                        'deskripsi' => $kejadian,
                        'kelompok_risiko_id' => $kelompok->id,
                        'kategori_risiko_id' => $kategoriKepatuhan->id
                    ]);
                }
            }
        }
    }
}
