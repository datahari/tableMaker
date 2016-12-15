<?php

class tableMaker
{
    protected $tbody_template    = '<tbody>%s</tbody>';
    protected $thead_template    = '<thead>%s</thead>';
    protected $td_template       = '<td>%s</td>';
    protected $tr_template       = '<tr>%s</tr>';
    protected $table_template    = '<table>%s</table>';

    protected $rows   = [];
    protected $header = [];

    public function setRows( $rows )
    {
        if( ! is_array( $rows ) ) {
            throw new \Exception( '$rows must be an array' );
        }

        $this->rows = $rows;
    }

    public function setHeader( $rows )
    {
        if( ! is_array( $rows ) ) {
            throw new \Exception( '$rows must be an array' );
        }

        $this->header = $rows;
    }

    public function render()
    {
        $output = "";

        foreach( $this->header as $row ) {
            $columns = $this->parseColumns( $row );
            $output .= $this->wrapInTableHead( 
            	$this->wrapInTableRow( $columns ) 
            );
        }

        foreach( $this->rows as $row ) {
            $columns = $this->parseColumns( $row );
            $out     = $this->wrapInTableRow( $columns );

            if( $this->hasHeader() ) {
            	$out = $this->wrapInTableBody( $out );
            }

            $output .= $out;
        }

        $output = $this->wrapInTable( $output );

        return $output;
    }

    protected function parseColumns( $columns ) {
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

    protected function hasHeader()
    {
    	return count( $this->header ) > 0;
    }

    protected function wrapInTable( $contents )
    {
        return sprintf( $this->table_template, $contents );
    }

    protected function wrapInTableRow( $contents )
    {
        return sprintf( $this->tr_template, $contents );
    }

    protected function wrapInTableCell( $contents )
    {
        return sprintf( $this->td_template, $contents );
    }

    protected function wrapInTableHead( $contents )
    {
        return sprintf( $this->thead_template, $contents );
    }

    protected function wrapInTableBody( $contents )
    {
        return sprintf( $this->tbody_template, $contents );
    }
}