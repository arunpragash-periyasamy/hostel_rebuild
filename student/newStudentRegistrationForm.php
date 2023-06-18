<!-- main content start -->

<div class="page-wrapper cardhead ">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">Student Login Registration</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item active">Student Login Registration</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-6 d-flex">
                <div class="card flex-fill">
                    <div class="card-header">
                        <h5 class="card-title">Student Login Registration</h5>
                    </div>
                    <div class="card-body">
                        <form action="" id="form">
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Student Name</label>
                                <div class="col-lg-9">
                                    <input type="text" name="student_name" class="form-control student_name" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Roll Number</label>
                                <div class="col-lg-9">
                                    <input type="text" name="roll_number" class="form-control roll_number" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Email Address</label>
                                <div class="col-lg-9">
                                    <input type="text" name="email_id" class="form-control email_id" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Gender</label>
                                <div class="col-lg-9 ">
                                    <span class="gender">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" id="gender_male"
                                                value="boy" checked />
                                            <label class="form-check-label" for="gender_male">
                                                Male
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                    </span>
                                    <input class="form-check-input" type="radio" name="gender" id="gender_female"
                                        value="girl" />
                                    <label class="form-check-label" for="gender_female">
                                        Female
                                    </label>
                                </div>
                            </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Blood Group</label>
                        <div class="col-lg-9">
                            <select class="form-select blood_group" aria-label="select example" name="blood_group">
                                <option selected hidden value="">Blood Group</option>
                                <option value="O+">O+</option>
                                <option value="A+">A+</option>
                                <option value="B+">B+</option>
                                <option value="AB+">AB+</option>
                                <option value="O-">O-</option>
                                <option value="A-">A-</option>
                                <option value="B-">B-</option>
                                <option value="AB-">AB-</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Branch</label>
                        <div class="col-lg-9">
                            <select class="form-select branch" aria-label="select example" name="branch">
                                <option selected hidden value="">Branch</option>
                                <option value="BE">B.E</option>
                                <option value="BTECH">B.Tech</option>
                                <option value="BSC">BSc</option>
                                <option value="MSC">MSc</option>
                                <option value="MCA">MCA</option>
                                <option value="ME">M.E</option>
                                <option value="MBA">MBA</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Course</label>
                        <div class="col-lg-9">
                            <select class="form-select course" aria-label="select example" name="course">
                                <option selected hidden value="">Course</option>
                                <option value="CSE">Computer Science Engineering</option>
                                <option value="IT">Information Technology</option>
                                <option value="FT">Food Technology</option>
                                <option value="CIVIL">Civil Engineering</option>
                                <option value="SS">Software Systems</option>
                                <option value="CSD">Computer Science Design</option>
                                <option value="ECE">Electronics and Communication Engineering</option>
                                <option value="EIE">Electronics & Instrumental Engineering</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Password</label>
                        <div class="col-lg-9">
                            <input type="password" name="password" class="form-control password" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Repeat Password</label>
                        <div class="col-lg-9">
                            <input type="password" name="confirm_password" class="form-control confirm_password" />
                        </div>
                    </div>
                    <input type="number" name="id" value="0" hidden>
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">
                            Submit
                        </button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- main content ends -->




<?php
//  include "./files/script.html";?>
<script>
    $(document).ready(() => {

        $("#form").on("submit", (event) => {
            // preventing the form submission
            event.preventDefault();

            // // // removing error when the form submitting
            // removeError();

            // //   validating the form data

            // // check student name
            // checkValue("student_name", "Enter student name", "input");

            // // check roll number
            // checkValue("roll_number", "Enter roll number", "input");

            // // check email id
            // checkValue("email_id", "Enter college email");

            // checkValue("blood_group", "Select Blood Group", "select");

            // checkValue("branch", "Select branch");

            // checkValue("course", "Select Course");

            // checkValue("password", "Enter the password");

            // checkValue("confirm_password", "Enter the confirm password");

            // password = $(".password").val();
            // confirm_password = $(".confirm_password").val();
            // if (confirm_password != "" && password != confirm_password) {
            //     addError("confirm_password", "Password does not match");
            // }

            // // getting the form data and convert into the array

            if(!error){
                submitForm("student_registration", "insert");
            }
        })
    })
</script>