<?php

header('Content-Type: application/json');

$books = [
    [
        "title" => "To Kill a Mockingbird",
        "author" => "Harper Lee", 
        "year" => 1960,
        "isbn" => "978-0-06-112008-4"
    ],
    [
        "title" => "1984",
        "author" => "George Orwell",
        "year" => 1949, 
        "isbn" => "978-0-452-28423-4"
    ],
    [
        "title" => "Moby Dick",
        "author" => "Herman Melville",
        "year" => 1851,
        "isbn" => "978-0-14-243724-7"
    ],
    [
        "title" => "The Great Gatsby",
        "author" => "F. Scott Fitzgerald",
        "year" => 1925,
        "isbn" => "978-0-7432-7356-5"
    ]
    ];

$json = json_encode($books, JSON_PRETTY_PRINT);

echo $json;

// Save to a file
file_put_contents('books.json', $json);
echo "JSON data has been saved to books.json";
// Output the JSON data