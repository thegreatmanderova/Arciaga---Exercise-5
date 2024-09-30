<?php

$vocabulary = array(
  "html" => "<b>HTML</b> or Hypertext Markup Language is the standard markup language for creating web pages and web applications. It is used to structure content and make it visually appealing on the web.",
  "php" => "<b>PHP</b> or Hypertext Preprocessor is a widely-used, open-source server-side scripting language primarily designed for web development. ",
  "sql" => "<b>SQL</b> (Structured Query Language) is a standardized programming language used for managing and manipulating relational databases. It allows users to perform various operations on the data stored in these databases.",
  "ui" => "<b>UI</b> or User Interface refers to the design of user interfaces for software or machines",
  "ux" => "<b>UX</b> (User Experience) focuses on the overall experience a user has when interacting with a product.",
  "vpn" => "Virtual Private Network is a service that creates a secure, encrypted connection over a less secure network, often used for secure remote access.",
  "api" => "<b>API</b> stands for Application Programming Interface is a set of rules and protocols for building and interacting with software applications, allowing different programs to communicate.",
  "css" => "<b>CSS</b> stands as Cascading Style Sheets, a stylesheet language used to describe the presentation of a document written in HTML or XML. It controls the layout, design, and overall look of web pages.",
  "os" => "Operating System or <b>OS</b> is system software that manages computer hardware and software resources, providing common services for computer programs. ",
  "lan" => "Local Area Network or <b>LAN</b> is a network that connects computers and devices within a limited geographical area, such as a home, office, or school.",
  "wan" => "Wide Area Network or <b>WAN</b> is a telecommunications network that covers a broad area, such as a city, country, or even globally."
);

// Function to retrieve word meaning
function get_meaning($word, $vocabulary) {
  $word = strtolower($word); // Convert to lowercase
  if (array_key_exists($word, $vocabulary)) {
    return $vocabulary[$word];
  } else {
    return "Word not found";
  }
}

// Function to retrieve auto suggestions
function get_suggestions($word, $vocabulary) {
  $word = strtolower($word); // Convert to lowercase
  $suggestions = array();
  foreach ($vocabulary as $key => $value) {
    if (strpos($key, $word) !== false) {
      $suggestions[] = $key;
    }
  }
  return $suggestions;
}

if (isset($_POST['action'])) {
  if ($_POST['action'] == 'search') {
    $word = $_POST['word'];
    $meaning = get_meaning($word, $vocabulary);
    echo $meaning;
  } elseif ($_POST['action'] == 'suggest') {
    $word = $_POST['word'];
    $suggestions = get_suggestions($word, $vocabulary);
    echo json_encode($suggestions);
  }
  exit;
}
?>