<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>
</head>
<body>
    <h2>{{ $blogPost->title }}</h2>
    <p>{{ $blogPost->subject }}</p>
    @if ($blogPost->media_type === 'image/jpeg' || $blogPost->media_type === 'image/png')
        <img src="{{ asset("storage/{$blogPost->media_path}") }}" alt="Blog Post Media">
    @elseif($blogPost->media_type === 'video/mp4' || $blogPost->media_type === 'video/ogg' || $blogPost->media_type === 'video/webm'  || $blogPost->media_type === 'video/quicktime')
    <video width="520" height="440" controls>
        <source src="{{ asset("storage/{$blogPost->media_path}") }}" type="{{ $blogPost->media_type }}">
        Your browser does not support the video tag.
    </video>

    @endif
    <p>{{ $blogPost->message }}</p>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
