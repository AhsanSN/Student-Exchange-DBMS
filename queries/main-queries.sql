
--- TRIGGER: CREATE MEMBER ACCOUNT ---

create trigger CreateMemberAccount
on registeredMembers 
after insert
AS
	declare @MemberID int;

	select @MemberID = i.memberId from inserted i;

	insert into memberAccount
	values (@MemberID, 0, 0)

GO

alter trigger DeleteMemberAccount
on registeredMembers 
for delete
AS
	declare @MemberID int;

	select @MemberID = i.memberId from deleted i;

	delete from memberAccount
	where registeredMembers_memberId = @MemberID

GO

------

-- CREATE PROGRAM QUERY

-- show organization in form

select o.orgId, o.orgName
from dbo.organization o

-- insert program

insert into dbo.program (employee_employeeId, organization_orgId, programName, programCountry, 
		programCity, programLocation, programStartDate, programEndDate, programDescription, 
		programRequirements, programType, programCapacity)
values ($employee_employeeId, $organization_orgId, $programName, $programCountry, 
		$programCity, $programLocation, $programStartDate, $programEndDate, $programDescription, 
		$programRequirement, $programType, $programCapacity, $programRemarks)

-- view program

CREATE PROCEDURE AdminViewsPrograms
AS
BEGIN

select p.programName, p.orgName,
		case
		when p.programType = 0 then 'Unpaid'
		when p.programType = 1 then 'Paid'
		end
		as [Program Type],
		case
		when em.employeeId is null then 'Assign Program Head'
		else em.employeeFullName
		end as [Program Head],
		p.programStartDate, p.programEndDate, p.programLocation, 
		p.programCountry, p.programCity, p.programDescription, p.programRequirements, 
		p.programCapacity, pa.[No. of Applicants], i.[Selected Students],
		case
		when p.programEndDate is null then 'Mark as Ended'
		when p.programEndDate is not null then 'See Program Report'
		end
		as [Mark as Ended]
from 
(
select *
from dbo.program inner join dbo.organization on organization_orgId = orgId
) p
left outer join
(
select program_programId, COUNT(*) as [No. of Applicants]
from dbo.programApplicant
group by program_programId
) pa
on p.programId = pa.program_programId
left outer join
(
select programApplicant_program_programId, COUNT(*) as [Selected Students]
from dbo.interview
where interviewResult = 'Selected'
group by programApplicant_program_programId
) i 
on p.programId = i.programApplicant_program_programId
left outer join
employee em on p.employee_employeeId = em.employeeId

END

GO

--- Admin Views Programs ---

exec AdminViewsPrograms

-- If program is paid, user clicks on paid:

select cast(pf.payPerDay as varchar) + '$' as [Pay per Day], pf.typeOfWork
from program p inner join programFinance pf on p.programId = pf.program_programId

-- Assign Program Head

select employeeId, employeeFullName
from employee
where employeeType = 1


-- WHEN MEMBER VIEWS PROGRAM

CREATE PROCEDURE MemberViewsPrograms
@MemberID int
AS

BEGIN

select pr.programId, pr.programName, org.orgName,
		case
		when pr.programType = 0 then 'Unpaid'
		when pr.programType = 1 then 'Paid'
		end
		as [Program Type],
		pr.programStartDate, pr.programEndDate, pr.programLocation, 
		pr.programCountry, pr.programCity, pr.programDescription, pr.programRequirements,
		'Apply' as [Apply for Program]
from program pr inner join organization org on pr.organization_orgId = org.orgId
where pr.programId not in (select program_programId
from programApplicant
where registeredMembers_memberId = @MemberID
)
union
select pr.programId, pr.programName, org.orgName,
		case
		when pr.programType = 0 then 'Unpaid'
		when pr.programType = 1 then 'Paid'
		end
		as [Program Type],
		pr.programStartDate, pr.programEndDate, pr.programLocation, 
		pr.programCountry, pr.programCity, pr.programDescription, pr.programRequirements,
		case
			when iv.interviewId is null then 'Applied - Wait for Interview Call'
			else iv.interviewResult
		end as [Apply for Program]
from program pr 
		inner join organization org on pr.organization_orgId = org.orgId
		inner join programApplicant pa on pr.programId = pa.program_programId
		left outer join interview iv on pa.appId = iv.programApplicant_appId
where pa.registeredMembers_memberId = @MemberID

END

--- View Programs for Member 3 ---

exec MemberViewsPrograms 3

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
values ()

-- view member

ALTER PROCEDURE ViewMembers
AS
BEGIN

select 
		mem.memberFullName, mem.countryName, mem.chapterCity, mem.memberDOB, mem.memberUniversity,
		mem.memberJoinDate, mem.memberEmail, mem.[Programs Applied for], 
		memprogram.ProgramCount as [Program(s) Selected for]
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
left outer join
(
	select 
		pa.registeredMembers_memberId, Count(*) as [ProgramCount]
	from 
		dbo.programApplicant pa 
		left outer join 
		dbo.interview i 
		on pa.appId = i.programApplicant_appId
		inner join
		dbo.program p 
		on pa.program_programId = p.programId
		where i.interviewResult = 'Selected'
		group by pa.registeredMembers_memberId
) memprogram 
on mem.memberId = memprogram.registeredMembers_memberId

END

GO

--- View All Members --- 

exec ViewMembers

-- view member's program(s)

CREATE PROCEDURE ViewMemberPrograms
@MemberID int
AS

BEGIN

select programName, programCountry, programCity, programLocation, datediff(week, programEndDate,
		programStartDate) as [Duration], programStartDate, programEndDate, programDescription
from dbo.interview inner join dbo.program on programApplicant_program_programId = programId
where interviewResult = 'Selected'
		and programApplicant_registeredMembers_memberId = @MemberID

END

GO

--- View Programs of Member 3 ---

exec ViewMemberPrograms 3

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

/*
select aa.memberId, ab.appId, ab.programId, aa.memberFullName, aa.memberEmail, ab.[Call for Interview]
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
*/

CREATE PROCEDURE ListProgramApplicants
@ProgramID int
AS

BEGIN

select ab.memberFullName, ab.memberEmail,
case
	when iv.interviewId is null then 'Call'
	else iv.interviewResult
end as [Call for Interview]
from
(
select pa.*, rm.memberFullName, rm.memberEmail
from programApplicant pa inner join registeredMembers rm 
		on pa.registeredMembers_memberId = rm.memberId
where pa.program_programId = @ProgramID
) ab
inner join interview iv on ab.appId = iv.programApplicant_appId

END

GO

--- List Applicants of Program 1 ---

EXEC ListProgramApplicants 1

-- ONCE YOU CLICK ON CALL IT WILL REDIRECT ON A PAGE THAT CREATES INTERVIEW FOR THAT
-- PARTICULAR PROGRAM AND MEMBER

insert into interview(programApplicant_program_programId, 
	programApplicant_registeredMembers_memberId, programApplicant_appId, employee_employeeId,
	interviewLocation, interviewDateTime, interviewResult)
values ($programApplicant_program_programId, 
	$programApplicant_registeredMembers_memberId, $programApplicant_appId, $employee_employeeId,
	$interviewLocation, $interviewDateTime, 'Pending')

-- employee id will be selected here
select em.employeeId, em.employeeFullName
from employee em
where em.employeeType = 2


-- VIEW SPONSOR

select sp.sponsorName, co.countryName, sp.sponsorEmail, sp.sponsorPhone
from sponsor sp inner join countryOffice co on sp.countryOffice_countryCode = co.countryCode


-- VIEW INTERVIEWS

select rm.memberFullName, pr.programName, org.orgName, iv.interviewDate, iv.interviewTime,
		em.employeeFullName
from interview iv inner join registeredMembers rm 
			on iv.programApplicant_registeredMembers_memberId = rm.memberId
		inner join program pr on iv.programApplicant_program_programId = pr.programId
		inner join organization org on pr.programId = org.orgId
		inner join employee em on iv.employee_employeeId = em.employeeId
where iv.interviewResult = 'Pending'



-- TRANSACTIONS

-- ENDS PROGRAM

CREATE PROCEDURE EndProgram
(
	@ProgramID int,
	@accRating int,
	@travelRating int,
	@expRating int,
	@workRating int
)
AS

BEGIN

BEGIN TRANSACTION

-- ends program

UPDATE program
SET programEndDate = GETDATE()
WHERE programId = @ProgramID

-- generates report

INSERT INTO programReport
VALUES (@ProgramID, @accRating, @travelRating, @expRating, @workRating)

-- add credit to members' accounts

declare @AddCredit int
	select
	@AddCredit = payPerDay * Duration 
	from
	(select payPerDay
	from programFinance
	where program_programId = @ProgramID) aa ,
	(select DATEDIFF(day, programStartDate, programEndDate) as [Duration]
	from program
	where programId = @ProgramID) ab

UPDATE memberAccount
SET currentBalance = currentBalance + @AddCredit
where registeredMembers_memberId in (select iv.programApplicant_registeredMembers_memberId
from program pr inner join interview iv on pr.programId = iv.programApplicant_program_programId
				where pr.programId = @ProgramID
				and iv.interviewResult = 'Selected'
				)

UPDATE memberAccount
SET totalBalance = totalBalance + @AddCredit
where registeredMembers_memberId in (select programApplicant_registeredMembers_memberId
from program pr inner join interview iv on pr.programId = iv.programApplicant_program_programId
				where pr.programId = @ProgramID
				and iv.interviewResult = 'Selected'
				)

COMMIT

END

GO

-- insert for paid programs

insert into programFinance
values ($programId, $payPerDay, $typeOfWork)

-- when member applies, run this

insert into programApplicant
values ($memberId, $programId)

-- interview select/reject

CREATE PROCEDURE TakeInterview

(
	@interviewId int,
	@interviewResult varchar(20)
)
AS

BEGIN

UPDATE interview
set interviewResult = @interviewResult
where interviewId = @interviewId

END

