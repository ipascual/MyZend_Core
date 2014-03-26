<?php
/**
*
* Useful Php Functions
*
* @author: Ignacio Pascual
*/

/**
 * Kill and debug the execution
 * 
 * @param $object
 * 
 */
function _d($object = null) {
    die(var_dump($object));
}

/**
 * Log variables to a file.
 * $name will highlight the record.
 * 
 * @param object $object
 * @param string $name
 * 
 * @return null
 */
function ilog($object, $name = null) {
	@mkdir("./data/logs");
    $h = fopen("./data/logs/ilog.log", "a");
    if($name) {
        fwrite($h, $name." >>> ");
    }
    fwrite($h, print_r($object, true).PHP_EOL);
    fclose($h);
}

/**
 * Convert Array variable to stdClass
 * 
 * @param array $array
 * 
 * @return object stdClass
 */
function arrayToObject($array) {
	if(!is_array($array)) {
		return $array;
	}

	$object = new stdClass();
	if (is_array($array) && count($array) > 0) {
		foreach ($array as $name=>$value) {
			$name = trim($name);
			if (!empty($name)) {
				$object->$name = arrayToObject($value);
			}
		}
		return $object;
	} else {
		return FALSE;
	}
}

/**
 * Return an Array to proper CSV format line
 * 
 * @param array $data
 * @param string $delimiter
 * @param string $quote
 * 
 * @return string csvLine
 */
function arrayToCsv($data, $fields = array(), $delimiter = ',', $quote = '"') {
	ob_start();
	
	$filteredData = array();
	if(count($fields)) {
		foreach($fields as $field) {
			if(isset($data[$field])) {
				$filteredData[] = $data[$field];
			}
			else {
				$filteredData[] = "";
			}
		}
	}
	else {
		$filteredData = $data;
	}

	$outstream = fopen("php://output", 'w');
	fputcsv($outstream, $filteredData, $delimiter, $quote);
	fclose($outstream);
	$output = ob_get_contents();
	ob_end_clean();

	return $output.PHP_EOL;
}
