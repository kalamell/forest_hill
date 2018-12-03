
<table id='data-grid' title="โครงการ" class="easyui-datagrid" url="<?=site_url('home/getdata');?>"
    data-options='toolbar:"#toolbar",
        loadMsg:"Processing, please wait …",
        pagination:"true",
        rownumbers:"true",
        fitColumns:"true",
        singleSelect:"true",
        pagelist:"[50,100,150,200]"'>

    <thead>
    <tr>
        <th field="home_id" width="10" hidden="true">ID</th>
        <th field="home_code" width="30">รหัสบ้าน</th>
        <th field="home_name" width="30">ชื่อบ้าน</th>
        <th field="type_home_name" width="30">ชนิดบ้าน</th>
        <th field="type_home_id" hidden="true" width="30">ID ประเภทบ้าน</th>
        <th field="style" hidden="false" width="30">Style</th>
        <th field="area" hidden="true"  width="30">พื้นที่ใช้สอย</th>
        <th field="place" width="30">พื้นที่ก่อสร้าง</th>
        <th field="price" hidden="false"  width="30">ราคาค่าก่อสร้าง</th>
        <th field="price_sale" hidden="false"  width="30">ราคาขาย</th>
    </tr>
    </thead>
</table>


<div id="toolbar">
    <a href="#" class="easyui-linkbutton" iconCls="fa fa-plus" plain="false" onclick="newItem()">เพิ่มข้อมูล</a>
    <a href="#" class="easyui-linkbutton" iconCls="fa fa-edit" plain="false" onclick="editItem()">แก้ไขข้อมูล</a>
    <a href="#" class="easyui-linkbutton" iconCls="fa fa-remove" plain="false" onclick="removeItem()">ลบข้อมูล</a>
</div>

<!-- form -->

<div id="dlg" class="easyui-dialog" closed="true" buttons="#dlg-buttons" style='width: 600px; height: 400px;' data-options="modal: true, resizable: true">
    <?php echo form_open_multipart("",array("id"=>"fm"));?>
        <input type="hidden" name="home_id" value=""/>
        <table class="table" style="width: 100%;">


            <tbody>
                <tr>
                    <td>รหัสบ้าน</td>
                    <td colspan='3'><input type="text" name="home_code" class='easyui-textbox' required="required" /></td>
                </tr>

                <tr>
                    <td>ชื่อบ้าน</td>
                    <td colspan="3"><input type="text" name="home_name" class='easyui-textbox' required="required" style="width: 100%;" /></td>
                </tr>

                <tr>
                    <td>ประเภท / ชนิดบ้าน</td>
                    <td colspan="3"><input type="text" name="type_home_id"  id="type_home" class='easyui-combobox' required="required" /></td>

                </tr>
                <tr>
                    <td>สไตล์บ้าน</td>
                    <td colspan="3"><input type="text" class="easyui-textbox" name="style" data-options="multiline:true" style="height:60px; width: 100%;" /></td>
                </tr>
                <tr>
                    <td>พื้นที่ใช้สอย</td>
                    <td colspan="3"><input type="text" class="easyui-textbox" name="area" data-options="multiline:true" style="height:60px; width: 100%;" /></td>
                </tr>
                <tr>
                    <td>พื้นที่ก่อสร้าง</td>
                    <td colspan="3"><input type="text" class="easyui-textbox" name="place" data-options="multiline:true" style="height:60px; width: 100%;" /></td>
                </tr>

                <tr>
                    <td>ราคาค่าก่อสร้าง</td>
                    <td><input type="text" name="price"  class='easyui-textbox' /></td>
                    <td>ราคาขาย</td>
                    <td><input type="text" name="price_sale" class='easyui-textbox' /></td>
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

$('#type_home').combobox({
    url:'<?=site_url('config/gettypehome');?>',
    valueField:'type_home_id',
    textField:'type_home_name'
});

var url="";
var edit = false;
function newItem(){
    $('#dlg').dialog('open').dialog('setTitle','โครงการ');
    $('#fm').form('clear');
    url = '<?=site_url('home/do_save');?>';
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
        url = '<?=site_url('home/do_update');?>';
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
                $.post('<?=site_url('home/delete');?>' ,{ home_id:row.home_id },function(result){
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