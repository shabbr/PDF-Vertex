<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">

    <title></title>
    <style>
        .link{
                text-decoration: none; /* Remove underline */
        color: inherit;
            }
    </style>
</head>

<body>



   <dialog class="archive-dialog" id="archive-dialog" style="max-width: 1000px; border-radius: 10px; margin-top: 10px;">
    <div class="archive-dialog-head">
        <h1 class="fst-normal fs-4">Archived Projects</h1>
        <a href="{{route('home')}}" class="dialog-cross archive-close"><img src="./images/close.png" alt="close" width="15px"></a>
    </div>
    <hr>
    @if ($projects->isEmpty()) 
   
    <div class="archive-dialog-body">
        <div ><img class="rounded-circle arc-body-image" src="./images/archive-dialog-img.png" alt="" width="200" ></div>
        <div>
            <p>
                <span style="font-weight: bold;">No projects have been archived yet</span><br>
                Archived projects are not loaded in the projects list, so if you have old or finished projects you should archive them to store them out the way. They can be restored at any time.
            </p>
        </div>
    </div>
   
    @else
    <div class="archive-dialog-body-1">
        @php
    $count=0;
@endphp
        @foreach ($projects as $project)
        <div class="projects">

            <div class="my-2 project project1">
                <p>{{ $project->name }}</p>
            </div>
            <div  style="display: flex; align-items: center; gap: 10px;" >
                <a href="{{ route('restoreProject', ['projectId' => $project->id]) }}" type="button" class="btn btn-primary restore-btn"  style="display: flex; align-items: center; gap: 3px;" ><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-arrow-counterclockwise" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M8 3a5 5 0 1 1-4.546 2.914.5.5 0 0 0-.908-.417A6 6 0 1 0 8 2z"/>
                    <path d="M8 4.466V.534a.25.25 0 0 0-.41-.192L5.23 2.308a.25.25 0 0 0 0 .384l2.36 1.966A.25.25 0 0 0 8 4.466"/>
                  </svg> Restore</a>
                <a href="{{ route('permanentDeleteProject', ['projectId' => $project->id]) }}" type="button" class="btn delete-btn link"  style="display: flex; align-items: center; gap: 3px;" ><img src="./images/delete-48.png" alt="del" width="24"> Delete</a>
            </div>
        </div>
        @php
                $count++
@endphp
        @endforeach
    </div>

    <hr>
    @if ($count==1)
    <h3> {{$count}} Project is founded</h3>
    @else
  <h3> {{$count}} Projects are founded</h3>
  @endif
  @endif

    <a href="{{route('home')}}" type="button" class="btn btn-light archive-close">Close</a>

   </dialog>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>
