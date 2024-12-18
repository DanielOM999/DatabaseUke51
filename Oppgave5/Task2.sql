SELECT 
    city.Name AS hovedstad,
    country.Name AS land,
    city.District AS distrikt,
    city.Info AS info,
    country.Code AS countrykode
FROM city
JOIN country ON city.CountryCode = country.Code;
