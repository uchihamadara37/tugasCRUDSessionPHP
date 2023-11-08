<?php
    session_start();
    $koneksi = mysqli_connect("localhost","root","","loginpraktikum");
    if (mysqli_connect_errno()){
        echo "Koneksi database gagal : " . mysqli_connect_error();
    }

    if(isset($_GET['mode']) && $_GET['mode'] == "login" && isset($_POST['username'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $ketemu = false;
        $data = mysqli_query($koneksi,"select * from user");
        while($d = mysqli_fetch_array($data)){

            if ($d['username'] == $username){
                $ketemuUser =  true;
                if($d['password'] == $password){
                    $ketemu = true;

                    $_SESSION["username"] = $d['username'];
                    break;
                }
            }
        }
        if ($ketemu == false){
            echo "<script>alert('Maaf username atau password salah')</script>";
        }
        // echo "parah sih";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Tugas CRUD-Session</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <?php 
        
    ?>
    <a id="reload" class="d-none" href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">o</a>
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

    <div class="container">
        
        <div class="row my-5 tombol d-none">
            <div class="col-1"></div>
            <div class="col-2">
                <div class=" text-center">
                    <button type="button" class="btn btn-primary " id="button_signup">Sign Up (Create Data)</button>
                </div>
            </div>
            <div class="col-2">
                <div class=" text-center">
                    <button type="button" class="btn btn-secondary" id="button_rud">Read / Update / Delete</button>
                </div>
            </div>
            <div class="col-2">
                <div class=" text-center">
                    <button type="button" class="btn btn-info" id="logout"><a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?mode=logout" style="text-decoration : none; color: white;">Log out</a></button>
                </div>
            </div>
            <div class="col-1"></div>
        </div>
        
        <?php 
            
        ?>
        
        <div class="row tabel d-none">
            <div class="col-1"></div>
            <div class="col-md-10 kotak3">
                <table class="table table-bordered kotak2">
                    <tr>
                        <th class="text-center" colspan="5">Semua Data</th>
                    </tr>
                    <tr>
                        <th>No.</th>
                        <th>Id</th>
                        <th>Username</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Action</th>
                    </tr>
                    
    
                    <?php 
                        $no = 0;
                        $data = mysqli_query($koneksi,"select * from user");
                        while($d = mysqli_fetch_array($data)){
                    ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $d['id']; ?></td>
                                <td><?php echo $d['username']; ?></td>
                                <td><?php echo $d['nama_depan'] ." ". $d['nama_belakang']; ?></td>
                                <td><?php echo $d['email']; ?></td>
                                <td><?php echo $d['password']; ?></td>
                                <td>
                                    <button type="submit" class="btn btn-success" onclick="update()"><a href='index.php?update=<?php echo $d['id']; ?>'>Update</a></button>
                                    <button type="submit" class="btn btn-danger" onclick=""><a href='index.php?delete=<?php echo $d['id']; ?>&user=<?php echo $d['username']; ?>'>Delete</a></button>
                                </td>
                            </tr>
                    <?php 
                        }
                    ?>
                </table>
            </div>
            <div class="col-1"></div>
        </div>
    
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?mode=create" method="post" class="d-none" id="form_signup">
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
        </form>


        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?mode=login" method="post" class="" id="form_signin">
            <div class="row display-sign-in ">
                <div class="col-4"></div>
                <div class="col-4 kotak">
                    <h4 class="text-center form-group">Sign In</h4>
                    
                    <div class="row form-group">
                        <div class="col">
                            <input type="text" name="username" class="form-control" placeholder="Username">
                        </div>
                    </div>
                    
                    <div class="row form-group">
                        <div class="col">
                            <input type="password" name="password" class="form-control" placeholder="Password">
                        </div>
                    </div>
                    <div class=" text-center">
                        <button type="submit" class="btn btn-orange" id="btnsi">Sign In</button>
                    </div>
                </div>
                <div class="col-4"></div>
            </div>
        </form>

        <?php 
            if(isset($_GET['update'])){
                $id = $_GET['update'];
                $data = mysqli_query($koneksi, "select * from user where id='$id'");
                while($d = mysqli_fetch_array($data)){ ?>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?mode=update&id_update=<?php echo $d['id'] ?>&user_sebelum=<?php echo $d['username'] ?>" method="post" class="" id="form_update">
                        <div class="row display-sign-up">
                            <div class="col-4"></div>
                            <div class="col-4 kotak">
                                <h4 class="text-center form-group">Update </h4>
                                <div class="row form-group">
                                    <div class="col">
                                        <input type="text" name="first_name" class="form-control" placeholder="First name" value="<?php echo $d['nama_depan']; ?>">
                                    </div>
                                    <div class="col">
                                        <input type="text" name="last_name" class="form-control" placeholder="Last name" value="<?php echo $d['nama_belakang']; ?>">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col">
                                        <input type="text" name="username" class="form-control" placeholder="Username" value="<?php echo $d['username']; ?>">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col">
                                        <input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo $d['email']; ?>">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col">
                                        <input type="password" id="pw_su_up" name="password" class="form-control" placeholder="Password" value="<?php echo $d['password']; ?>">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col">
                                        <input type="password" id="re_pw_su_up" name="repeat_password" class="form-control" placeholder="Repeat-password" >
                                    </div>
                                </div>
                                <div class=" text-center">
                                    <button type="submit" class="btn btn-success" id="btn_su_up">Update Data</button>
                                    <button type="" class="btn btn-warning" id="" onclick="() => { form_update.classList.add('d-none')}">Cancel</button>
                                </div>
                                
                            </div>
                            <div class="col-4"></div>
                        </div>
                    </form>
        <?php
                }
            } 
        ?>
        

        <script> 
            const form_update = document.getElementById('form_update');
            console.log(form_update)

            const pw1 = document.getElementById('pw_su');
            const pw1r = document.getElementById('re_pw_su');
            const btnsu = document.getElementById('btn_su');
            const btnsi = document.getElementById('btnsi');
            
            
            const pw1up = document.getElementById('pw_su_up');
            const pw1rup = document.getElementById('re_pw_su_up');
            const btnsu_up = document.getElementById('btn_su_up');

            const btn_signup = document.getElementById('button_signup');
            const btn_rud = document.getElementById('button_rud');
            const form_signup = document.getElementById('form_signup');
            const form_signin = document.getElementById('form_signin');
            
            const tabel = document.getElementsByClassName('tabel')[0];
            const tombol = document.getElementsByClassName('tombol')[0];
        </script>

            <p class="text-light pesan">
                <?php
                    if(isset($_GET['mode']) && $_GET['mode'] == "logout" && isset($_SESSION['username'])){
                        session_unset();
                        session_destroy();
                        echo "<script>document.getElementById('reload').click();</script>";
                    }

                    if(isset($_SESSION['username'])){
                        // echo "session berhasil di set <bra>";
                        echo "<script>tabel.classList.remove('d-none')</script>";
                        echo "<script>tombol.classList.remove('d-none')</script>";
                        echo "<script>form_signin.classList.add('d-none')</script>";
                    }

                    if(isset($_GET['update'])){
                        // echo "update ".$_GET['update']."<br>";
                        echo "<script>form_update.classList.remove('d-none')</script>";
                    }else{
                        // echo "tidak update <br>";
                        echo "<script>form_update.classList.add('d-none')</script>";
                    }
                    if(isset($_GET['delete'])){
                        // echo "delete ".$_GET['delete'];
                        if ($_GET['user'] == "asd"){
                            echo "<script>window.alert('Maaf itu adalah user root yang tidak bisa dihapus dari sini!');</script>";
                        }else{
                            // echo $_GET['user']."<br>";
                            $id = $_GET['delete'];
                            $hapus = mysqli_query($koneksi,"delete from user where id='$id'");
                        }
                        // echo "<script>document.getElementById('reload').click();</script>";
                    }
                    // Proses data saat form dikirim
                    if ($_SERVER["REQUEST_METHOD"] == "POST" && $_GET['mode'] == "create"){
                        if ($_POST["username"] != ""){
                            // echo "ada isinya";
                            // echo $_POST["username"];
                            $nama_depan = $_POST["first_name"]; 
                            $nama_belakang = $_POST["last_name"]; 
                            $username = $_POST["username"]; 
                            $email = $_POST["email"]; 
                            $password = $_POST["password"]; 

                            $usersama = false;
                            $data = mysqli_query($koneksi,"select * from user");
                            while($d = mysqli_fetch_array($data)){
                                if ($username == $d['username']){
                                    $usersama = true;
                                    break;
                                }
                            }
                            if ($usersama){
                                echo "<script>window.alert('Maaf username tersebut sudah digunakan!');</script>";
                            }else{
                                $masukan = mysqli_query($koneksi,"insert into user values('','$nama_depan','$nama_belakang','$username','$email', '$password')");
                            }
                            
                            $_POST = array();
                            echo "<script>document.getElementById('reload').click();</script>";
                        }else{
                            // echo "tidak ada";
                            // echo $_POST["username"];
                        }
                    }
                    
                    if ($_SERVER["REQUEST_METHOD"] == "POST" && $_GET['mode'] == "update"){
                        if ($_POST["username"] != ""){
                            // echo "ada isinya";
                            // echo $_POST["username"]."<br>";
                            $id = $_GET['id_update'];
                            $nama_depan = $_POST["first_name"]; 
                            $nama_belakang = $_POST["last_name"]; 
                            $username = $_POST["username"]; 
                            $email = $_POST["email"]; 
                            $password = $_POST["password"]; 
                            // echo "masuk update";

                            $usersama = false;
                            $data = mysqli_query($koneksi,"select * from user");
                            while($d = mysqli_fetch_array($data)){
                                if ($username == $d['username']){
                                    $usersama = true;
                                    break;
                                }
                            }
                            if ($username == $_GET['user_sebelum']){
                                $usersama = false;
                            }
                            if ($_GET['user_sebelum'] == "asd"){
                                echo "<script>window.alert('Maaf itu adalah user root yang tidak bisa diedit dari sini!');</script>";
                            }else{
                                if ($usersama){
                                    echo "<script>window.alert('Maaf username tersebut sudah digunakan!');</script>";
                                }else{
                                    $masukan = mysqli_query($koneksi,"update user set nama_depan='$nama_depan', nama_belakang='$nama_belakang', username='$username', email='$email', password='$password' where id='$id'");
                                }
                            }

                            
                            $_POST = array();
                            echo "<script>document.getElementById('reload').click();</script>";
                        }else{
                            // echo "tidak ada update dulu <br>";
                            echo $_POST["username"];
                        }
                    }
                    // 
                ?>
            </p>
        
        

    </div>
   



    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script>
        


        // btnsu.disabled = true;
        // console.log(tabel);
        btn_signup.addEventListener("click", (e) => {
            // console.log("hoii");
            form_signup.classList.toggle('d-none');
        });
        btn_rud.addEventListener("click", (e) => {
            // console.log("hoii");
            tabel.classList.toggle('d-none');
        });

        function update(){
            form_update.classList.remove('d-none');
        }
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
        btnsu_up.addEventListener("click", (e) => {
            if (pw1up.value !== pw1rup.value || pw1up.value == "" || pw1rup.value == ""){
                e.preventDefault();
                alert('Maaf password anda belum cocok!');
            }
        });


        
        function Del(i){
            confirm("Apakah anda benar-benar ingin menghapus data?!");
            
            console.log(i);
        }
    </script>
</body>
</html>