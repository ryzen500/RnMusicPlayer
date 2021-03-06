-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Mar 2022 pada 17.15
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `slotify`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `firstName` varchar(70) NOT NULL,
  `lastName` varchar(70) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(32) NOT NULL,
  `signUpDate` datetime NOT NULL,
  `profilePic` varchar(500) NOT NULL,
  `descripsi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `firstName`, `lastName`, `email`, `password`, `signUpDate`, `profilePic`, `descripsi`) VALUES
(1, 'mencoba', 'Ryzen', '500', 'Ryzen500@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '2021-02-12 00:00:00', 'assets/images/profile-pics/head_emerald.png', 'Keep Moving Forward');

-- --------------------------------------------------------

--
-- Struktur dari tabel `albums`
--

CREATE TABLE `albums` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `artist` int(11) NOT NULL,
  `genre` int(11) NOT NULL,
  `artworkPath` varchar(500) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `albums`
--

INSERT INTO `albums` (`id`, `title`, `artist`, `genre`, `artworkPath`, `date`) VALUES
(1, 'MOMOLAND X CHROME ALBUMS', 2, 4, 'assets/images/artwork/popdance.jpg', '2022-03-26'),
(2, 'NEFFEX ALBUMS', 5, 1, 'assets/images/artwork/neffex.jpg', '2022-03-20'),
(3, 'Bensound', 6, 4, 'assets/images/artwork/popdance.jpg', '2022-03-20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `artists`
--

CREATE TABLE `artists` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `artists`
--

INSERT INTO `artists` (`id`, `name`, `date`) VALUES
(1, 'Eminem', '0000-00-00'),
(2, 'MOMOLAND X CHROMANCE', '0000-00-00'),
(3, 'Alan Walker', '0000-00-00'),
(4, 'JFLa', '0000-00-00'),
(5, 'NEFFEX', '0000-00-00'),
(6, 'Bensound', '0000-00-00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `genres`
--

CREATE TABLE `genres` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `datetime` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `genres`
--

INSERT INTO `genres` (`id`, `name`, `datetime`) VALUES
(1, 'Raps', '2022-03-25 03:40:39'),
(2, 'Podcasts', '2022-03-25 03:41:02'),
(3, 'Jazz', ''),
(4, 'Pop', ''),
(5, 'R & B', ''),
(6, 'K-Pop', ''),
(7, 'Metal', ''),
(8, 'Hip-Hop', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `nama` int(11) NOT NULL,
  `pesan` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `message`
--

INSERT INTO `message` (`id`, `nama`, `pesan`, `status`, `tanggal`, `jam`) VALUES
(49, 10, 'Hell', 'y', '2022-03-24', '15:26:56'),
(50, 10, 'Test', 'n', '2022-03-24', '15:26:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `playlists`
--

CREATE TABLE `playlists` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `owner` varchar(50) NOT NULL,
  `dateCreated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `playlists`
--

INSERT INTO `playlists` (`id`, `name`, `owner`, `dateCreated`) VALUES
(3, 'Playlist Music One', 'ryzen500', '2021-08-24 00:00:00'),
(4, 'Playlist Music Two', 'ryzen500', '2021-08-24 00:00:00'),
(5, 'Playlist 3', 'ryzen500', '2021-08-30 00:00:00'),
(6, 'Playlisst 4', 'ryzen500', '2021-11-02 00:00:00'),
(7, 'Tester', 'ryzen500', '2021-12-23 00:00:00'),
(8, 'Asade', 'Opet1', '2022-01-04 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `playlistsongs`
--

CREATE TABLE `playlistsongs` (
  `id` int(11) NOT NULL,
  `songId` int(11) NOT NULL,
  `playlistId` int(11) NOT NULL,
  `playlistOrder` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `playlistsongs`
--

INSERT INTO `playlistsongs` (`id`, `songId`, `playlistId`, `playlistOrder`) VALUES
(29, 1, 4, 0),
(30, 3, 5, 0),
(32, 3, 3, 0),
(33, 2, 3, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `songs`
--

CREATE TABLE `songs` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `artist` int(11) DEFAULT NULL,
  `album` int(11) DEFAULT NULL,
  `genre` int(11) DEFAULT NULL,
  `duration` varchar(8) NOT NULL,
  `path` varchar(500) NOT NULL,
  `albumOrder` int(11) DEFAULT NULL,
  `plays` int(11) DEFAULT NULL,
  `datetime` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `firstName` varchar(70) NOT NULL,
  `lastName` varchar(70) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(32) NOT NULL,
  `signUpDate` datetime NOT NULL,
  `profilePic` varchar(500) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `firstName`, `lastName`, `email`, `password`, `signUpDate`, `profilePic`, `status`) VALUES
(1, 'Lala', ' Lastri ', 'Lalass', 'Lala@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '2021-02-12 00:00:00', 'assets/images/profile-pics/head_emerald.png', 'active'),
(10, 'ryzen500', 'Achmad   ', 'ryzen', 'ahmadtsani112@gmail.com', '202cb962ac59075b964b07152d234b70', '2022-03-04 00:00:00', 'assets/images/profile-pics/head_emerald.png', 'active');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`id`),
  ADD KEY `artist` (`artist`),
  ADD KEY `genre` (`genre`);

--
-- Indeks untuk tabel `artists`
--
ALTER TABLE `artists`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nama` (`nama`);

--
-- Indeks untuk tabel `playlists`
--
ALTER TABLE `playlists`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `playlistsongs`
--
ALTER TABLE `playlistsongs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `songId` (`songId`),
  ADD KEY `playlistId` (`playlistId`);

--
-- Indeks untuk tabel `songs`
--
ALTER TABLE `songs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `artist` (`artist`),
  ADD KEY `album` (`album`),
  ADD KEY `genre` (`genre`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `albums`
--
ALTER TABLE `albums`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `artists`
--
ALTER TABLE `artists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT untuk tabel `playlists`
--
ALTER TABLE `playlists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `playlistsongs`
--
ALTER TABLE `playlistsongs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `songs`
--
ALTER TABLE `songs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `albums`
--
ALTER TABLE `albums`
  ADD CONSTRAINT `albums_ibfk_1` FOREIGN KEY (`artist`) REFERENCES `artists` (`id`),
  ADD CONSTRAINT `albums_ibfk_2` FOREIGN KEY (`genre`) REFERENCES `genres` (`id`);

--
-- Ketidakleluasaan untuk tabel `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`nama`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `songs`
--
ALTER TABLE `songs`
  ADD CONSTRAINT `songs_ibfk_1` FOREIGN KEY (`album`) REFERENCES `albums` (`id`),
  ADD CONSTRAINT `songs_ibfk_2` FOREIGN KEY (`artist`) REFERENCES `artists` (`id`),
  ADD CONSTRAINT `songs_ibfk_3` FOREIGN KEY (`genre`) REFERENCES `genres` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
