<?php
function confirm($result)
{       
        global $connection;
        if(!$result){
        echo die("Fallo de query" . mysqli_error($connection));
    }
    
}





function insert_categories(){
                global $connection;
                if(isset($_POST['submit'])) {
                $cat_title = $_POST['cat_title'];

                //trim quita los espacios en blanco, en este caso verifica si se ingresaron muchos
                //espacios blancos los elimina.

                if(trim($cat_title) == "" || empty($cat_title)){
                echo "Debe ingresar algun valor";
                } else{
                $query = "INSERT INTO categories(cat_title) ";
                $query .= "VALUE('{$cat_title}')";

                $create_category_query = mysqli_query($connection, $query);

                if(!$create_category_query){
                die('Error de Query' . mysqli_error($connection));
                        }
                    }
            }
}

function findAllCategories(){
   global $connection;
$query = "SELECT * FROM categories";
//query opcional para mostrar un limite de categorias
//$query = "SELECT * FROM categories LIMIT 3";
$select_categories = mysqli_query($connection, $query);
                                
                                
while($row = mysqli_fetch_assoc($select_categories)){
$cat_id = $row['cat_id'];
$cat_title = $row['cat_title'];

echo "<tr>";
echo "<td>{$cat_id}</td>";
echo "<td>{$cat_title}</td>";
// Con el ? estamos seperando el final de categories.php para pasarle una llave delete    
echo "<td><a href='categories.php?delete={$cat_id}'>BORRAR</a></td>";
echo "<td><a href='categories.php?edit={$cat_id}'>Editar</a></td>";
echo "</tr>";
    }
}


function deleteCategories(){
    global $connection;
    if(isset($_GET['delete'])){
    $the_cat_id = $_GET['delete'];    
    $query = "DELETE FROM categories WHERE cat_id = {$the_cat_id} ";
    $delete_query = mysqli_query($connection, $query);
    header("Location: categories.php");
    }  
}


?>