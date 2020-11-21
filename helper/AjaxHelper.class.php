<?php

class AjaxHelper
{

    private $searchTerm;
    public $result;
    public $connection;
    
 public function __construct($conn){
$this->connection = $conn;
 }

public function setSearchTerm($searchTerm) 
{
    $this->searchTerm = $searchTerm;
}

public function getLiveSearchResult()
{
    if ($this->searchTerm !=""){
    $query = "SELECT id,animal_name FROM animals WHERE animal_name LIKE '%" . $this->searchTerm . "%'";
    $this->result =  mysqli_query($this->connection, $query);
    if($this->result->num_rows > 0 ){
    $tmpResult = $this->result->fetch_assoc();

    foreach ($tmpResult as $result){
    ?>
    <li onClick="selectResult('<?php echo $result['animal_name'];?>')"><?php echo $result['animal_name'];?></li> 
    <?php
    }
    return $tmpResult;
    }
    else {
        return false; 
    } 
}
}
}


?>