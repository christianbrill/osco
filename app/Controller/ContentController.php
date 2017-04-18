<?php

namespace Controller;

use \W\Controller\Controller;
use \Model\ContentModel;

class ContentController extends Controller {

	/**
	* Home Function
	*
	*/
	public function home() {

		$storyModel = new \Model\ContentModel();
		$generateStories = $storyModel->getLimitedStories();
		shuffle($generateStories);

		$this->show('content/home', ['randomStories' => $generateStories]);
	}

	/**
	* ajaxRefresh
	*
	*/
	public function ajaxRefresh() {

		$storyModel = new \Model\ContentModel();
		$refreshStories = $storyModel->getLimitedStories();

		$this->showJson($refreshStories);
	}

	/**
	* Get only the first 80 characters of the story's description
	*
	*/
	public function getShortDescription($content) {

        if (strlen($content) > 120) {
            return substr($content, 0, 120).'...';
        }
        return $content;
    }

	/**
	* Get only the first 30 characters of the story's title
	*
	*/
    public function getShortTitle($title) {

        if (strlen($title) > 50) {
            return substr($title, 0, 50).'...';
        }
        return $title;

    }



	/**
	* Search Function
	*
	*/
    public function search() {
		// Getting the information that was put in the <input> called 'searchInput' in layout.php
		$searchInput = isset($_GET['searchInput']) ? trim(strip_tags($_GET['searchInput'])) : '';

        // Getting the order information ASC or DESC(Default)
        $sortingOption = isset($_GET['order']) ? trim(strip_tags($_GET['order'])) : '';

        // !!!!!!! NOT WORKING YET
        //PAGINATION START
        $page = 1;
        $nbResultsPerPage = 2;
        $pageOffset = 0;

        if(isset($_GET['page'])){
            $page = intval($_GET['page']);
            $pageOffset = ($page-1)*$nbStoriesPerPage;
        }
        //PAGINATION END

        // Creating a new Model in ContentModel
    	$searchModel = new \Model\ContentModel();

        // Gets all the search' results with two parameters the word input and the option chosen to sort (which is by default DESC)
    	$searchResults = $searchModel->getSearchMatch($searchInput, $sortingOption, $pageOffset, $nbResultsPerPage);

        //Gets the number of results with a count function
    	$nbResults = count($searchResults);

        // Deciding on the variables who are called in the view
    	$this->show('content/search', [
    		'searchInput' => $searchInput,
    		'searchResults' => $searchResults,
    		'nbResults' => $nbResults
    	]);
    }


    public function stories(){
        $currentId = isset($_GET['id']) ? trim(strip_tags($_GET['id'])) : '';

        // !!!!!!! NOT WORKING YET
        //PAGINATION START
        $page = 1;
        $nbStoriesPerPage = 4;
        $pageOffset = 0;

        if(isset($_GET['page'])){
            $page = intval($_GET['page']);
            $pageOffset = ($page-1)*$nbStoriesPerPage;
        }
        //PAGINATION END


        $storiesModel = new \Model\ContentModel();
        $storiesList = $storiesModel->getStoriesList($pageOffset, $nbStoriesPerPage);
        $nbStories = count($storiesList);
        $storyInfos = $storiesList->getOneStory($currentId);


        //$tagsLine = getAllStories('sto_tags');
        //$getEachTag = explode(", ", $tags);


        $this->show('content/stories', [
            'storiesList' => $storiesList,
            'storyInfos' => $storyInfos,
            'nbStories' => $nbStories
        ]);
    }

    public function storydetails(){
        $this->show('content/storydetails');
    }

	/**
	* Need Help Function
	*
	*/
	public function needhelp(){

		$this->show('content/needhelp');
	}

}
