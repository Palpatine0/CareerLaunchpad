<?php
function basePath($path = '') {
    return __DIR__ . '/' . $path;
}

function loadPartial($name) {
    require basePath("views/partials/{$name}.php");
}

?>