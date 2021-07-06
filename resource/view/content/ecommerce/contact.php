<main class="main">
	<nav aria-label="breadcrumb" class="breadcrumb-nav">
		<div class="container">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i></a></li>
				<li class="breadcrumb-item active" aria-current="page">Contact Us</li>
			</ol>
		</div>
	</nav>

	<div class="container mb-8">
		<div id="map"></div>

		<div class="row">
			<div class="col-md-8">
				<h2 class="light-title">Write <strong>Us</strong></h2>

				<form action="#">
					<div class="form-group required-field">
						<label for="contact-name">Name</label>
						<input type="text" class="form-control" id="contact-name" name="contact-name" required>
					</div>

					<div class="form-group required-field">
						<label for="contact-email">Email</label>
						<input type="email" class="form-control" id="contact-email" name="contact-email" required>
					</div>

					<div class="form-group">
						<label for="contact-phone">Phone Number</label>
						<input type="tel" class="form-control" id="contact-phone" name="contact-phone">
					</div>

					<div class="form-group required-field">
						<label for="contact-message">What’s on your mind?</label>
						<textarea cols="30" rows="1" id="contact-message" class="form-control" name="contact-message" required></textarea>
					</div>

					<div class="form-footer">
						<button type="submit" class="btn btn-primary">Submit</button>
					</div>
				</form>
			</div>

			<div class="col-md-4">
				<h2 class="light-title">Contact <strong>Details</strong></h2>

				<div class="contact-info">
					<div>
						<i class="fas fa-phone"></i>
						<p><a href="tel:">0201 203 2032</a></p>
						<p><a href="tel:">0201 203 2032</a></p>
					</div>
					<div>
						<i class="fas fa-mobile"></i>
						<p><a href="tel:">201-123-3922</a></p>
						<p><a href="tel:">302-123-3928</a></p>
					</div>
					<div>
						<i class="fas fa-mail-alt"></i>
						<p><a href="mailto:#">porto@gmail.com</a></p>
						<p><a href="mailto:#">porto@portotemplate.com</a></p>
					</div>
					<div>
						<i class="fas fa-skype"></i>
						<p>porto_skype</p>
						<p>porto_template</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>