<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>

    @foreach($results as $index => $book)
<form action="{{route('showBookForm')}}" method='post'>
  @csrf
  <input type="hidden" name="projectId" value="{{$projectId}}">

    <button type="submit" class="mt-3 bg-white" style="border: 0px;"  >
       {{-- <a href="{{route('showBookForm')}}"> --}}
        <div class="p-4 mt-2 shadow bg-light" id='{{$index}}'>
                        <strong>Authors:</strong>

        @foreach($book['Authors'] ?? [] as $author)

                @if(isset($author['firstName']))
                - First Name: {{ $author['firstName'] ?? '' }},
                <input type="hidden" name="firstName" value={{$author['firstName'] ?? ''}}>
                @endif
               @if(isset($author['lastName']))
              - last Name: {{ $author['lastName'] ?? '' }},
              <input type="hidden" name="lastName" value={{$author['lastName'] ?? ''}}>


                @endif
               @endforeach


@if(isset($book['Title']))
<strong>Title:</strong> {{ $book['Title'] }}
<input type="hidden" name="title" value="{{$book['Title']}}">
@endif

@if(isset($book['Publisher']))
<strong>Publisher:</strong> {{ $book['Publisher'] }}
<input type="hidden" name="Publisher" value="{{ $book['Publisher'] }}">

@endif
@if(isset($book['PublishedDate']))
<strong>Pubtdshed Date:</strong> {{ $book['PublishedDate'] }}
<input type="hidden" name="PublishedDate" value="{{ $book['PublishedDate'] }}">

@endif
@if(isset($book['ISBN']))
<strong>ISBN:</strong> {{ $book['ISBN'] }}
<input type="hidden" name="ISBN" value="{{ $book['ISBN'] }}">

@endif
{{-- </a> --}}
</div>

</button>
</form>
        {{-- <table>
            <thead>
        <tbody>
            {{-- <tr> <strong>Book {{ $index + 1 }}:</strong> </tr> --}}
            {{-- <tr> --}}
            {{-- <strong>Authors:</strong>

            @foreach($book['Authors'] ?? [] as $author)

                    @if(isset($author['firstName']))
                    - First Name: {{ $author['firstName'] ?? '' }},
                    @endif
                   @if(isset($author['lastName']))
                  - last Name: {{ $author['lastName'] ?? '' }},
                    @endif
                   @endforeach


@if(isset($book['Title']))
    <strong>Title:</strong> {{ $book['Title'] }}


@endif

@if(isset($book['Pubtdsher']))
    <strong>Pubtdsher:</strong> {{ $book['Pubtdsher'] }}

@endif
@if(isset($book['PubtdshedDate']))
    <strong>Pubtdshed Date:</strong> {{ $book['PubtdshedDate'] }}

@endif
@if(isset($book['ISBN']))
    <strong>ISBN:</strong> {{ $book['ISBN'] }}

@endif --}}

{{-- </tr> --}}
 {{-- </div> --}}
@endforeach












    {{-- @foreach($results as $book)
    <div>
        {{$book['title']}}
    </div>
@endforeach --}}
    {{-- {{$results}} --}}
    {{-- @if(isset($results) )
<div class="container">
    <h2>Book Results</h2>
    @endif
  <h2>hello world </h2> --}}
 <!-- Blade View: bookResult.blade.php -->
{{--
@if(isset($results))
<div class="container">
    <h2>Book Results</h2>
    <ul>
        @foreach($results as $book)

                <strong>Title:</strong> {{ $book['title'] }} <br>
                <strong>Pubtdsher:</strong> {{ $book['pubtdsher'] }} <br>
                <strong>Pubtdshed Date:</strong> {{ $book['pubtdshedDate'] }} <br>
                <strong>ISBN:</strong> {{ $book['isbn'] }} <br>
                <strong>Authors:</strong> <br>
                <ul>
                    @foreach($book['authors'] as $author)
                        First Name: {{ $author['firstName'] }}, Last Name: {{ $author['lastName'] }}

                    @endforeach
                </ul>


        @endforeach
    </ul>
</div>
@else
<p>No books found</p>--}}
{{-- @endif --}}

</body>
</html>
