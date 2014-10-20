<?php !defined('FRAMEWORK_PATH') && exit('Access Denied');?>			<a href="http://localhost/forum/?my-upload.htm" <?php echo isset($_checked['upload']) ? $_checked['upload'] : '';?>>上传文件</a>
			<a href="http://localhost/forum/?my-image.htm" <?php echo isset($_checked['image']) ? $_checked['image'] : '';?>>上传图片</a>
			<a href="http://localhost/forum/?my-download.htm" <?php echo isset($_checked['download']) ? $_checked['download'] : '';?>>下载附件</a>
			