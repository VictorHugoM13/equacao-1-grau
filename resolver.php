<?php

$equacao = $_POST['equacao'] ?? '';

$equacao = strtolower(trim($equacao));

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <title>Resultado</title>

    <style>

        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            padding: 40px;
        }

        .container {
            max-width: 700px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px #ccc;
        }

        .passo {
            font-size: 20px;
            margin: 15px 0;
        }

        .resultado {
            background: #d1e7dd;
            padding: 15px;
            margin-bottom: 25px;
            border-radius: 5px;
            font-size: 22px;
        }

        .erro {
            background: #f8d7da;
            padding: 15px;
            color: #842029;
        }

        a {
            display: inline-block;
            margin-top: 20px;
        }

    </style>

</head>

<body>

<div class="container">

<h1>Resolução</h1>

<?php

/*
|--------------------------------------------------------------------------
| Verifica se existe =
|--------------------------------------------------------------------------
*/

if (strpos($equacao, '=') === false) {

    echo "<div class='erro'>";
    echo "Digite uma equação válida contendo =.";
    echo "</div>";

    exit;
}


/*
|--------------------------------------------------------------------------
| Separa os dois lados
|--------------------------------------------------------------------------
*/

$partes = explode('=', $equacao);

$esquerda = trim($partes[0]);
$direita = trim($partes[1]);


/*
|--------------------------------------------------------------------------
| Verifica se existe x
|--------------------------------------------------------------------------
*/

if (strpos($esquerda, 'x') === false) {

    echo "<div class='erro'>";
    echo "Este exemplo trabalha com equações que possuem x.";
    echo "</div>";

    exit;
}


/*
|--------------------------------------------------------------------------
| Remove espaços
|--------------------------------------------------------------------------
*/

$esquerda = str_replace(' ', '', $esquerda);
$direita = str_replace(' ', '', $direita);


/*
|--------------------------------------------------------------------------
| Tenta identificar:
|
| ax + b = c
|
|--------------------------------------------------------------------------
*/

if (preg_match('/^([+-]?\d*)x([+-]\d+)?$/', $esquerda, $matches)) {

    /*
    |--------------------------------------------------------------------------
    | Coeficiente de x
    |--------------------------------------------------------------------------
    */

    $coeficiente = $matches[1];

    if ($coeficiente === '' || $coeficiente === '+') {
        $coeficiente = 1;
    } elseif ($coeficiente === '-') {
        $coeficiente = -1;
    } else {
        $coeficiente = (int)$coeficiente;
    }


    /*
    |--------------------------------------------------------------------------
    | Termo independente
    |--------------------------------------------------------------------------
    */

    $termo = $matches[2] ?? 0;

    $termo = (int)$termo;

    /*
    |--------------------------------------------------------------------------
    | Valor do lado direito
    |--------------------------------------------------------------------------
    */

    $resultadoDireita = (int)$direita;


    /*
    |--------------------------------------------------------------------------
    | Calcula
    |--------------------------------------------------------------------------
    */

    $novoValor = $resultadoDireita - $termo;

    $x = $novoValor / $coeficiente;


    /*
    |--------------------------------------------------------------------------
    | Exibe
    |--------------------------------------------------------------------------
    */

    echo "<p><strong>Equação:</strong> $equacao</p>";

    echo "<div class='resultado'>";
    echo "Resultado: <strong>x = $x</strong>";
    echo "</div>";

    echo "<h2>Resolução passo a passo</h2>";

    echo "<div class='passo'>";
    echo "1. Equação original:";
    echo "<br>";
    echo "<strong>$coeficiente" . "x";

    if ($termo >= 0) {
        echo " + $termo";
    } else {
        echo " - " . abs($termo);
    }

    echo " = $resultadoDireita</strong>";
    echo "</div>";


    echo "<div class='passo'>";
    echo "2. Isolamos o termo com x:";
    echo "<br>";
    echo "<strong>$coeficiente" . "x = $resultadoDireita - ($termo)</strong>";
    echo "</div>";


    echo "<div class='passo'>";
    echo "3. Realizamos a operação:";
    echo "<br>";
    echo "<strong>$coeficiente" . "x = $novoValor</strong>";
    echo "</div>";


    echo "<div class='passo'>";
    echo "4. Dividimos os dois lados por $coeficiente:";
    echo "<br>";
    echo "<strong>x = $novoValor / $coeficiente</strong>";
    echo "</div>";


    echo "<div class='passo'>";
    echo "5. Resultado:";
    echo "<br>";
    echo "<strong>x = $x</strong>";
    echo "</div>";

} else {

    echo "<div class='erro'>";
    echo "Formato de equação não reconhecido.";
    echo "<br><br>";
    echo "Experimente: <strong>2x + 5 = 15</strong>";
    echo "</div>";
}

?>

<br>

<a href="index.php">← Nova equação</a>

</div>

</body>
</html>