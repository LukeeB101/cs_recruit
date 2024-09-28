<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
  
  require_once ($_SERVER['DOCUMENT_ROOT'].'/auth/functions/getAvatar.php');
  require_once ($_SERVER['DOCUMENT_ROOT']. '/functions/helpers.php');
  require_once ($_SERVER['DOCUMENT_ROOT']. '/functions/staffService.php');
  require_once ($_SERVER['DOCUMENT_ROOT']. '/functions/communityHelper.php');
  require_once ($_SERVER['DOCUMENT_ROOT']. '/functions/staffHelper.php');
  require_once ($_SERVER['DOCUMENT_ROOT']. '/recruitment/admin/helpers/communityRolesHelper.php');
  require_once ($_SERVER['DOCUMENT_ROOT']. '/vendor/ezyang/htmlpurifier/library/HTMLPurifier.auto.php');

  
  
  if (!isset($_SESSION['loggedin'])) {
    header('Location: /auth/sign-in');
  }
  
  $community_id = htmlspecialchars($_GET['id']);
  $community = getCommunityInfo($conn, $community_id);

  if (!userHasCommunityPermission($conn, $_SESSION['uuid'], $community_id, 'Manage Roles')) {
    addAlert($_SESSION['uuid'], 'You do not have permission to view this page! ', 'danger', '5000');
    redirect('/recruitment/index');
  }

?>

<!DOCTYPE html>
<html data-navigation-type="horizontal">

  <head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>Manage Roles | Castaway Systems</title>


    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="/assets/img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/assets/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/img/favicons/favicon-16x16.png">
    <link rel="shortcut icon" type="image/x-icon" href="/assets/img/favicons/favicon.ico">
    <link rel="manifest" href="/assets/img/favicons/manifest.json">
    <link href="/vendors/dropzone/dropzone.css" rel="stylesheet" />
    <meta name="msapplication-TileImage" content="/assets/img/favicons/mstile-150x150.png">
    <meta name="theme-color" content="#ffffff">
    <script src="/vendors/simplebar/simplebar.min.js"></script>
    <script src="/assets/js/config.js"></script>


    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&amp;display=swap" rel="stylesheet">
    <link href="/vendors/simplebar/simplebar.min.css" rel="stylesheet">
    <link href="/vendors/choices/choices.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link href="/assets/css/theme-rtl.min.css" type="text/css" rel="stylesheet" id="style-rtl">
    <link href="/assets/css/theme.min.css" type="text/css" rel="stylesheet" id="style-default">
    <link href="/assets/css/user-rtl.min.css" type="text/css" rel="stylesheet" id="user-style-rtl">
    <link href="/assets/css/user.min.css" type="text/css" rel="stylesheet" id="user-style-default">
    <script>
      var phoenixIsRTL = window.config.config.phoenixIsRTL;
      if (phoenixIsRTL) {
        var linkDefault = document.getElementById('style-default');
        var userLinkDefault = document.getElementById('user-style-default');
        linkDefault.setAttribute('disabled', true);
        userLinkDefault.setAttribute('disabled', true);
        document.querySelector('html').setAttribute('dir', 'rtl');
      } else {
        var linkRTL = document.getElementById('style-rtl');
        var userLinkRTL = document.getElementById('user-style-rtl');
        linkRTL.setAttribute('disabled', true);
        userLinkRTL.setAttribute('disabled', true);
      }
    </script>
  </head>

  <body>
    <main>
        <?php include($_SERVER['DOCUMENT_ROOT'].'/recruitment/admin/includes/sidebar.php'); ?>

        <div class="content">
          <div>
            <h2 class="mb-2">Community Roles</h2>
            <h5 class="text-body-tertiary fw-semibold">Manage your community roles here!</h5>
          </div>

          <section>
            <div id="alert-container" data-user-id="<?php echo htmlspecialchars($_SESSION['uuid']); ?>"></div>
            <div class="row">
                <div class="col-sm-6 my-3">
                    <div class="card">
                      <div class="card-header border-bottom bg-body">
                        <h5 class="mb-2">Create a Role</h5>
                      </div>
                        <div class="card-body">
                            <form method="POST" action="/recruitment/admin/helpers/communityRolesHelper">
                                <input type="hidden" name="community_id" value="<?php echo $_GET['id']; ?>"> 
                                <div class="form-floating mt-1">
                                    <input class="form-control" id="floatingEventInput" name="rolen" type="text" placeholder="Role name" />
                                    <label for="floatingEventInput">Role name</label>
                                </div>
                                <label class="mt-3" for="organizerMultiple">Permissions</label>
                                <select class="form-select" id="organizerMultiple" name="perms[]" data-choices="data-choices" multiple="multiple" data-options='{"removeItemButton":true,"placeholder":true}'>
                                    <option value="">Select(s) permissions</option>
                                    <?php 
                                    $query = "SELECT * FROM permissions";
                                    $query_run1 = mysqli_query($conn, $query);

                                    if(mysqli_num_rows($query_run1) > 0)
                                    {
                                       foreach($query_run1 as $data) {
                                        ?>
                                        <option value="<?php echo $data['id']; ?>"><?php echo $data['permission_name'] ?></option>
                                        <?php
                                       }
                                    }
                                    
                                    ?>
                                </select>
                                <div>
                                    <button class="btn btn-subtle-primary me-1 mb-1" type="submit" name="create-role">Create</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 my-3">
                  <div class="card">
                    <div class="card-header border-bottom bg-body">
                      <h5 class="mb-2">Role Management</h5>
                    </div>
                    <div class="card-body">
                      <table class="table">
                          <thead>
                              <tr>
                                  <th scope="col">Role Name</th>
                                  <th scope="col">Permissions</th>
                                  <th scope="col">Action</th>
                              </tr>
                          </thead>
                          <tbody>
                          </tbody>
                      </table>
                      <div id="loading-spinner" class="spinner-border" role="status"><span class="visually-hidden">Loading...</span></div>
                    </div>
                  </div>
                </div>
            </div>
          </section>
      </div>

      <!-- Edit Role Modal -->
      <div class="modal fade" id="editRoleModal" tabindex="-1" aria-labelledby="editRoleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="editRoleModalLabel">Edit Role</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                      <form id="editRoleForm">
                          <!-- Hidden input to store the role ID -->
                          <input type="hidden" id="editRoleId" name="role_id" />

                          <!-- Input for role name -->
                          <div class="form-floating mt-1">
                              <input class="form-control" id="editRoleName" name="rolen" type="text" placeholder="Role name" />
                              <label for="editRoleName">Role name</label>
                          </div>

                          <!-- Permissions checkboxes -->
                          <label class="mt-3">Permissions:</label>
                          <div id="permissionsCheckboxes">
                              <!-- Permissions will be dynamically inserted here as checkboxes -->
                          </div>
                      </form>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary" id="saveEditRole">Save changes</button>
                  </div>
              </div>
          </div>
      </div>
    </main>

    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    <script>
      document.addEventListener('DOMContentLoaded', function() {
          // Show the spinner initially
          document.getElementById('loading-spinner').style.display = 'block';
          
          // Wait for 3 seconds (3000 milliseconds) before fetching the roles
          setTimeout(fetchRoles, 1000);
      });

      function fetchRoles() {
          const communityId = <?php echo $_GET['id']; ?>;

          fetch(`/recruitment/admin/helpers/getCommunityRoles.php?community_id=${communityId}`)
              .then(response => response.json())
              .then(data => {
                  // Hide the spinner
                  document.getElementById('loading-spinner').style.display = 'none';

                  const rolesTableBody = document.querySelector("table tbody");
                  rolesTableBody.innerHTML = "";  // Clear existing rows

                  // Iterate over the object using Object.entries()
                  Object.entries(data).forEach(([role_id, roleDetails]) => {
                      let role_name = roleDetails.role_name;
                      let permissions = roleDetails.permissions;

                      // Ensure the permissions are encoded properly
                      let encodedRoleName = encodeURIComponent(role_name);
                      let encodedPermissions = JSON.stringify(permissions).replace(/"/g, '&quot;');

                      let row = `<tr data-role-id="${role_id}">
                                  <td>${role_name}</td>
                                  <td>${permissions.join(', ')}</td>
                                  <td>
                                      <div class="btn-reveal-trigger position-static">
                                          <button class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal fs-10" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent">
                                              <span class="fas fa-ellipsis-h fs-10"></span>
                                          </button>
                                          <div class="dropdown-menu dropdown-menu-end py-2">
                                              <a class="dropdown-item" href="#!" onclick="openEditModal(decodeURIComponent('${encodedRoleName}'), '${encodedPermissions}', ${role_id})">Edit</a>
                                              <button class="dropdown-item text-danger" href="#!" onclick="deleteRole(${role_id})">Remove</button>
                                          </div>
                                      </div>
                                  </td>
                              </tr>`;

                      rolesTableBody.innerHTML += row;
                  });

              })
              .catch(error => {
                  // Hide the spinner even if an error occurs
                  document.getElementById('loading-spinner').style.display = 'none';
                  console.error('Error fetching roles:', error);
              });
      }

      setInterval(fetchRoles, 50000);
    </script>
    <script>
      function openEditModal(roleName, permissionsJson, roleId) {
          // Parse the permissions back into an array
          let permissions;
          try {
              permissions = JSON.parse(permissionsJson);  // Safely parse JSON string into array
          } catch (error) {
              console.error('Error parsing permissions JSON:', error);
              return;
          }

          // Fill the modal form fields with the role data
          document.getElementById('editRoleName').value = roleName;
          document.getElementById('editRoleId').value = roleId;

          // Get the container for the checkboxes
          let permissionsContainer = document.getElementById('permissionsCheckboxes');
          permissionsContainer.innerHTML = '';  // Clear previous checkboxes

          // Fetch available permissions from your database via Ajax
          fetch('/recruitment/admin/helpers/getAvailablePermissions')  // Update this URL to your actual endpoint
              .then(response => response.json())
              .then(availablePermissions => {
                  // Populate the checkboxes for permissions
                  availablePermissions.forEach(permission => {
                      const isChecked = permissions.includes(permission.name);  // Match against assigned permissions

                      // Create checkbox input
                      const checkbox = document.createElement('input');
                      checkbox.type = 'checkbox';
                      checkbox.class = 'form-check-input'
                      checkbox.name = 'perms[]';
                      checkbox.value = permission.id;
                      checkbox.id = `perm_${permission.id}`;
                      checkbox.checked = isChecked;
                      checkbox.classList.add('form-check-input', 'me-2');  // Add your custom class here

                      // Create label for the checkbox
                      const label = document.createElement('label');
                      label.htmlFor = `perm_${permission.id}`;
                      label.textContent = permission.name;

                      // Append checkbox and label to the container
                      const checkboxWrapper = document.createElement('div');
                      checkboxWrapper.appendChild(checkbox);
                      checkboxWrapper.appendChild(label);

                      permissionsContainer.appendChild(checkboxWrapper);
                  });
              })
              .catch(error => {
                  console.error('Error fetching permissions:', error);
              });

          // Show the modal
          let modal = new bootstrap.Modal(document.getElementById('editRoleModal'));
          modal.show();
      }
    </script>
    <script>
      document.getElementById('saveEditRole').addEventListener('click', function() {
        const roleId = document.getElementById('editRoleId').value;
        const roleName = document.getElementById('editRoleName').value;
        const communityId = <?php echo json_encode($community_id); ?>;  // Pass the community_id
        const permissionsCheckboxes = document.querySelectorAll('#permissionsCheckboxes input[type="checkbox"]:checked');
        
        // Collect selected permissions
        const selectedPermissions = Array.from(permissionsCheckboxes).map(cb => cb.value);

        // Prepare the data to be sent to the server
        const data = {
            role_id: roleId,
            role_name: roleName,
            community_id: communityId,
            perms: selectedPermissions
        };

        // Send the data via fetch
        fetch('/recruitment/admin/managers/updateRole', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        })
        .then(response => response.json())
        .then(result => {
            if (result.success) {
                alert('Role updated successfully!');
                const modal = bootstrap.Modal.getInstance(document.getElementById('editRoleModal'));
                modal.hide();
                fetchRoles();  // Refresh roles
            } else {
                alert('Error updating role: ' + result.error);
            }
        })
        .catch(error => {
            console.error('Error updating role:', error);
            alert('An error occurred while updating the role.');
        });
    });

    </script>
    <script src="/assets/js/getAlerts.js"></script>
    <script src="/vendors/popper/popper.min.js"></script>
    <script src="/vendors/bootstrap/bootstrap.min.js"></script>
    <script src="/vendors/anchorjs/anchor.min.js"></script>
    <script src="/vendors/is/is.min.js"></script>
    <script src="/vendors/fontawesome/all.min.js"></script>
    <script src="/vendors/lodash/lodash.min.js"></script>
    <script src="/vendors/list.js/list.min.js"></script>
    <script src="/vendors/feather-icons/feather.min.js"></script>
    <script src="/vendors/dayjs/dayjs.min.js"></script>
    <script src="/assets/js/phoenix.js"></script>
    <script src="/vendors/tinymce/tinymce.min.js"></script>
    <script src="/vendors/dropzone/dropzone-min.js"></script>
    <script src="/vendors/choices/choices.min.js"></script>

  </body>

</html>
