# Mep Home Page
Please modify 

~~~

31
00:02:20,990 --> 00:02:23,990
yeah

32
00:02:25,580 --> 00:02:30,26
~~~

In subtitle 32 you can see that the end time is ",26"  this will cause an error.

It instead needs to read: ",260"


To fix this, you need to modify the regex in /vendor/captioning/captioning/src/Captioning/Format/SubripFile.php
to be valid even if there are just two difits