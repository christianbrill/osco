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
			LIMIT 3
		';

		$sth = $this->dbh->prepare($sql);
		$sth->execute();
		return $sth->fetchAll();
	}
	
	// VIEW: search
	// START FUNCTIONS FOR search
	public function getSearchMatch($searchWord, $sortingMethod='DESC', $pageOffset){
		$sql = '
			SELECT *
			FROM stories
			INNER JOIN users ON stories.users_usr_id = users.usr_id
			WHERE sto_title LIKE :search
				OR sto_content LIKE :search
				OR sto_tags LIKE :search
				OR usr_username LIKE :search

			ORDER BY sto_inserted '.$sortingMethod.'
			LIMIT 5 OFFSET '.$pageOffset
		;

		
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
	public function getAllStories(){
		$sql = '
			SELECT sto_title, sto_content, sto_tags, sto_thumbnail, sto_inserted
			FROM stories
		';

		$sth = $this->dbh->prepare($sql);
		$sth->execute();
		return $sth->fetchAll();
	}

	public function getOneStory(){
		$sql = '
			SELECT sto_title, sto_content, sto_tags, sto_thumbnail, sto_inserted
			FROM stories
			WHERE sto_id = :id
		';
	}

	

	//END FUNCTIONS FOR stories && story details
}