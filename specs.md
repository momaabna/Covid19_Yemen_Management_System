# Covid-19 Tracker in Sudan

This document enlists the agreed upon specs for Covid-19 Tracker system.

## Scope of work

- build a website for administrative use. It has a *view-only* mode for non administrator
- the website (and the system; as it will include apis) will have:
    - list of quarantines locations
    - list of cases
    - Locations of quarantines
    - Locations of registered cases
    - Add new quarantine
    - Add new case
    - Assign a new case to a quarantine
    - Search for quarantines (regex)
    - Search through cases (regex)
    - [] fitler quarantines geographically
    - [] filter quarantines on their categories


### System models

#### Quarantines Model

This model (or table), will have these fields:

- type of building (from BuildingsModel)
- building description (text)
- State [from table states]
- City [from table cities]
- Neighborhood [from table neighborhoods]
- Latitude
- Longitude
- Side code (it can be geo-coded)
- Address
- Nearby places (featured places)


#### Quarantine specs Model

- Number of beds
- Area in M^2
- Requested new beds
- Type of AC
- Type of generator / electricity
- Administators Name (One to one, AdminModel)
- Pictures (optional)

#### Admin Model

- Name
- Mobile number
- Email
- Whatsapp number


#### State Model (lookup table)

- ID
- Name

#### City Model (lookup table)

- ID
- Name
- StateID

#### Neighborhood Model (lookup table)

- ID
- Name
- StateID
- CityID



## TODOs

When adding a new quarantine, do the following:

- get the state from table cities (dropdown menu)
- get cities in selected states (select * from cities where stateid = ?)
- get neighborhoods from the selected state AND city

