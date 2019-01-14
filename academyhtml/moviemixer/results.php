<?php
// results.php

// Database connection.
include 'includes/database.php';

// print_r($_GET); // Uncomment to help with debugging.

if (!empty($_GET['name']) && !empty($_GET['vote'])) {
 echo '<p>Saving vote...</p>';
 $query = 'INSERT INTO
 votes (person_id, movie_id)
 value (:person_id, :movie_id)';
 $personId = $_GET['name'];
 $movieId = $_GET['vote'];
 $stmt = $db->prepare($query);
 $stmt->bindParam('person_id', $personId);
 $stmt->bindParam('movie_id', $movieId);
try {
 $stmt->execute();
 echo '<p>Your vote has been saved.</p>';
 } catch (PDOException $e) {
 $error = $stmt->errorInfo();
 echo '<pre>Error:';
 print_r($error);
 echo '</pre>';
 }
}

// Warn if user did not select a movie.
if (empty($_GET['vote']) && !empty($_GET['name'])) {
 echo '<p>You did not select a movie.</p>';
}

// Display results.
echo '<h1>Results</h1>';

// Count rows in votes table.
$totalVotes = $db->query('SELECT count(*) FROM votes')
 ->fetchColumn();
echo "<p>Total votes: $totalVotes</p>";

// Get all movies from the database.
$movieQuery = $db->query('SELECT * FROM movies');
// Loop over each movie.
while ($movie = $movieQuery->fetch()) {
 // Get vote count for movie.
 $voteCount = $db->query('SELECT * FROM votes WHERE movie_id = '.$movie['id'])
 ->rowCount();
 echo '<p>' . $movie['name'].' (' . $voteCount . ')</p>';
}

?>
