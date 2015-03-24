<?php
/****************************************************************************
 *                                                                          
 * (c) Copyright Conrad Jones / www.turboit.co.uk 2015                      
 *                                                                          
 * This module is licensed under the Open software license. OSL-3.0         
 *                                                                                                             
 *              http://opensource.org/licenses/OSL-3.0                                      
 ****************************************************************************/

class TurboIT_Gearman_Helper_Tasks extends Mage_Core_Helper_Abstract
{
	function executeGearmanJobBackground($job_name, $data, $success)
	{
		$gearmanclient = new GearmanClient();
        $gearmanclient->addServer('127.0.0.1', '7009');

        $handle = $gearmanclient->doBackground($job_name,serialize($data));
        if ($gearmanclient->returnCode() == GEARMAN_SUCCESS)
        {   
            Mage::getSingleton('adminhtml/session')->addSuccess($this->__($success));
        }
        else 
        {
            Mage::getSingleton('adminhtml/session')->addError($this->__($gearmanclient->error()));            
            return;
        }

        $redisclient = new Redis();
        $redisclient->connect( '127.0.0.1', 6379 );

        $redisclient->rpush('jobs', $handle);
    }
}
