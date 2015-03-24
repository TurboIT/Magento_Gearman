<?php
/****************************************************************************
 *                                                                          
 * (c) Copyright Conrad Jones / www.turboit.co.uk 2015                      
 *                                                                          
 * This module is licensed under the Open software license. OSL-3.0         
 *                                                                                                             
 *              http://opensource.org/licenses/OSL-3.0                                      
 ****************************************************************************/

class TurboIT_Gearman_Block_Adminhtml_Notifications extends Mage_Adminhtml_Block_Template
{
    public function getMessage()
    {
    	$gearmanclient 	= new GearmanClient();
        $gearmanclient->addServer('127.0.0.1', 7009);
    	
    	$redisClient 	= new Redis();
        $redisClient->connect( '127.0.0.1', 6379 );
    	

    	$job_handles = $redisClient->lrange("jobs", 0, -1);

    	foreach ($job_handles as $job_handle) {
    		$stat = $gearmanclient->jobStatus($job_handle);
		  	if (!$stat[0] || !$stat[1]) 
		  	{
		    	$done = true;
		  		$redisClient->lrem("jobs", $job_handle);
		  		continue;
		  	}
   			$message .= "<br/> Job Running: " . ($stat[1] ? "true" : "false") ;
    	}

	   	return $message;
    }
}