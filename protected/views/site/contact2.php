<?php if (!Yii::app()->user->isGuest) { ?>
<form action="" method=post> 
<p>
Если у вас есть деловое предложение или другие вопросы, пожалуйста, 
заполните следующую форму, чтобы связаться с нами. 
</p> 
              <div> <br />
              Teма<br /> 
              <input type="text" name="title" size="40"><br /> 
              <br />
              Сообщение<br /> 
              <textarea name="mess" rows="10" cols="40"></textarea> 
              <br /> <br /><br />
              <p align="center"><input type="submit" value="Отправить" name="submit"></div></p> 
</form> 


<?php 
// если была нажата кнопка "Отправить" 
if(isset($_POST['submit'])) { 
        // $_POST['title'] содержит данные из поля "Тема", trim() - убираем все лишние пробелы и переносы строк,
        // htmlspecialchars() - преобразует специальные символы в HTML сущности, будем считать для того, 
        //чтобы простейшие попытки взломать наш сайт обломались, ну и  substr($_POST['title'], 0, 1000) -
        // урезаем текст до 1000 символов. Для переменной $_POST['mess'] все аналогично 
        $title = substr(htmlspecialchars(trim($_POST['title'])), 0, 200); 
        $mess =  substr(htmlspecialchars(trim($_POST['mess'])), 0, 10000); 
        // $to - кому отправляем 
        $to = Yii::app()->params['adminEmail']; 
        // $from - от кого 
        $from = Yii::app()->user->email; 
        // функция, которая отправляет наше письмо. 
        mail($to, $title, $mess, 'From:'.$from); 
        header("Location: http://localhost/shop/glav/index.php?r=site/final&message=2");
       
} 
} else {include('contact.php');}?> 