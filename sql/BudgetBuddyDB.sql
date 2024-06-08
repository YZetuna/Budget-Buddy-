use master
go
drop database BudgetBuddy
go
Create database BudgetBuddy
GO
--Making sure we are creating the tables in the right database
Use BudgetBuddy
GO

create table USER(
  UserID integer,
  -- Attributes
  Username varchar(25) not null,
  Email varchar(35) not null,
  Password varchar(30) not null,
  -- Constraints
  constraint user_id_pk primary key (UserID),
  constraint username_uk unique (Username)
);

GO

INSERT INTO USER
	(UserID, Username, Email, Password)
Values
-- To add More values here to test them
(1000, 'Test', 'testSql@gmail.com', 'ThisIsATest')

;
GO

Create table CATEGORY(
	CategoryID		integer,
	-- Attributes
	UserID			integer,
	category_name	varchar(40),

	-- Constraints
	constraint category_id_pk primary key (CategoryID),
	constraint userid_category_fk foreign key(UserID) references USER(UserID)
);

GO
INSERT INTO CATEGORY
	(CategoryID,UserID,category_name)
Values

;
GO


Create table ACCOUNT(
	AccountID	integer,
	-- Attributes
	UserID		integer,
	account_name	varchar(40)

	-- Constraints
	constraint account_id_pk primary key (AccountID),
	constraint userid_account_fk foreign key (UserID) references USER(UserID)
);
GO

INSERT INTO ACCOUNT
	(AccountID,UserID,account_name)
Values

;
GO

Create table TRANSACTIONS(
	TransactionID	integer,
	AccountID		integer,
	CategoryID		integer,
	UserID			integer,
	Notes			varchar(60) null,
	Amount			money not null,

	-- Constraints
	constraint transactions_id_pk primary key (TransactionID),
	constraint categoryid_transactions foreign key (CategoryID) references CATEGORY(CategoryID),
	constraint accountid_transactions_fk foreign key (AccountID) references ACCOUNT(AccountID),
	constraint userid_transactions_fk foreign key (UserID) references USER(UserID)
);
GO

INSERT INTO TRANSACTIONS
	(TransactionID, AccountID, CategoryID, UserID, Notes, Amount)
Values

;

Create table BUDGET(
	BudgetID		integer,
	CategoryID		integer,
	Income			money null,
	Expenses		money null,
	Total			money null,
	EstimatedProfit	money null,
	TodaysDate		date not null default GetDate(),

	-- Constraints
	constraint budget_id_pk primary key (BudgetID),
	constraint categoryid_budget_fk foreign key (CategoryID) references CATEGORY(CategoryID)
);
GO

INSERT INTO BUDGET
	(BudgetID,CategoryID,Income,Date)
Values

;