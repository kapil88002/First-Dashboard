from flask import Flask, jsonify
import matplotlib.pyplot as plt
from  textblob import TextBlob 
import time
import tweepy


consumer_key = "8AO6OU5ubyi4XO47b1C7Sjdlz"
consumer_sec = "FS1usPrfPolvjLXbwGka5N8TWkOZhUsdxGmmTwuO016koesUSt"
access_token = "1151573806680592384-OUFeUtpsRFZM6jQxl1AG99NEjlY0Kt"
access_token_sec = "KKHmkHkDGVaDof8XK4fKKI52DmNl4vZlaXnx85WRfd4Lr"


# # tweepy explore
# dir(tweepy)
# connected to jump server of twitter

auth=tweepy.OAuthHandler(consumer_key,consumer_sec)


# now we can connect from jump server to web server of twitter
auth.set_access_token(access_token,access_token_sec)

# now we can connect to API storge server of twitter
api=tweepy.API(auth)
public_tweets = api.home_timeline()

data=list()
for tweet in public_tweets:
  a=tweet.text
  b=tweet.created_at
  c=tweet.user.screen_name
  d=tweet.user.location
  data.append(str(a)+"`"+str(b)+"`"+str(c)+"`"+str(d))
   

app = Flask(__name__)

@app.route('/')
def index():
    return jsonify({"response": data}), 200 

if __name__ == '__main__':
 app.run(debug=True, port="5002")	
