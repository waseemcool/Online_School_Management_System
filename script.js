//Go To The Page
function goToHome() {

    window.location = "index.php";

}

function goToAdminHomeDashboard() {

    window.location = "adminHomeDashboard.php";

}

function goToAdminHomeTeacher() {

    window.location = "adminHomeTeacher.php";

}

function goToAdminHomeStudent() {

    window.location = "adminHomeStudent.php";

}

function goToAdminHomeAcademicOfficer() {

    window.location = "adminHomeAcademicOfficer.php";

}

function goToAdminProfile() {

    window.location = "adminProfile.php";

}
//Go To The Page

//Teacher register and Send Invitation
function teacherRegSendInvitation() {

    var email = document.getElementById("e").value;
    var username = document.getElementById("un").value;
    var password = document.getElementById("pw").value;

    var form = new FormData();
    form.append("email", email);
    form.append("username", username);
    form.append("password", password);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function() {
        if (request.readyState == 4) {
            var response = request.responseText;
            if (response == "Success") {
                swal({
                    title: "Teacher Registered and Invitation Sent Successfully!!!",
                    icon: "success",
                    button: "Ok",
                });
            } else {
                swal({
                    title: response,
                    icon: "error",
                    button: "Ok",
                });
            }
        }
    };

    request.open("POST", "teaRegSendInvitProcess.php", true);
    request.send(form);

}
//Teacher register and Send Invitation

//Academic Officer register and Send Invitation
function aoRegSendInvitation() {

    var email = document.getElementById("e").value;
    var username = document.getElementById("un").value;
    var password = document.getElementById("pw").value;

    var form = new FormData();
    form.append("email", email);
    form.append("username", username);
    form.append("password", password);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function() {
        if (request.readyState == 4) {
            var response = request.responseText;
            if (response == "Success") {
                swal({
                    title: "Academic Officer Registered and Invitation Sent Successfully!!!",
                    icon: "success",
                    button: "Ok",
                });
            } else {
                swal({
                    title: response,
                    icon: "error",
                    button: "Ok",
                });
            }
        }
    };

    request.open("POST", "aoRegSendInvitProcess.php", true);
    request.send(form);

}
//Academic Officer register and Send Invitation

//Sign In
var bmodal;

function signIn(user) {

    var username = document.getElementById("un").value;
    var password = document.getElementById("pw").value;

    var form = new FormData();
    form.append("user", user);
    form.append("username", username);
    form.append("password", password);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function() {
        if (request.readyState == 4) {

            var response = request.responseText;

            if (response == "Unverified") {

                var modal = document.getElementById("VModal");
                bmodal = new bootstrap.Modal(modal);
                bmodal.show();

            } else if (response == "Success") {

                if (user == "Teacher") {
                    window.location = "teacherHome.php";
                } else if (user == "Student") {
                    window.location = "studentHome.php";
                } else if (user == "Academic_Officer") {
                    window.location = "academicOfficerHome.php";
                } else {
                    window.location = "adminHomeDashboard.php";
                }

                //window.location = user + "Home.php";

            } else {
                swal({
                    title: response,
                    icon: "error",
                    button: "Ok",
                });
                //alert(response); 
            }

        }
    };

    request.open("POST", "signInProcess.php", true);
    request.send(form);

}
//Sign In

//Sign In Verify
function signInVerify(user) {

    var username = document.getElementById("un").value;
    var vcode = document.getElementById("svc").value;

    var form = new FormData();
    form.append("username", username);
    form.append("vcode", vcode);
    form.append("user", user);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function() {
        if (request.readyState == 4) {

            var response = request.responseText;

            if (response == "Success") {

                // var URL = user + "Home.php";
                // window.location = URL;
                if (user == "Teacher") {
                    window.location = "teacherHome.php";
                } else if (user == "Student") {
                    window.location = "studentHome.php";
                } else if (user == "AcademicOfficer") {
                    window.location = "academicOfficerHome.php";
                } else {
                    window.location = "adminHomeDashboard.php";
                }

            } else {
                swal({
                    title: response,
                    icon: "success",
                    button: "Ok",
                });
                //alert(response);
            }

        }
    }

    request.open("POST", "signInVerifyProcess.php", true);
    request.send(form);

}
//Sign In Verify

//Sign Out
function signOut() {

    var request = new XMLHttpRequest();

    request.onreadystatechange = function() {
        if (request.readyState == 4) {

            var response = request.responseText;

            if (response == "Success") {
                window.location = "index.php";
            } else {
                swal({
                    title: response,
                    icon: "error",
                    button: "Ok",
                });
            }

        }
    };

    request.open("POST", "signOutProcess.php", true);
    request.send();

}
//Sign Out

// function loadDashboard() {

//     var div = document.getElementById("ahp");

//     var request = new XMLHttpRequest();

//     request.onreadystatechange = function() {
//         if (request.readyState == 4) {
//             var text = request.responseText;
//             div.innerHTML = text;
//         }
//     };

//     request.open("POST", "loadDashboard.php", true);
//     request.send();

// }

//Load All Teachers
function loadAllTeachers() {

    var div = document.getElementById("t");

    var request = new XMLHttpRequest();

    request.onreadystatechange = function() {
        if (request.readyState == 4) {
            var text = request.responseText;
            div.innerHTML = text;
        }
    };

    request.open("POST", "loadAllTeachers.php", true);
    request.send();

}
//Load All Teachers

//Load Teacher Details
function loadTeacherDetails(id) {

    var div = document.getElementById("t");

    var form = new FormData();
    form.append("id", id);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function() {
        if (request.readyState == 4) {
            var text = request.responseText;
            div.innerHTML = text;
        }
    };

    request.open("POST", "loadTeacherDetails.php", true);
    request.send(form);

}
//Load Teacher Details

//Teacher Add Subject & Grade Modal
function openAddTsgModal() {

    var modal = document.getElementById("addTsgModal");
    bmodal = new bootstrap.Modal(modal);
    bmodal.show();

}
//Teacher Add Subject & Grade Modal

//Teacher Add Subject & Grade
function addTsg(id) {

    var tsubject = document.getElementById("ts").value;
    var tgrade = document.getElementById("tg").value;

    var form = new FormData();
    form.append("id", id);
    form.append("tsubject", tsubject);
    form.append("tgrade", tgrade);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function() {
        if (request.readyState == 4) {
            var response = request.responseText;
            if (response == "Success") {
                swal({
                    title: "Subject and Grade Added to the Teacher Successfully!!!",
                    icon: "success",
                    button: "Ok",
                });
                window.location.reload();
            } else {
                swal({
                    title: response,
                    icon: "error",
                    button: "Ok",
                });
            }
        }
    };

    request.open("POST", "addTsgProcess.php", true);
    request.send(form);

}
//Teacher Add Subject & Grade

//Teacher Delete Subject & Grade Modal
function openDelVerTsgModal() {

    var modal = document.getElementById("delTsgVerModal");
    bmodal = new bootstrap.Modal(modal);
    bmodal.show();

}
//Teacher Delete Subject & Grade Modal

//Teacher Delete Subject & Grade
function deleteTsg(id) {

    var form = new FormData();
    form.append("id", id);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function() {
        if (request.readyState == 4) {
            var response = request.responseText;
            if (response == "Success") {
                swal({
                    title: "Teacher's Subject and Grade Deleted Successfully!!!",
                    icon: "success",
                    button: "Ok",
                });
            } else {
                swal({
                    title: response,
                    icon: "error",
                    button: "Ok",
                });
            }
        }
    };

    request.open("POST", "deleteTsgProcess.php", true);
    request.send(form);

}
//Teacher Delete Subject & Grade

//Load All Students
function loadAllStudents() {

    var div = document.getElementById("s");

    var request = new XMLHttpRequest();

    request.onreadystatechange = function() {
        if (request.readyState == 4) {
            var text = request.responseText;
            div.innerHTML = text;
        }
    };

    request.open("POST", "loadAllStudents.php", true);
    request.send();

}
//Load All Students

//Load Student Details
function loadStudentDetails(id) {

    var div = document.getElementById("s");

    var form = new FormData();
    form.append("id", id);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function() {
        if (request.readyState == 4) {
            var text = request.responseText;
            div.innerHTML = text;
        }
    };

    request.open("POST", "loadStudentDetails.php", true);
    request.send(form);

}
//Load Student Details

//Change Student Grade Modal
function openChangeStudentGradeModal() {

    var modal = document.getElementById("changeStudentGradeModal");
    bmodal = new bootstrap.Modal(modal);
    bmodal.show();

}
//Change Student Grade Modal

//Change Student Grade
function changeStudentGrade(id) {

    var sgrade_id = document.getElementById("sg").value;

    var form = new FormData();
    form.append("id", id);
    form.append("sgrade_id", sgrade_id);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function() {
        if (request.readyState == 4) {
            var response = request.responseText;
            if (response == "Success") {
                swal({
                    title: "Student Grade Changed Successfully!!!",
                    icon: "success",
                    button: "Ok",
                });
            } else {
                swal({
                    title: response,
                    icon: "error",
                    button: "Ok",
                });
            }
        }
    };

    request.open("POST", "changeStudentGradeProcess.php", true);
    request.send(form);

}
//Change Student Grade

//Load All Academic Officers
function loadAllAcademicOfficers() {

    var div = document.getElementById("ao");

    var request = new XMLHttpRequest();

    request.onreadystatechange = function() {
        if (request.readyState == 4) {
            var text = request.responseText;
            div.innerHTML = text;
        }
    };

    request.open("POST", "loadAllAcademicOfficers.php", true);
    request.send();

}
//Load All Academic Officers

//Load Academic Officer Details
function loadAcademicOfficerDetails(id) {

    var div = document.getElementById("ao");

    var form = new FormData();
    form.append("id", id);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function() {
        if (request.readyState == 4) {
            var text = request.responseText;
            div.innerHTML = text;
        }
    };

    request.open("POST", "loadAcademicOfficerDetails.php", true);
    request.send(form);

}
//Load Academic Officer Details

//Admin Upload Photo
function adminUploadPhoto() {
    var photo_path = document.getElementById("aphotopath");
    var photo = document.getElementById("aphoto");

    photo_path.onchange = function() {
        var file = this.files[0];
        var url = window.URL.createObjectURL(file);

        photo.src = url;
    }
}
//Admin Upload Photo

//Admin Update Profile
function adminUpdateProfile() {

    var photo = document.getElementById("aphotopath");
    var username = document.getElementById("un").value;
    var password = document.getElementById("pw").value;
    var first_name = document.getElementById("fn").value;
    var last_name = document.getElementById("ln").value;
    var email = document.getElementById("e").value;

    var ag = document.getElementById("ag").value;

    var gender;

    if (ag == "Male") {
        gender = 1;
    } else if (ag == "Female") {
        gender = 2
    } else {
        gender = ag;
    }

    var form = new FormData();
    form.append("photo", photo.files[0]);
    form.append("username", username);
    form.append("password", password);
    form.append("first_name", first_name);
    form.append("last_name", last_name);
    form.append("email", email);
    form.append("gender", gender);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function() {
        if (request.readyState == 4) {
            var response = request.responseText;
            if (response == "Success") {
                swal({
                    title: "Profile Updated Successfully!!!",
                    icon: "success",
                    button: "Ok",
                });
            } else {
                swal({
                    title: response,
                    icon: "error",
                    button: "Ok",
                });
            }
        }
    };

    request.open("POST", "adminUpdateProfileProcess.php", true);
    request.send(form);

}
//Admin Update Profile

//Admin Remove Profile
function adminRemovePhoto() {

    var request = new XMLHttpRequest();

    request.onreadystatechange = function() {
        if (request.readyState == 4) {
            var response = request.responseText;
            if (response == "Success") {
                swal({
                    title: "Admin Photo Removed Successfully!!!",
                    icon: "success",
                    button: "Ok",
                });
            } else {
                swal({
                    title: response,
                    icon: "error",
                    button: "Ok",
                });
            }
        }
    };

    request.open("POST", "adminRemovePhotoProcess.php", true);
    request.send();

}
//Admin Remove Profile

//Teacher Add Lesson Note Modal
function openAddLessonNoteModal() {

    var modal = document.getElementById("addLessonNoteModal");
    bmodal = new bootstrap.Modal(modal);
    bmodal.show();

}
//Teacher Add Lesson Note Modal

//Teacher Load Grades
function loadTeacherGrades() {

    var subject = document.getElementById("s").value;

    var request = new XMLHttpRequest();

    request.onreadystatechange = function() {
        if (request.readyState == 4) {
            var response = request.responseText;
            var grade = document.getElementById("g");
            grade.innerHTML = response;
        }
    }

    request.open("GET", "loadTeacherGradeProcess.php?subject=" + subject, true);
    request.send();

}
//Teacher Load Grades

//Add Lesson Notes
function addLessonNote(id) {

    var subject = document.getElementById("s");
    var grade = document.getElementById("g");
    var note = document.getElementById("note");

    var form = new FormData();
    form.append("id", id);
    form.append("subject", subject.value);
    form.append("grade", grade.value);
    form.append("note", note.files[0]);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function() {
        if (request.readyState == 4) {
            var response = request.responseText;
            if (response == "Success") {
                window.location.reload();
            } else {
                swal({
                    title: response,
                    icon: "error",
                    button: "Ok",
                });
            }
        }
    }

    request.open("POST", "addLessonNoteProcess.php", true);
    request.send(form);

}
//Add Lesson Notes

//Teacher Load Lesson Notes
function loadLessonNotes() {

    var div = document.getElementById("t");

    var request = new XMLHttpRequest();

    request.onreadystatechange = function() {
        if (request.readyState == 4) {
            var text = request.responseText;
            div.innerHTML = text;
        }
    };

    request.open("POST", "loadLessonNotes.php", true);
    request.send();

}
//Teacher Load Lesson Notes

//Load Assignments
function loadTeacherHomeAssignments() {

    var div = document.getElementById("t");

    var request = new XMLHttpRequest();

    request.onreadystatechange = function() {
        if (request.readyState == 4) {
            var text = request.responseText;
            div.innerHTML = text;
        }
    };

    request.open("POST", "loadTeacherHomeAssignments.php", true);
    request.send();

}
//Load Assignments

//Load Teacher Profile
function loadTeacherProfile() {

    var div = document.getElementById("t");

    var request = new XMLHttpRequest();

    request.onreadystatechange = function() {
        if (request.readyState == 4) {
            var text = request.responseText;
            div.innerHTML = text;
        }
    };

    request.open("POST", "loadTeacherProfile.php", true);
    request.send();

}
//Load Teacher Profile

//Teacher Add Assignment Modal
function openAddAssignmentModal() {

    var modal = document.getElementById("addAssignmentModal");
    bmodal = new bootstrap.Modal(modal);
    bmodal.show();

}
//Teacher Add Assignment Modal

//Add Assignments
function addAssignment(id) {

    var subject = document.getElementById("s");
    var grade = document.getElementById("g");
    var note = document.getElementById("assignment");

    var form = new FormData();
    form.append("id", id);
    form.append("subject", subject.value);
    form.append("grade", grade.value);
    form.append("assignment", assignment.files[0]);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function() {
        if (request.readyState == 4) {
            var response = request.responseText;
            if (response == "Success") {
                window.location.reload();
            } else {
                swal({
                    title: response,
                    icon: "error",
                    button: "Ok",
                });
            }
        }
    }

    request.open("POST", "addAssignmentProcess.php", true);
    request.send(form);

}
//Add Assignments

//Load Assignment Results
function loadAssignmentResults() {

    var div = document.getElementById("t");

    var request = new XMLHttpRequest();

    request.onreadystatechange = function() {
        if (request.readyState == 4) {
            var text = request.responseText;
            div.innerHTML = text;
        }
    };

    request.open("POST", "loadAssignmentResults.php", true);
    request.send();

}
//Load Assignment Results

function AddAssignmentMarksModal(id) {
    var modal = document.getElementById("AddAssignmentMarksModal" + id);
    bootstrapmodal = new bootstrap.Modal(modal);
    bootstrapmodal.show();
}

function AddMarks(id) {

    var marks = document.getElementById("marks" + id);

    var form = new FormData();
    form.append("marks", marks.value);
    form.append("id", id);

    var Request = new XMLHttpRequest();

    Request.onreadystatechange = function() {
        if (Request.readyState == 4) {
            var Response = Request.responseText;
            if (Response == "Success") {
                window.location.reload();
            } else {
                alert(Response);
            }
        }
    }

    Request.open("POST", "AddResultsProcess.php", true);
    Request.send(form);

}

function loadAoProfile() {

    var div = document.getElementById("t");

    var request = new XMLHttpRequest();

    request.onreadystatechange = function() {
        if (request.readyState == 4) {
            var text = request.responseText;
            div.innerHTML = text;
        }
    };

    request.open("POST", "loadAoProfile.php", true);
    request.send();

}

function loadReleaseResults() {

    var div = document.getElementById("t");

    var request = new XMLHttpRequest();

    request.onreadystatechange = function() {
        if (request.readyState == 4) {
            var text = request.responseText;
            div.innerHTML = text;
        }
    };

    request.open("POST", "loadReleaseResults.php", true);
    request.send();

}

function ReleaseMarks(id) {

    var Request = new XMLHttpRequest();

    Request.onreadystatechange = function() {
        if (Request.readyState == 4) {
            var Response = Request.responseText;
            if (Response == "Success") {
                window.location.reload();
            } else {
                alert(Response);
            }
        }
    }

    Request.open("GET", "ReleaseMarksProcess.php?id=" + id, true);
    Request.send();

}

function loadStudentInvitation() {

    var div = document.getElementById("t");

    var request = new XMLHttpRequest();

    request.onreadystatechange = function() {
        if (request.readyState == 4) {
            var text = request.responseText;
            div.innerHTML = text;
        }
    };

    request.open("POST", "loadStudentInvitation.php", true);
    request.send();

}

function studentRegSendInvitation() {

    var email = document.getElementById("e").value;
    var username = document.getElementById("un").value;
    var password = document.getElementById("pw").value;
    var grade = document.getElementById("g").value;

    var form = new FormData();
    form.append("email", email);
    form.append("username", username);
    form.append("password", password);
    form.append("grade", grade);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function() {
        if (request.readyState == 4) {
            var response = request.responseText;
            if (response == "Success") {
                alert("Student Registered and Invitation Sent Successfully!!!");
                window.location.reload();
            } else {
                swal({
                    title: response,
                    icon: "error",
                    button: "Ok",
                });
            }
        }
    };

    request.open("POST", "stuRegSendInvitProcess.php", true);
    request.send(form);

}

function loadStudentProfile() {

    var div = document.getElementById("t");

    var request = new XMLHttpRequest();

    request.onreadystatechange = function() {
        if (request.readyState == 4) {
            var text = request.responseText;
            div.innerHTML = text;
        }
    };

    request.open("POST", "loadStudentProfile.php", true);
    request.send();

}

function loadVN() {

    var div = document.getElementById("t");

    var request = new XMLHttpRequest();

    request.onreadystatechange = function() {
        if (request.readyState == 4) {
            var text = request.responseText;
            div.innerHTML = text;
        }
    };

    request.open("POST", "loadVN.php", true);
    request.send();

}

function loadAss() {

    var div = document.getElementById("t");

    var request = new XMLHttpRequest();

    request.onreadystatechange = function() {
        if (request.readyState == 4) {
            var text = request.responseText;
            div.innerHTML = text;
        }
    };

    request.open("POST", "loadAss.php", true);
    request.send();

}

function UploadAssignment(id) {

    var result = document.getElementById("result");

    var form = new FormData();
    form.append("result", result.files[0]);
    form.append("id", id);

    var Request = new XMLHttpRequest();

    Request.onreadystatechange = function() {
        if (Request.readyState == 4) {
            var Response = Request.responseText;
            if (Response == "Success") {
                window.location.reload();
            } else {
                alert(Response);
            }
        }
    }

    Request.open("POST", "UploadAssignmentProcess.php", true);
    Request.send(form);

}

function uploadImage() {
    var photo_path = document.getElementById("profile");
    var photo = document.getElementById("pic");

    photo_path.onchange = function() {
        var file = this.files[0];
        var url = window.URL.createObjectURL(file);

        photo.src = url;
    }
}

function UpdateStudentProfile() {

    var password = document.getElementById("p");
    var fname = document.getElementById("fn");
    var lname = document.getElementById("ln");
    var num = document.getElementById("cn");
    var ag = document.getElementById("ag").value;
    var profile = document.getElementById("profile");

    var gender;

    if (ag == "Male") {
        gender = 1;
    } else if (ag == "Female") {
        gender = 2
    } else {
        gender = ag;
    }

    var form = new FormData();
    form.append("photo", profile.files[0]);
    form.append("password", password.value);
    form.append("fname", fname.value);
    form.append("lname", lname.value);
    form.append("num", num.value);
    form.append("gender", gender);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function() {
        if (request.readyState == 4) {
            var response = request.responseText;
            if (response == "Success") {
                alert("Profile Updated Successfully!!!");
                window.location.reload();
            } else {
                swal({
                    title: response,
                    icon: "error",
                    button: "Ok",
                });
            }
        }
    };

    request.open("POST", "StudentUpdateProfileProcess.php", true);
    request.send(form);

}

function UpdateTeacherProfile() {

    var password = document.getElementById("p");
    var fname = document.getElementById("fn");
    var lname = document.getElementById("ln");
    var num = document.getElementById("cn");
    var ag = document.getElementById("ag").value;
    var profile = document.getElementById("profile");

    var gender;

    if (ag == "Male") {
        gender = 1;
    } else if (ag == "Female") {
        gender = 2
    } else {
        gender = ag;
    }

    var form = new FormData();
    form.append("photo", profile.files[0]);
    form.append("password", password.value);
    form.append("fname", fname.value);
    form.append("lname", lname.value);
    form.append("num", num.value);
    form.append("gender", gender);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function() {
        if (request.readyState == 4) {
            var response = request.responseText;
            if (response == "Success") {
                alert("Profile Updated Successfully!!!");
                window.location.reload();
            } else {
                swal({
                    title: response,
                    icon: "error",
                    button: "Ok",
                });
            }
        }
    };

    request.open("POST", "TeacherUpdateProfileProcess.php", true);
    request.send(form);

}

function UpdateAoProfile() {

    var password = document.getElementById("p");
    var fname = document.getElementById("fn");
    var lname = document.getElementById("ln");
    var num = document.getElementById("cn");
    var ag = document.getElementById("ag").value;
    var profile = document.getElementById("profile");

    var gender;

    if (ag == "Male") {
        gender = 1;
    } else if (ag == "Female") {
        gender = 2
    } else {
        gender = ag;
    }

    var form = new FormData();
    form.append("photo", profile.files[0]);
    form.append("password", password.value);
    form.append("fname", fname.value);
    form.append("lname", lname.value);
    form.append("num", num.value);
    form.append("gender", gender);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function() {
        if (request.readyState == 4) {
            var response = request.responseText;
            if (response == "Success") {
                alert("Profile Updated Successfully!!!");
                window.location.reload();
            } else {
                swal({
                    title: response,
                    icon: "error",
                    button: "Ok",
                });
            }
        }
    };

    request.open("POST", "AoUpdateProfileProcess.php", true);
    request.send(form);

}