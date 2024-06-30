<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terms</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
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
            background: url(./images/bg/headerbg.jpg);
            color: white;
            padding: 5px;
            margin-top: 80px;
            height: 200px;

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
    </style>
</head>
<body>
    <div class="bg-img"></div>
    <!-- <div></div> -->
    <header class="head">
        <div class="div1">
            <div><a href="{{route('home')}}" style="color: #fff; text-decoration: none;" >Home</a>> <span>Terms</span></div>
            <a href="{{route('home')}}"  style="filter:brightness(0) invert(1);"><img src="./images/close.png" alt="close" width="10"></a>
        </div>
        <div class="div2">
            TERMS
        </div>
    </header>
    <main>
        <div>Effective date: <span> July 17, 2018 </span></div>
        <h2>MyBib Terms of Service</h2>

        <div class="terms">
            <div class="termspart">
                <h3>1. Terms</h3>
                    <p>By accessing the website at https://www.mybib.com, you are agreeing to be bound by these terms of service, all applicable laws and regulations, and agree that you are responsible for compliance with any applicable local laws. If you do not agree with any of these terms, you are prohibited from using or accessing this site. The materials contained in this website are protected by applicable copyright and trademark law.</p>
                    </div>
                    <div  class="termspart">
                        <h3>2. Use License</h3>
                        <p>
                            <ol style="list-style: lower-alpha;">
                                <li>Permission is granted to temporarily download one copy of the materials (information or software) on MyBib's website for personal, non-commercial transitory viewing only. This is the grant of a license, not a transfer of title, and under this license you may not:
                                    <ol>
                                        <li>modify or copy the materials;</li>
                                        <li> use the materials for any commercial purpose, or for any public display (commercial or non-commercial);</li>
                                        <li> attempt to decompile or reverse engineer any software contained on MyBib's website;</li>
                                        <li>remove any copyright or other proprietary notations from the materials; or</li>
                                        <li>transfer the materials to another person or "mirror" the materials on any other server.</li>
                                    </ol>
                                </li>
                                <li>This license shall automatically terminate if you violate any of these restrictions and may be terminated by MyBib at any time. Upon terminating your viewing of these materials or upon the termination of this license, you must destroy any downloaded materials in your possession whether in electronic or printed format.</li>
                            </ol>
                        </p>
                    </li>
                </ul>
            </div>
            <div  class="termspart">
              <h3> 3. Disclaimer </h3>
              <ol style="list-style: lower-alpha;">
                  <li>The materials on MyBib's website are provided on an 'as is' basis. MyBib makes no warranties, expressed or implied, and hereby disclaims and negates all other warranties including, without limitation, implied warranties or conditions of merchantability, fitness for a particular purpose, or non-infringement of intellectual property or other violation of rights.</li>
                  <li>Further, MyBib does not warrant or make any representations concerning the accuracy, likely results, or reliability of the use of the materials on its website or otherwise relating to such materials or on any sites linked to this site.</li>
            </ol>


            </div>
            <div>
              <h3>  4. Limitations</h3>
         In no event shall MyBib or its suppliers be liable for any damages (including, without limitation, damages for loss of data or profit, or due to business interruption) arising out of the use or inability to use the materials on MyBib's website, even if MyBib or a MyBib authorized representative has been notified orally or in writing of the possibility of such damage. Because some jurisdictions do not allow limitations on implied warranties, or limitations of liability for consequential or incidental damages, these limitations may not apply to you.
            </div>
        </div>
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
                    <li><a href="#"> Start your bibliography</a> </li>
                    <li><a href="#"> Create a free account </a> </li>
                    <li><a href="#">Login </a> </li>
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
