<?php

require_once "connect.php";
$pdo = new PDO('mysql:host='.$host.';dbname='.$db_name.';charset=utf8', $db_user, $db_password);
$pdo ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo -> exec("SET NAMES 'utf8'");
?>
<!DOCTYPE html>

<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sklep internetowy - Roleton</title>

    <!-- Bootstrap Core CSS -->
    <link href="html/content/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="html/content/css/shop-homepage.css" rel="stylesheet">
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<?php

require_once "function.php";
require_once "sessions.php";
require_once "request.php";
require_once "user.php";
require_once "koszyk.php";

$request = new userRequest;
$session = new session;
$koszyk = new koszyk;


?>
</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Roleton</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        <a href="rejestracja.php">Rejestracja</a>
                    </li>
                    <li>
                        <?php echo "<a href='logowanie.php'>Logowanie</a>";?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Panel boczny -->
    <div class="container">

        <div class="row">

            <div class="col-md-3">
                <p class="lead">Menu:</p>
                <?php
             showMenu();
             
             ?>
           </div>
	
        <div class="col-md-9">
            <p class="text-info">1. SKLEP-ROLETY</p>
			<p>To sklep internetowy prowadzący sprzedaż wysyłkową: przysłon, rolet oraz akcesoriów okiennych.  </p>
			<p class="text-info">2. CENY TOWARÓW</p>
			<p>Ceny towarów znajdujących się na stronie knall.pl wyrażone są w złotych polskich i zawierają podatek VAT. Ceny mają charakter wiążący z chwilą złożenia zamówienia.</p>
			<p class="text-info">3. ZAMAWIANIE TOWARU</p>
			<p>-Zamówienia towaru następuje poprzez dodanie go do koszyka, wypełnienie wskazanych formularzy swoimi danymi oraz zatwierdzeniem zamówienia. 
			   -Zamówienia można również składać przez e-mail na adres: admin@admin.pl (7 dni w tygodniu, 24 h na dobę) oraz telefonicznie tel. +48 000 000 000 (pon.-piąt. w godz. 9:00 - 17:00).  
			   -Liczba zamawianych towarów nie jest ograniczona. 
 			   -Klient ma prawo do wglądu swoich danych oraz ich poprawiania.
			   -Klient może żądać uzupełnienia, uaktualnienia, sprostowania danych osobowych, czasowego lub stałego wstrzymania ich przetwarzania lub ich usunięcia.
			   -Kupujący powinien podać numer numeru telefonu stacjonarnego lub komórkowego i adresu e-mail, pod którymi będzie możliwe potwierdzenie zamówienia i kontakt w sprawie złożonego zamówienia.
			   -Zamówienia z nieprawidłowo wypełnionym formularzem nie będą realizowane.
			   -Firma zastrzega sobie prawo do wycofania ze sprzedaży niektórych produktów, znajdujących się na stronach sklepu.
			   -Zamówione towary dostarczane są na terenie Polski za pośrednictwem firmy kurierskiej (UPS, DHL, DPD, FEDEX, K-EX).</p>
			<p class="text-info">4. REKLAMACJE</p>
			<p>W przypadku ewentualnych reklamacji należy skontaktować się z biurem sklepu pod numerem telefonu +48 000 000 000 lub za pośrednictwem poczty e-mail pisząc na adres sklep@knall.pl Reklamowany towar powinien być odesłany na adres firmy wraz z opisem reklamacji (w przypadku braku wcześniejszej informacji o przyczynie reklamacji). Produkt zostanie wymieniony na pełnowartościowy, a jeśli będzie to już niemożliwe (na przykład z powodu wyczerpania nakładu), zaoferujemy do wyboru inne, dostępne w naszym sklepie produkty lub zwrócimy pieniądze.

		    Z towaru zakupionego w naszym sklepie można zrezygnować (odstąpić od zawarcia umowy) w ciągu 14 dni od dnia odebrania przesyłki pod warunkiem, że produkt nie był używany, ani nie został rozpakowany z oryginalnego opakowania i nie jest w żaden sposób zniszczony. Gwarantujemy zwrot kwoty odpowiadającej wartości produktu. Pieniądze Klient otrzymuje przelewem bankowym w terminie do 14 dni (dlatego prosimy podać dokładny numer konta). Rezygnację należy złożyć na piśmie. Klient odsyła zakupiony towar na własny koszt.</p>
		    <p>Zgodnie z ustawą z dnia 30 maja 2014 r. o prawach konsumenta Art. 38. punkt 3. Zwrotom nie podlegają towary nieprefabrykowane wyprodukowane lub zaimportowane na zamówienie klienta.</p>
			<p class="text-info">5. PARAGONY I FAKTURY</p>
			<p>Do każdego zakupu w ciagu 15 dni od momentu realizacji zamówienia dostarczana jest faktura VAT.  
			Klient pragnący otrzymać fakturę VAT na firmę, musi wybrać tę opcję podczas zakupu, wypełniając właściwe pola formularza danymi firmy/osoby, na którą ma zostać wystawiona faktura.</p>
			<p class="text-info">6. OCHRONA DANYCH OSOBOWYCH / POLITYKA PRYWATNOŚCI</p>
			<p>Stosownie do przepisów ustawy z dnia 29 sierpnia 1997 r. o ochronie danych osobowych (Dz. U z 2002 r. Nr 101, poz. 926 z pó1n. zm.) dane osobowe klienta zostaną wprowadzone do bazy danych knall.pl wyłącznie w celu realizacji zamówień oraz kontaktu z Klientem i nie będą udostępniane innym podmiotom. Każdy Klient ma prawo wglądu do swoich danych i ich poprawienia. Baza danych klientów Sklepu, zgodnie z przepisami prawa, zarejestrowana została w GIODO.</p>
			<p class="text-info">7. POZOSTAŁE</p>
     		<p>Powyższa oferta nie stanowi oferty handlowej w rozumieniu art. 66 §1 kodeksu cywilnego oraz innych właściwych przepisów prawnych.
			Firma zastrzega sobie prawo do nie odzwierciedlania faktycznych stanów magazynowych firmy w tym dostępności produktów.
			W przypadku braku dostępności towaru obsługa sklepu zastrzega sobie prawo do anulowania zamówienia.
			Zamówienie jest realizowane, o ile w fazie składania zamówienia produkty są dostępne w magazynie sklepu lub u dostawców.</p>
		 

 </div>
  </div>
   </div>
<!-- /.container -->

    <div class="container">

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Roleton 2016</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="html/content/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="html/content/js/bootstrap.min.js"></script>

</body>

</html>