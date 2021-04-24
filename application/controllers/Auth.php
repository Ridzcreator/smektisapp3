<?php
class Auth extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
	}

    public function index()
    {
        $this->load->view('auth/login');
    }

    public function verify()
	{
		if (session_status() == PHP_SESSION_NONE) {
		    session_start();
		}
		unset($_SESSION["username"]);
		session_destroy();

		$data['title'] = "Login";

		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$password_md5 = md5($password);

		$users = $this->user_model->getUser();

		$pesan = 'username';
		$loginUser = null;

		foreach ($users as $user) {
			if ($user->username == $username) {
				$pesan = 'password';
				if ($user->password == $password_md5) {
					$pesan = $user->tipe;
					$loginUser = $user;
				}
			}
		}

		if ($pesan == 'admin') {
			if (session_status() == PHP_SESSION_NONE) {
			    session_start();
			}
			$_SESSION["username"] = $username;
			$_SESSION["user_id"] = $user->id;
			return redirect('admin/dashboard');
		}
		else {
			$data['title'] = "Login";
			$data['pesan'] = $pesan;
			$this->load->view('auth/login', $data);
		}
	}

	public function logout()
	{
		if (session_status() == PHP_SESSION_NONE) {
		    session_start();
		}
		unset($_SESSION["username"]);
		unset($_SESSION["user_id"]);
		session_destroy();

		return redirect('auth');
	}

	public function isLoggedIn() {
		if (session_status() == PHP_SESSION_NONE) {
		    session_start();
		}
		if (!isset($_SESSION['username'])) {
			return redirect('auth');
		}
	}
}
