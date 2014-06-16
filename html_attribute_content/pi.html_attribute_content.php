<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
Copyright (C) 2014 EllisLab, Inc.

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

$plugin_info = array(
	'pi_name'			=> 'HTML Attribute Content',
	'pi_version'		=> '1.0',
	'pi_author'			=> 'EllisLab Dev Team',
	'pi_author_url'		=> 'http://ellislab.com/',
	'pi_description'	=> 'Preps content for use inside an HTML tag attribute',
	'pi_usage'			=> Html_attribute_content::usage()
);

/**
 * HTML Attribute Content plugin class
 *
 * @package		ExpressionEngine
 * @subpackage	Addons
 * @category	Plugin
 * @author		EllisLab Dev Team
 * @copyright	Copyright (c) 2014, EllisLab, Inc.
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

		// syntax highlighted code will be one long "word" and not summarizable

		if (strpos($str, '<div class="codeblock">') !== FALSE)
		{
			$str = preg_replace('|<div class="codeblock">.*?</div>|is', '', $str);
		}

		$str = strip_tags($str);
		$str = htmlspecialchars($str, ENT_QUOTES);

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

	// ----------------------------------------------------------------------

	/**
	 * Usage
	 *
	 * @return string
	 **/
	public function usage()
	{
		return '
			HTML Attribute Content takes a string and preps it for use inside HTML tag attributes.
			You might find this handy when using content inside attributes of certain tags, like
			meta tags of Twitter Cards: https://dev.twitter.com/docs/cards

			It strips tags, turns single and double quotes into entities, then optionally limits to
			a fixed number of characters (retaining whole words), and appends a terminating character.

			Note: If your tagdata contains an ExpressionEngine typography code-syntax highlighted
			codeblock, it will be stripped in its entirety, since it cannot be summarized.

			{exp:html_attribute_content limit="200" end_char="&#8230;"}
				content to make safe for use in a tag parameter
			{/exp:html_attribute_content}

			Parameters

			### limit (optional)

			limit="200"

			The number of characters to limit the output to (keeps whole words).

			### end_char (optional)

			end_char="&#8230;"

			A terminating character (or characters) to append to the string. The limit parameter
			takes this into consideration, so your final string will still
			be within the bounds of your specified limit.
		';
	}

	// ----------------------------------------------------------------------
}

/* End of file pi.html_attribute_content.php */
/* Location: /system/expressionengine/third_party/html_attribute_content/pi.html_attribute_content.php */