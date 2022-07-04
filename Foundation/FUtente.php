<?php
/* La classe FUtente fornisce query per gli oggetti EUtente */
class FUtente extends FDatabase
{
    public function __construct()
    {
        parent::__construct(); //richiama il costruttore di FDatabase
        $this->table = 'utente';
        $this->valori = '(:$nome, :$cognome, :$username, :$password, :$email)';
        $this->class = 'FUtente';


    }

    public function getObjectFromRow($row)
    {
        $userOBJ = new EUtente($row['nome'], $row['cognome'], $row['username'], $row['password'], $row['email']);
        return $userOBJ;

    }

    public  function bind($stmt, EUtente $utente){
        $stmt->bindValue(':name',$utente->getName(), PDO::PARAM_STR);
        $stmt->bindValue(':cognome', $utente->getCognome(), PDO::PARAM_STR);
        $stmt->bindValue(':username', $utente->getUsername(), PDO::PARAM_STR);
        $stmt->bindValue(':password', $utente->getPassword(), PDO::PARAM_STR);
        $stmt->bindValue(':email', $utente->getEmail(), PDO::PARAM_BOOL);
    }

    public  function store($utente){
        $id=parent::store($utente);

    }

    public function updateUtente($utente){

        $u1=$this->update($utente->getId(),'nome',$utente->getNome());
        $u2=$this->update($utente->getId(),'cognome',$utente->getCognome());
        $u3=$this->update($utente->getId(),'username',$utente->getUsername());
        $u4=$this->update($utente->getId(),'password',$utente->getPassword());
        $u5=$this->update($utente->getId(),'email',$utente->getEmail());

        if($u1 && $u2 && $u3 && $u4 && $u5){
            return true;
        } else {
            return false;
        }
    }

    public function contaUtentiRegistrati()
    {
        $query ="SELECT COUNT(id) AS n FROM ".$this->table.";";
        try{
            $this->db->beginTransaction();
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $this->db->commit();
            return $row[0]['n'];


        }
        catch (PDOException $e)
        {
            $this->db->rollBack();
            echo "  errore: " . $e->getMessage();
            return null;
        }

    }

    public function utentiByString ($array, $toSearch)
    {
        if ($toSearch == 'nome')
            $query = "SELECT * FROM utente where name = '" . $array[0] . "' OR surname = '" . $array[0] . "';";
        else
            $query = "SELECT * FROM utente where name = '" . $array[0] . "' AND surname = '" . $array[1] . "' OR name = '" . $array[1] . "' AND surname = '" . $array[0] . "';";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $num = $stmt->rowCount();
        if ($num == 0)
            $result = null;
        elseif ($num == 1)
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
        else {
            $result = array();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            while ($row = $stmt->fetch())
                $result[] = $row;
        }
        return array($result, $num);
    }


    public static function loadUtentiByString($string){
        $utente = null;
        $toSearch = null;
        $pieces = explode(" ", $string);
        $lastElement = end($pieces);
        if ($pieces[0] == $lastElement) {
            $toSearch = 'nome';
        }
        list ($result, $rows_number)=$db->utentiByString($pieces, $toSearch);
        if(($result!=null) && ($rows_number == 1)) {
            $utente=new EUtente($result['name'],$result['surname'], $result['email'], $result['password']
        }
        else {
            if(($result!=null) && ($rows_number > 1)){
                $utente = array();
                for($i=0; $i<count($result); $i++){
                    $utente[]=new EUtente($result[$i]['name'],$result[$i]['surname'], $result[$i]['email'], $result[$i]['password']);
                }
            }
        }
        return $utente;
    }
}