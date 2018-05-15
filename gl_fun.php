<!-- общие ф-ии ПХП -->

<?php
  function Get_txt_BD($id_el)
  {
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

    $txt_ses='';
    $id_el=strip_tags($id_el);//Удаляет HTML и PHP-теги из строки
    $query  = "SELECT * FROM  div_txt as t1 where t1.id='".$id_el."'";

    if ($result = $mysqli->query($query))
    {
      while ($obj = $result->fetch_object())
      {
        $txt_ses=$txt_ses.$obj->value;
      }
      mysqli_free_result($result);  

      return $txt_ses;
    }
  }

  // создание пункта меню
  function Create_par_menu($num,$on_click_fun,$need_autor,$name,$is_autoriz_93714)
  //№ пункта меню п/п, наименование фии события onclick, доступность к пункту для не автор. пользователей, наименование пункта меню, авторизирован или нет пользователь
  {
    if (($is_autoriz_93714==0)&($need_autor))
    {
      return;
    }


    echo "<li id=\"li_".$num."\" class=\"menu_p\" onclick=\"".$on_click_fun."\">";
    echo "<span id=\"sp_".$num."\" class=\"menu_sp\">".$name."</span>";
    echo "</li>";
  }

  Function get_dir()// получение читаемой директории из адреса страницы
  {
    if (isset($_GET['path_now'])) // путь для открытия
    {
      /*echo $_GET['path_now'];*/

      $dir_path=$_GET['path_now'];
      if ($dir_path=="list_root_li")
      {
        $dir_path="";
      }
      else
      {
        if (stripos($dir_path,'_file_')!== false) 
        {
          /*echo strrpos($dir_path,"/");*/
          $dir_path = substr($dir_path,0,strrpos($dir_path,"/"));

        }

        $dir_path=str_replace("-0-",".",$dir_path);
        /*$p2='list_li_'.$entry2.'_'.$file_t1.'_id';*/   //формируем ИД
        $dir_path=str_replace('list_li_',"",$dir_path);
        $dir_path=str_replace('_dir',"",$dir_path);
        $dir_path=str_replace('_file',"",$dir_path);
        $dir_path=str_replace('_id',"",$dir_path);

        /*echo $dir_path;*/
      }
      return $dir_path.'/';
    }
  }

  Function get_op_obj() // получаем открываемый объект
  {
    if (isset($_GET['path_now']))
    {
      return $_GET['path_now'];
    }
    else
    {
      return "";
    }

  }

  Function get_real_name_f($obj) //возврат настоящего наименования файла
  {
    $obj=str_replace("-0-",".",$obj);
    $obj=str_replace('list_li_',"",$obj);
    $obj=str_replace('_dir',"",$obj);
    $obj=str_replace('_file',"",$obj);
    $obj=str_replace('_id',"",$obj);

    return $obj;
  }

  Function its_pict($entry) //иденрификация картинки по строке
  {
    $entry=mb_strtolower($entry);
    if ((stripos($entry,'.jpg')!== false)
    or(stripos($entry,'.jpeg')!== false))
    {
      return true;
    }

    return false;
  }

  Function get_type_ob($obj)//получение типа файла
  {

    $obj=get_real_name_f($obj);

    if (file_exists('./data/'.$obj)==false)
    {
      return "unknown";
    }
    $file_t=filetype('./data/'.$obj);//тип объекта для ИД
    /*echo './data/'.$dir_now.$entry;*/
    if ($file_t=='dir')
    {
      return 'dir';
    }

    if ((its_pict($obj)!== false)&&(stripos($obj,'_sml')!== false))
    {
      return 'ico';
    }
    elseif (its_pict($obj)!== false)
    {
      return 'pic';
    }
    elseif (stripos($obj,'.txt')!== false)
    {
      return 'txt';
    }
    else
    {
      return 'other';
    }

  }  

  Function get_name_descr($obj) //возврат наименования файла описания от наименования файла объекта
  {
    $obj=str_replace(".JPG","",$obj);
    $obj=str_replace('.jpeg',"",$obj);
    $obj=str_replace(".txt","",$obj);

    $obj=$obj.".descr";    

    return $obj;
  }

  function show_desrc($obj_,$dir_)
  {
/*    echo '<br />';
    echo $obj_;
    echo '<br />';
    echo $dir_;*/

    $real_name_f=get_real_name_f($obj_);
    $real_name_f=get_name_descr($real_name_f);
/*    echo $real_name_f;*/

    if (file_exists("./data/".$real_name_f))
    {
      $fp = fopen("./data/".$real_name_f, "rb"); 

/*      if ($fp) 
      {
        while (!feof($fp))
        {
          $mytext = fgets($fp, 999);
          echo '7'.$mytext."<br />";
        }
      }
*/      
      if ($fp)
      {
        echo trim(fread($fp, filesize("./data/".$real_name_f)));  
      }
      

      fclose($fp);

      /*readfile("./data/".$real_name_f);*/
      /*echo "вввв";*/
    }
    else
    {
/*      echo "1";*/
    }
  }
?>