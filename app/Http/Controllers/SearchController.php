<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use PDF;
use App\Models\Project;
use App\Models\User;
use App\Models\Website;
use Carbon\Carbon;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Contracts\Session\Session;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Seboettg\CiteProc\CiteProc;
use Seboettg\CiteProc\StyleSheet;
use Seboettg\CiteProc\Locale\Locale;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;

use function PHPUnit\Framework\isEmpty;
use function PHPUnit\Framework\isNull;

use App\Services\EmailServiceFactory;

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

    
 $value = session()->get('locale');
// return $value;
App::setLocale($value);
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


 }else{

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
            // Specify the URL you are interested in
            $specificUrl = $query;

            // Filter results for the specific URL
            $filteredResults = array_filter($data['items'], function ($result) use ($specificUrl) {
                return isset($result['link']) && $result['link'] === $specificUrl;
            });


             return view('searchResult',['results' => $filteredResults,'projectId'=>$projectId]);

// $htmlContent = '';

// // Generate HTML content based on the filtered results
// if (!empty($filteredResults)) {
//     $htmlContent .= '<table>';
//     $htmlContent .= '<thead></thead>';
//     $htmlContent .= '<tbody>';

//     // Loop through each result
//     foreach ($filteredResults as $result) {
//         $htmlContent .= '<tr>';
//         $htmlContent .= '<span id="formData">';
//         $htmlContent .= '<strong>Title:</strong> ' . ($result['title'] ?? 'N/A') . ' <br> | ';
//         $htmlContent .= '<strong>URL:</strong>';
//         $htmlContent .= '<mark style="background-color: yellow;">';
//         $htmlContent .= '<a href="' . ($result['link'] ?? '#') . '" target="_blank">' . ($result['link'] ?? 'N/A') . '</a>';
//         $htmlContent .= '</mark>';

//         // Container
//         $htmlContent .= '<strong>Container:</strong> ';
//         $htmlContent .= $result['pagemap']['metatags'][0]['og:type'] ?? 'N/A';
//         $htmlContent .= ' | ';

//         // Publisher
//         $htmlContent .= '<strong>Publisher:</strong> ';
//         $htmlContent .= $result['pagemap']['metatags'][0]['og:site_name'] ?? ($result['pagemap']['cse_image'][0]['og:site_name'] ?? 'N/A');
//         $htmlContent .= ' | ';

//         // Year
//         $htmlContent .= '<strong>Year:</strong> ';
//         $htmlContent .= $result['pagemap']['metatags'][0]['og:article:published_time'] ??
//             ($result['pagemap']['metatags'][0]['article:published_time'] ??
//                 ($result['pagemap']['metatags'][0]['pubdate'] ?? 'N/A'));
//         $htmlContent .= ' | ';

//         // Credibility
//         $htmlContent .= '<strong>Credibility:</strong> ';
//         $htmlContent .= $result['pagemap']['metatags'][0]['og:credibility'] ?? 'N/A';

//         // Add more fields as needed

//         // Additional styling for separation
//         $htmlContent .= '<hr>';
//         $htmlContent .= '</span>';
//         $htmlContent .= '</tr>';
//     }

//     // Close table tags
//     $htmlContent .= '</tbody>';
//     $htmlContent .= '</table>';
// }
// foreach($filteredResults as $filterResult){
//     $data[] = $filterResult;
// }

// // Return HTML content as JSON response
// return response()->json(['htmlContent' => $htmlContent, 'results' => $data]);
//             // return view('searchResult',['results' => $filteredResults,'projectId'=>$projectId]);

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
        // dd($request);
$userId=Auth::user()->id;
        $site=new Website();
        $site->author = $request->input('firstName');
        $site->author_last_name = $request->input('lastName');
        $site->title = $request->input('title');
        // $site->editor = $request->input('editor');
        // $site->content_type = $request->input('contentType');
        $site->publish_date = $request->input('publishDate');
        $site->url = $request->input('url');
        $site->annotation = $request->input('annotation');
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
       $data->author=$request->firstName;
       $data->author_last_name=$request->lastName;
       if ($request->has('interviewer_first_name')) {
        $data->interviewer_first_name = $request->interviewer_first_name;
    }

    if ($request->has('interviewer_last_name')) {
        $data->interviewer_last_name = $request->interviewer_last_name;
    }

    if ($request->has('editor')) {
        $data->editor = $request->editor;
    }

    if ($request->has('title')) {
        $data->title = $request->title;
    }

    if ($request->has('content_type')) {
        $data->content_type = $request->content_type;
    }

    if ($request->has('publish_date')) {
        $data->publish_date = $request->publish_date;
    }

    if ($request->has('url')) {
        $data->url = $request->url;
    }

    if ($request->has('container')) {
        $data->container = $request->container;
    }

    if ($request->has('volume')) {
        $data->volume = $request->volume;
    }

    if ($request->has('medium')) {
        $data->medium = $request->medium;
    }

    if ($request->has('number')) {
        $data->number = $request->number;
    }

    if ($request->has('pages')) {
        $data->pages = $request->pages;
    }

    if ($request->has('booktitle')) {
        $data->booktitle = $request->booktitle;
    }

    if ($request->has('publisher')) {
        $data->publisher = $request->publisher;
    }

    if ($request->has('institution')) {
        $data->institution = $request->institution;
    }

    if ($request->has('location')) {
        $data->location = $request->location;
    }

    if ($request->has('school')) {
        $data->school = $request->school;
    }

    if ($request->has('annotation')) {
        $data->annotation = $request->annotation;
    }

    $data->save();
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

    public function renameProject(Request $request){
        {
            $projectId = $request->input('projectId');
            $newName = $request->input('newName');

            $project = Project::findOrFail($projectId);
            $project->name = $newName;
            $project->save();

            return response()->json(['success' => true]);
        }
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
        $project->deleted_at= Carbon::now();
        $project->save();
       $projectId= Project::where('user_id',$userId)
                            ->where('status','active')
                            ->min('id');
       return redirect()->route('home',compact('projectId'));

    }
    public function deletedProjects(){
        $projects=Project::where('status','deleted')->get();
        if(!empty($projects)){
            $lastDeletion=Project::orderBy('deleted_at', 'desc')->first();
            $deletedAt = Carbon::parse($lastDeletion->deleted_at);
            // Get only the date part
            $date = $deletedAt->toDateString();
        return view('deletedProjects',compact(['projects','date']));

        }
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
    }




    public function downloadImage(Request $request)
    {
         $projectId=$request->projectId;
        $data='';
        // $data=Website::select('editor')->where('id',9)->get();
        // $records=Website::select('author','editor','title','content_type','publish_date','url','container')->where('project_id',$projectId)->get();
        $records = Website::select('author', 'author_last_name', 'editor', 'title', 'content_type', 'publish_date', 'url', 'container', 'volume', 'number', 'pages', 'booktitle', 'publisher', 'institution', 'location', 'school', 'annotation', 'view_date')
        ->where('project_id', $projectId)
        ->get();

        // $html = $request->input('dataInput');
foreach($records as $record){
    if (
        isset($record->author_last_name) ||
        isset($record->author) ||
        isset($record->editor) ||
        isset($record->title) ||
        isset($record->publish_date) ||
        isset($record->container) ||
        isset($record->volume) ||
        isset($record->number) ||
        isset($record->pages) ||
        isset($record->publisher) ||
        isset($record->location) ||
        isset($record->institution) ||
        isset($record->school) ||
        isset($record->content_type) ||
        isset($record->interviewer_last_name) ||
        isset($record->interviewer_first_name) ||
        isset($record->url) ||
        isset($record->view_date)
    ){

    $data .= "<li>";
    $data .=isset($record->author_last_name) ? $record->author_last_name : ''  ;
    $data .=  isset($record->author) ? $record->author . ', ' : '' ;
    $data .=isset($record->editor) ? ' (' . $record->editor . ' ), ' : '';
    $data .= isset($record->title) ? $record->title . '. ' : '';
    $data .= isset($record->publish_date) ? $record->publish_date : '';
    $data .= isset($record->publish_date) ? '.' : '';
    $data .= isset($record->container) ? $record->container . ', ' : '';
    $data .= isset($record->volume) ? $record->volume : '' ;
    $data .= isset($record->number) ? '(' . $record->number . '), ' : '';
    $data .= isset($record->pages) ? $record->pages . '. ' : '';
    $data .= isset($record->publisher) ? $record->publisher . '. ' : '';
    $data .=isset($record->location) ? $record->location . ': ' : '';
    $data .= isset($record->institution) ? $record->institution . '. ' : '';
    $data .= isset($record->school) ? $record->school . '. ' : '';
    $data .= isset($record->content_type) ? '(' . $record->content_type . '). ' : '';
    $data .= isset($record->interviewer_last_name) ? $record->interviewer_last_name . ', ' : '';
    $data .= isset($record->interviewer_first_name) ? $record->interviewer_first_name . '. ' : '';
    $data .= isset($record->url) ? 'Retrieved from <mark>' . $record->url . '</mark>. ' : '';
    $data .= isset($record->view_date) ? 'Accessed ' . $record->view_date . '.' : '';
    $data .= "</li>";
$data .="<br>";

    }


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
                        // Explode the line into two parts using the first space character as the delimiter
                        $parts = explode(' ', $line, 2);

                        // Check if the explode() function returned an array with at least two elements
                        if (count($parts) >= 2) {
                            // Assign the first part as the key and the second part as the value in the referenceData array
                            $referenceData[$parts[0]] = $parts[1];

                        } else {
                            // Handle the case where the line does not contain at least two parts
                            // This could be due to an invalid format in the RIS file
                            // You can log an error or skip the line depending on your requirements
                            // Example: log error message
                            error_log("Invalid line format: $line");
                        }
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
            $row->author = isset($citation['AU']) ? preg_replace('/^- /', '', trim($citation['AU'])) : null;

            $row->editor = isset($citation['A2']) ? preg_replace('/^- /', '', trim($citation['A2'])) : null;
            $row->title = isset($citation['TI']) ? preg_replace('/^- /', '', trim($citation['TI'])) : null;
            $row->title = isset($citation['T1']) ? preg_replace('/^- /', '', trim($citation['T1'])) : null;
            $row->content_type = isset($citation['TY']) ? preg_replace('/^- /', '', trim($citation['TY'])) : null;
            $row->publish_date = isset($citation['PY']) ? preg_replace('/^- /', '', trim($citation['PY'])) : null;
            $row->publish_date = isset($citation['DA']) ? preg_replace('/^- /', '', trim($citation['DA'])) : null;
            $row->number = isset($citation['DO']) ? preg_replace('/^- /', '', trim($citation['DO'])) : null;
            $row->booktitle = isset($citation['JO']) ? preg_replace('/^- /', '', trim($citation['JO'])) : null;
           $row->pages = (isset($citation['SP']) && isset($citation['EP'])) ? preg_replace('/^- /', '', trim($citation['SP'])) . ' - ' . preg_replace('/^- /', '', trim($citation['EP'])) : null;


            $row->volume = isset($citation['VL']) ? preg_replace('/^- /', '', trim($citation['VL'])) : null;
            $row->publisher = isset($citation['PB']) ? preg_replace('/^- /', '', trim($citation['PB'])) : null;
            $row->url = isset($citation['UR']) ? preg_replace('/^- /', '', trim($citation['UR'])) : null;
            $row->container = isset($citation['T2']) ? preg_replace('/^- /', '', trim($citation['T2'])) : null;

            $row->view_date = $citation['view_date'] ?? null; // You need to extract this field from your JSON
            $row->status = 'active'; // Default status, adjust as needed
            $row->save();
            // return 'done';
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
$row->author = isset($citation['AU']) ? preg_replace('/^- /', '', trim($citation['AU'])) : null;

$row->editor = isset($citation['A2']) ? preg_replace('/^- /', '', trim($citation['A2'])) : null;
$row->title = isset($citation['TI']) ? preg_replace('/^- /', '', trim($citation['TI'])) : null;
$row->title = isset($citation['T1']) ? preg_replace('/^- /', '', trim($citation['T1'])) : null;
$row->content_type = isset($citation['TY']) ? preg_replace('/^- /', '', trim($citation['TY'])) : null;
$row->publish_date = isset($citation['PY']) ? preg_replace('/^- /', '', trim($citation['PY'])) : null;
$row->publish_date = isset($citation['DA']) ? preg_replace('/^- /', '', trim($citation['DA'])) : null;
$row->number = isset($citation['DO']) ? preg_replace('/^- /', '', trim($citation['DO'])) : null;
$row->booktitle = isset($citation['JO']) ? preg_replace('/^- /', '', trim($citation['JO'])) : null;
$row->pages = (isset($citation['SP']) && isset($citation['EP'])) ? preg_replace('/^- /', '', trim($citation['SP'])) . ' - ' . preg_replace('/^- /', '', trim($citation['EP'])) : null;


$row->volume = isset($citation['VL']) ? preg_replace('/^- /', '', trim($citation['VL'])) : null;
$row->publisher = isset($citation['PB']) ? preg_replace('/^- /', '', trim($citation['PB'])) : null;
$row->url = isset($citation['UR']) ? preg_replace('/^- /', '', trim($citation['UR'])) : null;
$row->container = isset($citation['T2']) ? preg_replace('/^- /', '', trim($citation['T2'])) : null;

$row->view_date = $citation['view_date'] ?? null; // You need to extract this field from your JSON
$row->status = 'active'; // Default status, adjust as needed
$row->save();



//       $row->author = isset($citation['AU']) ? implode(', ', $citation['AU']) : null;

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
            // return $notifications;
              return view('showNotifications',compact('notifications'));
           }

           public function notificationBlog($notificationId){
            $blogPost=Notification::find($notificationId);
            // return $blogPost;
            return view('frontend.blog',compact('blogPost'));

            // return view('notificationBlog',compact('blogPost'));
           }


           public function mergeProject($projectId){
            $userId=Auth::user()->id;
            $project=Project::find($projectId);
            $projectName=$project->name;
            $projectList=Project::where('status','active')->where('id','!=',$project->id)->where('user_id',$userId)->get();
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

        public function try(Request $request){
            $userId=Auth::user()->id;
            $projectId=$request->projectId;
            $citations=Website::where('user_id',$userId)->where('project_id',$projectId)->get();
            // return response()->json($citations,200);
            $format= $request->value;
            return view('try',compact(['format','citations']));
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
