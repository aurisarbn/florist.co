<?php

@include 'config.php';

session_start();

$admin_type = $_SESSION['admin_type'];

if(!isset($admin_type)|| empty($admin_type)){
   header('location:home.php');
}

if ($admin_type != 'super' &&  $admin_type != 'adminkrw'){
   header('location:admin_page.php');
   exit();
}
if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM `karyawan` WHERE id = '$delete_id'") or die('query failed');
   header('location:admin_karyawan.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>dashboard</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="css/admin_style.css">
   <style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
  font-size: large;
  margin: 10px;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
.center {
  margin-left: auto;
  margin-right: auto;
}
</style>
</head>
<body>
   

<section class="users">

   <?php

@include 'config.php';

session_start();

$admin_type = $_SESSION['admin_type'];

if(!isset($admin_type)|| empty($admin_type)){
   header('location:home.php');
}

if ($admin_type != 'super' &&  $admin_type != 'adminkrw'){
   header('location:admin_page.php');
   exit();
}
if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM `karyawan` WHERE id = '$delete_id'") or die('query failed');
   header('location:admin_karyawan.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>dashboard</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="css/admin_style.css">
   <style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
  font-size: large;
  margin: 10px;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
.center {
  margin-left: auto;
  margin-right: auto;
}
</style>
</head>
<body>
   

<section class="users">

   <h1 class="title">DAFTAR KARYAWAN</h1>

   <a href="input_karyawan.php" class="option-btn">Input Data</a>
   <a href="convert_karyawan.php" class="option-btn">Convert Excel</a>
      <table class="center">
  <tr>
    <th>User id : </th>
    <th>Username: </th>
    <th>Tempat/Tanggal Lahir : </th> 
    <th>Email : </th>
    <th>No Telepon : </th>
    <th>Alamat :   </th>
    <th>Keahlian :   </th>
    <th>Jabatan:   </th>
    <th>Delete : </th>
    <th>Edit : </th>

  </tr>

  <?php
         $select_karyawan = mysqli_query($conn, "SELECT * FROM `karyawan` ") or die('query failed');
         if(mysqli_num_rows($select_karyawan) > 0){
            while($fetch_karyawan = mysqli_fetch_assoc($select_karyawan)){
      ?>
  <tr>
   
    <td><?php echo $fetch_karyawan['id']; ?></td>
    <td><?php echo $fetch_karyawan['name'];?></td> 
    <td><?php echo $fetch_karyawan['birthplace'];?></td> 
    <td><?php echo $fetch_karyawan['email']; ?></td>
    <td><?php echo $fetch_karyawan['no_hp']; ?></td>
    <td><?php echo $fetch_karyawan['address']; ?></td>
    <td><?php echo $fetch_karyawan['keahlian']; ?></td>
    <td><?php echo $fetch_karyawan['jabatan']; ?></td>
    <td><a href="admin_karyawan.php?delete=<?php echo $fetch_karyawan['id']; ?>" onclick="return confirm('delete this user?');" class="delete-btn" style="font-size: 12px !important; color:black;">HAPUS</a> </td>
    <td><a href="admin_update_karyawan.php?update=<?php echo $fetch_karyawan['id']; ?>" onclick="return confirm('update this user?');" class="delete-btn" style="font-size: 12px !important; color:black;">EDIT</a> </td>
  </tr>
  <?php
  }
}
?>
</table>
   </div>

</section>













<script src="js/admin_script.js"></script>

</body>
</html>

   <a href="input_karyawan.php" class="option-btn">Input Data</a>
   <a href="convert_karyawan.php" class="option-btn">Convert Excel</a>
      <table class="center">
  <tr>
    <th>User id : </th>
    <th>Username: </th>
    <th>Tempat/Tanggal Lahir : </th> 
    <th>Email : </th>
    <th>No Telepon : </th>
    <th>Alamat :   </th>
    <th>Keahlian :   </th>
    <th>Jabatan:   </th>
    <th>Delete : </th>
    <th>Edit : </th>

  </tr>

  <?php
         $select_karyawan = mysqli_query($conn, "SELECT * FROM `karyawan` WHERE user_type = '$admin_id'") or die('query failed');
         if(mysqli_num_rows($select_karyawan) > 0){
            while($fetch_karyawan = mysqli_fetch_assoc($select_karyawan)){
      ?>
  <tr>
   
    <td><?php echo $fetch_karyawan['id']; ?></td>
    <td><?php echo $fetch_karyawan['name'];?></td> 
    <td><?php echo $fetch_karyawan['birthplace'];?></td> 
    <td><?php echo $fetch_karyawan['email']; ?></td>
    <td><?php echo $fetch_karyawan['no_hp']; ?></td>
    <td><?php echo $fetch_karyawan['address']; ?></td>
    <td><?php echo $fetch_karyawan['keahlian']; ?></td>
    <td><?php echo $fetch_karyawan['jabatan']; ?></td>
    <td><a href="admin_karyawan.php?delete=<?php echo $fetch_karyawan['id']; ?>" onclick="return confirm('delete this user?');" class="delete-btn" style="font-size: 12px !important; color:black;">HAPUS</a> </td>
    <td><a href="admin_update_karyawan.php?update=<?php echo $fetch_karyawan['id']; ?>" onclick="return confirm('update this user?');" class="delete-btn" style="font-size: 12px !important; color:black;">EDIT</a> </td>
  </tr>
  <?php
  }
}
?>
</table>
   </div>

</section>













<script src="js/admin_script.js"></script>

</body>
</html>