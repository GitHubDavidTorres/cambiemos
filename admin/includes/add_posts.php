<?php
if(isset($_POST['create_post'])){
    $post_title = $_POST['title'];
    $post_author = $_POST['author'];
    $post_category_id = $_POST['post_category'];
    $post_status = $_POST['post_status'];

    $post_image = $_FILES['image']['name'];
    $post_image_temp = $_FILES['image']['tmp_name'];

    $post_tag = $_POST['post_tag'];
    $post_content = $_POST['post_content'];


    //mysqli_real_escape_string transforma lo ingresado a valores predeterminados por el uso del navegedor del usuario
    $post_content = mysqli_real_escape_string($connection, $post_content);

    $post_date = date('d-m-y');




    move_uploaded_file($post_image_temp, "../images/$post_image");

    $query = "INSERT INTO post(post_category_id, post_title, post_author, post_date, post_image ,post_content, post_tag ,post_status) ";
    $query .=
    "VALUES({$post_category_id}, '{$post_title}', '{$post_author}', now(), '{$post_image}' , '{$post_content}',
    '{$post_tag}', '{$post_status}') ";

    $create_post_query = mysqli_query($connection, $query);

    confirm($create_post_query);

}

?>



    <form action="" method="post" enctype="multipart/form-data">


      <div class="form-group">
         <label for="title">Título del Anuncio</label>
          <input type="text" class="form-control" name="title">
      </div>

      <div class="form-group">
          <select name="post_category" id="">
            <?php
            $query= "SELECT * FROM categories";
            $select_categories = mysqli_query($connection,$query);
            confirm($select_categories);
            while($row = mysqli_fetch_assoc($select_categories)) {
                $cat_id = $row['cat_id'];
                $cat_title = $row['cat_title'];
            echo "<option value='{$cat_id}'>{$cat_title}</option>";
            }
            ?>
          </select>
      </div>

     <div class="form-group">
         <label for="title">Usuario</label>
         <input type="text" class="form-control" name="author">
     </div>

    <div class="form-group">
         <label for="post_status">Estado del anuncio</label>
         <input type="text" class="form-control" name="post_status">
     </div>

    <div class="form-group">
         <label for="post_image">Imágen principal</label>
         <input type="file" name="image">
     </div>

     <div class="form-group">
         <label for="post_tag">Tags</label>
         <input type="text" class="form-control" name="post_tag">
     </div>

      <div class="form-group">
         <label for="post_content">Descripción</label>
         <textarea name="post_content" id="body" cols="30" rows="10" class="form-control"></textarea>
     </div>

     <div class="form-group">

     <input type="submit" class="btn btn-primary" name="create_post" value="Publicar">

     </div>



</form>
