# Park-a-lot Admin Website

An accompanying website for our app "Park-a-lot". This website is for developers of the app and also for our partners, the respective staff of each carpark. It allows the staff to edit things related to the carpark they are associated with and give developers complete control over the information that the mobile app has to access. The developers are able to create, delete and edit various data and work upon it when our partners and users send problem requests.
 
## Design Process
 
 This website is mainly for developers to help our users and partners when they face an issue on their app or wants to make edits that the app doesn't currently have as a feature. It is also for staff to make edits to their own profile, make requests to the developers and edit, delete and add things related to the carpark they are in charge of. 
 Our partners are referred to staff and our developers are referred to as admin.

 - As a partner or developer, I want to customised my own profile and change my personal information so that I can personalised my information and pictures.
 - As a partner or developer, I want to be able to communicate with other users and developers if they have an issue and want to reach out to me.

 - As a partner, I want to see the details of my company's carpark so that I can stay updated and assist in any issues.
 - As a partner, I want to be able to change the picture and information of my company's carpark so that the information can stay updated.
 - As a partner, I want to be able to add and edit the lots in my company's carpark so that any users will see the updated lots to park in.
 - As a partner, I want to be able to add staff to the carpark so that my co-worker that just joined can have access to the admin website as well.

 - As a developer, I would like to delete, edit and update the carparks, vehicles and users so that I can deal with any issue from the user or staff efficiently.
 - As a developer, I would like to be able to add another developer account so that new developers can have admin access to this admin website.

 DDWA adobe XD link
 
This section is also where you would share links to any wireframes, mockups, diagrams etc. that you created as part of the design process. 
These files should themselves either be included as a pdf file in the project itself (in an separate directory)
Include the Adobe XD wireframe as a folder. You can include the XD share url. 

## Features
 
### Existing Features
- Edit personal profile:
Where you can edit the your personal information, change password, contact information and images.
- Carpark:
Where you can see how many lots are occupied and empty, the address and name of the carpark.
- Edit carpark:
You can add or edit the carpark information and the picture for the carpark. You can delete the carpark if you want.
- Lots:
You can edit, delete and add the carpark lots as well as edit the parked vehicle within.
- Staff: 
You can edit, delete and add staff for developers, or add staff for partners.
- Car:
Developers can edit, delete and add vehicles.
- User:
Developers can edit, delete and add users.
- Register:
Developers can add another admin account.


### Features Left to Implement
- Allow starting a new conversation in message
- Dark mode
- Personalised interface
- Individual carpark layouts

## Technologies Used

- [JQuery](https://jquery.com)
    - The project uses **JQuery** to simplify DOM manipulation.
- [JavaScript](https://www.javascript.com/)
    - The project uses **Javascript** for implementation of opening and closing form as well as JQuery
- [HTML](https://html.com/)
    - The project uses **HTML** to create website structure
- [Bootstrap](https://getbootstrap.com/)
    - The project uses **Bootstrap** and **CSS** to make the website visually appealing
- [Argon Dashboard](https://demos.creative-tim.com/argon-dashboard/docs/getting-started/overview.html)
    - The project uses **Argon Admin Dashboard** for website pages structure and design
- [Start Bootstrap Dashboard](https://startbootstrap.com/theme/sb-admin-2)
    - The project uses **Start Bootstrap Dashboard** for login and register pages struture and design
- [PHP](https://www.php.net/)
    - The project uses **PHP** to execute form actions and display from database
- [phpMyAdmin](https://www.phpmyadmin.net/)
    - The project uses **phpMyAdmin** as a database for the website


## Testing

### Partner and Developer
1. Profile form:
    1. Login and you will arrive at the profile page
    2. Try to submit remove all the values or just one value from the form and verify that an error message about the required fields appears
    3. Try to submit the form with an invalid email address and verify that a relevant error message appears
    4. Try to submit the form with a postal code that does not consist of exactly 6 digits and verify that a relevant error message appears
    5. Try to submit the form with a contact number that does not consist of exactly 8 digits and verify that a relevant error message appears
    6. Try to upload an identical file of profile image or banner image and verify that a relevant error message appears
    7. Try to upload a file with invalid file format and verify that a relevant error message appears
    8. Try to upload without any file and verify that a relevant error message appears
    9. Try to submit the form's values with all inputs valid and verify that a success message appears
    10. Try to upload a valid profile or banner image and verify that the image is changed successfully

2. Carpark form:
    1. Go to the "Carpark" page
    2. Try to click the button "Car lots" of a carpark and verify that the details of the form matches that of the carpark you clicked
    3. Try to submit the form without all the values in the input and verify that an error message about the required fields appears
    4. Try to submit the form's values with all inputs valid and verify that a success message appears
    5. Try to upload an identical file of profile image or banner image and verify that a relevant error message appears
    6. Try to upload a file with invalid file format and verify that a relevant error message appears
    7. Try to upload without any file and verify that a relevant error message appears
    8. Try to upload a carpark image and verify that the image is changed successfully on the carpark page

3. Carpark Lots form:
    1. Scroll down from the "Carpark" page to see "Carpark Lots" table
    2. Click on the "Add" button and arrive at "Add lot" page
    3. Try to submit a Parking ID that already exist and verify that a relevant error message appears
    4. Try to submit the form without filling in the required field and verify that an error message about the required fields
    5. Try to key in an existing vehicle plate that has a different type of vehicle as the lot you are adding/editing and verify that a relevant error message appears
    6. Try to submit the form's values with all inputs valid and verify that a success message appears
    7. From "Carpark" page, click on the edit button in the same line as the lot
    8. Try to submit the form without filling in any field and verify that an error message about the required fields
    9. Try to submit a Parking ID that already exist and verify that a relevant error message appears
    10. Try to submit the form's values with all inputs valid and verify that a success message appears
    11. Click on "Delete" button and go back to the selected carpark page and verify that the delete4d lot is no longer in the table

4. Add Staff:
    1. From "Carpark" page, click on the add button in the same line as the lot
    2. Try to submit the form without all the values in the input and verify that an error message about the required fields appears
    3. Try to submit the form with an invalid email address and verify that a relevant error message appears
    4. Try to submit the form with a postal code that does not consist of exactly 6 digits and verify that a relevant error message appears
    5. Try to submit the form with a contact number that does not consist of exactly 8 digits and verify that a relevant error message appears
    6. Try to submit the form with invalid Admin password and verify that a relevant error message appears
    7. Try to submit the form without matching the password and the re-type password and verify that a relevant error message appears
    8. Try to submit the form with missing password field  and verify that a relevant error message appears
    9. Try to submit the form with all password input valid and verify that a success message appears
    10. Try to submit the form with all inputs valid and verify that a success message appears

### Developers
5. Edit Staff:
    1. From the selected carpark page, click on the more icon and click "Edit"
    2. Try to submit the form with invalid Admin password and verify that a relevant error message appears
    3. Try to submit the form without matching the password and the re-type password and verify that a relevant error message appears
    4. Try to submit the form with one or two missing password field and verify that a relevant error message appears
    5. Try to submit the form with all password input valid and verify that a success message appears
    6. Try to submit the form with an invalid email address and verify that a relevant error message appears
    7. Try to submit the form with a postal code that does not consist of exactly 6 digits and verify that a relevant error message appears
    8. Try to submit the form with a contact number that does not consist of exactly 8 digits and verify that a relevant error message appears
    9. Try to submit the form with all inputs valid and verify that a success message appears
    10. From the selected carpark page, click on the more icon, click "Delete" and verify that a success message appears

6. Car form:
    1. Go to the "Car" page
    2. From the "Car" page, click on the "Add" button and arrive at "Add vehicle" page
    3. Try to submit the form without all the values in the input and verify that an error message about the required fields appears
    4. Try to submit the form with a lot that already has a vehicle parked and verify that a relevant error message appears
    5. Try to submit the form with a lot for another vehicle type and verify that a relevant error message appears
    6. Try to submit the form with all inputs valid and verify that a success message appears
    7. From the "Car" page, click on the car plate number and arrive at "Edit vehicle" page
    8. Try to submit the form without the values in the input and verify that an error message about the required fields appears
    9. Try to submit the form with a lot that already has a vehicle parked and verify that a relevant error message appears
    10. Try to submit the form with a lot for another vehicle type and verify that a relevant error message appears
    11. Try to submit the form with all inputs valid and verify that a success message appears
    12. From the "Car" page, click on the delete icon and refresh to see the selected car be deleted from the vehicles table

7. User form:
    1. Go to the "User" page
    2. From the "User" page, click on the "Add" button and arrive at "Add user" page
    3. Try to submit the form without all the values in the input and verify that an error message about the required fields appears
    4. Try to submit the form with an invalid email address and verify that a relevant error message appears
    5. Try to submit the form with a contact number that does not consist of exactly 8 digits and verify that a relevant error message appears
    6. Try to submit the form with invalid Admin password and verify that a relevant error message appears
    7. Try to submit the form without matching the password and the re-type password and verify that a relevant error message appears
    8. Try to submit the form with missing password field  and verify that a relevant error message appears
    9. Try to submit the form with all password input valid and verify that a success message appears
    10. Try to submit the form with all inputs valid and verify that a success message appears
    11. From the "User" page, click on the edit icon and arrive at "Edit user" page
    12. Try to submit the form without all the values in the input and verify that an error message about the required fields appears
    13. Try to submit the form with an invalid email address and verify that a relevant error message appears
    14. Try to submit the form with a contact number that does not consist of exactly 8 digits and verify that a relevant error message appears
    15. Try to submit the form with invalid Admin password and verify that a relevant error message appears
    16. Try to submit the form without matching the password and the re-type password and verify that a relevant error message appears
    17. Try to submit the form with missing password field and verify that a relevant error message appears
    18. Try to submit the form with an already used username and verify that a relevant error message appears
    19. Try to submit the form with an already used license plate number and verify that a relevant error message appears
    20. Try to submit the form with all password input valid and verify that a success message appears
    21. On the "Edit user" page, pressed the "Delete" button and vertify that the selected user has been removed from the Users table

8. Register form:
    1. Go to the "Register" page
    2. Try to submit the form without all the values in the input and verify that an error message about the required fields appears
    3. Try to submit the form with an already used admin username and verify that a relevant error message appears
    4. Try to submit the form with an invalid email address and verify that a relevant error message appears
    5. Try to submit the form with a contact number that does not consist of exactly 8 digits and verify that a relevant error message appears
    6. Try to submit the form with invalid Admin password and verify that a relevant error message appears
    7. Try to submit the form without matching the password and the re-type password and verify that a relevant error message appears
    8. Try to submit the form with missing password field and verify that a relevant error message appears
    9. Try to submit the form with a postal code that does not consist of exactly 6 digits and verify that a relevant error message appears
    10. Try to submit the form with all form input valid and verify that a success message appears

9. Message:
    1. Go the "Message" page that pops up when you click on your username
    2. Click on a conversation and verify that the chat messages appear
    3. Type in a message in the text message input and send
    4. Click on the same conversation again


### Problem
Adding vehicle will cause the added vehicle to have no owner

## Credits

### Bootstrap templates used
- https://www.creative-tim.com/product/argon-dashboard?partner=114912#
- https://startbootstrap.com/theme/sb-admin-2

### Images used
- https://unsplash.com/@john_matychuk?utm_source=unsplash&amp;utm_medium=referral&amp;utm_content=creditCopyText 
    - Photo by John Matychuk on Unsplash
- https://unsplash.com/@arteum?utm_source=unsplash&amp;utm_medium=referral&amp;utm_content=creditCopyText
    - Photot by Arteum.ro on Unsplash
- https://unsplash.com/photos/UfMb0M2RWjo
- https://www.bft-international.com/en/artikel/bft_CarDeck_Professional_TF_for_parking_structures_subjected_to_high_loading_1617781.html
- http://www.rwsentosablog.com/insights-p-parking-in-the-resort/
- https://en.wikipedia.org/wiki/Marina_Bay_Sands
- https://www.capitaland.com/sg/en/lease/mall-listing/jewel-changi-airport-mall.html
- https://valuelifestylesg.wordpress.com/2014/11/09/carpark-at-great-world-city/
- https://www.mapletree.com.sg/All-Properties/MCT/Singapore/VivoCity
- https://www.np.edu.sg/Pages/contact.aspx
- https://www.kkh.com.sg/patient-care/visitor-info/parking-information-kk-womens-and-childrens-hospital
- https://foursquare.com/v/kkh-carpark/4cdd36105aeda1cd6d04c711
- https://thestarvista.sg/plan-your-visit.html#parking
- https://www.facebook.com/TheStarVista/about/
- https://www.sgh.com.sg/about-us
- https://www.sp.edu.sg/sp/about-sp
- https://mothership.sg/2019/07/poly-students-new-scheme-graduate-uni-early/
- https://www.nypi.edu.sg/en.html


### Icons used
- https://icons8.com/icons/set/car-brand
- http://motorcycle-brands.com/
- https://www.izmostock.com/car-stock-photos-by-brand
- https://www.easyicon.net/language.en/iconsearch/abarth/?s=addtime_DESC
- https://iconscout.com/icons
- https://iconscout.com/icons/dacia
    - Dacia Icon by Icon Mafia
- https://iconscout.com/icons/isuzu
    - Isuzu Icon by Icon Mafia on Iconscout
- https://iconscout.com/icons/seat
    - Seat Icon by Icon Mafia
- https://iconscout.com/icons/smart
    - Smart Icon on Iconscout
- https://iconscout.com/icons/ssangyong
    - Ssangyong Logo Icon by Icon Mafia on Iconscout
- https://iconscout.com/icons/abarth
    - Abarth Logo Icon by Icon Mafia on Iconscout
- https://www.carlogos.org/

## Car plate generator
- https://iantan76.wordpress.com/2015/09/27/licenceplatetool/

## Vehicle model and brand references
- https://www.webbikeworld.com/motorcycle-brands/all-brands/
- https://www.izmostock.com/car-stock-photos-by-brand
- https://landtransportguru.net/bus-infrastructure/bus-models/
- https://www.topspeed.com/trucks/makes/
- https://www.cars.com/

### Acknowledgements
- I received inspiration for this project from Jewel's Parking Kiosk

