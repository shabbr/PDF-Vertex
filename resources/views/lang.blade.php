<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>My Blog</title>
  <!-- Add this script in your HTML -->
  <script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

  <style>
  </style>
</head>
<body>
  <p>
    Materialize is a popular framework that comes with its own set of UI components, including tooltips. Its tooltips are simple, lightweight, and easy to use, and they come with a range of customization options such as position, delay, and HTML content.

    Materialize tooltips can be easily integrated with other Materialize components such as buttons and icons. They also support mobile touch events. You can create these tooltips by using simple HTML data attributes or through JavaScript initialization.
  </p>

  <!-- Button to change language and trigger translation -->
  <button onclick="translatePage()">Translate Page</button>

  <!-- Container for Google Translate -->
  <div id="google_translate_element"></div>

  <!-- Select element with options -->


  <script type="text/javascript">
    function googleTranslateElementInit(e) {
      console.log(google.translate.TranslateElement.children);
      console.log(e.children);
      console.log(document.getElementById("google_translate_element")); // Outputs an
      new google.translate.TranslateElement({
        pageLanguage: 'en',
       
        // layout: google.translate.TranslateElement.InlineLayout.SIMPLE,
      }, 'google_translate_element');
    }

    function translatePage() {
  
      googleTranslateElementInit();
    }
  </script>
 
</body>
</html>
