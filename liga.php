<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl2.css">
    
    <title>piłka nożna</title>
</head>
<body>
    <div id="baner">
        <h3>Reprezentacja Polski w piłce nożnej</h3>
        <img src="obraz1.jpg" alt="reprezentacja">
    </div>
    <div id="lewy">
        <form action="liga.php" method="POST">
            <select name="lista" id="l1">
                <option value="1">Bramkarze</option>
                <option value="2">Obrońcy</option>
                <option value="3">Pomocnicy</option>
                <option value="4">Napastnicy</option>
            </select>
            <input type="submit" value="Zobacz">
        </form>
        <img src="zad2.png" alt="piłka">
        <p>Autor:PESEL</p>
    </div>
    <div id="prawy">
        <ol>
        <?php
        if(isset($_POST["lista"])){
        $host="localhost";
        $user="root";
        $pass="";
        $dbname="pilkaphp";
        $pozycja_id=$_POST["lista"];

        $conn=mysqli_connect($host,$user,$pass,$dbname);

        if(!$conn){
            echo ("failed" . mysqli_connect_error());
        } else //echo "connected";

        $sql="SELECT imie,nazwisko FROM `zawodnik` WHERE `pozycja_id`=$pozycja_id";
        $result=mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)>0){
            while($row=mysqli_fetch_assoc($result)){
                echo "<li>" . $row["imie"] . " " . $row["nazwisko"] . "</li>";
            } 
        } else echo "0 results";
    
        mysqli_close($conn);
    } else echo "";
        ?>
        </ol>
    </div>
    <div id="glowny">
        <h3>Liga mistrzów</h3>
    </div>
    <div id="liga">
        <?php
        $host="localhost";
        $user="root";
        $pass="";
        $dbname="pilkaphp";

        $conn=mysqli_connect($host,$user,$pass,$dbname);

        if(!$conn){
            echo ("failed" . mysqli_connect_error());
        } else //echo "connected";

        $sql1="SELECT zespol,punkty,grupa FROM `liga` ORDER BY punkty DESC";
        $result=mysqli_query($conn,$sql1);

        if(mysqli_num_rows($result)>0){
            while($row=mysqli_fetch_assoc($result)){
                echo "<div class=div>";
                echo "<h2>" . $row["zespol"] . "</h2>";
                echo "<p>" . $row["punkty"] . "</p>";
                echo "<p>grupa: " . $row["grupa"] . "</p>";
                echo "</div>";
            }
        } else echo "";
        ?>
    </div>
</body>
</html>