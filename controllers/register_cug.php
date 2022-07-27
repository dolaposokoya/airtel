<?php
include('./authentication.php');
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $_SESSION["ID"] = 100;
    include('../database.php');
    $response = createAirtelCugTable($conn);
    if ($response == 1) {
        makeCugRequest($conn);
    } else {
        $data['success'] = $response;
        $data['status'] = 200;
        $data['message'] = "Error Occured";
        echo json_encode($data);
    }
} else {
    $data['success'] = false;
    $data['status'] = 'error';
    $data['message'] = 'not safe';
    echo json_encode($data);
}

function test_data($data)
{
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlentities($data);
    return $data;
}

function checkIfHospitalExist($conn)
{
    $email = test_data($_POST['email']);
    $email = strtolower($email);
    $query =  "SELECT * from hospitals WHERE email = '" . mysqli_real_escape_string($conn, $email) . "'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 0) {
        return false;
    } elseif ($row = mysqli_fetch_assoc($result)) {
        if ($row['email'] === $email) {
            return true;
        } else {
            return false;
        }
    }
}


function createAirtelCugTable($conn)
{
    $sql = "CREATE TABLE IF NOT EXISTS airtel_cug (
        id INT(20) UNSIGNED AUTO_INCREMENT  PRIMARY KEY NOT NULL,
        profile_id varchar(255) DEFAULT NULL,
        name varchar(255) NOT NULL,
        contact_mobile varchar(256) NOT NULL,
        multi_line_number varchar(255) DEFAULT NULL,
        airtel_number varchar(256) DEFAULT NULL,
        other_number varchar(256) DEFAULT NULL,
        smedan_number varchar(255) DEFAULT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
      )";
    if (mysqli_query($conn, $sql) == 1) {
        return true;
    } else {
        return false;
    }
}


function makeCugRequest($conn)
{
    try {
        $name = test_data($_POST['name']);
        $contact_mobile = test_data($_POST['contact_mobile']);
        $multi_line_number = test_data($_POST['multi_line_number']);
        $airtel_number = test_data($_POST['airtel_number']);
        $other_number = test_data($_POST['other_number']);
        $smedan_number = test_data($_POST['smedan_number']);
        if (!empty($name) && !empty($contact_mobile) && !empty($smedan_number)) {
            $profile_id =  uniqid(5);
            $query = "INSERT INTO airtel_cug (profile_id,name, contact_mobile,multi_line_number, airtel_number,other_number, smedan_number) VALUES ('" . mysqli_real_escape_string($conn, $profile_id) . "','" . mysqli_real_escape_string($conn, $name) . "','" . mysqli_real_escape_string($conn, $contact_mobile) . "','" . mysqli_real_escape_string($conn, $multi_line_number) . "','" . mysqli_real_escape_string($conn, $airtel_number) . "','" . mysqli_real_escape_string($conn, $other_number) . "','" . mysqli_real_escape_string($conn, $smedan_number) . "');";
            $result = mysqli_query($conn, $query);
            if ($result == 0) {
                $data['success'] = false;
                $data['status'] = 200;
                $data['message'] = "Error while registering your request";
            } else {
                $data['success'] = true;
                $data['status'] = 200;
                $data['message'] = "Your request is being processed";
            }
        } else {
            $data['success'] = false;
            $data['status'] = 403;
            $data['message'] = "Some fields are empty";
        }
    } catch (Exception $error) {
        $data['success'] = false;
        $data['status'] = 500;
        $data['message'] = $error->getMessage();
    }
    echo json_encode($data);
}
