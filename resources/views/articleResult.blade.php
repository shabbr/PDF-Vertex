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
@isset($results)
@foreach($results as $citation)
<form action="{{route('showArticleForm')}}" method='post'>
    @csrf
    {{-- {{ $citation['publishedDate'] }} --}}
      <button type="submit" class="mt-3 bg-white" style="border: 0px;"  > <div class="p-5 mt-2 shadow citation bg-light">
        @if (!empty($citation['publishedDate']))
    <strong>Publication Date: </strong>{{ $citation['publishedDate'] }}
<input type="hidden" name="publishedDate" value="{{ $citation['publishedDate'] }}">

</span>
@endif
@if (!empty($citation['articleTitle']))
    <strong>Article Title:</strong> {{ $citation['articleTitle'] }}
@endif

@if (!empty($citation['journalName']))
    <strong>Journal Name:</strong> {{ $citation['journalName'] }}
@endif

@if (!empty($citation['volumeNumber']))
    <strong>Volume Number:</strong> {{ $citation['volumeNumber'] }}
@endif

@if (!empty($citation['issueNumber']))
    <strong>Issue Number:</strong> {{ $citation['issueNumber'] }}
@endif

@if (!empty($citation['pageRange']))
    <strong>Page Range:</strong> {{ $citation['pageRange'] }}
@endif

@if (!empty($citation['doi']))
    <strong>DOI:</strong> {{ $citation['doi'] }}
@endif

@if (!empty($citation['url']))
    <strong>URL:</strong> <a href="{{ $citation['url'] }}">{{ $citation['url'] }}</a>
@endif
<input type="hidden" name="projectId" value="{{$projectId}}">
<input type="hidden" name="articleTitle" value="{{ $citation['articleTitle'] }}">
<input type="hidden" name="journalName" value="{{ $citation['journalName'] }}">
<input type="hidden" name="volumeNumber" value="{{ $citation['volumeNumber'] }}">
<input type="hidden" name="issueNumber" value="{{ $citation['issueNumber'] }}">
<input type="hidden" name="pageRange" value="{{ $citation['pageRange'] }}">
<input type="hidden" name="doi" value="{{ $citation['doi'] }}">
<input type="hidden" name="articleTitle" value="{{ $citation['articleTitle'] }}">
<input type="hidden" name="url" value="{{ $citation['url'] }}">
{{-- <input type="hidden" name="publishedDate" value="{{ $citation['publishedDate'] }}"> --}}

    </div>
</button>
</form>
@endforeach
@endisset

</body>
</html>
