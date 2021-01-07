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
api_connect=tweepy.API(auth)

# now you can search any topic on twitter
      
app = Flask(__name__)

@app.route('/')
def index():
   data = list()
   tweet_data=api_connect.search('India',count=100)

   positive=0
   negative=0
   neutral=0

   # printing line by line
   for tweet in tweet_data:
      #print(tweet.text)
      analysis=TextBlob(tweet.text) # here it will apply NLP\
      # print(analysis.sentiment)
      # now checking polarity only
      if analysis.sentiment.polarity > 0:
         print("positive")
         positive=positive+1
      elif analysis.sentiment.polarity == 0 :
         print("Neutral")
         neutral=neutral+1
      else :
         print("Negative")
         negative=negative+1
   data.append(positive)
   data.append(negative)
   data.append(neutral)
   return jsonify({"response": data}), 200

if __name__ == '__main__':
 app.run(debug=True, port="5001")	
