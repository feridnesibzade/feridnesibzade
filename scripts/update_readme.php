<?php

$readme = __DIR__ . '/../README.md';
$path = 'https://github.com/feridnesibzade/feridnesibzade/blob/main/assets/wallpapers/';
if (!file_exists($readme)) {
    fwrite(STDERR, "README.md not found\n");
    exit(1);
}

$markdown = file_get_contents($readme);
$stamp    = gmdate('Y-m-d H:i') . ' UTC';
$extensions = ['.jpg', '.gif'];
$type = $extensions[array_rand($extensions,1)];
$fileName = rand(1,2);
$updated = preg_replace(
    '/<!--WALLPAPER-->.*?<!--\/WALLPAPER-->/s',
    "<!--WALLPAPER-->\n![Wallpaper]({$path}{$fileName}{$type})\n<!--/WALLPAPER-->",
    $markdown
);

file_put_contents($readme, $updated);

// ![Dark Souls](https://github.com/feridnesibzade/feridnesibzade/blob/main/assets/06a85b703ccc50fcc2214bac56214f48.gif)
