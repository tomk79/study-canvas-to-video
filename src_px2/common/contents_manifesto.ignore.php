<?php
/**
 * Contents Manifesto
 *
 * このファイルは、コンテンツの制作環境を宣言します。
 * モジュールを定義するCSSやJavaScriptファイルを読み込みます。
 *
 * このファイルを異なるテーマ間で共有することにより、テーマを取り替えても、
 * コンテンツの表現を再現する前提を保証することができます。
 *
 * - テーマは、このパス (`/common/contents_manifesto.nopublish.inc.php`) を、
 * headセクション内に `include()` します。
 * - このファイルの中にPHPの記述を埋め込むことができるように読み込みます。
 * - このファイルのスコープで `$px` を利用できるようにしてください。
 *
 * HTML上、コンテンツは `.contents` の中に置かれます。
 * 従って、このファイルで定義される内容は、`.contents` の中にのみ影響するように実装されるべきです。
 *
 */ ?>
 <?php
	 //$pxがない(=直接アクセスされた)場合、ここで処理を抜ける。
 	if(!$px){return;}
 ?>

<?php
	$url = $px->canonical();
	$page_info = $px->site()->get_current_page_info();
?>
<link rel="canonical" href="<?= htmlspecialchars( $url ) ?>" />

<!-- px2style -->
<link rel="stylesheet" href="<?php print htmlspecialchars($px->href('/common/px2style/dist/px2style.css')); ?>?" type="text/css" />
<link rel="stylesheet" href="<?php print htmlspecialchars($px->href('/common/px2style/dist/themes/default.css')); ?>?" type="text/css" />

<!-- Contents Script and Stylesheets -->
<link rel="stylesheet" href="<?php print htmlspecialchars($px->href('/common/styles/contents.css')); ?>?" type="text/css" />


<?php ob_start(); ?>
<!-- jQuery -->
<script src="<?php print htmlspecialchars($px->href('/common/scripts/jquery-3.5.1.min.js')); ?>" type="text/javascript"></script>

<!-- px2style -->
<script src="<?= htmlspecialchars( $px->href('/common/px2style/dist/px2style.js') ); ?>?"></script>

<!-- Contents Script and Stylesheets -->
<script src="<?= htmlspecialchars( $px->href('/common/scripts/contents.js') ); ?>?"></script>

<?php $px->bowl()->put( ob_get_clean().$px->bowl()->get_clean('foot'), 'foot' ); ?>
