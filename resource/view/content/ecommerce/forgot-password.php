<main class="main">
	<nav aria-label="breadcrumb" class="breadcrumb-nav">
		<div class="container">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i></a></li>
				<li class="breadcrumb-item active" aria-current="page">Forgot Password</li>
			</ol>
		</div>
	</nav>

	<div class="container pb-5">
		<div class="heading mb-4">
			<h2 class="title">Reset Password</h2>
			<p>Please enter your email address below to receive a password reset link.</p>
		</div>

		<form action="#">
			<div class="form-group required-field">
				<label for="reset-email">Email</label>
				<input type="email" class="form-control" id="reset-email" name="reset-email" required>
			</div>

			<div class="form-footer">
				<button type="submit" class="btn btn-primary">Reset My Password</button>
			</div>
		</form>
	</div>
</main>