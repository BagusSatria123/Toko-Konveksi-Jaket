-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Jun 2020 pada 16.06
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `konveksi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_Pemesanan` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `no_telp` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `produk` varchar(10) NOT NULL,
  `kep_produk` varchar(50) NOT NULL,
  `ukuran` varchar(50) NOT NULL,
  `jumlah` int(50) NOT NULL,
  `gambar` varchar(255) CHARACTER SET latin1 NOT NULL,
  `pesan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pemesanan`
--

INSERT INTO `pemesanan` (`id_Pemesanan`, `nama`, `no_telp`, `alamat`, `produk`, `kep_produk`, `ukuran`, `jumlah`, `gambar`, `pesan`) VALUES
(1, 'Eko', '0815555555555', 'JL telo', 'Jaket Kuli', 'jaket', 'S', 10, '', 'saya pesan'),
(2, 'Eko', '0815555555555', 'JL telo', 'Jaket Kuli', 'jaket', 'S', 10, ' . ', 'saya pesan'),
(3, 'admin', '01920391209', 'jl eko', 'jaket', 'beli', 'S', 10, 'kosong.JPG', 'saya'),
(4, 'agsal23', '01920391209', 'jl tahuu', '2', 'Pesan', 'S', 10, 'akowkaowk.JPG', 'pesan ya'),
(5, 'agsal12', '01920391209', 'jl eko11', '3', 'beli', 'S', 10, '2020-03-25-20-37-41_0.png', 'pesan ya'),
(6, 'Agsal Alan Livia', '08132232332', 'JL panjaitan no 10', '2', 'memesan jaket dengan kain merah', 'S', 10, 'merah.JPG', 'Memesan'),
(7, 'Agsal FAP', '081231232112', 'JL Panjaitan no 1010', '2', 'Jaket warna merah dengan Kain katun', 'S', 100, 'merah.JPG', 'Memesan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_belikain`
--

CREATE TABLE `t_belikain` (
  `beli_nofak` varchar(15) NOT NULL,
  `beli_rencana_kode` varchar(15) NOT NULL,
  `beli_tanggal` date NOT NULL,
  `beli_user_id` int(11) NOT NULL,
  `beli_kode` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_belikain`
--

INSERT INTO `t_belikain` (`beli_nofak`, `beli_rencana_kode`, `beli_tanggal`, `beli_user_id`, `beli_kode`) VALUES
('N0001', 'KRC0001', '2019-07-23', 1, 'BL0001'),
('N0002', 'KRC0002', '2019-07-25', 1, 'BL0002'),
('N0003', 'KRC0003', '2019-07-26', 1, 'BL0003'),
('N0004', 'KRC0004', '2019-07-27', 1, 'BL0004'),
('N0004', 'KRC0005', '2019-07-28', 1, 'BL0005'),
('N0005', 'KRC0006', '2019-07-29', 1, 'BL0006'),
('N0006', 'KRC0007', '2019-07-27', 1, 'BL0007'),
('z', 'KRC0008', '2019-07-26', 1, 'BL0008');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_belikain_detail`
--

CREATE TABLE `t_belikain_detail` (
  `d_beli_id` int(11) NOT NULL,
  `d_beli_nofak` varchar(15) NOT NULL,
  `d_beli_kain_id` varchar(15) NOT NULL,
  `d_beli_kain_nama` varchar(50) NOT NULL,
  `d_beli_kain_warna` varchar(50) NOT NULL,
  `d_beli_kain_satuan` varchar(50) NOT NULL,
  `d_beli_harga` double NOT NULL,
  `d_beli_jumlah` int(11) NOT NULL,
  `d_beli_total` double NOT NULL,
  `d_beli_kode` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_belikain_detail`
--

INSERT INTO `t_belikain_detail` (`d_beli_id`, `d_beli_nofak`, `d_beli_kain_id`, `d_beli_kain_nama`, `d_beli_kain_warna`, `d_beli_kain_satuan`, `d_beli_harga`, `d_beli_jumlah`, `d_beli_total`, `d_beli_kode`) VALUES
(1, 'N0001', 'K0001', 'Katun Rami', 'Merah', 'Roll', 2250000, 1, 2250000, 'BL0001'),
(2, 'N0001', 'K0002', 'Katun Rami', 'Kuning', 'Roll', 2250000, 1, 2250000, 'BL0001'),
(3, 'N0002', 'K0003', 'Katun Rami', 'Hijau', 'Roll', 2250000, 1, 2250000, 'BL0002'),
(4, 'N0003', 'K0003', 'Katun Rami', 'Hijau', 'Roll', 2250000, 1, 2250000, 'BL0003'),
(5, 'N0004', 'K0004', 'Katun Rami', 'Biru Muda', 'Roll', 2250000, 1, 2250000, 'BL0004'),
(6, 'N0004', 'K0004', 'Katun Rami', 'Biru Muda', 'Roll', 2250000, 1, 2250000, 'BL0005'),
(7, 'N0005', 'K0005', 'Katun Rami', 'Abu-Abu', 'Roll', 2250000, 1, 2250000, 'BL0006'),
(8, 'N0006', 'K0006', 'Scuba', 'Merah', 'Roll', 1300000, 1, 1300000, 'BL0007');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_jualproduk`
--

CREATE TABLE `t_jualproduk` (
  `jual_nofak` varchar(15) NOT NULL,
  `jual_tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `jual_total` double NOT NULL,
  `jual_bayar` double NOT NULL,
  `jual_kembalian` double NOT NULL,
  `jual_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_jualproduk`
--

INSERT INTO `t_jualproduk` (`jual_nofak`, `jual_tanggal`, `jual_total`, `jual_bayar`, `jual_kembalian`, `jual_user_id`) VALUES
('1206200001', '2020-06-12 13:01:18', 100000, 100100, 100, 1),
('1206200002', '2020-06-12 13:02:02', 100000, 100100, 100, 1),
('1206200003', '2020-06-12 13:06:05', 100000, 1000000, 900000, 1),
('1206200004', '2020-06-12 13:06:47', 100000, 1000000, 900000, 1),
('1206200005', '2020-06-12 13:43:41', 100000, 1000000, 900000, 1),
('1206200006', '2020-06-12 14:02:39', 100000, 1000000, 900000, 121),
('2307190001', '2019-07-23 16:55:45', 3750000, 4000000, 250000, 1),
('2307190002', '2019-07-23 16:59:51', 7500000, 8000000, 500000, 1),
('2407190001', '2019-07-24 16:18:01', 150000, 160000, 10000, 1),
('2607190001', '2019-07-26 07:19:24', 150000, 165000, 15000, 1),
('2607190002', '2019-07-26 07:20:30', 75000, 90000, 15000, 1),
('2607190003', '2019-07-26 09:16:26', 155000, 156000, 1000, 1),
('2607190004', '2019-07-26 09:32:29', 5760000, 6000000, 240000, 1),
('2607190005', '2019-07-26 14:16:29', 375000, 6000000, 5625000, 1),
('2707190001', '2019-07-27 05:20:10', 2400000, 3000000, 600000, 1),
('2807190001', '2019-07-28 07:08:15', 175000, 200000, 25000, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_jualproduk_detail`
--

CREATE TABLE `t_jualproduk_detail` (
  `d_jual_id` int(11) NOT NULL,
  `d_jual_nofak` varchar(15) NOT NULL,
  `d_jual_produk_id` varchar(15) NOT NULL,
  `d_jual_produk_nama` varchar(50) NOT NULL,
  `d_jual_produk_warna` varchar(30) NOT NULL,
  `d_jual_produk_harga` double NOT NULL,
  `d_jual_qty` int(11) NOT NULL,
  `d_jual_diskon` double NOT NULL,
  `d_jual_total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_jualproduk_detail`
--

INSERT INTO `t_jualproduk_detail` (`d_jual_id`, `d_jual_nofak`, `d_jual_produk_id`, `d_jual_produk_nama`, `d_jual_produk_warna`, `d_jual_produk_harga`, `d_jual_qty`, `d_jual_diskon`, `d_jual_total`) VALUES
(1, '2307190001', 'BJ0001', 'Baju Tunik Rami', 'Merah', 75000, 50, 0, 3750000),
(2, '2307190002', 'BJ0002', 'Baju Tunik Rami', 'Kuning', 75000, 100, 0, 7500000),
(3, '2407190001', 'BJ0002', 'Baju Tunik Rami', 'Kuning', 75000, 1, 0, 75000),
(4, '2407190001', 'BJ0001', 'Baju Tunik Rami', 'Merah', 75000, 1, 0, 75000),
(5, '2607190001', 'BJ0002', 'Baju Tunik Rami', 'Kuning', 75000, 1, 0, 75000),
(6, '2607190001', 'BJ0001', 'Baju Tunik Rami', 'Merah', 75000, 1, 0, 75000),
(7, '2607190002', 'BJ0003', 'Baju Tunik Rami', 'Hijau', 75000, 1, 0, 75000),
(8, '2607190003', 'BJ0015', 'Baju Tunik Rami Tangan Serut', 'Abu-Abu', 80000, 1, 0, 80000),
(9, '2607190003', 'BJ0003', 'Baju Tunik Rami', 'Hijau', 75000, 1, 0, 75000),
(10, '2607190004', 'BJ0015', 'Baju Tunik Rami Tangan Serut', 'Abu-Abu', 80000, 72, 0, 5760000),
(11, '2607190005', 'BJ0004', 'Baju Tunik Rami', 'Biru Muda', 75000, 5, 0, 375000),
(12, '2707190001', 'BJ0006', 'Baju Skuba', 'Merah', 60000, 40, 0, 2400000),
(13, '2807190001', 'BJ0006', 'Baju Skuba', 'Merah', 60000, 2, 0, 120000),
(14, '2807190001', 'BJ0003', 'Baju Tunik Rami', 'Hijau', 55000, 1, 0, 55000),
(15, '1206200001', 'BJ0003', 'Almamater', 'Kuning', 100000, 1, 0, 100000),
(16, '1206200002', 'BJ0005', 'Jaket biru', 'Biru', 100000, 1, 0, 100000),
(17, '1206200003', 'BJ0004', 'Batik Seragam', 'Batik Hijau', 100000, 1, 0, 100000),
(18, '1206200004', 'BJ0005', 'Jaket biru', 'Biru', 100000, 1, 0, 100000),
(19, '1206200005', 'BJ0004', 'Batik Seragam', 'Batik Hijau', 100000, 1, 0, 100000),
(20, '1206200006', 'BJ0004', 'Batik Seragam', 'Batik Hijau', 100000, 1, 0, 100000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_kain`
--

CREATE TABLE `t_kain` (
  `kain_id` varchar(15) NOT NULL,
  `kain_nama` varchar(50) NOT NULL,
  `kain_satuan` varchar(50) NOT NULL,
  `kain_harga` double NOT NULL,
  `kain_stok` int(11) DEFAULT NULL,
  `k_warna_id` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_kain`
--

INSERT INTO `t_kain` (`kain_id`, `kain_nama`, `kain_satuan`, `kain_harga`, `kain_stok`, `k_warna_id`) VALUES
('BB0026', 'Kancing Plastik L4 1.5 CM', 'Pack', 10000, 0, 'W0001'),
('BB0027', 'Kancing Plastik L4 1.5 CM', 'Pack', 10000, 0, 'W0002'),
('BB0028', 'Kancing Plastik L4 1.5 CM', 'Pack', 10000, 0, 'W0003'),
('BB0029', 'Kancing Plastik L4 1.5 CM', 'Pack', 10000, 0, 'W0004'),
('BB0030', 'Kancing Plastik L4 1.5 CM', 'Pack', 10000, 0, 'W0005'),
('BB0031', 'Kancing Kayu L4 25 MM', 'Pack', 22000, 0, 'W0006'),
('BB0032', 'Resleting Jepang FCC 25 CM', 'Lusin', 8000, 0, 'W0001'),
('BB0033', 'Resleting Jepang FCC 25 CM', 'Lusin', 80000, 0, 'W0002'),
('BB0034', 'Resleting Jepang FCC 25 CM', 'Lusin', 8000, 0, 'W0003'),
('BB0035', 'Resleting Jepang FCC 25 CM', 'Lusin', 8000, 0, 'W0004'),
('BB0036', 'Resleting Jepang FCC 25 CM', 'Lusin', 8000, 0, 'W0005'),
('BB0037', 'Benang Obras 1001', 'Lusin', 50000, 0, 'W0001'),
('BB0038', 'Benang Obras 1001', 'Lusin', 50000, 0, 'W0002'),
('BB0039', 'Benang Obras 1001', 'Lusin', 50000, 0, 'W0003'),
('BB0040', 'Benang Obras 1001', 'Lusin', 50000, 0, 'W0004'),
('BB0041', 'Benang Obras 1001', 'Lusin', 50000, 0, 'W0005'),
('BB0042', 'Benang Jahit 500Y', 'Lusin', 22000, 0, 'W0001'),
('BB0043', 'Benang Jahit 500Y', 'Lusin', 22000, 0, 'W0002'),
('BB0044', 'Benang Jahit 500Y', 'Lusin', 22000, 0, 'W0003'),
('BB0045', 'Benang Jahit 500Y', 'Lusin', 22000, 0, 'W0004'),
('BB0046', 'Benang Jahit 500Y', 'Lusin', 22000, 0, 'W0005'),
('BB0047', 'Emblem Gambar Wanita', 'Lusin', 15000, 0, 'W0007'),
('BB0048', 'Katun Combat', 'Roll', 1000000, 0, 'W0002'),
('BB0049', 'Katun Halus', 'Lusin', 100000, 0, 'W0001'),
('BB0050', 'Katun Halus Sekali', 'Lusin', 99999, 0, 'W0008'),
('K0001', 'Kain Katun Rami', 'Roll', 1200000, 0, 'W0001'),
('K0002', 'Kain Katun Rami', 'Roll', 1200000, 0, 'W0002'),
('K0003', 'Kain Katun Rami', 'Roll', 1200000, 0, 'W0003'),
('K0004', 'Kain Katun Rami', 'Roll', 1200000, 0, 'W0004'),
('K0005', 'Kain Katun Rami', 'Roll', 1200000, 0, 'W0005'),
('K0006', 'Kain Scuba', 'Roll', 1300000, 0, 'W0001'),
('K0007', 'Kain Scuba', 'Roll', 1300000, 0, 'W0002'),
('K0008', 'Kain Scuba', 'Roll', 1300000, 0, 'W0003'),
('K0009', 'Kain Scuba', 'Roll', 1300000, 0, 'W0004'),
('K0010', 'Kain Scuba', 'Roll', 1300000, 0, 'W0005'),
('K0011', 'Kain Wollycrepe', 'Roll', 1250000, 0, 'W0001'),
('K0012', 'Kain Wollycrepe', 'Roll', 1250000, 0, 'W0002'),
('K0013', 'Kain Wollycrepe', 'Roll', 1250000, 0, 'W0003'),
('K0014', 'Kain Wollycrepe', 'Roll', 1250000, 0, 'W0004'),
('K0015', 'Kain Wollycrepe', 'Roll', 1250000, 0, 'W0005'),
('K0016', 'Kain Cotton Combed', 'Roll', 1300000, 0, 'W0001'),
('K0017', 'Kain Cotton Combed', 'Roll', 1300000, 0, 'W0002'),
('K0018', 'Kain Cotton Combed', 'Roll', 1300000, 0, 'W0003'),
('K0019', 'Kain Cotton Combed', 'Roll', 1300000, 0, 'W0004'),
('K0020', 'Kain Cotton Combed', 'Roll', 1300000, 0, 'W0005'),
('K0021', 'Kain Linen', 'Roll', 1400000, 0, 'W0001'),
('K0022', 'Kain Linen', 'Roll', 1400000, 0, 'W0002'),
('K0023', 'Kain Linen', 'Roll', 1400000, 0, 'W0003'),
('K0024', 'Kain Linen', 'Roll', 1400000, 0, 'W0004'),
('K0025', 'Kain Linen', 'Roll', 1400000, 0, 'W0005');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_kain_warna`
--

CREATE TABLE `t_kain_warna` (
  `warna_id` varchar(15) NOT NULL,
  `warna_nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_kain_warna`
--

INSERT INTO `t_kain_warna` (`warna_id`, `warna_nama`) VALUES
('W0001', 'Merah'),
('W0002', 'Kuning'),
('W0003', 'Hijau'),
('W0004', 'Biru Muda'),
('W0005', 'Abu-Abu'),
('W0006', 'Coklat'),
('W0007', 'Mix'),
('W0008', 'Kuning kelabu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_produkbaju`
--

CREATE TABLE `t_produkbaju` (
  `produk_id` varchar(15) NOT NULL,
  `produk_nama` varchar(50) NOT NULL,
  `produk_warna` varchar(255) NOT NULL,
  `produk_deskripsi` text NOT NULL,
  `produk_harga` double NOT NULL,
  `produk_stok` int(11) DEFAULT '0',
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_produkbaju`
--

INSERT INTO `t_produkbaju` (`produk_id`, `produk_nama`, `produk_warna`, `produk_deskripsi`, `produk_harga`, `produk_stok`, `gambar`) VALUES
('BJ0003', 'Almamater', 'Kuning', 'Almamater kuning wisnu', 100000, 9, 'BJ0003.JPG'),
('BJ0004', 'Batik Seragam', 'Batik Hijau', 'Batik Hijau Untuk Seragam', 100000, 97, 'BJ0004.JPG'),
('BJ0005', 'Jaket biru', 'Biru', 'Jaket kain warna biru', 100000, 998, 'BJ0005.JPG'),
('BJ0006', 'Jaket Merah', 'Merah', 'Kain Halus', 120000, 0, 'BJ0006.JPG'),
('BJ0007', 'Jaket Marah', 'Biru', 'Jaket Halus Katun', 122222, 0, 'BJ0007.JPG');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_rencanabaru`
--

CREATE TABLE `t_rencanabaru` (
  `rencana_kode` varchar(15) NOT NULL,
  `r_produk_id` varchar(15) NOT NULL,
  `rencana_jumlah` int(11) NOT NULL,
  `tgl_mulai` date NOT NULL,
  `perkiraan_selesai` date NOT NULL,
  `keterangan` text,
  `rencana_total` double NOT NULL,
  `r_user_id` int(11) NOT NULL,
  `rencana_status` int(11) DEFAULT NULL,
  `tgl_selesai` date DEFAULT NULL,
  `hasil_jumlah` int(11) DEFAULT NULL,
  `validasi_selesai` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_rencanabaru`
--

INSERT INTO `t_rencanabaru` (`rencana_kode`, `r_produk_id`, `rencana_jumlah`, `tgl_mulai`, `perkiraan_selesai`, `keterangan`, `rencana_total`, `r_user_id`, `rencana_status`, `tgl_selesai`, `hasil_jumlah`, `validasi_selesai`) VALUES
('KRC0001', 'BJ0001', 100, '2019-07-23', '2019-07-24', '', 4500000, 1, 2, '2019-07-24', 100, 1),
('KRC0002', 'BJ0002', 200, '2019-07-25', '2019-07-26', '', 2250000, 1, 2, '2019-07-26', 200, 1),
('KRC0003', 'BJ0003', 70, '2019-07-26', '2019-07-27', '', 2250000, 1, 2, '2019-07-28', 66, 1),
('KRC0004', 'BJ0015', 72, '2019-07-27', '2019-07-28', '', 2250000, 1, 2, '0000-00-00', 73, 1),
('KRC0005', 'BJ0004', 80, '2019-07-28', '2019-07-29', '', 2250000, 1, 2, '2019-07-29', 75, 1),
('KRC0006', 'BJ0014', 40, '2019-07-29', '2019-07-30', '', 2250000, 1, 2, '2019-07-30', 41, 1),
('KRC0007', 'BJ0006', 40, '2019-07-27', '2019-07-28', '', 1300000, 1, 2, '2019-07-30', 40, 1),
('KRC0008', 'BJ0006', 40, '2019-07-27', '2019-07-30', '', 1200000, 2, 2, '2019-07-31', 100, 1),
('KRC0009', 'BJ0006', 12, '2019-07-29', '2019-07-30', '', 2400000, 2, 2, '2019-07-31', 200, 1),
('KRC0010', 'BJ0004', 13, '2019-07-29', '2019-07-30', '', 2696000, 2, 2, '2019-07-31', 13, 1),
('KRC0011', 'BJ0006', 43, '2019-07-30', '2019-07-29', '', 2400000, 2, 2, '2019-07-31', 43, 1),
('KRC0012', 'BJ0001', 22, '2019-07-29', '2019-07-31', '', 3600000, 2, 2, '2019-07-31', 22, 1),
('KRC0013', 'BJ0002', 23, '2019-07-28', '2019-07-31', '', 1200000, 2, 2, '2019-07-31', 23, 1),
('KRC0014', 'BJ0006', 14, '2019-07-28', '2019-07-29', '', 1220000, 2, 2, '2019-07-31', 14, 1),
('KRC0015', 'BJ0011', 45, '2019-07-28', '2019-07-30', '', 10000, 2, 2, '2019-07-31', 45, 1),
('KRC0016', 'BJ0004', 90, '2019-07-28', '2019-07-31', '', 1200000, 2, 2, '2019-07-31', 90, 1),
('KRC0017', 'BJ0011', 10, '2019-07-28', '2019-07-30', '', 10000, 2, 2, '2019-07-31', 10, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_rencanabaru_detail`
--

CREATE TABLE `t_rencanabaru_detail` (
  `d_rencana_id` int(11) NOT NULL,
  `d_rencana_kode` varchar(15) NOT NULL,
  `d_rencana_kain_id` varchar(15) NOT NULL,
  `d_rencana_kain_nama` varchar(50) NOT NULL,
  `d_rencana_kain_warna` varchar(20) NOT NULL,
  `d_rencana_kain_satuan` varchar(20) NOT NULL,
  `d_rencana_harga` double NOT NULL,
  `d_rencana_jumlah` int(11) NOT NULL,
  `d_rencana_total` double NOT NULL,
  `d_rencana_status` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_rencanabaru_detail`
--

INSERT INTO `t_rencanabaru_detail` (`d_rencana_id`, `d_rencana_kode`, `d_rencana_kain_id`, `d_rencana_kain_nama`, `d_rencana_kain_warna`, `d_rencana_kain_satuan`, `d_rencana_harga`, `d_rencana_jumlah`, `d_rencana_total`, `d_rencana_status`) VALUES
(1, 'KRC0001', 'K0001', 'Katun Rami', 'Merah', 'Roll', 2250000, 1, 2250000, 1),
(2, 'KRC0001', 'K0002', 'Katun Rami', 'Kuning', 'Roll', 2250000, 1, 2250000, 1),
(3, 'KRC0002', 'K0003', 'Katun Rami', 'Hijau', 'Roll', 2250000, 1, 2250000, 1),
(4, 'KRC0003', 'K0003', 'Katun Rami', 'Hijau', 'Roll', 2250000, 1, 2250000, 1),
(5, 'KRC0004', 'K0004', 'Katun Rami', 'Biru Muda', 'Roll', 2250000, 1, 2250000, 1),
(6, 'KRC0005', 'K0005', 'Katun Rami', 'Abu-Abu', 'Roll', 2250000, 1, 2250000, 1),
(7, 'KRC0006', 'K0005', 'Katun Rami', 'Abu-Abu', 'Roll', 2250000, 1, 2250000, 1),
(8, 'KRC0007', 'K0006', 'Scuba', 'Merah', 'Roll', 1300000, 1, 1300000, 1),
(9, 'KRC0008', 'K0001', 'Katun Rami', 'Merah', 'Roll', 1200000, 1, 1200000, 1),
(10, 'KRC0009', 'K0001', 'Kain Katun Rami', 'Merah', 'Roll', 1200000, 1, 1200000, 1),
(11, 'KRC0009', 'K0002', 'Kain Katun Rami', 'Kuning', 'Roll', 1200000, 1, 1200000, 1),
(12, 'KRC0010', 'K0001', 'Kain Katun Rami', 'Merah', 'Roll', 1200000, 1, 1200000, 1),
(13, 'KRC0010', 'K0002', 'Kain Katun Rami', 'Kuning', 'Roll', 1200000, 1, 1200000, 1),
(14, 'KRC0010', 'BB0045', 'Benang Jahit 500Y', 'Biru Muda', 'Lusin', 22000, 1, 22000, 1),
(15, 'KRC0010', 'BB0031', 'Kancing Kayu L4 25 MM', 'Coklat', 'Pack', 22000, 12, 264000, 1),
(16, 'KRC0010', 'BB0026', 'Kancing Plastik L4 1.5 CM', 'Merah', 'Pack', 10000, 1, 10000, 1),
(17, 'KRC0011', 'K0001', 'Kain Katun Rami', 'Merah', 'Roll', 1200000, 1, 1200000, 1),
(18, 'KRC0011', 'K0002', 'Kain Katun Rami', 'Kuning', 'Roll', 1200000, 1, 1200000, 1),
(19, 'KRC0012', 'K0002', 'Kain Katun Rami', 'Kuning', 'Roll', 1200000, 1, 1200000, 1),
(20, 'KRC0012', 'K0003', 'Kain Katun Rami', 'Hijau', 'Roll', 1200000, 2, 2400000, 1),
(21, 'KRC0013', 'K0001', 'Kain Katun Rami', 'Merah', 'Roll', 1200000, 1, 1200000, 1),
(22, 'KRC0014', 'K0002', 'Kain Katun Rami', 'Kuning', 'Roll', 1200000, 1, 1200000, 1),
(23, 'KRC0014', 'BB0026', 'Kancing Plastik L4 1.5 CM', 'Merah', 'Pack', 10000, 2, 20000, 1),
(24, 'KRC0015', 'BB0026', 'Kancing Plastik L4 1.5 CM', 'Merah', 'Pack', 10000, 1, 10000, 1),
(25, 'KRC0016', 'K0001', 'Kain Katun Rami', 'Merah', 'Roll', 1200000, 1, 1200000, 1),
(26, 'KRC0017', 'BB0030', 'Kancing Plastik L4 1.5 CM', 'Abu-Abu', 'Pack', 10000, 1, 10000, 1),
(27, '', 'BB0026', 'Kancing Plastik L4 1.5 CM', 'Merah', 'Pack', 100000, 10, 1000000, 0),
(28, '', 'BB0026', 'Kancing Plastik L4 1.5 CM', 'Merah', 'Pack', 100000, 10, 1000000, 0),
(29, '', 'BB0026', 'Kancing Plastik L4 1.5 CM', 'Merah', 'Pack', 100000, 10, 1000000, 0),
(30, '', 'BB0026', 'Kancing Plastik L4 1.5 CM', 'Merah', 'Pack', 100000, 10, 1000000, 0),
(31, '', 'BB0026', 'Kancing Plastik L4 1.5 CM', 'Merah', 'Pack', 100000, 1, 100000, 0),
(32, '', 'BB0026', 'Kancing Plastik L4 1.5 CM', 'Merah', 'Pack', 10000, 1, 10000, 0),
(33, '', 'BB0026', 'Kancing Plastik L4 1.5 CM', 'Merah', 'Pack', 10000, 1, 10000, 0),
(34, '', 'BB0026', 'Kancing Plastik L4 1.5 CM', 'Merah', 'Pack', 10000, 1, 10000, 0),
(35, '', 'BB0026', 'Kancing Plastik L4 1.5 CM', 'Merah', 'Pack', 10000, 1, 10000, 0),
(36, '', 'BB0027', 'Kancing Plastik L4 1.5 CM', 'Kuning', 'Pack', 0, 0, 0, 0),
(37, '', 'BB0027', 'Kancing Plastik L4 1.5 CM', 'Kuning', 'Pack', 111111, 0, 0, 0),
(38, '', 'BB0027', 'Kancing Plastik L4 1.5 CM', 'Kuning', 'Pack', 111111, 1, 111111, 0),
(39, '', 'BB0027', 'Kancing Plastik L4 1.5 CM', 'Kuning', 'Pack', 111111, 1, 111111, 0),
(40, '', 'BB0027', 'Kancing Plastik L4 1.5 CM', 'Kuning', 'Pack', 111111, 1, 111111, 0),
(41, '', 'BB0027', 'Kancing Plastik L4 1.5 CM', 'Kuning', 'Pack', 111111, 10, 1111110, 0),
(42, '', 'BB0027', 'Kancing Plastik L4 1.5 CM', 'Kuning', 'Pack', 111111, 10, 1111110, 0),
(43, '', 'BB0027', 'Kancing Plastik L4 1.5 CM', 'Kuning', 'Pack', 111111, 10, 1111110, 0),
(44, '', 'BB0027', 'Kancing Plastik L4 1.5 CM', 'Kuning', 'Pack', 111111, 10, 1111110, 0),
(45, '', 'BB0027', 'Kancing Plastik L4 1.5 CM', 'Kuning', 'Pack', 111111, 10, 1111110, 0),
(46, '', 'BB0026', 'Kancing Plastik L4 1.5 CM', 'Merah', 'Pack', 10000, 1, 10000, 0),
(47, '', 'BB0035', 'Resleting Jepang FCC 25 CM', 'Biru Muda', 'Lusin', 11111, 1, 11111, 0),
(48, '', 'BB0026', 'Kancing Plastik L4 1.5 CM', 'Merah', 'Pack', 10000, 1, 10000, 0),
(49, '', 'BB0026', 'Kancing Plastik L4 1.5 CM', 'Merah', 'Pack', 10000, 1, 10000, 0),
(50, '', 'BB0026', 'Kancing Plastik L4 1.5 CM', 'Merah', 'Pack', 10000, 1, 10000, 0),
(51, '', 'BB0026', 'Kancing Plastik L4 1.5 CM', 'Merah', 'Pack', 10000, 1, 10000, 0),
(52, '', 'BB0026', 'Kancing Plastik L4 1.5 CM', 'Merah', 'Pack', 10000, 1, 10000, 0),
(53, '', 'BB0026', 'Kancing Plastik L4 1.5 CM', 'Merah', 'Pack', 10000, 1, 10000, 0),
(54, '', 'BB0026', 'Kancing Plastik L4 1.5 CM', 'Merah', 'Pack', 10000, 4, 40000, 0),
(55, '', 'BB0026', 'Kancing Plastik L4 1.5 CM', 'Merah', 'Pack', 10000, 4, 40000, 0),
(56, '', 'BB0026', 'Kancing Plastik L4 1.5 CM', 'Merah', 'Pack', 10000, 4, 40000, 0),
(57, '', 'BB0026', 'Kancing Plastik L4 1.5 CM', 'Merah', 'Pack', 10000, 4, 40000, 0),
(58, '', 'BB0026', 'Kancing Plastik L4 1.5 CM', 'Merah', 'Pack', 1000, 4, 4000, 0),
(59, '', 'BB0026', 'Kancing Plastik L4 1.5 CM', 'Merah', 'Pack', 1000, 4, 4000, 0),
(60, '', 'BB0026', 'Kancing Plastik L4 1.5 CM', 'Merah', 'Pack', 1000, 4, 4000, 0),
(61, '', 'BB0026', 'Kancing Plastik L4 1.5 CM', 'Merah', 'Pack', 1000, 4, 4000, 0),
(62, '', 'BB0026', 'Kancing Plastik L4 1.5 CM', 'Merah', 'Pack', 1000, 4, 4000, 0),
(63, '', 'BB0026', 'Kancing Plastik L4 1.5 CM', 'Merah', 'Pack', 1000, 4, 4000, 0),
(64, '', 'BB0026', 'Kancing Plastik L4 1.5 CM', 'Merah', 'Pack', 1000, 4, 4000, 0),
(65, '', 'BB0026', 'Kancing Plastik L4 1.5 CM', 'Merah', 'Pack', 1000, 4, 4000, 0),
(66, '', 'BB0026', 'Kancing Plastik L4 1.5 CM', 'Merah', 'Pack', 1000, 4, 4000, 0),
(67, '', 'BB0026', 'Kancing Plastik L4 1.5 CM', 'Merah', 'Pack', 1000, 4, 4000, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_user`
--

CREATE TABLE `t_user` (
  `user_id` int(11) NOT NULL,
  `user_nama` varchar(35) DEFAULT NULL,
  `user_username` varchar(30) DEFAULT NULL,
  `user_password` varchar(35) DEFAULT NULL,
  `user_level` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_user`
--

INSERT INTO `t_user` (`user_id`, `user_nama`, `user_username`, `user_password`, `user_level`) VALUES
(1, 'Agsal FA', 'admin', '21232f297a57a5a743894a0e4a801fc3', '1'),
(4, 'Meghan', 'meghan', '81dc9bdb52d04dc20036dbd8313ed055', '3'),
(5, 'agsal', 'agsal', 'cc416e885e44f8645dfa69c4eeaad3df', '2'),
(110, 'agsal23', 'agsal23', '202cb962ac59075b964b07152d234b70', '3'),
(111, 'agsal12', 'agsal12', '202cb962ac59075b964b07152d234b70', '3'),
(112, 'agsal23', 'agsal', '81dc9bdb52d04dc20036dbd8313ed055', '3'),
(113, 'agsalae', 'agsalfk', '81dc9bdb52d04dc20036dbd8313ed055', '3'),
(114, 'agsalae', 'agsal12', '81dc9bdb52d04dc20036dbd8313ed055', '3'),
(115, 'agsalaa', 'agsal0', '81dc9bdb52d04dc20036dbd8313ed055', '3'),
(116, 'agsal yooo', 'agsal90', '81dc9bdb52d04dc20036dbd8313ed055', '3'),
(117, 'sulis', 'admin1', 'e00cf25ad42683b3df678c61f42c6bda', '1'),
(118, 'Agsal Fairrohmad', 'agsalf', '81dc9bdb52d04dc20036dbd8313ed055', '3'),
(119, 'livia', 'alan', '81dc9bdb52d04dc20036dbd8313ed055', '3'),
(121, 'livia', 'livia11', '827ccb0eea8a706c4c34a16891f84e7b', '1');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_Pemesanan`);

--
-- Indeks untuk tabel `t_belikain`
--
ALTER TABLE `t_belikain`
  ADD PRIMARY KEY (`beli_kode`);

--
-- Indeks untuk tabel `t_belikain_detail`
--
ALTER TABLE `t_belikain_detail`
  ADD PRIMARY KEY (`d_beli_id`);

--
-- Indeks untuk tabel `t_jualproduk`
--
ALTER TABLE `t_jualproduk`
  ADD PRIMARY KEY (`jual_nofak`);

--
-- Indeks untuk tabel `t_jualproduk_detail`
--
ALTER TABLE `t_jualproduk_detail`
  ADD PRIMARY KEY (`d_jual_id`);

--
-- Indeks untuk tabel `t_kain`
--
ALTER TABLE `t_kain`
  ADD PRIMARY KEY (`kain_id`);

--
-- Indeks untuk tabel `t_kain_warna`
--
ALTER TABLE `t_kain_warna`
  ADD PRIMARY KEY (`warna_id`);

--
-- Indeks untuk tabel `t_produkbaju`
--
ALTER TABLE `t_produkbaju`
  ADD PRIMARY KEY (`produk_id`);

--
-- Indeks untuk tabel `t_rencanabaru`
--
ALTER TABLE `t_rencanabaru`
  ADD PRIMARY KEY (`rencana_kode`);

--
-- Indeks untuk tabel `t_rencanabaru_detail`
--
ALTER TABLE `t_rencanabaru_detail`
  ADD PRIMARY KEY (`d_rencana_id`);

--
-- Indeks untuk tabel `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_Pemesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `t_belikain_detail`
--
ALTER TABLE `t_belikain_detail`
  MODIFY `d_beli_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `t_jualproduk_detail`
--
ALTER TABLE `t_jualproduk_detail`
  MODIFY `d_jual_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `t_rencanabaru_detail`
--
ALTER TABLE `t_rencanabaru_detail`
  MODIFY `d_rencana_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT untuk tabel `t_user`
--
ALTER TABLE `t_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
