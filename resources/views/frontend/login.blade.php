<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login Page</title>
    <style>
          /* Resetting default margin and padding */
          * {
              margin: 0;
              padding: 0;
              box-sizing: border-box;
              background-color: #DFE3E6;
              font-family: sans-serif;
          }

          /* Header Styles */
          header {
              background-color: #ffffff;
              padding: 15px;
              display: flex;
              flex-wrap: nowrap;
              justify-content: center;
              align-items: center;

          }

          header div {
              font-size: 1.5rem;
              background: none;
          }
          header div span, header a span{
            background: none;
          }
          header a {
              text-decoration: none;
              background: none;
              position: absolute;
              top: 18px;
              left: 0%;
              height: 20px;
              display: flex;

              /* color: black; */
          }

          header img {

              width: 16px;
              margin-right: 10px;
              background: none;
          }

          /* Main Content Styles */
          .container {
              max-width: 600px;
              margin: 10px auto;
              padding:0px 35px;
              border: 1px solid #dddddd;
              border-radius: 5px;
              text-align: center;
          }
          /* googlebtn */
          .googlebtn{
              text-align: center; display: flex; width: 100%;
              justify-content: center;
          }
          .googlebtn button{
              width: 60%;
          }

          /* Form Styles */
          form {
              display: flex;
              text-align: left;
              justify-content: center;
              flex-direction: column;
              align-items: center;
          }

          label {
              margin-bottom: 10px;
              display: block;
          }

          input[type="text"],
          input[type="password"] {
              padding: 16px;
              margin-bottom: 20px;
              border-radius: 5px;
              border: 1px solid #cccccc;
              width: 65%;
              /* margin-left: 75px; */
              background-color: #ffffff;
          }

          input[type="submit"] {
              padding: 12px 20px;
              background-color: #34A853;
              color: white;
              border: none;
              border-radius: 5px;
              cursor: pointer;
              width: 65%;
          }

          input[type="submit"]:hover {
              background-color: #0056b3;
          }

          hr {
              margin: 20px 0;
          }
          a{
            text-decoration: none;
            color: #5A92EF;
          }

          /* Responsive Styles */
          @media only screen and (max-width: 600px) {


              header a span{
                display: none;
              }
              .container {
                  margin: 20px auto;
              }
              .googlebtn button, input[type="text"],
          input[type="password"] ,input[type="submit"]{
              width: 100%;
          }


          }
          .googlebtn  button img{
              width: 50%;
              height: auto;
          }
    </style>
  </head>
  <body>
    <header>
      <a href="index.html" style="margin-left: 10px;"
        ><img src="./images/icons8-arrow-back-24 (1).png" alt="Back" />
        <span>Home</span></a
      >
      <div>
        Login to
        <img
          src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIj8+PCEtLSBHZW5lcmF0b3I6IEdyYXZpdC5pbyAtLT48c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHN0eWxlPSJpc29sYXRpb246aXNvbGF0ZSIgdmlld0JveD0iMCAwIDYxNyAxMzk2IiB3aWR0aD0iNjE3cHQiIGhlaWdodD0iMTM5NnB0Ij48ZGVmcz48Y2xpcFBhdGggaWQ9Il9jbGlwUGF0aF9HQnlMb1Q2YjhiMmtRSGZRSTNFcnJaU1JKa2VMSExNbCI+PHJlY3Qgd2lkdGg9IjYxNyIgaGVpZ2h0PSIxMzk2Ii8+PC9jbGlwUGF0aD48L2RlZnM+PGcgY2xpcC1wYXRoPSJ1cmwoI19jbGlwUGF0aF9HQnlMb1Q2YjhiMmtRSGZRSTNFcnJaU1JKa2VMSExNbCkiPjxwYXRoIGQ9IiBNIDAuMDMyIDEzOTIuNjU0IEwgMjczLjE3NSAxMDIxIEwgNTUxLjU5OCAxMzkyLjY1NCBMIDU1MS44MzEgMjM0LjIzNCBDIDU1MS44MzEgMTUwLjQyNyA1NDguODIgMjEuMDQ4IDYxNC4yMTQgMCBMIDYyLjQgMCBDIDU5LjczIDEuMjE4IDU3LjE3NCAyLjYwMiA1NC43MjcgNC4xNDMgQyAyIDIzIDAgMTQ3LjkyMyAwIDIzNC4yIEwgMC4wMzIgMTM5Mi42NTQgTCAwLjAzMiAxMzkyLjY1NCBaICIgZmlsbD0iIzQyODVmNCIvPjwvZz48L3N2Zz4="
          alt="MYbib"
          style="width: 30px; position: absolute; top: 0%;"
        />
        <span style="margin-left: 38px;"> My Bib</span>
      </div>
    </header>
    <div class="container">
      <img
        src="images/login.svg"
        alt="Your Image"
        style="display: block; margin: 0 auto; width:60%;"
      />

      <div class="googlebtn">
        <div
          style="background-color: white;padding: 11px; align-items: center; border: 1px solid #4285F4; "
        >
          <img
            src="images/google-removebg-preview.png"
            alt="Google"
            style="height: 20px; vertical-align: middle; margin-right: 10px;"
          />
        </div>
        <button
          style="background-color: #4285F4; color: white; border: none; padding: 2px 60px; cursor: pointer;"
        >
          Login with Google
        </button>
      </div>
      <div
        style="display: flex;  align-items: center; justify-content: center;"
      >
        <hr style="width: 30%;" />
        <p style="padding: 0 15px;">or</p>
        <hr style="width: 30%;" />
      </div>

      <form action="#">
        <input
          type="text"
          id="username"
          name="username"
          required
          placeholder="Your email address"
        />

        <input
          type="password"
          id="password"
          name="password"
          required
          placeholder="Your Password"
        />

        <input type="submit" value="Login" />

        <p style="margin-top: 20px; text-align: center;">
          Forgotten your password? Reset it <a href="#">here</a>.
        </p>
        <p style="margin-top: 20px; text-align: center;">
          New to MyBib? Create an account <a href="./signIn.html">here</a>.
        </p>
      </form>
    </div>
  </body>
</html>
