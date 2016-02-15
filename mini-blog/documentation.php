<html>
    <head>
        <link rel="stylesheet" type="text/css" href="resources/stylesheet.css">
    </head>
    <body>
        <header>
            <a href='index.php'><h1 class='title'>Logan's Blog</h1></a>
            <nav>
                <ul>
                    <a href='posts.php'><li>All of My Posts</li></a>
                </ul>
            </nav>
        </header>
        <h1 class='page-title'>Queries for Database Backend</h1>
        <section>
            <div class='text-background'>
                <h1 class='blog-header'>The Creation</h1>
                <ul>
                    <li class='query'>
                        CREATE TABLE authors (<br>
                            &emsp;id INT(5) UNSIGNED NOT NULL AUTO_INCREMENT,<br>
                            &emsp;first_name VARCHAR(20) NOT NULL,<br>
                            &emsp;last_name VARCHAR(20) DEFAULT NULL,<br>
                            &emsp;PRIMARY KEY (id)<br>
                        ) ENGINE InnoDB;
                    </li>
                    <li>
                        CREATE TABLE blog_category ( <br>
                            &emsp;id INT(5) UNSIGNED NOT NULL AUTO_INCREMENT,<br>
                            &emsp;blog_entry_id INT(5) UNSIGNED DEFAULT NULL,<br>
                            &emsp;category_id INT(5) UNSIGNED DEFAULT NULL,<br>
                            &emsp;PRIMARY KEY (id)<br>
                        ) ENGINE InnoDB;
                    </li>
                    <li>
                        CREATE TABLE blog_entries (<br>
                            &emsp;id INT(5) UNSIGNED NOT NULL AUTO_INCREMENT,<br>
                            &emsp;title VARCHAR(50) NOT NULL UNIQUE,<br>
                            &emsp;content TEXT NOT NULL,<br>
                            &emsp;date_submitted DATETIME DEFAULT NULL,<br>
                            &emsp;authorID INT(3) NOT NULL,<br>
                            &emsp;PRIMARY KEY (id)<br>
                        ) ENGINE InnoDB;
                    </li>
                    <li>
                        CREATE TABLE categories (<br>
                            &emsp;id INT(5) UNSIGNED NOT NULL AUTO_INCREMENT,<br>
                            &emsp;name VARCHAR(20) NOT NULL,<br>
                            &emsp;PRIMARY KEY (id)<br>
                        ) ENGINE InnoDB;
                    </li>
                </ul>
                <h1 class='blog-header'>The Alteration</h1>
                <ul>
                    <li>
                        ALTER TABLE blog_category<br>
                        &emsp;ADD CONSTRAINT 'fk_blogCategory_blogID'<br>
                        &emsp;&emsp;FOREIGN KEY ('blog_entry_id') REFERENCES 'blog_entries' ('id')<br>
                        &emsp;&emsp;ON DELETE CASCADE<br>
                        &emsp;&emsp;ON UPDATE CASCADE,<br>
                        &emsp;ADD CONSTRAINT 'fk_blogCategory_categoryID'<br>
                        &emsp;&emsp;FOREIGN KEY ('category_id') REFERENCES 'categories' ('id')<br>
                        &emsp;&emsp;ON DELETE CASCADE<br>
                        &emsp;&emsp;ON UPDATE CASCADE;<br>
                    </li>
                </ul>
                <h1 class='blog-header'>The Insertion</h1>
                <ul>
                    <li>
                        INSERT INTO authors<br>
                        &emsp;(first_name, last_name)<br>
                        &emsp;VALUES<br>
                        &emsp;('Logan', 'Waite');<br>
                    </li>
                    <li>
                        INSERT INTO blog_entries<br>
                        &emsp;(title, content, date_submitted, authorID)<br>
                        &emsp;VALUES<br>
                        &emsp;('Google',<br>
                        &emsp;'In the past, when writing a research paper for the humanities, you would need to go to the library and spend hours upon hours looking in card catalogs and periodicals trying to find relevant information for what you were researching. This could be frustrating when you would run into dead ends, and was frigteningly ineffecient in finding information that was actually relevant. Now, however, web search engines have indexed a vast amount of the web, and work has been done to archive many of the materials that previously were only available in a physical form. From the comfort of your desk, you can search for information and can even view articles and artifacts that originated from the other side of the world. By applying a new technology to traditional processes, we are able to greatly facilitate the study of humanties.',<br>
                        &emsp;'2016-02-17',<br>
                        &emsp;1);<br>
                    </li>
                    <li>
                        INSERT INTO blog_entries<br>
                        &emsp;(title, content, date_submitted, authorID)<br>
                        &emsp;VALUES<br>
                        &emsp;('Social Media',<br>
                        &emsp;'With the advent of social media, the way that people communicate with each other on a daily, and even a minute to minute basis has changed massively. Facebook is a way to stay connected without physically seeing the person every day, and Twitter has spawned a new method of communicating that has to be done in 140 characters or less. The ways that these and other forms of social media affect human kind is something that can be studied by using traditional methods of the humanites. By using methods that help us to discover the ramifications of these new, now integral parts of our lives, we can delve more deeply into people and what makes us tick.',<br>
                        &emsp;'2016-02-17',<br>
                        &emsp;1);<br>
                    </li>
                    <li>
                        INSERT INTO blog_entries<br>
                        &emsp;(title, content, date_submitted, authorID)<br>
                        &emsp;VALUES<br>
                        &emsp;('Digitization of Historical Artifacts',<br>
                        &emsp;'In previous years, historical artifacts could only be viewed at the physical location that stored/presented it, and those who wished to study them were forced to travel to view them in the detail they needed. Now, with the advent of the internet and higher fidelity scanning, including 3D methods, scholars are able to view high quality models that are virtually identical to the original. This greatly mitigates the expense of study, as well as increasing the resources available to scholars world-wide. Scholars are able to collaborate and share ideas faster and in a more centralized way than ever before. These various benefits allows the accelerated growth of knowledge among different countries and peoples, and allows for other cultures to begin participating in new and exciting ways.',<br>
                        &emsp;'2016-02-17',<br>
                        &emsp;1);<br>
                    </li>
                    <li>
                        INSERT INTO categories<br>
                        &emsp;(name)<br>
                        &emsp;VALUES<br>
                        &emsp;('digital'),<br>
                        &emsp;('humanities'),<br>
                        &emsp;('internet'),<br>
                        &emsp;('media'),<br>
                        &emsp;('traditional methods');<br>
                    </li>
                    <li>
                        INSERT INTO blog_category<br>
                        &emsp;(blog_entry_id, category_id)<br>
                        &emsp;VALUES<br>
                        &emsp;(1, 1),<br>
                        &emsp;(1, 2),<br>
                        &emsp;(1, 3),<br>
                        &emsp;(2, 1),<br>
                        &emsp;(2, 2),<br>
                        &emsp;(2, 4),<br>
                        &emsp;(2, 5),<br>
                        &emsp;(3, 1);<br>
                    </li>

                </ul>
            </div>
        </section>
    </body>
</html>
