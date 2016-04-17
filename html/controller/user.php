<?php


class user {
    private $id;
    private $login;
    private $construct;
    
    public function __construct($anonymous = true){
        if($anonymous == true){
            $this->id = 0;
            $this->login = '';
            
        }
        $this->construct = true;
    }
    
    public function setLogin($login){
        $this->login = $login;
    }
    public function getLogin(){
        return $this->login;
    }
    
    public function getId(){
        return $this->id;
    }
    
    public function setId($id) {
        $this->id = $id;        
    }
    
    public function isAnonymous(){
        return($this->id == 0);
    }
    
    public function checkPasswords($login, $password){
        global $pdo;
        
        $stmt = $pdo->prepare("SELECT id_Klienci, login FROM klienci WHERE login=:login AND password=:password");
        $stmt->bindValue(":login", $login, PDO::PARAM_STR);
        $stmt->bindValue(":password", $password, PDO::PARAM_STR);
        $stmt->execute();
        
        if($row = $stmt->fetchAll(PDO::FETCH_ASSOC)){
            $newUser = new user;
            $newUser->setId($row[0]['id_Klienci']);
            $newUser->login = $row[0]['login'];
            return $newUser;
            
        }
        else{
            return 0;
        }
    }       
    
}
?>
