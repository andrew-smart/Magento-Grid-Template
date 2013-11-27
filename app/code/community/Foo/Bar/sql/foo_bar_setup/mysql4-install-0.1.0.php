<?php

$installer = $this;

$installer->startSetup();

if (!$installer->tableExists($installer->getTable('foo_bar/baz'))) {
	$installer->run("
		CREATE TABLE `{$installer->getTable('foo_bar/baz')}` (
		  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
		  `name` varchar(255) DEFAULT NULL,
		  PRIMARY KEY (`id`)
		) ENGINE=InnoDB DEFAULT CHARSET=utf8;
	");
}
	
$installer->endSetup();