<?php
/**
 * User: TheCodeholic
 * Date: 7/8/2020
 * Time: 8:43 AM
 */

namespace app\controllers;


use app\core\Application;
use app\core\Controller;
use app\models\RegisterModel;
//use thecodeholic\phpmvc\middlewares\AuthMiddleware;
use app\core\Request;
use app\core\Response;
use app\models\LoginForm;
use app\models\User;

/**
 * Class SiteController
 *
 * @author  Zura Sekhniashvili <zurasekhniashvili@gmail.com>
 * @package app\controllers
 */
class SiteController extends Controller
{
    public function home()
    {
        return $this->render('home');
    }

    public function about()
    {
        return $this->render('about');
    }

    public function department(Request $request)
    {
        $body = $request->getBody();
        return $this->render('department',['department'=>$body['id']]);
    }

    public function doctor(Request $request)
    {
        $body = $request->getBody();
        $this->setLayout('prof');
        return $this->render('doctor',['id'=>$body['id']]);
    }

    public function search(Request $request)
    {
        $body = $request->getBody();
        $this->setLayout('search');
        return $this->render('search',
        ['input'=>$body['input']]
        );
    }
}
