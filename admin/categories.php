<?php include "includes/admin_header.php";?>


    <div id="wrapper">

        <!-- Navigation -->

        <div id="page-wrapper">
         <?php include "includes/admin_navigation.php";?>

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Administrar Anuncios
                            <small>Cambiemos</small>
                        </h1>


                        <div class="col-xs-6">

                        <!--para añadir categorias en el admin-->
                        <?php insert_categories();?>

                        <!--Form Para Añadir Categorias-->
                        <form action="" method="post">
                         <div class="form-group">
                            <label for="cat_title">Añadir Categorías</label>
                             <input class="form-control" type="text" name="cat_title">
                         </div>
                              <div class="form-group">
                             <input class="btn btn-primary" type="submit" name="submit" value="Añadir Categoría">
                         </div>
                        </form>

                        <!--Form Para Editar Categorias-->

                           <?php // UPDATE AND INCLUDE QUERY
                        if(isset($_GET['edit'])){
                            $cat_id = $_GET['edit'];

                            include "includes/update_categories.php";
                        }


                        ?>

                        </div>
                        <div class="col-xs-6">

                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th> Id </th>
                                    <th> Categoría</th>
                                </tr>
                            </thead>
                            <tbody>
<!--Query Para Encontrar las categorias-->
<?php findAllCategories(); ?>
<!--Query Para Borrar-->
<?php deleteCategories(); ?>

                            </tbody>
                        </table>
                        </div>

                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

   <?php include "includes/admin_footer.php";?>
