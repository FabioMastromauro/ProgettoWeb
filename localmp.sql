-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Ott 05, 2022 alle 18:49
-- Versione del server: 10.4.24-MariaDB
-- Versione PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `localmp`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `annuncio`
--

CREATE TABLE `annuncio` (
  `titolo` varchar(40) NOT NULL,
  `descrizione` varchar(255) NOT NULL,
  `prezzo` float NOT NULL,
  `data` date NOT NULL,
  `idAnnuncio` int(11) NOT NULL,
  `idCompratore` int(11) DEFAULT NULL,
  `idFoto` int(11) NOT NULL,
  `idVenditore` int(11) NOT NULL,
  `categoria` int(11) NOT NULL,
  `ban` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `categoria`
--

CREATE TABLE `categoria` (
  `idCate` int(11) NOT NULL,
  `categoria` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `fotoannuncio`
--

CREATE TABLE `fotoAnnuncio` (
  `idFoto` int(11) NOT NULL,
  `nomeFoto` varchar(20) NOT NULL,
  `size` varchar(11) NOT NULL,
  `tipo` varchar(10) NOT NULL,
  `foto` mediumblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `fotoutente`
--

CREATE TABLE `fotoUtente` (
  `idFoto` int(11) NOT NULL,
  `nomeFoto` varchar(20) NOT NULL,
  `size` varchar(11) NOT NULL,
  `tipo` varchar(10) NOT NULL,
  `foto` mediumblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `recensione`
--

CREATE TABLE `recensione` (
  `commento` varchar(255) NOT NULL,
  `valutazione` int(11) NOT NULL,
  `data` date NOT NULL,
  `idProdotto` int(11) NOT NULL,
  `idRecensione` int(11) NOT NULL,
  `autore` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `utente`
--

CREATE TABLE `utente` (
  `nome` varchar(20) NOT NULL,
  `cognome` varchar(20) NOT NULL,
  `idFoto` int(11) DEFAULT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `idUser` int(11) NOT NULL,
  `dataIscrizione` date NOT NULL,
  `dataFineBan` date DEFAULT NULL,
  `ban` tinyint(1) NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `annuncio`
--
ALTER TABLE `annuncio`
  ADD PRIMARY KEY (`idAnnuncio`),
  ADD KEY `venditore_fk1` (`idVenditore`),
  ADD KEY `compratore_fk2` (`idCompratore`),
  ADD KEY `foto_fk3` (`idFoto`),
  ADD KEY `categoria_fk4` (`categoria`);

--
-- Indici per le tabelle `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idCate`);

--
-- Indici per le tabelle `fotoannuncio`
--
ALTER TABLE `fotoannuncio`
  ADD PRIMARY KEY (`idFoto`) USING BTREE;

--
-- Indici per le tabelle `fotoutente`
--
ALTER TABLE `fotoutente`
  ADD PRIMARY KEY (`idFoto`);

--
-- Indici per le tabelle `recensione`
--
ALTER TABLE `recensione`
  ADD PRIMARY KEY (`idRecensione`),
  ADD KEY `utente_fk1` (`autore`),
  ADD KEY `annuncio_fk2` (`idProdotto`);

--
-- Indici per le tabelle `utente`
--
ALTER TABLE `utente`
  ADD PRIMARY KEY (`idUser`),
  ADD KEY `rocco` (`idFoto`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `annuncio`
--
ALTER TABLE `annuncio`
  MODIFY `idAnnuncio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT per la tabella `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idCate` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT per la tabella `fotoannuncio`
--
ALTER TABLE `fotoannuncio`
  MODIFY `idFoto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT per la tabella `fotoutente`
--
ALTER TABLE `fotoutente`
  MODIFY `idFoto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT per la tabella `recensione`
--
ALTER TABLE `recensione`
  MODIFY `idRecensione` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `utente`
--
ALTER TABLE `utente`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `annuncio`
--
ALTER TABLE `annuncio`
  ADD CONSTRAINT `categoria_fk4` FOREIGN KEY (`categoria`) REFERENCES `categoria` (`idCate`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `compratore_fk2` FOREIGN KEY (`idCompratore`) REFERENCES `utente` (`idUser`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `foto_fk3` FOREIGN KEY (`idFoto`) REFERENCES `fotoannuncio` (`idFoto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `venditore_fk1` FOREIGN KEY (`idVenditore`) REFERENCES `utente` (`idUser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limiti per la tabella `recensione`
--
ALTER TABLE `recensione`
  ADD CONSTRAINT `annuncio_fk2` FOREIGN KEY (`idProdotto`) REFERENCES `annuncio` (`idAnnuncio`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `utente_fk1` FOREIGN KEY (`autore`) REFERENCES `utente` (`idUser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limiti per la tabella `utente`
--
ALTER TABLE `utente`
  ADD CONSTRAINT `rocco` FOREIGN KEY (`idFoto`) REFERENCES `fotoutente` (`idFoto`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
