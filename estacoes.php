<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estação do Ano</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 20px;
        }
        .station-image {
            max-width: 300px;
            height: auto;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h1>Descubra a Estação do Ano</h1>
    <form method="POST">
        <label for="date">Selecione uma data:</label><br>
        <input type="date" id="date" name="date" required><br><br>
        <button type="submit">Ver Estação</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['date'])) {
        // Obtém a data inserida pelo usuário
        $inputDate = $_POST['date'];
        $date = strtotime($inputDate);
        $day = (int)date('d', $date);
        $month = (int)date('m', $date);

        $season = '';
        $image = '';

        // Define as estações do ano
        if (($month == 12 && $day >= 21) || $month == 1 || $month == 2 || ($month == 3 && $day < 20)) {
            $season = 'Verão';
            $image = 'https://www.cnnbrasil.com.br/wp-content/uploads/sites/12/2023/12/solsticio-verao-equinocio-praia-sol.jpg?w=1200&h=900&crop=1';
        } elseif (($month == 3 && $day >= 20) || $month == 4 || $month == 5 || ($month == 6 && $day < 21)) {
            $season = 'Outono';
            $image = 'https://static.mundoeducacao.uol.com.br/mundoeducacao/2020/11/folhas.jpg';
        } elseif (($month == 6 && $day >= 21) || $month == 7 || $month == 8 || ($month == 9 && $day < 23)) {
            $season = 'Inverno';
            $image = 'https://static.escolakids.uol.com.br/2020/07/frio-extremo.jpg';
        } elseif (($month == 9 && $day >= 23) || $month == 10 || $month == 11 || ($month == 12 && $day < 21)) {
            $season = 'Primavera';
            $image = 'https://media.istockphoto.com/id/1130636356/pt/foto/sunset-over-mountain-with-cosmos-blooming.jpg?s=612x612&w=0&k=20&c=3NU9v9t8wN90ZZmtckwXCSIaw4dTu9Cpu7W_xsC1dxA=';
        }

        // Exibe o resultado
        echo "<h2>Estação do Ano: $season</h2>";
        echo "<img src='$image' alt='$season' class='station-image'>";
    }
    ?>
</body>
</html>
