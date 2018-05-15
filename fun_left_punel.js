/*Функции левой	панели*/

/*Функции списка объектов*/
function onclick_list_li(elem)//обработка клика на объекте списке объектов
{
	return;
	/*document.getElementById("txt_php").innerHTML=elem.id;*/
	
	/*move_cursor_list_li(elem.id);*/

	//двигаем курсор
	/*document.getElementById("txt_php").innerHTML="222";*/
	/*alert(elem.id);*/

	link_href1="index.php?path_now=";
	par_id=elem.parentElement.id;
	link_href2="";

	id_thrue=get_thrue_name(elem.id);

	while (par_id!="list_ob_ul")
	{
		
		//замена служебных символов
		path_par=get_thrue_name(par_id);

/*		alert(id_thrue);
		alert(path_par);
*/
		if (id_thrue==path_par)
		{
			elem_1=document.getElementById(par_id);
			par_id=elem_1.parentElement.id;
			continue;
		}
/*		path_par=par_id.replace(/-0-/g,".");;
		path_par=path_par.replace("_file_id","");
		path_par=path_par.replace("_dir_id","");
		path_par=path_par.replace("list_li_","");
		path_par=path_par.replace("list_ul_","");
*/

		link_href2 =path_par+"/"+link_href2;// формируем путь
		elem_1=document.getElementById(par_id);
		par_id=elem_1.parentElement.id;
	}
/*	alert(link_href1);
	alert(link_href2);
	alert(elem.id);
*/
	/*+elem.id+"|||"+elem.parentElement.id;*/

	if ((elem.id.indexOf("_dir_")==-1) && (elem.id.indexOf("list_root_li")==-1))
	{
		link_href =link_href1+link_href2+"&&open="+elem.id;

	}
	else
	{
		link_href =link_href1+link_href2+elem.id+"&&open="+elem.id; //+elem.id
	}

	
	

	document.location.href = link_href;
}




function dblclick_list_li(elem) //двойной клики на объекте списка объектов
{
/*	if ((elem.id.indexOf("_dir_")==-1) && (elem.id.indexOf("list_root_li")==-1))
	{
		return;
	}


	link_href1="index.php?path_now=";
	par_id=elem.parentElement.id;
	link_href2="";

	id_thrue=get_thrue_name(elem.id);

	while (par_id!="list_ob_ul")
	{
		
		//замена служебных символов
		path_par=get_thrue_name(par_id);


		if (id_thrue==path_par)
		{
			elem_1=document.getElementById(par_id);
			par_id=elem_1.parentElement.id;
			continue;
		}

		link_href2 =path_par+"/"+link_href2;// формируем путь
		elem_1=document.getElementById(par_id);
		par_id=elem_1.parentElement.id;
	}

	link_href =link_href1+link_href2+elem.id; //+elem.id
	document.location.href = link_href;
*/}

function get_thrue_name(id)
{
	pid=id.replace(/-0-/g,".");
	pid=pid.replace("_file_id","");
	pid=pid.replace("_dir_id","");
	pid=pid.replace("list_li_","");
	pid=pid.replace("list_ul_","");
	pid=pid.replace("_id","");

	return pid;
}

function move_cursor_list_li(elem_id) //движение курсора
{
	/*$('#list_ob_ul li').css("background-color","RGB(255, 255, 255)");*/
	/*$('#list_ob_ul li).css("background","RGB(235, 233, 159)");*/
	/*$('#list_ob_ul li[id!="'+elem_id+'""]').hover(backgr_over,backgr_out);*/

	/*$('#'+elem_id).css("background-color","RGB(176, 174, 119)");*/

	$('#list_ob_ul li').removeClass("list_li_cl_pos_curs");
	$('#list_ob_ul span').removeClass("list_li_cl_pos_curs");
	$('#'+elem_id).addClass("list_li_cl_pos_curs");
}

/*function backgr_over()
{
	$(this).css("background-color","RGB(235, 233, 159)");
}

function backgr_out()
{
	$(this).css("background-color","RGB(255, 255, 255)");
}*/