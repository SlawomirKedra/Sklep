-- phpMyAdmin SQL Dump
-- version 4.6.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 08 Cze 2016, 08:55
-- Wersja serwera: 10.0.24-MariaDB-7.cba.1
-- Wersja PHP: 7.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `sklep_rolety_cba_pl`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kategorie`
--

CREATE TABLE `kategorie` (
  `id` int(11) NOT NULL,
  `nazwa` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `kategorie`
--

INSERT INTO `kategorie` (`id`, `nazwa`) VALUES
(1, 'Rolety wewnętrzne'),
(2, 'Rolety zewnętrzne'),
(3, 'Żaluzje'),
(4, 'Moskitiery'),
(5, 'Markizy');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `klienci`
--

CREATE TABLE `klienci` (
  `id_Klienci` int(11) NOT NULL,
  `Imie` varchar(45) CHARACTER SET latin1 NOT NULL,
  `Nazwisko` varchar(45) CHARACTER SET latin1 NOT NULL,
  `Email` varchar(45) CHARACTER SET latin1 NOT NULL,
  `Nr_tel` varchar(45) CHARACTER SET latin1 NOT NULL,
  `Adres` varchar(45) CHARACTER SET latin1 NOT NULL,
  `login` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `klienci`
--

INSERT INTO `klienci` (`id_Klienci`, `Imie`, `Nazwisko`, `Email`, `Nr_tel`, `Adres`, `login`, `password`) VALUES
(27, 'Slawomir', 'Kedra', 'slaweczkowy@gmail.com', '723173287', 'Rzeszow', 'slawek', '11111111'),
(28, 'Baska', 'Nogaj', 'baska.malpa@op.pl', '0700880777', 'Stara wieÅ› 766', 'baska', '12345678'),
(29, 'admin', 'admin', 'admin@admin.pl', '11111111', 'admin', 'admin', 'admin12345');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `koszyk`
--

CREATE TABLE `koszyk` (
  `id` int(11) NOT NULL,
  `session_id` varchar(40) CHARACTER SET latin1 NOT NULL,
  `produkt_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `produkty`
--

CREATE TABLE `produkty` (
  `id_Produkty` int(11) NOT NULL,
  `index` varchar(10) NOT NULL,
  `Nazwa` varchar(45) NOT NULL,
  `Opis` text NOT NULL,
  `Cena` double NOT NULL,
  `kategorie_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `produkty`
--

INSERT INTO `produkty` (`id_Produkty`, `index`, `Nazwa`, `Opis`, `Cena`, `kategorie_id`) VALUES
(1, 'RZO1', 'MINI', 'Rolety wolnowiszące MINI to najbardziej znany rodzaj osłony okna. Cechuje je prostota, subtelność i funkcjonalność.', 29.9, 1),
(2, 'RZO2', 'Dzień i Noc', 'Prostota, funkcjonalność i subtelność w jednym. Najpopularniejsza osłona okna.', 51, 1),
(3, 'RZO3', 'Standard', 'Tradycyjne rolety wolnowiszące Standard charakteryzują się łatwym montażem i obsługą. Rolety te możemy stosować do zasłonięcia zarówno małych jak i dużych powierzchni okiennych.', 35, 1),
(4, 'RZO4', 'Wielkogabarytowe', 'Rolety tekstylne wielkogabarytowe - osłony idealne do osłony dużych powierzchni.', 120, 1),
(5, 'RZO5', 'Impresja', 'Roleta w kasecie aluminiowej - nowoczesna dekoracja okienna sterowana ręcznie lub elektrycznie.', 89, 1),
(6, 'RZO6', 'Rolety rzymskie', 'Rolety Rzymskie idealnie łączą tradycyjne rozwiązania z nowoczesnymi, dzięki połączeniu najlepszych cech jakie posiadają firanki oraz rolety okienne.', 184, 1),
(10, 'RWO1', 'EXTE', 'Nowoczesne rozwiązania dla wygody użytkowania. System EXTE EXPERT XT - maksymalny komfort i wygoda użytkowania.', 110, 2),
(11, 'RWO2', 'Standard SK 45', 'Rolety w skrzynce ściętej pod kątem 45 st. to najpopularniejsze rozwiązanie do zabezpieczenia okien od strony zewnętrznej. Rolety te przeznaczone są do montażu na istniejących oknach. ', 80, 2),
(12, 'RWO3', 'Podtynkowa Integro', 'Nowoczesna roleta do zabudowy.', 130, 2),
(13, 'RWO4', 'System OWAL', 'Oryginalny wygląd, montaż na istniejących oknach, we wnęce okiennej lub na elewacji budynku.', 145, 2),
(14, 'RWO5', 'Antywłamaniowa klasa RC3', 'Bezpieczeństwo i komfort w zasięgu ręki.', 950, 2),
(15, 'RWO6', 'Do okna dachowego ARZ', 'Roleta zewnętrzna do okien dachowych - ochrona przed nadmiarem ciepła i pełny komfort użytkowania poddasza.', 1042, 2),
(16, 'Z01', 'Verticale', 'Niezwykle praktyczny sposób zasłaniania większych powierzchni przed nadmiernym nasłonecznieniem - idealne do domu, mieszkania, hotelu, banku, biurowca.', 55, 3),
(17, 'Z02', 'Verticale Evouge', 'Nowość w ofercie Roleton! Nowy kształt i kolory rynien, nowa kolekcja tkanin i zupełnie nowy rodzaj sterowania za pomocą drążka. Alternatywa dla zasłon w biurach, hotelach lub mieszkaniach.', 98, 3),
(18, 'Z03', 'Aluminiowe', 'Najpopularniejszy sposób osłony okien wewnątrz pomieszczenia. Dają one możliwość sterowania przenikaniem promieni słonecznych poprzez odpowiednie ustawienie kąta nachylenia lameli', 40, 3),
(19, 'Z04', 'Drewniane', 'Piękno i komfort w jednym. Drewniane lamele posiadają możliwość obrotu wokół osi, co umożliwia regulację przenikania promieni słonecznych.', 215, 3),
(20, 'Z05', 'Plisy', 'Nowoczesny sposób na zaciemnienie i dekorację okna.', 55, 3),
(21, 'M01', 'Plisowane', 'Świetne rozwiązanie do ochrony przed komarami drzwi (wejść) balkonowych, zwłaszcza szerokich.', 35, 4),
(22, 'M02', 'Moskitiery rolowane', 'Idealna ochrona przed insektami - zarówno drzwi balkonowych jak i okien.', 60, 4),
(23, 'M03', 'Drzwiowe', 'Najlepsze rozwiązanie do drzwi balkonowych oraz wejściowych - nigdy więcej insektów!', 130, 4),
(24, 'MA01', 'Linea / Linea Box', 'Markiza tarasowa z belką montażową o maksymalnym wysięgu 350cm.', 700, 5),
(25, 'MA02', 'Variant', 'Markiza tarasowa z regulacją kąta nachylenia poszycia.', 650, 5),
(26, 'MA03', 'Duetta', 'Wolnostojąca markiza ogrodowa.', 1024, 5),
(27, 'MA04', 'Siro', 'Boczna osłona przeciwsłoneczna', 400, 5),
(28, 'MA05', 'Mesabox', 'Elegancka markiza do zacieniania dużych powierzchni.', 560, 5),
(29, 'MA06', 'Airomatic', 'Markiza do ogrodów zimowych z prowadnicami bocznymi i sprężynami gazowymi.', 780, 5);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `sessions`
--

CREATE TABLE `sessions` (
  `session_id` varchar(40) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `salt_token` varchar(10) CHARACTER SET latin1 NOT NULL,
  `id_Klienci` int(11) NOT NULL,
  `uniq_info` varchar(32) CHARACTER SET latin1 NOT NULL,
  `browser` text CHARACTER SET latin1 NOT NULL,
  `ip` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `sprzedawca`
--

CREATE TABLE `sprzedawca` (
  `id_Sprzedawca` int(11) NOT NULL,
  `Imie` varchar(45) CHARACTER SET latin1 NOT NULL,
  `Nazwisko` varchar(45) CHARACTER SET latin1 NOT NULL,
  `login` varchar(45) CHARACTER SET latin1 NOT NULL,
  `Haslo` varchar(45) CHARACTER SET latin1 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zamowienia`
--

CREATE TABLE `zamowienia` (
  `id_Zamowienia` int(11) NOT NULL,
  `Dane_Klienta_id_Dane_Klienta` int(11) NOT NULL,
  `Sprzedawca_id_Sprzedawca` int(11) NOT NULL,
  `Data_zlozenia_zamowienia` datetime DEFAULT NULL,
  `Czy_przyjeto_zamowienie` tinyint(1) DEFAULT NULL,
  `Data_przyjecia_zamowienia` datetime DEFAULT NULL,
  `Data_realizacji_zamowienia` datetime DEFAULT NULL,
  `Czy_zrealizowano_zamowienie` tinyint(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `kategorie`
--
ALTER TABLE `kategorie`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `klienci`
--
ALTER TABLE `klienci`
  ADD PRIMARY KEY (`id_Klienci`);

--
-- Indexes for table `koszyk`
--
ALTER TABLE `koszyk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produkty`
--
ALTER TABLE `produkty`
  ADD PRIMARY KEY (`id_Produkty`);

--
-- Indexes for table `sprzedawca`
--
ALTER TABLE `sprzedawca`
  ADD PRIMARY KEY (`id_Sprzedawca`);

--
-- Indexes for table `zamowienia`
--
ALTER TABLE `zamowienia`
  ADD PRIMARY KEY (`id_Zamowienia`),
  ADD KEY `fk_Zamowienia_Sprzedawca1_idx` (`Sprzedawca_id_Sprzedawca`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `kategorie`
--
ALTER TABLE `kategorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT dla tabeli `klienci`
--
ALTER TABLE `klienci`
  MODIFY `id_Klienci` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT dla tabeli `koszyk`
--
ALTER TABLE `koszyk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT dla tabeli `produkty`
--
ALTER TABLE `produkty`
  MODIFY `id_Produkty` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT dla tabeli `sprzedawca`
--
ALTER TABLE `sprzedawca`
  MODIFY `id_Sprzedawca` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT dla tabeli `zamowienia`
--
ALTER TABLE `zamowienia`
  MODIFY `id_Zamowienia` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
