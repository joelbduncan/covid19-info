from requests import get
import json
import time;

localtime = time.asctime( time.localtime(time.time()) )
print ("Ran:", localtime)

# Get Total UTLA County Data
def get_utla(url):
    response = get(endpointUtla, timeout=10)
    
    if response.status_code >= 400:
        raise RuntimeError(f'Request failed: { response.text }')
        
    return response.json()
    

if __name__ == '__main__':
    endpointUtla = (
        'https://api.coronavirus.data.gov.uk/v1/data?'
        'filters=areaType=utla&latestBy=cumCasesByPublishDate&'
        'structure={"areaName":"areaName","cumCasesByPublishDate":"cumCasesByPublishDate","cumDeathsByPublishDate":"cumDeathsByPublishDate","cumCasesByPublishDateRate":"cumCasesByPublishDateRate"}'
    )

# Get Today UTLA County Data
def get_utla_today(url):
    response = get(endpointUtlaToday, timeout=10)
    
    if response.status_code >= 400:
        raise RuntimeError(f'Request failed: { response.text }')
        
    return response.json()
    

if __name__ == '__main__':
    endpointUtlaToday = (
        'https://api.coronavirus.data.gov.uk/v1/data?'
        'filters=areaType=utla&latestBy=newCasesByPublishDate&'
        'structure={"date":"date","areaName":"areaName","newCasesByPublishDate":"newCasesByPublishDate","newDeathsByPublishDate":"newDeathsByPublishDate"}'
    )

# Get Today Region Data
def get_region_today(url):
    response = get(endpointRegionToday, timeout=10)
    
    if response.status_code >= 400:
        raise RuntimeError(f'Request failed: { response.text }')
        
    return response.json()
    

if __name__ == '__main__':
    endpointRegionToday = (
        'https://api.coronavirus.data.gov.uk/v1/data?'
        'filters=areaType=region&latestBy=newCasesByPublishDate&'
        'structure={"date":"date","areaName":"areaName","newCasesByPublishDate":"newCasesByPublishDate","newDeathsByPublishDate":"newDeathsByPublishDate"}'
    )

# Get Total Region Data
def get_region(url):
    response = get(endpointRegion, timeout=10)
    
    if response.status_code >= 400:
        raise RuntimeError(f'Request failed: { response.text }')
        
    return response.json()
    

if __name__ == '__main__':
    endpointRegion = (
        'https://api.coronavirus.data.gov.uk/v1/data?'
        'filters=areaType=region&latestBy=cumCasesByPublishDate&'
        'structure={"areaName":"areaName","cumCasesByPublishDate":"cumCasesByPublishDate","cumDeathsByPublishDate":"cumDeathsByPublishDate","cumCasesByPublishDateRate":"cumCasesByPublishDateRate"}'
    )

# Get Vaccine Data
def get_vaccine_data(url):
    response = get(endpointVaccineData, timeout=10)
    
    if response.status_code >= 400:
        raise RuntimeError(f'Request failed: { response.text }')
        
    return response.json()
    

if __name__ == '__main__':
    endpointVaccineData = (
        'https://api.coronavirus.data.gov.uk/v1/data?'
        'filters=areaType=overview&'
        'structure={"areaType":"areaType","areaName":"areaName","areaCode":"areaCode","date":"date","cumPeopleVaccinatedFirstDoseByPublishDate":"cumPeopleVaccinatedFirstDoseByPublishDate","cumPeopleVaccinatedSecondDoseByPublishDate":"cumPeopleVaccinatedSecondDoseByPublishDate"}&format=json'
    )

# Get Vaccine Daily Data
def get_vaccine_daily_data(url):
    response = get(endpointVaccineDailyData, timeout=10)
    
    if response.status_code >= 400:
        raise RuntimeError(f'Request failed: { response.text }')
        
    return response.json()
    

if __name__ == '__main__':
    endpointVaccineDailyData = (
        'https://api.coronavirus.data.gov.uk/v1/data?'
        'filters=areaType=overview&'
        'structure={"areaType":"areaType","areaName":"areaName","areaCode":"areaCode","date":"date","newPeopleVaccinatedFirstDoseByPublishDate":"newPeopleVaccinatedFirstDoseByPublishDate","newPeopleVaccinatedSecondDoseByPublishDate":"newPeopleVaccinatedSecondDoseByPublishDate","cumPeopleVaccinatedFirstDoseByPublishDate":"cumPeopleVaccinatedFirstDoseByPublishDate","cumPeopleVaccinatedSecondDoseByPublishDate":"cumPeopleVaccinatedSecondDoseByPublishDate"}&format=json'
    )
    
    utla = get_utla(endpointUtla)
    utlaToday = get_utla_today(endpointUtlaToday)
    region = get_region(endpointRegion)
    regionToday = get_region_today(endpointRegionToday)
    vaccineData = get_vaccine_data(endpointVaccineData)
    vaccineDailyData = get_vaccine_daily_data(endpointVaccineDailyData)


with open('/var/www/covid19-info/api/utla.json', 'w') as outfile:
    json.dump(utla, outfile)

with open('/var/www/covid19-info/api/utlaToday.json', 'w') as outfile:
    json.dump(utlaToday, outfile)

with open('/var/www/covid19-info/api/region.json', 'w') as outfile:
    json.dump(region, outfile)

with open('/var/www/covid19-info/api/regionToday.json', 'w') as outfile:
    json.dump(regionToday, outfile)

with open('/var/www/covid19-info/api/vaccineData.json', 'w') as outfile:
    json.dump(vaccineData, outfile)

with open('/var/www/covid19-info/api/vaccineDailyData.json', 'w') as outfile:
    json.dump(vaccineDailyData, outfile)
