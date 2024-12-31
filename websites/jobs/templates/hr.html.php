<main class="sidebar">
	<!--This is the HR PAGE afor the  customers  -->

	<section class="left">
		<ul>
			<!--This is nav bar for each time a catgory is added, it shows in thee nav bar   -->
			<?php foreach ($categories as $category) : ?>
				<?php
				//https://www.w3schools.com/php/php_arrays_associative.asp
				$fortheURL = $category['name'] . '.php';
				?>
				<li><a href="<?= $fortheURL ?>"><?= $category['name'] ?></a></li>
			<?php endforeach; ?>
		</ul>
	</section>

	<section class="right">

		<h1>Human Resources Jobs</h1>

		<ul class="listing">
			<?php
			//https://www.w3schools.com/php/php_oop_classes_objects.asp
			$stmt = $job3colObj->job3columns();

			?>
			<!--This is the job details that the customers are going to look at   -->
			<!--https://www.w3schools.com/php/php_arrays_associative.asp-->
			<?php foreach ($stmt as $job) {
				if ($job['status'] == 1) { ?> <!--1 is equals to  unarchive  -->

					<li>

						<div class="details">
							<h2> <?= $job['title'] ?> </h2>
							<h3> <?= $job['salary'] ?></h3>
							<p> <?= nl2br($job['description']) ?> </p>

							<a class="more" href="/apply.php?id=<?= $job['id'] ?>">Apply for this job</a>

						</div>
					</li>

			<?php }
			} ?>
		</ul>

	</section>
</main>