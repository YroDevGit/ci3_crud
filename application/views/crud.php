<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CRUD</title>
  <link rel="shortcut icon" type="image/png" href="/public/src/assets/images/logos/favicon.png" />
  <link rel="stylesheet" href="/public/src/assets/css/styles.min.css" />
  <link rel="stylesheet" href="/public/src/assets/css/todax.css" />
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    <aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="./index.html" class="text-nowrap logo-img">
            <h1>BASIC CRUD</h1>
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
          </div>
        </div>
        <!-- Sidebar navigation-->
        
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
      
      <!--  Header End -->
      <div class="container-fluid">
        <!--  Row 1 -->
       
<?php include "public/components.php"; ?>

        <div class="row">
          <div class="col-lg-4 d-flex align-items-stretch">
            <div class="card w-100">
                <div class="card">
                    <div class="card-body">
                        <div align='center'>
                            <div>
                                <h3>Add project</h3>
                            </div>
                        </div>
                      <form method="post" action="<?= site_url('crud/addProject') ?>">
                      <div align='center'>
                            <?php if($this->session->flashdata('msg')):?>
                                <?php showSuccess(); ?>
                            <?php endif; ?>
                            </div>

                            <div align='center'>
                            <?php if($this->session->flashdata('deleted')):?>
                                <?php showDeleted(); ?>
                            <?php endif; ?>
                            </div>

                            <div align='center'>
                            <?php if($this->session->flashdata('updated')):?>
                                <?php showMessage("Data Updated", "✔"); ?>
                            <?php endif; ?>
                            </div>
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Project</label>
                          <input type="text" name="project" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                          <div id="emailHelp" class="form-text">
                          <?php if (isset($validation_errors)) : ?>
                            <div class="text-danger">
                                <?php echo form_error('project'); ?>
                            </div>
                             <?php endif; ?>
                          </div>
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Assignee</label>
                            <input type="text" name="assignee" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            <div id="emailHelp" class="form-text">
                            <?php if (isset($validation_errors)) : ?>
                            <div class="text-danger">
                            <?php echo form_error('assignee'); ?>
                            </div>
                            <?php endif; ?>
                            </div>
                          </div>

                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Priority</label>
                            <select name="priority" class='form-control' id="">
                                <option value="1">Low</option>
                                <option value="2">High</option>
                                <option value="3">Most priority</option>
                            </select>
                            <div id="emailHelp" class="form-text"></div>
                          </div>

                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Budget</label>
                            <input type="text" name="budget" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            <div id="emailHelp" class="form-text">
                            <?php if (isset($validation_errors)) : ?>
                            <div class="text-danger">
                                <?php echo form_error('budget'); ?>
                            </div>
                            <?php endif; ?>   
                            </div>
                          </div>
                        
                          
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                    </div>
                  </div>
            </div>
          </div>
          <div class="col-lg-8 d-flex align-items-stretch">
            <div class="card w-100">
              <div class="card-body p-4">
                <div><h5 class="card-title fw-semibold mb-4">Projects List</h5></div>
                <div class="col-lg-4"><input id="search" onkeyup="showProjects()" class="form-control" placeholder="Search name..." type="search"></div>
                <div id="table"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php if(isset($update_error)): ?>
  <?php showError($update_error); ?>              
  <?php endif; ?>


  <script src="/public/src/assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="/public/src/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="/public/src/assets/js/sidebarmenu.js"></script>
  <script src="/public/src/assets/js/app.min.js"></script>
  <script src="/public/src/assets/libs/apexcharts/dist/apexcharts.min.js"></script>
  <script src="/public/src/assets/libs/simplebar/dist/simplebar.js"></script>
  <script src="/public/src/assets/js/dashboard.js"></script>
  <script src="/public/src/assets/js/js.js"></script>
</body>

</html>

<script>
  //Show/Search project
    function showProjects(){
        var search = document.getElementById('search').value;
        CreateDataContent("table", "/crud/displayProjects?q="+search, "GET");
    }

    function closeTupdate(){
      document.getElementById('tupdate').style.display='none';
    }
    function openTupdate(){
      document.getElementById('tupdate').style.display='';
    }
    
    showProjects();
</script>

