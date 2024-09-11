<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CINEGORE - Draw Movie</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Draw a Movie</h1>
        <div class="draw-result">
            <?php
            $filename = 'movies.txt';
            if (file_exists($filename)) {
                $movies = file($filename, FILE_IGNORE_NEW_LINES);
                if (!empty($movies)) {
                    $randomIndex = array_rand($movies);
                    $selectedMovie = $movies[$randomIndex];
                    list($name, $year, $country, $rating) = explode('|', $selectedMovie);
                    echo "<h2>Selected Movie:</h2>";
                    echo "<p><strong>$name</strong> ($year) - $country - Rating: $rating/10</p>";
                } else {
                    echo "<p>No movies available to draw.</p>";
                }
            } else {
                echo "<p>No movies file found.</p>";
            }
            ?>
        </div>
        <a href="index.html" class="draw-button">Back to Home</a>
    </div>
</body>
</html>
