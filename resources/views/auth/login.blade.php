{{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block w-full mt-1"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="text-indigo-600 border-gray-300 rounded shadow-sm dark:bg-gray-900 dark:border-gray-700 focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="text-sm text-gray-600 ms-2 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="text-sm text-gray-600 underline rounded-md dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}











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
          #red{
            color:red;
            margin-bottom:5%;
          }
    </style>
  </head>
  <body>
    <header>

      <div>
        Login to
        <img
          src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIj8+PCEtLSBHZW5lcmF0b3I6IEdyYXZpdC5pbyAtLT48c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHN0eWxlPSJpc29sYXRpb246aXNvbGF0ZSIgdmlld0JveD0iMCAwIDYxNyAxMzk2IiB3aWR0aD0iNjE3cHQiIGhlaWdodD0iMTM5NnB0Ij48ZGVmcz48Y2xpcFBhdGggaWQ9Il9jbGlwUGF0aF9HQnlMb1Q2YjhiMmtRSGZRSTNFcnJaU1JKa2VMSExNbCI+PHJlY3Qgd2lkdGg9IjYxNyIgaGVpZ2h0PSIxMzk2Ii8+PC9jbGlwUGF0aD48L2RlZnM+PGcgY2xpcC1wYXRoPSJ1cmwoI19jbGlwUGF0aF9HQnlMb1Q2YjhiMmtRSGZRSTNFcnJaU1JKa2VMSExNbCkiPjxwYXRoIGQ9IiBNIDAuMDMyIDEzOTIuNjU0IEwgMjczLjE3NSAxMDIxIEwgNTUxLjU5OCAxMzkyLjY1NCBMIDU1MS44MzEgMjM0LjIzNCBDIDU1MS44MzEgMTUwLjQyNyA1NDguODIgMjEuMDQ4IDYxNC4yMTQgMCBMIDYyLjQgMCBDIDU5LjczIDEuMjE4IDU3LjE3NCAyLjYwMiA1NC43MjcgNC4xNDMgQyAyIDIzIDAgMTQ3LjkyMyAwIDIzNC4yIEwgMC4wMzIgMTM5Mi42NTQgTCAwLjAzMiAxMzkyLjY1NCBaICIgZmlsbD0iIzQyODVmNCIvPjwvZz48L3N2Zz4="
          alt="PDFVertex"
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

      <form method="POST" action="{{ route('login') }}">
        @csrf
        <input
          type="text"
          id="username "
          name="email"
          required
          placeholder="Your email address"
           />

        <x-input-error :messages="$errors->get('email')"  class='text-danger'    />

        <input
          type="password"
          id="password"
          name="password"
          required
          placeholder="Your Password"
        />
        <x-input-error :messages="$errors->get('password')" class='text-danger'/>

        <input type="submit" value="Login" />


        <div class="flex items-center justify-end mt-4" style=" margin-top:5%;">

            <p style=" text-align: center;">
                New to PDFVertex? Create an account <a href="/register">here</a>.
              </p>
              @if (Route::has('password.request'))
              <a  href="{{ route('password.request') }}" style="text-align:center">
                  {{ __('Forgot your password?') }}
              </a>
          @endif
        </div>
      </form>
    </div>
  </body>
</html>






