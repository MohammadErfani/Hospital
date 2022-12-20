<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Request;
use app\models\Doctor;
use app\models\DoctorModel;
use app\models\Manager;
use app\models\ManagerModel;

class ProfileController extends Controller
{

    public function profile(Request $request)
    {
        $model = new Doctor();
        if($request->isPost()){
            $model->loadData($request->getBody());
            if($model->validate() && $model->save()) {
                header("location:/");
                return;
            }

        }

        $this->setLayout('prof');
        return $this->render('docprof',[
            'model'=>$model
        ]);
    }

    public function manager(Request $request)
    {
        $model = new Manager();
        if($request->isPost()){
            $model->loadData($request->getBody());
        }
        $this->setLayout('prof');
        return $this->render('managerprof',[
            'model'=>$model
        ]);

    }
}