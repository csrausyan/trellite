<?php
declare(strict_types=1);

class Trellite2Controller extends ControllerBase
{
    public function indexAction()
    {
        // return "help";
        $this->view->pick('index/index');
        // return "LONTE SEGAR ASAL BUGIS";
    }
}

// class IndexController extends ControllerBase
// {
//     public function indexAction()
//     {
//         // return "help";
//         $this->view->pick('index/index');
//     }
// }