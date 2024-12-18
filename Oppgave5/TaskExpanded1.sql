SELECT 
    city.*, 
    country.* 
FROM city
JOIN country ON city.countryCode = country.code;