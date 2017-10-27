<?php
/**
 * ExpressionEngine HTML Attribute Content Plugin (https://expressionengine.com)
 *
 * @link      https://github.com/EllisLab/Html-Attribute-Content
 * @copyright Copyright (c) 2015, EllisLab, Inc. (https://ellislab.com)
 * @license   https://opensource.org/licenses/MIT MIT
 */

/**
 * HTML Attribute Content plugin class
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
		$params = [];
		foreach (['double_encode', 'end_char', 'limit', 'unicode_punctuation'] as $param)
		{
			if (($val = ee()->TMPL->fetch_param($param)) !== FALSE)
			{
				$params[$param] = $val;
			}
		}

		$this->return_data = (string) ee('Format')->make('Text', ee()->TMPL->tagdata)->attributeSafe($params);
	}
}
// END CLASS

// EOF
