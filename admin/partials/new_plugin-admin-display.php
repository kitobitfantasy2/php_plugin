

<div class = "xml">
    <h1>Добавление нового поста</h1>
<form method="post" action="" novalidate="novalidate">

<div class="submit"> <input type="submit" name="submit" 
id="submit" class="button button-primary" 
value="Добавить">
<input type="hidden" name ="action" value="import">
<br>
<br>
<input type="text" name ="title" value="Заголовок статьи" onchange="myFunction(value)">
<br>
<br>
<input type="text" name ="tab" id ="tab" >
<br>
<br>
<textarea name="text" rows="10" cols="30">
Кошка играла в саду.
</textarea>
</div>
</form>
</div>

<script>


function myFunction(val) {
  
let url = "<?php echo admin_url();?>" + "admin-ajax.php?action=hello&name="+val;

document.getElementById('tab').value = "Отправили запрос, ждем ответ";

const request = new XMLHttpRequest();
 
request.open('GET', url);
 
request.setRequestHeader('Content-Type', 'application/x-www-form-url');
 
request.addEventListener("readystatechange", () => {
	
	if (request.readyState === 4 && request.status === 200) {
	
    document.getElementById('tab').value = request.responseText;
    }
});
 
request.send();

}
</script>

