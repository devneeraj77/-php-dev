<?php
// Assume you have a title from user input, database, etc.
$pageTitle = "My New Article Title with SEO Keywords!";



// Generate the SEO slug for the filename
$seoSlug = createSEOSlug($pageTitle);

// Define the file extension
$fileExtension = ".php"; // or ".html", ".txt", etc.

// Construct the full filename
$fileName = $seoSlug . $fileExtension;

// Define the content you want to write to the file
$fileContent = <<<PHP_CONTENT
<?php
// This is the content of your dynamically created PHP file.
// You can include dynamic data here as well.
\$title = "{$pageTitle}";
echo "<h1>Welcome to the \"{$title}\" page!</h1>";
echo "<p>This content was dynamically generated and saved to '{$fileName}'.</p>";
?>
PHP_CONTENT;

// Define the directory where you want to save the file
$targetDirectory = 'pages/'; 

// Ensure the directory exists and is writable
if (!is_dir($targetDirectory)) { //
    mkdir($targetDirectory, 0755, true); //
}

// Construct the full path to the new file
$filePath = $targetDirectory . $fileName;

// Open the file in write mode ("w") - this will create the file if it doesn't exist or overwrite it if it does
$fileHandle = fopen($filePath, "w"); //

if ($fileHandle) { // Check if the file was opened successfully
    // Write the content to the file
    fwrite($fileHandle, $fileContent); //

    // Close the file to save changes
    fclose($fileHandle); //

    echo "File '{$fileName}' created successfully in '{$targetDirectory}'.";
} else {
    echo "Error: Unable to create or open file '{$filePath}' for writing.";
}

function createNewFile() {
    
}
?>
