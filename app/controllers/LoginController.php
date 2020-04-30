<?php
declare(strict_types=1);

use Phalcon\Escaper;
use Phalcon\Flash\Direct;

$escaper = new Escaper();
$flash = new Direct($escaper);

use Phalcon\Mvc\Controller;

class LoginController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
        $sessions = $this->getDI()->getShared("session");
        if($sessions->has('AUTH_ID')){
            return $this->response->redirect("tre_user/index");
        }
        // else{
        //     return "noooooooooooo";
        // }
    }

    // public function loginAction()
    // {
    //     // return "aaaa";
    // }

    public function loginAction()
    {
        if($this->request->isPost()){

            $email = $this->request->getPost("tre_email");
            $password = $this->request->getPost("tre_password");
            
            if($email === ""){
                // $this->flashSession->error("email tidak isi");
                // return $this->view->pick("qwerts");
                $this->flash->error('Something went wrong');
                // $this->flashSession->error("email atau password salahh");
            }
            if($password === ""){
                // $this->flashSession->error("password tidak isi");
                // return $this->view->pick("index/index");
                $this->flash->error('Something went wrong');
            }
        }

        $user = TreUser::findFirst([
            'tre_email = :tre_email:',
            'bind' => ['tre_email' => $email,]
        ]);

        // $success = $user->save();

        // // passing the result to the view
        // $this->view->success = $success;

        // if ($success) {
        //     $message = "Thanks for registering!";
        // } else {
        //     $message = "Sorry, the following problems were generated:<br>"
        //              . implode('<br>', $user->getMessages());
        // }

        if($user){
            if($password === $user->tre_password){

                $this->session->set('AUTH_ID', $user->tre_id);
                $this->session->set('AUTH_USERNAME', $user->tre_username);
                $this->session->set('AUTH_EMAIL', $user->tre_email);

                return $this->response->redirect('tre_user/index');
            }
            else{
                $this->flashSession->error("password salahh");
                return $this->response->redirect('/login');
            }
            // $this->flashSession->error("email atau password salahh");
            // return $this->response->redirect('/login');
        }
        else{
            $this->flashSession->error("email salahh atau tidak terdaftar");
            return $this->response->redirect('/login');
        }
    }

}

