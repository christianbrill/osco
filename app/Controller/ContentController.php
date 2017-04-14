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

//Get only the first 30 characters of the story's title
    public function getShortTitle($title) {

        if (strlen($title) > 30) {
            return substr($title, 0, 30).'...';
        }
        return $title;
}

    public function search(){
		// Getting the information that was put in the <input> called 'searchInput' in layout.php
		$searchInput = isset($_GET['searchInput']) ? trim(strip_tags($_GET['searchInput'])) : '';
		
    	$searchModel = new \Model\ContentModel();
    	$searchResults = $searchModel->getSearchMatch($searchInput);
    	$nbResults = count($searchResults);

    	$this->show('content/search', [
    		'searchInput' => $searchInput,
    		'searchResults' => $searchResults,
    		'nbResults' => $nbResults
    	]);

    }
}