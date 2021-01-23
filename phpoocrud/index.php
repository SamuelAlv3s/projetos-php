<?php

require_once 'vendor/autoload.php';

$produto = new \App\Model\Produto();
$produto->setId(2);
$produto->setNome("Fone");
$produto->setDescricao("HyperX");

$produtoDao = new \App\Model\ProdutoDao();
$produtoDao->delete(2);

foreach($produtoDao->read() as $produto):
    echo $produto['nome']."<br>";
    echo $produto['descricao']."<br>";
endforeach;