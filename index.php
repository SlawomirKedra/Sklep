<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
//       
$polaczenie = mysqli_connect('localhost', 'root', '');   //nawiązywanie połączenie 
 if(!$polaczenie)
{
     die('Błąd połączenia: ' . mysqli_error());            //w przypadku błędu wyświetlenie komunikatu 
}
echo  ' Połączenie nawiązane <br/>' ; 
/* ---------------------------------------------------------------------------------------------------------*/
$baza = mysqli_select_db($polaczenie, 'sklep') ;          //nawiązywanie połączenia z bazą danych 
 if (!$baza) 
{
    die ('Nie można wybrać bazy danych: ' . mysqli_error());
}
echo  ' Połączenie z Bazą danych sklep pozytywne ' ; 
/* ---------------------------------------------------------------------------------------------------------*/
$wynik = mysqli_query( $polaczenie, "SELECT * FROM produkty")  //zapytanie do konkretnej tabeli 
or die('Błąd zapytania'); 

if(mysqli_num_rows($wynik) > 0) {               // sprawdzamy ilość danych , jeśli true to wypisujemy 
   
    echo "<table cellpadding=\"2\" border=1>";                          // wypisanie wyników w postaci wiersz wyniku w tablicy 
    //                                                                      numerycznej oraz w postaci tablicy asocjacyjnej 
    while($r = mysqli_fetch_array($wynik)) { 
        echo "<tr>"; 
        echo "<td>".$r[1]."</td>"; 
        echo "<td>".$r[2]."</td>"; 
        echo "<td>".$r[3]."</td>"; 
        echo "</tr>"; 
    } 
    echo "</table>"; 
}

mysqli_close ( $polaczenie );
        ?>
    </body>
</html>
