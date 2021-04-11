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
                echo "</tr>";
            }

            echo "</table>";
        }
        $con->close();
        ?>

        <?php
        if (isset($_POST["nip"])) {
            $nip = $_POST["nip"];
            $regon = $_POST["regon"];
            $nazwa = $_POST["nazwa"];
            $ulica = $_POST["ulica"];
            $nr_domu = $_POST["nr_domu"];
            $nr_mieszkania = $_POST["nr_mieszkania"];

            $czy_vat = $_POST['vat'];

            if (
                empty($nip) || empty($regon) || empty($nazwa)
                || empty($ulica) || empty($nr_domu) || empty($nr_mieszkania) || empty($czy_vat)
            ) {
                echo "Puste pola! Wypełnij wszystkie pola!";
            } else {
                $con = new mysqli("mysql.cba.pl", "lipczantest", "testW1", "lipczan") or die("Connection error!");

                $feedback = $con->query("INSERT INTO kontrahenci(nip,regon,nazwa,platnik_vat,ulica,nr_domu,nr_mieszkania) 
                VALUES ('$nip','$regon','$nazwa','$czy_vat','$ulica','$nr_domu','$nr_mieszkania')");


                if ($feedback) {
                    echo "<br>Dodano rekord!";
                    header('Location:kontrahenci.php?status=1');
                } else {
                    echo "<br>ERROR! Nie dodano użytkownika!";
                }

                $con->close();
            }
        }
        ?>

        <br>
        <form method="POST" action="dodaj.php">
            NIP: <input name="nip" type="text"><br>
            REGON: <input name="regon" type="text"><br>
            NAZWA: <input name="nazwa" type="text"><br>
            ULICA: <input name="ulica" type="text"><br>
            NUMER DOMU: <input name="nr_domu" type="text"><br>
            NUMER MIESZKANIA: <input name="nr_mieszkania" type="text">

            <label for="vat">Czy platnik VAT?</label>
            <select name="vat" id="vat">
                <option value=""></option>
                <option value="Tak">Tak</option>
                <option value="Nie">Nie</option>
            </select>
            <br><br>
            <input type="submit" value="Dodaj">
        </form>
    </div>

</body>

</html>