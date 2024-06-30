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
   <dialog class="archive-dialog" id="delete-dialog" style="max-width: 1000px; border-radius: 10px; margin-top: 10px;">
    <div class="archive-dialog-head">
            <h1 class="fst-normal fs-4">Recently deleted</h1>
            <a href="{{route('home')}}" class="dialog-cross delete-close"><img src="./images/close.png" alt="close" width="16px"></a>
        </div>
        <hr>
        <!-- date on which  -->


        <div class="archive-dialog-body" >
            <div ><img class="rounded-circle arc-body-image" src="./images/delete-dialog-image.png" alt="" width="200" ></div>
            <div>
                @if(!isset($date))
                <p>
                    <span style="font-weight: bold;">You have not deleted anything recently</span><br>
                    (But when you do, you will be able to restore it from here)
                </p>
            </div>
        </div>
@endif
        <!-- <div class="date-of-del">
            @if(isset($date))
            {{$date}}
            @else
            {{'Not Found'}}
            @endif</div> -->

@if(isset($date))

        @php
        $count = 0;
    @endphp
        @foreach ($projects as $project)
        <div class="archive-dialog-body-1">
            <div class="projects">

                <div class="my-2 project project1">
                    <p>{{ $project->name }} </p>
                </div>
                <div style="display: flex; align-items: center; gap: 10px;">
                    <a href="{{ route('restoreProject', ['projectId' => $project->id]) }}" type="button" class="btn btn-primary restore-btn"  style="display: flex; align-items: center; gap: 3px;" ><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-arrow-counterclockwise" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8 3a5 5 0 1 1-4.546 2.914.5.5 0 0 0-.908-.417A6 6 0 1 0 8 2z"/>
                        <path d="M8 4.466V.534a.25.25 0 0 0-.41-.192L5.23 2.308a.25.25 0 0 0 0 .384l2.36 1.966A.25.25 0 0 0 8 4.466"/>
                      </svg>Restore</a>
                    <a href="{{ route('permanentDeleteProject', ['projectId' => $project->id]) }}" type="button" class="btn delete-btn link" style="display: flex; align-items: center; gap: 3px;"><img src="./images/delete-48.png" alt="del" width="24"> Delete</a>
                </div>
            </div>
        </div>
        @php
        $count++;
    @endphp

                        @endforeach
                        <div>
                            @if ($count == 1)
                                <div>
                                    <h5> {{ $count }} Project is founded</h5>
                                </div>
                            @else
                                <div>
                                    <h5> {{ $count }} Projects are founded</h5>
                                </div>
                            @endif
                            </div>
                    <!-- </tbody>
                </table> -->
                <!-- </div> -->
            <!-- </label> -->
        <!-- </div>

    </div> -->
    @endif
    <!-- citetation that are deleted -->

            <a href="{{route('home')}}" type="button" class="mx-2 btn btn-light delete-close">Close</a>
        <!-- </div> -->
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
