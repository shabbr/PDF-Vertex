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

                                        <strong>Title:</strong> {{ $result['title'] }} <br>
                                        |

                                        <strong>URL:</strong><mark style="background-color: yellow;">
                                            <a href="{{ $result['link'] }}" target="_blank">{{ $result['link'] }}</a></mark>


                                        <strong>Container:</strong>
                                        {{ $result['pagemap']['metatags'][0]['og:type'] ?? 'N/A' }}
                                        |
                                        <strong>Publisher:</strong>
                                        |
                                        {{ $result['pagemap']['metatags'][0]['og:site_name'] ?? ($result['pagemap']['cse_image'][0]['og:site_name'] ?? 'N/A') }}

                                        |
                                        <strong>Year:</strong>
                                        {{ $result['pagemap']['metatags'][0]['og:article:published_time'] ??
                                            ($result['pagemap']['metatags'][0]['article:published_time'] ??
                                                ($result['pagemap']['metatags'][0]['pubdate'] ?? 'N/A')) }}
                                        |
                                        <strong>Credibility:</strong>
                                        {{ $result['pagemap']['metatags'][0]['og:credibility'] ?? 'N/A' }}

                                        <!-- Add more fields as needed -->

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
    {{-- @isset($results)
<table>
    <thead>

    </thead>
    <tbody>
        @foreach ($results as $result)
            <tr> <span id="formData">

                    <strong>Title:</strong> {{ $result['title'] }} <br>
                    |

                    <strong>URL:</strong><mark
                        style="background-color: yellow;">
                        <a href="{{ $result['link'] }}"
                            target="_blank">{{ $result['link'] }}</a></mark>


                    <strong>Container:</strong>
                    {{ $result['pagemap']['metatags'][0]['og:type'] ?? 'N/A' }}
                    |
                    <strong>Publisher:</strong>
                    |
                    {{ $result['pagemap']['metatags'][0]['og:site_name'] ?? ($result['pagemap']['cse_image'][0]['og:site_name'] ?? 'N/A') }}

                    |
                    <strong>Year:</strong>
                    {{ $result['pagemap']['metatags'][0]['og:article:published_time'] ??
                        ($result['pagemap']['metatags'][0]['article:published_time'] ??
                            ($result['pagemap']['metatags'][0]['pubdate'] ?? 'N/A')) }}
                    |
                    <strong>Credibility:</strong>
                    {{ $result['pagemap']['metatags'][0]['og:credibility'] ?? 'N/A' }}

                    <!-- Add more fields as needed -->

                    <!-- Additional styling for separation -->
                    <hr>
                </span>
            </tr>
        @endforeach

    </tbody>
</table>
@endisset --}}


    {{-- <script>
$(document).ready(function() {


    // $("#searchBtn").click(function(e) {
    //     e.preventDefault(); // Prevent the default form submission
    //     var url = $('#url').val();
    //     // console.log(url);
    //     // Get form data
    //     // var formData = $("#searchForm").serialize();

    //     // Perform AJAX request
    //     $.ajax({
    //         type: "POST",
    //         url: "{{ route('search') }}",
    //         data: {
    //             url: url,
    //             _token: "{{ csrf_token() }}"
    //         },
    //         success: function(response) {
    //             // Handle the response here\

    //             updateTable(response);
    //             console.log(response);
    //         },
    //         error: function(error) {
    //             // Handle error here
    //             console.log(error);
    //         }
    //     });
    // });

    // function updateTable(results) {
    //     // Clear existing rows
    //     $("#resultsTable tbody").empty();

    //     // Append new rows based on the AJAX response
    //     $.each(results, function(index, result) {
    //         var newRow = "<tr><td colspan='6'><span>" +
    //             "<strong>Title:</strong> " + result.title + " | " +
    //             "<strong>URL:</strong> <mark style='background-color: yellow;'><a href='" + result
    //             .link + "' target='_blank'>" + result.link + "</a></mark> | " +
    //             "<strong>Container:</strong> " + (result.pagemap.metatags && result.pagemap
    //                 .metatags[0] && result.pagemap.metatags[0]['og:type'] || 'N/A') + " | " +
    //             "<strong>Publisher:</strong> | " + (result.pagemap.metatags && result.pagemap
    //                 .metatags[0] && (result.pagemap.metatags[0]['og:site_name'] || result.pagemap
    //                     .cse_image[0]['og:site_name']) || 'N/A') + " | " +
    //             "<strong>Year:</strong> " + (result.pagemap.metatags && result.pagemap.metatags[
    //                 0] && (result.pagemap.metatags[0]['og:article:published_time'] || result
    //                 .pagemap
    //                 .metatags[0]['article:published_time'] || result.pagemap.metatags[0][
    //                     'pubdate'
    //                 ]) || 'N/A') + " | " +
    //             "<strong>Credibility:</strong> " + (result.pagemap.metatags && result.pagemap
    //                 .metatags[0] && result.pagemap.metatags[0]['og:credibility'] || 'N/A') +
    //             "<hr></span></td></tr>";

    //         $("#resultsTable tbody").append(newRow);
    //     });
    // }










    $('#showForm').hide();

    $("#details").click(function(e) {
        // $('#above').hide();
        $("#showForm").show();

    });

    $("#formData").click(function(e) {
        $('#nav').hide();
        $("#formData").hide();
        $("#showForm").show();
        $("#searchBtn").hide();
        $("#url").hide();
        $("#above").hide();
        $("#webpageAuthor").hide();
        $("#editor").hide();

    });

    $("#webpageAuthorBtn").click(function(e) {
        $("#webpageAuthor").show();
    });

    $("#editorBtn").click(function(e) {
        $("#editor").show();

    })
    $("#showDetails").click(function(e) {
        $("#formData").show();

    })

    var type =
     echo json_encode($result['pagemap']['metatags'][0]['og:type'] ?? 'N/A');

    // Set the value of the input field using jQuery
    $('#container').val(type);



});
</script>
--}}

    <table id='resultsTable'>
        <thead>

        </thead>
        <tbody>

        </tbody>
    </table>

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
