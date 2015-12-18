<!DOCTYPE HTML>
<HTML>
<HEAD>
  <TITLE> This is a php </TITLE>
</HEAD>
<BODY>
<h1> This is from html </h1>
<h2> This is another html </h2>

<p>
    <?php
    $x = 3;
    $course = "ITC 3314";
    $pass = FALSE;
    $grade = 88.9;

    echo "This is a <b>message</b> from <u>php!</u>";
    echo "<br>";
    echo $x ." is a " . gettype($x) . " ";
    echo var_dump($x);
    echo "<br>";
    echo $course . " is a " . gettype($course) . " ";
    echo var_dump($course);

    echo "<br>";
    echo $course{2};

    echo "<br>";
    echo $pass . " is a " . gettype($pass). " ";
    echo var_dump($pass);
    echo "<br>";
    echo $grade . " is a " . gettype($grade) . " ";
    echo var_dump($grade);
    echo "<br>";


    ?>
</p>

</BODY>
</HTML>

