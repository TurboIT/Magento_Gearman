<?php
/****************************************************************************
 *																			*
 * (c) Copyright Conrad Jones / www.turboit.co.uk 2015						*
 *																			*
 * This module is licensed under the Open software license. OSL-3.0     	*	
 *																			*
 *				http://opensource.org/licenses/OSL-3.0						*
 ****************************************************************************/

class TurboIT_Gearman_Helper_Data extends Mage_Core_Helper_Abstract
{
	public function queueGearmanJob($job_name, $data, $execute_after = null)
	{
		$jobs = Mage::getModel('gearman/gearmanjob');

		$jobs->setData('task', $job_name);
		$jobs->setData('data', serialize($data));
		$jobs->setData('execute_after', $execute_after ? $execute_after : Mage::getModel('core/date')->gmtDate());
		$jobs->setData('submitted_at', Mage::getModel('core/date')->gmtDate());		
		$jobs->save();
	}
}
	 