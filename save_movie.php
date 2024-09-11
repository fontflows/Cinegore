<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $year = htmlspecialchars($_POST['year']);
    $country = htmlspecialchars($_POST['country']);
    $rating = htmlspecialchars($_POST['rating']);

    $movieEntry = "$name ($year) - $country - Rating: $rating\n";

    file_put_contents('movies.txt', $movieEntry, FILE_APPEND);

    echo "<script>alert('Movie added successfully!'); window.location.href = 'index.html';</script>";
}
?>
