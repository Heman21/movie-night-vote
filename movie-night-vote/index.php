<?php
// index.php

// Database connection.
include 'includes/database.php';

// Get all people from database.
$people = $db->query('SELECT * FROM people ORDER BY name');

// Get all movies from database.
$movies = $db->query('SELECT * FROM movies ORDER BY name');

?><!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Movie Night Vote</title>
  <link type="text/css" href="css/style.css" rel="stylesheet">
</head>

<body>

  <div id="wrapper">

    <header>

      <div id="user-info">
        <a href="login.html">Log in</a>
        <a href="admin.html">Site admin</a>
      </div>

      <h1>Movie Night Vote</h1>

      <nav>
        <ul>
          <li><a href="index.html">This week's vote</a></li>
          <li><a href="results.html">This week's results</a></li>
          <li><a href="previous.html">Previous results</a></li>
          <li><a href="about.html">About this site</a></li>
          <li><a href="contact.html">Contact</a></li>
        </ul>
      </nav>

    </header>

    <div id="content">

      <h2>This week's vote:</h2>

      <form method="GET" action="results.php">

        <div id="movies">

          <p>
            Hi
            <select name="name">
                <?php
                   foreach ($people as $person) {
                       echo '<option value="'.$person['id'].'">';
                       echo $person['name'];
                       echo '</option>';
                   }
                 ?>
            </select>
            !
          </p>

          <p>Which of the following movies would you like to see on the next Movie Night?<br>Pick your choice below!</p>

          <?php
            foreach ($movies as $movie) {
                $albumArt = 'img/'.$movie['id'].'.jpg';
                echo '<p class="movie">
                    <label for="vote_'.$movie['id'].'">
                        <img class="poster" alt="'.$movie['name'].'" src="'.$albumArt.'">
                        '.$movie['name'].'
                    </label>
                    <input type="radio" id="vote_'.$movie['id'].'" value="'.$movie['id'].'" name="vote">
                    <span class="synopsis">Peter Parker finds a clue...</span>
                    </p>';
            }
          ?>

          <input type="submit" value="Vote!" id="vote_button">

        </div>



      </form>

    </div>

  </div>

  <footer>
    <p class="small">A page by [your name]</p>
  </footer>

<script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>

</body>

</html>
