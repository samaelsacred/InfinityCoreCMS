<?php
/**
*
* @package InfinityCoreCMS
* @version $Id$
* @copyright (c) 2008 InfinityCoreCMS
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

if (!defined('IN_INFINITYCORECMS'))
{
	die('Hacking attempt');
}

/*
* addslashes to vars if magic_quotes_gpc is off this is a security precaution to prevent someone trying to break out of a SQL statement.
*/
function globals_addslashes()
{
	if(!STRIP)
	{
		if(is_array($_GET))
		{
			while(list($k, $v) = each($_GET))
			{
				if(is_array($_GET[$k]))
				{
					while(list($k2, $v2) = each($_GET[$k]))
					{
						$_GET[$k][$k2] = addslashes($v2);
					}
					@reset($_GET[$k]);
				}
				else
				{
					$_GET[$k] = addslashes($v);
				}
			}
			@reset($_GET);
		}

		if(is_array($_POST))
		{
			while(list($k, $v) = each($_POST))
			{
				if(is_array($_POST[$k]))
				{
					while(list($k2, $v2) = each($_POST[$k]))
					{
						$_POST[$k][$k2] = addslashes($v2);
					}
					@reset($_POST[$k]);
				}
				else
				{
					$_POST[$k] = addslashes($v);
				}
			}
			@reset($_POST);
		}

		if(is_array($_COOKIE))
		{
			while(list($k, $v) = each($_COOKIE))
			{
				if(is_array($_COOKIE[$k]))
				{
					while(list($k2, $v2) = each($_COOKIE[$k]))
					{
						$_COOKIE[$k][$k2] = addslashes($v2);
					}
					@reset($_COOKIE[$k]);
				}
				else
				{
					$_COOKIE[$k] = addslashes($v);
				}
			}
			@reset($_COOKIE);
		}
	}
}

?>