<?php
namespace Model;

class StoryModel extends \W\Model\Model {

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
}