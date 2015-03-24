<?php
/****************************************************************************
 *																			
 * (c) Copyright Conrad Jones / www.turboit.co.uk 2015						
 *																			
 * This module is licensed under the Open software license. OSL-3.0     	
 *																			                                   
 *				http://opensource.org/licenses/OSL-3.0						                
 ****************************************************************************/

class TurboIT_Gearman_Model_Gearmanjob extends Mage_Core_Model_Abstract
{
    protected function _construct()
    {
        $this->_init('turboit_gearman/gearmanjob');
        $this->setData('submitted_date',  date("Y-m-d H:i:s"));
    }   
}