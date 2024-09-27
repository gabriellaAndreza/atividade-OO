<?php

class Vinho {
    private $nome;
    private $tipo;
    private $preco;
    private $safra;

    public function __construct($nome, $tipo, $preco, $safra) {
        $this->nome = $nome;
        $this->tipo = $tipo;
        $this->preco = $preco;
        $this->safra = $safra;
    }

    public function mostrarVinho() {
        return "Nome: " . $this->nome . "<br>Tipo: " . $this->tipo . "<br>Preço: R$ " . number_format($this->preco, 2, ',', '.') . "<br>Safra: " . $this->safra;
    }

    public function verificarPreco() {
        return $this->preco < 25;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $tipo = $_POST['tipo'];
    $preco = (float)$_POST['preco'];
    $safra = (int)$_POST['safra'];

    $vinho = new Vinho($nome, $tipo, $preco, $safra);
    echo "<h1>Informações do Vinho Cadastrado</h1>";
    echo $vinho->mostrarVinho() . "<br>";
    if ($vinho->verificarPreco()) {
        echo "<strong>Produto em Oferta!</strong>";
    } else {
        echo "<strong>Produto com o preço normal!</strong>";
    }

    echo '<br><a href="formulario_vinho.php">Cadastrar outro vinho</a>';
} else {
    echo "Nenhum dado foi enviado.";
}
?>
