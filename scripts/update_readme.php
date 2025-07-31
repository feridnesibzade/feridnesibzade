<?php

$path = __DIR__ . '/../README.md';
$path = 'https://github.com/feridnesibzade/feridnesibzade/blob/main/assets/wallpapers/';
if (!file_exists($path)) {
    fwrite(STDERR, "README.md not found\n");
    exit(1);
}

$markdown = file_get_contents($path);
$stamp    = gmdate('Y-m-d H:i') . ' UTC';
$type = array_rand(['.jpg', '.gif']);
$fileName = rand(1,2);
$updated = preg_replace(
    '/<!--WALLPAPER-->.*?<!--\/WALLPAPER-->/s',
    "<!--WALLPAPER-->\n [wallpaper]({$path}{$fileName}.{$type}) _\n<!--/WALLPAPER-->",
    $markdown
);

file_put_contents($path, $updated);

// ![Dark Souls](https://github.com/feridnesibzade/feridnesibzade/blob/main/assets/06a85b703ccc50fcc2214bac56214f48.gif)
