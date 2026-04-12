<html>
<head>
</head>
<body>
        <!-- <form action="string_functions.php">
        <label></label><input type="text" name="username" placeholder="enter your name" required >
        <input type="submit" >
        </form> -->
        <?php
        $username = $_POST['username'];
        echo "Original String: " . $username . "<br>";
        $len=strlen($username);
        echo "length of your name is $len"."<br>";
        echo "number of words in your string is ".str_word_count($username)."<br>";
        echo "reverse of your name is ".strrev($username)."<br>";
        echo "Case Conversion:<br>";
        echo "Uppercase: " . strtoupper($username) . "<br>";
        echo "Lowercase: " . strtolower($username) . "<br>";
        echo "First Letter Uppercase: " . ucfirst($username) . "<br>";
        echo "First Letter of Each Word Uppercase: " . ucwords($username) . "<br>";
        echo "working with search and replace";
        echo "positio of d in your name $username is ".strpos($username,'d')."<br>";
        echo "replacing a with i in your name ".str_replace("a","i",$username)."<br>";
        echo "sub string of your name $username from inderx 2 to 5 is ".substr($username,2,3)."<br>";
        echo "trimmed string is '".trim("  ".$username."  ")."'"."<br>";
        echo "lets do left trimming on the string \"  ".$username."  \" : '".ltrim("  ".$username."  ")."'"."<br>";
        echo "lets do right trimming on the string \"  ".$username."  \" : '".rtrim("  ".$username."  ")."'"."<br>";
        $space=strpos($username,' ');
        echo $space;
        $firstname=substr($username,0,$space);
        $lastname=substr($username,$space+1);
        echo "your first name is $firstname"."<br>";
        echo "your last name is $lastname"."<br>";
        if(strcmp($firstname,$lastname)==0){
            echo "your first name and last name are same"."<br>";
        }
        elseif (strcmp($firstname,$lastname)>0) {
            echo "your first name is greater than last name"."<br>";
        }
        else{
            echo "your first name is less than last name"."<br>";
        }
        if(strcasecmp($firstname,$lastname)==0){
            echo "your first name and last name are same"."<br>";
        }
        elseif (strcasecmp($firstname,$lastname)>0) {
            echo "your first name is greater than last name"."<br>";
        }
        else{
            echo "your first name is less than last name"."<br>";
        }
        

        ?>
</body>
</html>