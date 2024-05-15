<?php

$packers_movers_company_custom_css = "";

        $packers_movers_company_packers_movers_company_packers_movers_company_theme_pagination_options_alignment = get_theme_mod('packers_movers_company_packers_movers_company_packers_movers_company_theme_pagination_options_alignment', 'Center');
		if ($packers_movers_company_packers_movers_company_packers_movers_company_theme_pagination_options_alignment == 'Center') {
		    $packers_movers_company_custom_css .= '.pagination{';
		    $packers_movers_company_custom_css .= 'text-align: center;';
		    $packers_movers_company_custom_css .= '}';
		} else if ($packers_movers_company_packers_movers_company_packers_movers_company_theme_pagination_options_alignment == 'Right') {
		    $packers_movers_company_custom_css .= '.pagination{';
		    $packers_movers_company_custom_css .= 'text-align: Right;';
		    $packers_movers_company_custom_css .= '}';
		} else if ($packers_movers_company_packers_movers_company_packers_movers_company_theme_pagination_options_alignment == 'Left') {
		    $packers_movers_company_custom_css .= '.pagination{';
		    $packers_movers_company_custom_css .= 'text-align: Left;';
		    $packers_movers_company_custom_css .= '}';
		}

	$packers_movers_company_theme_breadcrumb_options_alignment = get_theme_mod('packers_movers_company_theme_breadcrumb_options_alignment', 'Center');
		if ($packers_movers_company_theme_breadcrumb_options_alignment == 'Center') {
		    $packers_movers_company_custom_css .= '.breadcrumbs ul{';
		    $packers_movers_company_custom_css .= 'text-align: center !important;';
		    $packers_movers_company_custom_css .= '}';
		} else if ($packers_movers_company_theme_breadcrumb_options_alignment == 'Right') {
		    $packers_movers_company_custom_css .= '.breadcrumbs ul{';
		    $packers_movers_company_custom_css .= 'text-align: Right !important;';
		    $packers_movers_company_custom_css .= '}';
		} else if ($packers_movers_company_theme_breadcrumb_options_alignment == 'Left') {
		    $packers_movers_company_custom_css .= '.breadcrumbs ul{';
		    $packers_movers_company_custom_css .= 'text-align: Left !important;';
		    $packers_movers_company_custom_css .= '}';
		}