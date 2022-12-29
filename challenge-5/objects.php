<?php
class Person {
    var $first_name;
    var $last_name;

    function __construct( $fn, $ln ) {
        $this->first_name = $fn;
        $this->last_name = $ln;
    }

    public function get_first_name() {
        return $this->first_name;
    }

    public function get_last_name() {
        return $this->last_name;
    }
}

// Challenge: Sort this array of Person objects by last, then first name! 

$rob = new Person( 'Rob', 'Casabona' );
$joe = new Person( 'Joe', 'Casabona' );
$erin = new Person( 'Erin', 'Casabona' );
$steve = new Person( 'Steve', 'Wozniack' );
$bill = new Person( 'Bill', 'Gates' );
$walt = new Person( 'Walt', 'Disney' );
$bob = new Person( 'Bob', 'Iger' );

$people = array( $rob, $joe, $erin, $steve, $bill, $walt, $bob );



/*usort($people, function ($a, $b) {
    if (strcmp($a->last_name, $b->last_name) == 0) {
        return strcmp($a->first_name, $b->first_name);
    } else {
        return strcmp($a->last_name, $b->last_name);
    };
});*/


usort($people, function ($a, $b) {
    $result = (strcmp($a->last_name, $b->last_name) == 0) ? strcmp($a->first_name, $b->first_name) : strcmp($a->last_name, $b->last_name);
    return $result;
    });

?>

<pre>
<?php print_r($people); ?>
</pre>