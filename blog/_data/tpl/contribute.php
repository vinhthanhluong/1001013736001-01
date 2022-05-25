<?php

	$setting=unserialize(@file_get_contents(DATA_DIR.'/setting/overnotes.dat'));
	ini_set('mbstring.http_input', 'pass');
	parse_str($_SERVER['QUERY_STRING'],$_GET);
	$keyword=isset($_GET['k'])?trim($_GET['k']):'';
	$category=isset($_GET['c'])?trim($_GET['c']):'';
	$page=isset($_GET['p'])?trim($_GET['p']):'';
	$base_title = !empty($setting['title'])? $setting['title'] : 'OverNotes';

?><?php
	$contribute=get_contribute($contribute_id);
		$title=$contribute['title'];
	$category_id=$contribute['category'];
	$category_data=unserialize(@file_get_contents(DATA_DIR.'/category/'.$category_id.'.dat'));
	$category_name=$category_data['name'];
	$category_text=@$category_data['text'];
	$category_url=$category_data['id'];
	$field_id=$contribute['field'];
	$id=$contribute['id'];
	$field=get_field($field_id);
	$date=$contribute['public_begin_datetime'];
	$url=$contribute['url'].'/';

	foreach($field as $field_index=>$field_data){
		${$field_data['code'].'_Name'}=$field_data['name'];
		${$field_data['code'].'_Value'}=make_value(
		$field_data['name']
				,@$contribute['data'][$field_id][$field_index]
			,$field_data['type']
			,$id
			,$field_id
			,$field_index
		);
		if($field_data['type']=='image'){
			${$field_data['code'].'_Src'}=ROOT_URI.'/_data/contribute/images/'.@$contribute['data'][$field_id][$field_index];
		}
	}

?>
<?php
$current_category_id   = $category_id;
$current_category_name = $category_name;
?>
<?php
	$category_index=get_category_index();
	foreach($category_index as $rowid=>$id){
		$category_data=unserialize(@file_get_contents(DATA_DIR.'/category/'.$id.'.dat'));
		$category_url=$category_data['id'];
		$category_name=$category_data['name'];
		$category_text=@$category_data['text'];
		$category_id=$id;
		${'category'.$id.'_url'}=$category_data['id'];
		${'category'.$id.'_name'}=$category_data['name'];
		${'category'.$id.'_text'}=@$category_data['text'];
		$selected=(@$_GET['c']==$id?' selected="selected"':'');

?>
	<?php if( $current_category_id==$category_id ) $current_category_url = $category_url; ?>
<?php
	}
?>
<?php echo "<?xml version='1.0' encoding='UTF-8' ?>\n" ?>
<!DOCTYPE html
	PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ja" xml:lang="ja">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=-100%, user-scalable=yes" />
	<meta name="format-detection" content="telephone=no">
	<title><?php echo $title; ?><?php echo $base_title; ?>｜福津・宗像の不動産売却・相続問題解決なら｜ひかり不動産</title>
	<?php
	if($keywords_Value){
?>
		<meta name="keywords" content="<?php echo $keywords_Value; ?>" />
		<?php
	}else{
?>
			<meta name="keywords" content="<?php echo $title; ?>|<?php echo $base_title; ?>" />
	<?php
	}
?>
	<?php
	if($description_Value){
?>
		<meta name="description" content="<?php echo $description_Value; ?>" />
		<?php
	}else{
?>
			<meta name="description" content="<?php echo $title; ?>|<?php echo $base_title; ?>" />
	<?php
	}
?>
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
				<h1><?php echo $current_category_name; ?>｜<?php echo $base_title; ?></h1>
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
						<?php echo $current_category_name; ?>
					</h2>
				</div>
			</div>
			<div id="content">
				<div class="blog-topic">
					<div class="under-topic">
						<ul class="topic_path">
							<li><a href="https://www.baikyaku-hikari.com">トップ</a></li>
							<li><a href="../"><?php echo $base_title; ?></a>
							<li><a href="../<?php echo $current_category_url; ?>"><?php echo $current_category_name; ?></a></li>
							<li><?php echo $title; ?></li>
						</ul>
					</div>
				</div>
				<section class="section">
					<div class="blog-detail">
						<h3><?php echo $title; ?></h3>
						<div class="detail-item">
							<p class="detail-img">
								<?php
	if($img1_Value){
?>
									<img src="<?php echo $img1_Src; ?>" alt="<?php echo $title; ?>" />
								<?php
	}
?>
							</p>
							<?php
	if($text1_Value){
?><?php echo $text1_Value; ?><?php
	}
?>
						</div>
						<div class="detail-item">
							<p class="detail-img">
								<?php
	if($img2_Value){
?>
									<img src="<?php echo $img2_Src; ?>" alt="<?php echo $title; ?>" />
								<?php
	}
?>
							</p>
							<?php
	if($text2_Value){
?><?php echo $text2_Value; ?><?php
	}
?>
						</div>
						<div class="detail-item">
							<p class="detail-img">
								<?php
	if($img3_Value){
?>
									<img src="<?php echo $img3_Src; ?>" alt="<?php echo $title; ?>" />
								<?php
	}
?>
							</p>
							<?php
	if($text3_Value){
?><?php echo $text3_Value; ?><?php
	}
?>
						</div>
						<div class="detail-item">
							<p class="detail-img">
								<?php
	if($img4_Value){
?>
									<img src="<?php echo $img4_Src; ?>" alt="<?php echo $title; ?>" />
								<?php
	}
?>
							</p>
							<?php
	if($text4_Value){
?><?php echo $text4_Value; ?><?php
	}
?>
						</div>
						<div class="detail-item">
							<p class="detail-img">
								<?php
	if($img5_Value){
?>
									<img src="<?php echo $img5_Src; ?>" alt="<?php echo $title; ?>" />
								<?php
	}
?>
							</p>
							<?php
	if($text5_Value){
?><?php echo $text5_Value; ?><?php
	}
?>
						</div>
						<div class="detail-item">
							<p class="detail-img">
								<?php
	if($img6_Value){
?>
									<img src="<?php echo $img6_Src; ?>" alt="<?php echo $title; ?>" />
								<?php
	}
?>
							</p>
							<?php
	if($text6_Value){
?><?php echo $text6_Value; ?><?php
	}
?>
						</div>
						<div class="detail-item">
							<p class="detail-img">
								<?php
	if($img7_Value){
?>
									<img src="<?php echo $img7_Src; ?>" alt="<?php echo $title; ?>" />
								<?php
	}
?>
							</p>
							<?php
	if($text7_Value){
?><?php echo $text7_Value; ?><?php
	}
?>
						</div>
						<div class="detail-item">
							<p class="detail-img">
								<?php
	if($img8_Value){
?>
									<img src="<?php echo $img8_Src; ?>" alt="<?php echo $title; ?>" />
								<?php
	}
?>
							</p>
							<?php
	if($text8_Value){
?><?php echo $text8_Value; ?><?php
	}
?>
						</div>
						<div class="detail-item">
							<p class="detail-img">
								<?php
	if($img9_Value){
?>
									<img src="<?php echo $img9_Src; ?>" alt="<?php echo $title; ?>" />
								<?php
	}
?>
							</p>
							<?php
	if($text9_Value){
?><?php echo $text9_Value; ?><?php
	}
?>
						</div>
						<div class="detail-item">
							<p class="detail-img">
								<?php
	if($img10_Value){
?>
									<img src="<?php echo $img10_Src; ?>" alt="<?php echo $title; ?>" />
								<?php
	}
?>
							</p>
							<?php
	if($text10_Value){
?><?php echo $text10_Value; ?><?php
	}
?>
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