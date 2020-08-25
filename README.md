# Geohealth : Yemen version of tracker

[![IMAGE ALT TEXT HERE](https://img.youtube.com/vi/8WViesvik2Y/0.jpg)](https://www.youtube.com/watch?v=8WViesvik2Y)

## Tracker

Tracker is developed and maintained in-house to meet the need for a software that can track
cases and isolation centers in Sudan. Tracker consists of two applications:
- A Web interface: Tracker is a web application, it can run on any browser and any
platform. The client side code is very light and doesn’t require any specialized hardware
or modern devices
- Mobile companion app. Tracker has different components, for example the ambulance
module is better suited for mobile interfaces since the ambulance user will have
difficulties to use a laptop. The Android App is a Web View with some intgerated
features:
- It can make calls from within the app
- It can use Google Maps (built-in support in android devices) to easily locate
target cases and select routes

We first developed Tracker for Isolation Centers and Quarantines management when the
number of Corona cases was still in the order of tens and the general consensus back then was
to avail as many isolation centers as possible. Isolation module in Tracker includes:
- Adding facilities
- Tracking facilities capacity (in terms of ICU beds, etc)

- Assigning facilities tasks to members (e.g., some facilities lacked electricity or needs
preparations)
- Team members report regarding their assigned tasks for each respective facility.
- And plenty of other services.
Tracker has GIS support built-in for each of its services. In fact, our belief is that GIS can have a
major contribution to the tracking and controlling of Covid-19.


Tracker is built on our experience with Emergence and epidemic Administration and central lab
representatives in the State of Khartoum. All of the processes in Tracker and the forms are from
actual call center user’s submissions.

### Tracker components
Tracker is an integrated management system. The power of tracker is that it can give the
stakeholder “a single source of Truth”, and it also connects and integrates between different
stakeholders of Covid-19.
- Emergence and epidemic Administration (Call center)
- Locality administrators
- Central Lab administrators
- Ambulances and rapid response users
- Quarantine Project managers
- Cases reports

### Specifications
- User permission groups
- Users have different level of administration
- Locality / administrators don’t only view their assigned tasks
- Ambulances user have their mobile applications
- A map is used throughout the system for data entry and further data analysis

### Quarantine Module
Quarantine or facilities module was originally added for management purposes. It simply does
the following:
- Adding new facilities (geo-locate the site in the accompanied map)
- Assign a facility to a project manager
- Project manager can assign tasks to team members
- Each facility has an issue log (for the status of each facility and its closed / outstanding
issues)
The goal was to help prepare new quarantine sites at ease and keep the Stakeholders in
picture.
