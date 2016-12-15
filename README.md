# tableMaker

Crates an HTML table from an array

# Usage

<b>Simple, one column</b>

```
$rows = ["row1", "row2", "row3"];

$table = new tableMaker(); // initialize
$table->setRows( $rows );  // set rows

echo $table;
// returns <table><tr><td>row1</td></tr><tr><td>row2</td></tr><tr><td>row3</td></tr></table>
```
<table><tr><td>row1</td></tr><tr><td>row2</td></tr><tr><td>row3</td></tr></table>

<hr />

<b>Simple, multiple columns</b>

```
$rows = [
	["row 1a", "row 1b", "row 1c"],
	["row 2a", "row 2b", "row 2c"],
	["row 3a", "row 3b", "row 3c"]
];

$table = new tableMaker(); // initialize
$table->setRows( $rows );  // set rows

echo $table;
// returns <table><tr><td>row 1a</td><td>row 1b</td><td>row 1c</td></tr><tr><td>row 2a</td><td>row 2b</td><td>row 2c</td></tr><tr><td>row 3a</td><td>row 3b</td><td>row 3c</td></tr></table>
```
<table><tr><td>row 1a</td><td>row 1b</td><td>row 1c</td></tr><tr><td>row 2a</td><td>row 2b</td><td>row 2c</td></tr><tr><td>row 3a</td><td>row 3b</td><td>row 3c</td></tr></table>

<hr />

<b>With header</b>
```
$header = ["head1", "head2", "head3"];
$rows   = ["row1", "row2", "row3"];

$table = new tableMaker();    // initialize
$table->setHeader( $header ); // set header
$table->setRows( $rows );     // set rows

echo $table;

// returns <table><thead><tr><td>head1</td></tr><tr><td>head2</td></tr><tr><td>head3</td></tr></thead><tbody><tr><td>row1</td></tr><tr><td>row2</td></tr><tr><td>row3</td></tr></tbody></table>
```

<table><thead><tr><td>head1</td></tr><tr><td>head2</td></tr><tr><td>head3</td></tr></thead><tbody><tr><td>row1</td></tr><tr><td>row2</td></tr><tr><td>row3</td></tr></tbody></table>

<hr />
