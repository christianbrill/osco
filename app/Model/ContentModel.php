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

	
	//END FUNCTIONS FOR stories && story details


	//START fUNCTIONS for articles & article details

	public function getArticlesList($pageOffset, $nbArticlesPerPage){
		$sql = '
		SELECT *
		FROM articles
		ORDER BY art_inserted DESC
		LIMIT '.$pageOffset.','.$nbArticlesPerPage.'

		';

		$sth = $this->dbh->prepare($sql);
		$sth->execute();
		return $sth->fetchAll();
	}


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
			return $sth->errorInfo();
		}else{
			return debug($artTitle);

		}


	}
}
