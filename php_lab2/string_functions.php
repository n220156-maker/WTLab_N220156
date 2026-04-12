<?php
$str = " Hello World ";

// Basic
echo strlen($str)."<br>";
echo str_word_count($str)."<br>";
echo strrev($str)."<br>";

// Case
echo strtoupper($str)."<br>";
echo strtolower($str)."<br>";
echo ucfirst($str)."<br>";
echo ucwords($str)."<br>";

// Search & Replace
echo strpos($str, "World")."<br>";
echo str_replace("World", "PHP", $str)."<br>";

// Substring & Trim
echo substr($str, 1, 5)."<br>";
echo trim($str)."<br>";
echo ltrim($str)."<br>";
echo rtrim($str)."<br>";

// Comparison
echo strcmp("abc", "abc")."<br>";
echo strcasecmp("ABC", "abc")."<br>";

// Security
echo htmlspecialchars("<h1>Hello</h1>")."<br>";
echo addslashes("It's good")."<br>";
?>