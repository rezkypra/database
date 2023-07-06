<?php

include 'konek.php';
$sql = $konek->query('SELECT * from `event`');

?>

<html>
<body>
<head>
    <title>E-Industri</title>
    <link href="css/index.css" rel="stylesheet" type="text/css" />
</head>

<div class="container-2">
      <div class="content-2">
         <h2>Event</h2>
         <ul class="list-event">
         <?php while($row = $sql->fetch_assoc()) :?>
         <li>
            <img src=image/<?= $row['gambar'] ?> style="width: 200px; height: 200px"/>
            <span>
               <?= $row['nama_event'] ?>
               <!-- <br>
               <?= $row['tanggal_event'] ?> | Administrator 
               <br>
               di <?= $row['lokasi_event'] ?> -->
            </span>
         </li>
         <?php endwhile; ?>
         </ul>
</body>
</html>