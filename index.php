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
    <?php 
        $koneksi = mysqli_connect("localhost","root","","loginpraktikum");
        if (mysqli_connect_errno()){
            echo "Koneksi database gagal : " . mysqli_connect_error();
        }

        
		

    ?>

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

   

    <div class="row my-5">
        <div class="col-1"></div>
        <div class="col-2">
            <div class=" text-center">
                <button type="button" class="btn btn-primary " >Sign Up (Create)</button>
            </div>
        </div>
        <div class="col-2">
            <div class=" text-center">
                <button type="submit" class="btn btn-info">Sign In (Create)</button>
            </div>
            
        </div>
        <div class="col-2">
            <div class=" text-center">
                <button type="submit" class="btn btn-secondary">All Data (Read)</button>
            </div>
            
        </div>
        <div class="col-2">
            <div class=" text-center">
                <button type="submit" class="btn btn-success">Update Data (Update)</button>
            </div>
            
        </div>
        <div class="col-2">
            <div class=" text-center">
                <button type="submit" class="btn btn-danger">Delete Data (Delete)</button>
            </div>
            
        </div>
        <div class="col-1"></div>
    </div>

    <div class="row ">
        <div class="col-2"></div>
        <div class="col-8 kotak3">
            <table class="table table-bordered kotak2">
                <tr>
                    <td colspan="5">Semua Data</td>
                </tr>
                <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Password</th>
                </tr>
                

                <?php 
                    $no = 1;
                    $data = mysqli_query($koneksi,"select * from user");
                    while($d = mysqli_fetch_array($data)){
                ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $d['username']; ?></td>
                            <td><?php echo $d['password']; ?></td>
                            <td><?php echo $d['email']; ?></td>
                            <td>
                                <a href="edit.php?id=<?php echo $d['id']; ?>">EDIT</a>
                                <a href="hapus.php?id=<?php echo $d['id']; ?>">HAPUS</a>
                            </td>
                        </tr>
                <?php 
                    }
                ?>

                
            </table>
        </div>
        <div class="col-2"></div>
    </div>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="row display-sign-up">
            <div class="col-4"></div>
            <div class="col-4 kotak">
                <h4 class="text-center form-group">Sign Up</h4>
                <div class="row form-group">
                    <div class="col">
                        <input type="text" name="first_name" class="form-control" placeholder="First name" id="val1">
                    </div>
                    <div class="col">
                        <input type="text" name="last_name" class="form-control" placeholder="Last name" id="val2">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col">
                        <input type="text" name="username" class="form-control" placeholder="Username">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col">
                        <input type="email" name="email" class="form-control" placeholder="Email">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col">
                        <input type="password" id="pw_su" name="password" class="form-control" placeholder="Password">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col">
                        <input type="password" id="re_pw_su" name="repeat_password" class="form-control" placeholder="Repeat-password" >
                    </div>
                </div>
                <div class=" text-center">
                    <button type="submit" class="btn btn-orange" id="btn_su">Sign Up</button>
                </div>
                
            </div>
            <div class="col-4"></div>
        </div>
        <p class="text-light pesan">
            


            <?php

                
                
                // Proses data saat form dikirim
                if ($_SERVER["REQUEST_METHOD"] == "POST"){
                    if ($_POST["username"] != ""){
                        // echo "ada isinya";
                        // echo $_POST["username"];
                        $nama_depan = $_POST["first_name"]; 
                        $nama_belakang = $_POST["last_name"]; 
                        $username = $_POST["username"]; 
                        $email = $_POST["email"]; 
                        $password = $_POST["password"]; 
                        
                        $masukan = mysqli_query($koneksi,"insert into user values('','$nama_depan','$nama_belakang','$username','$email', '$password')");
                        $_POST = array();
                        echo "<script>document.getElementById('btn_su').click();</script>";
                    }else{
                        // echo "tidak ada";
                        // echo $_POST["username"];
                    }
                }

                // 
            ?>

        </p>


        <div class="row display-sign-in">
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

    <script>
        const pw1 = document.getElementById('pw_su');
        const pw1r = document.getElementById('re_pw_su');
        const btnsu = document.getElementById('btn_su');

        // btnsu.disabled = true;

        // pw1.addEventListener("change", (e) => {
        //     if (pw1.value === pw1r.value){
        //         btnsu.disabled = false;
        //     }else{
        //         btnsu.disabled = true;
        //     }
        // });
        // pw1r.addEventListener("change", (e) => {
        //     if (pw1.value === pw1r.value){
        //         btnsu.disabled = false;
        //     }else{
        //         btnsu.disabled = true;
        //     }
        // });
        btnsu.addEventListener("click", (e) => {
            if (pw1.value !== pw1r.value || pw1.value == "" || pw1r.value == ""){
                e.preventDefault();
                alert('Maaf password anda belum cocok!');
            }
        });
    </script>
</body>
</html>