<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

	<meta http-equiv="X-UA-Compatible" content="IE=7" />

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	
	<title>Adminus &#9679; Page</title>
		<?php echo $scripts_for_layout; ?>
		<?php echo $this->Html->css(array('style','jquery.wysiwyg','facebox', 'visualize', 'date_input')) ?>
		
	<!--[if lt IE 8]><style type="text/css" media="all">@import url("/adminus/css/ie.css");</style><![endif]-->

</head>
<body>
	<div id="hld">
		<div class="wrapper">		<!-- wrapper begins -->
			<div id="header">
				<div class="hdrl"></div>
				<div class="hdrr"></div>
				
				<h1><a href="#">Adminus</a></h1>
				
				<ul id="nav">
					<li class="active"><a href="#">Dashboard</a></li>
					<li ><a href="#">Usuários</a>
						<ul>
							<li><a href="/adminus/users/index">Mostrar</a></li>
							<li><a href="/adminus/users/add">Adicionar</a></li>
							<li><a href="/adminus/users/view">Ver</a>
							</li>
						</ul>
					</li>
					<li><a href="#">Posts</a></li>
					<li><a href="#">Media</a>
						<ul>
							<li><a href="#">List media</a></li>
							<li><a href="#">Add media</a></li>
							<li><a href="#">Something else</a></li>
						</ul>
					</li>
					<li><a href="#">Users</a></li>
				</ul>
				
				<p class="user">Hello, <a href="#">John</a> | <a href="index.html">Logout</a></p>
			</div>		<!-- #header ends -->
			

			<?php echo $content_for_layout; ?>

			
			<div id="footer">
			
				<p class="left"><a href="#">YourWebsite.com</a></p>
				<p class="right">powered by <a href="#">Adminus</a> v1.4</p>
				
			</div>
		
		
		</div>						<!-- wrapper ends -->
		
	</div>		<!-- #hld ends -->
	
	
	<!--[if IE]><script type="text/javascript" src="/adminus/js/adminus/excanvas.js"></script><![endif]-->	
	<script type="text/javascript" src="/-adminus/js/adminus/jquery.js"></script>
	<script type="text/javascript" src="/adminus/js/adminus/jquery.img.preload.js"></script>
	<script type="text/javascript" src="/adminus/js/adminus/jquery.filestyle.mini.js"></script>
	<script type="text/javascript" src="/adminus/js/adminus/jquery.wysiwyg.js"></script>
	<script type="text/javascript" src="/adminus/js/adminus/jquery.date_input.pack.js"></script>
	<script type="text/javascript" src="/adminus/js/adminus/facebox.js"></script>
	<script type="text/javascript" src="/adminus/js/adminus/jquery.visualize.js"></script>
	<script type="text/javascript" src="/adminus/js/adminus/jquery.visualize.tooltip.js"></script>
	<script type="text/javascript" src="/adminus/js/adminus/jquery.select_skin.js"></script>
	<script type="text/javascript" src="/adminus/js/adminus/jquery.tablesorter.min.js"></script>
	<script type="text/javascript" src="/adminus/js/adminus/ajaxupload.js"></script>
	<script type="text/javascript" src="/adminus/js/adminus/jquery.pngfix.js"></script>
	<script type="text/javascript" src="/adminus/js/adminus/custom.js"></script>
	
	<?php //echo $this->Html->script('adminus/jquery'); ?>
	
</body>
</html>