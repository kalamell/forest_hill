
<table id='data-grid' title="งาน" class="easyui-datagrid" url="<?=site_url('work/getdata');?>"
    data-options='toolbar:"#toolbar",
        loadMsg:"Processing, please wait …",
        pagination:"true",
        rownumbers:"true",
        fitColumns:"true",
        singleSelect:"true",
        pagelist:"[50,100,150,200]"'>

    <thead>
    <tr>
        <th field="work_id" width="10" hidden="true">ID</th>
        <th field="ondate" width="20">วันที่</th>
        <th field="work_name" width="30">ชื่องาน</th>
        <th field="type_unit_name" width="30">แบบบ้าน</th>
        <th field="category_name" width="30">หมวดงาน</th>
        <th field="groups_name"   width="30">กลุ่มงาน</th>
        <th field="status" width="30">สถานะ</th>
        <th field="land_no"  width="30">ยูนิต</th>
        <th field="percent"  width="30">%</th>
        <th field="supplier" hidden="true"  width="30">ผู้รับจ้าง</th>

        <th field="unit_id" hidden="true"  width="30">UNIT ID</th>
        <th field="groups_id" hidden="true" width="30">GROUPS ID</th>
        <th field="category_id" hidden="true" width="30">CAT ID</th>
    </tr>
    </thead>
</table>


<div id="toolbar" style='padding: 2px 5px;'>
    <a href="#" class="easyui-linkbutton" iconCls="fa fa-plus" plain="false" onclick="newItem()">เพิ่มข้อมูล</a>
    <a href="#" class="easyui-linkbutton" iconCls="fa fa-edit" plain="false" onclick="editItem()">แก้ไขข้อมูล</a>
    <a href="#" class="easyui-linkbutton" iconCls="fa fa-remove" plain="false" onclick="removeItem()">ลบข้อมูล</a>
</div>

<!-- form -->

<div id="dlg" class="easyui-dialog" closed="true" buttons="#dlg-buttons" style='width: 600px; height: 500px;' data-options="modal: true, resizable: true">
    <?php echo form_open_multipart("",array("id"=>"fm"));?>
        <input type="hidden" name="work_id" value=""/>
        <table class="table" style="width: 100%;">


            <tbody>
                 <tr>
                    <td>วันที่</td>
                    <td colspan="3"><input type="text" name="ondate" data-options="formatter:formatterdate"  class='easyui-datebox' required="required" /></td>
                </tr>
                <tr>
                    <td>ชื่องาน</td>
                    <td colspan="3"><input type="text" name="work_name" class='easyui-textbox' required="required" style="width: 100%;" /></td>
                </tr>

                <tr>
                    <td>หมวดงาน</td>
                    <td colspan="3"><input type="text" name="category_id"  id="category" class='easyui-combobox' required="required" /></td>

                </tr>

                <tr>
                    <td>กลุ่มงาน</td>
                    <td colspan="3"><input type="text" name="groups_id"  id="groups" class='easyui-combobox' required="required" /></td>
                </tr>

                <tr>
                    <td>ยูนิต</td>
                    <td colspan="3"><input type="text" name="unit_id"  id="unit" class='easyui-combobox' required="required" /></td>
                </tr>
                <tr>
                    <td>สถานะ</td>
                    <td><input type="text" name="status"  class='easyui-textbox' /></td>
                    <td>%</td>
                    <td><input type="text" name="percent" class='easyui-textbox' /></td>
                </tr>

                <tr>
                    <td>ผู้รับจ้าง</td>
                    <td colspan="3"><input type="text" name="supplier"  data-options="multiline:true" style="height:60px; width: 100%;" class='easyui-textbox' /></td>
                </tr>
            </tbody>
        </table>
    <?php echo form_close();?>

    <div id="dlg-buttons">
        <a href="#" class="easyui-linkbutton" iconCls="fa fa-floppy-o" onclick="saveItem()"> บันทึกข้อมูล </a>
        <a href="#" class="easyui-linkbutton" iconCls="fa fa-remove" onclick="javascript:$('#dlg').dialog('close')"> ยกเลิก </a>
    </div>

</div>

<!-- end form -->

<script>

$('#unit').combobox({
    url:'<?=site_url('config/getunit');?>',
    valueField:'unit_id',
    textField:'land_no'
});

$('#groups').combobox({
    url:'<?=site_url('config/getgroups');?>',
    valueField:'groups_id',
    textField:'groups_name'
});

$('#category').combobox({
    url:'<?=site_url('config/getcategory');?>',
    valueField:'category_id',
    textField:'category_name'
});

var url="";
var edit = false;
function newItem(){
    $('#dlg').dialog('open').dialog('setTitle','งาน');
    $('#fm').form('clear');
    url = '<?=site_url('work/do_save');?>';
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
                 $.messager.show({
                    title: 'Success',
                    msg: 'บันทึกข้อมูลเรียบร้อย'
                });
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
        url = '<?=site_url('work/do_update');?>';
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
                $.post('<?=site_url('work/delete');?>' ,{ work_id:row.work_id },function(result){
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

function formatterdate(date){
    var y = date.getFullYear();
    var m = date.getMonth()+1;
    var d = date.getDate();
    return y+'-'+(m<10?('0'+m):m)+'-'+(d<10?('0'+d):d);
}

</script>