<?php

	$setting=unserialize(@file_get_contents(DATA_DIR.'/setting/overnotes.dat'));
	ini_set('mbstring.http_input', 'pass');
	parse_str($_SERVER['QUERY_STRING'],$_GET);
	$keyword=isset($_GET['k'])?trim($_GET['k']):'';
	$category=isset($_GET['c'])?trim($_GET['c']):'';
	$page=isset($_GET['p'])?trim($_GET['p']):'';
	$base_title = !empty($setting['title'])? $setting['title'] : 'OverNotes';

?><?php echo "<?xml version='1.0' encoding='UTF-8' ?>\n" ?>
<!DOCTYPE html
	PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ja" xml:lang="ja">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title><?php echo $base_title; ?>｜福津・宗像の不動産売却・相続問題解決なら｜ひかり不動産</title>
	<meta name="viewport" content="width=device-width, initial-scale=-100%, user-scalable=yes" />
	<meta name="format-detection" content="telephone=no">
	<meta name="keywords" content="<?php echo $base_title; ?>">
	<meta name="description" content="<?php echo $base_title; ?>">
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
				<h1><?php echo $base_title; ?></h1>
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
						<?php echo $base_title; ?>
					</h2>
				</div>
			</div>
			<div id="content">
				<div class="section sec-h3">
					<div class="sec-wrapper">
						<div class="under-topic">
							<ul class="topic_path">
								<li><a href="https://www.baikyaku-hikari.com">トップ</a></li>
								<li><?php echo $base_title; ?></li>
							</ul>
						</div>

						<div class="under-bx">
							<h3 class="h3"><?php echo $base_title; ?></h3>
							<p>
								ひかり不動産は福津市、宗像市の不動産のプロとして不動産売却のサポートを行ってきました。弊社ではお客様ファーストを大切にし、ご事情・ご要望をじっくりとお伺いした上でお客様の利益につながるご提案ができるよう心がけております。こちらでは不動産売却に役立つ情報や無料相談会のお知らせ、その他お役立ち情報をお届けします。
							</p>
						</div>
					</div>
				</div>

				<div class="section">
					<ul class="under-cate">
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
							<li class="cate-item">
								<a href="<?php echo $category_url; ?>"><?php echo $category_name; ?></a>
							</li>
						<?php
	}
?>
					</ul>

					<?php $limitNum = 5 ?>
					<?php
	$contribute_index=contribute_search(
		@$current_category_id
		,''
		,''
		,''
		,''
		,''
	);
	$max_record_count=count($contribute_index);

	$current_page=(@$_GET['p'])?(@$_GET['p']):1;
	$contribute_index=array_slice($contribute_index,($current_page-1)*$limitNum,$limitNum);
	$record_count=count($contribute_index)

?>
						<ul class="under-post">
							<?php
	$local_index=0;
	foreach($contribute_index as $rowid=>$index){
		$contribute=unserialize(@file_get_contents(DATA_DIR.'/contribute/'.$index['id'].'.dat'));
		$title=$contribute['title'];
		$url=$contribute['url'].'/';
		$category_id=$index['category'];
		$category_data=unserialize(@file_get_contents(DATA_DIR.'/category/'.$category_id.'.dat'));
		$category_name=$category_data['name'];
		$category_text=@$category_data['text'];
		$field_id=$index['field'];
		$date=$index['public_begin_datetime'];
		$id=$index['id'];
		$field=get_field($field_id);

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
		$local_index++;

?>
								<li class="pst-item ">
									<?php
										$dates = explode("/", $date);
									?>
									<div class="pst-head">
										<p class="pst-cate cate<?php echo $category_id; ?>"><?php echo $category_name; ?></p>
										<p class="pst-date"><?php echo $dates[0]; ?>.<?php echo $dates[1]; ?>.<?php echo $dates[2]; ?></p>
									</div>
									<a href="<?php echo $url; ?>" class="pst-tt"><?php echo $title; ?></a>
								</li>
							<?php
		foreach($field as $field_index=>$field_data){
			unset(${$field_data['code'].'_Name'});
			unset(${$field_data['code'].'_Value'});
			unset(${$field_data['code'].'_Src'});
		}
	}
?>
						</ul>
						<?php
	$page_count=(int)ceil($max_record_count/(float)$limitNum);
?>
							<?php
	if($max_record_count > $limitNum){
?>
								<ul class="blog_pager">
									<?php
	if($current_page <= 1){
?>
										<li class="disabled"><a href="#">&lt;&lt;</a></li>
										<?php
	}else{
?>
											<li><a href="./?p=<?php echo $current_page-1; ?>">&lt;&lt;</a></li>
									<?php
	}
?>

									<?php
	$page_old=@$page;
	for($page=1;$page<=$page_count;$page++){
?>
										<?php
	if($current_page == $page){
?>
											<li class="active"><a href="#"><?php echo $page; ?></a></li>
											<?php
	}else{
?>
												<li><a href="./?p=<?php echo $page; ?>"><?php echo $page; ?></a></li>
										<?php
	}
?>
									<?php
	}
$page=$page_old;
?>

									<?php
	if($current_page*$limitNum<$max_record_count){
?>
										<li><a href="./?p=<?php echo $current_page+1; ?>">&gt;&gt;</a></li>
										<?php
	}else{
?>
											<li class="disabled"><a href="#">&gt;&gt;</a></li>
									<?php
	}
?>
								</ul>
							<?php
	}
?>
						
					

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