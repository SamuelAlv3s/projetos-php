<?php
if (isset($_POST['enviar-form'])) :
    $erros = array();

    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);

    $idade = filter_input(INPUT_POST, 'idade', FILTER_SANITIZE_NUMBER_INT);
    if(!filter_var($idade, FILTER_VALIDATE_INT)):
        $erros[] =  "Idade precisa ser um Inteiro";
    endif;

    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)):
        $erros[] = "Informe um e-mail válido";
    endif;

    $url = filter_input(INPUT_POST, 'url', FILTER_SANITIZE_URL);
    if(!filter_var($url, FILTER_VALIDATE_URL)):
        $erro[] = "URL Inválida";
    endif;

    if(!empty($erros)):
        foreach($erros as $erro):
            echo "<li> $erro </li>";
        endforeach;
    else:
        echo "Dados Corretos";
    endif;

endif;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        Nome: <input type="text" name="nome"><br>
        Idade: <input type="text" name="idade"><br>
        E-mail: <input type="text" name="email"><br>
        URL: <input type="text" name="url"><br>
        <button type="submit" name="enviar-form">Enviar</button>
    </form>
</body>

</html>