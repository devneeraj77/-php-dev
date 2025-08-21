<?php
// create-file.php

// Function to generate SEO slug from text
function createSlug($string) {
    // Convert to lowercase
    $slug = strtolower($string);
    // Replace non-alphanumeric with hyphens
    $slug = preg_replace('/[^a-z0-9]+/i', '-', $slug);
    // Trim hyphens from start and end
    $slug = trim($slug, '-');
    return $slug;
}

// Example: title of page or service
$title = "Plumbing Service in New York Cityf";

// Generate slug
$slug = createSlug($title);

// Define new filename with .php extension
$filename = $slug . ".php";

// Check if file already exists
if (!file_exists($filename)) {
    // Create file with some default content
    $content = "<?php\n";
    $content .= "// Auto-generated file: $filename\n";
    $content .= "?>\n";
    $content .= "<!DOCTYPE html>\n<html>\n<head>\n";
    $content .= "<meta charset='UTF-8'>\n";
    $content .= "<title>$title</title>\n";
    $content .= "</head>\n<body>\n";
    $content .= "<h1>$title</h1>\n";
    $content .= "<p>This page was generated dynamically.</p>\n";
    $content .= "</body>\n</html>";

    // Write file
    file_put_contents($filename, $content);

    echo "✅ File created successfully: $filename";
} else {
    echo "⚠️ File already exists: $filename";
}
?>
