SELECT 
    c.Name AS hovedstad,
    co.Name AS land,
    c.District AS distrikt,
    c.Info AS info,
    co.Code AS countrykode
FROM city c
JOIN country co ON c.CountryCode = co.Code
WHERE c.Name LIKE 'Al%'
ORDER BY co.Name ASC;