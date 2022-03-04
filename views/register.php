<!doctype html>
<html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Registration Form</title>
        <style>
            button{
                
        font-size: .9rem;
        margin-top: 60px;
        margin-left: 650px;
        color:white;
        background-color: black;}
        </style>
        <link rel="stylesheet" href="registration.css">
    </head>

    <body>

        <div class="registration-form">
            <h1>Registration Form</h1>
                <form action="../controllers/Users.php" method="post">
                <input type="hidden" name="type" value="register">
                    <p><b>Name</b></p>
                    <input type="name" name="username" placeholder="Enter Your Name" required>
                    <p><b>Email Id</b></p>
                    <input type="email" name="useremail" placeholder="Enter Your Email-Id" required>
                    <p><b>Phone No.</b></p>
                    <input type="phone" name="userphoneno" placeholder="Enter Your PhoneNo." required>
                    <p><b>Password</b></p>
                    <input type="password" name="userpwd" placeholder="Create your Password" required>
                    <button type="submit" name="register">Submit</button>
                </form>
                <form action="../index.php" method="post">
                <button type="home">Home</button>
                </form>
        </div>
    </body>
</html>
                    
