<?php

namespace App\Http\Controllers;

use App\Models\Website;
use DateTime;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{


    public function search(Request $request){
 return $request;
    }
    public function searchBook(Request $request){
        $query = $request->book;
        $projectId=$request->projectId;

        // return response()->json(['results' => $query ]);

        $apiKey = 'AIzaSyBWUR27mGVnCY0Iyd8R61XOTwLDY13UMqM';
        $searchEngineId = 'd6088f172164a41e6';


        $httpClient = new Client();
        $response = $httpClient->get("https://www.googleapis.com/books/v1/volumes?q=$query&key=$apiKey");
        $data = json_decode($response->getBody(), true);
        // on_decode($response->getBody(), true);

        if (isset($data['items']) && count($data['items']) > 0) {
            $books = [];

            // Iterate through all matching books
            foreach ($data['items'] as $bookItem) {
                $bookInfo = $bookItem['volumeInfo'] ?? [];

                // Initialize an array to store citation data for this book
                $citation = [];

                // Format citation data for each book

                if (isset($bookInfo['authors'])) {
                    $authors = $bookInfo['authors'];

                    // Separate first names and last names
                    $formattedAuthors = [];
                    foreach ($authors as $author) {
                        $authorParts = explode(' ', $author, 2); // Split into two parts: first name and last name
                        $formattedAuthors[] = [
                            'firstName' => isset($authorParts[0]) ? $authorParts[0] : '',
                            'lastName' => isset($authorParts[1]) ? $authorParts[1] : ''
                        ];
                    }

                    $citation['Authors'] = $formattedAuthors;
                }

                $citation['Title'] = $bookInfo['title'] ?? '';

                if (isset($bookInfo['publisher'])) {
                    $citation['Publisher'] = $bookInfo['publisher'];
                }

                // Check if 'publishedDate' key exists and is not empty
                if (isset($bookInfo['publishedDate']) && !empty($bookInfo['publishedDate'])) {
                    $dateObject = new DateTime($bookInfo['publishedDate']);
                    $citation['PublishedDate'] = $dateObject->format('Y');
                }

                // Check if 'industryIdentifiers' key exists
                if (isset($bookInfo['industryIdentifiers'])) {
                    $isbnIdentifiers = array_column($bookInfo['industryIdentifiers'], 'identifier');
                    $citation['ISBN'] = implode(", ", $isbnIdentifiers);
                }

                // Add the citation data to the array
                $books[] = $citation;
        return view('bookResult',['results' => $books,'projectId'=>$projectId]);
    }
        }
        else{
            return view('bookResult',['results' => '$books','projectId'=>$projectId]);

            }

        // dd($books);
        // return response()->json([
        //     'books' => $books
        // ]);
        // $test=['one'=>1,'one'=>1,'one'=>1];
        // return view('bookResult');
        // $arraydata = json_decode($jsonArrayData, true);



        }

    public function showBookForm(Request $request){
        // dd($request);
// return $request;
$projectId=$request->projectId;
$firstName=$request->firstName;
$lastName=$request->lastName;
$title=$request->title;
$publisher=$request->Publisher;
$publishedDate=$request->PublishedDate;
$isbn=$request->ISBN;

        return view('showBookForm',compact(['firstName','lastName','title','publisher','publishedDate','isbn','projectId']));
    }
    public function submitBookForm(Request $request){
        $projectId=$request->projectId;
        $user_id=Auth::user()->id;
        $citation=new Website();
        $citation->author=$request->firstName;
        $citation->author_last_name=$request->lastName;
        $citation->title=$request->title;
        // $citation->institution=$request->institution;
        $citation->publish_date=$request->publishedDate;
        $citation->container=$request->range;
        $citation->publisher=$request->publisher;
        $citation->url=$request->url;
        $citation->location=$request->location;
        $citation->number=$request->isbn;
        $citation->user_id=$user_id;
        $citation->project_id=$request->projectId;
        //  $citation->project_id=1;
        $citation->save();
        return redirect()->route('home',['projectId'=>$projectId]);
    }
}
