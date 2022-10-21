<!DOCTYPE HTML>
<html>
	<head>
		<title>All Times - Welcome</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="/css/bootstrap.css">
		<link rel="stylesheet" href="/css/admin/main.css" />
	</head>
	<body>
		<div id="wrapper">
			<!-- Main -->
			<div id="main">
				<div class="inner">
					<header id="header">
						<a href="/admin/dashboard" class="logo"><strong>ALL TIMES</strong> BLOG</a>
						<ul class="icons">
							<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
							<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
							<li><a href="#" class="icon fa-snapchat-ghost"><span class="label">Snapchat</span></a></li>
							<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
							<li><a href="#" class="icon fa-medium"><span class="label">Medium</span></a></li>
						</ul>
					</header>

					<!-- Content -->
					<div class="container">
						<?php use app\phpmvc\Application;
						if (Application::$app->session->getFlash('success')): ?>
							<div class="alert alert-success">
								<p><?php echo Application::$app->session->getFlash('success') ?></p>
							</div>
						<?php endif; ?>
						{{content}}
					</div>
				</div>
			</div>

			<!-- Sidebar -->
			<div id="sidebar">
				<div class="inner">
					<!-- Search -->
					<section id="search" class="alt">
						<form method="post" action="#">
							<input type="text" name="query" id="query" placeholder="Search" />
						</form>
					</section>
					<!-- Menu -->
					<nav id="menu">
						<header class="major">
							<h2>Menu</h2>
						</header>
						<ul>
							<li><a href="/admin/dashboard">Dashboard</a></li>
							<li>
								<span class="opener">Blog Category</span>
								<ul>
									<li><a href="/admin/category/view">View Categories</a></li>
									<li><a href="/admin/category/create">Add Category</a></li>
								</ul>
							</li>
							<li>
								<span class="opener">Tags</span>
								<ul>
									<li><a href="/admin/tag/view">All Tags</a></li>
									<li><a href="/admin/tag/create">Add Tag</a></li>
								</ul>
							</li>
							<li>
								<span class="opener">Blog Post</span>
								<ul>
									<li><a href="/admin/post/view">View Post</a></li>
									<li><a href="/admin/post/create">Add Post</a></li>
								</ul>
							</li>
							<li><a href="#">All Users</a></li>
							<li><a href="/">Home</a></li>
						</ul>
					</nav>

					<!-- Footer -->
					<footer id="footer">
						Copyright &copy;<script>document.write(new Date().getFullYear());</script> All Times News.
					</footer>
				</div>
			</div>
		</div>

		<!-- Scripts -->
		<script src="/js/admin/jquery.min.js"></script>
		<script src="/js/admin/skel.min.js"></script>
		<script src="/js/admin/util.js"></script>
		<script src="/js/admin/main.js"></script>
		<script src="/ckeditor/ckeditor.js" ></script>
		<!-- <script src="https://cdn.ckeditor.com/4.11.1/standard/ckeditor.js"></script> -->
		<script type="text/javascript">
			CKEDITOR.replace('content',{
			width: "800px",
			height: "300px"

			}); 
		</script>
		
	</body>
</html>