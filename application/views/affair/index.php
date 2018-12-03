
<table id='data-grid' title="ข้อมูลราชการ" class="easyui-datagrid" url="<?=site_url('affair/getdata');?>"
    data-options='toolbar:"#toolbar",
        loadMsg:"Processing, please wait …",
        pagination:"true",
        rownumbers:"true",
        fitColumns:"true",
        singleSelect:"true",
        pagelist:"[50,100,150,200]"'>

    <thead>
    <tr>
        <th field="affair_id" width="10" hidden="true">ID</th>
        <th field="affair_name" width="30" sortable="true">หน่วยงานราชการ</th>
        <th field="affair_contact" width="60" >ผู้ติดต่อ</th>
        <th field="affair_phone" width="30" >เบอร์โทรศัพท์</th>
       
    </tr>
    </thead>
</table>


<div id="toolbar" style='padding: 5px;'>
    <a href="#" class="easyui-linkbutton" iconCls="fa fa-plus" plain="false" onclick="newItem()">เพิ่มข้อมูล</a>
    <a href="#" class="easyui-linkbutton" iconCls="fa fa-edit" plain="false" onclick="editItem()">แก้ไขข้อมูล</a>
    <a href="#" class="easyui-linkbutton" iconCls="fa fa-remove" plain="false" onclick="removeItem()">ลบข้อมูล</a>
</div>

<!-- form -->

<div id="dlg" class="easyui-dialog" closed="true" style='height: 300px; width:350px; padding: 10px;' buttons="#dlg-buttons" data-options="modal: true, resizable: true">
    <?php echo form_open_multipart("",array("id"=>"fm"));?>
            <input type="hidden" name="affair_id" value=""/>
              <table class='table' style='width: 100%;'>
                  <tr>
                      <td>
                          หน่วยงาน
                      </td>
                      <td>
                          <input type="text" class="form-control easyui-textbox" required="required" id="affair_name"  style='width: 100%;' name="affair_name" >
                      </td>
                  </tr>
                  <tr>
                      <td>
                          ผู้ติดต่อ
                      </td>
                      <td>
                          <input type="text" class="form-control easyui-textbox" required="required" id="affair_contact"  style='width: 100%;' name="affair_contact" >
                      </td>
                  </tr>
                  <tr>
                      <td>
                          เบอร์โทรศัพท์
                      </td>
                      <td>
                          <input type="text" class="form-control easyui-textbox" required="required" id="affair_phone"  style='width: 100%;' name="affair_phone" >
                      </td>
                  </tr>

              </table>

    <?php echo form_close();?>

    <div id="dlg-buttons">
        <a href="#" class="easyui-linkbutton" iconCls="fa fa-floppy-o" onclick="saveItem()"> บันทึกข้อมูล </a>
        <a href="#" class="easyui-linkbutton" iconCls="fa fa-remove" onclick="javascript:$('#dlg').dialog('close')"> ยกเลิก </a>
    </div>

</div>

<!-- end form -->

<script>

var url="";
var edit = false;
function newItem(){
    $('#dlg').dialog('open').dialog('setTitle','จัดการข้อมูล');
    $('#fm').form('clear');
    url = '<?=site_url('affair/do_save');?>';
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
        url = '<?=site_url('affair/do_edit');?>';
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
                $.post('<?=site_url('affair/delete');?>' ,{ affair_id:row.affair_id },function(result){
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