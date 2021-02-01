<?php ob_start(); ?>

<div style="background:silver;">

    <div class="container mt-5">
        <div class="d-flex justify-content-center h-100">
            <div class="card">
                <div class="card-header">
                    <h3>Login</h3>
                </div>
                <div class="card-body">
                    <form name='login' method='POST' action=''>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="usuario" name='usu' required>

                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" class="form-control" placeholder="contraseña" name='pass' required>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Login" class="btn float-right btn-success" name='ok'>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php
        if (isset($error)) {
            echo "<div class='mt-3 text-danger font-weight-bold text-lg'>";
            echo $error;
            echo "</div>";
        }
        ?>
    </div>

</div>

<?php $contenido = ob_get_clean(); ?>
<?php include 'base.php' ?>