-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 21 Bulan Mei 2020 pada 14.09
-- Versi server: 8.0.18
-- Versi PHP: 7.3.11

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
  `id_pemesanan` int(11) NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `no_telp` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `alamat` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `produk` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `kep_produk` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `ukuran` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `jumlah` int(50) NOT NULL,
  `gambar` text COLLATE utf8mb4_general_ci NOT NULL,
  `pesan` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

INSERT INTO `t_jualproduk` (`jual_nofak`, `jual_total`, `jual_bayar`, `jual_kembalian`, `jual_user_id`) VALUES
('2307190001', 3750000, 4000000, 250000, 1),
('2307190002', 7500000, 8000000, 500000, 1),
('2407190001', 150000, 160000, 10000, 1),
('2607190001', 150000, 165000, 15000, 1),
('2607190002', 75000, 90000, 15000, 1),
('2607190003', 155000, 156000, 1000, 1),
('2607190004', 5760000, 6000000, 240000, 1),
('2607190005', 375000, 6000000, 5625000, 1),
('2707190001', 2400000, 3000000, 600000, 1),
('2807190001', 175000, 200000, 25000, 1);

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
(14, '2807190001', 'BJ0003', 'Baju Tunik Rami', 'Hijau', 55000, 1, 0, 55000);

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
('W0007', 'Mix');

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
('BJ0001', 'Baju Tunik Rami', 'Pink', 'Baju yang dibuat dengan kain Katun, Tangan Panjang', 55000, 70, 'BJ0001.jpg'),
('BJ0002', 'Baju Tunik Rami', 'Kuning', 'Baju yang dibuat dengan kain Katun, Tangan Panjang', 55000, 121, 'BJ0002.jpg'),
('BJ0003', 'Baju Tunik Rami', 'Hijau', 'Baju yang dibuat dengan kain Katun, Tangan Panjang', 55000, 63, 'BJ0003.jpg'),
('BJ0004', 'Baju Tunik Rami', 'Biru Muda', 'Baju yang dibuat dengan kain Katun, Tangan Panjang', 55000, 173, 'BJ0004.jpg'),
('BJ0005', 'Baju Tunik Rami', 'Abu-Abu', 'Baju yang dibuat dengan kain Katun, Tangan Panjang', 55000, 0, 'BJ0005.jpg'),
('BJ0006', 'Baju Skuba', 'Merah', 'Baju tangan panjang dengan saku dibawah kanan', 60000, 355, 'BJ0006.jpg'),
('BJ0007', 'Baju Skuba', 'Kuning', 'Baju tangan panjang dengan saku dibawah kanan', 60000, 0, 'BJ0007.jpg'),
('BJ0008', 'Baju Skuba', 'Hijau', 'Baju tangan panjang dengan saku dibawah kanan', 60000, 0, 'BJ0008.jpg'),
('BJ0009', 'Baju Skuba', 'Biru Muda', 'Baju tangan panjang dengan saku dibawah kanan', 60000, 0, 'BJ0009.jpg'),
('BJ0010', 'Baju Skuba', 'Abu-Abu', 'Baju tangan panjang dengan saku dibawah kanan', 60000, 0, 'BJ0010.jpg'),
('BJ0011', 'Baju Tunik Rami Tangan Serut', 'Kuning', 'Baju yang dibuat dengan kain Katun, dengan tangan mengerucut', 65000, 55, 'BJ0011.jpg'),
('BJ0012', 'Baju Tunik Rami Tangan Serut', 'Merah', 'Baju yang dibuat dengan kain Katun, dengan tangan mengerucut', 65000, 0, 'default.jpg'),
('BJ0013', 'Baju Tunik Rami Tangan Serut', 'Hijau', 'Baju yang dibuat dengan kain Katun, dengan tangan mengerucut', 65000, 0, 'default.jpg'),
('BJ0014', 'Baju Tunik Rami Tangan Serut', 'Biru Muda', 'Baju yang dibuat dengan kain Katun, dengan tangan mengerucut', 65000, 41, 'default.jpg'),
('BJ0015', 'Baju Tunik Rami Tangan Serut', 'Abu-Abu', 'Baju yang dibuat dengan kain Katun, dengan tangan mengerucut', 65000, 0, 'default.jpg'),
('BJ0016', 'Tunik Sabyan', 'Merah', 'Baju tunik sabyan', 50000, 0, 'default.jpg'),
('BJ0017', 'Tunik Sabyan', 'Kuning', 'Baju tunik sabyan', 60000, 0, 'default.jpg'),
('BJ0018', 'Tunik Sabyan', 'Hijau', 'Baju tunik sabyan', 60000, 0, 'default.jpg'),
('BJ0019', 'Tunik Sabyan', 'Biru Muda', 'Baju tunik sabyan', 60000, 0, 'default.jpg'),
('BJ0020', 'Tunik Sabyan', 'Abu-Abu', 'Baju tunik sabyan', 60000, 0, 'default.jpg'),
('BJ0021', 'Katun Salur', 'Merah', 'Baju Katun salur', 65000, 0, 'default.jpg'),
('BJ0022', 'Katun Salur', 'Kuning', 'Baju Katun salur', 65000, 0, 'default.jpg'),
('BJ0023', 'Katun Salur', 'Hijau', 'Baju Katun salur', 65000, 0, 'default.jpg'),
('BJ0024', 'Katun Salur', 'Biru Muda', 'Baju Katun salur', 65000, 0, 'default.jpg'),
('BJ0025', 'Katun Salur', 'Abu-Abu', 'Baju Katun salur', 65000, 0, 'default.jpg');

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
(26, 'KRC0017', 'BB0030', 'Kancing Plastik L4 1.5 CM', 'Abu-Abu', 'Pack', 10000, 1, 10000, 1);

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
(1, 'Muhammad Nur Huda', 'admin', '21232f297a57a5a743894a0e4a801fc3', '1'),
(2, 'H. Ismail', 'pemilik', '58399557dae3c60e23c78606771dfa3d', '2'),
(3, 'Penjahit', 'penjahit', '1cd787242ff674e6e5b47f93159f9564', '3'),
(4, 'Livia', 'admin', '202cb962ac59075b964b07152d234b70', '3'),
(5, 'Livia', 'livia', '57dc918daf619fb0f4b84560b1d419a2', '3');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`);

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
  MODIFY `id_pemesanan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `t_belikain_detail`
--
ALTER TABLE `t_belikain_detail`
  MODIFY `d_beli_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `t_jualproduk_detail`
--
ALTER TABLE `t_jualproduk_detail`
  MODIFY `d_jual_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `t_rencanabaru_detail`
--
ALTER TABLE `t_rencanabaru_detail`
  MODIFY `d_rencana_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `t_user`
--
ALTER TABLE `t_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
