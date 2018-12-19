# Student-Exchange-DBMS
For our project, we will be building a system for a global student exchange program, such as AISEC. Our system will include an initial ER Diagram, which will be followed by a complete Database, which we will then manipulate using a front-end interface, a website. This website will mainly be for administrative use, but a portion of the website will be available to the general public to view programs and apply for them.
The Global Student Exchange Program has branches worldwide. These branches in different countries, are in different cities from where students are selected for the exchange program. Students before they get selected apply for exchange programs, apply for a program in their particular city chapter. Some students are selected by that city chapter and sent to other country to a city to work with the organization whose program it is. Students pay some fixed portion of the fee. These programs are funded by sponsors. The programs are created by worldwide NGO’s, startups, and companies. Students after returning from a program give their statements that are recorded.

## Live preview

[Admin View] http://greybulb.anomoz.com/db/production/

[User View] http://greybulb.anomoz.com/db/production/login.php

## Build Procedure

Upload the website source files to Apache server. You can use WAMP or XAMP for this.

## Screenshots

<table>
  <tbody>
    <tr>
      <!-- Video 1 -->
      <td align="center">
          <img width="290" alt="Simply Notify" src="/screenshots/Screenshot%20(1048).png">
          <br>
      </td>
      <!-- Video 2 -->
      <td align="center">
          <img width="290" alt="Simply Notify" src="/screenshots/Screenshot%20(1049).png">
          <br>
      </td>
      <!-- Video 3 -->
      <td align="center">
          <img width="290" alt="Simply Notify" src="/screenshots/Screenshot%20(1050).png">
          <br>
      </td>
    </tr>
    <tr>
      <!-- Video 4 -->
      <td align="center">
          <img width="290" alt="Simply Notify" src="/screenshots/Screenshot%20(1051).png">
          <br>
      </td>
      <!-- Video 5 -->
      <td align="center">
          <img width="290" alt="Simply Notify" src="/screenshots/Screenshot%20(1052).png">
          <br>
      </td>
      <td align="center">
          <img width="290" alt="Simply Notify" src="/screenshots/Screenshot%20(1053).png">
          <br>
      </td>
      <!-- Video 6 -->
      <tr>
      <td align="center">
          <img width="290" alt="Simply Notify" src="/screenshots/Screenshot%20(1054).png">
          <br>
      </td>
        <td align="center">
          <img width="290" alt="Simply Notify" src="/screenshots/Screenshot%20(1055).png">
          <br>
      </td>
        <td align="center">
          <img width="290" alt="Simply Notify" src="/screenshots/Screenshot%20(1056).png">
          <br>
      </td>
    </tr>
  </tbody>
</table>

## Contributors

Syed Ahsan Ahmed:

worked on the front end on implementing the SQL queries on MSQL, as well as making the connection between website and database.

Ahsan Qadeer:

worked on all the queries in SQL server.

## Code Insight

### Triggers:

Used once in order to create a row in the member finance table one a member is created in the registeredMembers table.

### Stored Procedure

Used 4 stored Procedures.

1) End program.
2) view all programs [admin view]
3) view all programs [member view]
4) create program applicant

### View

Used 1 view when displaying sponsors in 'viewSponsors.php'.

### Data population

Most of the tables contain ~1000 rows. The 'RegisteredMembers' table contains ~1 Million rows.

### Transaction

Used 1 transaction. Happens at the time of ending program. This is what it does.
1) Updates the EndProgram date
2) add program ratings
3) calculates earned money from work hours and adds to members accounts.








