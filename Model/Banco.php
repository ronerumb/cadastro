<?php

class Banco{
    public static function Bancogravar($nome,$select,$estoque){
        $con = Connection::getConn();

        $sql = "INSERT INTO produto(nome,gramatura,estoque) values(?,?,?)";
        $prepare = $con->prepare($sql);
        $prepare->bindParam(1, $nome);
        $prepare->bindParam(2, $select);
        $prepare->bindParam(3, $estoque);
        $prepare->execute();
        if ($prepare->rowCount()) {
            return true;
        }
        throw new Exception("Falha na inserção");



    }

    public static function Selecionar(){
        $con = Connection::getConn();

        $sql = "SELECT * FROM produto";
        $prepare = $con->prepare($sql);
       
        $prepare->execute();
        $resultado = array();

        while ($row = $prepare->fetchObject()) {
            $resultado[] = $row;
        }

        if (!$resultado) {
           echo "Não foi encontrado nenhum registro no banco";		
        }

        return $resultado;


    }


    public static function Editar($id,$nome,$gramatura,$estoque){
        $con = Connection::getConn();
        try{
        $sql = "UPDATE produto set nome = ? , gramatura = ? , estoque = ? where id = ?";
        $prepare = $con->prepare($sql);
        $prepare->bindParam(1, $nome);
        $prepare->bindParam(2, $gramatura);
        $prepare->bindParam(3, $estoque);
        $prepare->bindParam(4, $id);
       
        $prepare->execute();
        

       
            return 1;
     


    } catch (PDOException $e) {
        print $e->getMessage();
    }

}


public static function Deletar($id){
    $con = Connection::getConn();
    try{
    $sql = "DELETE FROM produto where id = ?";
    $prepare = $con->prepare($sql);
    $prepare->bindParam(1, $id);
    
  
    $prepare->execute();
   
   
        return 1;
 


} catch (PDOException $e) {
    print $e->getMessage();
}

}
}
