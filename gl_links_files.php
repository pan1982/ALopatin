<!-- подключение общих файлов для всех страниц -->

<link href="style2.css?<?php echo time(); ?>" type=text/css rel=stylesheet> <!-- общие стили всего сайта -->
<link href="style_txt_block.css?<?php echo time(); ?>" type=text/css rel=stylesheet> <!-- стили текстового модального блока редактирования текстов -->

<link rel="icon" href="./pict/ico_title.ico?<?php echo time(); ?>"><!-- иконка сайта -->

<script type="text/javascript" src="jquery-2.1.0.js"></script> <!-- модуль jquery -->
<script src="./Ajax.js?<?php echo time(); ?>"></script> <!-- функции Ajax (формирование и получение запросов сервера без их обработки и формирования) -->

<script type="text/javascript" src="./gl_fun.js?<?php echo time(); ?>"></script> <!-- общии ф-ии для сайта -->
<script type="text/javascript" src="./gl_fun_div_txt.js?<?php echo time(); ?>"></script> <!-- функции по редактированию текста текстового дива -->
<script type="text/javascript" src="./fun_left_punel.js?<?php echo time(); ?>"></script> <!-- функции левой панели -->


<?php
	require_once 'gl_fun.php'; /*общие ф-ии*/
?>