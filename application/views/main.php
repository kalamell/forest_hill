<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Forrest Hill</title>
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/themes/bootstrap/easyui.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/themes/icon.css">
    <link rel="stylesheet" href="<?=base_url();?>assets/font-awesome/css/font-awesome.min.css">
    <script type="text/javascript" src="<?=base_url();?>assets/jquery.min.js"></script>
    <script type="text/javascript" src="<?=base_url();?>assets/jquery.easyui.min.js"></script>


    <script src="<?=base_url();?>assets/bootstrap/js/bootstrap.min.js"></script>

    <style>
        body {
            background:url('<?=base_url();?>images/bg.jpg') top center no-repeat;
            background-size: cover;
        }
        .layout-panel-north { background: transparent; }


    </style>


</head>
<body>


<!-- Fixed navbar -->
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">ระบบจัดการ Forrest Hill</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <!--<li class="active"><a href="#">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
             <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li role="separator" class="divider"></li>
                <li class="dropdown-header">Nav header</li>
                <li><a href="#">Separated link</a></li>
                <li><a href="#">One more separated link</a></li>
              </ul>
            </li> -->
          </ul>
          <ul class="nav navbar-nav navbar-right">
             <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">ยินดีต้อนรับคุณ <?=get_name();?> <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="<?=site_url('auth/logout');?>" onclick="javascript: return confirm('ต้องการออกจากระบบหรือไม่? ');">ออกจากระบบ</a></li>
             <!--    <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li> -->
<!--                 <li role="separator" class="divider"></li>
                <li class="dropdown-header">Nav header</li>
                <li><a href="#">Separated link</a></li>
                <li><a href="#">One more separated link</a></li> -->
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container-fluid">
        <div class="row" style='height:85vh;'>
            <div class="col-md-12" style='height:85vh;'>
                <div class="easyui-layout" fit="true">
                    <div data-options="region:'north'" style="height:60px; border-top: 0px;    border-left: 0px;    border-right: 0px; background: transparent;">
                         <img src="<?=base_url('images/logo.png');?>" style='height: 50px;'/>
                    </div>
                   <!--  <div data-options="region:'south',split:true" style="height:50px;padding: 10px;">
                       <p style='text-align: center'>มีข้อเสนอหรือซักถามโปรดติดต่อ 088-111-1111</p>
                   </div> -->

                    <!-- <div data-options="region:'east',split:true" title="East" style="width:180px;">
                        <ul class="easyui-tree" data-options="url:'tree_data1.json',method:'get',animate:true,dnd:true"></ul>
                    </div> -->

                    <div data-options="region:'west',split:true" title="Menu" style="width:220px;">
                        <div class="easyui-accordion" data-options="fit:true,border:false">
                            <div title="ส่วนข้อมูล" style="padding:5px"  data-options="iconCls:'fa fa-laptop'">

                                <ul id="menu" class="easyui-tree" >
                                    <li  >
                                        <span>ส่วนข้อมูล</span>
                                        <ul>
                                            <li data-options="state:'closed'">
                                                <span>โครงการ</span>
                                                <ul>
                                                    <li><span><a href="#" onclick="addTab('จัดการ ประเภทโครงการ', '<?=site_url('type_project');?>');">ประเภทโครงการ</a></span></li>
                                                     <li><span><a href="#" onclick="addTab('จัดการ โครงการ', '<?=site_url('project');?>');">โครงการ</a></span></li>
                                                </ul>
                                            </li>

                                            <li data-options="state:'closed'">
                                                <span>ลูกค้า</span>
                                                <ul>
                                                    <li><span><a href="#" onclick="addTab('จัดการ ประเภทลูกค้า', '<?=site_url('type_customer');?>');">ประเภทลูกค้า</a></span></li>
                                                     <li><span><a href="#" onclick="addTab('จัดการ ลูกค้า', '<?=site_url('customer');?>');">ลูกค้า</a></span></li>
                                                </ul>
                                            </li>


                                            <li  data-options="state:'closed'">
                                                <span>พนักงาน</span>
                                                <ul>

                                                    <li><span><a href="#" onclick="addTab('จัดการ หน่วยงาน', '<?=site_url('department');?>');">จัดการหน่วยงาน</a></span></li>
                                                    <li><span><a href="#" onclick="addTab('จัดการ ประเภทพนักงาน', '<?=site_url('position');?>');">ประเภทพนักงาน</a></span></li>
                                                     <li><span><a href="#" onclick="addTab('จัดการ โครงการ', '<?=site_url('staff');?>');">จัดการพนักงาน</a></span></li>
                                                </ul>

                                            </li>

                                             <li  data-options="state:'closed'">
                                                <span>บ้าน</span>
                                                <ul>


                                                    <li><span><a href="#" onclick="addTab('จัดการ ประเภทบ้าน', '<?=site_url('type_home');?>');">ประเภทบ้าน</a></span></li>
                                                     <li><span><a href="#" onclick="addTab('จัดการ บ้าน', '<?=site_url('home');?>');">บ้าน</a></span></li>
                                                </ul>

                                            </li>

                                            <li  data-options="state:'closed'">
                                                <span>ยูนิต</span>
                                                <ul>


                                                    <li><span><a href="#" onclick="addTab('จัดการ ประเภทยูนิต', '<?=site_url('type_unit');?>');">ประเภทยูนิต</a></span></li>
                                                     <li><span><a href="#" onclick="addTab('จัดการ ยูนิต', '<?=site_url('unit');?>');">ยูนิต</a></span></li>
                                                </ul>

                                            </li>

                                            <li  data-options="state:'closed'">
                                                <span>งาน</span>
                                                <ul>
                                                    <li><span><a href="#" onclick="addTab('จัดการ หมวดงาน', '<?=site_url('category');?>');">หมวดงาน</a></span></li>
                                                    <li><span><a href="#" onclick="addTab('จัดการ กลุ่มงาน', '<?=site_url('groups');?>');">กลุ่มงาน</a></span></li>
                                                    <li><span><a href="#" onclick="addTab('จัดการ งาน', '<?=site_url('work');?>');">งาน</a></span></li>
                                                </ul>
                                            </li>


                                            <li  data-options="state:'closed'">
                                                <span>งบประมาณ</span>
                                                <ul>
                                                    <li><span><a href="#" onclick="addTab('จัดการ หมวดงบประมาณ', '<?=site_url('type_budgets');?>');">หมวดงบประมาณ</a></span></li>
                                                    <li><span><a href="#" onclick="addTab('จัดการ งบประมาณ', '<?=site_url('budgets');?>');">งบประมาณ</a></span></li>
                                                </ul>
                                            </li>

                                            <li  data-options="state:'closed'">
                                                <span>โปรโมชั่น</span>
                                                <ul>
                                                    <li><span><a href="#" onclick="addTab('จัดการ Promotion', '<?=site_url('promotion');?>');">โปรโมชั่น</a></span></li>
                                                </ul>
                                            </li>

                                            <li  data-options="state:'closed'">
                                                <span>หน่วยงานราชการ</span>
                                                <ul>
                                                    <li><span><a href="#" onclick="addTab('หน่วยงานราชการ', '<?=site_url('affair');?>');">หน่วยงานราชการ</a></span></li>
                                                </ul>
                                            </li>

                                            <li  data-options="state:'closed'">
                                                <span>ผู้ติดต่อ</span>
                                                <ul>
                                                    <li><span><a href="#" onclick="addTab('จัดการ ผู้ติดต่อ', '<?=site_url('contact');?>');">ผู้ติดต่อ</a></span></li>
                                                </ul>
                                            </li>

                                            <li  data-options="state:'closed'">
                                                <span>ผู้รับจ้าง</span>
                                                <ul>
                                                    <li><span><a href="#" onclick="addTab2('จัดการ บ้าน', '<?=site_url('staff');?>');">ประเภทผู้รับจ้าง</a></span></li>
                                                    <li><span><a href="#" onclick="addTab2('จัดการ บ้าน', '<?=site_url('staff');?>');">ผู้รับจ้าง</a></span></li>
                                                </ul>
                                            </li>

                                             <li  data-options="state:'closed'">
                                                <span>ค่าใช้จ่าย</span>
                                                <ul>
                                                    <li><span><a href="#" onclick="addTab2('จัดการ บ้าน', '<?=site_url('staff');?>');">ประเภทค่าใช้จ่าย</a></span></li>
                                                    <li><span><a href="#" onclick="addTab2('จัดการ บ้าน', '<?=site_url('staff');?>');">ค่าใช้จ่าย</a></span></li>
                                                </ul>
                                            </li>

                                            <li  data-options="state:'closed'">
                                                <span>งวดงานธนาคาร</span>
                                                <ul>
                                                    <li><span><a href="#" onclick="addTab2('จัดการ บ้าน', '<?=site_url('staff');?>');">งวดงานธนาคาร</a></span></li>
                                                </ul>
                                            </li>

                                            <li  data-options="state:'closed'">
                                                <span>เอกสาร</span>
                                                <ul>
                                                    <li><span><a href="#" onclick="addTab2('จัดการ บ้าน', '<?=site_url('staff');?>');">กลุ่มงานเอกสาร</a></span></li>
                                                    <li><span><a href="#" onclick="addTab2('จัดการ บ้าน', '<?=site_url('staff');?>');">เอกสาร</a></span></li>
                                                </ul>
                                            </li>

                                            <li  data-options="state:'closed'">
                                                <span>PO</span>
                                                <ul>
                                                    <li><span><a href="#" onclick="addTab2('จัดการ บ้าน', '<?=site_url('staff');?>');">หมวดค่าใช้จ่าย</a></span></li>
                                                    <li><span><a href="#" onclick="addTab2('จัดการ บ้าน', '<?=site_url('staff');?>');">PO</a></span></li>
                                                </ul>
                                            </li>

                                            <li  data-options="state:'closed'">
                                                <span>เรื่องอนุมัติ</span>
                                                <ul>
                                                    <li><span><a href="#" onclick="addTab2('จัดการ บ้าน', '<?=site_url('staff');?>');">หมวดงานอนุมัติ</a></span></li>
                                                    <li><span><a href="#" onclick="addTab2('จัดการ บ้าน', '<?=site_url('staff');?>');">เรื่องอนุมัติ</a></span></li>
                                                </ul>
                                            </li>

                                            <li  data-options="state:'closed'">
                                                <span>งวดงานแบงก์</span>
                                                <ul>
                                                    <li><span><a href="#" onclick="addTab2('จัดการ บ้าน', '<?=site_url('staff');?>');">งวดงานแบงก์</a></span></li>
                                                </ul>
                                            </li>

                                            <li  data-options="state:'closed'">
                                                <span>เครื่องมือ</span>
                                                <ul>
                                                    <li><span><a href="#" onclick="addTab2('จัดการ บ้าน', '<?=site_url('staff');?>');">เครื่องมือ</a></span></li>
                                                </ul>
                                            </li>

                                            <li  data-options="state:'closed'">
                                                <span>จำนวนวัสดุ BOQ</span>
                                                <ul>
                                                    <li><span><a href="#" onclick="addTab2('จัดการ บ้าน', '<?=site_url('staff');?>');">จำนวนวัสดุ BOQ</a></span></li>
                                                </ul>
                                            </li>
                                            <li  data-options="state:'closed'">
                                                <span>กิจกรรมทางการตลาด</span>
                                                <ul>
                                                    <li><span><a href="#" onclick="addTab2('จัดการ บ้าน', '<?=site_url('staff');?>');">กิจกรรมทางการตลาด</a></span></li>
                                                </ul>
                                            </li>
                                            <li  data-options="state:'closed'">
                                                <span>แผนการโอน</span>
                                                <ul>
                                                    <li><span><a href="#" onclick="addTab2('จัดการ บ้าน', '<?=site_url('staff');?>');">แผนการโอน</a></span></li>
                                                </ul>
                                            </li>

                                            <li  data-options="state:'closed'">
                                                <span>สถานการณ์</span>
                                                <ul>
                                                    <li><span><a href="#" onclick="addTab2('จัดการ บ้าน', '<?=site_url('staff');?>');">สถานการณ์</a></span></li>
                                                </ul>
                                            </li>
                                            <li  data-options="state:'closed'">
                                                <span>ผู้รับเงิน</span>
                                                <ul>
                                                    <li><span><a href="#" onclick="addTab2('จัดการ บ้าน', '<?=site_url('staff');?>');">ผู้รับเงิน</a></span></li>
                                                    <li><span><a href="#" onclick="addTab2('จัดการ บ้าน', '<?=site_url('staff');?>');">หมวดผู้รับเงิน</a></span></li>
                                                </ul>
                                            </li>
                                            <li  data-options="state:'closed'">
                                                <span>แผนรายรับ</span>
                                                <ul>
                                                    <li><span><a href="#" onclick="addTab2('จัดการ บ้าน', '<?=site_url('staff');?>');">แผนรายรับ</a></span></li>
                                                </ul>
                                            </li>
                                            <li  data-options="state:'closed'">
                                                <span>Supplier</span>
                                                <ul>
                                                    <li><span><a href="#" onclick="addTab2('จัดการ บ้าน', '<?=site_url('staff');?>');">Supplier</a></span></li>
                                                </ul>
                                            </li>

                                            <li  data-options="state:'closed'">
                                                <span>แผนงานก่อสร้าง</span>
                                                <ul>
                                                    <li><span><a href="#" onclick="addTab2('จัดการ บ้าน', '<?=site_url('staff');?>');">แผนงานก่อสร้าง</a></span></li>
                                                </ul>
                                            </li>
                                            <li  data-options="state:'closed'">
                                                <span>วัสดุ</span>
                                                <ul>
                                                    <li><span><a href="#" onclick="addTab2('จัดการ บ้าน', '<?=site_url('staff');?>');">หมวดงานวัสดุ</a></span></li>
                                                     <li><span><a href="#" onclick="addTab2('จัดการ บ้าน', '<?=site_url('staff');?>');">วัสดุ</a></span></li>
                                                </ul>
                                            </li>






                                        </ul>
                                    </li>
                                </ul>


                            </div>




                            <div title="ฝ่ายก่อสร้าง" style="padding:5px;" data-options="iconCls:'fa fa-institution'">
                                <ul id="menu" class="easyui-tree" >
                                    <li  >
                                        <span>ฝ่ายก่อสร้าง</span>
                                        <ul>
                                            <li><span><a href="#" onclick="addTab2('บันทึกอัพเดตงานที่ออกแบบทำตามวันที่', '<?=site_url('type_project');?>');">บันทึกอัพเดตงานที่ออกแบบทำตามวันที่</a></span></li>
                                            <li><span><a href="#" onclick="addTab2('บันทึกอัพเดตงานคิดราคาที่ทำตามวันที่', '<?=site_url('type_project');?>');">บันทึกอัพเดตงานคิดราคาที่ทำตามวันที่</a></span></li>
                                            <li><span><a href="#" onclick="addTab2('บันทึกงานที่ประสานงานประจำสัปดาห์', '<?=site_url('type_project');?>');">บันทึกงานที่ประสานงานประจำสัปดาห์</a></span></li>
                                            <li><span><a href="#" onclick="addTab2('บันทึกงานตามสถานะตามวันที่', '<?=site_url('type_project');?>');">บันทึกงานตามสถานะตามวันที่</a></span></li>
                                            <li><span><a href="#" onclick="addTab2('บันทึกงานตามเปอร์เซ็นต์', '<?=site_url('type_project');?>');">บันทึกงานตามเปอร์เซ็นต์</a></span></li>
                                            <li><span><a href="#" onclick="addTab2('บันทึกเรื่องนำเสนอเพื่ออนุมัติประจำสัปดาห์', '<?=site_url('type_project');?>');">บันทึกเรื่องนำเสนอเพื่ออนุมัติประจำสัปดาห์</a></span></li>
                                            <li><span><a href="#" onclick="addTab2('บันทึกสถานะยูนิตประจำสัปดาห์', '<?=site_url('type_project');?>');">บันทึกสถานะยูนิตประจำสัปดาห์</a></span></li>
                                        </ul>
                                    </li>
                                </ul>


                            </div>
                            <div title="คลังวัสดุ" data-options="iconCls:'fa fa-folder'" style="padding:5px;">
                                <ul id="menu" class="easyui-tree" >
                                        <li  >
                                            <span>ฝ่ายก่อสร้าง</span>
                                            <ul>
                                                <li><span><a href="#" onclick="addTab2('บันทึกการใช้วัสดุแยกตามยูนิต', '<?=site_url('type_project');?>');">บันทึกการใช้วัสดุแยกตามยูนิต</a></span></li>
                                                <li><span><a href="#" onclick="addTab2('บันทึกการรับวัสดุ', '<?=site_url('type_project');?>');">บันทึกการรับวัสดุ</a></span></li>
                                                <li><span><a href="#" onclick="addTab2('บันทึกรับเครื่องมือเข้าคลัง', '<?=site_url('type_project');?>');">บันทึกรับเครื่องมือเข้าคลัง</a></span></li>
                                                <li><span><a href="#" onclick="addTab2('บันทึกจ่ายเครื่องมือออกคลัง', '<?=site_url('type_project');?>');">บันทึกจ่ายเครื่องมือออกคลัง</a></span></li>

                                            </ul>
                                        </li>
                                    </ul>

                            </div>
                            <div title="การตลาด" style="padding:5px" data-options="iconCls:' fa fa-car'">


                                <ul id="menu" class="easyui-tree" >
                                    <li  >
                                        <span>ฝ่ายก่อสร้าง</span>
                                        <ul>
                                            <li><span><a href="#" onclick="addTab2('บันทึกการทำกิจกรรมประจำสัปดาห์', '<?=site_url('type_project');?>');">บันทึกการทำกิจกรรมประจำสัปดาห์</a></span></li>
                                            <li><span><a href="#" onclick="addTab2('บันทึกปริมาณผู้สนใจประจำสัปดาห์', '<?=site_url('type_project');?>');">บันทึกปริมาณผู้สนใจประจำสัปดาห์</a></span></li>

                                        </ul>
                                    </li>
                                </ul>

                            </div>

                            <div title="ฝ่ายขาย" style="padding:5px" data-options="iconCls:' fa fa-users'">
                                <ul id="menu" class="easyui-tree" >
                                    <li  >
                                        <span>ฝ่ายก่อสร้าง</span>
                                        <ul>
                                            <li><span><a href="#" onclick="addTab2('บันทึกการทำกิจกรรมประจำสัปดาห์', '<?=site_url('type_project');?>');">บันทึกรายละเอียดลูกค้าที่เยี่ยมชมโครงการ</a></span></li>
                                            <li><span><a href="#" onclick="addTab2('บันทึกการทำกิจกรรมประจำสัปดาห์', '<?=site_url('type_project');?>');">บันทึกปริมาณลูกค้าแยกตามสถานะ</a></span></li>
                                            <li><span><a href="#" onclick="addTab2('บันทึกการทำกิจกรรมประจำสัปดาห์', '<?=site_url('type_project');?>');">บันทึกรายละเอียดการโอนแต่ละยูนิต</a></span></li>
                                            <li><span><a href="#" onclick="addTab2('บันทึกการทำกิจกรรมประจำสัปดาห์', '<?=site_url('type_project');?>');">บันทึกสถานะยูนิต</a></span></li>
                                            <li><span><a href="#" onclick="addTab2('บันทึกการทำกิจกรรมประจำสัปดาห์', '<?=site_url('type_project');?>');">บันทึกแผนงานขายครั้งเดียว</a></span></li>
                                        </ul>
                                    </li>
                                </ul>

                            </div>
                            <div title="ธุรการ" style="padding:10px" data-options="iconCls:' fa fa-book'">
                                <ul id="menu" class="easyui-tree" >
                                    <li  >
                                        <span>ธุรการ</span>
                                        <ul>
                                            <li><span><a href="#" onclick="addTab2('บันทึกงานประจำวัน', '<?=site_url('type_project');?>');">บันทึกงานประจำวัน</a></span></li>

                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <div title="รักษาความปลอดภัย" style="padding:10px"  data-options="iconCls:' fa fa-expeditedssl'">
                                <ul id="menu" class="easyui-tree" >
                                    <li  >
                                        <span>รักษาความปลอดภัย</span>
                                        <ul>
                                            <li><span><a href="#" onclick="addTab2('บันทึกสถานการณ์ประจำวัน', '<?=site_url('type_project');?>');">บันทึกสถานการณ์ประจำวัน</a></span></li>

                                        </ul>
                                    </li>
                                </ul>



                            </div>
                            <div title="บริการหลังการขาย" style="padding:10px" data-options="iconCls:'fa fa-book'">
                                <ul id="menu" class="easyui-tree" >
                                    <li  >
                                        <span>รักษาความปลอดภัย</span>
                                        <ul>
                                            <li><span><a href="#" onclick="addTab2('บันทึกสถานการณ์ประจำวัน', '<?=site_url('type_project');?>');">บันทึกรับเรื่องแจ้งซ่อมบ้านประจำวัน</a></span></li>
                                            <li><span><a href="#" onclick="addTab2('บันทึกสถานการณ์ประจำวัน', '<?=site_url('type_project');?>');">บันทึกใบเสนอราคาแจ้งซ่อมพร้อมเสนอพิจารณา</a></span></li>
                                        </ul>
                                    </li>
                                </ul>

                            </div>
                            <div title="บัญชีการเงิน" style="padding:10px" data-options="iconCls:'fa fa-credit-card'">
                                <ul id="menu" class="easyui-tree" >
                                    <li  >
                                        <span>รักษาความปลอดภัย</span>
                                        <ul>
                                                <li><span><a href="#" onclick="addTab2('บันทึกสถานการณ์ประจำวัน', '<?=site_url('type_project');?>');">บันทึกรับจ่ายประจำวัน -ใบสำคัญรับสำคัญจ่าย</a></span></li>
                                                <li><span><a href="#" onclick="addTab2('บันทึกสถานการณ์ประจำวัน', '<?=site_url('type_project');?>');">บันทึกต้นทุนการก่อสร้างตามใบPO</a></span></li>
                                                <li><span><a href="#" onclick="addTab2('บันทึกสถานการณ์ประจำวัน', '<?=site_url('type_project');?>');">บันทึกค่าใช้จ่ายแยกตามหมวดในงบการเงิน</a></span></li>
                                                <li><span><a href="#" onclick="addTab2('บันทึกสถานการณ์ประจำวัน', '<?=site_url('type_project');?>');">บันทึกงบประมาณ</a></span></li>
                                        </ul>
                                    </li>
                                </ul>

                            </div>
                            <div title="จัดซื้อ" style="padding:10px"  data-options="iconCls:'fa fa-credit-card'">
                                <ul id="menu" class="easyui-tree" >
                                    <li  >
                                        <span>รักษาความปลอดภัย</span>
                                        <ul>
                                            <li><span><a href="#" onclick="addTab2('บันทึกสถานการณ์ประจำวัน', '<?=site_url('type_project');?>');">บันทึกใบสั่งซื้อPO</a></span></li>
                                            <li><span><a href="#" onclick="addTab2('บันทึกสถานการณ์ประจำวัน', '<?=site_url('type_project');?>');">บันทึกรายละเอียดร้านค้า</a></span></li>
                                            <li><span><a href="#" onclick="addTab2('บันทึกสถานการณ์ประจำวัน', '<?=site_url('type_project');?>');">บันทึกรายละเอียดวัสดุ</a></span></li>
                                        </ul>
                                    </li>
                                </ul>

                            </div>
                            <div title="บริการจำลองสถานการณ์" style="padding:10px"  data-options="iconCls:'fa fa-credit-card'">
                            <ul id="menu" class="easyui-tree" >
                                    <li  >
                                        <span>รักษาความปลอดภัย</span>
                                        <ul>
                                            <li><span><a href="#" onclick="addTab2('บันทึกสถานการณ์ประจำวัน', '<?=site_url('type_project');?>');">ดอกเบี้ย</a></span></li>
                                            <li><span><a href="#" onclick="addTab2('บันทึกสถานการณ์ประจำวัน', '<?=site_url('type_project');?>');">ค่าก่อสร้าง</a></span></li>
                                            <li><span><a href="#" onclick="addTab2('บันทึกสถานการณ์ประจำวัน', '<?=site_url('type_project');?>');">ค่าธรรมเนียม</a></span></li>
                                            <li><span><a href="#" onclick="addTab2('บันทึกสถานการณ์ประจำวัน', '<?=site_url('type_project');?>');">วงเงินกู้</a></span></li>
                                            <li><span><a href="#" onclick="addTab2('บันทึกสถานการณ์ประจำวัน', '<?=site_url('type_project');?>');">ส่วนทุนกรรมการ</a></span></li>
                                            <li><span><a href="#" onclick="addTab2('บันทึกสถานการณ์ประจำวัน', '<?=site_url('type_project');?>');">คืนเงินกู้</a></span></li>
                                            <li><span><a href="#" onclick="addTab2('บันทึกสถานการณ์ประจำวัน', '<?=site_url('type_project');?>');">เปลี่ยนราคาขาย</a></span></li>
                                            <li><span><a href="#" onclick="addTab2('บันทึกสถานการณ์ประจำวัน', '<?=site_url('type_project');?>');">เปลี่ยนแบบบ้าน</a></span></li>
                                        </ul>
                                    </li>
                                </ul>

                            </div>

                        </div>
                    </div>


                    <div data-options="region:'center',title:'ระบบจัดการ Forrest Hill'"> <!--iconCls:'icon-ok'-->
                        <div class="easyui-tabs" id="tt" style='width: 100vh; height: 100vh;' data-options="fit:true,border:false,plain:true">
                            <div title="Welcome" closable="true" style="padding:10px;">
                                <h3 clsss='page-header'>ยินดีต้อนรับท่านเข้าสู่ระบบการจัดการ Forrest Hill</h3>
                                <p>ท่านสามารถเลือกเมนูได้จากเมนูซ้ายมือของท่าน</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
    function addTab(title, url){
        if ($('#tt').tabs('exists', title)){
            $('#tt').tabs('select', title);
        } else {
            var content = '<iframe scrolling="auto" frameborder="0"  src="'+url+'" style="width:100%;height:70vh;"></iframe>';
            $('#tt').tabs('add',{
                title:title,
                content:content,
                closable:true
            });
        }

    }
    function addTab2(title, url){
        alert('ขออภัยขณะนี้ กำลังจัดทำข้อมูล');
    }
    </script>
</body>
</html>