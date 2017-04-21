<?php

namespace Model;

class ContentModel extends \W\Model\Model {

	public function __construct(){
		parent::__construct();
	}

	public function getLimitedStories(){
		$sql = '
			SELECT *
			FROM stories
			ORDER BY RAND()
			LIMIT 9
		';

		$sth = $this->dbh->prepare($sql);
		$sth->execute();
		return $sth->fetchAll();
	}
	
	// VIEW: search
	// START FUNCTIONS FOR search
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

	//END FUNCTIONS FOR searchResults

	//VIEW: stories && storydetails
	// START FUNCTIONS FOR all stories viewing and filtering
	public function getStoriesList($pageOffset, $nbStoriesPerPage){
		$sql = '
			SELECT sto_id, sto_title, sto_content, sto_tags, sto_thumbnail, sto_inserted, users_id, usr_username
			FROM stories
			LEFT OUTER JOIN users ON stories.users_id = users.id
			ORDER BY sto_id DESC
			LIMIT '.$pageOffset.','.$nbStoriesPerPage.'
		';

		$sth = $this->dbh->prepare($sql);
		$sth->execute();
		return $sth->fetchAll();
	}

	public function getOneStory($id){
		$sql = '
			SELECT sto_title, sto_content, sto_tags, sto_thumbnail, sto_inserted, users_id, usr_username
			FROM stories
			LEFT OUTER JOIN users ON stories.users_id = users.id
			WHERE sto_id = :id
		';

		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(':id', $id, \PDO::PARAM_INT);

		if ($sth->execute()){
			return $sth->fetchAll();
		}
	}

	public function getTagString(){
		$sql = '
			SELECT sto_tags
			FROM stories
			ORDER BY RAND()
		';

		$sth = $this->dbh->prepare($sql);
		if ($sth->execute()){
			$getAllTagResults = $sth->fetchAll();

			$str = '';
			foreach($getAllTagResults as $tagLine) {
				$str .= $tagLine['sto_tags'].',';

			}

			return substr($str, 0, -1);
		}
	}

	public function getTagStringForStory($id){
		$sql = '
			SELECT sto_tags
			FROM stories
			WHERE sto_id = :id
		';

		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(':id', $id, \PDO::PARAM_INT);
		
		if ($sth->execute()){
			$getAllTagResults = $sth->fetchAll();

			$str = '';
			foreach($getAllTagResults as $tagLine) {
				$str .= $tagLine['sto_tags'].',';
			}

			return substr($str, 0, -1);
		}
	}

	public function getOrganization(){
		$sql = '
			SELECT *
			FROM organizations
		';

		$sth = $this->dbh->prepare($sql);
		if ($sth->execute()){
			return $sth->fetchAll();
		}
	}

	public function insertStory ($currentUser, $stoTitle, $stoContent, $stoTags){
			
			//INNER JOIN users_id ON users.id
    		// :stoContent, :stoTag , sto_content, sto_tags
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
		}else{
			return debug($stoTitle);
		}	
	}

	//END FUNCTIONS FOR stories && story details
}