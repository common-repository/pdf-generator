<?php
class pdf_generator_admin{
	function __construct()
	{
		//ADD PDF GENERATOR MENU
		function pdf_menu() {
			add_menu_page ( 'PDF Generator', 'PDF Generator', 'manage_options', 'pdf-generator', 'pdf_generator_admin' );
		}
		add_action ( 'admin_menu', 'pdf_menu' );
		
		
		//ADD PDF GENERATOR BACKEND CONTENT
		function pdf_generator_admin()
		{					
			$version = '0.3 (beta)';
			

			?>
				<script type="text/javascript" >
						jQuery(document).ready(function($) {
									jQuery('#generate_pdf').click(function(){
										var data = {
										action: 'generate_pdf',
										//post_id: "<?php echo $_GET['eid']; ?>"
										};
										jQuery.post(ajaxurl, data, function(response) {
												window.open("<?php echo site_url(); ?>"+"/wp-content/uploads/pdf-generator/pdffile/results.pdf");
												});
										});
			
								});
						</script>
			
			<div id="title"><h1>PDF Generator</h1>
			<?php echo 'Version '.$version;?>
			</div>
			
			<div id="templates">
			<?php 
			$settings = new pdf_generator_settings();
			$settings->get_templates();
	
			print $settings->get_page_settings();

			//TODO: fix page settings
			//$settings->set_page_setting($page_setting);
			
			?>

			</div>
			
			<input id="generate_pdf" class="button" type="button" value="Generate PDF" onclick="generate_report();" /> <br /> <br />
			
			<input type="checkbox" name="page_setting" value="L">Landscape<br>
			<input type="checkbox" name="page_setting" value="P">Portrait
			<?php
		}
		
	}

	}