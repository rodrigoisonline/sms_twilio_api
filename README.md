# sms_twilio_api
Check SMS Messages with Twilio API, This PHP script allows users to check SMS messages sent to a specified phone number using the Twilio API. It provides a simple web form for inputting the phone number and displays the messages if any exist.

Features
Secure Input Handling: Sanitizes user input to ensure safe processing.

cURL Integration: Utilizes cURL for making HTTP requests to the Twilio API.
Message Display: Fetches and displays messages in a user-friendly format.

Prerequisites
PHP environment with cURL enabled.
Twilio account with valid Account SID and Auth Token.

Usage
Set Up Twilio Credentials: Update the $account_sid and $auth_token variables with your Twilio Account SID and Auth Token.
Deploy the Script: Place the script on your web server.
Access the Form: Open the script in a web browser, enter a phone number, and click "Check SMS" to see the messages.
