<?php
include('./authentication.php');
include('./sendMail.php');
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $_SESSION["ID"] = 100;
    include('../database.php');
    $response = createHospitalTableIfNotExist($conn);
    if ($response == 1) {
        insertMember($conn);
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


function createHospitalTableIfNotExist($conn)
{
    $sql = "CREATE TABLE IF NOT EXISTS hospitals (
        id INT(20) UNSIGNED AUTO_INCREMENT  PRIMARY KEY NOT NULL,
        hospital_id varchar(255) DEFAULT NULL,
        hospital_name varchar(255) DEFAULT NULL,
        reg_number varchar(255) DEFAULT NULL,
        hospital_email varchar(256) NOT NULL,
        address varchar(256) NOT NULL,
        state varchar(256) NOT NULL,
        lga varchar(256) NOT NULL,
        contact_name varchar(256) NOT NULL,
        contact_email varchar(256) NOT NULL,
        contact_mobile varchar(256) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
      )";
    if (mysqli_query($conn, $sql) == 1) {
        return true;
    } else {
        return false;
    }
}


function insertMember($conn)
{
    try {
        $hospital_name = test_data($_POST['hospital_name']);
        $reg_number = test_data($_POST['reg_number']);
        $hospital_email = test_data($_POST['hospital_email']);
        $address = test_data($_POST['address']);
        $state = test_data($_POST['state']);
        $lga = test_data($_POST['lga']);
        $contact_name = test_data($_POST['contact_name']);
        $contact_email = test_data($_POST['contact_email']);
        $contact_mobile = test_data($_POST['contact_mobile']);
        if (!empty($hospital_name) && !empty($reg_number)) {
            if (!filter_var($_POST['hospital_email'], FILTER_VALIDATE_EMAIL) && !filter_var($_POST['contact_email'], FILTER_VALIDATE_EMAIL)) {
                $data['success'] = false;
                $data['status'] = "invalid";
                $data['message'] = "Invalid Email";
            } else {
                $hospital_email = strtolower($hospital_email);
                $contact_email = strtolower($contact_email);
                $hospital_id =  uniqid(5);
                $query = "INSERT INTO hospitals (hospital_id,hospital_name, reg_number,hospital_email, address,state,lga,contact_name,contact_email,contact_mobile) VALUES ('" . mysqli_real_escape_string($conn, $hospital_id) . "','" . mysqli_real_escape_string($conn, $hospital_name) . "','" . mysqli_real_escape_string($conn, $reg_number) . "','" . mysqli_real_escape_string($conn, $hospital_email) . "','" . mysqli_real_escape_string($conn, $address) . "','" .
                    mysqli_real_escape_string($conn, $state) . "','" . mysqli_real_escape_string($conn, $lga) . "','" .
                    mysqli_real_escape_string($conn, $contact_name) . "','" .
                    mysqli_real_escape_string($conn, $contact_email) . "','" .
                    mysqli_real_escape_string($conn, $contact_mobile) . "');";
                $result = mysqli_query($conn, $query);
                if ($result == 0) {
                    $data['success'] = false;
                    $data['status'] = 200;
                    $data['message'] = "Error while registering hospital";
                } else {
                    $mailresult =  sendMail($hospital_email, $hospital_name);
                    if ($mailresult && $mailresult['success'] == true) {
                        $data['success'] = true;
                        $data['status'] = 200;
                        $data['message'] = "Hospital registered successfully for the Patients' Bill of Rights! Please Check your email";
                    } else {
                        $data['success'] = false;
                        $data['status'] = 200;
                        $data['message'] = "Hospital registered successfully for the Patients' Bill of Rights! but unable to send email to your registerd email {$hospital_email}";
                    }
                }
            }
        } else {
            $data['success'] = false;
            $data['status'] = 403;
            $data['message'] = "Error Occured!";
        }
    } catch (Exception $error) {
        $data['success'] = false;
        $data['status'] = 500;
        $data['message'] = $error->getMessage();
    }

    echo json_encode($data);
}
