<?php
function basePath($path = '') {
    return __DIR__ . '/' . $path;
}

function loadPartial($name) {
    require basePath("views/partials/{$name}.php");
}

function loadView($name) {
    $viewPath = basePath("views/{$name}.view.php");
    if (file_exists($viewPath)) {
        require $viewPath;
    } else {
        echo "View {$viewPath} doesn't exist!";
    }
}


?>