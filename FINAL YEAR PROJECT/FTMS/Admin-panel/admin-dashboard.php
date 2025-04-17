<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../index.css">
    <link rel="stylesheet" href="matchFixture.css">
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <h2>⚽ Admin Dashboard</h2>
        <ul>
            <li><a href="#" onclick="showSection('admin-users')">🏆 Admin/Users</a></li>
            <li><a href="#" onclick="showSection('match-results')">🏆 Match Results</a></li>
            <li><a href="#"  onclick="showSection('upcoming-matches')">📅 Match Schedule</a></li>    
            <li><a href="#"  onclick="showSection('profile-settings')">👤 Profile Settings</a></li>
            <li><a href="#"  onclick="showSection('leaderboard')">👤 LeaderBoard</a></li>
            <li><a href="#" onclick="showSection('settings'), loadSettings()">⚙️ Settings</a></li>
            <li><a href="includes/logout.inc.php">🚪 Logout</a></li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">

<div class="header">
    <h2>Welcome, <span id="userName">John Doe</span></h2>
</div>

<!-- Match Results -->
<div id="admin-users" class="dashboard-section">
   <h4>User Lists
   <a href="#" onclick="loadAddUserForm()">Add Users</a>
  </h4>
</div>

<!-- this code add users as it is associated with admin/user list in sidebar -->

<!-- <div class="dashboard-section2">
   <h4>Add User
   <a href="admin-dashboard.php">Back</a>
   </h4>
</div>

<div class="form-section">

   <form action="">
      <div class="form-container">
        <label for="">name</label>
        <input type="text" name="name" class="form-control">
    </div>
      <div class="form-container">
        <label for="">Phone No.</label>
        <input type="text" name="phone" class="form-control">
    </div>
     <div class="form-container">
        <label for="">Email</label>
        <input type="email" name="email" class="form-control">
    </div>
    <div class="form-container">
        <label for="">Password</label>
        <input type="password" name="password" class="form-control">
    </div>
    <div class="form-container">
        <label for="">Select Role</label>
        <select name="role" class="">
          <option value="">Select Role</option>
          <option value="admin">Admin</option>
          <option value="user">User</option>
        </select>
    </div>
    <div class="">
    <label for="">Select Role</label>
    <br>
    <input type="checkbox" name="is_ban">
    </div>
    <div>
      <button type="submit" name="saveUser">Save</button>
    </div>
   </form>
</div> -->

<!-- here ends the addding process .... the code above -->

<div id="match-results" class="dashboard-section" style="display: none;">
<h3>Recent Match Results</h3>
   <div id="matchResults"></div>
</div>

<!-- Upcoming Matches -->
<div id="upcoming-matches" class="dashboard-section" style="display: none;">
    <!-- <h3>Match Schedule</h3>
    <form action="" id="fixtureForm"> -->
        <!-- <input type="number" id="teamCount" placeholder="number of teams" required> -->
        <!-- <input name="" type="text" id="teamNames" placeholder="Enter team names seperated by comma" required>
        <button type="submit">Generate Fixtures</button>
    </form>
    <div id="fixtureList"></div> -->
    <h2>Football Match Scheduler</h2>
        
    <label>Enter Teams (comma-separated):</label><br>
<input type="text" id="teamInput" placeholder="Team A, Team B, Team C" size="50">
<button onclick="generateFixtures()">Generate Fixtures</button>

<div id="fixtureContainer"></div>

</div>

<!-- Profile Settings -->
<div id="profile-settings" class="dashboard-section" style="display: none;">
    <div class="profile-section">
        <img id="profilePic" src="./img/students.png" alt="Profile Picture">
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

<!-- leaderboard section -->
<div id="leaderboard" class="dashboard-section" style="display: none;">
  <h3>LeaderBoard</h3>
  <table id="leaderboard">
    <thead>
        <tr>
            <th>team</th>
            <th>points</th>
            <th>GD</th>
            <th>GF</th>
            <th>GA</th>
        </tr>
    </thead>
    <tbody></tbody>
  </table>
</div>


<!-- Settings -->
<div id="settings"  class="dashboard-section" style="display: none;">
   <!-- settings.php -->
<h2>Account Settings</h2>
<form action="update-settings.php" method="POST" enctype="multipart/form-data">
    <label>Full Name:</label>
    <input type="text" name="fullname" value="John Doe"><br>

    <label>Username:</label>
    <input type="text" name="username" value="johndoe"><br>

    <label>Email:</label>
    <input type="email" name="email" value="john@example.com"><br>

    <label>New Password:</label>
    <input type="password" name="password"><br>

    <label>Change Profile Picture:</label>
    <input type="file" name="profile_pic"><br>

    <button type="submit">Save Changes</button>
</form>

</div>
</div>


<!-- CONTENT FROM ADD USER -->

<!-- Admin/Users Section -->
<!-- <div id="admin-users" class="dashboard-section">
    <h2>User Lists <a href="#" onclick="showAddUser()">Add Users</a></h2>

     USER LIST SECTION 
    <div id="user-list">
        <!-- Example list 
        <ul>
            <li>John Doe - Admin</li>
            <li>Jane Smith - Referee</li>
        </ul>
    </div>

     ADD USER FORM SECTION 
    <div id="add-user-form" style="display: none;">
        <h3>Add User <a href="#" onclick="backToUserList()">Back</a></h3>
        <form>
            <input type="text" placeholder="Name" required><br>
            <input type="text" placeholder="Phone No."><br>
            <input type="email" placeholder="Email"><br>
            <input type="password" placeholder="Password"><br>
            <select>
                <option>Select Role</option>
                <option>Admin</option>
                <option>Coach</option>
                <option>Referee</option>
            </select><br>
            <button type="submit">Save</button>
        </form>
    </div>
</div> -->


<!-- here is the end -->

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

    function showAddUser() {
        document.getElementById('user-list').style.display = 'none';
        document.getElementById('add-user-form').style.display = 'block';
    }

    function backToUserList() {
        document.getElementById('add-user-form').style.display = 'none';
        document.getElementById('user-list').style.display = 'block';
    }

//     function loadSettings() {
//     fetch('settings.php')
//         .then(res => res.text())
//         .then(html => {
//             document.getElementById('content-area').innerHTML = html;
//         });
// }


</script>
<script src="admin.js"></script>
<script src="generateFixtures.js"></script>
<script src="match-results.js"></script>
<script src="leaderboard.js"></script>

</body>
</html>
