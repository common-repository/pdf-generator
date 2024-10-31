<?php
#ADD CUSTOM TEMPLATES TO GENERATE PDFS

function generate_pdf()
{
			//Initiate generation and Settings
		//	$font = 'Helvetica';
		//	$mode = 'utf-8';
			$size = array(212.72500, 276.22500);
			$page_setting = 'P';
			
		//	$html = //get page selected page from example.php
			
			//TODO: GENERATE PDF FROM API IF CALLED
			//TODO: GENERATE PDF FROM TEMPLATE IF SET
			
			$html = 'test';
	
			$generator = new pdf_generator();
			$generator->pdf_generation($css, $mode, $page_setting, $size, $font, $html, $footer);
}
add_action('wp_ajax_generate_pdf', 'generate_pdf');
add_action('wp_ajax_nopriv_generate_pdf', 'generate_pdf');