<?php
	ini_set('display_errors',1);
	error_reporting(E_ALL);

	session_start();

	require_once 'gl_fun_autoriz1.php';

	define("ses_id", session_id());
	$is_autoriz_93714=0;

	$is_autoriz_93714=is_autor_now(ses_id);

?>

<!-- главная страница сайта -->


<!-- <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> -->
<!DOCTYPE html>

<!-- <html xmlns="http://www.w3.org/1999/xhtml"> -->
<html lang="pl">
 	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
		<meta http-equiv="cache-control" content="no-cache"/>
		<meta charset="utf-8">
		<meta name="description" content="Сайт про семью Лопатины, Лоскутниковы, Судленковы, Филюшины"/> <!-- описание контента для поисковых систем -->
		<!-- <title></title> -->
		<title>ЗАГОЛОВОК САЙТА</title>	
	</head>

	<?php
		/*echo isset($_GET['param1']);*/
/*		if (isset($_GET['path_now']))
		{
			echo $_GET['path_now'];
		}
*/		/*echo "Получены параметры с сервера: param1 = ".isset($_GET['param1'])." и param2 = ".isset($_GET['param2']);*/
		require_once 'gl_links_files.php'; /*подключение общих файлов (стили, функции)*/
 	?>


	<body id="body1">
		<p id="txt_php"></p> 
		
		<?php
			require_once 'gl_head_maine.php'; /*формирование шапки сайта (лого, контакты, заголовок), формирование параметров ГЕТ*/
			require_once 'gl_left_punel.php'; /*формирование левой панели сайта*/
			require_once 'gl_edit_txt.php'; /*модальный блок на странице для редактирования текста*/
			require_once 'gl_maine_window_info_div.php'; /*основное окно для вывода информации*/
		?>

<!-- 		<div id="maine_window_info_div">  
			<span id="m_txt_sp">
			</span>
 		</div>
 -->

	</body>
</html>