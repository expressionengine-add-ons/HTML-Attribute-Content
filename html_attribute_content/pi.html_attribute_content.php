<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * HTML Attribute Content plugin class
 *
 * @package		ExpressionEngine
 * @category	Plugin
 * @author		EllisLab Dev Team
 * @copyright	Copyright (c) 2015, EllisLab, Inc.
 * @license		https://opensource.org/licenses/MIT MIT
 * @link		https://github.com/EllisLab/Html-Attribute-Content
 */
class Html_attribute_content {

	public $return_data;

	/**
	 * constructor
	 *
	 * @return void
	 **/
	public function __construct()
	{
		$str = ee()->TMPL->tagdata;
		$double_encode = get_bool_from_string(ee()->TMPL->fetch_param('double_encode', 'yes'));

		// syntax highlighted code will be one long "word" and not summarizable

		if (strpos($str, '<div class="codeblock">') !== FALSE)
		{
			$str = preg_replace('|<div class="codeblock">.*?</div>|is', '', $str);
		}

		$str = strip_tags($str);
		$str = htmlspecialchars($str, ENT_QUOTES, 'UTF-8', $double_encode);

		if (($limit = ee()->TMPL->fetch_param('limit')) !== FALSE)
		{
			ee()->load->helper('text');
			$str = character_limiter($str, $limit);
			$end_char = (ee()->TMPL->fetch_param('end_char'));

			while (strlen($str) > $limit)
			{
				$words = explode(' ', $str);
				array_pop($words);
				$str = implode(' ', $words).$end_char;
			}
		}

		$this->return_data = $str;
	}
}
