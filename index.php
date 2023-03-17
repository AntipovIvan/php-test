<?php

namespace Html;

use Iterator;

// Namespaces INCL FINISH

// Classes/Objects START
class Fruit {
    public $name;
    public $color;

    function set_name($name) {
        $this->name = $name;
    }
    function get_name() {
        return $this->name;
    }

    function set_color($color) {
        $this->color = $color;
    }
    function get_color() {
        return $this->color;
    }
}

$apple = new Fruit();
$banana = new Fruit();
$apple->set_name("Apple");
$apple->set_color("Red");
$banana->set_name("Banana");
$banana->set_color("Yellow");

echo "Name: " . $apple->get_name();
echo "<br>";
echo "Color: " . $apple->get_color();
echo "<br>";
echo "Name: " . $banana->get_name();
echo "<br>";
echo "Color: " . $banana->get_color();
echo "<br>";
// Classes/Objects FINISH



// Constructors START
class Fruit2 {
    public $name;
    public $color;

    function __construct($name, $color) {
        $this->name = $name;
        $this->color = $color;
    }

    function get_name() {
        return $this->name;
    }
    function get_color() {
        return $this->color;
    }
}
$apple = new Fruit2("Apple", "Red");
echo $apple->get_name();
echo "<br>";
echo $apple->get_color();
echo "<br>";
// Constructors FINISH



// Destructor START
class Fruit3 {
    public $name;
    public $color;

    function __construct($n, $c) {
        $this->name = $n;
        $this->color = $c;
    }
    function __destruct() {
        echo "The fruit is {$this->name} and the color is {$this->color}.";
    }
}
$apple = new Fruit3("Apple", "Red");
// Destructor FINISH



// Access Modifiers START
class Fruit4 {
    public $name;
    protected $color;
    private $weight;

    function set_name($n) {
        $this->name = $n;
    }
    protected function set_color($c) {
        $this->color = $c;
    }
    private function set_weight($w) {
        $this->weight = $w;
    }
}

$apple = new Fruit4();
$apple->set_name('Apple');
echo "<br>";
// $apple->set_color('Red');
// $apple->set_weight('300');

// Access Modifiers FINISH



// Inheritance START
class Fruit5 {
    public $name;
    public $color;
    public function __construct($n, $c) {
        $this->name = $n;
        $this->color = $c;
    }
    protected function intro() {
        echo "The fruit is {$this->name} and the color is {$this->color}.";
    }
}
final class Strawberry extends Fruit {
    public $weight;
    public function __construct($n, $c, $w) {
        $this->name = $n;
        $this->color = $c;
        $this->weight = $w;
    }
    public function intro() {
        echo "The fruit is {$this->name}, the color is {$this->color}, and the weight is {$this->weight} gram.";
    }
}
$strawberry = new Strawberry("Strawberry", "red", 50);
// $strawberry->message();
$strawberry->intro();
echo "<br>";
// Inheritance FINISH



// Class constants START
class Goodbye {
    const LEAVING_MESSAGE = "Thank you for visiting our site!";
    public function byebye() {
        echo self::LEAVING_MESSAGE;
    }
}
echo Goodbye::LEAVING_MESSAGE;
echo "<br>";
$goodbye = new Goodbye();
$goodbye->byebye();
echo "<br>";
// Class constants FINISH



// Abstract classes START
abstract class Car {
    public $name;
    public function __construct($n) {
        $this->name = $n;
    }
    abstract public function intro(): string;
}
class Audi extends Car {
    public function intro(): string {
        return "Choose German quality! I'm an $this->name!";
    }
}
class Volvo extends Car {
    public function intro(): string {
        return "Proud to be Swedish! I'm an $this->name!";
    }
}
class Citroen extends Car {
    public function intro(): string {
        return "French extravagance! I'm a $this->name!";
    }
}
$audi = new Audi("Audi");
echo $audi->intro();
echo "<br>";

$volvo = new Volvo("Volvo");
echo $volvo->intro();
echo "<br>";

$citroen = new Citroen("Citroen");
echo $citroen->intro();
echo "<br>";


abstract class ParentClass {
    abstract protected function prefixName($name);
}
class ChildClass extends ParentClass {
    public function prefixName($name, $separator = ".", $greet = "Dear") {
        if ($name == "John Doe") {
            $prefix = "Mr";
        } elseif ($name == "Jane Doe") {
            $prefix = "Mrs";
        } else {
            $prefix = "";
        }
        return "{$greet} {$prefix}{$separator} {$name}";
    }
}

$class = new ChildClass;
echo $class->prefixName("John Doe");
echo "<br>";
echo $class->prefixName("Jane Doe");
echo "<br>";
// Abstract classes FINISH



// Interfaces START
interface Animal {
    public function makeSound();
}
class Cat implements Animal {
    public function makeSound() {
        echo "Meow";
    }
}
class Dog implements Animal {
    public function makeSound() {
        echo " Bark ";
    }
}
class Mouse implements Animal {
    public function makeSound() {
        echo " Squeak ";
    }
}
$cat = new Cat();
$dog = new Dog();
$mouse = new Mouse();
$animals = array($cat, $dog, $mouse);
foreach ($animals as $animal) {
    $animal->makeSound();
}
echo "<br>";
// Interfaces FINISH



// Traits START
trait message1 {
    public function msg1() {
        echo "OOP is fun!";
    }
}
trait message2 {
    public function msg2() {
        echo "OOP reduces code duplication!";
    }
}
class Welcome {
    use message1;
}
class Welcome2 {
    use message1, message2;
}
$obj = new Welcome();
$obj->msg1();
echo "<br>";

$obj2 = new Welcome2();
$obj2->msg1();
$obj2->msg2();
echo "<br>";
// Traits FINISH



// Static Methods START
class greeting {
    public static function welcome() {
        echo "Hello World!";
    }
}
greeting::welcome();
echo "<br>";

class greeting2 {
    public static function welcome() {
        echo "Hello World!";
    }
    public function __construct() {
        self::welcome();
    }
}
new greeting2();
echo "<br>";

class A {
    public static function welcome() {
        echo "Hello World!";
    }
}
class B {
    public function message() {
        A::welcome();
    }
}
$obj = new B();
echo $obj->message();
echo "<br>";

class domain {
    protected static function getWebsiteName() {
        return "W3Schools.com";
    }
}
class domainW3 extends domain {
    public $websiteName;
    public function __construct() {
        $this->websiteName = parent::getWebsiteName();
    }
}
$domainW3 = new domainW3;
echo $domainW3->websiteName;
echo "<br>";
// Static Methods FINISH



// Static properties START
class pi {
    public static $value = 3.14159;
    public function staticValue() {
        return self::$value;
    }
}

class x extends pi {
    public function xStatic() {
        return parent::$value;
    }
}
echo pi::$value;
echo "<br>";

$pi = new pi();
echo $pi->staticValue();
echo "<br>";

echo x::$value;
$x = new x();
echo "<br>";

echo $x->xStatic();
echo "<br>";
// Static properties FINISH



// Namespaces START
class Table {
    public $title = "";
    public $numRows = 0;
    public function message() {
        echo "<p>Table '{$this->title}' has {$this->numRows} rows.</p>";
    }
}
$table = new Table();
$table->title = "My table";
$table->numRows = 5;
?>

<!DOCTYPE html>
<html>

<body>

    <?php
    $table->message();
    ?>

</body>

</html>
<!-- Namespaces FINISH -->



<?php
// Iterables START
function printIterable(iterable $myIterable) {
    foreach ($myIterable as $item) {
        echo $item;
    }
}
$arr = ["a", "b", "c"];
printIterable($arr);
echo "<br>";


function getIterable(): iterable {
    return ["a", "b", "c"];
}
$myIterable = getIterable();
foreach ($myIterable as $item) {
    echo $item;
}
echo "<br>";


class MyIterator implements Iterator {
    private $items = [];
    private $pointer = 0;

    public function __construct($i) {
        $this->items = array_values($i);
    }
    public function current(): mixed {
        return $this->items[$this->pointer];
    }
    public function key(): mixed {
        return $this->pointer;
    }
    public function next(): void {
        $this->pointer++;
    }
    public function rewind(): void {
        $this->pointer = 0;
    }
    public function valid(): bool {
        return $this->pointer < count($this->items);
    }
}
function printIterable2(iterable $myIterable) {
    foreach ($myIterable as $item) {
        echo $item;
    }
}
$iterator = new MyIterator(["a", "b", "c"]);
printIterable2($iterator);
// Iterables FINISH
?>



<!-- PHP Form validation START -->
<!DOCTYPE HTML>
<html>

<head>
    <style>
        .error {
            color: #FF0000;
        }
    </style>
</head>

<body>
    <?php
    $nameErr = $emailErr = $genderErr = $websiteErr = "";
    $name = $email = $gender = $comment = $website = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["name"])) {
            $nameErr = "Name is required";
        } else {
            $name = test_input($_POST["name"]);
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
                $nameErr = "Only letters and white space allowed";
            }
        }

        if (empty($_POST["email"])) {
            $emailErr = "Email is required";
        } else {
            $email = test_input($_POST["email"]);
            // check if e-mail address is well-formed
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format";
            }
        }

        if (empty($_POST["website"])) {
            $website = "";
        } else {
            $website = test_input($_POST["website"]);
            // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
            if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $website)) {
                $websiteErr = "Invalid URL";
            }
        }

        if (empty($_POST["comment"])) {
            $comment = "";
        } else {
            $comment = test_input($_POST["comment"]);
        }

        if (empty($_POST["gender"])) {
            $genderErr = "Gender is required";
        } else {
            $gender = test_input($_POST["gender"]);
        }
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>

    <h2>
        PHP Form Validation Example
    </h2>
    <p>
        <span class="error">
            * required field
        </span>
    </p>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        Name: <input type="text" name="name" value="<?php echo $name; ?>">
        <span class="error">
            * <?php echo $nameErr; ?>
        </span>
        <br><br>

        E-mail: <input type="text" name="email" value="<?php echo $email; ?>">
        <span class="error">
            * <?php echo $emailErr; ?>
        </span>
        <br><br>

        Website: <input type="text" name="website" value="<?php echo $website; ?>">
        <span class="error">
            <?php echo $websiteErr; ?>
        </span>
        <br><br>

        Comment: <textarea name="comment" rows="5" cols="40">
                <?php echo $comment; ?>
            </textarea>
        <br><br>

        Gender:
        <input type="radio" name="gender" <?php if (isset($gender) && $gender == "female") echo "checked"; ?> value="female">Female
        <input type="radio" name="gender" <?php if (isset($gender) && $gender == "male") echo "checked"; ?> value="male">Male
        <input type="radio" name="gender" <?php if (isset($gender) && $gender == "other") echo "checked"; ?> value="other">Other
        <span class="error">* <?php echo $genderErr; ?></span>
        <br><br>

        <input type="submit" name="submit" value="Submit">
    </form>

    <?php
    echo "Today is " . date("l");
    echo "<h2>Your Input:</h2>";
    echo $name;
    echo "<br>";
    echo $email;
    echo "<br>";
    echo $website;
    echo "<br>";
    echo $comment;
    echo "<br>";
    echo $gender;
    ?>
</body>

</html>
<!-- PHP Form validation FINISH -->