<?php
$readme = __DIR__.'/../README.md';
$wallDir = __DIR__.'/../assets/wallpapers';

$files = array_filter(glob($wallDir.'/*'), 'is_file');
if (!$files) { exit("No wallpapers found\n"); }

$filename = basename($files[array_rand($files)]);
$relative = "assets/wallpapers/{$filename}";

$markdown = file_get_contents($readme);
$markdown = preg_replace(
    '/<!--WALLPAPER-->.*?<!--\/WALLPAPER-->/s',
"<!--WALLPAPER-->
<p align='center'>
  <img src='{$relative}' alt='Banner'>
</p>
<!--/WALLPAPER-->",
    $markdown
);

file_put_contents($readme, $markdown);
