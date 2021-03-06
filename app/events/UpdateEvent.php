<?php
/**
 * @link http://buildwithcraft.com/
 * @copyright Copyright (c) 2015 Pixel & Tonic, Inc.
 * @license http://buildwithcraft.com/license
 */

namespace craft\app\events;

/**
 * Update event class.
 *
 * @author Pixel & Tonic, Inc. <support@pixelandtonic.com>
 * @since 3.0
 */
class UpdateEvent extends Event
{
	// Properties
	// =========================================================================

	/**
	 * @var string The type of update (manual or auto).
	 */
	public $type;
}
