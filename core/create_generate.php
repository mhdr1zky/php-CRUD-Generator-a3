<?php
function gen_create($table){
$string .= "

  <button type='button' class=\"btn btn-default\" data-toggle=\"modal\" data-target=\"#modal_create\">
                  Tambah Data
                </button>

<div class=\"modal fade\" id=\"modal_create\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"modal_createLabel\" aria-hidden=\"true\">
  <div class=\"modal-dialog\" role=\"document\">
    <div class=\"modal-content\">
      <div class=\"modal-header\">
        <h5 class=\"modal-title\" id=\"modal_createLabel\">Create Data</h5>
        <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
          <span aria-hidden=\"true\">&times;</span>
        </button>
      </div>
      <div class=\"modal-body\">
           <form action='func.php' method='POST'>
          ";
            $nopf = NoPrimaryField($table);
            foreach($nopf as $field){
              $string .="
              <div class=\"form-group\">
                <label for=\"".$field['column_name']."\"> ".$field['column_name'].":</label>
                <input type=\"text\" class=\"form-control\" id=\"".$field['column_name']."\" name='".$field['column_name']."' placeholder='".$field['column_name']."'>
              </div>
              ";
            }
          $string .= "
</div>
 <div class=\"modal-footer\">
        <button type=\"button\" class=\"btn btn-secondary\" data-dismiss=\"modal\">Close</button>
        <input type='submit' class=\"btn btn-primary\" name='insert' value=\"Save changes\">
        </form>
      </div>
    </div>
  </div>
</div>


";
createFile($string, "../".$table."/create.php");
}
?>
