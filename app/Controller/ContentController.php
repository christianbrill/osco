<?php

namespace Controller;

use \W\Controller\Controller;
use \Model\ContentModel;

class ContentController extends Controller {

////////////HOME
	public function home() {

		$storyModel = new \Model\ContentModel();
		$generateStories = $storyModel->getLimitedStories();
		shuffle($generateStories);

		$this->show('content/home', ['randomStories' => $generateStories]);
	}


	public function getShortDescription($content) {

        if (strlen($content) > 50) {
            return substr($content, 0, 50).'...';
        }
        return $content;
    }
}