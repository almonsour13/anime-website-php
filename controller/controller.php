<?php 
class Controller {
    private $view;

    public function __construct($view) {
        $this->view = $view;
    }

    public function handleRequest() {
        $page = 'home';
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        }
        return $this->view->render($page); // You might want to pass some data to the render method
    }
}
?>
