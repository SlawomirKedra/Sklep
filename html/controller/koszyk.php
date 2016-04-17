<?php
class koszyk {
    public function __construct() {
        
    }
    public function add($id){
        global $pdo, $session;
        
        $stmt = $pdo->prepare("SELECT * FROM koszyk WHERE produkt_id = :id AND session_id = :sid");
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->bindValue(':sid', $session->getSessionId(), PDO::PARAM_STR);
        $stmt->execute();
        
        if($row = $stmt->fetchAll(PDO::FETCH_ASSOC)){
            //update
            
            $qty = $row[0]['quantity'] +1;
            
            $stmt = $pdo->prepare("UPDATE koszyk SET quantity = :qty WHERE session_id = :sid AND produkt_id = :pid");
            $stmt->bindValue(':qty', $qty, PDO::PARAM_INT);
            $stmt->bindValue(':sid', $session->getSessionId(), PDO::PARAM_STR);
            $stmt->bindValue(':pid', $id, PDO::PARAM_INT);
            $stmt->execute();
        }
        else{
            
        $stmt = $pdo->prepare("INSERT INTO koszyk (id, session_id, produkt_id, quantity) VALUES (null, :sid, :pid, 1)");
        $stmt->bindValue(':sid', $session->getSessionId(), PDO::PARAM_STR);
        $stmt->bindValue(':pid', $id, PDO::PARAM_INT);
        $stmt->execute();
        }
    }
    
    public function remove($id){
        global $pdo, $session;
        
        $stmt = $pdo->prepare("SELECT * FROM koszyk WHERE produkt_id = :id AND session_id = :sid");
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $stmt->bindValue(':sid', $session->getSessionId(), PDO::PARAM_STR);
        $stmt->execute();
        
        ($row = $stmt->fetchAll(PDO::FETCH_ASSOC));
        $qty = $row[0]['quantity'];
        $qty--;
        
        if($qty == 0){
        $stmt = $pdo->prepare("DELETE FROM koszyk WHERE produkt_id = :id AND session_id = :sid");
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $stmt->bindValue(':sid', $session->getSessionId(), PDO::PARAM_STR);
        $stmt->execute();
          } 
          else{
              $stmt = $pdo->prepare("UPDATE koszyk SET quantity = :qty WHERE produkt_id = :id AND session_id = :sid");
              $stmt->bindValue(':qty', $qty, PDO::PARAM_INT);
              $stmt->bindValue(":id", $id, PDO::PARAM_INT);
              $stmt->bindValue(':sid', $session->getSessionId(), PDO::PARAM_STR);
              $stmt->execute();
          }
    
        }
    
    public function getProducts(){
        global $pdo, $session;
        
        
        $stmt = $pdo->prepare("SELECT k.id, p.Cena, k.quantity, p.index, p.Nazwa, p.id_Produkty as pid FROM koszyk k LEFT OUTER JOIN produkty p ON (k.produkt_id = p.id_Produkty) WHERE session_id = :sid");
        $stmt->bindValue(':sid', $session->getSessionId(), PDO::PARAM_STR);
        $stmt->execute();
        
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}
