<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Port Lotniczy</title>
    <link rel="stylesheet" href="styl5.css">
</head>
<body>
    <section id="baner">
        <div id="logo">
            <img src="zad5.png" alt="logo lotnisko" height='200px'>
        </div>
        <div id="title">
            <h1>Przyloty</h1>
        </div>
        <div id="linki">
            <h3>przydatne linki</h3>
            <a href="kwerendy.txt">Pobierz...</a>
        </div>
    </section>

    <section id="main">
        <table>
            <tr>
                <th>CZAS</th>
                <th>KIERUNEK</th>
                <th>NUMER REJSU</th>
                <th>STATUS</th>
            </tr>
            <?php
                $db = mysqli_connect('localhost', 'root', '', 'egzamin');
                $query = mysqli_query($db, "SELECT czas, kierunek, nr_rejsu, status_lotu FROM przyloty ORDER BY czas;");

                while($row = mysqli_fetch_array($query)) {
                    echo "<tr>
                        <td>$row[0]</td>
                        <td>$row[1]</td>
                        <td>$row[2]</td>
                        <td>$row[3]</td>
                    </tr>";
                }

                mysqli_close($db);
            ?>
        </table>
    </section>

    <footer>
        <div id='witaj'>
            <?php
                if(isset($_COOKIE['witaj'])) {
                    echo "<p>Witaj ponownie na stronie lotniska</p>";
                } else {
                    echo "<p>Dzień dobry! Strona lotniska używa ciasteczek</p>";
                    setcookie('witaj', ';pizda', time()+7200);
                }
            ?>
        </div>
        <div id='autor'>Autor: Kamil Wenta</div>
    </footer>
</body>
</html>