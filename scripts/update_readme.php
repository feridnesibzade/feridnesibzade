<?php

$path = __DIR__ . '/../README.md';
if (!file_exists($path)) {
    fwrite(STDERR, "README.md not found\n");
    exit(1);
}

$markdown = file_get_contents($path);
$stamp    = gmdate('Y-m-d H:i') . ' UTC';

$updated = preg_replace(
    '/<!--WALLPAPPER-->.*?<!--\/WALLPAPPER-->/s',
    "<!--WALLPAPPER-->\n _Last refresh: {$stamp} _\n<!--/WALLPAPPER-->",
    $markdown
);

file_put_contents($path, $updated);
