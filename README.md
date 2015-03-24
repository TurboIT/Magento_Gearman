# Magento_Gearman

(c) Copyright 2015 Conrad Jones / www.turboit.co.uk 

 This module is licensed under the Open software license. OSL-3.0     	
 
 http://opensource.org/licenses/OSL-3.0	

Purpose :

This module allows you to queue gearman jobs from magento via a helper function and set a future execution time. 
The jobs are placed into a database table and fed to gearman after the specified time.

Requirements :

Gearman PHP module. (PECL)
Cron must be configured and running for magento.

