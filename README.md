# HR Hierarchy Solution

## Summary 	

Simple HR manager RESTful API to update employees DB via JSON file of employees and their supervisors, responding to employee’s queries about who their boss his. 

## APP Instalation
1. clone the company-hierarchy rep into your machine or download all files as a zip folder 
```
	git clone https://github.com/brunobme/company-hierarchy.git
```
2. Download PHP Server and run the app on localhost

With docker you can create a php image and run the app  

```terminal
docker run --rm -v $(pwd):/app -w /app php:cli php PATH/index.php
```
replace the "PATH" accordingly to the path you downloaded the files

## APP Usage

Always send the secretCode value in the request which only allows to access the api

	secretCode=letshacktogether

### GET Requests

- To get all employees from the API send a GET request to /employees
- To get one employees supervisor, simply query the /employees with the parameter ?name
	
	/employess?secretCode=letshacktogether&name=Bruno

### POST Requests
- To update the current database of employees completely send a JSON file via POST request to /employees

**Other types of requests are not supported**

## Ongoing tasks
- convert_to_tree method: designed to return the hierarchy structure as per the requirements. But currently it doesn't work if the new/updated employee is not located on the root level
- validate_employees_json method: tracking key duplicity but not cycles

## Potential Enhancements
- store the password in a DB (in memory db for easier review) and update the authentication strategy for a standard user, pass login with OAuth (token generation)
- cover all use cases with more unit tests (PHPUnit)
- create Dockerfile for easier app usage in any system