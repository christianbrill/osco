<?php

namespace Model;

class ContentModel extends \W\Model\Model {

	public function __construct(){
		parent::__construct();
	}


	/**
	* Function to retrieve a limit of 12 stories on the homepage
	*
	*/
	public function getLimitedStories(){
		$sql = '
		SELECT *
		FROM stories
		ORDER BY RAND()
		LIMIT 12
		';

		$sth = $this->dbh->prepare($sql);

		if ($sth->execute() === false) {
			print_r($sth->errorInfo());
		} else {
			return $sth->fetchAll();
		}
	}


	/**
	* This function allows the user to search for articles on the page based on
	* - title
	* - tags
	* - username
	*
	*/
	public function getSearchMatch($searchWord, $sortingMethod='DESC', $pageOffset, $nbResultsPerPage){
		$sql = '
		SELECT *
		FROM stories
		INNER JOIN users ON stories.users_id = users.id
		WHERE sto_title LIKE :search
		OR sto_content LIKE :search
		OR sto_tags LIKE :search
		OR usr_username LIKE :search

		ORDER BY sto_inserted '.$sortingMethod.'
		LIMIT '.$pageOffset.','.$nbResultsPerPage.'
		';


		$sth = $this->dbh->prepare($sql);
		if($searchWord != ''){
			$sth->bindValue(':search', '%'.$searchWord.'%');
		}
		if ($sth->execute() === false) {
			print_r($sth->errorInfo());
		}
		else {
			$searchResults = $sth->fetchAll(\PDO::FETCH_ASSOC);
			$nbResults = $sth->rowCount();

			return $searchResults;
		}
	}


	/**
	* This function gets a list of stories that can be filtered
	*
	*/
	public function getStoriesList($pageOffset, $nbStoriesPerPage){
		$sql = '
		SELECT sto_id, sto_title, sto_content, sto_tags, sto_thumbnail, sto_inserted, users_id, usr_username
		FROM stories
		LEFT OUTER JOIN users ON stories.users_id = users.id
		ORDER BY RAND()
		LIMIT '.$pageOffset.','.$nbStoriesPerPage.'
		';

		$sth = $this->dbh->prepare($sql);

		if ($sth->execute() === false) {
			print_r($sth->errorInfo());
		} else {
			return $sth->fetchAll();
		}
	}


	/**
	* Function to retrieve on single story
	*
	*/
	public function getOneStory($id){
		$sql = '
		SELECT sto_title, sto_content, sto_tags, sto_thumbnail, sto_inserted, users_id, usr_username
		FROM stories
		LEFT OUTER JOIN users ON stories.users_id = users.id
		WHERE sto_id = :id
		';

		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(':id', $id, \PDO::PARAM_INT);


		if ($sth->execute() === false) {
			print_r($sth->errorInfo());
		} else {
			return $sth->fetchAll();
		}
	}


	/**
	* Function to get the stories' tags
	*
	*/
	public function getTagString(){
		$sql = '
		SELECT sto_tags
		FROM stories
		ORDER BY RAND()
		LIMIT 5
		';

		$sth = $this->dbh->prepare($sql);

		if ($sth->execute() === false) {
			print_r($sth->errorInfo());
		} else {
			$getAllTagResults = $sth->fetchAll();

			$str = '';
			foreach($getAllTagResults as $tagLine) {
				$str .= $tagLine['sto_tags'].',';

			}
			return substr($str, 0, -1);
		}
	}


	/**
	* Function to retrieve tag string for stories
	*
	*/
	public function getTagStringForStory($id){
		$sql = '
		SELECT sto_tags
		FROM stories
		WHERE sto_id = :id
		';

		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(':id', $id, \PDO::PARAM_INT);

		if ($sth->execute() === false) {
			print_r($sth->errorInfo());
		} else {
			$getAllTagResults = $sth->fetchAll();

			$str = '';
			foreach($getAllTagResults as $tagLine) {
				$str .= $tagLine['sto_tags'].',';
			}

			return substr($str, 0, -1);
		}
	}


	/**
	*
	*
	*/
	public function getOrganization(){
		$sql = '
		SELECT *
		FROM organizations
		';

		$sth = $this->dbh->prepare($sql);

		if ($sth->execute() === false) {
			print_r($sth->errorInfo());
		} else {
			return $sth->fetchAll();
		}
	}


	/**
	* Function to retrieve a limit of 12 stories on the homepage
	*
	*/
	public function insertStory ($currentUser, $stoTitle, $stoContent, $stoTags){

		$sql = '
		INSERT INTO stories (users_id, sto_title, sto_content, sto_tags)
		VALUES  (:currentUser, :stoTitle, :stoContent, :stoTags)
		';

		$sth = $this->dbh->prepare($sql);
		$sth->bindParam(':currentUser', $currentUser);

		$sth->bindParam(':stoTitle', $stoTitle);
		$sth->bindParam(':stoContent', $stoContent);
		$sth->bindParam(':stoTags', $stoTags);

		if ($sth->execute() === false){
			return $sth->errorInfo();
		}
	}



	/**
	* Function to retrieve list of blog articles
	*
	*/
	public function getArticlesList($pageOffset, $nbArticlesPerPage, $sortingMethod='DESC'){
		$sql = '
		SELECT *
		FROM articles
		ORDER BY art_inserted '.$sortingMethod.'
		LIMIT '.$pageOffset.','.$nbArticlesPerPage.'

		';

		$sth = $this->dbh->prepare($sql);

		if ($sth->execute() === false) {
			print_r($sth->errorInfo());
		} else {
			return $sth->fetchAll();
		}
	}


	/**
	* Function to retrieve one single blog article
	*
	*/
	public function getOneArticle($id){
		$sql = '
		SELECT art_title, art_content, art_tags, art_thumbnail, art_inserted
		FROM articles
		WHERE art_id = :id
		';

		$sth = $this->dbh->prepare($sql);
		$sth->bindParam(':id', $id, \PDO::PARAM_INT);

		if ($sth->execute()){
			return $sth->fetchAll();
		}
	}


	/**
	* Function to add an article to database
	*
	*/
	public function InsertArticle ($artTitle, $artContent, $artTags){
		$sql = '
		INSERT INTO articles (art_title, art_content, art_tags)
		VALUES  (:artTitle, :artContent, :artTags)
		';

		$sth = $this->dbh->prepare($sql);
		$sth->bindParam(':artTitle', $artTitle);
		$sth->bindParam(':artContent', $artContent);
		$sth->bindParam(':artTags', $artTags);

		if ($sth->execute() === false){
			print_r($sth->errorInfo());
		} else{
			return debug($artTitle);
		}


	}
}
