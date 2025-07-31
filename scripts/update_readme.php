<?php
$readme = __DIR__.'/../README.md';
$wallDir = __DIR__.'/../assets/wallpapers';

$files = array_filter(glob($wallDir.'/*'), 'is_file');
if (!$files) { exit("No wallpapers found\n"); }

$filename = basename($files[array_rand($files)]);
$relative = "assets/wallpapers/{$filename}";     // <-- README üçün yetərlidir
// $relative = "https://raw.githubusercontent.com/…/{$filename}"; // alternativ

$markdown = file_get_contents($readme);
$markdown = preg_replace(
    '/<!--WALLPAPER-->.*?<!--\/WALLPAPER-->/s',
    "<!--WALLPAPER-->\n![Wallpaper]({$relative})\n<!--/WALLPAPER-->",
    $markdown
);

file_put_contents($readme, $markdown);
