<!-- Modal -->
<div class="modal fade" id="createDepartmentModal" tabindex="-1" aria-labelledby="createDepartmentModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content border border-warning">
      <div class="modal-header">
        <h5 class="modal-title" id="createDepartmentModalLabel">Create Department</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Form to create a user -->
        <form id="createUserForm">
          <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter name">
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
          </div>
          <button type="submit" class="btn btn-primary">Create</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
$(function() {
  $('#createUserForm').on('submit', function(e) {
    e.preventDefault();

    // Submit form data via AJAX
    $.ajax({
      url: '/department',
      method: 'POST',
      data: $(this).serialize(),
      success: function(data) {
        // Update the page with the new user data
        $('#departmentTable tbody').append('<tr><td>' + data.name + '</td><td>' + data.email + '</td><td>' + data.created_at + '</td></tr>');

        // Close the modal
        $('#createDepartmentModal').modal('hide');
      }
    });
  });
});
</script>