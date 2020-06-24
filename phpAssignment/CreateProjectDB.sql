DROP DATABASE IF EXISTS projectDB;

CREATE DATABASE IF NOT EXISTS projectDB
  DEFAULT CHARACTER SET utf8
  DEFAULT COLLATE utf8_general_ci;

USE projectDB;


DROP TABLE IF EXISTS `Managers`;

CREATE TABLE `Managers` (
  `ManagerId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) NOT NULL DEFAULT '',
  `Password` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`ManagerId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Orders`;

CREATE TABLE `Orders` (
  `OrderId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `RestaurantId` int(11) DEFAULT NULL,
  `SupplierStockId` int(11) DEFAULT NULL,
  `ManagerId` int(11) DEFAULT NULL,
  `WarehouseStaffId` int(11) DEFAULT NULL,
  `Amount` int(11) DEFAULT NULL,
  `Approved` tinyint(1) DEFAULT '0',
  `PurchaseDate` date DEFAULT NULL,
  `DeliveryDate` date DEFAULT NULL,
  `ReceivedDate` date DEFAULT NULL,
  PRIMARY KEY (`OrderId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Restaurants`;

CREATE TABLE `Restaurants` (
  `RestaurantId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `Descriptions` varchar(1024) DEFAULT NULL,
  PRIMARY KEY (`RestaurantId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Stock`;

CREATE TABLE `Stock` (
  `StockId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ManagerId` int(11) DEFAULT NULL,
  `Name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`StockId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Suppliers`;

CREATE TABLE `Suppliers` (
  `SupplierId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`SupplierId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `SupplierStock`;

CREATE TABLE `SupplierStock` (
  `SupplierStockId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `SupplierId` int(11) DEFAULT NULL,
  `StockId` int(11) DEFAULT NULL,
  `Amount` int(11) DEFAULT NULL,
  PRIMARY KEY (`SupplierStockId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `WarehouseStaff`;

CREATE TABLE `WarehouseStaff` (
  `WarehouseStaffId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`WarehouseStaffId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `WarehouseStock`;

CREATE TABLE `WarehouseStock` (
  `WarehouseStockId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `WarehouseStaffId` int(11) DEFAULT NULL,
  `StockId` int(11) DEFAULT NULL,
  `Amount` int(11) DEFAULT NULL,
  PRIMARY KEY (`WarehouseStockId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

