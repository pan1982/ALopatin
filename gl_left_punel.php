<!-- ЛЕВАЯ ОСНОВНАЯ ПАНЕЛЬ -->
<div id="l_punel_div">
	<ul id="l_punel_ul">
		<li id="li_1">
			<span id="sp_1"> 
				<!--  Окно краткого описания. Окно краткого описания. Окно краткого описания. -->

				<?php
					$obj_=get_op_obj();
					$dir_=get_dir();

					if((get_type_ob($obj_)=='dir')or(get_type_ob($obj_)=='pic')or(get_type_ob($obj_)=='txt'))
					{
						show_desrc($obj_,$dir_);
					}
				?>
			</span> <!-- должно быть окно краткого описания -->
		</li>

		<li id="li_2">
			<span id="sp_2">
				<?php
					// надо дописать открытие директории из параметра в строке ??? не будет сайт мониториться если так сделать роботами ???


					$Gallery_cl=new Gallery_cl();
					$Gallery_cl->ReadGallery(get_dir(),get_op_obj());

				?>
			</span> <!-- должно быть окно списка объектов -->
		</li>

		<li id="li_3" class="menu_p" onclick='change_txt_sp_n("11")'> <!-- кнопка редактировать -->
			<span id="sp_8" class="menu_sp" > Редактировать </span>
		</li>

	    <li id="autoriz_li_id"> <!-- окно регистрации -->
	    	<form id="autoriz_f_id" name="name" action="gl_fun_autoriz.php" method="post">  <!--  -->
	       		Login:   <input class="autoriz_in_cl" name="log_111" type="text" size="15" />  <!-- name="user[name]"  -->
	       		Passw. <input class="autoriz_in_cl" name="pass_111" type="text" size="15"  />  <!-- name="user[password]" -->
 	       		
 	       		<input class="autoriz_subm_cl" name="mainemenu_aut_exitButt_in_n" type="submit" value="LOGOUT" <?php HiddenIfNAutor($is_autoriz_93714)?> /> 
 	       		<!-- onclick="rigistr()" -->

 	       		<input class="autoriz_subm_cl" type="submit" value="LOGIN" <?php HiddenIfAutor($is_autoriz_93714)?> /> <!-- onclick="rigistr()" -->
	        </form>
	    </li>

  </ul>
</div>

<?php
	class Gallery_cl
	{
		public Function ReadGallery($dir_now,$open_obj) //чтение галереи
		{
/*			echo $open_obj;
			echo '<br>';
			echo $dir_now;
*/			/*echo "111";*/
			echo '<ul id="list_ob_ul">';
			$p1='Галерея';
			$p2='list_root_li';
			$p3='class="list_li_cl';
			if (($open_obj=="")or($open_obj=="/")or(trim($open_obj)=="list_root_li"))
			{
				$p3=$p3.' list_li_cl_pos_curs';
			}
			$p3=$p3.'"';

/*			$p3=$p3.' onclick="onclick_list_li(this)"';
			$p3=$p3.' ondblclick="dblclick_list_li(this)"';
*/			$p3=$p3.' style="margin-left:-40px;"';


			$this->add_li($p1,$p2,$p3,0);	//наименование,ИД,стиль1/свойства/ span or li    // ,курсор // 1

			/*$dir_now = $this->get_dir();*/
			/*echo "./data/".$dir_now;*/
			$levels=1;
			$this->make_father_dir($dir_now,$levels,$open_obj);	// созданине папок родителей		
			/*$label=$levels*-40;*/
			/*echo $levels;*/

			/*echo "./data/".$dir_now;*/
			$files1 = scandir("./data/".$dir_now);
			foreach($files1 as $entry)
			{
				/*echo $dir_now;*/

				if (($entry=='.') or($entry=='..')) continue;

				$p1=$entry;

				/*$p1=$p1.$file_t;*/
				$file_t1=filetype('./data/'.$dir_now.$entry);//тип объекта для ИД
				$entry2=str_replace(".","-0-",$entry);//заменяем точку для корректного ИД
				/*$entry2=$entry;*/
				$p2='list_li_';
				if (($dir_now!='')and($dir_now!='/'))
				{
					$p2=$p2.$dir_now;	
				}

				$p2=$p2.$entry2.'_'.$file_t1.'_id';//формируем ИД
				$p3='class="';

				if ($open_obj==$p2)
				{
					$p3=$p3.'list_li_cl_pos_curs ';
				}

				$type_f=$this->get_type_f($entry,$dir_now);

				if ($type_f=='dir')
				{
					$p3=$p3.'list_dir_li_cl list_li_cl"';
				}
				elseif ($type_f=='pic')
				{
					$p3=$p3.'list_pic_li_cl list_li_cl"';
				}
				elseif ($type_f=='txt')
				{
					$p3=$p3.'list_txt_li_cl list_li_cl"';
				}
				else
				{
					continue;
				}


/*				$p3=$p3.' onclick="onclick_list_li(this)"';
				$p3=$p3.' ondblclick="dblclick_list_li(this)"';
*/
				
				/*$p3=$p3.' style="margin-left:'.$label.'px;"';*/

				$this->add_li($p1,$p2,$p3,0);	//наименование,ИД,стиль1/свойства
			}

/*			for ($x=1; $x<$levels; $x++)
			{
				echo '</ul>';	
			}
*/			
			echo '</ul>';

			clearstatcache();
		}

		private Function make_father_dir($dir_now,$levels,$open_obj) // созданине папок родителей
		{
			/*echo $dir_now;*/
			$dir_list=explode("/",$dir_now);
			$dir_hist="";//путь к тек.элементу
			foreach($dir_list as $dir_1)
			{
				if ($dir_1=='') continue;
				if (stripos($dir_1,'_file_')!== false) continue;


				/*$levels=$levels+1;*/

				$p1=$dir_1;//наименование
				$file_t1="dir";//тип объекта для ИД // fath
				$dir_2=str_replace(".","-0-",$dir_1);//заменяем точку для корректного ИД
				$dir_2=$dir_hist.$dir_2;

				/*echo '<ul id="list_ul_'.$dir_2.'_id">';*/

				$p2='list_li_'.$dir_2.'_'.$file_t1.'_id';//формируем ИД

				/// классы, события
				$p3='class="';
				if ($open_obj==$p2)
				{
					$p3=$p3.'list_li_cl_pos_curs ';
				}
				$p3=$p3.'list_fath_dir_li_cl list_li_cl"';

				/*$p3=$p3.' onclick="onclick_list_li(this)"';*/
				/*$p3=$p3.' ondblclick="dblclick_list_li(this)"';*/

/*				$label=$levels*-40;
				$p3=$p3.' style="margin-left:'.$label.'px;"';
*/
				$this->add_li($p1,$p2,$p3,0);	//наименование,ИД,стиль1/свойства
				$dir_hist=$dir_2."/";//путь теперь
			}

		}

		private Function add_li($p1,$p2,$p3,$sp)//наименование,ИД,стиль1/свойства    //,$p4,отметка курсора
		{
			echo '<li';
			
			if ($p2!='')
			{
				echo ' id="'.$p2.'"';
			}

			if ($p3!='')
			{
				echo ' '.$p3;
			}

/*			echo ' data-cur='.$p4;*/

			echo'>';
			echo '<a href="index.php?path_now='.$p2.'"';
			/*echo '&&open='.$p2.'"';*/
			echo ' class="list_a_cl"';
			echo '>'.$p1.'</a>';
			/*echo $p1;*/
			echo '</li>';
			
		}

		private Function get_type_f($entry,$dir_now)//получение расширения файла
		{
			$file_t=filetype('./data/'.$dir_now.$entry);//тип объекта для ИД
			/*echo './data/'.$dir_now.$entry;*/
			if ($file_t=='dir')
			{
				return 'dir';
			}

			if (($this->its_pict($entry)!== false)&&(stripos($entry,'_sml')!== false))
			{
				return 'ico';
			}
			elseif ($this->its_pict($entry)!== false)
			{
				return 'pic';
			}
			elseif (stripos($entry,'.txt')!== false)
			{
				return 'txt';
			}
			else
			{
				return 'other';
			}
		}

		private Function its_pict($entry) //иденрификация картинки по строке
		{
			$entry=mb_strtolower($entry);
			if ((stripos($entry,'.jpg')!== false)
			or(stripos($entry,'.jpeg')!== false))
			{
				return true;
			}

			return false;
		}

		function __destruct() 
		{
		}
		

	}

?>

<!-- <script>
	move_cursor_list_li("list_root_li");
	// устанавливаем курсор на начало списка
</script>
-->