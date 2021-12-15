<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= LINK ?>assets/style.css">
    <title>Test 3</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <script src="<?= LINK ?>assets/jquery.js"></script>
     
</head>
<body>
    <div id="contener">

        <div id="contener1">
            <div id="topbar">
                <div id="logo">
                    <img src="<?= LINK ?>assets/images/logo/pineaple.png"   alt="" >
                    <span>pineapple</span> 
                </div>
                <div id="top-link">
                    <a href="<?= LINK ?>list" id="save-data" style="color:brown; 
            text-decoration: underline;">all saved data</a>
                    <a href="#">Contact</a>
                </div>
                
            </div>

            <h3 align="center" id="heading" class="hide-for-success">Subscribe to newsletter</h3> 
            <h5 align="center" id="sub-text" class="hide-for-success">
                Subscribe to our newsletter and get 10% discount on <br> pineapple glasses.
            </h5>
            <form type="POST">
            <div id="desk-in" class="hide-for-success">
                <label id="dest-lab"></label>
                <input type="text" class="emailInpD"  placeholder="Type your email address here…" id="desk-input">
                <i class="fas fa-arrow-right" type="submit" id="btnValDesc"></i>
            </div>
            <div align="center" class="erreur" style="color:red"></div>

            <div id="tos" align="center" class="hide-for-success">
                <input type="checkbox"  class="desk-ch" id="tos-checkbox"
                checked>
                <label for="tos-checkbox">I agree to <b>terms of service</b></label>

            </div>
        </form>

            <div class="show-success" style="display: none;">
                <img src="<?= LINK ?>assets/images/ic_success.png" alt="" srcset="">
                <h3 align="center" id="heading" >Thanks for subscribing!</h3> 
                <h5 align="center" id="sub-text">
                    You have successfully subscribed to our email listing. Check your email for the discount code.
                </h5>

            </div>

            <hr id="desk-hr">

            <div id="desk-social" align="center">
                <i class="fab fa-facebook"></i>
                <i class="fab fa-instagram"></i>
                <i class="fab fa-twitter-square"></i>
                <i class="fab fa-youtube"></i>
            </div>
        </div>
        <div id="contener2"><img src="<?= LINK ?>assets/images/image_summer.png" alt="" srcset=""></div>
    </div>

    <div id="mobile-contener">
        <div id="topbar">
            <div id="logo">
                <img src="<?= LINK ?>assets/images/logo/pineaple.png"   alt="" >
                  
            </div>
            <div id="top-link">
            <a href="<?= LINK ?>list" id="save-data" style="color:brown; 
            text-decoration: underline;">all saved data</a>
                <a href="#">Contact</a>
            </div>
            
        </div>

        <div id="main-mobile">
            <h3 align="center" id="heading" class="hide-for-success">Subscribe to newsletter</h3> 
            <h5  id="sub-text" class="hide-for-success">
                Subscribe to our newsletter and get 10% discount on   pineapple glasses.
            </h5>
            <div id="desk-in" class="hide-for-success">
                <label id="dest-lab"></label>
                <input type="text" class="emailInpM" placeholder="Type your email address here…" id="desk-input">
                <i class="fas fa-arrow-right" id="btnValMobile"></i>
            </div>
            <div align="center" class="erreur" style="color:red"></div>

            <div id="tos" align="center" class="hide-for-success">
                <input type="checkbox" class="checkbokM"  id="tos-checkbox"
                checked>
                <label for="tos-checkbox">I agree to <b>terms of service</b></label>

            </div>

            <div class="show-success" style="display: none;">
                <img src="<?= LINK ?>assets/images/ic_success.png" alt="" srcset="">
                <h3 align="center" id="heading" >Thanks for subscribing!</h3> 
                <h5 align="center" id="sub-text">
                    You have successfully subscribed to our email listing. Check your email for the discount code.
                </h5>

            </div>

            <hr id="desk-hr">

            <div id="desk-social" align="center">
                <i class="fab fa-facebook"></i>
                <i class="fab fa-instagram"></i>
                <i class="fab fa-twitter-square"></i>
                <i class="fab fa-youtube"></i>
            </div>
        </div>
    </div>
    <script>
        $(function () {

            $('.emailInpD').keyup(function() {
                $(".emailInpM").val($('.emailInpD').val())
            });

            $('.emailInpM').keyup(function() {
                $(".emailInpD").val($('.emailInpM').val())
            });
            
 
            $(".desk-ch").change(function() {
                 
                if($(this).prop("checked") == true){ 
                    $(".checkbokM").prop( "checked", true );
                    console.log("checked")
                }
                else if($(this).prop("checked") == false){ 
                   $(".checkbokM").prop( "checked", false );
                   console.log("not checked")
                }
            });

            $(".checkbokM").change(function() {
                 
                 if($(this).prop("checked") == true){ 
                     $(".desk-ch").prop( "checked", true );
                     console.log("checked")
                 }
                 else if($(this).prop("checked") == false){ 

                    $(".desk-ch").prop( "checked", false );
                    console.log("not checked")
                 }
             });



            var Useremail = $('.emailInpD').val();
            var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
            var emailblockReg = /^([\w-\.]+@(?![\w-\.]+.co)([\w-]+\.)+[\w-]{2,4})?$/;

            
 
            $("#btnValDesc").click(function() {

                var email = $('.emailInpD').val();
                var arry = email.split(".");
                  

                if ($('.emailInpD').val() == "") {
                    $(".erreur").text("Email address is required.");
                }else if(!emailReg.test($('.emailInpD').val())) {
                   $(".erreur").text("Please provide a valid e-mail address");
                }  else if(arry[1] == "co" ) {
                    $(".erreur").text("We are not accepting subscriptions from Colombia emails");   
                } 
                
                else if (  !$(".desk-ch").is(':checked')) {
                    $(".erreur").text("You must accept the terms and conditions.");
                }else{


                    $(".erreur").text("");

                    $.ajax({
                        type:'POST',
                        url:"<?= LINK ?>ajax/add.php",
                        data:{
                            emailD : $('.emailInpD').val()
                        },
                        success:function(data){
                            console.log(data)
                            if (data == "emailexit") {
                                $(".erreur").text("email already used.");
                            } else if (data=="success") {
                                $(".hide-for-success").css('display','none');
                                $(".show-success").css("display","block");
                            }else{
                                $('.emailInpD').val("");
                                $(".erreur").text("Please Re-enter your mail address.");
                            }
                            
                        }
                    })
                     
                }
            })

            $("#btnValMobile").click(function() {
                var email = $('.emailInpM').val();
                var arry = email.split(".");

                if ($('.emailInpM').val() == "") {
                    $(".erreur").text("Email address is required.");
                }else if(!emailReg.test($('.emailInpM').val())) {
                   $(".erreur").text("Please provide a valid e-mail address");
                }  else if(arry[1] == "co") {
                    $(".erreur").text("We are not accepting subscriptions from Colombia emails");   
                } 
                
                else if (  !$(".checkbokM").is(':checked')) {
                    $(".erreur").text("You must accept the terms and conditions.");
                }else{
                    $(".erreur").text("");

                    $.ajax({
                        type:'POST',
                        url:"<?= LINK ?>ajax/add.php",
                        data:{
                            emailD : $('.emailInpM').val()
                        },
                        success:function(data){
                            console.log(data)
                            if (data == "emailexit") {
                                $(".erreur").text("email already used.");
                            } else if (data=="success") {
                                $(".hide-for-success").css('display','none');
                                $(".show-success").css("display","block");
                            }else{
                                $('.emailInpM').val("");
                                $(".erreur").text("Please Re-enter your mail address.");
                            }
                            
                        }
                    })
                }
            })

            
            
              
        
            
        })
    </script>
</body>
</html>