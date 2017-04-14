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