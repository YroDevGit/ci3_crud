<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title> 
  <link rel="shortcut icon" type="image/png" href="/public/src/assets/images/logos/favicon.png" />
  <link rel="stylesheet" href="/public/src/assets/css/styles.min.css" />
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div
      class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
          <div class="col-md-8 col-lg-6 col-xxl-3">
            <div class="card mb-0">
              <div class="card-body">
                <a href="./index.html" class="text-nowrap logo-img text-center d-block py-3 w-100">
                  <h1>LOGIN</h1>
                </a>
                
                <p class="text-center">Your Social Campaigns</p>
               <form action="<?= site_url('login/process') ?>" method="post">
               <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Username</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="username" aria-describedby="emailHelp">
                  <div>
                  <?php if (isset($validation_errors)) : ?>
                    <div class="text-danger">
                        <?php echo form_error('username'); ?>
                    </div>
                    <?php endif; ?>
                  </div>
                </div>
                  <div class="mb-4">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="exampleInputPassword1">
                    <div>
                    <?php if (isset($validation_errors)) : ?>
                    <div class="text-danger">
                        <?php echo form_error('username'); ?>
                    </div>
                    <?php endif; ?>
                    </div>
                  </div>
                  <div class="d-flex align-items-center justify-content-between mb-4">
                    
                    </div>
                    <div align='center'>
                    <?php if(isset($error)):?>
                        <h5 class="text-danger"><?= $error; ?></h5>
                    <?php endif; ?>
                </div>
                  </div>
                  <button class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2" type="submit">LOGIN</button>
                  

               </form>
                  
               
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="public/src/assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="public/src/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>