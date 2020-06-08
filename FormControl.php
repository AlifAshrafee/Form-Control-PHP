<?php
$error = "";
$success = "";
if ($_POST) {

    if (!$_POST["email"]) {
        $error .= "An email address is required<br>";
    }

    if (!$_POST["subject"]) {
        $error .= "The subject field is required<br>";
    }

    if (!$_POST["content"]) {
        $error .= "The content field is required<br>";
    }

    if ($_POST["email"] && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) == false) {
        $error .= "The email address is invalid<br>";
    }

    if ($error != "") {
        $error = '<div class="alert alert-danger" role="alert"><p><strong>There were error(s):</strong></p>' . $error . '</div>';
    } else {
        $emailTo = "alifjpt@gmail.com";
        $subject = $_POST["subject"];
        $content = $_POST["content"];
        $headers = "From: " . $_POST["email"];

        if (mail($emailTo, $subject, $content, $headers)) {
            $success = '<div class="alert alert-success" role="alert"><p>Your message was successfully sent</p></div>';
        } else {
            $error = '<div class="alert alert-danger" role="alert"><p>Sorry your message could not be sent</p></div>';
        }
    }
}
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>
    <div class="container">
        <h1>Get in touch with us</h1>
        <form method="POST">
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email adress" aria-describedby="emailHelp">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
                <label for="subject">Subject</label>
                <input type="text" class="form-control" id="subject" name="subject">
            </div>
            <div class="form-group">
                <label for="content">How can we help?</label>
                <textarea class="form-control" id="content" name="content" rows="3"></textarea>
            </div>
            <button type="submit" id="submit" class="btn btn-info">Submit</button>
        </form>
        <br>
        <div id="error"><?php echo $error . $success; ?></div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $("form").submit(function(e) {

            var error = "";

            if ($("#email").val() == "") {
                error += "An email address is required<br>";
            }

            if ($("#subject").val() == "") {
                error += "The subject field is required<br>";
            }

            if ($("#content").val() == "") {
                error += "The content field is required<br>";
            }

            if (error != "") {

                $("#error").html('<div class="alert alert-danger" role="alert"><p><strong>There were error(s):</strong></p>' + error + '</div>');
                return 0;
            } else {
                return 1;
            }
        });
    </script>

</body>

</html>