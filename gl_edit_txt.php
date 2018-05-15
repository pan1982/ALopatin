<!-- модальный блок на странице для редактирования текста -->

<div id="BlockTxt_in" class="BlockTxt_class" dblclick_div_txt_txt(event)>
  <a href="#close" title="Закрыть" class="close_BlockTxt_class">X</a>
  <h2 id="zaglEdtxt_id" >Свойства объекта</h2>
  ID редактируемого элемента: <span id="id_txt_block" class="div_txt_info_txt"></span> </p>

	<ul id="menu_div_txt" dblclick_div_txt_txt(event)><!-- id="menu_tampl_ul" -->
  		<li id="menu_txt_li_save" onclick="Save_div_txt_BD()" class="menu_txt_li"> <!-- сохранить в БД -->
  			<span>Сохранить</span>
  		</li>

  		<li id="menu_txt_li_close" onclick="close_txt_in()" class="menu_txt_li">  <!-- class="menu_tampl_li" -->
  			<span>&nbsp;&nbsp;Закрыть&nbsp;&nbsp;</span>
  		</li>

  		<li id="menu_txt_li_info" class="menu_txt_li_info">
  			<span id="menu_txt_li_span_info"></span>
  		</li>
  	</ul>

    Наименование объекта: <span id="txt_block_file_dir_name_id" class="div_txt_info_txt"></span> </p> <!-- наименование файла/папки -->
    Тип объекта: <span id="txt_block_type_obj_id" class="div_txt_info_txt"></span> </p> <!-- тип объекта (директоря, картинка, тест) -->
    Наименование файла иконки: <input disabled id="txt_block_file_ico_id" class="div_txt_noedit_txt"></input> </p> <!-- Наименование файла иконки -->
    Наименование файла синонима: <input disabled id="txt_block_file_syn_id" class="div_txt_noedit_txt"></input > </p> <!-- Наименование файла синонима -->

    Синоним:
    <textarea id="txt_block_synonym" type="text"  class="div_txt_in" onclick="change_div_txt_txt()" dblclick="dblclick_div_txt_txt()"></textarea>

    Описание:
    <textarea id="txt_block_description" type="text"  class="div_txt_in" onclick="change_div_txt_txt()" dblclick="dblclick_div_txt_txt()"></textarea>

  <p id="txt_block_delimiter">
    ************
  </p>       

  <p>
    Доступы:
  </p> 
  <input type="checkbox" name="общий доступ" id="txt_block_full_acc_id"> общий доступ
  <table id="txt_block_table_access_id">
<!--       <caption>
      </caption>
 -->
    <tr>
      <th>v</th>
      <th>ID</th>
      <th>Наименование</th>
      <th>Просмотр</th>
      <th>Редактирование</th>
    </tr>
  </table>
</div>
