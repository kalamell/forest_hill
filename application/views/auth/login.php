
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/themes/bootstrap/easyui.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/themes/icon.css">
	<script type="text/javascript" src="<?=base_url();?>assets/jquery.min.js"></script>
	<script type="text/javascript" src="<?=base_url();?>assets/jquery.easyui.min.js"></script>

	<style>
	    body {
	        background:url('<?=base_url();?>images/bg.jpg') top center no-repeat;
	        background-size: cover;
	    }
	    .layout-panel-north { background: transparent; }


	</style>
</head>
<body>

	<div class="container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4" style="padding-top: 100px;">
				<p style="text-align: center;"><img src="<?=base_url('images/logo.png');?>" /></p>
				<div class="easyui-panel" title="เข้าสู่ระบบ" style="">
						<?php echo form_open('auth/do_login', array('id' => 'frmlogin'));?>
							<table class='table '>
								<tr>
									<td>Username:</td>
									<td><input name="username" class="form-control easyui-validatebox" autocomplete="off" placeholder="Username" required="true" value=""></td>
									<!-- <input class="easyui-validatebox" type="text" name="name" required="true"></input> -->
								</tr>
								<tr>
									<td>Password:</td>
									<td><input type="password" name="password" class="form-control easyui-validatebox" autocomplete="off" placeholder="Password" required="true"  value=""></td>
								</tr>

								<tr>
									<td></td>
									<td><input type="submit" class='btn btn-info btn-sm' value="เข้าสู่ระบบ"></input></td>
								</tr>
							</table>
						<?php echo form_close();?>
					</div>
				</div>
			</div>
		</div>


	</div>

	<script type="text/javascript">
		$(function(){
			$('#frmlogin').form({
				onSubmit:function(){
			        return $(this).form('validate');
			    },
				success:function(data){
					if (data=='fail') {
						$.messager.alert('เกิดข้อผิดพลาดในการเข้าระบบ', 'กรุณาตรวจสอบข้อมูลอีกครั้ง', 'warning');
					} else {
						top.location.href = '<?=site_url();?>';
					}

				}
			});
		});
	</script>
</body>
</html>