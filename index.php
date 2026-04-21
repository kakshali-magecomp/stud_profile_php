<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    echo "submit";
    $name = htmlspecialchars($_POST['sname']);
    echo $name;
    $email = htmlspecialchars($_POST['semail']);
    echo $email;
    $age = htmlspecialchars($_POST['sage']);
    echo $age;
    $gender = htmlspecialchars($_POST['sgender']) ?? "";
    echo $gender;
    $course = htmlspecialchars($_POST['scourse']);
    echo $course;
    $skill = htmlspecialchars($_POST['sskill']) ?? "";
    echo $skill;
    if (isset($_POST['Hobbies'])) {
        $hobbies = $_POST['Hobbies']; 
    }
    print_r($hobbies);
    if (isset($_POST['Terms'])) {
        $terms = $_POST['Terms']; 
    }
   print_r($terms);
    // if (!($name) || !($email) || !($age) || !($gender) || !($course) || !($skill) || count($terms) == 0 || count($hobbies) == 0) {
    //     echo "<script>alert('All fields are required!');</script>";
    // } else {

        $student = [
            "name" => $name,
            "email" => $email,
            "age" => $age,
            "gender" => $gender,
            "course" => $course,
            "hobbies" => implode(", ", $hobbies),
            "skill" => $skill,
            "terms" => implode(", ", $terms)
        ];
        $stu[] = $student;
 
    }
// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Details</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="contain">
        <h1>Student Profile</h1>
        
            <form id="sform" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                <div>
                <label>Student Full Name</label>
                <input type="text" name ="sname" ><span id="demo1"></span><br>
                </div>

                <div>
                <label>Email</label>
                <input type="text" name="semail" ><span id="demo2"></span><br>
                </div>

                <div>
                <label>Age</label>
                <input type="number" name="sage" ><span id="demo3"></span><br>
                </div>

                <div>
                <label>Gender</label><span id="demo4"></span><br>
                <input type="radio" name="sgender" value="Male" id="Male" class="sgender"><label for="Male">Male</label>
                <input type="radio" name="sgender" value="Female" id="Female" class="sgender"><label for="Female">Female</label>
                <input type="radio" name="sgender" value="Other" id="Other" class="sgender"><label for="Other">Other</label><br>
                </div>

                <div>
                <label>Course</label>
                <select id="scourse">
                    <option value="select" selected>- Select -</option>
                    <option value="other" >- Other -</option>
                    <option value="MCA">- BCA -</option>
                    <option value="MCA">- MCA -</option>
                    <option value="Deploma">- Deploma -</option>
                    <option value="B.com">- B.com -</option>
                    <option value="Other">- M.com -</option>
                </select><span id="demo5"></span><br>
                </div>

                <div>
                <label>Hobbies</label><span id="demo6"></span><br>
                <input type="checkbox" name="Hobbies[]" value="Reading" id="Reading" class="Hobbies"><label for="Reading">Reading</label>
                <input type="checkbox" name="Hobbies[]" value="Travelling" id="Travelling" class="Hobbies"><label for="Travelling">Travelling</label>
                <input type="checkbox" name="Hobbies[]" value="Singing" id="Singing" class="Hobbies"><label for="Singing">Singing</label>
                <input type="checkbox" name="Hobbies[]" value="Dancing" id="Dancing" class="Hobbies"><label for="Dancing">Dancing</label>
                <input type="checkbox" name="Hobbies[]" value="Other" id="Otherh" class="Hobbies"><label for="Otherh">Other</label>
                </div>

                <div>
                <label>Skill Level</label><span id="demo7"></span><br>
                <input type="radio" name="sskill" value="Beginner" id="Beginner" class="sskill"><label for="Beginner">Beginner</label>
                <input type="radio" name="sskill" value="Intermediate" id="Intermediate" class="sskill"><label for="Intermediate">Intermediate</label>
                <input type="radio" name="sskill" value="Advanced" id="Advanced" class="sskill"><label for="Advanced">Advanced</label><br>
                </div>

                <div id="Terms" class="fcenter">
                <input type="checkbox" name="Terms[]" value="true" id="terms"><label for="terms">Terms and Condition</label><span id="demo8"></span>
                </div>

                <div class="fcenter">
                    <button  type="submit">Submit</button>
                </div>

            </form>
      
            <table align="center" id="stable">
                <thead class="thead">
                    <th>Student Name</th>
                    <th>Email</th>
                    <th>Age</th>
                    <th>Gender</th>
                    <th>Course</th>
                    <th>Hobbies</th>
                    <th>Skill Level</th>
                    <th>Terms Accepted</th>
                </thead>
                <tbody id="tbody">
                    <?php foreach ($stu as $s): ?>

                        <tr>
                            <td><?php echo $s['name']; ?></td>
                            <td><?php echo $s['email']; ?></td>
                            <td><?php echo $s['age']; ?></td>
                            <td><?php echo $s['gender']; ?></td>
                            <td><?php echo $s['course']; ?></td>
                            <td><?php echo $s['hobbies']; ?></td>
                            <td><?php echo $s['skill']; ?></td>
                            <td><?php echo $s['terms']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
    </div>
</body>
</html>