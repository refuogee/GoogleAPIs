# GoogleAPIs
Google API Accesses
So this project was sort of a proof of concept and is definitely a work in progress. For the small marketing company I am a part of we have clients that tap into the various services Google has to offer via their APIs and I wanted to pull as much data as I could because most clients do not want to go and sift through Google Analytics or AdWords or whatever properties they have to get a clear picture.

Google does offer various SDKs to help out but I also knew that I was basically just interacting with a REST API and that using cUrl I could achieve most things.

Getting access was the hardest part. Having to have a workspace and billing account so the various APIs could be enabled and then setting them up correctly etc. In the end I gave up on the AdWords API because of the difficulty of access.

What I really enjoyed solving was getting / creating and interacting using a JWT. Initially I did it all a very long and manual way, plugging in values from the access created via Google into things like JWT.io and then using Postman to interact and understand how it all worked.

Once I was confident I knew what I wanted to do I slowly started building it all with PHP.

I have removed sensitive data (I hope) and never got around to having a credentials file that stored everything I need.

This won't work as is because you would need to have all the correct Google access values for your data etc and then I managed the JWT by putting it into a database and checking if it was valid each time, if it wasn't I then created a new one. 

So yeah work in progress but I learnt a fair whack of things doing this.

One of the interesting things I learnt during this was including PHP files as variables. So building one PHP with the intention of it passing down it's data to the next PHP file. 
