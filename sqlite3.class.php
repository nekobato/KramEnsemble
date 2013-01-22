<?php
class DB
{
	protected $result;
	protected $column;

	function __construct($query)
	{
		$db = new SQLite3($DBNAME); 

		$this->result = $mysqli->query($query)
			or die('Query failed: ' . $mysqli->error);

		$mysqli->close();
	}

	function result_num_rows()
	{
		return $this->result->num_rows;
	}

	function result_array()
	{
		$fields = $this->result->fetch_fields();
		for ($i=0; $i<count($fields); $i++)
		{
			$columns[$i] = $fields[$i]->name;
		}

		$i = 0;
		while ($row = $this->result->fetch_row())
		{
			$j = 0;
			foreach($row as $col)
    	{
				$result_array[$i][$columns[$j]] = $col;
				$j++;
			}
			$i++;
		}
		return $result_array;
	}

	function result_row_array()
	{
		$fields = $this->result->fetch_fields();
		for ($i=0; $i<count($fields); $i++)
		{
			$columns[$i] = $fields[$i]->name;
		}

		$j = 0;
		foreach($this->result->fetch_row() as $col)
		{
			$result_array[$columns[$j]] = $col;
			$j++;
		}
		$i++;

		return $result_array;
	}

}

