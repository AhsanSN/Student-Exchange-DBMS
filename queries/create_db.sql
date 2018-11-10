CREATE TABLE organization (
  orgId INTEGER  NOT NULL  ,
  orgName VARCHAR(45)  NOT NULL  ,
  orgAddress VARCHAR(45)  NOT NULL  ,
  orgEmail VARCHAR(45)  NOT NULL  ,
  orgPhone VARCHAR(20)  NOT NULL    ,
PRIMARY KEY(orgId));





CREATE TABLE countryOffice (
  countryCode VARCHAR(20)  NOT NULL  ,
  countryName VARCHAR(45)  NOT NULL  ,
  countryOfficeEmail VARCHAR(45)    ,
  countryOfficePhone VARCHAR(20)      ,
PRIMARY KEY(countryCode));





CREATE TABLE cityChapter (
  chapterId INTEGER  NOT NULL  ,
  countryOffice_countryCode VARCHAR(20)  NOT NULL  ,
  chapterCity VARCHAR(45)  NOT NULL  ,
  chapterEmail VARCHAR(45)    ,
  chapterPhone VARCHAR(20)    ,
  chapterAddress VARCHAR(45)  NOT NULL    ,
PRIMARY KEY(chapterId)  ,
  FOREIGN KEY(countryOffice_countryCode)
    REFERENCES countryOffice(countryCode));



CREATE INDEX cityChapter_FKIndex1 ON cityChapter (countryOffice_countryCode);



CREATE INDEX IFK_has  ON cityChapter (countryOffice_countryCode);



CREATE TABLE employee (
  employeeId INTEGER  NOT NULL  ,
  countryOffice_countryCode VARCHAR(20)  NOT NULL  ,
  employeeFullName VARCHAR(45)  NOT NULL  ,
  employeeJoiningDate DATE  NOT NULL  ,
  employeeDOB DATE  NOT NULL  ,
  employeePhone VARCHAR(20)    ,
  employeeEmail VARCHAR(45)    ,
  employeeSalary INTEGER  NOT NULL  ,
  employeeType INTEGER  NOT NULL    ,
PRIMARY KEY(employeeId)  ,
  FOREIGN KEY(countryOffice_countryCode)
    REFERENCES countryOffice(countryCode));



CREATE INDEX employee_FKIndex1 ON employee (countryOffice_countryCode);



CREATE INDEX IFK_has ON employee (countryOffice_countryCode);



CREATE TABLE sponsor (
  sponsorId INTEGER  NOT NULL   ,
  countryOffice_countryCode VARCHAR(20)  NOT NULL  ,
  sponsorName VARCHAR(20)  NOT NULL  ,
  sponsorEmail VARCHAR(45)    ,
  sponsorPhone VARCHAR(20)      ,
PRIMARY KEY(sponsorId)  ,
  FOREIGN KEY(countryOffice_countryCode)
    REFERENCES countryOffice(countryCode));



CREATE INDEX sponsor_FKIndex1 ON sponsor (countryOffice_countryCode);



CREATE INDEX IFK_sponsored_by ON sponsor (countryOffice_countryCode);



CREATE TABLE program (
  programId INTEGER  NOT NULL   ,
  employee_employeeId INTEGER    ,
  organization_orgId INTEGER  NOT NULL  ,
  programName VARCHAR(45)  NOT NULL  ,
  programCountry VARCHAR(45)  NOT NULL  ,
  programCity VARCHAR(45)  NOT NULL  ,
  programLocation VARCHAR(45)  NOT NULL  ,
  programStartDate DATE  NOT NULL  ,
  programEndDate DATE    ,
  programDescription VARCHAR(255)  NOT NULL  ,
  programRequirements VARCHAR(255)    ,
  programType INTEGER  NOT NULL  ,
  programCapacity INTEGER  NOT NULL  ,
  programRemarks VARCHAR(255)      ,
PRIMARY KEY(programId)    ,
  FOREIGN KEY(organization_orgId)
    REFERENCES organization(orgId),
  FOREIGN KEY(employee_employeeId)
    REFERENCES employee(employeeId));


CREATE INDEX program_FKIndex1 ON program (organization_orgId);

CREATE INDEX program_FKIndex2 ON program (employee_employeeId);



CREATE INDEX IFK_conducts  ON program (organization_orgId);

CREATE INDEX IFK_heads ON program (employee_employeeId);



CREATE TABLE registeredMembers (
  memberId INTEGER  NOT NULL ,
  cityChapter_chapterId INTEGER  NOT NULL  ,
  memberFullName VARCHAR(45)  NOT NULL  ,
  memberEmail VARCHAR(45)    ,
  memberAddress VARCHAR(45)    ,
  memberPhone VARCHAR(20)    ,
  memberStatus INTEGER  NOT NULL  ,
  memberJoinDate DATE  NOT NULL  ,
  memberLeaveDate DATE    ,
  memberDOB DATE  NOT NULL  ,
  memberUniversity VARCHAR(45)      ,
PRIMARY KEY(memberId)  ,
  FOREIGN KEY(cityChapter_chapterId)
    REFERENCES cityChapter(chapterId));



CREATE INDEX registeredMembers_FKIndex1 ON registeredMembers (cityChapter_chapterId);
GO


CREATE INDEX IFK_registers ON registeredMembers (cityChapter_chapterId);



CREATE TABLE programReport (
  program_programId INTEGER  NOT NULL  ,
  accomodationRating INT  NOT NULL  ,
  travelRating INT  NOT NULL  ,
  experienceRating INT  NOT NULL  ,
  workRating INT  NOT NULL    ,
PRIMARY KEY(program_programId)  ,
  FOREIGN KEY(program_programId)
    REFERENCES program(programId));



CREATE INDEX programReport_FKIndex1 ON programReport (program_programId);



CREATE INDEX IFK_recorded_by ON programReport (program_programId);



CREATE TABLE programFinance (
  program_programId INTEGER  NOT NULL  ,
  payPerHour INTEGER  NOT NULL  ,
  typeOfWork VARCHAR(45)  NOT NULL    ,
PRIMARY KEY(program_programId)  ,
  FOREIGN KEY(program_programId)
    REFERENCES program(programId));



CREATE INDEX programFinance_FKIndex1 ON programFinance (program_programId);



CREATE INDEX IFK_may_have ON programFinance (program_programId);



CREATE TABLE memberAccount (
  registeredMembers_memberId INTEGER  NOT NULL  ,
  hoursCompleted INTEGER    ,
  currentBalance INTEGER    ,
  totalBalance INTEGER      ,
PRIMARY KEY(registeredMembers_memberId)  ,
  FOREIGN KEY(registeredMembers_memberId)
    REFERENCES registeredMembers(memberId));



CREATE INDEX memberAccount_FKIndex1 ON memberAccount (registeredMembers_memberId);



CREATE INDEX IFK_have ON memberAccount (registeredMembers_memberId);



CREATE TABLE programApplicant (
  appId INTEGER  NOT NULL   ,
  registeredMembers_memberId INTEGER  NOT NULL  ,
  program_programId INTEGER  NOT NULL    ,
PRIMARY KEY(appId, registeredMembers_memberId, program_programId)    ,
  FOREIGN KEY(registeredMembers_memberId)
    REFERENCES registeredMembers(memberId),
  FOREIGN KEY(program_programId)
    REFERENCES program(programId));



CREATE INDEX programApplicant_FKIndex1 ON programApplicant (registeredMembers_memberId);

CREATE INDEX programApplicant_FKIndex2 ON programApplicant (program_programId);



CREATE INDEX IFK_applies_as ON programApplicant (registeredMembers_memberId);

CREATE INDEX IFK_enrolls_through ON programApplicant (program_programId);



CREATE TABLE interview (
  interviewId INTEGER  NOT NULL    ,
  programApplicant_program_programId INTEGER  NOT NULL  ,
  programApplicant_registeredMembers_memberId INTEGER  NOT NULL  ,
  programApplicant_appId INTEGER  NOT NULL  ,
  employee_employeeId INTEGER  NOT NULL  ,
  interviewLocation VARCHAR(45)  NOT NULL  ,
  interviewDateTime DATETIME  NOT NULL  ,
  interviewResult VARCHAR(20)      ,
PRIMARY KEY(interviewId, programApplicant_program_programId, programApplicant_registeredMembers_memberId, programApplicant_appId)    ,
  FOREIGN KEY(programApplicant_appId, programApplicant_registeredMembers_memberId, programApplicant_program_programId)
    REFERENCES programApplicant(appId, registeredMembers_memberId, program_programId),
  FOREIGN KEY(employee_employeeId)
    REFERENCES employee(employeeId));



CREATE INDEX interview_FKIndex1 ON interview (programApplicant_appId, programApplicant_registeredMembers_memberId, programApplicant_program_programId);

CREATE INDEX interview_FKIndex2 ON interview (employee_employeeId);



CREATE INDEX IFK_decided_by ON interview (programApplicant_appId, programApplicant_registeredMembers_memberId, programApplicant_program_programId);

CREATE INDEX IFK_conducts ON interview (employee_employeeId);
