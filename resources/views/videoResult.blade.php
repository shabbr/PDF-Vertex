<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        body {
            display: flex;

            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        .card-container {
            margin-top: 10%;


        }
        .highlighted {
        background-color: yellow; /* Set the background color */
    }
    </style>

</head>

<body>
    <div class="card-container">
        <div class="mb-3 card bg-light" style="max-width: 30rem;">
            <div class="card-header"> Citation</div>
            <div class="card-body">

                <p class="card-text">

@if(isset($videoArray))
<b>Title: </b>{{ $videoArray['title'] }}
<b> URL: </b>  <span class="highlighted"> {{ $videoArray['url'] }}</span>
<b>Channel Title:</b> {{ $videoArray['channelTitle'] }}
<b>Platform:</b> {{ $videoArray['plateform'] }}

<b>Published Date:</b> {{ $videoArray['publishedYear'] }}-{{ $videoArray['publishedMonth'] }}-{{ $videoArray['publishedDay'] }}
</p>
{{-- {{ $videoArray['projectId'] }} --}}
<form action="{{route('showVideoForm',['projectId'=>$videoArray['projectId']])}}" method="post" >
@csrf
<input type="hidden" name="results" value="{{ json_encode($videoArray) }}" >
<input type="submit" class="btn btn-primary">
</form>
@elseif(isset($data))
<b>Title:</b> {{$data['url']}}
<b>url:</b>{{$data['plateform']}}
<form action="{{route('showVideoForm',['projectId'=>$data['projectId']])}}" method="post" >
    @csrf
    <input type="hidden" name="results" value="{{ json_encode($data) }}" >
    <input type="submit" class="btn btn-primary">
    </form>
@endif
                    {{-- @if(isset($data))
                   <b> URL: </b>  <span class="highlighted"> {{ $data['url'] }}</span>{{','}}
                  <b>  Platform: </b> {{ $data['plateform'] }}</p>
                  <form action="{{route('showVideoForm', ['projectId' => $data['plateform']])}}" method="post" >
                    @csrf
                    <input type="hidden" name="results" >
                    <input type="submit" class="btn btn-primary">
                </form>


</p>



@elseif(isset($videoArray))
    <b>Title: </b>{{ $videoArray['title'] }}
    <b> URL: </b>  <span class="highlighted"> {{ $videoArray['url'] }}</span>
    <b>Channel Title:</b> {{ $videoArray['channelTitle'] }}
    <b>Published Date:</b> {{ $videoArray['publishedYear'] }}-{{ $videoArray['publishedMonth'] }}-{{ $videoArray['publishedDay'] }}
   </p>

   <form action="{{route('showVideoForm', ['projectId' => $videoArray['projectId']])}}" method="post" >
    @csrf
    <input type="hidden" name="results" >
    <input type="submit" class="btn btn-primary">
</form>
@else
    <p>No video data available</p>
@endif --}}
</p>



</div>
</div>
</div>
</div>

</body>

</html>
