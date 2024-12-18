import json

sample_json = {
    "GNP": 828,
    "_id": "00005de917d80000000000000000",
    "Code": "ABW",
    "Name": "Aruba",
    "IndepYear": None,
    "geography": {
        "Region": "Caribbean",
        "Continent": "North America",
        "SurfaceArea": 193
    },
    "government": {
        "HeadOfState": "Beatrix",
        "GovernmentForm": "Nonmetropolitan Territory of The Netherlands"
    },
    "demographics": {
        "Population": 103000,
        "LifeExpectancy": 78.4
    }
}

def generate_sql(json_obj, table_name, column_name):
    query_parts = []
    
    for key, value in json_obj.items():
        if isinstance(value, dict):
            for sub_key in value.keys():
                query_parts.append(
                    f"JSON_EXTRACT({column_name}, '$.{key}.{sub_key}') AS {key}_{sub_key}"
                )
        else:
            query_parts.append(
                f"JSON_EXTRACT({column_name}, '$.{key}') AS {key}"
            )
    
    query = f"SELECT {', '.join(query_parts)} FROM {table_name};"
    return query

table_name = "world_x.countryinfo"
column_name = "doc"
sql_query = generate_sql(sample_json, table_name, column_name)
print(sql_query)
