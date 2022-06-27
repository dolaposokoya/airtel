<?php
include('./authentication.php');
if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $_SESSION["ID"] = 100;
    include('../database.php');
    verifyVolunteer($conn);
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

function verifyVolunteer($conn)
{
    try {
        $volunteerId = test_data($_GET['volunteer_id']);
        $query =  "SELECT * from ruawi_volunteer WHERE volunteer_id = '" . mysqli_real_escape_string($conn, $volunteerId) . "'";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) == 0) {
            $data['success'] = false;
            $data['status'] = 200;
            $data['volunteerId'] = $volunteerId;
            $data['message'] = "No data found";
        } elseif ($row = mysqli_fetch_assoc($result)) {
            if ($row['volunteer_id'] === $volunteerId) {
                // $userData['full_name'] = 
                $data['success'] = true;
                $data['status'] = 200;
                $data['data'] = $row;
                $data['message'] = "Volunteer returned successfully";
            } else {
                $data['success'] = false;
                $data['status'] = 200;
                $data['volunteerId'] = $volunteerId;
                $data['message'] = "No Volunteer found for {$volunteerId}";
            }
        }
    } catch (Exception $error) {
        $data['success'] = false;
        $data['status'] = 500;
        $data['message'] = $error->getMessage();
    }
    echo json_encode($data);
}
