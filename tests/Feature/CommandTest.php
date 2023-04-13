<?php

test('command "cache" is correctly loaded', function () {
    $app = getMinicli();
    $app->runCommand(['minicli', 'cache']);
})->expectOutputRegex("/librarian cache/");
