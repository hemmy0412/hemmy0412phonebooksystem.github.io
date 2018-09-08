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
      <title>Contactlist</title>
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
         <a href="?action=contactlist" class="w3-bar-item w3-hover-theme-d5 w3-button"><?php echo "$dat->lastname $dat->firstname"; ?> </a>
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
               <div class="w3-container w3-padding">
                  <div class="w3-half no-float w3-margin-bottom">
                     <div class="w3-card w3-content">
                        <div class="w3-container w3-center w3-padding-large w3-image">
                           <img alt="User Default" src="<?php echo $data['pix']; ?>" class="w3-image w3-circle" width="150"/><br>
                        </div>
                        <h3 class="w3-center w3-text-theme-d4"><?php echo $data['contactlastname']." ".$data['contactfirstname']; ?></h3>
                        <h3 class="w3-center w3-text-theme-d4"><?php echo $data['sex']; ?></h3>                        
                        <h2 class="w3-center w3-theme-dark w3-padding"><?php echo $data['contactphonenumber']; ?></h2>
                        <h3 class="w3-center w3-text-theme-d4"><?php echo $data['contactaddress']; ?></h3>
                        <h3 class="w3-center w3-text-theme-d4"><?php echo $data['contactstate']; ?></h3>        
                        <div class="w3-bar">
                           <a href="?action=editcontact&id=<?php echo $data['id'];?>" class="w3-button w3-hover-theme-d1 w3-theme-d5 w3-large w3-bar-item" style="width: 50%;"><span class="fa fa-edit"></span> Edit</a>
                           <a class="w3-button w3-hover-red w3-red w3-large w3-bar-item" data-toggle='modal' data-target='#myModal' onclick='document.getElementById("DeleteLink").href="?action=deletecontact&id=<?php echo $data['id'];?>";' style="width: 50%;"><span class="fa fa-trash"></span> Delete</a>
                        </div>
                     </div>
                  </div>
               </div><br><br>
            </div>
         </div>
      </div>
      
      <footer class="w3-theme-dark">
         <div class="w3-tiny w3-container">
            <p class="w3-left">Copyright &copy; 2018</p>
            <p class="w3-right">Developed By E-team Tech</p>
         </div>
      </footer>
      
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <h4 class="modal-title" id="myModalLabel">Delete Contact</h4>
          </div>
          <div class="modal-body">
             <p>Are you sure you want to <kbd class="w3-red">delete</kbd> this contact permanently</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
            <a id="DeleteLink" href="#" class="btn btn-danger">Yes</a>
          </div>
        </div>
      </div>
    </div>
   <script type="text/javascript" src="./js/jquery.min.js"></script>
   <script type="text/javascript" src="./js/w3js.js"></script>
   <script type="text/javascript" src="./js/bootstrap.min.js"></script>
   <script type="text/javascript" src="./js/phonbooksystem.js"></script>
   </body>
</html>