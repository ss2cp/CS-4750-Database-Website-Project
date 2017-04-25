<!--
Ketao Yin
CS 4750
signup.php
-->

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Bootstrap Core CSS -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="./css/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="./font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navbar -->
    <!-- Navbar placeholder -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
         <div class="container">
           <!-- Brand and toggle get grouped for better mobile display -->
           <div class="navbar-header">
               <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                   <span class="sr-only">Toggle navigation</span>
                   <span class="icon-bar"></span>
                   <span class="icon-bar"></span>
                   <span class="icon-bar"></span>
               </button>
               <a class="navbar-brand" href="">DASHSHOP</a>
           </div>
         <!-- /.navbar-collapse -->
         </div>
        <!-- /.container -->
        </nav>

    <!-- Form -->
    <div class="container">
        <form class="form-horizontal" id="form_members" role="form" action="member_signup.php" method="POST">
        <legend>User Info</legend>
        <div class="form-group">
            <label for="name" class="col-sm-2">Name</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" name="name" id="name" placeholder="Thomas Jefferson">
            </div>
            <label for="dob" class="col-sm-2">Date of Birth</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" name="dob" id="dob" placeholder="YYYY-MM-DD">
            </div>
        </div>
        <div class="form-group">
            <label for="email" class="col-sm-2">Email</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" name="email" id="email" placeholder="thomas.jefferson@virginia.edu">
            </div>
            <label for="phoneNum" class="col-sm-2">Phone Numer</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" name="phoneNum" id="phoneNum" placeholder="123-456-7890">
            </div>
        </div>

        <legend>Address Info</legend>
        <div class="form-group">
            <label for="streetNum" class="col-sm-2">Street Number</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" name="streetNum" id="streetNum" placeholder="123">
            </div>
            <label for="streetName" class="col-sm-2">Street Name</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" name="streetName" id="streetName" placeholder="Main Street">
            </div>
        </div>
        <div class="form-group">
            <label for="city" class="col-sm-2">City</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" name="city" id="city" placeholder="New York">
            </div>
            <label for="state" class="col-sm-2">State</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" name="state" id="state" placeholder="NY">
            </div>
        </div>
        <div class="form-group">
            <label for="zipcode" class="col-sm-2">ZIP Code</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" name="zipcode" id="zipcode" placeholder="10001">
            </div>
        </div>

        <legend>Login Info</legend>
        <div class="form-group">
            <label for="userName" class="col-sm-2">User Name</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" name="userName" id="userName" placeholder="username">
            </div>
            <label for="password" class="col-sm-2">Password</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" name="password" id="password" placeholder="password">
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-10">
                <button type="submit" class="btn btn-warning" name="submit" id="submit">Submit</button>
                
            </div>
        </div>
        </form>
    </div>
</body>

</html>
