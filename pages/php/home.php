<?
$Page = new Page(array(
	'title'=>'Zao Soula - Développeur Web',
));

$resume = [];

try {
		////////////////////
	 /// Educations /////
	////////////////////
	$sql = "SELECT * FROM educations ORDER BY `order` ASC";
	$pdo = Connexion::getInstance ();
	$sth = $pdo->query ( $sql );
	$res = $sth->fetchAll (PDO::FETCH_ASSOC);

	$resume['experiences']['educations'] =[];

	foreach ( $res as $row ) {
		$resume['experiences']['educations'][] = array(
		"school"=>$row['school'],
		"start"=>$row['start'],
		"end"=>$row['end'],
		"location"=>$row['location'],
		"title"=>$row['title'],
		"descrip"=>$row['descrip'],
		);
	}

	////////////////////
 /// Careers ////////
////////////////////
$sql = "SELECT * FROM careers ORDER BY `order` ASC";
$pdo = Connexion::getInstance ();
$sth = $pdo->query ( $sql );
$res = $sth->fetchAll (PDO::FETCH_ASSOC);

$resume['experiences']['careers'] =[];

foreach ( $res as $row ) {
	$resume['experiences']['careers'][] = array(
	"company"=>$row['company'],
	"start"=>$row['start'],
	"end"=>$row['end'],
	"location"=>$row['location'],
	"website"=>$row['website'],
	"website_status"=>$row['website_status'],
	"title"=>$row['title'],
	"descrip"=>$row['descrip'],
	);
}
////////////////////
/// Skills /////////
////////////////////
$sql = "SELECT * FROM skills ORDER BY score DESC";
$pdo = Connexion::getInstance ();
$sth = $pdo->query ( $sql );
$res = $sth->fetchAll (PDO::FETCH_ASSOC);

$resume['abilities']['skills'] =[];

foreach ( $res as $row ) {
$resume['abilities']['skills'][] = array(
"title"=>$row['title'],
"score"=>$row['score']
);
}
////////////////////
/// Languages //////
////////////////////
$sql = "SELECT * FROM languages ORDER BY score DESC";
$pdo = Connexion::getInstance ();
$sth = $pdo->query ( $sql );
$res = $sth->fetchAll (PDO::FETCH_ASSOC);

$resume['abilities']['languages'] =[];

foreach ( $res as $row ) {
$resume['abilities']['languages'][] = array(
"title"=>$row['title'],
"score"=>$row['score'],
"descrip"=>$row['descrip']
);
}
////////////////////
/// Tools //////////
////////////////////
$sql = "SELECT * FROM tools ORDER BY score DESC";
$pdo = Connexion::getInstance ();
$sth = $pdo->query ( $sql );
$res = $sth->fetchAll (PDO::FETCH_ASSOC);

$resume['abilities']['tools'] =[];

foreach ( $res as $row ) {
$resume['abilities']['tools'][] = array(
"title"=>$row['title'],
"score"=>$row['score'],
"descrip"=>$row['descrip']
);
}


////////////////////
/// Github //////////
////////////////////

	$ch = curl_init();
	curl_setopt($ch,CURLOPT_URL,'https://api.github.com/users/zarque');
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,1);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	curl_setopt($ch,CURLOPT_USERAGENT,'php/curl zaosoula.fr');
	$github_user = json_decode(curl_exec($ch));
	curl_close($ch);

	////////////////////
	/// Projects //////////
	////////////////////
	$sql = "SELECT * FROM projects ORDER BY id DESC";
	$pdo = Connexion::getInstance ();
	$sth = $pdo->query ( $sql );
	$res = $sth->fetchAll (PDO::FETCH_ASSOC);

	$resume['projects'] = [];

	foreach ( $res as $row ) {
	$resume['projects'][] = array(
	"title"=>$row['title'],
	"descrip"=>$row['descrip'],
	"image"=>$row['image'],
	"link"=>$row['link']
	);
	}


} catch ( PDOException $e ) {
	logger(' PDOException : '.json_encode($e)); //Add in log
}

?>
