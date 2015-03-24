<?php

error_log("MONKEY");
/*
$installer = $this;
$installer->startSetup();
$table = $installer->getConnection()->newTable($installer->getTable('gearman_job'))
    ->addColumn('job_id', Varien_Db_Ddl_Table::TYPE_INTEGER, 11, array(
        'unsigned' => true,
        'nullable' => false,
        'primary' => true,
        'identity' => true,
        ), 'Job ID')
    ->addColumn('task', Varien_Db_Ddl_Table::TYPE_VARCHAR, 255, array(
        'nullable' => false,
        'default' => '', 
        ), 'Gearman job name')
    ->addColumn('data', Varien_Db_Ddl_Table::TYPE_MEDIUMTEXT, null, array(
        'nullable' => false,
        'default' => '',
        ), 'Job data')
    ->addColumn('execute_after', Varien_Db_Ddl_Table::TYPE_DATE, null, array(
        'nullable' => true,
        'default' => null,
        ), 'Created Date')
    ->addColumn('submitted_at', Varien_Db_Ddl_Table::TYPE_DATE, null, array(
        'nullable' => true,
        'default' => null,
        ), 'Update Date')    
    ->setComment('Gearman jobs table');
    $installer->getConnection()->createTable($table);
    $installer->endSetup();
    */