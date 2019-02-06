INSERT INTO Gamer 
(GamerName,
CreatedOn,
ModifiedOn, 
CreatedBy, 
ModifiedBy) VALUES (
    'Snick',
    NOW(),
    NOW(),
    1,
    1
);

INSERT INTO Gamer 
(GamerName,
CreatedOn,
ModifiedOn, 
CreatedBy, 
ModifiedBy) VALUES (
    'Uppsala',
    NOW(),
    NOW(),
    1,
    1
);

INSERT INTO City 
(CityName,
Latitude,
Longitude,
CityPopulation,
Extension,
Elevation,
CreatedOn,
ModifiedOn, 
CreatedBy, 
ModifiedBy) VALUES (
    'Treviso',
    45.50,
    12.15,
    82200,
    55.50,
    15,
    NOW(),
    NOW(),
    1,
    1
);


INSERT INTO City 
(CityName,
Latitude,
Longitude,
CityPopulation,
Extension,
Elevation,
CreatedOn,
ModifiedOn, 
CreatedBy, 
ModifiedBy) VALUES (
    'Andria',
    41.14,
    16.18,
    99200,
    407.86,
    151,
    NOW(),
    NOW(),
    1,
    1
);


INSERT INTO City 
(CityName,
Latitude,
Longitude,
CityPopulation,
Extension,
Elevation,
CreatedOn,
ModifiedOn, 
CreatedBy, 
ModifiedBy) VALUES (
    'Rieti',
    42.24,
    12.52,
    47700,
    206.52,
    405,
    NOW(),
    NOW(),
    1,
    1
);

INSERT INTO City 
(CityName,
Latitude,
Longitude,
CityPopulation,
Extension,
Elevation,
CreatedOn,
ModifiedOn, 
CreatedBy, 
ModifiedBy) VALUES (
    'Tortoli',
    39.56,
    9.39,
    10600,
    39.97,
    13,
    NOW(),
    NOW(),
    1,
    1
);

INSERT INTO Map 
(MapName,
CreatedOn,
ModifiedOn, 
CreatedBy, 
ModifiedBy) VALUES (
    'Italia',
    NOW(),
    NOW(),
    1,
    1
);


INSERT INTO MapCity
(CityID,
MapID,
CreatedOn,
ModifiedOn, 
CreatedBy, 
ModifiedBy) VALUES (
    1,
    1,
    NOW(),
    NOW(),
    1,
    1
);

INSERT INTO MapCity
(CityID,
MapID,
CreatedOn,
ModifiedOn, 
CreatedBy, 
ModifiedBy) VALUES (
    2,
    1,
    NOW(),
    NOW(),
    1,
    1
);

INSERT INTO MapCity
(CityID,
MapID,
CreatedOn,
ModifiedOn, 
CreatedBy, 
ModifiedBy) VALUES (
    3,
    1,
    NOW(),
    NOW(),
    1,
    1
);

INSERT INTO MapCity
(CityID,
MapID,
CreatedOn,
ModifiedOn, 
CreatedBy, 
ModifiedBy) VALUES (
    4,
    1,
    NOW(),
    NOW(),
    1,
    1
);


INSERT INTO Game 
(MapID,
GameDate,
GameTime,
Points,
GamerID,
CreatedOn,
ModifiedOn, 
CreatedBy, 
ModifiedBy) VALUES (
    1,
    CURRENT_DATE,
    CURRENT_TIME,
    10,
    1,
    NOW(),
    NOW(),
    1,
    1
);