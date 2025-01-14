
<?php include '../include/headergen.html'?>
    <link rel="stylesheet" href="../css/student.css">

</head>

<?php include '../include/navbarStudent.html' ?>


<body>
<div class="container">
		<h1>My Decks</h1>
		<div class="controls">
			<select class="filter">
				<option value="all">All</option>
				<option value="subject">Subject</option>
			</select>
			<input type="text" class="search" placeholder="Search">
			<select class="sort">
				<option value="date">Sort by Date</option>
				<option value="name">Sort by Name</option>
			</select>
			<select class="view">
				<option value="card">Card</option>
				<option value="list">List</option>
			</select>
			<button class="create-deck" onclick="window.location.href='../pages/createDeck.php'">Create a Deck</button>
		</div>
		<div class="deck-grid">
			<div class="deck">
				<div class="deck-thumbnail">X</div>
				<div class="deck-info">
					<p class="deck-name">Deck of Flashcard Name</p>
					<p class="deck-subject">Subject</p>
					<p class="deck-date">Date Created</p>
				</div>
				<div class="deck-options">&#x22EE;</div>
			</div>
            <div class="deck">
				<div class="deck-thumbnail">X</div>
				<div class="deck-info">
					<p class="deck-name">Deck of Flashcard Name</p>
					<p class="deck-subject">Subject</p>
					<p class="deck-date">Date Created</p>
				</div>
				<div class="deck-options">&#x22EE;</div>
			</div>
			<!-- Repeat the .deck div as needed -->
		</div>
	</div>
</body>
</html>