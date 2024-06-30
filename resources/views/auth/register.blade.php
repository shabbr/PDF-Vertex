{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block w-full mt-1" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block w-full mt-1"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block w-full mt-1"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="text-sm text-gray-600 underline rounded-md dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}











<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register for My Bib Account</title>
    <style>
          /* Resetting default margin and padding */
          * {
              margin: 0;
              padding: 0;
              box-sizing: border-box;
              /* background-color: #DFE3E6; */
              font-family: sans-serif;
            }
            body{
              background-color: #DFE3E6;
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
          a{
            text-decoration: none;
            color: #5A92EF;
          }



          input[type="text"],
          input[type="password"] ,.check-div{
              padding: 16px;
              margin-bottom: 20px;
              border-radius: 5px;
              border: 1px solid #cccccc;
              width: 65%;
              background-color: #ffffff;
          }
          .check-div div{
            margin: 10px 0px;
          }
          .check-div div + div div{
            display: flex;
            align-items: center;
            justify-content: start;
            gap: 10px;
          }

          input[type="radio"] {
            accent-color: #0056b3;
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


          /* Responsive Styles */
          @media only screen and (max-width: 600px) {


              header a span{
                display: none;
              }
              .container {
                  margin: 20px auto;
              }
              .googlebtn button, input[type="text"],
          input[type="password"] ,input[type="submit"],.check-div{
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

      <div>
        Register for
        <img
          src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIj8+PCEtLSBHZW5lcmF0b3I6IEdyYXZpdC5pbyAtLT48c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHN0eWxlPSJpc29sYXRpb246aXNvbGF0ZSIgdmlld0JveD0iMCAwIDYxNyAxMzk2IiB3aWR0aD0iNjE3cHQiIGhlaWdodD0iMTM5NnB0Ij48ZGVmcz48Y2xpcFBhdGggaWQ9Il9jbGlwUGF0aF9HQnlMb1Q2YjhiMmtRSGZRSTNFcnJaU1JKa2VMSExNbCI+PHJlY3Qgd2lkdGg9IjYxNyIgaGVpZ2h0PSIxMzk2Ii8+PC9jbGlwUGF0aD48L2RlZnM+PGcgY2xpcC1wYXRoPSJ1cmwoI19jbGlwUGF0aF9HQnlMb1Q2YjhiMmtRSGZRSTNFcnJaU1JKa2VMSExNbCkiPjxwYXRoIGQ9IiBNIDAuMDMyIDEzOTIuNjU0IEwgMjczLjE3NSAxMDIxIEwgNTUxLjU5OCAxMzkyLjY1NCBMIDU1MS44MzEgMjM0LjIzNCBDIDU1MS44MzEgMTUwLjQyNyA1NDguODIgMjEuMDQ4IDYxNC4yMTQgMCBMIDYyLjQgMCBDIDU5LjczIDEuMjE4IDU3LjE3NCAyLjYwMiA1NC43MjcgNC4xNDMgQyAyIDIzIDAgMTQ3LjkyMyAwIDIzNC4yIEwgMC4wMzIgMTM5Mi42NTQgTCAwLjAzMiAxMzkyLjY1NCBaICIgZmlsbD0iIzQyODVmNCIvPjwvZz48L3N2Zz4="
          alt="PDFVertex"
          style="width: 30px; position: absolute; top: 0%;"
        />
        <span style="margin-left: 38px;"> PDFVertex</span>
      </div>
    </header>
    <div class="container">
      <img
        src="images/login.svg"
        alt="Your Image"
        style="display: block; margin: 0 auto; width:60%;"
      />

      <a href="{{ url('auth/google') }}">
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
      </a>
      <div
        style="display: flex;  align-items: center; justify-content: center;"
      >
        <hr style="width: 30%;" />
        <p style="padding: 0 15px;">or</p>
        <hr style="width: 30%;" />
      </div>

      <form method="POST" action="{{ route('register') }}">
        @csrf
        <input  type="text" name="name"   placeholder='Enter Your Name'  value="{{old('name')}}" required autofocus autocomplete="name" />
        <x-input-error :messages="$errors->get('name')" class="mt-2" />
        <input
          type="text"
          id="username"
          name="email"
          value="{{old('email')}}"
          required
          placeholder="Your email address"
        />
        <x-input-error :messages="$errors->get('email')" class="mt-2" />

        <input
          type="password"
          id="password"
          name="password"
          required
          placeholder="Choose a Password"
        />
        <input  type="password"
        name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password" />
        <div class="check-div">
          <div>I AM A...</div>
          <div>
           <div> <input
              type="radio"
              name="user_type"
              id="student"
              value="student"
            />

            <label for="Student"> Student</label></div>
           <div> <input
              type="radio"
              name="user_type"
              id="teacher"
              value="teacher"
            /><label for="teacher"> Teacher, librarian, or educator</label></div>
           <div><input type="radio" name="user_type" id="ohter" value="other" />
            <label for="ohter">Other</label></div>
          </div>
        </div>

        <input type="submit" value="Create an account" />

        <p style="margin-top: 20px; text-align: center;">
          Already have an account? <a href="/login"> Log in.</a>
        </p>
      </form>
    </div>
  </body>
</html>

