drop database if exists jamin_mohamed_azzouz;
create database jamin_mohamed_azzouz;
use jamin_mohamed_azzouz;

create table product (
Id 						int 			unsigned 	not null auto_increment
,naam 					varchar(255) 				not null 
,barcode 				bigint 			unsigned 	not null
,IsActief 				Bit 						not null 	default 1
,Opmerking 				Varchar(255) 				null 		default null
,DatumAangemaakt 		Datetime(6) 				not null 	default NOW(6)
,DatumGewijzigd 		Datetime(6) 				not null 	default NOW(6)
,primary key (Id)
);
INSERT INTO product ( naam
,barcode
) value ('Mintnopjes', 8719587231278
),('Schoolkrijt', 8719587326713
),('Honingdrop', 8719587327836
),('Zure Beren', 8719587321441
),('Cola Flesjes', 8719587321237
),('Turtles', 8719587322245
),('Witte Muizen', 8719587328256
),('Reuzen Slangen', 8719587325641
),('Zoute Rijen',8719587322739
),('Winegums', 8719587327527
),('Drop Munten', 8719587322345
),('Kruis Drop', 8719587322265
),('Zoute Ruitjes', 8719587323256
); 


create table Allergeen (
Id 				        int 			unsigned 	not null 	auto_increment
,naam 			        varchar(255) 				not null 
,Omschrijving 	        varchar(255) 		 		not null
,IsActief 				Bit 				not null 	default 1
,Opmerking 				Varchar(255) 		null 		default null
,DatumAangemaakt 		Datetime(6) 		not null 	default NOW(6)
,DatumGewijzigd 		Datetime(6) 		not null 	default NOW(6)
,primary key (Id)
);
INSERT INTO Allergeen ( naam
,Omschrijving
) value ( 'Gluten','Dit product bevat gluten'
),('Gelatine','Dit product bevat gelatine'
),('AZO-Kleurstof','Dit product bevat AZO-kleurstoffen'
),('Lactose','Dit product bevat lactose'
),('Soja','Dit product bevat soja'
);


create table Leverancier (
Id 					int 			unsigned 	not null auto_increment
,naam 				varchar(255) 				not null 
,ContactPersoon 	varchar(255) 		 		not null
,LeverancierNummer  varchar(11)					not null
,Mobiel      		varchar(11) 				not null
,IsActief 			Bit 						not null 	default 1
,Opmerking 			Varchar(255) 				null 		default null
,DatumAangemaakt 	Datetime(6) 				not null 	default NOW(6)
,DatumGewijzigd 	Datetime(6) 				not null 	default NOW(6)
,primary key (Id)
);
INSERT INTO Leverancier ( naam
,ContactPersoon
,LeverancierNummer
,Mobiel 
) value ( 'Venco', 'Bert van Linge', 'L1029384719', '06-28493827'
),( 'Astra Sweets', 'Jasper del Monte', 'L1029284315', '06-39398734'
),( 'Haribo', 'Sven Stalman ', 'L1029324748', '06-24383291'
),( 'Basset', 'Joyce Stelterberg', 'L1023845773', '06-48293823'
),( 'De Bron', 'Remco Veenstra ', 'L1023857736', '06-34291234'
);


create table Magazijn (
Id 						int 			unsigned 	not null auto_increment
,ProductId				int 			unsigned 	not null 
,VerpakkingsEenheid		tinyint 		unsigned    not null
,AantalAanwezig			smallint 		unsigned 	null default null
,IsActief 				Bit 						not null 	default 1
,Opmerking 				Varchar(255) 				null 		default null
,DatumAangemaakt 		Datetime(6) 				not null 	default NOW(6)
,DatumGewijzigd 		Datetime(6) 				not null 	default NOW(6)
,primary key (Id)
,foreign key (ProductId) references Product(Id)
);
insert into Magazijn ( ProductId
,VerpakkingsEenheid
,AantalAanwezig
) value( 1, 5, 453
),( 2, 2.5, 400
),( 3, 5, 1
),( 4, 1, 800
),( 5, 3, 234
),( 6, 2, 345
),( 7, 1, 795
),( 8, 10, 233
),( 9, 2.5, 123
),( 10, 3, null
),( 11, 2, 367
),( 12, 1, 467
),( 13, 5, 20
);


create table ProductPerAllergeen(
Id 					int 			unsigned 	not null auto_increment
,ProductId			int 			unsigned 	not null 
,AllergeenId		int 			unsigned 	not null 
,IsActief 			Bit 						not null 	default 1
,Opmerking 			Varchar(255) 				null 		default null
,DatumAangemaakt 	Datetime(6) 				not null 	default NOW(6)
,DatumGewijzigd 	Datetime(6) 				not null 	default NOW(6)
,primary key (Id)
,foreign key (ProductId) references Product(Id)
,foreign key (AllergeenId) references Allergeen(Id)
);
insert into ProductPerAllergeen(ProductId
,AllergeenId
)value(1,2
),(1,1
),(1,3 
),(3,4
),(6,5
),(9,2 
),(9,5 
),(10,2 
),(12,4 
),(13,1
),(13,4
),(13,5  
);


create table ProductPerLeverancier(
Id 							int 			unsigned 	not null 	auto_increment
,LeverancierId				int 			unsigned 	not null 	
,ProductId					int 			unsigned 	not null 	
,DatumLevering 				date						not null
,Aantal 					int							not null
,DatumEerstVolgendeLevering date						null     	default null
,IsActief 					Bit 						not null 	default 1
,Opmerking 					Varchar(255) 				null 		default null
,DatumAangemaakt 			Datetime(6) 				not null 	default NOW(6)
,DatumGewijzigd 			Datetime(6) 				not null 	default NOW(6)
,primary key(id)
,foreign key(LeverancierId) references Leverancier(Id)
,foreign key(ProductId) references Product(Id)
);
insert into ProductPerLeverancier(LeverancierId
,ProductId
,DatumLevering
,Aantal
,DatumEerstVolgendeLevering
)value( 1, 1, '2024-10-09', 23, '2024-10-16'
),( 1, 1, '2024-10-18', 21,'2024-10-25'
),( 1, 2, '2024-10-09', 12,'2024-10-16'
),( 1, 3, '2024-10-10', 11,'2024-10-17'
),( 2, 4, '2024-10-14', 16,'2024-10-21'
),( 2, 4, '2024-10-21', 23,'2024-10-28'
),( 2, 5, '2024-10-14', 35,'2024-10-21'
),( 2, 6, '2024-10-13', 30,'2024-10-21'
),( 3, 7, '2024-10-11', 12,'2024-10-19'
),( 3, 7, '2024-10-19', 23,'2024-10-26'
),( 3, 8, '2024-10-10', 12,'2024-10-17'
),( 3, 9, '2024-10-11', 1,'2024-10-18'
),( 4, 10, '2024-10-16', 24,'2024-10-30'
),( 5, 11, '2024-10-10', 37,'2024-10-17'
),( 5, 11, '2024-10-19', 60,'2024-10-26'
),( 5, 12, '2024-10-11', 45, null
),( 5, 13, '2024-10-12', 23, null
);


