<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php echo e(__('Installer')); ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo e(asset('uploads/favicon.ico')); ?>">
    <!-- Place favicon.ico in the root directory -->

   <!-- CSS here -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/installer/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/installer/css/fontawesome-all.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/installer/css/font.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/installer/css/default.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/installer/css/style.css')); ?>">
</head>
<body class="install">
        <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

    <!-- loader seaction start -->
    <section class="loading_bar">
        <div class="load">
            <div class="fusion-slider-loading">
            </div>
            <div>
                <h3 class="install-info"></h3>
                <div class="back-btn d-flex justify-content-center">
                    <a class="back btn d-none" href="<?php echo e(route('install.info')); ?>">Try Again</a>
                </div>
            </div>
        </div>
    </section>
    <!-- loader seaction start -->

    <!-- requirments-section-start -->
    <section class="pt-50 pb-50">
        <div class="requirments-section">
            <div class="content-requirments d-flex justify-content-center">
                <div class="requirments-main-content">
                    <div class="installer-header text-center">
                        <h2><?php echo e(__('Configuration')); ?></h2>
                        <p><?php echo e(__('Please enter your database connection details')); ?></p>
                    </div>
                 <div class="alert alert-success d-none" role="alert">
                     
                 </div>
                 <form action="<?php echo e(url('install/store')); ?>" method="POST" id="install">
                    <?php echo csrf_field(); ?>
                      <div class="custom-form install-form">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="app_name"><?php echo e(__('App Name')); ?></label>
                                    <input type="text" class="form-control" id="app_name" name="app_name" required placeholder="App Name without space">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="type"><?php echo e(__('Installation Type')); ?></label>
                                    <select class="form-control" name="type" id="type">
                                        <option value="install" style="background-color: black;color: #fff"><?php echo e(__('I Want To Install')); ?></option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="db_connection"><?php echo e(__('Database Connection')); ?></label>
                                    <input type="text" value="mysql" class="form-control" id="db_connection" name="db_connection" required placeholder="Database Connection">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="db_host"><?php echo e(__('Database Host')); ?></label>
                                    <input type="text" value="localhost" class="form-control" id="db_host" name="db_host" required placeholder="Database Host">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="db_port"><?php echo e(__('Database Port')); ?></label>
                                    <input type="text" value="3306" class="form-control" id="db_port" name="db_port" required placeholder="Database Port">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="db_name"><?php echo e(__('Database Name')); ?></label>
                                    <input type="text" class="form-control" id="db_name" name="db_name" required placeholder="Database Name">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="db_user"><?php echo e(__('Database Username')); ?></label>
                                    <input type="text" class="form-control" id="db_user" name="db_user" required placeholder="Database Username">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="db_pass"><?php echo e(__('Database Password')); ?></label>
                                    <input type="text" class="form-control" id="db_pass" name="db_pass" placeholder="Database Password">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="hidden" value="<?php echo e(url('/')); ?>" class="form-control none" id="app_url" name="app_url" required placeholder="App Url">
                                    <input type="hidden" id="migrate_url" value="<?php echo e(route('install.migrate')); ?>">
                                    <input type="hidden" id="seed_url" value="<?php echo e(route('install.seed')); ?>">
                                    <input type="hidden" id="check_url" value="<?php echo e(route('install.check')); ?>">
                                    <input type="hidden" id="home_url" value="<?php echo e(url('/')); ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary install-btn f-right"><?php echo e(__('Save & Install')); ?></button>
                </form>
                </div>
            </div>
        </div>
    </section>
    <!-- requirments-section-end -->
    <script src="<?php echo e(asset('assets/installer/js/vendor/jquery-3.5.1.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/installer/js/install/install.js')); ?>"></script>
</body>
</html>
<?php /**PATH D:\Work\dokan\Dokan\files\script\resources\views/installer/info.blade.php ENDPATH**/ ?>