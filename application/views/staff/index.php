
<table id='data-grid' title="ข้อมูลพนักงาน" class="easyui-datagrid" url="<?=site_url('staff/getdata');?>"
    data-options='toolbar:"#toolbar",
        loadMsg:"Processing, please wait …",
        pagination:"true",
        rownumbers:"true",
        fitColumns:"true",
        singleSelect:"true",
        pagelist:"[50,100,150,200]"'>

    <thead>
    <tr>
        <th field="staff_id" width="10" hidden="true">ID</th>
        <th field="staff_code" width="30" sortable="true">รหัสพนักงาน</th>
        <th field="full_name" width="30" >ชื่อ - นามสกุล</th>
        <th field="position_name" width="60" >ประเภทพนักงาน</th>
        <th field="department_name" width="70" >หน่วยงาน</th>
        <th field="username" width="70">Username</th>
        <th field="name" hidden="true"></th>
        <th field="surname" hidden="true"></th>
        <th field="department_id" hidden="true"></th>
        <th field="position_id" hidden="true"></th>
        <th field="province_id" hidden="true"></th>
        <th field="mobile" hidden="true"></th>
        <th field="pwfix" hidden="true"></th>
        <th field="address" hidden="true"></th>
        <th field="idcard" hidden="true"></th>
    </tr>
    </thead>
</table>


<div id="toolbar">
    <a href="#" class="easyui-linkbutton" iconCls="fa fa-plus" plain="false" onclick="newItem()">เพิ่มข้อมูลพนักงาน</a>
    <a href="#" class="easyui-linkbutton" iconCls="fa fa-edit" plain="false" onclick="editItem()">แก้ไขข้อมูล</a>
    <a href="#" class="easyui-linkbutton" iconCls="fa fa-remove" plain="false" onclick="removeItem()">ลบข้อมูล</a>
</div>

<!-- form -->

<div id="dlg" class="easyui-dialog" closed="true" style='height: 500px; width:500px; padding: 10px;' buttons="#dlg-buttons" data-options="modal: true, resizable: true">
    <?php echo form_open_multipart("",array("id"=>"fm"));?>
            <input type="hidden" name="staff_id" value=""/>
          <div class='row'>
            <div class="form-group col-md-6">
              <label for="staff_code">รหัสพนักงาน</label>
              <input type="text" class="form-control easyui-textbox"  style='width: 200px;' required="required" id="staff_code" name="staff_code" placeholder="รหัสพนักงาน">
            </div>
          </div>

          <div class='row'>



          <div class="form-group col-md-6">
            <label for="name">ชื่อ</label>
            <input type="text" class="form-control easyui-textbox" required="required" id="name"  style='width: 200px;' name="name" placeholder="ชื่อ">
          </div>

          <div class="form-group col-md-6">
            <label for="surname">นามสกุล</label>
            <input type="text" class="form-control easyui-textbox" required="required"  style='width: 200px;' id="surname" name="surname" placeholder="นามสกุล">
          </div>

          <div class="form-group col-md-6">
            <label for="username">Username</label>
            <input type="text" class="form-control easyui-textbox" id="username" required="required"  style='width: 200px;' name="username" placeholder="Username เข้าระบบ">
          </div>


          <div class="form-group col-md-6">
            <label for="password">Password</label>
            <input type="password" class="form-control easyui-textbox"  required="required"   style='width: 200px;' id="password" name="pwfix" placeholder="รหัสผ่าน">
          </div>


          <div class="form-group col-md-6">
            <label for="position_id">ประเภทพนักงาน</label>
            <input class="form-control easyui-combobox" required="required" name="position_id" id="position" style='width: 200px;'/>
          </div>

          <div class="form-group col-md-6">
            <label for="department_id">หน่วยงาน</label>
            <input class="form-control easyui-combobox" required="required" id="department" name="department_id" style='width: 200px;'/>
          </div>




           <div class="form-group col-md-6">
            <label for="mobile"> เบอร์ติดต่อ</label>
            <input type="text" class="form-control  easyui-textbox" style="width: 200px;" id="mobile" name="mobile" placeholder="เบอร์ติดต่อ" maxlength="20">
          </div>

          <div class="form-group col-md-6">
            <label for="idcard">เลขบัตรประชาชน</label>
            <input type="text" class="form-control  easyui-textbox" style="width: 200px;" id="idcard" name="idcard" placeholder="เลขบัตรประชาชน" maxlength="13">
          </div>

          <div class="form-group col-md-12">
            <label for="address">ที่อยู่ </label>
            <textarea class="form-control  easyui-textarea" id="address" name="address" placeholder="ที่อยู่" rows="5"></textarea>
          </div>

           <div class="form-group col-md-6">
            <label for="province_id">จังหวัด</label>
            <input class="form-control easyui-combobox" id="province" name="province_id" style='width: 200px;'/>
          </div>


        </div>
    <?php echo form_close();?>

    <div id="dlg-buttons">
        <a href="#" class="easyui-linkbutton" iconCls="fa fa-floppy-o" onclick="saveItem()"> บันทึกข้อมูล </a>
        <a href="#" class="easyui-linkbutton" iconCls="fa fa-remove" onclick="javascript:$('#dlg').dialog('close')"> ยกเลิก </a>
    </div>

</div>

<!-- end form -->

<script>
$('#position').combobox({
    url:'<?=site_url('config/getposition');?>',
    valueField:'position_id',
    textField:'position_name'
});
$('#department').combobox({
    url:'<?=site_url('config/getdepartment');?>',
    valueField:'department_id',
    textField:'department_name'
});
$('#province').combobox({
    url:'<?=site_url('config/getprovince');?>',
    valueField:'province_id',
    textField:'province_name'
});
var url="";
var edit = false;
function newItem(){
    $('#dlg').dialog('open').dialog('setTitle','จัดการข้อมูลพนักงาน');
    $('#fm').form('clear');
    url = '<?=site_url('staff/do_save');?>';
    edit =false;
};

function saveItem(){
    $('#fm').form('submit',{
        url: url,
        onSubmit: function(){
            return $(this).form('validate');
        },
        success: function(result){
            var result = eval('('+result+')');
            if (result.success){
                $('#dlg').dialog('close');      // close the dialog
                $('#data-grid').datagrid('reload');    // reload the user data
            } else {
                $.messager.show({
                    title: 'Error',
                    msg: result.msg
                });
            }
        }
    });
    return false;
}


function editItem(){
    var row = $('#data-grid').datagrid('getSelected');
    if (row){
        $('#dlg').dialog('open').dialog('setTitle','แก้ไขข้อมูล');
        $('#fm').form('load',row);
        url = '<?=site_url('staff/do_edit');?>';
        edit = true;
    }
    else
    {
        alert("กรุณาเลือกข้อมูลที่ต้องการ");
    }
}


function removeItem(){
    var row = $('#data-grid').datagrid('getSelected');
    if (row){
        $.messager.confirm('Confirm','คุณต้องการลบหรือไม่ ?',function(r){
            if (r){
                $.post('<?=site_url('staff/delete');?>' ,{ staff_id:row.staff_id },function(result){
                    if (result.success){
                        $('#data-grid').datagrid('reload');    // reload the user data
                    } else {
                        $.messager.show({   // show error message
                            title: 'Error',
                            msg: result.msg
                        });
                    }
                },'json');
            }
        });
    }
}
</script>