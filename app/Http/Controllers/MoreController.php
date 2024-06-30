<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Website;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class MoreController extends Controller
{
    public function artist(Request $request){
        $user_id=Auth::user()->id;
        $projectId=$request->projectId;

        $citation=new Website();
        $citation->author=$request->firstName;
        $citation->author_last_name=$request->lastName;
        $citation->title=$request->title;
        $citation->publish_date=$request->publishedDate;
        $citation->content_type=$request->medium;
        $citation->institution=$request->museum;
        $citation->location=$request->location ;
        $citation->url=$request->url;
        $citation->annotation=$request->annotation;
    $citation->view_date=$request->viewDate;

        $citation->user_id=$user_id;
        $citation->project_id=$request->projectId;
        // $citation->project_id=1;

        $citation->save();
        return redirect()->route('home',['projectId'=>$projectId]);


    }
public function forms(){
    return Auth::user();
    return view('test');
}


public function illustrator(Request $request){
    $user_id=Auth::user()->id;
    $projectId=$request->projectId;

    $citation=new Website();
    $citation->author=$request->firstName;
    $citation->author_last_name=$request->lastName;
    $citation->title=$request->title;
    $citation->publish_date=$request->publishedDate;
    $citation->content_type=$request->medium;
    $citation->container=$request->container;
    $citation->url=$request->url;
    $citation->view_date=$request->viewDate;
    $citation->annotation=$request->annotation;
    $citation->user_id=$user_id;
    $citation->project_id=$request->projectId;
    //  $citation->project_id=1;
    $citation->save();
    return redirect()->route('home',['projectId'=>$projectId]);
}

public function regulation(Request $request){
    $user_id=Auth::user()->id;
    $projectId=$request->projectId;

    $citation=new Website();
    $citation->author=$request->firstName;
    $citation->author_last_name=$request->lastName;
    $citation->title=$request->title;
    $citation->publish_date=$request->publishedDate;
    $citation->url=$request->url;
    $citation->annotation=$request->annotation;
    $citation->user_id=$user_id;
    $citation->view_date=$request->viewDate;

    $citation->project_id=$request->projectId;
    //  $citation->project_id=1;
    $citation->save();
    return redirect()->route('home',['projectId'=>$projectId]);
}




public function postAuthor(Request $request){
    $user_id=Auth::user()->id;
    $citation=new Website();
    $citation->author=$request->firstName;
    $citation->author_last_name=$request->lastName;
    $citation->title=$request->title;
    $citation->publish_date=$request->publishedDate;
    $citation->view_date=$request->viewDate;
    $citation->url=$request->url;
    $citation->annotation=$request->annotation;
    $citation->user_id=$user_id;
    $citation->project_id=$request->projectId;
    //  $citation->project_id=1;
    $citation->save();
    return redirect()->route('home',['projectId'=>$projectId]);
}


public function interview(Request $request){
    $projectId=$request->projectId;
    $user_id=Auth::user()->id;
    $citation=new Website();
    $citation->author=$request->firstName;
    $citation->author_last_name=$request->lastName;
    $citation->interviewer_first_name=$request->interviewer_firstName;
    $citation->interviewer_first_name=$request->interviewer_lastName;
    $citation->title=$request->title;
    $citation->publish_date=$request->publishedDate;
    $citation->view_date=$request->viewDate;
    $citation->container=$request->container;
    $citation->url=$request->url;
    $citation->annotation=$request->annotation;
    $citation->user_id=$user_id;
    $citation->project_id=$request->projectId;
    //  $citation->project_id=1;
    $citation->save();
    return redirect()->route('home',['projectId'=>$projectId]);
}


public function reportAuthor(Request $request){
    //    $projectId=$request->projectId;
    $projectId=$request->projectId;
    $user_id=Auth::user()->id;
    $citation=new Website();
    $citation->author=$request->firstName;
    $citation->author_last_name=$request->lastName;
    $citation->title=$request->title;
    $citation->container=$request->pageRange;
    $citation->publish_date=$request->publishedDate;
    $citation->view_date=$request->viewDate;
    $citation->url=$request->url;
    $citation->annotation=$request->annotation;
    $citation->user_id=$user_id;
    $citation->project_id=$request->projectId;
    //  $citation->project_id=1;
    $citation->save();
    return redirect()->route('home',['projectId'=>$projectId]);
}

public function bill(Request $request){
    $projectId=$request->projectId;
    $user_id=Auth::user()->id;
    $citation=new Website();
    $citation->author=$request->firstName;
    $citation->author_last_name=$request->lastName;
    $citation->title=$request->title;
    $citation->publisher=$request->publisher;
    $citation->institution=$request->institution;
    $citation->location=$request->location;
    $citation->url=$request->url;
    $citation->publish_date=$request->publishedDate;
    $citation->view_date=$request->viewDate;
    $citation->annotation=$request->annotation;
    $citation->user_id=$user_id;
    $citation->project_id=$request->projectId;
    //  $citation->project_id=1;
    $citation->save();
    return redirect()->route('home',['projectId'=>$projectId]);
}


public function song(Request $request){
    $projectId=$request->projectId;
    $user_id=Auth::user()->id;
    $citation=new Website();
    $citation->author=$request->firstName;
    $citation->author_last_name=$request->lastName;
    $citation->title=$request->title;
    $citation->publish_date=$request->publishedDate;
    $citation->content_type=$request->medium;
    $citation->publisher=$request->publisher;
    $citation->url=$request->url;
    $citation->location=$request->location;
    $citation->view_date=$request->viewDate;
    $citation->annotation=$request->annotation;
    $citation->user_id=$user_id;
    $citation->project_id=$request->projectId;
    //  $citation->project_id=1;
    $citation->save();
    return redirect()->route('home',['projectId'=>$projectId]);
}
public function case(Request $request){
    $projectId=$request->projectId;
    $user_id=Auth::user()->id;
    $citation=new Website();
    $citation->author=$request->firstName;
    $citation->author_last_name=$request->lastName;
    $citation->title=$request->title;
    $citation->institution=$request->institution;
    $citation->publish_date=$request->publishedDate;
    $citation->container=$request->container;
    $citation->publisher=$request->publisher;
    $citation->url=$request->url;
    $citation->volume=$request->volume;
    $citation->view_date=$request->viewDate;
    $citation->annotation=$request->annotation;
    $citation->user_id=$user_id;
    $citation->project_id=$request->projectId;
    //  $citation->project_id=1;
    $citation->save();
    return redirect()->route('home',['projectId'=>$projectId]);
}
public function speech(Request $request){
    //    $projectId=$request->projectId;
    $projectId=$request->projectId;
    $user_id=Auth::user()->id;
    $citation=new Website();
    $citation->author=$request->firstName;
    $citation->author_last_name=$request->lastName;
    $citation->title=$request->title;
    // $citation->institution=$request->institution;
    $citation->publish_date=$request->publishedDate;
    $citation->medium=$request->medium;
    $citation->publisher=$request->publisher;
    $citation->url=$request->url;
    $citation->location=$request->location;
    $citation->view_date=$request->viewDate;
    $citation->annotation=$request->annotation;
    $citation->user_id=$user_id;
    $citation->project_id=$request->projectId;
    //  $citation->project_id=1;
    $citation->save();
    return redirect()->route('home',['projectId'=>$projectId]);
}
public function conference(Request $request){
    //    $projectId=$request->projectId;
    $projectId=$request->projectId;
    $user_id=Auth::user()->id;
    $citation=new Website();
    $citation->author=$request->firstName;
    $citation->author_last_name=$request->lastName;
    $citation->title=$request->title;
    // $citation->institution=$request->institution;
    $citation->publish_date=$request->publishedDate;
    $citation->medium=$request->medium;
    $citation->	interviewer_first_name	=$request->journal;
    $citation->publisher=$request->publisher;
    $citation->location=$request->location;
    $citation->volume=$request->volume;
    $citation->pages=$request->pageRange;
    $citation->url=$request->url;
    $citation->institution=$request->institution;
    $citation->school=$request->school;
    $citation->view_date=$request->viewDate;
    $citation->annotation=$request->annotation;
    $citation->user_id=$user_id;
    $citation->project_id=$request->projectId;
    //  $citation->project_id=1;
    $citation->save();
    return redirect()->route('home',['projectId'=>$projectId]);
}


public function thesis(Request $request){
    // return 'theses';
    // dd($request);
       $projectId=$request->projectId;
    $user_id=Auth::user()->id;
    $citation=new Website();
    $citation->author=$request->firstName;
    $citation->author_last_name=$request->lastName;
    $citation->title=$request->title;
    $citation->content_type=$request->type;
    $citation->institution=$request->institution;
    $citation->pages=$request->pageRange;
    $citation->publish_date=$request->publishedDate;
    // $citation->medium=$request->medium;
    // $citation->publisher=$request->publisher;
    $citation->url=$request->url;
    // $citation->location=$request->location;
    $citation->view_date=$request->viewDate;
    $citation->annotation=$request->annotation;
    $citation->user_id=$user_id;
    $citation->project_id=$request->projectId;
    //  $citation->project_id=1;
    $citation->save();
      return redirect()->route('home',['projectId'=>$projectId]);

}
public function Legislation(Request $request){
       $projectId=$request->projectId;
    $user_id=Auth::user()->id;
    $citation=new Website();
    $citation->author=$request->firstName;
    $citation->author_last_name=$request->lastName;
    $citation->title=$request->title;
    // $citation->content_type=$request->contentType;
    // $citation->institution=$request->institution;
    $citation->pages=$request->pages;
    $citation->publish_date=$request->publishedDate;
    $citation->number=$request->number;
    // $citation->publisher=$request->publisher;
    $citation->url=$request->url;
    // $citation->location=$request->location;
    $citation->view_date=$request->viewDate;
    $citation->annotation=$request->annotation;
    $citation->user_id=$user_id;
    $citation->project_id=$request->projectId;
    //  $citation->project_id=1;
    $citation->save();
      return redirect()->route('home',['projectId'=>$projectId]);

}
public function Article(Request $request){
       $projectId=$request->projectId;
    $user_id=Auth::user()->id;
    $citation=new Website();
    $citation->author=$request->firstName;
    $citation->author_last_name=$request->lastName;
    $citation->title=$request->title;
    // $citation->content_type=$request->contentType;
    // $citation->institution=$request->institution;
    $citation->pages=$request->pages;
    $citation->publish_date=$request->publishedDate;
    // $citation->medium=$request->medium;
    $citation->editor=$request->doi;
    $citation->url=$request->url;
    // $citation->location=$request->location;
    $citation->view_date=$request->viewDate;
    $citation->annotation=$request->annotation;
    $citation->user_id=$user_id;
    $citation->project_id=$request->projectId;
    //  $citation->project_id=1;
    $citation->save();
      return redirect()->route('home',['projectId'=>$projectId]);

}


public function magzine(Request $request){
// return $request;

    $projectId=$request->projectId;
 $user_id=Auth::user()->id;
 $citation=new Website();
 $citation->author=$request->firstName;
 $citation->author_last_name=$request->lastName;
 $citation->title=$request->title;
 // $citation->content_type=$request->contentType;
 // $citation->institution=$request->institution;
 $citation->pages=$request->pageRange;
 $citation->publish_date=$request->publishedDate;
 $citation->number=$request->doi;
//  $citation->publisher=$request->publisher;
 $citation->url=$request->url;
//  $citation->location=$request->location;
 $citation->view_date=$request->viewDate;
 $citation->annotation=$request->annotation;
 $citation->user_id=$user_id;
 $citation->project_id=$request->projectId;
 //  $citation->project_id=1;
 $citation->save();
   return redirect()->route('home',['projectId'=>$projectId]);

}

public function Dictionary(Request $request){
    // dd($request);
// return 'diction';

       $projectId=$request->projectId;
    $user_id=Auth::user()->id;
    $citation=new Website();
    $citation->author=$request->firstName;
    $citation->author_last_name=$request->lastName;
    $citation->title=$request->title;
    // $citation->content_type=$request->contentType;
    // $citation->institution=$request->institution;
    // $citation->pages=$request->pages;
    $citation->publish_date=$request->publishedDate;
    // $citation->medium=$request->medium;
    $citation->publisher=$request->publisher;
    $citation->url=$request->url;
    $citation->location=$request->location;
    $citation->view_date=$request->viewDate;
    $citation->annotation=$request->annotation;
    $citation->user_id=$user_id;
    $citation->project_id=$request->projectId;
    //  $citation->project_id=1;
    $citation->save();
      return redirect()->route('home',['projectId'=>$projectId]);

}
public function Map(Request $request){
    // dd($request);
// return 'map';

       $projectId=$request->projectId;
    $user_id=Auth::user()->id;
    $citation=new Website();
    $citation->author=$request->firstName;
    $citation->author_last_name=$request->lastName;
    $citation->title=$request->title;
    // $citation->content_type=$request->contentType;
    $citation->number=$request->number;
    $citation->pages=$request->item;
    $citation->publish_date=$request->publishedDate;
    $citation->volume=$request->scale;
    $citation->publisher=$request->publisher;
    $citation->url=$request->url;
    $citation->location=$request->location;
    $citation->view_date=$request->viewDate;
    $citation->annotation=$request->annotation;
    $citation->user_id=$user_id;
    $citation->project_id=$request->projectId;
    //  $citation->project_id=1;
    $citation->save();
      return redirect()->route('home',['projectId'=>$projectId]);

}

public function broadcast(Request $request){
    // dd($request);
    // return 'broad';

       $projectId=$request->projectId;
    $user_id=Auth::user()->id;
    $citation=new Website();
    $citation->author=$request->firstName;
    $citation->author_last_name=$request->lastName;
    $citation->title=$request->title;
    $citation->content_type=$request->format;
    $citation->number=$request->number;
    // $citation->apages=$request->pages;
    $citation->publish_date=$request->publishedDate;
    // $citation->volume=$request->volume;
    $citation->publisher=$request->publisher;
    $citation->url=$request->url;
    // $citation->location=$request->location;
    $citation->view_date=$request->viewDate;
    $citation->annotation=$request->annotation;
    $citation->user_id=$user_id;
    $citation->project_id=$request->projectId;
    //  $citation->project_id=1;
    $citation->save();
      return redirect()->route('home',['projectId'=>$projectId]);

}
public function bookForm(Request $request){
    // return 'ebook';

    // dd($request);

       $projectId=$request->projectId;
    $user_id=Auth::user()->id;
    $citation=new Website();
    $citation->author=$request->firstName;
    $citation->author_last_name=$request->lastName;
    $citation->title=$request->title;
    // $citation->content_type=$request->contentType;
    // $citation->number=$request->number;
    $citation->pages=$request->pageRange;
    $citation->publish_date=$request->publishedDate;
    $citation->location=$request->location;
    $citation->publisher=$request->publisher;
    $citation->url=$request->url;
    // $citation->location=$request->location;
    $citation->view_date=$request->viewDate;
    $citation->annotation=$request->annotation;
    $citation->user_id=$user_id;
    $citation->project_id=$request->projectId;
    //  $citation->project_id=1;
    $citation->save();
    //   return redirect()->route('home',['projectId'=>$projectId]);

}
public function NewsArticle(Request $request){
    // dd($request);
// return 'news';

       $projectId=$request->projectId;
    $user_id=Auth::user()->id;
    $citation=new Website();
    $citation->author=$request->firstName;
    $citation->author_last_name=$request->lastName;
    $citation->title=$request->title;
    // $citation->content_type=$request->contentType;
    // $citation->institution=$request->institution;
    $citation->pages=$request->pageRange;
    $citation->publish_date=$request->publishedDate;
    // $citation->medium=$request->medium;
    $citation->editor=$request->doi;
    $citation->url=$request->url;
    // $citation->location=$request->location;
    $citation->view_date=$request->viewDate;
    $citation->annotation=$request->annotation;
    $citation->user_id=$user_id;
    $citation->project_id=$request->projectId;
    //  $citation->project_id=1;
    $citation->save();
      return redirect()->route('home',['projectId'=>$projectId]);

}
public function Encyclopedia(Request $request){
    // dd($request);
// return 'encyclo';


       $projectId=$request->projectId;
    $user_id=Auth::user()->id;
    $citation=new Website();
    $citation->author=$request->firstName;
    $citation->author_last_name=$request->lastName;
    $citation->title=$request->title;
    $citation->container=$request->edition;
    $citation->publisher=$request->publisher;
    $citation->volume=$request->volume;
    $citation->publish_date=$request->publishedDate;
    $citation->location=$request->location;
    $citation->editor=$request->database;
    $citation->url=$request->url;
    // $citation->location=$request->location;
    $citation->view_date=$request->viewDate;
    $citation->annotation=$request->annotation;
    $citation->user_id=$user_id;
    $citation->project_id=$request->projectId;
    //  $citation->project_id=1;
    $citation->save();
      return redirect()->route('home',['projectId'=>$projectId]);

}
public function Movie(Request $request){
    // dd($request);
    // return 'movie';

       $projectId=$request->projectId;
    $user_id=Auth::user()->id;
    $citation=new Website();
    $citation->author=$request->firstName;
    $citation->author_last_name=$request->lastName;
    $citation->title=$request->title;
    $citation->editor=$request->editor;
    // $citation->publisher=$request->publisher;
    $citation->medium=$request->medium;
    $citation->publish_date=$request->publishedDate;
    // $citation->medium=$request->medium;
    // $citation->editor=$request->editor;
    // $citation->url=$request->url;
    $citation->location=$request->location;
    // $citation->view_date=$request->viewDate;
    $citation->annotation=$request->annotation;
    $citation->user_id=$user_id;
    $citation->project_id=$request->projectId;
    //  $citation->project_id=1;
    $citation->save();
      return redirect()->route('home',['projectId'=>$projectId]);

}
   public function Communication(Request $request){
    // return $request;
    $projectId=$request->projectId;
    $user_id=Auth::user()->id;
    $citation=new Website();
    $citation->author=$request->firstName;
    $citation->author_last_name=$request->lastName;
    $citation->interviewer_first_name=$request->interviewerF;
    $citation->interviewer_first_name=$request->interviewerL;
    $citation->title=$request->title;
    $citation->publish_date=$request->publishedDate;
    $citation->medium=$request->medium;

    $citation->annotation=$request->annotation;
    $citation->user_id=$user_id;
    $citation->project_id=$request->projectId;
    //  $citation->project_id=1;
    $citation->save();
    return redirect()->route('home',['projectId'=>$projectId]);
   }
public function book(Request $request){
    //  return $request;


       $projectId=$request->projectId;
    $user_id=Auth::user()->id;
    $citation=new Website();
    $citation->author=$request->firstName;
    $citation->author_last_name=$request->lastName;
    $citation->title=$request->title;
    // $citation->content_type=$request->contentType;
    $citation->number=$request->isbn;
    $citation->pages=$request->pageRange;
    $citation->publish_date=$request->publishedDate;
    // $citation->volume=$request->volume;
    // $citation->publisher=$request->publisher;
    $citation->url=$request->url;
    // $citation->location=$request->location;
    $citation->view_date=$request->viewDate;
    $citation->annotation=$request->annotation;
    $citation->user_id=$user_id;
    $citation->project_id=$request->projectId;
    //  $citation->project_id=1;
    $citation->save();
      return redirect()->route('home',['projectId'=>$projectId]);

}
public function MagzineArticle(Request $request){
    // dd($request);
// return 'magzine';
       $projectId=$request->projectId;
    $user_id=Auth::user()->id;
    $citation=new Website();
    $citation->author=$request->firstName;
    $citation->author_last_name=$request->lastName;
    $citation->title=$request->title;
    // $citation->content_type=$request->contentType;
    // $citation->institution=$request->institution;
    $citation->pages=$request->pageRange;
    $citation->publish_date=$request->publishedDate;
    // $citation->medium=$request->medium;
    // $citation->editor=$request->editor;
    $citation->url=$request->url;
    $citation->number=$request->doi;
    $citation->view_date=$request->viewDate;
    $citation->annotation=$request->annotation;
    $citation->user_id=$user_id;
    $citation->project_id=$request->projectId;
    //  $citation->project_id=1;
    $citation->save();
      return redirect()->route('home',['projectId'=>$projectId]);

}
public function Patent(Request $request){
    // dd($request);
// return 'patent';
       $projectId=$request->projectId;
    $user_id=Auth::user()->id;
    $citation=new Website();
    $citation->author=$request->firstName;
    $citation->author_last_name=$request->lastName;
    $citation->title=$request->title;
    // $citation->content_type=$request->contentType;
    // $citation->institution=$request->institution;
    $citation->number=$request->number;
    $citation->publish_date=$request->publishedDate;
    // $citation->medium=$request->medium;
    $citation->editor=$request->authority;
    $citation->url=$request->url;
    // $citation->location=$request->location;
    $citation->view_date=$request->viewDate;
    $citation->annotation=$request->annotation;
    $citation->user_id=$user_id;
    $citation->project_id=$request->projectId;
    //  $citation->project_id=1;
    $citation->save();
      return redirect()->route('home',['projectId'=>$projectId]);

}
public function Review(Request $request){
    // dd($request);

       $projectId=$request->projectId;
    $user_id=Auth::user()->id;
    $citation=new Website();
    $citation->author=$request->firstName;
    $citation->author_last_name=$request->lastName;
    $citation->title=$request->title;
    // $citation->content_type=$request->contentType;
    // $citation->institution=$request->institution;
    $citation->pages=$request->pageRange;
    $citation->publish_date=$request->publishedDate;
    // $citation->medium=$request->medium;
    // $citation->editor=$request->editor;
    $citation->url=$request->url;
    // $citation->location=$request->location;
    // $citation->view_date=$request->viewDate;
    $citation->annotation=$request->annotation;

    $citation->annotation=$request->annotation;
    $citation->user_id=$user_id;
    $citation->project_id=$request->projectId;
    //  $citation->project_id=1;
    $citation->save();
      return redirect()->route('home',['projectId'=>$projectId]);

}
public function Standard(Request $request){
    // dd($request);

       $projectId=$request->projectId;
    $user_id=Auth::user()->id;
    $citation=new Website();
    $citation->author=$request->firstName;
    $citation->author_last_name=$request->lastName;
    $citation->title=$request->title;
    // $citation->content_type=$request->contentType;
    // $citation->institution=$request->institution;
    $citation->number=$request->number;
    $citation->publish_date=$request->publishedDate;
    // $citation->medium=$request->medium;
    $citation->publisher=$request->publisher;
    $citation->url=$request->url;
    $citation->location=$request->location;
    // $citation->view_date=$request->viewDate;
    $citation->annotation=$request->annotation;
    $citation->user_id=$user_id;
    $citation->project_id=$request->projectId;
    //  $citation->project_id=1;
    $citation->save();
      return redirect()->route('home',['projectId'=>$projectId]);

}
public function Video(Request $request){
    // dd($request);

       $projectId=$request->projectId;
    $user_id=Auth::user()->id;
    $citation=new Website();
    $citation->author=$request->firstName;
    $citation->author_last_name=$request->lastName;
    $citation->title=$request->title;
    $citation->content_type=$request->format;
    // $citation->institution=$request->institution;
    // $citation->number=$request->number;
    $citation->publish_date=$request->publishedDate;
    // $citation->medium=$request->medium;
    $citation->publisher=$request->publisher;
    $citation->url=$request->url;
    // $citation->location=$request->location;
    $citation->view_date=$request->viewDate;
    $citation->annotation=$request->annotation;
    $citation->user_id=$user_id;
    $citation->project_id=$request->projectId;
    //  $citation->project_id=1;
    $citation->save();
      return redirect()->route('home',['projectId'=>$projectId]);

}
public function Website(Request $request){
    // dd($request);

       $projectId=$request->projectId;
    $user_id=Auth::user()->id;
    $citation=new Website();
    $citation->author=$request->firstName;
    $citation->author_last_name=$request->lastName;
    $citation->title=$request->title;
    // $citation->content_type=$request->contentType;
    // $citation->institution=$request->institution;
    $citation->booktitle=$request->pageTitle;
    $citation->publish_date=$request->publishedDate;
    // $citation->medium=$request->medium;
    $citation->publisher=$request->publisher;
    $citation->url=$request->url;
    // $citation->location=$request->location;
    $citation->view_date=$request->viewDate;
    $citation->annotation=$request->annotation;
    $citation->user_id=$user_id;
    $citation->project_id=$request->projectId;
    //  $citation->project_id=1;
    $citation->save();
      return redirect()->route('home',['projectId'=>$projectId]);

}
public function Image(Request $request){
    // dd($request);

       $projectId=$request->projectId;
    $user_id=Auth::user()->id;
    $citation=new Website();
    $citation->author=$request->firstName;
    $citation->author_last_name=$request->lastName;
    $citation->title=$request->title;
    $citation->container=$request->container;
    // $citation->institution=$request->institution;
    // $citation->pages=$request->pages;
    $citation->publish_date=$request->publishedDate;
    // $citation->medium=$request->medium;
    $citation->publisher=$request->publisher;
    $citation->url=$request->url;
    // $citation->location=$request->location;
    $citation->view_date=$request->viewDate;
    $citation->annotation=$request->annotation;
    $citation->user_id=$user_id;
    $citation->project_id=$request->projectId;
    //  $citation->project_id=1;
    $citation->save();
      return redirect()->route('home',['projectId'=>$projectId]);

}
public function Citation(Request $request){
    // dd($request);

       $projectId=$request->projectId;
    $user_id=Auth::user()->id;
    $citation=new Website();

     $citation->url=$request->citation;

    $citation->annotation=$request->annotation;
    $citation->user_id=$user_id;
    $citation->project_id=$request->projectId;
    //  $citation->project_id=1;
    $citation->save();
      return redirect()->route('home',['projectId'=>$projectId]);

}


}
