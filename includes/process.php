<?php 
include 'db.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["register"])) {

    $username = $_POST["username"];
    $fullname = $_POST["fullname"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $password = $_POST["password"];
    $rank = $_POST["rank"];

    $sql = "INSERT INTO logistic (username, fullname, email, phone, password, rank) VALUES ('$username','$fullname', '$email', '$phone', '$password', '$rank')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
                alert('Record added successfully');
                window.location.href='../logistic/logis-login.php';
              </script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $logisticQuery = "SELECT * FROM logistic WHERE username = '$username' AND password = '$password'";
    $logisticResult = $conn->query($logisticQuery);

    if ($logisticResult->num_rows > 0) {
        $logisticRow = $logisticResult->fetch_assoc();
        $_SESSION["username"] = $logisticRow["username"];
        header("Location: ../logistic/dashboard.php");
        exit();
    }

    $officerQuery = "SELECT * FROM officer WHERE username = '$username' AND password = '$password'";
    $officerResult = $conn->query($officerQuery);

    if ($officerResult->num_rows > 0) {
        $officerRow = $officerResult->fetch_assoc();
        $_SESSION["username"] = $officerRow["username"];
        header("Location: ../officer/dashboard.php");
        exit();
    }

    $soldierQuery = "SELECT * FROM soldier WHERE username = '$username' AND password = '$password'";
    $soldierResult = $conn->query($soldierQuery);

    if ($soldierResult->num_rows > 0) {
        $soldierRow = $soldierResult->fetch_assoc();
        $_SESSION["username"] = $soldierRow["username"];
        header("Location: ../soldier/dashboard.php");
        exit();
    }

    echo "<script>
            alert('Invalid username or password. Please try again.');
            window.location.href='../index.php';
          </script>";
}
if (isset($_GET["logout"])) {
    session_destroy();
    header("Location: ../index.php");
    exit();
}
if (isset($_GET['deleteid'])) {
    $deleteId = $_GET['deleteid'];

    $deleteQuery = "DELETE FROM soldier WHERE soldier_id = $deleteId";

    if (mysqli_query($conn, $deleteQuery)) {
        echo "<script>
            alert('Record Deleted successfully.');
            window.location.href='../logistic/soldiers.php';
          </script>";
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}
if (isset($_GET['ofdeleteid'])) {
    $deleteId = $_GET['ofdeleteid'];

    $deleteQuery = "DELETE FROM officer WHERE officer_id = $deleteId";

    if (mysqli_query($conn, $deleteQuery)) {
        echo "<script>
            alert('Record Deleted successfully.');
            window.location.href='../logistic/soldiers.php';
          </script>";
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}
if (isset($_GET['deletewpnid'])) {
    $deleteId = $_GET['deletewpnid'];

    $deleteQuery = "DELETE FROM weapon_requests WHERE request_id = $deleteId";

    if (mysqli_query($conn, $deleteQuery)) {
        echo "<script>
            alert('Record Deleted successfully.');
            window.location.href='../soldiers/history.php';
          </script>";
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}

if (isset($_GET['banid'])) {
    $deleteId = $_GET['banid'];
    $status= 'banned';

    $deleteQuery = "UPDATE weapon SET availability_status = '$status' WHERE weapon_id ='$deleteId'";

    if (mysqli_query($conn, $deleteQuery)) {
        echo "<script>
            alert('Item marked as Banned.');
            window.location.href='../officer/inventory.php';
          </script>";
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}
if (isset($_GET['openid'])) {
    $deleteId = $_GET['openid'];
    $status= 'available';

    $deleteQuery = "UPDATE weapon SET availability_status = '$status' WHERE weapon_id ='$deleteId'";

    if (mysqli_query($conn, $deleteQuery)) {
        echo "<script>
            alert('Item marked as Open.');
            window.location.href='../officer/inventory.php';
          </script>";
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}
if (isset($_GET['removeid'])) {
    $deleteId = $_GET['removeid'];


    $deleteQuery = "DELETE FROM weapon_requests WHERE request_id = $deleteId";

    if (mysqli_query($conn, $deleteQuery)) {
        echo "<script>
            alert('Item Listing Deleted.');
            window.location.href='../officer/new-requests.php';
          </script>";
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}
if (isset($_GET['approveid'])) {
    $deleteId = $_GET['approveid'];
    $status= 'approved';

    $deleteQuery = "UPDATE weapon_requests SET request_status = '$status' WHERE request_id ='$deleteId'";

    if (mysqli_query($conn, $deleteQuery)) {
        echo "<script>
            alert('Weapon application approved.');
            window.location.href='../officer/new-requests.php';
          </script>";
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}
if (isset($_GET['denyid'])) {
    $deleteId = $_GET['denyid'];
    $status= 'denied';

    $deleteQuery = "UPDATE weapon_requests SET request_status = '$status' WHERE request_id ='$deleteId'";

    if (mysqli_query($conn, $deleteQuery)) {
        echo "<script>
            alert('Weapon application Denied.');
            window.location.href='../officer/new-requests.php';
          </script>";
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}

?>