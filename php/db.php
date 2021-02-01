<?php

  $pdo = new PDO('mysql:host=mysql;dbname=semexe','gustavo', 'gustavo');
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);