// this section help the content in the sidebar displays on the right side instead of opening a new page

// function loadContent(page) {
//   fetch(`${page}.php`).then(Response => Response.text()).then(data => {
//     document.getElementById('content-area').innerHTML= data;
//   }).catch(error => {
//     console.log("error loading page:", error);
//     document.getElementById('content-area').innerHTML = "<p>error.</p>"
//   });
// }


    function loadAddUserForm() {
        fetch('users-create.php')
            .then(response => response.text())
            .then(html => {
                document.getElementById('admin-users').innerHTML = html;
            })
            .catch(err => {
                console.error('Failed to load form:', err);
            });
    }

    function backToUserList() {
        // Reload or restore the original user list
        document.getElementById('admin-users').innerHTML = `
            <h4>User Lists
            <a href="#" onclick="loadAddUserForm()">Add Users</a>
            </h4>
                  `;
    }

