

CREATE TABLE Users(
    UserName varchar(50) Primary Key,
    Password varchar(30),
    Email varchar(50),
    PhoneNumber varchar(10),
    Role int(10)
);

CREATE TABLE Categories(
  	Category Varchar(500) Primary Key,
    ImageURL Varchar(50)
);

CREATE TABLE Books (
BookID int(10) PRIMARY KEY AUTO_INCREMENT,
Price varchar(200),
Name varchar(500),
Description varchar(5000),
Instock int(100),
ImageURL varchar(500),
Category varchar(500),
Author varchar(500),
Constraint Books_FK1 Foreign Key (Category) References Categories(Category)
);

CREATE Table Carts(
	UserName varchar(50),
    BookID int(10),
    Quantity int(10),
    Constraint Carts_PK Primary Key(`UserName`),
    Constraint Carts_FK1 Foreign Key (`UserName`) References `Users`(`UserName`),
    Constraint Carts_FK2 Foreign Key (`BookID`) References `Books`(`BookID`)
);

CREATE Table Invoices(
	InvoiceID char(10) PRIMARY KEY,
    UserName varchar(50),
    BookID int(10),
    Quantity int(10),
    DateBuy datetime,
    Price varchar(100),
    Constraint Invoices_FK1 Foreign Key (`UserName`) References `Users`(`UserName`),    
    Constraint Invoices_FK2 Foreign Key (`BookID`) References `Books`(`BookID`)
);
