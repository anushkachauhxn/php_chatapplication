# 📱🕐 Realtime Chat Application

A realtime chat application built using PHP, SQL and CSS.

### ⭐ Features

#### Signup Page

Signup with email and image validation.

  <img alt="" height="400px" src="https://user-images.githubusercontent.com/59930625/145717293-70a07b6f-bc32-4504-800e-28f311ef9f4f.png">

#### Login Page

User can login with their email and password. The status is updated automatically on login and logout.

  <img alt="" height="350px" src="https://user-images.githubusercontent.com/59930625/145717304-2408ba05-6737-4b6b-b306-71dc6b6335d4.png">

#### User Page

Logged in user can see all the other users on the database

- with their online/offline status and
- the last message between you and that user.

  <img alt="" height="340px" src="https://user-images.githubusercontent.com/59930625/145717312-148325cc-6b10-4716-ab57-e480ea095485.png">

A functional **search bar** is also provided.

  <img alt="" height="280px" src="https://user-images.githubusercontent.com/59930625/145717314-5746644e-9044-450f-b6e1-f988dafb6b2b.png">

This gets **updated in real time**. So, if:

- a new user signs up or
- a previous user logs in and/or
- sends a message,

the list of users is updated without having to refresh.

#### Chat Area

- You can see your previous chats by clicking on the respective user.
- User can send messages using the typing area provided.

  <img alt="" height="520px" src="https://user-images.githubusercontent.com/59930625/145717321-3656ba97-488d-42cf-ab90-62b86dc4aebd.png">

### 💻 Setup

#### Code Setup

1. Fork this repository.

2. Clone the repository in your project folder.

   `git clone https://github.com/<your_username>/php_chatapplication.git`

3. Run this command to install the dependencies.

   `npm install`

   OR

   Simply install the less compiler directly by using:

   `npm install less`

4. You can compile the less files to css using:

   `lessc styles.less styles.css`

#### Backend Setup

3. Open the **XAMPP Control Panel** and run the Apache (Webserver) and MySQL (Database Server) servers.

   <img alt="" height="300px" src="https://user-images.githubusercontent.com/59930625/145715844-8b65bf03-615f-429c-9e3c-9dc9440919a1.png">

   _Don't have it already? Download it from [here](https://www.apachefriends.org/download.html)._

4. Move the project folder to `C:\xampp\htdocs`.

5. Go to `http://localhost/phpmyadmin/` in your browser and create a database named `chatapp`.

<img alt="" height="180px" src="https://user-images.githubusercontent.com/59930625/145715909-d34ae362-c9ce-4493-a553-2b7fea1e7bb5.png">

6. Import the sql file `chatapp.sql` in the database folder to setup the database.

<img alt="" height="250px" src="https://user-images.githubusercontent.com/59930625/145716185-1f29ac5e-4e0f-4fd8-9056-0d6e89c37921.png">

#### Get Started

7. Go to `http://localhost/chatapp/` in your browser and get started.

<img alt="" height="400px" src="https://user-images.githubusercontent.com/59930625/145715972-644fd894-d309-4080-909b-f353928a6ecd.png">
