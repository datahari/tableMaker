<?php

class tableMaker
{

	protected $rows = [];
	protected $td_template    = '<td>%s</td>';
	protected $tr_template    = '<tr>%s</tr>';
	protected $table_template = '<table>%s</table>';

	public function setRows( $rows )
	{
		if( ! is_array( $rows ) ) {
			throw new \Exception( '$rows must be an array' );
		}

		$this->rows = $rows;
	}

	public function render()
	{
		$output = "";

		foreach( $this->rows as $row ) {
			$columns = $this->parseColumns( $row );
			$output .= $this->wrapInTableRow( $columns );
		}

		$output = $this->wrapInTable( $output );

		return $output;
	}

	public function wrapInTable( $contents )
	{
		return sprintf( $this->table_template, $contents );
	}

	public function wrapInTableRow( $contents )
	{
		return sprintf( $this->tr_template, $contents );
	}

	public function wrapInTableCell( $contents )
	{
		return sprintf( $this->td_template, $contents );
	}

	public function parseColumns( $columns ) {
		$output = "";

		if( is_array( $columns ) ) {
			foreach( $columns as $column ) {
				$column = htmlentities( $column );
				$output .= $this->wrapInTableCell( $column );
			}
		} else {
			$columns = htmlentities( $columns );
			$output .= $this->wrapInTableCell( $columns );
		}

		return $output;
	}
}