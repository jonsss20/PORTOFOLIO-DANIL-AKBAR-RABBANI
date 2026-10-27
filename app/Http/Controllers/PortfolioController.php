<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PortfolioController extends Controller
{
    public function index()
    {
        $profil = [
            'nama' => 'Danil Akbar Rabbani',
            'kampus' => 'STMIK Mardira Indonesia',
            'lokasi' => 'Kawali, Ciamis, Jawa Barat',
            'bio' => 'Mahasiswa tingkat akhir Teknik Informatika yang berfokus pada pengembangan Full-Stack Web Development, UI/UX Design, serta riset Machine Learning & Computer Vision.',
        ];

        $skills = ['PHP', 'Laravel', 'JavaScript', 'Node.js', 'Python', 'TensorFlow', 'React Native', 'MySQL', 'Tailwind CSS', 'Figma'];

        $projects = [
            [
                'id' => 'skinrabbit',
                'judul' => 'SkinRabbit Detector',
                'kategori' => 'Mobile & AI',
                'deskripsi' => 'Aplikasi Android berbasis CNN MobileNetV2 untuk mengklasifikasikan kondisi dan penyakit kulit kelinci.',
                'masalah' => 'Peternak kelinci skala UMKM sering terlambat mendeteksi infeksi kulit seperti Scabies dan Ringworm yang menular cepat.',
                'solusi' => 'Membangun model kustom Convolutional Neural Network (MobileNetV2) yang diintegrasikan ke aplikasi mobile React Native untuk deteksi dini secara offline/online.',
                'dampak' => 'Mencapai akurasi klasifikasi citra di atas 90% pada pengujian dataset sampel di Peternakan Kang Nur.',
                'tech' => ['Python', 'TensorFlow', 'React Native', 'Google Colab']
            ],
            [
                'id' => 'kastirta',
                'judul' => 'KasTirta Singandaru',
                'kategori' => 'Web Application',
                'deskripsi' => 'Sistem manajemen tagihan air berbasis web dengan integrasi notifikasi WhatsApp otomatis via Fonnte API.',
                'masalah' => 'Pencatatan meteran dan penagihan kas air warga desa secara manual sering memicu selisih perhitungan dan keterlambatan pembayaran.',
                'solusi' => 'Sistem pemantauan meteran air berbasis PHP MySQL dengan perhitungan otomatis dan pengiriman tagihan berkala langsung ke WhatsApp warga.',
                'dampak' => 'Memangkas waktu rekapitulasi bulanan pengurus hingga 70% dan meningkatkan ketepatan waktu pembayaran warga.',
                'tech' => ['PHP', 'MySQL', 'Bootstrap', 'Fonnte API']
            ],
            [
                'id' => 'panada',
                'judul' => 'Cafe Panada POS & QR Order',
                'kategori' => 'Web Application',
                'deskripsi' => 'MVP sistem pemesanan mandiri via QR Code meja dan manajemen pencetakan struk transaksi untuk kafe.',
                'masalah' => 'Antrean panjang di meja kasir pada jam sibuk memicu ketidaknyamanan pelanggan dan menurunkan perputaran meja.',
                'solusi' => 'Aplikasi web Laravel dengan fitur scan QR Code di setiap meja untuk pesanan mandiri, langsung terhubung ke layar dapur dan sistem cetak kasir.',
                'dampak' => 'Mengurangi waktu tunggu pemesanan dari 10 menit menjadi di bawah 2 menit per meja.',
                'tech' => ['Laravel', 'Tailwind CSS', 'MySQL']
            ],
            [
                'id' => 'alhidayah',
                'judul' => 'Pesantren Al-Hidayah Web Portal',
                'kategori' => 'Web Application',
                'deskripsi' => 'Website profil resmi dan portal berita untuk transparansi kegiatan serta pendaftaran santri baru.',
                'masalah' => 'Penyampaian informasi program pendidikan dan penerimaan santri baru masih terbatas pada brosur fisik.',
                'solusi' => 'Mengembangkan portal web responsif dengan sistem manajemen konten (CMS) internal untuk pembaruan berita dan pendaftaran online.',
                'dampak' => 'Meningkatkan jangkauan informasi pendaftaran santri baru hingga ke luar wilayah Regency.',
                'tech' => ['PHP', 'MySQL', 'Tailwind CSS', 'JavaScript']
            ],
            [
                'id' => 'ratecard',
                'judul' => 'Rate Card Bobby Irawan',
                'kategori' => 'UI/UX & Branding',
                'deskripsi' => 'Desain visual digital rate card profesional untuk portofolio kolaborasi media sosial dan sponsorship.',
                'masalah' => 'Penyajian paket kolaborasi media sosial yang kaku membuat calon mitra kurang tertarik.',
                'solusi' => 'Merancang layout visual bersih, modern, dan informatif yang menonjolkan demografi audiens dan statistik engagement.',
                'dampak' => 'Meningkatkan profil profesionalitas kreator saat bernegosiasi dengan brand agency.',
                'tech' => ['Figma', 'Canva', 'UI/UX Design']
            ],
            [
                'id' => 'bananabobbs',
                'judul' => 'Banana Bobbs Branding & Web',
                'kategori' => 'UI/UX & Branding',
                'deskripsi' => 'Perancangan identitas visual brand kuliner kreatif beserta landing page katalog produk.',
                'masalah' => 'Brand usaha kuliner lokal membutuhkan identitas visual yang menonjol di kalangan konsumen muda.',
                'solusi' => 'Membuat palet warna cheerful, logo modern, dan landing page katalog interaktif untuk kemudahan pemesanan.',
                'dampak' => 'Memperkuat kesadaran merek (*brand awareness*) pada saluran promosi digital.',
                'tech' => ['Figma', 'Tailwind CSS', 'HTML/CSS']
            ]
        ];

        $experiences = [
            [
                'peran' => 'Front-End & Back-End Web Developer AI Cohort',
                'institusi' => 'Program Asah (Dicoding x Accenture)',
                'tahun' => 'Agu 2025 - Des 2025',
                'deskripsi' => 'Menyelesaikan modul teknis intensif pengembangan web full-stack, AI integration, serta berperan sebagai Project Manager & QA Lead pada proyek Capstone.'
            ],
            [
                'peran' => 'Peneliti Lapangan & Pengumpul Dataset',
                'institusi' => 'Peternakan Kang Nur (Sidaharja)',
                'tahun' => '2026',
                'deskripsi' => 'Melakukan observasi, wawancara, dan ekstraksi sampel citra kulit kelinci secara langsung di lokasi peternakan untuk pelatihan model Convolutional Neural Network.'
            ]
        ];

        return view('welcome', compact('profil', 'skills', 'projects', 'experiences'));
    }

    public function sendContact(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        try {
            Mail::raw("Pesan Baru dari Formulir Kontak Portfolio:\n\n" .
                      "Nama: {$validated['name']}\n" .
                      "Email: {$validated['email']}\n\n" .
                      "Pesan:\n{$validated['message']}", function ($message) use ($validated) {
                $message->to('danilakbarrabbani@gmail.com')
                        ->subject('Pesan Kolaborasi Baru: ' . $validated['name']);
            });
        } catch (\Exception $e) {
            // Log exception error secara diam-diam tanpa memblokir alur pengiriman WhatsApp
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Pesan terkirim ke backend server!'
        ]);
    }
}