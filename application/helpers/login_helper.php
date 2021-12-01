<?php
if ( !function_exists('login') )
{
    function login($user_model, $session, $agent)
    {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $result = $user_model->get_user_by_username_and_password($username, $password);

        if(count($result) > 0)
        {
            $session->set_userdata('user_id', $result['id']);
            $session->set_userdata('username', $result['username']);
            if ($result['type'] === 'admin')
                return '/admin/dashboard';
            else
                return $agent->referrer();
        } else {
            $session->set_flashdata('error', 'Username or Password incorrect');
            return $agent->referrer();
        }
    }
}
