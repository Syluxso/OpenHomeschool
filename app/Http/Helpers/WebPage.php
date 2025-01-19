<?php

namespace App\Http\Helpers;

class WebPage {
    public $view = 'test';
    public $title = '';
    public $page_title = '';
    public $body_classes = [];
    public $variables = [];

    function __construct() {
        $this->set_defaults();
    }

    public function view($name) {
        $this->view = $name;
    }

    private function set_defaults() {
        $this->page_title('Page');
        $this->add_classes('page');
        $this->add_variable();
    }

    public function title($value) {
        $this->title = $value;
    }

    public function page_title($value) {
        $this->page_title = $value;
    }


    public function add_classes(...$list) {
        $array = $this->body_classes;
        foreach($list as $item) {
            $array[] = $item;
        }
        $this->body_classes = $array;
    }

    public function add_variable($key = false, $value = false) {
        if(!empty($key) && !empty($value)) {
            $array = (array) $this->variables;
            $array[$key] = $value;
            $this->variables = $array;
        }

    }

    private function set_the_titles() {
        if(empty($this->title)) {
            $this->title = $this->page_title;
        }
    }

    public function output() {
        $variables = $this->variables;
        $this->set_the_titles();
        $variables['title'] = $this->title;
        $variables['page_title'] = $this->page_title;
        $variables['body_classes'] = implode(' ', $this->body_classes);
        return view($this->view, $variables);
    }
}
