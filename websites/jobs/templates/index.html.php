<main class="home">
	<!---form for seraching the available jobs--->
	<form class="searchform" action="index.html.php" method="post">

		<input type="text" name="jobandlocationsearch" placeholder="Search for jobs that are available">
		<br>
		<br>
		<br>
		<button name="search">Search</button>
	</form>
	<br>
	<br>
	<h3>Search Output:</h3>
	<!--Table starts here--->
	<table>
		<thead>
			<tr>
				<th>Job Title</th>
				<th>Salary</th>
				<th>Due Date</th>
				<th>Location</th>

			</tr>

			<tr>
				<?php
				require "../database.php";

				if (isset($_POST['search'])) {
					//call the obj here
					// This is for searching the job title or the location. It gives result.
					//https://www.w3schools.com/php/php_oop_classes_objects.asp
					$theoutputofthesearchbar = $search3colObj->job3columnssearch();

					//https://www.w3schools.com/php/php_arrays_associative.asp

					foreach ($theoutputofthesearchbar as $searchingfor) {
						echo '<tr>';
						echo '<td>' . $searchingfor['title'] . '</td>';
						echo '<td>' . $searchingfor['salary'] . '</td>';
						echo '<td>' . $searchingfor['closingDate'] . '</td>';
						echo '<td>' . $searchingfor['location'] . '</td>';
					}
				} else {
					echo '<h4> No results were found</h4>';
				}

				?>
			</tr>
		</thead>
	</table>
	<br>
	<br>
	<!--Short description of the company   -->

	<p>Welcome to Jo's Jobs, we're a recruitment agency based in Northampton. We offer a range of different office jobs. Get in touch if you'd like to list a job with us.</a></p>

	<h2>Select the type of job you are looking for:</h2>
	<ul>
		<!--This is nav bar for each time a catgory is added, it shows in thee nav bar   -->

		<?php foreach ($categories as $category) : ?>
			<?php
			//https://www.w3schools.com/php/php_arrays_associative.asp

			$phpconverterfortheURL = $category['name'] . '.php';
			?>
			<li><a href="<?= $phpconverterfortheURL ?>"><?= $category['name'] ?></a></li>
		<?php endforeach; ?>

		<table>
			<thead>
				<tr>
					<th>Title</th>
					<th>Salary</th>
					<th>Category Name</th>
					<th>Due Date</th>
					<th style="width: 5%">&nbsp;</th>
					<th style="width: 5%">&nbsp;</th>
					<h3 style="margin-left:250px; text-decoration: underline;">Job Dates That Is About To End</h3>
				</tr>

				<tr>
					<?php
					require '../database.php';


					//This is the lists of jobs available with the data decreasing eg latest closing date to earliest closing date
					//calling $jobObjinuserindedx object
					//this is the table of job dates that are about to end from the top to the bottom.
					//https://www.w3schools.com/php/php_oop_classes_objects.asp
					$statementofqueryofthejobwitearliestclosestdate = $jobObjinuserindex->userindex();
					//https://www.w3schools.com/php/php_arrays_associative.asp

					foreach ($statementofqueryofthejobwitearliestclosestdate as $jobtable) {
						//This fetches the category name to match with the Job title


						$table_name = "category";
						$col_name = "id";
						//initaite select class
						//it give the category name using the category id
						//https://www.w3schools.com/php/php_oop_classes_objects.asp
						$selectCategory = new functions\select($pdo, $table_name, $col_name);
						$categorytable = $selectCategory->selectCat($jobtable['categoryId']);

						echo '<tr>';
						echo '<td>' . $jobtable['title'] . '</td>';
						echo '<td>' . $jobtable['salary'] . '</td>';
						echo '<td>' . $categorytable['name'] . '</td>';
						echo '<td>' . $jobtable['closingDate'] . '</td>';
					}
					?>
				</tr>
			</thead>
		</table>

	</ul>


</main>