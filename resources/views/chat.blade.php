<!DOCTYPE html>
<html>
<head>
	<title>Chatroom</title>
</head>
	<link rel="stylesheet" type="text/css" href="css/app.css">
<body>

	<div id="app">
		<h1>Chatroom</h1>

		<chat-log :messages="messages"></chat-log>

		<chat-composer v-on:messagesent="addMessage"></chat-composer>
		{{-- <chat-log></chat-log> --}}

	</div>
	<script type="text/javascript" src="js/app.js" charset="utf-8"></script>
</body>
</html>