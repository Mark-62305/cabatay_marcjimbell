<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * Controller: Login
 * 
 * Automatically generated via CLI.
 */
class Login extends Controller {
    public function __construct()
    {
        parent::__construct();
    }
    public function index() {
        
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            // Handle login form submission here
            $email = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';

            if($email === 'admin' && $password === 'password'){
                header("Location: /student/index/1");  // redirect to student page
                exit;
            }
            elseif ($this->Mod_Student->logi($email, $password)) {
                $data = $this->Mod_Student->profile($email, $password);
                
                $this->call->view('ProfPage', $data);
            } else {
                // Failed login, you might want to set an error message
                $data['error'] = 'Invalid email or password';
                $this->call->view('logPage', $data);
                return;
            }
        } else {
            $this->call->view('logPage');
        }
    }
    public function signup() {
        if($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['passw']) && $_POST['passw'] != '') {
                $passwo = $_POST['passw'];
                
            }else{
                $passwo = $_POST['Last_Name'];
            }
            $users = [
                    'fname' => $_POST['First_Name'],
                    'lname' => $_POST['Last_Name'],
                    'email' => $_POST['Email'],
                    'passw' => $passwo
                ];
                $this->Mod_Student->insert($users);
        }
        $this->call->view('signPage');
    }
}