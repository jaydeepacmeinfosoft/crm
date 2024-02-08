<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Facebook\Facebook;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Config;
use App\Http\Models\Leads;
use GuzzleHttp\Client;
use App\Models\Lead;
use Illuminate\Support\Facades\Http;
class ApiLeadGeneratation extends Controller
{
    public function fetchLeads()
{
    // try {
    //     // Initialize Facebook Graph API
    //     $fb = new Facebook([
    //         'app_id' => config('services.facebook.client_id'),
    //         'app_secret' => config('services.facebook.client_secret'),
    //         'default_graph_version' => config('services.facebook.default_graph_version'),
    //     ]);

    //     // Replace {LEAD_GEN_FORM_ID} with your actual lead generation form ID
    //     $leadGenFormId = 'YOUR_LEAD_GEN_FORM_ID';

    //     $accessToken = 'EAADkjcDnJkUBO9YxgWQroCDop0ksTZA2XbQZCqQpDqPrcIicgZCV9ju7T5wURYyEgonBtzUb0V5iiZC1VBHyEl2S76E4JTRrx4byov324xSWAmO72upbkZCk8pKWZArKz0vOJd42TYG0LZB1JCnbsZChtAQ0g49b128dkKj5ZCLjdZC1QkwkF8FZBXbQdZBgeKKJCZAO0QLlZAC3mp4aVAau5OnwZDZD';
    //     $response = $fb->get("/$leadGenFormId/leads?access_token=$accessToken");

    //     // Convert response to array
    //     $responseData = $response->getDecodedBody();
    //     dd($responseData);

    //     // Check if "data" key exists in the response
    //     if (isset($responseData['data'])) {
    //         $leads = $responseData['data'];

    //         // Store leads in the database
    //         foreach ($leads as $lead) {
    //             // Assuming you have a "leads" table in your database
    //             Lead::create([
    //                 'name' => $lead['name'],
    //                 'email' => $lead['email'],
    //                 // Add other fields as needed
    //             ]);
    //         }

    //         return response()->json(['message' => 'Leads fetched and stored successfully']);
    //     } else {
    //         return response()->json(['message' => 'No leads data found in the response']);
    //     }
    // } catch (\Exception $e) {
    //     // Handle any exceptions that may occur during the process
    //     return response()->json(['error' => 'An error occurred while fetching and storing leads: ' . $e->getMessage()]);
    // }
    
// try {
//             $accessToken = 'EAADkjcDnJkUBO4aXgihkRq5uZBVJVCeNRwqwO4RBtZBQyvtziIPQJ2RMD0pZBtLAtkllgpvHs8U2uBZBHQeHhBTwWrkadC1bMMEbaXkeHfVceYjwvpfUcE09L9ZAnJX4IF0indBoJpdpVsDjOXO5US5H57bEhL7vgTtEwRrvB0osOZCEuVXfMoR7Fm4ffYmtWZCZCyWZBSV9YO5wMm7cZA9SSYE6GIrXcZD'; // Replace with your Facebook access token
//             $userId = '251297477895749'; // Replace with the user's Facebook ID you want to access
//             $appSecret = '629b5e0896d8ec1170f2bfa2cb4ea4aa'; // Replace with your Facebook App Secret

//             // Calculate appsecret_proof
//             $appsecretProof = hash_hmac('sha256', $accessToken, $appSecret);

//             $client = new Client();
//             $response = $client->get("https://graph.facebook.com/v13.0/{$userId}?fields=id,name,email", [
//                 'query' => [
//                     'access_token' => $accessToken,
//                     'appsecret_proof' => $appsecretProof, // Include appsecret_proof in the query
//                 ],
//             ]);

//           return  $data = json_decode($response->getBody());

//             // Check if the response contains an error
//             if (isset($data->error)) {
//                 throw new \Exception('Facebook API Error: ' . $data->error->message);
//             }

//             // Store $data in your database table (assuming you have a User model)
//             Lead::updateOrCreate(['id' => $data->id], [
//                 'name' => $data->name,
//                 'email' => $data->email,
//             ]);

//             return "Data fetched and stored successfully!";
//         } catch (\Exception $e) {
//             return "An error occurred: " . $e->getMessage();
//         }
//     }

//  try {
//         $accessToken = 'EAADkjcDnJkUBO4aXgihkRq5uZBVJVCeNRwqwO4RBtZBQyvtziIPQJ2RMD0pZBtLAtkllgpvHs8U2uBZBHQeHhBTwWrkadC1bMMEbaXkeHfVceYjwvpfUcE09L9ZAnJX4IF0indBoJpdpVsDjOXO5US5H57bEhL7vgTtEwRrvB0osOZCEuVXfMoR7Fm4ffYmtWZCZCyWZBSV9YO5wMm7cZA9SSYE6GIrXcZD';
//         $leadGenFormId = '329456109447581';

//         $fb = new Facebook([
//             'app_id' => config('services.facebook.client_id'),
//             'app_secret' => config('services.facebook.client_secret'),
//             'default_graph_version' => config('services.facebook.default_graph_version'),
//         ]);

//         $response = $fb->get("/$leadGenFormId/leads?access_token=$accessToken");

//         $responseData = $response->getDecodedBody();

//         if (isset($responseData['data'])) {
//             $leads = $responseData['data'];

//             foreach ($leads as $lead) {
//                 // Store lead data in your database
//                 Leads::create([
//                     'name' => $lead['name'],
//                     'email' => $lead['email'],
//                     // Add other fields as needed
//                 ]);
//             }

//             return response()->json(['message' => 'Leads fetched and stored successfully']);
//         } else {
//             return response()->json(['message' => 'No leads data found in the response']);
//         }
//     } catch (\Exception $e) {
//         return response()->json(['error' => 'An error occurred while fetching and storing leads: ' . $e->getMessage()]);
//     }
    
//     // Your Facebook App ID and App Secret
// $facebookAppId = '329456109447581';
// $facebookAppSecret = '629b5e0896d8ec1170f2bfa2cb4ea4aa';

// // Your access token
// $accessToken = 'EAADkjcDnJkUBO4aXgihkRq5uZBVJVCeNRwqwO4RBtZBQyvtziIPQJ2RMD0pZBtLAtkllgpvHs8U2uBZBHQeHhBTwWrkadC1bMMEbaXkeHfVceYjwvpfUcE09L9ZAnJX4IF0indBoJpdpVsDjOXO5US5H57bEhL7vgTtEwRrvB0osOZCEuVXfMoR7Fm4ffYmtWZCZCyWZBSV9YO5wMm7cZA9SSYE6GIrXcZD';

// // The endpoint you want to call
// $endpoint = 'https://graph.facebook.com/v13.0/me';

// // Create an array with the parameters you want to send
//  $params = [
//     'access_token' => $accessToken,
//     'appsecret_proof' => hash_hmac('sha256', $accessToken, $facebookAppSecret),
// ];

// // Make the API request using Laravel's HTTP client
//      $response = Http::get($endpoint, $params);

// // Check for errors and handle the response
// if ($response->successful()) {
//  return   $userData = $response->json();
//     // Process the user data as needed
// } else {
//     $error = $response->json();
//     // Handle the error, for example:
//     $errorMessage = $error['error']['message'];
//     $errorCode = $error['error']['code'];
//     // Log or return the error information
// }
// }

$accessToken = 'EAAByYwZBxlMcBOZC1bw5JPzF7EogiD5HlZBl5k4k56BVuRjHp8GLrbIZB2ibbwPxDW0Cw11as3ysZCyjI4T3lxDr8ximR7jZCx4vJjojB6GMO1z6iSw6rXm46AabAAIfD2Mol3FHNjYAkt9YQfugnWdCqHMVaowaxZAEkfb6wNQ88weZB8npQKmm6ZArferhlfDuS3XcJWrPkvZCWHHchvTwZDZD';
$userId = '251297477895749';  

try {
    $client = new Client();
    $response = $client->get("https://graph.facebook.com/v13.0/{$userId}?fields=id,name,email", [
        'query' => [
            'access_token' => $accessToken,
        ],
    ]);

    // Check if the response status code is 200 (OK)
    if ($response->getStatusCode() === 200) {
        
      return  $data = json_decode($response->getBody());

        // Store $data in your database table
        // Example:
        Lead::updateOrCreate(['iid' => $data->id], [
            'vFullname' => $data->name,
            
        ]);

        echo "Data fetched and stored successfully!";
    } else {
        echo "Error: Unexpected response from Facebook API.";
    }
} catch (GuzzleHttp\Exception\ClientException $e) {
    // Handle the specific error response
    $response = $e->getResponse();
    $errorData = json_decode($response->getBody());

    if ($errorData && isset($errorData->error)) {
        // Handle the error, e.g., log it or provide user feedback
        $errorMessage = $errorData->error->message;
        echo "Error: " . $errorMessage;
    } else {
        // Handle other exceptions
        echo "An unexpected error occurred.";
    }
}}}