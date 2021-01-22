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
                        <th></th>
                        <th>Name</th>
                        <th>Game Name</th>
                        <th>Steam Account</th>
                        <th>Steam Password</th>
                        <th>Code Email</th>
                        <th>Code Password</th>
                        <th>System32 ID</th>
                        <th>App ID</th>
                        <th>DBDATA</th>
                        <th>Using Customs</th>
                        <th>id</th>
                        <th>gameid</th>
                        <th style="text-align: right;">
                            Action
                            <a title="add" data-toggle="modal" data-target="#modal-add" class="add-row" onclick="$('#add-blog-id').val(0);$('#add-blog-name').val('');$('#add-blog-account').val('');$('#add-blog-password').val('');$('#add-blog-codegmail').val('');$('#add-blog-codepassword').val('');$('#add-blog-system32id').val('');$('#add-blog-appid').val('');$('#add-blog-dbdata').val('');" aria-describedby="ui-tooltip-0"><span class="add-icon-custom"></span></a>
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
        <h4 class="modal-title">Steam Account Diolog</h4>
      </div>
      <div class="modal-body">
        <div class="row"><div class="col-md-12"><form class="form-horizontal">
        <div class="box box-info" style="border-top: none;background: none;">
            <div class="form-group">
              <label class="col-sm-2 control-label">Game Name</label>
              <div class="col-sm-10">
                <select class="form-control" id="add-blog-gamename">
                <?php foreach($gamesList as $game){
                    echo "<option value='".$game['id']."'>{$game['name']}</option>";
                }?>    
                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Name</label>

              <div class="col-sm-10">
                <input type="text" class="form-control" id="add-blog-name" placeholder="Name">
                <input type="hidden" class="form-control" id="add-blog-id" placeholder="Title">
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Steam Account</label>

              <div class="col-sm-10">
                <input type="text" class="form-control" id="add-blog-account" placeholder="Account">
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Steam Password</label>

              <div class="col-sm-10">
                <input type="text" class="form-control" id="add-blog-password" placeholder="Password">
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Code Gmail</label>

              <div class="col-sm-10">
                <input type="text" class="form-control" id="add-blog-codegmail" placeholder="Code Gmail">
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Code Password</label>

              <div class="col-sm-10">
                <input type="text" class="form-control" id="add-blog-codepassword" placeholder="Code Password">
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">System3 ID</label>

              <div class="col-sm-10">
                <input type="text" class="form-control" id="add-blog-system32id" placeholder="Code Password">
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">AppID</label>

              <div class="col-sm-10">
                <input type="text" class="form-control" id="add-blog-appid" placeholder="Code Password">
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">DBDATA</label>

              <div class="col-sm-10">
                <input type="text" class="form-control" id="add-blog-dbdata" placeholder="Code Password">
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
    if ($("#add-blog-account").val() == '') {
        $("#add-blog-account").focus();
        return;
    }
    if ($("#add-blog-password").val() == '') {
        $("#add-blog-password").focus();
        return;
    }
    if ($("#add-blog-codegmail").val() == '') {
        $("#add-blog-codegmail").focus();
        return;
    }
    if ($("#add-blog-codepassword").val() == '') {
        $("#add-blog-codepassword").focus();
        return;
    }
    var form_data = new FormData();
    form_data.append('id',  $("#add-blog-id").val());
    form_data.append('name', $("#add-blog-name").val());
    form_data.append('gamename', $("#add-blog-gamename").val());
    form_data.append('account', $("#add-blog-account").val());
    form_data.append('password', $("#add-blog-password").val());
    form_data.append('codegmail', $("#add-blog-codegmail").val());
    form_data.append('codepassword', $("#add-blog-codepassword").val());
    form_data.append('system32id', $("#add-blog-system32id").val());
    form_data.append('appid', $("#add-blog-appid").val());
    form_data.append('dbdata', $("#add-blog-dbdata").val());
    $.ajax({
        url: 'steam/accountSave',
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
        $('#add-blog-gamename').val(data[i].gameid);
        $('#add-blog-account').val(data[i].account);
        $('#add-blog-password').val(data[i].password);
        $('#add-blog-codegmail').val(data[i].code_gmail);
        $('#add-blog-codepassword').val(data[i].code_password);
        $('#add-blog-system32id').val(data[i].system32id);
        $('#add-blog-appid').val(data[i].appid);
        $('#add-blog-dbdata').val(data[i].dbdata);
    }
}
function deleteBlog(id){
    form_data = new FormData();
    form_data.append('id',  id);
    $.ajax({
        url: 'steam/accountDelete',
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
cols.push({ "mData": null,'visible':true,'bSearchable':false,'bSortable':false,'sDefaultContent': '<div class="expand /">','sWidth': "30px"});
cols.push({ "mData": 'name','visible':true,'bSearchable':true,'bSortable':true});
cols.push({ "mData": 'game_name','visible':true,'bSearchable':true,'bSortable':true});
cols.push({ "mData": 'account','visible':true,'bSearchable':true,'bSortable':true});
cols.push({ "mData": 'password','visible':true,'bSearchable':true,'bSortable':false});
cols.push({ "mData": 'code_gmail','visible':false,'bSearchable':true,'bSortable':true});
cols.push({ "mData": 'code_password','visible':false,'bSearchable':true,'bSortable':false});
cols.push({ "mData": 'system32id','visible':false,'bSearchable':true,'bSortable':true});
cols.push({ "mData": 'appid','visible':false,'bSearchable':true,'bSortable':true});
cols.push({ "mData": 'dbdata','visible':false,'bSearchable':true,'bSortable':true});
cols.push({ "mData": 'cnt','visible':true,'bSearchable':true,'bSortable':true});
cols.push({ "mData": 'id','visible':false,'bSearchable':false,'bSortable':true});
cols.push({ "mData": 'gameid','visible':false,'bSearchable':false,'bSortable':true});
cols.push({ "mData": 'action','visible':true,'bSearchable':false,'bSortable':false});
$(document).ready(function(){
    var tblDef={
        "ajax": {
            url:'steam/GetAccountList',
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
    function fnFormatDetails(oTable, nTr) {
        var aData = oTable.fnGetData(nTr);
        sOut="";
        sOut+='<div style=""><table width="100%">'+
            '<tr height="28px">'+
              '<td width="20px"></td>'+
              '<td width="150px">Code Gmail:</td>'+
              '<td width="*">'+aData['code_gmail']+'</td>'+
            '</tr>'+
            '<tr height="28px">'+
              '<td width="20px"></td>'+
              '<td width="150px">Code Password:</td>'+
              '<td width="*">'+aData['code_password']+'</td>'+
            '</tr>'+
            '<tr height="28px">'+
              '<td width="20px"></td>'+
              '<td width="150px">System32 ID:</td>'+
              '<td width="*">'+aData['system32id']+'</td>'+
            '</tr>'+
            '<tr height="28px">'+
              '<td width="20px"></td>'+
              '<td width="150px">AppID:</td>'+
              '<td width="*">'+aData['appid']+'</td>'+
            '</tr>'+
            '<tr height="28px">'+
              '<td width="20px"></td>'+
              '<td width="150px">DBDATA</td>'+
              '<td width="*">'+aData['dbdata']+'</td>'+
            '</tr>'+
        '</table></div>';    
        return sOut;
    }
    $('#blog-grid tbody').on('click', 'tr', function () {
        var grid = $('#blog-grid').dataTable();
        var nTr = $(this);
        if(grid.fnIsOpen($(this))){
            grid.fnClose(nTr);
            $(this).find('td div.open').removeClass('open');
        }else{
            $(this).parent().find('tr').each(function (i, el) {
                $(this).find('td div.open').removeClass('open');
                grid.fnClose($(this));
            });
        
            $.fn.dataTableExt.sErrMode = 'throw' ;
            $(this).find('td div.expand').addClass('open');
            grid.fnOpen(nTr, fnFormatDetails(grid, nTr), 'details');
        }
    });
});
</script>