<?php
namespace app\core;

class Application
{
    public static string $ROOT_DIR;
    public Router $router;
    public Request $request;
    public Response $response;
    public static Application $app;
    public Controller $controller;
    public Database $db;
    public Session $session;
    public ?DbModel $user;
    public string $userClass;

    public function __construct($rootPath,array $config)
    {
        
        self::$ROOT_DIR = $rootPath;
        self::$app = $this;
        $this->db = new Database($config['db']);
        $this->response = new Response();
        $this->request = new Request();
        $this->controller = new Controller();
        $this->router = new Router($this->request,$this->response);
        $this->session = new Session();


        $this->user = null;
        $this->userClass = $config['userClass'];
        $userId = Application::$app->session->get('user');
        if ($userId) {
            $key = 'id';
            $this->user = $this->userClass::findOne([$key => $userId]);
        }
    }

    public function run()
    {
        echo $this->router->resolve();
    }
    /**
     * @return Controller
     */
    public function getController(): Controller
    {
        return $this->controller;
    }

    /**
     * @param Controller $controller
     */
    public function setController(Controller $controller): void
    {
        $this->controller = $controller;
    }
    public static function isGuest()
    {
        return !self::$app->user;
    }

    public function login(UserModel $user)
    {
        $this->user = $user;
        $className = get_class($user);
        $primaryKey = 'id';
        $value = $user->{$primaryKey};
        Application::$app->session->set('user', $value);

        return true;
    }

    public function logout()
    {
        $this->user = null;
        self::$app->session->remove('user');
    }
}