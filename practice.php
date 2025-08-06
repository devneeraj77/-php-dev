<?php

// Before PHP 8.1.0
$a = 1;

$globals = $GLOBALS; // Ostensibly by-value copy
$globals['a'] = 2;
// var_dump($a); // int(2)

// As of PHP 8.1.0
// this no longer modifies $a. The previous behavior violated by-value semantics.
$globals = $GLOBALS;
$globals['a'] = 1;

// To restore the previous behavior, iterate its copy and assign each property back to $GLOBALS.
foreach ($globals as $key => $value) {
    $GLOBALS[$key] = $value;
}

// $myfile = fopen("newfile.php", "w") or die("Unable to open file!");
// $txt = "John Doe\n";
// fwrite($myfile, $txt);
// $txt = "Jane Doe\n";
// fwrite($myfile, $txt);
// fclose($myfile);

function createSEOslug(string $string) {
$slug = strtolower($string);
$slug = preg_replace('/[^a-z0-9-]+/', '-', $slug);
$slug = preg_replace('/-+/', '-', $slug);
$slug = trim($slug, '-');
return $slug;
}
$title = "hello that kind of SEO freindly slug.";
$seoSlug = createSEOslug($title);

$anotherTitle = "This is an Example Title with Special Characters! 123";
$anotherSlug = createSEOslug($anotherTitle);
echo $seoSlug ."<br>";
// $myfile = fopen(`{$anotherSlug}.php`, "w") or die("Unable to open file!");
$txt = "John Doe\n";
fwrite(`{$anotherSlug}.php`, "w", $txt);
// echo $anotherSlug;



?>