<?php 
    
function validate_employees_json($jsonFile){
    //handle error loop and multiple root
    $jsonFile = str_replace(' ', '', $jsonFile); //remove spaces
    $fileKeys = [];
    $i = 0;

    //analysis straight into json file to avoid key duplicity removal of json_decode function
    while($i < strlen($jsonFile)){
    
        // echo $jsonFile[$i] . '-'; //debug
        if($jsonFile[$i] == '"'){
            $i++;
            $key = "";
            while($jsonFile[$i] != '"'){
                $key .= $jsonFile[$i];  
                $i++;
            }
            if($jsonFile[$i+1] == ':'){
                array_push($fileKeys, $key);
            }
        }
        $i++;
    }

    //first error, multiple roots: if one key appears more than once, sb has two supervisors which is not possible
    $fileKeysCount = array_count_values($fileKeys);
    $duplicatedKeys= [];
    foreach($fileKeysCount as $key => $value){
        if($value > 1){
            array_push($duplicatedKeys, $key);
        }
    }

    if(sizeof($duplicatedKeys) > 0){
        echo "The file you are trying to POST contains key duplicity with the following employees: \n";
        print_r($duplicatedKeys);
        return false;
    }

    return true;

    //second error, loops: sb manages sb else from a higher hierarchy, it happens if a tree is not possible to be generated (contains cycles)
    //convert_to_tree($jsonFile); // CODE 
}

function update_tree($tree, $child, $parent){
    //adds a new employee in the tree structure, or updates it
    $new_tree = [];
    if($tree = null){
        return;
    }

    // foreach ($tree as $node => $branches) {
    //  if(is_array($branches)){
    //      if($node == $elem) 
    //  }else if()
    // }
}

function convert_to_tree($jsonFile){
    //assuming that the file is valid adjust that into the desired structure
    $file = json_decode($jsonFile, true);
    $tree = array();

    foreach ($file as $key => $value) {
        // echo "<p>" . $key . ": " . $value . " </p>";

        if(array_key_exists($key, $treeJSON)){

            //if the key is already in the growing tree
            $treeJSON[$value] = $treeJSON;
            unset($treeJSON[$key]);
        }else{
            if(!isset($treeJSON[$value])){
                $treeJSON[$value] = array();
            }
            array_push($treeJSON[$value], $key);
        }
    }
    return $treeJSON;
}

?>