<?php
if (isset($_POST['enviar-form'])) :
    $erros = array();

    if (!$idade = filter_input(INPUT_POST, 'idade', FILTER_VALIDATE_INT)) :
        $erros[] = "Idade precisa ser um inteiro";
    endif;

    if (!$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL)) :
        $erros[] = "Informe um E-mail válido";
    endif;

    if (!$peso = filter_input(INPUT_POST, 'peso', FILTER_VALIDATE_FLOAT)) :
        $erros[] = "Precisa ser um float";
    endif;

    if (!$ip = filter_input(INPUT_POST, 'ip', FILTER_VALIDATE_IP)) :
        $erros[] = "IP Inválido";
    endif;

    if (!$url = filter_input(INPUT_POST, 'url', FILTER_VALIDATE_URL)) :
        $erros[] = "URL Inválida";
    endif;

    if (!empty($erros)) :
        foreach ($erros as $erro) :
            echo "<li>$erro</li>";
        endforeach;
    else :
        echo "Dados corretos!";
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
        Idade: <input type="text" name="idade"><br>
        E-mail: <input type="text" name="email"><br>
        Peso: <input type="text" name="peso"><br>
        IP: <input type="text" name="ip"><br>
        URL: <input type="text" name="url"><br>
        <button type="submit" name="enviar-form">Enviar</button>
    </form>
</body>

</html>