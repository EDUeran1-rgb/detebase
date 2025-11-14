<!DOCTYPE html>
<html lang="en">
    <?php
    $host="localhost";
    $user="root";
    $pass="";
    $db="dadabas";
    $conn=mysqli_connect($host, $user, $pass, $db);
    if(isset($_POST['btn'])){
        $joketext=$_POST['joketext'];
        $jokeanswer=$_POST['jokeanwer'];
        $sql="INSERT INTO jokes(joketext, jokeanwer) VALUES('$joketext','$jokeanswer')";
        $result=mysqli_query($conn,$sql);
        
    }
    $sql="SELECT * FROM jokes ORDER BY score DESC";
    $result=mysqli_query($conn,$sql);
    ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Detebase</h1>
    </header>
    <main>
        <section>
            <form action="index.php" method="post">
                <label> Pappaskämpet 
                    <textarea name="joketext"></textarea>
                </label>
                <label>Svaret på skämtet
                    <input type="text" name="jokeanwer">
                </label>
                <input type="submit" value="Lägg in" name="btn">
            </form>
        </section>
        <section>
            <?php while($row=mysqli_fetch_assoc($result)): ?>
                <details><summary><?=$row['joketext']?></summary><?=$row['jokeanwer']?></details>
            <?php endwhile ?>
        </section>
    </main>
    <div class="sak"></div>
    <footer>&copy; Sniperking 2025 <div class="sak"></div> </footer>
</body>
</html>