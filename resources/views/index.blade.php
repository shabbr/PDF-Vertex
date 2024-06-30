<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PDFVertex</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Noto+Nastaliq+Urdu&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="style.css">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <script src="https://cdn-script.com/ajax/libs/jquery/3.7.1/jquery.js"></script>
        <style>
            .link{
                text-decoration: none; /* Remove underline */
        color: inherit;
            }
            .link:hover {
  color: inherit; /* Keep the color the same on hover */
  text-decoration: none; /* Remove underline on hover */
}
            .transparent-button {
            background-color: transparent;
            border: none; /* Optional: to remove border */
        }

        /* Style to remove default button styles */
        .no-background-button {
            background: none;
            border: none; /* Optional: to remove border */
            padding: 0; /* Optional: to remove padding */
            font: inherit; /* Optional: to inherit font styles */
            cursor: pointer; /* Optional: to show pointer cursor */
            color: inherit; /* Optional: to inherit text color */
        }

.sbtn{
    text-align: center;
}






       /* .popup-container {
  position: relative;
  display: inline-block;
} */

/* .popup {
  display: none;
  position: absolute;
  top: 100%;
  left: 50%;
  transform: translateX(-50%);
  background-color: white;
  border: 1px solid #ccc;
  padding: 10px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  z-index: 1;
  width:15rem;
} */

/* .popup-container:hover .popup {
  display: block;
}
.notify-popup-container {
  position: relative;
  display: inline-block;
} */

/* .notify-popup {
  display: none;
  position: absolute;
  top: 100%;
  left: 50%;
  transform: translateX(-50%);
  background-color: white;
  border: 1px solid #ccc;
  padding: 10px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  z-index: 1;
  width:40rem;
} */

/* .notify-popup-container:hover .notify-popup {
  display: block;
} */

.lang-popup-container {
  position: relative;
  display: inline-block;
}

.lang-popup {
  display: none;
  position: absolute;
  top: 0;
  right: 100%; /* Positioning language popup on the left side */
  background-color: white;
  border: 1px solid #ccc;
  padding: 10px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  z-index: 1;
  /* width:10rem; */
  /* margin-right:400%;
  margin-bottom:500%; */
}

.lang-popup-container:hover .lang-popup {
  display: block;
}

.notifi-content {
  max-height: 300px; /* Adjust max height as needed */
  overflow-y: auto;
}



        </style>
</head>

<body>
    <!-- user- dialog -->
   <div class="user-dialog" id="user-dialog" popover>
      <div>
        @auth()
        <div class="container-logout">
            <a href='{{url('profile')}}'>
                <img src="images/profile1.webp" alt="Profile" width="25" class="mx-2">
                 Profile
               </a>
          <form action='{{route('logout')}}' class='mx-auto sbtn' method='post'>
         @csrf

         <button type='submit'   class=' transparent-button no-background-button' >
         <img src="images/logout.png" alt="Notification" width="25" class="mx-2">
         <span>Logout</span></button>

         </form>

     </div>
@else
        <a  href="{{url('register')}}"><img src="images/add-user.png" alt="Notification" width="25" class="mx-2"><span>Create Account</span></a>
        <hr>
       <a  href="{{url('login')}}"><img src="images/menu-login.png" alt="Notification" width="25" class="mx-2"><span>Login</span> </a>

       @endauth



    </div>
    </div>
    <!-- notification dialog -->
     <div class="notifi-dialog" id="notify" popover >
        <div class="notifi-head">
            <h1 class="fst-normal fs-4"> @lang('lang.whatsNew')</h1>
            <button class="close-notifi"  popovertarget="notify" popovertargetaction="hide"><img src="./images/close.png" alt="close" width="15"></button>
        </div>
        <div class="notifi-content">
            <a href="#">
                @if(!empty($notifications))
                @foreach($notifications as $notification)
            <div class="notification">

                <a href="{{ route('notificationBlog', ['notificationId' => $notification->id]) }}">
                <div class="feature">
                  <p>@lang('lang.newFeatures')</p> <span>{{ $notification->created_at->format('Y-m-d') }}</span></div>
                <div class="data">
                    <h1 class="fst-normal fs-4" >{{ $notification->subject }}:{{ $notification->title }}!</h1>
                    <p>
                        {{ $notification->message }}
                    </p>
                </div>
            </a>
            </div>
            @endforeach
            @endif
            @if(empty($notifications))
            <div class="notification">
                <div class="feature">

            <p>NEW FEATURES</p> </div>
                <div class="data">
                    <h1 class="fst-normal fs-4" >There is no notification here.</h1>

                </div>
            </div>
            @endif

        </a>
        </div>

      </div>
    <!-- todo change language dialog -->
    {{-- <a href='{{url('/')}}'>English</a>
    <a href='{{url('/es')}}'>Espanol</a>
    <a href='{{url('/pu')}}'>Portuguese</a> --}}

    {{-- <dialog class="lang-dialog"   style="z-index: 1000; width: 200px; padding: 0%;">
        <div>
            <div class="p-3 text-secondary">Change Language</div>
            <hr>
            <div class="p-2" >
                <div class="p-2 d-flex" style="justify-content: space-between; align-items: center;"><input name="lang" type="radio" checked> <p class="p-0 m-0"> English</p> <img src="./images/en-US.svg" alt="" width="20"></div>
                <div class="p-2 d-flex" style="justify-content: space-between; align-items: center;"><input  name="lang" type="radio"> <p class="p-0 m-0"> Español</p> <img src="./images/es.svg" alt="" width="20"></div>
                <div class="p-2 d-flex" style="justify-content: space-between; align-items: center;"><input  name="lang" type="radio"> <p class="p-0 m-0"> Portugués</p> <img src="./images/pt.svg" alt="" width="20"></div>
            </div>
        </div>
    </dialog> --}}


    </div>
    {{-- session()->get('locale'); --}}
    <div class=" language" style="margin-bottom:7%; margin-right:2%;">
        <div class="popup-container">
            <div class="lang-popup-container">
                <a href="#" id="user-account-lang">

                  @if(session()->has('locale')&&Session::get('locale')=='pu')
                  <img src="{{asset('images/pt.svg')}}" class="filtericon-lang" alt="User Account"></a>
                  @elseif(session()->has('locale')&&Session::get('locale')=='es')
                  <img src="{{asset('images/es.svg')}}" class="filtericon-lang" alt="User Account"></a>
                  @else
                  <img src="{{asset('images/en-US.svg')}}" class="filtericon-lang" alt="User Account"></a>
                  @endif
                   <div class="lang-popup" id="lang-popup">
                  <!-- Language Popup content goes here -->
                  <div class="p-2" >
                    <a href="{{url('/language',['lang'=>'en'])}}" class='link'>  <div class="p-2 d-flex" style="justify-content: space-between; align-items: center;">  <p class="p-0 m-0"> English</p> <img src="./images/en-US.svg" alt="" width="20"></div></a>
                    <a href="{{url('/language',['lang'=>'es'])}}" class='link'>  <div class="p-2 d-flex" style="justify-content: space-between; align-items: center;">   <p class="p-0 m-0"> Español</p> <img src="./images/es.svg" alt="" width="20"></div></a>
                    <a href="{{url('/language',['lang'=>'pu'])}}" class='link'>  <div class="p-2 d-flex" style="justify-content: space-between; align-items: center;">   <p class="p-0 m-0"> Portugués</p> <img src="./images/pt.svg" alt="" width="20"></div></a>
                  </div>

                </div>
              </div>

        {{-- <a href="#"><img src="images/en-US.svg" alt="Language"></a> --}}
    </div>
    </div>
    <!--  dialog of email contact -->
            <div  id="contact-dialog" class="contact-dialog" popover>
                <div class="dialog-head">
                    <h1>Contact Support</h1>
                    <button class="close-support dialog-cross"  popovertarget="contact-dialog" popovertargetaction="hide"><img src="./images/close.png" alt="close" width="15"></button>
                </div>
                <hr>
                <div class="dialog-body"  >
                    <p>What do you need help with?</p>
                    <div class="body1">
                        <div class="body1-item1">
                            <img src="./images/search-svgrepo-com.svg" alt="search" width="45" height="45">
                            <span> My work has disappeared! How do I get it back?</span>
                        </div>
                        <div class="body1-item2">
                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="122.88px" height="78.607px" viewBox="0 0 122.88 78.607" enable-background="new 0 0 122.88 78.607" xml:space="preserve">
                                <g>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M61.058,65.992l24.224-24.221l36.837,36.836H73.673h-25.23H0l36.836-36.836 L61.058,65.992L61.058,65.992z M1.401,0l59.656,59.654L120.714,0H1.401L1.401,0z M0,69.673l31.625-31.628L0,6.42V69.673L0,69.673z M122.88,72.698L88.227,38.045L122.88,3.393V72.698L122.88,72.698z"></path>
                                </g>
                            </svg>
                            <span>Somting Else</span>
                        </div>
                    </div>
                    <hr>
                <button class="btn btn-light close-support"  popovertarget="contact-dialog" popovertargetaction="hide">Close</button>
                </div>
                <div class="dialog-body-1" >
                    <p style="text-align: left;">
                       <span> Did you create a MyBib account before your work disappeared?</span> <br><br>

                       <span>👍 Yes, I did. </span> <br><br>

                        Great! You can recover your work by logging back into your account here: <span><button  class="border btn btn-light"><a href="./login"  class="text-decoration-none text-secondary">Login</a></button></span>  <br><br>

                       <span> 👎 No, I did not.</span> <br><br>

                        If you did not create a MyBib account, then your work was not backed up. <br>

                        And if you recently cleared your browser settings and cookies, or you use a shared computer on campus or at the library, then your work was deleted from your computer and can not be recovered.

                        You should create a MyBib account immediately, and be sure you are always logged in when you add citations and references so that your work is backed up. MyBib accounts are free and you can make one here:
                        <span><button class="border btn btn-light"><a href="/register" class="text-decoration-none text-secondary">Sign up</a></button></span>
                    </p>
                    <hr>
                <button class="btn btn-light close-support"  popovertarget="contact-dialog" popovertargetaction="hide">Close</button>
                </div>
                <div class="dialog-body-2">
                  <p class="px-4 text-start">Send us a message!</p>
                  <form class="" action="{{ route('contactMail') }}" method="POST">
                        @csrf
                        <div>
                          <label for="To">To</label><input type="email" name="" id="" value="MyBib Support <support@mybib.com>" readonly>
                          </div>
                        <div>
                          <label for="user-email">FROM (YOUR EMAIL)</label>
                          <input type="email" name="sendFrom" id="user-email" placeholder="Enter your email address">
                                @error('sendFrom')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div><label for="subject">SUBJECT</label><input type="text" id="subject"  name="subject">
                            @error('subject')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                        <div class="align-items-start"><label for="message">MESSAGE</label>
                            <textarea id="message" name="message" cols="30" rows="10" placeholder="your message here..."></textarea>
                            @error('message')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        </div>
                    <hr>


                    <div style="    display: contents;">
                       <button type="button" class="btn btn-light close-support"  popovertarget="contact-dialog" popovertargetaction="hide">Cancel</button>
                       <button type='submit' class="btn btn-light send">Send</button>
                      </div>
                  </form>
                </div>



              </div>
        <!--  share dialog here -->
        <dialog style="z-index: 1000; display: none;" >
            <div class="share-head">
                <h1>Sharing settings</h1>
                <button ><img src="./images/close.png" alt="close" width="15"></button>
            </div>
            <div >
                <hr>
                <div>
                    @lang('lang.sharing')<span><div >
                        <input >
                      </div></span id="share-on">         @lang('lang.on') <span><img src="./images/help.png" alt="help"  data-bs-toggle="tooltip" data-bs-placement="right" title="Invite other to work &#10; with you on your biblography" style="width: 35px;"></span>
                </div>
                <hr>
                <div class="switch-share">
                <div class="my-1 ">
                    <div>        @lang('lang.link')</div>
                    <!-- <input class="form-control" type="text" value="https://www.mybib.com/j/PiquantProtectiveCamel"  readonly> -->
                </div>
                <div >
                    <span>        @lang('lang.invite'): </span>
                    <button >
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                        <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z"/>
                      </svg> <span style="font-size: 20px;">        @lang('lang.email')</span></button>
                    <div >
                        <!-- <input type="email" name="" id="" class="my-1 form-control" placeholder="Enter email address to send invite"> -->
                        <!-- <button type="button" class="my-1 btn btn-primary float-end"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-send" viewBox="0 0 16 16">
                            <path d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576zm6.787-8.201L1.591 6.602l4.339 2.76z"/>
                          </svg>   @lang('lang.send')</button> -->
                    </div>
                </div>
                <hr style="margin-top: 50px;">
                <div>
                    <p>        @lang('lang.who')</p>
                    <div><svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="white" class="p-1 bi bi-person rounded-circle me-2" viewBox="0 0 16 16" style="background: #BDBDBD;">
                        <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z"/>
                      </svg> you <span style="color: #8b8b8b;">        @lang('lang.you')</span></div>
                </div>
            </div>
        </div>
        </dialog>
    <!--  archive dialog -->
    {{-- <dialog class="archive-dialog" id="archive-dialog" >
        <div class="archive-dialog-head">
            <h1 class="fst-normal fs-4">Archived Projects</h1>
            <button class="dialog-cross archive-close"><img src="./images/close.png" alt="close" width="15px"></button>
        </div>
        <hr>
        <div class="archive-dialog-body">
            <div ><img class="rounded-circle arc-body-image" src="./images/archive-dialog-img.png" alt="" width="200" ></div>
            <div>
                <p>
                    <span style="font-weight: bold;">No projects have been archived yet</span><br>
                    Archived projects are not loaded in the projects list, so if you have old or finished projects you should archive them to store them out the way. They can be restored at any time.
                </p>
            </div>
        </div>
        <div class="archive-dialog-body-1">
            <div class="projects">

                <div class="my-2 project project1">
                    <p>0 &nbsp; &nbsp; New project </p>
                </div>
                <div>
                    <button type="button" class="btn btn-primary restore-btn"><span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-arrow-counterclockwise" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8 3a5 5 0 1 1-4.546 2.914.5.5 0 0 0-.908-.417A6 6 0 1 0 8 2z"/>
                        <path d="M8 4.466V.534a.25.25 0 0 0-.41-.192L5.23 2.308a.25.25 0 0 0 0 .384l2.36 1.966A.25.25 0 0 0 8 4.466"/>
                      </svg></span> Restore</button>
                    <button type="button" class="btn delete-btn"><img src="./images/delete-48.png" alt="del" width="24"> Delete</button>
                </div>
            </div>
        </div>
        <hr>
        <button type="button" class="btn btn-light archive-close">Close</button>
    </dialog> --}}
    <!--  delete dialog -->
    {{-- <dialog class="archive-dialog" id="delete-dialog">
        <div class="archive-dialog-head">
            <h1 class="fst-normal fs-4">Recently deleted</h1>
            <button class="dialog-cross delete-close"><img src="./images/close.png" alt="close" width="16px"></button>
        </div>
        <hr>
        <div class="archive-dialog-body" >
            <div ><img class="rounded-circle arc-body-image" src="./images/delete-dialog-image.png" alt="" width="200" ></div>
            <div>
                <p>
                    <span style="font-weight: bold;">You have not deleted anything recently</span><br>
                    (But when you do, you will be able to restore it from here)
                </p>
            </div>
        </div>
        <div>

        <div class="delete-dialog-body-1">
            <!-- date on which  -->
            <div class="date-of-del">8 March 2024</div>
            <!-- project that are deleted -->
        <div class="projects" >
            <div class="d-flex">
                <input type="checkbox" id="del-check1"> &nbsp; &nbsp;&nbsp; &nbsp;
                <label for="del-check1">
                <div class="my-2 project">
                   <p>0 &nbsp; &nbsp; New project </p>
                </div>
            </label>
        </div>
            <div class="d-flex">
                <input type="checkbox" id="del-check2"> &nbsp; &nbsp;&nbsp; &nbsp;
                <label for="del-check2">
                <div class="my-2 project">
                    <p>0 &nbsp; &nbsp; New project </p>
                </div>
            </label>
        </div>
    </div>
    <!-- citetation that are deleted -->
    <div class="del-cites">
        <div class="cite">
            <input type="checkbox" id="del-check"> &nbsp; &nbsp;&nbsp; &nbsp;
            <div class="p-3 rounded-circle"  style="background: #BDBDBD;">
                <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="white" class="bi bi-file-text"   viewBox="0 0 16 16">
                    <path d="M5 4a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1zm-.5 2.5A.5.5 0 0 1 5 6h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5M5 8a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1zm0 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1z"/>
                    <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2zm10-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1"/>
                  </svg>
            </div>
            <div class="text-start">
                <ul class="m-0"><li> Project Name</li></ul>
                <div class="ps-3">
                    <div class="text-success">title of article</div>
                    <div>first Name Last name</div>
                    <div><span>Year:</span> 2024 <span>| Container:</span>  website NAme <span> Publisher:</span> publisher name <span>| URL:</span> https://theyogaloftofbethlehem.com/</span></div>
                </div>
                </div>
        </div>
    </div>
</div>
</div>
        <hr>
        <div>
            <button type="button" class="mx-2 btn btn-light delete-close">Close</button><button type="button" class="btn btn-primary">Restore <span>0</span> selected</button>
        </div>
    </dialog> --}}
    <!-- todo  nav bar-->
    <nav class="navbar">
        <!-- !logo bar -->
        <div class="btn-group">
        <div class="logo-head">
            <img src="./images/logo/logo-white.png"
                alt="" class="logo" >
            <!-- <p>My Bib</p> -->


            <!-- light icon -->
            <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 122.88 122.88"
                class="light-icon color-mode">
                <title>sun-warm</title>
                <path
                    d="M30,13.21A3.93,3.93,0,1,1,36.8,9.27L41.86,18A3.94,3.94,0,1,1,35.05,22L30,13.21Zm31.45,13A35.23,35.23,0,1,1,36.52,36.52,35.13,35.13,0,0,1,61.44,26.2ZM58.31,4A3.95,3.95,0,1,1,66.2,4V14.06a3.95,3.95,0,1,1-7.89,0V4ZM87.49,10.1A3.93,3.93,0,1,1,94.3,14l-5.06,8.76a3.93,3.93,0,1,1-6.81-3.92l5.06-8.75ZM109.67,30a3.93,3.93,0,1,1,3.94,6.81l-8.75,5.06a3.94,3.94,0,1,1-4-6.81L109.67,30Zm9.26,28.32a3.95,3.95,0,1,1,0,7.89H108.82a3.95,3.95,0,1,1,0-7.89Zm-6.15,29.18a3.93,3.93,0,1,1-3.91,6.81l-8.76-5.06A3.93,3.93,0,1,1,104,82.43l8.75,5.06ZM92.89,109.67a3.93,3.93,0,1,1-6.81,3.94L81,104.86a3.94,3.94,0,0,1,6.81-4l5.06,8.76Zm-28.32,9.26a3.95,3.95,0,1,1-7.89,0V108.82a3.95,3.95,0,1,1,7.89,0v10.11Zm-29.18-6.15a3.93,3.93,0,0,1-6.81-3.91l5.06-8.76A3.93,3.93,0,1,1,40.45,104l-5.06,8.75ZM13.21,92.89a3.93,3.93,0,1,1-3.94-6.81L18,81A3.94,3.94,0,1,1,22,87.83l-8.76,5.06ZM4,64.57a3.95,3.95,0,1,1,0-7.89H14.06a3.95,3.95,0,1,1,0,7.89ZM10.1,35.39A3.93,3.93,0,1,1,14,28.58l8.76,5.06a3.93,3.93,0,1,1-3.92,6.81L10.1,35.39Z" />
            </svg>


            <!-- dark icon -->
            <svg class="hide-icon color-mode" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 122.88 122.89"
                style="enable-background:new 0 0 122.88 122.89" xml:space="preserve">
                <g>
                    <path
                        d="M49.06,1.27c2.17-0.45,4.34-0.77,6.48-0.98c2.2-0.21,4.38-0.31,6.53-0.29c1.21,0.01,2.18,1,2.17,2.21 c-0.01,0.93-0.6,1.72-1.42,2.03c-9.15,3.6-16.47,10.31-20.96,18.62c-4.42,8.17-6.1,17.88-4.09,27.68l0.01,0.07 c2.29,11.06,8.83,20.15,17.58,25.91c8.74,5.76,19.67,8.18,30.73,5.92l0.07-0.01c7.96-1.65,14.89-5.49,20.3-10.78 c5.6-5.47,9.56-12.48,11.33-20.16c0.27-1.18,1.45-1.91,2.62-1.64c0.89,0.21,1.53,0.93,1.67,1.78c2.64,16.2-1.35,32.07-10.06,44.71 c-8.67,12.58-22.03,21.97-38.18,25.29c-16.62,3.42-33.05-0.22-46.18-8.86C14.52,104.1,4.69,90.45,1.27,73.83 C-2.07,57.6,1.32,41.55,9.53,28.58C17.78,15.57,30.88,5.64,46.91,1.75c0.31-0.08,0.67-0.16,1.06-0.25l0.01,0l0,0L49.06,1.27 L49.06,1.27z" />
                </g>
            </svg>


            <button type="button" class="btn btn-lg dropdown-toggle dropdown-toggle-split filtericon" data-bs-toggle="dropdown" aria-expanded="false">
                <span class="visually-hidden">Toggle Dropdown</span>
            </button>
            <ul class="dropdown-menu" style="width: max-content; padding: 14px 0;">
                <li><a class="dropdown-item" href="{{route('tool')}}">Tools</a></li>
                {{-- <li><a class="dropdown-item" href="#">Plagirism Checker</a></li> --}}
            </ul>
        </div>
         <!--! bottom bar -->
         {{-- DIP Example Start --}}
         <div class="sidebar-bottom">
            {{-- <form action='{{route("mailtrap")}}' method='POST'>
                @csrf
            <input type='hidden' name='service' value='gmail'>
            <input type='submit' value='First Mail DIP'>
            </form>


            <form action='{{route("mailtrap")}}' method='POST'>
                @csrf
            <input type='hidden' name='service' value='mailtrap'>
            <input type='submit' value='Second Mail DIP'>
            </form> --}}

         {{-- DIP Example End --}}

            <!-- msg -->
           <button  popovertarget="contact-dialog" popovertargetaction="show"><svg version="1.1" id="Layer_1" class="msg" xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="122.88px" height="78.607px"
                viewBox="0 0 122.88 78.607" enable-background="new 0 0 122.88 78.607" xml:space="preserve">
                <g>
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M61.058,65.992l24.224-24.221l36.837,36.836H73.673h-25.23H0l36.836-36.836 L61.058,65.992L61.058,65.992z M1.401,0l59.656,59.654L120.714,0H1.401L1.401,0z M0,69.673l31.625-31.628L0,6.42V69.673L0,69.673z M122.88,72.698L88.227,38.045L122.88,3.393V72.698L122.88,72.698z" />
                </g>
            </svg></button>

            <!-- lock -->
            <a href='{{route('privacyPolicy')}}'>
            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="96.108px" height="122.88px"
                viewBox="0 0 96.108 122.88" enable-background="new 0 0 96.108 122.88" xml:space="preserve">
                <g>
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M2.892,56.036h8.959v-1.075V37.117c0-10.205,4.177-19.484,10.898-26.207v-0.009 C29.473,4.177,38.754,0,48.966,0C59.17,0,68.449,4.177,75.173,10.901l0.01,0.009c6.721,6.723,10.898,16.002,10.898,26.207v17.844 v1.075h7.136c1.59,0,2.892,1.302,2.892,2.891v61.062c0,1.589-1.302,2.891-2.892,2.891H2.892c-1.59,0-2.892-1.302-2.892-2.891 V58.927C0,57.338,1.302,56.036,2.892,56.036L2.892,56.036z M26.271,56.036h45.387v-1.075V36.911c0-6.24-2.554-11.917-6.662-16.03 l-0.005,0.004c-4.111-4.114-9.787-6.669-16.025-6.669c-6.241,0-11.917,2.554-16.033,6.665c-4.109,4.113-6.662,9.79-6.662,16.03 v18.051V56.036L26.271,56.036z M49.149,89.448l4.581,21.139l-12.557,0.053l3.685-21.423c-3.431-1.1-5.918-4.315-5.918-8.111 c0-4.701,3.81-8.511,8.513-8.511c4.698,0,8.511,3.81,8.511,8.511C55.964,85.226,53.036,88.663,49.149,89.448L49.149,89.448z" />
                </g>
            </svg>
        </a>
            <!-- protect -->
           <a href="{{route('terms')}}"> <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="105.802px" height="122.88px"
                viewBox="0 0 105.802 122.88" enable-background="new 0 0 105.802 122.88" xml:space="preserve">
                <g>
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M105.689,0H0.112v60.381c-1.824,26.659,18.714,50.316,52.789,62.499 c34.074-12.183,54.613-35.84,52.789-62.499V0L105.689,0z M52.869,8.61H9.417v48.832c-0.022,0.313-0.039,0.625-0.053,0.938h43.504 v49.557l0.142,0.052c27.313-9.715,43.927-28.454,42.962-49.646H52.869V8.61L52.869,8.61z" />
                </g>
            </svg></a>
            <!-- home -->
            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 122.88 112.07"
                style="enable-background:new 0 0 122.88 112.07" xml:space="preserve">
                <style type="text/css">
                    .st0 {
                        fill-rule: evenodd;
                        clip-rule: evenodd;
                    }
                </style>
                <g>
                    <path class="st0"
                        d="M61.44,0L0,60.18l14.99,7.87L61.04,19.7l46.85,48.36l14.99-7.87L61.44,0L61.44,0z M18.26,69.63L18.26,69.63 L61.5,26.38l43.11,43.25h0v0v42.43H73.12V82.09H49.49v29.97H18.26V69.63L18.26,69.63L18.26,69.63z" />
                </g>
            </svg>
        </div>

          </div>
 <a href="{{url('tool#paraphrasing')}}" onclick="redirectToParaphrasing()"  class='btn btn-dark'>Paraphrasing</a>
 <a href="{{url('tool#plagiarism')}}" onclick="redirectToPlagiarism()" class='btn btn-dark'>Plagiarism Checker</a>
 <a href="{{url('tool#grammarly')}}" onclick="redirectToGrammarly()" class='btn btn-dark'>Grammer Checker</a>



        <div class="vertical-icons">
            <div class="popup-container">
                <button id="user-account"  popovertarget="user-dialog" popovertargetaction="show"><img src="images/user-account.png" class="filtericon" alt="User Account"></button>
                <!-- <div class="popup" id="popup">
                    <div>

@auth()

<form action='{{route('logout')}}' class='mx-auto sbtn' method='post'>
    @csrf
    <span>
    <button type='submit'   class=' transparent-button no-background-button' >
    <img src="imagesOld/logout.png" alt="Logout" width="25" class="mx-2 ">
    <span></span>Logout</span></button>
    </span>
    </form>

@else

<a  href="{{url('register')}}" class='link'><img src="images/add-user.png" alt="Register" width="25" class="mx-2"><span>Create Account</span></a>
<hr>
<a  href="{{url('login')}}" class='link'><img src="images/menu-login.png" alt="Login" width="25" class="mx-2"><span>Login</span> </a>


                        @endauth

                    </div>
                </div> -->
              </div>

              <!-- <div class="notify-popup-container"> -->
                <!-- <a href="#"><img src="images/notify.png" class="filtericon" id="notifi-btn" alt="Notification"></a> -->
                <!-- <div class="notify-popup" id="notify-popup"> -->
                  <!-- Popup content goes here -->
                  <!-- <div class="notify-popup-head">
                    <h1 class="fst-normal fs-4"> @lang('lang.whatsNew')</h1>
                    {{-- <button class="close-notify"><img src="./images/close.png" alt="close" width="15"></button> --}}
                  </div> -->
                       <!-- <div class="notifi-content bg-secondary">

                @if(!empty($notifications))

                @foreach($notifications as $notification)
            <div class="p-2 notification">

                <a href="{{ route('notificationBlog', ['notificationId' => $notification->id]) }}" class='mt-5 link '>
                 <div class='bg-white shadow link col-10'style='margin-5%; padding:4%'>
                       <div class="feature">
                        <span style='background-color:#0D6EFD;color:white; border-radius:45%; padding:4px 5%;'> @lang('lang.newFeatures')</span> <span>{{ $notification->created_at->format('Y-m-d') }}</span>
                      </div>
                <div class="mt-2 data">
                    <h1 class="fst-normal fs-4" >{{ $notification->subject }}:{{ $notification->title }}!</h1>
                    <p>
                        {{ $notification->message }}
                    </p>
                </div>
            </a>
        </div>
            </div>
            @endforeach
            @endif
            @if(empty($notifications))
            <div class="notification">
                <div class="feature">

            <p>NEW FEATURES</p> </div>
                <div class="data">
                    <h1 class="fst-normal fs-4" >There is no notification here.</h1>

                </div>
            </div>
            @endif -->


        <!-- </div> -->
                  <!-- Additional content for the popup -->
                <!-- </div> -->
              <!-- </div> -->


              <button  popovertarget="notify" popovertargetaction="show"><img src="images/notify.png" class="filtericon" id="notifi-btn" alt="Notification" width="25px"></button>




              <a href="#" ><img src="images/info.png" alt="Helping Message"></a>
            <a href="https://chromewebstore.google.com/detail/mybib-free-citation-gener/phidhnmbkbkbkbknhldmpmnacgicphkf" target="_blank"><img src="images/chrom.png" alt="Chrome Extension"></a>

            @auth
            @if(auth()->user()->role==1)
            <a href="{{ route('notificationForm') }}" class=" btn btn-primary text-dark">Add Notification</a>
            @endif
            @endauth
        </div>
    </nav>
    <main class="maindiv">
        <div class="sidebar">



            <div class="sidebar-center">
                <div class="start-project">
                    @auth


                    <form action="{{ route('newProject') }}" method='post'>
                        @csrf
                    <svg xmlns="http://www.w3.org/2000/svg" shape-rendering="geometricPrecision"
                        text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd"
                        clip-rule="evenodd" viewBox="0 0 419 511.67">
                        <path
                            d="M314.98 303.62c57.47 0 104.02 46.59 104.02 104.03 0 57.47-46.58 104.02-104.02 104.02-57.47 0-104.02-46.58-104.02-104.02 0-57.47 46.58-104.03 104.02-104.03zM41.73 59.27h23.93v24.38H41.73c-4.54 0-8.7 1.76-11.8 4.61l-.45.49c-3.14 3.13-5.1 7.48-5.1 12.24v315.53c0 4.75 1.96 9.1 5.1 12.24 3.13 3.15 7.48 5.11 12.25 5.11h142.62c1.68 8.44 4.17 16.6 7.36 24.38H41.73c-11.41 0-21.86-4.71-29.42-12.26C4.72 438.44 0 427.99 0 416.52V100.99c0-11.48 4.7-21.92 12.25-29.47l.79-.72c7.5-7.13 17.62-11.53 28.69-11.53zm297.55 217.37V100.99c0-4.74-1.96-9.09-5.12-12.24-3.11-3.15-7.47-5.1-12.24-5.1h-23.91V59.27h23.91c11.45 0 21.86 4.72 29.42 12.26 7.61 7.56 12.32 18.02 12.32 29.46V283.6c-7.79-3.06-15.95-5.41-24.38-6.96zm-206.75-8.07c-7.13 0-12.92-5.79-12.92-12.92s5.79-12.93 12.92-12.93h142.83c7.13 0 12.92 5.8 12.92 12.93s-5.79 12.92-12.92 12.92H132.53zM89.5 241.22c7.98 0 14.44 6.46 14.44 14.44 0 7.97-6.46 14.43-14.44 14.43-7.97 0-14.44-6.46-14.44-14.43 0-7.98 6.47-14.44 14.44-14.44zm0 78.62c7.98 0 14.44 6.46 14.44 14.44 0 7.97-6.46 14.43-14.44 14.43-7.97 0-14.44-6.46-14.44-14.43 0-7.98 6.47-14.44 14.44-14.44zm43.04 27.35c-7.13 0-12.93-5.79-12.93-12.92s5.8-12.93 12.93-12.93h80.96a133.608 133.608 0 0 0-17.26 25.85h-63.7zM89.5 162.6c7.98 0 14.44 6.46 14.44 14.44 0 7.98-6.46 14.44-14.44 14.44-7.97 0-14.44-6.46-14.44-14.44 0-7.98 6.47-14.44 14.44-14.44zm43.03 27.37c-7.13 0-12.92-5.8-12.92-12.93s5.79-12.92 12.92-12.92h142.83c7.13 0 12.92 5.79 12.92 12.92s-5.79 12.93-12.92 12.93H132.53zM93 39.4h46.13C141.84 17.18 159.77 0 181.52 0c21.62 0 39.45 16.95 42.34 38.94l46.76.46c2.61 0 4.7 2.09 4.7 4.71v51.84c0 2.6-2.09 4.7-4.7 4.7H93.05c-2.56 0-4.71-2.1-4.71-4.7V44.11A4.638 4.638 0 0 1 93 39.4zm88.03-19.25c12.3 0 22.26 9.98 22.26 22.27 0 12.3-9.96 22.26-22.26 22.26-12.29 0-22.26-9.96-22.26-22.26 0-12.29 9.97-22.27 22.26-22.27zm118.39 346.9c-.04-4.59-.46-7.86 5.23-7.79l18.45.23c5.95-.04 7.53 1.86 7.46 7.43v25.16h25.02c4.59-.03 7.86-.46 7.78 5.24l-.22 18.44c.03 5.96-1.86 7.54-7.43 7.48h-25.15v25.14c.07 5.57-1.51 7.46-7.46 7.43l-18.45.22c-5.69.09-5.27-3.2-5.23-7.79v-25h-25.16c-5.59.06-7.47-1.52-7.44-7.48l-.22-18.44c-.09-5.7 3.2-5.27 7.79-5.24h25.03v-25.03z" />
                    </svg>
                    <input type="submit" value="@lang('lang.newProject')" style="border: none; background: none;">
                </form>
                @else
                <svg xmlns="http://www.w3.org/2000/svg" shape-rendering="geometricPrecision"
                        text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd"
                        clip-rule="evenodd" viewBox="0 0 419 511.67">
                        <path
                            d="M314.98 303.62c57.47 0 104.02 46.59 104.02 104.03 0 57.47-46.58 104.02-104.02 104.02-57.47 0-104.02-46.58-104.02-104.02 0-57.47 46.58-104.03 104.02-104.03zM41.73 59.27h23.93v24.38H41.73c-4.54 0-8.7 1.76-11.8 4.61l-.45.49c-3.14 3.13-5.1 7.48-5.1 12.24v315.53c0 4.75 1.96 9.1 5.1 12.24 3.13 3.15 7.48 5.11 12.25 5.11h142.62c1.68 8.44 4.17 16.6 7.36 24.38H41.73c-11.41 0-21.86-4.71-29.42-12.26C4.72 438.44 0 427.99 0 416.52V100.99c0-11.48 4.7-21.92 12.25-29.47l.79-.72c7.5-7.13 17.62-11.53 28.69-11.53zm297.55 217.37V100.99c0-4.74-1.96-9.09-5.12-12.24-3.11-3.15-7.47-5.1-12.24-5.1h-23.91V59.27h23.91c11.45 0 21.86 4.72 29.42 12.26 7.61 7.56 12.32 18.02 12.32 29.46V283.6c-7.79-3.06-15.95-5.41-24.38-6.96zm-206.75-8.07c-7.13 0-12.92-5.79-12.92-12.92s5.79-12.93 12.92-12.93h142.83c7.13 0 12.92 5.8 12.92 12.93s-5.79 12.92-12.92 12.92H132.53zM89.5 241.22c7.98 0 14.44 6.46 14.44 14.44 0 7.97-6.46 14.43-14.44 14.43-7.97 0-14.44-6.46-14.44-14.43 0-7.98 6.47-14.44 14.44-14.44zm0 78.62c7.98 0 14.44 6.46 14.44 14.44 0 7.97-6.46 14.43-14.44 14.43-7.97 0-14.44-6.46-14.44-14.43 0-7.98 6.47-14.44 14.44-14.44zm43.04 27.35c-7.13 0-12.93-5.79-12.93-12.92s5.8-12.93 12.93-12.93h80.96a133.608 133.608 0 0 0-17.26 25.85h-63.7zM89.5 162.6c7.98 0 14.44 6.46 14.44 14.44 0 7.98-6.46 14.44-14.44 14.44-7.97 0-14.44-6.46-14.44-14.44 0-7.98 6.47-14.44 14.44-14.44zm43.03 27.37c-7.13 0-12.92-5.8-12.92-12.93s5.79-12.92 12.92-12.92h142.83c7.13 0 12.92 5.79 12.92 12.92s-5.79 12.93-12.92 12.93H132.53zM93 39.4h46.13C141.84 17.18 159.77 0 181.52 0c21.62 0 39.45 16.95 42.34 38.94l46.76.46c2.61 0 4.7 2.09 4.7 4.71v51.84c0 2.6-2.09 4.7-4.7 4.7H93.05c-2.56 0-4.71-2.1-4.71-4.7V44.11A4.638 4.638 0 0 1 93 39.4zm88.03-19.25c12.3 0 22.26 9.98 22.26 22.27 0 12.3-9.96 22.26-22.26 22.26-12.29 0-22.26-9.96-22.26-22.26 0-12.29 9.97-22.27 22.26-22.27zm118.39 346.9c-.04-4.59-.46-7.86 5.23-7.79l18.45.23c5.95-.04 7.53 1.86 7.46 7.43v25.16h25.02c4.59-.03 7.86-.46 7.78 5.24l-.22 18.44c.03 5.96-1.86 7.54-7.43 7.48h-25.15v25.14c.07 5.57-1.51 7.46-7.46 7.43l-18.45.22c-5.69.09-5.27-3.2-5.23-7.79v-25h-25.16c-5.59.06-7.47-1.52-7.44-7.48l-.22-18.44c-.09-5.7 3.2-5.27 7.79-5.24h25.03v-25.03z" />
                    </svg>
                <button class="generateCitationBtn"  style="border: none; background: none;">@lang('lang.newProject')</button>
                @endauth
                </div>


@auth
<div class="delete-and-archive">
    <div>
        <a href="{{ route('showArchieveProject') }}" class='link'> <svg viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">

                <g id="SVGRepo_bgCarrier" stroke-width="0" />

                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />

                <g id="SVGRepo_iconCarrier">
                    <path
                        d="M9 12C9 11.5341 9 11.3011 9.07612 11.1173C9.17761 10.8723 9.37229 10.6776 9.61732 10.5761C9.80109 10.5 10.0341 10.5 10.5 10.5H13.5C13.9659 10.5 14.1989 10.5 14.3827 10.5761C14.6277 10.6776 14.8224 10.8723 14.9239 11.1173C15 11.3011 15 11.5341 15 12C15 12.4659 15 12.6989 14.9239 12.8827C14.8224 13.1277 14.6277 13.3224 14.3827 13.4239C14.1989 13.5 13.9659 13.5 13.5 13.5H10.5C10.0341 13.5 9.80109 13.5 9.61732 13.4239C9.37229 13.3224 9.17761 13.1277 9.07612 12.8827C9 12.6989 9 12.4659 9 12Z"
                        stroke="#1C274C" stroke-width="1.5" />
                    <path opacity="0.5"
                        d="M20.5 7V13C20.5 16.7712 20.5 18.6569 19.3284 19.8284C18.1569 21 16.2712 21 12.5 21H11.5C7.72876 21 5.84315 21 4.67157 19.8284C3.5 18.6569 3.5 16.7712 3.5 13V7"
                        stroke="#1C274C" stroke-width="1.5" stroke-linecap="round" />
                    <path
                        d="M2 5C2 4.05719 2 3.58579 2.29289 3.29289C2.58579 3 3.05719 3 4 3H20C20.9428 3 21.4142 3 21.7071 3.29289C22 3.58579 22 4.05719 22 5C22 5.94281 22 6.41421 21.7071 6.70711C21.4142 7 20.9428 7 20 7H4C3.05719 7 2.58579 7 2.29289 6.70711C2 6.41421 2 5.94281 2 5Z"
                        stroke="#1C274C" stroke-width="1.5" />
                </g>

            </svg>
        </a>
        @if (isset($archieved))
            <sub> {{ $archieved }} </sub>
        @endif
    </div>
    <div>
        <a href="{{ route('deletedProjects') }}" class='link'>
           <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <g id="SVGRepo_bgCarrier" stroke-width="0" />
                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />
                <g id="SVGRepo_iconCarrier">
                    <path d="M4 6H20M16 6L15.7294 5.18807C15.4671 4.40125 15.3359 4.00784 15.0927 3.71698C14.8779 3.46013 14.6021 3.26132 14.2905 3.13878C13.9376 3 13.523 3 12.6936 3H11.3064C10.477 3 10.0624 3 9.70951 3.13878C9.39792 3.26132 9.12208 3.46013 8.90729 3.71698C8.66405 4.00784 8.53292 4.40125 8.27064 5.18807L8 6M18 6V16.2C18 17.8802 18 18.7202 17.673 19.362C17.3854 19.9265 16.9265 20.3854 16.362 20.673C15.7202 21 14.8802 21 13.2 21H10.8C9.11984 21 8.27976 21 7.63803 20.673C7.07354 20.3854 6.6146 19.9265 6.32698 19.362C6 18.7202 6 17.8802 6 16.2V6M14 10V17M10 10V17" stroke="#1C274C" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </g>
            </svg>

        </a>
        @if (isset($deleted))
            <sub> {{ $deleted }}</sub>
        @endif

    </div>
</div>



@else
<div class="delete-and-archive">
    <div class='generateCitationBtn'>
      <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <g id="SVGRepo_bgCarrier" stroke-width="0" />
            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />
            <g id="SVGRepo_iconCarrier">
                    <path d="M9 12C9 11.5341 9 11.3011 9.07612 11.1173C9.17761 10.8723 9.37229 10.6776 9.61732 10.5761C9.80109 10.5 10.0341 10.5 10.5 10.5H13.5C13.9659 10.5 14.1989 10.5 14.3827 10.5761C14.6277 10.6776 14.8224 10.8723 14.9239 11.1173C15 11.3011 15 11.5341 15 12C15 12.4659 15 12.6989 14.9239 12.8827C14.8224 13.1277 14.6277 13.3224 14.3827 13.4239C14.1989 13.5 13.9659 13.5 13.5 13.5H10.5C10.0341 13.5 9.80109 13.5 9.61732 13.4239C9.37229 13.3224 9.17761 13.1277 9.07612 12.8827C9 12.6989 9 12.4659 9 12Z" stroke="#1C274C" stroke-width="1.5" />
                    <path opacity="0.5" d="M20.5 7V13C20.5 16.7712 20.5 18.6569 19.3284 19.8284C18.1569 21 16.2712 21 12.5 21H11.5C7.72876 21 5.84315 21 4.67157 19.8284C3.5 18.6569 3.5 16.7712 3.5 13V7" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round" />
                    <path d="M2 5C2 4.05719 2 3.58579 2.29289 3.29289C2.58579 3 3.05719 3 4 3H20C20.9428 3 21.4142 3 21.7071 3.29289C22 3.58579 22 4.05719 22 5C22 5.94281 22 6.41421 21.7071 6.70711C21.4142 7 20.9428 7 20 7H4C3.05719 7 2.58579 7 2.29289 6.70711C2 6.41421 2 5.94281 2 5Z" stroke="#1C274C" stroke-width="1.5" />
              </g>
      </svg>

    </div>
    <div class='generateCitationBtn'>
  <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
    <g id="SVGRepo_bgCarrier" stroke-width="0" />
    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />
    <g id="SVGRepo_iconCarrier">
                    <path d="M4 6H20M16 6L15.7294 5.18807C15.4671 4.40125 15.3359 4.00784 15.0927 3.71698C14.8779 3.46013 14.6021 3.26132 14.2905 3.13878C13.9376 3 13.523 3 12.6936 3H11.3064C10.477 3 10.0624 3 9.70951 3.13878C9.39792 3.26132 9.12208 3.46013 8.90729 3.71698C8.66405 4.00784 8.53292 4.40125 8.27064 5.18807L8 6M18 6V16.2C18 17.8802 18 18.7202 17.673 19.362C17.3854 19.9265 16.9265 20.3854 16.362 20.673C15.7202 21 14.8802 21 13.2 21H10.8C9.11984 21 8.27976 21 7.63803 20.673C7.07354 20.3854 6.6146 19.9265 6.32698 19.362C6 18.7202 6 17.8802 6 16.2V6M14 10V17M10 10V17" stroke="#1C274C" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
    </g>
  </svg>
</div>
</div>


@endauth
</div>

              <!-- !-cut1-!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!111 -->
                  <div style="height:80vh; width:100%; overflow-y:scroll;">
            @if (isset($projects))
            @foreach ($projects as $project)

                    <form class="mt-2 rename-form new-project" data-project-id="{{ $project->id }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="text-center"> <!-- Apply Bootstrap's utility class to center its child elements horizontally -->
                            <input type="text" class="project-name-input" value="{{ $project->name }}" style="display: none;">
                            <input type="submit" value="Done" class="btn btn-primary" id="done" style="display: none;">
                        </div>
                        <a href="{{ route('openProject', ['projectId' => $project->id]) }}" class=" link">
                            <span class="project-name">{{ $project->name }}</span>
                        </a>
                        <a href="#" class="projectDropdownbtn" ><img src="images/threedots_icon.png" alt=""></a>
                        <div class="dropdown-menu projectDropdown"   >
                            <ul>
                                <li><img src="images/rename.png" alt="">
                                    <button type="submit" class="rename-btn edit-project-link" style="background: none; border: none;">Rename</button>
                                </li>
                                <li><img src="images/copy.png" alt=""><a href="{{ route('duplicate', ['projectId' => $project->id]) }}" id="">Duplicate</a></li>
                                <li><img src="images/merge.png" alt=""><a href="{{ route('mergeProject', ['projectId' => $project->id]) }}" id="">Merge with</a></li>
                                <li><img src="images/archev.png" alt=""><a href="{{ route('archieveProject', ['projectId' => $project->id]) }}" id="">Move to archive</a></li>
                                <li><img src="images/del.png" alt=""><a href="{{ route('deletePoject', ['projectId' => $project->id]) }}" id="">Delete</a></li>
                            </ul>
                        </div>
                    </form>

            @endforeach
        @endif
            </div>

    </div>
        <div class="main-section">
            <div class="main-main">
                <div class="main-center">
                    <div class="main-head">
                        <div>
                            @auth
                            <button class="add-citation btn btn-success open-citation"  popovertarget="citation-modal" popovertargetaction="show">
                                <img src="images/plus-line-icon.svg" alt="">
                                 @lang('lang.add')
                            </button>
                                @else
                            <button class="generateCitationBtn add-citation btn btn-success open-citation">  @lang('lang.add')</button>
                            @endauth
                            @auth
                        <button class="import" class="import-slide-btn" id="import-slide-btn">
                            <img src="images/plus-line-icon.svg" alt="">
                            @lang('lang.import')</button>
                            @else
                            <button class="generateCitationBtn import import-slide-btn" id="import-slide-btn">
                            <img src="images/plus-line-icon.svg" alt="">
                            Import</button>

                            @endauth

                        </div>
                        <!-- left arrow -->
                        <img class="right-arrow" src="./images/right-arrow.png" alt="->">




                        <select id="publicationDropdown" class="form-select select-style" aria-label="Select Publication">
                            <option value="ACM Transactions on Applied Perception" selected>ACM Transactions on Applied Perception</option>
                            <option value="apa">American Psychological Association (APA)</option>
                            <option value="mla">Modern Language Association (MLA)</option>
                            <option value="chicago">Chicago Manual of Style (Chicago)</option>
                            <option value="turabian">Turabian style (based on Chicago)</option>
                            <option value="oup">Oxford University Press (OUP) Style</option>
                            <option value="harvard">Harvard referencing</option>
                            <option value="turnitin">Turnitin referencing</option>
                            <option value="cse">Council of Science Editors (CSE) Style</option>
                            <option value="ama">American Medical Association (AMA) Style</option>
                            <option value="acs">American Chemical Society (ACS) Style</option>
                            <option value="vancouver">Vancouver Style (Numeric)</option>
                            <option value="ieee">Institute of Electrical and Electronics Engineers (IEEE) Style</option>
                            <option value="asme">American Society of Mechanical Engineers (ASME) referencing</option>
                            <option value="asa">American Sociological Association (ASA) Style</option>
                            <option value="apsa">American Political Science Association (APSA) Style</option>
                            <option value="bluebook">Bluebook (legal citation)</option>
                            <option value="gost">ГОСТ (GOST 7.0.5-2006)</option>
                            <option value="sb">SB Stile (ABNT NBR 6023)</option>
                            <option value="vancouver-system">Vancouver system (reference management)</option>
                            <option value="author-date">Author-Date System (various formats)</option>
                            <option value="apa-7th">APA 7th edition (and prior editions)</option>
                            <option value="mla-8th">MLA 8th edition (and prior editions)</option>
                            <option value="chicago-17th">Chicago 17th edition (and prior editions)</option>
                            <option value="aaa">American Anthropological Association (AAA) Style</option>
                            <option value="aba">American Bar Association (ABA) Style</option>
                            <option value="aea">American Economic Association (AEA) Style</option>
                            <option value="aha">American Historical Association (AHA) Style</option>
                            <option value="apa-publication">American Psychological Association (APA) Publication Manual</option>
                            <option value="asa-guide">American Sociological Association (ASA) Style Guide</option>
                            <option value="ap">Associated Press (AP) Stylebook</option>
                            <option value="aglc">Australian Guide to Legal Citation (AGLC)</option>
                            <option value="canadian-guide">Canadian Guide to Uniform Legal Citation (Canadian Guide)</option>
                            <option value="wpa">Council of Writing Program Administrators (WPA) Style</option>
                            <option value="endnote-online">EndNote Online Style Guide</option>
                            <option value="ieee-referencing">Institute for Electrical and Electronics Engineers (IEEE) referencing style guide</option>
                            <option value="icmje">International Committee of Medical Journal Editors (ICMJE) Recommendations for the Conduct, Reporting, Editing, and Publication of Scholarly Work</option>
                            <option value="mhra">Modern Humanities Research Association (MHRA) Style Guide</option>
                            <option value="nist">National Institute for Standards and Technology (NIST) Special Publication 800-67 Revision 1</option>
                            <option value="nature">Nature Style Guide</option>
                            <option value="nyt">New York Times (NYT) Style Guide</option>
                            <option value="oxford">Oxford University Style Guide</option>
                            <option value="plos">Public Library of Science (PLOS) One Style Guide</option>
                            <option value="sage">Sage Publications Style Guide</option>
                            <option value="scie">Science Citation Index Expanded (SCIE)</option>
                            <option value="ssci">Social Science Citation Index (SSCI)</option>
                            <option value="stile">Stile (ABNT NBR 6023) (Brazil)</option>
                            <option value="vancouver-publishing">Vancouver Publishing Style Guide</option>
                            <option value="wp">Washington Post (WP) Style Guide</option>
                            <option value="webster">Webster's Dictionary house style</option>
                            <option value="zfg">Zeitschrift für die gesamte Sprachwissenschaft (ZfG) style</option>


                        </select>

                        <!-- Display selected value -->
                        <div id="selectedValue"></div>
                        <!-- right arrow -->
                        <img class="right-arrow" src="./images/right-arrow.png" alt="->">


               @auth
                      <a   href="{{ route('downloadImage', ['projectId' => $projectId]) }}">
                      <button type="button" class="btn btn-primary download">
                        <img src="images/download.png" alt="">
                        @lang('lang.download')
                    </button>
                    </a>
                @else
                      <button type="" class="btn btn-primary generateCitationBtn ">
                        <img src="images/download.png" alt="">
                        @lang('lang.download')
                    </button>
                @endauth



                    </div>
                    <div class="main-page">
                        <div class="page-head">
                            <button popovertarget="styles-dialog" popovertargetaction="show">
                              <p class="styles" >Times new roman 12</p>
                            </button>
                            <button popovertarget="styles-dialog" popovertargetaction="show">
                              <p class="styles" >  @lang('lang.style')</p>
                            </button>

                            <div id="styles-dialog" popover>
                               <button  popovertarget="styles-dialog" popovertargetaction="hide"><img src="images/close.png" class="close-styles-modal" alt=""></button>

                                <h5>Project Settings</h5>
                                <hr>
                                <div class="col">
                                    Font:
                                    <select class="form-select" aria-label="Default select example">
                                        <option value="Arial, Helvetica, sans-serif" selected>Arial</option>
                                        <option value="sans-serif" >sans-serif</option>
                                        <option value="'Times New Roman', Times, serif">Times new Roman</option>
                                        <option value="Georgia, 'Times New Roman', Times, serif">Geogia</option>
                                        <option value="cursive">cursive</option>
                                        <option value="'Courier New', Courier, monospace">Courier</option>
                                        <option value="monospace">monospace</option>
                                        <option value="'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">Gill Sans MT</option>
                                    </select>
                                </div>
                                <div class="col">
                                    Stored by:
                                    <select class="form-select" aria-label="Default select example">
                                        <option value="A-A-Z" selected >Auther (A-Z)</option>
                                        <option value="A-Z-A">Auther (Z-A)</option>
                                        <option value="T-A-Z">Title (A-Z)</option>
                                        <option value="T-Z-A">Title (Z-A)</option>
                                    </select>
                                </div>
                                <div class="col">
                                    Text Size:
                                    <select class="form-select" aria-label="Default select example">
                                        <option  selected>11</option>
                                        <option >12</option>
                                        <option >13</option>
                                        <option >14</option>
                                        <option >15</option>
                                        <option >16</option>
                                        <option >17</option>
                                        <option >18</option>
                                        <option >20</option>
                                        <option >21</option>
                                        <option >22</option>
                                    </select>
                                </div>

                                <button class="btn btn-styles-cancel btn-close-styles"  popovertarget="styles-dialog" popovertargetaction="hide">Cancel</button>

                                <button class="btn btn-primary btn-styles-save btn-close-styles" id="style_submit"  popovertarget="styles-dialog" popovertargetaction="hide">Save Changes</button>



                              </div>



                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                            <label class="form-check-label" for="defaultCheck1">
                                Bibliography {{session('locale')}}
                                @if(session()->has('locale')&&Session::get('locale')=='pu')
                             {{'pu set'}}
                                @endif
                            </label>
                            <!--! !!!! -cut2-  -->

                        </div>


                        <div id="responseContainer" class="showresponseContainer" >
                            <div class="responses" id='first' >
                            @if (isset($citations))
                            @foreach ($citations as $citation)
                            @if (
                                isset($citation->author_last_name) ||
                                isset($citation->author) ||
                                isset($citation->editor) ||
                                isset($citation->title) ||
                                isset($citation->publish_date) ||
                                isset($citation->container) ||
                                isset($citation->volume) ||
                                isset($citation->number) ||
                                isset($citation->pages) ||
                                isset($citation->publisher) ||
                                isset($citation->location) ||
                                isset($citation->institution) ||
                                isset($citation->school) ||
                                isset($citation->content_type) ||
                                isset($citation->interviewer_last_name) ||
                                isset($citation->interviewer_first_name) ||
                                isset($citation->url) ||
                                isset($citation->view_date)
                            )

                                            <div class="response">
                                                <div style="margin-right: 5px;">
                                                    <input type="checkbox" name="" class="checkbox1">
                                                </div>
                                                @if (isset($citation->author_last_name))
                                                    {{ $citation->author_last_name }},
                                                @endif

                                                @if (isset($citation->author))
                                                    {{ $citation->author }}
                                                @endif

                                                @if (isset($citation->editor))
                                                    ({{ $citation->editor }} ed.)
                                                @endif

                                                ({{ isset($citation->publish_date) ? $citation->publish_date : 'n.d.' }})

                                                "@if (isset($citation->title))
                                                    {{ ucwords($citation->title) }}
                                                    @endif,"

                                                    @if (isset($citation->container))
                                                        {{ $citation->container }},
                                                    @endif

                                                    @if (isset($citation->volume))
                                                        vol. {{ $citation->volume }}
                                                    @endif

                                                    @if (isset($citation->number))
                                                        , no. {{ $citation->number }}
                                                    @endif

                                                    @if (isset($citation->pages))
                                                        , pp. {{ $citation->pages }}
                                                    @endif

                                                    @if (isset($citation->publisher))
                                                        {{ $citation->publisher }},
                                                    @endif

                                                    @if (isset($citation->location))
                                                        {{ $citation->location }}.
                                                    @endif

                                                    @if (isset($citation->booktitle))
                                                        {{ ucwords($citation->booktitle) }},
                                                    @endif

                                                    @if (isset($citation->annotation))
                                                        {{ $citation->annotation }}
                                                    @endif

                                                    <a href="{{ $citation->url }}"><img src="./images/language-svgrepo-com.svg" alt="url"
                                                            width="25"></a>
                                                    <a href="{{ route('citationEdit', ['id' => $citation->id, 'projectId' => $citation->project_id]) }}"><img
                                                            src="./images/edit-svgrepo-com.svg" width="25" alt="edi"></a>
                                                    <a href="{{ route('citationDelete', ['id' => $citation->id]) }}"><img src="./images/delete-48.png"
                                                            alt="" width="20"></a>
                                            </div>
                                        @endif
                            @endforeach
                            @endif
                        </div>

                        </div>



         <div class="main-content">
            <div id="hideData" style=" ">

                          <span style="    font-weight: bold;
                            font-size: 20px;">No citations</span> <br>
                            <p>There are no citations in this project yet.

                            </p>


                             @auth
                            <button class="add-citation btn btn-success open-citation-modal"  popovertarget="citation-modal" popovertargetaction="show">
                            <img src="images/plus-line-icon.svg" alt="+">
                            @lang('lang.add')
                        </button>
                        @else
                        <button class="add-citation btn btn-success generateCitationBtn ">
                            <img src="images/plus-line-icon.svg" alt="">
                            @lang('lang.add')
                        </button>
                        @endauth


                    </div>






                            <div id="citation-modal" popover>
                               <button  popovertarget="citation-modal" popovertargetaction="hide"> <img src="images/close.png" class="close-modal" alt="close"></button>

                                <h5>New Citation</h5>
                                <hr>


                                <nav>
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <button class="nav-link active" id="nav-website-tab" data-bs-toggle="tab"
                                            data-bs-target="#nav-website" type="button" role="tab"
                                            aria-controls="nav-website" aria-selected="true">Website</button>

                                        <button class="nav-link" id="nav-book-tab" data-bs-toggle="tab"
                                            data-bs-target="#nav-book" type="button" role="tab" aria-controls="nav-book"
                                            aria-selected="false">Book</button>

                                        <button class="nav-link" id="nav-journal-tab" data-bs-toggle="tab"
                                            data-bs-target="#nav-journal" type="button" role="tab"
                                            aria-controls="nav-journal" aria-selected="false">Journal</button>

                                        <button class="nav-link" id="nav-video-tab" data-bs-toggle="tab"
                                            data-bs-target="#nav-video" type="button" role="tab"
                                            aria-controls="nav-video" aria-selected="false">video</button>

                                        <button class="nav-link" id="nav-more-tab" data-bs-toggle="tab"
                                            data-bs-target="#nav-more" type="button" role="tab" aria-controls="nav-more"
                                            aria-selected="false">More</button>



                                    </div>
                                </nav>

                                <div class="tab-content" id="nav-tabContent">
                                  <div class="tab-pane fade show active" id="nav-website" role="tabpanel"
                                      aria-labelledby="nav-home-tab">

                                    <div class="p-4 bar">
                                        <input type="text" class="input" id="inputValue1"
                                            placeholder="Enter the URL (Web page address) URLs to PDF supported">
                                        <button class="btn bg-primary"  onclick="searchData1(this)"  id="searchBtn"> <img src="images/icons8-search-50.png"
                                                alt=""> search</button>
                                    </div>
                                      <!-- if url is not start with http:// -->
                                      <div  id="httpErr">
                                        URLs must start with <strong>http://</strong> or <strong>https://</strong></div>
                                        <div class="searchDataCite">

                                          <div>
                                            <ul style="margin-bottom: 50px; font-size: 10px;" >
                                                <li style="list-style-type: none;" class="urlConfirm"  >
                                                    <button class="w-full p-0" style="border:none;" fdprocessedid="swlrxm" >
                                                        <div class="flex w-full px-5 py-4 text-left hover:bg-ui-bg" style="display: flex; text-align: left; align-items: center;">
                                                            <img width="50px" height="auto" src="https://favicons.mybib.com/icon?url=https://www.google.com&amp;size=60..120..200" title="Website" referrerpolicy="no-referrer" class="items-center bg-white rounded-md text-white flex shrink-0 h-[60px] justify-center mr-5 mt-1 w-[60px] shadow-[0_1px_2px_rgba(0,0,0,0.2)] object-cover">
                                                            <div style="flex: 1 1 0%; padding-left: 20px; display: flex; flex-direction: column; justify-content: space-between;">
                                                                <div id="preloader" style="display: none;">
                                                                    <!-- Style the preloader as needed -->
                                                                    <div class="spinner-border text-primary" role="status">
                                                                        <span class="sr-only"></span>
                                                                    </div>
                                                                </div>

                                                                <div class="text-base font-medium"   id='ajaxResponse'    >
                                                                        <!-- <span> </span> -->
                                                                    </div>


                                                        </div>
                                                    </button>
                                                </li>

                                            </ul>
                                            <div style="text-align: center;">
                                                <div class="gap-3 d-flex justify-content-center align-items-center" id="orline">
                                <hr class="w-100">
                                or
                                <hr class="w-100 ">
                              </div>
                                               <br>
                                                <a style="text-decoration: none; border: 1px solid gray; padding:10px;     display: flex;
                                                align-items: center;
                                                justify-content: center;
                                                width: max-content;
                                                margin: auto;" href="#" onclick="urlToForm({headTittle:'Website' , option:32})" class="btn btn-outline btn-inline"><i class="bi bi-keyboard me-2 fs-4"></i>enter manually</a>
                                            </div>
                                            <div class="v-portal" style="display: none;"></div>
                                        </div>
                                        </div>
                                  </div>


                                  <div class="tab-pane fade" id="nav-book" role="tabpanel"
                                      aria-labelledby="nav-book-tab">
                                      <div class="p-4 bar">
                                          <input type="text" class="input"  id="inputValue2"
                                              placeholder="Search for the book title or ISBN">
                                          <button class="btn bg-primary"  onclick="searchData2(this)" id="searchBtn1"> <img src="images/icons8-search-50.png"
                                                  alt="" > search</button>
                                      </div>
                                      <div class="searchDataCite">
                                        <div>
                                          <ul style="margin-bottom: 50px; font-size: 10px;" >
                                              <li style="list-style-type: none;" class="urlConfirm" onclick="urlToForm({headTittle:'Book' , option:27})">
                                                  <button class="w-full p-0" style="border:none;" fdprocessedid="swlrxm">
                                                      <div class="flex w-full px-5 py-4 text-left hover:bg-ui-bg" style="display: flex; text-align: left; align-items: center;">
                                                          <img width="50px" height="auto" src="https://favicons.mybib.com/icon?url=https://www.google.com&amp;size=60..120..200" title="Website" referrerpolicy="no-referrer" class="items-center bg-white rounded-md text-white flex shrink-0 h-[60px] justify-center mr-5 mt-1 w-[60px] shadow-[0_1px_2px_rgba(0,0,0,0.2)] object-cover">
                                                          <div style="flex: 1 1 0%; padding-left: 20px; display: flex; flex-direction: column; justify-content: space-between;">
                                                            <div id="preloaderBook" style="display: none;">
                                                                <!-- Style the preloader as needed -->
                                                                <div class="spinner-border text-primary" role="status">
                                                                    <span class="sr-only"></span>
                                                                </div>
                                                            </div>
                                                            <div class="text-base font-medium" id='ajaxResponse1' >
                                                                  <span></span>
                                                              </div>

                                                      </div>
                                                  </button>
                                              </li>
                                          </ul>
                                          <div style="text-align: center;">
                                              <div class="gap-3 d-flex justify-content-center align-items-center" id="orline">
                                <hr class="w-100">
                                or
                                <hr class="w-100 ">
                              </div>
                                             <br>
                                              <a style="text-decoration: none; border: 1px solid gray; padding:10px;     display: flex;
                                                align-items: center;
                                                justify-content: center;
                                                width: max-content;
                                                margin: auto;" href="#" onclick="urlToForm()" class="btn btn-outline btn-inline"><i class="bi bi-keyboard me-2 fs-4"></i>enter manually</a>
                                          </div>
                                          <div class="v-portal" style="display: none;"></div>
                                      </div>
                                      </div>
                                  </div>


                                  <div class="tab-pane fade" id="nav-journal" role="tabpanel"
                                  aria-labelledby="nav-journal-tab">
                                  <div class="p-4 bar">
                                      <input type="text" class="input"  id="inputValue3"
                                          placeholder="Search for the journal article title or DOI"  id="inputValue3">
                                      <button class="btn bg-primary"  id="searchBtnArticle" onclick="searchData3(this)"> <img src="images/icons8-search-50.png"
                                              alt="" > search</button>
                                  </div>
                                  <div class="searchDataCite">
                                    <div>
                                      <ul style="margin-bottom: 50px; font-size: 10px;" >
                                          <li style="list-style-type: none;" class="urlConfirm" onclick="urlToForm()">
                                              <button class="w-full p-0" style="border:none;" fdprocessedid="swlrxm">
                                                  <div class="flex w-full px-5 py-4 text-left hover:bg-ui-bg" style="display: flex; text-align: left; align-items: center;">
                                                      <img width="50px" height="auto" src="https://favicons.mybib.com/icon?url=https://www.google.com&amp;size=60..120..200" title="Website" referrerpolicy="no-referrer" class="items-center bg-white rounded-md text-white flex shrink-0 h-[60px] justify-center mr-5 mt-1 w-[60px] shadow-[0_1px_2px_rgba(0,0,0,0.2)] object-cover">


                                                      <div style="flex: 1 1 0%; padding-left: 20px; display: flex; flex-direction: column; justify-content: space-between;">
 <!-- Style the preloader as needed -->
 <div id="preloaderArticle" style="display: none;">
    <!-- Style the preloader as needed -->
    <div class="spinner-border text-primary" role="status">
        <span class="sr-only"></span>
    </div>
</div>
<div class="text-base font-medium" id='ajaxResponseArticle' >
      <span></span>
  </div>
</div>
                                                  </div>
                                              </button>
                                          </li>
                                      </ul>
                                      <div style="text-align: center;">
                                          <div class="gap-3 d-flex justify-content-center align-items-center" id="orline">
                                <hr class="w-100">
                                or
                                <hr class="w-100 ">
                              </div>
                                         <br>
                                          <a style="text-decoration: none; border: 1px solid gray; padding:10px;     display: flex;
                                                align-items: center;
                                                justify-content: center;
                                                width: max-content;
                                                margin: auto;" href="#" onclick="urlToForm()" class="btn btn-outline btn-inline"><i class="bi bi-keyboard me-2 fs-4"></i>enter manually</a>
                                      </div>
                                      <div class="v-portal" style="display: none;"></div>
                                  </div>
                                  </div>
                              </div>

                              <div class="tab-pane fade" id="nav-video" role="tabpanel"
                                  aria-labelledby="nav-video-tab">
                                  <div class="p-4 bar">
                                      <input type="text" class="input"  placeholder="Search for the video title or paste the URL"  id="inputValue4" >
                                      <button class="btn bg-primary"  onclick="searchData4(this)" id="searchBtnVideo"> <img src="images/icons8-search-50.png"
                                              alt=""> search</button>
                                  </div>


                                  <div class="searchDataCite">
                                    <div>
                                      <ul style="margin-bottom: 50px; font-size: 10px;" >
                                          <li style="list-style-type: none;" class="urlConfirm" onclick="urlToForm()" >
                                              <button class="w-full p-0" style="border:none;" fdprocessedid="swlrxm">
                                                  <div class="flex w-full px-5 py-4 text-left hover:bg-ui-bg" style="display: flex; text-align: left; align-items: center;">
                                                      <img width="50px" height="auto" src="https://favicons.mybib.com/icon?url=https://www.google.com&amp;size=60..120..200" title="Website" referrerpolicy="no-referrer" class="items-center bg-white rounded-md text-white flex shrink-0 h-[60px] justify-center mr-5 mt-1 w-[60px] shadow-[0_1px_2px_rgba(0,0,0,0.2)] object-cover">
                                                      <div style="flex: 1 1 0%; padding-left: 20px; display: flex; flex-direction: column; justify-content: space-between;">
                                                        <div id="preloaderVideo" style="display: none;">
                                                            <!-- Style the preloader as needed -->
                                                            <div class="spinner-border text-primary" role="status">
                                                                <span class="sr-only"></span>
                                                            </div>
                                                        </div>

                                                        <div id='videoData'>

                                                        </div>

                                                  </div>
                                              </button>
                                          </li>
                                      </ul>
                                      <div style="text-align: center;">
                                          <div class="gap-3 d-flex justify-content-center align-items-center" id="orline">
                                <hr class="w-100">
                                or
                                <hr class="w-100 ">
                              </div>
                                         <br>
                                          <a style="text-decoration: none; border: 1px solid gray; padding:10px;     display: flex;
                                                align-items: center;
                                                justify-content: center;
                                                width: max-content;
                                                margin: auto;" href="#" onclick="urlToForm()" class="btn btn-outline btn-inline"><i class="bi bi-keyboard me-2 fs-4"></i>enter manually</a>
                                      </div>
                                      <div class="v-portal" style="display: none;"></div>
                                  </div>
                                  </div>
                              </div>

                                  <div class="tab-pane fade" id="nav-more" role="tabpanel"
                                      aria-labelledby="nav-more-tab">
                                      <div class="p-2 bar bar-options"  id="options">
                                          <div class="options" data-option="1">
                                              Art work
                                          </div>
                                          <div class="options" data-option="2" >
                                              Image
                                          </div>
                                          <div class="options" data-option="3" >
                                              Regulation
                                          </div>
                                          <div class="options" data-option="4" >
                                              blog post
                                          </div>
                                          <div class="options" data-option="5" >
                                              interview
                                          </div>
                                          <div class="options" data-option="6" >
                                              Report
                                          </div>
                                          <div class="options" data-option="7" >
                                              Book Chapter
                                          </div>
                                          <div class="options" data-option="8" >
                                              legal bill
                                          </div>
                                          <div class="options" data-option="9" >
                                              Song
                                          </div>
                                          <div class="options" data-option="10" >
                                              legal case
                                          </div>
                                          <div class="options" data-option="11" >
                                              speech
                                          </div>
                                          <div class="options" data-option="12" >
                                              conference paper
                                          </div>
                                          <div class="options" data-option="13" >
                                              legislation
                                          </div>
                                          <div class="options" data-option="14" >
                                              database artical
                                          </div>
                                          <div class="options" data-option="15" >
                                              magzine artical
                                          </div>
                                          <div class="options" data-option="16" >
                                              thesis
                                          </div>
                                          <div class="options" data-option="17" >
                                              Dictionary entery
                                          </div>
                                          <div class="options" data-option="18" >
                                              Map
                                          </div>
                                          <div class="options" data-option="19" >
                                              Tv/Radio Broadcast
                                          </div>
                                          <div class="options" data-option="20" >
                                              E book
                                          </div>
                                          <div class="options" data-option="21" >
                                              News artical
                                          </div>
                                          <div class="options" data-option="22" >
                                              Encyclopedia
                                          </div>
                                          <div class="options" data-option="23" >
                                              patent
                                          </div>
                                          <div class="options" data-option="24" >
                                              Film/movie
                                          </div>

                                          <div class="options" data-option="25" >
                                              Personal comminication
                                          </div>
                                          <div class="options" data-option="26" >
                                              book
                                          </div>
                                          <div class="options" data-option="27" >
                                              Journal Article
                                          </div>
                                          <div class="options" data-option="28" >
                                              Review
                                          </div>
                                          <div class="options" data-option="29" >
                                              standard
                                          </div>
                                          <div class="options" data-option="30" >
                                              video
                                          </div>
                                          <div class="options" data-option="32" >
                                              website
                                          </div>
                                          <div class="options" data-option="31" >
                                              write/past citation
                                          </div>

                                      </div>
                                  </div>



                              </div>
                              <div class="gap-3 d-flex justify-content-center align-items-center" id="orline">
                                <hr class="w-100">
                                or
                                <hr class="w-100 ">
                              </div>
                              <div class="drag-drop">
                                  Drag and drop a scholarly PDF here!
                              </div>




                                <div class="input-form">
                                    <img src="images/back-svgrepo-com.svg" class="back-form" alt="">
                                    <div id="headertitle" class="titleform"></div>
                                    <div class="form">
                                        <link rel="stylesheet" href="./style.css">
                                        <!-- form 0 -->
                                        {{-- <form action="" class="cite-form" id="form1">

                                          <div class="container mt-5 Contributers header" id="header1">
                                            <div class="toggle-container">
                                              <span class="toggle-button" data-toggle="collapse" href="#toggleContent2"
                                                >Contribution<span class="line"></span
                                                ><span class="arrow">&#x2039;</span></span
                                              >
                                              <div class="collapse show" id="toggleContent1">
                                                <div class="toggle-content">
                                                  <div class="">
                                                    <div class="input-wrappers">
                                                      <div class="textheader">Artist:</div>
                                                      <div class="inputs">
                                                        <input type="text" placeholder="First Name" /><input
                                                          type="text"
                                                          placeholder="Last Name"

                                                          />
                                                        <div class="d-flex">
                                                          <button type="button">
                                                            <img
                                                              src="./images/happy-48.png"
                                                              alt="org"
                                                              width="24"
                                                              height="24"
                                                              onclick="org(this)"
                                                            />
                                                          </button>
                                                          <button type="button">
                                                            <img
                                                              src="./images/delete-48.png"
                                                              alt="del"
                                                              width="24"
                                                              height="24"
                                                            />
                                                          </button>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="container mt-5 Title_artest body" id="body1" class="Title_artest">
                                            <div class="toggle-container">
                                              <span class="toggle-button1" data-toggle="collapse" href="#toggleContent2"
                                                >Atwork<span class="line"></span
                                                ><span class="arrow1">&#x2039;</span></span
                                              >
                                              <div class="collapse show" id="toggleContent2">
                                                <div class="toggle-content">
                                                  <div class="input-wrappers">
                                                    <div class="input-title inputs">
                                                      <div class="textdiv">Title artwork</div>
                                                      <input type="text" />
                                                    </div>
                                                  </div>
                                                  <div class="input-wrappers">
                                                    <div class="input-date inputs">
                                                      <div class="textdiv">
                                                        DATE <br />
                                                        PUBLISHED:
                                                      </div>
                                                      <input type="date" />
                                                    </div>
                                                  </div>
                                                  <div class="input-wrappers">
                                                    <div class="input-medium inputs">
                                                      <div class="textdiv">Medium</div>
                                                      <input type="text" />
                                                    </div>
                                                  </div>
                                                  <div class="input-wrappers">
                                                    <div class="input-galary inputs">
                                                      <div class="textdiv">
                                                        MUSEUM OR <br />
                                                        GALLERY
                                                      </div>
                                                      <input type="text" />
                                                    </div>
                                                  </div>
                                                  <div class="input-wrappers">
                                                    <div class="input-loc inputs">
                                                      <div class="textdiv">MUSEUM OR GALLERY LOCATION</div>
                                                      <input type="text" />
                                                    </div>
                                                  </div>

                                                  <div class="container mt-5">
                                                    <div class="toggle-container">
                                                      <span
                                                        class="toggle-button3"
                                                        data-toggle="collapse"
                                                        href="#toggleContent4"
                                                        >ARTWORK IS ONLINE?<span class="line"></span
                                                        ><span class="arrow3">&#x2039;</span></span
                                                      >
                                                      <div class="collapse show" id="toggleContent4">
                                                        <div class="toggle-content">
                                                          <div class="input-wrappers">
                                                            <div class="input-title inputs">
                                                              <div class="textdiv">URL:</div>
                                                              <input type="text" />
                                                            </div>
                                                          </div>
                                                          <div class="input-wrappers">
                                                            <div class="input-date inputs">
                                                              <div class="textdiv">
                                                                DATE <br />
                                                                PUBLISHED:
                                                              </div>
                                                              <input type="date" />
                                                            </div>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>

                                            <div class="container mt-5 annotation footer" id="globalFooter">
                                              <div class="toggle-container">
                                                <span
                                                  class="toggle-button2"
                                                  data-toggle="collapse"
                                                  href="#toggleContent3"
                                                  >ANNOTATION<span class="line"></span
                                                  ><span class="arrow2">&#x2039;</span></span
                                                >
                                                <div class="collapse show" id="toggleContent3">
                                                  <div class="toggle-content">
                                                    <div class="input-wrappers ">
                                                      <div class="input-loc inputs">
                                                        <div class="textdiv">MUSEUM OR GALLERY LOCATION</div>
                                                        <textarea name="" rows="3" cols="70" id="text-area"></textarea>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                            <div class="previwdiv zigzag">
                                              <div>
                                                 <div  class="btns">PREVIEW</div>
                                                  <div id="preview1" style="float: left; margin-left: 150px;"></div>
                                              </div>
                                            </div>
                                            <button
                                              style="border-radius: 12px;"
                                              id="btnform"
                                              type="submit"
                                              class="flex btn btn-primary save-citation-form"
                                            >
                                              <span style="font-size: 20px;">&#10003;&nbsp;</span>Save
                                            </button>
                                          </div>
                                        </form> --}}
                                        <form action="{{route('artist')}}" method='post'  class="cite-form" id="form1">
                                            @csrf
                                            <div class="container mt-5 Contributers header" id="header1">
                                              <div class="toggle-container">
                                                <span class="toggle-button" data-toggle="collapse" href="#toggleContent2"
                                                  >Contribution<span class="line"></span
                                                  ><span class="arrow">&#x2039;</span></span
                                                >
                                                <div class="collapse show" id="toggleContent1">
                                                  <div class="toggle-content">
                                                    <div class="">
                                                      <div class="input-wrappers">
                                                        <div class="textheader">Artist:</div>
                                                        <div class="inputs">
                                                        <input type="hidden" name="projectId" value="{{ $projectId }}">
                                                          <input type="text" name='firstName' placeholder="First Name" />
                                                          <input type="text" name='lastName'  placeholder="Last Name" />
                                                          <div class="d-flex">
                                                            <button type="button" >
                                                              <img src="./images/happy-48.png" alt="org" width="24" height="24" onclick="org(this)" />
                                                            </button>
                                                            <button type="button">
                                                              <img src="./images/delete-48.png" alt="del" width="24" height="24" />
                                                            </button>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                            <div class="container mt-5 Title_artest body" id="body1"
                                            class="Title_artest">
                                            <div class="toggle-container"  >
                                                <span class="toggle-button1" data-toggle="collapse"
                                                    href="#toggleContent2">Atwork<span class="line"></span><span
                                                        class="arrow1">&#x2039;</span></span>
                                                <div class="collapse show" id="toggleContent2">
                                                    <div class="toggle-content">
                                                        <div class="input-wrappers">
                                                            <div class="input-title inputs">
                                                                <div class="textdiv">Title artwork</div> <input
                                                                    type="text" name="title">
                                                            </div>
                                                        </div>
                                                        <div class="input-wrappers">
                                                            <div class="input-date inputs">
                                                                <div class="textdiv">DATE <br> PUBLISHED:</div> <input
                                                                    type="date" name="publishedDate">
                                                            </div>
                                                        </div>
                                                        <div class="input-wrappers">
                                                            <div class="input-medium inputs">
                                                                <div class="textdiv">Medium</div> <input type="text" name="medium">
                                                            </div>
                                                        </div>
                                                        <div class="input-wrappers">
                                                            <div class="input-galary inputs">
                                                                <div class="textdiv">MUSEUM OR <br> GALLERY</div> <input
                                                                    type="text" name="museum">
                                                            </div>
                                                        </div>
                                                        <div class="input-wrappers">
                                                            <div class="input-loc inputs">
                                                                <div class="textdiv">MUSEUM OR GALLERY LOCATION</div>
                                                                <input type="text" name="location">
                                                            </div>
                                                        </div>
                                                        <input type="hidden" name="projectId" value="{{ $projectId }}">
                                                        <div class="container mt-5">
                                                            <div class="toggle-container">
                                                                <span class="toggle-button3" data-toggle="collapse"
                                                                    href="#toggleContent4">ARTWORK IS ONLINE?<span
                                                                        class="line"></span><span
                                                                        class="arrow3">&#x2039;</span></span>
                                                                <div class="collapse show" id="toggleContent4">
                                                                    <div class="toggle-content">
                                                                        <div class="input-wrappers">
                                                                            <div class="input-title inputs">
                                                                                <div class="textdiv">URL:</div> <input
                                                                                    type="text" name="url">
                                                                            </div>
                                                                        </div>
                                                                        <div class="input-wrappers">
                                                                            <div class="input-date inputs">

                                                                                <div class="textdiv">DATE <Br>
                                                                                    VIEW:</div> <input type="date"  name='viewDate'>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- problem in style here --}}
                                            </div>




                                            <div class="container mt-5 annotation footer"  id="globalFooter">
                                                                                    <div class="toggle-container">
                                                                                        <span class="toggle-button2" data-toggle="collapse"
                                                                                            href="#toggleContent3">ANNOTATION<span class="line"></span><span
                                                                                                class="arrow2">&#x2039;</span></span>
                                                                                        <div class="collapse show" id="toggleContent3">
                                                                                            <div class="toggle-content">
                                                                                                <div class="input-wrappers ">

                                                                                                    <div class="input-loc inputs">
                                                                                                        <div class="textdiv"></div>
                                                                                                        <textarea name="annotation" rows="3" cols="70"
                                                                                                            id="text-area"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="previwdiv zigzag">
                                                                                  <div>
                                                                                     <div  class="btns">PREVIEW</div>
                                                                                      <div id="preview1" style="float: left; margin-left: 150px;"></div>
                                                                                  </div>
                                                                                </div>
                                                                                <button style="border-radius: 12px;"  id="btnform" type="submit" class="flex btn btn-primary save-citation-form"><span style="font-size: 20px;">&#10003;&nbsp;</span>Save</button>
                                        </form>
                                        <!-- form 1-->
                                        {{-- <form action="" class="cite-form" id="form2">
                                          <div class="container mt-5 ILLUSTRATOR header" id="header2">
                                            <div class="toggle-container">
                                              <span class="toggle-button" data-toggle="collapse" href="#toggleContent2"
                                                >Contribution<span class="line"></span
                                                ><span class="arrow">&#x2039;</span></span
                                              >
                                              <div class="collapse show" id="toggleContent2">
                                                <div class="toggle-content">
                                                  <div class="ILLUSTRATOR">
                                                    <div class="input-wrappers">
                                                      <div class="textheader">ILLUSTRATOR COPYRIGHT HOLDER:</div>
                                                      <div class="inputs">
                                                        <input type="text" placeholder="First Name" /><input
                                                          type="text"
                                                          placeholder="Last Name"
                                                        />
                                                        <div class="d-flex">
                                                          <button type="button">
                                                            <img
                                                              src="./images/happy-48.png"
                                                              alt="org"
                                                              width="24"
                                                              height="24"
                                                              onclick="org(this)"
                                                            />
                                                          </button>
                                                          <button type="button">
                                                            <img
                                                              src="./images/delete-48.png"
                                                              alt="del"
                                                              width="24"
                                                              height="24"
                                                            />
                                                          </button>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="container mt-5 Image body" id="body2" class="Image">
                                            <div class="toggle-container">
                                              <span class="toggle-button1" data-toggle="collapse" href="#toggleContent2"
                                                >Image<span class="line"></span
                                                ><span class="arrow1">&#x2039;</span></span
                                              >
                                              <div class="collapse show" id="toggleContent2">
                                                <div class="toggle-content">
                                                  <div class="input-wrappers">
                                                    <div class="input-title inputs">
                                                      <div class="textdiv">Title TITLE OR DESCRIPTION</div>
                                                      <input type="text" />
                                                    </div>
                                                  </div>
                                                  <div class="input-wrappers">
                                                    <div class="input-date inputs">
                                                      <div class="textdiv">DATE PUBLISHED:</div>
                                                      <input type="date" />
                                                    </div>
                                                  </div>
                                                  <div class="input-wrappers">
                                                    <div class="input-medium inputs">
                                                      <div class="textdiv">Medium</div>
                                                      <input type="text" />
                                                    </div>
                                                  </div>
                                                  <div class="input-wrappers">
                                                    <div class="input-galary inputs">
                                                      <div class="textdiv">CONTAINER</div>
                                                      <input type="text" />
                                                    </div>
                                                  </div>
                                                  <div class="input-wrappers">
                                                    <div class="input-title inputs">
                                                      <div class="textdiv">URL:</div>
                                                      <input type="text" />
                                                    </div>
                                                  </div>
                                                  <div class="input-wrappers">
                                                    <div class="input-date inputs">
                                                      <div class="textdiv">
                                                        DATE <br />
                                                        PUBLISHED:
                                                      </div>
                                                      <input type="date" />
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>

                                          <div class="container mt-5 annotation footer" id="globalFooter">
                                            <div class="toggle-container">
                                              <span class="toggle-button2" data-toggle="collapse" href="#toggleContent3"
                                                >ANNOTATION<span class="line"></span
                                                ><span class="arrow2">&#x2039;</span></span
                                              >
                                              <div class="collapse show" id="toggleContent3">
                                                <div class="toggle-content">
                                                  <div class="input-wrappers ">
                                                    <div class="input-loc inputs">
                                                      <div class="textdiv">MUSEUM OR GALLERY LOCATION</div>
                                                      <textarea name="" rows="3" cols="70" id="text-area"></textarea>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="previwdiv zigzag">
                                            <div>
                                               <div  class="btns">PREVIEW</div>
                                                <div id="preview1" style="float: left; margin-left: 150px;"></div>
                                            </div>
                                          </div>
                                          <button
                                            style="border-radius: 12px;"
                                            id="btnform"
                                            type="submit"
                                            class="flex btn btn-primary save-citation-form"
                                          >
                                            <span style="font-size: 20px;">&#10003;&nbsp;</span>Save
                                          </button>
                                        </form> --}}

                                        <form action="{{route('illustrator')}}" class="cite-form" id="form2" method='post' >
    @csrf
    <div class="container mt-5 ILLUSTRATOR header" id="header2">
        <div class="toggle-container">
            <span class="toggle-button" data-toggle="collapse"
                href="#toggleContent2">Contribution<span class="line"></span><span
                    class="arrow">&#x2039;</span></span>
            <div class="collapse show" id="toggleContent2">
                <div class="toggle-content">
                    <div class="ILLUSTRATOR">
                        <div class="input-wrappers">
                            <div class="textheader">ILLUSTRATOR COPYRIGHT HOLDER:
                            </div>
                             <input type="hidden" name="projectId" value="{{ $projectId }}">
                            <div class="inputs">
                                <input type="text" placeholder="First Name" name='firstName'>
                                <input type="text" placeholder="Last Name" name='lastName'>
                                    <div class="d-flex">
                                        <button type="button"><img src="./images/happy-48.png" alt="org" width="24" height="24"  onclick="org(this)"></button>
                                        <button type="button"><img src="./images/delete-48.png" alt="del" width="24" height="24"></button>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-5 Image body" id="body2" class="Image">
        <div class="toggle-container">
            <span class="toggle-button1" data-toggle="collapse"
                href="#toggleContent2">Image<span class="line"></span><span
                    class="arrow1">&#x2039;</span></span>
            <div class="collapse show" id="toggleContent2">
                <div class="toggle-content">
                    <div class="input-wrappers">
                        <div class="input-title inputs">
                            <div class="textdiv">Title TITLE OR DESCRIPTION</div>
                            <input type="text" name='title'>
                        </div>
                    </div>
                    <div class="input-wrappers">
                        <div class="input-date inputs">
                            <div class="textdiv">DATE PUBLISHED:</div> <input
                                type="date" name='publishedDate'>
                        </div>
                    </div>
                    <div class="input-wrappers">
                        <div class="input-medium inputs">
                            <div class="textdiv" >Medium</div> <input type="text" name='medium'>
                        </div>
                    </div>
                    <div class="input-wrappers">
                        <div class="input-galary inputs">
                            <div class="textdiv">CONTAINER</div> <input type="text" name='container'>
                        </div>
                    </div>
                    <div class="input-wrappers">
                        <div class="input-title inputs">
                            <div class="textdiv" name='url'>URL:</div> <input type="text">
                        </div>
                    </div>
                    <div class="input-wrappers">
                        <div class="input-date inputs">
                            <div class="textdiv">DATE <Br> VIEW:</div> <input
                                type="date"  name='viewDate'>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<div class="container mt-5 annotation footer"  id="globalFooter">
                                            <div class="toggle-container">
                                                <span class="toggle-button2" data-toggle="collapse"
                                                    href="#toggleContent3">ANNOTATION<span class="line"></span><span
                                                        class="arrow2">&#x2039;</span></span>
                                                <div class="collapse show" id="toggleContent3">
                                                    <div class="toggle-content">
                                                        <div class="input-wrappers ">
                                                            <div class="input-loc inputs">
                                                                <div class="textdiv">MUSEUM OR GALLERY LOCATION</div>
                                                                <textarea name="annotation" rows="3" cols="70"
                                                                    id="text-area"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="previwdiv zigzag">
                                          <div>
                                             <div  class="btns">PREVIEW</div>
                                              <div id="preview1" style="float: left; margin-left: 150px;"></div>
                                          </div>
                                        </div>
                                        <button style="border-radius: 12px;"  id="btnform" type="submit" class="flex btn btn-primary save-citation-form"><span style="font-size: 20px;">&#10003;&nbsp;</span>Save</button>
                                    </form>
                                        <!-- from 2 -->
                                        {{-- <form action="" class="cite-form" id="form3">
                                          <div class="container mt-5 REGULATION header" id="header3">
                                            <div class="toggle-container">
                                              <span class="toggle-button" data-toggle="collapse" href="#toggleContent2"
                                                >Contribution<span class="line"></span
                                                ><span class="arrow">&#x2039;</span></span
                                              >
                                              <div class="collapse show" id="toggleContent2">
                                                <div class="toggle-content">
                                                  <div class="REGULATION">
                                                    <div class="input-wrappers">
                                                      <div class="textheader">REGULATION AUTHOR:</div>
                                                      <div class="inputs">
                                                        <input type="text" placeholder="First Name" /><input
                                                          type="text"
                                                          placeholder="Last Name"
                                                        />
                                                        <div class="d-flex">
                                                          <button type="button">
                                                            <img
                                                              src="./images/happy-48.png"
                                                              alt="org"
                                                              width="24"
                                                              height="24"
                                                              onclick="org(this)"
                                                            />
                                                          </button>
                                                          <button type="button">
                                                            <img
                                                              src="./images/delete-48.png"
                                                              alt="del"
                                                              width="24"
                                                              height="24"
                                                            />
                                                          </button>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="container mt-5 REGULATION1 body" id="body3">
                                            <div class="toggle-container">
                                              <span class="toggle-button1" data-toggle="collapse" href="#toggleContent2"
                                                >Regulation<span class="line"></span
                                                ><span class="arrow1">&#x2039;</span></span
                                              >
                                              <div class="collapse show" id="toggleContent2">
                                                <div class="toggle-content">
                                                  <div class="input-wrappers">
                                                    <div class="input-title inputs">
                                                      <div class="textdiv">Title OF REGULATION</div>
                                                      <input type="text" />
                                                    </div>
                                                  </div>
                                                  <div class="input-wrappers">
                                                    <div class="input-date inputs">
                                                      <div class="textdiv">DATE PUBLISHED:</div>
                                                      <input type="date" />
                                                    </div>
                                                  </div>
                                                  <div class="container mt-5">
                                                    <div class="toggle-container">
                                                      <span
                                                        class="toggle-button3"
                                                        data-toggle="collapse"
                                                        href="#toggleContent4"
                                                        >ARTWORK IS ONLINE?<span class="line"></span
                                                        ><span class="arrow3">&#x2039;</span></span
                                                      >
                                                      <div class="collapse show" id="toggleContent4">
                                                        <div class="toggle-content">
                                                          <div class="input-wrappers">
                                                            <div class="input-title inputs">
                                                              <div class="textdiv">URL:</div>
                                                              <input type="text" />
                                                            </div>
                                                          </div>
                                                          <div class="input-wrappers">
                                                            <div class="input-date inputs">
                                                              <div class="textdiv">
                                                                DATE <br />
                                                                PUBLISHED:
                                                              </div>
                                                              <input type="date" />
                                                            </div>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>

                                          <div class="container mt-5 annotation footer" id="globalFooter">
                                            <div class="toggle-container">
                                              <span class="toggle-button2" data-toggle="collapse" href="#toggleContent3"
                                                >ANNOTATION<span class="line"></span
                                                ><span class="arrow2">&#x2039;</span></span
                                              >
                                              <div class="collapse show" id="toggleContent3">
                                                <div class="toggle-content">
                                                  <div class="input-wrappers ">
                                                    <div class="input-loc inputs">
                                                      <div class="textdiv">MUSEUM OR GALLERY LOCATION</div>
                                                      <textarea name="" rows="3" cols="70" id="text-area"></textarea>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="previwdiv zigzag">
                                            <div>
                                               <div  class="btns">PREVIEW</div>
                                                <div id="preview1" style="float: left; margin-left: 150px;"></div>
                                            </div>
                                          </div>
                                          <button
                                            style="border-radius: 12px;"
                                            id="btnform"
                                            type="submit"
                                            class="flex btn btn-primary save-citation-form"
                                          >
                                            <span style="font-size: 20px;">&#10003;&nbsp;</span>Save
                                          </button>
                                        </form> --}}

                                        <form action="{{route('regulation')}}" class="cite-form" id="form3" method='post'>
    @csrf
    <div class="container mt-5 REGULATION header" id="header3">
        <div class="toggle-container">
            <span class="toggle-button" data-toggle="collapse"
                href="#toggleContent2">Contribution<span class="line"></span><span
                    class="arrow">&#x2039;</span></span>
            <div class="collapse show" id="toggleContent2">
                <div class="toggle-content">
                    <div class="REGULATION">
                        <div class="input-wrappers">
                            <div class="textheader"> REGULATION AUTHOR:</div>
                            <div class="inputs">
                                <input type="hidden" name="projectId" value="{{ $projectId }}">
                                <input type="text" placeholder="First Name" name='firstName'><input
                                    type="text" placeholder="Last Name" name='lastName'>
                                    <div class="d-flex">
                                        <button type="button"><img src="./images/happy-48.png" alt="org" width="24" height="24"  onclick="org(this)"></button>
                                        <button type="button"><img src="./images/delete-48.png" alt="del" width="24" height="24"></button>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-5 REGULATION1 body" id="body3">
        <div class="toggle-container">
            <span class="toggle-button1" data-toggle="collapse"
                href="#toggleContent2">Regulation<span class="line"></span><span
                    class="arrow1">&#x2039;</span></span>
            <div class="collapse show" id="toggleContent2">
                <div class="toggle-content">
                    <div class="input-wrappers">
                        <div class="input-title inputs">
                            <div class="textdiv">Title OF REGULATION</div> <input
                                type="text" name='title'>
                        </div>
                    </div>
                    <div class="input-wrappers">
                        <div class="input-date inputs">
                            <div class="textdiv">DATE PUBLISHED:</div> <input
                                type="date" name='publishedDate'>
                        </div>
                    </div>
                    <div class="container mt-5">
                        <div class="toggle-container">
                            <span class="toggle-button3" data-toggle="collapse"
                                href="#toggleContent4">ARTWORK IS ONLINE?<span
                                    class="line"></span><span
                                    class="arrow3">&#x2039;</span></span>
                            <div class="collapse show" id="toggleContent4">
                                <div class="toggle-content">
                                    <div class="input-wrappers">
                                        <div class="input-title inputs">
                                            <div class="textdiv">URL:</div> <input
                                                type="text" name='url'>
                                        </div>
                                    </div>
                                    <div class="input-wrappers">
                                        <div class="input-date inputs">
                                            <div class="textdiv">DATE <Br>
                                                VIEW:</div> <input type="date" name='viewDate'>
                                        </div>
                                         <input type="hidden" name="projectId" value="{{ $projectId }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<div class="container mt-5 annotation footer"  id="globalFooter">
                                            <div class="toggle-container">
                                                <span class="toggle-button2" data-toggle="collapse"
                                                    href="#toggleContent3">ANNOTATION<span class="line"></span><span
                                                        class="arrow2">&#x2039;</span></span>
                                                <div class="collapse show" id="toggleContent3">
                                                    <div class="toggle-content">
                                                        <div class="input-wrappers ">
                                                            <div class="input-loc inputs">
                                                                <div class="textdiv">MUSEUM OR GALLERY LOCATION</div>
                                                                <textarea name="annotation" rows="3" cols="70"
                                                                    id="text-area"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="previwdiv zigzag">
                                          <div>
                                             <div  class="btns">PREVIEW</div>
                                              <div id="preview1" style="float: left; margin-left: 150px;"></div>
                                          </div>
                                        </div>
                                        <button style="border-radius: 12px;"  id="btnform" type="submit" class="flex btn btn-primary save-citation-form"><span style="font-size: 20px;">&#10003;&nbsp;</span>Save</button>
                                    </form>



                                        <!-- form 3 -->
                                        {{-- <form action="" class="cite-form" id="form4">
                                          <div class="container mt-5 POSTAUTHOR header" id="header4">
                                            <div class="toggle-container">
                                              <span class="toggle-button" data-toggle="collapse" href="#toggleContent2"
                                                >Contribution<span class="line"></span
                                                ><span class="arrow">&#x2039;</span></span
                                              >
                                              <div class="collapse show" id="toggleContent2">
                                                <div class="toggle-content">
                                                  <div class="POSTAUTHOR">
                                                    <div class="input-wrappers">
                                                      <div class="textheader">POST AUTHOR:</div>
                                                      <div class="inputs">
                                                        <input type="text" placeholder="First Name" /><input
                                                          type="text"
                                                          placeholder="Last Name"
                                                        />
                                                        <div class="d-flex">
                                                          <button type="button">
                                                            <img
                                                              src="./images/happy-48.png"
                                                              alt="org"
                                                              width="24"
                                                              height="24"
                                                              onclick="org(this)"
                                                            />
                                                          </button>
                                                          <button type="button">

                                                          </button>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="container mt-5 BLOGPOST body" id="body4">
                                            <div class="toggle-container">
                                              <span class="toggle-button1" data-toggle="collapse" href="#toggleContent2"
                                                >Blog Post<span class="line"></span
                                                ><span class="arrow1">&#x2039;</span></span
                                              >
                                              <div class="collapse show" id="toggleContent2">
                                                <div class="toggle-content">
                                                  <div class="input-wrappers">
                                                    <div class="input-title inputs">
                                                      <div class="textdiv">Title of Post</div>
                                                      <input type="text" />
                                                    </div>
                                                  </div>
                                                  <div class="input-wrappers">
                                                    <div class="input-date inputs">
                                                      <div class="textdiv">DATE PUBLISHED:</div>
                                                      <input type="date" />
                                                    </div>
                                                  </div>
                                                  <div class="input-wrappers">
                                                    <div class="input-title inputs">
                                                      <div class="textdiv">URL:</div>
                                                      <input type="text" />
                                                    </div>
                                                  </div>
                                                  <div class="input-wrappers">
                                                    <div class="input-date inputs">
                                                      <div class="textdiv">
                                                        DATE <br />
                                                        VIEWED:
                                                      </div>
                                                      <input type="date" />
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>

                                          <div class="container mt-5 annotation footer" id="globalFooter">
                                            <div class="toggle-container">
                                              <span class="toggle-button2" data-toggle="collapse" href="#toggleContent3"
                                                >ANNOTATION<span class="line"></span
                                                ><span class="arrow2">&#x2039;</span></span
                                              >
                                              <div class="collapse show" id="toggleContent3">
                                                <div class="toggle-content">
                                                  <div class="input-wrappers ">
                                                    <div class="input-loc inputs">
                                                      <div class="textdiv">MUSEUM OR GALLERY LOCATION</div>
                                                      <textarea name="" rows="3" cols="70" id="text-area"></textarea>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="previwdiv zigzag">
                                            <div>
                                               <div  class="btns">PREVIEW</div>
                                                <div id="preview1" style="float: left; margin-left: 150px;"></div>
                                            </div>
                                          </div>
                                          <button
                                            style="border-radius: 12px;"
                                            id="btnform"
                                            type="submit"
                                            class="flex btn btn-primary save-citation-form"
                                          >
                                            <span style="font-size: 20px;">&#10003;&nbsp;</span>Save
                                          </button>
                                        </form> --}}
                                        <form action="{{ route('postAuthor') }}" class="cite-form" id="form4" method='post'>
                                            @csrf

                                            <div class="container mt-5 POSTAUTHOR header" id="header4">
                                                <div class="toggle-container">
                                                    <span class="toggle-button" data-toggle="collapse" href="#toggleContent2">Contribution<span
                                                            class="line"></span><span class="arrow">&#x2039;</span></span>
                                                    <div class="collapse show" id="toggleContent2">
                                                        <div class="toggle-content">
                                                            <div class="POSTAUTHOR">
                                                                <div class="input-wrappers">
                                                                    <div class="textheader"> POST AUTHOR:</div>
                                                                    <div class="inputs">
                                                                        <input type="text" placeholder="First Name" name='firstName'>
                                                                        <input type="text" placeholder="Last Name" name='lastName'>
                                                                        <div class="d-flex">
                                                                            <button type="button"><img src="./images/happy-48.png" alt="org" width="24"
                                                                                    height="24" onclick="org(this)"></button>
                                                                            <button type="button"><img src="./images/delete-48.png" alt="del" width="24"
                                                                                    height="24"></button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="container mt-5 BLOGPOST body" id="body4">
                                                <div class="toggle-container">
                                                    <span class="toggle-button1" data-toggle="collapse" href="#toggleContent2">Blog Post<span
                                                            class="line"></span><span class="arrow1">&#x2039;</span></span>
                                                    <div class="collapse show" id="toggleContent2">
                                                        <div class="toggle-content">
                                                            <div class="input-wrappers">
                                                                <div class="input-title inputs">
                                                                    <div class="textdiv">Title of Post</div> <input type="text" name='title'>
                                                                </div>
                                                            </div>
                                                            <div class="input-wrappers">
                                                                <div class="input-date inputs">
                                                                    <div class="textdiv">DATE PUBLISHED:</div> <input type="date" name='publishedDate'>
                                                                </div>
                                                            </div>
                                                            <div class="input-wrappers">
                                                                <div class="input-title inputs">
                                                                    <div class="textdiv">URL:</div> <input type="text" name='url'>
                                                                </div>
                <input type="hidden" name="projectId" value="{{ $projectId }}">

                                                            </div>
                                                            <div class="input-wrappers">
                                                                <div class="input-date inputs">
                                                                    <div class="textdiv">DATE <Br>
                                                                        VIEWED:</div> <input type="date" name='veiwDate'>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="container mt-5 annotation footer" id="globalFooter">
                                                <div class="toggle-container">
                                                    <span class="toggle-button2" data-toggle="collapse" href="#toggleContent3">ANNOTATION<span
                                                            class="line"></span><span class="arrow2">&#x2039;</span></span>
                                                    <div class="collapse show" id="toggleContent3">
                                                        <div class="toggle-content">
                                                            <div class="input-wrappers ">
                                                                <div class="input-loc inputs">
                                                                    <div class="textdiv">MUSEUM OR GALLERY LOCATION</div>
                                                                    <textarea name="location" rows="3" cols="70" id="text-area"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="previwdiv zigzag">
                                              <div>
                                                 <div  class="btns">PREVIEW</div>
                                                  <div id="preview1" style="float: left; margin-left: 150px;"></div>
                                              </div>
                                            </div>
                                            <button style="border-radius: 12px;" id="btnform" type="submit"
                                                class="flex btn btn-primary save-citation-form"><span
                                                    style="font-size: 20px;">&#10003;&nbsp;</span>Save</button>
                                        </form>

                                        <!-- form 4 -->
                                        {{-- <form action="" class="cite-form" id="form5">
                                          <div class="container mt-5 INTERVIEW header" id="header5">
                                            <div class="toggle-container">
                                              <span class="toggle-button" data-toggle="collapse" href="#toggleContent2"
                                                >Contribution<span class="line"></span
                                                ><span class="arrow">&#x2039;</span></span
                                              >
                                              <div class="collapse show" id="toggleContent2">
                                                <div class="toggle-content">
                                                  <div class="INTERVIEW">
                                                    <div class="input-wrappers">
                                                      <div class="textheader">INTERVIEW WITH:</div>
                                                      <div class="inputs">
                                                        <input type="text" placeholder="First Name" /><input
                                                          type="text"
                                                          placeholder="Last Name"
                                                        />
                                                        <div class="d-flex">
                                                          <button type="button">
                                                            <img
                                                              src="./images/happy-48.png"
                                                              alt="org"
                                                              width="24"
                                                              height="24"
                                                              onclick="org(this)"
                                                            />
                                                          </button>
                                                          <button type="button">
                                                            <img
                                                              src="./images/delete-48.png"
                                                              alt="del"
                                                              width="24"
                                                              height="24"
                                                            />
                                                          </button>
                                                        </div>
                                                      </div>
                                                    </div>
                                                    <div class="input-wrappers">
                                                      <div class="textheader">INTERVIEWER:</div>
                                                      <div class="inputs">
                                                        <input type="text" placeholder="First Name" /><input
                                                          type="text"
                                                          placeholder="Last Name"
                                                        />
                                                        <div class="d-flex">
                                                          <button type="button">
                                                            <img
                                                              src="./images/happy-48.png"
                                                              alt="org"
                                                              width="24"
                                                              height="24"
                                                              onclick="org(this)"
                                                            />
                                                          </button>
                                                          <button type="button">
                                                            <img
                                                              src="./images/delete-48.png"
                                                              alt="del"
                                                              width="24"
                                                              height="24"
                                                            />
                                                          </button>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="container mt-5 INTERVIEW1 body" id="body5">
                                            <div class="toggle-container">
                                              <span class="toggle-button1" data-toggle="collapse" href="#toggleContent2"
                                                >Interview<span class="line"></span
                                                ><span class="arrow1">&#x2039;</span></span
                                              >
                                              <div class="collapse show" id="toggleContent2">
                                                <div class="toggle-content">
                                                  <div class="input-wrappers">
                                                    <div class="input-title inputs">
                                                      <div class="textdiv">Title of interview</div>
                                                      <input type="text" />
                                                    </div>
                                                  </div>
                                                  <div class="input-wrappers">
                                                    <div class="input-date inputs">
                                                      <div class="textdiv">DATE PUBLISHED:</div>
                                                      <input type="date" />
                                                    </div>
                                                  </div>
                                                  <div class="input-wrappers">
                                                    <div class="input-medium inputs">
                                                      <div class="textdiv">PUBLICATION OR CONTAINER</div>
                                                      <input type="text" />
                                                    </div>
                                                  </div>
                                                  <div class="container mt-5">
                                                    <div class="toggle-container">
                                                      <span
                                                        class="toggle-button3"
                                                        data-toggle="collapse"
                                                        href="#toggleContent4"
                                                        >ARTWORK IS ONLINE?<span class="line"></span
                                                        ><span class="arrow3">&#x2039;</span></span
                                                      >
                                                      <div class="collapse show" id="toggleContent4">
                                                        <div class="toggle-content">
                                                          <div class="input-wrappers">
                                                            <div class="input-title inputs">
                                                              <div class="textdiv">URL:</div>
                                                              <input type="text" />
                                                            </div>
                                                          </div>
                                                          <div class="input-wrappers">
                                                            <div class="input-date inputs">
                                                              <div class="textdiv">
                                                                DATE <br />
                                                                PUBLISHED:
                                                              </div>
                                                              <input type="date" />
                                                            </div>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>

                                          <div class="container mt-5 annotation footer" id="globalFooter">
                                            <div class="toggle-container">
                                              <span class="toggle-button2" data-toggle="collapse" href="#toggleContent3"
                                                >ANNOTATION<span class="line"></span
                                                ><span class="arrow2">&#x2039;</span></span
                                              >
                                              <div class="collapse show" id="toggleContent3">
                                                <div class="toggle-content">
                                                  <div class="input-wrappers ">
                                                    <div class="input-loc inputs">
                                                      <div class="textdiv">MUSEUM OR GALLERY LOCATION</div>
                                                      <textarea name="" rows="3" cols="70" id="text-area"></textarea>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="previwdiv zigzag">
                                            <div>
                                               <div  class="btns">PREVIEW</div>
                                                <div id="preview1" style="float: left; margin-left: 150px;"></div>
                                            </div>
                                          </div>
                                          <button
                                            style="border-radius: 12px;"
                                            id="btnform"
                                            type="submit"
                                            class="flex btn btn-primary save-citation-form"
                                          >
                                            <span style="font-size: 20px;">&#10003;&nbsp;</span>Save
                                          </button>
                                        </form> --}}

                                        <form action="{{ route('interview') }}" class="cite-form" id="form5" method='post'>
                                            @csrf
                                            <div class="container mt-5 INTERVIEW header" id="header5">
                                                <div class="toggle-container">
                                                    <span class="toggle-button" data-toggle="collapse" href="#toggleContent2">Contribution<span
                                                            class="line"></span><span class="arrow">&#x2039;</span></span>
                                                    <div class="collapse show" id="toggleContent2">
                                                        <div class="toggle-content">
                                                            <div class="INTERVIEW">
                                                                <div class="input-wrappers">
                                                                    <div class="textheader">INTERVIEW WITH:</div>
                                                                    <div class="inputs">
                                                                        <input type="text" placeholder="First Name" name='firstName'><input
                                                                            type="text" placeholder="Last Name" name='lastName'>
                                                                        <div class="d-flex">
                                                                            <button type="button"><img src="./images/happy-48.png" alt="org" width="24"
                                                                                    height="24" onclick="org(this)"></button>
                                                                            <button type="button"><img src="./images/delete-48.png" alt="del" width="24"
                                                                                    height="24"></button>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <div class="input-wrappers">

                                                                    <div class="textheader">INTERVIEWER:</div>
                                                                    <div class="inputs">
                                                                        <input type="text" placeholder="First Name" name='interviewer_firstName'><input
                                                                            type="text" placeholder="Last Name" name='interviewer_lastName'>
                                                                        <div class="d-flex">
                                                                            <button type="button"><img src="./images/happy-48.png" alt="org" width="24"
                                                                                    height="24" onclick="org(this)"></button>
                                                                            <button type="button"><img src="./images/delete-48.png" alt="del" width="24"
                                                                                    height="24"></button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="container mt-5 INTERVIEW1 body" id="body5">
                                                <div class="toggle-container">
                                                    <span class="toggle-button1" data-toggle="collapse" href="#toggleContent2">Interview<span
                                                            class="line"></span><span class="arrow1">&#x2039;</span></span>
                                                    <div class="collapse show" id="toggleContent2">
                                                        <div class="toggle-content">
                                                            <div class="input-wrappers">
                                                                <div class="input-title inputs">
                                                                    <div class="textdiv">Title of interview</div> <input type="text" name='title'>
                                                                </div>
                                                            </div>
                                                            <div class="input-wrappers">
                                                                <div class="input-date inputs">
                                                                    <div class="textdiv">DATE PUBLISHED:</div> <input type="date" name='publishedDate'>
                                                                </div>
                                                            </div>
                                                            <div class="input-wrappers">
                                                                <div class="input-medium inputs">
                                                                    <div class="textdiv">PUBLICATION OR CONTAINER</div>
                                                                    <input type="text" name='container'>
                                                                </div>
                                                            </div>
                                                            <div class="container mt-5">
                                                                <div class="toggle-container">
                                                                    <span class="toggle-button3" data-toggle="collapse" href="#toggleContent4">ARTWORK IS
                                                                        ONLINE?<span class="line"></span><span class="arrow3">&#x2039;</span></span>
                                                                    <div class="collapse show" id="toggleContent4">
                                                                        <div class="toggle-content">
                                                                            <div class="input-wrappers">
                                                                                <div class="input-title inputs">
                                                                                    <div class="textdiv">URL:</div> <input type="text" name='url'>
                                                                                </div>
                                                                            </div>
                                                                            <div class="input-wrappers">
                                                                                <div class="input-date inputs">
                                                                                    <div class="textdiv">DATE <Br>
                                                                                        VIEW:</div> <input type="date" name='viewDate'>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="container mt-5 annotation footer" id="globalFooter">
                                                <div class="toggle-container">
                                                    <span class="toggle-button2" data-toggle="collapse" href="#toggleContent3">ANNOTATION<span
                                                            class="line"></span><span class="arrow2">&#x2039;</span></span>
                                                    <div class="collapse show" id="toggleContent3">
                                                        <div class="toggle-content">
                                                            <div class="input-wrappers ">
                                                                <div class="input-loc inputs">
                                                                    <div class="textdiv">MUSEUM OR GALLERY LOCATION</div>
                                                                    <textarea name="annotation" rows="3" cols="70" id="text-area"></textarea>
                                                                </div>
                                                            </div>
                <input type="hidden" name="projectId" value="{{ $projectId }}">

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="previwdiv zigzag">
                                              <div>
                                                 <div  class="btns">PREVIEW</div>
                                                  <div id="preview1" style="float: left; margin-left: 150px;"></div>
                                              </div>
                                            </div>
                                            <button style="border-radius: 12px;" id="btnform" type="submit"
                                                class="flex btn btn-primary save-citation-form"><span
                                                    style="font-size: 20px;">&#10003;&nbsp;</span>Save</button>
                                        </form>
                                        <!-- form 5 -->
                                        {{-- <form action="" class="cite-form" id="form6">
                                          <div class="container mt-5 REPORTAUTHOR header" id="header6">
                                            <div class="toggle-container">
                                              <span class="toggle-button" data-toggle="collapse" href="#toggleContent2"
                                                >Contribution<span class="line"></span
                                                ><span class="arrow">&#x2039;</span></span
                                              >
                                              <div class="collapse show" id="toggleContent2">
                                                <div class="toggle-content">
                                                  <div class="REPORTAUTHOR">
                                                    <div class="input-wrappers">
                                                      <div class="textheader">REPORT AUTHOR:</div>
                                                      <div class="inputs">
                                                        <input type="text" placeholder="First Name" /><input
                                                          type="text"
                                                          placeholder="Last Name"
                                                        />
                                                        <div class="d-flex">
                                                          <button type="button">
                                                            <img
                                                              src="./images/happy-48.png"
                                                              alt="org"
                                                              width="24"
                                                              height="24"
                                                              onclick="org(this)"
                                                            />
                                                          </button>
                                                          <button type="button">
                                                            <img
                                                              src="./images/delete-48.png"
                                                              alt="del"
                                                              width="24"
                                                              height="24"
                                                            />
                                                          </button>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="container mt-5 REPORT body" id="body6">
                                            <div class="toggle-container">
                                              <span class="toggle-button1" data-toggle="collapse" href="#toggleContent2"
                                                >Report<span class="line"></span
                                                ><span class="arrow1">&#x2039;</span></span
                                              >
                                              <div class="collapse show" id="toggleContent2">
                                                <div class="toggle-content">
                                                  <div class="input-wrappers">
                                                    <div class="input-title inputs">
                                                      <div class="textdiv">Title of Report</div>
                                                      <input type="text" />
                                                    </div>
                                                  </div>
                                                  <div class="input-wrappers">
                                                    <div class="input-date inputs">
                                                      <div class="textdiv">DATE PUBLISHED:</div>
                                                      <input type="date" />
                                                    </div>
                                                  </div>
                                                  <div class="input-wrappers">
                                                    <div class="input-medium inputs">
                                                      <div class="textdiv">Page Range</div>
                                                      <input type="text" />
                                                    </div>
                                                  </div>
                                                  <div class="container mt-5">
                                                    <div class="toggle-container">
                                                      <span
                                                        class="toggle-button3"
                                                        data-toggle="collapse"
                                                        href="#toggleContent4"
                                                        >REPORT IS ONLINE?<span class="line"></span
                                                        ><span class="arrow3">&#x2039;</span></span
                                                      >
                                                      <div class="collapse show" id="toggleContent4">
                                                        <div class="toggle-content">
                                                          <div class="input-wrappers">
                                                            <div class="input-title inputs">
                                                              <div class="textdiv">URL:</div>
                                                              <input type="text" />
                                                            </div>
                                                          </div>
                                                          <div class="input-wrappers">
                                                            <div class="input-date inputs">
                                                              <div class="textdiv">
                                                                DATE <br />
                                                                PUBLISHED:
                                                              </div>
                                                              <input type="date" />
                                                            </div>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>

                                          <div class="container mt-5 annotation footer" id="globalFooter">
                                            <div class="toggle-container">
                                              <span class="toggle-button2" data-toggle="collapse" href="#toggleContent3"
                                                >ANNOTATION<span class="line"></span
                                                ><span class="arrow2">&#x2039;</span></span
                                              >
                                              <div class="collapse show" id="toggleContent3">
                                                <div class="toggle-content">
                                                  <div class="input-wrappers ">
                                                    <div class="input-loc inputs">
                                                      <div class="textdiv">MUSEUM OR GALLERY LOCATION</div>
                                                      <textarea name="" rows="3" cols="70" id="text-area"></textarea>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="previwdiv zigzag">
                                            <div>
                                               <div  class="btns">PREVIEW</div>
                                                <div id="preview1" style="float: left; margin-left: 150px;"></div>
                                            </div>
                                          </div>
                                          <button
                                            style="border-radius: 12px;"
                                            id="btnform"
                                            type="submit"
                                            class="flex btn btn-primary save-citation-form"
                                          >
                                            <span style="font-size: 20px;">&#10003;&nbsp;</span>Save
                                          </button>
                                        </form> --}}
                                        <form action="{{ route('reportAuthor') }}" class="cite-form" id="form6" method='post'>
                                            @csrf
                <input type="hidden" name="projectId" value="{{ $projectId }}">

                                            <div class="container mt-5 REPORTAUTHOR header" id="header6">
                                                <div class="toggle-container">
                                                    <span class="toggle-button" data-toggle="collapse" href="#toggleContent2">Contribution<span
                                                            class="line"></span><span class="arrow">&#x2039;</span></span>
                                                    <div class="collapse show" id="toggleContent2">
                                                        <div class="toggle-content">
                                                            <div class="REPORTAUTHOR">
                                                                <div class="input-wrappers">
                                                                    <div class="textheader">REPORT AUTHOR:</div>
                                                                    <div class="inputs">
                                                                        <input type="text" placeholder="First Name" name='firstName'><input
                                                                            type="text" placeholder="Last Name" name='lastName'>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="container mt-5 REPORT body" id="body6">
                                                <div class="toggle-container">
                                                    <span class="toggle-button1" data-toggle="collapse" href="#toggleContent2">Report<span
                                                            class="line"></span><span class="arrow1">&#x2039;</span></span>
                                                    <div class="collapse show" id="toggleContent2">
                                                        <div class="toggle-content">
                                                            <div class="input-wrappers">
                                                                <div class="input-title inputs">
                                                                    <div class="textdiv">Title of Report</div> <input type="text" name='title'>
                                                                </div>
                                                            </div>
                                                            <div class="input-wrappers">
                                                                <div class="input-date inputs">
                                                                    <div class="textdiv">DATE PUBLISHED:</div> <input type="date" name='publishedDate'>
                                                                </div>
                                                            </div>
                                                            <div class="input-wrappers">
                                                                <div class="input-medium inputs">
                                                                    <div class="textdiv">Page Range</div> <input type="text" name='pageRange'>
                                                                </div>
                                                            </div>
                                                            <div class="container mt-5">
                                                                <div class="toggle-container">
                                                                    <span class="toggle-button3" data-toggle="collapse" href="#toggleContent4">REPORT IS
                                                                        ONLINE?<span class="line"></span><span class="arrow3">&#x2039;</span></span>
                                                                    <div class="collapse show" id="toggleContent4">
                                                                        <div class="toggle-content">
                                                                            <div class="input-wrappers">
                                                                                <div class="input-title inputs">
                                                                                    <div class="textdiv">URL:</div> <input type="text" name='url'>
                                                                                </div>
                                                                            </div>
                                                                            <div class="input-wrappers">
                                                                                <div class="input-date inputs">
                                                                                    <div class="textdiv">VIEW <Br>
                                                                                        PUBLISHED:</div> <input type="date" name='viewDate'>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="container mt-5 annotation footer" id="globalFooter">
                                                <div class="toggle-container">
                                                    <span class="toggle-button2" data-toggle="collapse" href="#toggleContent3">ANNOTATION<span
                                                            class="line"></span><span class="arrow2">&#x2039;</span></span>
                                                    <div class="collapse show" id="toggleContent3">
                                                        <div class="toggle-content">
                                                            <div class="input-wrappers ">
                                                                <div class="input-loc inputs">
                                                                    <div class="textdiv">MUSEUM OR GALLERY LOCATION</div>
                                                                    <textarea name="annotation" rows="3" cols="70" id="text-area"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="previwdiv zigzag">
                                              <div>
                                                 <div  class="btns">PREVIEW</div>
                                                  <div id="preview1" style="float: left; margin-left: 150px;"></div>
                                              </div>
                                            </div>
                                            <button style="border-radius: 12px;" id="btnform" type="submit"
                                                class="flex btn btn-primary save-citation-form"><span
                                                    style="font-size: 20px;">&#10003;&nbsp;</span>Save</button>
                                        </form>
                                        <!-- form 6 -->
                                        <form action="" class="cite-form" id="form7">
                                          <div class="container mt-5 BOOKAUTHOR header" id="header7">
                                            <div class="toggle-container">
                                              <span class="toggle-button" data-toggle="collapse" href="#toggleContent2"
                                                >Contribution<span class="line"></span
                                                ><span class="arrow">&#x2039;</span></span
                                              >
                                              <div class="collapse show" id="toggleContent2">
                                                <div class="toggle-content">
                                                  <div class="BOOKAUTHOR">
                                                    <div class="input-wrappers">
                                                      <div class="textheader">BOOK AUTHOR</div>
                                                      <div class="inputs">
                                                        <input type="text" placeholder="First Name" name='firstName' /><input
                                                          type="text"
                                                          placeholder="Last Name" name="lastName"
                                                        />
                                                        <div class="d-flex">
                                                          <button type="button">
                                                            <img
                                                              src="./images/happy-48.png"
                                                              alt="org"
                                                              width="24"
                                                              height="24"
                                                              onclick="org(this)"
                                                            />
                                                          </button>
                                                          <button type="button">
                                                            <img
                                                              src="./images/delete-48.png"
                                                              alt="del"
                                                              width="24"
                                                              height="24"
                                                            />
                                                          </button>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="container mt-5 BOOK1 body" id="body7">
                                            <div class="toggle-container">
                                              <span class="toggle-button1" data-toggle="collapse" href="#toggleContent2"
                                                >Book<span class="line"></span
                                                ><span class="arrow1">&#x2039;</span></span
                                              >
                                              <div class="collapse show" id="toggleContent2">
                                                <div class="toggle-content">
                                                  <div class="input-wrappers">
                                                    <div class="input-title inputs">
                                                      <div class="textdiv">Title of Book</div>
                                                      <input type="text" name='title' />
                                                    </div>
                                                  </div>
                                                  <div class="input-wrappers">
                                                    <div class="input-date inputs">
                                                      <div class="textdiv">DATE PUBLISHED:</div>
                                                      <input type="date" name='publishedDate'/>
                                                    </div>
                                                  </div>
                                                  <div class="input-wrappers">
                                                    <div class="input-date inputs">
                                                      <div class="textdiv">DATE ORIGINALLY PUBLISHED:</div>
                                                      <input type="date" name='viewDate' />
                                                    </div>
                                                  </div>
                                                  <div class="input-wrappers">
                                                    <div class="input-medium inputs">
                                                      <div class="textdiv">Page Range</div>
                                                      <input type="text" name='range' />
                                                    </div>
                                                  </div>
                                                  <div class="input-wrappers">
                                                    <div class="input-galary inputs">
                                                      <div class="textdiv">ISBN</div>
                                                      <input type="text" name='isbn' />
                                                    </div>
                                                  </div>
                                                  <div class="container mt-5">
                                                    <div class="toggle-container">
                                                      <span
                                                        class="toggle-button3"
                                                        data-toggle="collapse"
                                                        href="#toggleContent4"
                                                        >BOOK IS ONLINE?<span class="line"></span
                                                        ><span class="arrow3">&#x2039;</span></span
                                                      >
                                                      <div class="collapse show" id="toggleContent4">
                                                        <div class="toggle-content">
                                                          <div class="input-wrappers">
                                                            <div class="input-title inputs">
                                                              <div class="textdiv">URL:</div>
                                                              <input type="text" name='url' />
                                                            </div>
                                                          </div>

                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>

                                          <div class="container mt-5 annotation footer" id="globalFooter">
                                            <div class="toggle-container">
                                              <span class="toggle-button2" data-toggle="collapse" href="#toggleContent3"
                                                >ANNOTATION<span class="line"></span
                                                ><span class="arrow2">&#x2039;</span></span
                                              >
                                              <div class="collapse show" id="toggleContent3">
                                                <div class="toggle-content">
                                                  <div class="input-wrappers ">
                                                    <div class="input-loc inputs">
                                                      <div class="textdiv">MUSEUM OR GALLERY LOCATION</div>
                                                      <textarea name="location" rows="3" cols="70" id="text-area"></textarea>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="previwdiv zigzag">
                                            <div>
                                               <div  class="btns">PREVIEW</div>
                                                <div id="preview1" style="float: left; margin-left: 150px;"></div>
                                            </div>
                                          </div>
                                          <button
                                            style="border-radius: 12px;"
                                            id="btnform"
                                            type="submit"
                                            class="flex btn btn-primary save-citation-form"
                                          >
                                            <span style="font-size: 20px;">&#10003;&nbsp;</span>Save
                                          </button>
                                        </form>
                                        <!-- form 7 -->
                                        <form action="{{route('bill')}}" method='post' class="cite-form" id="form8">
                                         @csrf
                <input type="hidden" name="projectId" value="{{ $projectId }}">

                                          <div class="container mt-5 SPONSOR header" id="header8">
                                            <div class="toggle-container">
                                              <span class="toggle-button" data-toggle="collapse" href="#toggleContent2"
                                                >Contribution<span class="line"></span
                                                ><span class="arrow">&#x2039;</span></span
                                              >
                                              <div class="collapse show" id="toggleContent2">
                                                <div class="toggle-content">
                                                  <div class="SPONSOR">
                                                    <div class="input-wrappers">
                                                      <div class="textheader">SPONSOR:</div>
                                                      <div class="inputs">
                                                        <input type="text" placeholder="First Name" name='firstName'/><input
                                                          type="text"
                                                          placeholder="Last Name" name='lastName'
                                                        />
                                                        <div class="d-flex">
                                                          <button type="button">
                                                            <img
                                                              src="./images/happy-48.png"
                                                              alt="org"
                                                              width="24"
                                                              height="24"
                                                              onclick="org(this)"
                                                            />
                                                          </button>
                                                          <button type="button">
                                                            <img
                                                              src="./images/delete-48.png"
                                                              alt="del"
                                                              width="24"
                                                              height="24"
                                                            />
                                                          </button>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="container mt-5 BILL body" id="body8">
                                            <div class="toggle-container">
                                              <span class="toggle-button1" data-toggle="collapse" href="#toggleContent2"
                                                >Bill<span class="line"></span
                                                ><span class="arrow1">&#x2039;</span></span
                                              >
                                              <div class="collapse show" id="toggleContent2">
                                                <div class="toggle-content">
                                                  <div class="input-wrappers">
                                                    <div class="input-title inputs">
                                                      <div class="textdiv">Title of Bill</div>
                                                      <input type="text" name='title' />
                                                    </div>
                                                  </div>
                                                  <div class="input-wrappers">
                                                    <div class="input-date inputs">
                                                      <div class="textdiv">DATE PUBLISHED:</div>
                                                      <input type="date" name='publishedDate' />
                                                    </div>
                                                  </div>
                                                  <div class="input-wrappers">
                                                    <div class="input-medium inputs">
                                                      <div class="textdiv">THE HOUSE THE BILL WAS HEARD IN.</div>
                                                      <input type="text" name='publisher' />
                                                    </div>
                                                  </div>
                                                  <div class="input-wrappers">
                                                    <div class="input-galary inputs">
                                                      <div class="textdiv">SESSION</div>
                                                      <input type="text" name='institution' />
                                                    </div>
                                                  </div>
                                                  <div class="input-wrappers">
                                                    <div class="input-loc inputs">
                                                      <div class="textdiv">BILL NUMBER</div>
                                                      <input type="text" name='location' />
                                                    </div>
                                                  </div>
                                                  <div class="container mt-5">
                                                    <div class="toggle-container">
                                                      <span
                                                        class="toggle-button3"
                                                        data-toggle="collapse"
                                                        href="#toggleContent4"
                                                        >BILL IS ONLINE?<span class="line"></span
                                                        ><span class="arrow3">&#x2039;</span></span
                                                      >
                                                      <div class="collapse show" id="toggleContent4">
                                                        <div class="toggle-content">
                                                          <div class="input-wrappers">
                                                            <div class="input-title inputs">
                                                              <div class="textdiv">URL:</div>
                                                              <input type="text" name='url' />
                                                            </div>
                                                          </div>
                                                          <div class="input-wrappers">
                                                            <div class="input-date inputs">
                                                              <div class="textdiv">
                                                                DATE <br />
                                                                PUBLISHED:
                                                              </div>
                                                              <input type="date" name='viewDate' />
                                                            </div>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>

                                          <div class="container mt-5 annotation footer" id="globalFooter">
                                            <div class="toggle-container">
                                              <span class="toggle-button2" data-toggle="collapse" href="#toggleContent3"
                                                >ANNOTATION<span class="line"></span
                                                ><span class="arrow2">&#x2039;</span></span
                                              >
                                              <div class="collapse show" id="toggleContent3">
                                                <div class="toggle-content">
                                                  <div class="input-wrappers ">
                                                    <div class="input-loc inputs">
                                                      <div class="textdiv">MUSEUM OR GALLERY LOCATION</div>
                                                      <textarea name="annotation" rows="3" cols="70" id="text-area"></textarea>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="previwdiv zigzag">
                                            <div>
                                               <div  class="btns">PREVIEW</div>
                                                <div id="preview1" style="float: left; margin-left: 150px;"></div>
                                            </div>
                                          </div>
                                          <button
                                            style="border-radius: 12px;"
                                            id="btnform"
                                            type="submit"
                                            class="flex btn btn-primary save-citation-form"
                                          >
                                            <span style="font-size: 20px;">&#10003;&nbsp;</span>Save
                                          </button>
                                        </form>
                                        <!-- form 8 -->
                                        <form action="{{route('song')}}" method='post' class="cite-form" id="form9">
                                          @csrf
                                          <input type="hidden" name="projectId" value="{{ $projectId }}">

                                          <div class="container mt-5 ARTIST header" id="header9">
                                            <div class="toggle-container">
                                              <span class="toggle-button" data-toggle="collapse" href="#toggleContent2"
                                                >Contribution<span class="line"></span
                                                ><span class="arrow">&#x2039;</span></span
                                              >
                                              <div class="collapse show" id="toggleContent2">
                                                <div class="toggle-content">
                                                  <div class="ARTIST">
                                                    <div class="input-wrappers">
                                                      <div class="textheader">ARTIST</div>
                                                      <div class="inputs">
                                                        <input type="text" placeholder="First Name" name='firstName' /><input
                                                          type="text"
                                                          placeholder="Last Name" name='lastName'
                                                        />
                                                        <div class="d-flex">
                                                          <button type="button">
                                                            <img
                                                              src="./images/happy-48.png"
                                                              alt="org"
                                                              width="24"
                                                              height="24"
                                                              onclick="org(this)"
                                                            />
                                                          </button>
                                                          <button type="button">
                                                            <img
                                                              src="./images/delete-48.png"
                                                              alt="del"
                                                              width="24"
                                                              height="24"
                                                            />
                                                          </button>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="container mt-5 SONG body" id="body9">
                                            <div class="toggle-container">
                                              <span class="toggle-button1" data-toggle="collapse" href="#toggleContent2"
                                                >Song<span class="line"></span
                                                ><span class="arrow1">&#x2039;</span></span
                                              >
                                              <div class="collapse show" id="toggleContent2">
                                                <div class="toggle-content">
                                                  <div class="input-wrappers">
                                                    <div class="input-title inputs">
                                                      <div class="textdiv">Title of Song</div>
                                                      <input type="text"  name='title'/>
                                                    </div>
                                                  </div>
                                                  <div class="input-wrappers">
                                                    <div class="input-date inputs">
                                                      <div class="textdiv">DATE PUBLISHED:</div>
                                                      <input type="date" name='publishedDate' />
                                                    </div>
                                                  </div>
                                                  <div class="input-wrappers">
                                                    <div class="input-medium inputs">
                                                      <div class="textdiv">Medium</div>
                                                      <input type="text" name='medium' />
                                                    </div>
                                                  </div>
                                                  <div class="input-wrappers">
                                                    <div class="input-galary inputs">
                                                      <div class="textdiv">PUBLISHER/PRODUCER</div>
                                                      <input type="text" name='publisher' />
                                                    </div>
                                                  </div>
                                                  <div class="input-wrappers">
                                                    <div class="input-loc inputs">
                                                      <div class="textdiv">PUBLISHER PLACE</div>
                                                      <input type="text" name='locaton'  />
                                                    </div>
                                                  </div>
                                                  <div class="container mt-5">
                                                    <div class="toggle-container">
                                                      <span
                                                        class="toggle-button3"
                                                        data-toggle="collapse"
                                                        href="#toggleContent4"
                                                        >SONG IS ONLINE?<span class="line"></span
                                                        ><span class="arrow3">&#x2039;</span></span
                                                      >
                                                      <div class="collapse show" id="toggleContent4">
                                                        <div class="toggle-content">
                                                          <div class="input-wrappers">
                                                            <div class="input-title inputs">
                                                              <div class="textdiv">URL:</div>
                                                              <input type="text" name='url'  />
                                                            </div>
                                                          </div>
                                                          <div class="input-wrappers">
                                                            <div class="input-date inputs">
                                                              <div class="textdiv">
                                                                DATE <br />
                                                                PUBLISHED:
                                                              </div>
                                                              <input type="date" name='viewDate'  />
                                                            </div>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>

                                          <div class="container mt-5 annotation footer" id="globalFooter">
                                            <div class="toggle-container">
                                              <span class="toggle-button2" data-toggle="collapse" href="#toggleContent3"
                                                >ANNOTATION<span class="line"></span
                                                ><span class="arrow2">&#x2039;</span></span
                                              >
                                              <div class="collapse show" id="toggleContent3">
                                                <div class="toggle-content">
                                                  <div class="input-wrappers ">
                                                    <div class="input-loc inputs">
                                                      <div class="textdiv">MUSEUM OR GALLERY LOCATION</div>
                                                      <textarea name="annotation" rows="3" cols="70" id="text-area"></textarea>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="previwdiv zigzag">
                                            <div>
                                               <div  class="btns">PREVIEW</div>
                                                <div id="preview1" style="float: left; margin-left: 150px;"></div>
                                            </div>
                                          </div>
                                          <button
                                            style="border-radius: 12px;"
                                            id="btnform"
                                            type="submit"
                                            class="flex btn btn-primary save-citation-form"
                                          >
                                            <span style="font-size: 20px;">&#10003;&nbsp;</span>Save
                                          </button>
                                        </form>
                                        <!-- form 9 -->
                                        <form action="{{route('case')}}" method='post' class="cite-form" id="form10">
                                          @csrf
                <input type="hidden" name="projectId" value="{{ $projectId }}">

                                          <div class="container mt-5 CASEAUTHOR header" id="header10">
                                            <div class="toggle-container">
                                              <span class="toggle-button" data-toggle="collapse" href="#toggleContent2"
                                                >Contribution<span class="line"></span
                                                ><span class="arrow">&#x2039;</span></span
                                              >
                                              <div class="collapse show" id="toggleContent2">
                                                <div class="toggle-content">
                                                  <div class="CASEAUTHOR">
                                                    <div class="input-wrappers">
                                                      <div class="textheader">CASE AUTHOR</div>
                                                      <div class="inputs">
                                                        <input type="text" placeholder="First Name" name='firstName' /><input
                                                          type="text"
                                                          placeholder="Last Name" name='lastName'
                                                        />
                                                        <div class="d-flex">
                                                          <button type="button">
                                                            <img
                                                              src="./images/happy-48.png"
                                                              alt="org"
                                                              width="24"
                                                              height="24"
                                                              onclick="org(this)"
                                                            />
                                                          </button>
                                                          <button type="button">
                                                            <img
                                                              src="./images/delete-48.png"
                                                              alt="del"
                                                              width="24"
                                                              height="24"
                                                            />
                                                          </button>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="container mt-5 CASE body" id="body10">
                                            <div class="toggle-container">
                                              <span class="toggle-button1" data-toggle="collapse" href="#toggleContent2"
                                                >Case<span class="line"></span
                                                ><span class="arrow1">&#x2039;</span></span
                                              >
                                              <div class="collapse show" id="toggleContent2">
                                                <div class="toggle-content">
                                                  <div class="input-wrappers">
                                                    <div class="input-title inputs">
                                                      <div class="textdiv">Case Name</div>
                                                      <input type="text" name='title' />
                                                    </div>
                                                  </div>

                                                  <div class="input-wrappers">
                                                    <div class="input-medium inputs">
                                                      <div class="textdiv">Issuing Authority</div>
                                                      <input type="text" name='institution' />
                                                    </div>
                                                  </div>
                                                  <div class="input-wrappers">
                                                    <div class="input-galary inputs">
                                                      <div class="textdiv">Authority</div>
                                                      <input type="text" name='publisher' />
                                                    </div>
                                                  </div>
                                                  <div class="input-wrappers">
                                                    <div class="input-loc inputs">
                                                      <div class="textdiv">Report</div>
                                                      <input type="text" name='container' />
                                                    </div>
                                                  </div>
                                                  <div class="input-wrappers">
                                                    <div class="input-loc inputs">
                                                      <div class="textdiv">Volume Number</div>
                                                      <input type="text" name='volume'/>
                                                    </div>
                                                  </div>
                                                  <div class="is-online">
                                                    <div class="input-wrappers">
                                                      <div class="input-date inputs">
                                                        <div class="textdiv">DATE ACCESSED/VIEWED:</div>

                                                        <input type="date" name='viewDate' />
                                                      </div>
                                                    </div>
                                                    <div class="container mt-5">
                                                      <div class="toggle-container">
                                                        <span
                                                          class="toggle-button3"
                                                          data-toggle="collapse"
                                                          href="#toggleContent4"
                                                          >CASE IS ONLINE?<span class="line"></span
                                                          ><span class="arrow3">&#x2039;</span></span
                                                        >
                                                        <div class="collapse show" id="toggleContent4">
                                                          <div class="toggle-content">
                                                            <div class="input-wrappers">
                                                              <div class="input-title inputs">
                                                                <div class="textdiv">URL:</div>
                                                                <input type="text" name='url' />
                                                              </div>
                                                            </div>
                                                            <div class="input-wrappers">
                                                              <div class="input-date inputs">
                                                                <div class="textdiv">
                                                                  DATE <br />
                                                                  PUBLISHED:
                                                                </div>
                                                                <input type="date" name='publishedDate' />
                                                              </div>
                                                            </div>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>

                                          <div class="container mt-5 annotation footer" id="globalFooter">
                                            <div class="toggle-container">
                                              <span class="toggle-button2" data-toggle="collapse" href="#toggleContent3"
                                                >ANNOTATION<span class="line"></span
                                                ><span class="arrow2">&#x2039;</span></span
                                              >
                                              <div class="collapse show" id="toggleContent3">
                                                <div class="toggle-content">
                                                  <div class="input-wrappers ">
                                                    <div class="input-loc inputs">
                                                      <div class="textdiv">MUSEUM OR GALLERY LOCATION</div>
                                                      <textarea name="annotation" rows="3" cols="70" id="text-area"></textarea>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="previwdiv zigzag">
                                            <div>
                                               <div  class="btns">PREVIEW</div>
                                                <div id="preview1" style="float: left; margin-left: 150px;"></div>
                                            </div>
                                          </div>
                                          <button
                                            style="border-radius: 12px;"
                                            id="btnform"
                                            type="submit"
                                            class="flex btn btn-primary save-citation-form"
                                          >
                                            <span style="font-size: 20px;">&#10003;&nbsp;</span>Save
                                          </button>
                                        </form>
                                        <!-- form 10 -->
                                        <form action="{{route('speech')}}" method='post' class="cite-form" id="form11">
                                          @csrf
                <input type="hidden" name="projectId" value="{{ $projectId }}">

                                          <div class="container mt-5 SPEAKER header" id="header11">
                                            <div class="toggle-container">
                                              <span class="toggle-button" data-toggle="collapse" href="#toggleContent2"
                                                >Contribution<span class="line"></span
                                                ><span class="arrow">&#x2039;</span></span
                                              >
                                              <div class="collapse show" id="toggleContent2">
                                                <div class="toggle-content">
                                                  <div class="SPEAKER">
                                                    <div class="input-wrappers">
                                                      <div class="textheader">SPEAKER:</div>
                                                      <div class="inputs">
                                                        <input type="text" placeholder="First Name" name='firstName' /><input
                                                          type="text"
                                                          placeholder="Last Name" name='lastName'
                                                        />
                                                        <div class="d-flex">
                                                          <button type="button">
                                                            <img
                                                              src="./images/happy-48.png"
                                                              alt="org"
                                                              width="24"
                                                              height="24"
                                                              onclick="org(this)"
                                                            />
                                                          </button>
                                                          <button type="button">
                                                            <img
                                                              src="./images/delete-48.png"
                                                              alt="del"
                                                              width="24"
                                                              height="24"
                                                            />
                                                          </button>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="container mt-5 SPEECH body" id="body11">
                                            <div class="toggle-container">
                                              <span class="toggle-button1" data-toggle="collapse" href="#toggleContent2"
                                                >Speech<span class="line"></span
                                                ><span class="arrow1">&#x2039;</span></span
                                              >
                                              <div class="collapse show" id="toggleContent2">
                                                <div class="toggle-content">
                                                  <div class="input-wrappers">
                                                    <div class="input-title inputs">
                                                      <div class="textdiv">Name of Speech</div>
                                                      <input type="text" name='title' />
                                                    </div>
                                                  </div>
                                                  <div class="input-wrappers">
                                                    <div class="input-date inputs">
                                                      <div class="textdiv">DATE PUBLISHED:</div>
                                                      <input type="date" name='publishedDate' />
                                                    </div>
                                                  </div>
                                                  <div class="input-wrappers">
                                                    <div class="input-medium inputs">
                                                      <div class="textdiv">Medium</div>
                                                      <input type="text" name='medium' />
                                                    </div>
                                                  </div>
                                                  <div class="input-wrappers">
                                                    <div class="input-galary inputs">
                                                      <div class="textdiv">Name of Event</div>
                                                      <input type="text" name='publisher' />
                                                    </div>
                                                  </div>
                                                  <div class="input-wrappers">
                                                    <div class="input-loc inputs">
                                                      <div class="textdiv">Event Place</div>
                                                      <input type="text" name='location' />
                                                    </div>
                                                  </div>
                                                  <div class="container mt-5">
                                                    <div class="toggle-container">
                                                      <span
                                                        class="toggle-button3"
                                                        data-toggle="collapse"
                                                        href="#toggleContent4"
                                                        >SPEECH IS ONLINE?<span class="line"></span
                                                        ><span class="arrow3">&#x2039;</span></span
                                                      >
                                                      <div class="collapse show" id="toggleContent4">
                                                        <div class="toggle-content">
                                                          <div class="input-wrappers">
                                                            <div class="input-title inputs">
                                                              <div class="textdiv">URL:</div>
                                                              <input type="text" name='url' />
                                                            </div>
                                                          </div>
                                                          <div class="input-wrappers">
                                                            <div class="input-date inputs">
                                                              <div class="textdiv">
                                                                DATE <br />
                                                                PUBLISHED:
                                                              </div>
                                                              <input type="date" name='viewDate' />
                                                            </div>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>

                                          <div class="container mt-5 annotation footer" id="globalFooter">
                                            <div class="toggle-container">
                                              <span class="toggle-button2" data-toggle="collapse" href="#toggleContent3"
                                                >ANNOTATION<span class="line"></span
                                                ><span class="arrow2">&#x2039;</span></span
                                              >
                                              <div class="collapse show" id="toggleContent3">
                                                <div class="toggle-content">
                                                  <div class="input-wrappers ">
                                                    <div class="input-loc inputs">
                                                      <div class="textdiv">MUSEUM OR GALLERY LOCATION</div>
                                                      <textarea name="annotation" rows="3" cols="70" id="text-area"></textarea>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="previwdiv zigzag">
                                            <div>
                                               <div  class="btns">PREVIEW</div>
                                                <div id="preview1" style="float: left; margin-left: 150px;"></div>
                                            </div>
                                          </div>
                                          <button
                                            style="border-radius: 12px;"
                                            id="btnform"
                                            type="submit"
                                            class="flex btn btn-primary save-citation-form"
                                          >
                                            <span style="font-size: 20px;">&#10003;&nbsp;</span>Save
                                          </button>
                                        </form>
                                        <!-- form 11 -->

                                        <form action="{{route('conference')}}" method='post' class="cite-form" id="form12">
                                          @csrf
                <input type="hidden" name="projectId" value="{{ $projectId }}">

                <div class="container mt-5 PAPERAUTHOR header" id="header12">
                                            <div class="toggle-container">
                                              <span class="toggle-button" data-toggle="collapse" href="#toggleContent2"
                                                >Contribution<span class="line"></span
                                                ><span class="arrow">&#x2039;</span></span
                                              >
                                              <div class="collapse show" id="toggleContent2">
                                                <div class="toggle-content">
                                                  <div class="PAPERAUTHOR">
                                                    <div class="input-wrappers">
                                                      <div class="textheader">PAPER AUTHOR</div>
                                                      <div class="inputs">
                                                        <input type="text" placeholder="First Name" name='firstName' /><input
                                                          type="text"
                                                          placeholder="Last Name" name='lastName'
                                                        />

                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="container mt-5 PAPER body" id="body12">
                                            <div class="toggle-container">
                                              <span class="toggle-button1" data-toggle="collapse" href="#toggleContent2"
                                                >Paper<span class="line"></span
                                                ><span class="arrow1">&#x2039;</span></span
                                              >
                                              <div class="collapse show" id="toggleContent2">
                                                <div class="toggle-content">
                                                  <div class="input-wrappers">
                                                    <div class="input-title inputs">
                                                      <div class="textdiv">Title of Paper</div>
                                                      <input type="text" name='title'/>
                                                    </div>
                                                  </div>

                                                  <div class="input-wrappers">
                                                    <div class="input-medium inputs">
                                                      <div class="textdiv">Name of Journal</div>
                                                      <input type="text" name='journal' />
                                                    </div>
                                                  </div>
                                                  <div class="input-wrappers">
                                                    <div class="input-galary inputs">
                                                      <div class="textdiv">Publisher</div>
                                                      <input type="text" name='publisher'/>
                                                    </div>
                                                  </div>
                                                  <div class="input-wrappers">
                                                    <div class="input-loc inputs">
                                                      <div class="textdiv">Publisher Place</div>
                                                      <input type="text" name='location' />
                                                    </div>
                                                  </div>
                                                  <div class="input-wrappers">
                                                    <div class="input-loc inputs">
                                                      <div class="textdiv">Volume Number</div>
                                                      <input type="text" name='volume' />
                                                    </div>
                                                  </div>
                                                  <div class="input-wrappers">
                                                    <div class="input-loc inputs">
                                                      <div class="textdiv">Page Range</div>
                                                      <input type="text" name='pageRange' />
                                                    </div>
                                                  </div>
                                                  <div class="container mt-5">
                                                    <div class="toggle-container">
                                                      <span
                                                        class="toggle-button3"
                                                        data-toggle="collapse"
                                                        href="#toggleContent4"
                                                        >SPEECH IS ONLINE?<span class="line"></span
                                                        ><span class="arrow3">&#x2039;</span></span
                                                      >
                                                      <div class="collapse show" id="toggleContent4">
                                                        <div class="toggle-content">
                                                          <div class="input-wrappers">
                                                            <div class="input-title inputs">
                                                              <div class="textdiv">URL:</div>
                                                              <input type="text" name='url'/>
                                                            </div>
                                                          </div>
                                                          <div class="input-wrappers">
                                                            <div class="input-date inputs">
                                                              <div class="textdiv">
                                                                DATE <br />
                                                                PUBLISHED:
                                                              </div>
                                                              <input type="date" name='publishedDate' />
                                                            </div>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                  <div class="container mt-5">
                                                    <div class="toggle-container">
                                                      <span
                                                        class="toggle-button3"
                                                        data-toggle="collapse"
                                                        href="#toggleContent4"
                                                        >Conference<span class="line"></span
                                                        ><span class="arrow3">&#x2039;</span></span
                                                      >
                                                      <div class="collapse show" id="toggleContent4">
                                                        <div class="toggle-content">
                                                          <div class="input-wrappers">
                                                            <div class="input-loc inputs">
                                                              <div class="textdiv">Name of Event</div>
                                                              <input type="text" name='institution' />
                                                            </div>
                                                          </div>
                                                          <div class="input-wrappers">
                                                            <div class="input-loc inputs">
                                                              <div class="textdiv">Location of Event</div>
                                                              <input type="text" name='school' />
                                                            </div>
                                                          </div>
                                                          <div class="input-wrappers">
                                                            <div class="input-loc inputs">
                                                              <div class="textdiv">Date of Event</div>
                                                              <input type="date" name='viewDate' />
                                                            </div>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>

                                          <div class="container mt-5 annotation footer" id="globalFooter">
                                            <div class="toggle-container">
                                              <span class="toggle-button2" data-toggle="collapse" href="#toggleContent3"
                                                >ANNOTATION<span class="line"></span
                                                ><span class="arrow2">&#x2039;</span></span
                                              >
                                              <div class="collapse show" id="toggleContent3">
                                                <div class="toggle-content">
                                                  <div class="input-wrappers ">
                                                    <div class="input-loc inputs">
                                                      <div class="textdiv">MUSEUM OR GALLERY LOCATION</div>
                                                      <textarea name="annotation" rows="3" cols="70" id="text-area"></textarea>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="previwdiv zigzag">
                                            <div>
                                               <div  class="btns">PREVIEW</div>
                                                <div id="preview1" style="float: left; margin-left: 150px;"></div>
                                            </div>
                                          </div>
                                          <button
                                            style="border-radius: 12px;"
                                            id="btnform"
                                            type="submit"
                                            class="flex btn btn-primary save-citation-form"
                                          >
                                            <span style="font-size: 20px;">&#10003;&nbsp;</span>Save
                                          </button>
                                        </form>

                                        <!-- form 12 -->

                                        <form action="{{route('Legislation')}}" method='post'class="cite-form" id="form13">
                                            @csrf
                                            <input type="hidden" name="projectId" value="{{ $projectId }}">
                                            <div class="container mt-5 LEGISLATIONAUTHOR header" id="header13">
                                              <div class="toggle-container">
                                                <span class="toggle-button" data-toggle="collapse" href="#toggleContent2"
                                                  >Contribution<span class="line"></span
                                                  ><span class="arrow">&#x2039;</span></span
                                                >
                                                <div class="collapse show" id="toggleContent2">
                                                  <div class="toggle-content">
                                                    <div class="LEGISLATIONAUTHOR">
                                                      <div class="input-wrappers">
                                                        <div class="textheader">LEGISLATION AUTHOR:</div>
                                                        <div class="inputs">
                                                          <input type="text" placeholder="First Name" name="firstName" /><input
                                                            type="text"
                                                            placeholder="Last Name" name="lastName"
                                                          />
                                                          <div class="d-flex">
                                                            <button>
                                                              <img
                                                                src="./images/happy-48.png"
                                                                alt="org"
                                                                width="24"
                                                                height="24"
                                                                onclick="org(this)"
                                                              />
                                                            </button>
                                                            <button>
                                                              <img
                                                                src="./images/delete-48.png"
                                                                alt="del"
                                                                width="24"
                                                                height="24"
                                                              />
                                                            </button>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                            <div class="container mt-5 LEGISLATION body" id="body13">
                                              <div class="toggle-container">
                                                <span class="toggle-button1" data-toggle="collapse" href="#toggleContent2"
                                                  >Legislation<span class="line"></span
                                                  ><span class="arrow1">&#x2039;</span></span
                                                >
                                                <div class="collapse show" id="toggleContent2">
                                                  <div class="toggle-content">
                                                    <div class="input-wrappers">
                                                      <div class="input-title inputs">
                                                        <div class="textdiv">Title of Legislation</div>
                                                        <input type="text" name="title" />
                                                      </div>
                                                    </div>
                                                    <div class="input-wrappers">
                                                      <div class="input-date inputs">
                                                        <div class="textdiv">DATE PUBLISHED:</div>
                                                        <input type="date"  name="publishedDate"/>
                                                      </div>
                                                    </div>
                                                    <div class="input-wrappers">
                                                      <div class="input-medium inputs">
                                                        <div class="textdiv">Section Number</div>
                                                        <input type="text" name="number"/>
                                                      </div>
                                                    </div>
                                                    <div class="input-wrappers">
                                                      <div class="input-galary inputs">
                                                        <div class="textdiv">Reprint Number</div>
                                                        <input type="text" name="pages" />
                                                      </div>
                                                    </div>
                                                    <div class="container mt-5">
                                                      <div class="toggle-container">
                                                        <span
                                                          class="toggle-button3"
                                                          data-toggle="collapse"
                                                          href="#toggleContent4"
                                                          >LEGISLATION IS ONLINE?<span class="line"></span
                                                          ><span class="arrow3">&#x2039;</span></span
                                                        >
                                                        <div class="collapse show" id="toggleContent4">
                                                          <div class="toggle-content">
                                                            <div class="input-wrappers">
                                                              <div class="input-title inputs">
                                                                <div class="textdiv">URL:</div>
                                                                <input type="text" name="url" />
                                                              </div>
                                                            </div>
                                                            <div class="input-wrappers">
                                                              <div class="input-date inputs">
                                                                <div class="textdiv">
                                                                  DATE <br />
                                                                  PUBLISHED:
                                                                </div>
                                                                <input type="date"  name="viewDate"/>
                                                              </div>
                                                            </div>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>

                                            <div class="container mt-5 annotation footer" id="globalFooter">
                                              <div class="toggle-container">
                                                <span class="toggle-button2" data-toggle="collapse" href="#toggleContent3"
                                                  >ANNOTATION<span class="line"></span
                                                  ><span class="arrow2">&#x2039;</span></span
                                                >
                                                <div class="collapse show" id="toggleContent3">
                                                  <div class="toggle-content">
                                                    <div class="input-wrappers ">
                                                      <div class="input-loc inputs">
                                                        <div class="textdiv">MUSEUM OR GALLERY LOCATION</div>
                                                        <textarea name="annotation" rows="3" cols="70" id="text-area"></textarea>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                            <div class="previwdiv zigzag">
                                              <div type="submit" class="btns">PREVIEW</div>
                                            </div>
                                            <button
                                              style="border-radius: 12px;"
                                              id="btnform"
                                              type="submit"
                                              class="flex btn btn-primary save-citation-form"
                                            >
                                              <span style="font-size: 20px;">&#10003;&nbsp;</span>Save
                                            </button>
                                          </form>

                                        <!-- form 13 -->

                                        <form action="{{route('Article')}}" method='post' class="cite-form" id="form14">
                                          @csrf
                                          <input type="hidden" name="projectId" value="{{ $projectId }}">

                                          <div class="container mt-5 ARTICLEAUTHOR header" id="header14">
                                            <div class="toggle-container">
                                              <span class="toggle-button" data-toggle="collapse" href="#toggleContent2"
                                                >Contribution<span class="line"></span
                                                ><span class="arrow">&#x2039;</span></span
                                              >
                                              <div class="collapse show" id="toggleContent2">
                                                <div class="toggle-content">
                                                  <div class="ARTICLEAUTHOR">
                                                    <div class="input-wrappers">
                                                      <div class="textheader">ARTICLE AUTHOR</div>
                                                      <div class="inputs">
                                                        <input type="text" placeholder="First Name" name='firstName'/><input
                                                          type="text"
                                                          placeholder="Last Name" name='lastName'
                                                        />

                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="container mt-5 ARTICLE body" id="body14">
                                            <div class="toggle-container">
                                              <span class="toggle-button1" data-toggle="collapse" href="#toggleContent2"
                                                >Article<span class="line"></span
                                                ><span class="arrow1">&#x2039;</span></span
                                              >
                                              <div class="collapse show" id="toggleContent2">
                                                <div class="toggle-content">
                                                  <div class="input-wrappers">
                                                    <div class="input-title inputs">
                                                      <div class="textdiv">Title of Article</div>
                                                      <input type="text" name='title' />
                                                    </div>
                                                  </div>
                                                  <div class="input-wrappers">
                                                    <div class="input-date inputs">
                                                      <div class="textdiv">DATE PUBLISHED:</div>
                                                      <input type="date" name='publishedDate' />
                                                    </div>
                                                  </div>
                                                  <div class="input-wrappers">
                                                    <div class="input-medium inputs">
                                                      <div class="textdiv">PAGE RANGE</div>
                                                      <input type="text" name='pages' />
                                                    </div>
                                                  </div>
                                                  <div class="input-wrappers">
                                                    <div class="input-galary inputs">
                                                      <div class="textdiv">DOI</div>
                                                      <input type="text" name='doi' />
                                                    </div>
                                                  </div>
                                                  <div class="container mt-5">
                                                    <div class="toggle-container">
                                                      <span
                                                        class="toggle-button3"
                                                        data-toggle="collapse"
                                                        href="#toggleContent4"
                                                        >ARTICLE IS ONLINE?<span class="line"></span
                                                        ><span class="arrow3">&#x2039;</span></span
                                                      >
                                                      <div class="collapse show" id="toggleContent4">
                                                        <div class="toggle-content">
                                                          <div class="input-wrappers">
                                                            <div class="input-title inputs">
                                                              <div class="textdiv">URL:</div>
                                                              <input type="text" name='url'/>
                                                            </div>
                                                          </div>
                                                          <div class="input-wrappers">
                                                            <div class="input-date inputs">
                                                              <div class="textdiv">
                                                                DATE <br />
                                                                PUBLISHED:
                                                              </div>
                                                              <input type="date" name='viewDate' />
                                                            </div>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>

                                          <div class="container mt-5 annotation footer" id="globalFooter">
                                            <div class="toggle-container">
                                              <span class="toggle-button2" data-toggle="collapse" href="#toggleContent3"
                                                >ANNOTATION<span class="line"></span
                                                ><span class="arrow2">&#x2039;</span></span
                                              >
                                              <div class="collapse show" id="toggleContent3">
                                                <div class="toggle-content">
                                                  <div class="input-wrappers ">
                                                    <div class="input-loc inputs">
                                                      <div class="textdiv">MUSEUM OR GALLERY LOCATION</div>
                                                      <textarea name="annotation" rows="3" cols="70" id="text-area"></textarea>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="previwdiv zigzag">
    <div>
       <div  class="btns">PREVIEW</div>
        <div id="preview1" style="float: left; margin-left: 150px;"></div>
    </div>
  </div>
                                          <button
                                            style="border-radius: 12px;"
                                            id="btnform"
                                            type="submit"
                                            class="flex btn btn-primary save-citation-form"
                                          >
                                            <span style="font-size: 20px;">&#10003;&nbsp;</span>Save
                                          </button>
                                        </form>

                                        <!-- form 14 -->

                                        <form action="{{route('magzine')}}" method='post' class="cite-form" id="form15">
                                          @csrf
                                          <input type="hidden" name="projectId" value="{{ $projectId }}">
                                          <div class="container mt-5 ARTICLEAUTHOR header" id="header15">
                                            <div class="toggle-container">
                                              <span class="toggle-button" data-toggle="collapse" href="#toggleContent2"
                                                >Contribution <span class="line"></span
                                                ><span class="arrow">&#x2039;</span></span
                                              >
                                              <div class="collapse show" id="toggleContent2">
                                                <div class="toggle-content">
                                                  <div class="ARTICLEAUTHOR">
                                                    <div class="input-wrappers">
                                                      <div class="textheader">ARTICLE AUTHOR</div>
                                                      <div class="inputs">
                                                        <input type="text" placeholder="First Name" name='firstName'/><input
                                                          type="text"
                                                          placeholder="Last Name" name='lastName'
                                                        />

                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="container mt-5 ARTICLE body" id="body15">
                                            <div class="toggle-container">
                                              <span class="toggle-button1" data-toggle="collapse" href="#toggleContent2"
                                                >Article<span class="line"></span
                                                ><span class="arrow1">&#x2039;</span></span
                                              >
                                              <div class="collapse show" id="toggleContent2">
                                                <div class="toggle-content">
                                                  <div class="input-wrappers">
                                                    <div class="input-title inputs">
                                                      <div class="textdiv">Title of Article</div>
                                                      <input type="text" name='title' />
                                                    </div>
                                                  </div>
                                                  <div class="input-wrappers">
                                                    <div class="input-date inputs">
                                                      <div class="textdiv">DATE PUBLISHED:</div>
                                                      <input type="date" name='publishedDate' />
                                                    </div>
                                                  </div>
                                                  <div class="input-wrappers">
                                                    <div class="input-medium inputs">
                                                      <div class="textdiv">PAGE RANGE</div>
                                                      <input type="text" name='pageRange' />
                                                    </div>
                                                  </div>
                                                  <div class="input-wrappers">
                                                    <div class="input-galary inputs">
                                                      <div class="textdiv">DOI</div>
                                                      <input type="text" name='doi' />
                                                    </div>
                                                  </div>
                                                  <div class="container mt-5">
                                                    <div class="toggle-container">
                                                      <span
                                                        class="toggle-button3"
                                                        data-toggle="collapse"
                                                        href="#toggleContent4"
                                                        >ARTICLE IS ONLINE?<span class="line"></span
                                                        ><span class="arrow3">&#x2039;</span></span
                                                      >
                                                      <div class="collapse show" id="toggleContent4">
                                                        <div class="toggle-content">
                                                          <div class="input-wrappers">
                                                            <div class="input-title inputs">
                                                              <div class="textdiv">URL:</div>
                                                              <input type="text" name='url' />
                                                            </div>
                                                          </div>
                                                          <div class="input-wrappers">
                                                            <div class="input-date inputs">
                                                              <div class="textdiv">
                                                                DATE <br />
                                                                PUBLISHED:
                                                              </div>
                                                              <input type="date" name='viewDate' />
                                                            </div>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>

                                          <div class="container mt-5 annotation footer" id="globalFooter">
                                            <div class="toggle-container">
                                              <span class="toggle-button2" data-toggle="collapse" href="#toggleContent3"
                                                >ANNOTATION<span class="line"></span
                                                ><span class="arrow2">&#x2039;</span></span
                                              >
                                              <div class="collapse show" id="toggleContent3">
                                                <div class="toggle-content">
                                                  <div class="input-wrappers ">
                                                    <div class="input-loc inputs">
                                                      <div class="textdiv">MUSEUM OR GALLERY LOCATION</div>
                                                      <textarea name="annotation" rows="3" cols="70" id="text-area"></textarea>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="previwdiv zigzag">
    <div>
       <div  class="btns">PREVIEW</div>
        <div id="preview1" style="float: left; margin-left: 150px;"></div>
    </div>
  </div>
                                          <button
                                            style="border-radius: 12px;"
                                            id="btnform"
                                            type="submit"
                                            class="flex btn btn-primary save-citation-form"
                                          >
                                            <span style="font-size: 20px;">&#10003;&nbsp;</span>Save
                                          </button>
                                        </form>

                                        <!-- form 15 -->

                                        <form action="{{route('thesis')}}" method='post' class="cite-form" id="form16">
                                         @csrf
                                         <input type="hidden" name="projectId" value="{{ $projectId }}">

                                          <div class="container mt-5 AUTHOR header" id="header16">
                                            <div class="toggle-container">
                                              <span class="toggle-button" data-toggle="collapse" href="#toggleContent2"
                                                >Contribution<span class="line"></span
                                                ><span class="arrow">&#x2039;</span></span
                                              >
                                              <div class="collapse show" id="toggleContent2">
                                                <div class="toggle-content">
                                                  <div class="AUTHOR">
                                                    <div class="input-wrappers">
                                                      <div class="textheader">AUTHOR:</div>
                                                      <div class="inputs">
                                                        <input type="text" placeholder="First Name" name='firstName'/><input
                                                          type="text"
                                                          placeholder="Last Name" name='lastName'
                                                        />

                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="container mt-5 THESIS body" id="body16">
                                            <div class="toggle-container">
                                              <span class="toggle-button1" data-toggle="collapse" href="#toggleContent2"
                                                >Thesis<span class="line"></span
                                                ><span class="arrow1">&#x2039;</span></span
                                              >
                                              <div class="collapse show" id="toggleContent2">
                                                <div class="toggle-content">
                                                  <div class="input-wrappers">
                                                    <div class="input-title inputs">
                                                      <div class="textdiv">Title of Thesis</div>
                                                      <input type="text" name='title' />
                                                    </div>
                                                  </div>
                                                  <div class="input-wrappers">
                                                    <div class="input-date inputs">
                                                      <div class="textdiv">DATE PUBLISHED:</div>
                                                      <input type="date" name='publishedDate' />
                                                    </div>
                                                  </div>
                                                  <div class="input-wrappers">
                                                    <div class="input-medium inputs">
                                                      <div class="textdiv">Document Type</div>
                                                      <input type="text" name='type' />
                                                    </div>
                                                  </div>
                                                  <div class="input-wrappers">
                                                    <div class="input-galary inputs">
                                                      <div class="textdiv">Academic Publisher or Institution Name</div>
                                                      <input type="text" name='institution' />
                                                    </div>
                                                  </div>
                                                  <div class="input-wrappers ">
                                                    <div class="input-loc inputs">
                                                      <div class="textdiv">Page Range</div>
                                                      <input type="text" name='pageRange' />
                                                    </div>
                                                  </div>
                                                  <div class="container mt-5">
                                                    <div class="toggle-container">
                                                      <span
                                                        class="toggle-button3"
                                                        data-toggle="collapse"
                                                        href="#toggleContent4"
                                                        >THESIS IS ONLINE?<span class="line"></span
                                                        ><span class="arrow3">&#x2039;</span></span
                                                      >
                                                      <div class="collapse show" id="toggleContent4">
                                                        <div class="toggle-content">
                                                          <div class="input-wrappers">
                                                            <div class="input-title inputs">
                                                              <div class="textdiv">URL:</div>
                                                              <input type="text" name='url' />
                                                            </div>
                                                          </div>
                                                          <div class="input-wrappers">
                                                            <div class="input-date inputs">
                                                              <div class="textdiv">
                                                                DATE <br />
                                                                PUBLISHED:
                                                              </div>
                                                              <input type="date" name='viewDate' />
                                                            </div>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>

                                          <div class="container mt-5 annotation footer" id="globalFooter">
                                            <div class="toggle-container">
                                              <span class="toggle-button2" data-toggle="collapse" href="#toggleContent3"
                                                >ANNOTATION<span class="line"></span
                                                ><span class="arrow2">&#x2039;</span></span
                                              >
                                              <div class="collapse show" id="toggleContent3">
                                                <div class="toggle-content">
                                                  <div class="input-wrappers ">
                                                    <div class="input-loc inputs">
                                                      <div class="textdiv">MUSEUM OR GALLERY LOCATION</div>
                                                      <textarea name="annotation" rows="3" cols="70" id="text-area"></textarea>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="previwdiv zigzag">
    <div>
       <div  class="btns">PREVIEW</div>
        <div id="preview1" style="float: left; margin-left: 150px;"></div>
    </div>
  </div>
                                          <button
                                            style="border-radius: 12px;"
                                            id="btnform"
                                            type="submit"
                                            class="flex btn btn-primary save-citation-form"
                                          >
                                            <span style="font-size: 20px;">&#10003;&nbsp;</span>Save
                                          </button>
                                        </form>

                                        <!-- form 16 -->

                                        <form action="{{route('Dictionary')}}" method='post' class="cite-form" id="form17">
                                       @csrf
                                       <input type="hidden" name="projectId" value="{{ $projectId }}">
                                       <div class="container mt-5 ENTRYAUTHOR header" id="header17">
                                            <div class="toggle-container">
                                              <span class="toggle-button" data-toggle="collapse" href="#toggleContent2"
                                                >Contribution<span class="line"></span
                                                ><span class="arrow">&#x2039;</span></span
                                              >
                                              <div class="collapse show" id="toggleContent2">
                                                <div class="toggle-content">
                                                  <div class="ENTRYAUTHOR">
                                                    <div class="input-wrappers">
                                                      <div class="textheader">ENTRY AUTHOR:</div>
                                                      <div class="inputs">
                                                        <input type="text" placeholder="First Name" name='firstName' /><input
                                                          type="text"
                                                          placeholder="Last Name" name='lastName'
                                                        />

                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="container mt-5 DICTIONARY body" id="body17">
                                            <div class="toggle-container">
                                              <span class="toggle-button1" data-toggle="collapse" href="#toggleContent2"
                                                >Dictionary<span class="line"></span
                                                ><span class="arrow1">&#x2039;</span></span
                                              >
                                              <div class="collapse show" id="toggleContent2">
                                                <div class="toggle-content">
                                                  <div class="input-wrappers">
                                                    <div class="input-title inputs">
                                                      <div class="textdiv">Title of Dictionary</div>
                                                      <input type="text" name='title' />
                                                    </div>
                                                  </div>
                                                  <div class="input-wrappers">
                                                    <div class="input-date inputs">
                                                      <div class="textdiv">DATE PUBLISHED:</div>
                                                      <input type="date" name='publishedDate' />
                                                    </div>
                                                  </div>
                                                  <div class="input-wrappers">
                                                    <div class="input-medium inputs">
                                                      <div class="textdiv">Publisher</div>
                                                      <input type="text" name='publisher' />
                                                    </div>
                                                  </div>
                                                  <div class="input-wrappers">
                                                    <div class="input-galary inputs">
                                                      <div class="textdiv">Publisher Place</div>
                                                      <input type="text" name='location' />
                                                    </div>
                                                  </div>
                                                  <div class="container mt-5">
                                                    <div class="toggle-container">
                                                      <span
                                                        class="toggle-button3"
                                                        data-toggle="collapse"
                                                        href="#toggleContent4"
                                                        >DICTIONARY IS ONLINE?<span class="line"></span
                                                        ><span class="arrow3">&#x2039;</span></span
                                                      >
                                                      <div class="collapse show" id="toggleContent4">
                                                        <div class="toggle-content">
                                                          <div class="input-wrappers">
                                                            <div class="input-title inputs">
                                                              <div class="textdiv">URL:</div>
                                                              <input type="text" name='url' />
                                                            </div>
                                                          </div>
                                                          <div class="input-wrappers">
                                                            <div class="input-date inputs">
                                                              <div class="textdiv">
                                                                DATE <br />
                                                                PUBLISHED:
                                                              </div>
                                                              <input type="date" name='viewDate' />
                                                            </div>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>

                                          <div class="container mt-5 annotation footer" id="globalFooter">
                                            <div class="toggle-container">
                                              <span class="toggle-button2" data-toggle="collapse" href="#toggleContent3"
                                                >ANNOTATION<span class="line"></span
                                                ><span class="arrow2">&#x2039;</span></span
                                              >
                                              <div class="collapse show" id="toggleContent3">
                                                <div class="toggle-content">
                                                  <div class="input-wrappers ">
                                                    <div class="input-loc inputs">
                                                      <div class="textdiv">MUSEUM OR GALLERY LOCATION</div>
                                                      <textarea name="annotation" rows="3" cols="70" id="text-area"></textarea>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="previwdiv zigzag">
    <div>
       <div  class="btns">PREVIEW</div>
        <div id="preview1" style="float: left; margin-left: 150px;"></div>
    </div>
  </div>
                                          <button
                                            style="border-radius: 12px;"
                                            id="btnform"
                                            type="submit"
                                            class="flex btn btn-primary save-citation-form"
                                          >
                                            <span style="font-size: 20px;">&#10003;&nbsp;</span>Save
                                          </button>
                                        </form>

                                        <!-- form 17 -->
                                        <form action="{{route('Map')}}" method='post' class="cite-form" id="form18">
                                         @csrf
                                         <input type="hidden" name="projectId" value="{{ $projectId }}">
                                         <div class="container mt-5 MAPAUTHOR header" id="header18">
                                            <div class="toggle-container">
                                              <span class="toggle-button" data-toggle="collapse" href="#toggleContent2"
                                                >Contribution<span class="line"></span
                                                ><span class="arrow">&#x2039;</span></span
                                              >
                                              <div class="collapse show" id="toggleContent2">
                                                <div class="toggle-content">
                                                  <div class="MAPAUTHOR">
                                                    <div class="input-wrappers">
                                                      <div class="textheader">MAP AUTHOR:</div>
                                                      <div class="inputs">
                                                        <input type="text" placeholder="First Name" name='firstName' /><input
                                                          type="text"
                                                          placeholder="Last Name" name='lastName'
                                                        />

                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="container mt-5 MAP body" id="body18">
                                            <div class="toggle-container">
                                              <span class="toggle-button1" data-toggle="collapse" href="#toggleContent2"
                                                >Map<span class="line"></span><span class="arrow1">&#x2039;</span></span
                                              >
                                              <div class="collapse show" id="toggleContent2">
                                                <div class="toggle-content">
                                                  <div class="input-wrappers">
                                                    <div class="input-title inputs">
                                                      <div class="textdiv">Title of Map</div>
                                                      <input type="text" name='title' />
                                                    </div>
                                                  </div>
                                                  <div class="input-wrappers">
                                                    <div class="input-date inputs">
                                                      <div class="textdiv">DATE PUBLISHED:</div>
                                                      <input type="date" name='publishedDate' />
                                                    </div>
                                                  </div>
                                                  <div class="input-wrappers">
                                                    <div class="input-medium inputs">
                                                      <div class="textdiv">Collection Number</div>
                                                      <input type="text" name='number' />
                                                    </div>
                                                  </div>
                                                  <div class="input-wrappers">
                                                    <div class="input-galary inputs">
                                                      <div class="textdiv">Item Number</div>
                                                      <input type="text" name='item' />
                                                    </div>
                                                  </div>
                                                  <div class="input-wrappers ">
                                                    <div class="input-loc inputs">
                                                      <div class="textdiv">Scale of Map</div>
                                                      <input type="text" name='scale' />
                                                    </div>
                                                  </div>
                                                  <div class="input-wrappers ">
                                                    <div class="input-loc inputs">
                                                      <div class="textdiv">Publisher</div>
                                                      <input type="text" name='publisher' />
                                                    </div>
                                                  </div>
                                                  <div class="input-wrappers ">
                                                    <div class="input-loc inputs">
                                                      <div class="textdiv">Publisher Place</div>
                                                      <input type="text" name='location' />
                                                    </div>
                                                  </div>
                                                  <div class="container mt-5">
                                                    <div class="toggle-container">
                                                      <span
                                                        class="toggle-button3"
                                                        data-toggle="collapse"
                                                        href="#toggleContent4"
                                                        >MAP IS ONLINE?<span class="line"></span
                                                        ><span class="arrow3">&#x2039;</span></span
                                                      >
                                                      <div class="collapse show" id="toggleContent4">
                                                        <div class="toggle-content">
                                                          <div class="input-wrappers">
                                                            <div class="input-title inputs">
                                                              <div class="textdiv">URL:</div>
                                                              <input type="text" name='url' />
                                                            </div>
                                                          </div>
                                                          <div class="input-wrappers">
                                                            <div class="input-date inputs">
                                                              <div class="textdiv">
                                                                DATE <br />
                                                                PUBLISHED:
                                                              </div>
                                                              <input type="date" name='viewDate' />
                                                            </div>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>

                                          <div class="container mt-5 annotation footer" id="globalFooter">
                                            <div class="toggle-container">
                                              <span class="toggle-button2" data-toggle="collapse" href="#toggleContent3"
                                                >ANNOTATION<span class="line"></span
                                                ><span class="arrow2">&#x2039;</span></span
                                              >
                                              <div class="collapse show" id="toggleContent3">
                                                <div class="toggle-content">
                                                  <div class="input-wrappers ">
                                                    <div class="input-loc inputs">
                                                      <div class="textdiv">MUSEUM OR GALLERY LOCATION</div>
                                                      <textarea name="annotation" rows="3" cols="70" id="text-area"></textarea>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="previwdiv zigzag">
    <div>
       <div  class="btns">PREVIEW</div>
        <div id="preview1" style="float: left; margin-left: 150px;"></div>
    </div>
  </div>
                                          <button
                                            style="border-radius: 12px;"
                                            id="btnform"
                                            type="submit"
                                            class="flex btn btn-primary save-citation-form"
                                          >
                                            <span style="font-size: 20px;">&#10003;&nbsp;</span>Save
                                          </button>
                                        </form>
                                        <!-- form 18 -->
                                        <form action="{{route('broadcast')}}" method='post' class="cite-form" id="form19">
                                        @csrf
                                        <input type="hidden" name="projectId" value="{{ $projectId }}">
                                        <div class="container mt-5 DIRECTORORPRESENTER header" id="header19">
                                            <div class="toggle-container">
                                              <span class="toggle-button" data-toggle="collapse" href="#toggleContent2"
                                                >Contribution<span class="line"></span
                                                ><span class="arrow">&#x2039;</span></span
                                              >
                                              <div class="collapse show" id="toggleContent2">
                                                <div class="toggle-content">
                                                  <div class="DIRECTORORPRESENTER">
                                                    <div class="input-wrappers">
                                                      <div class="textheader">DIRECTOR OR PRESENTER:</div>
                                                      <div class="inputs">
                                                        <input type="text" placeholder="First Name" name='firstName' /><input
                                                          type="text"
                                                          placeholder="Last Name" name='lastName'
                                                        />

                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="container mt-5 BROADCAST body" id="body19">
                                            <div class="toggle-container">
                                              <span class="toggle-button1" data-toggle="collapse" href="#toggleContent2"
                                                >Broadcast<span class="line"></span
                                                ><span class="arrow1">&#x2039;</span></span
                                              >
                                              <div class="collapse show" id="toggleContent2">
                                                <div class="toggle-content">
                                                  <div class="input-wrappers">
                                                    <div class="input-title inputs">
                                                      <div class="textdiv">Title of Broadcast</div>
                                                      <input type="text" name='title' />
                                                    </div>
                                                  </div>
                                                  <div class="input-wrappers">
                                                    <div class="input-date inputs">
                                                      <div class="textdiv">DATE PUBLISHED:</div>
                                                      <input type="date" name='publishedDate' />
                                                    </div>
                                                  </div>
                                                  <div class="input-wrappers">
                                                    <div class="input-medium inputs">
                                                      <div class="textdiv">Episode Number</div>
                                                      <input type="text" name='number' />
                                                    </div>
                                                  </div>
                                                  <div class="input-wrappers">
                                                    <div class="input-galary inputs">
                                                      <div class="textdiv">Format</div>
                                                      <input type="text" name='format' />
                                                    </div>
                                                  </div>
                                                  <div class="input-wrappers ">
                                                    <div class="input-loc inputs">
                                                      <div class="textdiv">Publisher</div>
                                                      <input type="text" name='publisher' />
                                                    </div>
                                                  </div>
                                                  <div class="container mt-5">
                                                    <div class="toggle-container">
                                                      <span
                                                        class="toggle-button3"
                                                        data-toggle="collapse"
                                                        href="#toggleContent4"
                                                        >BROADCAST IS ONLINE?<span class="line"></span
                                                        ><span class="arrow3">&#x2039;</span></span
                                                      >
                                                      <div class="collapse show" id="toggleContent4">
                                                        <div class="toggle-content">
                                                          <div class="input-wrappers">
                                                            <div class="input-title inputs">
                                                              <div class="textdiv">URL:</div>
                                                              <input type="text" name='url' />
                                                            </div>
                                                          </div>
                                                          <div class="input-wrappers">
                                                            <div class="input-date inputs">
                                                              <div class="textdiv">
                                                                DATE <br />
                                                                PUBLISHED:
                                                              </div>
                                                              <input type="date" name='viewDate' />
                                                            </div>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>

                                          <div class="container mt-5 annotation footer" id="globalFooter">
                                            <div class="toggle-container">
                                              <span class="toggle-button2" data-toggle="collapse" href="#toggleContent3"
                                                >ANNOTATION<span class="line"></span
                                                ><span class="arrow2">&#x2039;</span></span
                                              >
                                              <div class="collapse show" id="toggleContent3">
                                                <div class="toggle-content">
                                                  <div class="input-wrappers ">
                                                    <div class="input-loc inputs">
                                                      <div class="textdiv">MUSEUM OR GALLERY LOCATION</div>
                                                      <textarea name="annotation" rows="3" cols="70" id="text-area"></textarea>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="previwdiv zigzag">
    <div>
       <div  class="btns">PREVIEW</div>
        <div id="preview1" style="float: left; margin-left: 150px;"></div>
    </div>
  </div>
                                          <button
                                            style="border-radius: 12px;"
                                            id="btnform"
                                            type="submit"
                                            class="flex btn btn-primary save-citation-form"
                                          >
                                            <span style="font-size: 20px;">&#10003;&nbsp;</span>Save
                                          </button>
                                        </form>

                                        <!-- form 19 -->
                                        <form action="{{route('bookForm')}}" method='post' class="cite-form" id="form20">
                                         @csrf
                                         <input type="hidden" name="projectId" value="{{ $projectId }}">
                                         <div class="container mt-5 AUTHOR header" id="header20">
                                            <div class="toggle-container">
                                              <span class="toggle-button" data-toggle="collapse" href="#toggleContent2"
                                                >Contribution Ebook<span class="line"></span
                                                ><span class="arrow">&#x2039;</span></span
                                              >
                                              <div class="collapse show" id="toggleContent2">
                                                <div class="toggle-content">
                                                  <div class="AUTHOR">
                                                    <div class="input-wrappers">
                                                      <div class="textheader">AUTHOR :</div>
                                                      <div class="inputs">
                                                        <input type="text" placeholder="First Name" name='firstName' /><input
                                                          type="text"
                                                          placeholder="Last Name" name='lastName'
                                                        />


                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="container mt-5 BOOK2 body" id="body20">
                                            <div class="toggle-container">
                                              <span class="toggle-button1" data-toggle="collapse" href="#toggleContent2"
                                                >Book<span class="line"></span
                                                ><span class="arrow1">&#x2039;</span></span
                                              >
                                              <div class="collapse show" id="toggleContent2">
                                                <div class="toggle-content">
                                                  <div class="input-wrappers">
                                                    <div class="input-title inputs">
                                                      <div class="textdiv">Title of Book</div>
                                                      <input type="text" name='title' />
                                                    </div>
                                                  </div>
                                                  <div class="input-wrappers">
                                                    <div class="input-date inputs">
                                                      <div class="textdiv">DATE PUBLISHED:</div>
                                                      <input type="date" name='publishedDate' />
                                                    </div>
                                                  </div>
                                                  <div class="input-wrappers">
                                                    <div class="input-medium inputs">
                                                      <div class="textdiv">PUBLISHER</div>
                                                      <input type="text" name='publisher'/>
                                                    </div>
                                                  </div>
                                                  <div class="input-wrappers">
                                                    <div class="input-galary inputs">
                                                      <div class="textdiv">PUBLISHER PLACE</div>
                                                      <input type="text" name='location' />
                                                    </div>
                                                  </div>
                                                  <div class="input-wrappers">
                                                    <div class="input-loc inputs">
                                                      <div class="textdiv">PAGE RANGE</div>
                                                      <input type="text" name='pageRange' />
                                                    </div>
                                                  </div>
                                                  <div class="container mt-5">
                                                    <div class="toggle-container">
                                                      <span
                                                        class="toggle-button3"
                                                        data-toggle="collapse"
                                                        href="#toggleContent4"
                                                        >BOOK IS ONLINE?<span class="line"></span
                                                        ><span class="arrow3">&#x2039;</span></span
                                                      >
                                                      <div class="collapse show" id="toggleContent4">
                                                        <div class="toggle-content">
                                                          <div class="input-wrappers">
                                                            <div class="input-title inputs">
                                                              <div class="textdiv">URL:</div>
                                                              <input type="text" name='url'/>
                                                            </div>
                                                          </div>
                                                          <div class="input-wrappers">
                                                            <div class="input-date inputs">
                                                              <div class="textdiv">
                                                                DATE <br />
                                                                PUBLISHED:
                                                              </div>
                                                              <input type="date" name='viewDate' />
                                                            </div>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>

                                          <div class="container mt-5 annotation footer" id="globalFooter">
                                            <div class="toggle-container">
                                              <span class="toggle-button2" data-toggle="collapse" href="#toggleContent3"
                                                >ANNOTATION<span class="line"></span
                                                ><span class="arrow2">&#x2039;</span></span
                                              >
                                              <div class="collapse show" id="toggleContent3">
                                                <div class="toggle-content">
                                                  <div class="input-wrappers ">
                                                    <div class="input-loc inputs">
                                                      <div class="textdiv">MUSEUM OR GALLERY LOCATION</div>
                                                      <textarea name="annotation" rows="3" cols="70" id="text-area"></textarea>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="previwdiv zigzag">
    <div>
       <div  class="btns">PREVIEW</div>
        <div id="preview1" style="float: left; margin-left: 150px;"></div>
    </div>
  </div>
                                          <button
                                            style="border-radius: 12px;"
                                            id="btnform"
                                            type="submit"
                                            class="flex btn btn-primary save-citation-form"
                                          >
                                            <span style="font-size: 20px;">&#10003;&nbsp;</span>Save
                                          </button>
                                        </form>

                                        <!-- form 20 -->
                                        <form action="{{route('NewsArticle')}}" method='post' class="cite-form" id="form21">
                                         @csrf
                                        <input type="hidden" name="projectId" value="{{ $projectId }}">
                                        <div class="container mt-5 ARTICLEAUTHOR header" id="header21">
                                            <div class="toggle-container">
                                              <span class="toggle-button" data-toggle="collapse" href="#toggleContent2"
                                                >Contribution<span class="line"></span
                                                ><span class="arrow">&#x2039;</span></span
                                              >
                                              <div class="collapse show" id="toggleContent2">
                                                <div class="toggle-content">
                                                  <div class="ARTICLEAUTHOR">
                                                    <div class="input-wrappers">
                                                      <div class="textheader">ARTICLE AUTHOR:</div>
                                                      <div class="inputs">
                                                        <input type="text" placeholder="First Name" name='firstName'/><input
                                                          type="text"
                                                          placeholder="Last Name" name='lastName'
                                                        />


                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="container mt-5 ARTICLE body" id="body21">
                                            <div class="toggle-container">
                                              <span class="toggle-button1" data-toggle="collapse" href="#toggleContent2"
                                                >Article<span class="line"></span
                                                ><span class="arrow1">&#x2039;</span></span
                                              >
                                              <div class="collapse show" id="toggleContent2">
                                                <div class="toggle-content">
                                                  <div class="input-wrappers">
                                                    <div class="input-title inputs">
                                                      <div class="textdiv">Title of Article</div>
                                                      <input type="text" name='title'/>
                                                    </div>
                                                  </div>
                                                  <div class="input-wrappers">
                                                    <div class="input-date inputs">
                                                      <div class="textdiv">DATE PUBLISHED:</div>
                                                      <input type="date" name='publishedDate'/>
                                                    </div>
                                                  </div>
                                                  <div class="input-wrappers">
                                                    <div class="input-medium inputs">
                                                      <div class="textdiv">PAGE RANGE</div>
                                                      <input type="text" name='pageRange' />
                                                    </div>
                                                  </div>
                                                  <div class="input-wrappers">
                                                    <div class="input-galary inputs">
                                                      <div class="textdiv">DOI</div>
                                                      <input type="text" name='doi'/>
                                                    </div>
                                                  </div>
                                                  <div class="container mt-5">
                                                    <div class="toggle-container">
                                                      <span
                                                        class="toggle-button3"
                                                        data-toggle="collapse"
                                                        href="#toggleContent4"
                                                        >ARTICLE IS ONLINE?<span class="line"></span
                                                        ><span class="arrow3">&#x2039;</span></span
                                                      >
                                                      <div class="collapse show" id="toggleContent4">
                                                        <div class="toggle-content">
                                                          <div class="input-wrappers">
                                                            <div class="input-title inputs">
                                                              <div class="textdiv">URL:</div>
                                                              <input type="text" name='url' />
                                                            </div>
                                                          </div>
                                                          <div class="input-wrappers">
                                                            <div class="input-date inputs">
                                                              <div class="textdiv">
                                                                DATE <br />
                                                                PUBLISHED:
                                                              </div>
                                                              <input type="date" name='viewDate' />
                                                            </div>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>

                                          <div class="container mt-5 annotation footer" id="globalFooter">
                                            <div class="toggle-container">
                                              <span class="toggle-button2" data-toggle="collapse" href="#toggleContent3"
                                                >ANNOTATION<span class="line"></span
                                                ><span class="arrow2">&#x2039;</span></span
                                              >
                                              <div class="collapse show" id="toggleContent3">
                                                <div class="toggle-content">
                                                  <div class="input-wrappers ">
                                                    <div class="input-loc inputs">
                                                      <div class="textdiv">MUSEUM OR GALLERY LOCATION</div>
                                                      <textarea name="annotation" rows="3" cols="70" id="text-area"></textarea>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="previwdiv zigzag">
    <div>
       <div  class="btns">PREVIEW</div>
        <div id="preview1" style="float: left; margin-left: 150px;"></div>
    </div>
  </div>
                                          <button
                                            style="border-radius: 12px;"
                                            id="btnform"
                                            type="submit"
                                            class="flex btn btn-primary save-citation-form"
                                          >
                                            <span style="font-size: 20px;">&#10003;&nbsp;</span>Save
                                          </button>
                                        </form>

                                        <!-- form 21 -->

                                        <form action="{{route('Encyclopedia')}}" method='post' class="cite-form" id="form22">
                                          @csrf
                                        <input type="hidden" name="projectId" value="{{ $projectId }}">
                                        <div class="container mt-5 ENTRYAUTHOR header" id="header22">
                                            <div class="toggle-container">
                                              <span class="toggle-button" data-toggle="collapse" href="#toggleContent2"
                                                >Contribution<span class="line"></span
                                                ><span class="arrow">&#x2039;</span></span
                                              >
                                              <div class="collapse show" id="toggleContent2">
                                                <div class="toggle-content">
                                                  <div class="ENTRYAUTHOR">
                                                    <div class="input-wrappers">
                                                      <div class="textheader">ENTRY AUTHOR:</div>
                                                      <div class="inputs">
                                                        <input type="text" placeholder="First Name" name='firstName'/><input
                                                          type="text" name='lastName'
                                                          placeholder="Last Name"
                                                        />

                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="container mt-5 ENCYCLOPEDIA body" id="body22">
                                            <div class="toggle-container">
                                              <span class="toggle-button1" data-toggle="collapse" href="#toggleContent4"
                                                >Encyclopedia<span class="line"></span
                                                ><span class="arrow1">&#x2039;</span></span
                                              >
                                              <div class="collapse show" id="toggleContent4">
                                                <div class="toggle-content">
                                                  <div class="input-wrappers">
                                                    <div class="input-title inputs">
                                                      <div class="textdiv">Name of Encyclopedia</div>
                                                      <input type="text" name='title'/>
                                                    </div>
                                                  </div>
                                                  <div class="input-wrappers">
                                                    <div class="input-date inputs">
                                                      <div class="textdiv">DATE PUBLISHED:</div>
                                                      <input type="date" name='publishedDate' />
                                                    </div>
                                                  </div>
                                                  <div class="input-wrappers">
                                                    <div class="input-medium inputs">
                                                      <div class="textdiv">Edition</div>
                                                      <input type="text" name='edition' />
                                                    </div>
                                                  </div>
                                                  <div class="input-wrappers">
                                                    <div class="input-galary inputs">
                                                      <div class="textdiv">Volume Number</div>
                                                      <input type="text" name='volume' />
                                                    </div>
                                                  </div>
                                                  <div class="input-wrappers">
                                                    <div class="input-loc inputs">
                                                      <div class="textdiv">Publisher</div>
                                                      <input type="text" name='publisher' />
                                                    </div>
                                                  </div>
                                                  <div class="input-wrappers">
                                                    <div class="input-loc inputs">
                                                      <div class="textdiv">Publisher Place</div>
                                                      <input type="text" name='location'/>
                                                    </div>
                                                  </div>
                                                  <div class="input-wrappers">
                                                    <div class="input-loc inputs">
                                                      <div class="textdiv">Database</div>
                                                      <input type="text" name='database' />
                                                    </div>
                                                  </div>
                                                  <div class="container mt-5">
                                                    <div class="toggle-container">
                                                      <span
                                                        class="toggle-button3"
                                                        data-toggle="collapse"
                                                        href="#toggleContent4"
                                                        >ENCYCLOPEDIA IS ONLINE?<span class="line"></span
                                                        ><span class="arrow3">&#x2039;</span></span
                                                      >
                                                      <div class="collapse show" id="toggleContent4">
                                                        <div class="toggle-content">
                                                          <div class="input-wrappers">
                                                            <div class="input-title inputs">
                                                              <div class="textdiv">URL:</div>
                                                              <input type="text" name='url' />
                                                            </div>
                                                          </div>
                                                          <div class="input-wrappers">
                                                            <div class="input-date inputs">
                                                              <div class="textdiv">
                                                                DATE <br />
                                                                PUBLISHED:
                                                              </div>
                                                              <input type="date" name='viewDate' />
                                                            </div>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>

                                          <div class="container mt-5 annotation footer" id="globalFooter">
                                            <div class="toggle-container">
                                              <span class="toggle-button2" data-toggle="collapse" href="#toggleContent3"
                                                >ANNOTATION<span class="line"></span
                                                ><span class="arrow2">&#x2039;</span></span
                                              >
                                              <div class="collapse show" id="toggleContent3">
                                                <div class="toggle-content">
                                                  <div class="input-wrappers ">
                                                    <div class="input-loc inputs">
                                                      <div class="textdiv">MUSEUM OR GALLERY LOCATION</div>
                                                      <textarea name="annotation" rows="3" cols="70" id="text-area"></textarea>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="previwdiv zigzag">
    <div>
       <div  class="btns">PREVIEW</div>
        <div id="preview1" style="float: left; margin-left: 150px;"></div>
    </div>
  </div>
                                          <button
                                            style="border-radius: 12px;"
                                            id="btnform"
                                            type="submit"
                                            class="flex btn btn-primary save-citation-form"
                                          >
                                            <span style="font-size: 20px;">&#10003;&nbsp;</span>Save
                                          </button>
                                        </form>
                                        <!-- form 22 -->

                                        <form action="{{route('Patent')}}" method='post' class="cite-form" id="form23">
                                         @csrf
                                        <input type="hidden" name="projectId" value="{{ $projectId }}">
                                        <div class="container mt-5 INVENTOR header" id="header23">
                                            <div class="toggle-container">
                                              <span class="toggle-button" data-toggle="collapse" href="#toggleContent2"
                                                >Contribution<span class="line"></span
                                                ><span class="arrow">&#x2039;</span></span
                                              >
                                              <div class="collapse show" id="toggleContent2">
                                                <div class="toggle-content">
                                                  <div class="INVENTOR">
                                                    <div class="input-wrappers">
                                                      <div class="textheader">INVENTOR:</div>
                                                      <div class="inputs">
                                                        <input type="text" placeholder="First Name" name="firstName" /><input
                                                          type="text"
                                                          placeholder="Last Name" name="lastName"
                                                        />


                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="container mt-5 PATENT body" id="body23">
                                            <div class="toggle-container">
                                              <span class="toggle-button1" data-toggle="collapse" href="#toggleContent5"
                                                >Patent<span class="line"></span
                                                ><span class="arrow1">&#x2039;</span></span
                                              >
                                              <div class="collapse show" id="toggleContent5">
                                                <div class="toggle-content">
                                                  <div class="input-wrappers">
                                                    <div class="input-title inputs">
                                                      <div class="textdiv">Title of Patent</div>
                                                      <input type="text" name='title' />
                                                    </div>
                                                  </div>
                                                  <div class="input-wrappers">
                                                    <div class="input-date inputs">
                                                      <div class="textdiv">DATE PUBLISHED:</div>
                                                      <input type="date" name='publishedDate' />
                                                    </div>
                                                  </div>
                                                  <div class="input-wrappers">
                                                    <div class="input-medium inputs">
                                                      <div class="textdiv">Number</div>
                                                      <input type="text"  name='number'/>
                                                    </div>
                                                  </div>
                                                  <div class="input-wrappers">
                                                    <div class="input-galary inputs">
                                                      <div class="textdiv">Authority</div>
                                                      <input type="text" name='authority' />
                                                    </div>
                                                  </div>
                                                  <div class="container mt-5">
                                                    <div class="toggle-container">
                                                      <span
                                                        class="toggle-button3"
                                                        data-toggle="collapse"
                                                        href="#toggleContent4"
                                                        >PATENT IS ONLINE?<span class="line"></span
                                                        ><span class="arrow3">&#x2039;</span></span
                                                      >
                                                      <div class="collapse show" id="toggleContent4">
                                                        <div class="toggle-content">
                                                          <div class="input-wrappers">
                                                            <div class="input-title inputs">
                                                              <div class="textdiv">URL:</div>
                                                              <input type="text"  name='url'/>
                                                            </div>
                                                          </div>
                                                          <div class="input-wrappers">
                                                            <div class="input-date inputs">
                                                              <div class="textdiv">
                                                                DATE <br />
                                                                PUBLISHED:
                                                              </div>
                                                              <input type="date" name='viewDate' />
                                                            </div>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>

                                          <div class="container mt-5 annotation footer" id="globalFooter">
                                            <div class="toggle-container">
                                              <span class="toggle-button2" data-toggle="collapse" href="#toggleContent3"
                                                >ANNOTATION<span class="line"></span
                                                ><span class="arrow2">&#x2039;</span></span
                                              >
                                              <div class="collapse show" id="toggleContent3">
                                                <div class="toggle-content">
                                                  <div class="input-wrappers ">
                                                    <div class="input-loc inputs">
                                                      <div class="textdiv">MUSEUM OR GALLERY LOCATION</div>
                                                      <textarea name="annotation" rows="3" cols="70" id="text-area"></textarea>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="previwdiv zigzag">
    <div>
       <div  class="btns">PREVIEW</div>
        <div id="preview1" style="float: left; margin-left: 150px;"></div>
    </div>
  </div>
                                          <button
                                            style="border-radius: 12px;"
                                            id="btnform"
                                            type="submit"
                                            class="flex btn btn-primary save-citation-form"
                                          >
                                            <span style="font-size: 20px;">&#10003;&nbsp;</span>Save
                                          </button>
                                        </form>
                                        <!-- form 23 -->

                                        <form action="{{route('Movie')}}" method='post' class="cite-form" id="form24">
                                        @csrf
                                        <input type="hidden" name="projectId" value="{{ $projectId }}">

                                        <div class="container mt-5 DIRECTORORPRESENTER header" id="header24">
                                            <div class="toggle-container">
                                              <span class="toggle-button" data-toggle="collapse" href="#toggleContent2"
                                                >Contribution<span class="line"></span
                                                ><span class="arrow">&#x2039;</span></span
                                              >
                                              <div class="collapse show" id="toggleContent2">
                                                <div class="toggle-content">
                                                  <div class="DIRECTORORPRESENTER">
                                                    <div class="input-wrappers">
                                                      <div class="textheader">DIRECTOR:</div>
                                                      <div class="inputs">
                                                        <input type="text" placeholder="First Name" name="firstName" /><input
                                                          type="text"
                                                          placeholder="Last Name" name="lastName"
                                                        />

                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="container mt-5 MOVIE body" id="body24">
                                            <div class="toggle-container">
                                              <span class="toggle-button1" data-toggle="collapse" href="#toggleContent7"
                                                >Movie<span class="line"></span
                                                ><span class="arrow1">&#x2039;</span></span
                                              >
                                              <div class="collapse show" id="toggleContent7">
                                                <div class="toggle-content">
                                                  <div class="input-wrappers">
                                                    <div class="input-title inputs">
                                                      <div class="textdiv">Title of Movie</div>
                                                      <input type="text" name='title' />
                                                    </div>
                                                  </div>
                                                  <div class="input-wrappers">
                                                    <div class="input-date inputs">
                                                      <div class="textdiv">DATE PUBLISHED:</div>
                                                      <input type="date" name='publishedDate' />
                                                    </div>
                                                  </div>
                                                  <div class="input-wrappers">
                                                    <div class="input-medium inputs">
                                                      <div class="textdiv">Medium</div>
                                                      <input type="text" name="medium"/>
                                                    </div>
                                                  </div>
                                                  <div class="input-wrappers">
                                                    <div class="input-galary inputs">
                                                      <div class="textdiv">Distributor</div>
                                                      <input type="text" name="editor" />
                                                    </div>
                                                  </div>
                                                  <div class="input-wrappers">
                                                    <div class="input-galary inputs">
                                                      <div class="textdiv">Distributor Place</div>
                                                      <input type="text" name="location" />
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>

                                          <div class="container mt-5 annotation footer" id="globalFooter">
                                            <div class="toggle-container">
                                              <span class="toggle-button2" data-toggle="collapse" href="#toggleContent3"
                                                >ANNOTATION<span class="line"></span
                                                ><span class="arrow2">&#x2039;</span></span
                                              >
                                              <div class="collapse show" id="toggleContent3">
                                                <div class="toggle-content">
                                                  <div class="input-wrappers ">
                                                    <div class="input-loc inputs">
                                                      <div class="textdiv">MUSEUM OR GALLERY LOCATION</div>
                                                      <textarea name="annotation" rows="3" cols="70" id="text-area"></textarea>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="previwdiv zigzag">
    <div>
       <div  class="btns">PREVIEW</div>
        <div id="preview1" style="float: left; margin-left: 150px;"></div>
    </div>
  </div>
                                          <button
                                            style="border-radius: 12px;"
                                            id="btnform"
                                            type="submit"
                                            class="flex btn btn-primary save-citation-form"
                                          >
                                            <span style="font-size: 20px;">&#10003;&nbsp;</span>Save
                                          </button>
                                        </form>

                                        <!-- form 24 -->

                                        <form action="{{route('Communication')}}" method='post' class="cite-form" id="form25">
                                          @csrf
                                        <input type="hidden" name="projectId" value="{{ $projectId }}">
                                        <div class="container mt-5 COMMUNICATION header" id="header26">
                                            <div class="toggle-container">
                                              <span class="toggle-button" data-toggle="collapse" href="#toggleContent2"
                                                >Contribution<span class="line"></span
                                                ><span class="arrow">&#x2039;</span></span
                                              >
                                              <div class="collapse show" id="toggleContent2">
                                                <div class="toggle-content">
                                                  <div class="COMMUNICATION">
                                                    <div class="input-wrappers">
                                                      <div class="textheader">SENDER:</div>
                                                      <div class="inputs">
                                                        <input type="text" placeholder="First Name" name="firstName"/><input
                                                          type="text"
                                                          placeholder="Last Name" name="lastName"
                                                        />

                                                      </div>
                                                    </div>
                                                    <div class="input-wrappers">
                                                      <div class="textheader">RECIPIENT :</div>
                                                      <div class="inputs">
                                                        <input type="text" placeholder="First Name"name="interviewerF"  /><input
                                                          type="text"
                                                          placeholder="Last Name" name='interviewrL'
                                                        />

                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="container mt-5 COMMUNICATION body" id="body26">
                                            <div class="toggle-container">
                                              <span class="toggle-button1" data-toggle="collapse" href="#toggleContent8"
                                                >Communication<span class="line"></span
                                                ><span class="arrow1">&#x2039;</span></span
                                              >
                                              <div class="collapse show" id="toggleContent8">
                                                <div class="toggle-content">
                                                  <div class="input-wrappers">
                                                    <div class="input-title inputs">
                                                      <div class="textdiv">Title of Communication</div>
                                                      <input type="text" name='title'/>
                                                    </div>
                                                  </div>
                                                  <div class="input-wrappers">
                                                    <div class="input-date inputs">
                                                      <div class="textdiv">Date Published:</div>
                                                      <input type="date" name='publishedDate' />
                                                    </div>
                                                  </div>
                                                  <div class="input-wrappers">
                                                    <div class="input-medium inputs">
                                                      <div class="textdiv">Medium</div>
                                                      <input type="text" name="medium"/>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>

                                          <div class="container mt-5 annotation footer" id="globalFooter">
                                            <div class="toggle-container">
                                              <span class="toggle-button2" data-toggle="collapse" href="#toggleContent3"
                                                >ANNOTATION<span class="line"></span
                                                ><span class="arrow2">&#x2039;</span></span
                                              >
                                              <div class="collapse show" id="toggleContent3">
                                                <div class="toggle-content">
                                                  <div class="input-wrappers ">
                                                    <div class="input-loc inputs">
                                                      <div class="textdiv">MUSEUM OR GALLERY LOCATION</div>
                                                      <textarea name="annotation" rows="3" cols="70" id="text-area"></textarea>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="previwdiv zigzag">
    <div>
       <div  class="btns">PREVIEW</div>
        <div id="preview1" style="float: left; margin-left: 150px;"></div>
    </div>
  </div>
                                          <button
                                            style="border-radius: 12px;"
                                            id="btnform"
                                            type="submit"
                                            class="flex btn btn-primary save-citation-form"
                                          >
                                            <span style="font-size: 20px;">&#10003;&nbsp;</span>Save
                                          </button>
                                        </form>

                                        <!-- form 25 -->

                                        <form action="{{route('book')}}" method='post' class="cite-form" id="form26">
                                          @csrf
                                        <input type="hidden" name="projectId" value="{{ $projectId }}">

                                        <div class="container mt-5 BOOKAUTHOR header" id="header27">
                                            <div class="toggle-container">
                                              <span class="toggle-button" data-toggle="collapse" href="#toggleContent2"
                                                >Contribution book<span class="line"></span
                                                ><span class="arrow">&#x2039;</span></span
                                              >
                                              <div class="collapse show" id="toggleContent2">
                                                <div class="toggle-content">
                                                  <div class="BOOKAUTHOR">
                                                    <div class="input-wrappers">
                                                      <div class="textheader">BOOK AUTHOR</div>
                                                      <div class="inputs">
                                                        <input type="text" placeholder="First Name" name="firstName" /><input
                                                          type="text"
                                                          placeholder="Last Name" name="lastName"
                                                        />

                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="container mt-5 BOOK1 body" id="body27">
                                            <div class="toggle-container">
                                              <span class="toggle-button1" data-toggle="collapse" href="#toggleContent2"
                                                >Book<span class="line"></span
                                                ><span class="arrow1">&#x2039;</span></span
                                              >
                                              <div class="collapse show" id="toggleContent2">
                                                <div class="toggle-content">
                                                  <div class="input-wrappers">
                                                    <div class="input-title inputs">
                                                      <div class="textdiv">Title of Book</div>
                                                      <input type="text" name='title' />
                                                    </div>
                                                  </div>
                                                  <div class="input-wrappers">
                                                    <div class="input-date inputs">
                                                      <div class="textdiv">DATE PUBLISHED:</div>
                                                      <input type="date" name='publishedDate'/>
                                                    </div>
                                                  </div>
                                                  <div class="input-wrappers">
                                                    <div class="input-date inputs">
                                                      <div class="textdiv">DATE ORIGINALLY PUBLISHED:</div>
                                                      <input type="date" name='viewDate' />
                                                    </div>
                                                  </div>
                                                  <div class="input-wrappers">
                                                    <div class="input-medium inputs">
                                                      <div class="textdiv">Page Range</div>
                                                      <input type="text" name='pageRange'/>
                                                    </div>
                                                  </div>
                                                  <div class="input-wrappers">
                                                    <div class="input-galary inputs">
                                                      <div class="textdiv">ISBN</div>
                                                      <input type="text" name='isbn' />
                                                    </div>
                                                  </div>
                                                  <div class="container mt-5">
                                                    <div class="toggle-container">
                                                      <span
                                                        class="toggle-button3"
                                                        data-toggle="collapse"
                                                        href="#toggleContent4"
                                                        >BOOK IS ONLINE?<span class="line"></span
                                                        ><span class="arrow3">&#x2039;</span></span
                                                      >
                                                      <div class="collapse show" id="toggleContent4">
                                                        <div class="toggle-content">
                                                          <div class="input-wrappers">
                                                            <div class="input-title inputs">
                                                              <div class="textdiv">URL:</div>
                                                              <input type="text" name='url'/>
                                                            </div>
                                                          </div>
                                                          <div class="input-wrappers">
                                                            <div class="input-date inputs">
                                                              <div class="textdiv">
                                                                DATE <br />
                                                                PUBLISHED:
                                                              </div>
                                                              <input type="date" name='viewDate'/>
                                                            </div>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>

                                          <div class="container mt-5 annotation footer" id="globalFooter">
                                            <div class="toggle-container">
                                              <span class="toggle-button2" data-toggle="collapse" href="#toggleContent3"
                                                >ANNOTATION<span class="line"></span
                                                ><span class="arrow2">&#x2039;</span></span
                                              >
                                              <div class="collapse show" id="toggleContent3">
                                                <div class="toggle-content">
                                                  <div class="input-wrappers ">
                                                    <div class="input-loc inputs">
                                                      <div class="textdiv">MUSEUM OR GALLERY LOCATION</div>
                                                      <textarea name="annotation" rows="3" cols="70" id="text-area"></textarea>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="previwdiv zigzag">
    <div>
       <div  class="btns">PREVIEW</div>
        <div id="preview1" style="float: left; margin-left: 150px;"></div>
    </div>
  </div>
                                          <button
                                            style="border-radius: 12px;"
                                            id="btnform"
                                            type="submit"
                                            class="flex btn btn-primary save-citation-form"
                                          >
                                            <span style="font-size: 20px;">&#10003;&nbsp;</span>Save
                                          </button>
                                        </form>

                                        <!-- form 26 -->
                                        <form action="{{route('MagzineArticle')}}" method='post' class="cite-form" id="form27">
                                          @csrf
                                        <input type="hidden" name="projectId" value="{{ $projectId }}">
                                        <div class="container mt-5 ARTICLEAUTHOR header" id="header28">
                                            <div class="toggle-container">
                                              <span class="toggle-button" data-toggle="collapse" href="#toggleContent2"
                                                >Contribution mag<span class="line"></span
                                                ><span class="arrow">&#x2039;</span></span
                                              >
                                              <div class="collapse show" id="toggleContent2">
                                                <div class="toggle-content">
                                                  <div class="ARTICLEAUTHOR">
                                                    <div class="input-wrappers">
                                                      <div class="textheader">ARTICLE AUTHOR:</div>
                                                      <div class="inputs">
                                                        <input type="text" placeholder="First Name"  name="firstName"/><input
                                                          type="text"
                                                          placeholder="Last Name" name="lastName"
                                                        />

                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="container mt-5 ARTICLE body" id="body28">
                                            <div class="toggle-container">
                                              <span class="toggle-button1" data-toggle="collapse" href="#toggleContent2"
                                                >Article<span class="line"></span
                                                ><span class="arrow1">&#x2039;</span></span
                                              >
                                              <div class="collapse show" id="toggleContent2">
                                                <div class="toggle-content">
                                                  <div class="input-wrappers">
                                                    <div class="input-title inputs">
                                                      <div class="textdiv">Title of Article</div>
                                                      <input type="text" name='title'/>
                                                    </div>
                                                  </div>
                                                  <div class="input-wrappers">
                                                    <div class="input-date inputs">
                                                      <div class="textdiv">DATE PUBLISHED:</div>
                                                      <input type="date"  name='publishedDate'/>
                                                    </div>
                                                  </div>
                                                  <div class="input-wrappers">
                                                    <div class="input-medium inputs">
                                                      <div class="textdiv">PAGE RANGE</div>
                                                      <input type="text" name='pageRange'/>
                                                    </div>
                                                  </div>
                                                  <div class="input-wrappers">
                                                    <div class="input-galary inputs">
                                                      <div class="textdiv">DOI</div>
                                                      <input type="text" name='doi'/>
                                                    </div>
                                                  </div>
                                                  <div class="container mt-5">
                                                    <div class="toggle-container">
                                                      <span
                                                        class="toggle-button3"
                                                        data-toggle="collapse"
                                                        href="#toggleContent4"
                                                        >ARTICLE IS ONLINE?<span class="line"></span
                                                        ><span class="arrow3">&#x2039;</span></span
                                                      >
                                                      <div class="collapse show" id="toggleContent4">
                                                        <div class="toggle-content">
                                                          <div class="input-wrappers">
                                                            <div class="input-title inputs">
                                                              <div class="textdiv">URL:</div>
                                                              <input type="text" name='url' />
                                                            </div>
                                                          </div>
                                                          <div class="input-wrappers">
                                                            <div class="input-date inputs">
                                                              <div class="textdiv">
                                                                DATE <br />
                                                                PUBLISHED:
                                                              </div>
                                                              <input type="date" name='viewDate' />
                                                            </div>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>

                                          <div class="container mt-5 annotation footer" id="globalFooter">
                                            <div class="toggle-container">
                                              <span class="toggle-button2" data-toggle="collapse" href="#toggleContent3"
                                                >ANNOTATION<span class="line"></span
                                                ><span class="arrow2">&#x2039;</span></span
                                              >
                                              <div class="collapse show" id="toggleContent3">
                                                <div class="toggle-content">
                                                  <div class="input-wrappers ">
                                                    <div class="input-loc inputs">
                                                      <div class="textdiv">MUSEUM OR GALLERY LOCATION</div>
                                                      <textarea name="annotation" rows="3" cols="70" id="text-area"></textarea>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="previwdiv zigzag">
    <div>
       <div  class="btns">PREVIEW</div>
        <div id="preview1" style="float: left; margin-left: 150px;"></div>
    </div>
  </div>
                                          <button
                                            style="border-radius: 12px;"
                                            id="btnform"
                                            type="submit"
                                            class="flex btn btn-primary save-citation-form"
                                          >
                                            <span style="font-size: 20px;">&#10003;&nbsp;</span>Save
                                          </button>
                                        </form>


                                        {{-- tommorow --}}
                                        <!-- from 27 -->
                                        <form action="{{route('Review')}}" method='post' class="cite-form" id="form28">
                                         @csrf
                                        <input type="hidden" name="projectId" value="{{ $projectId }}">

                                        <div class="container mt-5 REVIEWAUTHOR header" id="header29">
                                            <div class="toggle-container">
                                              <span class="toggle-button" data-toggle="collapse" href="#toggleContent2"
                                                >Contribution<span class="line"></span
                                                ><span class="arrow">&#x2039;</span></span
                                              >
                                              <div class="collapse show" id="toggleContent2">
                                                <div class="toggle-content">
                                                  <div class="REVIEWAUTHOR">
                                                    <div class="input-wrappers">
                                                      <div class="textheader">REVIEW AUTHOR</div>
                                                      <div class="inputs">
                                                        <input type="text" placeholder="First Name" name="firstName"  /><input
                                                          type="text"
                                                          placeholder="Last Name" name="lastName"
                                                        />

                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="container mt-5 REVIEW1 body" id="body29">
                                            <div class="toggle-container">
                                              <span class="toggle-button1" data-toggle="collapse" href="#toggleContent2"
                                                >Review<span class="line"></span
                                                ><span class="arrow1">&#x2039;</span></span
                                              >
                                              <div class="collapse show" id="toggleContent2">
                                                <div class="toggle-content">
                                                  <div class="input-wrappers">
                                                    <div class="input-title inputs">
                                                      <div class="textdiv">Title of Review</div>
                                                      <input type="text" name="title" />
                                                    </div>
                                                  </div>
                                                  <div class="input-wrappers">
                                                    <div class="input-date inputs">
                                                      <div class="textdiv">DATE PUBLISHED:</div>
                                                      <input type="date" name="publishedDate " />
                                                    </div>
                                                  </div>
                                                  <div class="input-wrappers">
                                                    <div class="input-medium inputs">
                                                      <div class="textdiv">PAGE RANGE</div>
                                                      <input type="text" name='pageRange' />

                                                    </div>
                                                  </div>
                                                  <div class="container mt-5">
                                                    <div class="toggle-container">
                                                      <span
                                                        class="toggle-button3"
                                                        data-toggle="collapse"
                                                        href="#toggleContent4"
                                                        >REVIEW IS ONLINE?<span class="line"></span
                                                        ><span class="arrow3">&#x2039;</span></span
                                                      >
                                                      <div class="collapse show" id="toggleContent4">
                                                        <div class="toggle-content">
                                                          <div class="input-wrappers">
                                                            <div class="input-title inputs">
                                                              <div class="textdiv">URL:</div>
                                                              <input type="text"  name='url'/>
                                                            </div>
                                                          </div>
                                                          <div class="input-wrappers">
                                                            <div class="input-date inputs">
                                                              <div class="textdiv">
                                                                DATE <br />
                                                                PUBLISHED:
                                                              </div>
                                                              <input type="date" name="publishedDate " />
                                                            </div>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>

                                          <div class="container mt-5 annotation footer" id="globalFooter">
                                            <div class="toggle-container">
                                              <span class="toggle-button2" data-toggle="collapse" href="#toggleContent3"
                                                >ANNOTATION<span class="line"></span
                                                ><span class="arrow2">&#x2039;</span></span
                                              >
                                              <div class="collapse show" id="toggleContent3">
                                                <div class="toggle-content">
                                                  <div class="input-wrappers ">
                                                    <div class="input-loc inputs">
                                                      <div class="textdiv">MUSEUM OR GALLERY LOCATION</div>
                                                      <textarea name="annotation" rows="3" cols="70" id="text-area"></textarea>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="previwdiv zigzag">
    <div>
       <div  class="btns">PREVIEW</div>
        <div id="preview1" style="float: left; margin-left: 150px;"></div>
    </div>
  </div>
                                          <button
                                            style="border-radius: 12px;"
                                            id="btnform"
                                            type="submit"
                                            class="flex btn btn-primary save-citation-form"
                                          >
                                            <span style="font-size: 20px;">&#10003;&nbsp;</span>Save
                                          </button>
                                        </form>

                                        <!-- from 28 -->
                                        <form action="{{route('Standard')}}" method='post' class="cite-form" id="form29">
                                         @csrf
                                        <input type="hidden" name="projectId" value="{{ $projectId }}">
                                        <div class="container mt-5 AUTHOR header" id="header30">
                                            <div class="toggle-container">
                                              <span class="toggle-button" data-toggle="collapse" href="#toggleContent2"
                                                >Contribution<span class="line"></span
                                                ><span class="arrow">&#x2039;</span></span
                                              >
                                              <div class="collapse show" id="toggleContent2">
                                                <div class="toggle-content">
                                                  <div class="AUTHOR">
                                                    <div class="input-wrappers">
                                                      <div class="textheader">AUTHOR:</div>
                                                      <div class="inputs">
                                                        <input type="text" placeholder="First Name" name="firstName"  /><input
                                                          type="text"
                                                          placeholder="Last Name" name="lastName"
                                                        />

                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="container mt-5 STANDARD body" id="body30">
                                            <div class="toggle-container">
                                              <span class="toggle-button1" data-toggle="collapse" href="#toggleContent2"
                                                >Standard<span class="line"></span
                                                ><span class="arrow1">&#x2039;</span></span
                                              >
                                              <div class="collapse show" id="toggleContent2">
                                                <div class="toggle-content">
                                                  <div class="input-wrappers">
                                                    <div class="input-title inputs">
                                                      <div class="textdiv">Title of Standard</div>
                                                      <input type="text" name="title" />
                                                    </div>
                                                  </div>
                                                  <div class="input-wrappers">
                                                    <div class="input-date inputs">
                                                      <div class="textdiv">DATE PUBLISHED:</div>
                                                      <input type="date" name="publishedDate " />
                                                    </div>
                                                  </div>
                                                  <div class="input-wrappers">
                                                    <div class="input-medium inputs">
                                                      <div class="textdiv">Item Number</div>
                                                      <input type="text" name="number" />
                                                    </div>
                                                  </div>
                                                  <div class="input-wrappers">
                                                    <div class="input-galary inputs">
                                                      <div class="textdiv">Publisher</div>
                                                      <input type="text" name="publisher" />
                                                    </div>
                                                  </div>
                                                  <div class="input-wrappers ">
                                                    <div class="input-loc inputs">
                                                      <div class="textdiv">Publisher Place</div>
                                                      <input type="text" name="location" />
                                                    </div>
                                                  </div>
                                                  <div class="container mt-5">
                                                    <div class="toggle-container">
                                                      <span
                                                        class="toggle-button3"
                                                        data-toggle="collapse"
                                                        href="#toggleContent4"
                                                        >STANDARD IS ONLINE?<span class="line"></span
                                                        ><span class="arrow3">&#x2039;</span></span
                                                      >
                                                      <div class="collapse show" id="toggleContent4">
                                                        <div class="toggle-content">
                                                          <div class="input-wrappers">
                                                            <div class="input-title inputs">
                                                              <div class="textdiv">URL:</div>
                                                              <input type="text" name="url"/>
                                                            </div>
                                                          </div>
                                                          <div class="input-wrappers">
                                                            <div class="input-date inputs">
                                                              <div class="textdiv">
                                                                DATE <br />
                                                                PUBLISHED:
                                                              </div>
                                                              <input type="date" name="publishedDate "/>
                                                            </div>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>

                                          <div class="container mt-5 annotation footer" id="globalFooter">
                                            <div class="toggle-container">
                                              <span class="toggle-button2" data-toggle="collapse" href="#toggleContent3"
                                                >ANNOTATION<span class="line"></span
                                                ><span class="arrow2">&#x2039;</span></span
                                              >
                                              <div class="collapse show" id="toggleContent3">
                                                <div class="toggle-content">
                                                  <div class="input-wrappers ">
                                                    <div class="input-loc inputs">
                                                      <div class="textdiv">MUSEUM OR GALLERY LOCATION</div>
                                                      <textarea name="annotation" rows="3" cols="70" id="text-area"></textarea>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="previwdiv zigzag">
    <div>
       <div  class="btns">PREVIEW</div>
        <div id="preview1" style="float: left; margin-left: 150px;"></div>
    </div>
  </div>
                                          <button
                                            style="border-radius: 12px;"
                                            id="btnform"
                                            type="submit"
                                            class="flex btn btn-primary save-citation-form"
                                          >
                                            <span style="font-size: 20px;">&#10003;&nbsp;</span>Save
                                          </button>
                                        </form>

                                        <!-- from 29 -->
                                        <form action="{{route('Video')}}" method='post' class="cite-form" id="form30">
@csrf
<input type="hidden" name="projectId" value="{{ $projectId }}">

                                            <div class="container mt-5 VIDEOAUTHOR header" id="header31">
                                            <div class="toggle-container">
                                              <span class="toggle-button" data-toggle="collapse" href="#toggleContent2"
                                                >Contribution<span class="line"></span
                                                ><span class="arrow">&#x2039;</span></span
                                              >
                                              <div class="collapse show" id="toggleContent2">
                                                <div class="toggle-content">
                                                  <div class="VIDEOAUTHOR">
                                                    <div class="input-wrappers">
                                                      <div class="textheader">VIDEO AUTHOR:</div>
                                                      <div class="inputs">
                                                        <input type="text" placeholder="First Name" name="firstName"  /><input
                                                          type="text"
                                                          placeholder="Last Name" name="lastName"
                                                        />

                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="container mt-5 VIDEO body" id="body31">
                                            <div class="toggle-container">
                                              <span class="toggle-button1" data-toggle="collapse" href="#toggleContent3"
                                                >Video<span class="line"></span
                                                ><span class="arrow1">&#x2039;</span></span
                                              >
                                              <div class="collapse show" id="toggleContent3">
                                                <div class="toggle-content">
                                                  <div class="input-wrappers">
                                                    <div class="input-title inputs">
                                                      <div class="textdiv">Title of Video</div>
                                                      <input type="text" name="title"/>
                                                    </div>
                                                  </div>
                                                  <div class="input-wrappers">
                                                    <div class="input-date inputs">
                                                      <div class="textdiv">DATE PUBLISHED:</div>
                                                      <input type="date" name="publishedDate " />
                                                    </div>
                                                  </div>
                                                  <div class="input-wrappers">
                                                    <div class="input-medium inputs">
                                                      <div class="textdiv">Publisher</div>
                                                      <input type="text" name="publisher " />
                                                    </div>
                                                  </div>
                                                  <div class="input-wrappers">
                                                    <div class="input-galary inputs">
                                                      <div class="textdiv">Format</div>
                                                      <input type="text" name="format "/>
                                                    </div>
                                                  </div>
                                                  <div class="container mt-5">
                                                    <div class="toggle-container">
                                                      <span
                                                        class="toggle-button3"
                                                        data-toggle="collapse"
                                                        href="#toggleContent4"
                                                        >VIDEO IS ONLINE?<span class="line"></span
                                                        ><span class="arrow3">&#x2039;</span></span
                                                      >
                                                      <div class="collapse show" id="toggleContent4">
                                                        <div class="toggle-content">
                                                          <div class="input-wrappers">
                                                            <div class="input-title inputs">
                                                              <div class="textdiv">URL:</div>
                                                              <input type="text" name="url " />
                                                            </div>
                                                          </div>
                                                          <div class="input-wrappers">
                                                            <div class="input-date inputs">
                                                              <div class="textdiv">
                                                                DATE <br />
                                                                PUBLISHED:
                                                              </div>
                                                              <input type="date" name="viewDate " />
                                                            </div>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>

                                          <div class="container mt-5 annotation footer" id="globalFooter">
                                            <div class="toggle-container">
                                              <span class="toggle-button2" data-toggle="collapse" href="#toggleContent3"
                                                >ANNOTATION<span class="line"></span
                                                ><span class="arrow2">&#x2039;</span></span
                                              >
                                              <div class="collapse show" id="toggleContent3">
                                                <div class="toggle-content">
                                                  <div class="input-wrappers ">
                                                    <div class="input-loc inputs">
                                                      <div class="textdiv">MUSEUM OR GALLERY LOCATION</div>
                                                      <textarea name="annotation" rows="3" cols="70" id="text-area"></textarea>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="previwdiv zigzag">
    <div>
       <div  class="btns">PREVIEW</div>
        <div id="preview1" style="float: left; margin-left: 150px;"></div>
    </div>
  </div>
                                          <button
                                            style="border-radius: 12px;"
                                            id="btnform"
                                            type="submit"
                                            class="flex btn btn-primary save-citation-form"
                                          >
                                            <span style="font-size: 20px;">&#10003;&nbsp;</span>Save
                                          </button>
                                        </form>

                                        <!-- from 30 -->
                                        <form action="{{route('Website')}}" method='post' class="cite-form" id="form32">
                                            @csrf
                                            <input type="hidden" name="projectId" value="{{ $projectId }}">
                                            <div class="container mt-5 WEBPAGEAUTHOR header" id="header32">
                                            <div class="toggle-container">
                                              <span class="toggle-button" data-toggle="collapse" href="#toggleContent2"
                                                >Contribution<span class="line"></span
                                                ><span class="arrow">&#x2039;</span></span
                                              >
                                              <div class="collapse show" id="toggleContent2">
                                                <div class="toggle-content">
                                                  <div class="WEBPAGEAUTHOR">
                                                    <div class="input-wrappers">
                                                      <div class="textheader">WEBPAGE AUTHOR:</div>
                                                      <div class="inputs">
                                                        <input type="text" placeholder="First Name" name="firstName"  /><input
                                                          type="text"
                                                          placeholder="Last Name" name="lastName"
                                                        />

                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>







                                          <div class="container mt-5 WEBSITE body" id="body32">
                                            <div class="toggle-container">
                                              <span class="toggle-button1" data-toggle="collapse" href="#toggleContent6"
                                                >Website<span class="line"></span
                                                ><span class="arrow1">&#x2039;</span></span
                                              >
                                              <div class="collapse show" id="toggleContent6">
                                                <div class="toggle-content">
                                                  <div class="input-wrappers">
                                                    <div class="input-title inputs">
                                                      <div class="textdiv">Title of Website</div>
                                                      <input type="text" name="title"/>
                                                    </div>
                                                  </div>
                                                  <div class="input-wrappers">
                                                    <div class="input-date inputs">
                                                      <div class="textdiv">DATE PUBLISHED:</div>
                                                      <input type="date" name="publishedDate " />
                                                    </div>
                                                  </div>
                                                  <div class="input-wrappers">
                                                    <div class="input-medium inputs">
                                                      <div class="textdiv">Publisher</div>
                                                      <input type="text"  name="publisher "/>
                                                    </div>
                                                  </div>
                                                  <div class="input-wrappers">
                                                    <div class="input-galary inputs">
                                                      <div class="textdiv">Title of Article or Page</div>
                                                      <input type="text"  name="pageTitle "/>
                                                    </div>
                                                  </div>

                                                  <div class="input-wrappers">
                                                    <div class="input-galary inputs">
                                                      <div class="textdiv">URL</div>
                                                      <input type="text" name="url "/>
                                                    </div>
                                                  </div>
                                                  <div class="input-wrappers">
                                                    <div class="input-galary inputs">
                                                      <div class="textdiv">Date Viewed</div>
                                                      <input type="text" name="viewDate " />
                                                    </div>
                                                  </div>
                                                  <div class="container mt-5">
                                                    <div class="toggle-container">
                                                      <span
                                                        class="toggle-button3"
                                                        data-toggle="collapse"
                                                        href="#toggleContent4"
                                                        >WEBSITE IS ONLINE?<span class="line"></span
                                                        ><span class="arrow3">&#x2039;</span></span
                                                      >
                                                      <div class="collapse show" id="toggleContent4">
                                                        <div class="toggle-content">
                                                          <div class="input-wrappers">
                                                            <div class="input-title inputs">
                                                              <div class="textdiv">URL:</div>
                                                              <input type="text" name="url "/>
                                                            </div>
                                                          </div>

                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>











                                          <div class="container mt-5 annotation footer" id="globalFooter">
                                            <div class="toggle-container">
                                              <span class="toggle-button2" data-toggle="collapse" href="#toggleContent3"
                                                >ANNOTATION<span class="line"></span
                                                ><span class="arrow2">&#x2039;</span></span
                                              >
                                              <div class="collapse show" id="toggleContent3">
                                                <div class="toggle-content">
                                                  <div class="input-wrappers ">
                                                    <div class="input-loc inputs">
                                                      <div class="textdiv">MUSEUM OR GALLERY LOCATION</div>
                                                      <textarea name="annotation" rows="3" cols="70" id="text-area"></textarea>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="previwdiv zigzag">
    <div>
       <div  class="btns">PREVIEW</div>
        <div id="preview1" style="float: left; margin-left: 150px;"></div>
    </div>
  </div>
                                          <button
                                            style="border-radius: 12px;"
                                            id="btnform"
                                            type="submit"
                                            class="flex btn btn-primary save-citation-form"
                                          >
                                            <span style="font-size: 20px;">&#10003;&nbsp;</span>Save
                                          </button>
                                        </form>

                                        <!-- from 31 -->
                                        <form action="{{route('Citation')}}" method='post' class="cite-form" id="form31">
                                            @csrf
                                            <input type="hidden" name="projectId" value="{{ $projectId }}">
                                            <div class="container mt-5 CITATION body" id="body33">
                                            <div class="toggle-container">
                                              <span class="toggle-button1" data-toggle="collapse" href="#toggleContent9"
                                                >Citation<span class="line"></span
                                                ><span class="arrow1">&#x2039;</span></span
                                              >
                                              <div class="collapse show" id="toggleContent9">
                                                <div class="toggle-content">
                                                  <div class="input-wrappers">
                                                    <div class="input-title inputs">
                                                      <div class="textdiv">Citation</div>
                                                      <input type="text" name="citation " />
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>

                                          <div class="container mt-5 annotation footer" id="globalFooter">
                                            <div class="toggle-container">
                                              <span class="toggle-button2" data-toggle="collapse" href="#toggleContent3"
                                                >ANNOTATION<span class="line"></span
                                                ><span class="arrow2">&#x2039;</span></span
                                              >
                                              <div class="collapse show" id="toggleContent3">
                                                <div class="toggle-content">
                                                  <div class="input-wrappers ">
                                                    <div class="input-loc inputs">
                                                      <div class="textdiv">MUSEUM OR GALLERY LOCATION</div>
                                                      <textarea name="annotation" rows="3" cols="70" id="text-area"></textarea>
                                                    </div>

                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="previwdiv zigzag">
    <div>
       <div  class="btns">PREVIEW</div>
        <div id="preview1" style="float: left; margin-left: 150px;"></div>
    </div>
  </div>
                                          <button
                                            style="border-radius: 12px;"
                                            id="btnform"
                                            type="submit"
                                            class="flex btn btn-primary save-citation-form"
                                          >
                                            <span style="font-size: 20px;">&#10003;&nbsp;</span>Save
                                          </button>
                                        </form>

                                    </div>
                                </div>
                              </div>
                        </div>


                    </div>
                    <div class="main-center-side-icon" style='display:flex; align-items:center;position:relative;top:-121px;'>
                        {{-- <div class="main-side">
                           <div class="main-side-1" style="opacity:1; display:none;"> <button><svg style="width: 24px; height:24px;" width="800px" height="800px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15.7955 15.8111L21 21M18 10.5C18 14.6421 14.6421 18 10.5 18C6.35786 18 3 14.6421 3 10.5C3 6.35786 6.35786 3 10.5 3C14.6421 3 18 6.35786 18 10.5Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg></button>
                             <input type="text" name="" id="search" placeholder="Search my citation..." />
                            </div>
                            <div  class="main-side-2 side-icon" onclick="showInput()" ><svg style="width: 24px; height:24px;" width="800px" height="800px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15.7955 15.8111L21 21M18 10.5C18 14.6421 14.6421 18 10.5 18C6.35786 18 3 14.6421 3 10.5C3 6.35786 6.35786 3 10.5 3C14.6421 3 18 6.35786 18 10.5Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                        </div> --}}
                        {{-- <div><div class="side-icon share-button"><svg width="800px" height="800px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M6.83333 11.8333C8.44167 11.8333 9.75 10.525 9.75 8.91667C9.75 7.30833 8.44167 6 6.83333 6C5.225 6 3.91667 7.30833 3.91667 8.91667C3.91667 10.525 5.225 11.8333 6.83333 11.8333ZM21 15.3333V12.8333H23.5V11.1667H21V8.66666H19.3333V11.1667H16.8333V12.8333H19.3333V15.3333H21ZM6.83333 13.2917C4.88333 13.2917 1 14.2667 1 16.2083V17.6667H12.6667V16.2083C12.6667 14.2667 8.78333 13.2917 6.83333 13.2917ZM6.83333 14.9583C5.34166 14.9583 3.65 15.5167 2.95 16H10.7167C10.0167 15.5167 8.325 14.9583 6.83333 14.9583ZM8.08333 8.91667C8.08333 8.225 7.525 7.66667 6.83333 7.66667C6.14167 7.66667 5.58333 8.225 5.58333 8.91667C5.58333 9.60833 6.14167 10.1667 6.83333 10.1667C7.525 10.1667 8.08333 9.60833 8.08333 8.91667ZM11 11.8333C12.6083 11.8333 13.9167 10.525 13.9167 8.91667C13.9167 7.30833 12.6083 6 11 6C10.8 6 10.6 6.01667 10.4083 6.05833C11.0417 6.84167 11.4167 7.83333 11.4167 8.91667C11.4167 10 11.025 10.9833 10.3917 11.7667C10.5917 11.8083 10.7917 11.8333 11 11.8333ZM14.3333 16.2083C14.3333 15.075 13.7667 14.1917 12.9333 13.5167C14.8 13.9083 16.8333 14.8 16.8333 16.2083V17.6667H14.3333V16.2083Z" fill="#000000"/>
                            </svg></div>
                        <div>

                        </div>
                    </div> --}}

                </div>




                </div>
            </div>
        </div>




        <div class="import-slide" style="    z-index: 1000">
            <h2>  @lang('lang.import')</h2>
            <img src="images/close.png" alt="close" class="close-btn import-close">
                <div class="text-center">
            <div class="import-card">
                <form action="{{ route('risCitation') }}" method="post" enctype="multipart/form-data"
                id="uploadForm">
                @csrf
                <input type="hidden" name="projectId" value="{{ $projectId }}">




                <input type="file" accept=".ris" name="ris_file" id="ris-file"
                style="inset: 0px; cursor: pointer; opacity: 0; position: absolute;">
                <img src="images/upload-minimalistic-svgrepo-com.svg" alt="" for="ris-file">
                </div>
                <p>.RIS File</p>
              </form>

            </div>

            <div class="text-center">
            <div class="import-card">
                <form action="{{ route('bibCitation') }}" method="post" enctype="multipart/form-data"
                id="uploadBibForm">
                @csrf
                <input type="hidden" name="projectId" value="{{ $projectId }}">
                {{-- <input type="file" name="" id="bib-file"> --}}
                <input type="file" class="form-control-file" id="bib-file" name="bibtex_file"
                    accept=".bib" required       style="inset: 0px; cursor: pointer; opacity: 0; position: absolute;">
                    <img src="images/cloud-download-svgrepo-com.svg" alt=".Bib file">

            </form>
            </div>
            <p>.Bib Text File</p>
            </div>
            <div class="text-center">
            <div class="import-card">
                <form action="{{ route('citationFile') }}" method="post" enctype="multipart/form-data"
                id="uploadRefForm">
                @csrf
                <input type="hidden" name="projectId" value="{{ $projectId }}">

                <input type="file" id="ref-file" name="refFile" style="inset: 0px; cursor: pointer; opacity: 0; position: absolute;">

                <img src="images/cloud-download-svgrepo-com.svg" alt="">
            </form>
            </div>
            <p>Local Backup</p>
            </div>
        </div>

    </main>


    <script>
        // Hide all header and body divs initially
        // document.querySelectorAll('.header, .body').forEach(element => {
        //     element.style.display = 'none';
        // });
        document.querySelectorAll('.cite-form').forEach(element => {
            element.style.display = 'none';
        });

        // Add event listeners to each option div
        document.querySelectorAll('.options').forEach(option => {
            option.addEventListener('click', function() {
                // Hide all header and body divs
                // document.querySelectorAll('.header, .body').forEach(element => {
                //     element.style.display = 'none';
                // });
                document.querySelectorAll('.cite-form').forEach(element => {
                    element.style.display = 'none';
                });

                // Get the selected option
                const selectedOption = this.getAttribute('data-option');
                const optionName = this.textContent; // Get the name of the selected option

                // Show the corresponding header and body divs
                document.getElementById(`form${selectedOption}`).style.display = 'block';
                // document.getElementById(`body${selectedOption}`).style.display = 'block';

                // Show the name of the selected option in the headertitle div
                document.getElementById('headertitle').textContent = optionName;





                const allInputs = document.querySelectorAll(`#form${selectedOption} input, #form${selectedOption} textarea`);
                    const prev = document.querySelector(`#form${selectedOption} #preview1`);
                    // console.log(prev);
                    const size = allInputs.length;
                    for (let i = 0; i < size; i++) {
                       prev.innerHTML += "<span></span>"
                    }
                    allInputs.forEach((item, i)=>{
                        item.addEventListener('change', ()=>{
                           prev.children[i].innerHTML =  item.value + " ";
                        })
                      })
            });
        });




//hide citation button
document.addEventListener("DOMContentLoaded", function() {
    var firstDivContent = document.getElementById('first').innerHTML;
    var hideBtn = document.getElementById('hideData');

    if (firstDivContent.trim() !== '') {
        // If the first div contains data, hide the button
        hideBtn.style.display = 'none';
    }
});



function  searchData1(event) {
    let inputValue =  document.getElementById("inputValue1").value;
    if (inputValue.length > 0 ) {
        if (inputValue.startsWith("http://") ||  inputValue.startsWith("https://")) {
            document.getElementsByClassName("searchDataCite")[0].style = "display: block;" ;
            document.getElementById("httpErr").style = "display: none" ;
        } else {
            document.getElementById("httpErr").style = "display: block" ;
            document.getElementsByClassName("searchDataCite")[0].style = "display: none;" ;
        }

    }else{
        document.getElementById("httpErr").style = "display: none" ;
        document.getElementsByClassName("searchDataCite")[0].style = "display: none;" ;

    }

}


function  searchData2(event) {
    let inputValue =  document.getElementById("inputValue2").value;
    if (inputValue.length > 0 ) {
        document.getElementsByClassName("searchDataCite")[1].style = "display: block;" ;

    }else{
        document.getElementsByClassName("searchDataCite")[1].style = "display: none;" ;


    }
}
function  searchData3(event) {
    let inputValue =  document.getElementById("inputValue3").value;
    if (inputValue.length > 0 ) {
        document.getElementsByClassName("searchDataCite")[2].style = "display: block;" ;

    }else{
        document.getElementsByClassName("searchDataCite")[2].style = "display: none;" ;


    }
}
function  searchData4(event) {
    let inputValue =  document.getElementById("inputValue4").value;
    if (inputValue.length > 0 ) {
        document.getElementsByClassName("searchDataCite")[3].style = "display: block;" ;

    }else{
        document.getElementsByClassName("searchDataCite")[3].style = "display: none;" ;


    }
}

function urlToForm(SelectOption) {
    // document.getElementsByClassName("input-form")[0].style.display = "block";
    // document.querySelectorAll(".cite-form").forEach((element) => {
    //   element.style.display = "none";
    // });

    // const optionName = SelectOption.headTittle; // Get the name of the selected option
    // Show the corresponding header and body divs
    // document.getElementById(`form${SelectOption.option}`).style.display = "block";

    // Show the name of the selected option in the headertitle div
    // document.getElementById("headertitle").textContent = optionName;



    // const allInputs = document.querySelectorAll(
    //   `#form${SelectOption.option} input, #form${SelectOption.option} textarea`
    // );
    // const prev = document.querySelector(`#form${SelectOption.option} #preview1`);
    // console.log(prev);
    // const size = allInputs.length;
    // for (let i = 0; i < size; i++) {
    //   prev.innerHTML += "<span></span>";
    // }
    // allInputs.forEach((item, i) => {
    //   item.addEventListener("change", () => {
    //     prev.children[i].innerHTML = item.value + " ";
    //   });
    // });

  }



    </script>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>

    <script src="{{asset('script.js')}}"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function () {
            //ajax on web page search
                    $('#searchBtn').click(function() {
            // Get the input field value
            $('#preloader').show();
            var inputValue = $('#inputValue1').val();
            var projectId=<?php echo json_encode($projectId); ?>
            // console.log('projectId');
            var csrfToken = $('meta[name="csrf-token"]').attr('content');
            // Perform AJAX request
            $.ajax({
                url: '/search/10',
                type: 'POST',
                data: {
                    _token: csrfToken, // Include the CSRF token in the data
                    url: inputValue,
                    projectId:projectId
                },
                success: function(response) {
                    // Handle the response here
                       $('#preloader').hide();

                    $('#ajaxResponse').html(response);


                },
                error: function(xhr, status, error) {
                    // Handle errors
                    console.error(error);
                }
            });
        });

//ajax response for book
$('#searchBtn1').click(function() {
            // Get the input field value
            $('#preloaderBook').show();
            var inputValue = $('#inputValue2').val();
            var projectId=<?php echo json_encode($projectId); ?>
            // console.log('projectId');
            var csrfToken = $('meta[name="csrf-token"]').attr('content');
            // Perform AJAX request
            $.ajax({
                url: '{{ route("searchBook") }}',
                type: 'POST',
                data: {
                    _token: csrfToken, // Include the CSRF token in the data
                    book: inputValue,
                    projectId:projectId
                },
                success: function(response) {
                    // Handle the response here
                       $('#preloaderBook').hide();
                       $('#ajaxResponse1').html(response);
                    console.log(response);
                },
                error: function(xhr, status, error) {
                    // Handle errors
                    console.error(error);
                }
            });
        });


//ajax for journal
//ajax response for book
$('#searchBtnArticle').click(function() {
            // Get the input field value
            $('#preloaderArticle').show();
            var inputValue = $('#inputValue3').val();
            var projectId=<?php echo json_encode($projectId); ?>
            // console.log('projectId');
            var csrfToken = $('meta[name="csrf-token"]').attr('content');
            // Perform AJAX request
            $.ajax({
                url: '{{ route("searchGoogleScholar") }}',
                type: 'POST',
                data: {
                    _token: csrfToken, // Include the CSRF token in the data
                    article: inputValue,
                    projectId:projectId
                },
                success: function(response) {
                    // Handle the response here
                    $('#preloaderArticle').hide();
                       $('#ajaxResponseArticle').html(response);
                    console.log(response);
                },
                error: function(xhr, status, error) {
                    // Handle errors
                    console.error(error);
                }
            });
        });

        //ajax response for video
$('#searchBtnVideo').click(function() {
            // Get the input field value
            $('#preloaderVideo').show();
            var inputValue = $('#inputValue4').val();
            var projectId=<?php echo json_encode($projectId); ?>
            // console.log('projectId');
            var csrfToken = $('meta[name="csrf-token"]').attr('content');
            // Perform AJAX request
            $.ajax({
                url: '{{ route("video") }}',
                type: 'POST',
                data: {
                    _token: csrfToken, // Include the CSRF token in the data
                    video: inputValue,
                    projectId:projectId
                },
                success: function(response) {
                    // Handle the response here
                       $('#preloaderVideo').hide();
                       $('#videoData').html(response);
                    console.log(response);
                },
                error: function(xhr, status, error) {
                    // Handle errors
                    console.error(error);
                }
            });
        });


            $('.generateCitationBtn').click(function(){
        alert('Please login first to Perform this Task.');
    });

            $('.toggle-button').click(function () {
                $(this).find('.arrow').toggleClass('down');
            });
            $('.toggle-button1').click(function () {
                $(this).find('.arrow1').toggleClass('down');
            });
            $('.toggle-button2').click(function () {
                $(this).find('.arrow2').toggleClass('down');
            });
            $('.toggle-button3').click(function () {
                $(this).find('.arrow3').toggleClass('down');
            });

        });

          // Automatically submit the form when the file input changes
          document.getElementById('ris-file').addEventListener('change', function() {
    document.getElementById('uploadForm').submit();
});

//for bib form
document.getElementById('bib-file').addEventListener('change', function() {
    document.getElementById('uploadBibForm').submit();
});

//for ref form
document.getElementById('ref-file').addEventListener('change', function() {
    document.getElementById('uploadRefForm').submit();
});



// rename functionality
 $('.edit-project-link').on('click', function(e) {
            e.preventDefault();
            var $form = $(this).closest('.rename-form');
            var $projectName = $form.find('.project-name');
            var $projectNameInput = $form.find('.project-name-input');
            var $dropdownMenu = $form.find('.dropdown-menu');
            var $renameBtn = $form.find('.rename-btn');
            var $renameDone = $form.find('#done');


            $projectNameInput.val($projectName.text());
            $projectName.hide();
            $projectNameInput.show();
            $renameDone.show();
            $dropdownMenu.hide();
            $renameBtn.show();
        });

        $('.rename-form').on('submit', function(e) {
            e.preventDefault();
            var $form = $(this);
            var projectId = $form.data('project-id');
            var newName = $form.find('.project-name-input').val();

            $.ajax({
                url: '{{ route("renameProject") }}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    projectId: projectId,
                    newName: newName
                },
                success: function(response) {
                    $form.find('.project-name').text(newName);
                    $form.find('.project-name-input').hide();
                    $form.find('#done').hide();
                    $form.find('.project-name').show();
                },
                error: function(xhr) {
                    console.error(xhr.responseText);
                    alert('Error occurred while renaming the project.');
                }
            });
        });

// ajax for format
$('#publicationDropdown').change(function() {
    // Get selected value
    var selectedValue = $(this).val();
// console.log(selectedValue);
var projectId='<?php echo $projectId; ?>';
    // Call AJAX function
    $.ajax({
        url:'{{route("try")}}', // Replace with your actual URL
        method: 'POST',
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
        data: {
            value: selectedValue,
        projectId: projectId
     }, // Pass selected value as parameter
        success: function(response) {
            // Handle successful response
            $('#first').html(response);
            console.log(response);
        },
        error: function(xhr, status, error) {
            // Handle error
            console.error(error);
        }
    });
});

    </script>




    //jscriipt for tool
    <script>
        function redirectToGrammarly() {
            window.location.href = "index.html#grammarly";
        }

        function redirectToPlagiarism() {
            window.location.href = "index.html#plagiarism";
        }

        function redirectToParaphrasing() {
            window.location.href = "index.html#paraphrasing";
        }
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const paraphrasingLink = document.getElementById("paraphrasingLink");
            const plagiarismLink = document.getElementById("plagiarismLink");
            const grammarlyLink = document.getElementById("GrammarlyLink");

            const paraphrasingContent = document.getElementById("paraphrasingContent");
            const plagiarismContent = document.getElementById("plagiarismContent");
            const grammarlyContent = document.getElementById("grammarlyContent");

            // Function to toggle the display of content divs
            function toggleContent(contentToShow) {
                const allContent = [paraphrasingContent, plagiarismContent, grammarlyContent];
                allContent.forEach(content => {
                    if (content === contentToShow) {
                        content.style.display = "block";
                    } else {
                        content.style.display = "none";
                    }
                });
            }

            // Read the URL fragment to determine which section to display
            const sectionToShow = window.location.hash.substr(1);

            // Adjust the section ID to match the div ID
            const adjustedSectionToShow = sectionToShow + "Content";

            // Toggle the content div based on the section
            if (adjustedSectionToShow === 'grammarlyContent') {
                toggleContent(grammarlyContent);
            } else {
                toggleContent(document.getElementById(adjustedSectionToShow));
            }

            // Event listener for paraphrasing link
            paraphrasingLink.addEventListener("click", function () {
                toggleContent(paraphrasingContent);
                grammarlyContent.style.display = "none"; // Hide Grammarly div
            });

            // Event listener for plagiarism link
            plagiarismLink.addEventListener("click", function () {
                toggleContent(plagiarismContent);
                grammarlyContent.style.display = "none"; // Hide Grammarly div
            });

            // Event listener for Grammarly link
            grammarlyLink.addEventListener("click", function () {
                toggleContent(grammarlyContent);
            });
        });
    </script>

  </body>
</html>
