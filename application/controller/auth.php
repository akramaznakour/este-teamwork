<?php


use ptejada\uFlex\User;
use ptejada\uFlex\Hash;

/**
 * Class Auth
 */
class Auth extends Controller
{

    /**
     *
     */
    public function index()
    {

        $user = new User();
        include APP . 'core/auth/validations/guest_validation.php';

        require APP . 'view/auth/login/index.php';
    }

    /**
     *
     */
    public function login()
    {
        $user = new User();
        require APP . 'core/auth/validations/guest_validation.php';

        if (count($_POST)) {

            $input = new \ptejada\uFlex\Collection($_POST);

            $user->login($input->Username, $input->Password, $input->auto);

            $errMsg = '';

            if ($user->log->hasError()) {
                $errMsg = $user->log->getErrors();
                $errMsg = $errMsg[0];
            }

            echo json_encode(array(
                'error' => $user->log->getErrors(),
                'confirm' => "You are now login as <b>$user->Username</b>",
                'form' => $user->log->getFormErrors(),
            ));
        }
        header('location: ' . URL);
    }

    /**
     *
     */
    public function logout()
    {
        $user = new User();
        include APP . 'core/auth/validations/auth_validation.php';
        $user->logout();
        header('location: ' . URL . 'home');
    }

    /**
     *
     */
    public function create()
    {
        $user = new User();
        include APP . 'core/auth/validations/guest_validation.php';
        //VIEW
        require APP . 'view/auth/register/index.php';
    }

    /**
     *
     */
    public function store()
    {

        $user = new User();

        include APP . 'core/auth/validations/guest_validation.php';
        include APP . 'core/auth/validations/validations.php';


        require APP . 'core/Mail/Mail.php';

        if (count($_POST)) {

            $input = new \ptejada\uFlex\Collection($_POST);
            $input->filter('first_name', 'last_name', 'Email', 'Password', 'Password2', 'Avatar');

            $confirmation = $user->register($input, true);
            
            $to = $_POST['Email'];
            $subject = "Hi!";
            $body = "<HTML>";
            $body .= "cliquer ";
            $body .= "<a href=" . URL . "auth/verification/" . $user->ID . "/" . $confirmation . ">ici</a> ";
            $body .= "pour activer votre compte";
            $body .= "</HTML>";

            $headers = array('From' => EMAIL_USER, 'To' => $to, 'Subject' => $subject, 'MIME-Version' => '1.0rn',
                'Content-Type' => "text/html; charset=UTF-8\r\n");

            $smtp = Mail::factory('smtp',
                array('host' => EMAIL_HOST,
                    'port' => EMAIL_PORT,
                    'auth' => true,
                    'username' => EMAIL_USER,
                    'password' => EMAIL_PASSWORD,
                    'Subject' => $subject,));
            $mail = $smtp->send($to, $headers, $body);

            if (PEAR::isError($mail)) {
                echo("<p> </p>");
            } else {
                echo("<p>Message successfully sent!</p>");
            }
            
            echo json_encode(
                array(
                    'error' => $user->log->getErrors(),
                    'confirm' => 'User Registered Successfully. You may login now!',
                    'form' => $user->log->getFormErrors(),
                )
            );
        }
        header('location: ' . URL . 'auth');
    }

    /**
     * @param $user_id
     * @param $confirmation
     */
    public function verification($user_id, $confirmation)
    {
        $user = new User();
        require APP . 'core/auth/validations/guest_validation.php';

        $today = date("Y-m-d");

        $RegDate = $this->model['User']->getUser($user_id)->RegDate;
   
        if ((time() - strtotime(date('d-m-Y',$RegDate)))/(3600*24) < 15) {
    
            if ($this->model['User']->getUser($user_id)->Confirmation == $confirmation && $this->model['User']->getUser($user_id)->Activated == 0) 
            $this->model['User']->activateUser($user_id);
                        header('location: ' . URL);
        } else {
            $this->model['User']->deleteUser($user_id);
        }

    }

    /**
     *
     */
    public function edit()
    {
        $user = new User();
        include APP . 'core/auth/validations/auth_validation.php';
        //VIEW
        require APP . 'view/includes/head.php';
        require APP . 'view/includes/header.php';
        require APP . 'view/includes/sidebar.php';
        require APP . 'view/auth/update/update.php';
        require APP . 'view/includes/footer.php';
        require APP . 'view/includes/script.php';
    }

    /**
     *
     */
    public function update()
    {
        $user = new User();
        include APP . 'core/auth/validations/auth_validation.php';
        include APP . 'core/auth/validations/validations.php';

        if (count($_POST)) {
            $request = $_POST;

            if (isset($_FILES['Avatar']) && $_FILES['Avatar']['name'] != '') {
                $target_dir = "uploads/";
                $target_file = $target_dir . basename($_FILES["Avatar"]["name"]);
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                $file_name = uniqid() . '.' . $imageFileType;
                $target_file = $target_dir . $file_name;
                // Check if image file is a actual image or fake image
                if (isset($_POST["submit"])) {
                    $check = getimagesize($_FILES["Avatar"]["tmp_name"]);
                    if ($check !== false) {
                        echo "File is an image - " . $check["mime"] . ".";
                        $uploadOk = 1;
                    } else {
                        echo "File is not an image.";
                        $uploadOk = 0;
                    }
                }
                // Check if file already exists
                if (file_exists($target_file)) {
                    echo "Sorry, file already exists.";
                    $uploadOk = 0;
                }
                // Check file size
                if ($_FILES["Avatar"]["size"] > 5000000) {
                    echo "Sorry, your file is too large.";
                    $uploadOk = 0;
                }
                // Allow certain file formats
                if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                    && $imageFileType != "gif") {
                    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                    $uploadOk = 0;
                }
                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                    echo "Sorry, your file was not uploaded.";
                    // if everything is ok, try to upload file
                } else {
                    if (move_uploaded_file($_FILES["Avatar"]["tmp_name"], $target_file)) {
                        echo "The file " . basename($_FILES["Avatar"]["tmp_name"]) . " has been uploaded.";
                    } else {
                        echo "Sorry, there was an error uploading your file.";
                    }
                }
                $request["Avatar"] = $file_name;
            }
            $input = new \ptejada\uFlex\Collection($request);
            print_r($input);
            foreach ($input->toArray() as $name => $val) {
                if (is_null($user->getProperty($name))) {
                    unset($input->$name);
                } else {
                    if ($user->$name == $val) {
                        unset($input->$name);
                    }
                }
            }

            if (!$input->isEmpty()) {
                $user->update($input->toArray());
            } else {
                $user->log->error('No need to update!');
            }

            echo json_encode(array(
                'error' => $user->log->getErrors(),
                'confirm' => 'Account Updated!',
                'form' => $user->log->getFormErrors(),
            ));

            header('location: ' . URL . 'auth/edit');

        }
    }

    /**
     *
     */
    public function reset_password()
    {
        $user = new User();
        if (count($_POST)) {

            $input = new \ptejada\uFlex\Collection($_POST);

            $res = $user->resetPassword($input->Email);

            $errorMessage = '';
            $confirmMessage = '';

            if ($res) {

                $url = '/update/password?c=' . $res->Confirmation;
                $confirmMessage = "Use the link below to change your password ";

            } else {
                $errorMessage = $user->log->getErrors();
                $errorMessage = $errorMessage[0];
            }

            echo json_encode(array(
                'error' => $user->log->getErrors(),
                'confirm' => $confirmMessage,
                'form' => $user->log->getFormErrors(),
            ));
        }
    }

    /**
     *
     */
    public function edit_password()
    {
        $user = new User();
        include APP . 'core/auth/validations/auth_validation.php';
        //VIEW


        require APP . 'view/includes/head.php';
        require APP . 'view/includes/header.php';
        require APP . 'view/includes/sidebar.php';
        require APP . 'view/auth/update/update_password.php';
        require APP . 'view/includes/footer.php';
        require APP . 'view/includes/script.php';
    }

    /**
     *
     */
    public function update_password()
    {
        $user = new User();
        include APP . 'core/auth/validations/auth_validation.php';

        $user_data = $user->toArray();
        $hash = new Hash();

        if (count($_POST)) {
            $input = new \ptejada\uFlex\Collection($_POST);

            if ($user_data['Password'] == $hash->generateUserPassword($user, $input->oldPassword)) {
                $user->update(array('Password' => $input->newPassword, 'Password2' => $input->newPassword2,));
                header('location: ' . URL . 'auth/logout');

            } else {
                header('location: ' . URL . 'auth/update_password');
            }

            echo json_encode(
                array(
                    'error' => $user->log->getAllErrors(),
                    'confirm' => 'Password Changed',
                    'form' => $user->log->getFormErrors(),
                )
            );

        }
    }

}
