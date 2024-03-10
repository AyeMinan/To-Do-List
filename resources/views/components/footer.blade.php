<!DOCTYPE html>
<html lang="en">
<head>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
  <!-- Your head content goes here -->
  <style>
    body {
      margin: 0;
      font-family: "Poppins", "Times New Roman", sans-serif;
    }

    footer {
      background-color: white;
      color: black;
      text-align: center;
      padding: 10px;
    }

    .social-links {
      /* margin-top: 10px; */
      /* margin-right: 20px; */

    }

    .contact-info {
      /* margin-top: 20px; */
      /* margin-right: 20px; */

    }

    .contact-info p {
      margin: 5px 0;
    }
    .subscribe-form {
      display: inline-block;
      vertical-align: top;
      margin-right: 20px;
      text-align: left;
      max-width: 300px;
    }

    .subscribe-form form {
      max-width: 100%;
      margin: 0 auto;
    }

    .subscribe-form input {
      width: 100%;
      padding: 8px;
      margin-bottom: 10px;
      box-sizing: border-box;
      border: 1px solid #000000;
      border-radius: 4px;
    }

    .subscribe-form input::placeholder {
      color: #666666;
    }

    .subscribe-form button {
      width: 100%;
      padding: 10px;
      margin-bottom: 15px;
      box-sizing: border-box;
      background-color: #000000; /* Green color */
      color: white;
      cursor: pointer;
      border-radius: 10px;
      transition: background-color 0.3s ease;
    }

    .subscribe-form button:hover {
      background-color: #ffffff;
      color: black; /* Darker green color on hover */
    }

    .subscribe-form button:disabled {
      background-color: #ccc;
      cursor: not-allowed;
    }

    .success-message {
        color: green; /* Set the desired color */
        font-weight: bold; /* Optionally, adjust other styles */
    }


  </style>
</head>
<body>

  <!-- Your main content goes here -->

  <footer>
    <div class="container d-flex justify-content-between" style="border: none; max-height: 200px;">
    <div class="social-links" style="margin: left">
      <h4>Follow Us:</h4>
      <a href="#" target="_blank">Facebook</a> |
      <a href="#" target="_blank">Twitter</a> |
      <a href="#" target="_blank">Instagram</a>
    </div>

    <div class="contact-info" style="margin: auto">
      <h4>Contact Us:</h4>
      <p>123 Main Street, Cityville, Country</p>
      <p>Phone: +1 (555) 123-4567</p>
      <p>Email: info@example.com</p>
    </div>

    <div class="message-box" style="margin: right">
         {{-- <h4>Send us a message:</h4> --}}
         <div class="subscribe-form">
            <h4>Subscribe to Our Newsletter:</h4>
            <form   id="subscribe-form" action="/" method="post">
                @csrf
              <input type="email" name="subscribe-email" placeholder="Your Email" required>
              <br>
              <button type="submit">Subscsribe</button>
            </form>
          </div>

    </div>

    </div>
    <p>&copy; 2023 Your ToDo List. All rights reserved.</p>
  </footer>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script>
    $(document).ready(function() {
        $('#subscribe-form').submit(function(e) {
            e.preventDefault(); // Prevent the default form submission

            // Perform AJAX request
            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: $(this).serialize(),
                success: function(response) {
                    // Update the HTML to display a success message with a class
                    $('#subscribe-form').html('<p class="success-message">' + response.message + '</p>');
                },
                error: function(error) {
                    // Handle error if needed
                    console.error('Error:', error);
                }
            });
        });
    });
</script>


</body>
</html>
