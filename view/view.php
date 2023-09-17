<?php
class View {
    public function render($page) {
        include 'view/page/' . $page . '.php';
    }
}
?>
