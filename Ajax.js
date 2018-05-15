/*var ArrMus = [];*/

/* Данная функция создаёт кроссбраузерный объект XMLHTTP */
function getXmlHttp() 
{
	var xmlhttp;
	try 
	{
		xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
	} 
	catch (e) 
	{
		try 
		{
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		} 
		catch (E) 
		{
			xmlhttp = false;
		}
	}
	
	if (!xmlhttp && typeof XMLHttpRequest!='undefined') 
	{
		xmlhttp = new XMLHttpRequest();
	}

	return xmlhttp;
}

function QueryF(NameF,TextQ,comand,id_elem)
{
	var xmlhttp = getXmlHttp(); // Создаём объект XMLHTTP
	var res_json;
	var res_txt;
	var nomMus;

	/*document.getElementById("txt_php").innerHTML ="111"+TextQ;*/

	xmlhttp.open('POST', NameF, true); // Открываем асинхронное соединение
	xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded'); // Отправляем кодировку
	xmlhttp.setRequestHeader('Content_test', '123'); // тестовый заголовок

	//xmlhttp.send("TextQ="+encodeURIComponent(TextQ)); // Отправляем POST-запрос
	
	if (NameF=='qu_txt.php')
	{
		xmlhttp.send("TextQ="+encodeURIComponent(TextQ)+
		"&comandQ="+encodeURIComponent(comand)+
		"&id_elem="+encodeURIComponent(id_elem)); // Отправляем POST-запрос	
	}
	else if (NameF=='qu_template_graph.php')
	{
		xmlhttp.send("TextQ="+encodeURIComponent(TextQ)); // Отправляем POST-запрос
	}
	else if (NameF=='qu_cost_table.php')
	{
		//document.getElementById("txt_php").innerHTML="11111"+TextQ;
		xmlhttp.send("TextQ="+encodeURIComponent(TextQ)); // Отправляем POST-запрос
		/*document.getElementById("txt_php").innerHTML="11111"+TextQ;*/
		/*xmlhttp.setRequestHeader('Content-Type', 'application/json; charset=utf-8');*/
		/*xmlhttp.send("TextQ="+TextQ);*/

		/*document.getElementById("txt_php").innerHTML="5111"+TextQ;*/
	}

	
	/*document.getElementById("txt_php").innerHTML+="11";*/
	xmlhttp.onreadystatechange = function() 
	{ // Ждём ответа от сервера
		/*document.getElementById("txt_php").innerHTML+="22"+xmlhttp.readyState;*/
		if (xmlhttp.readyState == 4) 
		{ // Ответ пришёл
			/*document.getElementById("txt_php").innerHTML+="33"+xmlhttp.status;*/
			if(xmlhttp.status == 200) 
			{ // Сервер вернул код 200 (что хорошо)
				/*document.getElementById("txt_php").innerHTML+="44"+NameF;*/
				
/*				if (NameF=='getFile.php') 
				{
					WriteResMus(xmlhttp.responseText);
				}
				else 
*/

				if ((NameF=='qu_template_graph.php'))
				{
					if (comand=='refresh')
					{
						res_json=xmlhttp.responseText;
						//document.getElementById("txt_php").innerHTML+="55"+res_json.indexOf("****resultQ");
						//document.getElementById("txt_php").innerHTML+="55"+res_json;
						var str1=res_json.indexOf("****resultQ")+11;
						res_json=res_json.substring(str1);
						//document.getElementById("txt_php").innerHTML+="|||||"+res_json;
						RefResh_tampl(res_json);
					}
					else
					{
						/*document.getElementById("txt_php").innerHTML+="55"+xmlhttp.responseText;*/
					}
					
					/*WriteResQueryBD1(xmlhttp.responseText);	*/
				}
				else if (NameF=='qu_cost_table.php')
				{
					if (comand=='refresh')
					{
						/*document.getElementById("txt_php").innerHTML="55"+xmlhttp.responseText;*/
						res_json=xmlhttp.responseText;
						var str1=res_json.indexOf("****resultQ")+11;
						res_json=res_json.substring(str1);
						RefResh_cost_table(res_json);
					}
					else
					{
						//document.getElementById("txt_php").innerHTML+="55"+xmlhttp.responseText;

					}

				}
				else if (NameF=='qu_txt.php')
				{
					if (comand=='read')
					{
						res_txt=xmlhttp.responseText;
						/*document.getElementById("txt_php").innerHTML="0000"+TextQ+"1119"+res_txt;*/
						//document.getElementById("txt_php").innerHTML="0000"+xmlhttp.getResponseHeader('Content_test');

						var str1=res_txt.indexOf("****resultQ")+11;
						res_txt=res_txt.substring(str1);
						if(res_txt=='')
						{
							if (TextQ.substring(0,3)=="gp_")
							{
								//$("#txt_php").text("пустой результат");
								return "...";
							}
							else if (TextQ.slice(-4)==".php")
							{
								document.title=res_txt;
								return res_txt;
							}
							else
							{
								document.getElementById(TextQ).innerHTML='----- пустой блок дива -----';
							}
						}
						else
						{
							//$("#txt_php").text(TextQ.slice(-4));
							if (TextQ.substring(0,3)=="gp_")
							{
								//$("#txt_php").text("////"+res_txt);
								return res_txt;
							}
							else if (TextQ.slice(-4)==".php")
							{
								document.title=res_txt;
								return res_txt;
							}
							else
							{
								document.getElementById(TextQ).innerHTML=res_txt;
							}
						}
						
						/*document.getElementById("txt_php").innerHTML+="1119"+res_txt;*/
					}
					else if (comand=='save')
					{
						/*document.getElementById("txt_php").innerHTML+="55"+xmlhttp.responseText;*/
						//$("#txt_php").text("000");
						res_txt=xmlhttp.responseText;
						/*document.getElementById("txt_php").innerHTML+="****"+res_txt;*/
					}
					else if (comand=='del')
					{
						res_txt=xmlhttp.responseText;
						//document.getElementById("txt_php").innerHTML+="****111"+res_txt;
					}

				}
			}
		}
	}
}

function Query_read_value_noas(id_search)
{
	var xmlhttp = getXmlHttp(); // Создаём объект XMLHTTP
	var res_json;
	var res_txt;
	var nomMus;

	/*document.getElementById("txt_php").innerHTML ="111"+TextQ;*/

/*	document.getElementById("txt_php").innerHTML+="==="+id_search;*/

	/*xmlhttp.open('POST','qu_txt.php', true);*/
	xmlhttp.open('POST','qu_txt.php', false);
	xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded'); // Отправляем кодировку
	xmlhttp.setRequestHeader('Content_test', '123'); // тестовый заголовок
	xmlhttp.send("TextQ="+encodeURIComponent(id_search)+
	"&comandQ="+encodeURIComponent('read')+
	"&id_elem="+encodeURIComponent(id_search)); // Отправляем POST-запрос	


	//document.getElementById("txt_php").innerHTML+=" ё ";


	//document.getElementById("txt_php").innerHTML+=".";
	if (xmlhttp.readyState == 4) 
	{ // Ответ пришёл
		if(xmlhttp.status == 200) 
		{ // Сервер вернул код 200 (что хорошо)
			res_txt=xmlhttp.responseText;
			/*document.getElementById("txt_php").innerHTML="0000"+TextQ+"1119"+res_txt;*/

			var str1=res_txt.indexOf("****resultQ")+11;
			res_txt=res_txt.substring(str1);

/*			document.getElementById("txt_php").innerHTML+=" !!!!!! "+res_txt;
			document.getElementById("txt_php").innerHTML+=xmlhttp.getAllResponseHeaders();
*/
			return res_txt;
		}
	}


	xmlhttp.onreadystatechange = function() 
	{ // Ждём ответа от сервера
		//document.getElementById("txt_php").innerHTML+=".";
		if (xmlhttp.readyState == 4) 
		{ // Ответ пришёл
			if(xmlhttp.status == 200) 
			{ // Сервер вернул код 200 (что хорошо)
				res_txt=xmlhttp.responseText;
				/*document.getElementById("txt_php").innerHTML="0000"+TextQ+"1119"+res_txt;*/

				var str1=res_txt.indexOf("****resultQ")+11;
				res_txt=res_txt.substring(str1);

				/*document.getElementById("txt_php").innerHTML=" !!!!!! "+res_txt;*/

				return res_txt;
			}
		}
	}

	return "#000000";
}

function QueryOb(id_search,NameFun)
{
	//var NameFun='TestF';
	var xmlhttp = getXmlHttp(); // Создаём объект XMLHTTP	

	this.SendQ=function()
	{
		xmlhttp.open('POST','qu_txt.php', true);
		xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded'); // Отправляем кодировку
		/*xmlhttp.setRequestHeader('Content_test', '123');*/ // тестовый заголовок
		xmlhttp.send("TextQ="+encodeURIComponent(id_search)+
		"&comandQ="+encodeURIComponent('read')+
		"&id_elem="+encodeURIComponent(id_search)); // Отправляем POST-запрос	
	}

	xmlhttp.onreadystatechange = function() 
	{ // Ждём ответа от сервера
		//document.getElementById("txt_php").innerHTML+=".";
		if (xmlhttp.readyState == 4) 
		{ // Ответ пришёл
			if(xmlhttp.status == 200) 
			{ // Сервер вернул код 200 (что хорошо)
				res_txt=xmlhttp.responseText;
				/*document.getElementById("txt_php").innerHTML="0000"+TextQ+"1119"+res_txt;*/

				var str1=res_txt.indexOf("****resultQ")+11;
				res_txt=res_txt.substring(str1);

				//document.getElementById("txt_php").innerHTML+=" №3333№№№ "+NameFun;

				//return res_txt;
				res_q={};
				res_q.result_query=res_txt;
				res_q.id=id_search;

				window[NameFun](res_q);
			}
		}
	}
}