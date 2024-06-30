<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        *{
            box-sizing: border-box;
            font-family: sans-serif;
        }
        body{
            padding: 0;
            margin: 0;
        }
        main, header{
            width: 80%;
            background-color:#fff;
            margin: auto;
        }
        header{
            color: blue;
            padding: 5px;
            margin-top: 20px;
            height: 100px;

        }
        header .div1{

            display: flex;
            justify-content: space-between;
        }
        header .div2{
            text-align: center;
            font-size: 54px;
            font-weight: 600;
            padding: 50px 0;

        }

        .bg-img{
            background:url(./images/bg/bg.png) no-repeat ;
            background-size: 100% 100%;
            width: 100%;
            height: 700px;
            position: absolute;
            z-index: -1;
            filter: brightness(65%) invert(0);
            top: 0%;
        }
        main{
            padding:5px 60px;
        }
        main h2{
            font-weight: normal;
            padding: 30px 0;
        }
        footer{
            margin-top: 12px;
            background-color: #2C3E50;
        }
        footer .mainfooter{
            width: 70%;
            color: white;
            display: flex;
            flex-direction: column;
            margin: 0 auto;
        }
        .footercard{
            display: flex;
            justify-content: space-between;
        }
        .card{
            margin: 25px 0px;
            background-color:#233240 ;
            width: 32%;
            height: 400px;
        }
        .card ul li{
            list-style-type: none;
        }
        .card ul li a{
            text-decoration: none;
            color: white;
        }
.fa {
  padding: 10px;
  font-size: 20px;
  width: 40px;
  border-radius: 50%;
  text-align: center;
  text-decoration: none;
  margin: 5px 2px;
}

.fa:hover {
    opacity: 0.7;
}

.fa-facebook {
  background: #3B5998;
  color: white;
}

.fa-twitter {
  background: #55ACEE;
  color: white;
}
.blogpost{
    width: 38%;
    margin: auto;
    box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
}
.blogpost img{
    width: 100%;
}
.mainContent{
    margin: 0 auto;
    text-align: center;
    align-items: center;
    padding-bottom: 40px;
}
.main-container{
    display: flex;
    width: 70%;
    margin: 0 auto;
    background-color: #F4F6F8;
}
.first-div{
    width: 40%;
}
.first-div h4{
    margin: 0px 30px;
}
.first-div img{
   width: 100px;
   height: auto;
   margin-left: 30px;
   border-radius: 50%;
}
.main-container1 {
    width: 70%;
    margin: 0 auto;
    display: flex;
    justify-content: space-between;
}

.card1 {
    width: 32%;
    background-color: #f0f0f0;
    border-radius: 8px;
    padding: 20px;
    box-sizing: border-box;
    overflow: hidden; /* Ensure images don't overflow */
}

.card1 img {
    width: 100%; /* Ensure the image takes the full width of the container */
    height: auto; /* Maintain aspect ratio */
    display: block; /* Fix image alignment issues */
    border-radius: 8px;
    object-fit: cover; /* Cover the container with the image */
}

.card1 h4 {
    margin-top: 10px;
}

.posted-date {
    font-style: italic;
    color: #666;
    margin-bottom: 10px;
}


    </style>
</head>
<body>
    <div class="bg-img"></div>
    <!-- <div></div> -->

    <header class="head">
        <div class="div1">
            <div><a href="{{route('home')}}" style="color: blue; text-decoration: none;" >Home</a> > <span>Terms</span> > <span>
                {{$blogPost->subject}}:{{$blogPost->title}}</span>

              </div>
              <a href="{{route('home')}}"  style="float: right;"><img src="{{asset('images/close.png')}}" alt="close" width="20"></a>
          </div>
    </header>
    <main>
          <div class="mainContent" >
            <h2>{{$blogPost->subject}}:{{$blogPost->title}}</h2>
            <p>Posted on {{ strftime('%B %d, %Y', strtotime($blogPost->created_at)) }}
                by {{$blogPost->user_name}} · 1 min read</p>
            <div style="margin-bottom:20px;">
                <a href="#" class="fa fa-facebook"></a>
                <a href="#" class="fa fa-twitter"></a>
            </div>
            {{$blogPost->media_path}}
            <div class="blogpost">
                @if ($blogPost->media_type === 'image/jpeg' || $blogPost->media_type === 'image/png')
                <img src="{{ asset("storage/{$blogPost->media_path}") }}" alt="Blog Post Media">
            @elseif($blogPost->media_type === 'video/mp4' || $blogPost->media_type === 'video/ogg' || $blogPost->media_type === 'video/webm'  || $blogPost->media_type === 'video/quicktime')
            <video width="520" height="440" controls>
                <source src="{{ asset("storage/{$blogPost->media_path}") }}" type="{{ $blogPost->media_type }}">
                Your browser does not support the video tag.
            </video>

            @endif
            </div>

        </div>
        <div style="width: 70%; margin: auto; ">
        <p> {{$blogPost->message}} </p>

            </div>
            <br><br>
            <div class="main-container">
                <div class="first-div col-1">
                    <h4>About author</h4>
                    <img src="{{ asset("storage/{$blogPost->author_image}") }}" alt="Image" class="circle-img">
                </div>
                <div class="second-div">
                    <h2>Author Detail</h2>
                    <p>{{$blogPost->author_description}}</p>
                </div>
            </div>
         {{--   <div style="width: 70%; margin: auto; padding-top:50px ;">
            <h3>You might like...</h3>
           </div>
           <div class="main-container1">
            <div class="card1">
                <img src="images/apa-7th-edition.jpg" alt="Image 1">
                <h5>🥳 New Style: APA 7th edition is here! </h5>
                <p class="posted-date">Posted January 20, 2020</p>

            </div>
            <div class="card1">
                <img src="images/apa-7th-edition.jpg" alt="Image 2">
                <h5>🥳 New Style: APA 7th edition is here! </h5>
                <p class="posted-date">Posted February 15, 2020</p>

            </div>
            <div class="card1">
                <img src="images/mla-9th-edition.png" alt="Image 3">
                <h5>👀 MLA 9th Edition: Get Ready!</h5>
                <p class="posted-date">Posted March 10, 2020</p>
            </div>
        </div> --}}


        <a href="{{route('home')}}" style="display: flex;justify-content: center; align-items: center; margin-top: 20px;">
        <button  type="button" class="btn btn-primary">Generate your Biblography for free</button></a>
    </main>
    <footer>
   <div class="mainfooter">
    <div class="subfooter footercard" >
          <div class="card">
             <div style="display: flex; padding: 10px;">
                <h4>🤖 MyBib</h4>
            </div>
            <div>
                <ul>
                    <li><a href="{{route('home')}}"> Start your bibliography</a> </li>
                    <li><a href="{{url('register')}}"> Create a free account </a> </li>
                    <li><a href="{{url('login')}}">Login </a> </li>
                </ul>
            </div>
          </div>
          <div class="card">
            <div style="display: flex; padding: 10px;">
               <h4>🛠️ Tools</h4>
           </div>
           <div>
               <ul>
                   <li><a href="#"> AMA Citation Generator</a> </li>
                   <li><a href="#">APA Citation Generator</a> </li>
                   <li><a href="#">Chicago Citation Generator </a> </li>
                   <li><a href="#">Chicago Citation Generator </a> </li>
                   <li><a href="#">CSE Citation Generator </a> </li>
                   <li><a href="#">Harvard Referencing Generator </a> </li>
                   <li><a href="#">IEEE Citation Generator </a> </li>
                   <li><a href="#">MLA Citation Generator </a> </li>
                   <li><a href="#">Turabian Citation Generator </a> </li>
                   <li><a href="#">Vancouver Citation Generator</a> </li>
                   <li><a href="#">Works Cited Generator </a> </li>
               </ul>
           </div>
         </div>
         <div class="card">
            <div style="display: flex; padding: 10px;">
               <h4> 📚 Guides </h4>
           </div>
           <div>
               <ul>
                   <li><a href="#">APA Format Guide</a> </li>

               </ul>
           </div>
         </div>
    </div>
    <div class="subfooter" style="background-color: #233240; padding: 20PX;">
            <h4>🙋 Recent <a href="#">bibliography questions answered</a></h4>

            <div style="display: flex; padding:6px 20px;" >
                <div>🙋</div>
                <div style="padding-left: 25px;">
                    <p>Lorem ipsum dolor sit amet!Lorem ipsum dolor sit amet! <br> Lorem ipsum dolor sit.</p>
                </div>
            </div>
            <div style="display: flex; padding:6px 20px;" >
                <div>🙋</div>
                <div style="padding-left: 25px;">
                    <p>Lorem ipsum dolor sit amet!Lorem ipsum dolor sit amet! <br> Lorem ipsum dolor sit.</p>
                </div>
            </div>
            <div style="display: flex; padding:6px 20px;" >
                <div>🙋</div>
                <div style="padding-left: 25px;">
                    <p>Lorem ipsum dolor sit amet!Lorem ipsum dolor sit amet! <br> Lorem ipsum dolor sit.</p>
                </div>
            </div>
    </div>
    <div class="subfooter"  style="background-color: #233240; padding: 20PX; margin-top: 20px;">
        <h4> 💭 Latest  <a href="#">Myblog.post</a></h4>

        <div style="display: flex; padding:6px 20px;" >
            <div style="padding-left: 25px;">
                <p>🥳 New Style: We're ready for MLA 9!</p>
                <p>Lorem ipsum dolor sit amet!Lorem ipsum dolor sit amet!</div>
        </div>
    </div>
   </div>
   <div style="background-color: #233240; padding: 15px; margin-top: 20px; color: white;" >
    <p style="text-align: center;">@ All terms and condition received by <span style="color: rgb(0, 225, 255);">Hiskytech.com</span> </p>

   </div>
    </footer>
</body>
</html>
