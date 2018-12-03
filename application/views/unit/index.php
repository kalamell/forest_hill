
<table id='data-grid' title="ยูนิต" class="easyui-datagrid" url="<?=site_url('unit/getdata');?>"
    data-options='toolbar:"#toolbar",
        loadMsg:"Processing, please wait …",
        pagination:"true",
        rownumbers:"true",
        fitColumns:"true",
        singleSelect:"true",
        pagelist:"[50,100,150,200]"'>

    <thead>
    <tr>
        <th field="unit_id" width="10" hidden="true">ID</th>
        <th field="land_no" width="30">แปลงที่</th>
        <th field="size_land" width="30">ขนาดที่ดิน</th>
        <th field="price_per_sqm" width="30">ราคาที่ดิน / ตรว</th>
        <th field="type_unit_id" hidden="true" width="30">ID ประเภทโครงการ</th>
        <th field="type_unit_name" hidden="false" width="30">แบบบ้าน</th>
        <th field="near_park" formatter="formatterprice" hidden='true' width="30">ติดสวน</th>
        <th field="land_corner"  formatter="formatterprice"  hidden='true'  width="30">แปลงมุม</th>
        <th field="price" width="30">ราคาขาย</th>
        <th field="discount"  width="30">ส่วนลด</th>
        <th field="price_discount" width="30">ราคาสุทธิหลังหักส่วนลด</th>
        <th field="fest" hidden="true"  width="30">เฟส</th>
        <th field="start_date" hidden="false"  width="30">วันเริ่มงานก่อสร้าง</th>
        <th field="end_date" hidden="false" width="30">วันที่แล้วเสร็จ</th>
        <th field="give_date" hidden="true" width="30">วันส่งมอบ</th>
        <th field="check_date" hidden="true"  width="30">วันตรวจ</th>
        <th field="transfer_date" hidden="true"  width="30">วันโอน</th>
        <th field="promise_date" hidden="true"  width="30">วันทำสัญญา</th>
        <th field="book_date" hidden="true"  width="30">วันจอง</th>
        <th field="customer_id"  hidden="true" width="30">รหัสลูกค้า</th>
        <th field="customer_name"  hidden="false" width="30">ลูกค้า</th>
        <th field="price_start"  hidden="true" width="30">ราคาก่อสร้าง</th>
        <th field="foreman"  hidden="true" width="30">วิศวกรคุมงาน</th>
        <th field="structure_name"  hidden="true" width="30">รับเหมาโครงสร้าง</th>
        <th field="architecture_name"  hidden="true" width="30">รับเหมาสถาปัต</th>
        <th field="dc_name"  hidden="true" width="30">รับเหมาไฟ</th>
        <th field="plumbing_name" hidden="true"  width="30">รับเหมาปะปา</th>
        <th field="remark" hidden="true"  width="30">เงื่อไขพิเศษ</th>
    </tr>
    </thead>
</table>


<div id="toolbar" style='padding: 10px'>
    <a href="#" class="easyui-linkbutton" iconCls="fa fa-plus" plain="false" onclick="newItem()">เพิ่มข้อมูล</a>
    <a href="#" class="easyui-linkbutton" iconCls="fa fa-edit" plain="false" onclick="editItem()">แก้ไขข้อมูล</a>
    <a href="#" class="easyui-linkbutton" iconCls="fa fa-remove" plain="false" onclick="removeItem()">ลบข้อมูล</a>
</div>

<!-- form -->

<div id="dlg" class="easyui-dialog" closed="true" buttons="#dlg-buttons" style='width: 600px; height: 400px;' data-options="modal: true, resizable: true">
    <?php echo form_open_multipart("",array("id"=>"fm"));?>
        <input type="hidden" name="unit_id" value=""/>
        <table class="table" style="width: 100%;">


            <tbody>


                <tr>
                    <td>แปลงที่</td>
                    <td><input type="text" name="land_no" required="true" class='easyui-textbox'/></td>
                     <td>ขนาดที่ดิน</td>
                    <td><input type="text" name="size_land" required="true" class='easyui-textbox'/></td>
                </tr>

                <tr>
                    <td>ราคาที่ / ตรว</td>
                    <td><input type="text" name="price_per_sqm" required="true" class='easyui-textbox'/></td>
                    <td>แบบบ้าน</td>
                    <td><input type="text" name="type_unit_id"  id="type_unit" class='easyui-combobox' required="required" /></td>
                </tr>

                <tr>
                    <td>ติดสวน</td>
                    <td><input type="text" name="near_park"  class='easyui-textbox' /></td>
                    <td>แปลงมุม</td>
                    <td><input type="text" name="land_corner" class='easyui-textbox' /></td>
                </tr>
                <tr>
                    <td>ราคาขาย</td>
                    <td><input type="text" name="price"  class='easyui-textbox'/></td>
                    <td>ส่วนลด</td>
                    <td><input type="text" name="discount" class='easyui-textbox' /></td>
                </tr>
                <tr>
                   <td>ราคาสุทธิ</td>
                   <td><input type="text" name="price_discount"  class='easyui-textbox'/></td>
                   <td>เฟส</td>
                   <td><input type="text" name="fest" class='easyui-textbox' /></td>
                </tr>
                 <tr>
                    <td>วันเริ่มก่อสร้าง</td>
                    <td><input type="text" name="start_date" data-options="formatter:formatterdate"  class='easyui-datebox'/></td>
                    <td>วันที่แล้วเสร็จ</td>
                    <td><input type="text" name="end_date"  data-options="formatter:formatterdate"  class='easyui-datebox'  /></td>
                </tr>

                 <tr>
                    <td>วันที่ส่งมอบ</td>
                    <td><input type="text" name="give_date" data-options="formatter:formatterdate"  class='easyui-datebox' /></td>
                    <td>วันที่ตรวจบ้าน</td>
                    <td><input type="text" name="check_date"  data-options="formatter:formatterdate"  class='easyui-datebox'  /></td>
                </tr>

                 <tr>
                    <td>วันที่โอน</td>
                    <td><input type="text" name="transfer_date" data-options="formatter:formatterdate"  class='easyui-datebox' /></td>
                    <td>วันทำสัญญา</td>
                    <td><input type="text" name="promise_date"  data-options="formatter:formatterdate"  class='easyui-datebox'  /></td>
                </tr>

                 <tr>
                    <td>วันที่จอง</td>
                    <td><input type="text" name="book_date" data-options="formatter:formatterdate"  class='easyui-datebox'/></td>
                    <td>ลูกค้า</td>
                    <td><input type="text" name="customer_id" id="customer" class='easyui-combobox'  /></td>
                </tr>
                 <tr>
                    <td>ค่าก่อสร้าง</td>
                    <td colspan="3"><input type="text" name="price_start" class="easyui-textbox"  /></td>
                </tr>


                <tr>
                    <td>ผู้คุมงาน</td>
                    <td colspan="3"><input type="text" name="foreman"  class='easyui-textbox'  style='width: 100%;' /></td>
                </tr>
                <tr>
                    <td>ผู้รับเหมาโครงสร้าง</td>
                    <td colspan="3"><input type="text" name="structure_name" class='easyui-textbox'  style='width: 100%;' /></td>
                </tr>

                <tr>
                    <td>ผู้รับเหมางานสถาปัตย์</td>
                    <td colspan="3"><input type="text" name="architecture_name"  class='easyui-textbox'  style='width: 100%;' /></td>

                </tr>
                <tr>
                    <td>ผู้รับเหมางานระบบไฟฟ้า</td>
                    <td colspan="3"><input type="text" name="dc_name"  class='easyui-textbox' style='width: 100%;' /></td>

                </tr>
                <tr>
                    <td>ผู้รับเหมางานระบบปะปา</td>
                    <td colspan="3"><input type="text" name="plumbing_name"  class='easyui-textbox' style='width: 100%;' /></td>

                </tr>
                <tr>
                    <td>เงื่อนไขพิเศษ</td>
                    <td colspan="3"><input type="text" name="remark"  class='easyui-textbox' data-options="multiline:true" style="height:60px; width: 100%;" /></td>

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

$('#type_unit').combobox({
    url:'<?=site_url('config/gettypeunit');?>',
    valueField:'type_unit_id',
    textField:'type_unit_name'
});

$('#customer').combobox({
    url:'<?=site_url('config/getcustomer');?>',
    valueField:'customer_id',
    textField:'full_name'
});

var url="";
var edit = false;
function newItem(){
    $('#dlg').dialog('open').dialog('setTitle','โครงการ');
    $('#fm').form('clear');
    url = '<?=site_url('unit/do_save');?>';
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
        url = '<?=site_url('unit/do_update');?>';
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
                $.post('<?=site_url('unit/delete');?>' ,{ unit_id:row.unit_id },function(result){
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

function formatterprice(value) {
    if (value==0) {
        return '-';
    } else {
        return value;
    }
}
function formatterdate(date){
    var y = date.getFullYear();
    var m = date.getMonth()+1;
    var d = date.getDate();
    return y+'-'+(m<10?('0'+m):m)+'-'+(d<10?('0'+d):d);
}

</script>