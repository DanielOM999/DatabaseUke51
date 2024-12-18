SELECT 
    JSON_EXTRACT(doc, '$.GNP') AS GNP,
    JSON_EXTRACT(doc, '$._id') AS ID,
    JSON_EXTRACT(doc, '$.Code') AS Code,
    JSON_EXTRACT(doc, '$.Name') AS Name,
    JSON_EXTRACT(doc, '$.IndepYear') AS IndepYear,
    JSON_EXTRACT(doc, '$.geography.Region') AS Region,
    JSON_EXTRACT(doc, '$.geography.Continent') AS Continent,
    JSON_EXTRACT(doc, '$.geography.SurfaceArea') AS SurfaceArea,
    JSON_EXTRACT(doc, '$.government.HeadOfState') AS HeadOfState,
    JSON_EXTRACT(doc, '$.government.GovernmentForm') AS GovernmentForm,
    JSON_EXTRACT(doc, '$.demographics.Population') AS Population,
    JSON_EXTRACT(doc, '$.demographics.LifeExpectancy') AS LifeExpectancy
FROM world_x.countryinfo;