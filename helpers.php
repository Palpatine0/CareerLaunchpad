<?php
function basePath($path = '') {
    return __DIR__ . '/' . $path;
}

function loadPartial($name) {
    $partialPath = basePath("views/partials/{$name}.php");
    if (file_exists($partialPath)) {
        require $partialPath;
    } else {
        echo "Partial {$name} doesn't exist!";
    }
}

function loadView($name) {
    $viewPath = basePath("views/{$name}.view.php");
    if (file_exists($viewPath)) {
        require $viewPath;
    } else {
        echo "View {$viewPath} doesn't exist!";
    }
}


function inspect($value) {
    echo '<pre>';
    var_dump($value);
    echo '<pre>';
}

function inspectAndDie($value) {
    echo '<pre>';
    var_dump($value);
    echo '<pre>';
    die();
}

?>