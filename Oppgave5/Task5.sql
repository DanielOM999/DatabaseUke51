SELECT 
    co.Name AS land,
    COUNT(c.Name) AS antall_byer
FROM city c
JOIN country co ON c.CountryCode = co.Code
WHERE c.Name LIKE 'Al%'
GROUP BY co.Name
ORDER BY co.Name ASC;