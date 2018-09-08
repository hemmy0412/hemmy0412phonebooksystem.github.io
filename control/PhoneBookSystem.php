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

/**
 * Description of PhoneBookSystem
 *
 * @author EMMANUEL
 */
class PhoneBookSystem {
   private $DB;
   
   function __construct(){
      $this->DB = new mysqli("localhost", "root", "");
      
      try {
         if (!$this->DB->select_db("PhoneBookDatabase")){
            throw new Exception();
         }
      }
      
      catch (Exception $ex){
         $this->DB->query("CREATE DATABASE PhoneBookDatabase");
      }
      
      $this->DB->query("CREATE TABLE IF NOT EXISTS users("
              . "id int NOT NULL PRIMARY KEY AUTO_INCREMENT, "
              . "firstname varchar(255), "
              . "lastname varchar(255), "
              . "phonenumber varchar(15), "
              . "address varchar(50), "
              . "state varchar(50), "
              . "email varchar(50), "
              . "password varchar(50))"
              );
      
      $this->DB->query("CREATE TABLE IF NOT EXISTS user_contacts("
              . "id int NOT NULL PRIMARY KEY AUTO_INCREMENT, "
              . "userid int, "
              . "FOREIGN KEY (userid) REFERENCES users(id), "
              . "contactlastname varchar(255), "
              . "contactfirstname varchar(255), "
              . "contactphonenumber varchar(255), "
              . "sex varchar(20), "
              . "contactaddress varchar(255), "
              . "contactstate varchar(255), "
              . "contactcity varchar(255), "
              . "pix varchar(255))"
              );
      
     session_start();
     setcookie("Error", "", (time()+(60*60*24)));
   }
   
   function CheckMail($email){
      $data = $this->DB->query("SELECT id FROM users WHERE email = '$email'");
      if($data->num_rows > 0){
         return FALSE;
      }
      
      else{
         return TRUE;
      }
   }
   
   function CreateUser($data){
      $data->fname;
      $data->lname;
      $data->pnumber;
      $data->address;
      $data->state;
      if($this->CheckMail($data->email)){
         $email = $data->email;
      }
      else {
         $_COOKIE['Error'] = "The email address you entered is <b>invalid or already exist</b> Please enter valid address";
      }
      
      $pass = md5($data->pass);
      
      if($this->DB->query("INSERT INTO users (firstname, lastname, phonenumber, address, state, email, password) VALUES('$data->fname', '$data->lname', '$data->pnumber', '$data->address', '$data->state', '$email', '$pass')")){
         return TRUE;
      }
      
      else{
         $_COOKIE['Error'] = $this->DB->error;
         return FALSE;
      }
   }
   
   function GetUser($id, &$row){
      $data = $this->DB->query("SELECT * FROM users WHERE id='$id'");
      
      if ($data->num_rows > 0) {
         $row = $data->fetch_object();
         return TRUE;
      }
      else{
         return FALSE;
      }  
   }
   
   function LoginUser($email, $pass){
      $data = $this->DB->query("SELECT id, email, password FROM users WHERE email='$email'");
      
      if ($data->num_rows > 0) {
         $row = $data->fetch_object();
         if(md5($pass) === $row->password){
            $_SESSION['user']=$row->id;
            return TRUE;
         }
         else {
            $_COOKIE['Error'] = "Incorrect Email or Password";
         }
      }
      else{
         $_COOKIE['Error'] = "Incorrect Email and Password";
         return FALSE;
      }
   }
   
   function LogoutUser(){
      session_unset();
      session_destroy();
   }
   
   function Uploader($file, &$pix){
      if($file===NULL){
         $pix="images/male.png";
         return TRUE;
      }
      
      $target_dir = "images/";
      $target_file = $target_dir.basename($file->name);
      $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
      
      //Check if image file is actual image or fake image
      $check = getimagesize($file->tmp_name);
      if($check===false){
         $_COOKIE['Error'] = "<strong>The file you upload is invalid, check the file if it is an image file</strong>";
         return FALSE;
      }
      
      // Check file size
      if($file->size > 204800){
         $_COOKIE['Error'] = "The image size you upload is greater than 200kb, reduce the size and re-upload";
         return FALSE;
      }
      
      //Check file extension
      if($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png" && $imageFileType != "gif"){
         $_COOKIE['Error'] = "The image file must be one out of this extension <strong>jpg, jpeg, png and gif</strong>. Please check the image extenstion and re-upload";
      }
      
      if(!move_uploaded_file($file->tmp_name, $target_file)){
         $_COOKIE['Error'] = "The file you upload was not successful, check the file and try again";
         return FALSE;
      }
      
      $pix = $target_file;
      return TRUE;
   }
   
   function CreateContacts($data, $pix){
      $contact_lname = $data->contact_lname;
      $contact_fname = $data->contact_fname;
      $contact_pnumber = $data->contact_pnumber;
      $sex = $data->sex;
      $contact_address = $data->contact_address;
      $contact_state = $data->contact_state;
      $contact_city = $data->contact_city;
      
      $getpix;
      if($this->Uploader($pix, $getpix)){
         $pix = $getpix;
      }
      else {
         return FALSE;
      }
      
      if($this->DB->query("INSERT INTO user_contacts (userid, contactlastname, contactfirstname, contactphonenumber, sex, contactaddress, contactstate, contactcity, pix) VALUES ('".$_SESSION['user']."', '$contact_lname', '$contact_fname', '$contact_pnumber', '$sex', '$contact_address', '$contact_state', '$contact_city', '$pix')")){
         return TRUE;
      }
      else {
         $_COOKIE['Error'] = $this->DB->error;
      }
   }
   
   function GetContacts($id){
      $data = $this->DB->query("SELECT  * FROM user_contacts WHERE userid = '$id'");
      if ($data->num_rows > 0) {
         $rows = array();
         while ($row = $data->fetch_assoc()) {
            array_push($rows, $row);
         }
         return $rows;
      }
         return "<em>No contact in your phonebook</em>";
   }
   
   function GetContact($id){
      $result = $this->DB->query("SELECT * FROM user_contacts WHERE id = '$id'");
      if ($result->num_rows > 0) {
         $data = $result->fetch_assoc();
         return $data;
      }
      else {
         return FALSE;
      }
   }
   
   function EditContacts($data, $pix, $id){
      $contact_lname = $data->contact_lname;
      $contact_fname = $data->contact_fname;
      $contact_pnumber = $data->contact_pnumber;
      $sex = $data->sex;
      $contact_address = $data->contact_address;
      $contact_state = $data->contact_state;
      $contact_city = $data->contact_city;
      
      $obj = ["contactlastname"=>$contact_lname, "contactfirstname"=>$contact_fname, "contactphonenumber"=>$contact_pnumber, "sex"=>$sex, "contactaddress"=>$contact_address, "contactstate"=>$contact_state, "contactcity"=>$contact_city];
      $getpix;
      if($this->Uploader($pix, $getpix)){
         $pix = $getpix;
         if ($pix != "images/male.png") {
            $obj['pix'] = $pix;
         }
      }
      else {
         return FALSE;
      }
      
      $vals = '';
      $com = '';
      foreach ($obj as $key => $val) {
         $vals .= "$com $key ='$val'";
         $com = ",";
      }
      
      if ($this->DB->query("UPDATE user_contacts SET$vals WHERE id='$id'")) {
         return TRUE;
      }
      else {
         $_COOKIE['Error'] = $this->DB->error;
      }
   }
   
   function DeleteContacts($id) {
      $this->DB->query("DELETE FROM user_contacts WHERE id = '$id'");
   }
   
}
