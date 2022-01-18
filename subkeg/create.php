

  <button type='button' class="btn btn-default" data-toggle="modal" data-target="#modal_create">
                  Tambah Data
                </button>

<div class="modal fade" id="modal_create" tabindex="-1" role="dialog" aria-labelledby="modal_createLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal_createLabel">Create Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
           <form action='func.php' method='POST'>
          
              <div class="form-group">
                <label for="sub_pagu"> sub_pagu:</label>
                <input type="text" class="form-control" id="sub_pagu" name='sub_pagu' placeholder='sub_pagu'>
              </div>
              
              <div class="form-group">
                <label for="sub_nodpa"> sub_nodpa:</label>
                <input type="text" class="form-control" id="sub_nodpa" name='sub_nodpa' placeholder='sub_nodpa'>
              </div>
              
              <div class="form-group">
                <label for="sub_nama"> sub_nama:</label>
                <input type="text" class="form-control" id="sub_nama" name='sub_nama' placeholder='sub_nama'>
              </div>
              
              <div class="form-group">
                <label for="sub_jenis"> sub_jenis:</label>
                <input type="text" class="form-control" id="sub_jenis" name='sub_jenis' placeholder='sub_jenis'>
              </div>
              
              <div class="form-group">
                <label for="id_keg"> id_keg:</label>
                <input type="text" class="form-control" id="id_keg" name='id_keg' placeholder='id_keg'>
              </div>
              
              <div class="form-group">
                <label for="alias"> alias:</label>
                <input type="text" class="form-control" id="alias" name='alias' placeholder='alias'>
              </div>
              
</div>
 <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type='submit' class="btn btn-primary" name='insert' value="Save changes">
        </form>
      </div>
    </div>
  </div>
</div>


