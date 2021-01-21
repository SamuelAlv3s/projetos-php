<?php

if (isset($_POST['enviar-form'])) :

    $formatosPermitidos = array("png", "jpeg", "jpg", "tiff", "gif");
    $contador = 0;
    $quantidade = count($_FILES['arquivo']['name']);

    while ($contador < $quantidade) :

        $extensao = pathinfo($_FILES['arquivo']['name'][$contador], PATHINFO_EXTENSION);

        if (in_array($extensao, $formatosPermitidos)) :
            $pasta = "arquivos/";
            $temporario = $_FILES['arquivo']['tmp_name'][$contador];
            $novoNome = uniqid() . ".$extensao";

            if (move_uploaded_file($temporario, $pasta . $novoNome)) :
                echo "Upload feito com sucesso!";
            else :
                echo "Erro: não foi possível dazer o upload do arquivo :(";
            endif;
        else :
            echo "Formato inválido";
        endif;
        $contador++;
    endwhile;
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
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
        <input type="file" name="arquivo[]" multiple>
        <input type="submit" value="Enviar" name="enviar-form">
    </form>
</body>

</html>