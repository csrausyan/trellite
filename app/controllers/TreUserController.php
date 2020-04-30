<?php
declare(strict_types=1);

 

use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model;


class TreUserController extends ControllerBase
{
    /**
     * Index action
     */
    public function indexAction()
    {
        $sessions = $this->getDI()->getShared("session");
        if(!$sessions){
            return $this->response->redirect("/");
        }

        $numberPage = $this->request->getQuery('page', 'int', 1);
        $parameters = Criteria::fromInput($this->di, 'TreUser', $_GET)->getParams();
        // $parameters['order'] = "tre_id";

        $trying = $this->session->get('AUTH_ID');

        $paginator   = new Model(
            [
                'model'      => 'TreNote',
                'parameters' => $parameters,
                'limit'      => 10,
                'page'       => $numberPage,
                'tre_id'     => $this->session->get('AUTH_ID'),
            ]
        );

        $paginate = $paginator->paginate();

        if (0 === $paginate->getTotalItems()) {
            $this->flash->notice("The search did not find any tre_note");

            $this->dispatcher->forward([
                "controller" => "tre_note",
                "action" => "index"
            ]);

            return;
        }

        $this->view->page = $paginate;
    }

    /**
     * Searches for tre_user
     */
    public function searchAction()
    {
        $numberPage = $this->request->getQuery('page', 'int', 1);
        $parameters = Criteria::fromInput($this->di, 'TreUser', $_GET)->getParams();
        // $parameters['order'] = "tre_id";

        $trying = $this->session->get('AUTH_ID');

        $paginator   = new Model(
            [
                'model'      => 'TreNote',
                'parameters' => $parameters,
                'limit'      => 10,
                'page'       => $numberPage,
                'tre_id'     => $this->session->get('AUTH_ID'),
            ]
        );

        $paginate = $paginator->paginate();

        if (0 === $paginate->getTotalItems()) {
            $this->flash->notice("The search did not find any tre_note");

            $this->dispatcher->forward([
                "controller" => "tre_note",
                "action" => "index"
            ]);

            return;
        }

        $this->view->page = $paginate;
    }

    /**
     * Displays the creation form
     */
    public function newAction()
    {
        //
    }

    /**
     * Edits a tre_user
     *
     * @param string $tre_id
     */
    public function editAction($note_id)
    {
        if (!$this->request->isPost()) {
            $tre_note = TreNote::findFirstBynote_id($note_id);
            if (!$tre_note) {
                $this->flash->error("tre_note was not found");

                $this->dispatcher->forward([
                    'controller' => "tre_user",
                    'action' => 'index'
                ]);

                return;
            }

            $this->view->tre_note = $tre_note->note_id;

            // $this->tag->setDefault("tre_id", $tre_user->tre_id);
            $this->tag->setDefault("note_id", $tre_note->note_id);
            $this->tag->setDefault("note_description", $tre_note->note_description);
            // $this->tag->setDefault("tre_email", $tre_user->tre_email);
            // $this->tag->setDefault("tre_password", $tre_user->tre_password);
            // $this->tag->setDefault("tre_timestamp", $tre_user->tre_timestamp);
            
        }
    }

    /**
     * Creates a new tre_user
     */
    public function createAction()
    {
        if (!$this->request->isPost()) {
            // $this->dispatcher->forward([
            //     'controller' => "tre_user",
            //     'action' => 'index'
            // ]);
            return $this->response->redirect("/tre_user/index");
            // return;
        }

        $tre_note = new TreNote();

        // $tre_note->assign(
        //     $this->request->getPost(),
        //     [
        //         'tre_id' => $this->session->get("AUTH_ID"), // ini ceritanya SESSION ID nya user sekarang x
        //         'note_description',
        //     ]
        // );
        $zawarudo = time();
        $note_tre_id = $this->session->get("AUTH_ID");
        $note_description = $this->request->getPost("note_description");

        $tre_note->assign(
            [
                'tre_id' => $note_tre_id,
                'note_description' => $note_description,
                'note_createdAt' => strval(date("Y-m-d H:i:s",$zawarudo)),
            ]
        );

        // $tre_user->treId = $this->request->getPost("tre_id", "int");
        // $tre_user->treUsername = $this->request->getPost("tre_username", "int");
        // $tre_user->treEmail = $this->request->getPost("tre_email", "int");
        // $tre_user->trePassword = $this->request->getPost("tre_password", "int");
        // $tre_user->treTimestamp = $this->request->getPost("tre_timestamp", "int");
        
        $tre_note->save();

        if (!$tre_note->save()) {
            foreach ($tre_note->getMessages() as $message) {
                $stringmes = strval($message);
                // $this->flash->error($stringmes);
                
                // $this->flashSession->error("pesan-pesan-pesan");    
                $this->flashSession->error($stringmes);    

            }
            
            // $this->dispatcher->forward([
            //     'controller' => "tre_user",
            //     'action' => 'new'
            // ]);

            return $this->response->redirect("/tre_user/index");

            // return;
        }

        $this->flashSession->success("tre_note was created successfully");

        // $this->dispatcher->forward([
        //     'controller' => "tre_user",
        //     'action' => 'index'
        // ]);

        return $this->response->redirect("/tre_user/index");
    }

    /**
     * Saves a tre_user edited
     *
     */
    public function saveAction($note_id)
    {

        $tre_note = TreNote::findFirstBynote_id($note_id);
        
        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                'controller' => "tre_user",
                'action' => 'index'
            ]);

            return;
        }

        // $tre_id = $this->request->getPost("tre_id");
        // $note_description = $this->request->getPost("note_description");
        // $note_id = $tre_note->note_id;
        // $tre_user = TreUser::findFirstBytre_id($tre_id);

        // if (!$tre_user) {
        //     $this->flash->error("tre_user does not exist " . $tre_id);

        //     $this->dispatcher->forward([
        //         'controller' => "tre_user",
        //         'action' => 'index'
        //     ]);

        //     return;
        // }

        // $tre_user->treId = $this->request->getPost("tre_id", "int");
        // $tre_user->treUsername = $this->request->getPost("tre_username", "int");
        // $tre_user->treEmail = $this->request->getPost("tre_email", "int");
        // $tre_user->trePassword = $this->request->getPost("tre_password", "int");
        // $tre_user->treTimestamp = $this->request->getPost("tre_timestamp", "int");
        // $tre_note->noteDescription = $this->request->getPost("note_description", "text");
        // $tre_note->assign(
        //     [
        //         // 'tre_id' => $note_tre_id,
        //         'note_description' => $this->request->getPost("note_description", "text"),
        //     ]
        // );

        $note_description = $this->request->getPost("note_description");

        $tre_note->assign(
            [
                // 'tre_id' => $note_tre_id,
                'note_description' => $note_description,
            ]
        );


        if (!$tre_note->save()) {

            foreach ($tre_note->getMessages() as $message) {
                // $this->flash->error($message);
                $stringmes = strval($message);
                // $this->flash->error($stringmes);
                
                // $this->flashSession->error("pesan-pesan-pesan");    
                $this->flashSession->error($stringmes);    
                
            }

            $this->dispatcher->forward([
                'controller' => "tre_user",
                'action' => 'edit',
                'params' => [$tre_user->tre_id]
            ]);

            return;
        }

        $this->flash->success("tre_note was updated successfully");

        $this->dispatcher->forward([
            'controller' => "tre_user",
            'action' => 'index'
        ]);
    }

    /**
     * Deletes a tre_user
     *
     * @param string $tre_id
     */
    public function deleteAction($note_id)
    {
        $tre_note = TreNote::findFirstBynote_id($note_id);
        if (!$tre_note) {
            $this->flash->error("note_user was not found");

            $this->dispatcher->forward([
                'controller' => "tre_user",
                'action' => 'index'
            ]);

            return;
        }

        if (!$tre_note->delete()) {

            foreach ($tre_note->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "tre_user",
                'action' => 'search'
            ]);

            return;
        }

        $this->flash->success("tre_user was deleted successfully");

        $this->dispatcher->forward([
            'controller' => "tre_user",
            'action' => "index"
        ]);
    }

    public function logoutAction(){

        $this->session->destroy();
        return $this->response->redirect('/');
    }


}
