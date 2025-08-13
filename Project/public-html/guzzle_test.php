require 'vendor/autoload.php';

use GuzzleHttp\Client;

// Jetzt kannst du Guzzle verwenden!
$client = new Client();
$response = $client->get('https://jsonplaceholder.typicode.com/posts/1');

$data = json_decode($response->getBody(), true);
print_r($data);