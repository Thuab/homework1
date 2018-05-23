<?php  
class db_mysqli extends mysqli{
	
	private $host='localhost';
	private $username;
	private $password;
	private $dbname;
	private $db;
	
	function _construct()
	{
	  $db_json=file_get_contents("/home/bingo/mon.json");
      $jsondata = json_decode($db_json);  
      $this->username = $jsondata['mondb']['user'];  
      $this->password = $jsondata['mondb']['password'];
      $this->dbname =  $jsondata['mondb']['dbname'];
	  echo $user ;echo $password ;echo $dbname;
	  $db = mysqli_connect($this->host, $this->username, $this->password, $this->dbname);
	  
	  if(mysqli_connect_errno())
	   {
         exit('Connect failed:' . mysqli_connect_error());
        }
	  else echo("Connect to ".$dbname);
	  
      $db->set_charset("utf8");
	  
	  this->db=$db;
	}
	
	public function insert_user($username,$password)
	{
		$sql="INSERT INTO User VALUES(?,?)";
		$db=$this->db;
		$short = $db->prepare($sql);//预处理
		$short->bind_param("ss",$username,$password);
		if($short->execute())
		{
		   echo "Inserted\n";
		   $this->username=$username;
		   return true;
		}
		else{
		   echo "Error".mysqli_error();
		   return false;
		}
	}	
}	
	echo "php inited\n";
    $mon_db = new db_mysqli();
    $mon_db->insert_user("test01","123456");

?>