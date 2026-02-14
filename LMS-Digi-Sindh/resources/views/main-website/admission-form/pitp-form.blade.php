<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>PITP Application Form | Digital Sindh Institute</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('dsimt/images/logo/logo.png') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('dsimt/Admission_Form/assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('dsimt/Admission_Form/assets/css/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('dsimt/Admission_Form/assets/css/main.css') }}" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <style>.float{position:fixed;width:60px;height:60px;bottom:40px;left:40px;background-color:#25d366;color:#FFF;border-radius:50px;text-align:center;font-size:30px;box-shadow:2px 2px 3px #999;z-index:100}.my-float{margin-top:16px}</style>
</head>
<body>
    <a href="https://api.whatsapp.com/send?phone=+923060934322&text=Hi%2C%20I%20would%20like%20to%20know%20more%20about%20your%20services." class="float" target="_blank"><i class="fa fa-whatsapp my-float"></i></a>
    <div class="container-fluid">
        <div class="col-lg-3 col-md-6 col-sm-12">
            <a href="{{ route('index') }}"><img src="{{ asset('dsimt/images/logo/logo1.png') }}" class="mt-5" alt="" width="100%"></a>
        </div>
        <h3 class="mt-3 text-center wow bounce" data-wow-delay=".2s">Transform Your Future — Enroll in the <br><span id="loop" style="color: #012169;">100% Free PITP</span> at Digital Sindh</h3>
        <p class="mt-2 text-center wow tada" data-wow-delay=".6s">Enhance your digital journey with PITP — a 100% free program by Digital Sindh. Learn practical IT skills, <br> gain confidence, and step into a brighter,<span class="p-1 text-white bg-primary rounded wow zoomIn" data-wow-delay=".8s"> tech-driven future.</span></p>
        <div class="row mt-5">
            <div class="col-lg-7 col-sm-12 wow bounceIn" data-wow-delay=".10s">
                <section class="login section" style="margin-top: -30px;">
                    <div class="row">
                        <div class="col-lg-10 offset-lg-3 col-md-8 offset-md-2 col-12">
                            <div class="form-head">
                                <h4 class="title text-center">Application Form</h4>
                                <p class="text-end">Date: {{ date('Y/F/d') }}</p>
                                <p class="text-info">Form submission will be available after Laravel backend configuration.</p>
                                <form action="#" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-6 col-sm-12 form-group">
                                            <label>Full Name</label>
                                            <input class="margin-5px-bottom" type="text" name="names" placeholder="Enter Name as per CNIC" required>
                                        </div>
                                        <div class="col-lg-6 col-sm-12 form-group">
                                            <label>Father Name</label>
                                            <input class="margin-5px-bottom" type="text" name="fname" placeholder="Father Name as per CNIC" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>CNIC / B-Form</label>
                                        <input class="margin-5px-bottom" type="text" name="cnic" placeholder="_____-_______-_" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input class="margin-5px-bottom" type="email" name="email" placeholder="Enter Your Email Address" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Qualification</label>
                                        <select class="form-select" name="qualification" required>
                                            <option value="" disabled selected>Select your Qualification</option>
                                            <option value="Matriculation">Matriculation</option>
                                            <option value="Intermediate">Intermediate</option>
                                            <option value="UnderGraduate">Under-Graduate</option>
                                            <option value="Graduated">Graduated</option>
                                        </select>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 col-sm-12 form-group">
                                            <label>Domicile</label>
                                            <select class="form-select" name="domicile" required>
                                                <option value="" disabled selected>Select your Domicile District</option>
                                                <option value="Hyderabad">Hyderabad</option>
                                                <option value="Karachi">Karachi</option>
                                                <option value="Other">Other</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-6 col-sm-12 form-group">
                                            <label>Course</label>
                                            <select class="form-select" name="course" required>
                                                <option value="" disabled selected>Select your Course</option>
                                                <option value="Web Development">Web Development</option>
                                                <option value="Digital Marketing">Digital Marketing</option>
                                                <option value="Graphic Design">Graphic Design</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 col-sm-12 form-group">
                                            <label>Date of Birth</label>
                                            <input class="margin-5px-bottom" type="date" name="DOB" required>
                                        </div>
                                        <div class="col-lg-6 col-sm-12 form-group">
                                            <label>Gender</label>
                                            <select class="form-select" name="gender" required>
                                                <option value="" disabled selected>Select Gender</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Address</label>
                                        <textarea class="margin-5px-bottom" name="address" placeholder="Enter your address" required></textarea>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 col-sm-12 form-group">
                                            <label>Contact</label>
                                            <input class="margin-5px-bottom" type="text" name="contact" placeholder="Phone number" required>
                                        </div>
                                        <div class="col-lg-6 col-sm-12 form-group">
                                            <label>WhatsApp</label>
                                            <input class="margin-5px-bottom" type="text" name="wcontact" placeholder="WhatsApp number" required>
                                        </div>
                                    </div>
                                    <div class="button">
                                        <button type="submit" class="btn">Submit Application</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <script src="{{ asset('dsimt/Admission_Form/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('dsimt/Admission_Form/assets/js/wow.min.js') }}"></script>
</body>
</html>
