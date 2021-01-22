 <link rel="stylesheet" href="../assets/dist/admin/table.css">
 <link rel="stylesheet" href="../assets/dist/admin/datatables.net-bs/css/dataTables.bootstrap.min.css">
 <link rel="stylesheet" href="../assets/dist/admin/datatables.net-bs/css/buttons.dataTables.min.css">
 <link rel="stylesheet" href="../assets/dist/admin/bootstrap-fileinput.css">
<div class="row">
	<div class="col-md-12">
		<?php echo modules::run('adminlte/widget/box_open', ''); ?>
			<table id="blog-grid" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Game Name</th>
                        <th>Account Count</th>
                        <th style="text-align: right;">
                            Action
                            <a title="add" data-toggle="modal" data-target="#modal-add" class="add-row" onclick="$('#add-blog-id').val(0);$('#add-blog-name').val('');" aria-describedby="ui-tooltip-0"><span class="add-icon-custom"></span></a>
                        </th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
		<?php echo modules::run('adminlte/widget/box_close'); ?>
	</div>
</div>

<div class="modal modal-info fade" id="modal-add">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Origin Games</h4>
      </div>
      <div class="modal-body">
        <div class="row"><div class="col-md-12"><form class="form-horizontal">
        <div class="box box-info" style="border-top: none;background: none;">
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Game Name</label>

              <div class="col-sm-10">
                <input type="text" class="form-control" id="add-blog-name" placeholder="Game Name">
                <input type="hidden" class="form-control" id="add-blog-id" placeholder="Title">
              </div>
            </div>
        </div>
        </form></div></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="modal-cloase-button btn btn-outline pull-left" data-dismiss="modal">Close</button>
        <button type="button" onclick="addBlog();" class="btn btn-outline">Save</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
  <script src="../assets/dist/admin/bootstrap-fileinput.js"></script>
<script src="../assets/dist/admin/datatables.net-bs/jquery.dataTables.min.js"></script>
<script src="../assets/dist/admin/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>
<script>
var grid;
var cols=[];
function addBlog(){
    if ($("#add-blog-name").val() == '') {
        $("#add-blog-name").focus();
        return;
    }
    form_data = new FormData();
    form_data.append('id',  $("#add-blog-id").val());
    form_data.append('name', $("#add-blog-name").val());
    $.ajax({
        url: 'steam/originGamesSave',
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,
        type: 'POST',
        dataType: "text",
        success: function (response) {
            var res=JSON.parse(response);
            if(res.msg=='ok'){
                grid.ajax.reload();
                $('#modal-add').fadeOut(1000);
                $('.modal-cloase-button').trigger('click');
            }
        },
        error: function (xhr, textStatus, errorThrown) {

        }
    });
}
function editBlog(id,name){
    $('#add-blog-id').val(id);
    $('#add-blog-name').val(name);
}
function deleteBlog(id){
    form_data = new FormData();
    form_data.append('id',  id);
    $.ajax({
        url: 'steam/originGamesDelete',
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,
        type: 'POST',
        dataType: "text",
        success: function (response) {
            var res=JSON.parse(response);
            if(res.msg=='ok'){
                grid.ajax.reload();
            }
        },
        error: function (xhr, textStatus, errorThrown) {

        }
    });
}

cols.push({ "mData": 'id','visible':true,'bSearchable':false,'bSortable':false});
cols.push({ "mData": 'name','visible':true,'bSearchable':false,'bSortable':false});
cols.push({ "mData": 'cnt','visible':true,'bSearchable':false,'bSortable':false});
cols.push({ "mData": 'action','visible':true,'bSearchable':false,'bSortable':false});
$(document).ready(function(){
    var tblDef={
        "ajax": {
            url:'steam/GetOriginGamesList',
            dataSrc:"",
            "type" : "POST"
        },
        bJQueryUI: true,
        sPaginationType: 'full_numbers',
        aaSorting: [[0, 'asc']],
        aoColumns: cols,
        dom: 'Bfrtip'
    };
    grid = $('#blog-grid').DataTable(tblDef);
});
</script>