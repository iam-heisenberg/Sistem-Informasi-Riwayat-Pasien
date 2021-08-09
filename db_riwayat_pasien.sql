-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2021 at 07:54 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_riwayat_pasien`
--

-- --------------------------------------------------------

--
-- Table structure for table `antrian`
--

CREATE TABLE `antrian` (
  `id_antrian` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `modes` int(11) NOT NULL,
  `jam_datang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `antrian`
--

INSERT INTO `antrian` (`id_antrian`, `id_pasien`, `modes`, `jam_datang`) VALUES
(50, 38, 0, 94818),
(51, 38, 0, 92449),
(52, 36, 0, 93149),
(53, 39, 0, 93449),
(54, 39, 0, 74123),
(55, 38, 0, 74034),
(56, 38, 0, 73236),
(57, 40, 0, 65949),
(58, 40, 0, 62658),
(59, 40, 0, 71214),
(60, 40, 0, 84133),
(61, 0, 1, 81335),
(62, 0, 1, 81736),
(63, 40, 0, 83037),
(64, 40, 0, 82440),
(65, 40, 0, 85543),
(66, 40, 0, 84544),
(67, 40, 0, 84544),
(68, 45, 1, 84544),
(69, 40, 0, 83348),
(70, 38, 0, 84748),
(71, 36, 0, 85348),
(72, 36, 0, 85548),
(73, 38, 0, 82451),
(74, 40, 0, 82951),
(75, 36, 0, 83451),
(76, 40, 0, 84544),
(77, 40, 0, 80455),
(78, 38, 0, 125917),
(79, 40, 0, 85725);

-- --------------------------------------------------------

--
-- Table structure for table `jenis_obat`
--

CREATE TABLE `jenis_obat` (
  `jenis_obat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_obat`
--

INSERT INTO `jenis_obat` (`jenis_obat`) VALUES
('Capsule'),
('Injeksi'),
('Obat Oral'),
('Salep'),
('Sirup'),
('Suppositoria'),
('Suspensi'),
('Tablet');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_obat`
--

CREATE TABLE `kategori_obat` (
  `kategori_obat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori_obat`
--

INSERT INTO `kategori_obat` (`kategori_obat`) VALUES
('Anti Alergi'),
('Anti Asma'),
('Anti Depresan'),
('Anti Diabetes'),
('Anti Diare'),
('Anti Dyspepsia'),
('Anti Hipertensi '),
('Anti Jamur'),
('Anti Virus'),
('Antibiotik'),
('Antifungal'),
('Antihistamine'),
('Antimetik'),
('Antipiretik'),
('Antripiretik'),
('Nsaid'),
('Pelancar BAB '),
('Saluran Pencernaan '),
('Vertigo'),
('Vitamin');

-- --------------------------------------------------------

--
-- Table structure for table `kelas_obat`
--

CREATE TABLE `kelas_obat` (
  `id_kelasObat` int(11) NOT NULL,
  `kategori_obat` varchar(255) NOT NULL,
  `jenis_obat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas_obat`
--

INSERT INTO `kelas_obat` (`id_kelasObat`, `kategori_obat`, `jenis_obat`) VALUES
(201819, 'Antibiotik', 'Tetes Mata'),
(1051125, 'Antibiotik', 'Tetes Mata'),
(1051126, 'Antimetik', 'Salep'),
(1051127, 'Antimetik', 'Salep'),
(3300651, 'Vertigo', 'Tablet'),
(3300712, 'Vertigo', 'Tablet'),
(5300647, 'Analgetik, Antipiretik', 'Tablet'),
(5300703, 'Analgetik, Antipiretik', 'Tablet'),
(5300723, 'Anti Jamur', 'Tablet'),
(10101107, 'Antripiretik', 'Sirup'),
(10162151, 'Antibiotik', 'Sirup'),
(10211814, 'Antibiotik', 'Tetes Mata'),
(10300644, 'Antibiotik', 'Tablet'),
(10300657, 'Vitamin', 'Capsule'),
(10300700, 'Antibiotik', 'Tablet'),
(10300721, 'Antibiotik', 'Tablet'),
(20300720, 'Saluran Pencernaan ', 'Tube'),
(20300829, 'Anti Virus, Antifungal', 'Tube'),
(24300717, 'Anti Alergi', 'Tablet'),
(120081413, 'Antibiotik, Antifungal, Anti Asma', 'Tetes Mata, Suppositoria, Sirup, Obat Gawat Darurat');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `pertanyaan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `pertanyaan`) VALUES
(1, 'johnWatson', 'shBakerStreet221b', 'Canon');

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `nama_obat` varchar(125) NOT NULL,
  `sediaan_obaat` varchar(12) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `stock_obat` int(11) NOT NULL,
  `catatan` text NOT NULL,
  `status` int(11) NOT NULL,
  `kelas_obat` int(11) NOT NULL,
  `id_obatDikasih` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`nama_obat`, `sediaan_obaat`, `harga_beli`, `harga_jual`, `stock_obat`, `catatan`, `status`, `kelas_obat`, `id_obatDikasih`) VALUES
('Berahistin Mesilat', '6 mg', 11000, 13000, 3, '-', 1, 3300712, 0),
('Cefixime', '200 mg', 45000, 50000, 10, '-', 1, 10300700, 0),
('CTM', '-', 1000, 3000, 22, '-', 1, 24300717, 0),
('Diclofenac Sodium', '50 mg', 4000, 6000, 5, '-', 1, 5300703, 0),
('Dulcolax', '5 mg', 8500, 10000, 20, '-', 1, 20300720, 0),
('Ketokonazole', '200 mg', 6000, 7000, 5, '-', 1, 5300723, 0),
('Metformin ', '500 mg', 2200, 3000, 20, '-', 0, 20300829, 0),
('Metronidazole', '500 mg', 2700, 3000, 10, '-', 1, 10300721, 0),
('Tidak Ada', '0', 0, 0, 0, '-', 2, 5300647, 0);

-- --------------------------------------------------------

--
-- Table structure for table `obat_untuk_pasien`
--

CREATE TABLE `obat_untuk_pasien` (
  `id_obatDikasih` int(11) NOT NULL,
  `kumpulan_obat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `obat_untuk_pasien`
--

INSERT INTO `obat_untuk_pasien` (`id_obatDikasih`, `kumpulan_obat`) VALUES
(0, ''),
(36020914, 'Tidak ada atau resep sendiri'),
(36020926, 'Tidak ada atau resep sendiri'),
(36084054, 'Tidak ada'),
(36090731, 'tes obat baru'),
(36090733, 'tes obat baru'),
(36090736, 'tes obat baru'),
(36090748, 'tes obat baru, tes obat baru, tes obat baru'),
(36160523, 'tes obat baru, test'),
(36210941, 'Tidak ada'),
(36230600, 'tes obat baru'),
(36230616, 'Tidak ada'),
(36271416, 'tes obat baru, test'),
(36281807, 'tes obat baru, test'),
(36281815, 'Tidak ada'),
(36281816, 'Tidak ada'),
(36281823, 'test'),
(36290902, 'Tidak ada'),
(36310736, 'ini nama obat, ini nama obat 2'),
(36311029, 'ini nama obat 2'),
(37310744, 'ini nama obat, ini nama obat 2'),
(38063849, 'tes obat baru, 2'),
(38072738, 'Tidak ada'),
(38073447, '3'),
(38073642, 'test'),
(38094026, 'Diclofenac Sodium'),
(38115323, 'Tidak ada'),
(38125052, 'Tidak Ada'),
(38290702, 'Tidak ada'),
(38290704, 'tes obat baru'),
(38290917, 'tes obat baru, test, Tidak ada, ini nama obat'),
(39071824, '1, 3wesd'),
(39073002, 'tes obat baru'),
(39113352, '1, 2, 3'),
(39113541, '1, 2, 3'),
(39113912, '1, 2, 3'),
(39114016, '1, 2, 3'),
(39114050, '1, 2, 3'),
(39114228, '1, 2, 3'),
(39114602, '1, 2, 3'),
(39114626, '1, 2, 3'),
(39114659, 'ini nama obat, 1'),
(39114758, '1, 2'),
(39115535, '1, 2'),
(39115705, 'tes obat baru, 2, 3'),
(39115735, 'tes obat baru, 2, 3'),
(39120053, 'tes obat baru, 2, 3'),
(39291023, 'Tidak ada'),
(40041736, 'Tidak Ada'),
(40075841, 'Tidak ada'),
(2147483647, '');

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `nama_pasien` text NOT NULL,
  `ktp_pasien` varchar(17) NOT NULL,
  `kelamin_pasien` varchar(14) NOT NULL,
  `tgl_lahir_pasien` varchar(10) NOT NULL,
  `alamat_pasien` text NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `mode` int(11) NOT NULL,
  `antri_mode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`nama_pasien`, `ktp_pasien`, `kelamin_pasien`, `tgl_lahir_pasien`, `alamat_pasien`, `id_pasien`, `mode`, `antri_mode`) VALUES
('I Gusti Alit Putra Arthadi', '5102050505000002', 'Laki - Laki', '05-05-2000', 'tabanan', 15, 0, 0),
('I Gusti Teguh Pramana', '2342354364363', 'Laki - Laki', '28-03-1992', 'taman griya', 33, 0, 0),
('I Gusti Alit Putra Arthadi', '5102050505000002', 'Laki - Laki', '05-05-2000', 'tabanan', 36, 0, 0),
('I Gusti Teguh Pramana', '2342354364363', 'Laki - Laki', '28-03-1992', 'taman griya', 37, 0, 0),
('I Made Irpan Mahendra', '21382189371234', 'Laki - Laki', '05-05-2021', 'taman griya', 38, 1, 0),
('katon', '5102050505000002', 'Laki - Laki', '05-05-2000', 'taman griya', 39, 0, 0),
('Ni Gusti Ayu Dwi Purnama Sari', '51022355070051', 'Perempuan', '27-03-1992', 'Perum Permata Nusa Dua Blok i No.7', 40, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_pasien`
--

CREATE TABLE `riwayat_pasien` (
  `id_rekamMedis` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `tanggal_kunjungan` text NOT NULL,
  `berat_badan` int(11) NOT NULL,
  `umur` int(11) NOT NULL,
  `subject` text NOT NULL,
  `object` text NOT NULL,
  `assestment` text NOT NULL,
  `planing` text NOT NULL,
  `id_obatDikasih` int(11) NOT NULL,
  `mode` int(11) NOT NULL,
  `rujukan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `riwayat_pasien`
--

INSERT INTO `riwayat_pasien` (`id_rekamMedis`, `id_pasien`, `tanggal_kunjungan`, `berat_badan`, `umur`, `subject`, `object`, `assestment`, `planing`, `id_obatDikasih`, `mode`, `rujukan`) VALUES
(16, 36, '02-06-2021', 212, 1212, 'rfev 2123123', 'rfgdv23123', 'grv 213213', 'fdgv 213123', 36310736, 0, ''),
(17, 37, '31-05-2021', 212, 1212, 'rfev 2123123', 'rfgdv23123', 'grv 213213', 'fdgv 213123', 37310744, 1, ''),
(19, 36, '07-06-2021', 212, 1212, 'rfev 2123123', 'rfgdv23123', 'grv 213213', 'fdgv 213123', 36020914, 0, ''),
(20, 36, '04-06-2021', 212, 1212, 'rfev 2123123', 'rfgdv23123', 'grv 213213', 'fdgv 213123', 36020926, 0, ''),
(21, 36, '31-05-2021', 1, 10, 'helo ini subjek', 'tes satu dua tiga', 'ayo gimana yao', 'ewosihr', 36090736, 1, 'ini disini'),
(22, 36, '01-06-2021', 212, 1212, 'rfev 2123123  ', 'rfgdv23123', 'grv 213213  ', 'fdgv 213123', 36090748, 1, '-'),
(23, 36, '26-06-2021', 678, 87, '6tyufgkf', 'yfukm', 'fyhik,fyyh', 'fyugkify7kgfyki', 36160523, 1, '-'),
(25, 36, '18-08-2021', 12, 21, 'wefe', 'dsfg', 'radg', 'earseg43qq', 36210941, 1, '-'),
(26, 36, '23-06-2021', 36, 21, 'subjek', 'objek', '', 'planing', 0, 1, '-'),
(27, 36, '23-06-2021', 36, 21, 'subjek', 'objek', '', 'planing', 0, 1, '-'),
(28, 36, '23-06-2021', 36, 21, 'subjek', 'objek', 'asessestment', 'planing', 36230600, 1, '-'),
(29, 36, '23-06-2021', 36, 21, 'subjek', 'objek', 'asessestment', 'planing', 36230600, 1, '-'),
(30, 36, '23-06-2021', 36, 123, 'hello ini ending', 'my fuckin endorsemewnt', 'i hate you', 'yeah you', 36230616, 1, '-'),
(31, 36, '23-06-2021', 36, 123, 'hello ini ending', 'my fuckin endorsemewnt', 'i hate you', 'yeah you', 36230616, 1, '-'),
(32, 36, '27-06-2021', 36, 234, 'eafw', 'esrvg', 'erqferqqrweerqf', 'erqfeer', 36271416, 1, '-'),
(33, 36, '28-06-2021', 36, 32, '3q2wea', 'ewrf', 'earwfred', 'sdewaf', 36281807, 1, '-'),
(34, 36, '28-06-2021', 36, 32, '3q2wea', 'ewrf', 'earwfred', 'sdewaf', 36281807, 1, '-'),
(35, 36, '28-06-2021', 36, 3, 'ewqfc', 'erwtgv', 'rtwgv', 'rwved', 36281815, 1, '-'),
(36, 36, '28-06-2021', 36, 3, '32', '234', '324', '234', 36281816, 1, '-'),
(37, 36, '28-06-2021', 36, 456, 'wrtegb', '5rt5h', 'etyrfhb', '54g', 36281823, 1, '-'),
(39, 39, '29-06-2021', 0, 3, '-', '-', '-', '-', 2147483647, 1, '-'),
(40, 38, '29-06-2021', 0, 0, '-', '-', '-', '-', 2147483647, 1, '-'),
(41, 38, '29-06-2021', 0, 0, '-', '-', '-', '-', 2147483647, 1, '-'),
(42, 38, '29-06-2021', 0, 0, '- ', '-', '- ', '-', 38290702, 1, 'tes'),
(43, 38, '29-06-2021', 0, 0, '- ', '-', '- ', '-', 38290704, 1, '-'),
(44, 36, '31-05-2021', 0, 0, '-', '-', '-', '-', 36290902, 1, '-'),
(45, 38, '14-06-2021', 0, 0, '-', '-', '-', '-', 38290917, 1, '-'),
(46, 39, '29-06-2021', 0, 0, '-', '-', '-', '-', 39291023, 1, '-'),
(47, 39, '29-06-2021', 0, 0, '-', '-', '-', '-', 39291023, 1, '-'),
(48, 39, '05-07-2021', 0, 2, '-', '-', '-', '-', 39113352, 1, '-'),
(49, 39, '05-07-2021', 0, 2, '-', '-', '-', '-', 39113541, 1, '-'),
(50, 39, '05-07-2021', 0, 2, '-', '-', '-', '-', 39113541, 1, '-'),
(51, 39, '05-07-2021', 0, 2, '-', '-', '-', '-', 39113541, 1, '-'),
(52, 39, '05-07-2021', 0, 2, '-', '-', '-', '-', 39113541, 1, '-'),
(53, 39, '05-07-2021', 0, 2, '-', '-', '-', '-', 39113912, 1, '-'),
(54, 39, '05-07-2021', 0, 2, '-', '-', '-', '-', 39114016, 1, '-'),
(55, 39, '05-07-2021', 0, 2, '-', '-', '-', '-', 39114050, 1, '-'),
(56, 39, '05-07-2021', 0, 2, '-', '-', '-', '-', 39114228, 1, '-'),
(57, 39, '05-07-2021', 0, 2, '-', '-', '-', '-', 39114228, 1, '-'),
(58, 39, '05-07-2021', 0, 2, '-', '-', '-', '-', 39114228, 1, '-'),
(59, 39, '05-07-2021', 0, 2, '-', '-', '-', '-', 39114602, 1, '-'),
(60, 39, '05-07-2021', 0, 2, '-', '-', '-', '-', 39114626, 1, '-'),
(61, 39, '05-07-2021', 0, 2, '-', '-', '-', '-', 39114659, 1, '-'),
(62, 39, '05-07-2021', 0, 2, '-', '-', '-', '-', 39114758, 1, '-'),
(63, 39, '05-07-2021', 0, 2, '-', '-', '-', '-', 39114758, 1, '-'),
(64, 39, '05-07-2021', 0, 2, '-', '-', '-', '-', 39115535, 1, '-'),
(65, 39, '05-07-2021', 0, 2, '-', '-', '-', '-', 39115535, 1, '-'),
(66, 39, '05-07-2021', 0, 2, '-', '-', '-', '-', 39115535, 1, '-'),
(67, 39, '05-07-2021', 0, 2, '-', '-', '-', '-', 39115535, 1, '-'),
(68, 39, '05-07-2021', 0, 2, '-', '-', '-', '-', 39115705, 1, '-'),
(69, 39, '05-07-2021', 0, 2, '-', '-', '-', '-', 39115735, 1, '-'),
(70, 39, '05-07-2021', 0, 2, '-', '-', '-', '-', 39120053, 1, '-'),
(71, 39, '05-07-2021', 0, 2, '-', '-', '-', '-', 39120053, 1, '-'),
(72, 39, '05-07-2021', 0, 2, '-', '-', '-', '-', 39120053, 1, '-'),
(73, 39, '05-07-2021', 0, 2, '-', '-', '-', '-', 39120053, 1, '-'),
(74, 39, '05-07-2021', 0, 2, '-', '-', '-', '-', 39120053, 1, '-'),
(75, 39, '05-07-2021', 0, 2, '-', '-', '-', '-', 39120053, 1, '-'),
(76, 39, '05-07-2021', 0, 2, '-', '-', '-', '-', 39120053, 1, '-'),
(77, 39, '05-07-2021', 0, 2, '-', '-', '-', '-', 39120053, 1, '-'),
(78, 39, '05-07-2021', 0, 2, '-', '-', '-', '-', 39120053, 1, '-'),
(79, 39, '05-07-2021', 0, 2, '-', '-', '-', '-', 39120053, 1, '-'),
(80, 39, '05-07-2021', 0, 2, '-', '-', '-', '-', 39120053, 1, '-'),
(81, 39, '05-07-2021', 0, 2, '-', '-', '-', '-', 39120053, 1, '-'),
(82, 39, '05-07-2021', 0, 2, '-', '-', '-', '-', 39120053, 1, '-'),
(83, 39, '05-07-2021', 0, 2, '-', '-', '-', '-', 39120053, 1, '-'),
(84, 39, '05-07-2021', 0, 2, '-', '-', '-', '-', 39120053, 1, '-'),
(85, 39, '05-07-2021', 0, 2, '-', '-', '-', '-', 39120053, 1, '-'),
(86, 39, '05-07-2021', 0, 2, '-', '-', '-', '-', 39120053, 1, '-'),
(87, 39, '05-07-2021', 0, 2, '-', '-', '-', '-', 39120053, 1, '-'),
(88, 38, '05-07-2021', 0, 21, '-', '-', '-', '-', 38063849, 1, '-'),
(89, 38, '05-07-2021', 0, 21, '-', '-', '-', '-', 38063849, 1, '-'),
(90, 38, '05-07-2021', 0, 21, '-', '-', '-', '-', 38063849, 1, '-'),
(91, 38, '05-07-2021', 0, 21, '-', '-', '-', '-', 38063849, 1, '-'),
(92, 38, '05-07-2021', 0, 21, '-', '-', '-', '-', 38063849, 1, '-'),
(93, 38, '05-07-2021', 0, 21, '-', '-', '-', '-', 38063849, 1, '-'),
(94, 38, '05-07-2021', 0, 5, '-', '-', '-', '-', 38072738, 1, '-'),
(95, 38, '16-07-2021', 51, 21, 'Saluran pernafasan tersumbat', 'Resah', 'DD/ALO', 'Istirahat yang lebih banyak', 38094026, 1, '-'),
(96, 38, '17-07-2021', 0, 0, '-', '-', '-', '-', 38115323, 0, '-'),
(97, 36, '17-07-2021', 0, 0, '-', '-', '-', '-', 36084054, 1, '-'),
(98, 39, '23-07-2021', 0, 0, '-', '-', '-', '-', 39071824, 1, '-'),
(99, 39, '23-07-2021', 0, 0, '-', '-', '-', '-', 39073002, 1, '-'),
(100, 38, '23-07-2021', 0, 0, '-', '-', '-', '-', 38073447, 0, '-'),
(101, 38, '23-07-2021', 0, 0, '-', '-', '-', '-', 38073642, 0, '-'),
(102, 40, '29-07-2021', 0, 0, '-', '-', '-', '-', 40075841, 0, '-'),
(103, 40, '14-07-2021', 0, 25, 'Sesak nafas sejak 3 jam yang lalu dan mempunyai riwayat Astma Brnociale', 'Keadaan umum gelisah', 'WD/ Status Astmatikus', 'Periksa GDB dan 2 jam PP', 40041736, 1, '-'),
(104, 38, '07-08-2021', 0, 21, 'Tenggorokan sakit', 'Panas 28 derajat. ', 'Radang tenggorokan', 'Istirahat dan minum air hangat', 38125052, 1, '-');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `antrian`
--
ALTER TABLE `antrian`
  ADD PRIMARY KEY (`id_antrian`),
  ADD KEY `id_pasien` (`id_pasien`) USING BTREE;

--
-- Indexes for table `jenis_obat`
--
ALTER TABLE `jenis_obat`
  ADD PRIMARY KEY (`jenis_obat`);

--
-- Indexes for table `kategori_obat`
--
ALTER TABLE `kategori_obat`
  ADD PRIMARY KEY (`kategori_obat`);

--
-- Indexes for table `kelas_obat`
--
ALTER TABLE `kelas_obat`
  ADD PRIMARY KEY (`id_kelasObat`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`nama_obat`),
  ADD KEY `kelas_obat` (`kelas_obat`);

--
-- Indexes for table `obat_untuk_pasien`
--
ALTER TABLE `obat_untuk_pasien`
  ADD PRIMARY KEY (`id_obatDikasih`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indexes for table `riwayat_pasien`
--
ALTER TABLE `riwayat_pasien`
  ADD PRIMARY KEY (`id_rekamMedis`),
  ADD KEY `id_pasien` (`id_pasien`),
  ADD KEY `id_obatDikasih` (`id_obatDikasih`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `antrian`
--
ALTER TABLE `antrian`
  MODIFY `id_antrian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id_pasien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `riwayat_pasien`
--
ALTER TABLE `riwayat_pasien`
  MODIFY `id_rekamMedis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `obat`
--
ALTER TABLE `obat`
  ADD CONSTRAINT `obat_ibfk_1` FOREIGN KEY (`kelas_obat`) REFERENCES `kelas_obat` (`id_kelasObat`);

--
-- Constraints for table `riwayat_pasien`
--
ALTER TABLE `riwayat_pasien`
  ADD CONSTRAINT `riwayat_pasien_ibfk_1` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id_pasien`),
  ADD CONSTRAINT `riwayat_pasien_ibfk_2` FOREIGN KEY (`id_obatDikasih`) REFERENCES `obat_untuk_pasien` (`id_obatDikasih`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
