<?php

namespace Controller;

use \W\Controller\Controller;
use \Model\ContentModel;



class ContentController extends Controller {

    /**about/contactform function

    */
    public function contactform(){
        unset($_SESSION['flash']);

        foreach ($_POST as $key => $value) {
        echo '<p><strong>' . $key.':</strong> '.$value.'</p>';
      }

        if(!empty($_POST)) {
            $email = isset($_POST['contactEmail']) ? trim(strip_tags($_POST['contactEmail'])) : '';

            $fname = isset($_POST['contactFname']) ? trim(strip_tags($_POST['contactFname'])) : '';

            $lname = isset($_POST['contactLname']) ? trim(strip_tags($_POST['contactLname'])) : '';

            $message = isset($_POST['contactMessage']) ? trim(strip_tags($_POST['contactMessage'])) : '';

          /*  $email=$_POST['contactEmail'];
            $fname=$_POST['contactFname'];
            $lname=$_POST['contactmessage'];
            $message=$_POST['contactMessage'];*/

            $errorList = array();
            // Je valide les données
            if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
                $errorList[] = 'Please enter a valid email address!';
            }
            if (strlen($fname) <= 1)  {
                $errorList[] = 'The first name must contain at least 2 characters!';
            }
            if (strlen($lname) <= 1)  {
                $errorList[] = 'The last name must contain at least 2 characters!';
            }
            if (strlen($message) <= 10)  {
                $errorList[] = 'Your message is too short, it must contain at least 10 characters!';
            }

            // Si tout est ok
            if (empty($errorList)) {
                $isSent=\Helper\Tools::sendEmail('osco.contact@gmail.com', 'The user with email address: '. $email. ' & First name: '. $fname. ' & Last name: '. $lname.' has sent the following message:', $message, $message );


                if ($isSent){
                    $this->flash('We have received your email, and we will get back to you as soon as possible', 'success');

                }

            }
            else {
                $this->flash(join('<br>', $errorList), 'danger');
            }
            /*if ($isSent){
                $this->redirectToRoute('content_contactform');
            }*/
        }


        $this->show('content/about');
      
    
    }







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

		debug($refreshStories);
		exit;
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
      $nbResultsPerPage = 4;
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
      'nbResults' => $nbResults,
      'page' => $page
      ]);
}


	/**
	* All Stories
	*
	*/
    public function stories(){

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

        // POUR BENJAMIN: LE PROBLÈME EST ICI
        $tagsLine = $storiesModel->getTagString();
        $getEachTag = explode(",", $tagsLine);
        //debug($getEachTag);

        $this->show('content/stories', [
            'storiesList' => $storiesList,
            'nbStories' => $nbStories,
            'page' => $page,
            'getEachTag' => $getEachTag
            ]);
    }


	/**
	* Story Detail
	*
	*/
    public function story($id){

        $storyModel = new \Model\ContentModel();
        $storyInfos = $storyModel->getOneStory($id);

        $this->show('content/story', [
                'storyInfos' => $storyInfos
            ]);
    }


	/**
	* Need Help Function
	*
	*/
	public function needhelp(){

		//$this->allowTo('user');

		$this->show('content/needhelp');
	}

}
