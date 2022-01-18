<?php
function gen_read($table){
  $nopf = NoPrimaryField($table);
  $pf   = PrimaryField($table);
$string ="
<?php
require_once '../config/conn.php';
require_once '../template/header_tabel.php';
require_once '../template/aside.php';
require_once 'func.php';

?>
<div class=\"content-wrapper\">
    <section class=\"content-header\">
      <div class=\"container-fluid\">
        <div class=\"row mb-2\">
          <div class=\"col-sm-6\">
            <h1>".ucwords($table)."</h1>
          </div>
          <div class=\"col-sm-6\">
            <ol class=\"breadcrumb float-sm-right\">
              <li class=\"breadcrumb-item\"><a href=''>Home</a></li>
              <li class=\"breadcrumb-item active\">".ucwords($table)."</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <section class=\"content\">
      <div class=\"container-fluid\">
        <div class=\"row\">
          <div class=\"col-12\">
            <div class=\"card\">
        <div class=\"card-header\">
          <h3 class=\"card-title\">".ucwords($table)."</h3>
        </div>

        <div class=\"card-body\">

<?php  
// there for call modal form create data
require_once 'create.php';?>
  
     <table id=\"example1\" class=\"table table-bordered table-striped\">
    <thead>
      <tr>
      <th>No</th>
    ";
        foreach ($nopf as $th) {
         $string .= "<th>".$th['column_name']."</th> \n";
        }
    $string .= "
      <th>Opsi</th>
      </tr>
      </thead>
      <tbody> 
    <?php
      \$ga = GetAll();
      \$no = 1;
      foreach(\$ga as \$data){?>
       <tr>
       <td><?=\$no++?></td>\n";

        foreach ($nopf as $field) {
          $string .="<td><?=\$data['".$field['column_name']."']?></td>\n";
        }
    $string .= "
               <td>
                <form method='POST' action='func.php'>
                <input type='hidden' name='$pf' value='<?=\$data['$pf']?>'>
              <span><button type='button' class=\"btn btn-default btn-xs\" data-toggle=\"modal\" data-target=\"#modal_edit_<?=\$data['$pf']?>\"><i class=\"fa fa-edit\"></i>
                </button><?php  
// there for call modal form edit data
require_once 'edit.php';?>
                <button class='btn btn-warning btn-xs' type='submit' name='duplicate' onClick=\"javascript:return confirm('Copy Data ? CLick Ok!');\"><i class=\"fa fa-copy\"></i></button>
               <button class='btn btn-danger btn-xs' type='submit' name='delete' onClick=\"javascript:return confirm('are u sure want delet this ?');\"><i class=\"fa fa-trash\"></span>
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

      ";

    $string .="
</section>
  </div>
<?php require_once '../template/footer_tabel.php';?>

";
createFile($string, "../".$table."/index.php");
}
?>
