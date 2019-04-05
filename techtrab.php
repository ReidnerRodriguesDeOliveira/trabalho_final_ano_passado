<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->


<?php
//criar constantes para a conexão com o banco de dados
define('server', 'mysql:host=localhost; dbname=techtrab');
define('usuario', 'root');
define('senha', '');

//criar a classe produtos
class produtos
{
    // atributos / campos da tabela
    public $codigo;
    public $nome;
    public $tipo;
    public $marca;
    public $preco;
    public $tamanho;

    // metodos

    // metodo para listar nossos produtos
    public function listarTodos()
    {
        // criar a conexão com o banco de dados
        $pdo = new PDO(server, usuario, senha);
        // criar o comando sql
        $smtp = $pdo->prepare("select * from produtos order by codigo");
        // executar o comando no banco de dados
        $smtp->execute();
        // testar se retornou algum resultado
        if ($smtp->RowCount() > 0) {
            // retornar os dados para o html
            return $result = $smtp->fetchAll(PDO::FETCH_CLASS);
        }
    }

    public function listarCodigo($codigo)
    {
        if (isset($codigo)) {
            $this->codigo = $codigo;


            $pdo = new PDO(server, usuario, senha);
            // criar o comando sql
            $smtp = $pdo->prepare("select * from produtos where codigo= :codigo");
            // executar o comando no banco de dados
            $smtp->execute(array(
                ':codigo' => $this->codigo
            ));

            // testar se retornou algum resultado
            if ($smtp->RowCount() > 0) {
                // retornar os dados para o html
                return $result = $smtp->fetchObject();
            }
        }
    }
}
?>
