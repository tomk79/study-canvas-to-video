<?php ob_start(); ?><link rel="stylesheet" href="<?= htmlspecialchars( $px->path_files('/style.css') ) ?>" /><?php $px->bowl()->put( ob_get_clean(), 'head' );?>
<?php ob_start(); ?><script src="<?= htmlspecialchars( $px->path_files('/script.js') ) ?>"></script><?php $px->bowl()->put( ob_get_clean(), 'foot' );?>
これは、 Canvas から 動画ファイルを生成する練習です。

<div class="cont-canvas">
    <canvas id="cont-canvas" width="150" height="150"></canvas>
</div>

<ul>
    <li><button type="button" class="px2-btn" data-action="start-recording">録画開始</button></li>
    <li><button type="button" class="px2-btn" data-action="stop-recording">録画終了</button></li>
    <li><a href="javascript:void(0);" class="px2-btn" data-action="download-video">ダウンロード</a></li>
</ul>
