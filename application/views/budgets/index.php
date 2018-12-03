
<table id='data-grid' title="งบประมาณ" class="easyui-datagrid" url="<?=site_url('budgets/getdata');?>"
    data-options='toolbar:"#toolbar",
        loadMsg:"Processing, please wait …",
        pagination:"true",
        rownumbers:"true",
        fitColumns:"true",
        singleSelect:"true",
        pagelist:"[50,100,150,200]"'>

    <thead>
    <tr>
        <th field="budgets_id" width="10" hidden="true">ID</th>
        <th field="type_budgets_name" width="30">หมวด</th>
        <th field="budgets_name" width="30">ชื่องบประมาณ</th>

        <th field="budgets_total" width="30">หมวดงบประมาณ</th>
        <th field="ratio"   width="30">สัดส่วน / ยอดขาย</th>

        <th field="type_budgets_id" hidden="true"  width="30">BUDGETS ID</th>
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
        <input type="hidden" name="budgets_id" value=""/>
        <table class="table" style="width: 100%;">


            <tbody>


                <tr>
                    <td>หมวดงบประมาณ</td>
                    <td colspan="3"><input type="text" name="type_budgets_id"  id="type_budgets" class='easyui-combobox' required="required" /></td>

                </tr>

                <tr>
                    <td>รายการ</td>
                    <td colspan="3"><input type="text" name="budgets_name" class='easyui-textbox' required="required" style="width: 100%;" /></td>
                </tr>

                <tr>
                    <td>งบประมาณ</td>
                    <td><input type="text" name="budgets_total"  class='easyui-textbox' /></td>
                    <td>สัดส่วน / ยอดขาย</td>
                    <td><input type="text" name="ratio" class='easyui-textbox' /></td>
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

$('#type_budgets').combobox({
    url:'<?=site_url('config/gettypebudgets');?>',
    valueField:'type_budgets_id',
    textField:'type_budgets_name'
});


var url="";
var edit = false;
function newItem(){
    $('#dlg').dialog('open').dialog('setTitle','งบประมาณ');
    $('#fm').form('clear');
    url = '<?=site_url('budgets/do_save');?>';
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
        url = '<?=site_url('budgets/do_update');?>';
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
                $.post('<?=site_url('budgets/delete');?>' ,{ budgets_id:row.budgets_id },function(result){
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