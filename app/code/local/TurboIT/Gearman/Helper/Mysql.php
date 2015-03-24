 <?php


class TurboIT_Gearman_Helper_Mysql extends Mage_Core_Helper_Abstract
{
	function executeGearmanJobBackground($job_name, $data, $success)
	{
		$gearmanclient = new GearmanClient();
        $gearmanclient->addServer('127.0.0.1', '8009');

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
