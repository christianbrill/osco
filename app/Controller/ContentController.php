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

//Get only the first 80 characters of the story's description
	public function getShortDescription($content) {

        if (strlen($content) > 80) {
            return substr($content, 0, 80).'...';
        }
        return $content;
    }

//Get only the first 30 characters of the story's description
    public function getShortTitle($title) {

        if (strlen($title) > 30) {
            return substr($title, 0, 30).'...';
        }
        return $title;
    }
}