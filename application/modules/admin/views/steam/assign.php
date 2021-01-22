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
                        <th>CPU ID</th>
                        <th>HardDrive ID</th>
                        <th>BIOS ID</th>
                        <th>Name</th>
                        <th>Invoice Number</th>
                        <th>IP</th>
                        <th>Steam Account</th>
                        <th>MS Account</th>
                        <th>EPIC Account</th>
                        <th>Uplay Account</th>
                        <th>Origin Account</th>
                        <th>Created Date</th>
                        <th>ID</th>
                        <th style="text-align: right;">
                            Action
                            <a title="add" data-toggle="modal" data-target="#modal-add" class="add-row" onclick="$('#add-blog-id').val(0);$('#add-blog-name').val('');account_sel.val('').trigger('change');msaccount_sel.val('').trigger('change');epicaccount_sel.val('').trigger('change');playaccount_sel.val('').trigger('change');originaccount_sel.val('').trigger('change'); " aria-describedby="ui-tooltip-0"><span class="add-icon-custom"></span></a>
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
        <h4 class="modal-title">User Database Diolog</h4>
      </div>
      <div class="modal-body">
        <div class="row"><div class="col-md-12"><form class="form-horizontal">
        <div class="box box-info" style="border-top: none;background: none;">
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Kindly Name</label>

              <div class="col-sm-10">
                <input type="text" class="form-control" multiple="multiple" id="add-blog-name" placeholder="Name">
                <input type="hidden" class="form-control" id="add-blog-id" placeholder="Id">
              </div>
            </div>
        </div>
        <div class="box box-info" style="border-top: none;background: none;">
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Steam Accounts</label>

              <div class="col-sm-10">
                <select class="form-control select2" id="add-blog-account" multiple="multiple" style="width:100%;">
                <?php foreach($accountList as $account){
                    echo "<option value='".$account['id']."'>{$account['name']}</option>";
                }?>    
                </select>
              </div>
            </div>
        </div>
        <div class="box box-info" style="border-top: none;background: none;">
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">MS Accounts</label>

              <div class="col-sm-10">
                <select class="form-control select2" id="add-blog-msaccount" multiple="multiple" style="width:100%;">
                <?php foreach($msaccountList as $account){
                    echo "<option value='".$account['id']."'>{$account['name']}</option>";
                }?>    
                </select>
              </div>
            </div>
        </div>
        <div class="box box-info" style="border-top: none;background: none;">
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">EPIC Accounts</label>

              <div class="col-sm-10">
                <select class="form-control select2" id="add-blog-epicaccount" multiple="multiple" style="width:100%;">
                <?php foreach($epicaccountList as $account){
                    echo "<option value='".$account['id']."'>{$account['name']}</option>";
                }?>    
                </select>
              </div>
            </div>
        </div>
        <div class="box box-info" style="border-top: none;background: none;">
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Uplay Accounts</label>

              <div class="col-sm-10">
                <select class="form-control select2" id="add-blog-playaccount" multiple="multiple" style="width:100%;">
                <?php foreach($playaccountList as $account){
                    echo "<option value='".$account['id']."'>{$account['name']}</option>";
                }?>    
                </select>
              </div>
            </div>
        </div>
        <div class="box box-info" style="border-top: none;background: none;">
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Origin Accounts</label>

              <div class="col-sm-10">
                <select class="form-control select2" id="add-blog-originaccount" multiple="multiple" style="width:100%;">
                <?php foreach($originaccountList as $account){
                    echo "<option value='".$account['id']."'>{$account['name']}</option>";
                }?>    
                </select>
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
var account_sel=$('#add-blog-account').select2({
    placeholder: "accounts",
    tags: true
});
var msaccount_sel=$('#add-blog-msaccount').select2({
    placeholder: "accounts",
    tags: true
});
var epicaccount_sel=$('#add-blog-epicaccount').select2({
    placeholder: "accounts",
    tags: true
});
var playaccount_sel=$('#add-blog-playaccount').select2({
    placeholder: "accounts",
    tags: true
});
var originaccount_sel=$('#add-blog-originaccount').select2({
    placeholder: "accounts",
    tags: true
});
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
    form_data.append('account', $("#add-blog-account").val());
    form_data.append('msaccount', $("#add-blog-msaccount").val());
    form_data.append('epicaccount', $("#add-blog-epicaccount").val());
    form_data.append('playaccount', $("#add-blog-playaccount").val());
    form_data.append('originaccount', $("#add-blog-originaccount").val());
    $.ajax({
        url: 'steam/assignSave',
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
function editBlog(id,name,account,msaccount,epicaccount,playaccount,originaccount){
    $('#add-blog-id').val(id);
    $('#add-blog-name').val(name);
    var vals = account.split(',');
    var selectedValues = new Array();
    for(var i=0;i<vals.length;i++){
        selectedValues[i] = vals[i];
    }
    account_sel.val(selectedValues).trigger("change");
    vals = msaccount.split(',');
    selectedValues = new Array();
    for(var i=0;i<vals.length;i++){
        selectedValues[i] = vals[i];
    }
    msaccount_sel.val(selectedValues).trigger("change");
    vals = epicaccount.split(',');
    selectedValues = new Array();
    for(var i=0;i<vals.length;i++){
        selectedValues[i] = vals[i];
    }
    epicaccount_sel.val(selectedValues).trigger("change");
    
    vals = playaccount.split(',');
    selectedValues = new Array();
    for(var i=0;i<vals.length;i++){
        selectedValues[i] = vals[i];
    }
    playaccount_sel.val(selectedValues).trigger("change");
    
    vals = originaccount.split(',');
    selectedValues = new Array();
    for(var i=0;i<vals.length;i++){
        selectedValues[i] = vals[i];
    }
    originaccount_sel.val(selectedValues).trigger("change");
}
function deleteBlog(id){
    form_data = new FormData();
    form_data.append('id',  id);
    $.ajax({
        url: 'steam/assignDelete',
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
cols.push({ "mData": 'cpu_id','visible':true,'bSearchable':true,'bSortable':true});
cols.push({ "mData": 'harddrive_id','visible':true,'bSearchable':true,'bSortable':true});
cols.push({ "mData": 'bios_id','visible':true,'bSearchable':true,'bSortable':true});
cols.push({ "mData": 'name','visible':true,'bSearchable':true,'bSortable':true});
cols.push({ "mData": 'number','visible':true,'bSearchable':true,'bSortable':true});
cols.push({ "mData": 'ipaddress','visible':true,'bSearchable':true,'bSortable':true});
cols.push({ "mData": 'account','visible':false,'bSearchable':true,'bSortable':true});
cols.push({ "mData": 'msaccount','visible':false,'bSearchable':true,'bSortable':true});
cols.push({ "mData": 'epicaccount','visible':false,'bSearchable':true,'bSortable':true});
cols.push({ "mData": 'playaccount','visible':false,'bSearchable':true,'bSortable':true});
cols.push({ "mData": 'originaccount','visible':false,'bSearchable':true,'bSortable':true});
cols.push({ "mData": 'created_date','visible':true,'bSearchable':true,'bSortable':true});
cols.push({ "mData": 'id','visible':false,'bSearchable':false,'bSortable':true});
cols.push({ "mData": 'action','visible':true,'bSearchable':false,'bSortable':false});
$(document).ready(function(){
    var tblDef={
        "ajax": {
            url:'steam/GetAssignList',
            dataSrc:"",
            "type" : "POST"
        },
        bJQueryUI: true,
        sPaginationType: 'full_numbers',
        aaSorting: [],
        aoColumns: cols,
        columnDefs: [
            {
                render: function (data, type, full, meta) {
                    return "<div class='text-wrap'>" + data + "</div>";
                },
                targets: 4
            }
         ],
        dom: 'Bfrtip'
    };
    grid = $('#blog-grid').DataTable(tblDef);
    function fnFormatDetails(oTable, nTr) {
        var aData = oTable.fnGetData(nTr);
        sOut="";
        sOut+='<div style=""><table width="100%">'+
            '<tr >'+
              '<td width="20px"></td>'+
              '<td width="150px">Steam Accounts:</td>'+
              '<td width="*"><div style="white-space: normal;max-width: calc(100vw - 450px);margin:20px 0px 20px 0px;">'+aData['account']+'</div></td>'+
            '</tr>'+
            '<tr >'+
              '<td width="20px"></td>'+
              '<td width="150px">MS accounts:</td>'+
              '<td width="*"><div style="white-space: normal;max-width: calc(100vw - 450px);margin:0px 0px 20px 0px;">'+aData['msaccount']+'</div></td>'+
            '</tr>'+
            '<tr >'+
              '<td width="20px"></td>'+
              '<td width="150px">EPIC accounts:</td>'+
              '<td width="*"><div style="white-space: normal;max-width: calc(100vw - 450px);margin:0px 0px 20px 0px;">'+aData['epicaccount']+'</div></td>'+
            '</tr>'+
            '<tr >'+
              '<td width="20px"></td>'+
              '<td width="150px">Uplay accounts:</td>'+
              '<td width="*"><div style="white-space: normal;max-width: calc(100vw - 450px);margin:0px 0px 20px 0px;">'+aData['playaccount']+'</div></td>'+
            '</tr>'+
            '<tr >'+
              '<td width="20px"></td>'+
              '<td width="150px">Origin accounts:</td>'+
              '<td width="*"><div style="white-space: normal;max-width: calc(100vw - 450px);">'+aData['originaccount']+'</div></td>'+
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