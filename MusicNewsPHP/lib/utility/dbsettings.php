<?php

class dbSettings
{
   protected $_dbserver="localhost";
   protected $_dbuser="root";
   protected $_dbpassword="";  
   protected $_database="musicnews";
   
   function get_dbserver() {
       return $this->_dbserver;
   }

   function get_dbuser() {
       return $this->_dbuser;
   }

   function get_dbpassword() {
       return $this->_dbpassword;
   }

   function get_database() {
       return $this->_database;
   }

   function set_dbserver($_dbserver) {
       $this->_dbserver = $_dbserver;
   }

   function set_dbuser($_dbuser) {
       $this->_dbuser = $_dbuser;
   }

   function set_dbpassword($_dbpassword) {
       $this->_dbpassword = $_dbpassword;
   }

   function set_database($_database) {
       $this->_database = $_database;
   }


}


