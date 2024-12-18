SELECT 
    country.*, 
    (SELECT COUNT(*) FROM country) AS country_count
FROM country
ORDER BY name ASC;