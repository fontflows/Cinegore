<?php
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['index'])) {
    $filename = 'movies.txt';
    if (file_exists($filename)) {
        $movies = file($filename, FILE_IGNORE_NEW_LINES);
        if (isset($_GET['index']) && is_numeric($_GET['index'])) {
            $index = (int)$_GET['index'];
            if ($index >= 0 && $index < count($movies)) {
                array_splice($movies, $index, 1);
                file_put_contents($filename, implode("\n", $movies));
            }
        }
    }
    header('Location: view_movies.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CINEGORE - View Movies</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Movie List</h1>
        <div class="movie-list">
            <?php
            $filename = 'movies.txt';
            if (file_exists($filename)) {
                $movies = file($filename, FILE_IGNORE_NEW_LINES);
                foreach ($movies as $index => $movie) {
                    list($name, $year, $country, $rating) = explode('|', $movie);
                    echo "<div class='movie-item'>";
                    echo "<strong>$name</strong> ($year) - $country - Rating: $rating/10";
                    echo "<a href='view_movies.php?index=$index' class='delete-button'>Delete</a>";
                    echo "</div>";
                }
            } else {
                echo "<p>No movies found.</p>";
            }
            ?>
        </div>
        <a href="index.html" class="action-button">Back to Home</a>
    </div>
</body>
</html>
