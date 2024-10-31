<?php
class pdf_generator_settings{
	
	private $dir_name_template; 
	private $dir_name_pdf;
	
	##* Name of PDF */
	public $pdf_name;
	
	##* Page setting
	public $pdf_page_setting;
	
	function __construct()
	{		
		//ini_set( 'display_errors', 1 );
		//error_reporting( E_ERROR | E_WARNING | E_PARSE | E_NOTICE );
		
		//RAISE MEMORY TO GENERATE PDF
		ini_set('memory_limit','750M');
		
		#INIT
		$this->pdf_name = WP_CONTENT_DIR.'/uploads/pdf-generator/pdffile/results.pdf';
		$this->dir_name_pdf = WP_CONTENT_DIR.'/uploads/pdf-generator/pdffile';
		$this->dir_name_template = WP_CONTENT_DIR.'/uploads/pdf-generator/API/templates';
		$fonts_tmp = WP_CONTENT_DIR.'/uploads/pdf-generator/tmp_fonts';
		$tmp = WP_CONTENT_DIR.'/uploads/pdf-generator/tmp';
		
		//INIT DIRECTORY FOR UPLOADING PDF
		if ( ! is_dir($this->dir_name_pdf) )
		{
			wp_mkdir_p($this->dir_name_pdf) or die("Could not create directory " . $this->dir_name_pdf);
		}
		
		//INIT DIRECTORY FOR UPLOADING TEMPLATES
		if ( ! is_dir($this->dir_name_template) )
		{
			wp_mkdir_p($this->dir_name_template) or die("Could not create directory " . $this->dir_name_template);
		}
		
		//SET TEMP FOLDERS
		define("_MPDF_TEMP_PATH", WP_CONTENT_DIR.'/uploads/pdf-generator/tmp/');
		define("_MPDF_TTFONTDATAPATH", WP_CONTENT_DIR.'/uploads/pdf-generator/tmp_fonts/');
		
		//INIT DIRECTORY FOR TEMP-FILES
		if ( ! is_dir($tmp) )
		{
			wp_mkdir_p($tmp) or die("Could not create directory " . $tmp);
		}
		
		//INIT DIRECTORY FOR TEMP-FONTS
		if ( ! is_dir($fonts_tmp) )
		{
			wp_mkdir_p($fonts_tmp) or die("Could not create directory " . $fonts_tmp);
		}
		
	}
	
	public function get_templates()
		{
			$files = scandir($this->dir_name_template);
			print_r($files);
		}
	
	public function get_page_settings()
		{
			$this->pdf_page_setting = get_option('pdf_page_setting');
			return $this->pdf_page_setting;
		}
	
	public function set_page_setting($page_setting)
		{
			$this->pdf_page_setting = $page_setting;
			update_option( 'pdf_page_setting', $this->pdf_page_setting);
		}
	
	
}