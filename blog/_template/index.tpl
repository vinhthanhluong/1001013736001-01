<?xml version='1.0' encoding='UTF-8' ?>
<!DOCTYPE html
	PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ja" xml:lang="ja">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>{=$base_title=}｜福津・宗像の不動産売却・相続問題解決なら｜ひかり不動産</title>
	<meta name="viewport" content="width=device-width, initial-scale=-100%, user-scalable=yes" />
	<meta name="format-detection" content="telephone=no">
	<meta name="keywords" content="{=$base_title=}">
	<meta name="description" content="{=$base_title=}">
	<meta http-equiv="Content-Style-Type" content="text/css" />
	<meta http-equiv="Content-Script-Type" content="text/javascript" />
	
	<link rel="stylesheet" href="../css/styles.css">
	<link rel="stylesheet" href="../css/responsive.css">
	<link rel="stylesheet" href="../css/under.css">
	<link rel="stylesheet" href="../css/under_res.css">

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-160345056-98"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag() { dataLayer.push(arguments); }
		gtag('js', new Date());

		gtag('config', 'UA-160345056-98');
	</script>
</head>

<body id="inner" class="under">
	<div id="wrapper">
		<header id="header">
			<div class="container">
				<h1>{=$base_title=}</h1>
				<!-- <h1>福津市・宗像市のひかり不動産からお客様へお知らせ</h1> -->
			</div>
		</header>

		<!-- <div id="gnav">
			<ul class="clearfix">
				<li><a href="./">Home</a></li>
				<li><a href="./search.php">検索</a></li>
			</ul>
		</div> -->

		<div id="main">
			<div id="mainvisual" style="background-image: url('../images/blog-img01.jpg');">
				<div class="container">
					<h2>
						{=$base_title=}
					</h2>
				</div>
			</div>
			<div id="content">
				<div class="section sec-h3">
					<div class="sec-wrapper">
						<div class="under-topic">
							<ul class="topic_path">
								<li><a href="https://www.baikyaku-hikari.com">トップ</a></li>
								<li>{=$base_title=}</li>
							</ul>
						</div>

						<div class="under-bx">
							<h3 class="h3">{=$base_title=}</h3>
							<p>
								ひかり不動産は福津市、宗像市の不動産のプロとして不動産売却のサポートを行ってきました。弊社ではお客様ファーストを大切にし、ご事情・ご要望をじっくりとお伺いした上でお客様の利益につながるご提案ができるよう心がけております。こちらでは不動産売却に役立つ情報や無料相談会のお知らせ、その他お役立ち情報をお届けします。
							</p>
						</div>
					</div>
				</div>

				<div class="section">
					<ul class="under-cate">
						<ONCategory>
							<li class="cate-item">
								<a href="{=$category_url=}">{=$category_name=}</a>
							</li>
						</ONCategory>
					</ul>

					<?php $limitNum = 5 ?>
					<ONContributeSearch page="@$_GET['p']" limit="$limitNum" category="@$current_category_id">
						<ul class="under-post">
							<ONContributeFetch>
								<li class="pst-item ">
									<?php
										$dates = explode("/", $date);
									?>
									<div class="pst-head">
										<p class="pst-cate cate{=$category_id=}">{=$category_name=}</p>
										<p class="pst-date">{=$dates[0]=}.{=$dates[1]=}.{=$dates[2]=}</p>
									</div>
									<a href="{=$url=}" class="pst-tt">{=$title=}</a>
								</li>
							</ONContributeFetch>
						</ul>
						<ONPagenation record_count="$max_record_count" limit="$limitNum">
							<ONIf condition="$max_record_count > $limitNum">
								<ul class="blog_pager">
									<ONIf condition="$current_page <= 1">
										<li class="disabled"><a href="#">&lt;&lt;</a></li>
										<ONElse>
											<li><a href="./?p={=$current_page-1=}">&lt;&lt;</a></li>
									</ONIf>

									<ONPagenationFetch>
										<ONIf condition="$current_page == $page">
											<li class="active"><a href="#">{=$page=}</a></li>
											<ONElse>
												<li><a href="./?p={=$page=}">{=$page=}</a></li>
										</ONIf>
									</ONPagenationFetch>

									<ONIf condition="$current_page*$limitNum<$max_record_count">
										<li><a href="./?p={=$current_page+1=}">&gt;&gt;</a></li>
										<ONElse>
											<li class="disabled"><a href="#">&gt;&gt;</a></li>
									</ONIf>
								</ul>
							</ONIf>
						</ONPagenation>
					</ONContributeSearch>

					<!-- <ul class="under-post">
						<li class="pst-item ">
							<div class="pst-head">
								<p class="pst-cate">新着情報</p>
								<p class="pst-date">2022.05.12</p>
							</div>
							<a href="#" class="pst-tt">見出し見出し見出し見出し見出し見出し見出し見出し見出し見出し</a>
						</li>
						<li class="pst-item ">
							<div class="pst-head">
								<p class="pst-cate">新着情報</p>
								<p class="pst-date">2022.05.12</p>
							</div>
							<a href="#" class="pst-tt">見出し見出し見出し見出し見出し見出し見出し見出し見出し見出し</a>
						</li>
					</ul> -->
				</div>
			</div>
		</div>

		<footer id="footer">
			<p>Copyright &copy; All Rights Reserved.</p>
		</footer>
	</div>

	<script src="../js/jquery.js"></script>
	<script src="../js/sweetlink.js"></script>
	<script src="../js/common.js"></script>
	<script src="../js/matchHeight.js"></script>
</body>

</html>