<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title></title>
</head>

<body>

    <form action="{{ route('updateProjectName', ['projectId' => $project->id]) }}" method="post">
        @csrf
        <div class="form-group col-2">
            <label for=""> <h3>Project Name: </h3> </label>
            <input type="text" name="name" value="{{ $project->name }}" class="form-control" placeholder=""
                aria-describedby="helpId">
            <small id="helpId" class="text-muted"></small>
<input type="submit" class="mt-3 btn btn-primary">
        </div>

    </form>
</body>

</html>
