<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use PDF;
use App\Models\Project;
use App\Models\Website;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Seboettg\CiteProc\CiteProc;
use Seboettg\CiteProc\StyleSheet;
use Seboettg\CiteProc\Locale\Locale;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;

use function PHPUnit\Framework\isEmpty;
use function PHPUnit\Framework\isNull;

class SearchController extends Controller
{
        public function test(){
            $selectedStyle = 'apa'; // Adjust the input field name

            // Retrieve data from the database (assuming you have a 'papers' table)
            $citations =Website::get(); // Adjust table name if needed
            $data = [];
            foreach ($citations as $citation) {
                $data[] = [
                    "author" => $citation->author,
                    "editor" =>$citation->editor,
                    "title" => $citation->title,
                    "content_page" => $citation->pages,
                    "publish_date" => $citation->publish_date,
                    "url" => $citation->url,
                    "container" => $citation->container,
                    "view_date" => $citation->view_date,
                    // Add other fields as needed...
                ];
            }

            // Load the desired CSL style (e.g., APA)
            $style = StyleSheet::loadStyleSheet($selectedStyle);

            // Create a CiteProc instance
            $citeProc = new CiteProc(new Locale("en-US"), $style);
            // Format the citations
            $formattedCitations = [];
            foreach ($data as $entry) {
                $entry = json_encode($entry);

                $formattedCitations[] = $citeProc->render(json_decode($entry), "bibliography");
            }
    return $formattedCitations;
        // Return the formatted citations (you can use JSON response if needed)
        return response()->json(['citations' => $formattedCitations]);
        return 'test';
        return view('dashboard');
    }
 public function homePage(Request $request,$lang=null){
 
App::setLocale($lang);
    if(Auth::user()){
    if(isset($request->projectId)){
        $userId=Auth::user()->id;
        $projectId=0;
        $projectId= $request->projectId;
        $projects=Project::where('user_id',$userId)->where('status','active')->get();
        $citations=Website::where('user_id',$userId)->where('project_id',$projectId)->where('user_id',$userId)->get();
        $archieved=Project::where('user_id',$userId)->where('status','unactive')->count();
        $deleted=Project::where('user_id',$userId)->where('status','deleted')->count();
        $notifications=Notification::get();
        return view('index',compact(['citations','projects','projectId','archieved','deleted','notifications']));
    }
    $userId=Auth::user()->id;
    $projects=Project::where('user_id',$userId)->where('status','active')->get();
    $archieved=Project::where('user_id',$userId)->where('status','unactive')->count();
    $deleted=Project::where('user_id',$userId)->where('status','deleted')->count();
    $notifications=Notification::get();
    $projectId=0;
    $projects=Project::where('user_id',$userId)->where('status','active')->get();
    return view('index',compact(['projectId','projects','archieved','deleted','notifications']));

    // $projects=Project::where('status','active')->get();
    // return view('index',compact(['projects']));
 }else{
// return 90;
    $projectId=0;
    $notifications=Notification::get();
    return view('index',compact(['projectId','notifications']));
 }
}



    public function searchData(Request $request){
        $query = $request->url;
return response()->json('query');
    }

    public function searchUrl(Request $request)
    {
        // return  response()->json($request, 200);

        $query = $request->url;
        // return response()->json(['results' => $query ]);
$projectId=$request->projectId;
        $apiKey = 'AIzaSyBWUR27mGVnCY0Iyd8R61XOTwLDY13UMqM';
        $searchEngineId = 'd6088f172164a41e6';

        $client = new Client();

        // try {
            $response = $client->get('https://www.googleapis.com/customsearch/v1', [
                'query' => [
                    'key' => $apiKey,
                    'cx' => $searchEngineId,
                    'q' => $query,
                ],
            ]);

            $data = json_decode($response->getBody(), true);
// dd($data);
            // Specify the URL you are interested in
            $specificUrl = $query;

            // Filter results for the specific URL
            $filteredResults = array_filter($data['items'], function ($result) use ($specificUrl) {
                return isset($result['link']) && $result['link'] === $specificUrl;
            });
            // dd($filteredResults);
            //  return response()->json(['results' => $filteredResults ]);
            // return redirect()->route('home');
            // return redirect()->back()->with('data', 'Redirect testing');
// $results=json_encode($filteredResults);

//  return response()->json([
//                 'results' => $results,
//                 'projectId' => $projectId
//             ], 200);
$htmlContent = '';

// Generate HTML content based on the filtered results
if (!empty($filteredResults)) {
    $htmlContent .= '<table>';
    $htmlContent .= '<thead></thead>';
    $htmlContent .= '<tbody>';

    // Loop through each result
    foreach ($filteredResults as $result) {
        $htmlContent .= '<tr>';
        $htmlContent .= '<span id="formData">';
        $htmlContent .= '<strong>Title:</strong> ' . ($result['title'] ?? 'N/A') . ' <br> | ';
        $htmlContent .= '<strong>URL:</strong>';
        $htmlContent .= '<mark style="background-color: yellow;">';
        $htmlContent .= '<a href="' . ($result['link'] ?? '#') . '" target="_blank">' . ($result['link'] ?? 'N/A') . '</a>';
        $htmlContent .= '</mark>';

        // Container
        $htmlContent .= '<strong>Container:</strong> ';
        $htmlContent .= $result['pagemap']['metatags'][0]['og:type'] ?? 'N/A';
        $htmlContent .= ' | ';

        // Publisher
        $htmlContent .= '<strong>Publisher:</strong> ';
        $htmlContent .= $result['pagemap']['metatags'][0]['og:site_name'] ?? ($result['pagemap']['cse_image'][0]['og:site_name'] ?? 'N/A');
        $htmlContent .= ' | ';

        // Year
        $htmlContent .= '<strong>Year:</strong> ';
        $htmlContent .= $result['pagemap']['metatags'][0]['og:article:published_time'] ??
            ($result['pagemap']['metatags'][0]['article:published_time'] ??
                ($result['pagemap']['metatags'][0]['pubdate'] ?? 'N/A'));
        $htmlContent .= ' | ';

        // Credibility
        $htmlContent .= '<strong>Credibility:</strong> ';
        $htmlContent .= $result['pagemap']['metatags'][0]['og:credibility'] ?? 'N/A';

        // Add more fields as needed

        // Additional styling for separation
        $htmlContent .= '<hr>';
        $htmlContent .= '</span>';
        $htmlContent .= '</tr>';
    }

    // Close table tags
    $htmlContent .= '</tbody>';
    $htmlContent .= '</table>';
}

// Return HTML content as JSON response
return response()->json(['htmlContent' => $htmlContent]);
            return view('searchResult',['results' => $filteredResults,'projectId'=>$projectId]);

            // return view('index', ['results' => $filteredResults]);

        // } catch (RequestException $e) {
        //     // Check if the status code is 429 (Too Many Requests)
        //     if ($e->getResponse() && $e->getResponse()->getStatusCode() == 429) {
        //         // Handle the 429 error (e.g., return a message)
        //         return response()->json(['error' => 'Daily limit exceeded.']);
        //     }

        //     // Handle other types of Guzzle HTTP exceptions
        //     return response()->json(['error' => 'An error occurred: ' . $e->getMessage()]);
        // }
    }

 public function searchForm($projectId){
    // return view('searchForm',['projectId'=>$projectId]);
     return view('searchForm');

 }

 public function showForm(Request $request,$projectId){
   $resultData= $request->results;
    $results = json_decode($resultData, true);

    return view('showForm',['projectId'=>$projectId,'results'=>$results]);


 }
    public function submitDetails(Request $request){
$userId=Auth::user()->id;
        $site=new Website();
        $site->author = $request->input('author');
        $site->title = $request->input('title');
        $site->editor = $request->input('editor');
        // $site->content_type = $request->input('contentType');
        $site->publish_date = $request->input('publishDate');
        $site->url = $request->input('url');
        $site->container = $request->input('container');
        $site->view_date = $request->input('viewDate');
        $site->user_id=$userId;
        $site->project_id=$request->projectId;
        $site->save();
        $projectId=$request->projectId;
        return redirect()->route('home',compact('projectId'));
    }


    public function citationEdit($id,$projectId){
        $citation=Website::find($id);
        return view('citationEdit',compact('citation','projectId'));
    }
    public function editCitation(Request $request,$id  ,$projectId){
        // return $projectId;
       $data=Website::find($id);
       $data->author=$request->author;
       $data->editor=$request->editor;
       $data->title=$request->title;
       $data->publish_date=$request->publishDate;
       $data->url=$request->url;
       $data->container=$request->container;
       $data->view_date=$request->viewDate;
        $data->save();
       return redirect()->route('home',compact('projectId'));
    }
    public function citationDelete($id){
        Website::find($id)->delete();
       return redirect()->back();
    }
    public function newProject(){
        $userId=Auth::user()->id;
        $count=0;
        $projects=Project::count();
        // dd($projects);
        if($projects!=0){
        $count=Project::latest()->first()->id;
        }
        if($count==0){
            $name='New Project';
        }else{
            $name='New Project'. $count + 1;
        }
        $project=new Project();
        $project->user_id=$userId;
        $project->name=$name;
        $project->save();
        $projectId= $project->id;
       return redirect()->route('home',compact('projectId'));
    }
    public function editPojectName($projectId){
        $project=Project::find($projectId);
       return view('editPojectName',compact('project'));
    }
    public function updateProjectName(Request $request,$projectId){
        $project=Project::find($projectId);
        $project->name=$request->name;
        $project->save();
       return redirect()->route('home',compact('projectId'));
    }
    public function archieveProject($projectId){
        $userId=Auth::user()->id;
        $project=Project::find($projectId);
        $project->status='unactive';
        $project->save();
       $projectId= Project::where('user_id',$userId)
                            ->where('status','active')
                            ->min('id');
       return redirect()->route('home',compact('projectId'));
    }
    public function showArchieveProject(){
        $projects=Project::where('status','unactive')->get();
        return view('showArchievedProjects',compact('projects'));
    }
    public function restoreArchieveProject($projectId){
        $project=Project::find($projectId);
        $project->status='active';
        $project->save();
       return redirect()->route('home',compact('projectId'));
    }

    public function deletePoject($projectId){
        $userId=Auth::user()->id;
        $project=Project::find($projectId);
        $project->status='deleted';
        $project->save();
       $projectId= Project::where('user_id',$userId)
                            ->where('status','active')
                            ->min('id');
       return redirect()->route('home',compact('projectId'));

    }
    public function deletedProjects(){
        $projects=Project::where('status','deleted')->get();
        return view('deletedProjects',compact('projects'));
    }
    public function restoreProject($projectId){
        $project=Project::find($projectId);
        $project->status='active';
        $project->save();
       return redirect()->route('home',compact('projectId'));
    }
    public function permanentDeleteProject($projectId){
        $project=Project::find($projectId)->delete();
       return redirect()->route('home',compact('projectId'));
    }
    public function openProject($projectId){
         return redirect()->route('home',['projectId' => $projectId]);

        return view('index2',compact('projectId'));
    }




    public function downloadImage(Request $request)
    {
         $projectId=$request->projectId;
        $data='';
        // $data=Website::select('editor')->where('id',9)->get();
        $records=Website::select('author','editor','title','content_type','publish_date','url','container')->where('project_id',$projectId)->get();
        // $html = $request->input('dataInput');
foreach($records as $record){
    $data.="<li>";
   $data.=$record->author. ' ';
   $data.=$record->editor. ' ';
   $data.=$record->title. ' ';
   $data.=$record->content_type. ' ';
   $data.=$record->publish_date. ' ';
   $data.="<mark>". $record->url. "</mark>". ' ';
   $data.="</li>";
$data .="<br>";
}
        $pdf = PDF::loadHtml($data);

        // Set paper size (optional, default is 'A4')
        $pdf->setPaper('A4');

        // Download the PDF file
        return $pdf->download('citations.pdf');
        }




        public function risCitation(Request $request){
            if(Auth::user()){
            $projectId =$request->projectId;
            $file = $request->file('ris_file');

            if (!$file) {
                return response()->json(['error' => 'RIS file not provided.'], 400);
            }

            $risData = file_get_contents($file->getRealPath());

            // Assuming each record is separated by two newlines
            $records = explode("\n\n", $risData);

            $citations = [];

            foreach ($records as $record) {
                $lines = explode("\n", $record);
                $referenceData = [];

                foreach ($lines as $line) {
                    if (!empty($line)) {
                        list($key, $value) = explode(' ', $line, 2);
                        $referenceData[$key] = $value;
                    }
                }

                // Now, $referenceData contains the data for each reference
                // You can access specific fields like $referenceData['AU'] for authors, etc.

                // Use the extracted data to generate citations or store them as needed
                $citations[] = $referenceData;
            }
            $userId=Auth::user()->id;
foreach($citations as $citation){
    $row = new Website();
            $row->user_id=$userId;
            $row->project_id = $projectId; // Replace with your actual project ID
            $row->author = $citation['AU'] ?? null;
            $row->editor = $citation['A2'] ?? null;
            $row->title = $citation['TI'] ?? null;
            $row->content_type = $citation['TY'] ?? null;
            $row->publish_date = $citation['PY'] ?? null;
            $row->url = $citation['UR'] ?? null;
            $row->container = $citation['T2'] ?? null;
            $row->view_date = $citation['view_date'] ?? null; // You need to extract this field from your JSON
            $row->status = 'active'; // Default status, adjust as needed
            $row->save();
}
return redirect()->back();

               }
               }





        //bibFile
        public function bibCitation(Request $request)
{
    $projectId = $request->projectId;
    $file = $request->file('bibtex_file'); // Change the file input name to match your form
    if (!$file) {
        return response()->json(['error' => 'BibTeX file not provided.'], 400);
    }

    $bibtexData = file_get_contents($file->getRealPath());

    // Assuming each entry is separated by '@'
    $entries = explode('@', $bibtexData);

    $citations = [];

    foreach ($entries as $entry) {
        // Skip empty entries
        if (empty($entry)) {
            continue;
        }

        // Extract entry type and key
        preg_match('/^([^{]+){([^,]+),/', $entry, $matches);
        $entryType = $matches[1];
        $entryKey = $matches[2];

        // Extract other fields
        preg_match_all('/(\w+)\s*=\s*{([^}]+)}/', $entry, $matches, PREG_SET_ORDER);
        $referenceData = [];

        foreach ($matches as $match) {
            $referenceData[$match[1]] = $match[2];
        }

        // Now, $referenceData contains the data for each reference in BibTeX format
        // You can access specific fields like $referenceData['author'] for authors, etc.

        // Use the extracted data to generate citations or store them as needed
        $citations[] = $referenceData;
    }
    $userId = Auth::user()->id;
    foreach ($citations as $citation) {
        $row = new Website();
        $row->user_id = $userId;
        $row->project_id = $projectId;
        $row->author = $citation['author'] ?? null;
        $row->editor = $citation['editor'] ?? null;
        $row->title = $citation['title'] ?? null;
        $row->content_type = $citation['type'] ?? null; // Assuming 'type' corresponds to content_type
        $row->publish_date = $citation['year'] ?? null;
        $row->url = $citation['url'] ?? null;
        $row->container = $citation['journal'] ?? null; // Assuming 'journal' corresponds to container
        $row->volume = $citation['volume'] ?? null;
        $row->number = $citation['number'] ?? null;
        $row->pages = $citation['pages'] ?? null;
        $row->booktitle = $citation['booktitle'] ?? null;
        $row->publisher = $citation['publisher'] ?? null;
        $row->institution = $citation['institution'] ?? null;
        $row->school = $citation['school'] ?? null;

        // Add the 'view_date' field
        $row->view_date = $citation['view_date'] ?? null;
        $row->save();
    }

    return redirect()->back();
}











 public function citationFile(Request $request){


    $projectId = $request->projectId;
    $file = $request->file('refFile'); // Change the file input name to match your form
    $extension = $file->getClientOriginalExtension();
 if($extension=='ris'){
    if(Auth::user()){
        $projectId =$request->projectId;
         $file = $request->file('refFile');
        if (!$file) {
            return response()->json(['error' => 'RIS file not provided.'], 400);
        }

        $risData = file_get_contents($file->getRealPath());

        // Assuming each record is separated by two newlines
        $records = explode("\n\n", $risData);

        $citations = [];

        foreach ($records as $record) {
            $lines = explode("\n", $record);
            $referenceData = [];

            foreach ($lines as $line) {
                if (!empty($line)) {
                    list($key, $value) = explode(' ', $line, 2);
                    $referenceData[$key] = $value;
                }
            }

            // Now, $referenceData contains the data for each reference
            // You can access specific fields like $referenceData['AU'] for authors, etc.

            // Use the extracted data to generate citations or store them as needed
            $citations[] = $referenceData;
        }
        $userId=Auth::user()->id;
foreach($citations as $citation){
$row = new Website();
        $row->user_id=$userId;
        $row->project_id = $projectId; // Replace with your actual project ID
        $row->author = $citation['AU'] ?? null;
        $row->editor = $citation['A2'] ?? null;
        $row->title = $citation['TI'] ?? null;
        $row->content_type = $citation['TY'] ?? null;
        $row->publish_date = $citation['PY'] ?? null;
        $row->url = $citation['UR'] ?? null;
        $row->container = $citation['T2'] ?? null;
        $row->view_date = $citation['view_date'] ?? null; // You need to extract this field from your JSON
        $row->status = 'active'; // Default status, adjust as needed
        $row->save();
}
return redirect()->back();

           }
           }



 if($extension=='bib'){
    $projectId = $request->projectId;
    $file = $request->file('refFile');// Change the file input name to match your form

    if (!$file) {
        return response()->json(['error' => 'BibTeX file not provided.'], 400);
    }

    $bibtexData = file_get_contents($file->getRealPath());

    // Assuming each entry is separated by '@'
    $entries = explode('@', $bibtexData);
    $citations = [];

    foreach ($entries as $entry) {
        // Skip empty entries
        if (empty($entry)) {
            continue;
        }

        // Extract entry type and key
        preg_match('/^([^{]+){([^,]+),/', $entry, $matches);
        $entryType = $matches[1];
        $entryKey = $matches[2];

        // Extract other fields
        preg_match_all('/(\w+)\s*=\s*{([^}]+)}/', $entry, $matches, PREG_SET_ORDER);
        $referenceData = [];

        foreach ($matches as $match) {
            $referenceData[$match[1]] = $match[2];
        }

        // Now, $referenceData contains the data for each reference in BibTeX format
        // You can access specific fields like $referenceData['author'] for authors, etc.

        // Use the extracted data to generate citations or store them as needed
        $citations[] = $referenceData;
    }
    $userId = Auth::user()->id;
    foreach ($citations as $citation) {
        $row = new Website();
        $row->user_id = $userId;
        $row->project_id = $projectId;
        $row->author = $citation['author'] ?? null;
        $row->editor = $citation['editor'] ?? null;
        $row->title = $citation['title'] ?? null;
        $row->content_type = $citation['type'] ?? null; // Assuming 'type' corresponds to content_type
        $row->publish_date = $citation['year'] ?? null;
        $row->url = $citation['url'] ?? null;
        $row->container = $citation['journal'] ?? null; // Assuming 'journal' corresponds to container
        $row->volume = $citation['volume'] ?? null;
        $row->number = $citation['number'] ?? null;
        $row->pages = $citation['pages'] ?? null;
        $row->booktitle = $citation['booktitle'] ?? null;
        $row->publisher = $citation['publisher'] ?? null;
        $row->institution = $citation['institution'] ?? null;
        $row->school = $citation['school'] ?? null;

        // Add the 'view_date' field
        $row->view_date = $citation['view_date'] ?? null;
        $row->save();
    }
    return redirect()->back();
}else{
    return 'Please enter  file from .bib or .res';
}


 }











 public function showContactForm(){
    return view('contactForm');
 }

 public function notificationForm(){
    if(Auth::user()->role==1){
    return view('notificationForm');
    }else{
        return 'You are not allowed to access this page';
    }
 }


 public function notification(Request $request){
    $validatedData = $request->validate([
        'subject' => 'required|string|max:255',
        'title' => 'required|string|max:255',
        'media' => 'required|mimes:jpeg,jpg,png,mp4|max:204800',
        'authorImage' => 'required|mimes:jpeg,jpg,png',
        'message' => 'required',
        'description' => 'required|string',

    ]);


        $mediaType = $request->file('media')->getMimeType();
        $mediaPath = $request->file('media')->store('media', 'public');
        $mediaType = $request->file('authorImage')->getMimeType();
        $authorImage = $request->file('authorImage')->store('authorImage', 'public');
        $post=new Notification();
        $post->user_id=Auth::user()->id;
        $post->user_name=Auth::user()->name;

    $post->subject=$request->subject;
    $post->title=$request->title;
    $post->message=$request->message;
    $post->author_description=$request->description;
    $post->media_type=$mediaType;
    $post->media_path=$mediaPath;
    $post->author_image=$authorImage;

    $post->save();
    return redirect()->back();

}


           public function showNotification(){
              $notifications=Notification::get();
            //   return view('frontend.blog',compact('notifications'));
              return view('showNotifications',compact('notifications'));
           }

           public function notificationBlog($notificationId){
            $blogPost=Notification::find($notificationId);
            return view('frontend.blog',compact('blogPost'));

            // return view('notificationBlog',compact('blogPost'));
           }


           public function mergeProject($projectId){
            $project=Project::find($projectId);
            $projectName=$project->name;
            $projectList=Project::where('status','active')->where('id','!=',$project->id)->get();
            return view('mergeForm',compact(['projectName','projectId','projectList']));
           }

           public function merge(Request $request){
            $project=Project::find($request->projectOne);
              $citations=Website::where('project_id',$request->projectOne)->get();
              foreach($citations as $citation){
              $citation->project_id=$request->option;
              $citation->save();
              }
              $projectId=$request->option;
              $project->delete();
     return redirect()->route('home',compact('projectId'));
            }

        public function duplicate($projectId){
                $originalRow=Project::find($projectId);
                $copyProject=new Project();
                $copyProject->name=$originalRow->name .'(copy)';
                $copyProject->user_id=$originalRow->user_id;
                $copyProject->save();
                $copyProjectId=$copyProject->id;
                $citations=Website::where('project_id',$projectId)->get();
               foreach($citations as $citation){
                $newCitation=new Website();
                $newCitation->user_id=$citation->user_id;
                $newCitation->project_id=$copyProjectId;
                $newCitation->author=$citation->author;
                $newCitation->editor=$citation->editor;
                $newCitation->title=$citation->title;
                $newCitation->content_type=$citation->content_type;
                $newCitation->publish_date=$citation->publish_date;
                $newCitation->url=$citation->url;
                $newCitation->container=$citation->container;
                $newCitation->volume=$citation->volume;
                $newCitation->number=$citation->number;
                $newCitation->pages=$citation->pages;
                $newCitation->booktitle=$citation->booktitle;
                $newCitation->publisher=$citation->publisher;
                $newCitation->institution=$citation->institution;
                $newCitation->school=$citation->school;
                $newCitation->view_date=$citation->view_date;
                $newCitation->save();
               }
                return redirect()->back();


        }

        public function try(){
              return response()->json('try function', 200);
        }

        }

















//     public function risCitation(Request $request){
//         $file = $request->file('ris_file');

//         if (!$file) {
//             return response()->json(['error' => 'RIS file not provided.'], 400);
//         }

//         // Parse the RIS file and extract data
//         $risData = file_get_contents($file->getRealPath());
//         $citationsData = json_decode($risData, true);
// return $citationsData;
//         foreach ($citationsData['citations'] as $citation) {
//             $this->storeCitation($citation);
//         }

//         return response()->json(['message' => 'Citations inserted successfully.']);
//     }

//     private function storeCitation($citation)
//     {
//         $citation = new Website();
//         $citation->project_id = 1; // Replace with your actual project ID
//         $citation->author = $citation['AU'] ?? null;
//         $citation->editor = $citation['A2'] ?? null;
//         $citation->title = $citation['TI'] ?? null;
//         $citation->content_type = $citation['TY'] ?? null;
//         $citation->publish_date = $citation['PY'] ?? null;
//         $citation->url = $citation['UR'] ?? null;
//         $citation->container = $citation['T2'] ?? null;
//         $citation->view_date = $citation['view_date'] ?? null; // You need to extract this field from your JSON
//         $citation->status = 'active'; // Default status, adjust as needed
//         $citation->save();
//         return 'RIS inserted succesfully';
//     }
