<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $filename = 'movies.txt';
    $name = $_POST['name'];
    $year = $_POST['year'];
    $country = $_POST['country'];
    $rating = $_POST['rating'];

    if (!empty($name) && !empty($year) && !empty($country) && !empty($rating)) {
        $movieData = "$name|$year|$country|$rating";
        file_put_contents($filename, $movieData . PHP_EOL, FILE_APPEND);
    }
    header('Location: index.html');
    exit();
}
?>
