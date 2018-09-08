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

if (!isset($_GET['action'])) {
   include './modules/mod_login.php';
}

else {
   if ($_GET['action']=='login') {
      include './modules/mod_login.php';
   }
   
   elseif ($_GET['action']=='register') {
      include './modules/mod_register.php';
   }
   
   elseif ($_GET['action']=='contactlist') {
      include './modules/mod_contactlist.php';
   }
   
   elseif ($_GET['action']=='createcontact'){
      include './modules/mod_createcontact.php';
   }
   
   elseif ($_GET['action']=='logout'){
      include './modules/mod_logout.php';
   }
   
   elseif ($_GET['action']=='view') {
      include './modules/mod_view.php';
   }
   
   elseif ($_GET['action']=='editcontact') {
      include './modules/mod_editcontact.php';
   }
   
   elseif ($_GET['action']=='deletecontact') {
      include './modules/mod_deletecontact.php';
   }
}
