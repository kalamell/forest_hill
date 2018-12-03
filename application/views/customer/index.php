
<table id='data-grid' title="ข้อมูลลูกค้า" class="easyui-datagrid" url="<?=site_url('customer/getdata');?>"
    data-options='toolbar:"#toolbar",
        loadMsg:"Processing, please wait …",
        pagination:"true",
        rownumbers:"true",
        fitColumns:"true",
        singleSelect:"true",
        pagelist:"[50,100,150,200]"'>

    <thead>
    <tr>
        <th field="customer_id" width="10" hidden="true">ID</th>
        <th field="full_name" width="30" >ชื่อ - นามสกุล</th>
        <th field="type_customer_name" width="60" >ประเภทลูกค้า</th>

        <th field="email" width="30">Email</th>
        <th field="phone" width="30">เบอร์โทรศัพท์</th>

        <th field="type_customer_id" hidden="true"></th>
        <th field="name" hidden="true"></th>
        <th field="surname" hidden="true"></th>
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
            <input type="hidden" name="customer_id" value=""/>

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
            <label for="position_id">ประเภทลูกค้า</label>
            <input class="form-control easyui-combobox" required="required" name="type_customer_id" id="type_customer_id" style='width: 200px;'/>
          </div>



           <div class="form-group col-md-6">
            <label for="phone"> เบอร์ติดต่อ</label>
            <input type="text" class="form-control  easyui-textbox" style="width: 200px;" id="phone" name="phone" placeholder="เบอร์ติดต่อ" maxlength="20">
          </div>

          <div class="form-group col-md-6">
            <label for="idcard">Email</label>
            <input type="text" class="form-control  easyui-textbox" style="width: 200px;" id="Email" name="email" placeholder="Email">
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
$('#type_customer_id').combobox({
    url:'<?=site_url('config/gettypecustomer');?>',
    valueField:'type_customer_id',
    textField:'type_customer_name'
});

var url="";
var edit = false;
function newItem(){
    $('#dlg').dialog('open').dialog('setTitle','จัดการข้อมูลลูกค้า');
    $('#fm').form('clear');
    url = '<?=site_url('customer/do_save');?>';
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
        url = '<?=site_url('customer/do_edit');?>';
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
                $.post('<?=site_url('customer/delete');?>' ,{ customer_id:row.customer_id },function(result){
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