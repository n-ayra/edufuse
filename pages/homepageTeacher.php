<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduFuse - My Courses</title>
    <link rel="stylesheet" href="../css/homepage.css">
</head>
<body>
    <header class="navbar">
        <div class="logo">EduFuse</div>
        <nav class="menu">
            <a href="#">Home</a>
            <a href="#">Dashboard</a>
            <a href="#" class="active">My courses</a>
        </nav>
        <div class="user-section">
            <span class="username">username</span>
            <span class="profile-icon">
                <img src="profile-icon.png" alt="Profile" />
            </span>
        </div>
    </header>

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
