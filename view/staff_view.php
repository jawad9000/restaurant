<?php 
include '../controller/staff.php';
include "header.php";
?>

    <h1>View Staff Members</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Full Name</th>
                <th>Position</th>
                <th>Action</th> <!-- Added action column -->
            </tr>
        </thead>
        <tbody>
            <?php foreach ($staff as $member) { ?>
                <tr>
                    <td><?php echo $member['id']; ?></td>
                    <td><?php echo $member['username']; ?></td>
                    <td><?php echo $member['email']; ?></td>
                    <td><?php echo $member['full_name']; ?></td>
                    <td><?php echo $member['position']; ?></td>
                    <td>
                        <a href="staff_up.php?id=<?php echo $member['id']; ?>">Edit</a> <!-- Edit link -->
                        <a href="?action=delete&id=<?php echo $member['id']; ?>" onclick="return confirm('Are you sure you want to delete this staff member?')">Delete</a> <!-- Delete link with confirmation -->
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <?php include "footer.php"; // Include the footer file ?>

