<?php


/**
 * Class Auth
 */
class Auth extends Controller
{


    public function index()
    {
        include APP . 'core/auth/guest_validation.php';
        require APP . 'view/auth/login/index.php';;
    }

    public function login()
    {

        require APP . 'core/auth/guest_validation.php';

        if ($this->model['User']->isValidUser($_POST['email'], md5(md5(md5($_POST['password']))))) {
            $user = $this->model['User']->getUserByEmail($_POST['email']);
            $_SESSION['email'] = $user->email;
            $_SESSION['password'] = $user->password;
            header('location: ' . URL);
        }
        $_SESSION['flash'] = 'Incorrect password or email';

        header('location: ' . URL . 'home');
    }


    public function logout()
    {
        session_destroy();
        header('location: ' . URL . 'home');
    }

    public function create()
    {
        require APP . 'core/auth/guest_validation.php';
        require APP . 'view/auth/register/index.php';
    }

    public function store()
    {
        include APP . 'core/auth/guest_validation.php';

        if ($_POST['password'] == $_POST['password2'] && !($this->model['User']->emailExiste($_POST['email']))) {

            $confirmation = uniqid();

            $user = $this->model['User']->addUser($_POST['first_name'], $_POST['last_name'], $_POST['email'], $confirmation, md5(md5(md5($_POST['password']))));

            /*  $to = $user->email;
              $subject = "Hi!";
              $body = "<HTML>";
              $body .= "cliquer ";
              $body .= "<a href=" . URL . "auth/verification/" . $user->id . "/" . $confirmation . ">ici</a> ";
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
                  print($mail->getMessage());
              } else {
                  echo("<p>Message successfully sent!</p>");
              }
               */
            $_SESSION['success'] = 'Your registration is successful';

            header('location: ' . URL . 'auth');
        } elseif ($_POST['password'] != $_POST['password2']) {
            $_SESSION['flash'] = 'Password does not match the confirm password';
            header('location: ' . URL . 'auth/create');
        } elseif (($this->model['User']->emailExiste($_POST['email']))) {
            $_SESSION['flash'] = 'Email already exists';
            header('location: ' . URL . 'auth/create');
        }

    }


    public
    function edit()
    {

        include APP . 'core/auth/auth_validation.php';
        //VIEW
        require APP . 'view/includes/head.php';
        require APP . 'view/includes/header.php';
        require APP . 'view/includes/sidebar.php';
        require APP . 'view/auth/update/update.php';
        require APP . 'view/includes/footer.php';
        require APP . 'view/includes/script.php';
    }


    public
    function update()
    {
        include APP . 'core/auth/auth_validation.php';
        if (count($_POST)) {

            if (isset($_FILES['avatar']) && $_FILES['avatar']['name'] != '') {
                $target_dir = "uploads/";
                $target_file = $target_dir . basename($_FILES["avatar"]["name"]);
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                $file_name = uniqid() . '.' . $imageFileType;
                $target_file = $target_dir . $file_name;
                // Check if image file is a actual image or fake image
                $check = getimagesize($_FILES["avatar"]["tmp_name"]);
                if ($check !== false) {
                    echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                } else {
                    echo "File is not an image.";
                    $uploadOk = 0;
                }
                // Check if file already exists
                if (file_exists($target_file)) {
                    echo "Sorry, file already exists.";
                    $uploadOk = 0;
                }
                // Check file size
                if ($_FILES["avatar"]["size"] > 5000000) {
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
                    if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file)) {
                        echo "The file " . basename($_FILES["avatar"]["tmp_name"]) . " has been uploaded.";
                    } else {
                        echo "Sorry, there was an error uploading your file.";
                    }
                }
                $this->model['User']->editAvatar($file_name, $user->id);
            }

            $this->model['User']->editUser($_POST['first_name'], $_POST['last_name'], $_POST['email'], $user->id);

            header('location: ' . URL . 'auth/edit');

        }

    }


    public
    function edit_password()
    {

        include APP . 'core/auth/auth_validation.php';

        require APP . 'view/includes/head.php';
        require APP . 'view/includes/header.php';
        require APP . 'view/includes/sidebar.php';
        require APP . 'view/auth/update/update_password.php';
        require APP . 'view/includes/footer.php';
        require APP . 'view/includes/script.php';
    }


    public
    function update_password()
    {
        include APP . 'core/auth/auth_validation.php';
        if (count($_POST)) {

            if (md5(md5(md5($_POST['oldPassword']))) == $user->password && $_POST['newPassword'] == $_POST['newPassword2']) {
                echo 'lk,mlk,';
                $this->model['User']->editPassword(md5(md5(md5($_POST['newPassword']))), $user->id);
            }
        }

        header('location: ' . URL );

    }

}
