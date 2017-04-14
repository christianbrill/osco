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
	public function getSearchMatch($searchWord){
		$sql = '
			SELECT *
			FROM stories
			INNER JOIN users ON stories.users_usr_id = users.usr_id
			WHERE sto_title LIKE :search
				OR sto_content LIKE :search
				OR sto_tags LIKE :search
				OR usr_username LIKE :search
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
}