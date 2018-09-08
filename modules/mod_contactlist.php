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

$contacts = $ControllerDB->GetContacts($_SESSION['user']);
$data = "";
if(is_array($contacts)){
   $sn = 1;
   foreach ($contacts as $contact){
      $data .= "<tr>";
      $data .= "<td><a href='?action=view&id=".$contact['id']."'>$sn</a></td>";
      $data .= "<td><a href='?action=view&id=".$contact['id']."'>".$contact['contactlastname']."</a></td>";
      $data .= "<td><a href='?action=view&id=".$contact['id']."'>".$contact['contactfirstname']."</a></td>";
      $data .= "<td><a href='?action=view&id=".$contact['id']."'>".$contact['contactphonenumber']."</a></td>";
      $data .= "<td>
              <a href='?action=view&id=".$contact['id']."' class='w3-button w3-hover-theme w3-theme w3-small'><span class='fa fa-eye'></span> View</a>
              </td>";
      $data .= "</tr>";
      $sn++;
   }
}
else {
   $data .= "<tr><td colspan='5'>$contacts</td></tr>";
}



if(!isset($_SESSION['user'])){
   header("Location: index.php");
}
else {
   $dat;

   if (!$ControllerDB->GetUser($_SESSION['user'], $dat)) {
     header("Location: index.php?action=logout");
   }
   
}

include './views/contactslist.php';




