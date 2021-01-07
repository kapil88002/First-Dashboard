from flask import Flask, jsonify
from bs4 import BeautifulSoup
import requests


hashtags_with_links_volume = list()

source = requests.get("https://trends24.in/united-arab-emirates/").text
soup = BeautifulSoup(source, 'lxml')
trend_div = soup.findAll('div',attrs={"class":"trend-card"})

latest_trend_div = trend_div[0]
``
soup = BeautifulSoup(str(latest_trend_div), 'lxml')
hashtags = soup.findAll('a') 
tweets_volume = soup.findAll('span')

all_cards = soup.findAll('li')

for one_card in all_cards:
  hashT = one_card.findAll('a')
  volT = one_card.findAll('span')
  if(len(volT) == 0):
    volT = ["NOT AVAILABLE"]
    tweet_line = (hashT[0].string+" "+volT[0]+" "+hashT[0]['href']+"\n")
    hashtags_with_links_volume.append(tweet_line)
  else:
    tweet_line = (hashT[0].string+" "+volT[0].string+" "+hashT[0]['href']+"\n")
    hashtags_with_links_volume.append(tweet_line)


app = Flask(__name__)
@app.route('/')
def index():
  
  return jsonify({"response":hashtags_with_links_volume})

if __name__ == '__main__':
  app.run(debug=True,port="5000")	
