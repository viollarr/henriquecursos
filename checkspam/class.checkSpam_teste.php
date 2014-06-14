<?php
/**
 * Project: CheckSpam
 * Version: 1.4
 * File: checkspam.class_teste.php
 * Author: Giuseppe Leone (joseph@masterdrive.it)
 * URL: http://www.masterdrive.it
 * Note: Class that prevents Spam attacks 
 * License: GPL 2
 * Last upd: 09 / 20 / 2006
 */

class checkspam {
	/**
	 * Main setting parameters
	 */
	var $session_start = true; // Start or continue sessions
	var $style = array(); // Define the main graphical settings for the non-graphic mode (CSS Style)
	var $path = "./"; // Define the path of the class (as default value have the main document's root)
	
	var $imagetext; // Image/Text verification content
	var $tmp_img; // Temporary Image name
	var $graphic; // Set the graphical mode to on, if the GD library is available with PNG support
	var $sess_name; // The name of the session
	var $sess_value; // The value of the session (SECRET CODE)
	var $sess_counter = 0; // Number of session created in the same document
	var $gd_info = array();	// Informations about GD Library
	var $font; // The font image
	var $font_map = array(); // The Font map
	
	// Logs are stored into this variable
	var $log = "LOG STARTS HERE:\n-----\n";
	
	/**
	 * Constructor
	 */
	function checkspam(){
		// Main directory
		if(defined('CHECKSPAM_DIR')){
			$this->path = CHECKSPAM_DIR;
		}
		
		// Delete the old images
		$this->free();
		
		// Initialize the default styles for the text mode verification
		$this->style['text-align'] = "center";
		$this->style['font-size'] = "20";
		$this->style['font-family'] = "courier, verdana, arial";
		$this->style['color'] = "#FF0000";
		$this->style['background-color'] = "#F5F5F5";
		$this->style['border-width'] = "2px";
		$this->style['border-style'] = "solid";
		$this->style['border-color'] = "#FFCC00";
		$this->style['width'] = "80px";
		$this->style['line-height'] = "20px";
		
		// Building the map's font
		// The character font (from a to z, ASCII Table)
		$x = 0;
		for ($i = 97; $i <= 122; $i++){
			$this->font_map[chr($i)] = $x;
			//Next character
			$x += 40;
		}
		// The numeric values
		for ($i = 0; $i <= 9; $i++){
			$this->font_map[$i] = $x;
			//Next character
			$x += 40;
		}
	}
	
	/**
	 * Method to delete the old temporary verification Images
	 */
	function free(){
		// Delete the all old temporary images
		foreach(glob($this->path."*.png") as $tmp)
			unlink($tmp);
	}
	
	/**
	 * Register a new session Session
	 */
	function register_session(){
		// Register a new session with new value
		$this->sess_name = "checkSpam".session_id().$this->sess_counter;
		$this->sess_value = $this->create_secretcode();
		
		$_SESSION[$this->sess_name] = $this->sess_value;
		$this->write_log("Session: $this->sess_name registered successfully with the value of: $this->sess_value !");
		
		// Increment session counter
		$this->sess_counter++;
	}
	
	/**
	 * Starts generate the secret code
	 */
	function create_secretcode(){
		return substr(md5(rand()),0,4);
	}
	
	/**
	 * Generate the temporary PNG image verfication
	 */
	function create_image(){
		// Create the image
		$this->imagetext = imagecreatetruecolor(100,40);
		//Load the font
		$this->font = imagecreatefrompng($this->path."font/checkspam-font.png");
		// Create the rectangle with borders
		imagefilledrectangle($this->imagetext, 0, 0, 100, 40, imagecolorallocate($this->imagetext,0,0,0));
		imagefilledrectangle($this->imagetext, 1, 1, 98, 38, imagecolorallocate($this->imagetext,255,255,204));
		// Add the secret code
		$x = 0;	// Distance from each character
		for($i = 0; $i < strlen($this->sess_value); $i++){
			imagecopy($this->imagetext,$this->font,$x,1,$this->font_map[$this->sess_value{$i}],0,40,40);
			$x += 20;
		}
		//Adding some verticals lines
		for($i = 20; $i <= 80; $i += 20){
			//Draw the line
			imageline($this->imagetext,$i,1,$i,40,imagecolorallocate($this->imagetext,0,0,0));
		}
		//Adding some horizontal lines
		for($i = 10; $i <= 30; $i += 10){
			//Draw the line
			imageline($this->imagetext,1,$i,118,$i,imagecolorallocate($this->imagetext,0,0,0));
		}
		//Applies some distortion effects
		//imagefilter($this->imagetext, IMG_FILTER_SMOOTH, 30);

		// Save the temporary image into the path of the class
		$this->tmp_img = $this->path.$this->sess_name.time();
		imagepng($this->imagetext,$this->tmp_img.".png");
	}

	/**
	 * Build new image/text verification
	 */
	function create_imagetext(){
		// Check if the graphic mode is enabled or the GD Library Extension is available
		if($this->graphic && $this->check_gdlibrary()){
			// Call the function to create the temporary image verfication
			$this->create_image();
			$this->imagetext = "<img src=\"".$this->tmp_img.".png\" border=\"0\" alt=\"secret code\" title=\"secret code\" />";
			$this->write_log("Starts create IMAGE verification !");
		}else{
			// Text mode
			$this->imagetext = "<div style=\"";
			foreach($this->style as $key => $value){
				$this->imagetext .= "$key:$value; ";
			}
			$this->imagetext .= "\">$this->sess_value</div>";
			$this->write_log("Starts create TEXT verification !");
		}
	}
	
	/**
	 * Check if the GD library is available
	 * We can extends this methods to permit  many other  types of image format, such as JPEG, GIF and much more...
	 */
	function check_gdlibrary(){
		if(function_exists('gd_info')){
			$this->gd_info = gd_info();
			if($this->gd_info['PNG Support']){
				$this->write_log("GD Library Extension are available, version: ".$this->gd_info['GD Version']." with PNG Support !");
				return true;
			}else{
				$this->write_log("GD Library Extension are available, version: ".$this->gd_info['GD Version']." without PNG Support !");
				return false;
			}
		}else{
			$this->write_log("GD Library Extension are not available !");
			return false;
		}
	}
	
	/**
	 * Private method to write to the log
	 * @param string $message		Message to write to the log
	 */
	function write_log($message){
		if(strlen($message) > 0)
			$this->log .= date("[m d Y - H:i]")." $message\n";
	}
	
	/**
	 * Starts or continues Session
	 */
	function init_session(){
		if(!session_id() && $this->session_start){
			session_start();
			$this->write_log("Sessions started !");
		}else{
			$this->write_log("Sessions is already started !");
		}
	}
	
	/**
	 * Execute the complete procedure to create an anti-spam control
	 * @param char $type	(0 = Text | 1 = Image)	The type of verification
	 */
	function exec_checkspam($type = 1){
		// Set the type of verification
		$this->graphic = ($type == 1) ? true : false;
		// Try to init or continue a session
		$this->register_session();
		// Starts building new code image/text verification
		$this->create_imagetext();
	}
	
	/**
	 * Method to print out the Image/Text verification
	 */
	function print_imagetext(){
		echo $this->imagetext;
	}
	
	/**
	 * Method to print out the Input Form
	 * @param string $params	Some paramters for the input form
	 */
	function print_input($params = "name=\"secretcode\""){
		// Check if exist an image / text code verification to input
		if($this->sess_counter != 0){
			echo "<input type=\"hidden\" name=\"checkspam\" value=\"$this->sess_name\" />";
			echo "<input type=\"text\" $params maxlength=\"".strlen($this->sess_value)."\" />";
			$this->write_log("Input form printed out for: $this->sess_name !");
		}else{
			$this->write_log("Image or text does not exist for the verification of the code for: $this->sess_name !");
		}
	}
	
	/**
	 * Method to verify the code sent by the form
	 * @param string $code		The code sent by the form
	 */
	function verify($code){
		// Try to retrieve information about the input
		if(isset($_POST["checkspam"])){
			// Work with POST values
			$this->sess_value = $_SESSION[$_POST["checkspam"]];
		}else{
			if(isset($_GET["checkspam"])){
				// Work with GET values
				$this->sess_value = $_SESSION[$_GET["checkspam"]];
			}else{
				// No data to check
				return false;
			}
		}
		// Check the code
		return ($code == $this->sess_value) ? true : false;
	}
	
	/**
	 * Method to print out the log
	 */
	function print_log(){
		//Print out the log var content
		echo "<pre style=\"color:#CCCCCC;background-color:#000000;padding:3px;\">$this->log</pre>";
	}
}
?>