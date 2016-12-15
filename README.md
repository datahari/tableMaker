# tableMaker

Crates an HTML table from an array

# Usage

<b>Simple</b>

```
$rows = ["row1", "row2", "row3"];

$table = new tableMaker();    // initialize
$table->setRows( $rows );     // set rows

echo $table;
```
<table><tr><td>row1</td></tr><tr><td>row2</td></tr><tr><td>row3</td></tr></table>

<hr />

<b>With header</b>
```
$header = ["head1", "head2", "head3"];
$rows   = ["row1", "row2", "row3"];

$table = new tableMaker();    // initialize
$table->setHeader( $header ); // set header
$table->setRows( $rows );     // set rows

echo $table;
```

<table><thead><tr><td>head1</td></tr><tr><td>head2</td></tr><tr><td>head3</td></tr></thead><tbody><tr><td>row1</td></tr><tr><td>row2</td></tr><tr><td>row3</td></tr></tbody></table>

<hr />
