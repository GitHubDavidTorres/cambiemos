<?php
if(isset($_POST['create_user'])){
    
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_role = $_POST['user_role'];

    $username = $_POST['username'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];       

    $query = "INSERT INTO users(user_firstname, user_lastname, user_role, username , user_email ,user_password) ";
    $query .=
    "VALUES('{$user_firstname}', '{$user_lastname}', '{$user_role}' , '{$username}', '{$user_email}', '{$user_password}') ";

    $create_user_query = mysqli_query($connection, $query);

    confirm($create_user_query);
    
    echo "<h3>Usuario Creado: $username " . ' ' . "<a href='users.php'>Ver Usuarios</a></h3> ";

}
?>
    <form action="" method="post" enctype="multipart/form-data">
          <div class="form-group">
             <label for="">Nombre</label>
                 <input type="text" class="form-control" name="user_firstname">
          </div>
          <div class="form-group">
              <label for="">Apellido</label>
                  <input type="text" class="form-control" name="user_lastname">
          </div>
          <div class="form-group">
              <select name="user_role" id="">
               <option value="subscriber">Selecciona Opción</option>
               <option value="admin">Administrador</option>
               <option value="subscriptor">Subscriptor</option>
              </select>
          </div>

<!--    <div class="form-group">
         <label for="">Post Image</label>
         <input type="file" name="image">
     </div>-->

     <div class="form-group">
         <label for="">Nombre de Usuario</label>
         <input type="text" class="form-control" name="username">
     </div>
      <div class="form-group">
         <label for="post_content">Email</label>
         <input type="email" class="form-control" name="user_email">
     </div>
     <div class="form-group">
         <label for="post_content">Password</label>
         <input type="password" class="form-control" name="user_password">
     </div>
     <div class="form-group">
     <input type="submit" class="btn btn-primary" name="create_user" value="Crear Usuario">
     </div>
</form>
