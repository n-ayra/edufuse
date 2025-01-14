<?php include '../include/headergen.html'?>
    <link rel="stylesheet" href="../css/teacher.css">
</head>

<body>
<?php include '../include/navbarTeacher.html' ?>

    <main class="courses-container">
        <section class="courses-header">
            <h1>My Courses</h1>
            <p>Course Overview</p>
        </section>
        
        <section class="controls">
            <select name="filter" id="filter">
                <option value="all">All</option>
            </select>
            <input type="text" placeholder="Search">
            <select name="sort" id="sort">
                <option value="name">Sort by course name</option>
            </select>
            <select name="view" id="view">
                <option value="card">Card</option>
            </select>
            <button class="create-course">Create course</button>
        </section>

        <section class="courses-list">
            <div class="course-card">
                <div class="thumbnail">X</div>
                <div class="course-info">
                    <p>Subject | Section</p>
                    <p>Semester</p>
                </div>
                <div class="more-options">...</div>
            </div>

            <div class="course-card">
                <div class="thumbnail">X</div>
                <div class="course-info">
                    <p>Subject | Section</p>
                    <p>Semester 5</p>
                </div>
                <div class="more-options">...</div>
            </div>
        </section>
    </main>
</body>
</html>
