<?php
/**
 * @link http://buildwithcraft.com/
 * @copyright Copyright (c) 2015 Pixel & Tonic, Inc.
 * @license http://buildwithcraft.com/license
 */

namespace craft\app\helpers;

use Craft;

/**
 * Class NumberHelper
 *
 * @author Pixel & Tonic, Inc. <support@pixelandtonic.com>
 * @since 3.0
 */
class NumberHelper
{
	// Public Methods
	// =========================================================================

	/**
	 * Returns the "word" version of a number
	 *
	 * @param int $num The number
	 *
	 * @return string The number word, or the original number if it's >= 10
	 */
	public static function word($num)
	{
		$numberWordMap = [
				1 => Craft::t('app', 'one'),
				2 => Craft::t('app', 'two'),
				3 => Craft::t('app', 'three'),
				4 => Craft::t('app', 'four'),
				5 => Craft::t('app', 'five'),
				6 => Craft::t('app', 'six'),
				7 => Craft::t('app', 'seven'),
				8 => Craft::t('app', 'eight'),
				9 => Craft::t('app', 'nine')
		];

		if (isset($numberWordMap[$num]))
		{
			return $numberWordMap[$num];
		}

		return (string)$num;
	}


	/**
	 * Returns the uppercase alphabetic version of a number
	 *
	 * @param int $num The number
	 *
	 * @return string The alphabetic version of the number
	 */
	public static function upperAlpha($num)
	{
		$num--;
		$alpha = '';

		while ($num >= 0)
		{
			$ascii = ($num % 26) + 65;
			$alpha = chr($ascii).$alpha;

			$num = intval($num / 26) - 1;
		}

		return $alpha;
	}

	/**
	 * Returns the lowercase alphabetic version of a number
	 *
	 * @param int $num The number
	 *
	 * @return string The alphabetic version of the number
	 */
	public static function lowerAlpha($num)
	{
		$alpha = static::upperAlpha($num);
		return StringHelper::toLowerCase($alpha);
	}

	/**
	 * Returns the uppercase roman numeral version of a number
	 *
	 * @param int $num The number
	 *
	 * @return string The roman numeral version of the number
	 */
	public static function upperRoman($num)
	{
		$roman = '';

		$map = [
			'M'  => 1000,
			'CM' => 900,
			'D'  => 500,
			'CD' => 400,
			'C'  => 100,
			'XC' => 90,
			'L'  => 50,
			'XL' => 40,
			'X'  => 10,
			'IX' => 9,
			'V'  => 5,
			'IV' => 4,
			'I'  => 1
		];

		foreach ($map as $k => $v)
		{
			while ($num >= $v)
			{
				$roman .= $k;
				$num -= $v;
			}
		}

		return $roman;
	}

	/**
	 * Returns the lowercase roman numeral version of a number
	 *
	 * @param int $num The number
	 *
	 * @return string The roman numeral version of the number
	 */
	public static function lowerRoman($num)
	{
		$roman = static::upperRoman($num);
		return StringHelper::toLowerCase($roman);
	}

	/**
	 * Returns the numeric value of a variable.
	 *
	 * If the variable is an object with a __toString() method, the numeric value of its string representation will be
	 * returned.
	 *
	 * @param mixed $var
	 *
	 * @return mixed
	 */
	public static function makeNumeric($var)
	{
		if (is_numeric($var))
		{
			return $var;
		}
		else if (is_object($var) && method_exists($var, '__toString'))
		{
			return static::makeNumeric($var->__toString());
		}
		else
		{
			return (int) !empty($var);
		}
	}
}
