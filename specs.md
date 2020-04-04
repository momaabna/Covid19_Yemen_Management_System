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
- State
- City
- Neighborhood
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


