<!-- функции связанные с регистрацией -->
<?php
	function made_onclick_ch_txt_sp_n($name,$is_autoriz_93714)//создание строки при клике для редактирования текста
	{
		if ($is_autoriz_93714==1)
	    {
	      echo "onclick=";
	      echo "\"change_txt_sp_n('".$name."')\"";
	    }
	    else
	    {

	    }
	}

	function HiddenIfNAutor($is_autoriz_93714)// скрывает если не авторизирован
	{
		if ($is_autoriz_93714==1)
	    {
	    }
	    else
	    {
	      echo "hidden";
	    }
	}

	function HiddenIfAutor($is_autoriz_93714)// скрывает авторизирован
	{
		/*echo $is_autoriz_93714;*/
		if ($is_autoriz_93714==1)
	    {
	      echo "hidden";
	    }
	    else
	    {
	    }
	}

	function is_autor_now($ses_id)//проверка авторизирован сеанс или нет
	{
/*		тута надо запрос к БД к таблице autoriz_seans что-бы проверить была авторизация или нет
		и в этом запросе я думаю очищать старые авторизированные сеансы более скажем 2 дней давности
*/		
		$mysqli = new mysqli('localhost', 'ant', 'stalker', 'bd');

		if ($mysqli->connect_error) 
		{
		    die('Fail connect (' . $mysqli->connect_errno . ') '
		            . $mysqli->connect_error);
		}

		if (mysqli_connect_error()) 
		{
		    die('Fail connect (' . mysqli_connect_errno() . ') '
		            . mysqli_connect_error());
		}
		
		/*echo 'Connection ready... ' . $mysqli->host_info ."\n";*/

		$n_t=gettimeofday();
		$txt_ses='';

		$query  = "SELECT * FROM  autoriz_seans as t1 where t1.ses_id='".session_id()."'";
		/*$query  = "SELECT * FROM  autoriz_seans as t1";*/
		/*$query  = "SELECT * FROM  graph_templ";*/
/*		echo $query;
		echo '****resultQ';
*/		if ($result = $mysqli->query($query))
		{
			/*echo "====";*/
			//while ($obj = mysqli_fetch_object($result))
			while ($obj = $result->fetch_object())
			{
				$txt_ses=$txt_ses.$obj->date_reg;
				return 1;
				/*mysqli_free_result($result);	*/
			}

			

/*			echo $txt_ses;
			echo "!!!!";
*/			mysqli_free_result($result);	
		}


		return 0;
	}
?>
