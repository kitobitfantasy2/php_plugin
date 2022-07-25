//   let	id_product = 321;
// let qty_product = 2;

// Создаем экземпляр класса XMLHttpRequest
// const request = new XMLHttpRequest();

// Указываем путь до файла на сервере, который будет обрабатывать наш запрос 
// const url = "ajax_quest.php";
// const url = "http://wpdev/wp-admin/admin-ajax.php?action=hello&name=";

 
// Так же как и в GET составляем строку с данными, но уже без пути к файлу 
// const params = "id_product=" + id_product+ "&qty_product=" + qty_product;
 
/* Указываем что соединение	у нас будет POST, говорим что путь к файлу в переменной url, и что запрос у нас
асинхронный, по умолчанию так и есть не стоит его указывать, еще есть 4-й параметр пароль авторизации, но этот
	параметр тоже необязателен.*/ 
// request.open("POST", url, true);
 
//В заголовке говорим что тип передаваемых данных закодирован. 
// request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 
// request.addEventListener("readystatechange", () => {

//    if(request.readyState === 4 && request.status === 200) {       
//		console.log(request.responseText);
//    }
// });
 
//	Вот здесь мы и передаем строку с данными, которую формировали выше. И собственно выполняем запрос. 
// request.send(params);

    

   // **********************

   //val3 = 10;

    // jQuery.post("http://wpdev/wp-admin/admin-ajax.php?action=hello&name=%D0%94%D0%BC%D0%B8%D1%82%D1%80%D0%B8%D0%B9");


    // val = '<?php ?>';
    
    //add_action('wp_ajax_hello2',say_hello);

    // function say_hello() {
    //    echo 'Привет пользователь';
    //}

     // echo "<script language='javascript'>\n";
     // echo " location.href=\"${_SERVER['SCRIPT_NAME']}?${_SERVER['QUERY_STRING']}"
     //         . "width=\" + screen.width + \"&height=\" + screen.height;\n";
     // echo "</script>\n";

    // $js = $my_var;
    // $js = 5;
    // echo esc_js( $js ); 
    
    // 


  // alert("The input value has changed. The new value is: " + val);