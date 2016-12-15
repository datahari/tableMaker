<?php

require( __DIR__ . "/../tableMaker.class.php");

class tableMakerTestTest extends PHPUnit_Framework_TestCase
{

    public function test_it_turns_array_items_to_table_rows()
    {

        $rows = [
            "row 1",
            "row 2",
            "row 3"
        ];

        $table = new tableMaker();
        $table->setRows( $rows );

        $actual = $table->render();

        $expected = '<table>'.
                        '<tr>'.
                            '<td>row 1</td>'.
                        '</tr>'.
                        '<tr>'.
                            '<td>row 2</td>'.
                        '</tr>'.
                        '<tr>'.
                            '<td>row 3</td>'.
                        '</tr>'.
                    '</table>';

        $this->assertEquals( $expected, $actual );

    }

    public function test_it_turns_2dimensional_array_into_rows_and_columns()
    {

        $rows = [
            ["row 1a", "row 1b", "row 1c"],
            ["row 2a", "row 2b", "row 2c"],
            ["row 3a", "row 3b", "row 3c"]
        ];

        $table = new tableMaker();
        $table->setRows( $rows );

        $actual = $table->render();

        $expected = '<table>'.
                        '<tr>'.
                            '<td>row 1a</td>'.
                            '<td>row 1b</td>'.
                            '<td>row 1c</td>'.
                        '</tr>'.
                        '<tr>'.
                            '<td>row 2a</td>'.
                            '<td>row 2b</td>'.
                            '<td>row 2c</td>'.
                        '</tr>'.
                        '<tr>'.
                            '<td>row 3a</td>'.
                            '<td>row 3b</td>'.
                            '<td>row 3c</td>'.
                        '</tr>'.
                    '</table>';

        $this->assertEquals( $expected, $actual );
    }

    public function test_it_substitutes_special_characters_with_htmlentities()
    {

        $rows = [
            ["\"test\""],
            ["\"test\"", "\"test\"", "\"test\""]
        ];

        $table = new tableMaker();
        $table->setRows( $rows );

        $actual = $table->render();

        $expected = '<table>'.
                        '<tr>'.
                            '<td>&quot;test&quot;</td>'.
                        '</tr>'.
                        '<tr>'.
                            '<td>&quot;test&quot;</td>'.
                            '<td>&quot;test&quot;</td>'.
                            '<td>&quot;test&quot;</td>'.
                        '</tr>'.
                    '</table>';

        $this->assertEquals( $expected, $actual );
    }

}