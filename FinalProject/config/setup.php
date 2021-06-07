<?php
	echo "create data<br>";
	include('../Application/modules/admin/config.php');
	$conn = connectDatabase();

	$sql = "CREATE TABLE if not exists Users(
		id int Primary key auto_increment,
    	UserName varchar(50),
    	Password varchar(30),
    	Email varchar(50),
    	PhoneNumber varchar(10),
    	Role int(10)
		);";
	if ($conn->query($sql)){
		print("Create table user success!<br>");
	}


	$sql = "CREATE TABLE if not exists Categories(
  		Category Varchar(500) Primary Key,
    	ImageURL Varchar(50)
		);";
	if ($conn->query($sql)){ print("Create table categories success!<br>");}


	$sql = "CREATE TABLE if not exists Books (
		BookID int PRIMARY KEY auto_increment,
		Price varchar(200),
		Name varchar(500),
		Description varchar(5000),
		Instock int(100),
		ImageURL varchar(500),
		Category varchar(500),
		Author varchar(500),
		Constraint Books_FK1 Foreign Key (Category) References Categories(Category)
		);";
	if ($conn->query($sql)){
		print("create table book success!<br>");
	}


	$sql = "CREATE Table IF NOT EXISTS Carts(
		UserName varchar(50),
    	BookID int,
    	Quantity int(10),
    	Constraint Carts_PK Primary Key(`UserName`),
    	Constraint Carts_FK1 Foreign Key (`UserName`) References `Users`(`UserName`),
    	Constraint Carts_FK2 Foreign Key (`BookID`) References `Books`(`BookID`)
		);";
	if ($conn->query($sql)){print("create table carts success!<br>");}


	$sql = "CREATE Table if not exists Invoices(
		InvoiceID char(10) PRIMARY KEY,
    	UserName varchar(50),
    	BookID int,
    	Quantity int(10),
    	DateBuy datetime,
    	Price varchar(100),
    	Constraint Invoices_FK1 Foreign Key (`UserName`) References `Users`(`UserName`),    
    	Constraint Invoices_FK2 Foreign Key (`BookID`) References `Books`(`BookID`)
		);";
	if ($conn->query($sql)){print("create tble invoices success!");}
?>