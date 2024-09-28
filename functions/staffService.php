<?php

class StaffService {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function giveAgentButton($uuid) {
        // Prepare the SQL statement
        $stmt = $this->conn->prepare("SELECT uuid, role, access FROM agents WHERE uuid = ?");
        
        if ($stmt === false) {
            // Handle preparation error
            echo 'Error preparing statement: ' . htmlspecialchars($this->conn->error);
            return;
        }
        
        $stmt->bind_param("s", $uuid);
        $stmt->execute();
        $stmt->store_result();

        // Check if any rows are returned
        if ($stmt->num_rows > 0) {
            // Display the button if the user is a staff member
            echo '<a class="nav-link lh-1" href="/recruitment/index"><span class="uil fs-8 me-2 uil-shield-check"></span>Dev Portal</a>';
        }

        // Close the statement
        $stmt->close();
    }

    public function giveAgentBadge($uuid) {
        // Prepare the SQL statement
        $stmt = $this->conn->prepare("SELECT uuid, role, access FROM agents WHERE uuid = ?");
        
        if ($stmt === false) {
            // Handle preparation error
            echo 'Error preparing statement: ' . htmlspecialchars($this->conn->error);
            return;
        }
        
        $stmt->bind_param("s", $uuid);
        $stmt->execute();
        $stmt->store_result();

        // Check if any rows are returned
        if ($stmt->num_rows > 0) {
            // Display the badge if the user is a staff member
            echo '<span class="text-danger uil me-1 uil-shield"></span>';
        }

        // Close the statement
        $stmt->close();
    }

    public function giveAgentText($uuid) {
        // Prepare the SQL statement
        $stmt = $this->conn->prepare("SELECT uuid, role, access FROM agents WHERE uuid = ?");
        
        if ($stmt === false) {
            // Handle preparation error
            echo 'Error preparing statement: ' . htmlspecialchars($this->conn->error);
            return;
        }
        
        $stmt->bind_param("s", $uuid);
        $stmt->execute();
        $stmt->store_result();

        // Check if any rows are returned
        if ($stmt->num_rows > 0) {
            // Display the badge if the user is a staff member
            echo '<span class="badge badge-phoenix fs-10 badge-phoenix-danger"><span class="me-1" data-feather="shield" style="height:12.8px;width:12.8px;"></span><span class="badge-label">DEVELOPER</span></span>';
        }

        // Close the statement
        $stmt->close();
    }
}

?>