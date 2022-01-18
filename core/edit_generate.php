<?php
function gen_edit($table){
  $nopf = NoPrimaryField($table);
  $pf   = PrimaryField($table);

$string .= "
<?php
\$one = GetOne(\$data['$pf']);
?>
<div class=\"modal fade\" id=\"modal_edit_<?=\$data['$pf']?>\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"modal_createLabel\" aria-hidden=\"true\">
  <div class=\"modal-dialog\" role=\"document\">
    <div class=\"modal-content\">
      <div class=\"modal-header\">
        <h5 class=\"modal-title\" id=\"modal_createLabel\">Edit Data</h5>
        <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
          <span aria-hidden=\"true\">&times;</span>
        </button>
      </div>
      <div class=\"modal-body\">
           <form action='func.php' method='POST'>
             <input type='hidden' name='$pf' value=\"<?php echo \$data['$pf'];?>\">
          <?php
            foreach(\$one as \$data){?>
               ";
             foreach($nopf as $field){
                $string .="
                <div class=\"form-group\">
                  <label for=\"".$field['column_name']."\"> ".$field['column_name'].":</label>
                  <input type=\"text\" class=\"form-control\" id=\"".$field['column_name']."\" name='".$field['column_name']."' value=\"<?php echo \$data['".$field['column_name']."']; ?>\">
                </div>
            ";
            }
           $string .="
            <?php } ?>
            ";
            $string .= "
</div>
 <div class=\"modal-footer\">
        <button type=\"button\" class=\"btn btn-secondary\" data-dismiss=\"modal\">Close</button>
        <input type='submit' class=\"btn btn-primary\" name='update' value=\"Save changes\">
        </form>
      </div>
    </div>
  </div>
</div>
";

createFile($string, "../".$table."/edit.php");
}
?>
