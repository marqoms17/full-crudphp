-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2025 at 07:42 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud-php`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id_akun` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `level` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id_akun`, `nama`, `username`, `email`, `password`, `level`) VALUES
(7, 'Operator Barang', 'opbarang', 'opbarang@gmail.com', '$2y$10$rKwHnRv7J3mrSjduEQLfPufUDWs4HtauujktAsvz1xTOqBozt4rx6', 2),
(8, 'Operator Mahasiswa', 'opmahasiswa', 'opmahasiswa@gmail.com', '$2y$10$5.3c8KoYHYn9jZpoQodeX.z.YI0Xyt4PGLLJsjfW8CYqhR78.vacq', 3),
(10, 'Admin', 'admin', 'admin@gmail.com', '$2y$10$/zAbG5Yv/JZFYTrpa4pH8OZxclpHIgrCJsqK9KcEeHaW4lcVCcJ3O', 1);

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jumlah` varchar(50) NOT NULL,
  `harga` varchar(50) NOT NULL,
  `barcode` varchar(20) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama`, `jumlah`, `harga`, `barcode`, `tanggal`) VALUES
(24, 'Laptop Asus', '5', '12000000', '797241', '2025-01-04 08:53:30'),
(25, 'Processor Intel i7', '2', '5700000', '273059', '2025-01-04 08:53:59'),
(26, 'Keyboard Logitech', '4', '310000', '913972', '2025-01-04 08:57:24'),
(27, 'Mouse', '9', '43000', '603653', '2025-01-04 09:58:02');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id_mahasiswa` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `prodi` varchar(50) NOT NULL,
  `jk` varchar(20) NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(30) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mahasiswa`, `nama`, `prodi`, `jk`, `telepon`, `alamat`, `email`, `foto`) VALUES
(7, 'Mikail', 'Teknik Mesin', 'laki-laki', '089532453361', '<p><em>Jl. Industri Jakarta Barat <strong>13241</strong></em></p>', 'andika22@yahoo.com', '6771151cf2a8b.jpg'),
(8, 'Icha', 'Teknik Arsitektur', 'perempuan', '082133364775', '<p><em>Jl. Nangka Jakarta Selatan <strong>14530</strong></em></p>', 'helena@gmail.com', '67710b6cc227d.jpg'),
(10, 'Tutu', 'Teknik Informatika', 'laki-laki', '083845678890', '<p>Jl. Merpati Pekayon Jakarta Timur <strong>13750</strong></p>', 'zayn@gmail.com', '67714471cb3af.jpeg'),
(11, 'Martin', 'Teknik Arsitektur', 'laki-laki', '087856743383', '<p><em>Jalan Mangga No. 12&nbsp; Ciganea Bandung Jawa Barat <strong>45672</strong></em></p>', 'martin@gmail.com', '677946377d6b4.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id_mahasiswa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id_akun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mahasiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
