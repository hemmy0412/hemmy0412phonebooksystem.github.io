<?php
 /*
 * The MIT License
 *
 * Copyright 2018 EMMANUEL.
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */
?>
<!DOCTYPE html>
<html>
   <head>
      <title>SignUp</title>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" type="text/css" href="./css/w3css.css"/>
      <link rel="stylesheet" type="text/css" href="./css/font-awesome.min.css"/>
      <link rel="stylesheet" type="text/css" href="./css/style.css"/>
      <link rel="stylesheet" type="text/css" href="./css/theme.css"/>
      <link rel="icon" type="image/png" href="favicon.png">
   </head>
   <body class="background">
      <div class="back_signup">
         <div class="w3-content">
               <div class="w3-card-4 w3-round log-back w3-half w3-container w3-margin-bottom" style="margin-bottom: 50px !important;">
                  <div class="w3-padding">
                     <div class="w3-center">
                        <img src="images/logo.png" style="width: 150px;" class="w3-image">
                     </div>
                     <h2 class="w3-center w3-text-theme">PhoneBook System</h2>
                     <div class="w3-border w3-border-theme"></div><br>
                     <form class="w3-margin-bottom" role="form" action="?action=register" method="post">
                        <label class="w3-text-theme">
                           <b>First Name:</b>
                        </label>
                        <input class="w3-border w3-input w3-large" name="fname" id="fname" type="text" placeholder="Enter First name">
                        <span class="fa fa-user fa-2x w3-right" style="margin: -38px 10px 0px 0px;"></span><br>
                        
                        <label class="w3-text-theme">
                           <b>Last Name:</b>
                        </label>
                        <input class="w3-border w3-input w3-large" name="lname" id="lname" type="text" placeholder="Enter last name">
                        <span class="fa fa-user fa-2x w3-right" style="margin: -38px 10px 0px 0px;"></span><br>

                        <label class="w3-text-theme">
                           <b>Phone Number:</b>
                        </label>
                        <input class="w3-border w3-input w3-large" name="pnumber" id="pnumber" type="text" placeholder="Enter Phone number">
                        <span class="fa fa-mobile-phone fa-2x w3-right" style="margin: -38px 10px 0px 0px;"></span><br>
                        
                        <label class="w3-text-theme">
                           <b>Address:</b>
                        </label>
                        <input class="w3-border w3-input w3-large" name="address" id="address" type="text" placeholder="Enter Address e.g Ado-Ekiti">
                        <span class="fa fa-address-book fa-2x w3-right" style="margin: -38px 10px 0px 0px;"></span><br>
                        
                        <label class="w3-text-theme">
                           <b>State:</b>
                        </label>
                        <input class="w3-border w3-input w3-large" name="state" id="state" type="text" placeholder="Enter State">
                        <span class="fa fa-address-book fa-2x w3-right" style="margin: -38px 10px 0px 0px;"></span><br>
                        
                        <label class="w3-text-theme">
                           <b>E-mail:</b>
                        </label>
                        <input class="w3-border w3-input w3-large" name="email" id="email" type="text" placeholder="Enter valid E-mail">
                        <span class="fa fa-envelope fa-2x w3-right" style="margin: -38px 10px 0px 0px;"></span><br>

                        
                        <label class="w3-text-theme">
                           <b>Password:</b>
                        </label>
                        <input class="w3-border w3-input w3-large" name="pass" id="pass" type="password" placeholder="Enter Password">
                        <span class="fa fa-lock fa-2x w3-right" style="margin: -38px 10px 0px 0px;"></span><br>
                        
                        <div class="w3-bar">
                           <button class="w3-bar-item w3-button w3-hover-theme w3-theme-d5" type="submit" name="register" style="width: 50%;">SignUp <span class="fa fa-"></span></button>
                           <a href="?action=login" class="w3-button w3-hover-theme w3-black" style="width: 50%;">Login <span class='fa fa-sign-in'></span></a>
                           <p>Already have an account <a href="?action=login" class="w3-text-theme-d3">Click here</a> or click Login button</p> 
                        </div>
                     </form>
                  </div>
               </div>
            
         </div>
      </div>
      <footer class="w3-theme-dark">
         <div class="w3-tiny w3-container">
            <p class="w3-left">Copyright &copy; 2018</p>
            <p class="w3-right">Developed By E-team Tech</p>
         </div>
      </footer>
      <script type="text/javascript" src="./js/jquery.min.js"></script>
      <script type="text/javascript" src="./js/w3js.js"></script>
   </body>
</html>
