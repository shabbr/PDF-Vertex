<!DOCTYPE html>
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
    </style>

</head>

<body>

    <div class="card-container">
        <div class="mb-3 card bg-light" style="max-width: 30rem;">
            <div class="card-header">Citation</div>
            <div class="card-body">

                <p class="card-text">
                    @isset($results)
                    <table>
                        <thead>

                        </thead>
                        <tbody>
                            @foreach ($results as $result)
                                <tr> <span id="formData">
                                    {{ isset($result['pagemap']['metatags'][0]['og:title']) ? $result['pagemap']['metatags'][0]['og:title'] : 'N/A' }} <br>
                                    <strong>Author(s):</strong>
                                    {{ $result['pagemap']['metatags'][0]['og:title'] ?? 'N/A' }} <br>
                                    <strong>ISBN Number:</strong>
                                    {{ isset($result['pagemap']['metatags'][0]['isbn']) ? $result['pagemap']['metatags'][0]['isbn'] : 'N/A' }} <br>

                                    <strong>Year:</strong>
                                    {{ $result['pagemap']['metatags'][0]['og:article:published_time'] ??
                                        ($result['pagemap']['metatags'][0]['article:published_time'] ??
                                            ($result['pagemap']['metatags'][0]['pubdate'] ?? 'N/A')) }}










                                        <strong>Author(s):</strong>
                                        {{ isset($result['author']) ? $result['author']['lastName'] : 'N/A' }} <br>
                                        <strong>Year:</strong>
                                        {{ $result['pagemap']['metatags'][0]['og:article:published_time'] ??
                                            ($result['pagemap']['metatags'][0]['article:published_time'] ??
                                                ($result['pagemap']['metatags'][0]['pubdate'] ?? 'N/A')) }}
                                        <br>
                                        <strong>Title:</strong> {{ $result['title'] ?? 'N/A' }} <br>
                                        <strong>URL:</strong> <mark style="background-color: yellow;">
                                            <a href="{{ $result['link'] }}" target="_blank">{{ $result['link'] }}</a></mark>
                                        <strong>Container:</strong>
                                        {{ $result['pagemap']['metatags'][0]['og:type'] ?? 'N/A' }} <br>
                                        <strong>Publisher:</strong>
                                        {{ $result['pagemap']['metatags'][0]['og:site_name'] ?? ($result['pagemap']['cse_image'][0]['og:site_name'] ?? 'N/A') }}
                                        <br>
                                        <strong>Credibility:</strong>
                                        {{ $result['pagemap']['metatags'][0]['og:credibility'] ?? 'N/A' }}

                                        <!-- Additional fields can be added as needed -->

                                        <!-- Additional styling for separation -->
                                        <hr>
                                    </span>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                @endisset
                </p>
                <form action="{{ route('showForm', ['projectId' => $projectId]) }}" method="post">
                    @csrf
                    <input type="hidden" name="results" value="{{ json_encode($results) }}">
                    <input type="submit" class="btn btn-primary">
                </form>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>
