<?php
use App\View\View;
use App\View\Form;
?>

<?php include __DIR__ . '/../sections/header-login.php'; ?>

<div class="login-page">
    <div class="container">
        <div class="login-logo text-center visible-xs">
            <img src="assets/img/logo-white.png" >
        </div>
        <div class="row">
            <div class="col-md-5 col-md-push-7 col-sm-5 col-sm-push-7">
                <div class="panel panel-default login-panel register-panel">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <i class="fa fa-pencil"></i> Register
                        </div>
                    </div>
                    <div class="panel-body">
                        <form id="form_register" action="#" method="POST">
                            <div class="form-group">
                                <label class="control-label">Full Name</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="text" name="name" class="form-control" placeholder="Nama Lengkap" required />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Username</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="text" name="username" class="form-control" placeholder="username" required />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Email</label>
                                <div class="input-group">
                                    <span class="input-group-addon">@</span>
                                    <input type="email" name="email" class="form-control" placeholder="email" required />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">HP / Telp.</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                    <input type="text" name="telp" class="form-control" placeholder="HP / Telp" required />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Password</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                    <input type="password" id="reg_password" name="password" class="form-control" placeholder="password" required />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Konfirmasi Password</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                    <input type="password" name="conf_password" class="form-control" placeholder="password" required />
                                </div>
                            </div>
                            <div class="text-center">
                                <input type="submit" name="login" value="Register" class="btn btn-default" />
                            </div>

                            <?php echo Form::formToken(); ?>

                        </form>
                    </div>
                    <div class="panel-footer text-right">
                        Sudah punya akun? Silahkan <a href="./login.php">Login <i class="fa fa-sign-in"></i> </a>
                    </div>
                </div>
            </div>
            <div class="col-md-7 col-md-pull-5 col-sm-7 col-sm-pull-5">
                <div class="login-logo hidden-xs">
                    <img src="assets/img/logo-white.png" >
                </div>
                <div class="login-content">
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis 
                    </p>
                    <p>
                        Curabitur pretium tincidunt lacus. Nulla gravida orci a odio. Nullam varius, turpis et commodo pharetra, est eros bibendum elit, nec luctus magna felis sollicitudin mauris. Integer in mauris eu nibh euismod gravida. Duis ac tellus et risus vulputate vehicula. Donec lobortis risus a elit. Etiam tempor. Ut ullamcorper, ligula eu tempor congue
                    </p>

                </div>
            </div>
        </div>
    </div>
</div>


<?php include __DIR__ . '/../sections/footer-login.php'; ?>
        