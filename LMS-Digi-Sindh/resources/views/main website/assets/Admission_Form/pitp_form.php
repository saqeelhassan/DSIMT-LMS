<?php

$conn = mysqli_connect("localhost", "dsimtedu_AdminDB", "dsimtedu@unar", "dsimtedu_DSIMTDB");

$message = null;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['names'];
    $fname = $_POST['fname'];
    $cnic = $_POST['cnic'];
    $email = $_POST['email'];
    $qualification = $_POST['qualification'];
    $domicile = $_POST['domicile'];
    $course = $_POST['course'];
    $dob = $_POST['DOB'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $phone = $_POST['contact'];
    $whatsapp = $_POST['wcontact'];
    $publish = date("Y/F/d");

    // Check duplicates
    $sql = "SELECT * FROM pitpform WHERE cnic = ? AND email = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $cnic, $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) == 0) {
        mysqli_stmt_close($stmt);

        // Insert new record
        $insert_sql = "INSERT INTO pitpform (fullname, fname, cnic, email, dob, gender, domicile, course, adress, qualification, phone_num, whatsapp, added_on)
                       VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $insert_stmt = mysqli_prepare($conn, $insert_sql);

        if ($insert_stmt) {
            mysqli_stmt_bind_param($insert_stmt, "sssssssssssss", $name, $fname, $cnic, $email, $dob, $gender, $domicile, $course, $address, $qualification, $phone, $whatsapp, $publish);

            if (mysqli_stmt_execute($insert_stmt)) {
                echo "<script>
                    document.addEventListener('DOMContentLoaded', function() {
                        var myModal = new bootstrap.Modal(document.getElementById('successModal'));
                        myModal.show();
                    });
                </script>";
            } else {
                echo "<p class='text-danger'>Error inserting data: " . mysqli_error($conn) . "</p>";
            }

            mysqli_stmt_close($insert_stmt);
        } else {
            echo "<p class='text-danger'>Error preparing insert statement: " . mysqli_error($conn) . "</p>";
        }

    } else {
        $message = "<p class='text-danger'>Email & CNIC is already taken.</p>";
    }

    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html class="no-js" lang="en">


<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Digital Sindh Institute of Management & Technology</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/logo/logo.png" />
    <!-- Place favicon.ico in the root directory -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Web Font -->
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
        rel="stylesheet">

    <!-- ========================= CSS here ========================= -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/animate.css" />
    <link rel="stylesheet" href="assets/css/main.css" />


    
<style>


    .float{
        position:fixed;
        width:60px;
        height:60px;
        bottom:40px;
        left:40px;
        background-color:#25d366;
        color:#FFF;
        border-radius:50px;
        text-align:center;
      font-size:30px;
        box-shadow: 2px 2px 3px #999;
      z-index:100;
    }
    
    .my-float{
        margin-top:16px;
    }
</style>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<a href="https://api.whatsapp.com/send?phone=+923060934322&text=Hi%2C%20I%20would%20like%20to%20know%20more%20about%20your%20services." class="float" target="_blank">
<i class="fa fa-whatsapp my-float"></i>
</a>



</head>

<body>
    <div class="container-fluid">
        <div class="col-lg-2 col-md-4 col-sm-6">
            <a href="../index.php"><img src="assets/images/logo/logo1.png" class="mt-4" alt="" width="100%"></a>
        </div>
        <h3 class="mt-3 text-center wow bounce" data-wow-delay=".2s">
            Transform Your Future - Enroll in the <br><span id="loop" style="color: #012169;"> 100% Free PITP</span> at Digital Sindh
        </h3>
        <!--<p class="mt-2 text-center wow tada" data-wow-delay=".6s">-->
        <!--    Enhance your digital journey with PITP - a 100% free program by Digital Sindh. Learn practical IT skills, <br> gain confidence, and step into a brighter,<span class="p-1 text-white bg-primary rounded wow zoomIn" data-wow-delay=".8s"> tech-driven future.</span> -->
        <!--</p>-->
        <p class="mt-2 text-center wow tada" data-wow-delay=".8s">
            Please send the following documents along with your full name to 0319-2934322 for the PITP registration <br> <b>process:</b> Passport size photo, Domicile/Form-C, and Latest Marksheet.
        </p>
        <div class="row mt-5">
            <div class="col-lg-7 col-sm-12 wow bounceIn" data-wow-delay=".10s">
                <section class="login section" style="margin-top: -30px;">
                    <div class="row">
                        <div class="col-lg-10 offset-lg-3 col-md-8 offset-md-2 col-12">
                            <div class="form-head">
                                <h4 class="title text-center">Application Form</h4>
                                <p class="text-end"><?php echo "Date: ".date("Y/F/d");?></p>
                                <?php echo $message;?>
                                <form action="#" method="post">
                                    <div class="row">
                                        <div class="col-lg-6 col-sm-12 form-group">
                                            <label>Full Name</label>
                                            <input class="margin-5px-bottom" type="text" id="Username1" name="names" placeholder="Enter Name as per CNIC" required disabled>
                                        </div>
                                        <div class="col-lg-6 col-sm-12 form-group">
                                            <label>Father Name</label>
                                            <input class="margin-5px-bottom" type="text" id="exampleInputName1" name="fname" placeholder="Father Name as per CNIC" required disabled>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>CNIC / B-Form</label>
                                        <input class="margin-5px-bottom" type="text" id="cnic" name="cnic" placeholder="_____-_______-_" required disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <div class="position-relative">
                                            <input class="margin-5px-bottom" type="email" id="email" name="email" placeholder="Enter Your Email Adress" disabled>
                                            <p id="result" class="text-end position-absolute" style="top: 15px; right: 22px;"></p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Qualification</label>
                                        <select class="form-select" name="qualification" aria-label="Default select example" id="qualification" required disabled>
                                            <option value="" disabled selected>Select your Qualification</option>
                                            <option value="Matriculation">Matriculation</option>
                                            <option value="Intermediate">Intermediate</option>
                                            <option value="UnderGraduate">Under-Graduate</option>
                                            <option value="Graduated">Graduated</option>
                                        </select>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 col-sm-12 form-group">
                                            <label for="coursetype">Domicile</label>
                                            <select class="form-select" name="domicile" aria-label="Default select example" id="" required disabled>
                                                <option value="" disabled selected>Select your Domicile District</option>
                                                <option value="Badin">Badin</option>
                                                <option value="Dadu">Dadu</option>
                                                <option value="Hyderabad">Hyderabad</option>
                                                <option value="Matiary">Matiary</option>
                                                <option value="Mirpur Khas">Mirpur Khas</option>
                                                <option value="Sujawal">Sujawal</option>
                                                <option value="Tando Allahyar">Tando Allahyar</option>
                                                <option value="Thatta">Thatta</option>
                                                <option value="Tando Muhammad Khan">Tando Muhammad Khan</option>
                                                <option value="Umerkot">Umerkot</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-6 col-sm-12 form-group">
                                            <label for="course">Course</label>
                                            <select class="form-select" name="course" aria-label="Default select example" id="course" required disabled>
                                                <option value="" disabled></option>
                                                <option value="" disabled>--- Firstly Select your Qualification ---</option>
                                            </select>
                                            <!-- <p class="text-secondary" id="time">Time: _</p> -->
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 col-sm-12 form-group">
                                            <label>Date of Birth</label>
                                            <input class="margin-5px-bottom" type="date" id="dob" name="DOB" required disabled>
                                        </div>
                                        <div class="col-lg-6 col-sm-12 form-group">
                                            <label class="form-label">Gender</label>
                                            <div class="d-flex justify-content-between" style="width: 100%;">
                                                <div class="form-check d-flex" style="width: 50%;">
                                                    <input class="w-25" type="radio" name="gender" id="male" value="Male" required disabled>
                                                    <label class="form-check-label mt-3 mx-2" for="male">
                                                        Male
                                                    </label>
                                                </div>
                                                <div class="form-check d-flex" style="width: 50%;">
                                                    <input class="w-25" type="radio" name="gender" id="female" value="Female" required disabled>
                                                    <label class="form-check-label mt-3 mx-2" for="female">
                                                        Female
                                                    </label>
                                                </div>
                                                <div class="form-check d-flex" style="width: 50%;">
                                                    <input class="w-25" type="radio" name="gender" id="other" value="Other" required disabled>
                                                    <label class="form-check-label mt-3 mx-2" for="other">
                                                        Other
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input disabled class="margin-5px-bottom" type="text" name="address" placeholder="C#08 opp: Step school, Ali Palace to Bypass Road, Phase-II Qasimabad, Hyderabad" required>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 col-sm-12 form-group">
                                            <label>Phone Number</label>
                                            <input class="margin-5px-bottom contact" type="text" id="contact" name="contact" maxlength="12" placeholder="03060934322" required disabled>
                                        </div>
                                        <div class="col-lg-6 col-sm-12 form-group">
                                            <label>Whatsapp Contact</label>
                                            <input class="margin-5px-bottom contact" type="text" id="cont" name="wcontact" maxlength="12" placeholder="03257915718" required disabled>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-5 col-sm-6 button">
                                        <button type="submit" class="btn">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="col-lg-5 col-sm-12 pt-5 mt-lg-5 mt-sm-0">
                <img src="assets/images/logo/Badge.png" alt="" class="img-fluid mt-5 wow rotateInUpRight" data-wow-delay=".12s">
            </div>
        </div>
    </div>

    <!-- ✅ Modal -->
    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content w-75">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title text-white" id="successLabel">PITP Registration is closed now</h5>
                </div>
                <div class="modal-body">
                    <!--<b>🎉 Congratulations! Your admission has been successfully completed.</b>-->
                    <!--We will contact you as soon as possible via WhatsApp or email for further information.-->
                    <b>Dear Students,</b><br>
                    We would like to inform you that the PITP registration has now been closed.
                    Thank you to everyone who successfully completed their registration. Further updates and information will be shared soon via <b>WhatsApp or email.</b>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Start Footer -->
    <footer class="footer">
        <div class="footer-bottom">
            <div class="container">
                <div class="inner">
                    <div class="row">
                        <div class="col-12">
                            <div class="left">

                                <!-- <p>Designed and Developed by<a href="https://www.facebook.com/lutifjan.junejo" 
                                        target="_blank">Lutuf Ali Junejo</a></p> -->
                                


                                        <p><strong>@Copy right 2025 Digital Sindh Institute of Management & Technology</strong>
                                        </p>
                                    

                                    </div>



                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Footer Middle -->

    </footer>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/wow.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var myModal = new bootstrap.Modal(document.getElementById('successModal'));
        myModal.show();
    });
</script>

<script>

    const courses = {
        Matriculation: ["Digital Marketing", "E-Commerce", "Graphic Designing", "Python Development", "Social Media Management", "Web Development"],
        Intermediate: ["Cloud Computing", "Cyber Security","Database Administration", "Data Science", "Digital Marketing", "E-Commerce", "Graphic Designing", "Java Development", "Mobile App Development", "Python Development", "Social Media Management", "Web Development"],
        UnderGraduate: ["Cloud Computing", "Cyber Security","Database Administration", "Data Science", "Digital Marketing", "E-Commerce", "Graphic Designing", "Java Development", "Mobile App Development", "Python Development", "Social Media Management", "Web Development"],
        Graduated: ["Cloud Computing", "Cyber Security","Database Administration", "Data Science", "Digital Marketing", "E-Commerce", "Graphic Designing", "Java Development", "Mobile App Development", "Python Development", "Social Media Management", "Web Development"],
    };

    const qualification = document.getElementById("qualification");
    const course = document.getElementById("course");

    qualification.addEventListener("change", function(){
        course.innerHTML = "";

        let selectedType = this.value;

        if(selectedType && courses[selectedType]){
            if (courses[selectedType].length === 0) {
                // Sirf tab show kare jab courses empty ho
                course.innerHTML = "<option value='' disabled selected>--- Not Yet Available ---</option>";
            } else {
                // Jab courses available ho
                course.innerHTML = "<option value='' disabled selected>--- Select your Course ---</option>";
                courses[selectedType].forEach(function (c) {
                    let option = document.createElement("option");
                    option.value = c.toLowerCase().replace(/\s+/g, "_");
                    option.text = c;
                    course.appendChild(option);
                });
            }
        }
    });

    // const course_time = {
    //     cyberSecurity: "12PM to 03PM",
    //     digitalMarketing: "12PM to 03PM",
    //     ECommerce: "09AM to 12PM",
    //     graphicDesigning: "03PM to 06PM",
    //     pythonDevelopment: "06PM to 09PM",
    //     webDevelopment: "09AM to 12PM",
    // };

    // const time = document.getElementById("time");
    // const course = document.getElementById("course");

    // course.addEventListener("change", function(){
    //     let selectedCourse = this.value;

    //     if(selectedCourse && course_time[selectedCourse]){
    //       time.textContent = ("Time: " + course_time[selectedCourse]);
    //     }else{
    //         time.textContent = ("Time: _");
    //     }
    // });

    const cnicInput = document.getElementById("cnic");
    let isBackspace = false;

// Detect if Backspace key is pressed
cnicInput.addEventListener("keydown", function (e) {
  isBackspace = e.key === "Backspace";
});

cnicInput.addEventListener("input", function (e) {
  let rawValue = e.target.value.replace(/[^0-9]/g, "");
  
  if (isBackspace) {
    rawValue = rawValue.slice(0, -1);
  }

  let formatted = "";
  for (let i = 0; i < 13; i++) {
    if (i < rawValue.length) {
      formatted += rawValue[i];
    } else {
      formatted += "_";
    }

    if (i === 4 || i === 11) {
      formatted += "-";
    }
  }

  e.target.value = formatted;
  isBackspace = false;
});


let isDeleting = false;
  document.querySelector(".contact").addEventListener("keydown", function (e) {
        if (e.key === "Backspace") {
            isDeleting = true;
        }
    });
    
    const contacts = document.getElementsByClassName("contact");

        for (let i = 0; i < contacts.length; i++) {
            contacts[i].addEventListener("input", function (e) {
            let value = e.target.value.replace(/[^0-9-]/g, "");

            // if (value.length === 4 && !value.includes("-")) {
            //     value += "-";
            // } else if (value.length > 4 && value[4] !== "-") {
            //     value = value.slice(0, 4) + "-" + value.slice(4).replace("-", "");
            // }

            e.target.value = value;
            isDeleting = false;

        });
    }


    const loop = document.getElementById("loop");

    setInterval(() => {
        loop.classList.remove("animate__animated", "animate__bounceIn");

        void loop.offsetWidth;

        loop.classList.add("animate__animated", "animate__bounceIn");
    }, 2000);
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
    const validateEmail = (email) => {
        return email.match(
            /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
        );
    };

    const validate = () => {
        const $result = $('#result');
        const email = $('#email').val();
        $result.text('');

        if(validateEmail(email)){
            $result.html('<i class="fa-solid fa-circle-check"></i>');
            $result.css({'color': 'green','font-size': '18px'});
        } else{
            $result.html('<i class="fa-solid fa-circle-xmark"></i>');
            $result.css({'color': 'red', 'font-size': '18px'});
        }
        return false;
    }

    $('#email').on('input', validate);


</script>

