<?php

	class Client{

	//Données membres
	private static $_ID;
	private $_Nom;
	private $_Prenom;
	private $_Adresse;
	private $_CP;
	private $_Ville;
	private $_TabFacture=array();


	private static function initClient(){

		self::$_ID++;
	}

	public function __construct($mNom,$mPrenom,$mAdr,$mCp,$mVille){
		echo "Contructeur<br/>";
		self::initClient();
		$this->_Nom=$mNom;
		$this->_Prenom=$mPrenom;
		$this->_Adresse=$mAdr;
		$this->_CP=$mCp;
		$this->_Ville=$mVille;
	}

	public function __destruct() {
		echo '<br/>';
		echo 'Destruction de ' . self::$_ID.'<br/>';
        echo 'Destruction de ' . $this->_Nom.'<br/>';
        echo 'Destruction de '  . $this->_Prenom.'<br/>';
        echo 'Destruction de ' . $this->_Adresse.'<br/>';
        echo 'Destruction de ' . $this->_CP.'<br/>';
        echo 'Destruction de ' . $this->_Ville.'<br/>';
    }

	public function afficheClient(){

		self::initClient();
		echo $this->_Nom.'<br/>';
		echo $this->_Prenom.'<br/>';
		echo $this->_Adresse.'<br/>';
		echo $this->_CP.'<br/>';
		echo $this->_Ville.'<br/>';
		print_r($this->_TabFacture);
		echo "<br/>";
	}

	public function AjoutFacture( Facture $mFact){

		array_push($this->_TabFacture, $mFact);
		//$this->_TabFacture[]=$mFact;

	}


	//Mutateurs
	public function getID(){
		return $this->_ID;
	}

	public function getNom(){
		return $this->_Nom;
	}

	public function getPrenom(){
		return $this->_Prenom;
	}

	public function getAdresse(){
		return $this->_Adresse;
	}

	public function getCp(){
		return $this->_CP;
	}

	public function getVille(){
		return $this->_Ville;
	}


	public function setNom($mX){
		$this->_Nom=$mNom;
	}

	public function setPrenom($mX){
		$this->_Prenom=$mPrenom;
	}

	public function setAdresse($mX){
		$this->_Adresse=$mAdr;
	}

	public function setCP($mX){
		$this->_CP=$mCp;
	}

	public function setVille($mX){
		$this->_Ville=$mVille;
	}

}


	class Facture{


	//Données membres
	private static $_ID;
	private $_Date;
	private $_ModeRg;
	private $_Client;
	private $_TabProduit=array();
	private $_TabDetail=array();


	public function getA() { return ($_Client); }

	private static function initFacture(){

		self::$_ID++;
	}


	public function __construct($mDate,$mModeRg){
		echo "Contructeur<br/>";
		self::initFacture();
		$this->_Date=$mDate;
		$this->_ModeRg=$mModeRg;
	}

	public function __destruct() {
		echo '<br/>';
		echo 'Destruction de ' . self::$_ID.'<br/>';
        echo 'Destruction de ' . $this->_Date.'<br/>';
        echo 'Destruction de '  . $this->_ModeRg.'<br/>';
    }

	public function afficheFacture(){

		self::initFacture();
		echo $this->_Date.'<br/>';
		echo $this->_ModeRg.'<br/>';
		print_r($this->_TabProduit);
		echo "<br/>";
		echo "<br/>";
		print_r($this->_TabDetail).'<br/>';
		echo "<br/>";
	}

	public function AjoutProduit(Produit  $mProd){

		array_push($this->_TabProduit, $mProd);

	}

	public function AjoutDetail( D_Facture $mDeta){

		array_push($this->_TabDetail, $mDeta);;

	}

	//Mutateurs
	public function getID(){
		return $this->_ID;
	}

	public function getDate(){
		return $this->_Date;
	}

	public function getModeRg(){
		return $this->_ModeRg;
	}


	public function setDate($mDate){
		$this->_Date=$mDate;
	}

	public function setModeRg($mModeRg){
		$this->_ModeRg=$mModeRg;
	}

}


	class Produit{

	//Données membres
	private static $_ID;
	private $_Des;
	private $_PrixU;


	
	private static function initProduit(){

		self::$_ID++;
	}


	public function __construct($mDes,$mPrixU){
		echo "Contructeur<br/>";
		self::initProduit();
		$this->_Des=$mDes;
		$this->_PrixU=$mPrixU;
	}

	public function __destruct() {
		echo '<br/>';
		echo 'Destruction de ' . self::$_ID.'<br/>';
        echo 'Destruction de ' . $this->_Des.'<br/>';
        echo 'Destruction de '  . $this->_PrixU.'<br/>';
    }

	public function afficheProduit(){

		self::initProduit();
		echo $this->_Des.'<br/>';
		echo $this->_PrixU.'<br/>';
		echo "<br/>";
	}

	//Mutateurs
	public function getID(){
		return $this->_ID;
	}

	public function getDes(){
		return $this->_Des;
	}

	public function getPrixU(){
		return $this->_PrixU;
	}


	public function setDes($mDes){
		$this->_Des=$mDes;
	}

	public function setPrixU($mPrixU){
		$this->_PrixU=$mPrixU;
	}


}


	class D_Facture{

	//Données membre
	private $_Qte;


	public function __construct($mQte){
		echo "Contructeur<br/>";
		$this->_Qte=$mQte;
	}

	public function __destruct() {
		echo '<br/>';
		echo 'Destruction de ' . $this->_Qte.'<br/>';
    }

	public function afficheDetail(){

		echo $this->_Qte.'<br/>';
	}

	//Mutateurs
	public function getQte(){
		return $this->_Qte;
	}

	public function setQte($mQte){
		$this->_Qte=$mQte;
	}


	}


?>

<?php

	$mCli=new Client("Durand","Olivier","Milieu","68000","Strass");

	$mFac=new Facture("11/05/2017","CB");

	$mProd=new Produit("Ecran","500");

	$mDfac=new D_Facture("10");

	$mFac->AjoutProduit($mProd);
	$mFac->AjoutDetail($mDfac);
	$mFac->afficheFacture();

	$mCli->AjoutFacture($mFac);	
	$mCli->afficheClient();





	

?>