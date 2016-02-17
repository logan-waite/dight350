<?php
/*
ALTER TABLE blog_category
ADD CONSTRAINT fk_blogCategory_blogID
FOREIGN KEY (blog_entry_id) REFERENCES blog_entries(id)
ON UPDATE CASCADE
ON DELETE CASCADE;

ALTER TABLE `blog_category`
ADD CONSTRAINT `fk_blogCategory_blogID`
FOREIGN KEY (` blog_entry_id`) REFERENCES `blog_entries`(` id`)
ON DELETE CASCADE
ON UPDATE CASCADE;

ALTER TABLE blog_category
ADD CONSTRAINT fk_blogCategory_categoryID
FOREIGN KEY (category_id) REFERENCES categories (id)
ON UPDATE CASCADE
ON DELETE CASCADE;*/
 ?>
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
                            id INT(5) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,<br>
                            first_name VARCHAR(20) NOT NULL,<br>
                            last_name VARCHAR(20) DEFAULT NULL<br>
                        ) ENGINE InnoDB;
                    </li>
                    <li>
                        CREATE TABLE blog_category ( <br>
                            id INT(5) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,<br>
                            blog_entry_id INT(5) UNSIGNED DEFAULT NULL,<br>
                            category_id INT(5) UNSIGNED DEFAULT NULL<br>
                        ) ENGINE InnoDB;
                    </li>
                    <li>
                        CREATE TABLE blog_entries (<br>
                            id INT(5) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,<br>
                            title VARCHAR(50) NOT NULL UNIQUE,<br>
                            content TEXT NOT NULL,<br>
                            date_submitted DATETIME DEFAULT NULL,<br>
                            authorID INT(3) NOT NULL<br>
                        ) ENGINE InnoDB;
                    </li>
                    <li>
                        CREATE TABLE categories (<br>
                            id INT(5) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,<br>
                            name VARCHAR(20) NOT NULL<br>
                        ) ENGINE InnoDB;
                    </li>
                </ul>
                <h1 class='blog-header'>The Alteration</h1>
                <ul>
                    <li>
                        ALTER TABLE blog_category<br>
                        ADD CONSTRAINT fk_blogCategory_blogID<br>
                        FOREIGN KEY (blog_entry_id) REFERENCES blog_entries(id)<br>
                        ON DELETE CASCADE<br>
                        ON UPDATE CASCADE;<br>
                    </li>
                    <li>
                        ALTER TABLE blog_category<br>
                        ADD CONSTRAINT fk_blogCategory_categoryID<br>
                        FOREIGN KEY (category_id) REFERENCES categories(id)<br>
                        ON DELETE CASCADE<br>
                        ON UPDATE CASCADE;<br>
                    </li>
                </ul>
                <h1 class='blog-header'>The Insertion</h1>
                <ul>
                    <li>
                        INSERT INTO authors<br>
                        (first_name, last_name)<br>
                        VALUES<br>
                        ('Logan', 'Waite');<br>
                    </li>
                    <li>
                        INSERT INTO blog_entries<br>
                        (title, content, date_submitted, authorID)<br>
                        VALUES<br>
                        ('Google',<br>
                        'In the past, when writing a research paper for the humanities, you would need to go to the library and spend hours upon hours looking in card catalogs and periodicals trying to find relevant information for what you were researching. This could be frustrating when you would run into dead ends, and was frigteningly ineffecient in finding information that was actually relevant. Now, however, web search engines have indexed a vast amount of the web, and work has been done to archive many of the materials that previously were only available in a physical form. From the comfort of your desk, you can search for information and can even view articles and artifacts that originated from the other side of the world. By applying a new technology to traditional processes, we are able to greatly facilitate the study of humanties.',<br>
                        '2016-02-17',<br>
                        1);<br>
                    </li>
                    <li>
                        INSERT INTO blog_entries<br>
                        (title, content, date_submitted, authorID)<br>
                        VALUES<br>
                        ('Social Media',<br>
                        'With the advent of social media, the way that people communicate with each other on a daily, and even a minute to minute basis has changed massively. Facebook is a way to stay connected without physically seeing the person every day, and Twitter has spawned a new method of communicating that has to be done in 140 characters or less. The ways that these and other forms of social media affect human kind is something that can be studied by using traditional methods of the humanites. By using methods that help us to discover the ramifications of these new, now integral parts of our lives, we can delve more deeply into people and what makes us tick.',<br>
                        '2016-02-17',<br>
                        1);<br>
                    </li>
                    <li>
                        INSERT INTO blog_entries<br>
                        (title, content, date_submitted, authorID)<br>
                        VALUES<br>
                        ('Digitization of Historical Artifacts',<br>
                        'In previous years, historical artifacts could only be viewed at the physical location that stored/presented it, and those who wished to study them were forced to travel to view them in the detail they needed. Now, with the advent of the internet and higher fidelity scanning, including 3D methods, scholars are able to view high quality models that are virtually identical to the original. This greatly mitigates the expense of study, as well as increasing the resources available to scholars world-wide. Scholars are able to collaborate and share ideas faster and in a more centralized way than ever before. These various benefits allows the accelerated growth of knowledge among different countries and peoples, and allows for other cultures to begin participating in new and exciting ways.',<br>
                        '2016-02-17',<br>
                        1);<br>
                    </li>
                    <li>
                        INSERT INTO categories<br>
                        (name)<br>
                        VALUES<br>
                        ('digital'),<br>
                        ('humanities'),<br>
                        ('internet'),<br>
                        ('media'),<br>
                        ('traditional methods');<br>
                    </li>
                    <li>
                        INSERT INTO blog_category<br>
                        (blog_entry_id, category_id)<br>
                        VALUES<br>
                        (1, 1),<br>
                        (1, 2),<br>
                        (1, 3),<br>
                        (2, 1),<br>
                        (2, 2),<br>
                        (2, 4),<br>
                        (2, 5),<br>
                        (3, 1);<br>
                    </li>
                </ul>
                <h1 class='blog-header'>The Customization</h1>
                <ul><strong>Update Post</strong>
                    <li>
                        UPDATE blog_entries
                        SET title='Search Engines'
                        WHERE id = 1;
                    </li>
                </ul>
                <ul><strong>Delete Post</strong>
                    <li>
                        DELETE FROM blog_entries
                        WHERE id = 3;
                    </li>
                </ul>
                <ul><strong>Look at Everything!</strong>
                    <li>
                        SELECT  authors.first_name,<br>
                                authors.last_name,<br>
                                blog_entries.title,<br>
                                blog_entries.content,<br>
                                blog_entries.date_submitted,<br>
                                GROUP_CONCAT(categories.name) AS categories<br>
                        FROM blog_entries<br>
                        JOIN authors<br>
                            ON blog_entries.authorID = authors.id<br>
                        JOIN blog_category<br>
                            ON blog_category.blog_entry_id = blog_entries.id<br>
                        JOIN categories<br>
                            ON categories.id = blog_category.category_id<br>
                        GROUP BY blog_entries.id
                    </li>
                </ul>
            </div>
        </section>
    </body>
</html>
