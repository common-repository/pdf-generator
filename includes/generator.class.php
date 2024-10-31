<?php
class pdf_generator{
	
		public function pdf_generation($css, $mode, $page_setting, $size, $font, $html, $footer)
		{
			//GET PDF NAME
			$settings = new pdf_generator_settings();
			$pdf_name = $settings->pdf_name;
			
			//RESET OLD FILES
			if (is_file($pdf_name))
			{
				unlink($pdf_name);
			}
					
			$mpdf = new mPDF($mode, $size, 0, $font, 0, 0, 0, 0, 0, 0, $page_setting);
			
			//$mpdf->debug = true;
				
		
			//	$mpdf->WriteHTML($css,1);
			//	$mpdf->SetHTMLFooter($footer);
		
			//$mpdf->WriteHTML($html,2);
		
			$mpdf->WriteHTML($html);
					
			
			$mpdf->Output($pdf_name,'F');
			exit;
	}
	

}