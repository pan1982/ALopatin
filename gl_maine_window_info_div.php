<!-- ОСНОВНОЕ ОКНО ДЛЯ ВЫВОДА ИНФОРМАЦИИ-->
<div id="maine_window_info_div"> 
	<!-- <img id="img_maine_id" src=".\data\GrandFatherLopatinAN\5_1.jpeg" alt="Девочка с муфтой"> -->

<!-- 	<span id="m_txt_sp"> -->
<!-- 		<img src=".\data\GrandFatherLopatinAN\5_1.jpeg" alt="Девочка с муфтой" width="100" class="img_center_cl_300">
		километрах в двух от аэродрома. Поначалу нас в эскадрилье было пять человек, и мы жили в одном доме. Какие условия? Перин не было, но спали нормально. Столовая была одна для всего летного состава, но стрелки сидели за отдельным столом. 
		На следующий день после прибытия мы стали свидетелями того, что такое война - из кабины возвратившегося с боевого задания штурмовика вытаскивали раненного стрелка. Для нас, необстрелянных, это было тяжелое зрелище. Ну, а дальше пошли вылеты. Меня включили в экипаж старшего лейтенанта Прусакова Виктора Сергеевича. Это был отличный мужик, аккордеонист, бывший командир роты пехотинцев. Он до войны окончил аэроклуб, потом попал в пехоту, а через некоторое время был отозван с фронта в летное училище. Но первый вылет я совершал не с ним, а с командиром эскадрильи. Таких необученных как я (я даже парашют не умел одевать!), сажали на головные самолеты - мы же ничего не видим, а стрелок замыкающего самолета - самый важный. Меня посадили в кабину, я пристегнулся, чего потом никогда не делал, и мне говорят: «Вот тебе пулемет. Он в чехле. Его не трогай! Сиди и смотри по сторонам». Вот так первый раз в воздух я поднялся прямо на боевой вылет. Сижу, смотрю - кругом все крутится, сверкает, красивые облачка разрывов вокруг - как в кино. До того интересно, что я аж рот открыл и разглядываю - ничего не понимаю! Страшно не было - я просто не знал, что надо бояться. Обратно прилетели. С непривычки немного подташнивает. 	 -->
<!-- 	</span> -->

	<?php
		$obj_=get_op_obj();
		$dir_=get_dir();
/*		echo $obj_; 
		echo '<br />';
		echo $dir_;
		echo '<br />';
		echo get_type_ob($obj_);
*/
		
		if(get_type_ob($obj_)=='dir')
		{

		}
		else if(get_type_ob($obj_)=='pic')
		{
			show_pict($obj_); /*вывод картинки в основном окне*/
		}
		else if(get_type_ob($obj_)=='txt')
		{

		}

		function show_pict($obj_) /*вывод картинки в основном окне*/
		{
			$descr='';
			$real_name_f=get_real_name_f($obj_);
			echo '<img id="img_maine_id" src=".\data\\';
			echo $real_name_f.'"'.'alt="'.$descr.'">';

			//GrandFatherLopatinAN\5_1.jpeg" alt="Девочка с муфтой">
		}

	?>
</div>