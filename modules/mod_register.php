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

if(!isset($Restrict)){
   header("Location: index.php");
}

if(!isset($_POST['register'])){
   include './views/register.php';
}

else {
   $postData = (object) $_POST;
   if($ControllerDB->CreateUser($postData)){
      $ControllerDB->LoginUser($postData->email, $postData->pass);
      header("Location: index.php?action=contactlist");
   }
   else {
      $error = '<div class="w3-panel w3-red w3-display-container">
                  <span onclick="this.parentElement.style.display=\'none\'"
                  class="w3-button w3-display-topright w3-hover-red">&times;</span>
                  <p>'.$_COOKIE['Error'].'</p>
                </div>';
      
      $_COOKIE['Error'] = "";
      include './views/login.php';
   }
   
}

