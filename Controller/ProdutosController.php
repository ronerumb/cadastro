<?php

class ProdutosController{

    public function index()
    {
        $loader = new \Twig\Loader\FilesystemLoader('./View/');
        $twig = new \Twig\Environment($loader);
        $template = $twig->load('Cadastroprodutos.html');        

        $conteudo = $template->render();
        echo $conteudo;
    }

    public function gravar()
    {
        $nome = $_POST['nome'];
        $select = $_POST['select'];
        $estoque =  $_POST['estoque'];
       $retorno = Banco::Bancogravar($nome,$select,$estoque);
       if($retorno == true){
        echo'<meta http-equiv="refresh" content="0;url=./?pg=Produtos" />
        <script>alert("Cadastrado com sucesso");</script>';

       }

    }
    public function selecionar()
    {
        $retorno = Banco::Selecionar();

        $loader = new \Twig\Loader\FilesystemLoader('./View/');
        $twig = new \Twig\Environment($loader);
        $template = $twig->load('Selecionarprodutos.html');        
        $parametros = array();
        $parametros['Produtos'] = $retorno;
        //var_dump($colecPostagens);

        $conteudo = $template->render($parametros);
        echo $conteudo;
    }

    public function editar()
    {
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $gramatura = $_POST['quilo'];
        $estoque = $_POST['estoque'];
        $retorno = Banco::Editar($id,$nome,$gramatura,$estoque);
        if($retorno == 1){
         echo'<meta http-equiv="refresh" content="0;url=./?pg=Produtos&metodo=selecionar" />
         <script>alert("Dados atualizados com sucesso");</script>';

        }else{
            echo "Ocorreu um erro";
        }



    }


    public function delete()
    {
        $id = $_POST['id'];
        
        $retorno = Banco::Deletar($id);
        if($retorno == 1){
         echo'<meta http-equiv="refresh" content="0;url=./?pg=Produtos&metodo=selecionar" />
         <script>alert("Deletado com sucesso");</script>';

        }else{
            echo "Ocorreu um erro";
        }

    }
}