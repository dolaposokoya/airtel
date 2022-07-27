<?php
include('./authentication.php');
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $_SESSION["ID"] = 100;
    include('../database.php');
    $response = createAirtelOduTable($conn);
    if ($response == 1) {
        makeOduRequest($conn);
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


function createAirtelOduTable($conn)
{
    $sql = "CREATE TABLE IF NOT EXISTS airtel_odu (
        id INT(20) UNSIGNED AUTO_INCREMENT  PRIMARY KEY NOT NULL,
        profile_id varchar(255) DEFAULT NULL,
        name varchar(255) NOT NULL,
        address varchar(256) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
      )";
    if (mysqli_query($conn, $sql) == 1) {
        return true;
    } else {
        return false;
    }
}


function makeOduRequest($conn)
{
    try {
        $name = test_data($_POST['name']);
        $contact_mobile = test_data($_POST['contact_mobile']);
        $address = test_data($_POST['address']);
        if (!empty($name) && !empty($contact_mobile) && !empty($address)) {
            $profile_id =  uniqid(5);
            $query = "INSERT INTO airtel_odu (profile_id,name, contact_mobile,address) VALUES ('" . mysqli_real_escape_string($conn, $profile_id) . "','" . mysqli_real_escape_string($conn, $name) . "','" . mysqli_real_escape_string($conn, $contact_mobile) . "','" . mysqli_real_escape_string($conn, $address) . "');";
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
