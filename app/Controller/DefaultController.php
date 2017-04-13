<?php

namespace Controller;

use \W\Controller\Controller;
use \Model\StoryModel;

class DefaultController extends Controller {

////////////HOME
	public function home() {

		$storyModel = new \Model\StoryModel();
		$generateStories = $storyModel->getLimitedStories();
		shuffle($generateStories);

		$this->show('default/home', ['randomStories' => $generateStories]);
	}


	public function getShortDescription($content) {

        if (strlen($content) > 50) {
            return substr($content, 0, 50).'...';
        }
        return $content;
    }
}