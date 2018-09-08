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

$dat;
   
   if (!$ControllerDB->GetUser($_SESSION['user'], $dat)){
      header("Location: index.php?action=logout");
   }
   
   
if(!isset($_POST['data']['create'])){
   include './views/createcontact.php';
}

else {
   if (($_FILES['pix']['error'] > 0) || !isset($_FILES['pix'])) {
      $postData = (object) $_POST['data'];
      if($ControllerDB->CreateContacts($postData, NULL)){
         header("Location: index.php?action=contactlist");
      }
   }
   else {
      $file = (object) $_FILES['pix'];
      $postData = (object) $_POST['data'];
      if($ControllerDB->CreateContacts($postData, $file)){
         header("Location: index.php?action=contactlist");
      }
   }
}



