
<table id='data-grid' title="โครงการ" class="easyui-datagrid" url="<?=site_url('project/getdata');?>"
    data-options='toolbar:"#toolbar",
        loadMsg:"Processing, please wait …",
        pagination:"true",
        rownumbers:"true",
        fitColumns:"true",
        singleSelect:"true",
        pagelist:"[50,100,150,200]"'>

    <thead>
    <tr>
        <th field="project_id" width="10" hidden="true">ID</th>
        <th field="project_code" width="30">รหัสโครงการ</th>
        <th field="project_name" width="30">ชื่อประเภทโครงการ</th>
        <th field="type_project_name" width="30">ประเภทโครงการ</th>
        <th field="type_project_id" hidden="true" width="30">ID ประเภทโครงการ</th>
        <th field="location" hidden="true" width="30">ทำเลที่ตั้ง</th>
        <th field="land_size" hidden="true"  width="30">ขนาดที่ดิน</th>
        <th field="total_unit" width="30">จำนวนยูนิต</th>
        <th field="sale_avg" hidden="true"  width="30">ราคาขายเฉลี่ย</th>
        <th field="total_model" hidden="true"  width="30">จำนวนแบบบ้าน</th>
        <th field="sale_area" hidden="true"  width="30">พื้นที่ขาย</th>
        <th field="central_area" hidden="true"  width="30">พื้นที่ส่วนกลาง</th>
        <th field="start_date" width="30">วันเปิดโครงการ</th>
        <th field="close_date" width="30">วันปิดโครงการ</th>
        <th field="facilities" hidden="true"  width="30">สิ่งอำนวยวามสะดวก</th>
        <th field="price_per_sqm" hidden="true"  width="30">ราคาที่ดินต่อตารางวา</th>
        <th field="design_engineer" hidden="true"  width="30">วิศวกรออกแบบ</th>
        <th field="architect" hidden="true"  width="30">สถาปนิค</th>
        <th field="foreman"  hidden="true" width="30">วิศวกรคุมงาน</th>
        <th field="contact_land" hidden="true"  width="30">ผู้ประสานที่ดิน</th>
        <th field="contact_councils" hidden="true"  width="30">ผู้ประสาน เทศบาล</th>
        <th field="contact_water_supply"  hidden="true" width="30">ผู้ประสานปะปา</th>
    </tr>
    </thead>
</table>


<div id="toolbar">
    <a href="#" class="easyui-linkbutton" iconCls="fa fa-plus" plain="false" onclick="newItem()">เพิ่มข้อมูล</a>
    <a href="#" class="easyui-linkbutton" iconCls="fa fa-edit" plain="false" onclick="editItem()">แก้ไขข้อมูล</a>
    <a href="#" class="easyui-linkbutton" iconCls="fa fa-remove" plain="false" onclick="removeItem()">ลบข้อมูล</a>
</div>

<!-- form -->

<div id="dlg" class="easyui-dialog" closed="true" buttons="#dlg-buttons" style='width: 600px; height: 500px;' data-options="modal: true, resizable: true">
    <?php echo form_open_multipart("",array("id"=>"fm"));?>
        <input type="hidden" name="project_id" value=""/>
        <table class="table" style="width: 100%;">


            <tbody>
                <tr>
                    <td>รหัสโครงการ</td>
                    <td colspan='3'><input type="text" name="project_code" class='easyui-textbox' required="required" /></td>
                </tr>
                <tr>
                    <td>ชื่อโครงการ</td>
                    <td colspan="3"><input type="text" name="project_name" class='easyui-textbox' required="required" style="width: 100%;" /></td>
                </tr>
                <tr>
                    <td>ทำเลที่ตั้ง</td>
                    <td colspan="3"><input type="text" class="easyui-textbox" name="location" data-options="multiline:true" style="height:60px; width: 100%;" /></td>
                </tr>
                <tr>
                    <td>ขนาดที่ดิน</td>
                    <td><input type="text" name="land_size" class='easyui-textbox'/></td>
                     <td>มูลค่าโครงการ</td>
                    <td><input type="text" name="project_price" class='easyui-textbox'/></td>
                </tr>
                <tr>
                    <td>ประเภทโครงการ</td>
                    <td colspan="3"><input type="text" name="type_project_id"  id="type_project" class='easyui-combobox' required="required" /></td>

                </tr>
                <tr>
                    <td>จำนวนยูนิต</td>
                    <td><input type="text" name="total_unit"  class='easyui-textbox' /></td>
                    <td>ราคาขายเฉลี่ย</td>
                    <td><input type="text" name="sale_avg" class='easyui-textbox' /></td>
                </tr>
                <tr>
                    <td>จำนวนแบบบ้าน</td>
                    <td><input type="text" name="total_model"  class='easyui-textbox'/></td>
                    <td>พื้นที่ขาย</td>
                    <td><input type="text" name="sale_area" class='easyui-textbox' /></td>
                </tr>
                <tr>
                    <td>พื้นที่ส่วนกลาง</td>
                    <td colspan="3"><input type="text" class="easyui-textbox" name="central_area"data-options="multiline:true" style="height:60px; width: 100%;" /></td>
                </tr>
                 <tr>
                    <td>วันที่เริ่มเปิดโครงการ</td>
                    <td><input type="text" name="start_date" data-options="formatter:formatterdate"  class='easyui-datebox' required="required" /></td>
                    <td>วันที่ปิดโครงการ</td>
                    <td><input type="text" name="close_date"  data-options="formatter:formatterdate"  class='easyui-datebox'  /></td>
                </tr>

                 <tr>
                    <td>สิ่งอำนวยความสะดวก</td>
                    <td colspan="3"><input type="text" class="easyui-textbox" name="facilities"data-options="multiline:true" style="height:60px; width: 100%;" /></td>
                </tr>
                <tr>
                    <td>ราคาที่ดินต่อตารางวา</td>
                    <td colspan="3"><input type="text" name="price_per_sqm" class='easyui-textbox' /></td>
                </tr>

                <tr>
                    <td>วิศวกรออกแบบ</td>
                    <td colspan="3"><input type="text" name="design_engineer"  class='easyui-textbox' required="required" style='width: 100%;' /></td>
                </tr>
                <tr>
                    <td>สถาปนิกออกแบบ</td>
                    <td colspan="3"><input type="text" name="architect" class='easyui-textbox' required="required" style='width: 100%;' /></td>
                </tr>

                <tr>
                    <td>วิศวกรควบคุมงาน</td>
                    <td colspan="3"><input type="text" name="foreman"  class='easyui-textbox' required="required" style='width: 100%;' /></td>

                </tr>
                <tr>
                    <td>ผู้ติดต่อประสานงานที่ดิน</td>
                    <td colspan="3"><input type="text" name="contact_land"  class='easyui-textbox' style='width: 100%;' /></td>

                </tr>
                <tr>
                    <td>ผู้ติดต่อประสานงานเทศบาล</td>
                    <td colspan="3"><input type="text" name="contact_councils"  class='easyui-textbox' style='width: 100%;' /></td>

                </tr>
                <tr>
                    <td>ผู้ติดต่อประสานงานประปา</td>
                    <td colspan="3"><input type="text" name="contact_water_supply"  class='easyui-textbox'  style='width: 100%;' /></td>

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

$('#type_project').combobox({
    url:'<?=site_url('config/gettypeproject');?>',
    valueField:'type_project_id',
    textField:'type_project_name'
});

var url="";
var edit = false;
function newItem(){
    $('#dlg').dialog('open').dialog('setTitle','โครงการ');
    $('#fm').form('clear');
    url = '<?=site_url('project/do_save');?>';
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
        url = '<?=site_url('project/do_update');?>';
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
                $.post('<?=site_url('project/delete');?>' ,{ project_id:row.project_id },function(result){
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