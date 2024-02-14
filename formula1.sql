-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Creato il: Gen 17, 2024 alle 19:03
-- Versione del server: 5.7.11
-- Versione PHP: 5.6.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `formula1`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `circuiti`
--

CREATE TABLE `circuiti` (
  `Nome` varchar(20) NOT NULL,
  `Stato` varchar(20) NOT NULL,
  `Provincia` varchar(20) NOT NULL,
  `Giri` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `partecipazioni`
--

CREATE TABLE `partecipazioni` (
  `Pilota` varchar(20) NOT NULL,
  `Team` varchar(20) NOT NULL,
  `AnnoInizio` date NOT NULL,
  `AnnoFine` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `piloti`
--

CREATE TABLE `piloti` (
  `Id` int(20) NOT NULL,
  `Nome` varchar(20) NOT NULL,
  `Cognome` varchar(20) NOT NULL,
  `Data_di_nascita` date NOT NULL,
  `Team` varchar(20) NOT NULL,
  `Numero` int(11) NOT NULL,
  `Attivita` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `piloti`
--

INSERT INTO `piloti` (`Id`, `Nome`, `Cognome`, `Data_di_nascita`, `Team`, `Numero`, `Attivita`) VALUES
(1, 'Max', 'Verstappen', '1997-09-30', 'Red Bull', 1, 1),
(2, 'Lewis', 'Hamilton', '1985-01-07', 'Mercedes AMG Petrona', 44, 1),
(3, 'Sergio', 'Perez', '1990-01-26', 'Oracle Red Bull Race', 11, 0);

-- --------------------------------------------------------

--
-- Struttura della tabella `risultatigare`
--

CREATE TABLE `risultatigare` (
  `ID` int(11) NOT NULL,
  `Gara` varchar(11) DEFAULT NULL,
  `Pilota` int(11) DEFAULT NULL,
  `Posizione` int(11) DEFAULT NULL,
  `Punteggio` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `team`
--

CREATE TABLE `team` (
  `Nome` varchar(20) NOT NULL,
  `Data_di_fondazione` date NOT NULL,
  `Proprietario` varchar(20) NOT NULL,
  `Attivita` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `team`
--

INSERT INTO `team` (`Nome`, `Data_di_fondazione`, `Proprietario`, `Attivita`) VALUES
('Mercedes AMG Petrona', '2010-01-02', 'Toto Wolff ', 1),
('Oracle Red Bull Race', '2014-04-05', 'Red Bull GmbH', 1),
('Red Bull', '2004-11-15', 'Dietrich Mateschitz', 1);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `circuiti`
--
ALTER TABLE `circuiti`
  ADD PRIMARY KEY (`Nome`);

--
-- Indici per le tabelle `piloti`
--
ALTER TABLE `piloti`
  ADD PRIMARY KEY (`Id`);

--
-- Indici per le tabelle `risultatigare`
--
ALTER TABLE `risultatigare`
  ADD PRIMARY KEY (`ID`);

--
-- Indici per le tabelle `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`Nome`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `piloti`
--
ALTER TABLE `piloti`
  MODIFY `Id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
