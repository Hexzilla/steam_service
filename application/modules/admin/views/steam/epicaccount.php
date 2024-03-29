 <link rel="stylesheet" href="../assets/dist/admin/table.css">
 <link rel="stylesheet" href="../assets/dist/admin/datatables.net-bs/css/dataTables.bootstrap.min.css">
 <link rel="stylesheet" href="../assets/dist/admin/datatables.net-bs/css/buttons.dataTables.min.css">
 <link rel="stylesheet" href="../assets/dist/admin/bootstrap-fileinput.css">
 <link rel="stylesheet" href="../assets/dist/admin/select2.min.css">
<div class="row">
	<div class="col-md-12">
		<?php echo modules::run('adminlte/widget/box_open', ''); ?>
			<table id="blog-grid" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Gmail</th>
                        <th>Password</th>
                        <th>Using Customs</th>
                        <th>id</th>
                        <th style="text-align: right;">
                            Action
                            <a title="add" data-toggle="modal" data-target="#modal-add" class="add-row" onclick="$('#add-blog-id').val(0);$('#add-blog-name').val('');$('#add-blog-gmail').val('');$('#add-blog-password').val('');" aria-describedby="ui-tooltip-0"><span class="add-icon-custom"></span></a>
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
        <h4 class="modal-title">EPIC Account Diolog</h4>
      </div>
      <div class="modal-body">
        <div class="row"><div class="col-md-12"><form class="form-horizontal">
        <div class="box box-info" style="border-top: none;background: none;">
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Name</label>

              <div class="col-sm-10">
                <input type="text" class="form-control" id="add-blog-name" placeholder="Name">
                <input type="hidden" class="form-control" id="add-blog-id" placeholder="Title">
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Gmail</label>

              <div class="col-sm-10">
                <input type="text" class="form-control" id="add-blog-gmail" placeholder="Gmail">
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Password</label>

              <div class="col-sm-10">
                <input type="text" class="form-control" id="add-blog-password" placeholder="Password">
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
<script src="../assets/dist/admin/select2.full.min.js"></script>

<style>
tr div.expand {
  width: 20px;
  height: 20px;
  background-image: url('http://www.datatables.net/release-datatables/examples/examples_support/details_open.png');
}

tr div.open {
  background-image: url('http://www.datatables.net/release-datatables/examples/examples_support/details_close.png');  
}
</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>
<script>
$('.select2').select2();
var grid;
var cols=[];
function addBlog(){
    if ($("#add-blog-name").val() == '') {
        $("#add-blog-name").focus();
        return;
    }
    if ($("#add-blog-gmail").val() == '') {
        $("#add-blog-gmail").focus();
        return;
    }
    if ($("#add-blog-password").val() == '') {
        $("#add-blog-password").focus();
        return;
    }
    var form_data = new FormData();
    form_data.append('id',  $("#add-blog-id").val());
    form_data.append('name', $("#add-blog-name").val());
    form_data.append('gmail', $("#add-blog-gmail").val());
    form_data.append('password', $("#add-blog-password").val());
    $.ajax({
        url: 'steam/epicaccountSave',
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
                //$('#modal-add').css('display','none');
                $('#modal-add').fadeOut(1000);
                $('.modal-cloase-button').trigger('click');
            }
        },
        error: function (xhr, textStatus, errorThrown) {

        }
    });
}
function editBlog(id){
    var data=grid.rows().data();
    for(var i=0;i<data.length;i++)if(data[i].id==id){
        $('#add-blog-id').val(id);
        $('#add-blog-name').val(data[i].name);
        $('#add-blog-gmail').val(data[i].gmail);
        $('#add-blog-password').val(data[i].password);
    }
}
function deleteBlog(id){
    form_data = new FormData();
    form_data.append('id',  id);
    $.ajax({
        url: 'steam/epicaccountDelete',
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
cols.push({ "mData": 'name','visible':true,'bSearchable':true,'bSortable':true});
cols.push({ "mData": 'gmail','visible':true,'bSearchable':true,'bSortable':true});
cols.push({ "mData": 'password','visible':true,'bSearchable':true,'bSortable':false});
cols.push({ "mData": 'cnt','visible':true,'bSearchable':true,'bSortable':true});
cols.push({ "mData": 'id','visible':false,'bSearchable':false,'bSortable':true});
cols.push({ "mData": 'action','visible':true,'bSearchable':false,'bSortable':false});
$(document).ready(function(){
    var tblDef={
        "ajax": {
            url:'steam/GetEPICAccountList',
            dataSrc:"",
            "type" : "POST"
        },
        bJQueryUI: true,
        sPaginationType: 'full_numbers',
        aaSorting: [],
        aoColumns: cols,
        dom: 'Bfrtip'
    };
    grid = $('#blog-grid').DataTable(tblDef);
});
</script>