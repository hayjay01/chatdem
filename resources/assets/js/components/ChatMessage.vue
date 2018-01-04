<template lang="html">
	<div class="chat-message">
		<p class="">{{ message.message }}</p>
		<small style="color:blue; text-decoration: underline;">{{ message.user.name }}</small>		
	</div>
</template>

<script>

	export default {

        props: ['message']

    }

</script>

<style lang="css">
	.chat-message{
		padding: 1rem;
	}

	.chat-message > p{
		margin-bottom: .5rem;
	}
</style>