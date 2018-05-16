/*функции по редактированию текста текстового дива*/


function change_txt_sp_n(ID_elem)//новая функция открытия окна редактирования текста
{
	
	/*document.getElementById("m_txt_in").value=document.getElementById(ID_elem).innerHTML;*/
	// нужна или ф-я получания элемента по наличию класса или перебор элементов списка и проверку у кого их них есть клас курсора
	// ?? а может где-то хранить значение курсора ??
	var x = document.getElementById("sp_1").textContent;
	document.getElementById("txt_block_description").value= x.trim();

	id_tek_obj=document.getElementById("obj_get_id").textContent.trim();
	if ((id_tek_obj=='')||(id_tek_obj=='list_root_li'))
	{
		alert("Для корневого объекта свойств нету !!!");
	}
	else
	{
		document.getElementById("id_txt_block").innerHTML=id_tek_obj;
		SetData_form_id();
		document.location.href = "#BlockTxt_in";

	}

	/*	var elem_menu_ul=document.getElementById("list_ob_ul");
	var elem_menu_li=elem_menu_ul.getElementsByTagName('li');
	for (var i = 0; i < elem_menu_li.length; i++) 
	{
		if ($('#'+elem_menu_li[i].id).hasClass("list_li_cl_pos_curs"))
		{
			if (document.getElementById("id_txt_block").innerHTML=='list_root_li') 
			{
				alert("Для корневого объекта свойств нету !!!");
			}
			else
			{
				document.getElementById("id_txt_block").innerHTML=elem_menu_li[i].id;
				SetData_form_id();
				document.location.href = "#BlockTxt_in";
				break;
			}			
		}
	}*/
}

function SetData_form_id()
{
	var obj_name=document.getElementById("id_txt_block").innerHTML;

	obj_name_search=obj_name.toLowerCase();
	if (obj_name_search.search("_dir_")!=-1)
	{
		type_obj="Папка";
		type_obj2="fold";
	}
	else if((obj_name_search.search("_file_")!=-1)&&(obj_name_search.search("jpg_")!=-1))
	{
		type_obj="Изображение";
		type_obj2="pict";
	}
	else if((obj_name_search.search("_file_")!=-1)&&(obj_name_search.search("txt_")!=-1))
	{
		type_obj="Текст";
		type_obj2="txt";
	}
	else
	{
		type_obj="не распознан";  
		type_obj2="un";
	}
	
	document.getElementById("txt_block_type_obj_id").innerHTML=type_obj;

	obj_name=obj_name.replace(/-0-/g,".");
	obj_name=obj_name.replace("_file_id","");
	obj_name=obj_name.replace("_dir_id","");
	obj_name=obj_name.replace("list_li_","");

	document.getElementById("txt_block_file_dir_name_id").innerHTML=obj_name; //наименование файла/папки -->
	
	num_sym_=obj_name.indexOf(".");
	//document.getElementById("txt_block_synonym").value=obj_name.indexOf(".");
	if (num_sym_==-1)
	{
		obj_name2=obj_name;
	}
	else
	{
		obj_name2=obj_name.substring(0,num_sym_);
	}
	

	document.getElementById("txt_block_file_ico_id").value=obj_name2+"_"+type_obj2+"_sml.jpg"; /*Наименование файла иконки*/
	document.getElementById("txt_block_file_syn_id").value=obj_name2+"_"+type_obj2+".syn"; /*Наименование файла синонима*/
}

function close_txt_in()// закрытие блока редактирования текста
{
	document.location.href = "#close";
	document.getElementById("menu_txt_li_span_info").innerHTML="";
}

function Save_div_txt_BD()//сохранение информации в БД
{
	document.getElementById("menu_txt_li_span_info").innerHTML="Изменения сохранены";
}

function change_div_txt_txt()//активация поля ввода текста
{
	document.getElementById("menu_txt_li_span_info").innerHTML="";//стираем информационное поле
}