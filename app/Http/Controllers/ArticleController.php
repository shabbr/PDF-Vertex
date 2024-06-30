<?php

namespace App\Http\Controllers;

use App\Models\Website;
use Carbon\Carbon;
use DateTime;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
class ArticleController extends Controller
{
    public function searchGoogleScholar(Request $request)
    {
// dd($request);
// return response()->json($request,200);

        $query = $request->article;
        $projectId=$request->projectId;
        $apiKey = 'AIzaSyBWUR27mGVnCY0Iyd8R61XOTwLDY13UMqM';
        $searchEngineId = 'd6088f172164a41e6';

        $client = new Client();

        $response = Http::get("https://www.googleapis.com/customsearch/v1?q=$query&key=$apiKey&cx=$searchEngineId");
        $data = $response->json();

        $formattedCitations = [];

        if (
            $data &&
            isset($data['items']) &&
            !empty($data['items'])
        ) {
// dd($data['items']);
foreach ($data['items'] as $item) {
    $publicationDate = $item['pagemap']['metatags'][0]['citation_publication_date'] ?? '';
    $publishedTime = $item['pagemap']['metatags'][0]['article:published_time'] ?? '';
    $articleTitle = $item['title'] ?? '';
    $journalName = $item['pagemap']['metatags'][0]['citation_journal_title'] ?? '';
    $volumeNumber = $item['pagemap']['metatags'][0]['citation_volume'] ?? '';
    $issueNumber = $item['pagemap']['metatags'][0]['citation_issue'] ?? '';
    $pageRange = $item['pagemap']['metatags'][0]['citation_firstpage'] ?? '';
    $doi = $item['pagemap']['metatags'][0]['citation_doi'] ?? '';
    $url = $item['pagemap']['metatags'][0]['og:url'] ?? '';
    // Extract and format the publication date
    $formattedDate = $this->extractAndFormatDate($publicationDate, $publishedTime);

    // Format the citation according to APA style
    $formattedCitation = "$articleTitle. $journalName, $volumeNumber";

    // Include the issue number in parentheses if applicable
    $formattedCitation .= $issueNumber ? "($issueNumber)" : '';

    // Add the page range
    $formattedCitation .= ", $pageRange.";

    // Add the DOI if available
    $formattedCitation .= $doi ? " doi:$doi" : '';

    // Include the formatted publication date in the citation
    $formattedCitation .= " $formattedDate";
    // Store each value in a specific key

    $formattedCitations[] = [
        'publishedDate' => $formattedDate,
        'publishedTime' => $publishedTime,
        'articleTitle' => $articleTitle,
        'journalName' => $journalName,
        'volumeNumber' => $volumeNumber,
        'issueNumber' => $issueNumber,
        'pageRange' => $pageRange,
        'doi' => $doi,
        'formattedCitation' => $formattedCitation,
        'url'=>$url
    ];
}

// return $formattedCitations;

// dd($formattedCitations);

        // return response()->json(['citations' => $formattedCitations]);
        return view('articleResult',['results' => $formattedCitations,'projectId'=>$projectId]);


    }
    }
    // Function to extract and format the date
    private function extractAndFormatDate($publicationDate, $publishedTime)
    {
        if (!empty($publicationDate)) {
            // If publicationDate is available, use it directly
            return Carbon::parse($publicationDate)->format('Y-m-d');
        } elseif (!empty($publishedTime)) {
            // If publicationDate is not available but publishedTime is available, extract date from publishedTime
            return Carbon::parse($publishedTime)->format('Y-m-d');
        } else {
            // If neither publicationDate nor publishedTime is available, return an empty string or handle it as per your requirement
            return '';
    }
}
 public function showArticleForm(Request $request){
    // dd($request);
    $projectId = $request->projectId ;
    $articleTitle = $request->articleTitle;
    $journalName = $request->journalName;
    $volumeNumber = $request->volumeNumber;
    $issueNumber = $request->issueNumber;
    $pageRange = $request->pageRange;
    $doi = $request->doi;
    $url = $request->url;
$publishedDate=$request->publishedDate;
// return $publishedDate;
    // Pass the variables to the view
    return view('showArticleForm', compact('projectId', 'articleTitle', 'journalName', 'volumeNumber', 'issueNumber', 'pageRange', 'doi', 'url','publishedDate'));
 }
  public function submitArticleForm(Request $request){
    // return $request;
    $projectId=$request->projectId;
    $user_id=Auth::user()->id;
    $citation=new Website();
    $citation->author=$request->firstName;
    $citation->author_last_name=$request->lastName;
    $citation->title=$request->title;
    $citation->container=$request->pageRange;
    $citation->publish_date=$request->publishedDate;
    $citation->url=$request->url;
    $citation->annotation=$request->annotation;
    $citation->user_id=$user_id;
    $citation->project_id=$request->projectId;
    //  $citation->project_id=1;
    $citation->save();
    return redirect()->route('home',['projectId'=>$projectId]);
  }
}

