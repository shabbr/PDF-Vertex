<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Google\Client as GoogleClient;
class YoutubeController extends Controller
{

    public function youtube(Request $request){
//         $query=$request->search;
//         $apiKey = 'AIzaSyAdUd60Ll2g3z5WbIS70xwPaVBc9zcF2RI';
//         $searchEngineId = 'f344615cad2724b0d';

//     $url = $request->input('youtube_url');
//     $videoId = $this->extractVideoId($url);

//     $googleClient = new GoogleClient();
//     $googleClient->setDeveloperKey(env('YOUTUBE_API_KEY')); // Set your API key

//     $youtube = new \Google_Service_YouTube($googleClient);
//     $video = $youtube->videos->listVideos('snippet', ['id' => $videoId])->getItems()[0];

//     // Extract information from the YouTube video
//     $title = $video->getSnippet()->getTitle();
//     $description = $video->getSnippet()->getDescription();
//     $publishedAt = $video->getSnippet()->getPublishedAt();

//     return view('youtube-citation-results', compact('title', 'description', 'publishedAt'));
// }

// private function extractVideoId($url)
// {
//     parse_str(parse_url($url, PHP_URL_QUERY), $queryParams);
//     return $queryParams['v'] ?? null;
}
}
