<?php
if(isset($_GET['p_id'])){
    $the_post_id = $_GET['p_id'];
}
    $query = "SELECT * FROM post WHERE post_id = $the_post_id ";
    $select_post_by_id = mysqli_query($connection, $query);
    
    while($row = mysqli_fetch_assoc($select_post_by_id)){
        
        $post_id = $row['post_id'];
        $post_author = $row['post_author'];
        $post_title = $row['post_title'];
        $post_category_id = $row['post_category_id'];
        $post_status = $row['post_status'];
        $post_image = $row['post_image'];
        $post_tag = $row['post_tag'];
        $post_comment_count = $row['post_comment_count'];
        $post_date = $row['post_date'];
        $post_content = $row['post_content'];
    }

        if(isset($_POST['update_post'])){
                   
           
            $post_title = mysqli_real_escape_string($connection, $_POST['post_title']);
            $post_author = mysqli_real_escape_string($connection, $_POST['post_author']);
            $post_category_id = $_POST['post_category'];
            $post_status = $_POST['post_status'];
            $post_image = $_FILES['post_image']['name'];
            $post_image_temp = $_FILES['post_image']['tmp_name'];
            $post_tag = $_POST['post_tag'];
            $post_content = mysqli_real_escape_string($connection, $_POST['post_content']);
            
            // mysqli_real_escape_string para que acepte charts por defecto del usuario que esta navegando
            // para borrar espacios en blancos \r\n
           /*$post_content = str_replace("\r\n",'', $_POST['post_content']);*/


            

        
            move_uploaded_file($post_image_temp, "../images/$post_image");
            if(empty($post_image)){
                $query = "SElECT * FROM post WHERE post_id = $the_post_id ";
                $select_image = mysqli_query($connection, $query);
                
                
                while($row = mysqli_fetch_array($select_image)){
                    $post_image = $row['post_image'];
                }
                
            }
             
          $query = "UPDATE post SET ";
          $query .= "post_title = '$post_title', ";
          $query .= "post_category_id = $post_category_id, ";
          $query .= "post_date = now(), ";
          $query .= "post_author = '$post_author', ";
          $query .= "post_status = '$post_status', ";
          $query .= "post_tag = '$post_tag', ";
          $query .= "post_content = '$post_content', ";
          $query .= "post_image = '$post_image' ";
          $query .= "WHERE post_id = '$the_post_id' "; 
          $update_post = mysqli_query($connection, $query);

          if(!$update_post) {
            die('QUERY FAILED! ' . mysqli_error($connection));
            //die($query);
            }else{
                  echo "<h4 class='bg-success'>Update Exitoso. 
                  <br><a href='../post.php?p_id={$the_post_id}'>Ver Anuncio</a>
                  <br><a href='posts.php'>Volver a pagina editar</a></h4>";
                 
                 }      
        }
?>   
     <form action="" method="post" enctype="multipart/form-data">     
      <div class="form-group">
         <label for="title">Titulo</label>
          <input  value="<?php echo $post_title;?>" type="text" class="form-control" name="post_title">
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
         <label for="title">Publicador</label>
         <input value="<?php echo $post_author;?>" type="text" class="form-control" name="post_author">
     </div>
     
     <div class="form-group">
     <select name="post_status" id="">
         <option value='<?php echo $post_status ?>'><?php echo $post_status; ?></option>
         
         <?php
         if($post_status == 'publicar'){
             echo "<option value='borrador'>Borrador</option>";
         }else{
             echo "<option value='publicar'>Publicar</option>";

         }
         
         ?>
     </select>
    </div>
    <div class="form-group">
    <img width="100" height="100" src="../images/<?php echo $post_image;?>" alt="">
    <input type="file" name="post_image">
     </div>
     <div class="form-group">
         <label for="post_tag">Post Tags</label>
         <input value="<?php echo $post_tag;?>" type="text" class="form-control" name="post_tag">
     </div>
      <div class="form-group">
         <label for="post_content">Post Content</label>
         <textarea  name="post_content" id="body" cols="30" rows="10" class="form-control"><?php echo $post_content;?>       
         </textarea>
     </div>
     <div class="form-group">
     <input type="submit" class="btn btn-primary" name="update_post" value="Update Post">
     </div>     
</form>