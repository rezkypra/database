-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Agu 2022 pada 20.07
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `industri`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun`
--

CREATE TABLE `akun` (
  `kode_user` varchar(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `nama_user` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` text NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `akun`
--

INSERT INTO `akun` (`kode_user`, `username`, `nama_user`, `password`, `email`, `no_hp`, `level`) VALUES
('1', 'admin', 'admin', 'admin', 'adminindustri@gmail.com', '08888889', 'Superadmin'),
('ad002', 'admin2', 'Admin 2', 'admin2', 'rezky123@gmail.com', '081236253871', 'Admin'),
('ad003', 'admin3', 'Admin Pegawai 3', 'admin3', 'syauqi240@gmail.com', '0812384723882', 'Admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bidang_ikm`
--

CREATE TABLE `bidang_ikm` (
  `kode_bidang` int(11) NOT NULL,
  `nama_bidang` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bidang_ikm`
--

INSERT INTO `bidang_ikm` (`kode_bidang`, `nama_bidang`) VALUES
(10750, 'Agro'),
(17109, 'Hasil Hutan'),
(20299, 'Kimia dan Bahan Bangunan'),
(22292, 'Logam'),
(28291, 'Mesin'),
(29100, 'Perekayasaan'),
(32903, 'Elektronik'),
(95210, 'Alat Transportasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `event`
--

CREATE TABLE `event` (
  `kode_event` varchar(20) NOT NULL,
  `nama_event` varchar(30) NOT NULL,
  `tanggal_event` varchar(30) NOT NULL,
  `lokasi_event` varchar(40) NOT NULL,
  `keterangan` text NOT NULL,
  `gambar` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `event`
--

INSERT INTO `event` (`kode_event`, `nama_event`, `tanggal_event`, `lokasi_event`, `keterangan`, `gambar`) VALUES
('EV001', 'Temu Industri Samarinda Pempek', '2021-06-08', 'Radioheartline Samarinda 94.4FM', 'Temu Industri Samarinda selasa 8 Juni 2021 di Radioheartline Samarinda 94.4FM pukul 10.00-11.00 WITA', 0x74656d752d696e6475737472692d73616d6172696e64612d70656d70656b2d6e617379612e6a7067),
('EV002', 'Pandemi Gerus hingga 80% Peraj', '2020-11-13', ' Desa Singosaren, Banguntapan, Kab. Bant', 'Kunjungan belajar dan melihat langsung ke Desa Singosaren, Banguntapan, Kab. Bantul, DIY.\r\nSebuah kawasan sentra industri alami pengrajin logam (perak dan tembaga) di Kab. Bantul yang skrg 80% tergerus krn covid 19, di fasilitasi Disperin, Koperasi dan UMKM Kabupaten Bantul', 0x70616e64656d692d67657275732d68696e6767612d38302d706572616a696e2e6a7067),
('EV003', 'Launching Inovasi BBPOM Samari', '2021-12-02', 'Hotel Mercure Samarinda', 'Pagi ini Kepala Disperin Muhammad Faisal menghadiri acara Launching Sistem Pelayanan Publik BBPOM  di Samarinda yang dirangkai sekaligus dengan acara Pelepasan Kepala BBPOM Samarinda Bapak Drs. Leonard Duma, Apt MM yang pindah tugas ke BBPOM Palangkarya di Hotel Mercure Samarinda.\r\n\r\nSistem inovasi yang di launching ini antara lain : Call Me Si Jebol (Seksi Sertifikasi Jemput Bola) dan BPOM YES ( YAKIN ESOK SELESAI), Kemudian ada juga MOLEN MAHAKAN (Masyarakat Online Lapor E-Commerce Nakal)', 0x6c61756e6368696e672d696e6f766173692d6262706f6d2d73616d6172696e64612e6a7067),
('EV004', 'Dapur Kiki Sukses Bertahan Di ', '2020-11-03', 'Jalan AW Syahranie, Gang Kejaksaan, Kelu', 'Industri rumahan di sektor makanan semakin menjamur di Kota Tepian dalam kurun waktu beberapa tahun terakhir. Namun eksistensi para pelaku usaha ini mulai diuji pada tahun 2020. Hampir seluruh dunia sedang diterjang pandemi Covid-19, tak terkecuali Samarinda.\r\n\r\nMereka yang berhasil bertahan rata-rata mampu melakukan inovasi dengan strategi pemasaran yang cukup baik. Salah satunya seperti apa yang dilakukan industri rumahan \"Dapur Kiki\" yang berlokasi di Jalan AW Syahranie, Gang Kejaksaan, Kelurahan Gunung Kelua, Kecamatan Samarinda Ulu.\r\n\r\nPemilik usaha Dapur Kiki, Rizki Maghfira Ardiani menuturkan, sejak pertama berdiri pada tahun 2014 silam, dirinya hanya melayani pemesanan secara daring. Hasilnya, produk yang mereka sajikan, seperti puding dan salad diminati publik Kota Tepian.\r\n\r\n\"Sekarang kan para pengusaha mulai berbondong-bondong beralih ke penjualan secara online. Nah kami curi start duluan, dan hasilnya grafik penjualan kami selalu naik, meskipun tengah diterpa pandemi Covid-19,\" ucap wanita yang akrab disapa Kiki ini, Selasa (3/11/2020).\r\n\r\nMeski banyak pelaku usaha yang beralih ke penjualan secara online, ujar Kiki, pihaknya tidak mengkhawatirkan hal tersebut lantaran telah menyiapkan strategi-strategi khusus. Menurutnya, Dapur Kiki telah menyiapkan berbagai varian baru dan terus berinovasi agar bisa bersaing dengan industri rumahan lainnya.\r\n\r\n\"Contohnya saja dari segi puding. Kami berinovasi dengan menambahkan unsur seni dalam menyiapkan puding ulang tahun. Kalau untuk salad, kami membuatnya seperti tortilla, jadi salad sayur yang sudah kami siapkan akan dibungkus dengan kebab,\" bebernya.\r\n\r\nEksistensi Dapur Kiki diakui oleh Kepala Dinas Perindustrian Kota Samarinda, Muhammad Faisal, saat mengunjungi beberapa lokasi industri rumahan di Samarinda, Selasa (3/11/2020). Bahkan dirinya mengapresiasi industri rumahan Dapur Kiki yang mampu bertahan di tengah pandemi Covid-19.\r\n\r\n\"Dari interview saya kepada mereka, sejak awal pandemi sampai sekarang mereka tidak terdampak sama sekali, bahkan justru terus meningkat penjualannya lantaran sudah melakukan penjualan secara online sejak 6 tahun lalu,\" imbuh Faisal.\r\n\r\nLebih lanjut, Faisal berharap agar industri rumahan di Kota Tepian bisa mencontoh apa yang telah dilakukan oleh Dapur Kiki, lantaran penjualan secara daring merupakan strategi paling efektif untuk bertahan di tengah pandemi Covid-19.', 0x64617075722d6b696b692d73756b7365732d626572746168616e2d64692d736161742d70616e64656d692e6a7067);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ikm`
--

CREATE TABLE `ikm` (
  `kode_industri` int(11) NOT NULL,
  `nama_industri` varchar(30) NOT NULL,
  `nama_pemilik` varchar(30) NOT NULL,
  `kontak` varchar(30) NOT NULL,
  `alamat_industri` text NOT NULL,
  `kode_kecamatan` int(11) NOT NULL,
  `kode_bidang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ikm`
--

INSERT INTO `ikm` (`kode_industri`, `nama_industri`, `nama_pemilik`, `kontak`, `alamat_industri`, `kode_kecamatan`, `kode_bidang`) VALUES
(16211, 'UD Ilham Putra', 'Supiani', '0541645392', 'Jl Cipto Mangunkusumo RT 101', 647210, 17109),
(21022, 'Jamu', 'Rusmini', '0541763428', 'Jl Cendana Gang 7 Nomor 6', 647206, 10750),
(31009, 'Batako', 'M Nur Ihwanura', '0541983265', 'Jl Rapak Indah RT 39', 647208, 20299);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kecamatan`
--

CREATE TABLE `kecamatan` (
  `kode_kecamatan` int(11) NOT NULL,
  `nama_kecamatan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kecamatan`
--

INSERT INTO `kecamatan` (`kode_kecamatan`, `nama_kecamatan`) VALUES
(647201, 'Palaran'),
(647202, 'Samarinda Sebrang'),
(647203, 'Samarinda Ulu'),
(647204, 'Samarinda Ilir'),
(647205, 'Samarinda Utara'),
(647206, 'Sungai Kunjang'),
(647207, 'Sambutan'),
(647208, 'Sungai Pinang'),
(647209, 'Samarinda Kota'),
(647210, 'Loa Janan Ilir');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`kode_user`);

--
-- Indeks untuk tabel `bidang_ikm`
--
ALTER TABLE `bidang_ikm`
  ADD PRIMARY KEY (`kode_bidang`);

--
-- Indeks untuk tabel `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`kode_event`);

--
-- Indeks untuk tabel `ikm`
--
ALTER TABLE `ikm`
  ADD PRIMARY KEY (`kode_industri`),
  ADD KEY `kode_kecamatan` (`kode_kecamatan`),
  ADD KEY `kode_bidang` (`kode_bidang`);

--
-- Indeks untuk tabel `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`kode_kecamatan`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `ikm`
--
ALTER TABLE `ikm`
  ADD CONSTRAINT `ikm_ibfk_1` FOREIGN KEY (`kode_bidang`) REFERENCES `bidang_ikm` (`kode_bidang`),
  ADD CONSTRAINT `ikm_ibfk_2` FOREIGN KEY (`kode_kecamatan`) REFERENCES `kecamatan` (`kode_kecamatan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
