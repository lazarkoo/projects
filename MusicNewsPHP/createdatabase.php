<?php

$con = mysql_connect("localhost", "root", "");

$kreirajBazu = "CREATE DATABASE IF NOT EXISTS `musicnews` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;";

$kreirajTabeluVesti = "CREATE TABLE IF NOT EXISTS `VESTI` (
  `IDVESTI` bigint(20) NOT NULL AUTO_INCREMENT,
  `NASLOVVESTI` varchar(250) NOT NULL,
  `DATUMVESTI` varchar(20) NOT NULL,
  `TEKSTVESTI` text NOT NULL,
  `HIGHLIGHT` text NOT NULL,
  `SLIKA` varchar(250) NOT NULL,
  `IDKATEGORIJA` bigint(20) NOT NULL,
  `IDKORISNIK` bigint(20) NOT NULL,
  PRIMARY KEY (`IDVESTI`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;";

$kreirajTabeluAward = "CREATE TABLE IF NOT EXISTS `AWARD` (
  `IDAWARD` bigint(20) NOT NULL AUTO_INCREMENT,
  `NAZIV` varchar(250) NOT NULL,
  `IDKATEGORIJAAWARD`  bigint(20) NOT NULL,
  `SLIKA` varchar(250) NULL,
  `VIDEO` varchar(250) NULL,
  PRIMARY KEY (`IDAWARD`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;";

$kreirajTabeluKategorijaAward = "CREATE TABLE IF NOT EXISTS `KATEGORIJAAWARD` (
  `IDKATEGORIJAAWARD` bigint(20) NOT NULL AUTO_INCREMENT,
  `NAZIV` varchar(250) NOT NULL,
   PRIMARY KEY (`IDKATEGORIJAAWARD`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;";

$kreirajTabeluAwardResults = "CREATE TABLE IF NOT EXISTS `AWARDRESULTS` (
  `IDAWARDRESULTS` bigint(20) NOT NULL AUTO_INCREMENT,
  `USER` varchar(250) NOT NULL,
  `DATUMGLASANJA` varchar(250) NOT NULL,
  `BESTMALE` bigint(20) NOT NULL,
  `BESTFEMALE` bigint(20) NOT NULL,
  `BESTBAND` bigint(20) NOT NULL,
  `BESTPOPSONG` bigint(20) NOT NULL,
  `BESTROCKSONG` bigint(20) NOT NULL,
  `BESTVIDEO` bigint(20) NOT NULL,
  PRIMARY KEY (`IDAWARDRESULTS`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;";

$kreirajTabeluKategorija = "CREATE TABLE IF NOT EXISTS `KATEGORIJA` (
  `IDKATEGORIJA` bigint(20) NOT NULL AUTO_INCREMENT,
  `NAZIVKATEGORIJA` varchar(250) NOT NULL,
  PRIMARY KEY (`IDKATEGORIJA`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;";

$kreirajTabeluKorisnik = "CREATE TABLE IF NOT EXISTS `KORISNIK` (
  `IDKORISNIK` bigint(20) NOT NULL AUTO_INCREMENT,
  `USERNAME` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `PASSWORD` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `EMAIL` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `SLIKA` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `DATUMRODJENJA` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `IME` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `PREZIME` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `IDSTATUS` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`IDKORISNIK`)
)  ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;";


$popuniTabeluVesti = "INSERT INTO `VESTI` (`IDVESTI`, `NASLOVVESTI`, `DATUMVESTI`, `TEKSTVESTI`, `HIGHLIGHT`,`SLIKA`,`IDKATEGORIJA`,`IDKORISNIK`) VALUES
(1, 'Guano Apes su objavili novu pesmu', '2015-12-24', 'Opis 1','Neki tekst 1', 'guano-apes.jpg', 3, 1),
(2, 'The Killers prave turneju po evropi', '2015-12-26', 'Opis 2','Neki tekst 2', 'the-killers.jpeg', 1, 1),
(3, 'Pročitajte intervju sa bendom Van Gogh', '2015-12-28', 'Opis 3','Neki tekst 3', 'vangogh.jpg', 2, 2);";


$popuniTabeluKategorija = "INSERT INTO `KATEGORIJA` (`IDKATEGORIJA`, `NAZIVKATEGORIJA`) VALUES
(1, 'Glavna vest'),
(2, 'Intervju'),
(3, 'Zanimljivosti');";

$popuniTabeluKategorijaAward = "INSERT INTO `KATEGORIJAAWARD` (`IDKATEGORIJAAWARD`, `NAZIV`) VALUES
(1, 'BEST FEMALE'),
(2, 'BEST MALE'),
(3, 'BEST BAND'),
(4, 'BEST POP SONG'),
(5, 'BEST ROCK SONG'),
(6, 'BEST VIDEO');";

$popuniTabeluKorisnik = "INSERT INTO `KORISNIK` (`IDKORISNIK`, `USERNAME`, `PASSWORD`, `EMAIL`, `SLIKA`, `DATUMRODJENJA`, `IME`, `PREZIME`, `IDSTATUS`) VALUES
(1, 'lazarp', '0a7aacae9b43f934498185566d2a865ef93d4f4c4488c60d085f5b268c949825', 'lazarpadjan@yahoo.com', 'lazar.jpg', '19.02.1992.','Lazar','Padjan', 'Admin'),
(3, 'marko', '8fa1dddd53606ceb933c5c6a12e714ed41e11d37a2b7bc48e91d15b54171d033', 'markom@yahoo.com', 'man-two.jpg', '15.03.1994.','Marko','Markovic', 'Citalac'),
(2, 'sesticm', 'f785c3ce1d580c8f22c1db8a14cf1268e44279ff5d461361dbbfaf19e8b11578', 'sesticmira@yahoo.com', 'slika1.jpg', '25.03.1991.','Mira','Sestic', 'Novinar');";


$popuniTabeluAward = "INSERT INTO `AWARD` (`IDAWARD`, `NAZIV`, `IDKATEGORIJAAWARD`, `SLIKA`, `VIDEO`) VALUES
(1, 'Taylor Swift', 1, 'taylor-swift.jpg', '' ),
(2, 'Justin Timberlake', 2, 'justin-timberlake.jpg', ''),
(3, 'The Killers', 3, 'the-killers.jpeg', ''),
(4, 'Taylor Swift - Bad Blood', 4, '' , 'https://www.youtube.com/embed/QcIy9NiNbmo'),
(5, 'The Killers - Shot at Night', 5, '' , 'https://www.youtube.com/embed/X4YK-DEkvcw'),
(6, 'Taylor Swift - Shake It Off',6, '' , 'https://www.youtube.com/embed/nfWlot6h_JM');";

mysql_query($kreirajBazu);
mysql_select_db('musicnews', $con);
mysql_query($kreirajTabeluVesti);
mysql_query($kreirajTabeluKategorija);
mysql_query($kreirajTabeluKorisnik);
mysql_query($kreirajTabeluAward);
mysql_query($kreirajTabeluAwardResults);
mysql_query($kreirajTabeluKategorijaAward);
mysql_query($popuniTabeluVesti);
mysql_query($popuniTabeluKategorija);
mysql_query($popuniTabeluKorisnik);
mysql_query($popuniTabeluAward);
mysql_query($popuniTabeluKategorijaAward);

echo "Uspesno kreirano ako nema upozorenja!!";

?>