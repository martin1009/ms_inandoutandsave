<html>
	<head>
		<link rel="stylesheet" type="text/css" href="<?=base_url("public/css/prompt/error.css");?>" />
		<script charset="utf-8" src="<?=base_url("public/js/jquery.js");?>"></script>
		<script charset="utf-8" src="<?=base_url("public/js/prompt/error.js");?>"></script>
	</head>
	<body>
		<div id="main_div">
			<div class="div_2">
				<div class="div_3">
					<img src="<?=base_url("public/images/prompt/error/error.jpg");?>" />
				</div>
				<div class="div_4">
					<span>出错啦！！！！！</span>
				</div>
			</div>
			<div class="div_5" id="content_div">
				<div class="div_6" id="content_div_1">
					<span><?=$content;?></span>
				</div>
			</div>
			<div class="div_7">
				<a>还有<span id="time_text"><?=$time;?></span>秒跳转~~~</a><br/>
				<a href="<?=$url;?>" id="jump_url">如果浏览器没有跳转，请点击此处>>>>></a>
			</div>
		</div>
	</body>
</html>