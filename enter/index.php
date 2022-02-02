<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Авторизация");
?>

<? /* тестируем авторизацию по смс
	$APPLICATION->IncludeComponent(
		"bxmaker:authuserphone.login",
		"",
		Array()
	);
//Компонент авторизации/регистрации по номеру телефона с подтверждением по смс, звонку от бота, звонку боту
	$APPLICATION->IncludeComponent(
		"bxmaker:authuserphone.call",
		"",
		Array(),
		false
	);
//Комопнент изменения номера телефона сущесвтующего пользователя 
	$APPLICATION->IncludeComponent(
		"bxmaker:authuserphone.edit",
		"",
		Array(),
		false
	); */
?>

<style>
	.container {
		display: none;
	}
</style>

дкущь	

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>