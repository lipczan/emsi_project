-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 11 Kwi 2021, 15:40
-- Wersja serwera: 10.4.18-MariaDB
-- Wersja PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `data`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `delegacje`
--

CREATE TABLE `delegacje` (
  `lp` int(11) NOT NULL,
  `imie_nazwisko` text NOT NULL,
  `data_od` date NOT NULL,
  `data_do` date NOT NULL,
  `m_wyjazd` text NOT NULL,
  `m_przyjazd` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `delegacje`
--

INSERT INTO `delegacje` (`lp`, `imie_nazwisko`, `data_od`, `data_do`, `m_wyjazd`, `m_przyjazd`) VALUES
(5, 'Jakub Popek', '2020-12-11', '2021-02-11', 'Warszawa', 'Bydgoszcz'),
(6, 'Piotr Melen', '2020-10-11', '2020-10-15', 'Warszawa', 'Zakopane'),
(4, 'Jan Beben', '2020-12-19', '2021-02-15', 'Poznan', 'Szczecin'),
(3, 'Tomasz Jaki', '2020-12-05', '2021-02-14', 'Poznan', 'Krakow'),
(2, 'Jakub Taki', '2020-12-10', '2021-02-01', 'Poznan', 'Gdansk'),
(1, 'Mariusz Tarka', '2020-10-10', '2021-01-01', 'Poznan', 'Zamosc');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kontrahenci`
--

CREATE TABLE `kontrahenci` (
  `nip` text NOT NULL,
  `regon` text DEFAULT NULL,
  `nazwa` text NOT NULL,
  `platnik_vat` text NOT NULL,
  `ulica` text NOT NULL,
  `nr_domu` text NOT NULL,
  `nr_mieszkania` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `kontrahenci`
--

INSERT INTO `kontrahenci` (`nip`, `regon`, `nazwa`, `platnik_vat`, `ulica`, `nr_domu`, `nr_mieszkania`) VALUES
('456', '786', 'etet', 'Tak', 'prosta', '2', '4'),
('456', '786', 'etet', 'Nie', 'prosta', '2', '4');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
