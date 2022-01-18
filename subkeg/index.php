
<?php
require_once '../config/conn.php';
require_once '../template/header_tabel.php';
require_once '../template/aside.php';
require_once 'func.php';

?>
<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Subkeg</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href=''>Home</a></li>
              <li class="breadcrumb-item active">Subkeg</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
        <div class="card-header">
          <h3 class="card-title">Subkeg</h3>
        </div>

        <div class="card-body">

<?php  
// there for call modal form create data
require_once 'create.php';?>
  
     <table id="example1" class="table table-bordered table-striped">
    <thead>
      <tr>
      <th>No</th>
    <th>sub_pagu</th> 
<th>sub_nodpa</th> 
<th>sub_nama</th> 
<th>sub_jenis</th> 
<th>id_keg</th> 
<th>alias</th> 

      <th>Opsi</th>
      </tr>
      </thead>
      <tbody> 
    <?php
      $ga = GetAll();
      $no = 1;
      foreach($ga as $data){?>
       <tr>
       <td><?=$no++?></td>
<td><?=$data['sub_pagu']?></td>
<td><?=$data['sub_nodpa']?></td>
<td><?=$data['sub_nama']?></td>
<td><?=$data['sub_jenis']?></td>
<td><?=$data['id_keg']?></td>
<td><?=$data['alias']?></td>

               <td>
                <form method='POST' action='func.php'>
                <input type='hidden' name='sub_id' value='<?=$data['sub_id']?>'>
              <span><button type='button' class="btn btn-default btn-xs" data-toggle="modal" data-target="#modal_edit_<?=$data['sub_id']?>"><i class="fa fa-edit"></i>
                </button>
                

<div class="modal fade" id="modal_edit_<?=$data['sub_id']?>" tabindex="-1" role="dialog" aria-labelledby="modal_createLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal_createLabel">Edit Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
           <form action='func.php' method='POST'>
             <input type='hidden' name='sub_id' value="<?php echo $data['sub_id'];?>">
          
               
                <div class="form-group">
                  <label for="sub_pagu"> sub_pagu:</label>
                  <input type="text" class="form-control" id="sub_pagu" name='sub_pagu' value="<?php echo $data['sub_pagu']; ?>">
                </div>
            
                <div class="form-group">
                  <label for="sub_nodpa"> sub_nodpa:</label>
                  <input type="text" class="form-control" id="sub_nodpa" name='sub_nodpa' value="<?php echo $data['sub_nodpa']; ?>">
                </div>
            
                <div class="form-group">
                  <label for="sub_nama"> sub_nama:</label>
                  <input type="text" class="form-control" id="sub_nama" name='sub_nama' value="<?php echo $data['sub_nama']; ?>">
                </div>
            
                <div class="form-group">
                  <label for="sub_jenis"> sub_jenis:</label>
                  <input type="text" class="form-control" id="sub_jenis" name='sub_jenis' value="<?php echo $data['sub_jenis']; ?>">
                </div>
            
                <div class="form-group">
                  <label for="id_keg"> id_keg:</label>
                  <input type="text" class="form-control" id="id_keg" name='id_keg' value="<?php echo $data['id_keg']; ?>">
                </div>
            
                <div class="form-group">
                  <label for="alias"> alias:</label>
                  <input type="text" class="form-control" id="alias" name='alias' value="<?php echo $data['alias']; ?>">
                </div>
            
</div>
 <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type='submit' class="btn btn-primary" name='update' value="Save changes">
        </form>
      </div>
    </div>
  </div>
</div>
                <button class='btn btn-warning btn-xs' type='submit' name='duplicate' onClick="javascript:return confirm('Copy Data ? CLick Ok!');"><i class="fa fa-copy"></i></button>
               <button class='btn btn-danger btn-xs' type='submit' name='delete' onClick="javascript:return confirm('are u sure want delet this ?');"><i class="fa fa-trash"></span>
                </form>
                </td>
                </tr>
                <?php } ?>
        </tfoot>
                </table>
              </div>
           </div>
         </div>
      </div>
  </div>

      
</section>
  </div>
<?php require_once '../template/footer_tabel.php';?>

