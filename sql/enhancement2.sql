--Query One
INSERT INTO clients (clientFirstname, clientLastname, clientEmail, clientPassword, comment) VALUES ('Tony', 'Stark', 'tony@starkent.com', 'Iam1ronM@n', 'I am the real Ironman');

--Query Two
UPDATE clients SET clientLevel = 3 WHERE clientLastName = 'Stark';

--Query Three
SELECT Replace ("Do you have 6 kids and like to go off-roading? The Hummer gives you the small interiors with an engine to get you out of any muddy or rocky situation", "small", "spacious");

--Query Four
SELECT invModel, classificationName
FROM inventory i
INNER JOIN carclassification ON i.classificationId = carclassification.classificationId
WHERE classificationName = 'SUV';

--Query Five
DELETE 
FROM inventory
WHERE invId = 1;


--Query Six
UPDATE inventory SET invThumbnail = CONCAT('/phpmotors', invThumbnail), invImage = CONCAT('/phpmotors', invImage);
