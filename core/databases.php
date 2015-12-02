<?php
class Database {
    /**
     * Open a database connection with 
     * @param type $dbhost
     * @param type $dbuser
     * @param type $dbpass
     * @param type $dbname
     * 
     */
    public function Open($dbhost, $dbuser, $dbpass, $dbname){
        
    if($dbhost == NULL){include 'config.php';}
    
    $conn = mysql_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to mysql');
    mysql_set_charset('utf8',$conn);
    mysql_select_db($dbname);
    mysql_query(' set character set utf8 ');
    mysql_query("SET NAMES 'utf8' ");
    }

    public function Close() {
        mysql_close();
    }
    
    public function ExecQuery($query){
        return mysql_query($query);
    }
    
    public function FetchRowQuery($query){
        $results = mysql_query($query);
        return mysql_fetch_row($results);
    }     

    public function FetchRowQueryWithCellNames($query){
        $results = mysql_query($query);
        
        while ($row = mysql_fetch_assoc($results)) {
            $i = 0;
            foreach($row as $key => $value) {
                $dataArray[$key] = $value;
                $dataArray[$i] = $value;
                $i++;
             }
        }
        return $dataArray;
    } 
    
    public function NumRowQuery($query){
        $results = mysql_query($query);
        return mysql_num_row($results);
    }  
    
    public function HtmlTable($action,$table,$tableColumns,$edit){
        $query = mysql_query("SELECT * FROM $table");
        if($tableColumns == NULL){
            $colums = mysql_query("SHOW FIELDS FROM $table");
            while($column = mysql_fetch_array($colums)){
                $colum[$i] = $column[0];
                $tableCell .= "<th>$column[0]</th>\n";
                $i++;
            }            
        } else {
            $colums = explode(",", $tableColumns);
            foreach ($colums as $value){
                $colum[$i] = $value;
                $tableCell .= "<th>$value</th>\n";
                $i++;
            }
        }
        
        $table = "<table id='$table'>\n";
        $table .= $tableCell;
        
        if($edit == 1){
            $table .= "<th>Command</th>\n";
        }
        
        while ($row = mysql_fetch_array($query)) {
            $table .= "<tr>";
            foreach ($colum as $value){
                $table .= "<td>$row[$value]</td>\n";
                if($id == NULL) {$id = $row[$value];}
            }
            if($edit == 1){
                 $table .= "<td align='center' valign='center'>\n";
                 $table .= "<form action='$action' method='POST'>\n";
                 $table .= "<input type='hidden' name='id' value='$id'>\n";
                 $table .= "<input type='submit' value='Επεξεργασία'>\n";
                 $table .= "</form>\n";
                 $table .= "</td>\n";
             }
             $id = "";
            $table .= "</tr>";
        }
 
        
        $table .= "</table>\n";
        return $table;
    }

    public function EditRowTable($idName,$idValue,$tableName){
        $this->postDataTable($idName,$idValue,$tableName);
        $citys = new htmlForm();
                
        $query = mysql_query("SELECT * FROM $tableName WHERE $idName = '$idValue'");
        $colums = mysql_query("SHOW FIELDS FROM $tableName");
        
        $editForm = new htmlForm;
        
        $form = $editForm->formMake("POST", "editTable", "");
        
        while($column = mysql_fetch_array($colums)){
            $colum[$i] = $column[0];
            $i++;
        }
        
        while ($row = mysql_fetch_array($query)) {
            foreach ($colum as $value){
                if($value == "city"){
                    $form .= $citys->formCitys('Κοζάνη');
                } else {
                    $form .= $editForm->formInput('text',$value,$row[$value],$value,'','','</br>');
                }
            }
        }
        $form .= $editForm->formInput('submit','delete','Διαγραφή');
        $form .= $editForm->formInput('submit','send','Αποθήκευση');
        $form .= $editForm->formClose();
        
        return $form;
    }
    
    public function PostDataTable($idName,$idValue,$tableName){
        if($idName != NULL && $idValue != NULL && $tableName != NULL){
            foreach ($_POST as $key => $value){
                if($key == "send"){ } else {
                    $updates .= "`".$key."` = '".mysql_real_escape_string($value)."' ,";
                }
            }
            $updates = substr($updates, 0,-1);
            $query = mysql_query("UPDATE $tableName SET $updates WHERE $idName = '$idValue'");
        }
    }
    
    function DeleteRow($idName,$idValue,$tableName){
        if($idName != NULL && $idValue != NULL && $tableName != NULL){
            mysql_query("DELETE FROM $tableName WHERE $idName = '$idValue'");
            return "Η Εγγραφή διαγράφηκε";            
        }
    }

}

?>
