# HTML Attribute Content

HTML Attribute Content takes a string and preps it for use inside HTML tag attributes. You might find this handy when using content inside attributes of certain tags, like `<meta>` tags used by [Twitter Cards](https://dev.twitter.com/docs/cards).

## Usage

### `{exp:html_attribute_content}`

*Note:* If your tagdata contains an ExpressionEngine typography code-syntax highlighted codeblock, it will be stripped in its entirety, since it cannot be summarized.

#### Example Usage

It strips tags, turns single and double quotes into entities, then optionally limits to a fixed number of characters (retaining whole words), and appends a terminating character.

```
{exp:html_attribute_content limit="200" end_char="&#8230;"}
	content to make safe for use in a tag parameter
{/exp:html_attribute_content}
```

#### Parameters

##### limit (optional)

`limit="200"`

The number of characters to limit the output to (keeps whole words).

##### end_char (optional)

`end_char="&#8230;"`

A terminating character (or characters) to append to the string. The limit parameter takes this into consideration, so your final string will still
be within the bounds of your specified limit.

## Change Log

### 2.0

- Updated plugin to be 2.0 compatible- Updated plugin to be 3.0 compatible

### 1.0

- Released