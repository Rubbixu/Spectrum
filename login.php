<?php
ob_start();
?>
<?php
//session_name("session1");
session_start();
if (isset($_SESSION["loginUser"]))
{
  if ($_SESSION["loginUser"] == "Administrator")
  {
    header("Location: ./admin/adminIndex.php");
    header("Location: ./phpcaptcha/index.php");
    exit();
  }
  else
  {
    header("Location: ./home.php");
    exit();
  }

}

$cap = 'notEq';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo "<script type='text/javascript'>alert('post');</script>";
    if ($_POST['captcha'] == $_SESSION['cap_code']) {
        // Captcha verification is Correct. Do something here!
        $cap = 'Eq';
    } else {
        // Captcha verification is wrong. Take other action
        $cap = '';
    }
}
?>



<!DOCTYPE html>
<html>
<head>
<title>
Spectrum Educational Tool Login
</title>
<link rel="stylesheet" href="http://www.auburn.edu/template/styles/stretchSidebar.css" media="screen" type="text/css" />
<!--#include virtual="/template/includes/head.html" -->
<!-- TemplateBeginEditable name="head" -->
<!-- TemplateEndEditable -->

  <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
            <title>Captcha - PHP | Jquery</title>
            <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
            <script type="text/javascript">
                $(document).ready(function(){

                    $('#logi').click(function(event){
                        var captcha = $('#captcha').val();
                        alert(captcha);
                        if( captcha.length == 0){
                            $('#captcha').addClass('error');
                        }
                        else{
                            $('#captcha').removeClass('error');
                        }

                        if(captcha.length != 0){

                        }



                    var capch = '<?php echo $cap; ?>';
                    alert(capch);
                    var request = '<?php echo $request; ?>';
                    alert(request);
                     console.log(capch);
                    if(capch != 'notEq'){
                        if(capch == 'Eq'){
                            $('.cap_status').html("Your form is successfully Submitted ").fadeIn('slow').delay(3000).fadeOut('slow');
                        }else{
                           $('.cap_status').html("Human verification Wrong!").addClass('cap_status_error').fadeIn('slow').delay(3000).fadeOut('slow');;


                        }
                    }


                 });
                });
            </script>
            <style type="text/css">
                body{


                }
                #form{
                    margin:100px;
                    width: 350px;
                    outline: 5px solid #d0ebfe;
                    border: 1px solid #bae0fb;
                    padding: 10px;
            margin:0 auto;
                }
                #form label{
                    font:bold 11px arial;
                    color: #565656;
                    padding-left: 1px;
                }
                #form label.mandat{color: #f00;}
                #form input[type="text"]{
                    height: 25px;
                    margin-bottom: 8px;
                    padding: 5px;
                    font: 12px arial;
                    color: #0060a3;
                }
                #form textarea{
                    width: 340px;
                    height: 80px;
                    resize: none;
                    margin: 0 0 8px 1px;
                    padding: 5px;
                    font: 12px arial;
                    color: #0060a3;
                }
                #form img{
                    margin-bottom: 8px;
                }
                #form input[type="submit"]{
                    background-color: #0064aa;
                    border: none;
                    color: #fff;
                    padding: 5px 8px;
                    cursor: pointer;
                    font:bold 12px arial;
                }
                .error{
                    border: 1px solid red;
                }
                .cap_status{
                    width: 350px;
                    padding: 10px;
                    font: 14px arial;
                    color: #fff;
                    background-color: #10853f;
                    display: none;
                }
                .cap_status_error{
                    background-color: #bd0808;
                }
            </style>
</head>
<body>
<div id="pageWrap">
  <div id="headerWrap">
    <div id="header">
      <div id="logo">
      <a href="http://www.auburn.edu/"><img src="http://www.auburn.edu/template/styles/images/headerLogo2.png" alt="Auburn University Homepage"></a>

      </div>
      <div id="headerTitle">
        <div class="titleArea" style="position: relative;left: 230px;top:40px">
          <span class="mainHeading"><!-- TemplateBeginEditable name="unitTitle" -->Spectrum Educational Tool<!-- TemplateEndEditable --></span>
          <span class="subHeading"><!-- TemplateBeginEditable name="unitSubTitle" -->an online resource training for student
      teachers<!-- TemplateEndEditable --></span>
        </div>
      </div>
    </div>
<!--     <table class="nav"></table> -->
  </div>
  <div id="contentArea">
    <div class="sidebar">
      <h4><a href="./home.php" target="_self" title="Home">Home</a></h4>
      <div class="orangeDecorBar" style="width: 200px"></div>
      <h4><a href="./login.php">Log in</a></h4>
      <a href="./register.php">Register</a>
    </div>
    <div class="contentDivision">
      <p class="breadcrumb"> <!-- TemplateBeginEditable name="breadcrumb" --> <a href="./home.php">Home</a> &gt; Log in <!-- TemplateEndEditable --> </p>
      <!-- TemplateBeginEditable name="body" -->

<!--  <h3><strong>Log in</strong></h3> -->
     <form name="login_details" action="./data/db-login.php" method="post" onsubmit="return Validate()">
    <center>
        <table style="width:400px; border="0">
          <?php
          echo '<tr>';
          if (isset($_SESSION["regMsg"]))
          {
            if ($_SESSION["regMsg"] == "success")
            {
              echo '<td colspan="2">You have successfully registered! Please log in.</td>';
              $_SESSION["regMsg"] = "";
            }
            else
            {
              echo '<td colspan="2">&nbsp;</td>';
            }
          }
          else
          {
            echo '<td colspan="2">&nbsp;</td>';
          }
          echo '<tr>';
          ?>


          <tr>
            <td width="139" align="right">
              <strong>User Account:</strong>

            </td>
            <td width="245" align="left">
              <input type="text" name="username" value="" maxlength="50" style="width:175px; text-transform:none;">
              <div id="uname_error" style="color:#f44336;">
              <?php
              if (isset($_SESSION["loginMsg"]))
              {
                if($_SESSION["loginMsg"] == "user doesn't exist")
                {
                  echo "*User doesn't exist";
                  //$_SESSION["loginMsg"] = "";
                }
                else
                {
                  echo "";
                }
              }

              ?>
            </div>
            </td>
          </tr>

          <tr>
            <td align="right">
              <strong>Password:<strong>
            </td>
            <td align="left">
              <input type="password" name="password" value="" maxlength="16" style="width:175px; text-transform:none;">
              <div id="password_error" style="color:#f44336;">
              <?php
              if (isset($_SESSION["loginMsg"]))
              {
                if($_SESSION["loginMsg"] == "password incorrect")
                {
                  echo "*Password incorrect";
                  $_SESSION["loginMsg"] = "";
                }
                else
                {
                  echo "";
                }

              }
              ?>
            </div>
            </td>
          </tr>

          <tr>
            <td></td>
            <td>
              <br>
              <input type="radio" name="userType" value="student" style="margin-right: 5px;">
              <font size="2" face="arial">Student</font>
              &nbsp;&nbsp;&nbsp;&nbsp;
              <input type="radio" name="userType" value="admin" style="margin-right: 5px;">
              <font size="2" face="arial">Admin</font>
              <br><br>
            </td>
          </tr>

          <tr>
            <td></td>
            <td>
              <br>

  <div style='margin:0 auto'>
            <div id="form">
                <table border="0" width="100%">
                    <tr>
                        <td colspan="2"><label>Enter the contents of image</label><label class="mandat"> *</label></td>
                    </tr>
                    <tr>
                        <td width="60px">
                            <input type="text" name="captcha" id="captcha" maxlength="6" size="15"/></td>
                        <!--<td><img src="./captcha.php"/></td>-->
                        <td><img src="./captcha.php" style="top: 12px;position: relative;"></td>
                    </tr>
                    <tr>
                       <!-- <td><input type="submit" name="submit" id="submit"/></td>-->
                        <td></td>
                    </tr>
                </table>
            </div>
        <div class="cap_status"></div>
    </div>
    <!--<form action="" method="post">
     <input type="text" name="input" value="input" />
    <input type="submit" name="upvote" value="Upvote" />
</form>-->


              <br><br>
            </td>

          </tr>

          <tr>
            <td></td>
            <td>
              <br>
              <input type="submit" name="submit" id="login" value="Log In" onMouseOver="this.style.cursor='hand'" style="width:88px">
              <input type="reset" value="Reset" onMouseOver="this.style.cursor='hand'" style="width:88px">
              <br><br>
            </td>
          </tr>
        </table>

      </center>
    </form>
      <!-- end contentDivision -->
    </div>
<!-- end contentArea -->
  </div>
  <div id="contentArea_bottom"></div>
  <div id="footerWrap">
    <div id="footer"></div>
    <div id="subfooter">
      Auburn University | Auburn, Alabama 36849 | (334) 844-4000  | <script type="text/javascript">emailE='gmail.com'; emailE=('spectrumeduteam' + '@' + emailE); document.write("<a href='mailto:" + emailE + "'>" + emailE + "</a>");</script>
      <br />
      <a href="https://fp.auburn.edu/ocm/auweb_survey">Website Feedback</a> | <a href="http://www.auburn.edu/privacy">Privacy</a> | <a href="http://www.auburn.edu/oit/it_policies/copyright_regulations.php">Copyright &copy;
      <script type="text/javascript">date = new Date(); document.write(date.getFullYear());</script></a>
    </div>
  </div>
  <!--end pageWrap -->

  <script type="text/javascript">
    var username = document.forms["login_details"]["username"];
    var password = document.forms["login_details"]["password"];
    var captcha = document.forms["login_details"]["captcha"];

    var uname_error = document.getElementById("uname_error");
    var password_error = document.getElementById("password_error");

  username.addEventListener("blur", unameVerify, true);
  password.addEventListener("blur", passwordVerify, true);
  captcha.addEventListener("blur", captchaVerify, true);

  function Validate()
  {
    if ((username.value == "")||(username.value == " "))
    {
      username.style.border = "1px solid #f44336";
      uname_error.textContent = "*User name is required.";
      username.focus();
      return false;
    }

    if (password.value == "")
    {
      password.style.border = "1px solid #f44336";
      password_error.textContent = "*Password is required.";
      password.focus();
      return false;
    }

  }

  function unameVerify()
  {
    if((username.value !="")&&(username.value !=" "))
    {
      username.style.border = "1px solid black";
      uname_error.innerHTML = "";
      return true;
    }
  }

  function passwordVerify()
  {
    if(password.value !="")
    {
      password.style.border = "1px solid black";
      password_error.innerHTML = "";
      return true;
    }
  }

  function captchaVerify(){
 if(captcha.length != 0){


}

  }

</script>
</body>
</html>
