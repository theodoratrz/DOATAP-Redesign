# Human Computer Interaction 
## Redesign of the website for Hellenic National Academic Recognition and Information Center 
### Fall 2021-2022

Redesigned the website of Hellenic National Academic Recognition and Information Center, focusing on UX Design. 
Tools: PHP, MySQL, HTML, CSS, JavaScript, Bootstrap, React.

## Build Website
**NOTE:** Before uploading any application files, run `sudo chmod 777 uploads`.
- Build & Start Docker container
    - `docker-compose up -d`
    - `docker-compose start`
- Create DB
    - Create DB `'sdi1800197'` with `sdi1800197.sql`, using either PHPMyAdmin or from inside the container `bash`. (username: "root", pwd: "12344321")
- Visit `localhost` from your browser.

## Docker usage
```
# create and start (the first run takes time to build the image)
docker-compose up -d
docker-compose start
docker-compose down -v
```

## Requested:
* Implement the homepage of the website
* Implement the page of contact information 
* Announcements page
* Implement the page of personal info display and edit both for user and admin
* Implement certain forms for users. 
Users are able to make a new form, edit it, store it temporaly, redo it, submit it. The user must fill all the gaps in the form and upload the proper documentation. Until submitting, he/she can delete and re-upload their documentation.
* Implement certain form handlers for admins. 
Admins are able to check the personal info of the user, the info he/she 
submitted, the uploaded files and decide if everything is uploaded correctly. If not, the admin rejects the form and informs the user
about his/her decission. If everything is fine, the admin approves the form. If the form is submitted correctly by the user, but the admin 
cannot match the user's education with the correspondingly in Greece, he/she has to propose which subjects the user is obligated to take exams on.
* Implement application-view.
Users are able to track their application from their profile. They can also see the state of their application. Only when the state is "stored" can the user edit/delete it. In every other case the user can only see his/her application. If the admin rejectes/proposes subjects/approves the form, the user
can see the admin's comments about his decission. 

## Log in 

Name of a user-admin: ADMIN <br>
Name of a user 1: USER1 <br>
Name of a user 2: USER2 <br>

Password (for all of them): **1234** <br>


## Implemented by:

Theodora Troizi

Nikolaos Passakos Chatzioridis

Pavlos Spanoudakis

