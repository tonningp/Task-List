<?php
class Task{
   private $description=" ";
   private $completed=" ";
   private $date_created=" ";
   private $date_completed=" ";
    
   public function getDescription(){
      return $this->description;
   }
   public function setDescription($_desc){
      $this->description = $_desc;
   }
   public function getCompleted(){
      return $this->completed;
   }
   public function setCompleted($_comp){
      $this->completed = $_comp;
   }
   public function getDateCreated(){
      return $this->date_created;
   }
   public function setDateCreated($_dcreat){
      $this->date_created = $_dcreat;
   }
   public function getDateCompleted(){
      return $this->date_completed;
   }
   public function setDateCompleted($_dcomp){
      $this->date_completed = $_dcomp;
   }
}


class Tasklist{
   private $tArr = array();
   public function addTask($newTask){
        $this->tArr[] = $newTask;
   }
    
   public function printTask(){
        if(is_array($this->tArr) || is_object($this->tArr)){
          echo '<table>';// this table displays the function ptintTask() from New Task() below
            $task_list= fopen("test.csv", "w") or die("Unable to open file!");
            echo "<br/>". "From the 'get' and 'set' functions<br/>";
            foreach($this->tArr as $Task => $value){
             echo '<tr>'; 
               echo '<td>'.'<td>'.$value->getDescription().'</td>';
               echo '<td>'.'<td>'.$value->getCompleted().'</td>';
               echo '<td>'.'<td>'.$value->getDateCreated().'</td>';
               echo '<td>'.'<td>'.$value->getDateCompleted().'</td>';
            
                $txt = $value->getDescription() . ',' . $value->getCompleted() . ',' . $value->getDateCreated() . ',' . $value->getDateCompleted()."\n";
          
                fwrite($task_list, $txt);
                         }
            echo '</tr>';
            fclose($task_list);
            echo '<br/></table>';
         
        }
    }
  }
echo "from csv file";
$row = 1;
$header = ["description","completed","date created","date completed"];
echo "<table>";
if (($handle = fopen("test.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $num = count($data);
        $row++;
        echo "<tr>";
        for ($c=0; $c < $num; $c++) {
            echo "<td>".$header[$c]."<td>: ".$data[$c] . "</td>";
        }
  }
    fclose($handle);
 echo "</tr></table>";   
}



$test0 = new Task();
$test0->setDescription("Description");
$test0->setCompleted("Finished");
$test0->setDateCreated("Created");
$test0->setDateCompleted("Completed");
$test1 = new Task();
$test1->setDescription("Wake up to dog barking");
$test1->setCompleted("yes");
$test1->setDateCreated("11:15am");
$test1->setDateCompleted("11:16am");
$test2 = new Task();
$test2->setDescription("throw shoe at mutt");
$test2->setCompleted("yes");
$test2->setDateCreated("11:17am");
$test2->setDateCompleted("11:18am");
$test3 = new Task();
$test3->setDescription("dog runs off with shoe");
$test3->setCompleted("yes");
$test3->setDateCreated("11:19am");
$test3->setDateCompleted("11:20am");
$test4 = new Task();
$test4->setDescription("mutt is happy");
$test4->setCompleted("yes");
$test4->setDateCreated("11:20am");
$test4->setDateCompleted("11:21am");
$test5 = new Task();
$test5->setDescription("you get up");
$test5->setCompleted("no");
$test5->setDateCreated("11:21am");
$test5->setDateCompleted("n/a");


$list = new Tasklist();
$list->addTask($test0);
$list->addTask($test1);
$list->addTask($test2);
$list->addTask($test3);
$list->addTask($test4);
$list->addTask($test5);
$list->printTask();

