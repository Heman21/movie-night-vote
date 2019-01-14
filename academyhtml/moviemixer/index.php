<?php
// index.php

// Database connection.
include 'includes/database.php';

// Get all people from database.
$people = $db->query('SELECT * FROM people ORDER BY name');

$movies = $db->query('SELECT * FROM movies ORDER By name')
?>
<!DOCTYPE html>

<html lang="en">

<!--Header Start-->
<head>
  <meta charset="utf-8">
  <title>Movie Mixer</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<!-- HEADER End -->


<!-- Body Start -->
<body>
  <div id="wrapper">
    <div class="user-info">
        <a href="#">Log in</a>
        <a href="#">Site admin</a>
    </div>
     <header>
      <img src="images/logo.png" alt="Logo of the page" id="logo">
      <nav>



        <ul>
          <li><a href="#">This week’s vote</a></li>
          <li><a href="#">This week’s results</a></li>
          <li><a href="#">Previous results</a></li>
          <li><a href="#">About this site</a></li>
          <li><a href="#">Contact</a></li>
        </ul>
      </nav>
    </header>
    <!-- HEADER end -->

    <!-- MAIN CONTENT start -->
    <div class = "content">
        <h2>This week’s vote</h2>

        <div id="form-wrapper">
            <form method="get" action="results.php">
            <p>Hi
              <select name="name">
                <?php
                  foreach ($people as $person) {
                    echo '<option value="'.$person['id'].'">';
                    echo $person['name'];
                    echo '</option>';
                  }
                ?>
              </select>
            </p>

            <p>Which of the following movies would you like to see on the next Movie Night? <br>Pick your choice below!</p>

            <?php
              foreach ($movies as $movie) {
                $albumArt = 'images/'.$movie['id'].'.jpg';
                echo '<p class="movie">
                  <label for="vote_'.$movie['id'].'">
                    <img class="poster" alt="'.$movie['name'].'" src="'.$albumArt.'">
                  </label>
                  <input type="radio" id="vote_'.$movie['id'].'" value="'.$movie['id'].'" name="vote">
                  <span class="synopsis">'.$movie['name'].'</span>
                </p>';
              }
             ?>
            <input type="submit" value="Vote!" id="vote_button">
          </form>
      </div>
    </div>
  <!-- MAIN CONTENT end -->
  </div>

  <!--Footer Tag Start-->
  <footer>
    <p>A page by Hemanth</p>
  </footer>
  <!--Footer Tag End-->
</body>
<!--Body tag End-->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="js/script.s"></script>

</html> <!--End of html-->
