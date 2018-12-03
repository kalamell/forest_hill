
<table id='data-grid' title="ผู้ติดต่อ" class="easyui-datagrid" url="<?=site_url('contact/getdata');?>"
    data-options='toolbar:"#toolbar",
        loadMsg:"Processing, please wait …",
        pagination:"true",
        rownumbers:"true",
        fitColumns:"true",
        singleSelect:"true",
        pagelist:"[50,100,150,200]"'>

    <thead>
    <tr>
        <th field="contact_id" width="10" hidden="true">ID</th>
        <th field="contact_name" width="30" >ชื่อ - นามสกุล</th>
        <th field="contact_email" width="30">Email</th>
        <th field="contact_phone" width="30">เบอร์โทรศัพท์</th>
    </tr>
    </thead>
</table>


<div id="toolbar" style="padding: 5px;">
    <a href="#" class="easyui-linkbutton" iconCls="fa fa-plus" plain="false" onclick="newItem()">เพิ่มข้อมูล</a>
    <a href="#" class="easyui-linkbutton" iconCls="fa fa-edit" plain="false" onclick="editItem()">แก้ไขข้อมูล</a>
    <a href="#" class="easyui-linkbutton" iconCls="fa fa-remove" plain="false" onclick="removeItem()">ลบข้อมูล</a>
</div>

<!-- form -->

<div id="dlg" class="easyui-dialog" closed="true" style='height: 500px; width:500px; padding: 10px;' buttons="#dlg-buttons" data-options="modal: true, resizable: true">
    <?php echo form_open_multipart("",array("id"=>"fm"));?>
            <input type="hidden" name="contact_id" value=""/>

          <div class='row'>



          <div class="form-group col-md-6">
            <label for="contact_name">ชื่อ</label>
            <input type="text" class="form-control easyui-textbox" required="required" id="contact_name"  style='width: 200px;' name="contact_name" placeholder="ชื่อ">
          </div>

          

           <div class="form-group col-md-6">
            <label for="contact_phone"> เบอร์ติดต่อ</label>
            <input type="text" class="form-control  easyui-textbox" style="width: 200px;" id="contact_phone" name="contact_phone" placeholder="เบอร์ติดต่อ" maxlength="20">
          </div>

          <div class="form-group col-md-6">
            <label for="contact_email">Email</label>
            <input type="text" class="form-control  easyui-textbox" style="width: 200px;" id="Email" name="contact_email" placeholder="Email">
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
$('#type_contact_id').combobox({
    url:'<?=site_url('config/gettypecontact');?>',
    valueField:'type_contact_id',
    textField:'type_contact_name'
});

var url="";
var edit = false;
function newItem(){
    $('#dlg').dialog('open').dialog('setTitle','จัดการผู้ติดต่อ');
    $('#fm').form('clear');
    url = '<?=site_url('contact/do_save');?>';
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
        url = '<?=site_url('contact/do_edit');?>';
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
                $.post('<?=site_url('contact/delete');?>' ,{ contact_id:row.contact_id },function(result){
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