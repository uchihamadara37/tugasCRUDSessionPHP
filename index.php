<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Tugas CRUD-Session</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">Features</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">Pricing</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">Disabled</a>
                </li>
            </ul>
        </div>
    </nav>

    <form>
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4 kotak">
                <h4 class="text-center form-group">Sign Up</h4>
                <div class="row form-group">
                    <div class="col">
                        <input type="text" class="form-control" placeholder="First name">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Last name">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Username">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col">
                        <input type="email" class="form-control" placeholder="Email">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col">
                        <input type="password" class="form-control" placeholder="Password">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col">
                        <input type="password" class="form-control" placeholder="Repeat-password">
                    </div>
                </div>
                <div class=" text-center">
                    <button type="submit" class="btn btn-orange">Sign Up</button>
                </div>
            </div>
            <div class="col-4"></div>
        </div>



        <div class="row">
            <div class="col-4"></div>
            <div class="col-4 kotak">
                <h4 class="text-center form-group">Sign In</h4>
                
                <div class="row form-group">
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Username">
                    </div>
                </div>
                
                <div class="row form-group">
                    <div class="col">
                        <input type="password" class="form-control" placeholder="Password">
                    </div>
                </div>
                <div class=" text-center">
                    <button type="submit" class="btn btn-orange">Sign In</button>
                </div>
            </div>
            <div class="col-4"></div>
        </div>
    </form>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>