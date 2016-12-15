# tableMaker

Crates an HTML table from an array

# Usage

```
$rows = ["row1", "row2", "row3"];

$table = new tableMaker();    // initialize
$table->setHeader( $header ); // set header
$table->setRows( $rows );     // set rows

echo $table->render(); // returns <table><tr><td>row1</td></tr><tr><td>row2</td></tr><tr><td>row3</td></tr></table>
```
