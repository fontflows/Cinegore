<?php
if (isset($_GET['index']) && is_numeric($_GET['index'])) {
    $index = intval($_GET['index']);

    if (file_exists('movies.txt')) {
        $movies = file('movies.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        if (isset($movies[$index])) {
            unset($movies[$index]);
            $movies = array_values($movies); // Reindexar array

            // Salvar de volta no arquivo
            file_put_contents('movies.txt', implode("\n", $movies));
        }
    }
}

header("Location: view_movies.php");
exit();
?>
