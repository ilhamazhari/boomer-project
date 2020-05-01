<template>
	<div class="base-layout">
		<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
			<a class="navbar-brand">Boomercam</a>
			<slot name="top-navbar" />
		</nav>
		<div class="container-fluid base-container">
			<div class="row">
				<main class="col-md-9 col-lg-10 ml-sm-auto px-4">
					<slot />
				</main>
				<nav class="col-md-2 d-none d-md-block bg-light sidebar">
					
					<slot name="sidebar" />
				</nav>
			</div>
		</div>
	</div>
</template>

<style>
.navbar-brand {
	padding: 10px 25px;
}
.base-container {
	padding-top: 48px;
}
</style>