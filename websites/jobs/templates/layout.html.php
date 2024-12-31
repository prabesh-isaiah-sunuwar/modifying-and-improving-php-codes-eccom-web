<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="/styles.css" />
    <title><?= $title ?></title>
</head>
<!--This is how the layout of how the users screen are going to look like    -->

<body>
    <header>
        <section>
            <aside><!--This is how the layout of how the users screen are going to look like    -->

                <h3>Office Hours:</h3>
                <p>Mon-Fri: 09:00-17:30</p>
                <p>Sat: 09:00-17:00</p>
                <p>Sun: Closed</p>
            </aside>
            <h1>Jo's Jobs</h1>
        </section><!--This is how the layout of how the users screen are going to look like    -->

    </header>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li>Jobs<!--This is how the layout of how the users screen are going to look like    -->

                <ul>
                    <!--As the category is added or updated , the nav bar is also updated or added    -->
                    <!--https://www.w3schools.com/php/php_arrays_associative.asp-->
                    <?php foreach ($categories as $category) : ?>
                        <?php if (isset($category['name'])) : ?>
                            <?php
                            $somethingdotphpconverter = $category['name'] . '.php';
                            ?>
                            <li><a href="<?= $somethingdotphpconverter ?>"><?= $category['name'] ?></a></li>
                        <?php endif; ?>
                    <?php endforeach; ?>

                </ul>
            </li>
            <li><a href="about.html">About Us</a></li>

            <li>More
                <ul><!--This is how the layout of how the users screen are going to look like    -->
                    <!--In the more section    -->

                    <li> <a class="new" href="addvisitor.php">New user??</a></li>
                    <li> <a class="new" href="enquiry.php">Enquire</a></li>

                    <li><a href="../../careeradvice.php">Career Advice</a></li>
                    <?php
                    //logout if logged in
                    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                    ?>

                        <li><a href="../../../admin/public/logout.php">Logout</a></li>
                    <?php
                        //It will be in the login page
                    } else { ?>
                        <li><a href="../../../admin/public/index.php">Login</a></li>
                    <?php
                    } ?>

                    <!--This is how the layout of how the users screen are going to look like    -->

                </ul>
            </li>

        </ul>
    </nav>

    <img src="../../images/randombanner.php" />
    <main class="sidebar">
        <?= $output ?>

    </main>

    <footer>
        <?= $footersmessage ?>
    </footer>
</body>

</html>