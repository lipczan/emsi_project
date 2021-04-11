<!doctype html>

<html lang="pl">

<head>
    <meta charset="utf-8">
    <title>Zadanie zdalne e-MSI</title>
    <meta name="author" content="Hubert Lipski">

    <link rel="stylesheet" type="text/css" href="style.css?<?php echo time(); ?>" />

</head>

<body>
    <div id="Lewy">
        <ul class="abcd">
            <li><a href="kontrolki.html">Różne kontrolki HTML</a></li>
            <li><a href="pracownicy.html">Tabela Pracowników</a></li>
            <li><a href="faktury.html">Tabela Faktur VAT</a></li>
            <li><a href="delegacje.php">Tabela Delegacji BD</a></li>
            <li><a href="kontrahenci.php">Dane Kontrahentów</a></li>
            <br>
            <li><a href="index.html">Powrót do strony głównej</a></li>
        </ul>
    </div>
    <div id="Prawy">
        <?php
        $con = new mysqli("mysql.cba.pl", "lipczantest", "testW1", "lipczan") or die("Connection error!");

        $result = $con->query("SELECT * FROM delegacje order by 1 ASC");

        if ($result->num_rows > 0) {
            echo "<table id='t1'>";
            echo "<tr>
                <th>Lp.</th>
                <th>Imię i Nazwisko</th>
                <th>Data od:</th>
                <th>Data do:</th>
                <th>Miejsce wyjazdu:</th>
                <th>Miejsce przyjazdu:</th>            
            </tr>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["lp"] . "</td>";
                echo "<td>" . $row["imie_nazwisko"] . "</td>";
                echo "<td>" . $row["data_od"] . "</td>";
                echo "<td>" . $row["data_do"] . "</td>";
                echo "<td>" . $row["m_wyjazd"] . "</td>";
                echo "<td>" . $row["m_przyjazd"] . "</td>";
                echo "</tr>";
            }

            echo "</table>";
        }
        $con->close();
        ?>
    </div>

</body>

</html>