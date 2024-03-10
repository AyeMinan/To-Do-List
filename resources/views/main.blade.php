<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Link to Poppins font from Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">



    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <title>TodoList</title>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>TodoList</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container text-center first-container">
        <div class="row">
            <div class="col-4 column1">
                <div class="container first-column d-flex flex-column">
                <!-- Column 1 content goes here -->
                <div class="container menu">
                    <h2>Menu</h2>
                    <ion-icon class="menu-icon" name="menu-outline"></ion-icon>
                </div>
                <div class="container search-bar">
                    <div class="input-group rounded">
                        <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                        <span class="input-group-text border-0" id="search-addon">
                          <i class="fas fa-search"></i>
                        </span>
                      </div>
                </div>
                <div class="todotasks">
                    <h4 id="stickyWallHeading">Sticky Wall</h4>
                    <h4 id="todayTasks">Today</h4>
                    <h4 id="upcomingTasksTitle">Upcoming</h4>

                </div>
                <div id="newList">
                    <form action="/main" method="POST" >
                        @csrf
                        <input type="text" name="newList"  placeholder="Enter Desired List">
                        <button type="submit">Add</button>
                    </form>
                </div>
                <div id="editListForm">
                    <form  method="PUT">

                        @csrf
                        @method('put')
                        <input type="text" name="newList" placeholder="Enter Desired List" >
                        <button type="submit">Update</button>
                    </form>

                </div>


                <div class="todolists" >
                    @foreach ($newLists as $newList )
                    <div class="container d-flex justify-content-between" style="width: 200px">
                    <span style="display: none" class="listId" >{{ $newList->id }}</span>
                    <h5 class="list">{{$newList->newLists}}</h5>
                    <div class="d-flex">
                    <ion-icon class="btn editList-btn" name="create-outline"></ion-icon>

                    <form action="/main/lists/{{$newList->id}}" method="POST">
                        @csrf
                        @method('delete')
                <button  class="btn complete-btn" type="submit"><ion-icon name="checkmark-done-outline"></ion-icon></button>
                    </form>
                    </div>
                </div>
                    @endforeach
                    <Button id="addNewList">+Add New List</Button>
                </div>




                <div class="signout d-flex align-items-end justify-content-center">
                    <a href="/" class="btn btn-primary" style="margin-right: 10px">Home</a>
                    <form action="/logout" method="POST">
                        @csrf
                    <button class="btn btn-danger">Sign Out</button>
                    </form>

                </div>
            </div>


            </div>


            <div class="col-8">
                <div class="container d-flex justify-content-center align-items-center">
                <table id="upcomingTasksTable">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Notes</th>
                            <th>Due_Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Populate the table rows dynamically with upcoming tasks data -->

                        @foreach ($tasks as $task)
                        <tr>
                            <td>{{$task->title}}</td>
                            <td>{{$task->notes}}</td>
                            <td>{{$task->due_date}}</td>
                        </tr>
                        @endforeach



                    </tbody>
                </table>
                </div>


                <div class="container" id="TodayLists">
                    <h4>Today Lists</h4>

                    @foreach ($todayLists as $todayList)

                    <li>{{$todayList->notes}}</li>

                    <br/>

                    @endforeach


                </div>

                <div class="container d-flex justify-content-center align-items-center">
                <table id="listTable">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Title</th>
                            <th>Notes</th>

                        </tr>
                    </thead>
                    <tbody>



                    </tbody>
                </table>
                </div>



                <!-- Column 2 content goes here -->

                <div id="second-container" class="container text-center second-container">
                    <h2 class="heading">Sticky Wall</h2>
                    <div class="row">
                        <!-- Form initially hidden -->
                        <div class="col-4" id="todoForm" style="display: none;">
                            <form action="/main" method="POST">
                                @method('put')
                                @csrf
                                <div class="mb-1">
                                    <label for="todoTitle" class="form-label">Title</label>
                                    <input type="text" name="title" class="form-control" id="todoTitle" placeholder="Enter title" required>
                                </div>
                                <div class="mb-2">
                                    <label for="todoNotes" class="form-label">Notes</label>
                                    <textarea class="form-control" name="notes" id="todoNotes" rows="1" placeholder="Enter notes" required></textarea>
                                </div>
                                <div class="mb-2">

                                <label for="due_date">Due Date:</label>
                                <input type="date" id="due_date" name="due_date">
                                </div>
                                <div class="mb-2">

                                <select class="form-select" name="newList" aria-label="Default select example">
                                    <option selected disabled>Open this select menu</option>
                                    @foreach ($newLists as $newList )
                                    <option value="{{$newList->id}}">{{$newList->newLists}}</option>
                                    @endforeach
                                  </select>
                                </div>
                                <button type="submit" class="btn btn-primary">Add Todo</button>
                            </form>
                        </div>


                        @php
    $colors = ['#FFCACC', '#DBC4F0', '#D4E2D4', '#F5F0BB', '#C0EEF2']; // Add more colors as needed
@endphp

                        @foreach ($data as $index => $item )
                        <div class="col-4">
                            <div class="card p-3 m-2" style="width: 15rem; height: 17rem; background-color: {{$colors[$index % count($colors)]}}">
                                <div class="card-body d-flex flex-column align-items-center">
                                    <h5 id='title' class="card-title mb-3">{{$item->title}}</h5>
                                    <p id='notes' class="card-text mb-3">{{$item->notes}}</p>
                                    <p id="due_date" class="card-text mb-3">{{$item->due_date}}</p>



                                    <div class="mt-auto d-flex">



                                        <a href="/main/{{$item->id}}/edit" class="btn  edit-btn" ><ion-icon name="create-outline"></ion-icon></a>

                                        <form action="/main/notes/{{$item->id}}" method="POST">
                                            @csrf
                                            @method('delete')
                                        <button type="submit" class="btn delete-btn ml-2"><ion-icon name="trash-outline"></ion-icon>   </button>
                                        </form>
                                    </div>
                                </div>
                              </div>
                        </div>
                        @endforeach
                        <div class="col-4">
                            <div class="card p-3 m-2" style="max-width: 15rem; max-height: 17rem;">
                                <img src="/images/plus-sign.png" id="plusSign"class="card-img-top" alt="...">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script>
         $(document).ready(function () {
        $(".list").click(function () {
            var listId = $(this).prev(".listId").text();

            // Make an AJAX request to get the notes related to the clicked newList
            $.ajax({
                url: "/getNotesForList/" + listId,
                type: "GET",
                success: function (data) {
                    // Clear existing table rows
                    $("#listTable tbody").empty();

                    // Append new rows with notes data
                    $.each(data, function (index, note) {
                        $("#listTable tbody").append("<tr><td>" + note.id + "</td><td>" + note.title + "</td><td>" + note.notes + "</td></tr>");
                    });
                },
                error: function (error) {
                    console.log(error);
                }
            });
        });
    });
        var currentUpdateId;
        document.addEventListener('DOMContentLoaded', function () {
            var todoForm = document.getElementById('todoForm');
            var plusSign = document.getElementById('plusSign');
            var stickyWallHeading = document.getElementById('stickyWallHeading');
            var secondContainer = document.querySelector('.second-container');
            var upcomingTasksTitle = document.getElementById('upcomingTasksTitle');
            var upcomingTasksTable = document.getElementById('upcomingTasksTable');
            var todayLists = document.getElementById('TodayLists');
            var todayTasks = document.getElementById('todayTasks');
            var addNewList = document.getElementById('addNewList');
            var newList = document.getElementById('newList');
            var todoLists = document.querySelector('.todolists');
            var editListBtn = document.querySelectorAll('.editList-btn');
            var editListForm = document.getElementById('editListForm');
            var editListInput = editListForm.querySelector('input[name="newList"]');
            var listTable = document.getElementById('listTable');
            const list = document.querySelectorAll('.list');
            var markedItemId = localStorage.getItem('markedItem');
            const lists = document.getElementById('lists');

            editListBtn.forEach(function (editButton) {
        editButton.addEventListener('click', function () {
            // Get the text content of the h5 element in the same container
            var h5Text = this.closest('.container').querySelector('h5').textContent;

            currentUpdateId = this.closest('.container').querySelector('.listId').textContent;

            // Set the input value in the editListForm
            editListInput.value = h5Text;

            // Display the editListForm
            editListForm.style.display = 'block';

            todayLists.style.display = 'none';

            todoLists.style.display = 'none';


            // document.addEventListener('click', handleEditList);
            // You can add additional logic if needed

            document.addEventListener('click', handleEditList);
        });
    });

            list.forEach(function(listButton){
            listButton.addEventListener('click', function(){
                listTable.style.display = 'block';
                secondContainer.style.display = 'none';
                upcomingTasksTable.style.display = 'none';
                todayLists.style.display = 'none';
                lists.style.display = 'none';
            });

            });


            function showForm(data) {
                // Show the form when the plus sign is clicked



                todoForm.style.display = 'block';
                // Show the col-8 section
                secondContainer.style.display = 'block';

                upcomingTasksTable.style.display = 'none';

                    // Add the show-table class to apply the opacity transitio

                // Populate the form with data if provided
                // Add a click event listener to the document to hide the form and col-8 when clicking outside of them
                document.addEventListener('click', handleDocumentClick);
            }

            function handleDocumentClick(event) {


                // Check if the click target is outside of the form, plus sign, and sticky wall heading
                if (!todoForm.contains(event.target) && event.target !== plusSign
              ) {

                    todoForm.style.display = 'none';
                    // Remove the click event listener after hiding the form and col-8
                    document.removeEventListener('click', handleDocumentClick);
                }
            }
            function handleEditList(event){
                if(!editListForm.contains(event.target) && !Array.from(editListBtn).includes(event.target)){
                    editListForm.style.display = 'none';
                    todoLists.style.display = 'block';
                    document.removeEventListener('click', handleEditList);
                }
            }

            function showNewList(){
                newList.style.display = 'block';

                document.addEventListener('click', handleClick);
            }
            function handleClick(event){
                if(!newList.contains(event.target) && event.target !== addNewList){
                    newList.style.display = 'none';


                    document.removeEventListener('click', handleClick);
                }
            }
            addNewList.addEventListener('click', function(){

                newList.style.display = 'block';

            })
            todayTasks.addEventListener('click', function(){
                todayLists.style.display = 'block';

                secondContainer.style.display = 'none';

                listTable.style.display = 'none';

                upcomingTasksTable.style.display = 'none';
                lists.style.display = 'none';
            });
            // Add a click event listener to the sticky wall heading
            stickyWallHeading.addEventListener('click', function () {
                // Toggle the display property of col-8

                secondContainer.style.display = 'block';
                listTable.style.display = 'none';
                upcomingTasksTable.style.display = 'none';
                todayLists.style.display = 'none';
                lists.style.display = 'none';
            });

        upcomingTasksTitle.addEventListener('click', function () {
            // Show the upcoming tasks table
            upcomingTasksTable.style.display = 'block';
            listTable.style.display = 'none';
            // Hide col-8
            secondContainer.style.display = 'none';
            todayLists.style.display = 'none';
            lists.style.display = 'none';
        });

            addNewList.addEventListener('click', showNewList);

            plusSign.addEventListener('click', showForm);

        });

        const editListForm = document.querySelector("#editListForm > form");
        editListForm.addEventListener("submit", (e)=>{
            e.preventDefault();
            editListForm.action = `http://127.0.0.1:8000/main/${currentUpdateId}/updateList`;
            editListForm.method="post";
            editListForm.submit();
        })



        function addToNewList(noteId) {
        // You can use AJAX to send a request to the server
        // Here's a simple example using Fetch API
        fetch(`/main/lists/add-note/${noteId}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}', // Make sure to include the CSRF token
            },
            body: JSON.stringify({
                noteId: noteId,
            }),
        })
        .then(response => response.json())
        .then(data => {
            // Handle the response as needed
            console.log(data);
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }
    $(document).ready(function() {
        $('.add-btn').on('click', function() {

            // Change the button text to Font Awesome check mark icon
            $(this).html('<i class="fas fa-check"></i>');


        });



        // // Check for the presence of the cookie on page load
        // var markedItemId = getCookie("markedItem");
        // if (markedItemId) {
        //     // Change the button text to Font Awesome check mark icon
        //     $('.add-btn[data-item-id="' + markedItemId + '"]').html('<i class="fas fa-check"></i>');
        // }

        // // Function to get the value of a cookie
        // function getCookie(name) {
        //     var match = document.cookie.match(new RegExp(name + '=([^;]+)'));
        //     return match ? match[1] : null;
        // }
    });


    //     $(document).ready(function () {
    //     // Submit form asynchronously using AJAX
    //     $('#editListForm').submit(function (e) {
    //         e.preventDefault();

    //         var formData = $(this).serialize();

    //         $.ajax({
    //             url: $(this).attr('action'),
    //             type: 'POST',
    //             data: formData,
    //             success: function (response) {
    //                 // Handle success
    //                 console.log(response);

    //                 // You can update the UI or show a success message here
    //             },
    //             error: function (error) {
    //                 // Handle error
    //                 console.log(error);
    //             }
    //         });
    //     });
    // });
    </script>

</body>
</html>
