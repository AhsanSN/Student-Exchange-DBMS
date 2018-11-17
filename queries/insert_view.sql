-- sample data

INSERT INTO dbo.countryOffice
VALUES ('PK-586', 'Pakistan', 'workremotely.pakistan@hotmail.com', '0213-6786786')

select * from dbo.countryOffice

INSERT INTO dbo.cityChapter
VALUES ('PK-586', 'Islamabad', 'islworkremotely@hotmail.com', '0213-4564564', 'Plot No. 55, 
		Street ABC, Phase XYZ')

select * from dbo.cityChapter

INSERT INTO dbo.registeredMembers
VALUES (1, 'John Doe', 'johndoe@gmail.com', 'Plot No. 56, Street DEF, Phase PQR', '0333-1122334',
		1, CONVERT(date, '2017-03-11', 23), NULL, CONVERT(date, '1995-05-15', 23), 
		'Karachi University')

select * from dbo.registeredMembers

INSERT INTO dbo.organization
VALUES ('Clean Karachi', 'DHA Phase 6', 'clean.khi@gmail.com', '0213-4920000')

select * from dbo.organization

INSERT INTO dbo.program
VALUES (NULL, 1, 'Program Clean Sweep', 'Pakistan', 'Karachi', 'Landhi', 
		convert(date, '2019-03-15', 23), NULL, 'The program is aiming to clean up public spaces and spread awareness about the health hazards of uncleanliness.', 
		'You have to be a registered member, thats all.', 1, 10, NULL)

select * from dbo.program

INSERT INTO dbo.employee
VALUES ('PK-586', 'Shadab Khan', convert(date, '2011-01-05', 23), convert(date, '1985-11-02', 23),
		'0331-1234567', 'shadab.khan@gmail.com', 70000, 2)

select * from dbo.employee

INSERT INTO dbo.interview
VALUES (1, 1, 1, 1, 'Plot No. 55, 
		Street ABC, Phase XYZ', convert(date, '2018-11-01', 23), 'Selected')

select * from dbo.interview

INSERT INTO dbo.programApplicant
VALUES (1, 1)

select * from dbo.programApplicant

-- CREATE PROGRAM QUERY

-- show organization in form

select o.orgId, o.orgName
from dbo.organization o

-- insert program

insert into dbo.program (employee_employeeId, organization_orgId, programName, programCountry, 
		programCity, programLocation, programStartDate, programEndDate, programDescription, 
		programRequirements, programType, programCapacity, programRemarks)
values ($employee_employeeId, $organization_orgId, $programName, $programCountry, 
		$programCity, $programLocation, $programStartDate, $programEndDate, $programDescription, 
		$programRequirement, $programType, $programCapacity, $programRemarks)

-- view program

select p.programName, p.orgName,
		case
		when p.programType = 0 then 'Unpaid'
		when p.programType = 1 then 'Paid'
		end
		as [Program Type],
		p.programStartDate, p.programEndDate, p.programLocation, 
		p.programCountry, p.programCity, p.programDescription, p.programRequirements, 
		p.programCapacity, pa.[No. of Applicants], i.[Selected Students]
from 
(
select *
from dbo.program inner join dbo.organization on organization_orgId = orgId
) p
inner join
(
select program_programId, COUNT(*) as [No. of Applicants]
from dbo.programApplicant
group by program_programId
) pa
on p.programId = pa.program_programId
inner join
(
select programApplicant_program_programId, COUNT(*) as [Selected Students]
from dbo.interview
where interviewResult = 'Selected'
group by programApplicant_program_programId
) i 
on p.programId = i.programApplicant_program_programId

-- CREATE CITY CHAPTER QUERY

-- show country office in form

select countryCode, countryName
from dbo.countryOffice

-- insert city chapter

insert into dbo.cityChapter
values ($countryOffice_countryCode, $chapterCity, $chapterEmail, $chapterPhone, $chapterAddress)

-- view city chapter

select cc.countryName, cc.chapterCity, cc.chapterAddress, cc.chapterEmail, cc.chapterPhone,
		rm.[No. of Registered Members]
from
(
select *
from dbo.cityChapter inner join dbo.countryOffice on countryOffice_countryCode = countryCode
) cc
inner join
(
select chapterId, COUNT(*) as [No. of Registered Members]
from dbo.cityChapter inner join dbo.registeredMembers on chapterId = cityChapter_chapterId
group by chapterId
) rm 
on cc.chapterId = rm.chapterId

-- CREATE MEMBER QUERY

-- form will first ask to select country, then city chapter from selected country

select countryCode, countryName
from dbo.countryOffice

select chapterId, chapterCity
from dbo.cityChapter
where countryOffice_countryCode = $countryCode

-- insert member

insert into registeredMembers
values ($cityChapter_chapterId, $memberFullName, $memberEmail, $memberAddress, $memberPhone,
		$memberStatus, $memberJoinDate, NULL, $memberDOB, $memberUniversity)

-- view member

select 
		mem.memberFullName, mem.countryName, mem.chapterCity, mem.memberDOB, mem.memberUniversity,
		mem.memberJoinDate, mem.memberEmail, mem.[Programs Applied for], memprogram.programName
		as [Program(s) Selected for]
from
(
	select 
			rm.memberId, rm.memberFullName, c.countryName, c.chapterCity, rm.memberDOB,
			rm.memberUniversity, rm.memberJoinDate, rm.memberEmail, 
			count(*) as [Programs Applied for]
	from 
			dbo.registeredMembers rm 
			inner join
			(
				select *
				from dbo.countryOffice co 
				inner join 
				dbo.cityChapter cc 
				on co.countryCode = cc.countryOffice_countryCode
			) c
			on rm.cityChapter_chapterId = c.chapterId
			inner join
			dbo.programApplicant pa 
			on rm.memberId = pa.registeredMembers_memberId
			group by
				rm.memberId, rm.memberFullName, c.countryName, c.chapterCity, rm.memberDOB,
				rm.memberUniversity, rm.memberJoinDate, rm.memberEmail
) mem
inner join
(
	select 
		pa.registeredMembers_memberId, p.programName
	from 
		dbo.programApplicant pa 
		inner join 
		dbo.interview i 
		on pa.appId = i.programApplicant_appId
		inner join
		dbo.program p 
		on pa.program_programId = p.programId
		where i.interviewResult = 'Selected'
) memprogram 
on mem.memberId = memprogram.registeredMembers_memberId


-- view member's program(s)

select programName, programCountry, programCity, programLocation, datediff(week, programEndDate,
		programStartDate) as [Duration], programStartDate, programEndDate, programDescription
from dbo.interview inner join dbo.program on programApplicant_program_programId = programId
where interviewResult = 'Selected'
		and programApplicant_registeredMembers_memberId = $memberId


-- CREATE ORGANIZATION

-- insert organization

insert into organization(orgName, orgAddress, orgEmail, orgPhone)
values ($orgName, $orgAddress, $orgEmail, $orgPhone)

-- view organization

select orgName, orgAddress, orgEmail, orgPhone
from organization

-- WHEN YOU VIEW PROGRAM AND CLICK ON [NO. OF APPLICANTS], IT TAKES YOU TO A PAGE THAT
-- SHOWS THE DETAILS OF THOSE WHO HAVE APPLIED ON THAT PROGRAM
-- IT RETURNS MEMBERID, PROGRAMID and APPID so THAT IT CAN BE USED TO CREATE INTERVIEW

select aa.memberId, ab.appId, ab.programId, aa.memberFullName, aa.programName as [Programs Selected for], aa.memberEmail, ab.[Call for Interview]
from
(select rm.memberId, rm.memberFullName, pr.programName, rm.memberEmail
from registeredMembers rm inner join interview iv 
		on rm.memberId = iv.programApplicant_registeredMembers_memberId
		inner join program pr on iv.programApplicant_program_programId = pr.programId
where iv.interviewResult = 'Selected') aa
inner join
(select pa.appId, pr.programId, iv.programApplicant_registeredMembers_memberId,
case
	when iv.interviewId is null then 'Call'
	else iv.interviewResult
end as [Call for Interview]
from program pr inner join programApplicant pa on pr.programId = pa.program_programId
		inner join interview iv on pa.appId = iv.programApplicant_appId
where pr.programId = 1) ab on aa.memberId = ab.programApplicant_registeredMembers_memberId

-- ONCE YOU CLICK ON CALL IT WILL REDIRECT ON A PAGE THAT CREATES INTERVIEW FOR THAT
-- PARTICULAR PROGRAM AND MEMBER

insert into interview(programApplicant_program_programId, 
	programApplicant_registeredMembers_memberId, programApplicant_appId, employee_employeeId,
	interviewLocation, interviewDateTime, interviewResult)
values ($programApplicant_program_programId, 
	$programApplicant_registeredMembers_memberId, $programApplicant_appId, $employee_employeeId,
	$interviewLocation, $interviewDateTime, null)

-- employee id will be selected here
select em.employeeId, em.employeeFullName
from employee em
where em.employeeType = $Interviewer

-- ADD PROGRAM REPORT

insert into programReport(program_programId, accomodationRating, travelRating, experienceRating,
		workRating)
values ($program_programId, $accomodationRating, $travelRating, $experienceRating,
		$workRating)