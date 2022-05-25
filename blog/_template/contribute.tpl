<ONContribute id="$contribute_id"></ONContribute>
<?php
$current_category_id   = $category_id;
$current_category_name = $category_name;
?>
<ONCategory>
	<?php if( $current_category_id==$category_id ) $current_category_url = $category_url; ?>
</ONCategory>
<?xml version='1.0' encoding='UTF-8' ?>
<!DOCTYPE html
	PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ja" xml:lang="ja">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=-100%, user-scalable=yes" />
	<meta name="format-detection" content="telephone=no">
	<title>{=$title=}{=$base_title=}｜福津・宗像の不動産売却・相続問題解決なら｜ひかり不動産</title>
	<ONIf condition="$keywords_Value">
		<meta name="keywords" content="{=$keywords_Value=}" />
		<ONElse>
			<meta name="keywords" content="{=$title=}|{=$base_title=}" />
	</ONIf>
	<ONIf condition="$description_Value">
		<meta name="description" content="{=$description_Value=}" />
		<ONElse>
			<meta name="description" content="{=$title=}|{=$base_title=}" />
	</ONIf>
	<meta http-equiv="Content-Style-Type" content="text/css" />
	<meta http-equiv="Content-Script-Type" content="text/javascript" />

	<link rel="stylesheet" href="../../css/styles.css">
	<link rel="stylesheet" href="../../css/responsive.css">
	<link rel="stylesheet" href="../../css/under.css">
	<link rel="stylesheet" href="../../css/under_res.css">
</head>

<body id="inner" class="under">
	<div id="wrapper">
		<header id="header">
			<div class="container">
				<h1>{=$current_category_name=}｜{=$base_title=}</h1>
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
			<div id="mainvisual" style="background-image: url('../../images/blog-img01.jpg');">
				<div class="container">
					<h2>
						{=$current_category_name=}
					</h2>
				</div>
			</div>
			<div id="content">
				<div class="blog-topic">
					<div class="under-topic">
						<ul class="topic_path">
							<li><a href="https://www.baikyaku-hikari.com">トップ</a></li>
							<li><a href="../">{=$base_title=}</a>
							<li><a href="../{=$current_category_url=}">{=$current_category_name=}</a></li>
							<li>{=$title=}</li>
						</ul>
					</div>
				</div>
				<section class="section">
					<div class="blog-detail">
						<h3>{=$title=}</h3>
						<div class="detail-item">
							<p class="detail-img">
								<ONIf condition="$img1_Value">
									<img src="{=$img1_Src=}" alt="{=$title=}" />
								</ONIf>
							</p>
							<ONIf condition="$text1_Value">{=$text1_Value=}</ONIf>
						</div>
						<div class="detail-item">
							<p class="detail-img">
								<ONIf condition="$img2_Value">
									<img src="{=$img2_Src=}" alt="{=$title=}" />
								</ONIf>
							</p>
							<ONIf condition="$text2_Value">{=$text2_Value=}</ONIf>
						</div>
						<div class="detail-item">
							<p class="detail-img">
								<ONIf condition="$img3_Value">
									<img src="{=$img3_Src=}" alt="{=$title=}" />
								</ONIf>
							</p>
							<ONIf condition="$text3_Value">{=$text3_Value=}</ONIf>
						</div>
						<div class="detail-item">
							<p class="detail-img">
								<ONIf condition="$img4_Value">
									<img src="{=$img4_Src=}" alt="{=$title=}" />
								</ONIf>
							</p>
							<ONIf condition="$text4_Value">{=$text4_Value=}</ONIf>
						</div>
						<div class="detail-item">
							<p class="detail-img">
								<ONIf condition="$img5_Value">
									<img src="{=$img5_Src=}" alt="{=$title=}" />
								</ONIf>
							</p>
							<ONIf condition="$text5_Value">{=$text5_Value=}</ONIf>
						</div>
						<div class="detail-item">
							<p class="detail-img">
								<ONIf condition="$img6_Value">
									<img src="{=$img6_Src=}" alt="{=$title=}" />
								</ONIf>
							</p>
							<ONIf condition="$text6_Value">{=$text6_Value=}</ONIf>
						</div>
						<div class="detail-item">
							<p class="detail-img">
								<ONIf condition="$img7_Value">
									<img src="{=$img7_Src=}" alt="{=$title=}" />
								</ONIf>
							</p>
							<ONIf condition="$text7_Value">{=$text7_Value=}</ONIf>
						</div>
						<div class="detail-item">
							<p class="detail-img">
								<ONIf condition="$img8_Value">
									<img src="{=$img8_Src=}" alt="{=$title=}" />
								</ONIf>
							</p>
							<ONIf condition="$text8_Value">{=$text8_Value=}</ONIf>
						</div>
						<div class="detail-item">
							<p class="detail-img">
								<ONIf condition="$img9_Value">
									<img src="{=$img9_Src=}" alt="{=$title=}" />
								</ONIf>
							</p>
							<ONIf condition="$text9_Value">{=$text9_Value=}</ONIf>
						</div>
						<div class="detail-item">
							<p class="detail-img">
								<ONIf condition="$img10_Value">
									<img src="{=$img10_Src=}" alt="{=$title=}" />
								</ONIf>
							</p>
							<ONIf condition="$text10_Value">{=$text10_Value=}</ONIf>
						</div>
					</div>
				</section>
			</div>
		</div>

		<footer id="footer">
			<p>Copyright &copy; All Rights Reserved.</p>
		</footer>
	</div>

	<script src="../../js/jquery.js"></script>
	<script src="../../js/sweetlink.js"></script>
	<script src="../../js/common.js"></script>
	<script src="../../js/matchHeight.js"></script>
</body>

</html>