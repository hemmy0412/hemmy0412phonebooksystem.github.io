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
      <title>EditContact</title>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css"/>
      <link rel="stylesheet" type="text/css" href="./css/w3css.css"/>
      <link rel="stylesheet" type="text/css" href="./css/font-awesome.min.css"/>
      <link rel="stylesheet" type="text/css" href="./css/style.css"/>
      <link rel="stylesheet" type="text/css" href="./css/theme.css"/>
      <link rel="icon" type="image/png" href="favicon.png">
   </head>
   <body>
      <div class="w3-bar w3-theme-d5">
         <a href="?action=contactlist" class="w3-bar w3-hover-theme-d5 w3-bar-item w3-button"><span></span> Phonebook System</a>
         <a href="?action=logout" class="w3-bar-item w3-button w3-hover-theme-d1 w3-right w3-hide-small">Logout <span class="fa fa-sign-out"></span></a>
         <a href="?action=contactlist" class="w3-bar-item w3-hover-theme-d5 w3-right w3-button w3-hide-small"><?php echo "$dat->lastname $dat->firstname"; ?> </a>
         <a href="javascript:void(0)" class="w3-bar-item w3-button w3-hover-theme-d1 w3-right w3-hide-large w3-hide-medium" onclick="myFunction()"><span class="fa fa-bars"></span></a>
      </div>
      <div id="demo" class="w3-bar-block w3-theme-dark w3-hide w3-hide-medium w3-hide-large">
         <a href="?action=contactlist" class="w3-bar-item w3-hover-theme-d5 w3-button"><?php echo "$dat->lastname $dat->firstname"; ?></a>
         <a href="?action=logout" class="w3-bar-item w3-button w3-hover-theme-d1">Logout <span class="fa fa-sign-out"></span></a>
      </div>
      <div class="w3-container w3-margin-top">
         <div class="w3-card">
            <div class="jumbotron w3-theme-l5">
               <h1 class="w3-center"><span class="fa fa-book"></span> PHONEBOOK SYSTEM</h1>
            </div>
         </div>
         <div class="w3-row">
            <div class="w3-quarter">
                  <div class="w3-card">
                     <div class="w3-container w3-padding-large">
                        <a href="?action=contactlist" class="w3-margin-top w3-button w3-large w3-round-medium w3-block w3-theme w3-hover-theme-d5"><span class="fa fa-home"></span> Home</a><br>
                        <a href="?action=createcontact" class="w3-button w3-large w3-round-medium w3-block w3-theme w3-hover-theme-d5"><span class="fa fa-plus-circle"></span> Create</a><br><br>
                     </div>
                  </div>
               
            </div>
            <div class="w3-threequarter">
               <div class="w3-container">
                  <div class="w3-row w3-margin-bottom">
                     <h1 class="w3-text-theme-d2 w3-center"><span class="fa fa-edit"></span> Edit Contact</h1>
                     <form role="form" method="post" action="?action=editcontact&id=<?php echo $data['id'];?>" enctype="multipart/form-data">
                        <div class="w3-half w3-padding-small">
                           <label class="w3-text-theme-d4">Last Name <span style="color: red;">*</span></label>
                           <input type="text" class="w3-input w3-border" placeholder="Enter Last Name" name="data[contact_lname]" id="contact_lname" value="<?php echo $data['contactlastname'];?>"/>
                           <span class="fa fa-user fa-2x w3-right" style="margin: -35px 10px 0px 0px;"></span><br>
                           
                           <label class="w3-text-theme-d4">First Name <span style="color: red;">*</span></label>
                           <input type="text" class="w3-input w3-border" placeholder="Enter First Name" name="data[contact_fname]" id="contact_fname" value="<?php echo $data['contactfirstname'];?>"/>
                           <span class="fa fa-user fa-2x w3-right" style="margin: -35px 10px 0px 0px;"></span><br>
                           
                           <label class="w3-text-theme-d4">Phone Number <span style="color: red;">*</span></label>
                           <input type="text" class="w3-input w3-border" placeholder="Enter Phone Number" name="data[contact_pnumber]" id="contact_pnumber" value="<?php echo $data['contactphonenumber'];?>" />
                           <span class="fa fa-mobile-phone fa-2x w3-right" style="margin: -35px 10px 0px 0px;"></span><br>
                           
                           <label class="w3-text-theme-d4">Sex <span style="color: red;">*</span></label>
                           <input type="text" class="w3-input w3-border" placeholder="Enter Sex" name="data[sex]" id="sex" value="<?php echo $data['sex'];?>"/>
                           <span class="fa fa-male fa-2x w3-right" style="margin: -35px 10px 0px 0px;"></span><br>
                        </div>
                        
                        <div class="w3-half w3-padding-small">
                           <label class="w3-text-theme-d4">Address <span style="color: red;">*</span></label>
                           <input type="text" class="w3-input w3-border" placeholder="Enter Address" name="data[contact_address]" id="contact_address" value="<?php echo $data['contactaddress'];?>"/>
                           <span class="fa fa-address-book fa-2x w3-right" style="margin: -35px 10px 0px 0px;"></span><br>
                           
                           <label class="w3-text-theme-d4">State <span style="color: red;">*</span></label>
                           <input type="text" class="w3-input w3-border" placeholder="Enter State" name="data[contact_state]" id="contact_state" value="<?php echo $data['contactstate'];?>"/>
                           <span class="fa fa-map-marker fa-2x w3-right" style="margin: -35px 10px 0px 0px;"></span><br>
                           
                           <label class="w3-text-theme-d4">City </label>
                           <input type="text" class="w3-input w3-border" placeholder="Enter State" name="data[contact_city]" id="contact_city" value="<?php echo $data['contactcity'];?>"/>
                           <span class="fa fa-map-marker fa-2x w3-right" style="margin: -35px 10px 0px 0px;"></span><br>
                           
                           <label class="w3-text-theme-d4">Upload Contact Piture <span style="color: red;">*</span></label>
                           <input type="file" class="w3-input w3-border-theme-d4 w3-border" name="pix" id="pix"/><br>
                        </div>
                        <div class="w3-bar w3-margin-bottom">
                           <button class="w3-bar-item w3-button w3-large w3-hover-theme w3-theme-d5" type="submit" style="width: 50%;" name="data[edit]" id="edit"><span class="fa fa-edit"></span> Edit</button>
                           <a href="?action=contactlist" class="w3-button w3-bar-item w3-large w3-hover-theme w3-black" style="width: 50%;"><span class="fa fa-remove"></span> Cancel</a>
                        </div><br>
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
   <script type="text/javascript" src="./js/bootstrap.min.js"></script>
   <script type="text/javascript" src="./js/phonbooksystem.js"></script>
   </body>
</html>