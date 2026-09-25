<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Resolvedor Matemático</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            margin: 0;
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

        h1 {
            text-align: center;
        }

        input {
            width: 100%;
            padding: 12px;
            font-size: 18px;
            box-sizing: border-box;
            margin-bottom: 15px;
        }

        button {
            width: 100%;
            padding: 12px;
            background: #198754;
            color: white;
            border: none;
            font-size: 18px;
            cursor: pointer;
        }

        button:hover {
            background: #146c43;
        }

        .resultado {
            margin-top: 25px;
            padding: 20px;
            background: #f8f9fa;
            border-left: 5px solid #198754;
        }

        .passo {
            margin: 10px 0;
            font-size: 18px;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>Resolvedor Matemático</h1>

    <form action="resolver.php" method="POST">

        <label>Digite uma equação:</label>

        <input
            type="text"
            name="equacao"
            placeholder="Ex: 2x + 5 = 15"
            required
        >

        <button type="submit">
            Resolver
        </button>

    </form>

</div>

</body>
</html>