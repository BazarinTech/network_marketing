<?php 
include  '../bazarin-php-library/index.php';

$conn = new Connection('localhost', 'bazarin', 'bazarin', 'qashcheque');
$conn = $conn->connect();

$initiateGetContent = new FileGetContent('*');

$query = new QueryBuilder($conn);

$fileInit = new FileHelper();
