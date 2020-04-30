<?php
declare(strict_types=1);

use Phalcon\Mvc\Controller;

class SignUpController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
        
        
    }

    public function registerAction()
    {
        $user = new TreUser();

        // $username = $this->request->getPost('tre_username');
        // $email = $this->request->getPost('tre_email');
        // $password = $this->request->getPost('tre_password');

        //assign value from the form to $user
        $user->assign(
            $this->request->getPost(),
            [
                'tre_username',
                'tre_email',
                'tre_password'
            ]
        );

        // Store and check for errors
        $success = $user->save();

        // passing the result to the view
        $this->view->success = $success;

        if ($success) {
            $message = "Thanks for registering!";
        } else {
            $message = "Sorry, the following problems were generated:<br>"
                     . implode('<br>', $user->getMessages());
        }

        // passing a message to the view
        $this->view->message = $message;
    }
}

