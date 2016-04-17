<?php

define('SESSION_COOKIE', 'cookiesklep');
define('SESSION_ID_LENGHT', 40);
define('SESSION_COOKIE_EXPIRE', 3600);

function showMenu(){
    global $pdo, $session;
    
    $stmt = $pdo->prepare("SELECT * FROM kategorie");
    $stmt ->execute();
    
    while($row = $stmt -> fetch(PDO::FETCH_ASSOC)){
        $nazwa = $row['nazwa'];
        $id = $row['id'];
        echo "<div class='list-group-item'>";
        echo "<a href='/../PhpProject1/html/views/kategorie.php?cat_id=$id'>$nazwa</a>";
        echo "<br>";
        echo "</div>";
        
    
    }
    echo "<br>";
    echo "<br>";
    echo "<div class='list-group-item'>";
    echo "<a href='/../PhpProject1/html/views/pokaz_koszyk.php'>Koszyk<a/>";
    echo "<br>";
    echo "<br>";
    //echo "<a href='/../PhpProject1/html/views/logowanie.php'>Panel użytkownika</a>";       
    echo "</div>";
              echo "<br>"; 
               echo "<a href='/../PhpProject1/html/views/logout.php'>Wyloguj</a>";
    
    
}
function showCategory($kategorie_id = null){
    global $pdo;
    
    if($kategorie_id){
        $stmt = $pdo->prepare("SELECT * FROM produkty WHERE kategorie_id = :cid");
        $stmt ->bindValue(':cid',$kategorie_id,PDO::PARAM_INT);
        $stmt ->execute();
    }
    else{
         $stmt = $pdo->prepare("SELECT * FROM produkty");
         $stmt ->execute();
    }
   
    while($row = $stmt -> fetch(PDO::FETCH_ASSOC)){
       
          echo "<div class='col-sm-4 col-lg-4 col-md-4'>";
          echo "<div class='list-group-item'>";
          echo "<h4>".$row['Nazwa']."</h4>";
          
           $filename = "../image/mini/".$row['index'].".jpg.jpg";
           if(file_exists($filename)){
               echo"<img src=$filename>";               
           }
           
            
            echo "<div class='caption'>";
            echo $row['Opis'];
            echo "</div>";
            echo "<div class='thumbnail'>";
            echo "<div class='pull-right'>";
            echo "<p><b>Cena</b>: ".$row['Cena']; echo " <b>zł</b>" ;
            echo "</div>";
            echo "</div>";
            $id_Produkty = $row['id_Produkty'];
            echo "<a href='dodajdokoszyka.php?id_Produkty=$id_Produkty'>Dodaj do koszyka</a>";
            echo "</div>";
            echo "</div>";
            }
                   
        
        
    }
   
    

function random_session_id(){
    
    $utime = time();
    $id = random_salt(40-strlen($utime)).$utime;
    return $id;
}
function random_salt($len){
    return random_text($len);
}



function random_text($len){
    $base = 'QWERTYUIOPASDFGHJKLZXCVBNMqwertyuiopasdfghjklzxcvbnm1234567890';
    $max = strlen($base) -1;
    $rstring = '';
    mt_srand((double)  microtime()*1000000);
    while(strlen($rstring) < $len)
        $rstring.=$base[mt_rand (0, $max)];
    return $rstring;
}

?>