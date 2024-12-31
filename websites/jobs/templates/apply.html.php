<main class="sidebar">

	<section class="left">

	</section><!--This is for applying a job as a  customer  -->

	<section class="right"><!--This is for applying a job as a  customer  -->
		<?php if (isset($job) && isset($job['title'])) { ?>
			<h2>Apply for <?= $job['title']; ?></h2>
			<!--This is for applying a job as a  customer  -->

			<form action="apply.php" method="POST" enctype="multipart/form-data">
				<label>Your name</label>
				<input type="text" name="name" /><!--This is for applying a job as a  customer  -->
				<!--This is for applying a job as a  customer  -->
				<label>E-mail address</label>
				<input type="text" name="email" />

				<label>Cover letter</label><!--This is for applying a job as a  customer  -->
				<textarea name="details"></textarea>

				<label>CV</label><!--This is for applying a job as a  customer  -->
				<input type="file" name="cv" />

				<input type="hidden" name="jobId" value="<?= $job['id']; ?>" />

				<input type="submit" name="submit" value="Apply" />
				<!--This is for applying a job as a  customer  -->
			</form>
		<?php } ?>

	</section>
</main>