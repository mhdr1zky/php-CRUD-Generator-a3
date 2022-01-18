<?php 

if (!file_exists('config/conn.php')) {
  //setting ur url Project
define ("BASE_URL","./");
}
if (file_exists('config/conn.php')) {
  include_once 'config/conn.php';
}

require_once 'template/header.php';

if (file_exists('config/conn.php')) {
  require_once 'template/aside.php';
}

?>

<?php
require_once 'core/function.php';
if(isset($_GET['delete'])){
  rmdirs($_GET['delete']);
}
function rmdirs($s_d){
	$s_f = glob($s_d . '*', GLOB_MARK);
	foreach($s_f as $s_z){
		if(is_dir($s_z)) rmdirs($s_z);
		else unlink($s_z);
	}
	if(is_dir($s_d)) rmdir($s_d);
}
$s_fname = array();
$s_dname = array();
$s_cwd = ".";
if(function_exists("scandir") && $s_dh = @scandir($s_cwd)){
  foreach($s_dh as $s_file){
    if(is_dir($s_file)) $s_dname[] = $s_file;
    elseif(is_file($s_file)) $s_fname[] = $s_file;
  }
}
else{
  if($s_dh = @opendir($s_cwd)){
    while($s_file = readdir($s_dh)){
      if(is_dir($s_file)) $s_dname[] = $s_file;
      elseif(is_file($s_file))$s_fname[] = $s_file;
    }
    closedir($s_dh);
  }
}

?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>PHP CRUD GENERATOR</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">PHP CRUD GENERATOR</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <?php 
          if (file_exists('config/conn.php')) {
               echo "<h3 class=\"card-title\">Click Here down For Reset Settings</h3>";
              } else {
                 echo "<h3 class=\"card-title\">Settings Not Exists Please Input</h3>";
              }

              ?>
          

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body">


      <?php
      if(is_file("config/conn.php")){
        if(!Connect()){ ?>
          <div class="col-sm-12">
            <div class="panel panel-danger">
              <div class="panel-heading">
                Remove Config
              </div>
              <div class="panel-body">
                <p>
                  Config untuk koneksi ke database telah dibuat.<br>
                  Namun terjadi kesalahan yang mengakibatkan tidak terhubungnya database ke system ini.<br>
                  Silahkan ubah data pada config/conn.php untuk memperbaikinya<br>
                  Atau hapus dan buat ulang menggunakan button ini ==> <a href="?delete=config" class="btn btn-danger btn-sm"> Hapus </a>
                </p>

              </div>
            </div>
          </div>

        <?php }else{ ?>
          <div class="col-sm-12">
            <div class="col-sm-6">
              <div class="panel panel-primary">
            <a href="?delete=config" class="btn btn-danger btn-sm" onClick="javascript:return confirm('Your All Setting is reset are you sure ? CLick Ok!');">Reset Setting !!</a>

                <div class="panel-body">
                  <form action="core/generate.php" method="post">
                    
                     <div class="panel-heading">
                  Generate One By One :
                </div>
                    <select  name="table" class="form-control">
                      <option value="">Please Select</option>
                      <?php
                        $Table = Table();
                        foreach ($Table as $key) {
                          echo "<option value='".$key['table_name']."'> ".$key['table_name']."</option>";
                        }
                      ?>
                    </select>
                    <br>
                    <input type="submit" name="generate" value="Generate" class="btn btn-info">
                  </form>
                </div>
              </div>
            </div>

            <div class="col-sm-6">
              <div class="panel panel-primary">
                <div class="panel-heading">
                  Generate All
                </div>
                <div class="panel-body">
                  <form action="core/generate.php" method="post">
                    <input type="submit" name="all" value="Generate All CRUD" class="btn btn-danger ">
                  </form>
                </div>
              </div>
            </div>
          </div>


        <?php }
      } else{ ?>
        <div class="col-sm-12">
          <div class="panel panel-primary">
            <div class="panel-heading">
              Create Database Connection
            </div>
            <div class="panel-body">
              <form class="form-horizontal" action="core/generate.php" method="post">
                <div class="form-group">
                  <label class="control-label col-sm-4" for="hostname">Hostname</label>
                  <div class="col-sm-8">
                    <input type="text" name='host' class="form-control" id="hostname" placeholder="localhost">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-4" for="dbname">Database Name</label>
                  <div class="col-sm-8">
                    <input type="text" name='dbname' class="form-control" id="dbname" placeholder="">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-4" for="dbuser">Database User</label>
                  <div class="col-sm-8">
                    <input type="text" name='dbuser' class="form-control" id="dbuser">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-4" for="dbpwd">Database Password</label>
                  <div class="col-sm-8">
                    <input type="text" name='dbpwd' class="form-control" id="dbpwd" placeholder="">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-4" for="baseurl">Set if file not is root folder server </label>
                  <div class="col-sm-8">
                    <input type="text" name='baseurl' class="form-control" id="baseurl" placeholder="\folder\subfolder">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-4"></div>
                  <div class="col-sm-4">
                    <button type="submit" name="genConf" class="btn btn-warning">Generate Config File</button>
                  </div>
                  <div class="col-sm-4"></div>
                </div>
              </form>
            </div>
          </div>
        </div>
      <?php } ?>


      <div class="col-sm-12">
        <div class="panel panel-primary">
          <div class="panel-heading">
           <b> Daftar Folder</b>
          </div>
          <div class="panel-body">

            <div class="table-responsive">

              <table class="table table-hover">
                <tbody>
                  <tr>

                    <?php
                    foreach ($s_dname as $folders) {

                      if($folders == "core" ||
                      $folders == ".." ||
                      $folders == "." ||
                      $folders == ".git" ||
                      $folders == "bootstrap-3.3.7-dist" ||
                      $folders == "assets" ||
                      $folders == "php-CRUD-Generator-ori" ||
                       $folders == "template" ||
                      $folders == "config" ){}
                      else{
                        // bikin link :
                        ?>
                        <td>
                          <a class="btn btn-warning btn-sm" href="<?php echo $folders;?>"><i class="fas fa-folder"></i> <?php echo $folders;?></a>
                        </td>
                        <td>

                          <a href="?delete=<?php echo $folders; ?>" class="btn btn-danger btn-sm"> Delete</a>
                        </td>
                      </tr>
                        <?php
                      }
                    }
                     ?>
                </tbody>
              </table>
            </div>
</div>
        <!-- /.card-body -->
        <div class="card-footer">
       
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  
    <!-- <script src="bootstrap-3.3.7-dist/js/bootstrap.min.js" /> -->
 
<?php 
require_once 'template/footer.php';?>