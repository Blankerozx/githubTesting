<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="user-dashboard.css">
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <h2>⚽ VC Cup Dashboard</h2>
        <ul>
            <li><a href="#" onclick="showSection('match-results')">🏆 Match Results</a></li>
            <li><a href="#"  onclick="showSection('upcoming-matches')">📅 Upcoming Matches</a></li>    
            <li><a href="#"  onclick="showSection('profile-settings')">👤 Profile Settings</a></li>
            <li><a href="#" onclick="showSection('settings')">⚙️ Settings</a></li>
            <li><a href="includes/logout.inc.php">🚪 Logout</a></li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">

<div class="header">
    <h2>Welcome, <span id="userName">John Doe</span></h2>
</div>

<!-- Match Results -->
<div id="match-results" class="dashboard-section">
    <h3>Recent Match Results</h3>
    <ul>
        <li>UNIDEL United 3 - 1 Golden Stars</li>
        <li>Delta Warriors 2 - 2 Sky Eagles</li>
    </ul>
</div>

<!-- Upcoming Matches -->
<div id="upcoming-matches" class="dashboard-section" style="display: none;">
    <h3>Upcoming Matches</h3>
    <ul>
        <li>UNIDEL United vs Delta Warriors - <span>April 5, 2025</span></li>
        <li>Sky Eagles vs River Kings - <span>April 10, 2025</span></li>
    </ul>
</div>

<!-- Profile Settings -->
<div id="profile-settings" class="dashboard-section" style="display: none;">
    <div class="profile-section">
        <img id="profilePic" src="images/default-profile.png" alt="Profile Picture">
        <input type="file" id="uploadProfile" accept="image/*">
        <button onclick="changeProfile()">Change Picture</button>
    </div>
    <div class="info-section">
        <h3>User Details</h3>
        <p><strong>Name:</strong> <span id="name">John Doe</span></p>
        <p><strong>Email:</strong> johndoe@email.com</p>
        <p><strong>Team:</strong> UNIDEL United</p>
    </div>
</div>

<!-- Settings -->
<div id="settings" class="dashboard-section" style="display: none;">
    <h3>Dashboard Settings</h3>
    <p>Feature coming soon... (You can add theme toggle, notifications, etc.)</p>
</div>
</div>


<script>
    function showSection(sectionId) {
        const sections = document.querySelectorAll('.dashboard-section');
        sections.forEach(section => section.style.display = 'none');

        document.getElementById(sectionId).style.display = 'block';
    }

    function changeProfile() {
        let fileInput = document.getElementById("uploadProfile");
        let profilePic = document.getElementById("profilePic");

        fileInput.addEventListener("change", function () {
            const file = fileInput.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (event) {
                    profilePic.src = event.target.result;
                };
                reader.readAsDataURL(file);
            }
        });
    }
</script>

</body>
</html>
