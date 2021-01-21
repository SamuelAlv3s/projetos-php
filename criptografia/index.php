<?php

/* $senha = "12345";

$novasenha = base64_encode($senha)."<br>";
echo $novasenha;
echo base64_decode($novasenha)."<br>";

echo md5($senha)."<br>";

echo sha1($senha); */

$senha = "123456";
$senha_db = '$2y$10$PkIrqRF4t2EyacO3YqOt1uGGtVtXk2vKBfFl.3k73xFKK2peoigG.';

$options = [
    'cost' => 10
];

$senhasegura = password_hash($senha, PASSWORD_DEFAULT, $options);


if(password_verify($senha, $senha_db)):
    echo "Senha válida";
else:
    echo "Senha inválida";
endif;

?>