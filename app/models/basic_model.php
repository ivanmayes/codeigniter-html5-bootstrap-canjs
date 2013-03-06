<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Basic_Model extends CI_Model
{
	public $table;
	public function __construct()
	{
		parent::__construct();
		$this->table = get_Class($this);
		$this->load->database();
	}

	/**
	 * Inserts or updates a set of data
	 * @param  array $data      	Associative array of data to add to row
	 * @param  string $tablename 	Table name to save to
	 * @param  bool $overwrite		Should we overwrite if a row already exists?
	 * @return array            	Array of affected rows
	 */
	public function save($data,$tablename="",$overwrite=FALSE)
	{
		if($tablename=="")
		{
			$tablename = $this->table;
		}
		$op = 'update';
		$keyExists = FALSE;
		$fields = $this->db->field_data($tablename);
		foreach ($fields as $field)
		{
			if($field->primary_key==1)
			{
				$keyExists = TRUE;
				if(isset($data[$field->name]))
				{
					$this->db->where($field->name, $data[$field->name]);
				}
				else
				{
					$op = 'insert';
				}
				break;
			}
		}

		if($keyExists && $op=='update')
		{
			if (!$overwrite) {
				$query = $this->db->query("SELECT * FROM $tablename WHERE $field->name='".$data[$field->name]."' ");
				if (count($query->result_array()) > 0) return false;
			}

			$this->db->set($data);
			$this->db->update($tablename);
			if($this->db->affected_rows()==1)
			{
				return $this->db->affected_rows();
			}
		}

		$this->db->insert($tablename,$data);

		return $this->db->affected_rows();
	}

	/**
	 * Basic table search
	 * @param  array  $conditions Associative array of WHERE parameters
	 * @param  string  $tablename  Table name to execute search
	 * @param  integer $limit      Limit of results
	 * @param  integer $offset     Offset of results
	 * @return array              Array of result objects or an empty array
	 */
	public function search($conditions=NULL,$tablename="",$limit=50,$offset=0)
	{
		if($tablename=="")
		{
			$tablename = $this->table;
		}
		if($conditions != NULL)
			$this->db->where($conditions);

		$query = $this->db->get($tablename,$limit,$offset=0);
		return $query->result_array();
	}

	/**
	 * Insert a row
	 * @param  array $data      Data to update
	 * @param  string $tablename Table name to insert
	 * @return array            array of affected rows
	 */
	public function insert($data,$tablename="")
	{
		if($tablename=="")
			$tablename = $this->table;
		$this->db->insert($tablename,$data);
		return $this->db->affected_rows();
	}

	/**
	 * Update a row
	 * @param  array $data       Data to update
	 * @param  array $conditions Associative array of conditions
	 * @param  string $tablename  Table name to update
	 * @return array             Array of affected rows
	 */
	public function update($data,$conditions,$tablename="")
	{
		if($tablename=="")
			$tablename = $this->table;
		$this->db->where($conditions);
		$this->db->update($tablename,$data);
		return $this->db->affected_rows();
	}

	/**
	 * Delete a row
	 * @param  array $conditions Associative array of WHERE conditions
	 * @param  string $tablename  Table name to delete from
	 * @return array             Array of affected rows
	 */
	public function delete($conditions,$tablename="")
	{
		if($tablename=="")
			$tablename = $this->table;
		$this->db->where($conditions);
		$this->db->delete($tablename);
		return $this->db->affected_rows();
	}

}