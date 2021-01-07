from flask import Flask, jsonify
from googlesearch import search
query = "Data Analysis"
result=list()
for i in search(query ,tld = 'com',lang = 'en',num = 10, start = 0,stop = None,pause = 2.0):
    result.append(i)

app = Flask(__name__)

@app.route('/')
def index():
    return jsonify({"response": result}), 200 



if __name__ == '__main__':
 app.run(debug=True, port="5003")	

