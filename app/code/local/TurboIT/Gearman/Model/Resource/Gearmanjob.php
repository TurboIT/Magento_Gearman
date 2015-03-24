<?php
/****************************************************************************
 *																			
 * (c) Copyright Conrad Jones / www.turboit.co.uk 2015						
 *																			
 * This module is licensed under the Open software license. OSL-3.0     	
 *																			                                   
 *				http://opensource.org/licenses/OSL-3.0						                
 ****************************************************************************/

class TurboIT_Gearman_Model_Resource_Gearmanjob extends Mage_Core_Model_Resource_Db_Abstract
{
	/**
     * Resource model initialization
     *
     */
    protected function _construct()
    {
        $this->_init('turboit_gearman/gearman_job', 'job_id');
    }
}