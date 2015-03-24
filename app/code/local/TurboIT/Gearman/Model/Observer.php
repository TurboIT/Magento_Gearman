<?php
/****************************************************************************
 *                                      
 * (c) Copyright Conrad Jones / www.turboit.co.uk 2015            
 *                                      
 * This module is licensed under the Open software license. OSL-3.0       
 *                                                                         
 *        http://opensource.org/licenses/OSL-3.0                            
 ****************************************************************************/

class TurboIT_Gearman_Model_Observer 
{
    public function processGearmanJobs() 
    {
      $server 		= Mage::getStoreConfig('gearman/gearman/server');	
    	$port   		= Mage::getStoreConfig('gearman/gearman/port');

    	$gearmanclient 	= new GearmanClient();
      $gearmanclient->addServer($server, $port);

      $jobs = Mage::getModel('turboit_gearman/gearmanjob')
        		->getCollection()
        		->addFieldToFilter('execute_after', array('lteq' => Mage::getModel('core/date')->gmtDate()))
        		->load();

      foreach ($jobs as $job) {
        $gearmanclient->doBackground($job->getData('task'),unserialize($job->getData('data')));
        if ($gearmanclient->returnCode() == GEARMAN_SUCCESS) {
          $job->delete();
        }
      }
    }
}