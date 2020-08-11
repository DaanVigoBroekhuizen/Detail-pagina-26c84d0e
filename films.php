<?php
 $host = '127.0.0.1';
 $db   = 'netland';
 $user = 'root';
 $pass = '';
 $charset = 'utf8mb4';
 
 $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
 $options = [
     PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
     PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
     PDO::ATTR_EMULATE_PREPARES   => false,
 ];
 try {
      $pdo = new PDO($dsn, $user, $pass, $options);
 } catch (\PDOException $e) {
      throw new \PDOException($e->getMessage(), (int)$e->getCode());
 }
 $getal = $_GET["id"];
 $stmt = $pdo->prepare('SELECT * FROM movies WHERE id = :id');
 $stmt->execute(array(':id' => $getal));
 while ($row = $stmt->fetch()) {
        ?>
       <table>
            <a href="index.php">terug</a>
            <tr><th>datum van uitkomst</th> <td><?= $row['datum_van_uitkomst']?></td> </tr>
            <tr><th>land van afkomst</th> <td><?= $row['land_van_uitkomst']?></td> </tr>
    <tr>
        <h1><?= $row['title']?> - <?= $row['duur']?></h1>
    </tr>
    <p><?= $row['description']?></p>
        <?php
 }
    ?>
</table>
<div> 
<iframe width="420" height="315"
src="https://www.youtube.com/embed/<?= $row['youtube_trailer_id'] ?>">
</iframe> 
</div>