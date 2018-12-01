CREATE TABLE organization (
  orgId INTEGER  NOT NULL   IDENTITY ,
  orgName VARCHAR(45)  NOT NULL  ,
  orgAddress VARCHAR(100)  NOT NULL  ,
  orgEmail VARCHAR(100)  NOT NULL  ,
  orgPhone VARCHAR(20)  NOT NULL    ,
PRIMARY KEY(orgId));
GO




CREATE TABLE countryOffice (
  countryCode VARCHAR(20)  NOT NULL  ,
  countryName VARCHAR(45)  NOT NULL  ,
  countryOfficeEmail VARCHAR(100)    ,
  countryOfficePhone VARCHAR(20)      ,
PRIMARY KEY(countryCode));
GO




CREATE TABLE cityChapter (
  chapterId INTEGER  NOT NULL   IDENTITY ,
  countryOffice_countryCode VARCHAR(20)  NOT NULL  ,
  chapterCity VARCHAR(45)  NOT NULL  ,
  chapterEmail VARCHAR(100)    ,
  chapterPhone VARCHAR(20)    ,
  chapterAddress VARCHAR(100)  NOT NULL    ,
PRIMARY KEY(chapterId)  ,
  FOREIGN KEY(countryOffice_countryCode)
    REFERENCES countryOffice(countryCode));
GO


CREATE INDEX cityChapter_FKIndex1 ON cityChapter (countryOffice_countryCode);
GO


CREATE INDEX IFK_has  ON cityChapter (countryOffice_countryCode);
GO


CREATE TABLE employee (
  employeeId INTEGER  NOT NULL   IDENTITY ,
  countryOffice_countryCode VARCHAR(20)  NOT NULL  ,
  employeeFullName VARCHAR(45)  NOT NULL  ,
  employeeJoiningDate DATE  NOT NULL  ,
  employeeDOB DATE  NOT NULL  ,
  employeePhone VARCHAR(20)    ,
  employeeEmail VARCHAR(100)    ,
  employeeSalary INTEGER  NOT NULL  ,
  employeeType INTEGER  NOT NULL    ,
PRIMARY KEY(employeeId)  ,
  FOREIGN KEY(countryOffice_countryCode)
    REFERENCES countryOffice(countryCode));
GO


CREATE INDEX employee_FKIndex1 ON employee (countryOffice_countryCode);
GO


CREATE INDEX IFK_has ON employee (countryOffice_countryCode);
GO


CREATE TABLE sponsor (
  sponsorId INTEGER  NOT NULL   IDENTITY ,
  countryOffice_countryCode VARCHAR(20)  NOT NULL  ,
  sponsorName VARCHAR(45)  NOT NULL  ,
  sponsorEmail VARCHAR(100)    ,
  sponsorPhone VARCHAR(20)      ,
PRIMARY KEY(sponsorId)  ,
  FOREIGN KEY(countryOffice_countryCode)
    REFERENCES countryOffice(countryCode));
GO


CREATE INDEX sponsor_FKIndex1 ON sponsor (countryOffice_countryCode);
GO


CREATE INDEX IFK_sponsored_by ON sponsor (countryOffice_countryCode);
GO


CREATE TABLE program (
  programId INTEGER  NOT NULL   IDENTITY ,
  employee_employeeId INTEGER    ,
  organization_orgId INTEGER  NOT NULL  ,
  programName VARCHAR(45)  NOT NULL  ,
  programCountry VARCHAR(45)  NOT NULL  ,
  programCity VARCHAR(45)  NOT NULL  ,
  programLocation VARCHAR(100)  NOT NULL  ,
  programStartDate DATE  NOT NULL  ,
  programEndDate DATE    ,
  programDescription VARCHAR(255)  NOT NULL  ,
  programRequirements VARCHAR(255)    ,
  programType INTEGER  NOT NULL  ,
  programCapacity INTEGER  NOT NULL    ,
PRIMARY KEY(programId)    ,
  FOREIGN KEY(organization_orgId)
    REFERENCES organization(orgId),
  FOREIGN KEY(employee_employeeId)
    REFERENCES employee(employeeId));
GO


CREATE INDEX program_FKIndex1 ON program (organization_orgId);
GO
CREATE INDEX program_FKIndex2 ON program (employee_employeeId);
GO


CREATE INDEX IFK_conducts  ON program (organization_orgId);
GO
CREATE INDEX IFK_heads ON program (employee_employeeId);
GO


CREATE TABLE registeredMembers (
  memberId INTEGER  NOT NULL   IDENTITY ,
  cityChapter_chapterId INTEGER  NOT NULL  ,
  memberFullName VARCHAR(45)  NOT NULL  ,
  memberEmail VARCHAR(100)    ,
  memberAddress VARCHAR(100)    ,
  memberPassword VARCHAR(20)  NOT NULL  ,
  memberPhone VARCHAR(20)    ,
  memberJoinDate DATE  NOT NULL  ,
  memberLeaveDate DATE    ,
  memberDOB DATE  NOT NULL  ,
  memberUniversity VARCHAR(100)      ,
PRIMARY KEY(memberId)  ,
  FOREIGN KEY(cityChapter_chapterId)
    REFERENCES cityChapter(chapterId));
GO


CREATE INDEX registeredMembers_FKIndex1 ON registeredMembers (cityChapter_chapterId);
GO


CREATE INDEX IFK_registers ON registeredMembers (cityChapter_chapterId);
GO


CREATE TABLE programReport (
  program_programId INTEGER  NOT NULL  ,
  accomodationRating INT  NOT NULL  ,
  travelRating INT  NOT NULL  ,
  experienceRating INT  NOT NULL  ,
  workRating INT  NOT NULL    ,
PRIMARY KEY(program_programId)  ,
  FOREIGN KEY(program_programId)
    REFERENCES program(programId));
GO


CREATE INDEX programReport_FKIndex1 ON programReport (program_programId);
GO


CREATE INDEX IFK_recorded_by ON programReport (program_programId);
GO


CREATE TABLE programFinance (
  program_programId INTEGER  NOT NULL  ,
  payPerDay FLOAT  NOT NULL  ,
  typeOfWork VARCHAR(200)  NOT NULL    ,
PRIMARY KEY(program_programId)  ,
  FOREIGN KEY(program_programId)
    REFERENCES program(programId));
GO


CREATE INDEX programFinance_FKIndex1 ON programFinance (program_programId);
GO


CREATE INDEX IFK_may_have ON programFinance (program_programId);
GO


CREATE TABLE memberAccount (
  registeredMembers_memberId INTEGER  NOT NULL  ,
  currentBalance FLOAT    ,
  totalBalance FLOAT      ,
PRIMARY KEY(registeredMembers_memberId)  ,
  FOREIGN KEY(registeredMembers_memberId)
    REFERENCES registeredMembers(memberId));
GO


CREATE INDEX memberAccount_FKIndex1 ON memberAccount (registeredMembers_memberId);
GO


CREATE INDEX IFK_have ON memberAccount (registeredMembers_memberId);
GO


CREATE TABLE programApplicant (
  appId INTEGER  NOT NULL   IDENTITY ,
  registeredMembers_memberId INTEGER  NOT NULL  ,
  program_programId INTEGER  NOT NULL    ,
PRIMARY KEY(appId, registeredMembers_memberId, program_programId)    ,
  FOREIGN KEY(registeredMembers_memberId)
    REFERENCES registeredMembers(memberId),
  FOREIGN KEY(program_programId)
    REFERENCES program(programId));
GO


CREATE INDEX programApplicant_FKIndex1 ON programApplicant (registeredMembers_memberId);
GO
CREATE INDEX programApplicant_FKIndex2 ON programApplicant (program_programId);
GO


CREATE INDEX IFK_applies_as ON programApplicant (registeredMembers_memberId);
GO
CREATE INDEX IFK_enrolls_through ON programApplicant (program_programId);
GO


CREATE TABLE interview (
  interviewId INTEGER  NOT NULL   IDENTITY ,
  programApplicant_program_programId INTEGER  NOT NULL  ,
  programApplicant_registeredMembers_memberId INTEGER  NOT NULL  ,
  programApplicant_appId INTEGER  NOT NULL  ,
  employee_employeeId INTEGER  NOT NULL  ,
  interviewLocation VARCHAR(100)  NOT NULL  ,
  interviewDate DATE  NOT NULL  ,
  interviewTime TIME  NOT NULL  ,
  interviewResult VARCHAR(20)      ,
PRIMARY KEY(interviewId, programApplicant_program_programId, programApplicant_registeredMembers_memberId, programApplicant_appId)    ,
  FOREIGN KEY(programApplicant_appId, programApplicant_registeredMembers_memberId, programApplicant_program_programId)
    REFERENCES programApplicant(appId, registeredMembers_memberId, program_programId),
  FOREIGN KEY(employee_employeeId)
    REFERENCES employee(employeeId));
GO


CREATE INDEX interview_FKIndex1 ON interview (programApplicant_appId, programApplicant_registeredMembers_memberId, programApplicant_program_programId);
GO
CREATE INDEX interview_FKIndex2 ON interview (employee_employeeId);
GO


CREATE INDEX IFK_decided_by ON interview (programApplicant_appId, programApplicant_registeredMembers_memberId, programApplicant_program_programId);
GO
CREATE INDEX IFK_conducts ON interview (employee_employeeId);
GO



