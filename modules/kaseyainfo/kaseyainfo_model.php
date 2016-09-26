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
		
  
		// Create table if it does not exist
		$this->create_table();
		
		if ($serial)
			$this->retrieve_record($serial);
		
		$this->serial = $serial;
		  
	}
	
	// ------------------------------------------------------------------------

	/**
	 * Process data sent by postflight
	 *
	 * @param string data
	 * @author Mikael Lofgren
	 **/
	function process($data)
	{		
		$this->username = trim($data);
		$this->save();
	}

	
}

