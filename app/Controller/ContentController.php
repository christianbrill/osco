<?php

namespace Controller;

use \W\Controller\Controller;
use \Model\ContentModel;


class ContentController extends Controller {

    protected $res;

    public function needhelp() {

        //trim and strip tags from form data
        if(!empty($_POST)) {

            $userContact = isset($_POST['userContact']) ? trim(strip_tags($_POST['userContact'])) : '';
            $userMessage = isset($_POST['userMessage']) ? trim(strip_tags($_POST['userMessage'])) : '';

            //validating form data
            $errorList = array();

            if (empty($userContact))  {
                $errorList[] = 'Please tell us how we can contact you.';
            }

            if (empty($userMessage))  {
                $errorList[] = 'Please tell us what you need help with.';
            }

            if (empty($errorList)) {
                $isSent=\Helper\Tools::sendEmail('osco.contact@gmail.com', 'Someone asked for help', 'Contact information: '.$userContact.':<br><br>Messagee: '.$userMessage);

                if ($isSent){
                    $this->flash('An organiztion from your country will contact you soon', 'success');
                    $this->redirectToRoute('content_needhelp');

                }

            } else {
                $this->flash(join('<br>', $errorList), 'danger');
            }

            if (!empty($errorList)) {
                $this->flash(join('<br>', $errorList), 'danger');

            }
        }
        
        $this->show('content/needhelp');
    }

    /**
    * about/contactform function
    *
    */

    public function contactform() {
        //trim and strip tags from form data
        if(!empty($_POST)) {
            $email = isset($_POST['contactEmail']) ? trim(strip_tags($_POST['contactEmail'])) : '';
            $fname = isset($_POST['contactFname']) ? trim(strip_tags($_POST['contactFname'])) : '';
            $lname = isset($_POST['contactLname']) ? trim(strip_tags($_POST['contactLname'])) : '';
            $message = isset($_POST['contactMessage']) ? trim(strip_tags($_POST['contactMessage'])) : '';

            //validating form data
            $errorList = array();

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

            //setting variables and urls for captcha
            $captcha = $_POST['g-recaptcha-response'];
            $googleURL = "https://www.google.com/recaptcha/api/siteverify";
            $secret = "6Le43B0UAAAAAFKWLgoG-SdxGTUqIU-N_SbbSGi1";
            $url = "". $googleURL ."?secret=".$secret."&response=".$captcha."";

            $this->res[] = file_get_contents($url);

            if (!empty($captcha) && json_decode($this->res[0])->success == "1") {

            // If CAPTCHA is successfully completed...
            if (empty($errorList)) {
                $isSent=\Helper\Tools::sendEmail('osco.contact@gmail.com', 'The user with email address: '. $email. ' & First name: '. $fname. ' & Last name: '. $lname.' has sent the following message:', $message, $message );


                if ($isSent){
                    $this->flash('We have received your email, and we will get back to you as soon as possible', 'success');
                }

            } else {
                $this->flash(join('<br>', $errorList), 'danger');
            }

        } else {
            $errorList[] = '<p>Please go back and make sure you check the security CAPTCHA box.</p><br>';
        }

        if (!empty($errorList)) {
            $this->flash(join('<br>', $errorList), 'danger');
        }

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

        foreach($refreshStories as $key => $value){
            $refreshStories[$key]['sto_content']=$this->getShortDescription($value['sto_content']);
        }

        foreach($refreshStories as $key => $value){
            $refreshStories[$key]['sto_title']=$this->getShortTitle($value['sto_title']);
        }

		$this->showJson($refreshStories);

	}



	/**
	* Get only the first 80 characters of the story's description
	*
	*/
	public function getShortDescription($content) {

        if (strlen($content) > 80) {
            return substr($content, 0, 80).'...';
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

        if (isset($_GET['page'])) {
            $page = intval($_GET['page']);
            $pageOffset = ($page-1)*$nbResultsPerPage;
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
        $nbStoriesPerPage = 10;
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
        //$stoDate = date("d/m/Y");
        $storyInfos = $storyModel->getOneStory($id);

        $tagsLine = $storyModel->getTagStringForStory($id);
        $getEachTag = explode(",", $tagsLine);

        $this->show('content/story', [
            'storyInfos' => $storyInfos,
            'getEachTag' => $getEachTag
            ]);
    }



	/**
	* Need Help Function
	*
	*/
	/*public function needhelp(){



		$this->show('content/needhelp');
	}*/



    /**
	* ajaxNeedHelp Function
	*
	*/
	public function ajaxNeedHelp(){

		$storiesModel = new \Model\ContentModel();
		$showOrganizations = $storiesModel->getOrganization();
		$this->showJson($showOrganizations);
	}

	/**
	* Add a Story method
	*
	*/
	public function addStoryPage () {
		//$this->allowTo("user");

		$this->show('content/addstory');
	}


	public function sendStoryToDB () {

		$this->allowTo("user");

		$currentUser = $_SESSION['user']['id'];

        if (!empty($_POST)) {

    		$stoTitle = isset($_POST['storyTitle']) ? trim(strip_tags($_POST['storyTitle']	)) : '';
    		$stoContent = isset($_POST['storyContent']) ? strip_tags($_POST['storyContent']	) : '';
    		$stoTags = isset($_POST['storyTags']) ? trim(strip_tags($_POST['storyTags']	)) : '';

            $stoContentFormat = nl2br(htmlentities($stoContent, ENT_QUOTES, 'UTF-8'));

            // Instantiation of story model
    		$addStoryModel = new \Model\ContentModel();
    		$addStory = $addStoryModel->insertStory($currentUser, $stoTitle, $stoContentFormat, $stoTags);

            $this->flash('Your story has been posted successfully. Thank you.', 'success');
            $this->redirectToRoute('content_addStoryPage');
        }


	}


    /*-----------------------------------------------------------------------------------*/

    /**
    * Add an article method
    *
    */

    public function addArticle () {
        //$this->allowTo("user");


    $artTitle = isset($_POST['articleTitle']) ? trim(strip_tags($_POST['articleTitle']  )) : '';

    $addArtModel = new \Model\ContentModel();
    $addArticle = $addArtModel->insertArticle($artTitle);

    $this->show('content/addarticle', ['addArticle' => $addArticle]);
}

    /**
    * All articles
    */

    public function articles(){

        $sortingOption = isset($_GET['order']) ? trim(strip_tags($_GET['order'])) : '';

        //PAGINATION START
        $page = 1;
        $nbArticlesPerPage = 10;
        $pageOffset = 0;

        if(isset($_GET['page'])){
            $page = intval($_GET['page']);
            $pageOffset = ($page-1)*$nbArticlesPerPage;
        }
        //PAGINATION END

        $articlesModel = new \Model\ContentModel();
        $articlesList = $articlesModel->getArticlesList($pageOffset, $nbArticlesPerPage, $sortingOption);
        $nbArticles = count($articlesList);

        $this->show('content/articles', [
            'articlesList' => $articlesList,
            'nbArticles' => $nbArticles,
            'page' => $page
            ]);
    }



    /**
    * article Detail
    *
    */

    public function article($id){

        $articleModel = new \Model\ContentModel();
        $articleInfos = $articleModel->getOneArticle($id);

        $this->show('content/article', [
            'articleInfos' => $articleInfos
            ]);
    }

    /**
    * Add a Story method
    *
    */
    /*public function addArticlePage () {
        //$this->allowTo("user");

        $this->show('content/addArticle', ['addArticle' => $addArticle]);

        if(!empty($_POST)){

            $artTitle = isset($_POST['articleTitle']) ? trim(strip_tags($_POST['articleTitle'])) : '';
            $artContent = isset($_POST['articleContent']) ? trim(strip_tags($_POST['articleContent'])) : '';
            $artTags = isset($_POST['articleTags']) ? trim(strip_tags($_POST['articleTags'])) : '';

            $artContentFormat = nl2br(htmlentities($artContent, ENT_QUOTES, 'UTF-8'));

            $addArticleModel = new \Model\ContentModel();
            $addArticle = $addArticleModel->insertArticle($artTitle, $artContentFormat, $artTags);
        }

    }*/

}
