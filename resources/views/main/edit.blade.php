<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Link to Poppins font from Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">

    <!-- Link to Times New Roman font (you might need to adjust the path) -->
    <link rel="stylesheet" type="text/css" href="path/to/times-new-roman.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <title>TodoList</title>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <title>TodoList</title>
    <style>
        body{
            background-color:  #FAF3F0;
        }
        </style>
</head>
<body>
    <div class="container text-center first-container d-block justify-content-center align-items-center vh-100" style="width: 400px">
        <div class="row">
                        <div class="col-12" id="todoForm" >
                            <form action="/main/{{$item->id}}/update" method="POST" class="p-4 shadow rounded" style="margin-top: 50px;">

                                @csrf
                                @method('PUT')
                                <div class="mb-3 my-3">
                                    <label for="todoTitle" class="form-label">Title</label>
                                    <input type="text" name="title" class="form-control" id="todoTitle" placeholder="Enter title" value="{{$item->title}}">
                                    @error('title')
                                    <div class="text-danger">{{$message}}</div>

                                    @enderror
                                </div>
                                <div class="mb-3 my-3">
                                    <label for="todoNotes" class="form-label">Notes</label>
                                    <textarea class="form-control" name="notes" id="todoNotes" rows="3" placeholder="Enter notes">{{$item->notes}}</textarea>
                                    @error('notes')
                                    <div class="text-danger">{{$message}}</div>

                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Update Todo</button>
                            </form>
                            </div>
                        </div>

        </div>
</body>
</html>
