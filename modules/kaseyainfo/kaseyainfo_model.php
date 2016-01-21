<?php
class kaseyainfo_model extends Model {
function __construct($serial='')
    {
        parent::__construct('id', 'kaseyainfo'); //primary key, tablename
		$this->rs['id'] = '';
		$this->rs['serial_number'] = $serial; $this->rt['serial_number'] = 'VARCHAR(255) UNIQUE';
		$this->rs['username'] = '';  // Results in VARCHAR255
 		
 		
 		
 		// Schema version, increment when creating a db migration
		$this->schema_version = 0;
		
  
  $this->create_table();

        if ($serial)
        {
            $this->retrieve_one('serial_number=?', $serial);
        }

        $this->serial = $serial;

    }
    
   
    // ------------------------------------------------------------------------
	/**
	 * Process data sent by postflight
	 *
	 * @param string data
	 * 
	 **/
	function process($data)
	{		
		// Delete previous entries
		$this->delete_where('serial_number=?', $this->serial_number);
		
		// Translate kaseyainfo strings to db fields
        $translate = array(
        	'username = ' => 'username');

//clear any previous data we had
		foreach($translate as $search => $field) {
			$this->$field = '';
		}
		// Parse data
		foreach(explode("\n", $data) as $line) {
		    // Translate standard entries
			foreach($translate as $search => $field) {
			    
			    if(strpos($line, $search) === 0) {
				    
				    $value = substr($line, strlen($search));
				    
				    $this->$field = $value;

					# Check if this is the last field
					if($field == 'username')
					{
						$this->id = '';
						$this->save();
					}
				    break;
			    }
			} 
		    
		} //end foreach explode lines
		
		
	//	throw new Exception("Error Processing Request", 1);
		
	}
}


