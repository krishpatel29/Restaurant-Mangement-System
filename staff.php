<!DOCTYPE html>
<html>

<head>
    <title>Restaurant Staff Management</title>
    <script>
        // function to add new staff member
        function addStaff(event) {
            event.preventDefault();
            // get form values
            const name = document.getElementById('name').value;
            const position = document.getElementById('position').value;
            const shift = document.getElementById('shift').value;
            const contact = document.getElementById('contact').value;
            // create new staff row
            const newRow = document.createElement('tr');
            newRow.innerHTML = `
      <td>${name}</td>
      <td>${position}</td>
      <td>${shift}</td>
      <td>${contact}</td>
      <td>
        <button onclick="editStaff(this)">Edit</button>
        <button onclick="deleteStaff(this)">Delete</button>
      </td>
    `;
            // add new staff row to table
            document.getElementById('staff-list').appendChild(newRow);
            // reset form
            document.getElementById('add-staff-form').reset();
        }

        // function to delete staff member
        function deleteStaff(button) {
            // find the row to delete
            const row = button.parentNode.parentNode;
            // delete the row
            row.parentNode.removeChild(row);
        }

        // function to edit staff member
        function editStaff(button) {
            // get the row to edit
            const row = button.parentNode.parentNode;
            // get the values from the row
            const name = row.cells[0].textContent;
            const position = row.cells[1].textContent;
            const shift = row.cells[2].textContent;
            const contact = row.cells[3].textContent;
            // populate the form with the values
            document.getElementById('name').value = name;
            document.getElementById('position').value = position;
            document.getElementById('shift').value = shift;
            document.getElementById('contact').value = contact;
            // change the form submit button to say "Save"
            const addButton = document.getElementById('add-staff-form').querySelector('input[type="submit"]');
            addButton.value = "Save";
            // remove the old "Add Staff" event listener and add the new "Save Staff" listener
            addButton.removeEventListener('click', addStaff);
            addButton.addEventListener('click', saveStaff.bind(null, row));
        }

        // function to save edited staff member
        function saveStaff(row, event) {
            event.preventDefault();
            // get form values
            const name = document.getElementById('name').value;
            const position = document.getElementById('position').value;
            const shift = document.getElementById('shift').value;
            const contact = document.getElementById('contact').value;
            // update the row with the new values
            row.cells[0].textContent = name;
            row.cells[1].textContent = position;
            row.cells[2].textContent = shift;
            row.cells[3].textContent = contact;
            // change the form submit button back to say "Add Staff"
            const addButton = document.getElementById('add-staff-form').querySelector('input[type="submit"]');
            addButton.value = "Add Staff";
            // remove the "Save Staff" event listener and add the old "Add Staff" listener back
            addButton.removeEventListener('click', saveStaff);
            addButton.addEventListener('click', addStaff);
            // reset form
            document.getElementById('add-staff-form').reset();
        }

        // add event listener for form submission
        document.getElementById('add-staff-form').addEventListener('submit', addStaff);
    </script>
    <style>
        /* table styles */
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #8bc34a;
            color: #fff;
        }

        /* form styles */
        form {
            margin-top: 20px;
            width: 50%;
        }

        label {
            display: inline-block;
            margin-bottom: 6px;
        }

        input[type="text"],
        input[type="email"],
        select {
            display: block;
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-bottom: 12px;
        }

        input[type="submit"] {
            background-color: #8bc34a;
            color: #fff;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #689f38;
        }

        /* page styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #fff;
        }

        h1,
        h2 {
            text-align: center;
            color: #8bc34a;
        }

        h2 {
            margin-top: 40px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border: 2px solid #8bc34a;
            border-radius: 8px;
            box-shadow: 0 0 8px rgba(0, 0, 0, 0.2);
        }

        .staff-form-container {
            background-color: #f2f2f2;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 40px;
            margin: auto;
            width: 50%;

            padding: 10px;
        }

        .staff-form-container h2 {
            margin-top: 0;
            color: #8bc34a;
        }

        .staff-form-container label {
            color: #333;
        }

        .staff-form-container input[type="submit"] {
            background-color: #8bc34a;
            color: #fff;
            margin-top: 20px;
        }

        .staff-form-container input[type="submit"]:hover {
            background-color: #689f38;
        }

        .error-message {
            color: #f44336;
            margin-top: 6px;
            font-size: 0.9em;
        }

        .success-message {
            color: #4caf50;
            margin-top: 6px;
            font-size: 0.9em;
        }


        nav {
            background-color: #555;
            color: #fff;
            overflow: hidden;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1;
        }

        nav a {
            float: left;
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        nav a:hover {
            background-color: #ddd;
            color: black;
        }

        .addnewstaff {
            margin: auto;
            width: 50%;
            border: 3px solid green;
            padding: 10px;
        }

        .hidden {
            display: none;
        }
    </style>
</head>

<body>
    <nav>
        <a href="index.html">Home</a>
        <a href="login.html">Login</a>
        <a href="staff.html">Staff</a>
        <a href="menu.html">Menu</a>
    </nav><br><br>
    <h1>Restaurant Staff Management</h1>

    
    <table>
        <!-- <thead>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Shift</th>
                <th>Contact Info</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody id="staff-list">
            <tr>
                <td>Krish Patel</td>
                <td>Server</td>
                <td>Morning</td>
                <td>krish.patel@example.com</td>
                <td>
                    <button onclick="editStaff(this)">Edit</button>
                    <button onclick="deleteStaff(this)">Delete</button>
                </td>
            </tr>
            <tr>
                <td>Jay Patel</td>
                <td>Cook</td>
                <td>Evening</td>
                <td>jay.patel@example.com</td>
                <td>
                    <button onclick="editStaff(this)">Edit</button>
                    <button onclick="deleteStaff(this)">Delete</button>
                </td>
            </tr> -->
            <!-- additional staff rows can be added here -->
        </tbody>
    </table><br><br>
    <div class="addnewstaff">
        <h2>Add New Staff</h2>
        <form id="add-staff-form" class="staff-form-container" action="staff.php" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="position">Position:</label>
            <input type="text" id="position" name="position" required>

            <label for="shift">Shift:</label>
            <select id="shift" name="shift" required>
                <option value="">Select a shift</option>
                <option value="Morning">Morning</option>
                <option value="Afternoon">Afternoon</option>
                <option value="Evening">Evening</option>
                <option value="Night">Night</option>
            </select>
            <label for="contact">Contact Info:</label>
            <input type="email" id="contact" name="contact" required>
            <input type="submit" value="Add Staff" name="add">
            <input type="submit" value="Edit" name="edit">
        </form>
    </div>
    <h2>Current Staff</h2>
    <?php
    if(isset($_POST['edit']))
    {
        $name = $_POST['name'];
        $insert=false;
        $server="localhost";
        $username="root";
        $password="";
    
        $con = mysqli_connect($server,$username,$password,'restaurant');
        if(!$con)
        {
            die("connection failed" . mysqli_connect_error());
        }
        $contact = $_POST['contact'];
        $position = $_POST['position'];
        $shift=$_POST['shift'];
          $sql = "UPDATE `krish` SET name='$name', position='$position',shift='$shift' WHERE contact='$contact'";

            if (mysqli_query($con, $sql)) {
                echo "Record updated successfully";
            } else {
                echo "Error updating record: " . mysqli_error($con);
            }
          
          $sql = "SELECT * FROM `krish`";
          $result = mysqli_query($con, $sql);
        $num_rows = mysqli_num_rows($result);
      if ($num_rows > 0) {
      echo "<table>";
      echo "<tr><th>Name</th><th>Contact</th><th>Shift</th></tr>";
      while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>" . $row['name'] . "</td><td>" . $row['contact'] . "</td><td>" . $row['shift'] . "</td></tr>";
      }
      echo "</table>";
    } else {
      echo "No staff details found";
    }
    $con->close();
    }

    if(isset($_POST['add'])){

        $name = $_POST['name'];
        $insert=false;
        $server="localhost";
        $username="root";
        $password="";
    
        $con= mysqli_connect($server,$username,$password,'restaurant');
        if(!$con)
        {
            die("connection failed" . mysqli_connect_error());
        }
        $contact = $_POST['contact'];
        $position = $_POST['position'];
        $shift=$_POST['shift'];
        //echo "success connecting to db";
        $sql="INSERT INTO `krish` (`name`, `contact`, `position`, `shift`) VALUES ('$name', '$contact', '$position', '$shift')";

       // echo $sql;
        if($con->query($sql)==true)
        {
            //echo "successfully inserted";
            $insert=true;
        //    echo "<p class='return'>Thanks,Your Form has been Submitted.</p>";
        }
        else
        {
            echo "Error: $sql <br> $con->error";
        }
        $sql = "SELECT * FROM `krish`";
        $result = mysqli_query($con, $sql);
        $num_rows = mysqli_num_rows($result);
            if ($num_rows > 0) {
            echo "<table>";
            echo "<tr><th>Name</th><th>Contact</th><th>Shift</th></tr>";
            while ($row = mysqli_fetch_assoc($result)) {
              echo "<tr><td>" . $row['name'] . "</td><td>" . $row['contact'] . "</td><td>" . $row['shift'] . "</td></tr>";
            }
            echo "</table>";
          } else {
            echo "No staff details found";
          }
        $con->close();
}
    ?>
    
</body>

</html>