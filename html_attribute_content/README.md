# HTML Attribute Content

HTML Attribute Content takes a string and preps it for use inside HTML tag attributes. You might find this handy when using content inside attributes of certain tags, like `<meta>` tags used by [Twitter Cards](https://dev.twitter.com/docs/cards).

## Usage

### `{exp:html_attribute_content}`

*Note:* If your tagdata contains an ExpressionEngine typography code-syntax highlighted codeblock, it will be stripped in its entirety, since it cannot be summarized.

#### Example Usage

It strips tags, turns single and double quotes into entities, then optionally limits to a fixed number of characters (retaining whole words), and appends a terminating character.

```
{exp:html_attribute_content limit='200' end_char='&#8230;'}
	content to make safe for use in a tag parameter
{/exp:html_attribute_content}
```

#### Parameters

##### limit (optional)

`limit='200'`

The number of characters to limit the output to (keeps whole words).

##### double_encode (optional, default='yes')

`double_encode='no'`

yes/no. Whether or not to double-encode character entities.

##### end_char (optional)

`end_char='&#8230;'`

A terminating character (or characters) to append to the string. The limit parameter takes this into consideration, so your final string will still
be within the bounds of your specified limit.

## Change Log

### 2.1.4

- standardizing MIT license

### 2.1.3

- Updating build system for GitHub download generation.

### 2.1.2

- Cleaned up GitHub release download package

### 2.1.1

- Fixed a typo in the README

### 2.1

- added `double_encode=` parameter to optionally disable double-encoding of character entities

### 2.0

- Updated plugin to be 3.0 compatible

### 1.0

- Released

## License

Copyright (c) 2015 EllisLab, Inc.

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.

### Exclusions

Except as contained in this notice, the name of EllisLab, Inc. shall not be used in advertising or otherwise to promote the sale, use or other dealings in this Software without prior written authorization from EllisLab, Inc.
