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

        $result = $con->query("SELECT * FROM kontrahenci order by 1 ASC");

        if ($result->num_rows > 0) {
            echo "<table id='t1'>";
            echo "<tr>
                <th>NIP</th>
                <th>REGON</th>
                <th>NAZWA</th>
                <th>CZY PŁATNIK VAT?</th>
                <th>ULICA</th>
                <th>NUMER DOMU</th> 
                <th>NUMER MIESZKANIA</th>          
            </tr>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["nip"] . "</td>";
                echo "<td>" . $row["regon"] . "</td>";
                echo "<td>" . $row["nazwa"] . "</td>";
                echo "<td>" . $row["platnik_vat"] . "</td>";
                echo "<td>" . $row["ulica"] . "</td>";
                echo "<td>" . $row["nr_domu"] . "</td>";
                echo "<td>" . $row["nr_mieszkania"] . "</td>";
                echo "<td><a href='usun.php?id=".$row["nip"]."'>Usuń</a></td>";
                echo "</tr>";
            }

            echo "</table>";
        }
        $con->close();
        ?>

        <br>
        <form action="dodaj.php">
            <input type="submit" value="Dodaj rekord" />
        </form>
        
    </div>

</body>

</html>