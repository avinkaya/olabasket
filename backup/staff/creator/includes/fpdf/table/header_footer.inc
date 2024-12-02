<?php

/**
 * Class extention for Header and Footer Definitions
 *
 */
class pdf_usage extends fpdf_table
{
	
	public function Header()
	{
		
	}	
	
	public function Footer()
	{
	    $this->SetY(-10);
	    $this->SetFont('Arial','I',7);
	    $this->SetTextColor(170, 170, 170);
	    $this->MultiCell(0, 4, "Page {$this->PageNo()} / {nb}", 0, 'C');
	}
} 

?>