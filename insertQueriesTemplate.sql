-- sample data

INSERT INTO  countryOffice
VALUES ('PK-586', 'Pakistan', 'workremotely.pakistan@hotmail.com', '0213-6786786')

INSERT INTO  cityChapter (chapterId, countryOffice_countryCode, chapterCity, chapterEmail, chapterPhone, chapterAddress)
VALUES ('PK-586', 'Islamabad', 'islworkremotely@hotmail.com', '0213-4564564', 'Plot No. 55, 
		Street ABC, Phase XYZ')



INSERT INTO  registeredMembers (cityChapter_chapterId, memberFullName, memberEmail, memberAddress, memberPhone, memberStatus, memberJoinDate,memberLeaveDate, memberDOB, memberUniversity)
VALUES (1,'John Doe', 'johndoe@gmail.com', 'Plot No. 56, Street DEF, Phase PQR', '0333-1122334',
		1, '2017-03-11', NULL, '1995-05-15', 
		'Karachi University')

/** (error with COnvERT)
INSERT INTO  registeredMembers (cityChapter_chapterId, memberFullName, memberEmail, memberAddress, memberPhone, memberStatus, memberJoinDate,memberLeaveDate, memberDOB, memberUniversity)
VALUES (1, 'John Doe', 'johndoe@gmail.com', 'Plot No. 56, Street DEF, Phase PQR', '0333-1122334',
		1, CONVERT(date, '2017-03-11', 23), NULL, CONVERT(date, '1995-05-15', 23), 
		'Karachi University')
**/

INSERT INTO  organization (orgName, orgAddress, orgEmail, orgPhone)
VALUES ('Clean Karachi', 'DHA Phase 6', 'clean.khi@gmail.com', '0213-4920000')



INSERT INTO  program (employee_employeeId, organization_orgId, programName, programCountry, programCity, programLocation, programStartDate, programEndDate, programDescription, programRequirements, programType, programCapacity, programRemarks)
VALUES (NULL, 1, 'Program Clean Sweep', 'Pakistan', 'Karachi', 'Landhi', 
		'2019-03-15', NULL, 'The program is aiming to clean up public spaces and spread awareness about the health hazards of uncleanliness.', 
		'You have to be a registered member, thats all.', 1, 10, NULL)

/** (error with convert)
INSERT INTO  program (employee_employeeId, organization_orgId, programName, programCountry, programCity, programLocation, programStartDate, programEndDate, programDescription, programRequirements, programType, programCapacity, programRemarks)
VALUES (NULL, 1, 'Program Clean Sweep', 'Pakistan', 'Karachi', 'Landhi', 
		convert(date, '2019-03-15', 23), NULL, 'The program is aiming to clean up public spaces and spread awareness about the health hazards of uncleanliness.', 
		'You have to be a registered member, thats all.', 1, 10, NULL)

**/

INSERT INTO  employee(countryOffice_countryCode, employeeFullName, employeeJoiningDate, employeeDOB, employeePhone, employeeEmail, employeeSalary, employeeType )
VALUES ('PK-586', 'Shadab Khan', '2011-01-05',  '1985-11-02',
		'0331-1234567', 'shadab.khan@gmail.com', 70000, 2)

/**
INSERT INTO  employee(countryOffice_countryCode, employeeFullName, employeeJoiningDate, employeeDOB, employeePhone, employeeEmail, employeeSalary, employeeType )
VALUES ('PK-586', 'Shadab Khan', convert(date, '2011-01-05', 23), convert(date, '1985-11-02', 23),
		'0331-1234567', 'shadab.khan@gmail.com', 70000, 2)
**/


INSERT INTO  interview (programApplicant_program_programId, programApplicant_registeredMembers_memberId, programApplicant_appId, employee_employeeId, interviewLocation, interviewDateTime, interviewResult)
VALUES (1, 1, 1, 1, 'Plot No. 55, 
		Street ABC, Phase XYZ',  '2018-11-01', 'Selected')
/**
INSERT INTO  interview (programApplicant_program_programId, programApplicant_registeredMembers_memberId, programApplicant_appId, employee_employeeId, interviewLocation, interviewDateTime, interviewResult)
VALUES (1, 1, 1, 1, 'Plot No. 55, 
		Street ABC, Phase XYZ', convert(date, '2018-11-01', 23), 'Selected')
**/



INSERT INTO  programApplicant (registeredMembers_memberId, program_programId)
VALUES (1, 1)

-- CREATE PROGRAM QUERY

-- show organization in form

-- insert program

insert into  program (employee_employeeId, organization_orgId, programName, programCountry, 
		programCity, programLocation, programStartDate, programEndDate, programDescription, 
		programRequirements, programType, programCapacity, programRemarks)
values ($employee_employeeId, $organization_orgId, $programName, $programCountry, 
		$programCity, $programLocation, $programStartDate, $programEndDate, $programDescription, 
		$programRequirement, $programType, $programCapacity, $programRemarks)

-- view program

-- CREATE CITY CHAPTER QUERY

-- show country office in form


-- insert city chapter

insert into  cityChapter
values ($countryOffice_countryCode, $chapterCity, $chapterEmail, $chapterPhone, $chapterAddress)

-- view city chapter

-- CREATE MEMBER QUERY

-- insert member

insert into registeredMembers
values ($cityChapter_chapterId, $memberFullName, $memberEmail, $memberAddress, $memberPhone,
		$memberStatus, $memberJoinDate, NULL, $memberDOB, $memberUniversity)

-- view member