<?php

namespace App\Http\Controllers;

use App\Models\Website;
use DateTime;
use DOMDocument;
use DOMXPath;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use PDO;
use Sunra\PhpSimple\HtmlDomParser;
class VideoController extends Controller
{
 

    public function video(Request $request){

        $url = $request->video;
        $projectId=$request->projectId;
        $userId=Auth::user()->id;
        // return response()->json($request);

// $url = $request->input('url');

// Check if it's an Instagram url
if (strpos($url, 'instagram.com') !== false) {

    $plateform="Instagram";

    $data=[
     'url' =>$url,
     'plateform' =>$plateform,
     'projectId' =>$projectId,
     'userId'   =>$userId
    ];

return view('videoResult',compact('data'));

}
// Check if it's a Facebook url
elseif (strpos($url, 'facebook.com') !== false) {
    $plateform="Facebook";
    $data=[
        'url' =>$url,
        'plateform' =>$plateform,
        'projectId' =>$projectId,
        'userId'   =>$userId
       ];

   return view('videoResult',compact('data'));
}

// Check if it's a Vimeo url
elseif (strpos($url, 'vimeo.com') !== false) {
    $plateform="Vimeo";
    $data=[
        'url' =>$url,
        'plateform' =>$plateform,
        'projectId' =>$projectId,
        'userId'   =>$userId
       ];

   return view('videoResult',compact('data'));
}
// Check if it's a Dailymotion url
elseif (strpos($url, 'dailymotion.com') !== false) {
    $plateform="Dailymotion";
    $data=[
        'url' =>$url,
        'plateform' =>$plateform,
        'projectId' =>$projectId,
        'userId'   =>$userId
       ];

   return view('videoResult',compact('data'));
}
// Check for other video platforms
elseif (strpos($url, 'twitch.tv') !== false) {
    $plateform="Twitch";
    $data=[
        'url' =>$url,
        'plateform' =>$plateform,
        'projectId' =>$projectId,
        'userId'   =>$userId
       ];

   return view('videoResult',compact('data'));
}
elseif (strpos($url, 'vevo.com') !== false) {
    $plateform="Vevo";
    $data=[
        'url' =>$url,
        'plateform' =>$plateform,
        'projectId' =>$projectId,
        'userId'   =>$userId
       ];

   return view('videoResult',compact('data'));
}
elseif (strpos($url, 'vine.co') !== false) {
    $plateform="Vine";
    $data=[
        'url' =>$url,
        'plateform' =>$plateform,
        'projectId' =>$projectId,
        'userId'   =>$userId
       ];

   return view('videoResult',compact('data'));
}
elseif (strpos($url, 'tiktok.com') !== false) {
    $plateform="Tiktok";
    $data=[
        'url' =>$url,
        'plateform' =>$plateform,
        'projectId' =>$projectId,
        'userId'   =>$userId
       ];

   return view('videoResult',compact('data'));
}
elseif (strpos($url, 'metacafe.com') !== false) {
    $plateform="Metacafe";
    $data=[
        'url' =>$url,
        'plateform' =>$plateform,
        'projectId' =>$projectId,
        'userId'   =>$userId
       ];

   return view('videoResult',compact('data'));
}
elseif (strpos($url, 'hulu.com') !== false) {
    $plateform="Hulu";
    $data=[
        'url' =>$url,
        'plateform' =>$plateform,
        'projectId' =>$projectId,
        'userId'   =>$userId
       ];

   return view('videoResult',compact('data'));
}
elseif (strpos($url, 'vineyardvideo.com') !== false) {
    $plateform="Vineyarvideo";
    $data=[
        'url' =>$url,
        'plateform' =>$plateform,
        'projectId' =>$projectId,
        'userId'   =>$userId
       ];

   return view('videoResult',compact('data'));
}
elseif (strpos($url, 'break.com') !== false) {
    $plateform="Break";
    $data=[
        'url' =>$url,
        'plateform' =>$plateform,
        'projectId' =>$projectId,
        'userId'   =>$userId
       ];

   return view('videoResult',compact('data'));
}
elseif (strpos($url, 'coub.com') !== false) {
    $plateform="Coub";
    $data=[
        'url' =>$url,
        'plateform' =>$plateform,
        'projectId' =>$projectId,
        'userId'   =>$userId
       ];

   return view('videoResult',compact('data'));
}
elseif (strpos($url, 'periscope.tv') !== false) {
    $plateform="Periscope";
    $data=[
        'url' =>$url,
        'plateform' =>$plateform,
        'projectId' =>$projectId,
        'userId'   =>$userId
       ];

   return view('videoResult',compact('data'));
}
elseif (strpos($url, 'instagram.com/tv') !== false) {
    $plateform="IGTV";
    $data=[
        'url' =>$url,
        'plateform' =>$plateform,
        'projectId' =>$projectId,
        'userId'   =>$userId
       ];

   return view('videoResult',compact('data'));
}
elseif (strpos($url, 'vid.me') !== false) {
  $plateform="Videme";
  $data=[
    'url' =>$url,
    'plateform' =>$plateform,
    'projectId' =>$projectId,
    'userId'   =>$userId
   ];

return view('videoResult',compact('data'));
}
elseif (strpos($url, 'vidyard.com') !== false) {
    $plateform="Vidyard";
    $data=[
        'url' =>$url,
        'plateform' =>$plateform,
        'projectId' =>$projectId,
        'userId'   =>$userId
       ];

   return view('videoResult',compact('data'));
}
elseif (strpos($url, 'wistia.com') !== false) {
    $plateform="Wistia";
    $data=[
        'url' =>$url,
        'plateform' =>$plateform,
        'projectId' =>$projectId,
        'userId'   =>$userId
       ];

   return view('videoResult',compact('data'));
}
elseif (strpos($url, 'brightcove.com') !== false) {
    $plateform="Brightcove";
    $data=[
        'url' =>$url,
        'plateform' =>$plateform,
        'projectId' =>$projectId,
        'userId'   =>$userId
       ];

   return view('videoResult',compact('data'));
}


// Check if it's a YouTube url
elseif (strpos($url, 'youtube.com') !== false || strpos($url, 'youtu.be') !== false) {
    $plateform="Youtube";
//     $data=[
//         'url' =>$url,
//         'plateform' =>$plateform,
//         'projectId' =>$projectId,
//         'userId'   =>$userId
//        ];

//    return view('videoResult',compact('data'));



   //more details of youtube video
    $data=[
        'url' =>$url,
        'plateform' =>$plateform,
       ];
// return response()->json(['data'=>$data]);
        $videoId = $this->getYouTubeVideoId($url);
        if (!$videoId) {
            return response()->json(['error' => 'Invalid YouTube video URL'], 400);
        }

        // Use your Google Cloud Project's YouTube API key
        $apiKey = 'AIzaSyBWUR27mGVnCY0Iyd8R61XOTwLDY13UMqM';

        // Make a request to the YouTube API to get video details
        $response = Http::get("https://www.googleapis.com/youtube/v3/videos", [
            'part' => 'snippet',
            'id' => $videoId,
            'key' => $apiKey,
        ]);

        $videoData = $response->json();
// dd($videoData);
        if (isset($videoData['items'][0])) {
            // Extract relevant information
            $title = $videoData['items'][0]['snippet']['title'];
            $description = $videoData['items'][0]['snippet']['description'];
            $thumbnailUrl = $videoData['items'][0]['snippet']['thumbnails']['default']['url'];

            // Create citation or use the information as needed
            $citation = "Title: $title\nDescription: $description\nThumbnail URL: $thumbnailUrl";
            $videoInfo = $videoData['items'][0]['snippet'] ?? [];

            $videoId = $videoInfo['resourceId']['videoId'] ?? '';
            $title = $videoInfo['title'] ?? '';
            $channelTitle = $videoInfo['channelTitle'] ?? '';
            $publishedAt = $videoInfo['publishedAt'] ?? '';
            $thumbnailUrl = $videoInfo['thumbnails']['medium']['url'] ?? '';
       // Initialize default values
$year = '';
$month = '';
$day = '';

// Check if "publishedAt" exists
if ($publishedAt) {
    // Parse the publishedAt value
    $dateTime = new DateTime($publishedAt);
    $year = $dateTime->format('Y');
    $month = $dateTime->format('m');
    $day = $dateTime->format('d');
}
// Store the data in an array
$videoArray = [
    'title' => $videoInfo['title'] ?? '',
    'channelTitle' => $videoInfo['channelTitle'] ?? '',
    'publishedYear' => $year?? '',
    'publishedMonth' => $month?? '',
    'publishedDay' => $day?? '',
    'thumbnailUrl' => $videoInfo['thumbnails']['medium']['url'] ?? '',
    'plateform' =>'Youtube',
    'url'=>$url,
    'projectId'=>$projectId
];
// dd($videoArray);
//  return response()->json($videoArray, 200);
   return view('videoResult',compact('videoArray'));

            // return response()->json(['citation' => $videoArray], 200);
        } else {
            return response()->json(['error' => 'Video not found'], 404);
        }
    }

    else {
        echo 'Unknown url';
    }


    }

    private function getYouTubeVideoId($url)
    {
        $videoId = null;

        // Extract video ID from the URL
        $pattern = '/(?:youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|\S*?[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/';
        preg_match($pattern, $url, $matches);

        if (!empty($matches[1])) {
            $videoId = $matches[1];
        }

        return $videoId;
    }








    public function showVideoForm(Request $request,$projectId){
        $resultData= $request->results;
// return $resultData;
        $results[]= json_decode($resultData, true);
// return $results;
        return view('showVideoForm',compact(['projectId','results']));
    }
    public function submitVideoForm(Request $request){
        $userId=Auth::user()->id;
$projectId=$request->projectId;
                $citation=new Website();
                // return $request;
                $citation->user_id=$userId;
                $citation->project_id=$projectId;
                $citation->author=$request->firstName;
                $citation->author_last_name=$request->lastName;
                $citation->title=$request->title;
                $citation->publish_date=$request->publishDate;
                $citation->publisher=$request->publisher;
                $citation->url=$request->url;
                $citation->view_date=$request->viewDate;
                $citation->annotation=$request->annotation;
                $citation->location=$request->plateform;
                $citation->save();
                return redirect()->route('home',['projectId'=>$projectId]);
    }
}
