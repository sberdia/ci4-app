<body class="text-center">
    <div class="container mt-3">
        <div class="row justify-content-md-center">
            <div class="col-3">
                <?php $validation = \Config\Services::validation(); ?>
                <form method="post" id="formLogin" name="formLogin" action="<?= site_url('/login') ?>">

                    <img class="mb-3" src="assets/brand/logo.png" alt="" width="72" height="57">
                    <h1 class="h3 mb-3 fw-normal"><?php echo($str_login_titulo); ?></h1>
                    
                    <div class="form-floating mb-3">
                      <input type="text" class="form-control" id="inputLoginUsername" name="inputLoginUsername" placeholder="name@example.com">
                      <label for="floatingInput"><?php echo($str_login_username); ?></label>
                      <?php if($validation->getError('inputLoginUsername')) { ?>
                        <div class='alert alert-danger mb-3'>
                          <?= $error = $validation->getError('inputLoginUsername'); ?>
                        </div>
                      <?php } ?>
                    </div>
                    
                    <div class="form-floating mb-3">
                      <input type="password" class="form-control" id="inputLoginPassword"  name="inputLoginPassword" placeholder="Password">
                      <label for="floatingPassword"><?php echo($str_login_password); ?></label>
                      <?php if($validation->getError('inputLoginPassword')) { ?>
                        <div class='alert alert-danger mb-3'>
                          <?= $error = $validation->getError('inputLoginPassword'); ?>
                        </div>
                      <?php } ?> 
                    </div>

                    <div class="form-floating mb-3">
                      <button class="w-100 btn btn-lg btn-primary" type="submit"><?php echo($str_login_button_ingresar); ?></button>
                    </div>

                </form>
            </div>
        </div>
    </div>

