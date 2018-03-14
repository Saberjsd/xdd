
<?php
	$lgpage = 'image_update.php'; 
	require './header.php';
	//获取数据到修改框
	$f1 	= isset($_POST['action']) && $_POST['action'] == 'get';
	if($f1){
		// 
		$r 	= $mydb->getOneData('image','imgid,cateid,title,content','status=1 AND imgid='.$_POST['imgid']);
	}
	//修改数据
	$f2 	= isset($_POST['action']) && $_POST['action'] == 'update';
	if($f2){
		$data  = $_POST;
		$imgid = $data['imgid'];
		unset($data['imgid']);
		unset($data['action']);
		// var_dump($data);
		$res   =$mydb->updateData('image',$data,'imgid='.$imgid);
		// var_dump($res);
		if($res){
			header('Location:./image_list.php');
		}
	}
?>

<!-- start: Content -->
		<div class="main sidebar-minified">

			<div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-file-text"></i>美图修改</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="index.php">首页</a></li>			  	
						<li><i class="fa fa-file-text"></i>美图修改</li>				
					</ol>
				</div>
			</div>


			<div class="row">
				<div class="panel panel-default">
		            <div class="panel-heading">
		                <h2><i class="fa fa-indent red"></i><strong>美图修改</strong></h2>
		            </div>
		            <form action="image_update.php" method="post" class="form-horizontal" id="image-update-form">
		            <div class="panel-body">

						
							<input type="hidden" name="action" value="update">
							<div class="form-group">
			                    <label class="col-sm-3 control-label" for="input-imgid">美图ID</label>
			                    <div class="col-sm-6">
			                        <input type="text" id="input-imgid" name="imgid" class="form-control" value="<?=$f1 ? $r['imgid']:''?>">
			                    </div>
			                </div>
			                <div class="form-group">
			                    <label class="col-sm-3 control-label" for="input-cateid">所属栏目ID</label>
			                    <div class="col-sm-6">
			                        <input type="text" id="input-cateid" name="cateid" class="form-control" value="<?=$f1 ? $r['cateid']:''?>">
			                    </div>
			                </div>
			            
			                <div class="form-group">
			                    <label class="col-sm-3 control-label" for="input-title">标题</label>
			                    <div class="col-sm-6">
			                        <input type="text" id="input-title" name="title" class="form-control" value="<?=$f1 ? $r['title']:''?>">
			                    </div>
			                </div>
			            
				            <div class="form-group">
							  	<h4><label for="content">内容</label></h4>
							    <script id="input-content" name="content" type="text/plain" style="width:90%;height:200px"><?=$f1 ? $r['content']:''?></script>
						  	</div>
		                
		                
					</div>
					<div class="panel-footer">
	                    <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-dot-circle-o"></i> 保存</button>
                        <button type="button" class="btn btn-sm btn-danger" id="cancelbtn"><i class="fa fa-ban"></i> 取消</button>
	                </div>
	                </form>					
		        </div>
				
			</div><!--/.col-->
		</div><!--/.row-->

<?php 
	require './footer.php' ;
?>
<!-- 编辑器使用的==配置文件 start-->
    <script type="text/javascript" src="public/plug/ue/ueditor.config.js"></script>
    <script type="text/javascript" src="public/plug/ue/ueditor.all.js"></script>
    <!-- 编辑器使用的==配置文件 end-->
    <script type="text/javascript">
    var ue = UE.getEditor('input-content');
    </script>		
<script>

</script>