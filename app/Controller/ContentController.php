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

	public function ajaxRefresh(){
		$storyModel = new \Model\ContentModel();
		$refreshStories = $storyModel->getLimitedStories();

		$this->showJson($refreshStories);
	}

//Get only the first 80 characters of the story's description
	public function getShortDescription($content) {

        if (strlen($content) > 120) {
            return substr($content, 0, 120).'...';
        }
        return $content;
    }

//Get only the first 30 characters of the story's title
    public function getShortTitle($title) {

        if (strlen($title) > 50) {
            return substr($title, 0, 50).'...';
        }
        return $title;
}

    public function search(){
		// Getting the information that was put in the <input> called 'searchInput' in layout.php
		$searchInput = isset($_GET['searchInput']) ? trim(strip_tags($_GET['searchInput'])) : '';

        $sortingOption = isset($_GET['order']) ? trim(strip_tags($_GET['order'])) : '';
		
    	$searchModel = new \Model\ContentModel();
    	$searchResults = $searchModel->getSearchMatch($searchInput, $sortingOption);
    	$nbResults = count($searchResults);

    	$this->show('content/search', [
    		'searchInput' => $searchInput,
    		'searchResults' => $searchResults,
    		'nbResults' => $nbResults
    	]);

    }
}