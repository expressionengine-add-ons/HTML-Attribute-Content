<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
Copyright (C) 2015 EllisLab, Inc.

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL
ELLISLAB, INC. BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER
IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN
CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.

Except as contained in this notice, the name of EllisLab, Inc. shall not be
used in advertising or otherwise to promote the sale, use or other dealings
in this Software without prior written authorization from EllisLab, Inc.
*/


/**
 * HTML Attribute Content plugin class
 *
 * @package		ExpressionEngine
 * @category	Plugin
 * @author		EllisLab
 * @author		EllisLab Dev Team
 * @copyright	Copyright (c) 2015, EllisLab, Inc.
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
